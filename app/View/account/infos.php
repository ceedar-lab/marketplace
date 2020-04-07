<?php $css = 'infos.css'; ?>
<?php $view = 'infos'; ?>
<?php $form = new App\HTML\Form; ?>

<section class="mainContent__eastSide">
    <article class="infos__frame">			
        <div class="infos__frame_title">
            <img src="<?= IMAGES.DS ?>icon_infos.png" alt='icone'>
            <h1>Mes informations personnelles</h1>				
        </div>
        <div class="infos__frame_content">
            <p>Vous pouvez modifier ici vos informations personnelles telles que votre nom, prénom, ainsi que votre adresse et numéro de téléphone si vous le voulez. Ces données ne sont pas visibles par les autres utilisateurs excepté par le vendeur si vous êtes amené à acheter un article.</p>
            <h2>Mes coordonnées</h2>
            <form method="post" action="src/controller/access.php">
                <?php $form->text('last_name', 'Nom :', null, null); ?>
                <?php $form->text('first_name', 'Prénom :', null, null); ?>
                <?php $form->text('address', 'Adresse :', null, null); ?>
                <?php $form->text('postcode', 'Code postal :', null, null); ?>
                <?php $form->text('city', 'Ville :', null, null); ?>
                <?php $form->select('country', 'Pays :', null, ['Allemagne', 'Angleterre', 'Belgique', 'Espagne', 'France', 'Italie', 'Luxembourg', 'Pays-Bas']); ?>
                <?php $form->text('phone', 'Numéro de téléphone :', null, null); ?>
                <?php $form->submit('Modifier'); ?>
            </form>
        </div>
    </article>
</section>