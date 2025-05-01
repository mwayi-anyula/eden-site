<?php
defined('TYPO3') or die();

call_user_func(function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_edensite_slider_item');
    
    // Add slider items field to tt_content
    $sliderItems = [
        'tx_edensite_slider_items' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:slider.items',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_edensite_slider_item',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'expandSingle' => true,
                    'enabledControls' => [
                        'localize' => true,
                    ],
                ],
                'behaviour' => [
                    'mode' => 'select',
                ],
            ],
        ],
    ];
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $sliderItems);

    
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_edensite_blog_categories');
    $blogFields = [
        'tx_edensite_blog_categories' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:blog.categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => ' AND sys_category.sys_language_uid IN (-1, 0) ORDER BY sys_category.title ASC',
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'tx_edensite_blog_categories',
                    'tablenames' => 'tt_content',
                ],
                'MM_opposite_field' => 'items',
                'size' => 5,
                'autoSizeMax' => 10,
                'maxitems' => 9999,
                'multiple' => 0,
            ],
        ],
        'tx_edensite_blog_limit' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:blog.limit',
            'config' => [
                'type' => 'input',
                'size' => 5,
                'eval' => 'int',
                'default' => 5,
            ],
        ],
        'tx_edensite_blog_show_pagination' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:blog.show_pagination',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'default' => 1,
            ],
        ],
    ];
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $blogFields);

    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_edensite_blog_categories, tx_edensite_blog_limit, tx_edensite_blog_show_pagination', 'eden_blog', 'after:header');   // Add blog fields to tt_content for blog plugin
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_edensite_slider_items', 'eden_slider', 'after:header');  // Add slider items field to tt_content for sliders
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'tx_edensite_quotation_items', 'eden_quotations', 'after:header'); // Add quotation items field to tt_content for quotations
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('tt_content', 'assets', 'eden_quotations', 'after:header'); // Add assets field to tt_content for quotations

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_edensite_quotation_items');
    $quotationItems = [
        'tx_edensite_quotation_items' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:quotations.items',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_edensite_quotation_item',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'expandSingle' => true,
                    'enabledControls' => [
                        'localize' => true,
                    ],
                ],
            ],
        ],
    ];
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $quotationItems);


    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_edensite_map_address');
    $mapFields = [
        'tx_edensite_map_address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:map.address',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 3,
                'eval' => 'trim,required',
            ],
        ],
        'tx_edensite_map_zoom' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:map.zoom',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['1 (World)', 1],
                    ['5 (Landmass/continent)', 5],
                    ['10 (City)', 10],
                    ['15 (Streets)', 15],
                    ['20 (Buildings)', 20],
                ],
                'default' => 15,
            ],
        ],
        'tx_edensite_map_type' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:map.type',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Roadmap', 'roadmap'],
                    ['Satellite', 'satellite'],
                    ['Hybrid', 'hybrid'],
                    ['Terrain', 'terrain'],
                ],
                'default' => 'roadmap',
            ],
        ],
        'tx_edensite_map_markers' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:map.markers',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_edensite_map_marker',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'expandSingle' => true,
                ],
            ],
        ],
    ];
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $mapFields);

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_edensite_team_members');
    $teamFields = [
        'tx_edensite_team_members' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team.members',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_edensite_team_member',
                'foreign_field' => 'parentid',
                'foreign_table_field' => 'parenttable',
                'appearance' => [
                    'useSortable' => true,
                    'showSynchronizationLink' => true,
                    'showAllLocalizationLink' => true,
                    'showPossibleLocalizationRecords' => true,
                    'showRemovedLocalizationRecords' => false,
                    'expandSingle' => true,
                ],
            ],
        ],
        'tx_edensite_team_layout' => [
            'exclude' => true,
            'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team.layout',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Grid', 'grid'],
                    ['List', 'list'],
                    ['Carousel', 'carousel'],
                ],
                'default' => 'grid',
            ],
        ],
    ];
    
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $teamFields);

    // Add the new content elements to the TCA
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:slider.title',
            'eden_slider',
            'content-slider',
        ],
        'CType',
        'eden_site'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:lightbox.title',
            'eden_lightbox',
            'content-image',
        ],
        'CType',
        'eden_site'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:blog.title',
            'eden_blog',
            'content-blog',
        ],
        'CType',
        'eden_site'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:quotations.title',
            'eden_quotations',
            'content-quotations',
        ],
        'CType',
        'eden_site'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:map.title',
            'eden_map',
            'content-map',
        ],
        'CType',
        'eden_site'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
        [
            'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team.title',
            'eden_team',
            'content-team',
        ],
        'CType',
        'eden_site'
        );  

});

