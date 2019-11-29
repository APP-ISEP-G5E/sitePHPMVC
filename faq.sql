-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 nov. 2019 à 18:17
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `idQA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idQ` int(11) NOT NULL,
  `contenuQuestion` text,
  `idReponse` int(11) DEFAULT NULL,
  `contenuReponse` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idQA`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idQA`, `idQ`, `contenuQuestion`, `idReponse`, `contenuReponse`, `date`) VALUES
(1, 1, 'Comment on crée un compte ?', NULL, NULL, '2019-11-20 11:30:21'),
(2, 1, NULL, 1, 'Il faut s\'inscrire dans un centre de test psychométrique qui utilise ce logiciel.', '2019-11-21 07:10:06'),
(3, 1, NULL, 2, 'Ok, merci!', '2019-11-26 10:45:40'),
(4, 2, 'Combien de temps faut-il attendre pour obtenir ses résultats ?', NULL, NULL, '2019-11-29 15:29:25'),
(5, 2, NULL, 1, 'Cela dépend de votre centre de test, mais il faut en générale attendre une à deux semaines.', '2019-11-29 15:30:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
