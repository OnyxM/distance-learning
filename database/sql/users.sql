-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 14 juil. 2022 à 00:21
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
(1, 'Admin', 'Account', 'admin@domain.com', '2022-07-13 21:09:49', '$2y$10$rXb7NTlWNM5vFWmedafnve3JJxDjHW4wvTxPqVt4TWeQajRD4EdKS', '1995-06-25', 'HomeCity', '5', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(2, 'User', 'Account', 'user@domain.com', '2022-07-13 21:09:49', '$2y$10$wHgB9pL9fBjJ7ed4mbXA.Ou./aeL1o5tc964tBZFCC96Ck7ktzSEm', '1995-06-25', 'HomeCity', '0', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(3, 'Dan', 'Account', 'dan@domain.com', '2022-07-13 21:09:49', '$2y$10$Y.byy3vbyv7Lp712P.L42uJcpiK1WwFQMMpHRg6FCG5FywQWN1Jc.', '1995-06-25', 'HomeCity', '0', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(4, 'Leonel', 'MOYOU', 'moyouleonel@gmail.com', '2022-07-13 21:09:49', '$2y$10$N.lLgQ4z74lHLJRACS/MQeImWuveuMcpOiQJzkI5yNkLaNKkwyFLm', '1995-06-25', 'HomeCity', '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(5, 'Alidou', 'AMINOU', 'alidouamino@gmail.com', '2022-07-13 21:09:49', '$2y$10$Tm1G0y/SGCDJh1xjDKd.yeZAIlUxm0p/acGL7VGv0rRs6B7yTKOpq', '1995-06-25', 'HomeCity', '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(6, 'Corneille', 'TCHIO', 'corneilletchio@gmail.com', '2022-07-13 21:09:49', '$2y$10$pov/v/h5Il3UuW0gzSjCquU6QqvQomLkb7KbDuPozTP5i75M918Eu', '1995-06-25', 'HomeCity', '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(7, 'Thomas', 'MESSI', 'thomasmessi@gmail.com', '2022-07-13 21:09:50', '$2y$10$ioQKHUuzSmVx.T/.coHJj.5QHRQRYuWzyOEci1CK6fXUokJhflhA.', '1995-06-25', 'HomeCity', '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(8, 'Mike', 'TAPAMO', 'miketapamo@gmail.com', '2022-07-13 21:09:50', '$2y$10$lMa3U5wxBgu340u.Z68KCOxH6FPUR0a6ppvLzQBMcwT/O0GjPmEsC', '1995-06-25', 'HomeCity', '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(9, 'Xaveira', 'Kimbi', 'xaveirakimbi@gmail.com', NULL, '$2y$10$Uq59UR7KjadFHQIJeTinQO80s6HmVuj3l57GTFzjLfkMwsV7gP9Gu', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:15:29', '2022-07-13 21:15:29'),
(10, 'Valéry', 'Monthe', 'valerymonthe@gmail.com', NULL, '$2y$10$QqeY4oLbwglmb3gP.38KCuhQYy6oNgeaZPglNGVBgfuFHdQGSPZIu', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:17:38', '2022-07-13 21:17:38'),
(11, 'Njine', 'Chuangueu', 'njinechuangueu@gmail.com', NULL, '$2y$10$LoM08J..tfhnKlDWw3AfBOLTBjXbxEU2thtLyjD7OLyjue/gzGTnu', NULL, NULL, '2', 'avatar.png', NULL, NULL, NULL, '2022-07-13 21:19:41', '2022-07-13 21:19:41');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
