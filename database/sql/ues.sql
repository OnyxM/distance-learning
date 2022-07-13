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
-- Structure de la table `ues`
--

CREATE TABLE `ues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'co-1.jpg',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `requirements` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `syllabus` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ues`
--

INSERT INTO `ues` (`id`, `name`, `code`, `slug`, `photo`, `description`, `requirements`, `syllabus`, `semester_id`, `created_at`, `updated_at`) VALUES
(1, 'Digital communication', 'ict316', 'digital-communication', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:03', '2022-07-13 21:13:03'),
(2, 'Computer Forensics and Incident Response', 'ict314', 'computer-forensics-and-incident-response', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:23', '2022-07-13 21:13:23'),
(3, 'Software Development in Java II', 'ict308', 'software-development-in-java-ii', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:54', '2022-07-13 21:13:54'),
(4, 'Business Intelligence', 'ict306', 'business-intelligence', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:14:17', '2022-07-13 21:14:17'),
(5, 'Software Testing and Deployment', 'ict304', 'software-testing-and-deployment', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:15:43', '2022-07-13 21:15:43'),
(6, 'Cyber and Internet Security', 'ict313', 'cyber-and-internet-security', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:16:36', '2022-07-13 21:16:36'),
(7, 'Software Architectures and Design', 'ict301', 'software-architectures-and-design', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:18:08', '2022-07-13 21:18:08'),
(8, 'Data Communication and Security', 'ict303', 'data-communication-and-security', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:18:33', '2022-07-13 21:18:33'),
(9, 'Web Application Development', 'ict305', 'web-application-development', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:20:26', '2022-07-13 21:20:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ues`
--
ALTER TABLE `ues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ues_code_unique` (`code`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ues`
--
ALTER TABLE `ues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
