<?php
defined('TYPO3_MODE') || die();


//Neues Content ELement als DropDown bereitstellen
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
   'tt_content',
   'CType',
    [
        // title
        'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.title',
        // plugin signature: extkey_identifier
        'dv_flexslider',
        // icon identifier
        'element-dvflexslider',
    ],
    'textmedia',
    'after'
);

// Configure the default backend fields for the content element
$GLOBALS['TCA']['tt_content']['types']['dv_flexslider'] = [
   'showitem' => '
   --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
  --palette--;;header,
  --div--;LLL:EXT:dv_flexslider/Resources/Private/Language/locallang_db.xlf:dv_flexslider.title,
  --palette--;--linebreak--,tx_dvflexslider_settings_relation,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
  --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,hidden,
  --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended',
 ];
$originalSliderContent = $GLOBALS['TCA']['tt_content'];
$overridesForSliderContent = [
  'ctrl' => [
    'typeicon_classes' => [
      'dv_flexslider' => 'dv_flexslider-plugin',
    ]
  ]
];
$GLOBALS['TCA']['tt_content'] = array_merge_recursive($originalSliderContent, $overridesForSliderContent);
$dvFlexsliderOptions = array(
  'tx_dvflexslider_settings_relation' => [
    'exclude' => 1,
    'label' => 'LLL:EXT:dv_flexslider/Resources/Private/Language/locallang.xlf:dv_flexslider.title',
    'config' => [
      'type' => 'inline',
      'foreign_table' => 'tx_dvflexslider_settings',
      'maxitems' => 1,
      'appearance' => [
          'collapseAll' => 0,
          'levelLinksPosition' => 'top',
          'showSynchronizationLink' => 1,
          'showPossibleLocalizationRecords' => 1,
          'showAllLocalizationLink' => 1
      ],
    ],
  ],
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content',$dvFlexsliderOptions);