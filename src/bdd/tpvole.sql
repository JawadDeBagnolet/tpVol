-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 avr. 2025 à 07:09
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tpvole`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
  `id_avion` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `ref_modele` int DEFAULT NULL,
  PRIMARY KEY (`id_avion`),
  KEY `ref_modele` (`ref_modele`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `conges`
--

DROP TABLE IF EXISTS `conges`;
CREATE TABLE IF NOT EXISTS `conges` (
  `id_conges` int NOT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `est_valide` tinyint(1) DEFAULT NULL,
  `ref_pilote` int DEFAULT NULL,
  `ref_validation_admin` int DEFAULT NULL,
  PRIMARY KEY (`id_conges`),
  KEY `ref_pilote` (`ref_pilote`),
  KEY `ref_validation_admin` (`ref_validation_admin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `modele`
--

DROP TABLE IF EXISTS `modele`;
CREATE TABLE IF NOT EXISTS `modele` (
  `id_modele` int NOT NULL,
  `modele` varchar(100) DEFAULT NULL,
  `marque` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int NOT NULL,
  `ref_utilisateur` int DEFAULT NULL,
  `ref_vol` int DEFAULT NULL,
  `prix_billet` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `ref_utilisateur` (`ref_utilisateur`),
  KEY `ref_vol` (`ref_vol`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `ville` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `ref_modele` int DEFAULT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `ref_modele` (`ref_modele`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
  `id_vol` int NOT NULL,
  `ville_depart` varchar(100) DEFAULT NULL,
  `ville_arrive` varchar(100) DEFAULT NULL,
  `date_depart` date DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `prix_billter_initiale` decimal(10,2) DEFAULT NULL,
  `ref_pilote` int DEFAULT NULL,
  `ref_avion` int DEFAULT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `ref_pilote` (`ref_pilote`),
  KEY `ref_avion` (`ref_avion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
