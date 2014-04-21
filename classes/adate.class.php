<?php
class aDate{
	

	/*
	** Multibyte function makes first letter uppercase
	*/
	public function ucfirst_utf8($str) {
    	if (mb_check_encoding($str,'UTF-8')) {
        	$first = mb_substr(
				mb_strtoupper($str, "utf-8"),0,1,'utf-8'
        	);
        	return $first.mb_substr(mb_strtolower($str,"utf-8"),1,mb_strlen($str),'utf-8');
    	} else {
       		return $str;
    	}
	}


	public function getTemplate($tpl){
    	global $modx;
    	$template = "";
    	if ($modx->getChunk($tpl) != "") {
      		$template = $modx->getChunk($tpl);
    	} else if(substr($tpl, 0, 6) == "@CODE:") {
      		$template = substr($tpl, 6);
    	} else {
      		$template = FALSE;
    	}
    	return $template;
  	}

}