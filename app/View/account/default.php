<?php 
$router = new Core\Router;
use App\API\CryptoCompare;
use App\HTML\Tree;
use App\HTML\AccountMenu;

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Niak Market</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGES.DS ?>logo_face.png">
    <link rel="stylesheet" href="<?= CSS.DS.'account/'.$css ?>">
</head>

<body>
    <div class="container">
        <header class="header">
            <img src="<?= IMAGES.DS ?>logo_market.png" alt="logo du market">
            <div class="header__profil">
                <img src="<?= IMAGES.DS ?>icon_user.png" alt="photo de l'utilisateur">
                <ul>
                    <li>Connecté en tant que <strong><a href="<?= $router->url('account', 'infos') ?>">UserName</a></strong></li>
                    <li>Balance</li>
                    <li><a href="<?= $router->url('access', 'login') ?>">Déconnexion</a></li>
                </ul>
            </div>
        </header>
        <ul class="api__header">
            <?php
            $init = new CryptoCompare();
            $init->init();
            $btc = new App\API\CreateHeader('BTC');
            $btc->showExchangeRate('EUR', 'USD', 'JPY', 'GBP');
            ?>
        </ul>
        <section class="b-mainSection">            
            <ul class="b-mainSection__nav">
                <li><a href="<?= $router->url('main', 'home'); ?>">Accueil</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Achats</a></li>
                <li><a href="#">Devenir vendeur</a></li>
                <li><a href="#">Depots</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Support</a></li>
            </ul>           

            <?php $tree = new Tree('profil', $view); ?>

            <div class="b-content">
                <section class="b-content__leftSide -column">
                    <article class="b-articleProfil">			
                        <div class="b-articleProfil__title">
                            <img src="<?= IMAGES.DS ?>icon_profil.png" alt='icone'>
                            <h1>Menu utilisateur</h1>				
                        </div>
                        <div class="b-articleProfil__content">
                            <ul>
                                <?php new AccountMenu('infos', 'Infos personnelles'); ?>
                                <?php /* new AccountMenu('orders', 'Mes commandes'); */ ?>
                                <?php /* new AccountMenu('messages', 'Messages privés'); */ ?>
                                <?php /* new AccountMenu('wishes', 'Ma liste d\'envies'); */ ?>
                                <?php /* new AccountMenu('favorites', 'Vendeurs favoris'); */ ?>
                                <?php /* new AccountMenu('feedbacks', 'Feedbacks'); */ ?>
                                <?php /* new AccountMenu('blocked', 'Liste noire'); */ ?>
                            </ul>
                        </div>
                    </article>
                </section>                
                <?= $bodyContent; ?>
            </div>
        </section>
    </div>
</body>

</html>