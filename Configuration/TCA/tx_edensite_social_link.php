<?php
return [
    'ctrl' => [
        'title' => 'Social Link',
        'label' => 'platform',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'platform,url',
        'iconfile' => 'EXT:eden_site/Resources/Public/Icons/social-link.svg',
    ],
    'types' => [
        '1' => ['showitem' => 'platform, url'],
    ],
    'columns' => [
        'platform' => [
            'label' => 'Platform',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Twitter / X', 'twitter'],
                    ['Facebook', 'facebook'],
                    ['LinkedIn', 'linkedin'],
                    ['Instagram', 'instagram'],
                    ['YouTube', 'youtube'],
                    ['GitHub', 'github'],
                    ['Website', 'website'],
                ],
                'size' => 1,
                'maxitems' => 1,
                'eval' => 'required',
            ],
        ],
        'url' => [
            'label' => 'URL',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 1024,
                'eval' => 'trim,required',
                'placeholder' => 'https://',
            ],
        ],
    ],
];