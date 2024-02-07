-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 07 fév. 2024 à 07:28
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `metroboulotdodo`
--

-- --------------------------------------------------------

--
-- Structure de la table `modedetransport`
--

CREATE TABLE `modedetransport` (
  `id_modedetransport` int NOT NULL,
  `Type_modedetransport` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `modedetransport`
--

INSERT INTO `modedetransport` (`id_modedetransport`, `Type_modedetransport`) VALUES
(1, 'velo'),
(2, 'Marche à pied'),
(3, 'Skate'),
(4, 'trotinette'),
(5, 'Roller'),
(6, 'Hoverboard');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `modedetransport`
--
ALTER TABLE `modedetransport`
  ADD PRIMARY KEY (`id_modedetransport`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `modedetransport`
--
ALTER TABLE `modedetransport`
  MODIFY `id_modedetransport` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
