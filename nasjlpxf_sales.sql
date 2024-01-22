-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2024 at 07:48 AM
-- Server version: 10.5.19-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nasjlpxf_sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-06-28 12:43:54', '2022-06-28 12:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `about_us_translations`
--

CREATE TABLE `about_us_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_us_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `about_app` varchar(255) DEFAULT NULL,
  `our_vision` varchar(255) DEFAULT NULL,
  `our_mission` varchar(255) DEFAULT NULL,
  `our_services` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us_translations`
--

INSERT INTO `about_us_translations` (`id`, `about_us_id`, `locale`, `about_app`, `our_vision`, `our_mission`, `our_services`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'When the customer initially agrees to the design, this text is removed from the design and the final texts required for the design are placed.', 'When the customer initially agrees to the design, this text is removed from the design and the final texts required for the design are placed.', 'When the customer initially agrees to the design, this text is removed from the design and the final texts required for the design are placed.', 'When the customer initially agrees to the design, this text is removed from the design and the final texts required for the design are placed.', NULL, NULL),
(2, 1, 'ar', 'عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم و وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي', 'عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي', 'عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي', 'عند موافقه العميل المبدئيه على التصميم يتم ازالة هذا النص من التصميم ويتم وضع النصوص النهائية المطلوبة للتصميم ويقول البعض ان وضع النصوص التجريبية بالتصميم قد تشغل المشاهد عن وضع الكثير من الملاحظات او الانتقادات للتصميم الاساسي', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `player_id`, `username`, `mobile`, `photo`, `email`, `password`, `created_at`, `updated_at`) VALUES
(12, NULL, 'super_admin', '123456789', 'super_admin/image', 'super_admin@gmail.com', '$2y$10$48y02FPg5P1cVpO3ajUd7uDXgnTtpDLfH0UJFim16y6II7KB5UYly', '2022-06-11 14:14:10', '2023-07-09 18:11:15'),
(13, NULL, 'admin', '123456', 'admin/image', 'admin@gmail.com', '$2y$10$ovy0A01QpMu7O8CQMqijl.SAUpano/7ucOp.dylgS3V/tGljogela', '2022-06-11 14:14:10', '2023-02-15 23:30:25'),
(14, NULL, 'admin1', '123', NULL, 'emad_ora@hotmail.com', '$2y$10$Zjo4/RBsbGOLG4NF//yEbuXhSnpCHC34I7WuaN4bOENe5LTf8mOSK', '2023-07-06 21:33:56', '2023-07-09 18:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notifies`
--

CREATE TABLE `admin_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notifies`
--

INSERT INTO `admin_notifies` (`id`, `status`, `client_id`, `post_id`, `created_at`, `updated_at`) VALUES
(46, '1', 31, NULL, '2023-01-15 02:11:59', '2023-12-23 17:20:29'),
(48, '1', 32, NULL, '2023-01-22 01:15:52', '2023-12-23 17:20:29'),
(56, '1', 33, NULL, '2023-01-22 19:49:18', '2023-12-23 17:20:29'),
(58, '1', 38, NULL, '2023-02-14 01:23:06', '2023-12-23 17:20:29'),
(59, '1', 39, NULL, '2023-02-19 04:54:21', '2023-12-23 17:20:29'),
(60, '1', 40, NULL, '2023-04-04 10:08:00', '2023-12-23 17:20:29'),
(61, '1', 41, NULL, '2023-05-08 05:30:19', '2023-12-23 17:20:29'),
(62, '1', 42, NULL, '2023-07-06 03:40:14', '2023-12-23 17:20:29'),
(64, '1', 43, NULL, '2023-07-06 19:36:57', '2023-12-23 17:20:29'),
(66, '1', 44, NULL, '2023-07-09 01:34:56', '2023-12-23 17:20:29'),
(67, '1', 45, NULL, '2023-07-09 03:39:21', '2023-12-23 17:20:29'),
(70, '1', 32, 84, '2023-12-31 23:57:37', '2024-01-13 22:22:20'),
(71, '1', 32, 85, '2024-01-04 20:28:10', '2024-01-04 20:28:42'),
(72, '0', 32, 86, '2024-01-05 00:12:47', '2024-01-05 00:12:47'),
(73, '0', 32, 87, '2024-01-05 00:18:45', '2024-01-05 00:18:45'),
(74, '1', 32, 88, '2024-01-11 02:00:19', '2024-01-18 19:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_notify_translations`
--

CREATE TABLE `admin_notify_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_notify_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_notify_translations`
--

INSERT INTO `admin_notify_translations` (`id`, `admin_notify_id`, `locale`, `message`, `created_at`, `updated_at`) VALUES
(91, 46, 'en', 'A New Account Has Been Registered With The Usernameخليل', NULL, NULL),
(92, 46, 'ar', 'تم تسجيل حساب جديد باسم خليل', NULL, NULL),
(95, 48, 'en', 'A New Account Has Been Registered With The Usernameemad', NULL, NULL),
(96, 48, 'ar', 'تم تسجيل حساب جديد باسم emad', NULL, NULL),
(111, 56, 'en', 'A New Account Has Been Registered With The Usernameyahya', NULL, NULL),
(112, 56, 'ar', 'تم تسجيل حساب جديد باسم yahya', NULL, NULL),
(115, 58, 'en', 'A New Account Has Been Registered With The Usernameعلي الرويلي', NULL, NULL),
(116, 58, 'ar', 'تم تسجيل حساب جديد باسم علي الرويلي', NULL, NULL),
(117, 59, 'en', 'A New Account Has Been Registered With The UsernameDonia', NULL, NULL),
(118, 59, 'ar', 'تم تسجيل حساب جديد باسم Donia', NULL, NULL),
(119, 60, 'en', 'A New Account Has Been Registered With The Usernameبيانكونيري', NULL, NULL),
(120, 60, 'ar', 'تم تسجيل حساب جديد باسم بيانكونيري', NULL, NULL),
(121, 61, 'en', 'A New Account Has Been Registered With The UsernameOwner', NULL, NULL),
(122, 61, 'ar', 'تم تسجيل حساب جديد باسم Owner', NULL, NULL),
(123, 62, 'en', 'A New Account Has Been Registered With The Usernameعماد', NULL, NULL),
(124, 62, 'ar', 'تم تسجيل حساب جديد باسم عماد', NULL, NULL),
(127, 64, 'en', 'A New Account Has Been Registered With The Usernameu', NULL, NULL),
(128, 64, 'ar', 'تم تسجيل حساب جديد باسم u', NULL, NULL),
(131, 66, 'en', 'A New Account Has Been Registered With The Usernameyyy', NULL, NULL),
(132, 66, 'ar', 'تم تسجيل حساب جديد باسم yyy', NULL, NULL),
(133, 67, 'en', 'A New Account Has Been Registered With The Username0780111107', NULL, NULL),
(134, 67, 'ar', 'تم تسجيل حساب جديد باسم 0780111107', NULL, NULL),
(139, 70, 'en', 'An Ad Of Type Has Been Added Classic Cars Mercedes From The Client emad', NULL, NULL),
(140, 70, 'ar', 'تم اضافة اعلان من نوع  سيارات كلاسيك مرسيدس من العميل emad', NULL, NULL),
(141, 71, 'en', 'An Ad Of Type Has Been Added Classic Cars Mercedes From The Client emad', NULL, NULL),
(142, 71, 'ar', 'تم اضافة اعلان من نوع  سيارات كلاسيك مرسيدس من العميل emad', NULL, NULL),
(143, 72, 'en', 'An Ad Of Type Has Been Added Spare parts قطع مكينة From The Client emad', NULL, NULL),
(144, 72, 'ar', 'تم اضافة اعلان من نوع  قطع غيار قطع مكينة من العميل emad', NULL, NULL),
(145, 73, 'en', 'An Ad Of Type Has Been Added Spare parts قطع مكينة From The Client emad', NULL, NULL),
(146, 73, 'ar', 'تم اضافة اعلان من نوع  قطع غيار قطع مكينة من العميل emad', NULL, NULL),
(147, 74, 'en', 'An Ad Of Type Has Been Added Classic Cars Mercedes From The Client emad', NULL, NULL),
(148, 74, 'ar', 'تم اضافة اعلان من نوع  سيارات كلاسيك مرسيدس من العميل emad', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `message_ar` varchar(255) NOT NULL,
  `message_en` varchar(255) NOT NULL,
  `nearest_distance` bigint(20) NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `status`, `message_ar`, `message_en`, `nearest_distance`, `created_at`, `updated_at`) VALUES
(1, '1', 'تجريبي', 'test', 1000, '2022-12-05 19:37:46', '2024-01-11 02:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'assets/files/category/icons/icon_1704023577.jpeg', '2022-06-07 19:45:56', '2023-12-31 19:52:57'),
(10, 'assets/files/category/icons/icon_1704023680.jpg', '2023-12-23 17:03:01', '2023-12-31 19:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `category_sub_category`
--

CREATE TABLE `category_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_sub_category`
--

INSERT INTO `category_sub_category` (`id`, `category_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(140, 10, 23, NULL, NULL),
(143, 2, 22, NULL, NULL),
(144, 10, 24, NULL, NULL),
(145, 2, 25, NULL, NULL),
(147, 2, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `locale`, `name`, `desc`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'Classic Cars', 'Classic Cars for Sale', NULL, NULL),
(4, 2, 'ar', 'سيارات كلاسيك', 'سيارات كلاسيك للبيع', NULL, NULL),
(19, 10, 'en', 'Spare parts', 'Spare parts for sale', NULL, NULL),
(20, 10, 'ar', 'قطع غيار', 'قطع غيار للبيع', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `created_at`, `updated_at`) VALUES
(4, 3, '2022-06-08 19:36:40', '2022-06-08 19:36:40'),
(5, 4, '2022-07-05 16:52:57', '2022-07-05 16:52:57'),
(6, 4, '2022-07-05 16:53:24', '2022-07-05 16:53:24'),
(7, 6, '2022-07-05 17:03:43', '2022-07-05 17:03:43'),
(8, 7, '2022-07-05 17:04:20', '2022-07-05 17:04:20'),
(9, 8, '2022-07-05 17:04:43', '2022-07-05 17:04:43'),
(11, 10, '2022-07-05 17:05:32', '2022-07-05 17:05:32'),
(12, 4, '2022-10-19 16:50:50', '2022-10-19 16:50:50'),
(13, 4, '2022-11-15 23:13:03', '2022-11-15 23:13:03'),
(15, 4, '2022-11-17 14:42:19', '2022-11-17 14:42:19'),
(16, 4, '2022-11-17 14:43:21', '2022-11-17 14:43:21'),
(17, 4, '2022-11-17 14:44:23', '2022-11-17 14:44:23'),
(18, 4, '2022-11-17 14:44:56', '2022-11-17 14:44:56'),
(19, 4, '2022-11-17 14:45:40', '2022-11-17 14:45:40'),
(20, 4, '2022-11-17 14:46:37', '2022-11-17 14:46:37'),
(21, 4, '2022-11-17 14:47:28', '2022-11-17 14:47:28'),
(22, 4, '2022-11-17 14:48:46', '2022-11-17 14:48:46'),
(23, 4, '2022-11-17 14:49:41', '2022-11-17 14:49:41'),
(24, 4, '2022-11-17 14:51:14', '2022-11-17 14:51:14'),
(25, 4, '2022-11-17 14:51:46', '2022-11-17 14:51:46'),
(26, 4, '2022-11-17 14:52:14', '2022-11-17 14:52:14'),
(27, 4, '2022-11-17 14:52:46', '2022-11-17 14:52:46'),
(28, 4, '2022-11-17 14:53:21', '2022-11-17 14:53:21'),
(29, 9, '2022-11-17 14:54:10', '2022-11-17 14:54:10'),
(30, 9, '2022-11-17 14:55:06', '2022-11-17 14:55:06'),
(31, 8, '2022-11-20 16:24:31', '2022-11-20 16:24:31'),
(32, 8, '2022-11-20 16:25:02', '2022-11-20 16:25:02'),
(33, 8, '2022-11-20 16:25:31', '2022-11-20 16:25:31'),
(34, 9, '2022-11-20 16:26:12', '2022-11-20 16:26:12'),
(35, 9, '2022-11-20 16:26:41', '2022-11-20 16:26:41'),
(36, 6, '2022-11-20 16:27:35', '2022-11-20 16:27:35'),
(37, 3, '2022-11-20 16:28:13', '2022-11-20 16:28:13'),
(38, 3, '2022-11-20 16:28:33', '2022-11-20 16:28:33'),
(39, 3, '2022-11-20 16:28:56', '2022-11-20 16:28:56'),
(40, 3, '2022-11-20 16:29:26', '2022-11-20 16:29:26'),
(41, 10, '2022-11-20 16:30:43', '2022-11-20 16:30:43'),
(42, 10, '2022-11-20 16:31:17', '2022-11-20 16:31:17'),
(43, 10, '2022-11-20 16:31:47', '2022-11-20 16:31:47'),
(44, 10, '2022-11-20 16:32:25', '2022-11-20 16:32:25'),
(45, 10, '2022-11-20 16:32:50', '2022-11-20 16:32:50'),
(46, 10, '2022-11-20 16:33:14', '2022-11-20 16:33:14'),
(47, 10, '2022-11-20 16:33:45', '2022-11-20 16:33:45'),
(48, 10, '2022-11-20 16:34:10', '2022-11-20 16:34:10'),
(49, 10, '2022-11-20 16:34:33', '2022-11-20 16:34:33'),
(50, 10, '2022-11-20 16:34:58', '2022-11-20 16:34:58'),
(51, 10, '2022-11-20 16:35:21', '2022-11-20 16:35:21'),
(52, 10, '2022-11-20 16:35:54', '2022-11-20 16:35:54'),
(53, 10, '2022-11-20 16:36:24', '2022-11-20 16:36:24'),
(54, 10, '2022-11-20 16:36:53', '2022-11-20 16:36:53'),
(55, 10, '2022-11-20 16:37:20', '2022-11-20 16:37:20'),
(56, 11, '2022-11-20 16:38:26', '2022-11-20 16:38:26'),
(57, 11, '2022-11-20 16:38:45', '2022-11-20 16:38:45'),
(58, 11, '2022-11-20 16:46:53', '2022-11-20 16:46:53'),
(59, 11, '2022-11-20 16:48:11', '2022-11-20 16:48:11'),
(60, 11, '2022-11-20 16:48:31', '2022-11-20 16:48:31'),
(61, 11, '2022-11-20 16:48:56', '2022-11-20 16:48:56'),
(62, 11, '2022-11-20 16:49:22', '2022-11-20 16:49:22'),
(63, 11, '2022-11-20 16:49:59', '2022-11-20 16:49:59'),
(64, 7, '2022-11-20 16:51:32', '2022-11-20 16:51:32'),
(65, 7, '2022-11-20 16:52:15', '2022-11-20 16:52:15'),
(66, 7, '2022-11-20 16:52:42', '2022-11-20 16:52:42'),
(67, 7, '2022-11-20 16:53:21', '2022-11-20 16:53:21'),
(68, 7, '2022-11-20 16:53:51', '2022-11-20 16:53:51'),
(69, 7, '2022-11-20 16:54:24', '2022-11-20 16:54:24'),
(70, 7, '2022-11-20 16:55:13', '2022-11-20 16:55:13'),
(71, 6, '2022-11-20 16:55:56', '2022-11-20 16:55:56'),
(72, 6, '2022-11-20 16:56:42', '2022-11-20 16:56:42'),
(73, 6, '2022-11-20 16:57:15', '2022-11-20 16:57:15'),
(74, 6, '2022-11-20 16:57:40', '2022-11-20 16:57:40'),
(75, 6, '2022-11-20 16:58:04', '2022-11-20 16:58:04'),
(76, 6, '2022-11-20 16:58:33', '2022-11-20 16:58:33'),
(77, 6, '2022-11-20 16:59:10', '2022-11-20 16:59:10'),
(78, 6, '2022-11-20 16:59:36', '2022-11-20 16:59:36'),
(79, 8, '2022-11-20 17:00:43', '2022-11-20 17:00:43'),
(80, 8, '2022-11-20 17:01:10', '2022-11-20 17:01:10'),
(81, 8, '2022-11-20 17:01:39', '2022-11-20 17:01:39'),
(82, 8, '2022-11-20 17:02:25', '2022-11-20 17:02:25'),
(83, 9, '2022-11-20 17:03:24', '2022-11-20 17:03:24'),
(84, 9, '2022-11-20 17:03:46', '2022-11-20 17:03:46'),
(85, 9, '2022-11-20 17:04:07', '2022-11-20 17:04:07'),
(86, 9, '2022-11-20 17:04:46', '2022-11-20 17:04:46'),
(87, 9, '2022-11-20 17:05:03', '2022-11-20 17:05:03'),
(88, 9, '2022-11-20 17:05:27', '2022-11-20 17:05:27'),
(89, 9, '2022-11-20 17:05:53', '2022-11-20 17:05:53'),
(90, 9, '2022-11-20 17:06:23', '2022-11-20 17:06:23'),
(91, 9, '2022-11-20 17:06:57', '2022-11-20 17:06:57'),
(92, 13, '2023-01-08 04:18:50', '2023-01-08 04:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city_translations`
--

INSERT INTO `city_translations` (`id`, `city_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(7, 4, 'en', 'Amman', NULL, NULL),
(8, 4, 'ar', 'عمان', NULL, NULL),
(9, 5, 'en', 'Riyadh', NULL, NULL),
(10, 5, 'ar', 'الرياض', NULL, NULL),
(11, 6, 'en', 'Makkah', NULL, NULL),
(12, 6, 'ar', 'مكة', NULL, NULL),
(13, 7, 'en', 'Muscat', NULL, NULL),
(14, 7, 'ar', 'مسقط', NULL, NULL),
(15, 8, 'en', 'Manamah', NULL, NULL),
(16, 8, 'ar', 'المنامة', NULL, NULL),
(17, 9, 'en', 'Dubai', NULL, NULL),
(18, 9, 'ar', 'دبي', NULL, NULL),
(21, 11, 'en', 'Cairo', NULL, NULL),
(22, 11, 'ar', 'القاهرة', NULL, NULL),
(23, 12, 'en', 'ِAbha', NULL, NULL),
(24, 12, 'ar', 'ابها', NULL, NULL),
(25, 13, 'en', 'Dammam', NULL, NULL),
(26, 13, 'ar', 'الدمام', NULL, NULL),
(29, 15, 'en', 'Al Bahah', NULL, NULL),
(30, 15, 'ar', 'الباحة', NULL, NULL),
(31, 16, 'en', 'Madina', NULL, NULL),
(32, 16, 'ar', 'المدينة المنورة', NULL, NULL),
(33, 17, 'en', 'Qatif', NULL, NULL),
(34, 17, 'ar', 'القطيف', NULL, NULL),
(35, 18, 'en', 'Qurayyat', NULL, NULL),
(36, 18, 'ar', 'القريات', NULL, NULL),
(37, 19, 'en', 'Al-Omran', NULL, NULL),
(38, 19, 'ar', 'العمران', NULL, NULL),
(39, 20, 'en', 'Tabuk', NULL, NULL),
(40, 20, 'ar', 'تبوك', NULL, NULL),
(41, 21, 'en', 'Al-\'Ula', NULL, NULL),
(42, 21, 'ar', 'العُلا', NULL, NULL),
(43, 22, 'en', 'Dhahran', NULL, NULL),
(44, 22, 'ar', 'طهران', NULL, NULL),
(45, 23, 'en', 'Ha\'il', NULL, NULL),
(46, 23, 'ar', 'حائل', NULL, NULL),
(47, 24, 'en', 'Jeddah', NULL, NULL),
(48, 24, 'ar', 'جدة', NULL, NULL),
(49, 25, 'en', 'Jizan', NULL, NULL),
(50, 25, 'ar', 'جيزان', NULL, NULL),
(51, 26, 'en', 'Jubail', NULL, NULL),
(52, 26, 'ar', 'جبيل', NULL, NULL),
(53, 27, 'en', 'Khafji', NULL, NULL),
(54, 27, 'ar', 'الخفجي', NULL, NULL),
(55, 28, 'en', 'Khobar', NULL, NULL),
(56, 28, 'ar', 'الخُبر', NULL, NULL),
(57, 29, 'en', 'Hawalli', NULL, NULL),
(58, 29, 'ar', 'حولي', NULL, NULL),
(59, 30, 'en', 'Kuwait', NULL, NULL),
(60, 30, 'ar', 'الكويت', NULL, NULL),
(61, 31, 'en', 'Abu Dhabi', NULL, NULL),
(62, 31, 'ar', 'أبو ظبي', NULL, NULL),
(63, 32, 'en', 'Alaine', NULL, NULL),
(64, 32, 'ar', 'العين', NULL, NULL),
(65, 33, 'en', 'Sharjah', NULL, NULL),
(66, 33, 'ar', 'الشارقة', NULL, NULL),
(67, 34, 'en', 'Ahmadi', NULL, NULL),
(68, 34, 'ar', 'الأحمدي', NULL, NULL),
(69, 35, 'en', 'Alfarwanya', NULL, NULL),
(70, 35, 'ar', 'الفروانية', NULL, NULL),
(71, 36, 'en', 'Salalah', NULL, NULL),
(72, 36, 'ar', 'صلاله', NULL, NULL),
(73, 37, 'en', 'Zarka', NULL, NULL),
(74, 37, 'ar', 'الزرقاء', NULL, NULL),
(75, 38, 'en', 'Irbid', NULL, NULL),
(76, 38, 'ar', 'اربد', NULL, NULL),
(77, 39, 'en', 'Aqaba', NULL, NULL),
(78, 39, 'ar', 'العقبة', NULL, NULL),
(79, 40, 'en', 'Jerash', NULL, NULL),
(80, 40, 'ar', 'جرش', NULL, NULL),
(81, 41, 'en', 'Alexandria', NULL, NULL),
(82, 41, 'ar', 'الاسكندرية', NULL, NULL),
(83, 42, 'en', 'Aswan', NULL, NULL),
(84, 42, 'ar', 'اسوان', NULL, NULL),
(85, 43, 'en', 'Luxor', NULL, NULL),
(86, 43, 'ar', 'الأقصر', NULL, NULL),
(87, 44, 'en', 'Giza', NULL, NULL),
(88, 44, 'ar', 'الجيزة', NULL, NULL),
(89, 45, 'en', 'Faiyum', NULL, NULL),
(90, 45, 'ar', 'الفيوم', NULL, NULL),
(91, 46, 'en', 'Hurghada', NULL, NULL),
(92, 46, 'ar', 'الغردقة', NULL, NULL),
(93, 47, 'en', 'Port Said', NULL, NULL),
(94, 47, 'ar', 'بور سعيد', NULL, NULL),
(95, 48, 'en', 'Ismailia', NULL, NULL),
(96, 48, 'ar', 'الاسماعيلية', NULL, NULL),
(97, 49, 'en', 'Tanta', NULL, NULL),
(98, 49, 'ar', 'طنطا', NULL, NULL),
(99, 50, 'en', 'Damietta', NULL, NULL),
(100, 50, 'ar', 'دمياط', NULL, NULL),
(101, 51, 'en', 'Asyut', NULL, NULL),
(102, 51, 'ar', 'اسيوط', NULL, NULL),
(103, 52, 'en', 'Qena', NULL, NULL),
(104, 52, 'ar', 'قنا', NULL, NULL),
(105, 53, 'en', 'Beni Suef', NULL, NULL),
(106, 53, 'ar', 'بني سويف', NULL, NULL),
(107, 54, 'en', 'Mansoura', NULL, NULL),
(108, 54, 'ar', 'المنصورة', NULL, NULL),
(109, 55, 'en', 'Suez', NULL, NULL),
(110, 55, 'ar', 'السويس', NULL, NULL),
(111, 56, 'en', 'Al Rayyan Municipality', NULL, NULL),
(112, 56, 'ar', 'الريان', NULL, NULL),
(113, 57, 'en', 'Al Wakrah', NULL, NULL),
(114, 57, 'ar', 'الوكره', NULL, NULL),
(115, 58, 'en', 'Mesaieed', NULL, NULL),
(116, 58, 'ar', 'مسيعيد', NULL, NULL),
(117, 59, 'en', 'Madinat ash Shamal', NULL, NULL),
(118, 59, 'ar', 'مدينة الشمال', NULL, NULL),
(119, 60, 'en', 'Al Khor', NULL, NULL),
(120, 60, 'ar', 'الخور', NULL, NULL),
(121, 61, 'en', 'Dukhan', NULL, NULL),
(122, 61, 'ar', 'دخان', NULL, NULL),
(123, 62, 'en', 'Al Wukair', NULL, NULL),
(124, 62, 'ar', 'الوكير', NULL, NULL),
(125, 63, 'en', 'Lusail', NULL, NULL),
(126, 63, 'ar', 'لوسيل', NULL, NULL),
(127, 64, 'en', 'Muharraq', NULL, NULL),
(128, 64, 'ar', 'المحرق', NULL, NULL),
(129, 65, 'en', 'Al Hajar', NULL, NULL),
(130, 65, 'ar', 'الحجر', NULL, NULL),
(131, 66, 'en', 'Hamad Town', NULL, NULL),
(132, 66, 'ar', 'مدينة حمد', NULL, NULL),
(133, 67, 'en', 'Riffa', NULL, NULL),
(134, 67, 'ar', 'الرفاع', NULL, NULL),
(135, 68, 'en', 'Budaiya', NULL, NULL),
(136, 68, 'ar', 'البديع', NULL, NULL),
(137, 69, 'en', 'Isa Town', NULL, NULL),
(138, 69, 'ar', 'مدينة عيسى', NULL, NULL),
(139, 70, 'en', 'Jidhafs', NULL, NULL),
(140, 70, 'ar', 'جدحفص', NULL, NULL),
(141, 71, 'en', 'Nizwa', NULL, NULL),
(142, 71, 'ar', 'نزوى', NULL, NULL),
(143, 72, 'en', 'Sur', NULL, NULL),
(144, 72, 'ar', 'صور', NULL, NULL),
(145, 73, 'en', 'Sohar', NULL, NULL),
(146, 73, 'ar', 'صحار', NULL, NULL),
(147, 74, 'en', 'Khasab', NULL, NULL),
(148, 74, 'ar', 'خصب', NULL, NULL),
(149, 75, 'en', 'Seeb', NULL, NULL),
(150, 75, 'ar', 'السيب', NULL, NULL),
(151, 76, 'en', 'Rustaq', NULL, NULL),
(152, 76, 'ar', 'الرستاق', NULL, NULL),
(153, 77, 'en', 'Bahla', NULL, NULL),
(154, 77, 'ar', 'بهلاء', NULL, NULL),
(155, 78, 'en', 'Mutrah', NULL, NULL),
(156, 78, 'ar', 'مطرح', NULL, NULL),
(157, 79, 'en', 'Ajman', NULL, NULL),
(158, 79, 'ar', 'عجمان', NULL, NULL),
(159, 80, 'en', 'Ras Al-Khaimah', NULL, NULL),
(160, 80, 'ar', 'راس الخيمة', NULL, NULL),
(161, 81, 'en', 'Fujairah', NULL, NULL),
(162, 81, 'ar', 'الفجيرة', NULL, NULL),
(163, 82, 'en', 'Umm Al Quwain', NULL, NULL),
(164, 82, 'ar', 'أم القيوين', NULL, NULL),
(165, 83, 'en', 'Mangaf', NULL, NULL),
(166, 83, 'ar', 'المنقف', NULL, NULL),
(167, 84, 'en', 'Mahboula', NULL, NULL),
(168, 84, 'ar', 'المهبوله', NULL, NULL),
(169, 85, 'en', 'Al Jahra', NULL, NULL),
(170, 85, 'ar', 'الجهراء', NULL, NULL),
(171, 86, 'en', 'Fintas', NULL, NULL),
(172, 86, 'ar', 'الفنطاس', NULL, NULL),
(173, 87, 'en', 'Fahaheel', NULL, NULL),
(174, 87, 'ar', 'الفحاحيل', NULL, NULL),
(175, 88, 'en', 'Salmiya', NULL, NULL),
(176, 88, 'ar', 'السالمية', NULL, NULL),
(177, 89, 'en', 'Sabah Al Salem', NULL, NULL),
(178, 89, 'ar', 'صباح السالم', NULL, NULL),
(179, 90, 'en', 'Zahra', NULL, NULL),
(180, 90, 'ar', 'الزهراء', NULL, NULL),
(181, 91, 'en', 'Shamiya', NULL, NULL),
(182, 91, 'ar', 'الشامية', NULL, NULL),
(183, 92, 'en', 'Baghdad', NULL, NULL),
(184, 92, 'ar', 'بغداد', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `player_id` longtext DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verify` varchar(255) NOT NULL DEFAULT '0',
  `active` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `player_id`, `country_id`, `city_id`, `photo`, `fullname`, `username`, `gender`, `mobile`, `email`, `password`, `verify`, `active`, `created_at`, `updated_at`) VALUES
(2, NULL, 4, 5, 'assets/files/client/images/client_1670099108.jpg', 'M  A K', 'super', 'male', '123456', 'Bbb@gmail.com', '$2y$10$eYwAV/sQrLh19ucvWqL6QeuHKI7K6kIgsinZnEkEkwKBProKBlRVu', '0', '0', '2022-06-29 02:04:33', '2023-07-05 01:22:31'),
(9, NULL, 3, 4, NULL, 'تيست', 'تيست', 'meal', '05958444467', 'y.3.com', '$2y$10$nUTd91i/s6XQilPH4iWF0eLM5./LaEcfrifY7LTbVjBQOon8SORG2', '0', '0', '2022-07-12 12:55:18', '2023-07-09 02:08:46'),
(14, NULL, 4, 5, NULL, NULL, 'fahad', 'female', '505250474', 'faksa2009@gmail.com', '$2y$10$ijk1MA84uuzmkl3s7VPyru5LNmJqlnoJ7ENnHYWMJmqeO0QXFEKfK', '0', '0', '2022-08-28 03:43:24', '2022-08-28 03:43:24'),
(31, '2f4dce1f-effc-4234-beb0-b0f4548595fc', 3, 4, NULL, 'خليل محمد', 'خليل', 'male', '795927207', 'lll.sss2023@gmail.com', '$2y$10$m.1NdgMkgcIjLWH2DYDJteThNHszWyBn2jGjb0vt1fSwt2yQ9MaiW', '0', '0', '2023-01-15 02:11:58', '2023-01-22 00:43:01'),
(32, NULL, 3, 4, NULL, 'emad', 'emad', 'meal', '+962780111107', 'wbte1chno@gmail.com', '$2y$10$pba29GGfiMuDh3XKXqI/8.75j6Eb3d8MA78w/NX5N25dZnfXiSgY.', '0', '0', '2023-01-22 01:15:51', '2024-01-17 22:17:09'),
(33, NULL, 3, 4, NULL, 'yahya', 'yahya', 'male', '+9620595388812', 'yahya@app.com', '$2y$10$vSdXADhoaTPtPU6VhRzFL.czg35eqS2juGxkrJpnPrmJLUOl5lf6a', '0', '0', '2023-01-22 19:49:18', '2023-07-10 14:22:29'),
(38, NULL, 4, 5, NULL, 'علي ابو بندر', 'علي الرويلي', 'male', '+9660505428630', 'alihalhool@hotmail.com', '$2y$10$ixVPnzUS0UYjTU2sy0LkPOaZsoDrYeYb97QnKNQ35X8omv3my24UC', '0', '0', '2023-02-14 01:23:05', '2023-02-14 01:23:05'),
(39, NULL, 10, 11, NULL, 'Doniaeid', 'Donia', 'female', '+200110468046', 'Doniaeid420@gmail.com', '$2y$10$INQyOdKbxb8Y3u2mElNGSOX4ud4GexfAs/EduNqFodET3qilpzLU2', '0', '0', '2023-02-19 04:54:20', '2023-02-19 04:54:20'),
(40, '50228531-3ee1-4132-8560-24cc8ed8bdf4', 4, 5, NULL, 'عبدالله الغالي علي عثمان', 'بيانكونيري', 'male', '+966564909932', 'abdallaalgalysli@gmail.com', '$2y$10$RU/vjiD0cHTmtgwF0I7BeOyakl/.lkxfoWVQNo9MqsPDtrvdBIkwW', '0', '0', '2023-04-04 10:07:59', '2023-04-04 10:12:10'),
(41, '6eaa56dc-d3d8-489b-982d-c02134d13ba0', 4, 5, NULL, 'Fahad Ali', 'Owner', 'male', '+966591373737', 'faksa2009@gmail.com', '$2y$10$DVCInJX0SCZu5MoaZBDKBuWNDjh6ip26uuJLSA6xrskPrGuSHThO2', '0', '0', '2023-05-08 05:30:19', '2023-05-08 05:31:26'),
(42, NULL, 3, 4, NULL, 'ع م ز', 'عماد', 'male', '+962777777777', 'wbtechno@gmail.com', '$2y$10$t8vpwmJpsiyHt2XG8b8evekgK.5biBuqHbxsXUxFcJyrxi62aPhQC', '0', '0', '2023-07-06 03:40:12', '2023-07-06 03:40:12'),
(43, 'd581d398-8369-4b06-9253-e15788b14352', 3, 4, NULL, 'u e', 'u', 'male', '+962123', 'wbtechno@gmail.com', '$2y$10$X4hUI/XtKaQMGEXS/kbm/usmavpKXAzjl8UWX3N8YH2tWvHMyucNG', '0', '0', '2023-07-06 19:36:54', '2023-07-06 19:37:05'),
(44, '28b5b732-6737-42a9-965a-07fd6426df95', 3, 4, NULL, 'yyy', 'yyy', 'male', '+962123123', 'yyy@gmail.com', '$2y$10$gW1VsOc.2yQbUDoNTaq5W.cuDmnW0h7WXxRX4KdmPwRMzkUabk5uC', '0', '0', '2023-07-09 01:34:55', '2023-07-09 01:35:10'),
(45, NULL, 3, 37, NULL, '0780111107', '0780111107', 'male', '+9620780111107', '0780111107', '$2y$10$7Xa4nhd6UZsrRm.spzf/2uCC2Yk/dD0VDLvkxn2g3ggm9BeWDMZs2', '0', '0', '2023-07-09 03:39:20', '2023-07-10 14:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `client_notifies`
--

CREATE TABLE `client_notifies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notifies`
--

INSERT INTO `client_notifies` (`id`, `client_id`, `post_id`, `created_at`, `updated_at`) VALUES
(303, 32, 84, '2023-12-31 23:57:37', '2023-12-31 23:57:37'),
(304, 32, 84, '2024-01-01 01:50:58', '2024-01-01 01:50:58'),
(305, 32, 84, '2024-01-01 01:50:59', '2024-01-01 01:50:59'),
(306, 32, 84, '2024-01-01 01:50:59', '2024-01-01 01:50:59'),
(307, 32, 84, '2024-01-01 01:51:00', '2024-01-01 01:51:00'),
(308, 32, 84, '2024-01-01 01:51:01', '2024-01-01 01:51:01'),
(309, 32, 84, '2024-01-01 01:51:01', '2024-01-01 01:51:01'),
(310, 32, 84, '2024-01-01 01:54:18', '2024-01-01 01:54:18'),
(311, 32, 84, '2024-01-01 01:56:08', '2024-01-01 01:56:08'),
(312, 32, 84, '2024-01-01 02:00:24', '2024-01-01 02:00:24'),
(313, 32, 84, '2024-01-01 02:01:19', '2024-01-01 02:01:19'),
(314, 32, 85, '2024-01-04 20:28:10', '2024-01-04 20:28:10'),
(315, 32, 85, '2024-01-04 20:28:25', '2024-01-04 20:28:25'),
(316, 32, 85, '2024-01-04 20:29:07', '2024-01-04 20:29:07'),
(317, 32, 85, '2024-01-04 20:29:07', '2024-01-04 20:29:07'),
(318, 32, 85, '2024-01-04 20:29:08', '2024-01-04 20:29:08'),
(319, 32, 85, '2024-01-04 20:29:09', '2024-01-04 20:29:09'),
(320, 32, 85, '2024-01-04 20:29:09', '2024-01-04 20:29:09'),
(321, 32, 85, '2024-01-04 20:29:10', '2024-01-04 20:29:10'),
(322, 32, 85, '2024-01-04 20:29:56', '2024-01-04 20:29:56'),
(323, 32, 84, '2024-01-04 20:30:25', '2024-01-04 20:30:25'),
(324, 32, 84, '2024-01-04 20:36:36', '2024-01-04 20:36:36'),
(325, 32, 84, '2024-01-04 20:46:49', '2024-01-04 20:46:49'),
(326, 32, 85, '2024-01-04 20:54:07', '2024-01-04 20:54:07'),
(327, 32, 84, '2024-01-04 20:54:22', '2024-01-04 20:54:22'),
(328, 32, 86, '2024-01-05 00:12:47', '2024-01-05 00:12:47'),
(329, 32, 86, '2024-01-05 00:13:20', '2024-01-05 00:13:20'),
(330, 32, 87, '2024-01-05 00:18:45', '2024-01-05 00:18:45'),
(331, 32, 87, '2024-01-08 20:31:49', '2024-01-08 20:31:49'),
(332, 32, 87, '2024-01-08 20:31:50', '2024-01-08 20:31:50'),
(333, 32, 87, '2024-01-08 20:31:50', '2024-01-08 20:31:50'),
(334, 32, 87, '2024-01-08 20:31:51', '2024-01-08 20:31:51'),
(335, 32, 87, '2024-01-08 20:31:52', '2024-01-08 20:31:52'),
(336, 32, 87, '2024-01-08 20:31:52', '2024-01-08 20:31:52'),
(337, 32, 88, '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(338, 32, 84, '2024-01-11 02:00:43', '2024-01-11 02:00:43'),
(339, 32, 84, '2024-01-11 02:01:11', '2024-01-11 02:01:11'),
(340, 32, 86, '2024-01-11 02:06:53', '2024-01-11 02:06:53'),
(341, 32, 86, '2024-01-11 02:06:53', '2024-01-11 02:06:53'),
(342, 32, 86, '2024-01-11 02:06:54', '2024-01-11 02:06:54'),
(343, 32, 86, '2024-01-11 02:06:55', '2024-01-11 02:06:55'),
(344, 32, 86, '2024-01-11 02:06:55', '2024-01-11 02:06:55'),
(345, 32, 86, '2024-01-11 02:06:56', '2024-01-11 02:06:56'),
(346, 32, 88, '2024-01-11 02:08:06', '2024-01-11 02:08:06'),
(347, 32, 88, '2024-01-11 02:08:07', '2024-01-11 02:08:07'),
(348, 32, 88, '2024-01-11 02:08:07', '2024-01-11 02:08:07'),
(349, 32, 88, '2024-01-11 02:08:08', '2024-01-11 02:08:08'),
(350, 32, 88, '2024-01-11 02:08:08', '2024-01-11 02:08:08'),
(351, 32, 88, '2024-01-11 02:08:09', '2024-01-11 02:08:09'),
(352, 32, 88, '2024-01-11 02:16:40', '2024-01-11 02:16:40'),
(353, 32, 84, '2024-01-11 02:16:52', '2024-01-11 02:16:52'),
(354, 32, 84, '2024-01-11 02:16:55', '2024-01-11 02:16:55'),
(364, 32, 85, '2024-01-11 03:24:55', '2024-01-11 03:24:55'),
(365, 32, 85, '2024-01-11 03:25:39', '2024-01-11 03:25:39'),
(374, 32, 85, '2024-01-13 04:26:15', '2024-01-13 04:26:15'),
(375, 32, 84, '2024-01-13 04:26:46', '2024-01-13 04:26:46'),
(376, 32, 86, '2024-01-13 04:26:56', '2024-01-13 04:26:56'),
(377, 32, 84, '2024-01-13 04:27:21', '2024-01-13 04:27:21'),
(378, 32, 88, '2024-01-14 04:23:35', '2024-01-14 04:23:35'),
(387, 32, 88, '2024-01-18 03:03:19', '2024-01-18 03:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `client_notify_translations`
--

CREATE TABLE `client_notify_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_notify_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notify_translations`
--

INSERT INTO `client_notify_translations` (`id`, `client_notify_id`, `locale`, `message`, `created_at`, `updated_at`) VALUES
(605, 303, 'ar', 'اٍعلانك قيد المراجعة', NULL, NULL),
(606, 303, 'en', 'Your ad is under review', NULL, NULL),
(607, 304, 'ar', 'تم نشر اٍعلانك بنجاح (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(608, 304, 'en', 'Your ad has been published successfully (mercedece classic model 1940) ', NULL, NULL),
(609, 305, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(610, 305, 'en', 'A new advertisement has been added', NULL, NULL),
(611, 306, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(612, 306, 'en', 'A new advertisement has been added', NULL, NULL),
(613, 307, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(614, 307, 'en', 'A new advertisement has been added', NULL, NULL),
(615, 308, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(616, 308, 'en', 'A new advertisement has been added', NULL, NULL),
(617, 309, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(618, 309, 'en', 'A new advertisement has been added', NULL, NULL),
(619, 310, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(620, 310, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(621, 311, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(622, 311, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(623, 312, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(624, 312, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(625, 313, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(626, 313, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(627, 314, 'ar', 'اٍعلانك قيد المراجعة', NULL, NULL),
(628, 314, 'en', 'Your ad is under review', NULL, NULL),
(629, 315, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(630, 315, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(631, 316, 'ar', 'تم نشر اٍعلانك بنجاح (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(632, 316, 'en', 'Your ad has been published successfully (mercedece 1960) ', NULL, NULL),
(633, 317, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(634, 317, 'en', 'A new advertisement has been added', NULL, NULL),
(635, 318, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(636, 318, 'en', 'A new advertisement has been added', NULL, NULL),
(637, 319, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(638, 319, 'en', 'A new advertisement has been added', NULL, NULL),
(639, 320, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(640, 320, 'en', 'A new advertisement has been added', NULL, NULL),
(641, 321, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(642, 321, 'en', 'A new advertisement has been added', NULL, NULL),
(643, 322, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(644, 322, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(645, 323, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(646, 323, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(647, 324, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(648, 324, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(649, 325, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(650, 325, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(651, 326, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(652, 326, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(653, 327, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(654, 327, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(655, 328, 'ar', 'اٍعلانك قيد المراجعة', NULL, NULL),
(656, 328, 'en', 'Your ad is under review', NULL, NULL),
(657, 329, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مكينة بي ام) ', NULL, NULL),
(658, 329, 'en', 'View contact information - contact information has been displayed. Advertisement  (مكينة بي ام) ', NULL, NULL),
(659, 330, 'ar', 'اٍعلانك قيد المراجعة', NULL, NULL),
(660, 330, 'en', 'Your ad is under review', NULL, NULL),
(661, 331, 'ar', 'تم نشر اٍعلانك بنجاح (مكينة فورد 150) ', NULL, NULL),
(662, 331, 'en', 'Your ad has been published successfully (Ford 150 Engine) ', NULL, NULL),
(663, 332, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(664, 332, 'en', 'A new advertisement has been added', NULL, NULL),
(665, 333, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(666, 333, 'en', 'A new advertisement has been added', NULL, NULL),
(667, 334, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(668, 334, 'en', 'A new advertisement has been added', NULL, NULL),
(669, 335, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(670, 335, 'en', 'A new advertisement has been added', NULL, NULL),
(671, 336, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(672, 336, 'en', 'A new advertisement has been added', NULL, NULL),
(673, 337, 'ar', 'اٍعلانك قيد المراجعة', NULL, NULL),
(674, 337, 'en', 'Your ad is under review', NULL, NULL),
(675, 338, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(676, 338, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(677, 339, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(678, 339, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(679, 340, 'ar', 'تم نشر اٍعلانك بنجاح (مكينة بي ام) ', NULL, NULL),
(680, 340, 'en', 'Your ad has been published successfully (BMW engine) ', NULL, NULL),
(681, 341, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(682, 341, 'en', 'A new advertisement has been added', NULL, NULL),
(683, 342, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(684, 342, 'en', 'A new advertisement has been added', NULL, NULL),
(685, 343, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(686, 343, 'en', 'A new advertisement has been added', NULL, NULL),
(687, 344, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(688, 344, 'en', 'A new advertisement has been added', NULL, NULL),
(689, 345, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(690, 345, 'en', 'A new advertisement has been added', NULL, NULL),
(691, 346, 'ar', 'تم نشر اٍعلانك بنجاح (مرسيدس ٢٠٠) ', NULL, NULL),
(692, 346, 'en', 'Your ad has been published successfully (m classic) ', NULL, NULL),
(693, 347, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(694, 347, 'en', 'A new advertisement has been added', NULL, NULL),
(695, 348, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(696, 348, 'en', 'A new advertisement has been added', NULL, NULL),
(697, 349, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(698, 349, 'en', 'A new advertisement has been added', NULL, NULL),
(699, 350, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(700, 350, 'en', 'A new advertisement has been added', NULL, NULL),
(701, 351, 'ar', 'تم اضافة اعلان جديد ', NULL, NULL),
(702, 351, 'en', 'A new advertisement has been added', NULL, NULL),
(703, 352, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس ٢٠٠) ', NULL, NULL),
(704, 352, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس ٢٠٠) ', NULL, NULL),
(705, 353, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(706, 353, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(707, 354, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(708, 354, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(727, 364, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(728, 364, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(729, 365, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(730, 365, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(747, 374, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(748, 374, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس موديل ١٩٦٠) ', NULL, NULL),
(749, 375, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(750, 375, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(751, 376, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مكينة بي ام) ', NULL, NULL),
(752, 376, 'en', 'View contact information - contact information has been displayed. Advertisement  (مكينة بي ام) ', NULL, NULL),
(753, 377, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(754, 377, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس كلاسيك موديل ١٩٤٠) ', NULL, NULL),
(755, 378, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس ٢٠٠) ', NULL, NULL),
(756, 378, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس ٢٠٠) ', NULL, NULL),
(773, 387, 'ar', 'مشاهدة معلومات التواصل - تم عرض بيانات التواصل الٍاعلان   (مرسيدس ٢٠٠) ', NULL, NULL),
(774, 387, 'en', 'View contact information - contact information has been displayed. Advertisement  (مرسيدس ٢٠٠) ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_post`
--

CREATE TABLE `client_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `visits` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `fullname`, `email`, `address`, `message`, `created_at`, `updated_at`) VALUES
(11, 'فهد علي', 'Faksa2009@gmail.com', 'الرياض', 'السلام عليكم مبروك', '2022-08-28 03:46:24', '2022-08-28 03:46:24'),
(12, 'عماد', 'wbtechno@gmail.com', 'عمان', 'تيست', '2022-12-04 03:27:47', '2022-12-04 03:27:47'),
(13, 'rrrr', 'wbtech2018@gmail.com', 'rrr', 'ttt', '2022-12-27 02:54:26', '2022-12-27 02:54:26'),
(15, 'ةيتيت', 'gfff@hhhh.com', 'تيتينني', 'نينيت ةيتين تيتهث ص نينيني عيشيني تيتي', '2023-12-23 17:53:06', '2023-12-23 17:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `photo`, `created_at`, `updated_at`) VALUES
(2, '+970', 'assets/files/country/images/country_1654860654.png', '2022-06-08 06:43:00', '2022-06-10 08:30:54'),
(3, '+962', 'assets/files/country/images/country_1654860913.jpg', '2022-06-08 06:43:26', '2022-06-10 08:35:13'),
(4, '+966', 'assets/files/country/images/country_1654860152.png', '2022-06-10 08:22:32', '2022-06-10 08:22:32'),
(6, '+968', 'assets/files/country/images/country_1704273922.png', '2022-07-05 16:59:48', '2024-01-03 17:25:22'),
(7, '+973', 'assets/files/country/images/country_1657026062.png', '2022-07-05 17:01:02', '2022-07-05 17:01:02'),
(8, '+971', 'assets/files/country/images/country_1657026107.png', '2022-07-05 17:01:47', '2022-07-05 17:01:47'),
(9, '+965', 'assets/files/country/images/country_1657026144.png', '2022-07-05 17:02:24', '2022-07-05 17:02:24'),
(10, '+20', 'assets/files/country/images/country_1657026193.png', '2022-07-05 17:03:13', '2022-07-05 17:03:13'),
(11, '+974', 'assets/files/country/images/country_1668677873.png', '2022-11-17 14:37:53', '2022-11-17 14:37:53'),
(12, '+961', 'assets/files/country/images/country_1668677975.png', '2022-11-17 14:39:35', '2022-11-17 14:39:35'),
(13, '+964', 'assets/files/country/images/country_1673126201.png', '2023-01-08 04:16:41', '2023-01-08 04:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `country_translations`
--

CREATE TABLE `country_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country_translations`
--

INSERT INTO `country_translations` (`id`, `country_id`, `locale`, `name`, `currency`, `created_at`, `updated_at`) VALUES
(3, 2, 'en', 'Palestine', 'JOD', NULL, NULL),
(4, 2, 'ar', 'فلسطين', 'دينار أردني', NULL, NULL),
(5, 3, 'en', 'Jordan', 'JD', NULL, NULL),
(6, 3, 'ar', 'الأردن', 'د.أ', NULL, NULL),
(7, 4, 'en', 'Saudi Arabia', 'SAR', NULL, NULL),
(8, 4, 'ar', 'السعودية', 'ر.س', NULL, NULL),
(11, 6, 'en', 'Oman', 'OMR', NULL, NULL),
(12, 6, 'ar', 'عُمان', 'ر.ع', NULL, NULL),
(13, 7, 'en', 'Bahrain', 'BHD', NULL, NULL),
(14, 7, 'ar', 'البحرين', 'د.ب', NULL, NULL),
(15, 8, 'en', 'UAE', 'AED', NULL, NULL),
(16, 8, 'ar', 'الامارات', 'د.إ', NULL, NULL),
(17, 9, 'en', 'Kuwait', 'KWD', NULL, NULL),
(18, 9, 'ar', 'الكويت', 'د.ك', NULL, NULL),
(19, 10, 'en', 'Egypt', 'EGP', NULL, NULL),
(20, 10, 'ar', 'مصر', 'ج.م', NULL, NULL),
(21, 11, 'en', 'Qatar', 'QAR', NULL, NULL),
(22, 11, 'ar', 'قطر', 'ر.ق', NULL, NULL),
(23, 12, 'en', 'Lebanon', 'LBP', NULL, NULL),
(24, 12, 'ar', 'لبنان', 'ل.ل', NULL, NULL),
(25, 13, 'en', 'Iraq', 'IQD', NULL, NULL),
(26, 13, 'ar', 'العراق', 'د.ع', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_client`
--

CREATE TABLE `favorite_client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inputType` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `inputType`, `created_at`, `updated_at`) VALUES
(3, 'checkedBox', '2022-06-08 21:48:37', '2022-06-10 08:09:02'),
(8, 'checkedBox', '2022-06-10 08:04:20', '2022-06-10 08:04:20'),
(10, 'checkedBox', '2022-08-28 03:07:16', '2022-08-28 03:07:16'),
(12, 'checkedBox', '2022-12-06 00:52:34', '2022-12-06 00:56:54'),
(17, 'checkedBox', '2023-05-08 05:51:16', '2023-05-08 05:51:16'),
(18, 'checkedBox', '2023-05-08 05:52:22', '2023-05-08 05:52:22'),
(19, 'checkedBox', '2023-07-10 14:02:00', '2023-07-10 14:02:00'),
(20, 'checkedBox', '2023-07-15 18:18:07', '2023-07-15 18:18:07'),
(21, 'text', '2023-12-23 16:59:57', '2023-12-23 16:59:57'),
(22, 'checkedBox', '2024-01-01 01:49:19', '2024-01-01 01:49:19'),
(23, 'text', '2024-01-03 17:28:04', '2024-01-03 17:28:04'),
(24, 'text', '2024-01-03 17:28:54', '2024-01-03 17:28:54'),
(25, 'checkedBox', '2024-01-11 20:34:53', '2024-01-11 20:34:53'),
(26, 'text', '2024-01-17 22:18:52', '2024-01-17 22:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `feature_post`
--

CREATE TABLE `feature_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_post`
--

INSERT INTO `feature_post` (`id`, `post_id`, `feature_id`, `value`, `created_at`, `updated_at`) VALUES
(638, 84, 3, '0', NULL, NULL),
(639, 84, 8, '0', NULL, NULL),
(640, 84, 10, '1', NULL, NULL),
(641, 84, 12, '1', NULL, NULL),
(642, 84, 17, '1', NULL, NULL),
(643, 84, 18, '1', NULL, NULL),
(644, 84, 19, '0', NULL, NULL),
(645, 84, 20, '1', NULL, NULL),
(646, 84, 21, 'فحص', NULL, NULL),
(647, 84, 22, '0', NULL, NULL),
(648, 84, 23, '0', NULL, NULL),
(649, 84, 24, '0', NULL, NULL),
(650, 85, 3, '0', NULL, NULL),
(651, 85, 8, '0', NULL, NULL),
(652, 85, 10, '1', NULL, NULL),
(653, 85, 12, '1', NULL, NULL),
(654, 85, 17, '1', NULL, NULL),
(655, 85, 18, '0', NULL, NULL),
(656, 85, 19, '1', NULL, NULL),
(657, 85, 20, '1', NULL, NULL),
(658, 85, 21, '0', NULL, NULL),
(659, 85, 22, '1', NULL, NULL),
(660, 85, 23, '1960', NULL, NULL),
(661, 85, 24, '50000', NULL, NULL),
(662, 86, 12, '1', NULL, NULL),
(663, 86, 21, 'بحالة جيدة', NULL, NULL),
(664, 87, 12, '1', NULL, NULL),
(665, 87, 21, 'بحالة الوكالة', NULL, NULL),
(666, 88, 3, '1', NULL, NULL),
(667, 88, 8, '0', NULL, NULL),
(668, 88, 10, '0', NULL, NULL),
(669, 88, 12, '0', NULL, NULL),
(670, 88, 17, '0', NULL, NULL),
(671, 88, 18, '1', NULL, NULL),
(672, 88, 19, '0', NULL, NULL),
(673, 88, 20, '0', NULL, NULL),
(674, 88, 21, '0', NULL, NULL),
(675, 88, 22, '1', NULL, NULL),
(676, 88, 23, '1960', NULL, NULL),
(677, 88, 24, '200000', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature_sub_category`
--

CREATE TABLE `feature_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_sub_category`
--

INSERT INTO `feature_sub_category` (`id`, `feature_id`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(241, 12, 23, NULL, NULL),
(243, 21, 23, NULL, NULL),
(265, 3, 22, NULL, NULL),
(266, 8, 22, NULL, NULL),
(267, 10, 22, NULL, NULL),
(269, 12, 22, NULL, NULL),
(270, 17, 22, NULL, NULL),
(271, 18, 22, NULL, NULL),
(272, 19, 22, NULL, NULL),
(273, 20, 22, NULL, NULL),
(274, 21, 22, NULL, NULL),
(275, 22, 22, NULL, NULL),
(276, 23, 22, NULL, NULL),
(277, 24, 22, NULL, NULL),
(279, 12, 24, NULL, NULL),
(280, 21, 24, NULL, NULL),
(281, 3, 25, NULL, NULL),
(282, 8, 25, NULL, NULL),
(283, 10, 25, NULL, NULL),
(284, 12, 25, NULL, NULL),
(285, 19, 25, NULL, NULL),
(286, 22, 25, NULL, NULL),
(287, 23, 25, NULL, NULL),
(288, 24, 25, NULL, NULL),
(302, 3, 26, NULL, NULL),
(303, 8, 26, NULL, NULL),
(304, 10, 26, NULL, NULL),
(305, 12, 26, NULL, NULL),
(306, 17, 26, NULL, NULL),
(307, 18, 26, NULL, NULL),
(308, 19, 26, NULL, NULL),
(309, 20, 26, NULL, NULL),
(310, 21, 26, NULL, NULL),
(311, 22, 26, NULL, NULL),
(312, 23, 26, NULL, NULL),
(313, 24, 26, NULL, NULL),
(314, 25, 26, NULL, NULL),
(315, 26, 26, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `feature_translations`
--

CREATE TABLE `feature_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_translations`
--

INSERT INTO `feature_translations` (`id`, `feature_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(5, 3, 'en', 'sunroof', NULL, NULL),
(6, 3, 'ar', 'فتحة سقف', NULL, NULL),
(15, 8, 'en', 'Original Paint', NULL, NULL),
(16, 8, 'ar', 'الدهان الأصلي', NULL, NULL),
(19, 10, 'en', 'Partially repainted', NULL, NULL),
(20, 10, 'ar', 'أعيد دهانها جزئياً', NULL, NULL),
(23, 12, 'en', 'Used', NULL, NULL),
(24, 12, 'ar', 'مستعمل', NULL, NULL),
(33, 17, 'en', 'no accidents', NULL, NULL),
(34, 17, 'ar', 'لا يوجد حوادث', NULL, NULL),
(35, 18, 'en', 'Automatic', NULL, NULL),
(36, 18, 'ar', 'اوتوماتيك', NULL, NULL),
(37, 19, 'en', 'Manual', NULL, NULL),
(38, 19, 'ar', 'يدوي', NULL, NULL),
(39, 20, 'en', 'casouline', NULL, NULL),
(40, 20, 'ar', 'بنزين', NULL, NULL),
(41, 21, 'en', 'note', NULL, NULL),
(42, 21, 'ar', 'ملاحظة', NULL, NULL),
(43, 22, 'en', 'Gomrok', NULL, NULL),
(44, 22, 'ar', 'جمرك', NULL, NULL),
(45, 23, 'en', 'year', NULL, NULL),
(46, 23, 'ar', 'السنة', NULL, NULL),
(47, 24, 'en', 'Counter', NULL, NULL),
(48, 24, 'ar', 'العداد', NULL, NULL),
(49, 25, 'en', 'insurance', NULL, NULL),
(50, 25, 'ar', 'تأمين', NULL, NULL),
(51, 26, 'en', 'COLOR', NULL, NULL),
(52, 26, 'ar', 'COLOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `generals`
--

CREATE TABLE `generals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generals`
--

INSERT INTO `generals` (`id`, `email`, `mobile`, `logo`, `icon`, `created_at`, `updated_at`) VALUES
(2, 'info@classicsalekw.com', '123456', 'assets/files/website/setting/logo_1704024236.png', 'assets/files/website/setting/icon_1704024236.png', '2022-06-19 13:58:11', '2023-12-31 20:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `general_translations`
--

CREATE TABLE `general_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `general_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_translations`
--

INSERT INTO `general_translations` (`id`, `general_id`, `locale`, `title`, `desc`, `location`, `created_at`, `updated_at`) VALUES
(2, 2, 'en', 'Classic sale', 'Specialize Website & APPS for Car Services', 'Kuwait', NULL, NULL),
(3, 2, 'ar', 'كلاسيك سيل', 'موقع مختص في بيع السيارات', 'الكويت', NULL, NULL);

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
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2022_06_07_121806_create_admins_table', 1),
(9, '2022_06_07_144136_create_categories_table', 2),
(10, '2022_06_07_145031_create_category_translations_table', 2),
(11, '2022_06_08_073334_create_sub_categories_table', 3),
(12, '2022_06_08_073453_create_sub_category_translations_table', 3),
(13, '2022_06_08_091727_create_countries_table', 4),
(14, '2022_06_08_091926_create_country_translations_table', 4),
(15, '2022_06_08_092049_create_cities_table', 4),
(16, '2022_06_08_092206_create_city_translations_table', 4),
(18, '2022_06_08_180321_create_clients_table', 5),
(20, '2022_06_09_003138_create_features_table', 6),
(21, '2022_06_09_003254_create_feature_translations_table', 6),
(22, '2022_06_09_011531_create_feature_sub_category_table', 7),
(24, '2022_06_09_023029_create_photos_table', 8),
(28, '2022_06_10_215222_laratrust_setup_tables', 9),
(30, '2022_06_11_181723_create_terms_table', 10),
(31, '2022_06_11_181847_create_term_translations_table', 10),
(32, '2022_06_11_185427_create_policies_table', 11),
(33, '2022_06_11_185503_create_policy_translations_table', 11),
(34, '2022_06_11_233037_create_category_sub_category_table', 12),
(35, '2022_06_18_000941_create_services_table', 13),
(36, '2022_06_19_160227_create_generals_table', 13),
(37, '2022_06_19_160338_create_general_translations_table', 13),
(38, '2022_06_20_162454_create_sliders_table', 14),
(39, '2022_06_09_023028_create_posts_table', 15),
(40, '2022_06_09_023844_create_feature_post_table', 15),
(41, '2022_06_20_201832_create_post_translations_table', 15),
(42, '2022_06_28_071630_create_contact_us_table', 16),
(43, '2022_06_28_073741_create_about_us_table', 16),
(44, '2022_06_28_073826_create_about_us_translations_table', 16),
(45, '2022_07_10_144520_create_favorite_client_table', 17),
(46, '2022_07_13_122130_create_client_post_table', 18),
(47, '2022_07_14_082045_create_client_notifies_table', 19),
(48, '2022_07_14_082103_create_client_notify_translations_table', 19),
(49, '2022_07_14_083005_create_admin_notifies_table', 19),
(50, '2022_07_14_083025_create_admin_notify_translations_table', 19),
(51, '2022_12_05_102031_create_app_settings_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('asd@asd', '4149', NULL),
('emem@yahoo.com', '7095', NULL),
('test@test.com', '1688', NULL),
('test2@test.com', '8281', NULL),
('dd@dd.com', '1441', NULL),
('fff@fff.com', '2037', NULL),
('mohmmed.khattab7334119@gmail.com', '7523', NULL),
('lll.sss2023@gmail.com', '3922', NULL),
('wbtechno@gmail.com', '8520', NULL),
('yahya@app.com', '6945', NULL),
('test@gmail.com', '5400', NULL),
('alihalhool@hotmail.com', '1091', NULL),
('Doniaeid420@gmail.com', '4354', NULL),
('abdallaalgalysli@gmail.com', '4018', NULL),
('faksa2009@gmail.com', '8527', NULL),
('yyy@gmail.com', '8174', NULL),
('0780111107', '5554', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'category-create', 'Create Category', 'Create Category', '2022-06-11 06:06:33', '2022-06-11 06:06:33'),
(2, 'category-read', 'Read Category', 'Read Category', '2022-06-11 06:06:33', '2022-06-11 06:06:33'),
(3, 'category-update', 'Update Category', 'Update Category', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(4, 'category-delete', 'Delete Category', 'Delete Category', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(5, 'country-create', 'Create Country', 'Create Country', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(6, 'country-read', 'Read Country', 'Read Country', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(7, 'country-update', 'Update Country', 'Update Country', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(8, 'country-delete', 'Delete Country', 'Delete Country', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(9, 'city-create', 'Create City', 'Create City', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(10, 'city-read', 'Read City', 'Read City', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(11, 'city-update', 'Update City', 'Update City', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(12, 'city-delete', 'Delete City', 'Delete City', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(13, 'client-create', 'Create Client', 'Create Client', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(14, 'client-read', 'Read Client', 'Read Client', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(15, 'client-update', 'Update Client', 'Update Client', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(16, 'client-delete', 'Delete Client', 'Delete Client', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(17, 'feature-create', 'Create Feature', 'Create Feature', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(18, 'feature-read', 'Read Feature', 'Read Feature', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(19, 'feature-update', 'Update Feature', 'Update Feature', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(20, 'feature-delete', 'Delete Feature', 'Delete Feature', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(21, 'post-create', 'Create Post', 'Create Post', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(22, 'post-read', 'Read Post', 'Read Post', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(23, 'post-update', 'Update Post', 'Update Post', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(24, 'post-delete', 'Delete Post', 'Delete Post', '2022-06-11 06:06:34', '2022-06-11 06:06:34'),
(25, 'subadmin-create', 'Create Subadmin', 'Create Subadmin', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(26, 'subadmin-read', 'Read Subadmin', 'Read Subadmin', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(27, 'subadmin-update', 'Update Subadmin', 'Update Subadmin', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(28, 'subadmin-delete', 'Delete Subadmin', 'Delete Subadmin', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(29, 'subcategory-create', 'Create Subcategory', 'Create Subcategory', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(30, 'subcategory-read', 'Read Subcategory', 'Read Subcategory', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(31, 'subcategory-update', 'Update Subcategory', 'Update Subcategory', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(32, 'subcategory-delete', 'Delete Subcategory', 'Delete Subcategory', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(33, 'slider-create', 'Create Slider', 'Create Slider', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(34, 'slider-read', 'Read Slider', 'Read Slider', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(35, 'slider-update', 'Update Slider', 'Update Slider', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(36, 'slider-delete', 'Delete Slider', 'Delete Slider', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(37, 'TermsAndConditions-create', 'Create TermsAndConditions', 'Create TermsAndConditions', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(38, 'TermsAndConditions-read', 'Read TermsAndConditions', 'Read TermsAndConditions', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(39, 'TermsAndConditions-update', 'Update TermsAndConditions', 'Update TermsAndConditions', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(40, 'TermsAndConditions-delete', 'Delete TermsAndConditions', 'Delete TermsAndConditions', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(41, 'PrivacyPolicy-create', 'Create PrivacyPolicy', 'Create PrivacyPolicy', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(42, 'PrivacyPolicy-read', 'Read PrivacyPolicy', 'Read PrivacyPolicy', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(43, 'PrivacyPolicy-update', 'Update PrivacyPolicy', 'Update PrivacyPolicy', '2022-06-11 06:06:35', '2022-06-11 06:06:35'),
(44, 'PrivacyPolicy-delete', 'Delete PrivacyPolicy', 'Delete PrivacyPolicy', '2022-06-11 06:06:35', '2022-06-11 06:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `permission_admin`
--

CREATE TABLE `permission_admin` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_admin`
--

INSERT INTO `permission_admin` (`permission_id`, `admin_id`, `user_type`) VALUES
(1, 13, 'App\\Models\\Admin'),
(2, 13, 'App\\Models\\Admin'),
(3, 13, 'App\\Models\\Admin'),
(4, 13, 'App\\Models\\Admin'),
(10, 13, 'App\\Models\\Admin'),
(13, 13, 'App\\Models\\Admin'),
(14, 13, 'App\\Models\\Admin'),
(15, 13, 'App\\Models\\Admin'),
(16, 13, 'App\\Models\\Admin'),
(18, 13, 'App\\Models\\Admin'),
(1, 14, 'App\\Models\\Admin'),
(6, 14, 'App\\Models\\Admin'),
(11, 14, 'App\\Models\\Admin'),
(16, 14, 'App\\Models\\Admin'),
(21, 14, 'App\\Models\\Admin'),
(22, 14, 'App\\Models\\Admin'),
(23, 14, 'App\\Models\\Admin'),
(24, 14, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1);

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `post_id`, `value`, `created_at`, `updated_at`) VALUES
(7, 4, 'assets/files/post/images/post_0_1654887448.jpg', '2022-06-10 15:57:28', '2022-06-10 15:57:28'),
(8, 4, 'assets/files/post/images/post_1_1654887448.png', '2022-06-10 15:57:28', '2022-06-10 15:57:28'),
(9, 4, 'assets/files/post/images/post_2_1654887448.jpg', '2022-06-10 15:57:29', '2022-06-10 15:57:29'),
(10, 4, 'assets/files/post/images/post_3_1654887449.png', '2022-06-10 15:57:29', '2022-06-10 15:57:29'),
(17, 1, 'assets/files/post/images/post_0_1655763084.jpg', '2022-06-20 19:11:24', '2022-06-20 19:11:24'),
(18, 1, 'assets/files/post/images/post_1_1655763084.jpg', '2022-06-20 19:11:24', '2022-06-20 19:11:24'),
(20, 1, 'assets/files/post/images/post_3_1655763085.jpg', '2022-06-20 19:11:25', '2022-06-20 19:11:25'),
(21, 2, 'assets/files/post/images/post_0_1655831497.jpg', '2022-06-21 21:11:37', '2022-06-21 21:11:37'),
(22, 2, 'assets/files/post/images/post_1_1655831497.jpg', '2022-06-21 21:11:37', '2022-06-21 21:11:37'),
(23, 2, 'assets/files/post/images/post_2_1655831497.jpg', '2022-06-21 21:11:37', '2022-06-21 21:11:37'),
(24, 3, 'assets/files/post/images/post_0_1656927338.jpg', '2022-07-04 13:35:38', '2022-07-04 13:35:38'),
(25, 4, 'assets/files/post/images/post_1_1656943657.jpeg', '2022-07-04 18:07:37', '2022-07-04 18:07:37'),
(28, 6, 'assets/files/post/images/post_0_1656955131.png', '2022-07-04 21:18:51', '2022-07-04 21:18:51'),
(29, 6, 'assets/files/post/images/post_1_1656955131.jpg', '2022-07-04 21:18:51', '2022-07-04 21:18:51'),
(34, 9, 'assets/files/post/images/post_0_1657023867.jpg', '2022-07-05 16:24:27', '2022-07-05 16:24:27'),
(35, 9, 'assets/files/post/images/post_1_1657023867.jpg', '2022-07-05 16:24:27', '2022-07-05 16:24:27'),
(36, 9, 'assets/files/post/images/post_2_1657023867.jpg', '2022-07-05 16:24:27', '2022-07-05 16:24:27'),
(39, 11, 'assets/files/post/images/post_1_1657041618.png', '2022-07-05 21:20:18', '2022-07-05 21:20:18'),
(40, 11, 'assets/files/post/images/post_2_1657041618.jpeg', '2022-07-05 21:20:18', '2022-07-05 21:20:18'),
(41, 11, 'assets/files/post/images/post_3_1657041618.jpg', '2022-07-05 21:20:18', '2022-07-05 21:20:18'),
(42, 12, 'assets/files/post/images/post_1_1657043147.png', '2022-07-05 21:45:47', '2022-07-05 21:45:47'),
(43, 12, 'assets/files/post/images/post_2_1657043147.jpeg', '2022-07-05 21:45:47', '2022-07-05 21:45:47'),
(44, 12, 'assets/files/post/images/post_3_1657043147.jpg', '2022-07-05 21:45:47', '2022-07-05 21:45:47'),
(45, 13, 'assets/files/post/images/post_1_1657043211.png', '2022-07-05 21:46:51', '2022-07-05 21:46:51'),
(46, 13, 'assets/files/post/images/post_2_1657043212.jpeg', '2022-07-05 21:46:52', '2022-07-05 21:46:52'),
(47, 13, 'assets/files/post/images/post_3_1657043212.jpg', '2022-07-05 21:46:52', '2022-07-05 21:46:52'),
(66, 20, 'assets/files/post/images/post_1_1657060082.png', '2022-07-06 02:28:02', '2022-07-06 02:28:02'),
(67, 20, 'assets/files/post/images/post_2_1657060082.jpeg', '2022-07-06 02:28:02', '2022-07-06 02:28:02'),
(68, 20, 'assets/files/post/images/post_3_1657060082.jpg', '2022-07-06 02:28:02', '2022-07-06 02:28:02'),
(72, 5, 'assets/files/post/images/post_0_1657191831.png', '2022-07-07 15:03:51', '2022-07-07 15:03:51'),
(73, 5, 'assets/files/post/images/post_1_1657191831.png', '2022-07-07 15:03:51', '2022-07-07 15:03:51'),
(74, 10, 'assets/files/post/images/post_0_1657191917.png', '2022-07-07 15:05:17', '2022-07-07 15:05:17'),
(75, 10, 'assets/files/post/images/post_1_1657191917.png', '2022-07-07 15:05:17', '2022-07-07 15:05:17'),
(78, 15, 'assets/files/post/images/post_0_1657602615.png', '2022-07-12 09:10:15', '2022-07-12 09:10:15'),
(79, 15, 'assets/files/post/images/post_1_1657602615.png', '2022-07-12 09:10:15', '2022-07-12 09:10:15'),
(80, 16, 'assets/files/post/images/post_0_1657602788.png', '2022-07-12 09:13:08', '2022-07-12 09:13:08'),
(81, 17, 'assets/files/post/images/post_0_1657602919.png', '2022-07-12 09:15:19', '2022-07-12 09:15:19'),
(82, 17, 'assets/files/post/images/post_1_1657602919.png', '2022-07-12 09:15:19', '2022-07-12 09:15:19'),
(83, 18, 'assets/files/post/images/post_0_1657603016.png', '2022-07-12 09:16:56', '2022-07-12 09:16:56'),
(84, 19, 'assets/files/post/images/post_0_1657603087.png', '2022-07-12 09:18:07', '2022-07-12 09:18:07'),
(85, 19, 'assets/files/post/images/post_1_1657603087.png', '2022-07-12 09:18:07', '2022-07-12 09:18:07'),
(86, 21, 'assets/files/post/images/post_0_1657603403.jpg', '2022-07-12 09:23:23', '2022-07-12 09:23:23'),
(87, 22, 'assets/files/post/images/post_0_1658004870.jpg', '2022-07-17 00:54:30', '2022-07-17 00:54:30'),
(88, 22, 'assets/files/post/images/post_1_1658004870.jpg', '2022-07-17 00:54:30', '2022-07-17 00:54:30'),
(89, 22, 'assets/files/post/images/post_2_1658004870.jpg', '2022-07-17 00:54:30', '2022-07-17 00:54:30'),
(92, 14, 'assets/files/post/images/post_0_1658006511.png', '2022-07-17 01:21:51', '2022-07-17 01:21:51'),
(93, 14, 'assets/files/post/images/post_1_1658006511.png', '2022-07-17 01:21:51', '2022-07-17 01:21:51'),
(94, 23, 'assets/files/post/images/post_0_1661642546.jpg', '2022-08-28 03:22:26', '2022-08-28 03:22:26'),
(95, 24, 'assets/files/post/images/post_0_1661647649.jpg', '2022-08-28 04:47:29', '2022-08-28 04:47:29'),
(96, 24, 'assets/files/post/images/post_1_1661647649.jpg', '2022-08-28 04:47:29', '2022-08-28 04:47:29'),
(97, 24, 'assets/files/post/images/post_2_1661647649.jpg', '2022-08-28 04:47:29', '2022-08-28 04:47:29'),
(98, 25, 'assets/files/post/images/post_0_1661725455.jpg', '2022-08-29 02:24:15', '2022-08-29 02:24:15'),
(99, 26, 'assets/files/post/images/post_0_1661729414.jpg', '2022-08-29 03:30:14', '2022-08-29 03:30:14'),
(100, 27, 'assets/files/post/images/post_0_1669031167.jpg', '2022-11-21 16:46:07', '2022-11-21 16:46:07'),
(101, 28, 'assets/files/post/images/post_0_1669656855.jpg', '2022-11-29 00:34:15', '2022-11-29 00:34:15'),
(102, 7, 'assets/files/post/images/post_0_1670136085.webp', '2022-12-04 13:41:25', '2022-12-04 13:41:25'),
(103, 8, 'assets/files/post/images/post_0_1670136197.jpg', '2022-12-04 13:43:17', '2022-12-04 13:43:17'),
(104, 29, 'assets/files/post/images/post_0_1671918457.png', '2022-12-25 04:47:37', '2022-12-25 04:47:37'),
(105, 30, 'assets/files/post/images/post_1_1671919087.jpg', '2022-12-25 04:58:07', '2022-12-25 04:58:07'),
(106, 31, 'assets/files/post/images/post_0_1671919261.png', '2022-12-25 05:01:01', '2022-12-25 05:01:01'),
(107, 32, 'assets/files/post/images/post_0_1672427280.jpg', '2022-12-31 02:08:00', '2022-12-31 02:08:00'),
(108, 32, 'assets/files/post/images/post_1_1672427280.jpg', '2022-12-31 02:08:00', '2022-12-31 02:08:00'),
(109, 33, 'assets/files/post/images/post_0_1672427705.jpg', '2022-12-31 02:15:05', '2022-12-31 02:15:05'),
(110, 33, 'assets/files/post/images/post_1_1672427705.jpg', '2022-12-31 02:15:05', '2022-12-31 02:15:05'),
(111, 33, 'assets/files/post/images/post_2_1672427705.jpg', '2022-12-31 02:15:05', '2022-12-31 02:15:05'),
(113, 34, 'assets/files/post/images/post_0_1672783102.png', '2023-01-04 04:58:22', '2023-01-04 04:58:22'),
(114, 35, 'assets/files/post/images/post_0_1673125045.jpg', '2023-01-08 03:57:25', '2023-01-08 03:57:25'),
(115, 36, 'assets/files/post/images/post_1_1673195924.jpg', '2023-01-08 23:38:44', '2023-01-08 23:38:44'),
(116, 37, 'assets/files/post/images/post_1_1673196051.jpg', '2023-01-08 23:40:51', '2023-01-08 23:40:51'),
(117, 38, 'assets/files/post/images/post_1_1673196260.jpg', '2023-01-08 23:44:20', '2023-01-08 23:44:20'),
(118, 39, 'assets/files/post/images/post_1_1673196511.jpg', '2023-01-08 23:48:31', '2023-01-08 23:48:31'),
(119, 40, 'assets/files/post/images/post_1_1673198229.jpg', '2023-01-09 00:17:09', '2023-01-09 00:17:09'),
(120, 41, 'assets/files/post/images/post_1_1673198740.jpg', '2023-01-09 00:25:40', '2023-01-09 00:25:40'),
(121, 42, 'assets/files/post/images/post_1_1673198755.jpg', '2023-01-09 00:25:55', '2023-01-09 00:25:55'),
(122, 43, 'assets/files/post/images/post_1_1673216064.jpg', '2023-01-09 05:14:24', '2023-01-09 05:14:24'),
(123, 44, 'assets/files/post/images/post_0_1673216269.jpg', '2023-01-09 05:17:49', '2023-01-09 05:17:49'),
(124, 44, 'assets/files/post/images/post_1_1673216269.jpg', '2023-01-09 05:17:49', '2023-01-09 05:17:49'),
(125, 45, 'assets/files/post/images/post_0_1673301703.jpg', '2023-01-10 05:01:43', '2023-01-10 05:01:43'),
(126, 45, 'assets/files/post/images/post_1_1673301703.jpg', '2023-01-10 05:01:43', '2023-01-10 05:01:43'),
(127, 46, 'assets/files/post/images/post_0_1673384114.jpg', '2023-01-11 03:55:14', '2023-01-11 03:55:14'),
(128, 47, 'assets/files/post/images/post_0_1673384171.jpg', '2023-01-11 03:56:11', '2023-01-11 03:56:11'),
(129, 48, 'assets/files/post/images/post_0_1673384314.jpg', '2023-01-11 03:58:34', '2023-01-11 03:58:34'),
(130, 49, 'assets/files/post/images/post_0_1673384550.jpg', '2023-01-11 04:02:30', '2023-01-11 04:02:30'),
(131, 50, 'assets/files/post/images/post_1_1673385005.jpg', '2023-01-11 04:10:05', '2023-01-11 04:10:05'),
(132, 51, 'assets/files/post/images/post_1_1673385136.jpg', '2023-01-11 04:12:16', '2023-01-11 04:12:16'),
(133, 52, 'assets/files/post/images/post_1_1673385155.jpg', '2023-01-11 04:12:35', '2023-01-11 04:12:35'),
(134, 53, 'assets/files/post/images/post_1_1673385313.jpg', '2023-01-11 04:15:13', '2023-01-11 04:15:13'),
(135, 54, 'assets/files/post/images/post_1_1673385353.jpg', '2023-01-11 04:15:53', '2023-01-11 04:15:53'),
(136, 55, 'assets/files/post/images/post_1_1673385425.jpg', '2023-01-11 04:17:05', '2023-01-11 04:17:05'),
(137, 56, 'assets/files/post/images/post_1_1673385466.jpg', '2023-01-11 04:17:46', '2023-01-11 04:17:46'),
(138, 57, 'assets/files/post/images/post_1_1673385564.jpg', '2023-01-11 04:19:24', '2023-01-11 04:19:24'),
(139, 58, 'assets/files/post/images/post_0_1673386005.jpg', '2023-01-11 04:26:45', '2023-01-11 04:26:45'),
(140, 59, 'assets/files/post/images/post_0_1673386079.jpg', '2023-01-11 04:27:59', '2023-01-11 04:27:59'),
(141, 60, 'assets/files/post/images/post_0_1673389400.jpg', '2023-01-11 05:23:20', '2023-01-11 05:23:20'),
(142, 61, 'assets/files/post/images/post_0_1673389418.jpg', '2023-01-11 05:23:38', '2023-01-11 05:23:38'),
(143, 62, 'assets/files/post/images/post_0_1673389440.jpg', '2023-01-11 05:24:00', '2023-01-11 05:24:00'),
(144, 63, 'assets/files/post/images/post_1_1673389450.jpg', '2023-01-11 05:24:10', '2023-01-11 05:24:10'),
(145, 64, 'assets/files/post/images/post_0_1673389455.jpg', '2023-01-11 05:24:15', '2023-01-11 05:24:15'),
(146, 65, 'assets/files/post/images/post_0_1673389480.jpg', '2023-01-11 05:24:40', '2023-01-11 05:24:40'),
(147, 66, 'assets/files/post/images/post_1_1673389618.jpg', '2023-01-11 05:26:58', '2023-01-11 05:26:58'),
(148, 67, 'assets/files/post/images/post_0_1673389682.jpg', '2023-01-11 05:28:02', '2023-01-11 05:28:02'),
(149, 68, 'assets/files/post/images/post_0_1673389698.jpg', '2023-01-11 05:28:18', '2023-01-11 05:28:18'),
(150, 69, 'assets/files/post/images/post_1_1673389855.jpg', '2023-01-11 05:30:55', '2023-01-11 05:30:55'),
(151, 70, 'assets/files/post/images/post_0_1673724390.jpg', '2023-01-15 02:26:30', '2023-01-15 02:26:30'),
(152, 71, 'assets/files/post/images/post_0_1674325130.jpg', '2023-01-22 01:18:50', '2023-01-22 01:18:50'),
(153, 72, 'assets/files/post/images/post_0_1674325391.jpg', '2023-01-22 01:23:11', '2023-01-22 01:23:11'),
(154, 73, 'assets/files/post/images/post_0_1674325604.jpg', '2023-01-22 01:26:44', '2023-01-22 01:26:44'),
(155, 74, 'assets/files/post/images/post_0_1674325787.jpg', '2023-01-22 01:29:47', '2023-01-22 01:29:47'),
(156, 75, 'assets/files/post/images/post_0_1674325938.jpg', '2023-01-22 01:32:18', '2023-01-22 01:32:18'),
(157, 76, 'assets/files/post/images/post_0_1674327243.jpg', '2023-01-22 01:54:03', '2023-01-22 01:54:03'),
(158, 77, 'assets/files/post/images/post_0_1674327386.jpg', '2023-01-22 01:56:26', '2023-01-22 01:56:26'),
(159, 78, 'assets/files/post/images/post_0_1688587095.jpg', '2023-07-06 02:58:15', '2023-07-06 02:58:15'),
(160, 79, 'assets/files/post/images/post_0_1688589437.png', '2023-07-06 03:37:17', '2023-07-06 03:37:17'),
(161, 80, 'assets/files/post/images/post_0_1688592326.jpg', '2023-07-06 04:25:26', '2023-07-06 04:25:26'),
(163, 81, 'assets/files/post/images/post_0_1688647732.png', '2023-07-06 19:48:52', '2023-07-06 19:48:52'),
(164, 82, 'assets/files/post/images/post_0_1689420912.jpg', '2023-07-15 18:35:12', '2023-07-15 18:35:12'),
(169, 83, 'assets/files/post/images/post_0_1704037977.jpg', '2023-12-31 23:52:57', '2023-12-31 23:52:57'),
(170, 83, 'assets/files/post/images/post_1_1704037977.jpg', '2023-12-31 23:52:57', '2023-12-31 23:52:57'),
(171, 83, 'assets/files/post/images/post_2_1704037977.jpg', '2023-12-31 23:52:57', '2023-12-31 23:52:57'),
(172, 83, 'assets/files/post/images/post_3_1704037977.jpg', '2023-12-31 23:52:57', '2023-12-31 23:52:57'),
(176, 84, 'assets/files/post/images/post_0_1704372706.jpg', '2024-01-04 20:51:46', '2024-01-04 20:51:46'),
(177, 85, 'assets/files/post/images/post_0_1704372827.jpg', '2024-01-04 20:53:47', '2024-01-04 20:53:47'),
(178, 86, 'assets/files/post/images/post_0_1704384767.jpg', '2024-01-05 00:12:47', '2024-01-05 00:12:47'),
(179, 87, 'assets/files/post/images/post_0_1704385125.jpg', '2024-01-05 00:18:45', '2024-01-05 00:18:45'),
(180, 88, 'assets/files/post/images/post_0_1704909619.jpg', '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(181, 88, 'assets/files/post/images/post_1_1704909619.jpg', '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(182, 88, 'assets/files/post/images/post_2_1704909619.jpg', '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(183, 88, 'assets/files/post/images/post_3_1704909619.jpg', '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(184, 88, 'assets/files/post/images/post_4_1704909619.jpg', '2024-01-11 02:00:19', '2024-01-11 02:00:19'),
(185, 89, 'assets/files/post/images/post_0_1704910765.jpg', '2024-01-11 02:19:25', '2024-01-11 02:19:25'),
(186, 90, 'assets/files/post/images/post_0_1704977009.jpg', '2024-01-11 20:43:29', '2024-01-11 20:43:29'),
(187, 90, 'assets/files/post/images/post_1_1704977009.jpg', '2024-01-11 20:43:29', '2024-01-11 20:43:29'),
(188, 90, 'assets/files/post/images/post_2_1704977009.jpg', '2024-01-11 20:43:29', '2024-01-11 20:43:29'),
(189, 91, 'assets/files/post/images/post_0_1705501291.jpg', '2024-01-17 22:21:31', '2024-01-17 22:21:31'),
(190, 91, 'assets/files/post/images/post_1_1705501291.jpg', '2024-01-17 22:21:31', '2024-01-17 22:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-06-11 16:03:28', '2022-06-11 16:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `policy_translations`
--

CREATE TABLE `policy_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `policy_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policy_translations`
--

INSERT INTO `policy_translations` (`id`, `policy_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Non-personally identifiable information\r\n\r\nThe site collects information about users wherever they interact with the site, and this information is not related to personal identity, but may include the type of smartphone and information about the communication methods used, or the company used to provide Internet service, or other similar information.\r\n We at your place respect your privacy and are committed to protecting it through our compliance with this policy.\r\nThis Policy describes the types of information we may collect from you or you may provide when you visit the Application and our practices for collecting, using, maintaining, protecting and disclosing that information. This policy applies to information we collect:\r\nWe are this app.\r\nIn email, texts and other electronic messages between you and this app.\r\nThrough mobile and desktop applications you can download from this site, which provide a customized, non-overwhelming interaction between you and this site.\r\nWhen you interact with our advertisements and applications on the Third Party Website and Services, if those applications or advertising applications include links to this policy.\r\nWhat information we collect about you and how we collect it\r\nWe collect several types of information from users of our site on and around the App, including information:\r\nwhich may be personally identifiable, such as a name, postal address, email address, property ID, or telephone number (“Personal Information”)\r\nThis is your goal individually. Do not define you; and gold about your internet connection, the equipment you use to access our website and usage details.\r\nHow we use your information\r\nWe use information that we collect about you or that you provide to us, and include any personal information:\r\nTo introduce our website and glad to you.\r\nTo provide you with information or services that you request from us.\r\nTo fulfill any other purpose you provide it to.\r\nTo provide you with notices, we have included expiration, billing and renewal notices.\r\nTo carry out obligations and sweep away our rights arising from any contracts entered into between you and us, included in billing and collection.\r\nTo notify you about changes to our site or any project or services we offer or provide.\r\nTo allow you to participate in interactive features on our site.\r\nIn any other way, we may describe when you provide the information.\r\nFor any other purposes with your consent.\r\nWe may also use your information to contact you about third party projects and services that may be of interest to you. If you do not want us to use your information in this way, please contact us at info@mkanek.com\r\nChoices about how we use and disclose your information, We strive to provide you with choices regarding the personal information you provide to us. We have established mechanisms to provide you with the following control over your information:\r\nTracking and advertising technologies. You can set your browser to refuse all or some browser cookies, or to alert you when cookies are smelling. If you disable or refuse cookies, please note that some parts of this website may not be accessible or not function properly.\r\nDisclosure of your information on partisan advertising. If you do not want us to share your personal information with you, do not continue or do not continue Promotion offers from the company.\r\nIf you do not wish to have your email address or contact information used by the Company to promote our third part projects or services, you may opt out by sending us an email stating your request to at info@mkanek.com\r\nAccess and correct your information\r\nYou can review and change your personal information by logging into the e-services application. You may also request that any personal information we hold about you be updated by contacting us at info@mkanek.com\r\nData security\r\nWe have implemented measures designed to secure your personal information from accidental loss and from unauthorized access, use, alteration and disclosure. All information you provide to us is stored on our secure servers behind firewalls. Any payment transactions will be encrypted using SSL technology.\r\nThe safety and security of your information also depends. Where we have given you (or where you have chosen) a password to access certain parts of our site, you are responsible for keeping that password confidential. We ask you not to share your password with anyone.\r\nIt does not apply to information collected by:\r\nus offline or through any other means, including any other website operated by any third party; or\r\nAny third party, including through any application or content (including advertising) that may link to the Site.\r\nPlease read this policy carefully to understand our policies and practices regarding your information and how we will treat it. If you do not agree with our policies and practices, your choice is not to use our website.\r\nBy accessing or using this website, you agree to this Privacy Policy.\r\nThis policy may change from time to time. Your continued use of this Website after changes have been made will be deemed acceptance of those changes, so please check the Policy periodically for updates.\r\nUsage details, IP addresses, cookies and other technologies\r\nAs you navigate and interact with our website, we may automatically collect certain information about your equipment, browsing actions, and patterns, including:\r\nDetails of your visits to our Site, including traffic data, location data, logs and other communication data, and the resources you access and use on the Site.\r\nInformation about your computer and the Internet, including your IP address, operating system, and browser type.\r\nThe information we collect automatically is statistical data. It helps us to improve our website and provide a better and more personalized service by enabling us to:\r\nEstimating our audience size and usage patterns.\r\nStore information about your preferences, which allows us to customize our website according to your individual interests. Speed ​​up your searches.\r\nRecognize you when you return to our site.\r\nThe technologies we use for automatic data collection may include:\r\nCookies (or browser cookies). A cookie is a small file placed on your computer\'s hard drive. You may refuse to accept browser cookies by activating the appropriate setting on your browser. However, if you select this setting, you may be unable to access certain parts of our site. Unless you have modified your browser setting so that it refuses cookies, our system will issue cookies when you point your browser to our website.\r\nFlash cookies. Some features of our Website may use local stored objects (or Flash cookies) to collect and store information about your preferences and navigation to and from our Website. Flash cookies are not managed by the same browser settings that are used for browser cookies.\r\n\r\nDisclosure of your information\r\nWe may disclose aggregate information about our users, information that does not identify any individual, without restriction.\r\nWe may disclose personal information that we collect or provide as described in this Privacy Policy:\r\nTo comply with any court order, law, or legal process, including to respond to any governmental or regulatory request.\r\nTo enforce or apply these Terms of Use or Terms of Sale and other agreements, including for billing and collection purposes.\r\nIf we believe disclosure is necessary or appropriate to protect the rights, property, or safety of the Company, our customers, or others. This includes exchanging information with other companies and organizations for the purposes of fraud protection and credit risk reduction.\r\nChanges to our Privacy Policy\r\nIt is our policy to post any changes we make to our Privacy Policy on this page. The date the Privacy Policy was last revised is indicated at the top of the page. You are responsible for periodically visiting our Site and this Privacy Policy to check for any changes.\r\ncontact information\r\nIf you have any questions or comments about this Privacy Policy and our privacy practices, contact us at info@mkanek.com', NULL, NULL),
(2, 1, 'ar', 'معلومات لا تتعلق بالهوية الشخصية**\r\n\r\nيقوم الموقع بجمع المعلومات عن المستخدمين أينما تفاعلوا مع الموقع ، وهذه المعلومات لا تتعلق بالهوية الشخصية، إنما قد تتضمن نوع الهاتف الذكي ومعلومات عن أساليب الاتصال المستخدمة، أو الشركة المستخدمة لتقديم خدمة الانترنت، أو غيرها من المعلومات المشابهة.\r\n                              نحن في مكانك تحترم خصوصيتك ونلتزم بحمايتها من خلال امتثالنا لهذه السياسة.\r\nتصف هذه السياسة أنواع المعلومات التي قد نجمعها منك أو قد تقدمها عند زيارة التطبيق وممارساتنا لجمع هذه المعلومات واستخدامها وصيانتها وحمايتها والكشف عنها. تتنطبق هذه السياسة على المعلومات التي نجمعها:\r\nنحن هذا التطبيق.\r\nفي البريد الإلكتروني والنصوص والرسائل الإلكترونية الأخرى بينك وبين هذا التطبيق.\r\nمن خلال تطبيقات الأجهزة المحمولة وسطح المكتب ، يمكنك تنزيلها من هذا الموقع ، والتي توفر تفاعلًا مخصصًا غير قائم على التغلب بينك وبين هذا الموقع.\r\nعندما تتفاعل مع الإعلانات والتطبيقات الخاصة بنا على موقع الويب والخدمات على الطرف الثالث ، إذا كانت هذه التطبيقات أو التطبيقات الإعلانية تتضمن روابط لهذه السياسة.\r\nالمعلومات التي نجمعها عنك وكيف نجمعها\r\nنجمع عدة أنواع من المعلومات من مستخدمي موقعنا على التطبيق وحوله ، بما في ذلك المعلومات:\r\nوالتي قد يتم تحديدها شخصيًا ، مثل الاسم أو العنوان البريدي أو عنوان البريد الإلكتروني أو معرف الخاصية أو رقم الهاتف (“المعلومات الشخصية”)\r\nهذا هو هدفك بشكل فردي لا تعرّفك ؛ والذهب حول اتصال الإنترنت الخاص بك ، والمعدات التي تستخدمها للوصول إلى موقعنا على الويب واستخدام التفاصيل.\r\nكيف نستخدم معلوماتك\r\nنستخدم المعلومات التي نجمعها عنك أو التي توفرها لنا ، وتضمين أي معلومات شخصية:\r\nلتقديم موقعنا على الويب وسعيد لك.\r\nلتزويدك بالمعلومات أو الخدمات التي تطلبها منا.\r\nلتحقيق أي غرض آخر تقدمه له.\r\nلتزويدك بالإشعارات ، تضمنت انتهاء الصلاحية ، والفوترة والإشعارات التجديد.\r\nلتنفيذ الالتزامات وتجتاح حقوقنا الناشئة عن أي عقود تدخل بينك وبيننا ، مدرجة في الفواتير والتحصيل.\r\nلإعلامك بالتغييرات في موقعنا أو أي مشروع أو خدمات نقدمها أو نقدمها.\r\nللسماح لك بالمشاركة في الميزات التفاعلية على موقعنا.\r\nبأي طريقة أخرى ، قد نصف عند تقديم المعلومات.\r\nلأي أغراض أخرى بموافقتك.\r\nقد نستخدم معلوماتك أيضًا للاتصال بك عن مشاريع وخدمات الأطراف الثالثة التي قد تهمك. إذا كنت لا تريد منا استخدام معلوماتك بهذه الطريقة ، فيرجى الاتصال بنا على  info@classicsalekw.com\r\nخيارات حول كيفية استخدامنا والكشف عن معلوماتك\r\n•	نحن نسعى جاهدين لتزويدك بالخيارات المتعلقة بالمعلومات الشخصية التي تقدمها لنا. لقد أنشأنا آليات لتزويدك بالتحكم التالي في معلوماتك:\r\nتقنيات التتبع والإعلان. يمكنك ضبط متصفحك لرفض جميع ملفات تعريف الارتباط أو بعض ملفات تعريف الارتباط للمتصفح ، أو لتنبيهك عندما تكون ملفات تعريف الارتباط رائحة. إذا قمت بتعطيل ملفات تعريف الارتباط أو رفضت ، فيرجى ملاحظة أن بعض أجزاء هذا الموقع قد لا يمكن الوصول إليها أو عدم عملها بشكل صحيح.\r\nالكشف عن معلوماتك عن الإعلانات الحزبية. إذا كنت لا تريد منا أن نشارك معلوماتك الشخصية مع عدم تابعها أو لم تستمر\r\nالترويج العروض من الشركة. إذا كنت لا ترغب في الحصول على عنوان بريدك الإلكتروني أو معلومات الاتصال التي تستخدمها الشركة للترويج لمشاريع أو خدمات الأجزاء الثالثة الخاصة بنا ، فيمكنك إلغاء الاشتراك عن طريق إرسال بريد إلكتروني إلينا يوضح طلبك إلى على  info@classicsalekw.com \r\nالوصول إلى معلوماتك وتصحيحها\r\nيمكنك مراجعة وتغيير معلوماتك الشخصية عن طريق تسجيل الدخول إلى الخدمات الإلكترونية التطبيق. يمكنك أيضًا طلب تحديث أي معلومات شخصية نحتفظ بها عنك عن طريق الاتصال بنا على info@classicsalekw.com\r\nأمان البيانات\r\nلقد قمنا بتنفيذ التدابير المصممة لتأمين معلوماتك الشخصية من الخسارة العرضية ومن الوصول غير المصرح به والاستخدام والتغيير والإفصاح. يتم تخزين جميع المعلومات التي تقدمها لنا على خوادمنا الآمنة خلف جدران الحماية. سيتم تشفير أي معاملات دفع باستخدام تقنية SSL.\r\nتعتمد سلامة وأمن معلوماتك أيضًا. حيث منحتك (أو حيث اخترت) كلمة مرور للوصول إلى أجزاء معينة من موقعنا ، فأنت مسؤول عن إبقاء كلمة المرور هذه سرية. نطلب منك عدم مشاركة كلمة المرور الخاصة بك مع أي شخص.\r\nلا ينطبق على المعلومات التي تم جمعها بواسطة:\r\nالولايات المتحدة في وضع عدم الاتصال أو من خلال أي وسيلة أخرى ، بما في ذلك أي موقع ويب آخر تديره أي طرف ثالث ؛ أو\r\nأي طرف ثالث ، بما في ذلك من خلال أي تطبيق أو محتوى (بما في ذلك الإعلان) قد يرتبط بالموقع.\r\nيرجى قراءة هذه السياسة بعناية لفهم سياساتنا وممارساتنا فيما يتعلق بمعلوماتك وكيف سنعاملها. إذا كنت لا توافق على سياساتنا وممارساتنا ، فإن اختيارك هو عدم استخدام موقعنا على الويب.\r\nمن خلال الوصول إلى هذا الموقع أو استخدامه ، فإنك توافق على سياسة الخصوصية هذه.\r\nقد تتغير هذه السياسة من وقت لآخر. يعتبر استخدامك المستمر لهذا الموقع بعد إجراء تغييرات هو قبول هذه التغييرات ، لذا يرجى التحقق من السياسة بشكل دوري للحصول على التحديثات.\r\nتفاصيل الاستخدام وعناوين IP وملفات تعريف الارتباط وغيرها من التقنيات\r\nأثناء التنقل والتفاعل مع موقعنا على الويب ، قد نقوم تلقائيًا بجمع معلومات معينة حول المعدات الخاصة بك وإجراءات التصفح والأنماط ، بما في ذلك:\r\nتفاصيل زياراتك إلى موقعنا ، بما في ذلك بيانات حركة المرور وبيانات الموقع والسجلات وبيانات الاتصال الأخرى والموارد التي تصل إليها وتستخدمها على الموقع.\r\nمعلومات حول جهاز الكمبيوتر الخاص بك والإنترنت ، بما في ذلك عنوان IP ونظام التشغيل ونوع المتصفح.\r\nالمعلومات التي نجمعها تلقائيًا هي البيانات الإحصائية. يساعدنا على تحسين موقعنا على الويب وتقديم خدمة أفضل وأكثر تخصيصًا من خلال تمكيننا من:\r\nتقدير حجم جمهورنا وأنماط الاستخدام.\r\nقم بتخزين معلومات حول تفضيلاتك ، مما يسمح لنا بتخصيص موقع الويب الخاص بنا وفقًا لمصالحك الفردية. تسريع عمليات البحث الخاصة بك.\r\nتعرف عليك عند العودة إلى موقعنا.\r\nقد تتضمن التقنيات التي نستخدمها لجمع البيانات التلقائي:\r\nملفات تعريف الارتباط (أو ملفات تعريف الارتباط للمتصفح). ملف تعريف الارتباط هو ملف صغير وضع على القرص الصلب لجهاز الكمبيوتر الخاص بك. قد ترفض قبول ملفات تعريف الارتباط للمتصفح عن طريق تنشيط الإعداد المناسب على متصفحك. ومع ذلك ، إذا قمت بتحديد هذا الإعداد ، فقد تكون غير قادر على الوصول إلى أجزاء معينة من موقعنا. ما لم تكن قد قمت بتعديل إعداد المستعرض الخاص بك بحيث يرفض ملفات تعريف الارتباط ، فسيقوم نظامنا بإصدار ملفات تعريف الارتباط عندما تقوم بتوجيه متصفحك إلى موقعنا على الويب.\r\nملفات تعريف الارتباط فلاش. قد تستخدم بعض الميزات لموقعنا الإلكتروني الكائنات المحلية المخزنة (أو ملفات تعريف الارتباط الفلاش) لجمع وتخزين المعلومات حول تفضيلاتك والتنقل إلى موقعنا ومنه. لا تتم إدارة ملفات تعريف الارتباط الفلاش بواسطة نفس إعدادات المتصفح المستخدمة في ملفات تعريف الارتباط للمتصفح.\r\nالكشف عن معلوماتك\r\nقد نكشف عن معلومات مجمعة عن مستخدمينا ، والمعلومات التي لا تحدد أي فرد ، دون قيود.\r\nقد نكشف عن المعلومات الشخصية التي نجمعها أو نقدمها كما هو موضح في سياسة الخصوصية هذه:\r\nللامتثال لأي أمر من المحكمة أو القانون أو العملية القانونية ، بما في ذلك الاستجابة لأي طلب حكومي أو تنظيمي.\r\nلتطبيق أو تطبيق شروط الاستخدام أو شروط البيع والاتفاقيات الأخرى ، بما في ذلك لأغراض الفواتير والتجميع.\r\nإذا كنا نعتقد أن الكشف ضروري أو مناسب لحماية حقوق الشركة أو الممتلكات أو سلامة الشركة أو عملائنا أو غيرهم. ويشمل ذلك تبادل المعلومات مع الشركات والمؤسسات الأخرى لأغراض حماية الاحتيال والحد من مخاطر الائتمان.\r\nالتغييرات في سياسة الخصوصية لدينا\r\nإن سياستنا هي نشر أي تغييرات نقدمها على سياسة الخصوصية الخاصة بنا في هذه الصفحة. تم تحديد تاريخ آخر مراجعة سياسة الخصوصية في الجزء العلوي من الصفحة. أنت مسؤول عن زيارة موقعنا بشكل دوري وسياسة الخصوصية هذه للتحقق من أي تغييرات.\r\nمعلومات الاتصال\r\nإذا كان لديك أي أسئلة أو تعليقات حول سياسة الخصوصية هذه وممارسات الخصوصية لدينا ، اتصل بنا على  info@classicsalekw.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type_account` varchar(255) DEFAULT NULL,
  `views` bigint(20) NOT NULL DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `reason_rejecting` longtext DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `client_id`, `category_id`, `sub_category_id`, `country_id`, `city_id`, `type_account`, `views`, `location`, `latitude`, `longitude`, `photo`, `status`, `reason_rejecting`, `feature`, `price`, `currency`, `mobile`, `created_at`, `updated_at`) VALUES
(84, 32, 2, 22, 9, 30, 'owner', 14, '29.2525070103122-47.97342885285616', 29.2525, 47.9734, 'assets/files/post/images/post_1704372706.jpg', '1', NULL, '1', '10000', 'د.ك', '67670387', '2023-12-31 23:57:37', '2024-01-13 04:27:21'),
(85, 32, 2, 22, 3, 4, 'owner', 6, '31.935168479986896-35.96030384302139', 31.9352, 35.9603, 'assets/files/post/images/post_1704372827.jpg', '1', NULL, '1', '1000', 'د.أ', '780111107', '2024-01-04 20:28:10', '2024-01-18 01:09:07'),
(86, 32, 10, 23, 9, 35, 'owner', 2, '29.278520422497415-47.974075600504875', 29.2785, 47.9741, 'assets/files/post/images/post_1704384767.jpg', '1', NULL, '1', '500', 'د.ك', '780111107', '2024-01-05 00:12:47', '2024-01-18 01:09:07'),
(87, 32, 10, 23, 9, 84, 'owner', 0, '29.225514978677015-48.071787133812904', 29.2255, 48.0718, 'assets/files/post/images/post_1704385125.jpg', '1', NULL, '1', '400', 'د.ك', '780111107', '2024-01-05 00:18:45', '2024-01-08 20:31:50'),
(88, 32, 2, 22, 9, 30, 'owner', 3, '29.3364257559868-48.01519386470318', 29.3364, 48.0152, 'assets/files/post/images/post_1704909619.jpg', '1', NULL, '1', '10000', 'د.ك', '780111107', '2024-01-11 02:00:19', '2024-01-18 03:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `post_translations`
--

CREATE TABLE `post_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_translations`
--

INSERT INTO `post_translations` (`id`, `post_id`, `locale`, `title`, `desc`, `created_at`, `updated_at`) VALUES
(51, 26, 'ar', 'مستودع مواد غذائية', 'مستودع يقع في حي السليمانية', NULL, NULL),
(52, 26, 'en', 'مخزن ومستودع', 'مستودع بمواد الغذائية', NULL, NULL),
(53, 27, 'ar', 'شقة فاخرة للبيع', 'للبيع شقة', NULL, NULL),
(54, 27, 'en', 'flat for sell', 'flat for sell', NULL, NULL),
(55, 28, 'ar', 'مكتب فاخر للبيع', 'مكتب', NULL, NULL),
(56, 28, 'en', 'office for sale', 'office', NULL, NULL),
(57, 29, 'ar', 'test', 'desc', NULL, NULL),
(58, 29, 'en', 'test', '..', NULL, NULL),
(59, 30, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(60, 30, 'en', 'title:en', 'desc:en', NULL, NULL),
(61, 31, 'ar', 'vv', '22', NULL, NULL),
(62, 31, 'en', 'vv', '22', NULL, NULL),
(63, 32, 'ar', 'jdbd', 'nxjx', NULL, NULL),
(64, 32, 'en', 'hxjd', 'djdj', NULL, NULL),
(65, 33, 'ar', 'محلز', 'jxjxn', NULL, NULL),
(66, 33, 'en', 'محل', 'dndndj', NULL, NULL),
(67, 34, 'ar', 'بيع شقة', 'شقة للبيع', NULL, NULL),
(68, 34, 'en', 'flat', 'flat', NULL, NULL),
(69, 35, 'ar', 'فيلا', 'فيلا', NULL, NULL),
(70, 35, 'en', 'vila', 'vila', NULL, NULL),
(71, 36, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(72, 36, 'en', 'title:en', 'desc:en', NULL, NULL),
(73, 37, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(74, 37, 'en', 'title:en', 'desc:en', NULL, NULL),
(75, 38, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(76, 38, 'en', 'title:en', 'desc:en', NULL, NULL),
(77, 39, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(78, 39, 'en', 'title:en', 'desc:en', NULL, NULL),
(79, 40, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(80, 40, 'en', 'title:en', 'desc:en', NULL, NULL),
(81, 41, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(82, 41, 'en', 'title:en', 'desc:en', NULL, NULL),
(83, 42, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(84, 42, 'en', 'title:en', 'desc:en', NULL, NULL),
(85, 43, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(86, 43, 'en', 'title:en', 'desc:en', NULL, NULL),
(87, 44, 'ar', 'تجريبي', 'cmhxgxk', NULL, NULL),
(88, 44, 'en', 'test', 'gkxhxgk', NULL, NULL),
(89, 45, 'ar', 'تبت', 'نؤنب', NULL, NULL),
(90, 45, 'en', 'نبنر', 'نثنقت', NULL, NULL),
(91, 46, 'ar', 'يااب', 'gjh', NULL, NULL),
(92, 46, 'en', 'تمةل', 'hjhv', NULL, NULL),
(93, 47, 'ar', 'test', 'tt', NULL, NULL),
(94, 47, 'en', 'test', 'tt', NULL, NULL),
(95, 48, 'ar', 'ghh', 'ydotsjd', NULL, NULL),
(96, 48, 'en', 'fbc', 'fjzgjz', NULL, NULL),
(97, 49, 'ar', 'tt', 'tt', NULL, NULL),
(98, 49, 'en', 'tt', 'tt', NULL, NULL),
(99, 50, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(100, 50, 'en', 'title:en', 'desc:en', NULL, NULL),
(101, 51, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(102, 51, 'en', 'title:en', 'desc:en', NULL, NULL),
(103, 52, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(104, 52, 'en', 'title:en', 'desc:en', NULL, NULL),
(105, 53, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(106, 53, 'en', 'title:en', 'desc:en', NULL, NULL),
(107, 54, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(108, 54, 'en', 'title:en', 'desc:en', NULL, NULL),
(109, 55, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(110, 55, 'en', 'title:en', 'desc:en', NULL, NULL),
(111, 56, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(112, 56, 'en', 'title:en', 'desc:en', NULL, NULL),
(113, 57, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(114, 57, 'en', 'title:en', 'desc:en', NULL, NULL),
(115, 58, 'ar', 'gjhfu', '5686', NULL, NULL),
(116, 58, 'en', 'hcy', '5686', NULL, NULL),
(117, 59, 'ar', 'tt', 'rr', NULL, NULL),
(118, 59, 'en', 'tt', 'rr', NULL, NULL),
(119, 60, 'ar', 'gjv', 'thh', NULL, NULL),
(120, 60, 'en', 'gjh', 'ghi', NULL, NULL),
(121, 61, 'ar', 'gjv', 'thh', NULL, NULL),
(122, 61, 'en', 'gjh', 'ghi', NULL, NULL),
(123, 62, 'ar', 'hhh', 'hhhh', NULL, NULL),
(124, 62, 'en', 'hhh', 'hhhh', NULL, NULL),
(125, 63, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(126, 63, 'en', 'title:en', 'desc:en', NULL, NULL),
(127, 64, 'ar', 'hhh', 'hhhh', NULL, NULL),
(128, 64, 'en', 'hhh', 'hhhh', NULL, NULL),
(129, 65, 'ar', 'hhh', 'hhhh', NULL, NULL),
(130, 65, 'en', 'hhh', 'hhhh', NULL, NULL),
(131, 66, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(132, 66, 'en', 'title:en', 'desc:en', NULL, NULL),
(133, 67, 'ar', 'gjv', 'thh', NULL, NULL),
(134, 67, 'en', 'gjh', 'ghi', NULL, NULL),
(135, 68, 'ar', 'hhh', 'hhhh', NULL, NULL),
(136, 68, 'en', 'hhh', 'hhhh', NULL, NULL),
(137, 69, 'ar', 'title:ar', 'desc:ar', NULL, NULL),
(138, 69, 'en', 'title:en', 'desc:en', NULL, NULL),
(139, 70, 'ar', 'شفة', 'شقة', NULL, NULL),
(140, 70, 'en', 'flat', 'flat', NULL, NULL),
(141, 71, 'ar', 'للايجار شقة', 'شقة للايجار', NULL, NULL),
(142, 71, 'en', 'Flat for Rent', 'Flat for Rent', NULL, NULL),
(143, 72, 'ar', 'شقة دوبلكس للبيع', 'دوبلكس للبيع', NULL, NULL),
(144, 72, 'en', 'Duplex for sell', 'duplex for sell', NULL, NULL),
(145, 73, 'ar', 'فندق للاستثمار', 'فندق للاستثمار', NULL, NULL),
(146, 73, 'en', 'Hotel for investment', 'hotel for investment', NULL, NULL),
(147, 74, 'ar', 'فندق للإيجار', 'فندق للايجار', NULL, NULL),
(148, 74, 'en', 'hotel for rent', 'Hotel for Rent', NULL, NULL),
(149, 75, 'ar', 'فيلا للايجار', 'فيلا للايجار', NULL, NULL),
(150, 75, 'en', 'Vila for Rent', 'vila for rent', NULL, NULL),
(151, 76, 'ar', 'ارض زراعية للاستثمار', 'ارض للايجار', NULL, NULL),
(152, 76, 'en', 'Land for Rent', 'Land for Rent', NULL, NULL),
(153, 77, 'ar', 'للايجار مكتب فاخر', 'مكتب للايجار', NULL, NULL),
(154, 77, 'en', 'Office for Rent', 'Office for Rent', NULL, NULL),
(155, 78, 'en', 'test', '**********', NULL, NULL),
(156, 78, 'ar', 'تيست', '*************', NULL, NULL),
(157, 79, 'en', 'test', 'tes', NULL, NULL),
(158, 79, 'ar', 'sss', 'sss', NULL, NULL),
(159, 80, 'ar', 'yyyy', '22', NULL, NULL),
(160, 80, 'en', 'yuy', '22', NULL, NULL),
(161, 81, 'ar', 'Amman', '١٠٠٠', NULL, NULL),
(162, 81, 'en', 'Amman', '١٠٠٠', NULL, NULL),
(163, 82, 'ar', 'لكزس إيجار يومي', 'hdhbd e 3hrdjjxxn sn hdjdnhdhd', NULL, NULL),
(164, 82, 'en', 'gdhbdbd', 'ndjejjejene', NULL, NULL),
(165, 83, 'ar', 'قطع مكينة بي ام', 'مكينة للبيع بي ام دبليو موديل ٢٠٠٨ فئة الخامسة بحالة ممتازة', NULL, NULL),
(166, 83, 'en', 'spare parts', 'BMW Engine', NULL, NULL),
(167, 84, 'ar', 'مرسيدس كلاسيك موديل ١٩٤٠', 'للبيع مرسيدس', NULL, NULL),
(168, 84, 'en', 'mercedece classic model 1940', 'mercedece for sale', NULL, NULL),
(169, 85, 'ar', 'مرسيدس موديل ١٩٦٠', 'مرسيدس ١٩٠ موديل ١٩٦٠ بسعر ١٠٠٠ دينار', NULL, NULL),
(170, 85, 'en', 'mercedece 1960', 'مرسيدس ١٩٠ موديل ١٩٦٠ بسعر ١٠٠٠ دينار', NULL, NULL),
(171, 86, 'ar', 'مكينة بي ام', 'مكينة بي ام 730 ٨ سلندر بحالة جيدة', NULL, NULL),
(172, 86, 'en', 'BMW engine', 'BMW engine 8 cylinder', NULL, NULL),
(173, 87, 'ar', 'مكينة فورد 150', 'للبيع مكينة فورد ١٥٠ موديل ٢٠٠٠', NULL, NULL),
(174, 87, 'en', 'Ford 150 Engine', 'engine Ford 150 for sell 2000', NULL, NULL),
(175, 88, 'ar', 'مرسيدس ٢٠٠', 'للبيع سيارة مرسيدس بنز بحالة ممتازة موديل ١٩٦٠ لون كحلي ...يتنينيزيت', NULL, NULL),
(176, 88, 'en', 'm classic', 'hdhsjdjjdjd', NULL, NULL),
(177, 89, 'ar', 'BMW', 'للبيع بي ام ......', NULL, NULL),
(178, 89, 'en', 'BMW', 'bmwvfor sellvvvg', NULL, NULL),
(179, 90, 'ar', 'تويوتا للبيع تيتثنيم', 'للبيع تويوتا كورولا', NULL, NULL),
(180, 90, 'en', 'ايس', 'تيتي', NULL, NULL),
(181, 91, 'ar', 'hddh', 'hdhshs bshshs hshs', NULL, NULL),
(182, 91, 'en', 'dbdbb', 'dhdhhs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'Super Admin', 'Super Admin', '2022-06-11 06:06:33', '2022-06-11 06:06:33'),
(2, 'admin', 'Admin', 'Admin', '2022-06-11 06:06:38', '2022-06-11 06:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admin`
--

INSERT INTO `role_admin` (`role_id`, `admin_id`, `user_type`) VALUES
(1, 12, 'App\\Models\\Admin'),
(2, 13, 'App\\Models\\Admin'),
(2, 14, 'App\\Models\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(12, 'assets/files/slider/images/slider_1704320261.jpg', '1', '2024-01-04 06:17:41', '2024-01-04 06:18:50'),
(13, 'assets/files/slider/images/slider_1704320728.webp', '1', '2024-01-04 06:25:28', '2024-01-04 06:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `created_at`, `updated_at`) VALUES
(22, NULL, '2023-07-15 18:21:36', '2023-07-15 18:21:36'),
(23, NULL, '2023-12-23 17:08:06', '2023-12-23 17:08:06'),
(24, NULL, '2024-01-04 20:22:33', '2024-01-04 20:22:33'),
(25, NULL, '2024-01-11 02:16:19', '2024-01-11 02:16:19'),
(26, NULL, '2024-01-11 20:35:40', '2024-01-11 20:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_translations`
--

CREATE TABLE `sub_category_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_translations`
--

INSERT INTO `sub_category_translations` (`id`, `sub_category_id`, `locale`, `name`, `created_at`, `updated_at`) VALUES
(7, 4, 'en', 'Flate', NULL, NULL),
(8, 4, 'ar', 'شقة', NULL, NULL),
(11, 6, 'en', 'Land', NULL, NULL),
(12, 6, 'ar', 'أرض', NULL, NULL),
(13, 7, 'en', 'Building', NULL, NULL),
(14, 7, 'ar', 'عمارة', NULL, NULL),
(15, 8, 'en', 'Duplex Apartment', NULL, NULL),
(16, 8, 'ar', 'شقة دوبلكس', NULL, NULL),
(17, 9, 'en', 'Office', NULL, NULL),
(18, 9, 'ar', 'مكتب', NULL, NULL),
(19, 10, 'en', 'Hotel', NULL, NULL),
(20, 10, 'ar', 'فندق', NULL, NULL),
(21, 11, 'en', 'villa', NULL, NULL),
(22, 11, 'ar', 'فيلا', NULL, NULL),
(23, 12, 'en', 'estraha', NULL, NULL),
(24, 12, 'ar', 'استراحة', NULL, NULL),
(25, 13, 'en', 'Floor', NULL, NULL),
(26, 13, 'ar', 'الادوار', NULL, NULL),
(27, 14, 'en', 'shop', NULL, NULL),
(28, 14, 'ar', 'محل', NULL, NULL),
(29, 15, 'en', 'غرفة', NULL, NULL),
(30, 15, 'ar', 'Room', NULL, NULL),
(31, 16, 'en', 'cope', NULL, NULL),
(32, 16, 'ar', 'مخيم', NULL, NULL),
(33, 17, 'en', 'storehouse', NULL, NULL),
(34, 17, 'ar', 'مستودع', NULL, NULL),
(35, 18, 'en', 'Room or sweet', NULL, NULL),
(36, 18, 'ar', 'غرفة او جناح', NULL, NULL),
(37, 19, 'en', 'Palace', NULL, NULL),
(38, 19, 'ar', 'قصر', NULL, NULL),
(39, 20, 'en', 'chalet', NULL, NULL),
(40, 20, 'ar', 'شالية', NULL, NULL),
(41, 21, 'en', 'Appendices', NULL, NULL),
(42, 21, 'ar', 'ملاحق', NULL, NULL),
(43, 22, 'en', 'Mercedes', NULL, NULL),
(44, 22, 'ar', 'مرسيدس', NULL, NULL),
(45, 23, 'en', 'قطع مكينة', NULL, NULL),
(46, 23, 'ar', 'قطع مكينة', NULL, NULL),
(47, 24, 'en', 'Accessories', NULL, NULL),
(48, 24, 'ar', 'اكسسوارات', NULL, NULL),
(49, 25, 'en', 'BMW', NULL, NULL),
(50, 25, 'ar', 'بي ام', NULL, NULL),
(51, 26, 'en', 'Toyota', NULL, NULL),
(52, 26, 'ar', 'تويوتا', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `created_at`, `updated_at`) VALUES
(1, '2022-06-11 15:47:05', '2022-06-11 15:47:05');

-- --------------------------------------------------------

--
-- Table structure for table `term_translations`
--

CREATE TABLE `term_translations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `locale` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `term_translations`
--

INSERT INTO `term_translations` (`id`, `term_id`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'en', 'Non-personally identifiable information\r\n\r\nThe site collects some information about users wherever they interact with the site, and this information is not related to personal identity, but may include the type of smartphone, information about the communication methods used, the company used to provide the Internet service, or other similar information.', NULL, NULL),
(2, 1, 'ar', 'معلومات لا تتعلق بالهوية الشخصية\r\n\r\nيقوم الموقع بجمع المعلومات عن المستخدمين أينما تفاعلوا مع الموقع ، وهذه المعلومات لا تتعلق بالهوية الشخصية، إنما قد تتضمن نوع الهاتف الذكي ومعلومات عن أساليب الاتصال المستخدمة، أو الشركة المستخدمة لتقديم خدمة الانترنت، أو غيرها من المعلومات المشابهة.', NULL, NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_us_translations_about_us_id_locale_unique` (`about_us_id`,`locale`),
  ADD KEY `about_us_translations_locale_index` (`locale`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_notifies`
--
ALTER TABLE `admin_notifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_notifies_client_id_foreign` (`client_id`),
  ADD KEY `admin_notifies_post_id_foreign` (`post_id`);

--
-- Indexes for table `admin_notify_translations`
--
ALTER TABLE `admin_notify_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_notify_translations_admin_notify_id_locale_unique` (`admin_notify_id`,`locale`),
  ADD KEY `admin_notify_translations_locale_index` (`locale`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_sub_category_category_id_foreign` (`category_id`),
  ADD KEY `category_sub_category_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_country_id_foreign` (`country_id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `city_translations_city_id_locale_unique` (`city_id`,`locale`),
  ADD KEY `city_translations_locale_index` (`locale`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_country_id_foreign` (`country_id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_notifies`
--
ALTER TABLE `client_notifies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notifies_client_id_foreign` (`client_id`),
  ADD KEY `client_notifies_post_id_foreign` (`post_id`);

--
-- Indexes for table `client_notify_translations`
--
ALTER TABLE `client_notify_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_notify_translations_client_notify_id_locale_unique` (`client_notify_id`,`locale`),
  ADD KEY `client_notify_translations_locale_index` (`locale`);

--
-- Indexes for table `client_post`
--
ALTER TABLE `client_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_post_client_id_foreign` (`client_id`),
  ADD KEY `client_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country_translations_country_id_locale_unique` (`country_id`,`locale`),
  ADD KEY `country_translations_locale_index` (`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite_client`
--
ALTER TABLE `favorite_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_client_client_id_foreign` (`client_id`),
  ADD KEY `favorite_client_post_id_foreign` (`post_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_post`
--
ALTER TABLE `feature_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_post_post_id_foreign` (`post_id`),
  ADD KEY `feature_post_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `feature_sub_category`
--
ALTER TABLE `feature_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_sub_category_feature_id_foreign` (`feature_id`),
  ADD KEY `feature_sub_category_sub_category_foreign` (`sub_category_id`);

--
-- Indexes for table `feature_translations`
--
ALTER TABLE `feature_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `feature_translations_feature_id_locale_unique` (`feature_id`,`locale`),
  ADD KEY `feature_translations_locale_index` (`locale`);

--
-- Indexes for table `generals`
--
ALTER TABLE `generals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_translations`
--
ALTER TABLE `general_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `general_translations_general_id_locale_unique` (`general_id`,`locale`),
  ADD KEY `general_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD PRIMARY KEY (`admin_id`,`permission_id`,`user_type`),
  ADD KEY `permission_admin_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_post_id_foreign` (`post_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy_translations`
--
ALTER TABLE `policy_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `policy_translations_policy_id_locale_unique` (`policy_id`,`locale`),
  ADD KEY `policy_translations_locale_index` (`locale`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_client_id_foreign` (`client_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `posts_country_id_foreign` (`country_id`),
  ADD KEY `posts_city_id_foreign` (`city_id`);

--
-- Indexes for table `post_translations`
--
ALTER TABLE `post_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_translations_post_id_locale_unique` (`post_id`,`locale`),
  ADD KEY `post_translations_locale_index` (`locale`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`admin_id`,`role_id`,`user_type`),
  ADD KEY `role_admin_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_category_translations`
--
ALTER TABLE `sub_category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_category_translations_sub_category_id_locale_unique` (`sub_category_id`,`locale`),
  ADD KEY `sub_category_translations_locale_index` (`locale`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_translations`
--
ALTER TABLE `term_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `term_translations_term_id_locale_unique` (`term_id`,`locale`),
  ADD KEY `term_translations_locale_index` (`locale`);

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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `admin_notifies`
--
ALTER TABLE `admin_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `admin_notify_translations`
--
ALTER TABLE `admin_notify_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `client_notifies`
--
ALTER TABLE `client_notifies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=388;

--
-- AUTO_INCREMENT for table `client_notify_translations`
--
ALTER TABLE `client_notify_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `client_post`
--
ALTER TABLE `client_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `country_translations`
--
ALTER TABLE `country_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_client`
--
ALTER TABLE `favorite_client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `feature_post`
--
ALTER TABLE `feature_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=727;

--
-- AUTO_INCREMENT for table `feature_sub_category`
--
ALTER TABLE `feature_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `feature_translations`
--
ALTER TABLE `feature_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `generals`
--
ALTER TABLE `generals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_translations`
--
ALTER TABLE `general_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policy_translations`
--
ALTER TABLE `policy_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `post_translations`
--
ALTER TABLE `post_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sub_category_translations`
--
ALTER TABLE `sub_category_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `term_translations`
--
ALTER TABLE `term_translations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about_us_translations`
--
ALTER TABLE `about_us_translations`
  ADD CONSTRAINT `about_us_translations_about_us_id_foreign` FOREIGN KEY (`about_us_id`) REFERENCES `about_us` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_notifies`
--
ALTER TABLE `admin_notifies`
  ADD CONSTRAINT `admin_notifies_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `admin_notifies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `admin_notify_translations`
--
ALTER TABLE `admin_notify_translations`
  ADD CONSTRAINT `admin_notify_translations_admin_notify_id_foreign` FOREIGN KEY (`admin_notify_id`) REFERENCES `admin_notifies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_sub_category`
--
ALTER TABLE `category_sub_category`
  ADD CONSTRAINT `category_sub_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_sub_category_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_notifies`
--
ALTER TABLE `client_notifies`
  ADD CONSTRAINT `client_notifies_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_notifies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_notify_translations`
--
ALTER TABLE `client_notify_translations`
  ADD CONSTRAINT `client_notify_translations_client_notify_id_foreign` FOREIGN KEY (`client_notify_id`) REFERENCES `client_notifies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_post`
--
ALTER TABLE `client_post`
  ADD CONSTRAINT `client_post_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `country_translations`
--
ALTER TABLE `country_translations`
  ADD CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_client`
--
ALTER TABLE `favorite_client`
  ADD CONSTRAINT `favorite_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_client_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_post`
--
ALTER TABLE `feature_post`
  ADD CONSTRAINT `feature_post_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feature_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_sub_category`
--
ALTER TABLE `feature_sub_category`
  ADD CONSTRAINT `feature_sub_category_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `feature_sub_category_sub_category_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `feature_translations`
--
ALTER TABLE `feature_translations`
  ADD CONSTRAINT `feature_translations_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `general_translations`
--
ALTER TABLE `general_translations`
  ADD CONSTRAINT `general_translations_general_id_foreign` FOREIGN KEY (`general_id`) REFERENCES `generals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD CONSTRAINT `permission_admin_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policy_translations`
--
ALTER TABLE `policy_translations`
  ADD CONSTRAINT `policy_translations_policy_id_foreign` FOREIGN KEY (`policy_id`) REFERENCES `policies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
