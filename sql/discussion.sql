-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 14 déc. 2020 à 16:44
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `discussion`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(140) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `id_utilisateurs`, `date`) VALUES
(38, 'T\'as des idÃ©es pour l\'Ã©nigme de la semaine ?', 3, '2020-12-04 16:09:46'),
(39, 'Oh disons que j\'en ai quelques une oui ...', 4, '2020-12-04 16:10:31'),
(18, 'Salut, il y a des gens ?', 3, '2020-12-04 12:24:08'),
(40, 'Ah bah racontes du coup !', 3, '2020-12-04 16:31:08'),
(26, 'On fais avec hein ...', 3, '2020-12-04 12:42:38'),
(21, 'Tu vas bien ?', 4, '2020-12-04 12:31:30'),
(20, 'Yes !', 4, '2020-12-04 12:28:50');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`) VALUES
(1, 'test', '$2y$10$LP86TXKKVvsT.Ak0gyMMk.zH2k8GA8ShNGCSze2mdvg.bx2FgWqhi'),
(3, 'NicoRvl', '$2y$10$TpJAtHZ0D1mHEJJuCV0xdudL/X2C2EbR5ryN6YeasgLLMzP4/UNIC'),
(4, 'BMNavo', '$2y$10$z3kdAFDNC1vvFULCI2ewK.Fk.OiLkGan2882YUHbKlh3i3ZrBIB4K');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
