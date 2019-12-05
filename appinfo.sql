-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 nov. 2019 à 12:24
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appinfo`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

DROP TABLE IF EXISTS `alerte`;
CREATE TABLE IF NOT EXISTS `alerte`
(
    `idAlerte`                     int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `instant`                      datetime         NOT NULL,
    `valeur`                       int(11)          NOT NULL,
    `Capteur_Actionneur_idCapteur` int(11)          NOT NULL,
    PRIMARY KEY (`idAlerte`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `capteur_actionneur`
--

DROP TABLE IF EXISTS `capteur_actionneur`;
CREATE TABLE IF NOT EXISTS `capteur_actionneur`
(
    `idCapteur`      int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `typeCapteur`    varchar(45)      NOT NULL,
    `typeActionneur` varchar(45)      NOT NULL,
    `unite`          varchar(45)      NOT NULL,
    `Carte_idCarte`  int(11)          NOT NULL,
    PRIMARY KEY (`idCapteur`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `capteur_actionneur`
--

INSERT INTO `capteur_actionneur` (`idCapteur`, `typeCapteur`, `typeActionneur`, `unite`, `Carte_idCarte`)
VALUES (1, 'sonore', '', 'Hz', 1),
       (2, 'température', '', '°C', 1),
       (3, 'rythme cardiaque', '', 'battements/min', 1),
       (4, '', 'lumineux', 'nm', 1),
       (5, '', 'sonore', 'Hz', 1);

-- --------------------------------------------------------

--
-- Structure de la table `capteur_actionneur_has_test`
--

DROP TABLE IF EXISTS `capteur_actionneur_has_test`;
CREATE TABLE IF NOT EXISTS `capteur_actionneur_has_test`
(
    `Capteur_Actionneur_idCapteur` int(11)  NOT NULL,
    `Test_idTest`                  int(11)  NOT NULL,
    `date`                         date     NOT NULL,
    `instantDebut`                 datetime NOT NULL,
    `instantFin`                   datetime NOT NULL,
    PRIMARY KEY (`Capteur_Actionneur_idCapteur`, `Test_idTest`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `carte`
--

DROP TABLE IF EXISTS `carte`;
CREATE TABLE IF NOT EXISTS `carte`
(
    `idCarte` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (`idCarte`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 2
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `carte`
--

INSERT INTO `carte` (`idCarte`)
VALUES (1);

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq`
(
    `idQA`            int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `contenuQuestion` text,
    `contenuReponse`  text,
    PRIMARY KEY (`idQA`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`idQA`, `contenuQuestion`, `contenuReponse`)
VALUES (1, 'Comment on crée un compte ?',
        'Il faut s\'inscrire dans un centre de test psychométrique qui utilise ce logiciel.'),
       (2, 'Combien de temps faut-il attendre pour obtenir ses résultats ?',
        'Cela dépend de votre centre de test, mais il faut en générale attendre une à deux semaines.');

-- --------------------------------------------------------

--
-- Structure de la table `mesure`
--

DROP TABLE IF EXISTS `mesure`;
CREATE TABLE IF NOT EXISTS `mesure`
(
    `idMesure`                     int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `valeur`                       int(11)          NOT NULL,
    `instant`                      datetime         NOT NULL,
    `Capteur_Actionneur_idCapteur` int(11)          NOT NULL,
    `Utilisateur_id`               int(11)          NOT NULL,
    PRIMARY KEY (`idMesure`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `mesure`
--

INSERT INTO `mesure` (`idMesure`, `valeur`, `instant`, `Capteur_Actionneur_idCapteur`, `Utilisateur_id`)
VALUES (1, 200, '2019-11-24 17:28:50', 1, 6),
       (2, 150, '2019-11-24 17:29:25', 1, 6),
       (3, 148, '2019-11-24 17:30:51', 1, 6),
       (4, 165, '2019-11-24 17:31:24', 1, 7),
       (5, 263, '2019-11-24 17:32:02', 2, 7),
       (6, 253, '2019-11-24 17:32:17', 2, 7),
       (7, 188, '2019-11-24 17:33:04', 2, 6);

-- --------------------------------------------------------

--
-- Structure de la table `resultat`
--

DROP TABLE IF EXISTS `resultat`;
CREATE TABLE IF NOT EXISTS `resultat`
(
    `idResultat`     int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `contenu`        text,
    `score`          int(11) DEFAULT NULL,
    `Utilisateur_id` int(11)          NOT NULL,
    PRIMARY KEY (`idResultat`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test`
(
    `idTest`         int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `Utilisateur_id` int(11)          NOT NULL,
    PRIMARY KEY (`idTest`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur`
(
    `id`               int(11)       NOT NULL AUTO_INCREMENT,
    `nom`              varchar(255),
    `prenom`           varchar(255),
    `date_naissance`   date,
    `numero_telephone` varchar(10),
    `type`             varchar(255)  NOT NULL,
    `login`            varchar(255)  NOT NULL,
    `mot_de_passe`     varchar(2000) NOT NULL,
    `adresse_mail`     varchar(255)  NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  DEFAULT CHARSET = utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `date_naissance`, `numero_telephone`, `type`, `login`, `mot_de_passe`,
                           `adresse_mail`)
VALUES (1, 'philippe', 'guillaume', '1999-07-25', '0619637985', 'admin', 'g.philippe', 'motdepasse',
        'guillaume.philippe2000@gmail.com'),
       (2, 'liu', 'lionel', '1999-01-01', '0606060606', 'admin', 'l.liu', 'lionelisep', 'l.lionel0104@gmail.com'),
       (3, 'parayre', 'benjamin', '1999-01-01', '0707070707', 'admin', 'b.parayre', 'benji',
        'parayre.benjamin1@gmail.com'),
       (4, 'le garlantezec', 'thomas', '1999-01-01', '0607070707', 'admin', 't.garlantezec', 'legarlantezec',
        'thomas.legarlantezec@gmail.com'),
       (5, 'fournet', 'benjamin', '1999-01-01', '0606070707', 'admin', 'b.fournet', 'fournet99',
        'benjamin.fournet99@gmail.com'),
       (6, 'dupont', 'jean', '1990-01-01', '0612345678', 'candidat', 'j.dupont', 'dupont90', 'm.dupont@gmail.com'),
       (7, 'dupont', 'michel', '1970-01-01', '0687654321', 'candidat', 'm.dupont', 'dupont90', 'j.dupont@gmail.com'),
       (8, 'auguste', 'louis', '1970-01-01', '0687654312', 'gestionnaire', 'l.auguste', 'leau', 'l.auguste@gmail.com'),
       (9, 'eau', 'pierre', '1970-01-01', '0612345687', 'gestionnaire', 'p.eau', 'pierre99', 'pierre.eau@gmail.com'),
       (10, 'apple', 'google', '1970-01-01', '0681234567', 'gestionnaire', 'g.apple', 'microsoft', 'g.apple@gmail.com');

--
-- Structure de la table `donneesfixes`
--

DROP TABLE IF EXISTS `donneesfixes`;
CREATE TABLE IF NOT EXISTS `donneesfixes` (
  `idFixe` int(10) NOT NULL AUTO_INCREMENT,
  `donneeFixe` text,
  PRIMARY KEY (`idFixe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donneesfixes`
--

INSERT INTO `donneesfixes` (`idFixe`, `donneeFixe`) VALUES
(1, 'Je suis un texte pour la CGU,           eh oui !                                      '),
(2, 'Je suis un texte pour les mentions légales !'),
(3, '01010 10506 2'),
(4, 'fzef@fzfe156.fe'),
(5, 'Contenu qui-sommes nous ?          OK ok  ');
COMMIT;
--
-- Structure de la table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE IF NOT EXISTS `forum`
(
    `idForum` int(10) NOT NULL AUTO_INCREMENT,
    `nomTopic` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`idForum`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic`
(
    `idMessage` int(10) NOT NULL AUTO_INCREMENT,
    `message` text NOT NULL,
    `dateMessage` date NOT NULL,
    `idTopic` int(11) NOT NULL,
    PRIMARY KEY (`idMessage`)

) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
