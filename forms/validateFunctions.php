<?php

function requiredField($value) {
	if(trim($value) == '') {
		return false;
	} else return true;
}

function emailValidation($value) {
	if(filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
		return false;
	}else return true;
}

function stringValidation($value) {
	$text = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/";
	if(!is_string($value) || !preg_match($text, $value)) {
		return false;
	}else return true;
}

function passwordValidation($confirm_pwd, $pwd) {
	if($confirm_pwd != $pwd) {
		return false;
	}else return true;
}

function validPwdLen($str, $min, $max) {
	$len = strlen($str);
	if($len < $min) {
		return "La contraseña ha de ser como mínimo de " .$min. " caracteres";
	}
	elseif($len > $max) {
		return "La contraseña ha de ser como máximo de " .$max. " caracteres";
	}	
}

function maxLength($str, $min, $max) {
	$len = strlen($str);
	if($len < $min) {
		return " ha de ser como mínimo de " .$min. " caracteres";
	}
	elseif($len > $max) {
		return " ha de ser como máximo de " .$max. " caracteres";
	}	
}

?>