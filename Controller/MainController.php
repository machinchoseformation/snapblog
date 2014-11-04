<?php

	namespace Controller;

	use \Model\PostManager;
	use \Model\Post;

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
			
			$post = new Post();
			
			if (!empty($_POST)){

				$postManager = new PostManager();

				$post->setTitle( $_POST['title'] );
				$post->setContent( $_POST['content'] );
				$post->setUsername( $_POST['username'] );
				$post->setEmail( $_POST['email'] );

				//c'est valide ?
				$errors = $post->isValidToInsert();
				if ($errors === true){
					//alors sauvegarde
					if ( $postManager->save($post) ){
						header("Location: index.php");
					}
					//sauvegarde échouée
					else {
						die("oops");
					}
				}
			}

			include("pages/create_post.php");
		}

	}