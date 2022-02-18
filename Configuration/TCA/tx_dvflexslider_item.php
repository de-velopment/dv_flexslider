<?php
  return[
	  'ctrl' => [
		'title' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang.xlf:dv_flexslider.item',
		'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'sortby' => 'sorting',
        'thumbnail' => 'image',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
		],
		'searchFields' => 'tx_dvflexslider_settings, name, image, link, bodytext',
        'iconfile' => 'EXT:dv_flexslider/Resources/Public/Icons/element_dv_flexslider.svg'
        //EOF 'ctrl'
        ],
        'interface' => [
	     'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden,name, image, link, bodytext, textcolor, backgroundcolor, sorting, contentposition'
	    //EOF 'interface'    
        ],
       'palettes' => [
	     'item_palette' => [
            'showitem' => '
                sys_language_uid, 
                l10n_parent, 
                l10n_diffsource, 
                hidden, 
            ',
			],
       	     //EOF 'palettes' 
        ],
          'types' => [
		  	'1' => [
            'showitem' => '              
                --palette--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:language;item_palette,name, image, link, bodytext, textcolor, backgroundcolor, contentposition,
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
                'foreign_table' => 'tx_dvflexslider_item',
                'foreign_table_where' => 'AND tx_dvflexslider_item.pid=###CURRENT_PID### AND tx_dvflexslider_item.sys_language_uid IN (-1,0)',
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
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'image' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:foundation_slider_content.slide_image',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'tx_dvflexslider_item',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                        ],
                    ],
                    'maxitems' => 1
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'link' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.link',
        'description' => 'renderType=inputLink',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
        ],
    ],
   		 'bodytext' => [
   		 'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.bodytext',
   		 'config' => [
   		 'type' => 'text',
   		 	'enableRichtext' => true,
   		 	],
   		 	],
   		 	'textcolor' => [
    'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.textcolor',
    'config' => [
        'type' => 'input',
        'renderType' => 'colorpicker',
        'size' => 10,
        'default' => '#ffffff',
    ],
],
'backgroundcolor' => [
    'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.backgroundcolor',
    'config' => [
        'type' => 'input',
        'renderType' => 'colorpicker',
        'size' => 10,
         'default' => '#161925',
    ],
   
],
'contentposition' => [
            'exclude' => true,
            'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.contentposition
',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
	                ['LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.contentposition.left','left'],
	                ['LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.item.contentposition.right','right'],
                ]

            ]
        ],
        'tx_dvflexslider_settings' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],

		    //EOF Columns   
    ]

  ];