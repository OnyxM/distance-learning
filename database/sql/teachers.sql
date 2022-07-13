-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 juil. 2022 à 00:22
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
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `title`, `name`, `poste`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ing', 'Leonel MOYOU', 'Teacher', 4, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(2, 'Dr', 'Alidou AMINOU', 'Teacher', 5, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(3, 'Ing', 'Corneille TCHIO', 'Teacher', 6, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(4, 'Dr', 'Thomas MESSI', 'Teacher', 7, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(5, 'Dr', 'Mike TAPAMO', 'Teacher', 8, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(6, 'Dr', 'Xaveira Kimbi', 'Poste', 9, '2022-07-13 21:15:29', '2022-07-13 21:15:29'),
(7, 'Dr', 'Valéry Monthe', 'Lecturer', 10, '2022-07-13 21:17:38', '2022-07-13 21:17:38'),
(8, 'Ing', 'Njine Chuangueu', 'Lecturer', 11, '2022-07-13 21:19:41', '2022-07-13 21:19:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
