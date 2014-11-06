<?php

	namespace Controller;

	use \Model\PostManager;
	use \Model\Post;
	use \Model\Comment;
	use \Model\CommentManager;
	use \Model\PostValidator;
	use \Tool\CoolCookieTool as CookieTool; //vrai alias

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
			
			$post = $postManager->findBySlug( $_GET['slug'] );

			$comment = new Comment();

			if (CookieTool::cookieExists("userData")){
				$userData = CookieTool::getCookie("userData");
				$comment->setUsername( $userData['username'] );
				$comment->setEmail( $userData['email'] );
			}

			//commentaire soumis ?
			if (!empty($_POST)){
				//hydratation
				$comment->setContent( $_POST['content'] );
				$comment->setEmail( $_POST['email'] );
				$comment->setUsername( $_POST['username'] );
				$comment->setPostId( $post->getId() );

				$commentManager->save($comment);

				//crée un cookie pour sauvegarder les infos du user
				CookieTool::createCookie("userData", array("username" => $comment->getUsername(), "email" => $comment->getEmail()));

				//envoie un mail de remerciement
				$mailer = new Mailer();
				$mailer->sendThankYou($comment->getUsername(), $comment->getEmail(), "comment");

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
			
			if (CookieTool::cookieExists("userData")){
				$userData = CookieTool::getCookie("userData");
				$post->setUsername( $userData['username'] );
				$post->setEmail( $userData['email'] );
			}

			if (!empty($_POST)){

				$postManager = new PostManager();
				$post->setTitle( $_POST['title'] );
				$post->setSlugFromTitle();
				$post->setContent( $_POST['content'] );
				$post->setUsername( $_POST['username'] );
				$post->setEmail( $_POST['email'] );

				//c'est valide ?
				
				if ( $postValidator->isValid( $post ) ){
					//alors sauvegarde
					if ( $postManager->save($post) ){

						//crée un cookie pour sauvegarder les infos du user
						CookieTool::createCookie("userData", array("username" => $post->getUsername(), "email" => $post->getEmail()));

						//envoie un mail de remerciement
						$mailer = new Mailer();
						$mailer->sendThankYou($post->getUsername(), $post->getEmail(), "post");

						header("Location: " . \Config::ROOT_URL);
					}
					//sauvegarde échouée
					else {
						die("oops");
					}
				}
			}

			include("pages/create_post.php");
		}


		public function fourofour(){
			header("HTTP/1.0 404 Not Found");
			include("pages/fourofour.php");
		}


	}