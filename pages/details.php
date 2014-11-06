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
		<div>
			<h3>
				<?php echo $post->getTitle(); ?>
			</h3>
			<p><?php echo \Tool\DateTool::mysqlDateToFr( $post->getDateCreated() ); ?></p>

			<div>
				<?php echo $post->getContent(); ?>
			</div>
		</div>

		<div class="comments">
			<h2>Commentaires</h2>
			<?php foreach($comments as $c): ?>		
			<div>
				<?php echo $c->getContent(); ?>
			</div>
			<?php endforeach; ?>


			<form method="POST" id="comment_form" novalidate>

				<input type="hidden" name="postId" value="<?php echo $post->getId(); ?>" />

				<div>
					<label for="content">Contenu</label>
					<textarea name="content" id="content"><?php echo $comment->getContent(); ?></textarea>
				</div>
				<div>
					<label for="username">Votre pseudo</label>
					<input type="text" name="username" id="username" value="<?php echo $comment->getUsername(); ?>" />
				</div>
				<div>
					<label for="email">Votre email</label>
					<input type="email" name="email" id="email" value="<?php echo $comment->getEmail(); ?>" />
				</div>
				<input type="submit" value="Envoyer !" />
			</form>

		</div>
		<a href="createPost/" title="Créez un article !">Créez un article !</a>

	</div>

</body>
</html>
