<?php
  return[
	  'ctrl' => [
		'title' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang.xlf:dv_flexslider.title',
		'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
		],
		'searchFields' => 'title, dvflexslider_items_relation, animation, animationloop, randomize, pauseonhover, slideshowspeed, animationspeed, nexttext, prevtext, directionnav, controlnav',
        'iconfile' => 'EXT:dv_flexslider/Resources/Public/Icons/element_dv_flexslider.svg'
        //EOF 'ctrl'
        ],
        'interface' => [
	     'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,title, dvflexslider_items_relation, animation, animationloop, randomize, pauseonhover, slideshowspeed, animationspeed, nexttext, prevtext, directionnav, controlnav'
	    //EOF 'interface'    
        ],
       'palettes' => [
	     'palette_0' => [
            'showitem' => '
                sys_language_uid, 
                l10n_parent, 
                l10n_diffsource, 
                hidden, 
            ',
        ],
        'palette_1' => [
            'showitem' => '
                 dvflexslider_items_relation,
            ',
        ],
        'palette_2' => [
            'showitem' => '
               animation, animationloop, randomize, pauseonhover,--linebreak--, slideshowspeed, animationspeed,
            ',
        ],
        'palette_3' => [
            'showitem' => '
                directionnav,--linebreak--, nexttext,prevtext,--linebreak--, controlnav,
            ',
        ],
	     //EOF 'palettes' 
        ],
                   'types' => [
        '1' => [
            'showitem' => '
            --div--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.title,
               
                --palette--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:language;palette_0,
               
                --palette--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.content.create;palette_1,
           
            --div--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.tab.settings,
           
                --palette--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.main;palette_2,
           
                --palette--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.navigation;palette_3,
           
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'
        ],
    //EOF Types
    ],
         'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_dvflexslider_settings',
                'foreign_table_where' => 'AND tx_dvflexslider_settings.pid=###CURRENT_PID### AND tx_dvflexslider_settings.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],
        'title' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
		'animation' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.animation
',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
	                ['Fade','fade'],
	                ['Slide','slide'],
                ]

            ]
        ],
'animationloop' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.animationloop
',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
          'controlnav' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.controlnav
',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.enabled'
                    ]
                ],
                'default' => 1,
            ]

        ],

		'randomize' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.randomize
',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.enabled'
                    ]
                ],
                'default' => 1,
            ]
        ],
        'pauseonhover' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.pauseonhover
',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.enabled'
                    ]
                ],
                'default' => 1,
            ]
        ],

		  'slideshowspeed' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.slideshowspeed
',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int',
                 'default' => '2000',
            ],
           
        ],
		  'animationspeed' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.animationspeed
',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'int',
                 'default' => '500',
            ],
        ],


        'directionnav' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.directionnav',
             'onChange' => 'reload',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.enabled'
                    ]
                ],
                'default' => 0,
            ]
        ],
         'nexttext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.nexttext',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
        
            ],
             'displayCond' => 'FIELD:directionnav:REQ:true',
        ],
                 'prevtext' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.settings.prevtext',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
             
            ],
             'displayCond' => 'FIELD:directionnav:REQ:true',
        ],
		'dvflexslider_items_relation' =>[
			'exclude' => true,
			'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.create',
			'config' => [
				'type' => 'inline',
				'foreign_table' => 'tx_dvflexslider_item',
				'foreign_field' => 'tx_dvflexslider_settings',
				'maxitems' => 9999,
                'appearance' => [
                    'useSortable' => 1,
                    'collapseAll' => 1,
                    'levelLinksPosition' => 'bottom',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1,
                    'enabledControls' => [
                        'info' => TRUE,
                        'new' => TRUE,
                        'dragdrop' => TRUE,
                        'sort' => TRUE,
                        'hide' => TRUE,
                        'delete' => TRUE,
                        'localize' => TRUE,
                    ],
                ],	
			],
		],
    //EOF Columns   
    ]

  ];