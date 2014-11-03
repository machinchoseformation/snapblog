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
		<div>
			<h3>
				<?php echo $post->getTitle(); ?>
			</h3>
			<p><?php echo DateTool::mysqlDateToFr( $post->getDateCreated() ); ?></p>

			<div>
				<?php echo $post->getContent(); ?>
			</div>
		</div>
	</div>

</body>
</html>
