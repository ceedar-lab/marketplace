<?php $css = 'login.css'; ?>
<?php $router = new Core\Router; ?>
<?php $form = new App\HTML\Form; ?>
<?php use App\HTML\Tree; ?>

<?php $tree = new Tree('connexion'); ?>

<article class="form__frame">
	<div class="form__frame_title">
		<img src="<?= IMAGES.DS ?>icon_connexion.png" alt="login icon">
		<h1>Se connecter au Niak Market</h1>
	</div>
	<div class="form__frame_content">
		<p>Bienvenue sur le Niak Market, connectez vous pour avoir accès aux offres de nos vendeurs. Si vous n'avez pas de compte, <span><a href="<?= $router->url('access', 'register'); ?>">inscrivez-vous</a></span> ! L'inscription est gratuite et ouverte à tous. Si vous avez perdu votre mot de passe, vous pouvez utiliser ce formulaire pour le réinitialiser.</p>
		<form method="post" action="src/controller/access.php">
			<?php $form->text('login', null, null, 'Nom d\'utilisateur'); ?>
			<?php $form->text('password', null, null, 'Mot de passe', 'password'); ?>
			<?php $form->submit('Connexion'); ?>
		</form>
	</div>
</article>