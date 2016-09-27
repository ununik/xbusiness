<?php
require_once __DIR__ . '/../autoload.php';

$html = new HTML();
$html->setTitle('Installation | X-Business');

if (!file_exists(HOME_DIR . INSTALL_MySQL_LOCK)) {
	$html->addToContent(__DIR__ . '/Views/database.php', __DIR__ . '/Controllers/database.php');
} else {
	$html->addToContent(__DIR__ . '/Views/user.php', __DIR__ . '/Controllers/user.php');
}
$html->printContent();