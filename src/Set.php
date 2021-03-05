<?php

session_start();

$lang = htmlentities($_GET["lang"]);
$lang = strlen($lang) > 3 ? 'tr' : $_GET['lang'];

$_SESSION['lang'] = $lang;

if($lang)
{
	header("Location:".$_SERVER['HTTP_REFERER']."");
}

?>