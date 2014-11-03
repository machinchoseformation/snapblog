<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>SnapBlog</title>
	<meta name="description" content="">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>

	<div class="container">
		<h1>SnapBlog !</h1>
		<?php foreach($posts as $post){ ?>
		<div>
			<h3><?php echo $post->getTitle(); ?></h3>
		</div>
		<?php } //ferme la boucle ?>
	</div>

</body>
</html>
