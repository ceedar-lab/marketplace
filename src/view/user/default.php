<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Niak Market</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/logo_face.png">
    <link rel="stylesheet" href="<?= "css/" . $css ?>">
</head>

<body>
    <div class="container">
        <header>
            <img src="images/logo_market.png" alt="logo du market">
            <div>
                <img src="images/icon_profil.png" alt="photo de l'utilisateur">
                <ul>
                    <li>Connecté en tant que </li>
                    <li>Balance</li>
                    <li>Déconnexion</li>
                </ul>
            </div>
        </header>
        <section class="mainFrame">
            <ul class="mainFrame__navBloc">
                <li><a href="accueil.php">Accueil</a></li>
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