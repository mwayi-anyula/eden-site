<?php
defined('TYPO3') or die();

call_user_func(function() {
    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_content.php']['dataProcessing'][
        'eden_site_blog'
    ] = \MwayiAnyula\EdenSite\DataProcessing\BlogProcessor::class;

    
    // Register content elements
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        '@import "EXT:eden_site/Configuration/TSconfig/ContentElements.typoscript"'
    );
    
    // Include CSS and JS
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cssFiles']['eden_site'] = 'EXT:eden_site/Resources/Public/Assets/CSS/eden.css';
    
    $GLOBALS['TYPO3_CONF_VARS']['FE']['jsFiles']['eden_site_slider'] = 'EXT:eden_site/Resources/Public/Assets/JS/slider.js';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['jsFiles']['eden_site_lightbox'] = 'EXT:eden_site/Resources/Public/Assets/JS/lightbox.js';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['jsFiles']['eden_site_quotations'] = 'EXT:eden_site/Resources/Public/Assets/JS/quotations.js';
    $GLOBALS['TYPO3_CONF_VARS']['FE']['jsFiles']['eden_site_team'] = 'EXT:eden_site/Resources/Public/Assets/JS/team.js';
    
    // Register icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
        \TYPO3\CMS\Core\Imaging\IconRegistry::class
    );
    
    $iconRegistry->registerIcon(
        'eden_site-slider',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:eden_site/Resources/Public/Icons/slider.svg']
    );
    
    $iconRegistry->registerIcon(
        'eden_site-lightbox',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:eden_site/Resources/Public/Icons/lightbox.svg']
    );
    
    // Register more icons for other content elements
    $iconRegistry->registerIcon(
        'eden_site-quotations',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:eden_site/Resources/Public/Icons/quotations.svg']
    );
    $iconRegistry->registerIcon(
        'eden_site-team',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:eden_site/Resources/Public/Icons/team.svg']
    );

});