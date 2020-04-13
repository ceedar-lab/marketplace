<?php 
use App\API\CreateArticle;
use App\API\CryptoCompare;
use App\HTML\Form;
use App\HTML\RecentlyAdded;
use App\HTML\Tree;

$css = 'home.css'; 
?>

<?php $tree = new Tree('accueil'); ?>

<div class="b-content">
	<section class="b-content__leftSide -column">
		<article class="b-articleProfil">			
			<img src="<?= IMAGES.DS ?>icon_user.png" alt="photo de l'utilisateur">
			<div><h2><strong>UserName</strong></h2>				
				<div class="b-articleProfil__content">
					<ul>
						<li>Inscrit le :</li>
						<li>Niveau :</li>
						<li>Dépensé :</li>
						<li>Vendu :</li>
					</ul>
					<ul>
						<li>15 Septembre 2017</li>
						<li>Level 1</li>
						<li class="-bold -red">EUR 156.50</li>
						<li class="-bold -green">EUR 671.10</li>
					</ul>
				</div>				
			</div>
		</article>
		<article class="b-articleCategory">
			<div class="b-articleCategory__title">
				<img src="<?= IMAGES.DS ?>icon_category.png" alt='icone'>
				<h1>Nos categories</h1>				
			</div>
			<div class="b-articleCategory__content -column">
				<input class="-hidden" type="checkbox" id="check1">
				<label for="check1">Mode<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
					<ul class="optGroup">						
						<li class="optChild"><a href="#">Mode Femme</a></li>
						<li class="optChild"><a href="#">Mode Homme</a></li>
						<li class="optChild"><a href="#">Mode Enfant</a></li>
						<li class="optChild"><a href="#">Bijoux et montres</a></li>
						<li class="optChild"><a href="#">Produits de beauté, parfums</a></li>
					</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check2">
				<label for="check2">Jeux & Jouets<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
					<ul class="optGroup">
						<li class="optChild"><a href="#">Radiocommandés, robots</a></li>
						<li class="optChild"><a href="#">Figurines, statues</a></li>
						<li class="optChild"><a href="#">Armée, airsoft</a></li>
						<li class="optChild"><a href="#">Jeux de société</a></li>
						<li class="optChild"><a href="#">Jeux de café</a></li>
						<li class="optChild"><a href="#">Jeux éducatifs</a></li>
						<li class="optChild"><a href="#">Maquettes, modélisme</a></li>
					</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check3">
				<label for="check3">High-Tech<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
					<ul class="optGroup">
						<li class="optChild"><a href="#">Téléphonie, accessoires</a></li>
						<li class="optChild"><a href="#">Informatique, réseaux</a></li>
						<li class="optChild"><a href="#">Image et son</a></li>
						<li class="optChild"><a href="#">Jeux vidéos, consoles</a></li>
						<li class="optChild"><a href="#">Photo, caméscopes</a></li>
					</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check4">
				<label for="check4">Maison & Jardin<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
				<ul class="optGroup">
					<li class="optChild"><a href="#">Animalerie</a></li>
					<li class="optChild"><a href="#">Bricolage</a></li>
					<li class="optChild"><a href="#">Jardin, terrasse</a></li>
					<li class="optChild"><a href="#">Vins, gastronomie</a></li>
					<li class="optChild"><a href="#">Petit électroménager</a></li>
					<li class="optChild"><a href="#">Gros électroménager</a></li>
					<li class="optChild"><a href="#">Meubles</a></li>
					<li class="optChild"><a href="#">Décoration d'intérieur</a></li>
				</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check5">
				<label for="check5">Collections & Antiquités<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
				<ul class="optGroup">
					<li class="optChild"><a href="#">Art et antiquités</a></li>
					<li class="optChild"><a href="#">Monnaie</a></li>
					<li class="optChild"><a href="#">Cartes postales</a></li>
					<li class="optChild"><a href="#">Timbres</a></li>
				</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check6">
				<label for="check6">Auto & Moto<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
				<ul class="optGroup">
					<li class="optChild"><a href="#">Auto: pièces détachées</a></li>
					<li class="optChild"><a href="#">Moto: pièces détachées</a></li>
					<li class="optChild"><a href="#">Outils de dépannage</a></li>
					<li class="optChild"><a href="#">Huiles, lubrifiants et liquides</a></li>
					<li class="optChild"><a href="#">Optiques, feux, clignotants</a></li>
					<li class="optChild"><a href="#">Casques et accessoires</a></li>
				</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">

				<input class="-hidden" type="checkbox" id="check7">
				<label for="check7">Culture & Loisirs<img src="<?= IMAGES.DS. 'icon_arr_menu.png'; ?>"></label>
				<ul class="optGroup">
					<li class="optChild"><a href="#">Instruments de musique</a></li>
					<li class="optChild"><a href="#">Sports et vacances</a></li>
					<li class="optChild"><a href="#">Livres, bandes dessinées</a></li>
					<li class="optChild"><a href="#">DVD et articles de cinéma</a></li>
					<li class="optChild"><a href="#">Musique, CD et vinyles</a></li>
					<li class="optChild"><a href="#">Dessin, loisirs créatifs</a></li>
				</ul>
				<img class="-separator" src="<?= IMAGES.DS. 'icon_separator_horizontal.png'; ?>">
			</div>
		</article>
		<article class="b-articleOptions">
			<div class="b-articleOptions__title">
				<img src="<?= IMAGES.DS ?>icon_options.png" alt='icone'>
				<h1>Options de recherche</h1>
			</div>
		</article>
		<article class="b-articleConversion">
			<div class="b-articleConversion__title">
				<img src="<?= IMAGES.DS ?>icon_conversion.png" alt='icone'>
				<h1>Taux de change</h1>				
			</div>
			<div class="b-articleConversion__content">
				<?php
            	$init = new CryptoCompare();
            	$init->init();
				$coin = new CreateArticle('BTC');
				$coin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$coin = new CreateArticle('ETH');
				$coin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$coin = new CreateArticle('XMR');
				$coin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$coin = new CreateArticle('LTC');
				$coin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				?>
			</div>
		</article>
	</section>
	<section class="b-content__rightSide -column">
		<div class="-alert">ATTENTION AU PHISHING ! L'url niakmarket.com est la seule valable pour se connecter au site. Ne vous connectez jamais en suivant des liens envoyés par mail pour la simple et bonne raison que nous n'en envoyons pas. Activez la double authentification (2FA) pour plus de sécurité !</div>
		<article class="b-articleSearch">
			<div class="b-articleSearch__title">
				<img src="<?= IMAGES.DS ?>icon_search.png" alt='icone'>
				<h1>Recherche rapide</h1>
			</div>
		</article>
		<article class="b-articleFeatured">
			<div class="b-articleFeatured__title">
				<img src="<?= IMAGES.DS ?>icon_cardboard.png" alt='icone'>
				<h1>Ajouts récents</h1>
			</div>				
			<?php $featured = new RecentlyAdded; echo $featured->html; ?>
		</article>
		<article class="b-articleSecurity">
			<div class="b-articleSecurity__title">
				<img src="<?= IMAGES.DS ?>icon_security.png" alt='icone'>
				<h1>Sécurité</h1>
			</div>
		</article>
		<article class="b-articleNews">
			<div class="b-articleNews__title">
				<img src="<?= IMAGES.DS ?>icon_news.png" alt='icone'>
				<h1>News</h1>
			</div>
		</article>
	</section>
</div>