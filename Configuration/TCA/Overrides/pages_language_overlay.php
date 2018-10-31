<?php
defined('TYPO3_MODE') or die();
// Also add the new doktype to the page language overlays type selector (so that translations can inherit the same type)
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
                'EXT:' . $extKey . 'Resources/Public/Icons/Archive.svg'
            ],
            '1',
            'after'
        );
    },
    'ws_bootstrapthree',
    'pages_language_overlay'
);
