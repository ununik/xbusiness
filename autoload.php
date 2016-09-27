<?php
const HOME_DIR = __DIR__;

function __autoload($name)
{
	require_once HOME_DIR . '/Models/Classes/'.$name.'.class.php';
}

require_once HOME_DIR . '/Configuration/defaultConstants.php';

require_once HOME_DIR . '/Models/Library/forms.php';