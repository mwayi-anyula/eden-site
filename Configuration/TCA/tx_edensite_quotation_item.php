<?php
return [
    'ctrl' => [
        'title' => 'Quotation Item',
        'label' => 'author',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'quote,author,role',
        'iconfile' => 'EXT:eden_site/Resources/Public/Icons/quotation-item.svg',
    ],
    'types' => [
        '1' => ['showitem' => 'quote, author, role, image'],
    ],
    'columns' => [
        'quote' => [
            'label' => 'Quote',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
                'cols' => 40,
                'rows' => 5,
            ],
        ],
        'author' => [
            'label' => 'Author',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'role' => [
            'label' => 'Role/Position',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim',
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
    ],
];