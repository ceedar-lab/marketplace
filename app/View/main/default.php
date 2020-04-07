<?php $router = new Core\Router; ?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Niak Market</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?= IMAGES.DS ?>logo_face.png">
    <link rel="stylesheet" href="<?= CSS.DS.'main/'.$css ?>">
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
        <ul class="exchangeRates">
            <?php
            $btc = new App\API\CreateHeader('BTC');
            $btc->showExchangeRate('EUR', 'USD', 'JPY', 'GBP');
            ?>
        </ul>
        <section class="mainFrame">            
            <ul class="mainFrame__navBloc">
                <li><a href="<?= $router->url('main', 'home'); ?>">Accueil</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Achats</a></li>
                <li><a href="#">Devenir vendeur</a></li>
                <li><a href="#">Depots</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="#">Support</a></li>
            </ul>
            <?= $bodyContent ?>
        </section>
    </div>
</body>

</html>