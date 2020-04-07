<?php $router = new Core\Router; ?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>404 - Page introuvable</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= IMAGES.DS ?>logo_face.png">
	<link rel="stylesheet" href="<?= CSS.DS.'error/404.css' ?>";
</head>

<body>
	<div class="container">
        <img src="<?= IMAGES.DS ?>logo_404.png" alt="404 error">
        <h1>erreur 404 !</h1>
        <h2>Page introuvable</h2>
        <a href="<?= $router->url('access', 'login') ?>">Retour à l'accueil</a>
	</div>
</body>

</html>