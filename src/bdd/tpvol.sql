-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 26 mars 2025 à 08:02
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
-- Base de données : `tpvol`
--

-- --------------------------------------------------------

--
-- Structure de la table `avion`
--

DROP TABLE IF EXISTS `avion`;
CREATE TABLE IF NOT EXISTS `avion` (
    `id_avion` int NOT NULL AUTO_INCREMENT,
    `type` varchar(20) NOT NULL,
    PRIMARY KEY (`id_avion`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
    `id_reservation` int NOT NULL AUTO_INCREMENT,
    `id_utilisateur` int NOT NULL,
    `id_avion` int NOT NULL,
    `date_reservation` date NOT NULL,
    PRIMARY KEY (`id_reservation`),
    KEY `id_avion` (`id_avion`),
    KEY `id_utilisateur` (`id_utilisateur`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `id_utilisateur` int NOT NULL AUTO_INCREMENT,
    `nom` varchar(20) NOT NULL,
    `prenom` varchar(20) NOT NULL,
    `email` varchar(30) NOT NULL,
    `date_naissance` date NOT NULL,
    `ville` varchar(20) NOT NULL,
    `role` text NOT NULL,
    PRIMARY KEY (`id_utilisateur`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `vol`
--

DROP TABLE IF EXISTS `vol`;
CREATE TABLE IF NOT EXISTS `vol` (
    `id_vol` int NOT NULL AUTO_INCREMENT,
    `heure_dep` time NOT NULL,
    `heure_arv` time NOT NULL,
    `id_avion` int NOT NULL,
    `prix` decimal(10,0) NOT NULL,
    PRIMARY KEY (`id_vol`),
    KEY `id_avion` (`id_avion`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
