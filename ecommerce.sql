-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 mai 2023 à 22:35
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `icone` varchar(200) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`, `description`, `icone`, `date_creation`) VALUES
(3, 'Salades  ', 'Souvent synonyme de repas léger au déjeuner ou de salades composées au dîner, la salade est un grand classique des repas, qu’ils soient improvisés ou pas. ', '', '0000-00-00'),
(4, 'Burgers', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', 'fa-regular fa-pot-food', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_client` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `valide` int DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_client` (`id_client`),
  KEY `id_client_2` (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `id_client`, `total`, `valide`, `date_creation`) VALUES
(1, 1, '160', NULL, '2023-05-09 20:38:42'),
(2, 1, '640', NULL, '2023-05-09 21:51:44'),
(3, 1, '1760', NULL, '2023-05-09 21:53:03'),
(4, 1, '1760', NULL, '2023-05-09 21:53:33'),
(5, 1, '466', NULL, '2023-05-09 21:56:41'),
(6, 1, '466', NULL, '2023-05-09 21:58:53'),
(7, 1, '466', NULL, '2023-05-09 22:06:23'),
(8, 1, '466', NULL, '2023-05-09 22:09:21'),
(9, 1, '466', NULL, '2023-05-09 22:10:56'),
(10, 1, '466', NULL, '2023-05-09 22:11:00'),
(11, 1, '466', 0, '2023-05-09 22:11:59'),
(12, 1, '1164', NULL, '2023-05-09 22:39:05'),
(13, 1, '1164', NULL, '2023-05-09 22:39:30'),
(14, 1, '1164', NULL, '2023-05-09 22:39:41'),
(15, 1, '1164', NULL, '2023-05-09 22:41:36'),
(16, 1, '6661', NULL, '2023-05-09 22:42:27'),
(17, 1, '133', NULL, '2023-05-09 22:43:51'),
(18, 1, '618', NULL, '2023-05-09 22:48:40'),
(19, 1, '618', NULL, '2023-05-09 22:50:59'),
(20, 1, '618', NULL, '2023-05-09 23:08:45'),
(21, 1, '1783', NULL, '2023-05-09 23:16:31'),
(22, 1, '1783', NULL, '2023-05-09 23:20:08'),
(23, 1, '1783', NULL, '2023-05-09 23:20:11'),
(24, 1, '1783', NULL, '2023-05-09 23:21:17'),
(25, 1, '1783', NULL, '2023-05-09 23:24:21'),
(26, 1, '1783', NULL, '2023-05-09 23:27:53'),
(27, 1, '1783', NULL, '2023-05-09 23:28:31'),
(28, 1, '1783', NULL, '2023-05-09 23:28:37'),
(29, 1, '1783', NULL, '2023-05-09 23:29:32'),
(30, 1, '1783', NULL, '2023-05-09 23:30:59'),
(31, 1, '240', NULL, '2023-05-09 23:31:22'),
(32, 1, '186', NULL, '2023-05-09 23:32:14');

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produit` int NOT NULL,
  `id_commande` int NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `quantite` int NOT NULL,
  `total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produit` (`id_produit`),
  KEY `id_produit_2` (`id_produit`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_produit`, `id_commande`, `prix`, `quantite`, `total`) VALUES
(1, 2, 15, '97', 12, '1164'),
(2, 2, 16, '97', 10, '970'),
(3, 3, 16, '67', 1, '67'),
(4, 4, 16, '703', 8, '5624'),
(5, 1, 30, '80', 7, '560'),
(6, 2, 30, '97', 10, '970'),
(7, 3, 30, '67', 2, '133'),
(8, 5, 30, '40', 3, '120'),
(9, 1, 31, '80', 3, '240'),
(10, 6, 32, '47', 4, '186');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `discount` int NOT NULL,
  `id_categorie` int NOT NULL,
  `date_creation` datetime NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `libelle`, `prix`, `discount`, `id_categorie`, `date_creation`, `description`, `image`) VALUES
(1, 'Souvent synonyme de repas léger au déjeuner ', '80', 0, 3, '2023-05-09 00:00:00', 'Si la salade de chèvre chaud au jambon Serrano est italienne, la Grèce est à l’origine de la salade tomate, feta et olives', '645a6ee3aa6e0salades1.jpg'),
(2, 'salade avec fruits de mer ', '100', 3, 3, '2023-05-09 00:00:00', 'Feuille de chêne, salade verte, laitue romaine ou batavia : autant de variétés que de manière de toutes les manger. En version simple, craquez de plaisir pour des petites feuilles consommées crues. Max de croquant garanti.', '645a71fa4e349salade 2.jpg'),
(3, 'salades Frêche ', '70', 5, 3, '2023-05-09 00:00:00', 'Si la salade de chèvre chaud au jambon Serrano est italienne, la Grèce est à l’origine de la salade tomate, feta et olives', '645a7235104easalade3.jpg'),
(4, 'Salade de roquette aux figues et aux poires', '740', 5, 3, '2023-05-09 00:00:00', 'C’est celle qui vient immédiatement à l’esprit. Cette laitue aux feuilles élancées est devenue très populaire grâce à son craquant sous la dent et à la facilité avec laquelle on peut s’en servir dans différentes recettes.', '645a730ae5e20salade4.jpg'),
(5, 'Salade Piémontaise facile', '80', 50, 3, '2023-05-09 00:00:00', 'A tossed salad is defined as any salad made with greens and at least one other ingredient (which can include tomatoes, cheese, peppers, and alike),', '645a73906dc14salade5.jpg'),
(6, 'Burgers au boeuf et au bacon', '50', 7, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7b04b9743burgers1.jpg'),
(7, 'Burgers de légumes, salade d\'automne', '80', 9, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7b2fd226dburgers3.jpg'),
(8, 'Burgers', '70', 50, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7b85b0775burgers5.jpg'),
(9, 'Burgers', '58', 8, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7bc4e0a99burgers 4.jpg'),
(10, 'Burgers de légumes, salade d\'automne', '79', 4, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7bf364662burgers6.jpg'),
(11, 'Burgers de poulet à l\'orientale', '70', 9, 4, '2023-05-09 00:00:00', 'Du burger végétarien jusqu’au burger pomme de terre, le sandwich US n’a pas de limites… ni en originalité, ni en créativité, ni en gourmandise. En version healthy ou franchement décadente, on choisit sa recette 100% américaine pour un plaisir garanti sans', '645a7c323059fburgers5.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `date_creation` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `password`, `date_creation`) VALUES
(1, 'nessrine', '123', '2023-04-28'),
(2, 'nessrine', '123', '2023-05-08'),
(3, 'nessrine', '123', '2023-05-09'),
(4, 'nessrine', '123', '2023-05-09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
