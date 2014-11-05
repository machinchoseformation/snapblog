<?php

	namespace Model;

	class PostValidator extends Validator {

		public function isValid(Entity $post){

			$this->validateEmail( $post->getEmail(), "email" );
			$this->validateAlphaNum( $post->getUsername(), "username" );
			$this->validateMinLength( $post->getUsername(), "username", 4 );
			$this->validateMaxLength( $post->getUsername(), "username", 30 );
			//etc.

			if ($this->hasError()){
				return false;
			}
			return true;
		}


	}