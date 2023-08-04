-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 07:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xshop_apps`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', '12345678901', '123 Main Street, City', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(2, 'Jane Smith', 'jane.smith@example.com', '98765432102', '456 Park Avenue, Town', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(3, 'Michael Johnson', 'michael.johnson@example.com', '56789012303', '789 Oak Lane, Village', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(4, 'Emily Williams', 'emily.williams@example.com', '32109876504', '321 Elm Court, County', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(5, 'Robert Brown', 'robert.brown@example.com', '78901234505', '567 Maple Road, State', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(6, 'Sarah Lee', 'sarah.lee@example.com', '23456789006', '890 Pine Avenue, Country', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(7, 'David Kim', 'david.kim@example.com', '89012345607', '234 Cedar Lane, Kingdom', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(8, 'Jessica Chen', 'jessica.chen@example.com', '45678901208', '456 Birch Street, Empire', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(9, 'William Park', 'william.park@example.com', '67890123409', '678 Walnut Drive, Realm', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(10, 'Olivia Lee', 'olivia.lee@example.com', '78901234510', '789 Oak Lane, Dominion', 1, '2023-08-03 14:20:18', '2023-08-03 14:20:18'),
(11, 'Jane Doe', 'jane.doe@example.com', '98765432202', '468 Park Avenue, City', 1, '2023-08-03 08:25:32', '2023-08-04 00:01:46'),
(12, 'Ratul Hossain', 'ratuljde@gmail.com', '01602888998', 'Jashore Sadar, Jashore', 1, '2023-08-03 12:44:49', '2023-08-03 12:44:49'),
(13, 'Rabbil Hasan', 'engr.rabbil@yahoo.com', '01785388919', 'Mohammadpur, Dhaka', 1, '2023-08-03 23:56:33', '2023-08-03 23:56:33');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_02_160831_create_users_table', 1),
(3, '2023_08_02_170000_create_customers_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ratul', 'Hossain', 'iamratul93@gmail.com', '01602888998', 'Jashore Sadar, Jashore', '1234', '2023-08-02 10:33:08', '2023-08-02 10:33:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
