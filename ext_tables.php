<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    'ws_bootstrapthree',
    'Configuration/TypoScript',
    'WsBootstrap Settings'
);

call_user_func(
    function ($extKey) {
        $archiveDoktype = 116;

        // Add new page type:
        $GLOBALS['PAGES_TYPES'][$archiveDoktype] = [
            'type' => 'web',
            'allowedTables' => '*',
        ];

        // Provide icon for page tree, list view, ... :
        \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class)
            ->registerIcon(
                'apps-pagetree-archive',
                TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
                [
                    'source' => 'EXT:' . $extKey . '/Resources/Public/Icons/Archive.svg',
                ]
            );

        // Allow backend users to drag and drop the new page type:
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
            'options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $archiveDoktype . ')'
        );
    },
    'ws_bootstrapthree'
);


