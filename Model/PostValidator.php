<?php

	namespace Model;

	class PostValidator extends Validator {

		public function isValid(Entity $post){

			$this->validateEmail( $post->getEmail(), "email" );
			$this->validateAlphaNum( $post->getUsername(), "username" );
			$this->validateMinLength( $post->getUsername(), "username", 4 );
			$this->validateMaxLength( $post->getUsername(), "username", 30 );
			$this->validateUniqueSlug( $post->getSlug(), "title" );
			//etc.

			if ($this->hasError()){
				return false;
			}
			return true;
		}


		public function validateUniqueSlug( $slug, $field = "" ){
			$postManager = new PostManager();
			$post = $postManager->findBySlug( $slug );
			if (!empty($post)){
				$this->addError("Existe déjà !", $field);
				return false;
			}
			return true;
		}

	}