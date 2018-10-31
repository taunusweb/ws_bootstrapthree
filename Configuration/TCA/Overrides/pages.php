<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'ws_bootstrapthree',
    'Configuration/PageTS/BackendLayoutConfiguration.t3s',
    'Backend Layouts'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    'ws_bootstrapthree',
    'Configuration/PageTS/BackendConfiguration.t3s',
    'Website configuration'
);

call_user_func(
    function ($extKey, $table) {
        $archiveDoktype = 116;

        // Add new page type as possible select item:
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
            $table,
            'doktype',
            [
                'LLL:EXT:' . $extKey . '/Resources/Private/Language/Backend.xlf:archive_page_type',
                $archiveDoktype,
                'EXT:' . $extKey . '/Resources/Public/Icons/Archive.svg'
            ],
            '1',
            'after'
        );

        // Add icon for new page type:
        \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
            $GLOBALS['TCA']['pages'],
            [
                'ctrl' => [
                    'typeicon_classes' => [
                        $archiveDoktype => 'apps-pagetree-archive',
                    ],
                ],
            ]
        );
    },
    'ws_bootstrapthree',
    'pages'
);
