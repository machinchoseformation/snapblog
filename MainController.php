<?php

	//cette classe traite les requêtes et envoie les réponses

	class MainController {

		/*
		*	Page d'accueil
		*/
		public function home(){

			//récupére les 10 derniers posts
			$postManager = new PostManager();
			$posts = $postManager->findLatest();

			//affiche la vue
			include("pages/home.php");

		}

		/*
		*	Page détails d'un post
		*/
		public function details(){

			//récupére le post spécifié dans l'url
			$postManager = new PostManager();
			$post = $postManager->findById( $_GET['id'] );

			//affiche la vue
			include("pages/details.php");

		}

		/*
		*	Page de création d'un post (affichage et traitement)
		*/
		public function createPost(){

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