-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 avr. 2020 à 10:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `niakmarket`
--

-- --------------------------------------------------------

--
-- Structure de la table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rate` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `reviewer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_id_idx` (`seller_id`),
  KEY `reviewer_id_idx` (`reviewer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(45) NOT NULL,
  `category_sub` varchar(45) NOT NULL,
  `price_tax_free` float NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'ON SALE',
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_items_users_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `category`, `category_sub`, `price_tax_free`, `stock`, `status`, `user_id`) VALUES
(1, 'Table basse blanche et grise foncée', 'Couleur(s) : Blanc et gris\r\nFinition : Mat\r\nFinition & Décor : Mélaminé\r\nMatière de la structure : Panneaux de particules\r\nNombre et type de rangements : 3 niches de rangement\r\nPlateau en mélaminé, 3 niches de rangement gris foncé, pied en bois d\'eucalyptus', 'Maison & Jardin', 'Meubles', 66.58, 2, 'ON SALE', 47),
(2, 'MAKITA perceuse visseuse 18V Li-Ion', 'Technologie XPT limitant les infiltrations d\'eau et poussières\r\nCrochet ceinture positionnable gauche et droite\r\nRéglage précis du couple de vissage en 21 positions + position perçage\r\nL\'éclairage LED incorporé permet une bonne visibilité de la base de travail\r\n2 vitesses à engrenages métalliques : fiabilité et efficacité lors du perçage et du vissage\r\nMoteur sans charbon : usure plus lente, consommation réduite, autonomie et puissance de la machine accrues', 'Maison & Jardin', 'Outillage', 78.33, 1, 'ON SALE', 24),
(3, 'Banjo Chitarra vintage', 'Banjo Chitarra à 6 cordes de marque Melody. Année 60. Il manque une corde. ', 'Culture & Loisirs', 'Instruments de musique', 108.33, 1, 'ON SALE', 44),
(4, 'Robe Courte Camaieu Taille 36 - T1 - S Noir', 'Etiquette du produit : FR 36 Longueur : 79 / Manches : 0 / Poitrine : 37 / Matière : 100% Polyamide', 'Mode', 'Mode Femme', 11.67, 10, 'ON SALE', 35),
(5, 'Samsung Galaxy S7 SM-G930 - 32 Go - Noir', 'Écran 5,1’’ Super AMOLED Quad HD - Android™ Marshmallow 6.0 - Processeur Octo Core 2,3 GHz - 4G+ - Stockage: 32Go extensible jusqu\'à 200Go via MicroSD - RAM: 4Go - Appareil photo 12MP/5MP - Batterie 3000 mAh', 'High-Tech', 'Téléphonie, accessoires', 199.17, 1, 'ON SALE', 31),
(6, 'PHILIPS - Machine à café à dosettes Senseo', '1450W - Capacité: 0.7L - Pression: 1 bar - 2 tasses en même temps - Technologie SENSEO Booster d\'arômes - Selecteur d\'intensité - Préparation: 30s à 1min - Câble : 0.8m - Réservoir d\'eau amovible - Arrêt auto après 30min - Témoin de réservoir vide - Garantie : 2 ans', 'Maison & Jardin', 'Petit électroménager', 99.92, 6, 'ON SALE', 47),
(7, 'Jeep WRANGLER 4 Portes Voiture Télécommandée', 'New Bright - Jeep WRANGLER verte radiocommandée - Echelle 1/18 ème, environ 28 cm, toutes fonctions - Processeur 2,4 Ghz - Fonctionne avec une batterie au lithium rechargeable grâce à un câble USB + 2 piles LR6 (AA) pour la radiocommande fournis. Vitesse environ 14 km/h - Garçon et Fille - A partir de 6 ans - Livré à l\'unité', 'Jeux & Jouets', 'Radiocommandés, robots', 32, 8, 'ON SALE', 47),
(8, 'Bébe Yoda - Star Wars The Mandalorian', 'FIGURINE ARTICULÉE DE 16,5 CM : Cette grande figurine articulée « bébé Yoda » super mignonne permet aux enfants à partir de 4 ans de s\'amuser en grand avec The Child de Star Wars.\r\nAPPARENCE AUTHENTIQUE FIDÈLE À LA SÉRIE DE DISNEY PLUS : La figurine Star Wars The Child est une reproduction fidèle du nouveau chouchou des fans de la série de Disney Plus.\r\nFIGURINE ARTICULÉE : Cette figurine Star Wars de 16,5 cm a de multiples points d\'articulation. Garçons et filles peuvent placer leur figurine « bébé Yoda » The Child dans toutes les positions qu\'ils peuvent imaginer pour d\'adorables aventures.', 'Jeux & Jouets', 'Figurines', 23.29, 12, 'ON SALE', 22),
(9, 'MEINDL Desert Fox Assault/Patrouille T42', 'Cette liste est pour les véritables bottes de combat d\'assaut / de patrouille Meindl Desert Fox de l\'armée britannique\r\n\r\nVéritable problème militaire britannique.\r\nConstruction et design Meindl de haute qualité.\r\nConstruction en cuir suédé et Cordura avec doublure clima.\r\nSystème de laçage rapide avec 5 crochets et 4 anneaux.\r\nSemelle absorbant les chocs Multigrip® anti-obstruction offrant une traction et une flexibilité élevées.\r\nSemelle Meindl Air active® Dry Tec, sauf indication contraire SEMELLE # 2 dans les menus ci-dessus.\r\nZone de flexion intégrée au talon pour permettre flexibilité et confort.\r\nToutes les bottes sont livrées avec les semelles sur l\'image principale, sauf indication contraire SEMELLE # 2, certaines peuvent avoir une semelle différente et cela sera indiqué dans le menu déroulant ci-dessus et une photo de la semelle sera affichée lors de la sélection.', 'Habillement', 'Chaussures', 75, 2, 'ON SALE', 20),
(10, 'AK-47 Réplique Airsoft', 'Tous les articles sont des répliques airsoft exactes d\'armes à feu et leurs accessoires. Contient de petites pièces.', 'Jeux & Jouets', 'Armée, airsoft', 149.17, 1, 'ON SALE', 20),
(11, 'Sony PlayStation 4 Slim 1 TB', 'Vendue à plus de 60 millions d\'exemplaires depuis son lancement en 2013, la PlayStation 4 a confirmé la position de Sony au rang des mastodontes des fabricants de consoles. Comme ses grandes sœurs (PlayStation 1, 2, 3 & Portable), la PlayStation 4 se distingue par l’incroyable nombre de jeux PS4 et ses accessoires comme les casques VR disponibles pour ses joueurs.', 'High-Tech', 'Jeux vidéos, consoles', 249.92, 3, 'ON SALE', 8);

