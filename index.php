<?php

	//index.php

	require("Post.php");

	$unPost = new Post();

	$unPost->setId(12);
	$unPost->setTitle("yooo");
	$unPost->setContent("Un contenu !");
	$unPost->setUsername("uusernnname");
	$unPost->setEmail("yo@yo.com");
	$unPost->setPublished(true);
	$unPost->setDateModified(date("Y-m-d H:i:s"));
	$unPost->setDateCreated(date("Y-m-d H:i:s"));

	print_r($unPost);