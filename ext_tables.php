<?php
defined('TYPO3_MODE') || die();

(static function() {
	
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('
			tx_dvflexslider_settings, 
			tx_dvflexslider_item, 
');
$GLOBALS['TBE_STYLES']['skins']['dv_owlscroller'] = array();
$GLOBALS['TBE_STYLES']['skins']['dv_owlscroller']['name'] = 'Dvflexslider Extension';
$GLOBALS['TBE_STYLES']['skins']['dv_owlscroller']['stylesheetDirectories'] = array(
    'css' => 'EXT:dv_flexslider/Resources/Public/Css/Backend/',
);

	
	
})();
