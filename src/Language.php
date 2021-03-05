<?php

namespace UppSoft\MultiLanguage;
session_start();

class Language {
	private $lang;
	private $key;
	private $file;

	public function lang($key)
	{
		$file = explode('.', $key);
		$this->key = $file[1];
		$this->file = $file[0];

		if (isset($_SESSION['lang'])) {
			$this->lang = $_SESSION['lang'];
			$lang = require($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "lang/" . $this->lang . DIRECTORY_SEPARATOR . $this->file . ".php");
			return $lang[$this->key];
		} else {
			$this->lang = 'tr';
			$lang = equire($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "lang/" . $this->lang . DIRECTORY_SEPARATOR . $this->file . ".php");
			return $lang[$this->key];
		}
		
	}
}

?>