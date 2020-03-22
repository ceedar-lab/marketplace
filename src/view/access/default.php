<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>Niak Market</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/logo_face.png">
	<link rel="stylesheet" href="<?= "css/" . $css ?>";
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="js/access.js" async></script>
</head>

<body>
	<div class="container">
		<header>
			<img src='images/logo_market.png' alt="logo du market">
		</header>
		<section class="mainFrame">
			<ul class="mainFrame__navBloc">
				<li><a href="<?php echo $router->url('login'); ?>">Connexion</a></li>
				<li><a href="<?php echo $router->url('register'); ?>">S'inscrire</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<?= $bodyContent ?>
		</section>
		<footer>
			<p>Copyright 2019 Niak Market ®</p>
		</footer>
	</div>
</body>

</html>