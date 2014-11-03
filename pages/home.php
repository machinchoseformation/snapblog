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
			<h3>
			<a href="index.php?method=details&id=<?php echo $post->getId(); ?>" title="<?php echo $post->getTitle(); ?>">
			<?php echo $post->getTitle(); ?>
			</a>
			</h3>
		</div>
		<?php } //ferme la boucle ?>
		<a href="index.php?method=createPost" title="Créez un article !">Créez un article !</a>
	</div>

</body>
</html>
