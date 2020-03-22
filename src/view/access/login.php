<?php $css = 'access/login.css'; ?>

<div class="mainFrame__treeBloc">
	<img src="images/icon_login.png" alt="login icon">
	<img src="images/icon_separator.png" alt="seperator icon">
	<p>Connexion</p>
	<img src="images/icon_separator.png" alt="seperator icon">
	<img src="images/icon_tree.png" alt="tree icon">
</div>

<article class="form__frame">
	<div class="form__frame_title">
		<img src="images/icon_login.png" alt="login icon">
		<h1>Se connecter au Niak Market</h1>
	</div>
	<div class="form__frame_content">
		<p>Bienvenue sur le Niak Market, connectez vous pour avoir accès aux offres de nos vendeurs. Si vous n'avez pas de compte, <span><a href="<?php echo $router->url('register'); ?>">inscrivez-vous</a></span> ! L'inscription est gratuite et ouverte à tous. Si vous avez perdu votre mot de passe, vous pouvez utiliser ce formulaire pour le réinitialiser.</p>
		<form method="post" action="index.php?action=login">
			<input type="text" name="login" placeholder="Nom d'utilisateur" required>
			<input type="password" name="password" placeholder="Mot de passe" required>
			<input type="submit" value="Connexion">
		</form>
	</div>
</article>