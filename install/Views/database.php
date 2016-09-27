<?php
$return = '<h1>Instalace MySQL připojení</h1>';

if (count($errors) > 0) {
	$return .= '<ul>';
	foreach ($errors as $error) {
		$return .= "<li>$error</li>";
	}
	$return .= '</ul>';
}

$return .= '<form action="" method="post">';

$return .= '<div class="install_database_form_div">';
$return .= '<label for="install_database_form_host">Host (např. localhost)</label>';
$return .= '<input type="text" id="install_database_form_host" value="' . $host . '" name="host">';
$return .= '</div>';

$return .= '<div class="install_database_form_div">';
$return .= '<label for="install_database_form_name">Jméno databáze (např. xbusiness)</label>';
$return .= '<input type="text" id="install_database_form_name" value="' . $name . '" name="name">';
$return .= '</div>';

$return .= '<div class="install_database_form_div">';
$return .= '<label for="install_database_form_login">Login (např. root)</label>';
$return .= '<input type="text" id="install_database_form_login" value="' . $login . '" name="login">';
$return .= '</div>';

$return .= '<div class="install_database_form_div">';
$return .= '<label for="install_database_form_password">Heslo</label>';
$return .= '<input type="password" id="install_database_form_password" value="' . $password . '" name="password">';
$return .= '</div>';

$return .= '<div class="install_database_form_div">';
$return .= '<input type="submit" id="install_database_form_submit" value="pokračovat">';
$return .= '</div>';

$return .= '</form>';

return $return;	