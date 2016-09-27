<?php
require_once __DIR__ . '/../autoload.php';

$html = new HTML();
$html->setTitle('Installation | X-Business');
$html->addToContent(__DIR__ . '/Views/database.php', __DIR__ . '/Controllers/database.php');
$html->printContent();