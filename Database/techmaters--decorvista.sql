-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2024 at 05:30 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techmaters--decorvista`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `designer_id` bigint UNSIGNED NOT NULL,
  `portfolio_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = UnApproved, 2 = Scheduled, 3 = Completed, 4 = Cancelled',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_user_id_foreign` (`user_id`),
  KEY `appointments_designer_id_foreign` (`designer_id`),
  KEY `appointments_portfolio_id_foreign` (`portfolio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `designer_id`, `portfolio_id`, `status`, `created_by`, `created_date`) VALUES
(1, 1, 1, 1, 2, 'Zubair Desai', '2024-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_images`
--

DROP TABLE IF EXISTS `blog_images`;
CREATE TABLE IF NOT EXISTS `blog_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blog_images_blog_id_foreign` (`blog_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultants`
--

DROP TABLE IF EXISTS `consultants`;
CREATE TABLE IF NOT EXISTS `consultants` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `portfolio_id` bigint UNSIGNED NOT NULL,
  `available_at` date NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `consultants_portfolio_id_foreign` (`portfolio_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultants`
--

INSERT INTO `consultants` (`id`, `portfolio_id`, `available_at`, `message`, `status`, `created_by`, `created_date`) VALUES
(1, 1, '2024-09-21', 'Message', 1, 'Zubair Desai', '2024-09-21'),
(2, 2, '2024-09-21', 'Message', 1, 'Zubair Desai', '2024-09-21'),
(3, 2, '2024-09-05', 'Message 2', 1, 'Zubair Desai', '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_category_id_foreign` (`category_id`),
  KEY `galleries_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventories`
--

DROP TABLE IF EXISTS `inventories`;
CREATE TABLE IF NOT EXISTS `inventories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `sku` int NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `inventories_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(105, '2014_10_12_000000_create_users_table', 5),
(106, '2014_10_12_100000_create_password_reset_tokens_table', 5),
(107, '2019_08_19_000000_create_failed_jobs_table', 5),
(108, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(109, '2024_09_18_100240_add_role_to_users_table', 5),
(110, '2024_09_18_101212_add_verification_code_to_users_table', 5),
(111, '2024_09_18_133852_create_blogs_table', 5),
(112, '2024_09_18_133856_create_blog_images_table', 5),
(113, '2024_09_19_041805_create_gallery_categories_table', 5),
(114, '2024_09_19_082238_create_product_categories_table', 5),
(115, '2024_09_19_092235_create_products_table', 5),
(116, '2024_09_19_092239_create_product_images_table', 5),
(117, '2024_09_19_092820_create_inventories_table', 5),
(118, '2024_09_19_100916_create_product_reviews_table', 5),
(119, '2024_09_19_112507_create_contact_us_table', 5),
(120, '2024_09_19_143733_create_portfolios_table', 5),
(121, '2024_09_19_143745_create_portfolio_images_table', 5),
(122, '2024_09_19_153704_create_consultants_table', 5),
(123, '2024_09_19_153745_create_appointments_table', 5),
(124, '2024_09_20_132114_add_column_users_table', 5),
(125, '2024_09_20_132133_add_column_product_images_table', 5),
(126, '2024_09_20_152556_add_column_appointments_table', 5),
(99, '2024_09_20_155440_add_column_to_portfolio_table', 4),
(127, '2024_09_20_194946_create_galleries_table', 5),
(128, '2024_09_21_014917_add_column_to_galleries', 5),
(129, '2024_09_21_072805_create_orders_table', 5),
(130, '2024_09_21_075125_create_order_billing_addresses_table', 5),
(131, '2024_09_21_080450_create_order_details_table', 5),
(132, '2024_09_21_124229_add_column_to_order_details', 6),
(133, '2024_09_21_124206_add_column_to_orders', 7),
(134, '2024_09_21_152632_create_portfolios_table', 8),
(135, '2024_09_21_152654_create_consultants_table', 8),
(136, '2024_09_22_153745_create_appointments_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `billing_id` bigint UNSIGNED NOT NULL,
  `sub_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charges` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = UnApproved, 2 = Approved, 3 = Dispatched, 4 = Completed, 5 = Rejected',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_billing_id_foreign` (`billing_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_id`, `sub_total`, `shipping_charges`, `grand_total`, `status`, `created_by`, `created_date`) VALUES
(1, 1, 1, '2300', '10', '2310', 1, 'Zubair Desai', '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `order_billing_addresses`
--

DROP TABLE IF EXISTS `order_billing_addresses`;
CREATE TABLE IF NOT EXISTS `order_billing_addresses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` int NOT NULL,
  `housenumberandstreet` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalcode` int NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_billing_addresses`
--

INSERT INTO `order_billing_addresses` (`id`, `name`, `email`, `Phone`, `housenumberandstreet`, `apartment`, `city`, `postalcode`, `notes`, `status`, `created_by`, `created_date`) VALUES
(1, 'Zubair Desai', 'zubairdesai2006@gmail.com', 11223344, 'Muslimabad Street No 1', 'Banglow 4/1', 'Karachi', 20000, 'Notes', 1, 'Zubair Desai', '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `sub_total` int NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  KEY `order_details_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `sub_total`, `status`, `created_by`, `created_date`) VALUES
(1, 1, 1, 1, 300, 1, 'Zubair Desai', '2024-09-21'),
(2, 2, 1, 1, 1000, 1, 'Zubair Desai', '2024-09-21'),
(3, 3, 1, 1, 1000, 1, 'Zubair Desai', '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `designer_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `portfolio_link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolios_designer_id_foreign` (`designer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `designer_id`, `title`, `description`, `portfolio_link`, `image_path`, `status`, `created_by`, `created_date`) VALUES
(1, 1, 'Pixel House', 'A while ago, in the year 2017, we promised new clients of ours that we know how to do a “gradient wall”. One that starts sealed but fades and disappears into nothing.', 'https://www.youtube.com/', 'portfolio_images/main/1726932762_5.jpg', 1, 'Zubair Desai', '2024-09-21'),
(2, 1, 'La Fuente Condo', 'A while ago, in the year 2017, we promised new clients of ours that we know how to do a “gradient wall”. One that starts sealed but fades and disappears into nothing.', 'https://www.youtube.com/', 'portfolio_images/main/1726934004_3.jpg', 1, 'Zubair Desai', '2024-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `star_rating` tinyint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 = Active , 2 = Inactive',
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_product_id_foreign` (`product_id`),
  KEY `product_reviews_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint UNSIGNED NOT NULL DEFAULT '1' COMMENT '1 = user, 2 = designer, 3 = admin',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `verification_code`, `role`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zubair Desai', 'pubg123pingplayer@gmail.com', NULL, '$2y$10$4CHHj9115KC7TPgtr07hOOHSSX0mHoEylxcwm8TnPG2r5T0R.wHbm', '140414', 1, NULL, NULL, '2024-09-21 08:01:24', '2024-09-21 23:56:02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
