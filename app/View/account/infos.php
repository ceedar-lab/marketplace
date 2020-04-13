<?php $css = 'infos.css'; ?>
<?php $view = 'infos'; ?>
<?php $form = new App\HTML\Form; ?>

<section class="b-content__rightSide -column">
    <article class="b-articleInfos">			
        <div class="b-articleInfos__title">
            <img src="<?= IMAGES.DS ?>icon_infos.png" alt='icone'>
            <h1>Mes informations personnelles</h1>				
        </div>
        <div class="b-articleInfos__content">
            <p>Vous pouvez modifier ici vos informations personnelles telles que votre nom, prénom, ainsi que votre adresse et numéro de téléphone si vous le voulez. Ces données ne sont pas visibles par les autres utilisateurs excepté par le vendeur si vous êtes amené à acheter un article.</p>
            <form method="post" action="src/controller/access.php">
            <h2>Mes coordonnées</h2>
                <?php $form->select('gender', 'Vous êtes :', 'gender', ['', 'Un homme', 'Une femme'], false, '-w20'); ?>
                <?php $form->text('last_name', 'Nom :', 'last_name', null, null, '-w50'); ?>
                <?php $form->text('first_name', 'Prénom :', 'first_name', null, null, '-w50'); ?>
                <?php $form->text('address', 'Adresse :', 'address', null, null, '-w50'); ?>
                <?php $form->text('postcode', 'Code postal :', 'postcode', null, null, '-w20'); ?>
                <?php $form->text('city', 'Ville :', 'city', null, null, '-w50'); ?>
                <?php $form->select('country', 'Pays :', 'country', ['', 'Allemagne', 'Angleterre', 'Belgique', 'Espagne', 'France', 'Italie', 'Luxembourg', 'Pays-Bas'], false, '-w30'); ?>
                <?php $form->text('phone', 'Numéro de téléphone :', 'phone', null, null, '-w30'); ?>
                <?php $form->textarea('text', 'Vous pouvez vous présenter ici :', 'text', null, 12, 20, '-w65'); ?>
                <?php $form->submit('Modifier'); ?>
            </form>
        </div>
    </article>
</section>