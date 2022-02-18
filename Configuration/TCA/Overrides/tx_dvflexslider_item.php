<?php
$GLOBALS['TCA']['tx_dvflexslider_item']['columns']['image']['config']['overrideChildTca']['columns']['crop'] = [
	'config' => [
		'cropVariants' => [

	'default' => [
		'disabled' => true
	],
		'desktop' => [
		'disabled' => true
	],
		'mobile' => [
		'disabled' => true
	],
    'slider' => [
        'title' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.crop.desktop',
        'allowedAspectRatios' => [
            '4:2' => [
                'title' => '4 : 2',
                'value' => 4/2
            ],
        ]
    ],
        'slidermobile' => [
        'title' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.crop.mobile',
        'allowedAspectRatios' => [
            '4:3' => [
                'title' => '4 : 3',
                'value' => 4/3
            ],
        ]
    ]
    
],
		],
	];
