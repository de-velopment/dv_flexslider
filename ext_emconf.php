<?php

$EM_CONF[$_EXTKEY] = [
    'title' => '[Development] Flexslider',
    'description' => 'Add a new Content Element Type Flexslider',
    'category' => 'plugin',
    'author' => 'D.Eckert',
    'author_email' => 'google@de-velopment.de',
    'state' => 'stable',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
