<?php
return [
    'ctrl' => [
        'title' => 'Map Marker',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'sortby' => 'sorting',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'searchFields' => 'title,address',
        'iconfile' => 'EXT:eden_site/Resources/Public/Icons/map-marker.svg',
    ],
    'types' => [
        '1' => ['showitem' => 'title, address, --palette--;;coordinates, color'],
    ],
    'palettes' => [
        'coordinates' => ['showitem' => 'latitude, longitude'],
    ],
    'columns' => [
        'title' => [
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
                'eval' => 'trim,required',
            ],
        ],
        'address' => [
            'label' => 'Address',
            'config' => [
                'type' => 'text',
                'cols' => 40,
                'rows' => 3,
                'eval' => 'trim',
            ],
        ],
        'latitude' => [
            'label' => 'Latitude',
            'config' => [
                'type' => 'input',
                'size' => 15,
                'eval' => 'trim,double2',
                'placeholder' => 'e.g. 52.520008',
            ],
        ],
        'longitude' => [
            'label' => 'Longitude',
            'config' => [
                'type' => 'input',
                'size' => 15,
                'eval' => 'trim,double2',
                'placeholder' => 'e.g. 13.404954',
            ],
        ],
        'color' => [
            'label' => 'Marker Color',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['Red', 'red'],
                    ['Blue', 'blue'],
                    ['Green', 'green'],
                    ['Yellow', 'yellow'],
                    ['Purple', 'purple'],
                ],
                'default' => 'red',
            ],
        ],
    ],
];