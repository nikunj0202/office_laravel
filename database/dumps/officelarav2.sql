-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 09:13 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `officelarav2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blockdetails`
--

DROP TABLE IF EXISTS `blockdetails`;
CREATE TABLE IF NOT EXISTS `blockdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_emp_id` int(10) NOT NULL,
  `admin_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blockdetails`
--

INSERT INTO `blockdetails` (`id`, `block_name`, `block_id`, `block_emp_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(6, 'block1', '48', 1963, '1906', '2018-06-05 08:46:29', '2018-06-05 08:46:29'),
(5, 'block1', '49', 1906, '1906', '2018-06-05 08:46:26', '2018-06-05 08:46:26'),
(7, 'block1', '44', 1908, '1906', '2018-06-05 08:46:34', '2018-06-05 08:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'Annet Group', '2018-06-05 04:06:52', '2018-06-05 04:06:52'),
(2, 'Aria', '2018-06-05 04:06:55', '2018-06-05 04:06:55'),
(3, 'Promenna', '2018-06-05 04:06:58', '2018-06-05 04:06:58'),
(4, 'Remi', '2018-06-05 04:07:00', '2018-06-05 04:07:00'),
(5, 'Retransform', '2018-06-05 04:07:02', '2018-06-05 04:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `department_id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Technology', '2018-05-17 03:39:20', '2018-05-17 03:39:20'),
(2, 'QA', '2018-05-17 03:39:25', '2018-05-17 03:39:25'),
(3, 'FAC', '2018-05-17 03:39:30', '2018-05-17 03:39:30'),
(4, 'Business Development', '2018-05-17 03:39:37', '2018-05-17 03:39:37'),
(5, 'TIFS', '2018-05-17 03:39:42', '2018-05-17 03:39:42'),
(6, 'Accounts', '2018-05-17 03:39:48', '2018-05-17 03:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `editblocks`
--

DROP TABLE IF EXISTS `editblocks`;
CREATE TABLE IF NOT EXISTS `editblocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_ext` int(11) NOT NULL,
  `emp_designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_machine` int(11) NOT NULL,
  `emp_img_ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_delete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_id`, `emp_name`, `emp_profile`, `emp_ext`, `emp_designation`, `emp_department`, `emp_group`, `emp_mobile`, `emp_email`, `emp_address`, `emp_machine`, `emp_img_ext`, `emp_delete`, `created_at`, `updated_at`) VALUES
(1, 1906, 'Nikunj Pandit', 'apple-mac-logo-FB34556F8D-seeklogo.com_1526565996.png', 242, 'Graphic Designer', '1', '1', '9892421763', 'nikunj.pandit@annet.com', 'Dombivli', 3, 'jpg', '0', '2018-05-17 07:32:28', '2018-05-28 08:31:43'),
(2, 1908, 'Salimkhan Sodha', 'Medical_1526900447.png', 230, 'Project Manager', '1', '2', '9876543210', 'salimkhan.sodha@annet.com', 'Ghatkopar', 1, 'png', '0', '2018-05-21 05:30:47', '2018-05-21 05:30:47'),
(3, 1963, 'Chirag Raut', 'default.jpg', 242, 'Project Manager', '1', '1', '9874612340', 'chirag.raut@annet.com', 'Mumbai', 4, 'jpg', '0', '2018-06-01 07:07:42', '2018-06-01 07:07:42');

-- --------------------------------------------------------

--
-- Table structure for table `machinedetails`
--

DROP TABLE IF EXISTS `machinedetails`;
CREATE TABLE IF NOT EXISTS `machinedetails` (
  `machine_id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `machine_image_ext` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`machine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `machinedetails`
--

INSERT INTO `machinedetails` (`machine_id`, `machine_name`, `machine_image`, `machine_image_ext`, `created_at`, `updated_at`) VALUES
(1, 'Linux', 'Linux.jpg', 'jpg', '2018-06-05 04:13:35', '2018-06-05 04:13:35'),
(2, 'MAC', 'MAC.jpg', 'jpg', '2018-06-05 04:13:40', '2018-06-05 04:13:40'),
(3, 'Windows10', 'windows10.jpg', 'jpg', '2018-06-05 04:13:46', '2018-06-05 04:13:46'),
(4, 'Windows7', 'windows7.jpg', 'jpg', '2018-06-05 04:13:51', '2018-06-05 04:13:51'),
(5, 'Windows8', 'windows8.jpg', 'jpg', '2018-06-05 04:13:59', '2018-06-05 04:13:59'),
(6, 'WindowsXP', 'windowsxp.jpg', 'jpg', '2018-06-05 04:14:05', '2018-06-05 04:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `manageblocks`
--

DROP TABLE IF EXISTS `manageblocks`;
CREATE TABLE IF NOT EXISTS `manageblocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `block_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manageblocks`
--

INSERT INTO `manageblocks` (`id`, `block_name`, `block_count`, `created_at`, `updated_at`) VALUES
(1, 'block1', 60, '2018-06-05 04:14:25', '2018-06-05 04:14:25'),
(2, 'block2', 36, '2018-06-05 04:14:37', '2018-06-05 04:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_15_134315_create_employees_table', 1),
(4, '2018_05_15_143048_create_blockdetails_table', 2),
(5, '2018_05_15_143112_create_companies_table', 2),
(6, '2018_05_15_143124_create_departments_table', 2),
(7, '2018_05_15_143141_create_machinedetails_table', 2),
(8, '2018_05_21_091649_add_users_to_admin', 3),
(9, '2018_05_21_143713_create_editblocks_table', 4),
(10, '2018_05_21_145058_create_viewblocks_table', 4),
(11, '2018_05_21_155709_add_blocknumbers_to_blocks', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userid`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nikunj Pandit', 1906, 'nikunj.pandit@annet.com', '$2y$10$AAVKf4tC6XT7.1/BIixLIeRV0cHjZ4yiW8MvRjGycv9ns1zVuZPhC', 'HxVqqtC7I99JLV92yn4q6WDfrikZyVyByUYxNrXeVrUNS95dc8Vk6nH039sV', '2018-06-05 04:05:23', '2018-06-05 04:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `viewblocks`
--

DROP TABLE IF EXISTS `viewblocks`;
CREATE TABLE IF NOT EXISTS `viewblocks` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