-- --------------------------------------------------------

--
-- Structure de la table `items_reviews`
--

DROP TABLE IF EXISTS `items_reviews`;
CREATE TABLE IF NOT EXISTS `items_reviews` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rate` int(10) UNSIGNED NOT NULL,
  `comment` varchar(255) NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `reviewer_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `item_id_idx` (`item_id`),
  KEY `reviewer_id_idx` (`reviewer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `object` varchar(45) NOT NULL DEFAULT 'Sans objet',
  `content` text NOT NULL,
  `sent_at` datetime NOT NULL,
  `received_at` datetime DEFAULT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sender_id_idx` (`sender_id`),
  KEY `receiver_id_idx` (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `total_tax_free` float NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `ordered_at` datetime NOT NULL,
  `received_at` datetime DEFAULT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `buyer_id_idx` (`buyer_id`),
  KEY `seller_id_idx` (`seller_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `picture_1` varchar(100) NOT NULL,
  `picture_2` varchar(100) DEFAULT NULL,
  `picture_3` varchar(100) DEFAULT NULL,
  `picture_4` varchar(100) DEFAULT NULL,
  `picture_5` varchar(100) DEFAULT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`picture_1`, `picture_2`, `picture_3`, `picture_4`, `picture_5`, `item_id`) VALUES
('8-1', '8-2', '8-3', NULL, NULL, 1),
('2-1', '2-2', '2-3', NULL, NULL, 2),
('3-1', '3-2', '3-3', NULL, NULL, 3),
('4-1', '4-2', NULL, NULL, NULL, 4),
('5-1', '5-2', '5-3', '5-4', NULL, 5),
('6-1', '6-2', '6-3', NULL, NULL, 6),
('7-1', NULL, NULL, NULL, NULL, 7),
('11-1', '11-2', NULL, NULL, NULL, 8),
('9-1', '9-2', '9-3', '9-4', NULL, 9),
('10-1', '10-2', NULL, NULL, NULL, 10),
('1-1', '1-2', '1-3', '1-4', NULL, 11);

-- --------------------------------------------------------

--
-- Structure de la table `profile_options`
--

DROP TABLE IF EXISTS `profile_options`;
CREATE TABLE IF NOT EXISTS `profile_options` (
  `currency` varchar(3) NOT NULL DEFAULT 'EUR',
  `coin` varchar(3) NOT NULL DEFAULT 'BTC',
  `deposits` int(11) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'icon_profil.png',
  `catchphrase` varchar(255) NOT NULL DEFAULT 'Insérez ici votre phrase d''accroche',
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profile_options`
--

INSERT INTO `profile_options` (`currency`, `coin`, `deposits`, `avatar`, `catchphrase`, `user_id`) VALUES
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 1),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 2),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 3),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 4),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 5),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 6),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 7),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 8),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 9),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 10),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 11),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 12),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 13),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 14),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 15),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 16),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 17),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 18),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 19),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 20),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 21),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 22),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 23),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 24),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 25),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 26),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 27),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 28),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 29),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 30),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 31),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 32),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 33),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 34),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 35),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 36),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 37),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 38),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 39),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 40),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 41),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 42),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 43),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 44),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 45),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 46),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 47),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 48),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 49),
('EUR', 'BTC', 0, 'icon_profil.png', 'Insérez ici votre phrase d\'accroche', 50);

