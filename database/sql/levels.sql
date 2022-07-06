-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 juil. 2022 à 14:38
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `distance_learning`
--

-- --------------------------------------------------------

--
-- Structure de la table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pension` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `levels`
--

INSERT INTO `levels` (`id`, `name`, `slug`, `description`, `pension`, `field_id`, `created_at`, `updated_at`) VALUES
(1, 'Level 1', 'level-1', NULL, 300000, 1, '2022-07-06 12:36:14', '2022-07-06 11:36:58'),
(2, 'Level 2', 'level-2', NULL, 300000, 1, '2022-07-06 12:36:15', '2022-07-06 11:36:51'),
(3, 'Level 3', 'level-3', NULL, 300000, 1, '2022-07-06 12:36:15', '2022-07-06 11:36:36'),
(4, 'Level 1', 'l1', 'Level 1 of Physics', 50000, 2, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(5, 'Level 2', 'l2', 'Level 2 of Physics', 50000, 2, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(6, 'Level 3', 'l3', 'Level 3 of Physics', 50000, 2, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(7, 'Level 1', 'l1', 'Level 1 of Computer Sciences', 50000, 3, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(8, 'Level 2', 'l2', 'Level 2 of Computer Sciences', 50000, 3, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(9, 'Level 3', 'l3', 'Level 3 of Computer Sciences', 50000, 3, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(10, 'Level 1', 'l1', 'Level 1 of Mathematics', 50000, 4, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(11, 'Level 2', 'l2', 'Level 2 of Mathematics', 50000, 4, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(12, 'Level 3', 'l3', 'Level 3 of Mathematics', 50000, 4, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(13, 'Level 1', 'l1', 'Level 1 of Chemistry', 50000, 5, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(14, 'Level 2', 'l2', 'Level 2 of Chemistry', 50000, 5, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(15, 'Level 3', 'l3', 'Level 3 of Chemistry', 50000, 5, '2022-07-06 12:36:15', '2022-07-06 12:36:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
