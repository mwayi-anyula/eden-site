<?php
$EM_CONF[$_EXTKEY] = [
    'title' => 'Eden Site',
    'description' => 'Site package for Eden with custom content elements',
    'category' => 'templates',
    'author' => 'Mwayi Anyula',
    'author_email' => 'mwai3d@gmail.com',
    'author_company' => 'Mwayi Anyula',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '13.0.0-13.4.99',
            'fluid_styled_content' => '13.0.0-13.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'MwayiAnyula\\EdenSite\\' => 'Classes',
        ],
    ],
];