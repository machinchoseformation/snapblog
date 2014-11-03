<?php

	//index.php (contrôleur frontal)

	//autochargement de classe
	spl_autoload_register();

	//récupère la méthode à appeler depuis l'URL
	$method = $_GET['method'];

	//instancie notre contrôleur
	$controller = new MainController();

	//appelle la méthode dans le contrôleur
	call_user_func( array($controller, $method) );