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
-- Structure de la table `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `slug`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'Semester 1', 'semester-1', 1, '2022-07-06 12:36:14', '2022-07-06 12:36:14'),
(2, 'Semester 2', 'semester-2', 1, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(3, 'Semester 1', 'semester-1', 2, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(4, 'Semester 2', 'semester-2', 2, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(5, 'Semester 1', 'semester-1', 3, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(6, 'Semester 2', 'semester-2', 3, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(7, 'Semester 1', 'semester-1', 4, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(8, 'Semester 2', 'semester-2', 4, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(9, 'Semester 1', 'semester-1', 5, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(10, 'Semester 2', 'semester-2', 5, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(11, 'Semester 1', 'semester-1', 6, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(12, 'Semester 2', 'semester-2', 6, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(13, 'Semester 1', 'semester-1', 7, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(14, 'Semester 2', 'semester-2', 7, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(15, 'Semester 1', 'semester-1', 8, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(16, 'Semester 2', 'semester-2', 8, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(17, 'Semester 1', 'semester-1', 9, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(18, 'Semester 2', 'semester-2', 9, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(19, 'Semester 1', 'semester-1', 10, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(20, 'Semester 2', 'semester-2', 10, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(21, 'Semester 1', 'semester-1', 11, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(22, 'Semester 2', 'semester-2', 11, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(23, 'Semester 1', 'semester-1', 12, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(24, 'Semester 2', 'semester-2', 12, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(25, 'Semester 1', 'semester-1', 13, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(26, 'Semester 2', 'semester-2', 13, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(27, 'Semester 1', 'semester-1', 14, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(28, 'Semester 2', 'semester-2', 14, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(29, 'Semester 1', 'semester-1', 15, '2022-07-06 12:36:15', '2022-07-06 12:36:15'),
(30, 'Semester 2', 'semester-2', 15, '2022-07-06 12:36:15', '2022-07-06 12:36:15');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
