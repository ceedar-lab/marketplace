<?php $css = 'register.css'; ?>
<?php use App\HTML\Tree; ?>
<?php $form = new App\HTML\Form; ?>

<?php $tree = new Tree('inscription'); ?>

<article class="b-articleRegister">
	<div class="b-articleRegister__title">
		<img src="<?= IMAGES.DS ?>icon_inscription.png" alt="login icon">
		<h1>Inscription au Niak Market</h1>
	</div>
	<div class="b-articleRegister__content">
		<p>Vous faites le bon choix en vous inscrivant au Niak Market ! Après avoir choisi votre nom d'utilisateur et votre mot de passe, vous serez prêt à faire des affaires sur notre marketplace.</p>
		<form method="post" action="index.php?action=register" id="registerForm">
			<?php $form->text('login', null, 'login', 'Nom d\'utilisateur'); ?>
			<div id="loginNotice" class="form__frame_content -error"></div>
			<?php $form->text('mail', null, 'mail', 'Adresse mail'); ?>
			<div id="mailNotice" class="form__frame_content -error"></div>
			<?php $form->text('password', null, 'password', 'Mot de passe', 'password'); ?>
            <div id="passwordValue">
                <div id="xx-low"></div>
                <div id="x-low"></div>
                <div id="low"></div>
                <div id="high"></div>
                <div id="x-high"></div>
                <div id="xx-high"></div>
            </div>
			<div id="passwordNotice" class="form__frame_content -error"></div>
			<?php $form->text('passwordConfirmation', null, 'passwordConfirmation', 'Confirmez votre mot de passe...', 'password'); ?>
            <div id="passwordConfirmationNotice" class="form__frame_content -error"></div>
			<div class="g-recaptcha" data-sitekey="6Ld2bc4UAAAAACJEQvQXZODMRvhBrT6RV3ulUv_1"></div>
			<?php $form->submit('S\'inscrire'); ?>
		</form>
	</div>
</article>