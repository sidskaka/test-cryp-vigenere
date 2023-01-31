-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 31 jan. 2023 à 20:02
-- Version du serveur :  5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cryptdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `historytab`
--

CREATE TABLE `historytab` (
  `id` int(11) NOT NULL,
  `datedb` varchar(100) DEFAULT NULL,
  `cledb` varchar(100) DEFAULT NULL,
  `actiondb` varchar(100) DEFAULT NULL,
  `statusdb` varchar(100) DEFAULT NULL,
  `ipdb` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `historytab`
--

INSERT INTO `historytab` (`id`, `datedb`, `cledb`, `actiondb`, `statusdb`, `ipdb`) VALUES
(2, '2023-01-31 19:38:06', 'CLE', 'E', 'status', 'ip'),
(3, '2023-01-31 19:39:15', 'CLE', 'E', 'status', 'ip'),
(4, '2023-01-31 19:40:17', 'CLE', 'E', 'status', 'ip'),
(5, '2023-01-31 19:40:29', 'CLE', 'E', 'status', 'ip'),
(6, '2023-01-31 19:47:30', 'CLE', 'D', 'OK', '::1'),
(7, '2023-01-31 19:47:33', 'CLE', 'D', 'OK', '::1'),
(8, '2023-01-31 19:47:49', 'CLE', 'C', 'OK', '::1'),
(9, '2023-01-31 19:48:24', 'CLE', 'D', 'OK', '::1'),
(10, '2023-01-31 19:49:48', 'CLE', 'D', 'OK', '::1'),
(11, '2023-01-31 19:50:37', 'CLE', 'C', 'OK', '::1'),
(12, '2023-01-31 19:50:50', 'CLE', 'C', 'OK', '::1'),
(13, '2023-01-31 19:50:59', 'CLE', 'D', 'OK', '::1'),
(14, '2023-01-31 19:52:10', 'CLE', 'C', 'OK', '::1'),
(15, '2023-01-31 19:52:37', 'CLE', 'D', 'OK', '::1'),
(16, '2023-01-31 19:54:26', 'CLE', 'C', 'OK', '::1'),
(17, '2023-01-31 19:54:31', 'CLE', 'D', 'OK', '::1'),
(18, '2023-01-31 19:54:53', 'CLE', 'C', 'OK', '::1'),
(19, '2023-01-31 19:55:03', 'CLE', 'D', 'OK', '::1'),
(20, '2023-01-31 19:55:06', 'CLE', 'D', 'OK', '::1'),
(21, '2023-01-31 19:55:14', 'CLE', 'C', 'OK', '::1'),
(22, '2023-01-31 19:55:42', 'OKOK', 'C', 'OK', '::1'),
(23, '2023-01-31 19:56:02', 'KEY', 'D', 'OK', '::1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historytab`
--
ALTER TABLE `historytab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `historytab`
--
ALTER TABLE `historytab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
