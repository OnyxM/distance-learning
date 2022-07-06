-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 juil. 2022 à 14:00
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu_naissance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` enum('0','2','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `teacher_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `email_verified_at`, `password`, `date_naissance`, `lieu_naissance`, `priority`, `photo`, `teacher_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Account', 'admin@domain.com', '2022-07-06 10:50:26', '$2y$10$GwlBhNEVXG.R.Wuq7.WRZ.V5D78j.LiEQfcgPaD1FvR.P.6BNYI..', '1995-06-25', 'HomeCity', '5', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:50:26', '2022-07-06 10:50:26'),
(2, 'User', 'Account', 'user@domain.com', '2022-07-06 10:50:26', '$2y$10$AtTKUn8WMp6UZFcRQb3LBeGKJAPjCkvGq28q5C0jfCz3LiNG67UYu', '1995-06-25', 'HomeCity', '0', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:50:26', '2022-07-06 10:50:26'),
(3, 'Dan', 'Account', 'dan@domain.com', '2022-07-06 10:50:26', '$2y$10$i6tDt.eYp47wfTbhnM7.ie2xy/FHNSX/RQIObenR..pTs1zl0blcK', '1995-06-25', 'HomeCity', '0', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:50:26', '2022-07-06 10:50:26'),
(4, 'Leonel', 'MOYOU', 'moyouleonel@gmail.com', NULL, '$2y$10$5TRk.XkmhSZNtyqasgfJD..uE9LkZZYNA5ohQuO2HN3TRX9nisQBW', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:52:35', '2022-07-06 10:52:35'),
(5, 'Alidou', 'AMINOU', 'alidouamino@gmail.com', NULL, '$2y$10$mFQt0hDW5BQFML/XCeEWueYX.ukTZnI3Mr7shKSAloh2jisaodEWC', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:54:09', '2022-07-06 10:54:09'),
(6, 'Corneille', 'TCIHO', 'corneilletchio@gmail.com', NULL, '$2y$10$Z/A2IbVOHsRxNDy3jIuKP.JIFF/H89LS3vijAOkP7vxO3EV2.gx/2', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:54:43', '2022-07-06 10:54:43'),
(7, 'Thomas', 'MESSI', 'thomasmessi@gmail.com', NULL, '$2y$10$nr5d3AWKzXrlIyACX6QYXeDncSEMvN9cV78N4Tk12D0.WcX.d7Kbu', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:56:12', '2022-07-06 10:56:12'),
(8, 'Mike', 'TAPAMO', 'miketapamo@gmail.com', NULL, '$2y$10$4h4f/gkcERbpLPw4VfBX2.5dE.Bf8bG80QeuRZu/34jzMOEoQ5sey', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-06 10:57:28', '2022-07-06 10:57:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
