<?php

namespace DvFlexslider\DvFlexslider\Hooks\PageLayoutView;

use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Fluid\View\StandaloneView;


class FlexsliderPreviewRender implements PageLayoutViewDrawItemHookInterface
{
	public function preProcess(
		PageLayoutView &$parentObject,
		&$drawItem,
		&$headerContent,
		&$itemContent,
		array &$row
	)
	{
		
		if ($row['CType'] === 'dv_flexslider')
		{
			
			
			$objectManager = GeneralUtility::makeInstance(ObjectManager::class);
			$standaloneView = $objectManager->get(StandaloneView::class);
			$standaloneView->setTemplateRootPaths([10, 'EXT:dv_flexslider/Resources/Private/Backend/Templates/']);
			$standaloneView->setLayoutRootPaths([10,'EXT:dv_flexslider/Resources/Private/Backend/Layouts/']);
			$standaloneView->setPartialRootPaths([10,'EXT:dv_flexslider/Resources/Private/Backend/Partials/']);
			$standaloneView->setFormat('html');
			$standaloneView->setTemplate('PageLayoutView.html');
			
			$queryBuilderSettings = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_dvflexslider_settings');
			$settings = $queryBuilderSettings
				->select('*')
				->from('tx_dvflexslider_settings')
				->where(
					$queryBuilderSettings->expr()->eq('uid', $queryBuilderSettings->createNamedParameter($row['tx_dvflexslider_settings_relation'],\PDO::PARAM_INT)),
					$queryBuilderSettings->expr()->eq('hidden', $queryBuilderSettings->createNamedParameter(0, \PDO::PARAM_INT)),
					$queryBuilderSettings->expr()->eq('deleted', $queryBuilderSettings->createNamedParameter(0, \PDO::PARAM_INT))
				)
				->execute()
				->fetch(0);
				
		   $queryBuilderItem = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_dvflexslider_item');
			$content = $queryBuilderItem
				->select('*')
				->from('tx_dvflexslider_item')
				->where(
					$queryBuilderItem->expr()->eq('tx_dvflexslider_settings', $queryBuilderItem->createNamedParameter($settings['uid'],\PDO::PARAM_INT)),
					$queryBuilderItem->expr()->eq('hidden', $queryBuilderItem->createNamedParameter(0, \PDO::PARAM_INT)),
					$queryBuilderItem->expr()->eq('deleted', $queryBuilderItem->createNamedParameter(0, \PDO::PARAM_INT))
				)
				->execute()
				->fetchAll();
			
			$fileObjects = array();
			for ($i=0; $i < count($content); $i++) {
				$fileRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\FileRepository::class);
				$fileObjects[] = $fileRepository->findByRelation('tx_dvflexslider_item', 'image', $content[$i]['uid']);
			}
			
			
				$countItems = count($content);
				if($countItems > 0){
				$drawItem = false;
					
				$standaloneView->assignMultiple([
				'items' => $countItems,
				'title' => $parentObject->CType_labels[$row['CType']],
				'type' => $row['CType'],
				'headerSettings' => $settings,
				'headerContent' => $content,
				'sliderImages' => $fileObjects
			]);

			$itemContent .= $standaloneView->render();
			
			}else{
				$drawItem = true;
			}
			
			
			}
		
	}
}