<?php $css = 'access/register.css'; ?>

<div class="mainFrame__treeBloc">
	<img src="images/icon_register.png" alt="login icon">
	<img src="images/icon_separator.png" alt="/">
	<p>Inscription</p>
	<img src="images/icon_separator.png" alt="/">
	<img src="images/icon_tree.png" alt="tree icon">
</div>

<div class="form__frame">
	<div class="form__frame_title">
		<img src="images/icon_register.png" alt="login icon">
		<h1>Inscription au Niak Market</h1>
	</div>
	<div class="form__frame_content">
		<p>Vous faites le bon choix en vous inscrivant au Niak Market ! Après avoir choisi votre nom d'utilisateur et votre mot de passe, vous serez prêt à faire des affaires sur notre marketplace.</p>
		<form method="post" action="index.php?action=register" id="registerForm">
			<input type="text" name="login" id="login" placeholder="Nom d'utilisateur">
            <!-- <div id="loginNotice" class="form__frame_content -login"></div> -->
			<input type="text" name="mail" id="mail" placeholder="Adresse mail">
            <!-- <div id="mailNotice" class="form__frame_content -mail"></div> -->
			<input type="password" name="password" id="password" placeholder="Mot de passe">
            <div id="passwordValue">
                <div id="xx-low"></div>
                <div id="x-low"></div>
                <div id="low"></div>
                <div id="high"></div>
                <div id="x-high"></div>
                <div id="xx-high"></div>
            </div>
            <!-- <div id="passwordNotice" class="form__frame_content -password"></div> -->
			<input type="password" name="passwordConfirmation" id="passwordConfirmation" placeholder="Confirmez votre mot de passe...">
            <!-- <div id="passwordConfirmationNotice" class="form__frame_content -passwordConfirmation"></div> -->
            <div class="g-recaptcha" data-sitekey="6Ld2bc4UAAAAACJEQvQXZODMRvhBrT6RV3ulUv_1"></div>
			<input type="submit" value="S'inscrire">
		</form>
	</div>
</div>