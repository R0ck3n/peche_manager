-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 30 juil. 2022 à 15:29
-- Version du serveur : 8.0.27
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `fishing_history`
--

DROP TABLE IF EXISTS `fishing_history`;
CREATE TABLE IF NOT EXISTS `fishing_history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fishing_zone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `session_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `session_ranking` int NOT NULL,
  `humidity` int NOT NULL,
  `precipitation` float NOT NULL,
  `temperature` int NOT NULL,
  `wind_speed` int NOT NULL,
  `pressure` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fishing_history`
--

INSERT INTO `fishing_history` (`id`, `fishing_zone`, `session_content`, `session_ranking`, `humidity`, `precipitation`, `temperature`, `wind_speed`, `pressure`, `user_id`, `created_at`) VALUES
(20, 'lac de la blanche', '5 black bass en fin de soirée', 5, 45, 0, 29, 17, 1021, 2, '2022-07-30 17:04:43'),
(21, 'Etang meteor', 'Aucun poisson ! Mais on a bien manger au retour !', 3, 27, 0, 31, 22, 1018, 2, '2022-07-30 17:05:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
