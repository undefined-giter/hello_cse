-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 05:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hello`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Hello Admin', 'hello@hello.com', '$2y$12$ZjFxEX7O.x2w07RTKAOtCOlUmH4yNfDyVoefgcALFO3MQZfgVvvh.', '2024-09-02 11:51:45', '2024-09-02 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_30_184703_create_admins_table', 1),
(5, '2024_08_30_185029_create_profiles_table', 1),
(6, '2024_09_01_133019_modify_image_nullable_in_profiles_table', 1),
(7, '2024_09_02_141755_drop_unused_tables', 2);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('inactif','en attente','actif') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `first_name`, `last_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Margaud', 'Bigot', 'profiles/16.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(2, 'Lucy', 'Bouvier', 'profiles/15.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(3, 'Denis', 'Baudry', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(4, 'Hugues', 'Parent', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(5, 'Manon', 'Leclercq', 'profiles/28.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(6, 'Zacharie', 'Costa', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(7, 'Aimé', 'Benoit', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(8, 'Louise', 'Riviere', 'profiles/12.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(9, 'Émilie', 'Mathieu', 'profiles/20.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(10, 'Henriette', 'Pasquier', 'profiles/27.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(11, 'Aimé', 'Aubry', 'profiles/25.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(12, 'Rémy', 'Barbier', 'profiles/22.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(13, 'Noël', 'Guillon', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(14, 'François', 'Goncalves', 'profiles/33.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(15, 'Victor', 'Rodrigues', 'profiles/6.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(16, 'Sébastien', 'Lefevre', 'profiles/9.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(17, 'Matthieu', 'Georges', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(18, 'Thérèse', 'Hebert', 'profiles/23.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(19, 'Jules', 'Bouvier', 'profiles/38.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(20, 'Joseph', 'Berthelot', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(21, 'Éric', 'Besnard', 'profiles/32.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(22, 'Agathe', 'Chevallier', 'profiles/3.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(23, 'Isaac', 'Gomez', 'profiles/36.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(24, 'Marcelle', 'Marchal', 'profiles/34.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(25, 'Eugène', 'Lemaire', 'profiles/24.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(26, 'Noël', 'Remy', 'profiles/10.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(27, 'Camille', 'Blin', 'profiles/19.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(28, 'Adélaïde', 'Reynaud', 'profiles/37.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(29, 'Geneviève', 'Costa', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(30, 'Aurélie', 'Vincent', 'profiles/5.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(31, 'Grégoire', 'Dupuis', 'profiles/13.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(32, 'Pierre', 'Bailly', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(33, 'Guy', 'Antoine', 'profiles/17.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(34, 'Roger', 'Durand', 'profiles/21.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(35, 'Jean', 'Munoz', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(36, 'Julien', 'Guillaume', 'profiles/31.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(37, 'Étienne', 'Boutin', 'profiles/18.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(38, 'Odette', 'Lemaitre', 'profiles/29.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(39, 'Augustin', 'Le Roux', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(40, 'Geneviève', 'Teixeira', 'profiles/1.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(41, 'Anne', 'Gerard', 'profiles/30.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(42, 'Aurélie', 'Boutin', 'profiles/35.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(43, 'Margaux', 'Lecomte', 'profiles/11.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(44, 'Susan', 'Bousquet', 'profiles/26.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(45, 'Louis', 'Masson', 'profiles/2.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(46, 'Laurent', 'Perrot', 'profiles/8.jpg', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(47, 'Georges', 'Delannoy', 'profiles/default_user_img.png', 'en attente', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(48, 'Camille', 'Philippe', 'profiles/14.jpg', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(49, 'Pierre', 'Jean', 'profiles/7.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(50, 'Richard', 'Vincent', 'profiles/4.jpg', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(51, 'Lorraine', 'Pascal', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(52, 'Benjamin', 'Lecoq', 'profiles/default_user_img.png', 'inactif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(53, 'Bernadette', 'Robert', 'profiles/default_user_img.png', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(54, 'Isaac', 'Thibault', 'profiles/default_user_img.png', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18'),
(55, 'Patricia', 'Pottier', 'profiles/default_user_img.png', 'actif', '2024-09-02 12:47:11', '2024-09-02 12:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7u7HQOu5TAxX25BHs67PmsvMqjXiYqmeY0o3KoMj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiODlXZUI4R1I3TXJoOXhRNFZZV2dlaHdOY2EzUDJSaFRBT1EyRXh2NCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlcz9wYWdlPTEiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1725288703);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
