<?php 
use App\HTML\ExchangeRatesArticle;
$css = 'user/home.css'; 
?>

<div class="mainFrame__treeBloc">
	<img src="images/icon_home.png" alt="login icon">
	<img src="images/icon_separator.png" alt="/">
	<p>Accueil</p>
	<img src="images/icon_separator.png" alt="/">
	<img src="images/icon_tree.png" alt="tree icon">
</div>

<div class="mainContent">
	<section class="mainContent__westSide">
		<article class="profil__frame">			
			<img src="images/icon_profil.png" alt="photo de l'utilisateur">
			<div><h2>UserName</h2>				
				<div class="profil__frame_content">
					<ul>
						<li>Inscrit le :</li>
						<li>Niveau :</li>
						<li>Dépensé :</li>
						<li>Vendu :</li>
					</ul>
					<ul>
						<li>15 Septembre 2017</li>
						<li>Level 1</li>
						<li>EUR 156.50</li>
						<li>EUR 671.10</li>
					</ul>
				</div>				
			</div>
		</article>
		<article class="category__frame">
			<div class="category__frame_title">
				<img src="images/icon_category.png" alt='icone'>
				<h1>Nos categories</h1>
			</div>
		</article>
		<article class="options__frame">
			<div class="options__frame_title">
				<img src="images/icon_options.png" alt='icone'>
				<h1>Options de recherche</h1>
			</div>
		</article>
		<article class="conversion__frame">
			<div class="conversion__frame_title">
				<img src="images/icon_conversion.png" alt='icone'>
				<h1>Taux de change</h1>				
			</div>
			<div class="conversion__frame_content">
				<?php
            	$init = new App\CoinConversion('BTC');
            	$init->init();
				$bitcoin = new ExchangeRatesArticle('BTC');
				$bitcoin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$bitcoin = new ExchangeRatesArticle('ETH');
				$bitcoin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$bitcoin = new ExchangeRatesArticle('XMR');
				$bitcoin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				$bitcoin = new ExchangeRatesArticle('LTC');
				$bitcoin->create('EUR', 'USD', 'JPY', 'GBP', 'CAD', 'CHF');
				?>
			</div>
		</article>
	</section>
	<section class="mainContent__eastSide">
		<div class="-alert">ATTENTION AU PHISHING ! L'url niakmarket.com est la seule valable pour se connecter au site. Ne vous connectez jamais en suivant des liens envoyés par mail pour la simple et bonne raison que nous n'en envoyons pas. Activez la double authentification (2FA) pour plus de sécurité !</div>
		<article class="search__frame">
			<div class="search__frame_title">
				<img src="images/icon_search.png" alt='icone'>
				<h1>Recherche rapide</h1>
			</div>
		</article>
		<article class="cardboard__frame">
			<div class="cardboard__frame_title">
				<img src="images/icon_cardboard.png" alt='icone'>
				<h1>Ajouts récents</h1>
			</div>
		</article>
		<article class="security__frame">
			<div class="security__frame_title">
				<img src="images/icon_security.png" alt='icone'>
				<h1>Sécurité</h1>
			</div>
		</article>
		<article class="news__frame">
			<div class="news__frame_title">
				<img src="images/icon_news.png" alt='icone'>
				<h1>News</h1>
			</div>
		</article>
	</section>
</div>