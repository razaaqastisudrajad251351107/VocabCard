-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2026 at 11:36 AM
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
-- Database: `vocabcard`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`) VALUES
(1, 'Noun'),
(2, 'Verb'),
(3, 'Adjective');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vocab_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `vocab_id`) VALUES
(2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `user_id`, `score`, `total_question`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, '2026-06-08 01:57:23', '2026-06-08 01:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sentences`
--

CREATE TABLE `sentences` (
  `id` int(11) NOT NULL,
  `vocab_id` int(11) DEFAULT NULL,
  `english` text DEFAULT NULL,
  `indonesia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sentences`
--

INSERT INTO `sentences` (`id`, `vocab_id`, `english`, `indonesia`) VALUES
(2, 1, 'I eat an apple every day.', 'Saya makan sebuah apel setiap hari.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'Raja', 'raja23@gmail.com', '$2y$12$ZJlfHiwBwY1B7WeeYUG9veWCTbwJR3vCmX8sx8xaMT0q9UavLrMpO', '2026-06-07 23:27:01', '2026-06-07 23:27:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vocabs`
--

CREATE TABLE `vocabs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `word` varchar(100) DEFAULT NULL,
  `meaning` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vocabs`
--

INSERT INTO `vocabs` (`id`, `user_id`, `category_id`, `word`, `meaning`) VALUES
(1, NULL, 2, 'oke', 'awa'),
(4, NULL, 1, 'jakns', 'jkaj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vocab_id` (`vocab_id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vocab_id` (`vocab_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vocabs`
--
ALTER TABLE `vocabs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sentences`
--
ALTER TABLE `sentences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vocabs`
--
ALTER TABLE `vocabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`vocab_id`) REFERENCES `vocabs` (`id`);

--
-- Constraints for table `sentences`
--
ALTER TABLE `sentences`
  ADD CONSTRAINT `sentences_ibfk_1` FOREIGN KEY (`vocab_id`) REFERENCES `vocabs` (`id`);

--
-- Constraints for table `vocabs`
--
ALTER TABLE `vocabs`
  ADD CONSTRAINT `vocabs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `vocabs_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
