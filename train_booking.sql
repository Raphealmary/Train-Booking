-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 11:49 AM
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
-- Database: `train_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('railexpress-cache-admin@railexpress.co|127.0.0.1', 'i:1;', 1765377440),
('railexpress-cache-admin@railexpress.co|127.0.0.1:timer', 'i:1765377440;', 1765377440);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coach_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coaches`
--

INSERT INTO `coaches` (`id`, `coach_type`, `created_at`, `updated_at`) VALUES
(1, 'standard', '2025-11-23 15:49:13', '2025-11-23 15:49:13'),
(2, 'economy', '2025-11-23 15:49:18', '2025-11-23 15:49:18'),
(3, 'first_class', '2025-11-23 15:49:23', '2025-11-23 15:49:23');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `formcreateds`
--

CREATE TABLE `formcreateds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formcreateds`
--

INSERT INTO `formcreateds` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Aniya Nicolas II', '$2y$12$WR7/g1OtMPQq/BLKdTIlNu/9fhhJ3lIINQSqUAHQO6o6JIDDeN4QW', '2025-11-23 15:41:47', '2025-11-23 15:41:47'),
(2, 'Hester Glover', '$2y$12$sghlk.7yQoFzRKa9tn.EXO0DV.gLjYvdCJuBGisl7kWQG9W3UZ9XS', '2025-11-23 15:41:47', '2025-11-23 15:41:47'),
(3, 'Sam Pacocha', '$2y$12$sWM2KyCxytw3GeZomBWzNOCVxqyhRcWSi3IhG/F1M7itK0COgRF6.', '2025-11-23 15:41:47', '2025-11-23 15:41:47'),
(4, 'Parker Green I', '$2y$12$mzLDHrKdd76uswWku5K1r.90iqx5FoqX2Iqa5oVb1saq/gP3Ppdn6', '2025-11-23 15:41:47', '2025-11-23 15:41:47'),
(5, 'Frankie O\'Hara Jr.', '$2y$12$tx3bFsMAjcLFkDawAY7bke8RnyUS1N4Pf07SLjHCJzegNfhS3Ijli', '2025-11-23 15:41:47', '2025-11-23 15:41:47');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, '2025_09_04_115548_create_formcreateds_table', 1),
(5, '2025_11_17_130653_create_personal_access_tokens_table', 1),
(6, '2025_11_19_104543_create_trainadmins_table', 1),
(7, '2025_11_20_234318_create_trains_table', 1),
(8, '2025_11_22_103514_create_coaches_table', 1),
(9, '2025_11_22_104310_create_seats_table', 1),
(10, '2025_11_23_163707_update_coache_type_in_coaches_table', 1),
(12, '2025_11_26_145047_create_routes_table', 3),
(14, '2025_11_25_165151_create_schedules_table', 4),
(17, '2025_11_25_110903_create_user_book_records_table', 5),
(19, '2025_12_08_083331_create_payments_table', 6),
(20, '2025_12_22_074006_add_status_to_user_book_records_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Payment_Type` varchar(255) NOT NULL,
  `secret_key` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `Payment_Type`, `secret_key`, `created_at`, `updated_at`) VALUES
