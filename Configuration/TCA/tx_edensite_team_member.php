<?php
return [
    'ctrl' => [
        'title' => 'Team Member',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'name,position,bio',
        'iconfile' => 'EXT:eden_site/Resources/Public/Icons/team-member.svg',
    ],
    'types' => [
        '1' => ['showitem' => 'name, position, bio, image, --palette--;;socialLinks'],
    ],
    'palettes' => [
        'socialLinks' => ['showitem' => 'social_links'],
    ],
    'columns' => [
        'name' => [
            'label' => 'Name',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'position' => [
            'label' => 'Position',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'bio' => [
            'label' => 'Bio',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'cols' => 40,
                'rows' => 5,
            ],
        ],
        'image' => [
            'label' => 'Image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'image',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'Add image reference',
                    ],
                    'maxitems' => 1,
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'social_links' => [
            'label' => 'Social Links',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_edensite_social_link',
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
    ],
];