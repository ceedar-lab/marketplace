<?php $router = new Core\Router; ?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Niak Market</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?= IMAGES.DS ?>logo_face.png">
	<link rel="stylesheet" href="<?= CSS.DS.'access/'.$css ?>";
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="<?= JS.DS ?>access.js" async></script>
</head>

<body>
	<div class="container">
		<header>
			<img src="<?= IMAGES.DS ?>logo_market.png" alt="logo du market">
		</header>
		<section class="b-mainSection">
			<ul class="b-mainSection__nav">
				<li><a href="<?= $router->url('access', 'login'); ?>">Connexion</a></li>
				<li><a href="<?= $router->url('access', 'register'); ?>">S'inscrire</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="<?= $router->url('main', 'home'); ?>">Contact</a></li>
			</ul>
			<?= $bodyContent ?>
		</section>
		<footer>
			<p>Copyright 2019 Niak Market ®</p>
		</footer>
	</div>
</body>

</html>