(4, 'paystack', 'eyJpdiI6IkhtalhieVBwd0VRQVRNTy9yMm5Wbnc9PSIsInZhbHVlIjoieWphWmczMXlENlMxRUhXcDc0WS9xS3V5MU8zb1o0NlFJeWpLZmxyRDZsYjlPa2lUc3NWRjVBYkkwWFEzSG1Pc2Foa3JSbVgwbWFwWDgwV0FCZzNFNmc9PSIsIm1hYyI6ImQ2NzBmYTA5NzQ5YjY2YjIyOTVlZTc1MTI1NjMxZDZjNjk0OGUxOWFkODY4NDE4OWY0MzBlNWRiZGU1YzQyYTAiLCJ0YWciOiIifQ==', '2025-12-20 16:50:20', '2025-12-20 16:50:20'),
(6, 'flutterwave', 'eyJpdiI6IjFZRFpjNTFDenBpeTRGWWtrbnpHbHc9PSIsInZhbHVlIjoieGNDWCs5dWFhQk1Vd0toYnl1TVBHRkUxcVFIeVZWVGlJdFova0RwZC9UaG9HSDVyendhNFFrZEJaN0U1SHJzWiIsIm1hYyI6ImQ1OWI1Zjk2ZGJkYTZlYTY0MmNjYTQ2NWIyNzIwYWFkYmE3ZDIzZjE4MzVmZDA2YzgwYTE5NWFiMjViN2UwZDkiLCJ0YWciOiIifQ==', '2025-12-22 07:16:05', '2025-12-22 07:16:05');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journey_route` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `journey_route`, `created_at`, `updated_at`) VALUES
(1, 'Zambia-Eastern-Chipata', '2025-11-26 14:37:39', '2025-11-26 14:37:39'),
(2, 'Somalia-Jubaland', '2025-11-26 14:38:21', '2025-11-26 14:38:21'),
(3, 'Nigeria-Lagos', '2025-11-26 14:43:08', '2025-11-26 14:43:08'),
(4, 'Free-State-South-Africa', '2025-12-10 22:21:11', '2025-12-10 22:21:11'),
(5, 'Free-town-Sierra-leone', '2025-12-10 22:23:17', '2025-12-10 22:23:17'),
(6, 'Accra-Ghana', '2025-12-10 22:23:42', '2025-12-10 22:23:42');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `origin_id` bigint(20) UNSIGNED NOT NULL,
  `destination_id` bigint(20) UNSIGNED NOT NULL,
  `distance` varchar(255) NOT NULL,
  `trains_id` bigint(20) UNSIGNED NOT NULL,
  `departure` time NOT NULL,
  `arrival` time NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `origin_id`, `destination_id`, `distance`, `trains_id`, `departure`, `arrival`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '1230km', 1, '06:18:00', '13:18:00', 4500.00, '2025-11-26 15:32:28', '2025-11-26 15:32:28'),
(3, 1, 3, '1200km', 1, '10:56:00', '00:57:00', 2400.00, '2025-11-27 20:57:10', '2025-11-27 20:57:10'),
(4, 2, 1, '1999km', 1, '01:57:00', '02:58:00', 5000.00, '2025-11-27 20:58:10', '2025-11-27 20:58:10'),
(5, 3, 2, '1230km', 1, '06:58:00', '10:58:00', 6700.00, '2025-11-27 20:58:50', '2025-11-27 20:58:50'),
(7, 6, 4, '2000km', 2, '02:03:00', '03:04:00', 4300.00, '2025-12-11 20:42:09', '2025-12-11 20:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trains_id` bigint(20) UNSIGNED NOT NULL,
  `coaches_id` bigint(20) UNSIGNED NOT NULL,
  `seat_no` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `trains_id`, `coaches_id`, `seat_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A1', 'booked', '2025-11-23 16:07:44', '2025-12-22 08:05:20'),
(2, 1, 1, 'A2', 'booked', '2025-11-23 16:07:44', '2025-12-22 08:29:33'),
(3, 1, 1, 'A3', 'available', '2025-11-23 16:07:44', '2025-12-12 12:41:31'),
(4, 1, 1, 'A4', 'available', '2025-11-23 16:07:44', '2025-12-04 13:45:39'),
(5, 1, 1, 'A5', 'booked', '2025-11-23 16:07:44', '2025-12-22 08:30:55'),
(6, 1, 1, 'A6', 'available', '2025-11-23 16:07:44', '2025-11-23 16:07:44'),
(7, 1, 1, 'A7', 'available', '2025-11-23 16:07:44', '2025-11-23 16:07:44'),
(8, 1, 1, 'A8', 'available', '2025-11-23 16:07:44', '2025-11-23 16:07:44'),
(9, 1, 1, 'A9', 'available', '2025-11-23 16:07:44', '2025-11-23 16:07:44'),
(10, 1, 1, 'A10', 'available', '2025-11-23 16:07:44', '2025-11-23 16:07:44'),
(11, 1, 1, 'A11', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(12, 1, 1, 'A12', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(13, 1, 1, 'A13', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(14, 1, 1, 'A14', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(15, 1, 1, 'A15', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(16, 1, 1, 'A16', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(17, 1, 1, 'A17', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(18, 1, 1, 'A18', 'booked', '2025-11-23 16:07:45', '2025-12-22 09:11:06'),
(19, 1, 1, 'A19', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(20, 1, 1, 'A20', 'available', '2025-11-23 16:07:45', '2025-11-23 16:07:45'),
(21, 1, 3, 'B1', 'available', '2025-11-25 14:11:40', '2025-12-04 14:13:37'),
(22, 1, 3, 'B2', 'available', '2025-11-25 14:11:40', '2025-12-04 18:58:12'),
(23, 1, 3, 'B3', 'booked', '2025-11-25 14:11:40', '2025-12-22 08:44:17'),
(24, 1, 3, 'B4', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(25, 1, 3, 'B5', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(26, 1, 3, 'B6', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(27, 1, 3, 'B7', 'booked', '2025-11-25 14:11:40', '2025-12-22 09:43:45'),
(28, 1, 3, 'B8', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(29, 1, 3, 'B9', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(30, 1, 3, 'B10', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(31, 1, 3, 'B11', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(32, 1, 3, 'B12', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(33, 1, 3, 'B13', 'available', '2025-11-25 14:11:40', '2025-11-25 14:11:40'),
(34, 1, 3, 'B14', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(35, 1, 3, 'B15', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(36, 1, 3, 'B16', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(37, 1, 3, 'B17', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(38, 1, 3, 'B18', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(39, 1, 3, 'B19', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(40, 1, 3, 'B20', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(41, 1, 3, 'B21', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(42, 1, 3, 'B22', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(43, 1, 3, 'B23', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(44, 1, 3, 'B24', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(45, 1, 3, 'B25', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(46, 1, 3, 'B26', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(47, 1, 3, 'B27', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(48, 1, 3, 'B28', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(49, 1, 3, 'B29', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(50, 1, 3, 'B30', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(51, 1, 3, 'B31', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(52, 1, 3, 'B32', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(53, 1, 3, 'B33', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(54, 1, 3, 'B34', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(55, 1, 3, 'B35', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(56, 1, 3, 'B36', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(57, 1, 3, 'B37', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(58, 1, 3, 'B38', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(59, 1, 3, 'B39', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(60, 1, 3, 'B40', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(61, 1, 3, 'B41', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(62, 1, 3, 'B42', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(63, 1, 3, 'B43', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(64, 1, 3, 'B44', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(65, 1, 3, 'B45', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(66, 1, 3, 'B46', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(67, 1, 3, 'B47', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(68, 1, 3, 'B48', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(69, 1, 3, 'B49', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(70, 1, 3, 'B50', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(71, 1, 3, 'B51', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(72, 1, 3, 'B52', 'available', '2025-11-25 14:11:41', '2025-11-25 14:11:41'),
(73, 1, 3, 'B53', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(74, 1, 3, 'B54', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(75, 1, 3, 'B55', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(76, 1, 3, 'B56', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(77, 1, 3, 'B57', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(78, 1, 3, 'B58', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(79, 1, 3, 'B59', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(80, 1, 3, 'B60', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(81, 1, 3, 'B61', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(82, 1, 3, 'B62', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(83, 1, 3, 'B63', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(84, 1, 3, 'B64', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(85, 1, 3, 'B65', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(86, 1, 3, 'B66', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(87, 1, 3, 'B67', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(88, 1, 3, 'B68', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(89, 1, 3, 'B69', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(90, 1, 3, 'B70', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(91, 1, 3, 'B71', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(92, 1, 3, 'B72', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(93, 1, 3, 'B73', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(94, 1, 3, 'B74', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(95, 1, 3, 'B75', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(96, 1, 3, 'B76', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(97, 1, 3, 'B77', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(98, 1, 3, 'B78', 'available', '2025-11-25 14:11:42', '2025-11-25 14:11:42'),
(99, 1, 3, 'B79', 'available', '2025-11-25 14:11:42', '2025-12-10 13:29:57'),
(100, 1, 3, 'B80', 'available', '2025-11-25 14:11:42', '2025-12-10 13:26:58'),
(101, 1, 2, 'F1', 'booked', '2025-12-10 13:54:59', '2025-12-22 07:02:29'),
(102, 1, 2, 'F2', 'available', '2025-12-10 13:54:59', '2025-12-22 06:53:39'),
(103, 1, 2, 'F3', 'available', '2025-12-10 13:54:59', '2025-12-18 11:15:37'),
(104, 1, 2, 'F4', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(105, 1, 2, 'F5', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(106, 1, 2, 'F6', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(107, 1, 2, 'F7', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(108, 1, 2, 'F8', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(109, 1, 2, 'F9', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(110, 1, 2, 'F10', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(111, 1, 2, 'F11', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(112, 1, 2, 'F12', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(113, 1, 2, 'F13', 'available', '2025-12-10 13:54:59', '2025-12-10 13:54:59'),
(114, 1, 2, 'F14', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(115, 1, 2, 'F15', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(116, 1, 2, 'F16', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(117, 1, 2, 'F17', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(118, 1, 2, 'F18', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(119, 1, 2, 'F19', 'booked', '2025-12-10 13:55:00', '2025-12-22 09:26:00'),
(120, 1, 2, 'F20', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(121, 1, 2, 'F21', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(122, 1, 2, 'F22', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(123, 1, 2, 'F23', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(124, 1, 2, 'F24', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(125, 1, 2, 'F25', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(126, 1, 2, 'F26', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(127, 1, 2, 'F27', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(128, 1, 2, 'F28', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(129, 1, 2, 'F29', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(130, 1, 2, 'F30', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(131, 1, 2, 'F31', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(132, 1, 2, 'F32', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(133, 1, 2, 'F33', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(134, 1, 2, 'F34', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(135, 1, 2, 'F35', 'booked', '2025-12-10 13:55:00', '2025-12-22 09:33:33'),
(136, 1, 2, 'F36', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(137, 1, 2, 'F37', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(138, 1, 2, 'F38', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(139, 1, 2, 'F39', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(140, 1, 2, 'F40', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(141, 1, 2, 'F41', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(142, 1, 2, 'F42', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(143, 1, 2, 'F43', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(144, 1, 2, 'F44', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(145, 1, 2, 'F45', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(146, 1, 2, 'F46', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(147, 1, 2, 'F47', 'available', '2025-12-10 13:55:00', '2025-12-10 13:55:00'),
(148, 1, 2, 'F48', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(149, 1, 2, 'F49', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(150, 1, 2, 'F50', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(151, 1, 2, 'F51', 'booked', '2025-12-10 13:55:01', '2025-12-22 08:47:52'),
(152, 1, 2, 'F52', 'booked', '2025-12-10 13:55:01', '2025-12-22 09:07:06'),
(153, 1, 2, 'F53', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(154, 1, 2, 'F54', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(155, 1, 2, 'F55', 'booked', '2025-12-10 13:55:01', '2025-12-22 09:09:12'),
(156, 1, 2, 'F56', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(157, 1, 2, 'F57', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(158, 1, 2, 'F58', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(159, 1, 2, 'F59', 'available', '2025-12-10 13:55:01', '2025-12-10 13:55:01'),
(160, 1, 2, 'F60', 'booked', '2025-12-10 13:55:01', '2025-12-22 09:12:01');

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
('6wNC4EGuje5DTDP0dHyKDLlBQTkydOarLSn1zN1n', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZ0E3bklYZk56M3lJNnYxZTJiOEVCNWdBenRiRnRhcDJ5b09maVUzRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Jlc2VydmF0aW9uIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1766400225),
('h79vHwJMfDPr9zXz9XQDzK5PUlhA0jFhKK79QOiw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSkRVaFR4dXJPSE5sQnFLVDNNZFNEaU95M21rbmpIZGQ5Skx2NVZTayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766393595),
('ixVPNabwBcwQEINmG0oHRBv0xzd7JWq5O8zzS1H0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN1JpMjU5dllqQ205VEJuNGZSSVA2eGlMRHpqb3RSRzBkWW5FVGVrUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Jlc2VydmF0aW9uIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766393018),
('kCcf3GvLvstJ29jvxPQK8GKlcnhXSIB9JXRxjn5D', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlZFenU2MkxVOU5sMGhZajBZc3lwVVJXN3BKaFlEU2NUUFBaQTRXZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766399948),
('RPKyTy5hxdK9hspa7VGK93KIL3dBaP0lQFckLTb4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSk9rVE9iR1lBQklYZUxIVlZjSGZvYmx1aXlyRElrQ3JaMXY1a3VVTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Jlc2VydmF0aW9uIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766393594),
('V8c2ewjXDHWSeBRGTd0rxYmS5nFnWcljGChmM0qq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM1BXUHp2THQ4OHVNRFUySkJxb2h1TUk1b05hR3JYTldtV1FNaVFScSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoxMDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbj9fdG9rZW49Z0E3bklYZk56M3lJNnYxZTJiOEVCNWdBenRiRnRhcDJ5b09maVUzRCZkYXRlPTIwMjUtMTItMzEmcGFzc2VuZ2VyPTEiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoxMDk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXNlcnZhdGlvbj9fdG9rZW49Z0E3bklYZk56M3lJNnYxZTJiOEVCNWdBenRiRnRhcDJ5b09maVUzRCZkYXRlPTIwMjUtMTItMzEmcGFzc2VuZ2VyPTEiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1766399944),
('yv8DWiclE8m5nvKdeMHt3X7EYPXsTpNg7hf9syyu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT0R5N0J3b0tUd1NqdUNMdUs1eklqOURmeUdpMUdMUHdrcXhKSDlTYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1766400234),
('zrFKrBaIwxUHMWE7ma8Xu5waAUXlSplqroOWA9sE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:146.0) Gecko/20100101 Firefox/146.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVzBqNVhodkthTWhmYk1DZDhSZldoWkYwTzdQcHJSTVd0TE1ocDVkdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766393019);

-- --------------------------------------------------------

--
-- Table structure for table `trainadmins`
--

CREATE TABLE `trainadmins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainadmins`
--

INSERT INTO `trainadmins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@railexpress.co', '$2y$12$z23vA5Lp.SDPcZyiahzJ..gJCIHfIo5LT7laQngtK5DR1o7ZCYHiC', '2025-11-23 15:41:47', '2025-11-23 15:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'express',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `name`, `number`, `type`, `created_at`, `updated_at`) VALUES
(1, 'salisito', 'TR9231119629', 'express', '2025-11-23 15:48:29', '2025-11-23 15:48:29'),
(2, 'Armsterdam', 'TR6452967674', 'express', '2025-12-11 20:41:08', '2025-12-11 20:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aboki', 'aboki@gmail.co', NULL, '$2y$12$0Ra9i4GSJ2wqS2RYZFU.AebhwMWaBhn.59xQgqSiMoKkAE8TKAVxi', NULL, '2025-11-25 09:31:24', '2025-11-25 09:31:24'),
(2, 'mike', 'mike@gmail.com', NULL, '$2y$12$RHuQHnOSoScfceNvkwVYy.5z/y5gLM6ec6Vfp/9rNufBARsKuZjPC', NULL, '2025-12-04 10:23:06', '2025-12-04 10:23:06'),
(3, 'Aqua Greatness', 'akwaenearinghi@gmail.com', NULL, '$2y$12$t8NNTY23UFB.WimewHDzL.9EUgWXmMkcwJvMG6O6V3XGn8mNaxJtK', 'ZSIa5T2r64dzMsPiU1QyQYyQEo9jZuGTZZ37VUEI46N2Si2MEjoAcXSXsbAy', '2025-12-04 13:57:28', '2025-12-08 07:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_book_records`
--

CREATE TABLE `user_book_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `trainBooking` varchar(255) NOT NULL,
  `coachBooking` varchar(255) NOT NULL,
  `seatBooking` varchar(255) NOT NULL,
  `departBooking` int(11) NOT NULL,
  `arrivalBooking` int(11) NOT NULL,
  `timeArrivalBooking` varchar(255) NOT NULL,
  `timeDepartBooking` varchar(255) NOT NULL,
  `priceBooking` varchar(255) NOT NULL,
  `orignalPriceBooking` varchar(255) NOT NULL,
  `dateBooking` varchar(255) NOT NULL,
  `passengerBooking` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'notPaid',
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_book_records`
--

INSERT INTO `user_book_records` (`id`, `users_id`, `booking_id`, `trainBooking`, `coachBooking`, `seatBooking`, `departBooking`, `arrivalBooking`, `timeArrivalBooking`, `timeDepartBooking`, `priceBooking`, `orignalPriceBooking`, `dateBooking`, `passengerBooking`, `fullname`, `phone`, `email`, `created_at`, `updated_at`, `reference`, `status`, `Type`) VALUES
(49, 2, 'IB8S7071', 'Salisito', 'Standard', 'A1', 2, 1, '02:58 AM', '01:57 AM', '10000.00', '5000.00', 'December 31, 2025', 2, 'adesunya', '0901233442', 'adesunya@yahoo.com', '2025-12-22 08:05:20', '2025-12-22 08:05:20', 'RailExpressvb8t6EzQf1lm', 'paid', 'FreePay'),
(50, 2, 'OM6P8210', 'Salisito', 'Standard', 'A2', 1, 2, '13:18 PM', '06:18 AM', '13500.00', '4500.00', 'December 24, 2025', 3, 'obiko', '0901233442', 'adesunya@yahoo.com', '2025-12-22 08:10:55', '2025-12-22 08:28:02', 'RailExpresspGltQdKrWNN3', 'paid', 'PayStack'),
(51, 2, '4TWW6324', 'Salisito', 'Standard', 'A5', 2, 1, '02:58 AM', '01:57 AM', '20000.00', '5000.00', 'December 31, 2025', 4, 'Raphealmary', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 08:30:44', '2025-12-22 08:30:55', 'RailExpresswJQeStGRcnxp', 'paid', 'PayStack'),
(52, 2, 'M06X5380', 'Salisito', 'Standard', 'A15', 3, 2, '10:58 AM', '06:58 AM', '13400.00', '6700.00', 'December 23, 2025', 2, 'mike', '32324232121', 'mike@yahoo.com', '2025-12-22 08:35:48', '2025-12-22 08:35:48', 'RailExpress4o7u7A529rDm', 'Pending', 'Flutterwave'),
(53, 2, 'UXTS5460', 'Salisito', 'First Class', 'B3', 3, 2, '10:58 AM', '06:58 AM', '6700.00', '6700.00', 'December 23, 2025', 1, 'mike', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 08:44:08', '2025-12-22 08:44:17', 'RailExpresskcUyrelAZp92', 'paid', 'PayStack'),
(54, 2, 'XCZK2232', 'Armsterdam', 'Economy', 'F19', 6, 4, '03:04 AM', '02:03 AM', '8600.00', '4300.00', 'December 23, 2025', 2, 'adesunya', '0901233442', 'adesunya@yahoo.com', '2025-12-22 08:45:56', '2025-12-22 09:26:00', 'RailExpressJeSIEoXE3IhV', 'paid', 'PayStack'),
(55, 2, '5VHI4899', 'Salisito', 'Economy', 'F51', 3, 2, '10:58 AM', '06:58 AM', '13400.00', '6700.00', 'December 24, 2025', 2, 'adesunya', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 08:47:52', '2025-12-22 08:47:52', 'RailExpressZJWx8Jl9KDAb', 'paid', 'FreePay'),
(57, 2, 'EC6X7684', 'Salisito', 'Economy', 'F52', 1, 2, '13:18 PM', '06:18 AM', '18000.00', '4500.00', 'December 23, 2025', 4, 'obiko', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 08:58:08', '2025-12-22 09:05:08', 'RailExpressrfmfxna6YotO', 'paid', 'Flutterwave'),
(58, 2, 'NFHC7146', 'Salisito', 'Economy', 'F55', 2, 1, '02:58 AM', '01:57 AM', '15000.00', '5000.00', 'December 26, 2025', 3, 'mike', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 09:08:52', '2025-12-22 09:09:12', 'RailExpressq4zqaqQBjdxX', 'paid', 'Flutterwave'),
(59, 2, '3ACY9802', 'Salisito', 'Standard', 'A18', 1, 2, '13:18 PM', '06:18 AM', '9000.00', '4500.00', 'January 02, 2026', 2, 'mike', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 09:10:57', '2025-12-22 09:11:06', 'RailExpressm7cq5IQIdbvF', 'paid', 'PayStack'),
(60, 2, 'AYRG2771', 'Armsterdam', 'Economy', 'F60', 6, 4, '03:04 AM', '02:03 AM', '4300.00', '4300.00', 'December 31, 2025', 1, 'mike', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 09:12:01', '2025-12-22 09:12:01', 'RailExpressHLJVG2fPHRyC', 'paid', 'FreePay'),
(61, 2, '9X7I9813', 'Armsterdam', 'Economy', 'F35', 6, 4, '03:04 AM', '02:03 AM', '4300.00', '4300.00', 'December 23, 2025', 1, 'mike', '09012735272', 'raphealmary877@gmail.com', '2025-12-22 09:33:23', '2025-12-22 09:33:33', 'RailExpressosf7aaErVjqJ', 'paid', 'PayStack'),
(62, 2, 'PSSN8394', 'Armsterdam', 'First Class', 'B7', 6, 4, '03:04 AM', '02:03 AM', '12900.00', '4300.00', 'December 23, 2025', 3, 'samuel', '979726386', 'samuel@yahoo.com', '2025-12-22 09:43:25', '2025-12-22 09:43:45', 'RailExpressg97LqbvFwAjQ', 'paid', 'Flutterwave');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coaches_coach_type_unique` (`coach_type`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `formcreateds`
--
ALTER TABLE `formcreateds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schedules_origin_id_destination_id_unique` (`origin_id`,`destination_id`),
  ADD KEY `schedules_destination_id_foreign` (`destination_id`),
  ADD KEY `schedules_trains_id_foreign` (`trains_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_trains_id_foreign` (`trains_id`),
  ADD KEY `seats_coaches_id_foreign` (`coaches_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainadmins`
--
ALTER TABLE `trainadmins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainadmins_email_unique` (`email`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trains_number_unique` (`number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_book_records`
--
ALTER TABLE `user_book_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_book_records_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formcreateds`
--
ALTER TABLE `formcreateds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `trainadmins`
--
ALTER TABLE `trainadmins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_book_records`
--
ALTER TABLE `user_book_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_destination_id_foreign` FOREIGN KEY (`destination_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_origin_id_foreign` FOREIGN KEY (`origin_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `schedules_trains_id_foreign` FOREIGN KEY (`trains_id`) REFERENCES `trains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_coaches_id_foreign` FOREIGN KEY (`coaches_id`) REFERENCES `coaches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seats_trains_id_foreign` FOREIGN KEY (`trains_id`) REFERENCES `trains` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_book_records`
--
ALTER TABLE `user_book_records`
  ADD CONSTRAINT `user_book_records_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
