<?php

	class MainController {

		public function home(){

			//récupérer les 10 derniers posts
			$postManager = new PostManager();
			$posts = $postManager->findLatest();

			//affiche la vue
			include("pages/home.php");

		}

		public function insertPost(){

			//instancie un post
			$unPost = new Post();

			//hydratation
			$unPost->setId(12);
			$unPost->setTitle("yooo");
			$unPost->setContent("Un contenu !");
			$unPost->setUsername("uusernnname");
			$unPost->setEmail("yo@yo.com");
			$unPost->setPublished(true);
			$unPost->setDateModified(date("Y-m-d H:i:s"));
			$unPost->setDateCreated(date("Y-m-d H:i:s"));

			//crée une instance du postmanager pour sauvegarder notre post
			$postManager = new PostManager();
			$postManager->save( $unPost );

			echo "yeah";
		}		

	}