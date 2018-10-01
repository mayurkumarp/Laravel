-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2017 at 11:25 AM
-- Server version: 5.6.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `laravel_reusable`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE IF NOT EXISTS `guides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guides_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_19_071821_create_admin_table', 1),
('2016_12_19_072019_create_guide_table', 1),
('2016_12_19_083604_create_user_table', 1),
('2016_12_19_101456_create_user_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`(191)),
  KEY `password_resets_token_index` (`token`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_social` enum('G+','facebook') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_profile` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_type` enum('Web','Android','iOS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Web',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `email`, `username`, `password`, `phone_number`, `address`, `city`, `state`, `country`, `is_social`, `social_id`, `social_profile`, `profile_img`, `device_type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'first', 'last', '', 'test@gmail.com', 'test', '$2y$10$DYvwSqBR.hRfEKhKiGt0..RWmgBgJoH/VmmVjjqDdG//xxqfUY6Ya', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:43:53', '2017-07-17 03:43:53'),
(2, 'first', 'last', '', 'test11@gmail.com', 'test11', '$2y$10$JAyS46FdmZXkqdhRjOGEl.YmqD12eP2t9rIkXqW.ednhDZnmGJA0G', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:45:33', '2017-07-17 03:45:33'),
(3, 'first', 'last', '', 'test11nbvcnb@gmail.com', 'test11nbvcnb', '$2y$10$5rMO41xHvRESw/pFUJliheU8HQYJIeWgTAcjF2HMwdDO4fHdAmwga', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:48:09', '2017-07-17 03:48:09'),
(4, 'first', 'last', '', 'testbnvbnvb11nbvcnb@gmail.com', 'testbnvbnvb11nbvcnb', '$2y$10$Kr8sgijtkDw1C/ZKBfT79er2YUyhB1zf016hvZjVfgJerxTY/4/o.', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:48:58', '2017-07-17 03:48:58'),
(5, 'first', 'last', '', 'testbnvbnnbbvnbnvb11nbvcnb@gmail.com', 'testbnvbnnbbvnbnvb11nbvcnb', '$2y$10$625WIaytmJwsCY0eVlrrP.kQXcKVzkhsv567orJrwItJiboG5XUma', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:49:27', '2017-07-17 03:49:27'),
(6, 'first', 'last', '', 'testbnvbnnbbvnbnvbnvbvb11nbvcnb@gmail.com', 'testbnvbnnbbvnbnvbnvbvb11nbvcnb', '$2y$10$OCjOGNmbWZ9O7/SZ4gGnPeV35OKYzzft3qGjMUFEv1Qo1akj6AOaW', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Web', NULL, '2017-07-17 03:49:40', '2017-07-17 03:49:40'),
(7, 'first', 'last', '', 'testbnvbnnbbvnbnmbnbnvbnvbvb11nbvcnb@gmail.com', 'testbnvbnnbbvnbnmbnbnvbnvbvb11nbvcnb', '', '', 'dhvgjfhbjcv', NULL, NULL, NULL, 'facebook', 'vbvcbvcbcvbvc', 'vcbvcbvcbcvbcv', NULL, 'Web', NULL, '2017-07-17 03:50:40', '2017-07-17 04:15:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE IF NOT EXISTS `user_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `device_type` enum('Web','Android','iOS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Web',
  `device_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`id`, `user_id`, `device_type`, `device_token`, `created_at`, `updated_at`) VALUES
(1, 6, 'iOS', 'vcbvcbvcbvcvbvcb', '2017-07-17 03:49:40', '2017-07-17 03:49:40'),
(2, 7, 'iOS', 'vcbvcbvcbvcvbvcb', '2017-07-17 03:50:40', '2017-07-17 03:50:40');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
