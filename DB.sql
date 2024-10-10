-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 avr. 2024 à 13:10
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `salon_coiffure`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `login_admin` varchar(100) NOT NULL,
  `mot_pass_admin` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_admin` varchar(50) DEFAULT NULL,
  `prenom_admin` varchar(50) DEFAULT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  `telephone_admin` varchar(10) DEFAULT NULL,
  `datenaiss_admin` date DEFAULT NULL,
  PRIMARY KEY (`login_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`login_admin`, `mot_pass_admin`, `nom_admin`, `prenom_admin`, `email_admin`, `telephone_admin`, `datenaiss_admin`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', 'admin', 'admin@gmail.com', '123456789', '2024-04-08');

-- --------------------------------------------------------

--
-- Structure de la table `caissière`
--

DROP TABLE IF EXISTS `caissière`;
CREATE TABLE IF NOT EXISTS `caissière` (
  `login_caissière` varchar(100) NOT NULL,
  `mot_pass_caissière` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_caissière` varchar(50) DEFAULT NULL,
  `prenom_caissière` varchar(50) DEFAULT NULL,
  `email_caissière` varchar(100) DEFAULT NULL,
  `telephone_caissière` varchar(10) DEFAULT NULL,
  `datenaiss_caissière` date DEFAULT NULL,
  PRIMARY KEY (`login_caissière`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `caissière`
--

INSERT INTO `caissière` (`login_caissière`, `mot_pass_caissière`, `nom_caissière`, `prenom_caissière`, `email_caissière`, `telephone_caissière`, `datenaiss_caissière`) VALUES
('xx', '81dc9bdb52d04dc20036dbd8313ed055', 'xx', 'xx', 'xx@gmail.com', '9345675554', '2024-04-29');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `login_client` varchar(100) NOT NULL,
  `mot_pass_client` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `email_client` varchar(100) DEFAULT NULL,
  `telephone_client` varchar(10) DEFAULT NULL,
  `datenaiss_client` date DEFAULT NULL,
  PRIMARY KEY (`login_client`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`login_client`, `mot_pass_client`, `nom_client`, `prenom_client`, `email_client`, `telephone_client`, `datenaiss_client`) VALUES
('calixte', '827ccb0eea8a706c4c34a16891f84e7b', 'Tinde', 'Pehe Calixte Hassan', 'hassanetinde@gmail.com', '0594805069', '2024-04-17'),
('hassan', '827ccb0eea8a706c4c34a16891f84e7b', 'hassan', 'xx', 'xxx@gmail.com', '0594805069', '2024-04-25'),
('tt', '12345', 'ma', 'pa', 'tt@gmail.com', '019191919', '2024-04-03');

-- --------------------------------------------------------

--
-- Structure de la table `coiffeur`
--

DROP TABLE IF EXISTS `coiffeur`;
CREATE TABLE IF NOT EXISTS `coiffeur` (
  `login_coiffeur` varchar(100) NOT NULL,
  `mot_pass_coiffeur` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nom_coiffeur` varchar(50) DEFAULT NULL,
  `prenom_coiffeur` varchar(50) DEFAULT NULL,
  `email_coiffeur` varchar(100) DEFAULT NULL,
  `telephone_coiffeur` varchar(10) DEFAULT NULL,
  `datenaiss_coiffeur` date DEFAULT NULL,
  PRIMARY KEY (`login_coiffeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coiffeur`
--

INSERT INTO `coiffeur` (`login_coiffeur`, `mot_pass_coiffeur`, `nom_coiffeur`, `prenom_coiffeur`, `email_coiffeur`, `telephone_coiffeur`, `datenaiss_coiffeur`) VALUES
('Clxt', '12345', 'Tinde', 'Pehe Calixte Hassan', 'hassan@gmail.com', '0151177360', '2024-03-11'),
('xx', '827ccb0eea8a706c4c34a16891f84e7b', 'xx', 'xx', 'xxx@gmail.com', '0594805069', '2024-04-22'),
('xx2', 'xx', 'xx', 'xx', 'xx', 'xx', '2024-04-16');

-- --------------------------------------------------------

--
-- Structure de la table `coiffeur_disponibilité`
--

DROP TABLE IF EXISTS `coiffeur_disponibilité`;
CREATE TABLE IF NOT EXISTS `coiffeur_disponibilité` (
  `id_dispo` int NOT NULL,
  `login_coiffeur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dispo`,`login_coiffeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coiffeur_disponibilité`
--

INSERT INTO `coiffeur_disponibilité` (`id_dispo`, `login_coiffeur`) VALUES
(22, 'Clxt'),
(22, 'hassan'),
(22, 'xx'),
(25, 'xx'),
(26, 'Clxt'),
(26, 'hassan'),
(26, 'xx'),
(27, 'xx');

-- --------------------------------------------------------

--
-- Structure de la table `coiffure`
--

DROP TABLE IF EXISTS `coiffure`;
CREATE TABLE IF NOT EXISTS `coiffure` (
  `id_coiffure` int NOT NULL AUTO_INCREMENT,
  `nom_coiffure` varchar(180) DEFAULT NULL,
  `prix_coiffure` float DEFAULT NULL,
  PRIMARY KEY (`id_coiffure`),
  UNIQUE KEY `nom_coiffure` (`nom_coiffure`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coiffure`
--

INSERT INTO `coiffure` (`id_coiffure`, `nom_coiffure`, `prix_coiffure`) VALUES
(2, 'Chion', 1400),
(3, 'Napi', 14000),
(4, 'Natte americain', 1200);

-- --------------------------------------------------------

--
-- Structure de la table `commande_coiffure`
--

DROP TABLE IF EXISTS `commande_coiffure`;
CREATE TABLE IF NOT EXISTS `commande_coiffure` (
  `id_coiffure` int NOT NULL,
  `login_coiffeur` varchar(100) NOT NULL,
  PRIMARY KEY (`id_coiffure`,`login_coiffeur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande_coiffure`
--

INSERT INTO `commande_coiffure` (`id_coiffure`, `login_coiffeur`) VALUES
(2, 'Clxt'),
(2, 'xx'),
(3, 'Clxt'),
(3, 'xx');

-- --------------------------------------------------------

--
-- Structure de la table `disponibilité`
--

DROP TABLE IF EXISTS `disponibilité`;
CREATE TABLE IF NOT EXISTS `disponibilité` (
  `id_dispo` int NOT NULL AUTO_INCREMENT,
  `jour` varchar(180) DEFAULT NULL,
  `heure` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_dispo`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `disponibilité`
--

INSERT INTO `disponibilité` (`id_dispo`, `jour`, `heure`) VALUES
(26, 'Lundi', '10h'),
(22, 'Jeudi', '09h'),
(27, 'Samedi', '08h'),
(24, 'Lundi', '08h'),
(25, 'Lundi', '09h');

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

DROP TABLE IF EXISTS `rendez_vous`;
CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `id_rdv` int NOT NULL AUTO_INCREMENT,
  `date_rdv` varchar(100) DEFAULT NULL,
  `statu_rdv` tinyint(1) NOT NULL DEFAULT '0',
  `login_coiffeur` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Non renseigner',
  `login_client` varchar(100) DEFAULT NULL,
  `login_caissière` varchar(100) DEFAULT NULL,
  `nom_coiffure` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `login_coiffeur` (`login_coiffeur`),
  KEY `login_client` (`login_client`),
  KEY `login_caissière` (`login_caissière`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `rendez_vous`
--

INSERT INTO `rendez_vous` (`id_rdv`, `date_rdv`, `statu_rdv`, `login_coiffeur`, `login_client`, `login_caissière`, `nom_coiffure`) VALUES
(17, 'Jeudi-09h', 0, 'Clxt', 'xx', 'Non-renseigné', 'Chion'),
(13, 'Lundi-10h', 0, 'Clxt', 'xx', 'Non-renseigné', 'Chion');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
