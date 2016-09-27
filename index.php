<?php
require_once __DIR__ . '/autoload.php';

if (!file_exists(__DIR__ . INSTALL_LOCK)) {
	require HOME_DIR . '/install/index.php';
}
$html = new HTML();
$html->setTitle('X-Business');

$html->printContent();