-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 10:49 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hifi`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payable_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash',
  `pre_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `customer_id`, `payable_amount`, `paid_amount`, `balance`, `payment_type`, `payment_id`, `con_status`, `date`, `month`, `year`, `status`, `payment_method`, `pre_balance`, `created_at`, `updated_at`) VALUES
(11, '1', '2500', '0', '2500', 'New Connection', '', 'New Connection', '2022-12-26', '12', '2022', 'Yes', 'cash', '0', '2022-12-26 10:16:44', '2022-12-26 10:16:44'),
(12, '1', '0', '0', '0', 'New Connection', '', 'New Connection', '2022-12-26', '12', '2022', 'Yes', 'cash', '0', '2022-12-28 07:20:34', '2022-12-28 07:20:34'),
(13, '3', '2500', '0', '2500', 'New Connection', '', 'New Connection', '2022-12-28', '12', '2022', 'Yes', 'cash', '0', '2022-12-28 07:19:33', '2022-12-28 07:19:33'),
(14, '3', '500', '500', '2500', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2500', '2022-12-29 01:57:03', '2022-12-29 01:57:03'),
(15, '3', '500', '500', '2500', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2500', '2022-12-29 01:59:46', '2022-12-29 01:59:46'),
(16, '3', '500', '300', '2700', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2500', '2022-12-29 02:01:36', '2022-12-29 02:01:36'),
(17, '3', '500', '500', '2700', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2700', '2022-12-29 02:12:31', '2022-12-29 02:12:31'),
(18, '3', '500', '500', '2700', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2700', '2022-12-29 02:13:04', '2022-12-29 02:13:04'),
(19, '3', '500', '400', '2800', 'Fiber Wire 10 meter', '', NULL, '2022-12-29', '12', '2022', 'Yes', 'cash', '2700', '2022-12-29 02:14:36', '2022-12-29 02:14:36'),
(20, '3', '2800', '1', '2799', 'Paypal', '43B23500VF384593A', NULL, '2022-12-29 12:36:47', '12', '2022', 'yes', 'online', NULL, '2022-12-29 07:36:47', '2022-12-29 07:36:47'),
(21, '3', '2799', '0.1', '2798.9', 'Paypal', '9CY84814T4299343K', NULL, '2022-12-30 16:48:55', '12', '2022', 'yes', 'online', NULL, '2022-12-30 11:48:55', '2022-12-30 11:48:55'),
(22, '3', '2798.9', '0.10', '2798.8', 'Paypal', '3AS140233T6118042', NULL, '2023-01-03 05:56:02', '1', '2023', 'yes', 'online', NULL, '2023-01-03 00:56:02', '2023-01-03 00:56:02'),
(23, '4', '2000', '0', '2000', 'New Connection', NULL, 'New Connection', '2023-01-05', '1', '2023', 'deactive', 'cash', '0', '2023-01-05 08:09:56', '2023-01-05 08:10:42'),
(24, '6', '6000', '0', '6000', 'New Connection', NULL, 'New Connection', '2023-01-05', '1', '2023', 'Yes', 'cash', '0', '2023-01-05 08:19:48', '2023-01-05 08:19:48'),
(25, '6', '6000', '0.1', '5999.9', 'Paypal', '9AF46239KL014703S', NULL, '2023-01-05 13:22:59', '1', '2023', 'yes', 'online', NULL, '2023-01-05 08:22:59', '2023-01-05 08:22:59'),
(26, '3', '500', '400', '2898.8', 'Fiber Wire 10 meter', NULL, NULL, '2023-01-05', '1', '2023', 'Yes', 'cash', '2798.8', '2023-01-05 11:55:31', '2023-01-05 11:55:31'),
(27, '3', '0', '2500', '398.8000000000002', 'Fee Paid', NULL, NULL, '2023-01-05', '1', '2023', 'Yes', 'cash', '2898.8', '2023-01-05 12:01:56', '2023-01-05 12:01:56'),
(28, '6', '0', '5000', '999.8999999999996', 'Fee Paid', NULL, NULL, '2023-01-06', '1', '2023', 'Yes', 'cash', '5999.9', '2023-01-06 02:25:18', '2023-01-06 02:25:18'),
(29, '3', '2000', '0', '2398.8', 'Monthly Fee', NULL, NULL, '2023-01-11', '1', '2023', 'Yes', 'cash', '398.8000000000002', '2023-01-10 23:58:43', '2023-01-10 23:58:43'),
(30, '3', '2000', '0', '4398.8', 'Monthly Fee', NULL, NULL, '2023-01-11', '1', '2023', 'Yes', 'cash', '2398.8', '2023-01-11 00:03:13', '2023-01-11 00:03:13'),
(31, '3', '2000', '0', '6398.8', 'Monthly Fee', NULL, NULL, '2023-01-11', '1', '2023', 'Yes', 'cash', '4398.8', '2023-01-11 00:11:08', '2023-01-11 00:11:08'),
(32, '3', '0', '6300', '98.80000000000018', 'Fee Paid', NULL, NULL, '2023-01-11', '1', '2023', 'Yes', 'cash', '6398.8', '2023-01-11 04:36:08', '2023-01-11 04:36:08'),
(33, '6', '0', '999', '0.8999999999996362', 'Fee Paid', NULL, NULL, '2023-01-11', '1', '2023', 'Yes', 'cash', '999.8999999999996', '2023-01-11 04:37:12', '2023-01-11 04:37:12'),
(34, '3', '0', '50', '48.80000000000018', 'Fee Paid', NULL, NULL, '2023-01-17', '1', '2023', 'Yes', 'cash', '98.80000000000018', '2023-01-17 04:32:52', '2023-01-17 04:32:52'),
(35, '7', '6500', '0', '6500', 'New Connection', NULL, 'New Connection', '2023-02-05', '2', '2023', 'Yes', 'cash', '0', '2023-02-05 01:58:50', '2023-02-05 01:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(14, 'College Road, Grw', 'Yes', '2023-01-14 02:49:18', '2023-01-14 02:49:18'),
(15, 'Nowshera Road, Near bara Qabrastan, Gujranwala', 'Yes', '2023-01-14 02:49:33', '2023-01-14 02:49:33'),
(16, 'Peoples Colony, Gujranwala', 'Yes', '2023-01-14 02:50:09', '2023-01-14 02:50:09'),
(17, 'Satellite Town, Gujranwala', 'Yes', '2023-01-14 02:50:27', '2023-01-14 02:50:27'),
(18, 'Model Town, Gujranwala', 'Yes', '2023-01-14 02:51:32', '2023-01-14 02:51:32'),
(19, 'Wapda Town, Gujranwala', 'Yes', '2023-01-14 02:51:55', '2023-01-14 02:51:55');

-- --------------------------------------------------------

--
-- Table structure for table `calenders`
--

CREATE TABLE `calenders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calenders`
--

INSERT INTO `calenders` (`id`, `year`, `month`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023', 'January', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(2, '2023', 'February', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(3, '2023', 'March', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(4, '2023', 'April', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(5, '2023', 'May', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(6, '2023', 'June', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(7, '2023', 'July', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(8, '2023', 'August', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(9, '2023', 'September', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(10, '2023', 'October', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(11, '2023', 'November', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09'),
(12, '2023', 'December', '2023-02-05', 'Yes', '2023-02-05 03:55:09', '2023-02-05 03:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Drinks & Coffees', 'Yes', NULL, '2023-01-14 03:07:45'),
(6, 'Computer System & Accessories', 'Yes', '2022-12-21 02:39:41', '2022-12-21 02:39:41'),
(8, 'Food & Beverages', 'Yes', '2023-01-14 03:03:53', '2023-01-14 03:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alloted_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `var_cust` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whatsup_num` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `package_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `f_name`, `alloted_name`, `email`, `latitude`, `longitude`, `status`, `var_cust`, `contact`, `whatsup_num`, `cnic`, `area`, `connection_fee`, `package_fee`, `discount`, `total_payable`, `package_id`, `user_id`, `address`, `date`, `created_at`, `updated_at`) VALUES
(3, 'Shahmeer Malik', 'Abdul Hameed', '21FF04S', 'shahmeermalik99@gmail.com', '32.1493811269021', '74.1775116831061', 'Yes', 'Approve', '0307-0624199', '0307-0624199', '34101-3951065-9', '3', '1000', '2000', NULL, '2500', 18, '21', 'Mohallah Data Gunj Buksh Street No 2', '2022-12-28', '2022-12-28 07:17:34', '2023-01-05 11:54:34'),
(6, 'Shehroze Saleem', 'Saleem', '786786', 'shehrozsaleem616@gmail.com', '32.1496129', '74.214759', 'Yes', 'Approve', '0397-3409670', '0397-6903760', '59784-3096703-4', '14', '1500', '5500', '1000', '6000', 24, NULL, 'hfihfdsghosidg', '2023-01-05', '2023-01-05 08:19:48', '2023-01-14 04:28:02'),
(7, 'SelectItems', 'asdfgh', '28FF04S', 'saadbuttar2@gmail.com', '32.24453684797239', '74.01512833862304', 'Yes', 'Approved', '0307-8392075', '0334-2256775', '34101-1411524-7', '14', '1000', '5500', NULL, '6500', 24, '28', 'a3sw4ed5rf6tg7yh8ujk9787u6y5t4r323wr4etrdytyughijoikpo', '2023-02-05', '2023-02-05 01:58:13', '2023-02-05 01:58:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `contact`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shahmeer Malik', 'shahmeermalik99@gmail.com', '03070624199', 'hi admin can you help me', 'Y', '2022-12-27 06:22:37', '2022-12-27 06:22:37'),
(3, 'Shahmeer Malik', 'shahmeermalik99@gmail.com', '03070624199', 'mbdgbkjdsvpds', 'Y', '2022-12-29 01:32:29', '2022-12-29 01:32:29'),
(4, 'Shahmeer Malik', 'sm.scat96@gmail.com', '03070624199', 'jdhfudi', 'Y', '2023-01-03 01:02:09', '2023-01-03 01:02:09'),
(5, 'kfhiewhf', 'admin@gmail.com', '030724189', ',fbkjhfkewq', 'Y', '2023-01-03 01:09:49', '2023-01-03 01:09:49'),
(6, 'Shahmeer Malik', 'shahmeermalik99@gmail.com', '0307-0624199', 'shahmeer malik', 'Y', '2023-02-08 04:22:19', '2023-02-08 04:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `daily_updates`
--

CREATE TABLE `daily_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_updates`
--

INSERT INTO `daily_updates` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'shahmeermalik99@gmail.com', '2022-12-26 10:53:05', '2022-12-26 10:53:05'),
(2, 'shehrozsaleem616@gmail.com', '2022-12-27 00:18:55', '2022-12-27 00:18:55'),
(3, 'sm.scat96@gmail.com', '2023-02-08 04:21:34', '2023-02-08 04:21:34'),
(4, 'admin@gmail.com', '2023-02-08 04:23:30', '2023-02-08 04:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `cat_id`, `amount`, `added_by`, `date`, `status`, `created_at`, `updated_at`) VALUES
(14, '1', '4000', 'Shahmeer Malik', '2023-01-05', 'yes', '2023-01-05 05:07:15', '2023-01-05 05:07:15'),
(15, '6', '30000', 'Shahmeer Malik', '2023-01-05', 'yes', '2023-01-05 05:07:40', '2023-01-05 05:07:40'),
(18, '1', '4000', 'Shahmeer Malik', '2023-01-05', 'yes', '2023-01-05 05:47:04', '2023-01-05 05:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `cust_id`, `subject`, `message`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, '21', 'Rating of Net Services', 'Your Net Services Is Very Fast and Enjoyable the internet', 'no', '2022-12-28', '2022-12-28 08:14:22', '2023-01-11 05:50:16'),
(2, '21', 'Hye Sir', 'How r u?....fine\r\nYour services are very grateful and enjoyable.', 'yes', '2022-12-29', '2022-12-29 00:29:55', '2022-12-29 00:29:55'),
(3, '21', 'Wire', 'How r u?....fine Your services are very grateful and enjoyable.....', 'no', '2023-01-03', '2023-01-03 01:03:22', '2023-01-03 01:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` int(11) NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `payable_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pre_balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `cust_id`, `package_name`, `package_fee`, `status`, `payable_balance`, `balance`, `pre_balance`, `paid_amount`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, '18', '400', 'Yes', '2898.8', '398.8000000000002', '2798.8', '2500', '2023-01-05', '2023-01-05 12:01:56', '2023-01-05 12:01:56'),
(2, 6, '24', '0.1', 'Yes', '5999.9', '999.8999999999996', NULL, '5000', '2023-01-06', '2023-01-06 02:25:18', '2023-01-06 02:25:18'),
(3, 3, '18', '0', 'Yes', '6398.8', '98.80000000000018', '4398.8', '6300', '2023-01-11', '2023-01-11 04:36:08', '2023-01-11 04:36:08'),
(4, 6, '24', '5000', 'Yes', '999.8999999999996', '0.8999999999996362', '5999.9', '999', '2023-01-11', '2023-01-11 04:37:12', '2023-01-11 04:37:12'),
(5, 3, '18', '6300', 'Yes', '98.80000000000018', '48.80000000000018', '6398.8', '50', '2023-01-17', '2023-01-17 04:32:52', '2023-01-17 04:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_11_27_070637_create_sessions_table', 1),
(7, '2022_12_16_073936_create_areas_table', 2),
(8, '2022_12_17_115044_create_packages_table', 3),
(9, '2022_12_20_053708_create_categories_table', 4),
(10, '2022_12_21_055300_create_expenses_table', 5),
(11, '2022_12_22_064243_create__clients_table', 6),
(12, '2022_12_22_064243_create_clients_table', 7),
(13, '2022_12_23_053245_create_accounts_table', 8),
(14, '2022_12_23_054706_create_accounts_table', 9),
(15, '2022_12_25_083454_create_services_table', 10),
(16, '2022_12_25_084022_create_services_table', 11),
(17, '2022_12_26_153524_create_daily_updates_table', 12),
(18, '2022_12_27_070828_create_feedbacks_table', 13),
(19, '2022_12_27_111111_create_contacts_table', 14),
(20, '2022_12_28_125242_create_feedbacks_table', 15),
(21, '2022_12_30_135350_create_fees_table', 16),
(22, '2023_01_10_120655_create_calender_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `mb`, `fee`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(15, '4 MB', NULL, '1200', '1672741786.png', 'Up to 4 Mbps.', 'Yes', '2023-01-03 05:02:35', '2023-01-03 05:51:42'),
(16, '6 MB', NULL, '1500', '1672740477.png', 'Up to 6 Mbps.', 'Yes', '2023-01-03 05:07:57', '2023-01-03 05:51:55'),
(17, '8 MB', NULL, '1800', '1672740892.png', 'Up to 8 Mbps with free Smart TV.', 'Yes', '2023-01-03 05:14:52', '2023-01-03 05:52:06'),
(18, '10 MB', NULL, '2000', '1672741259.png', 'Up to 10 Mbps', 'Yes', '2023-01-03 05:20:59', '2023-01-03 05:52:16'),
(19, '15 MB', NULL, '2400', '1672741407.png', 'Up to 15 Mbps with Free Smart TV*', 'Yes', '2023-01-03 05:23:27', '2023-01-03 05:23:27'),
(20, '20 MB', NULL, '2700', '1672741498.png', 'Up to 20 Mbps with Free Smart TV*', 'Yes', '2023-01-03 05:24:58', '2023-01-03 05:24:58'),
(21, '25 MB', NULL, '3000', '1672741549.png', 'Up to 25 Mbps with Free Smart TV*', 'Yes', '2023-01-03 05:25:49', '2023-01-03 05:25:49'),
(22, '50 MB', NULL, '4000', '1672741760.png', 'Up to 50 Mbps with Free Smart TV', 'Yes', '2023-01-03 05:29:20', '2023-01-03 05:29:20'),
(23, '75 MB', NULL, '5000', '1672742358.png', 'Up to 75 Mbps with Free Smart TV', 'Yes', '2023-01-03 05:39:18', '2023-01-03 05:39:18'),
(24, '100 MB', NULL, '5500', '1672742422.png', 'Up to 100 Mbps with Free Smart TV', 'Yes', '2023-01-03 05:40:22', '2023-01-03 05:40:22'),
(25, '250', NULL, '10000', '1672742562.png', 'Up to 250 Mbps with Free Smart TV.', 'Yes', '2023-01-03 05:42:42', '2023-01-03 05:55:51'),
(26, '2 MB', NULL, '800', '1672742774.png', 'Up to 2 Mbps with Free Smart TV.', 'Yes', '2023-01-03 05:46:14', '2023-02-05 02:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_served_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_paid_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srv_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `client_id`, `srv_name`, `srv_served_by`, `srv_amount`, `srv_paid_amount`, `srv_balance`, `srv_date`, `created_at`, `updated_at`) VALUES
(1, '1', 'Fiber Wire !0 meter', 'Saith Usama', '2000', '1500', '500', '2022-12-26', '2022-12-26 01:18:25', '2022-12-26 01:18:25'),
(2, '1', 'Fiber Wire !0 meter', 'Saith Usama', '2000', '1500', '500', '2022-12-26', '2022-12-26 01:20:00', '2022-12-26 01:20:00'),
(3, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '500', '0', '2022-12-29', '2022-12-29 01:57:03', '2022-12-29 01:57:03'),
(4, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '500', '0', '2022-12-29', '2022-12-29 01:59:46', '2022-12-29 01:59:46'),
(5, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '300', '200', '2022-12-29', '2022-12-29 02:01:36', '2022-12-29 02:01:36'),
(6, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '500', '0', '2022-12-29', '2022-12-29 02:12:31', '2022-12-29 02:12:31'),
(7, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '500', '0', '2022-12-29', '2022-12-29 02:13:04', '2022-12-29 02:13:04'),
(8, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '400', '100', '2022-12-29', '2022-12-29 02:14:36', '2022-12-29 02:14:36'),
(9, '3', 'Fiber Wire 10 meter', 'Saith Usama', '500', '400', '100', '2023-01-05', '2023-01-05 11:55:31', '2023-01-05 11:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('uSLLg0HtrVi7gEQ1roBInlRfoa6Yf7wv4BTad1yi', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoickZLR2U1WE9tRnhqc3o5d3NmbFVuTWNOT3FOUHl1eFFsekZjc20zUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NToiYWxlcnQiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjEzOiJzdXBlcmFkbWluMTIzIjt9', 1675849437);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cnic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Yes',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `cnic`, `contact`, `role`, `avatar`, `setting`, `status`, `address`, `auth_id`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Admin', '34101-3951065-9', '0307-0624199', 'Super Admin', '', '', '', 'Mohallah Data Gunj Buksh Street No.2', '', 'superadmin@gmail.com', NULL, 'superadmin123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 04:40:45'),
(11, 'Admin', 'Admin', '34101-3951065-9', '0307-0624199', 'Admin', NULL, NULL, 'Yes', 'GRW', NULL, 'admin@gmail.com', NULL, 'admin123', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-19 06:56:17', '2022-12-19 06:56:17'),
(21, 'Shahmeer Malik', 'Abdul Hameed', '34101-3951065-9', '0307-0624199', 'Customer', NULL, NULL, 'Yes', 'Mohallah Data Gunj Buksh Street No 2', '3', 'shahmeermalik99@gmail.com', NULL, 'malik8899', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-28 05:53:42', '2022-12-28 07:19:33'),
(22, 'Shehroze Saleem', 'Saleem', '59784-3096703-4', '0397-3409670', 'Customer', NULL, NULL, 'Yes', 'hfihfdsghosidg', '6', 'shehrozsaleem616@gmail.com', NULL, '123456', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-05 08:19:48', '2023-01-05 08:19:48'),
(26, 'Manager', 'Abdul Hameed', '34101-3951065-9', '0307-0624199', 'Manager', NULL, NULL, 'Yes', 'Bara Qabrastan', NULL, 'manager@gmail.com', NULL, 'manager123', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-14 03:08:39', '2023-01-14 03:08:39'),
(28, 'SelectItems', 'asdfgh', '34101-1411524-7', '0307-8392075', 'Customer', NULL, NULL, 'Yes', 'asdfghjk', '7', 'saadbuttar2@gmail.com', NULL, 'b0NdBh', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-05 01:54:48', '2023-02-05 01:58:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calenders`
--
ALTER TABLE `calenders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_updates`
--
ALTER TABLE `daily_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
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
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `calenders`
--
ALTER TABLE `calenders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daily_updates`
--
ALTER TABLE `daily_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
