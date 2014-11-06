<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>SnapBlog</title>
	<base href="<?php echo Config::ROOT_URL ?>" />

	<meta name="description" content="">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>

	<div class="container">
		<h1>SnapBlog !</h1>

		<?php
			if (empty($posts)){
				echo 'Aucun article !';
			}
		?>

		<?php foreach($posts as $post){ ?>
		<div>
			<h3>
			<a href="details/<?php echo $post->getSlug(); ?>/" title="<?php echo $post->getTitle(); ?>">
			<?php echo $post->getTitle(); ?>
			</a>
			</h3>
			Temps restant : <?php echo \Tool\DateTool::timeRemaining( $post->getDateCreated() ); ?>
		</div>
		<?php } //ferme la boucle ?>
		<a href="createPost/" title="Créez un article !">Créez un article !</a>
	</div>

</body>
</html>
