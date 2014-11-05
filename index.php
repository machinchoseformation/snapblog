<?php

	print_r($_GET);

	//contrôleur frontal

	//autochargement de classe
	spl_autoload_register(function($className){
		$path = str_replace("\\", "/", $className);
		require($path.".php");
	});

	//include le fichier d'autochargement des codes tiers (composer)
	include("vendor/autoload.php");

	//include le dinosaure PHPMailer
	include("vendor/phpmailer/phpmailer/PHPMailerAutoload.php");

	//récupère la méthode à appeler depuis l'URL
	$method = "home";
	if (!empty($_GET['url'])){
		$method = $_GET['url'];
	}

	//instancie notre contrôleur
	$controller = new Controller\MainController(); //au lieu du use, on peut toujours utiliser le fully qualified name

	//appelle la méthode dans le contrôleur
	call_user_func( array($controller, $method) );