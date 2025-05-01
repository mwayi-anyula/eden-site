<?php
namespace Vendor\EdenSite\DataProcessing;

use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

class BlogProcessor implements DataProcessorInterface
{
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    ) {
        $limit = (int)$cObj->data['tx_edensite_blog_limit'] ?? 5;
        $currentPage = (int)($GLOBALS['TYPO3_REQUEST']->getQueryParams()['page'] ?? 1);
        $offset = ($currentPage - 1) * $limit;
        
        // Get category restrictions
        $categoryUids = [];
        if (!empty($cObj->data['tx_edensite_blog_categories'])) {
            $categoryUids = explode(',', $cObj->data['tx_edensite_blog_categories']);
        }
        
        // Query blog posts (assuming they're stored in pages with doktype=13)
        $queryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Database\ConnectionPool::class
        )->getQueryBuilderForTable('pages');
        
        $query = $queryBuilder
            ->select('*')
            ->from('pages')
            ->where(
                $queryBuilder->expr()->eq('doktype', 13), // Blog post type
                $queryBuilder->expr()->eq('sys_language_uid', $cObj->getCurrentLanguage()),
                $queryBuilder->expr()->eq('hidden', 0),
                $queryBuilder->expr()->eq('deleted', 0)
            )
            ->orderBy('crdate', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);
        
        // Add category filter if needed
        if (!empty($categoryUids)) {
            $query->join(
                'pages',
                'sys_category_record_mm',
                'mm',
                $queryBuilder->expr()->eq(
                    'mm.uid_foreign',
                    $queryBuilder->quoteIdentifier('pages.uid')
                )
            )
            ->andWhere(
                $queryBuilder->expr()->in(
                    'mm.uid_local',
                    $queryBuilder->createNamedParameter($categoryUids, \TYPO3\CMS\Core\Database\Connection::PARAM_INT_ARRAY)
                ),
                $queryBuilder->expr()->eq(
                    'mm.tablenames',
                    $queryBuilder->createNamedParameter('pages')
                ),
                $queryBuilder->expr()->eq(
                    'mm.fieldname',
                    $queryBuilder->createNamedParameter('categories')
                )
            );
        }
        
        $posts = $query->execute()->fetchAll();
        
        // Process posts (add image, url, etc.)
        $processedPosts = [];
        $contentObject = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(ContentObjectRenderer::class);
        
        foreach ($posts as $post) {
            $contentObject->start($post, 'pages');
            
            $processedPost = [
                'title' => $post['title'],
                'teaser' => $post['abstract'],
                'date' => \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                    \TYPO3\CMS\Core\Type\DateTime::class,
                    $post['crdate']
                ),
                'url' => $contentObject->getTypoLink_URL($post['uid']),
            ];
            
            // Add image if available
            if (!empty($post['media'])) {
                $fileRepository = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                    \TYPO3\CMS\Core\Resource\FileRepository::class
                );
                $fileObjects = $fileRepository->findByRelation('pages', 'media', $post['uid']);
                if (!empty($fileObjects)) {
                    $processedPost['image'] = $fileObjects[0];
                }
            }
            
            $processedPosts[] = $processedPost;
        }
        
        $processedData['posts'] = $processedPosts;
        
        // Add pagination if enabled
        if ($cObj->data['tx_edensite_blog_show_pagination']) {
            $countQueryBuilder = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
                \TYPO3\CMS\Core\Database\ConnectionPool::class
            )->getQueryBuilderForTable('pages');
            
            $countQuery = $countQueryBuilder
                ->count('*')
                ->from('pages')
                ->where(
                    $countQueryBuilder->expr()->eq('doktype', 13),
                    $countQueryBuilder->expr()->eq('sys_language_uid', $cObj->getCurrentLanguage()),
                    $countQueryBuilder->expr()->eq('hidden', 0),
                    $countQueryBuilder->expr()->eq('deleted', 0)
                );
            
            // Add category filter if needed
            if (!empty($categoryUids)) {
                $countQuery->join(
                    'pages',
                    'sys_category_record_mm',
                    'mm',
                    $countQueryBuilder->expr()->eq(
                        'mm.uid_foreign',
                        $countQueryBuilder->quoteIdentifier('pages.uid')
                    )
                )
                ->andWhere(
                    $countQueryBuilder->expr()->in(
                        'mm.uid_local',
                        $countQueryBuilder->createNamedParameter($categoryUids, \TYPO3\CMS\Core\Database\Connection::PARAM_INT_ARRAY)
                    ),
                    $countQueryBuilder->expr()->eq(
                        'mm.tablenames',
                        $countQueryBuilder->createNamedParameter('pages')
                    ),
                    $countQueryBuilder->expr()->eq(
                        'mm.fieldname',
                        $countQueryBuilder->createNamedParameter('categories')
                    )
                );
            }
            
            $totalPosts = $countQuery->execute()->fetchColumn(0);
            $totalPages = ceil($totalPosts / $limit);
            
            $processedData['pagination'] = [
                'currentPage' => $currentPage,
                'totalPages' => $totalPages,
                'totalItems' => $totalPosts,
                'itemsPerPage' => $limit,
                'hasNextPage' => $currentPage < $totalPages,
                'hasPreviousPage' => $currentPage > 1,
            ];
        }
        
        return $processedData;
    }
}