<?php
class HTML
{
	private $_pageTitle = '';
	private $_content = '';
	
	public function setTitle($new)
	{
		$this->_pageTitle = $new;
	}
	
	private function createContent()
	{
		$container = "<!DOCTYPE html>
					<html>
					<head>
					<meta charset='UTF-8'>
					<meta name='robots' content='noindex,nofollow'>
					<meta name='googlebot' content='nosnippet,noarchive'>
					<meta name='viewport' content='width=device-width,initial-scale=1'>
					<meta http-equiv='Content-language' content='cs'>
					<meta name='author' content='Martin Přibyl'>
					<title>{$this->_pageTitle}</title>
					</head>
					<body>
					{$this->_content}
					</body>
					<html>";
		
		return $container;
	}
	
	public function printContent()
	{
		print $this->createContent();
	}
	
	public function addToContent($view, $controller = '')
	{
		if ($controller != '' && file_exists($controller)) {
			include($controller);
		}
		if ($view != '' && file_exists($view)) {
			$this->_content .= include($view);
		}
	}
}