<?php

	//index.php

	require("Config.php");
	require("Post.php");
	require("PostManager.php");
	require("Db.php");

	echo Config::DBHOST;

	$unPost = new Post();

	$unPost->setId(12);
	$unPost->setTitle("yooo");
	$unPost->setContent("Un contenu !");
	$unPost->setUsername("uusernnname");
	$unPost->setEmail("yo@yo.com");
	$unPost->setPublished(true);
	$unPost->setDateModified(date("Y-m-d H:i:s"));
	$unPost->setDateCreated(date("Y-m-d H:i:s"));

	$postManager = new PostManager();
	$postManager->save( $unPost );