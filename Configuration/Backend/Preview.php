<?php
defined('TYPO3') or die();

return [
    'eden_slider' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:slider.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-slider',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\SliderPreviewRenderer::class,
    ],
    'eden_lightbox' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:lightbox.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-lightbox',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\LightboxPreviewRenderer::class,
    ],
    // Add preview configurations for other content elements
    'eden_blog' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:blog.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-blog',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\BlogPreviewRenderer::class,
    ],
    'eden_quotations' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:quotations.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-quotations',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\QuotationsPreviewRenderer::class,
    ],
    'eden_maps' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:maps.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-maps',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\MapsPreviewRenderer::class,
    ],
    'eden_team' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamPreviewRenderer::class,
    ],  
    'eden_team_member' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberPreviewRenderer::class,
    ],
    'eden_team_member_list' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_list.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-list',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberListPreviewRenderer::class,
    ],
    'eden_team_member_detail' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_detail.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-detail',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberDetailPreviewRenderer::class,
    ],
    'eden_team_member_slider' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_slider.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-slider',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberSliderPreviewRenderer::class,
    ],
    'eden_team_member_carousel' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_carousel.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-carousel',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberCarouselPreviewRenderer::class,
    ],
    'eden_team_member_grid' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_grid.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-grid',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberGridPreviewRenderer::class,
    ],
    'eden_team_member_list_grid' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_list_grid.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-list-grid',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberListGridPreviewRenderer::class,
    ],
    'eden_team_member_detail_grid' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_detail_grid.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-detail-grid',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberDetailGridPreviewRenderer::class,
    ],
    'eden_team_member_slider_grid' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_slider_grid.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-slider-grid',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberSliderGridPreviewRenderer::class,
    ],
    'eden_team_member_carousel_grid' => [
        'label' => 'LLL:EXT:eden_site/Resources/Private/Language/locallang.xlf:team_member_carousel_grid.title',
        'group' => 'eden',
        'iconIdentifier' => 'eden_site-team-member-carousel-grid',
        'previewRenderer' => \MwayiAnyula\EdenSite\Backend\Preview\TeamMemberCarouselGridPreviewRenderer::class,
    ],

];