-- --------------------------------------------------------

--
-- Structure de la table `quantities`
--

DROP TABLE IF EXISTS `quantities`;
CREATE TABLE IF NOT EXISTS `quantities` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  KEY `item_id_idx` (`item_id`),
  KEY `order_id_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `status` varchar(6) NOT NULL DEFAULT 'BUYER',
  `register_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `mail`, `status`, `register_at`) VALUES
(1, 'root', '$2y$10$iS3JT9mvwwJ.f0widAvopeSuGsfsUnDNmtgYAaxZF6DrF1hfWlCim', 'root@root.rt', 'ADMIN', '2020-03-29 01:06:48'),
(2, 'vavass', '$2y$10$AeF1feRtsEE99rK.2eqa6uv5xmpI/m5ldrYXZvxC99rKSxnWj1H8.', 'boucher.bernadette@yahoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(3, 'munoz38', '$2y$10$4cEJKQSKqKrwT55yVoXgx.ytZShq/va52SnVx7SikJj3AL24IAtw6', 'guichard.anouk@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(4, 'etienne_22', '$2y$10$c2ZLR/4K9rscsDfLmq6aJubJVp/ban7AFwTuKF6BV2C6vVDwLFJTu', 'rousset.jeanne@free.fr', 'BUYER', '2020-03-29 01:06:48'),
(5, 'delahaye', '$2y$10$FppbkzJFs1CcpHNQWrKLwuuk9H00BSLovUVNsqMDJvHdMCFDaNqCq', 'lefevre.jacqueline@gmail.com', 'BUYER', '2020-03-29 01:06:48'),
(6, 'bebert', '$2y$10$5dOwxtlmB6Uxbv2vlcCqTujyRbWyElex0t9lMPJ3jtUtWus02CfKy', 'carre.juliette@yahoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(7, 'fouquetou', '$2y$10$PokLP3AWy935Kgj03Pz3cOyXq7KZO0LLL44uNsET/nag.z8M8LKUm', 'guillou.arthur@free.fr', 'BUYER', '2020-03-29 01:06:48'),
(8, 'roYer_987', '$2y$10$NDB3hPU/q74loiicRCbVRuc358CRqHX8kJg9RFZBe7qE3OkFAoHgm', 'klein.laurence@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(9, 'maury_povitch', '$2y$10$ZiGt2IBdE9EYKPWBZSLkpuknz3zKZKXb59G3DwYypewSutBms0S4C', 'carre.antoinette@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(10, 'gonzalo', '$2y$10$6DCIsyKKPA58yDbHsDJSr.QypL0Hmkoze0m8EwPeM1h1OJaJhUjhC', 'thomas.olivier@ifrance.com', 'BUYER', '2020-03-29 01:06:48'),
(11, 'rodriiiiiiiigues', '$2y$10$JrY8oyAxdzs9EoRhQU0HcORg0U8VVNh4nQbd5fj./PLoHBQQtL.S.', 'delmas.gilles@live.com', 'BUYER', '2020-03-29 01:06:48'),
(12, 'goncalves', '$2y$10$k/j9xroYdyNu/xVzz79WwOtgz42v/hYjPQRGEUCHrBknm8Uf.O7EC', 'barbier.manon@bouygtel.fr', 'BUYER', '2020-03-29 01:06:48'),
(13, 'fleury-merovingien', '$2y$10$82gyTbjl0TUu1CHMyAX9I.fjck5tSeyMe26l4feL5mlFCASuaXxPO', 'leveque.laurence@club-internet.fr', 'BUYER', '2020-03-29 01:06:48'),
(14, 'millet2', '$2y$10$PHGC/4oXEL5taRkp50DoNuu2Zg6en4v/KvCpwfej9YNqsQeSqrsMe', 'weber.susan@bouygtel.fr', 'BUYER', '2020-03-29 01:06:48'),
(15, 'raynaud', '$2y$10$S3By6Uh4rR4Yvg85k5djjeSHPdxBPkj2AZMN6qGBTQv1bfxJ8r5a.', 'guichard.anastasie@voila.fr', 'BUYER', '2020-03-29 01:06:48'),
(16, 'bouboul', '$2y$10$8cMrE40a4pUtGz0ZfBKhze6ux8qDjAfIJP1hzvhdNfsNGqNU2jtoq', 'chevalier.jules@orange.fr', 'BUYER', '2020-03-29 01:06:48'),
(17, 'lopez-lespagnolo', '$2y$10$3jL.5BbtE6NPiRZLrvr.6uLz7ZlcZTox29HWWUAat3AuNfAgoGKaW', 'bouchet.mathilde@hotmail.fr', 'BUYER', '2020-03-29 01:06:48'),
(18, 'robert49', '$2y$10$fB8dDLQ8MypDUUhCCCmtMOOOe7rB0UjvssSEgFm/lD.rgxVkvHZoi', 'fernandes.nathalie@gmail.com', 'BUYER', '2020-03-29 01:06:48'),
(19, 'charaKOu', '$2y$10$OVg.tcxTa9Nt4km.dWCuCuOvNG8Vx5iYdzMqQig9g9Gtu9u9F8Nym', 'robert.emmanuel@bouygtel.fr', 'BUYER', '2020-03-29 01:06:48'),
(20, 'boyer', '$2y$10$8QRFdAexSXX7fe5bYnA6mO/ZZZ.Gijit7GljgyEYDGhk3fHdNiXTy', 'pasquier.margot@hotmail.fr', 'BUYER', '2020-03-29 01:06:48'),
(21, 'peron45', '$2y$10$C0BoLTdgNtryFtD5DuwZkeQvcer7sHA4U0H.zE1eDD0wSefRN4rAK', 'coulon.joseph@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(22, 'legoff', '$2y$10$1lbFRtw4CHh2lOUcff6UB.YYg5HjUUmAoH5vzKgOORC/wY7Opfqq6', 'leduc.aurore@ifrance.com', 'BUYER', '2020-03-29 01:06:48'),
(23, 'bodin_merou', '$2y$10$3vvcFf1QF.c6M9LnW81oROWEBpdhoFGR87fCxtjzwVBBaBGlDKnBq', 'etienne.laetitia@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(24, 'dass25', '$2y$10$CSeQmZd2zV96cJcju.eJee4vhFXY7VMd3ezWvVGzLh9ij7oPfW7ua', 'perrier.camille@club-internet.fr', 'BUYER', '2020-03-29 01:06:48'),
(25, 'clem64', '$2y$10$RCRNBrHy4DbHEoe7BI76JuSFQRnPG2H3JuC5CDVARMfgChp0KJPuK', 'bodin.laurent@voila.fr', 'BUYER', '2020-03-29 01:06:48'),
(26, 'pelletier_brizou', '$2y$10$q3tfgU1TKIOc/XGy6bWtre5aeywB7FVKhguWtIskR8O2YrY0AZrJe', 'tanguy.alix@wanadoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(27, 'valette la saucisse', '$2y$10$LRabBPkdwRJWOF9ScgkaWeXv6obhr.1uqY4EK4Gk6e8LzqZZgJUMG', 'besnard.pauline@club-internet.fr', 'BUYER', '2020-03-29 01:06:48'),
(28, 'rakham_le_noir', '$2y$10$2Sq9vLPo2xUOGCU5xdOZm.1TR1jEjIOWXPevJwaTlLgbGkYJOCnGK', 'dufour.thibault@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(29, 'jacobet', '$2y$10$MUbnYRQiESTtetlY5rKqnOYlyS0iwKwfHoLu0AIepS1Zedgyc08S2', 'pruvost.jules@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(30, 'grenier4', '$2y$10$rB3JhX/Q3Wp04GOYgDAUfeEcl8jFMypvWYliGXRUgVjopQy9PBULe', 'hamon.monique@hotmail.fr', 'BUYER', '2020-03-29 01:06:48'),
(31, 'chevalier-lespelette', '$2y$10$.Jg7wMzQ7HYOsKs8S865rO8Q2sjjIWEH4Demh.4FUN4cfNli.FZ2i', 'dos santos.arthur@club-internet.fr', 'BUYER', '2020-03-29 01:06:48'),
(32, 'perrot12', '$2y$10$g9JTD5Rh3TQV22d7WfEAo.3kXbw0UPNE7MbiV.UoVC7xxcUrbsiV6', 'fabre.isaac@free.fr', 'BUYER', '2020-03-29 01:06:48'),
(33, 'juju7', '$2y$10$atq1486//xPXsPyHFsP.OuIr4UwTOdzzhMHppTWGfWFY7Av2QdMpW', 'nicolas.raymond@hotmail.fr', 'BUYER', '2020-03-29 01:06:48'),
(34, 'barbier', '$2y$10$e1pLTAhA56yC8Fu9eammyO8KVJsRucJWV8Dc08equbgRR42bc86Ty', 'hoarau.alphonse@tele2.fr', 'BUYER', '2020-03-29 01:06:48'),
(35, 'collet', '$2y$10$kjLBn7Lei.GoLQszFJlXf.y7cYxU2T.EdXt/1/z3flRuOSrdBD5VS', 'barre.lucas@tiscali.fr', 'BUYER', '2020-03-29 01:06:48'),
(36, 'ribeiro', '$2y$10$tMX0/5A1kYVccw9HB1iPbOIv.9Swg59sxAvPbqCw8YKhsLvOkfKbK', 'lemaire.richard@wanadoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(37, 'gaudin', '$2y$10$ULWrzaA3eXyTUX.RYyjcOOjYhM7FA2uKPncdI3zi.baGqCduz7ZXi', 'payet.olivie@ifrance.com', 'BUYER', '2020-03-29 01:06:48'),
(38, 'la_roche', '$2y$10$lMgXNxQBB07c9Vi7fpOcu.3rq1LA/w4uBvKKyZByA17lyxJD25vjG', 'carre.luce@wanadoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(39, 'roux le plus bo', '$2y$10$v.2jWvan4W/oSpolCJVJHO2MT14EQxtSJtHbYQGYsCd2FHfOPNe9m', 'meunier.yves@sfr.fr', 'BUYER', '2020-03-29 01:06:48'),
(40, 'richard', '$2y$10$UCAdf9yjqkXoOzBAXutyXu2a3sjLbATCrLStx/lTCekhkKEkmJMse', 'merle.auguste@orange.fr', 'BUYER', '2020-03-29 01:06:48'),
(41, 'delahayess', '$2y$10$p1MfIc1xtZPB1cbxU2o5pe8Unq.u2AEgeG8CHxBv2J2eBLCFiylIW', 'marchand.denise@bouygtel.fr', 'BUYER', '2020-03-29 01:06:48'),
(42, 'coulon_en_bronze', '$2y$10$acCjBQx2OH4UUl1F5A3/gu5GRWYIpq7jcipWNX2RKf/tObxcGBrfS', 'garnier.gilbert@sfr.fr', 'BUYER', '2020-03-29 01:06:48'),
(43, 'deschamps007', '$2y$10$EtMlYCMvso/B6gq8sgPNfOtotvXDUfCASI0J/zuc/feY9pnRJrGVm', 'becker.nicolas@noos.fr', 'BUYER', '2020-03-29 01:06:48'),
(44, 'rodrigue', '$2y$10$Xv/mja.PAxUYTuK6iI8z..pUP.Rfy7mAMfRQvAqTZPYIrTcjWplUG', 'valentin.roland@laposte.net', 'BUYER', '2020-03-29 01:06:48'),
(45, 'becker', '$2y$10$qRGBCuudZxfECL/ajLL/TOczR1w2BMjoJ0IgeGNCVjCwijeG9AV4a', 'laroche.patrick@wanadoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(46, 'vavaille', '$2y$10$5EG05Osl0LmnoUFd5E3NFuZMGnO7nu.kFskmchs4ZOt4b8aNfQho.', 'maurice.hugues@orange.fr', 'BUYER', '2020-03-29 01:06:48'),
(47, 'bodine974', '$2y$10$glvSskzGpt5byOvvBQqvdewouQTGen097ZhpYiM.hDw4epggwuw2y', 'pruvost.alain@free.fr', 'BUYER', '2020-03-29 01:06:48'),
(48, 'philippounet', '$2y$10$OzjtSUAIhSE0Vtu9S6yY0ekatxM3l.3JI1VY2ST31Us56SQakgraa', 'monnier.brigitte@wanadoo.fr', 'BUYER', '2020-03-29 01:06:48'),
(49, 'martinez', '$2y$10$n9xapP3Dk92P5QNbJ88CNei/x6/kyxdbUz20EXW5OC0di.I1NRwRm', 'texier.pauline@voila.fr', 'BUYER', '2020-03-29 01:06:48'),
(50, 'brioche jacquouille', '$2y$10$7Z.Z2ri880IscNFJkJbaS.Zgi1J5B6tGJbVUMsERK/ppE2EGvNrsO', 'jourdan.franck@laposte.net', 'BUYER', '2020-03-29 01:06:48');

-- --------------------------------------------------------

--
-- Structure de la table `users_personnal`
--

DROP TABLE IF EXISTS `users_personnal`;
CREATE TABLE IF NOT EXISTS `users_personnal` (
  `gender` varchar(1) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `secondary_adress` varchar(255) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users_personnal`
--

INSERT INTO `users_personnal` (`gender`, `last_name`, `first_name`, `address`, `secondary_adress`, `postcode`, `city`, `country`, `phone`, `user_id`) VALUES
('M', NULL, NULL, NULL, NULL, NULL, NULL, 'FRANCE', NULL, 1),
('F', 'BOUCHER', 'Bernadette', '354 rue Roland Bouvet', NULL, '94 560', 'Antoine-sur-Peltier', 'FRANCE', '+33 6 45 54 87 81', 2),
('F', 'GUICHARD', 'Anouk', '94 rue de Ledoux', NULL, '52 080', 'Peltier-sur-Mer', 'FRANCE', '+33 6 89 75 41 11', 3),
('F', 'ROUSSET', 'Jeanne', '544 chemin Rolland', NULL, '36 570', 'Boulay-les-Bains', 'FRANCE', '+33 6 54 73 52 84', 4),
('F', 'LEFEVRE', 'Jacqueline', '9 avenue Joseph Cordier', NULL, '24 480', 'Schmitt-sur-Marin', 'FRANCE', '+33 6 74 84 09 55', 5),
('F', 'CARRE', 'Juliette', '31 chemin Lefebvre', NULL, '24 350', 'RocherBourg', 'FRANCE', '+33 6 48 13 00 08', 6),
('M', 'GUILLOU', 'Arthur', '5 boulevard de Pottier', NULL, '62 030', 'Roy-sur-Arnaud', 'FRANCE', '+33 6 61 71 84 89', 7),
('F', 'KLEIN', 'Laurence', '76 impasse Gilbert', NULL, '44 460', 'Morvan', 'FRANCE', '+33 6 44 34 77 87', 8),
('F', 'CARRE', 'Antoinette', '67 chemin Guillaume Descamps', NULL, '30 390', 'Boulaynec', 'FRANCE', '+33 6 93 27 03 82', 9),
('M', 'THOMAS', 'Olivier', '38 boulevard Bailly', NULL, '973 560', 'Mallet-sur-Hoarau', 'FRANCE', '+33 6 48 21 90 75', 10),
('M', 'DELMAS', 'Gilles', '888 place Mallet', NULL, '972 710', 'Hebert', 'FRANCE', '+33 6 86 36 94 23', 11),
('F', 'BARBIER', 'Manon', '500 impasse de Jourdan', NULL, '976 440', 'Picard', 'FRANCE', '+33 6 65 98 51 62', 12),
('F', 'LEVEQUE', 'Laurence', '534 rue de Turpin', NULL, '54 470', 'Delmas-la-Forêt', 'FRANCE', '+33 6 08 72 64 19', 13),
('F', 'WEBER', 'Susan', '53 chemin Perret', NULL, '78 090', 'Weber', 'FRANCE', '+33 6 56 10 46 60', 14),
('F', 'GUICHARD', 'Anastasie', '47 chemin de Huet', NULL, '42 170', 'Noel', 'FRANCE', '+33 6 87 49 86 24', 15),
('M', 'CHEVALIER', 'Jules', '6 impasse de Courtois', NULL, '79 350', 'Rousseaudan', 'FRANCE', '+33 6 48 18 18 58', 16),
('F', 'BOUCHET', 'Mathilde', '42 impasse Thomas Vasseur', NULL, '19 380', 'Sanchez', 'FRANCE', '+33 6 23 42 57 62', 17),
('F', 'FERNANDES', 'Nathalie', '52 boulevard de Arnaud', NULL, '2A 410', 'Mathieu', 'FRANCE', '+33 6 19 28 90 92', 18),
('M', 'ROBERT', 'Emmanuel', '62 rue Gabriel Herve', NULL, '31 340', 'Maurice', 'FRANCE', '+33 6 49 97 48 95', 19),
('F', 'PASQUIER', 'Margot', '991 chemin de Pierre', NULL, '80 150', 'Menardnec', 'FRANCE', '+33 6 47 37 32 50', 20),
('M', 'COULON', 'Joseph', '37 avenue Fontaine', NULL, '93 230', 'Vaillant-sur-Masson', 'FRANCE', '+33 6 38 76 60 31', 21),
('F', 'LEDUC', 'Aurore', '6 rue Picard', NULL, '37 300', 'Henry', 'FRANCE', '+33 6 70 07 31 65', 22),
('F', 'ETIENNE', 'Laetitia', '63 boulevard de Maillet', NULL, '05 600', 'Lacroix-sur-Martineau', 'FRANCE', '+33 6 52 62 62 99', 23),
('F', 'PERRIER', 'Camille', '9 rue Emmanuel Robin', NULL, '44 190', 'SeguinVille', 'FRANCE', '+33 6 07 27 93 00', 24),
('M', 'BODIN', 'Laurent', '6 rue Allain', NULL, '64 510', 'Jean-les-Bains', 'FRANCE', '+33 6 90 39 82 19', 25),
('F', 'TANGUY', 'Alix', '13 avenue Descamps', NULL, '43 790', 'Perrot', 'FRANCE', '+33 6 47 61 21 64', 26),
('F', 'BESNARD', 'Pauline', '440 rue Odette Maillet', NULL, '46 680', 'Jacquesnec', 'FRANCE', '+33 6 01 33 29 87', 27),
('M', 'DUFOUR', 'Thibault', '91 rue Adèle Gros', NULL, '38 070', 'Blanchard', 'FRANCE', '+33 6 63 60 75 20', 28),
('M', 'PRUVOST', 'Jules', '88 chemin Lucas', NULL, '43 340', 'Seguin', 'FRANCE', '+33 6 79 81 96 20', 29),
('F', 'HAMON', 'Monique', '5 place Boucher', NULL, '32 830', 'Guillot-sur-Lombard', 'FRANCE', '+33 6 30 94 43 71', 30),
('M', 'DOS SANTOS', 'Arthur', '362 rue Antoine', NULL, '43 110', 'Bousquet-sur-Dufour', 'FRANCE', '+33 6 77 34 07 31', 31),
('M', 'FABRE', 'Isaac', '879 impasse Danielle Chevallier', NULL, '89 840', 'Besson-les-Bains', 'FRANCE', '+33 6 20 59 30 01', 32),
('M', 'NICOLAS', 'Raymond', '849 boulevard Alex Ruiz', NULL, '07 190', 'Gaudin', 'FRANCE', '+33 6 69 35 42 93', 33),
('M', 'HOARAU', 'Alphonse', '76 chemin de Remy', NULL, '78 310', 'Bouchet', 'FRANCE', '+33 6 32 10 39 08', 34),
('M', 'BARRE', 'Lucas', '695 rue de Barre', NULL, '65 380', 'Ruiz-sur-Morvan', 'FRANCE', '+33 6 33 47 48 35', 35),
('M', 'LEMAIRE', 'Richard', '27 boulevard Martine Moulin', NULL, '06 740', 'BegueBourg', 'FRANCE', '+33 6 27 93 28 04', 36),
('F', 'PAYET', 'Olivie', '47 rue Rossi', NULL, '74 980', 'Marchand', 'FRANCE', '+33 6 82 45 84 63', 37),
('F', 'CARRE', 'Luce', '126 place de Benoit', NULL, '44 220', 'Rocher-sur-Legendre', 'FRANCE', '+33 6 24 25 13 16', 38),
('M', 'MEUNIER', 'Yves', '788 rue de Leleu', NULL, '80 350', 'Paul', 'FRANCE', '+33 6 34 20 17 63', 39),
('M', 'MERLE', 'Auguste', '42 avenue Stéphane Vallee', NULL, '82 380', 'Boulay', 'FRANCE', '+33 6 22 35 19 29', 40),
('F', 'MARCHAND', 'Denise', '23 place de Texier', NULL, '78 590', 'Berthelotdan', 'FRANCE', '+33 6 70 46 91 39', 41),
('M', 'GARNIER', 'Gilbert', '330 rue Guibert', NULL, '16 480', 'Roy', 'FRANCE', '+33 6 41 80 74 04', 42),
('M', 'BECKER', 'Nicolas', '30 rue de Cohen', NULL, '76 300', 'Marie', 'FRANCE', '+33 6 96 08 25 76', 43),
('M', 'VALENTIN', 'Roland', '120 rue Leblanc', NULL, '18 410', 'Humbert', 'FRANCE', '+33 6 80 30 13 71', 44),
('M', 'LAROCHE', 'Patrick', '83 avenue Morin', NULL, '95 660', 'Lemaire', 'FRANCE', '+33 6 79 76 72 81', 45),
('M', 'MAURICE', 'Hugues', '48 boulevard Guillaume Lecomte', NULL, '63 950', 'Richard-la-Forêt', 'FRANCE', '+33 6 95 49 70 95', 46),
('M', 'PRUVOST', 'Alain', '9 avenue Bertrand', NULL, '40 830', 'Bousquet-la-Forêt', 'FRANCE', '+33 6 69 28 05 48', 47),
('F', 'MONNIER', 'Brigitte', '9 chemin Claire Marie', NULL, '23 150', 'Foucher', 'FRANCE', '+33 6 90 50 32 89', 48),
('F', 'TEXIER', 'Pauline', '223 impasse Reynaud', NULL, '34 110', 'Hoarau', 'FRANCE', '+33 6 09 74 85 20', 49),
('M', 'JOURDAN', 'Franck', '9 chemin Leger', NULL, '37 800', 'Dubois', 'FRANCE', '+33 6 07 93 99 42', 50);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `fk_feedbacks_reviewers` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_feedbacks_sellers` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `fk_items_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `items_reviews`
--
ALTER TABLE `items_reviews`
  ADD CONSTRAINT `fk_items_reviews_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_items_reviews_reviewers` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_reviewers` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_messages_senders` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_buyers` FOREIGN KEY (`buyer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_sellers` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `fk_pictures_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `profile_options`
--
ALTER TABLE `profile_options`
  ADD CONSTRAINT `fk_options_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `quantities`
--
ALTER TABLE `quantities`
  ADD CONSTRAINT `fk_quantities_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_quantities_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users_personnal`
--
ALTER TABLE `users_personnal`
  ADD CONSTRAINT `fk_personnal_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
