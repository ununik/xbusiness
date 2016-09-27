<?php
error_reporting(E_ERROR | E_PARSE); // only report fatal errors

$host = '';
$name = '';
$login = '';
$password = '';
$errors = array();
$hostErr = false;
$nameErr = false;
$loginErr = false;

if (isset($_POST) && count($_POST) > 0) {
	$host = \Library\Forms\safeText($_POST['host']);
	if (strlen($host) == 0) {
		$hostErr = true;
		$errors[] = 'Není vyplněný host.';
	}
	
	$name = \Library\Forms\safeText($_POST['name']);
	if (strlen($name) == 0) {
		$nameErr = true;
		$errors[] = 'Není vyplněné jméno.';
	}
	
	$login = \Library\Forms\safeText($_POST['login']);
	if (strlen($login) == 0) {
		$loginErr = true;
		$errors[] = 'Není vyplněný login.';
	}
	
	$password = \Library\Forms\safeText($_POST['password']);
	
	if (count($errors) == 0) {
		try {
			$connection = mysql_connect($host, $login, $password);
			if ($connection == false) {
				$errors[] = 'Špatný host, jméno nebo heslo';
			} else if (mysql_select_db($name) == false) {
				if (mysql_query('CREATE DATABASE '.$name.';', $connection) == false) {
					$errors[] = 'Databáze neexistuje a ani nejde vytvořit.';
				} else {
					//All is OK
					$constants = fopen(HOME_DIR . MYSQL_CONNECTION_CONSTANTS, "w");
					if ($constants) {
						$errors[] = 'Nelze vytvořit konfigurační soubor.';
						return;
					}
					
					$txt = "const DB_NAME = '$name'\n";
					$txt .= "const DB_HOST = '$host'\n";
					$txt .= "const DB_LOGIN = '$login'\n";
					$txt .= "const DB_PASSWORD = '$password'\n";
					fwrite($constants, $txt);
					fclose($constants);
					
					$lock = fopen(HOME_DIR . INSTALL_LOCK, "w");
					if ($lock) {
						$errors[] = 'Nelze vytvořit zámek konfigurace.';
						return;
					}
					fclose($lock);
				}
			}
		} catch (Exception $e) {
			
		}
	}
}