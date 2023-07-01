-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 09:48 PM
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
-- Database: `eorm_m18`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2023-06-28 17:42:50', '2023-06-28 17:42:50'),
(2, 'Web Development', '2023-06-28 17:42:50', '2023-06-28 17:42:50'),
(3, 'Design', '2023-06-28 17:42:50', '2023-06-28 17:42:50'),
(4, 'World', '2023-06-28 17:42:50', '2023-06-28 17:42:50'),
(5, 'Business', '2023-06-28 17:42:50', '2023-06-28 17:42:50');

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
(2, '2023_06_28_085810_create_categories_table', 1),
(3, '2023_06_28_090112_create_posts_table', 1),
(4, '2023_06_28_092133_add_foreign_key_to_posts_table', 2),
(5, '2023_06_29_003031_add_deleted_at_to_posts_table', 3);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `excerpt` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `excerpt`, `description`, `image`, `created_at`, `updated_at`, `category_id`, `deleted_at`) VALUES
(9, 'Fidelity preparing to submit spot bitcoin ETF filing: Source', 'Asset management giant Fidelity is close to submitting its own filing for a spot bitcoin exchange-traded fund, joining a long list of issuers keen to ', 'Asset management giant Fidelity is close to submitting its own filing for a spot bitcoin exchange-traded fund, joining a long list of issuers keen to be first to market with such a product. \r\n\r\nA source familiar with the firm\'s plans says that it could submit its filing as soon as Tuesday, following the lead of asset management giant BlackRock.\r\n\r\nBlackRock\'s June 15 filing has been followed by other asset managers looking to launch their own spot bitcoin funds including Invesco, WisdomTree and Bitwise.\r\n\r\nThis will be Fidelity\'s second attempt at such a product. In 2021, it filed for a bitcoin spot exchange-traded fund called the Wise Origin Bitcoin Trust but was denied by the U.S. Securities and Exchange Commission in early 2022.\r\n\r\nFidelity declined to comment when contacted by The Block. ', 'https://www.tbstat.com/wp/uploads/2020/12/20201214_Fidelity-Daily-1200x675.png', '2023-06-28 18:23:17', '2023-06-28 18:23:17', 5, NULL),
(10, 'Google is apparently canceling Pixel Fold preorders left and right', 'The orders that are impacted are those made through the Google Store.', 'What you need to know\r\n\r\n    Google is seemingly canceling preorders of its Pixel Fold placed through the Google Store.\r\n    The cancellations may be due to a system error or problems with payment verification.\r\n    Consumers across the U.S. and U.K. report the issue through their Reddit accounts.\r\n    It seems Google is aware of the issue.\r\n\r\nGoogle unveiled its first foldable phone, the Pixel Fold, at Google I/O last month. The much-awaited folding phone was soon up for preorder after the launch for consumers. Some of them, however, experience a delay in getting their order shipped, while others are having their orders canceled altogether.\r\n\r\nThere are reports that users are unexpectedly having their orders canceled. Several Reddit users (via r/GooglePixel) are among those that had their Pixel Fold preorders canceled, an issue that seems to affect users who have placed orders through the Google Store.\r\n\r\nIt seems the problem may be related to payment verification issues, but it\'s not clear if this is what\'s responsible for every canceled order. Some users contacted support and were eventually allowed to reorder instead of proceeding with the placed order.', 'https://cdn.mos.cms.futurecdn.net/7GEaX9nAdARwow2JRozLgN-970-80.jpg.webp', '2023-06-28 18:23:17', '2023-06-28 18:23:17', 1, NULL),
(11, 'Flying car startup eyes 2025 takeoff following US, EU certification', 'Flying cars have captured the public imagination for decades, but have yet to enter the mainstream.', 'Flying cars have captured the public imagination for decades, but have yet to enter the mainstream. However, with investors pouring cash into the sector, could the 2020s be the decade when sci-fi vision becomes reality? German startup Lilium certainly hopes so. \r\n\r\nThe startup announced this week that the design of its all-electric vertical take-off and landing (eVTOL) jet has been approved by the US Federal Aviation Administration (FAA). Lilium’s primary airworthiness authority, the European Union Aviation Safety Agency (EASA), issued its approval — known as a ‘certification basis’ — for the jet in 2020.   \r\n\r\nLilium, which has raised a whopping $1bn to date since its founding in 2015, has developed an eVTOL jet — which differs from the helicopter-style craft developed by most eVTOL startups —  that it hopes will take passengers faster and further than the competition. It aims to begin commercial flights from late 2025. ', 'https://img-cdn.tnwcdn.com/image?fit=1280%2C720&url=https%3A%2F%2Fcdn0.tnwcdn.com%2Fwp-content%2Fblogs.dir%2F1%2Ffiles%2F2023%2F06%2FLilium-jet-evtol-certification.jpg', '2023-06-28 18:34:57', '2023-06-28 18:34:57', 5, NULL),
(12, 'A cheaper Galaxy S23 is coming, and this is our first look at it', 'Samsung could very well go with Qualcomm’s Snapdragon 8+ Gen 1 chip to save costs on the silicon, while the mainline Galaxy S23 series relies on a slightly binned version of the Qualcomm Snapdragon 8 ', 'Samsung is apparently ready to launch a watered-down Galaxy S23 later this year, despite previous rumors it doesn’t exist. Smartprix has shared alleged renders of the Galaxy S23 Fan Edition (aka the Galaxy S23 FE), which is reportedly coming out later this year.\r\n\r\nNotably, Samsung skipped a Fan Edition treatment for the Galaxy S22 after launching an S21 FE variant. Instead, the company lowered the asking price of Galaxy S22 following the launch of Galaxy S23 last year, keeping the former on the shelf as an entry point to the Galaxy flagship experience.', 'https://www.digitaltrends.com/wp-content/uploads/2023/06/galaxy-s23-fe-angled-front-rear.jpg', '2023-06-28 18:39:03', '2023-06-28 18:39:03', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
