<?php
namespace Library\Forms;

function safeText($text)
{
	return htmlspecialchars(addslashes($text));	
}