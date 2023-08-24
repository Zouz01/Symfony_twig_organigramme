-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 11 août 2023 à 12:12
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `team-symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` int DEFAULT NULL,
  `Âge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `team`
--

INSERT INTO `team` (`id`, `firstname`, `lastname`, `manager_id`, `Âge`, `adresse`, `tel`, `mail`, `cv`, `photo`) VALUES
(1, 'Charlie', 'Goose', 0, '19', '22 rue de Lyon 73000 Chambery', '0687514519', 'charly_goose@gmail.com', 'cv/CV - C.Goose.pdf', 'https://randomuser.me/api/portraits/men/45.jpg'),
(2, 'Paul', 'Stone', 1, '48', '8 impasse du parc 38000 Grenoble', '066565841', 'paule.stone@gmail.com', 'cv/CV - P.Stone.pdf', 'https://randomuser.me/api/portraits/men/82.jpg'),
(3, 'Paul', 'Martin', 1, '38', '22 rue du Champs de Mars 73000 Chambery', '06827845', 'paul_martin@gmail.com', 'cv/CV - P.Martin.pdf', 'https://randomuser.me/api/portraits/men/56.jpg'),
(4, 'Sylvie', 'Durand', 1, '35', '8 rue Dugas 73000 Chambery', '063875458', 'sylvie_durand@gmail.com', 'cv/CV - S.Durant.pdf', 'https://randomuser.me/api/portraits/women/60.jpg'),
(5, 'Martine', 'Duck', 2, '42', '1 avenue Duprès 73000 Chambery', '062147845', 'martine_duck@gmail.com', 'cv/CV - M.Duck.pdf', 'https://randomuser.me/api/portraits/women/41.jpg'),
(6, 'Justine', 'Dupont', 2, '28', '18 bis rue hopital 73000 Chambery', '062845622', 'justine_dupont@gmail.com', 'cv/CV - J.Dupont.pdf', 'https://randomuser.me/api/portraits/women/44.jpg'),
(7, 'Arthur', 'Vincent', 2, '31', '245 rue dugas Montbel 73000 Chambery', '0689515622', 'arthr_vincent@gmail.com', 'cv/CV - A.Vincent.pdf', 'https://randomuser.me/api/portraits/men/10.jpg'),
(8, 'John', 'Deer', 5, '39', '56 rue de Paris 73000 Chambery', '0689514512', 'john_deer@gmail.com', 'cv/CV - J.Deer.pdf', 'https://randomuser.me/api/portraits/men/23.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
