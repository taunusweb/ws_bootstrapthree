<?php
defined('TYPO3_MODE') or die();


if (TYPO3_MODE === 'BE') {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:ws_bootstrapthree/Configuration/UserTS/UserTSconfigFile.t3s">'
    );
}

// Individuelle RTE-Konfiguration registrieren in der ext_localconf.php
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['ws_standard'] = 'EXT:ws_bootstrapthree/Configuration/RTE/WsStandard.yaml';
