<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Créez un article | SnapBlog</title>
	<meta name="description" content="">
	<link href="css/style.css" type="text/css" rel="stylesheet" />
</head>

<body>

	<div class="container">
		<h1>Créez un article !</h1>
		<form method="POST" novalidate>
			<div>
				<label for="title">Titre</label>
				<input type="text" name="title" id="title" value="" />
			</div>
			<div>
				<label for="content">Contenu</label>
				<textarea name="content" id="content"></textarea>
			</div>
			<div>
				<label for="username">Votre pseudo</label>
				<input type="text" name="username" id="username" value="" />
			</div>
			<div>
				<label for="email">Votre email</label>
				<input type="email" name="email" id="email" value="" />
			</div>
			<input type="submit" value="Enregister" />
		</form>
	</div>

</body>
</html>
