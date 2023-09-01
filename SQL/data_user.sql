-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 01 sep. 2023 à 13:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `data_user`
--

-- --------------------------------------------------------

--
-- Structure de la table `display_point`
--

CREATE TABLE `display_point` (
  `ID` int(11) NOT NULL,
  `team` text NOT NULL,
  `name` text NOT NULL,
  `point` int(11) NOT NULL,
  `motif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `team_point`
--

CREATE TABLE `team_point` (
  `Team_Color` text NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `team_point`
--

INSERT INTO `team_point` (`Team_Color`, `Point`) VALUES
('Yellow', 0),
('Green', 0),
('Blue', 0),
('Red', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `Mail` text NOT NULL,
  `Name` text NOT NULL,
  `Point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Mail`, `Name`, `Point`) VALUES
('aa@epitech.eu', 'Andre Stana', 0),
('bb@epitech.eu', 'Julien Roy', 0),
('cc@epitech.com', 'cc', 0),
('dd@epitech.eu', 'dd', 0),
('ee@epitech.eu', 'ee', 0),
('ff@epitech.eu', 'ff', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `display_point`
--
ALTER TABLE `display_point`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `display_point`
--
ALTER TABLE `display_point`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
