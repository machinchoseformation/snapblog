<?php

	namespace Model;

	abstract class Validator {

		protected $errors = array();


		abstract public function isValid(Entity $entity);		

	    public function getErrors(){
	        return $this->errors;
	    }

	    public function addError($error, $field){
	    	$this->errors[$field][] = $error;
	    }

	    public function hasError(){
	    	if (empty($this->errors)){
	    		return false;
	    	}
	    	return true;
	    }

	    public function validateAlphaNum($string, $field = ""){
	    	$regexp = "#^[a-zA-Z0-9]*$#";
	    	if (!preg_match($regexp, $string)){
	    		$this->addError("Chaîne invalide (seulement des lettres et des chiffres SVP) !", $field);
	    		return false;
	    	}
	    	return true;
	    }

	    public function validateEmail($string, $field = ""){
	    	if (!filter_var($string, FILTER_VALIDATE_EMAIL)){
	    		$this->addError("Email invalide !", $field);
	    		return false;
	    	}
	    	return true;
	    }

	    public function validateMinLength($string, $field = "", $minLength = 2){
	    	if (strlen($string) < $minLength){
	    		$this->addError("Chaîne trop courte !", $field);
	    		return false;
	    	}
	    	return true;
	    }

	    public function validateMaxLength($string, $field = "", $maxLength = 255){
	    	if (strlen($string) > $maxLength){
	    		$this->addError("Chaîne trop longue !", $field);
	    		return false;
	    	}
	    	return true;
	    }

	}