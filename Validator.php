<?php

	class Validator {

		protected $errors = array();

	    public function getErrors(){
	        return $this->errors;
	    }

	    public function addError($error, $field){
	    	$this->errors[$field][] = $error;
	    }

	    public function isValid(){
	    	if (empty($this->errors)){
	    		return true;
	    	}
	    	return false;
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