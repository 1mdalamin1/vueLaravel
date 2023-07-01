-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2023 at 09:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backendlaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ice cream ', '1', 'cat-ice-crim.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(2, 1, 'Stationery ', '1', 'cat-chal.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, 'Grocery', '1', 'cat-grocery.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(4, 1, 'Fish', '1', 'cat-fish.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(5, 1, 'Grocery', '1', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(6, 1, 'Fruits', '1', 'cat-fruit.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(7, 1, 'Vegetable', '1', 'cat-vegetable.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(8, 1, 'Fresh Fruits Collection', '0', 'cat-fruit.png', 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(9, 1, 'Vegetable Collection', '0', 'cat-vegetable.png', 1, '2022-07-09 11:03:39', '2023-06-29 11:36:00'),
(10, 1, 'Grocery Collection', '0', 'cat-grocery.png', 1, '2022-07-09 11:03:39', '2022-07-11 23:37:45'),
(14, 1, 'Tanvir Cars', '1', 'authentic-products.png', 1, '2023-04-12 18:28:37', '2023-06-30 04:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `copy_right` varchar(250) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `linkedin` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `github` varchar(100) DEFAULT NULL,
  `web` varchar(100) DEFAULT NULL,
  `creator` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `user_id`, `logo`, `description`, `copy_right`, `phone`, `email`, `address`, `fb`, `linkedin`, `twitter`, `instagram`, `github`, `web`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'logo1.png', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati', '2022 Copyright All Reserved by vir-za.com', '01795815660', 'virza.bd@gmail.com', 'Saver, Dhaka - 1340, Bangladesh.', 'https://www.facebook.com/virza805', 'https://www.linkedin.com/in/1mdalamin1/', 'https://twitter.com/1mdalamin1', 'https://www.google.com.bd/maps/@23.851216,90.2821951,16z?hl=en&authuser=0', 'https://github.com/virza805', 'https://vir-za.com/', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `footer_tops`
--

CREATE TABLE `footer_tops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `icon_img` varchar(300) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creator` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `footer_tops`
--

INSERT INTO `footer_tops` (`id`, `user_id`, `icon_img`, `title`, `description`, `creator`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Saturday - Wednesday', '9AM – 5PM', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(2, 1, NULL, 'Thursday', '9AM – 12PM', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, NULL, 'Friday', 'Closed', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(4, 1, 'customer-support.png', 'Support 24 Hour', 'Any time Support', NULL, 1, '2022-07-09 11:03:39', '2023-06-30 04:59:36'),
(5, 1, 'authentic-products.png', 'Authentic Products', 'Contact us 24 hours', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(6, 1, 'secure-payment.png', 'Secure Payment', 'Easy & secure payment', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(7, 1, 'best-price.png', 'Prices & Offers', 'Enjoy Offers...', NULL, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_06_10_015747_create_contacts_table', 1),
(11, '2022_06_10_020313_create_jobs_table', 1),
(12, '2022_06_13_093927_create_task_lists_table', 1),
(13, '2022_06_22_071803_create_footers_table', 1),
(14, '2022_06_25_023614_create_footer_tops_table', 1),
(15, '2022_06_25_134255_create_categories_table', 1),
(16, '2022_06_25_134436_create_sub_categories_table', 1),
(17, '2022_06_25_142308_create_sliders_table', 1),
(18, '2022_06_28_072134_create_products_table', 1),
(19, '2023_04_12_171059_create_tags_table', 2),
(20, '2023_04_29_070405_create_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` char(36) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2ad5a6795964d4bc66e017f9f81743e6bbc96af7e34bef4c81046126b5431704510fa3198a81d447', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2022-07-11 22:27:54', '2022-07-11 22:27:54', '2023-07-12 04:27:54'),
('2d152d1ea9927e00a7f8e95fe84171573a25f750144e9be423b37987abbcccdc5735f4c8ff5752fe', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-07-01 01:37:08', '2023-07-01 01:37:08', '2024-07-01 07:37:08'),
('65146d7e8fe34d7ac2c6c4d1ece52b71bd878ace4bb577c7e7abd5f12a99df5fb39f417846f3e825', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-03-26 00:45:14', '2023-03-26 00:45:14', '2024-03-26 06:45:14'),
('67f70513f0873d67988f7381f0bba58aec6a299b263ad3c486810f084f7aecef7e07b3636fa9d057', 5, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-04-30 06:28:24', '2023-04-30 06:28:24', '2024-04-30 12:28:24'),
('91c017e2b65b61feba5a3d0212b0241c6b2b1df1b59490f13e08fbee19efa0e6d86533218f86ad97', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2022-07-11 22:48:13', '2022-07-11 22:48:13', '2023-07-12 04:48:13'),
('afbc703c1ff6a316f486110ffe7cf8d8c2941dd025f139e8e96f772aee5be4824a8893b171f11d6c', 1, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-04-29 04:18:44', '2023-04-29 04:18:44', '2024-04-29 10:18:44'),
('d5f1138b5a790bbd376a8ac46e300a0fa9fa83160930d6846e22b983d3c0e12ea781f8b04bcb0990', 4, '96c20212-4694-4d90-bbba-14a534d6c15e', 'accessToken', '[]', 0, '2023-04-30 06:14:25', '2023-04-30 06:14:25', '2024-04-30 12:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
('96c20212-4694-4d90-bbba-14a534d6c15e', NULL, 'Y', 'JsxAm5u412usKfq7pVQshwLMY4Nn4rSkPDPPvZ4V', NULL, 'http://localhost', 1, 0, 0, '2022-07-11 22:27:07', '2022-07-11 22:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, '96c20212-4694-4d90-bbba-14a534d6c15e', '2022-07-11 22:27:07', '2022-07-11 22:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `cart_product` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'On hold',
  `address` varchar(255) DEFAULT NULL,
  `totall_price` double(8,2) DEFAULT NULL,
  `due_price` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `transaction_id`, `payment_method`, `cart_product`, `status`, `address`, `totall_price`, `due_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'ch_3N2HsaLEKLrBKkMC1Wx29zRd', 'Stripe', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":123,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":3,\"name\":\"Mango\",\"price\":90,\"quantity\":1,\"image\":null},{\"id\":23,\"name\":\"Checkout test\",\"price\":200,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":14,\"name\":\"aa\",\"price\":111,\"quantity\":1,\"image\":\"1681346740-1_1677818100.png\"}]', 'Prosasing', 'Dhaka', 524.00, 0.00, '2023-04-29 11:48:20', '2023-04-29 11:48:20'),
(2, 1, 'ch_3N2HtWLEKLrBKkMC1DFv8Clu', 'Stripe', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":123,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":3,\"name\":\"Mango\",\"price\":90,\"quantity\":1,\"image\":null},{\"id\":23,\"name\":\"Checkout test\",\"price\":200,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":14,\"name\":\"aa\",\"price\":111,\"quantity\":1,\"image\":\"1681346740-1_1677818100.png\"}]', 'Prosasing', 'Dhaka Saver', 524.00, 0.00, '2023-04-29 11:49:18', '2023-04-29 11:49:18'),
(3, 1, 'ch_3N2I6HLEKLrBKkMC1x7ZNWdi', 'Test Stripe', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":123,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":3,\"name\":\"Mango\",\"price\":90,\"quantity\":1,\"image\":null},{\"id\":23,\"name\":\"Checkout test\",\"price\":200,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":14,\"name\":\"aa\",\"price\":111,\"quantity\":1,\"image\":\"1681346740-1_1677818100.png\"},{\"id\":18,\"name\":\"Onamica\",\"price\":494,\"quantity\":4,\"image\":\"1681350237-1_1677818251.png\"},{\"id\":16,\"name\":\"Onamica\",\"price\":99999,\"quantity\":1,\"image\":\"1681347001-Wine-glass.png\"}]', 'Prosasing', 'Saver', 102499.00, 0.00, '2023-04-29 12:02:29', '2023-04-29 12:02:29'),
(4, 1, 'ch_3N2IMVLEKLrBKkMC0DrUiCPC', 'Stripe Test payment', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":123,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":16,\"name\":\"Onamica\",\"price\":99999,\"quantity\":2,\"image\":\"1681347001-Wine-glass.png\"},{\"id\":19,\"name\":\"kjjh ;l\",\"price\":788,\"quantity\":1,\"image\":\"1681350402-3_1677818166.png\"},{\"id\":18,\"name\":\"Onamica\",\"price\":494,\"quantity\":1,\"image\":\"1681350237-1_1677818251.png\"},{\"id\":21,\"name\":\"kkk\",\"price\":665,\"quantity\":2,\"image\":\"1681351226-3_1677818166.png\"}]', 'Prosasing', 'Dhaka', 202733.00, 0.00, '2023-04-29 12:19:15', '2023-04-29 12:19:15'),
(5, 4, 'ch_3N2ZAILEKLrBKkMC1N9boCln', 'Chas', '[{\"id\":18,\"name\":\"Onamica\",\"price\":494,\"quantity\":1,\"image\":\"1681350237-1_1677818251.png\"},{\"id\":17,\"name\":\"<<nhgf\",\"price\":123,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":16,\"name\":\"Onamica\",\"price\":99999,\"quantity\":1,\"image\":\"1681347001-Wine-glass.png\"},{\"id\":10,\"name\":\"আইসক্রিম\",\"price\":230,\"quantity\":1,\"image\":null},{\"id\":8,\"name\":\"টার্কি\",\"price\":2800,\"quantity\":1,\"image\":\"1681346828-pexels-pixabay-56866.jpg\"},{\"id\":14,\"name\":\"aa\",\"price\":111,\"quantity\":1,\"image\":\"1681346740-1_1677818100.png\"},{\"id\":5,\"name\":\"Jackfruits\",\"price\":520,\"quantity\":2,\"image\":null},{\"id\":2,\"name\":\"Tomato\",\"price\":120,\"quantity\":2,\"image\":\"1681347001-Wine-glass.png\"},{\"id\":3,\"name\":\"Mango\",\"price\":90,\"quantity\":3,\"image\":null}]', 'Prosasing', 'Uttora', 105307.00, 0.00, '2023-04-30 06:15:48', '2023-04-30 06:15:48'),
(6, 4, 'ch_3N2ZCXLEKLrBKkMC10Uo4gSF', 'Stripe Card Chas', '[{\"id\":3,\"name\":\"Mango\",\"price\":90,\"quantity\":1,\"image\":null},{\"id\":14,\"name\":\"aa\",\"price\":111,\"quantity\":5,\"image\":\"1681346740-1_1677818100.png\"}]', 'Prosasing', 'Manikgonj', 645.00, 0.00, '2023-04-30 06:18:07', '2023-04-30 06:18:07'),
(7, 5, 'ch_3N2ZNILEKLrBKkMC1zDhpbWl', 'Strip Card', '[{\"id\":9,\"name\":\"চাল\",\"price\":70,\"quantity\":1,\"image\":\"1681347001-Wine-glass.png\"},{\"id\":12,\"name\":\"পুঁই শাক\",\"price\":40,\"quantity\":2,\"image\":null},{\"id\":23,\"name\":\"Checkout test\",\"price\":200,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":10,\"name\":\"আইসক্রিম\",\"price\":230,\"quantity\":3,\"image\":null},{\"id\":8,\"name\":\"টার্কি\",\"price\":2800,\"quantity\":1,\"image\":\"1681346828-pexels-pixabay-56866.jpg\"},{\"id\":13,\"name\":\"চালতা\",\"price\":87,\"quantity\":2,\"image\":\"1681347001-Wine-glass.png\"}]', 'Prosasing', 'Nilkhet lal jama', 4014.00, 0.00, '2023-04-30 06:29:14', '2023-04-30 06:29:14'),
(8, 5, 'ch_3N2ZNvLEKLrBKkMC0F93B5bB', 'ssssss', '[{\"id\":10,\"name\":\"আইসক্রিম\",\"price\":230,\"quantity\":1,\"image\":null},{\"id\":11,\"name\":\"Turkey\",\"price\":1500,\"quantity\":1,\"image\":\"1681347001-Wine-glass.png\"},{\"id\":8,\"name\":\"টার্কি\",\"price\":2800,\"quantity\":1,\"image\":\"1681346828-pexels-pixabay-56866.jpg\"}]', 'Prosasing', 'sssssssss', 4530.00, 0.00, '2023-04-30 06:29:53', '2023-04-30 06:29:53'),
(9, 1, 'ch_3NOHZsLEKLrBKkMC18PccpeW', 'Stripe', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":101,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":23,\"name\":\"Checkout test\",\"price\":150,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":10,\"name\":\"আইসক্রিম\",\"price\":220,\"quantity\":1,\"image\":null}]', 'Prosasing', 'Dhaka', 471.00, 0.00, '2023-06-29 03:56:44', '2023-06-29 03:56:44'),
(10, 1, 'ch_3NOOjTLEKLrBKkMC0ZfD8Qv7', 'Stripe', '[{\"id\":17,\"name\":\"<<nhgf\",\"price\":101,\"quantity\":1,\"image\":\"1681347418-sync.png\"},{\"id\":23,\"name\":\"Checkout test\",\"price\":150,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":20,\"name\":\"llff dsa\",\"price\":432,\"quantity\":2,\"image\":\"1681350592-sync.png\"},{\"id\":18,\"name\":\"Onamica\",\"price\":452,\"quantity\":1,\"image\":\"1681350237-1_1677818251.png\"}]', 'Prosasing', 'Dhaka', 1567.00, 0.00, '2023-06-29 11:35:04', '2023-06-29 11:35:04'),
(11, 1, 'ch_3NOyNQLEKLrBKkMC1AipM38w', 'Stripe', '[{\"id\":15,\"name\":\"Flower\",\"price\":101,\"quantity\":1,\"image\":\"1681346828-pexels-pixabay-56866.jpg\"},{\"id\":22,\"name\":\"aaa\",\"price\":212,\"quantity\":1,\"image\":\"1681352084-sync.png\"},{\"id\":23,\"name\":\"Checkout test\",\"price\":150,\"quantity\":1,\"image\":\"1682767120-StreamData 1.png\"},{\"id\":16,\"name\":\"Onamica\",\"price\":0,\"quantity\":5,\"image\":\"1681347001-Wine-glass.png\"}]', 'Prosasing', 'Mirpur', 463.00, 0.00, '2023-07-01 01:37:58', '2023-07-01 01:37:58'),
(12, 1, 'ch_3NP8xqLEKLrBKkMC1UQxMwvx', 'Stripe', '[{\"id\":20,\"name\":\"llff dsa\",\"price\":432,\"quantity\":2,\"image\":\"p-anar.png\"},{\"id\":23,\"name\":\"Checkout test\",\"price\":150,\"quantity\":1,\"image\":\"p-mauton.png\"},{\"id\":18,\"name\":\"Onamica\",\"price\":252,\"quantity\":2,\"image\":\"p-wattermelon.png\"},{\"id\":17,\"name\":\"Pinaapple\",\"price\":77,\"quantity\":2,\"image\":\"\"},{\"id\":16,\"name\":\"Onamica\",\"price\":95,\"quantity\":2,\"image\":\"p-vagitable-2.png\"}]', 'Prosasing', 'Savar', 1862.00, 0.00, '2023-07-01 12:56:15', '2023-07-01 12:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tonny@gmail.com', '$2y$10$JuT29luOWrnB1sJu9AvKmer2C6asqjKdSADNBe.m2h8Y4CBJQj/J2', '2023-04-30 06:24:28');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` varchar(110) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `sell_price` double(8,2) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `category_id`, `name`, `description`, `tag`, `image`, `price`, `sell_price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '10', 'Grocery', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '7', 'p-mauton.png', 760.00, 320.00, 2, 1, '2022-07-11 23:06:58', '2022-07-11 23:06:58'),
(2, 1, '9', 'Tomato', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '8', 'p-tomato.png', 120.00, 70.00, 3, 1, '2022-07-11 23:07:49', '2022-07-11 23:07:49'),
(3, 1, '8', 'Mango', 'Sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '5,6', 'p-mango.png', 90.00, 80.00, 11, 1, '2022-07-11 23:08:50', '2022-07-11 23:08:50'),
(4, 1, '7', 'Capsicums', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '7,8', 'p-capcicum.png', 160.00, 120.00, 3, 1, '2022-07-11 23:09:50', '2022-07-11 23:09:50'),
(5, 1, '6', 'Jackfruits', 'Snsectetur adipisicing elit. Itaque fuga Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', '2,4', 'p-dragon2.png', 520.00, 350.00, 4, 1, '2022-07-11 23:11:10', '2022-07-11 23:11:10'),
(6, 1, '5', 'Chicken', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati', '1,6,5', 'p-dragon.png', 130.00, 120.00, 14, 1, '2022-07-11 23:13:25', '2022-07-11 23:13:25'),
(7, 1, '4', 'Hilsa fish', 'ইলিশ (বৈজ্ঞানিক নাম:Tenualosa ilisha) বাংলাদেশের জাতীয় মাছ। এটি একটি সামুদ্রিক মাছ, যা ডিম পাড়ার জন্য বাংলাদেশ ও পূর্ব ভারতের নদীতে আগমন করে। বাঙালিদের কাছে ইলিশ খুব জনপ্রিয়। এ ছাড়াও ইলিশ ভারতের বিভিন্ন এলাকা যেমন পশ্চিমবঙ্গ, উড়িষ্যা, ত্রিপুরা ও আসামে অত্যন্ত জনপ্রিয় একটি মাছ। ২০১৭ সালে বাংলাদেশের ইলিশ মাছ ভৌগোলিক নির্দেশক বা জিআই পণ্য হিসেবে স্বীকৃতি পায়। [১]', '5', 'p-cat-lecho.png', 1200.00, 109.00, 1, 1, '2022-07-11 23:15:56', '2022-07-11 23:15:56'),
(8, 1, '3', 'টার্কি', 'টার্কি (ইংরেজি: Turkey) মেলিয়াগ্রিডিডেই পরিবারের এক ধরনের বৃহদাকৃতির পাখিবিশেষ। এগুলো দেখতে মুরগির বাচ্চার মতো হলেও তুলনামূলকভাবে অনেক বড়। এক প্রজাতির বুনো টার্কি মেলিয়াগ্রিস গ্যালোপাভো উত্তর আমেরিকা ও মধ্য আমেরিকার বনাঞ্চলে বসবাস করে। গৃহপালিত টার্কি এই প্রজাতি থেকে ভিন্নতর। অন্য জীবিত প্রজাতির মধ্যে মেলিয়াগ্রিস ওসেলাটা বা চক্ষু আকৃতির চিহ্নবিশিষ্ট টার্কি আবাসস্থল হচ্ছে ইউকাতান উপ-দ্বীপের বনাঞ্চলে।[১] বিশ্বের সর্বত্র টার্কি গৃহপালিত পাখিরূপে লালন-পালন করা হয়।', '3,4', 'p-goaba.png', 2800.00, 207.00, 19, 1, '2022-07-11 23:17:36', '2022-07-11 23:17:36'),
(9, 1, '2', 'চাল', 'চাল বা চাউল হলো ধানের শস্যল অংশ। ধান থেকে চাল উৎপাদন করা হয়। জলে চাল ফুটিয়ে ভাত রান্না করা হয় যা ভারত , বাংলাদেশ ও পাকিস্তান সহ বিশ্বের অনেক দেশের প্রধান খাদ্যশস্য।', '1,3', 'p-chal.png', 70.00, 60.00, 8, 1, '2022-07-11 23:19:05', '2022-07-11 23:19:05'),
(10, 1, '1', 'আইসক্রিম', 'আইসক্রিম একটি দুগ্ধজাত খাদ্য। উপযুক্ত উপাদানের পাস্তুরিত মিশ্রণকে জমাট বাঁধিয়ে আইসক্রিম উৎপন্ন করা হয়। আইসক্রিমের মধ্যে দুগ্ধ চর্বি, দুগ্ধজাত উপাদান ছাড়াও চিনি, ভুট্টার সিরাপ, পানি, সুস্বাদু ও সুগন্ধিকারক বস্তু যেমন চকোলেট, ভ্যানিলা, বাদাম, ফলের রস ইত্যাদি যোগ করা হয়।', '1,2,4', 'p-stobari-sos.png', 230.00, 220.00, 7, 1, '2022-07-11 23:20:35', '2022-07-11 23:20:35'),
(11, 1, '10', 'Turkey', 'দেখতে মুরগির বাচ্চার মতো হলেও তুলনামূলকভাবে অনেক বড়। এক প্রজাতির বুনো টার্কি মেলিয়াগ্রিস গ্যালোপাভো উত্তর আমেরিকা ও মধ্য আমেরিকার বনাঞ্চলে বসবাস করে। গৃহপালিত টার্কি এই প্রজাতি থেকে ভিন্নতর। অন্য জীবিত প্রজাতির মধ্যে মেলিয়াগ্রিস ওসেলাটা বা চক্ষু আকৃতির চিহ্নবিশিষ্ট টার্কি আবাসস্থল হচ্ছে ইউকাতান উপ-দ্বীপের বনাঞ্চলে।[১] বিশ্বের সর্বত্র টার্কি গৃহপালিত পাখিরূপে লালন-পালন করা হয়।', '2,3', 'p-painapple.png', 1500.00, 140.00, 7, 1, '2022-07-11 23:24:27', '2022-07-11 23:24:27'),
(12, 1, '9', 'পুঁই শাক', 'শাক সবজি সাধারনভাবে মানুষের খাদ্যপোযোগী উদ্ভিদ ও তার অঙ্গসমূহকে শাকসব্জি বা শুধুই শাক অথবা সব্জি বলা হয়ে থাকে। কেবল শাক সবজি খাওয়া ব্যক্তিদের শাকাহারি বা নিরামিষভোজী বলা হয়। সাধারণত গাছের পাতা যা ভাজি করে খাওয়া হয়, তাকে শাক বলা হয়। যেমন লাল শাক, পুঁই শাক, কলমি শাক প্রভৃতি।', '1,3,4', NULL, 40.00, 32.00, 5, 1, '2022-07-11 23:26:02', '2022-07-11 23:26:02'),
(13, 1, '8', 'চালতা', 'চালতা বা চালিতা বা চাইলতে (বৈজ্ঞানিক নাম: Dillenia indica ইংরেজি নামঃ Elephant Apple[১]) এক রকমের ভারতবর্ষীয় উদ্ভিদ। চালতার ফল খুব আদরণীয় নয়। এই ফল দিয়ে চাটনি ও আচার তৈরি হয়।[২] গাছটি দেখতে সুন্দর বলে শোভাবর্ধক তরু হিসাবেও কখনো কখনো উদ্যানে লাগানো হয়ে থাকে।', '1,2', 'p-lecho.png', 87.00, 76.00, 6, 1, '2022-07-11 23:27:39', '2022-07-11 23:27:39'),
(14, 1, '2,4', 'aa', 'axsxs', '1', 'p-vagitable.png', 111.00, 91.00, 9, 1, '2023-04-12 18:45:40', '2023-04-12 18:45:40'),
(15, 1, '4,3', 'Flower', 'xssx', '2', 'rose.jpg', 231.00, 249.00, 8, 1, '2023-04-12 18:47:08', '2023-04-12 18:47:08'),
(16, 1, '2,6', 'Onamica', 'hiuoi kjj knk', '7', 'p-vagitable-2.png', 100.00, 95.00, 17, 1, '2023-04-12 18:50:01', '2023-04-12 18:50:01'),
(17, 1, '4', 'Pinaapple', 'zzzzz', '7', '', 123.00, 77.00, 16, 1, '2023-04-12 18:56:58', '2023-04-12 18:56:58'),
(18, 1, '13,9,5,2,6,14', 'Onamica', 'ffs jkf ld', '1,3,5', 'p-wattermelon.png', 494.00, 252.00, 15, 1, '2023-04-12 19:43:57', '2023-04-12 19:43:57'),
(19, 1, '14,13,6,4,1', 'kjjh ;l', 'kkgds nngfd kjghf', '3,4,6', 'p-vagitable.png', 788.00, 48.00, 12, 1, '2023-04-12 19:46:42', '2023-04-12 19:46:42'),
(20, 1, '14,8,9,3', 'llff dsa', 'ngufy jf', '3,5,2', 'p-anar.png', 456.00, 432.00, 14, 1, '2023-04-12 19:49:52', '2023-04-12 19:49:52'),
(21, 1, '14,8,6,3', 'Apple', 'lll bvfn', '5,3,2', 'p-apple.png', 665.00, 234.00, 13, 0, '2023-04-12 20:00:26', '2023-04-12 20:00:26'),
(22, 1, '13,9,8', 'Cat Licho', 'xjnjhs', '1,5,2', 'p-cat-lecho.png', 222.00, 212.00, 11, 1, '2023-04-12 20:14:44', '2023-04-12 20:14:44'),
(23, 1, '14,5,2', 'Checkout test', 'Aolor sit amet consectetur adipisicing elit. Itaque fuga, aliquam, nisi velit dicta voluptatibus obcaecati', '1,7', 'p-mauton.png', 200.00, 150.00, 1, 1, '2023-04-29 05:18:40', '2023-04-29 05:18:40');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub` varchar(255) DEFAULT NULL,
  `des` varchar(255) DEFAULT NULL,
  `btn` varchar(255) DEFAULT NULL,
  `btn_link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `use` tinyint(4) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `user_id`, `title`, `sub`, `des`, `btn`, `btn_link`, `image`, `use`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'খাদ্যপোযোগী উদ্ভিদের অঙ্গসমূহই শাকসব্জি', 'Save up 50% off', 'সাধারণত গাছের পাতা যা ভাজি করে খাওয়া হয়, তাকে শাক বলা হয়। যেমন লাল শাক, পুঁই শাক, কলমি শাক প্রভৃতি।', 'Buy Now', 'vir-za.com', 'hero-2.png', 0, 1, '2022-07-09 11:03:39', '2022-07-11 23:36:11'),
(2, 1, 'Bengal Fresh Fruits farm Organic 100%', 'Save up 30% off', 'Wpsum dolor sit amet consectetur adipisicing elit. Itaque fuga ?', 'Order Now', '#', 'hero-3.png', 0, 1, '2022-07-09 11:03:39', '2022-07-09 11:03:39'),
(3, 1, 'Grocery item farm Organic 100%', 'Save up 70% off', 'মাংস বা গোশত হল পশুর শরীরের অংশ যা খাদ্য হিসেবে ব্যবহার করা হয়। মাংস বলতে প্রায়ই ঐচ্ছিক পেশী, সহযোগী চর্বি ।', 'Shop Now', '#', 'hero.png', 0, 1, '2022-07-09 11:03:39', '2022-07-11 23:31:30'),
(4, 1, 'Vegetable Collection', 'Buy 1 Get 2', 'কিন্তু একে আবার অন্যান্যভাবে ভক্ষণীয় কলা, যেমন দেহযন্ত্র, কলিজা, বৃক্ক ইত্যাদি হিসেবেও বর্ণনা করা যায়।', 'Call Now', 'tel:01795815660', 'buyGet1.png', 1, 1, '2022-07-09 11:03:39', '2022-07-11 23:31:47'),
(5, 1, 'Fresh Fruits Collection', 'Buy 1 Get 1', '9AM – 5PM', 'Order Now', 'https://vir-za.com/', 'buyGet.png', 1, 1, '2022-07-09 11:03:40', '2023-06-30 12:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `user_id`, `name`, `slug`, `img`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ভুট্টার সিরাপ', 'hhhh', NULL, 1, '2023-04-13 02:17:38', '2023-04-13 02:17:38'),
(2, 1, 'সুস্বাদু ও সুগন্ধিকারক', 'jkjhgh', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(3, 1, 'পানি', 'hhhh', NULL, 1, '2023-04-13 02:17:38', '2023-04-13 02:17:38'),
(4, 1, 'সুস্বাদু', 'jkjhgh', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(5, 1, 'লাল শাক', 'jkj', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(6, 1, 'পুঁই শাক', 'jkj', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(7, 1, 'কলমি শাক', 'jk', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38'),
(8, 1, 'কলমি', 'jk', NULL, 1, '2023-04-12 02:17:38', '2023-04-13 02:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `task_lists`
--

CREATE TABLE `task_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(250) DEFAULT NULL,
  `dec` varchar(700) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `c_date` varchar(100) DEFAULT NULL,
  `success_task` tinyint(4) NOT NULL DEFAULT 0,
  `creator` varchar(250) DEFAULT NULL,
  `slug` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL DEFAULT 2 COMMENT '1=superAdmin,2=admin,3=manager,4=others',
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tanvir', 1, 'virza.bd@gmail.com', '2022-07-11 22:48:32', '$2y$10$6VfrqHEx6o4G90UzC9QYW.Tk9AJtdLaADmh4g4/XTHab9bXRuJ74.', NULL, NULL, '2022-07-11 22:48:32'),
(2, 'Tanzil', 2, 'admin@gmail.com', NULL, '$2y$10$D.Y4xYdfaIZRfMNIflo/bOBeDYPUZYP33WxZTHcSswOON8UzSD/sK', NULL, NULL, NULL),
(3, 'Tonny', 3, 'tonny@gmail.com', '2022-07-11 22:48:32', '$2y$10$6VfrqHEx6o4G90UzC9QYW.Tk9AJtdLaADmh4g4/XTHab9bXRuJ74.', NULL, NULL, '2022-07-11 22:48:32'),
(4, 'Nitu', 4, 'nitu@gmail.com', NULL, '$2y$10$33zUMjjMuyHKERSguLnwDetzBerPDQaVQ54.CgPd6v4SQJtfEm.PW', NULL, '2023-04-30 06:11:13', '2023-04-30 06:11:13'),
(5, 'Tanzil', 3, 'tanzil@gmail.com', NULL, '$2y$10$pCOL7GuX46Lssg9BfnIAbezluaVok0/IrF.5AOmRyWCpuX4KXHbO6', NULL, '2023-04-30 06:28:05', '2023-04-30 06:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_tops`
--
ALTER TABLE `footer_tops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_lists`
--
ALTER TABLE `task_lists`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_tops`
--
ALTER TABLE `footer_tops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_lists`
--
ALTER TABLE `task_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
