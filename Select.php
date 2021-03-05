<?php

namespace UppSoft\MultiLanguage;

class Select{

	public function language($lang){
		$lang = str_replace($lang, 'https://'.$_SERVER['HTTP_HOST'].'/lang/config/Set.php?lang='.$lang.'', $lang);
		return $lang;
	}
}

?>