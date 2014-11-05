<?php

	namespace Controller;

	use \Model\PostManager;
	use \Model\Post;
	use \Model\Comment;
	use \Model\CommentManager;
	use \Model\PostValidator;

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
			$commentManager = new CommentManager();
			
			$post = $postManager->findById( $_GET['id'] );

			$comment = new Comment();

			//commentaire soumis ?
			if (!empty($_POST)){
				//hydratation
				$comment->setContent( $_POST['content'] );
				$comment->setEmail( $_POST['email'] );
				$comment->setUsername( $_POST['username'] );
				$comment->setPostId( $post->getId() );

				$commentManager->save($comment);
				$comment->setContent( "" ); //pour qu'il ne s'affiche plus dans le textarea
			}

			$comments = $commentManager->findCommentsByPostId( $post->getId() );

			//affiche la vue
			include("pages/details.php");

		}

		/*
		*	Page de création d'un post (affichage et traitement)
		*/
		public function createPost(){
			
			$post = new Post();
			$postValidator = new PostValidator();
			
			if (!empty($_POST)){

				$postManager = new PostManager();

				$post->setTitle( $_POST['title'] );
				$post->setContent( $_POST['content'] );
				$post->setUsername( $_POST['username'] );
				$post->setEmail( $_POST['email'] );

				//c'est valide ?
				
				if ( $postValidator->isValid( $post ) ){
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