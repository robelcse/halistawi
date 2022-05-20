-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2022 at 12:20 AM
-- Server version: 10.5.13-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jihad_hali`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergies`
--

CREATE TABLE `allergies` (
  `id` int(11) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allergies`
--

INSERT INTO `allergies` (`id`, `allergy`, `created_at`) VALUES
(1, 'Fish/seafood', '2020-10-08 11:14:55'),
(2, 'Gluten', '2020-10-08 11:14:55'),
(3, 'Wheat', '2020-10-08 11:14:55'),
(4, 'Eggs', '2020-10-08 11:14:55'),
(5, 'Fish', '2020-10-08 11:14:55'),
(6, 'Milk', '2020-10-08 11:14:55'),
(7, 'Peanut/Nuts', '2020-10-08 11:14:55'),
(8, 'Soyabeans', '2020-10-08 11:14:55'),
(9, 'Penicillin', '2020-10-08 11:14:55'),
(10, 'Dust', '2020-10-08 11:14:55'),
(11, 'Pollen', '2020-10-08 11:14:55'),
(12, 'Vegetables', '2020-10-08 11:14:55'),
(13, 'Cats', '2020-10-08 11:14:55'),
(14, 'Dogs', '2020-10-08 11:14:55'),
(15, 'Other animals', '2020-10-08 11:14:55'),
(16, 'Other', '2020-10-08 11:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `appoinment_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appoinment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `body_part`
--

CREATE TABLE `body_part` (
  `id` int(11) NOT NULL,
  `part` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_part`
--

INSERT INTO `body_part` (`id`, `part`, `created_at`) VALUES
(1, 'Head', '2020-10-08 09:33:48'),
(2, 'Face', '2020-10-08 09:33:48'),
(3, 'Neck', '2020-10-08 09:33:48'),
(4, 'Shoulder', '2020-10-08 09:33:48'),
(5, 'Back', '2020-10-08 09:33:48'),
(6, 'Abdomen', '2020-10-08 09:33:48'),
(7, 'Butt', '2020-10-08 09:33:48'),
(8, 'Hands', '2020-10-08 09:33:48'),
(9, 'Legs', '2020-10-08 09:33:48'),
(10, 'Mouth', '2020-10-08 09:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `body_part_section`
--

CREATE TABLE `body_part_section` (
  `id` int(11) NOT NULL,
  `body_part_id` int(11) NOT NULL,
  `body_section_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_part_section`
--

INSERT INTO `body_part_section` (`id`, `body_part_id`, `body_section_id`, `created_at`) VALUES
(1, 1, 1, '2020-10-08 10:52:53'),
(2, 1, 2, '2020-10-08 10:52:53'),
(3, 1, 3, '2020-10-08 10:52:53'),
(4, 1, 4, '2020-10-08 10:52:53'),
(5, 2, 5, '2020-10-08 10:54:47'),
(6, 2, 6, '2020-10-08 10:54:47'),
(7, 2, 7, '2020-10-08 10:54:47'),
(8, 2, 8, '2020-10-08 10:54:47'),
(9, 2, 9, '2020-10-08 10:54:47'),
(10, 2, 10, '2020-10-08 10:54:47'),
(11, 10, 11, '2020-10-08 10:56:33'),
(12, 10, 12, '2020-10-08 10:56:33'),
(13, 10, 13, '2020-10-08 10:56:33'),
(14, 10, 14, '2020-10-08 10:56:33'),
(15, 10, 15, '2020-10-08 10:56:33'),
(16, 8, 16, '2020-10-08 10:58:11'),
(17, 8, 17, '2020-10-08 10:58:11'),
(18, 8, 18, '2020-10-08 10:58:11'),
(19, 8, 19, '2020-10-08 10:58:11'),
(20, 9, 20, '2020-10-08 11:01:13'),
(21, 9, 21, '2020-10-08 11:01:13'),
(22, 9, 22, '2020-10-08 11:01:13'),
(23, 9, 23, '2020-10-08 11:01:13'),
(24, 9, 24, '2020-10-08 11:01:13'),
(25, 9, 25, '2020-10-08 11:01:13'),
(31, 3, 26, '2020-10-16 15:00:55'),
(32, 4, 27, '2020-10-16 15:00:55'),
(33, 5, 28, '2020-10-16 15:00:55'),
(34, 6, 29, '2020-10-16 15:00:55'),
(35, 7, 30, '2020-10-16 15:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `body_section`
--

CREATE TABLE `body_section` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `body_section`
--

INSERT INTO `body_section` (`id`, `section`, `created_at`) VALUES
(1, 'Forehead', '2020-10-08 09:40:58'),
(2, 'Backhead', '2020-10-08 09:40:58'),
(3, 'Upperhead', '2020-10-08 09:40:58'),
(4, 'Scalp', '2020-10-08 09:40:58'),
(5, 'Cheeks', '2020-10-08 09:40:58'),
(6, 'Chin', '2020-10-08 09:40:58'),
(7, 'Eyes', '2020-10-08 09:40:58'),
(8, 'Nose', '2020-10-08 09:40:58'),
(9, 'Ears(internal)', '2020-10-08 09:40:58'),
(10, 'Ears(external)', '2020-10-08 09:40:58'),
(11, 'Lips', '2020-10-08 09:40:58'),
(12, 'Teeth', '2020-10-08 09:40:58'),
(13, 'Gums', '2020-10-08 09:40:58'),
(14, 'Tongue', '2020-10-08 09:40:58'),
(15, 'Throat', '2020-10-08 09:40:58'),
(16, 'Elbow', '2020-10-08 09:40:58'),
(17, 'Wrist', '2020-10-08 09:40:58'),
(18, 'Palm', '2020-10-08 09:40:58'),
(19, 'Fingers', '2020-10-08 09:40:58'),
(20, 'Hip', '2020-10-08 09:40:58'),
(21, 'Thigh', '2020-10-08 09:40:58'),
(22, 'Knee', '2020-10-08 09:40:58'),
(23, 'Shin', '2020-10-08 09:40:58'),
(24, 'Foot', '2020-10-08 09:40:58'),
(25, 'Toe', '2020-10-08 09:40:58'),
(26, 'Neck', '2020-10-11 10:21:44'),
(27, 'Shoulder', '2020-10-11 10:21:44'),
(28, 'Back', '2020-10-11 10:21:44'),
(29, 'Abdomen', '2020-10-11 10:21:44'),
(30, 'Butt', '2020-10-11 10:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `checkins`
--

CREATE TABLE `checkins` (
  `checkin_id` bigint(20) UNSIGNED NOT NULL,
  `national_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `checked_in_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr_12` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

CREATE TABLE `counties` (
  `id` int(6) NOT NULL,
  `county_code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counties`
--

INSERT INTO `counties` (`id`, `county_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'c_001', 'MOMBASA', NULL, NULL),
(2, 'c_002', 'KWALE', NULL, NULL),
(3, 'c_003', 'KILIFI', NULL, NULL),
(4, 'c_004', 'TANA RIVER', NULL, NULL),
(5, 'c_005', 'LAMU', NULL, NULL),
(6, 'C_006', 'TAITA TAVETA', NULL, NULL),
(7, 'C_007', 'GARISSA', NULL, NULL),
(8, 'C_008', 'WAJIR', NULL, NULL),
(9, 'C_009', 'MANDERA', NULL, NULL),
(10, 'C_010', 'MARSABIT', NULL, NULL),
(11, 'C_011', 'ISIOLO', NULL, NULL),
(12, 'C_012', 'MERU', NULL, NULL),
(13, 'C_013', 'THARAKA - NITHI', NULL, NULL),
(14, 'C_014', 'EMBU', NULL, NULL),
(15, 'C_015', 'KITUI', NULL, NULL),
(16, 'C_016', 'MACHAKOS', NULL, NULL),
(17, 'C_017', 'MAKUENI', NULL, NULL),
(18, 'C_018', 'NYANDARUA', NULL, NULL),
(19, 'C_019', 'NYERI', NULL, NULL),
(20, 'C_020', 'KIRINYAGA', NULL, NULL),
(21, 'C_021', 'MURANG\'A', NULL, NULL),
(22, 'C_022', 'KIAMBU', NULL, NULL),
(23, 'C_023', 'TURKANA', NULL, NULL),
(24, 'C_024', 'WEST POKOT', NULL, NULL),
(25, 'C_025', 'SAMBURU', NULL, NULL),
(26, 'C_026', 'TRANS NZOIA', NULL, NULL),
(27, 'C_027', 'UASIN GISHU', NULL, NULL),
(28, 'C_028', 'ELGEYO/MARAKWET', NULL, NULL),
(29, 'C_029', 'NANDI', NULL, NULL),
(30, 'C_030', 'BARINGO', NULL, NULL),
(31, 'C_031', 'LAIKIPIA', NULL, NULL),
(32, 'C_032', 'NAKURU', NULL, NULL),
(33, 'C_033', 'NAROK', NULL, NULL),
(34, 'C_034', 'KAJIADO', NULL, NULL),
(35, 'C_035', 'KERICHO', NULL, NULL),
(36, 'C_036', 'BOMET', NULL, NULL),
(37, 'C_037', 'KAKAMEGA', NULL, NULL),
(38, 'C_038', 'VIHIGA', NULL, NULL),
(39, 'C_039', 'BUNGOMA', NULL, NULL),
(40, 'C_040', 'BUSIA', NULL, NULL),
(41, 'C_041', 'SIAYA', NULL, NULL),
(42, 'C_042', 'KISUMU', NULL, NULL),
(43, 'C_043', 'HOMA BAY', NULL, NULL),
(44, 'C_044', 'MIGORI', NULL, NULL),
(45, 'C_045', 'KISII', NULL, NULL),
(46, 'C_046', 'NYAMIRA', NULL, NULL),
(47, 'C_047', 'NAIROBI CITY', NULL, NULL),
(48, 'C_048', 'DIASPORA', NULL, NULL),
(49, 'C_049', 'PRISONS', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE `dependents` (
  `dependent_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `referral_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deviceoperations`
--

CREATE TABLE `deviceoperations` (
  `operation_id` bigint(20) UNSIGNED NOT NULL,
  `s_date_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_date_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_date_one` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_date_two` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `e_date_three` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_device_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(11) NOT NULL,
  `disease` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `disease`, `created_at`) VALUES
(1, 'Heart', '2020-10-08 11:18:57'),
(2, 'Cancer', '2020-10-08 11:18:57'),
(3, 'Prostate', '2020-10-08 11:18:57'),
(4, 'Stroke', '2020-10-08 11:18:57'),
(5, 'Respiratory', '2020-10-08 11:18:57'),
(6, 'Alzheimers', '2020-10-08 11:18:57'),
(7, 'Diabetes', '2020-10-08 11:18:57'),
(8, 'Pneumonis', '2020-10-08 11:18:57'),
(9, 'Mental/behavioural', '2020-10-08 11:18:57'),
(10, 'Kidney', '2020-10-08 11:18:57'),
(11, 'Aids/HIV', '2020-10-08 11:18:57'),
(12, 'Blood Pressure', '2020-10-08 11:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_prescriptions`
--

CREATE TABLE `doctor_prescriptions` (
  `id` int(11) NOT NULL,
  `visitation_id` int(11) NOT NULL,
  `station` varchar(10) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `medicine_dose_type_id` int(11) NOT NULL,
  `times_per_day` int(11) NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `final_dose_date` date NOT NULL,
  `doctors_note` text DEFAULT NULL,
  `prescribed_date` date NOT NULL,
  `provided_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_prescriptions`
--

INSERT INTO `doctor_prescriptions` (`id`, `visitation_id`, `station`, `medicine_id`, `medicine_dose_type_id`, `times_per_day`, `no_of_days`, `final_dose_date`, `doctors_note`, `prescribed_date`, `provided_time`, `created_at`) VALUES
(1, 16, '43', 4, 1, 3, 5, '2021-01-14', 'Take the tablets 3 times a day for 5days', '2021-01-09', '21:04:19', '2021-01-09 18:04:19'),
(2, 18, '43', 1, 1, 1, 1, '2021-01-12', NULL, '2021-01-11', '16:15:10', '2021-01-11 13:15:10'),
(3, 1, '43', 5, 7, 3, 13, '2021-01-26', 'Take 3 satchets per day for 13 days', '2021-01-13', '22:48:32', '2021-01-13 19:48:32'),
(4, 12, '43', 6, 3, 3, 10, '2021-01-27', 'take 1 tablespoon 3 times a day for 10 days', '2021-01-17', '18:54:11', '2021-01-17 15:54:11'),
(5, 12, '43', 6, 3, 3, 10, '2021-01-27', 'take 1 tablespoon 3 times a day for 10 days', '2021-01-17', '18:54:45', '2021-01-17 15:54:45'),
(6, 5, '43', 3, 6, 3, 10, '2021-08-19', 'please ensure all the medicines are taken before any meal', '2021-08-09', '00:14:22', '2021-08-08 21:14:22'),
(7, 5, '43', 2, 4, 6, 3, '2021-08-12', NULL, '2021-08-09', '00:23:35', '2021-08-08 21:23:35'),
(8, 6, '43', 4, 3, 1, 1, '2021-10-24', '1 tablespoon per day', '2021-10-23', '17:46:26', '2021-10-23 14:46:26'),
(9, 16, '43', 4, 1, 2, 5, '2021-11-22', 'no refill', '2021-11-17', '20:48:53', '2021-11-17 17:48:53'),
(10, 19, '43', 3, 8, 5, 10, '2021-11-28', 'Smear on your body 5 times a day for ten days', '2021-11-18', '19:51:17', '2021-11-18 16:51:17'),
(11, 26, '43', 1, 1, 2, 1, '2021-11-27', 'No refill.', '2021-11-26', '21:07:36', '2021-11-26 18:07:36'),
(12, 26, '43', 1, 1, 2, 1, '2021-11-27', 'No refill.', '2021-11-26', '21:07:38', '2021-11-26 18:07:38'),
(13, 26, '43', 3, 1, 1, 1, '2021-11-27', NULL, '2021-11-26', '21:18:30', '2021-11-26 18:18:30'),
(14, 26, '43', 3, 1, 1, 1, '2021-11-27', NULL, '2021-11-26', '21:18:31', '2021-11-26 18:18:31'),
(15, 26, '43', 3, 1, 1, 1, '2021-11-27', NULL, '2021-11-26', '21:18:53', '2021-11-26 18:18:53'),
(16, 26, '43', 3, 1, 1, 1, '2021-11-27', NULL, '2021-11-26', '21:18:54', '2021-11-26 18:18:54'),
(17, 28, '43', 5, 3, 2, 3, '2021-12-01', 'Take 2x3 the full dose', '2021-11-28', '22:18:49', '2021-11-28 19:18:49'),
(18, 28, '43', 5, 3, 2, 3, '2021-12-01', 'Take 2x3 the full dose', '2021-11-28', '22:18:50', '2021-11-28 19:18:50'),
(19, 28, '43', 6, 8, 3, 5, '2021-12-03', 'smear on your body for 5 days consequently', '2021-11-28', '22:59:01', '2021-11-28 19:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `emergency_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `individuals`
--

CREATE TABLE `individuals` (
  `individual_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_o_box` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gps_pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_06_124011_create_patients_table', 1),
(6, '2021_12_07_102911_create_checkins_table', 1),
(7, '2021_12_07_120054_create_refers_table', 1),
(8, '2021_12_07_125050_create_tests_table', 1),
(9, '2021_12_08_084122_create_records_table', 1),
(10, '2021_12_13_115822_create_appoinments_table', 1),
(11, '2021_12_14_095117_create_dependents_table', 1),
(12, '2021_12_22_072446_create_teststations_table', 1),
(13, '2021_12_22_072545_create_testdevices_table', 1),
(15, '2021_12_22_072630_create_companies_table', 1),
(16, '2021_12_22_072706_create_individuals_table', 1),
(21, '2022_01_03_040448_create_devices_table', 3),
(23, '2021_12_22_072614_create_ppbagents_table', 4),
(24, '2022_01_03_071823_create_emergency_contacts_table', 4),
(26, '2022_01_11_093704_create_tstations_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` int(11) DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependent_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppbagents`
--

CREATE TABLE `ppbagents` (
  `ppbagent_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_12` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `medicine` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refers`
--

CREATE TABLE `refers` (
  `refer_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `refer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `created_at`) VALUES
(1, 'Cardiac', '2021-01-05 14:15:11'),
(2, 'Blood Pressure', '2021-01-05 14:15:11'),
(3, 'Diabetes', '2021-01-05 14:15:11'),
(4, 'Renal', '2021-01-05 14:15:11'),
(5, 'Pediatrics', '2021-01-05 14:15:11'),
(6, 'Gynecologist', '2021-01-05 14:15:11'),
(7, 'Oncologist', '2021-01-05 14:15:11'),
(8, 'Physiotherapist', '2021-01-05 14:15:11'),
(9, 'Podiatrist', '2021-01-05 14:15:11'),
(10, 'Opthamologist', '2021-01-05 14:15:11'),
(11, 'Dentist', '2021-01-05 14:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `sub_counties`
--

CREATE TABLE `sub_counties` (
  `id` int(9) NOT NULL,
  `sub_county_code` varchar(15) NOT NULL,
  `county_code` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_counties`
--

INSERT INTO `sub_counties` (`id`, `sub_county_code`, `county_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S_001', 'C_001', 'CHANGAMWE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(2, 'S_002', 'C_001', 'JOMVU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(3, 'S_003', 'C_001', 'KISAUNI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(4, 'S_004', 'C_001', 'NYALI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(5, 'S_005', 'C_001', 'LIKONI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(6, 'S_006', 'C_001', 'MVITA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(7, 'S_007', 'C_002', 'MSAMBWENI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(8, 'S_008', 'C_002', 'LUNGALUNGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(9, 'S_009', 'C_002', 'MATUGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(10, 'S_010', 'C_002', 'KINANGO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(11, 'S_011', 'C_003', 'KILIFI NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(12, 'S_012', 'C_003', 'KILIFI SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(13, 'S_013', 'C_003', 'KALOLENI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(14, 'S_014', 'C_003', 'RABAI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(15, 'S_015', 'C_003', 'GANZE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(16, 'S_016', 'C_003', 'MALINDI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(17, 'S_017', 'C_003', 'MAGARINI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(18, 'S_018', 'C_004', 'GARSEN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(19, 'S_019', 'C_004', 'GALOLE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(20, 'S_020', 'C_004', 'BURA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(21, 'S_021', 'C_005', 'LAMU EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(22, 'S_022', 'C_005', 'LAMU WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(23, 'S_023', 'C_006', 'TAVETA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(24, 'S_024', 'C_006', 'WUNDANYI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(25, 'S_025', 'C_006', 'MWATATE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(26, 'S_026', 'C_006', 'VOI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(27, 'S_027', 'C_007', 'GARISSA TOWNSHIP', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(28, 'S_028', 'C_007', 'BALAMBALA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(29, 'S_029', 'C_007', 'LAGDERA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(30, 'S_030', 'C_007', 'DADAAB', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(31, 'S_031', 'C_007', 'FAFI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(32, 'S_032', 'C_007', 'IJARA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(33, 'S_033', 'C_008', 'WAJIR NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(34, 'S_034', 'C_008', 'WAJIR EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(35, 'S_035', 'C_008', 'TARBAJ', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(36, 'S_036', 'C_008', 'WAJIR WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(37, 'S_037', 'C_008', 'ELDAS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(38, 'S_038', 'C_008', 'WAJIR SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(39, 'S_039', 'C_009', 'MANDERA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(40, 'S_040', 'C_009', 'BANISSA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(41, 'S_041', 'C_009', 'MANDERA NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(42, 'S_042', 'C_009', 'MANDERA SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(43, 'S_043', 'C_009', 'MANDERA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(44, 'S_044', 'C_009', 'LAFEY', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(45, 'S_045', 'C_010', 'MOYALE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(46, 'S_046', 'C_010', 'NORTH HORR', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(47, 'S_047', 'C_010', 'SAKU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(48, 'S_048', 'C_010', 'LAISAMIS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(49, 'S_049', 'C_011', 'ISIOLO NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(50, 'S_050', 'C_011', 'ISIOLO SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(51, 'S_051', 'C_012', 'IGEMBE SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(52, 'S_052', 'C_012', 'IGEMBE CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(53, 'S_053', 'C_012', 'IGEMBE NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(54, 'S_054', 'C_012', 'TIGANIA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(55, 'S_055', 'C_012', 'TIGANIA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(56, 'S_056', 'C_012', 'NORTH IMENTI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(57, 'S_057', 'C_012', 'BUURI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(58, 'S_058', 'C_012', 'CENTRAL IMENTI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(59, 'S_059', 'C_012', 'SOUTH IMENTI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(60, 'S_060', 'C_013', 'MAARA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(61, 'S_061', 'C_013', 'CHUKA/IGAMBANG\'OMBE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(62, 'S_062', 'C_013', 'THARAKA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(63, 'S_063', 'C_014', 'MANYATTA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(64, 'S_064', 'C_014', 'RUNYENJES', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(65, 'S_065', 'C_014', 'MBEERE SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(66, 'S_066', 'C_014', 'MBEERE NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(67, 'S_067', 'C_015', 'MWINGI NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(68, 'S_068', 'C_015', 'MWINGI WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(69, 'S_069', 'C_015', 'MWINGI CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(70, 'S_070', 'C_015', 'KITUI WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(71, 'S_071', 'C_015', 'KITUI RURAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(72, 'S_072', 'C_015', 'KITUI CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(73, 'S_073', 'C_015', 'KITUI EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(74, 'S_074', 'C_015', 'KITUI SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(75, 'S_075', 'C_016', 'MASINGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(76, 'S_076', 'C_016', 'YATTA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(77, 'S_077', 'C_016', 'KANGUNDO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(78, 'S_078', 'C_016', 'MATUNGULU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(79, 'S_079', 'C_016', 'KATHIANI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(80, 'S_080', 'C_016', 'MAVOKO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(81, 'S_081', 'C_016', 'MACHAKOS TOWN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(82, 'S_082', 'C_016', 'MWALA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(83, 'S_083', 'C_017', 'MBOONI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(84, 'S_084', 'C_017', 'KILOME', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(85, 'S_085', 'C_017', 'KAITI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(86, 'S_086', 'C_017', 'MAKUENI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(87, 'S_087', 'C_017', 'KIBWEZI WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(88, 'S_088', 'C_017', 'KIBWEZI EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(89, 'S_089', 'C_018', 'KINANGOP', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(90, 'S_090', 'C_018', 'KIPIPIRI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(91, 'S_091', 'C_018', 'OL KALOU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(92, 'S_092', 'C_018', 'OL JOROK', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(93, 'S_093', 'C_018', 'NDARAGWA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(94, 'S_094', 'C_019', 'TETU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(95, 'S_095', 'C_019', 'KIENI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(96, 'S_096', 'C_019', 'MATHIRA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(97, 'S_097', 'C_019', 'OTHAYA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(98, 'S_098', 'C_019', 'MUKURWEINI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(99, 'S_099', 'C_019', 'NYERI TOWN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(100, 'S_100', 'C_020', 'MWEA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(101, 'S_101', 'C_020', 'GICHUGU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(102, 'S_102', 'C_020', 'NDIA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(103, 'S_103', 'C_020', 'KIRINYAGA CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(104, 'S_104', 'C_021', 'KANGEMA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(105, 'S_105', 'C_021', 'MATHIOYA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(106, 'S_106', 'C_021', 'KIHARU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(107, 'S_107', 'C_021', 'KIGUMO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(108, 'S_108', 'C_021', 'MARAGWA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(109, 'S_109', 'C_021', 'KANDARA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(110, 'S_110', 'C_021', 'GATANGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(111, 'S_111', 'C_022', 'GATUNDU SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(112, 'S_112', 'C_022', 'GATUNDU NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(113, 'S_113', 'C_022', 'JUJA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(114, 'S_114', 'C_022', 'THIKA TOWN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(115, 'S_115', 'C_022', 'RUIRU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(116, 'S_116', 'C_022', 'GITHUNGURI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(117, 'S_117', 'C_022', 'KIAMBU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(118, 'S_118', 'C_022', 'KIAMBAA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(119, 'S_119', 'C_022', 'KABETE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(120, 'S_120', 'C_022', 'KIKUYU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(121, 'S_121', 'C_022', 'LIMURU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(122, 'S_122', 'C_022', 'LARI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(123, 'S_123', 'C_023', 'TURKANA NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(124, 'S_124', 'C_023', 'TURKANA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(125, 'S_125', 'C_023', 'TURKANA CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(126, 'S_126', 'C_023', 'LOIMA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(127, 'S_127', 'C_023', 'TURKANA SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(128, 'S_128', 'C_023', 'TURKANA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(129, 'S_129', 'C_024', 'KAPENGURIA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(130, 'S_130', 'C_024', 'SIGOR', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(131, 'S_131', 'C_024', 'KACHELIBA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(132, 'S_132', 'C_024', 'POKOT SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(133, 'S_133', 'C_025', 'SAMBURU WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(134, 'S_134', 'C_025', 'SAMBURU NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(135, 'S_135', 'C_025', 'SAMBURU EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(136, 'S_136', 'C_026', 'KWANZA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(137, 'S_137', 'C_026', 'ENDEBESS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(138, 'S_138', 'C_026', 'SABOTI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(139, 'S_139', 'C_026', 'KIMININI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(140, 'S_140', 'C_026', 'CHERANGANY', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(141, 'S_141', 'C_027', 'SOY', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(142, 'S_142', 'C_027', 'TURBO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(143, 'S_143', 'C_027', 'MOIBEN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(144, 'S_144', 'C_027', 'AINABKOI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(145, 'S_145', 'C_027', 'KAPSERET', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(146, 'S_146', 'C_027', 'KESSES', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(147, 'S_147', 'C_028', 'MARAKWET EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(148, 'S_148', 'C_028', 'MARAKWET WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(149, 'S_149', 'C_028', 'KEIYO NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(150, 'S_150', 'C_028', 'KEIYO SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(151, 'S_151', 'C_029', 'TINDERET', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(152, 'S_152', 'C_029', 'ALDAI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(153, 'S_153', 'C_029', 'NANDI HILLS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(154, 'S_154', 'C_029', 'CHESUMEI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(155, 'S_155', 'C_029', 'EMGWEN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(156, 'S_156', 'C_029', 'MOSOP', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(157, 'S_157', 'C_030', 'TIATY', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(158, 'S_158', 'C_030', 'BARINGO  NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(159, 'S_159', 'C_030', 'BARINGO CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(160, 'S_160', 'C_030', 'BARINGO SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(161, 'S_161', 'C_030', 'MOGOTIO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(162, 'S_162', 'C_030', 'ELDAMA RAVINE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(163, 'S_163', 'C_031', 'LAIKIPIA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(164, 'S_164', 'C_031', 'LAIKIPIA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(165, 'S_165', 'C_031', 'LAIKIPIA NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(166, 'S_166', 'C_032', 'MOLO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(167, 'S_167', 'C_032', 'NJORO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(168, 'S_168', 'C_032', 'NAIVASHA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(169, 'S_169', 'C_032', 'GILGIL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(170, 'S_170', 'C_032', 'KURESOI SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(171, 'S_171', 'C_032', 'KURESOI NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(172, 'S_172', 'C_032', 'SUBUKIA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(173, 'S_173', 'C_032', 'RONGAI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(174, 'S_174', 'C_032', 'BAHATI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(175, 'S_175', 'C_032', 'NAKURU TOWN WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(176, 'S_176', 'C_032', 'NAKURU TOWN EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(177, 'S_177', 'C_033', 'KILGORIS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(178, 'S_178', 'C_033', 'EMURUA DIKIRR', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(179, 'S_179', 'C_033', 'NAROK NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(180, 'S_180', 'C_033', 'NAROK EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(181, 'S_181', 'C_033', 'NAROK SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(182, 'S_182', 'C_033', 'NAROK WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(183, 'S_183', 'C_034', 'KAJIADO NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(184, 'S_184', 'C_034', 'KAJIADO CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(185, 'S_185', 'C_034', 'KAJIADO EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(186, 'S_186', 'C_034', 'KAJIADO WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(187, 'S_187', 'C_034', 'KAJIADO SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(188, 'S_188', 'C_035', 'KIPKELION EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(189, 'S_189', 'C_035', 'KIPKELION WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(190, 'S_190', 'C_035', 'AINAMOI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(191, 'S_191', 'C_035', 'BURETI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(192, 'S_192', 'C_035', 'BELGUT', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(193, 'S_193', 'C_035', 'SIGOWET/SOIN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(194, 'S_194', 'C_036', 'SOTIK', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(195, 'S_195', 'C_036', 'CHEPALUNGU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(196, 'S_196', 'C_036', 'BOMET EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(197, 'S_197', 'C_036', 'BOMET CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(198, 'S_198', 'C_036', 'KONOIN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(199, 'S_199', 'C_037', 'LUGARI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(200, 'S_200', 'C_037', 'LIKUYANI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(201, 'S_201', 'C_037', 'MALAVA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(202, 'S_202', 'C_037', 'LURAMBI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(203, 'S_203', 'C_037', 'NAVAKHOLO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(204, 'S_204', 'C_037', 'MUMIAS WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(205, 'S_205', 'C_037', 'MUMIAS EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(206, 'S_206', 'C_037', 'MATUNGU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(207, 'S_207', 'C_037', 'BUTERE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(208, 'S_208', 'C_037', 'KHWISERO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(209, 'S_209', 'C_037', 'SHINYALU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(210, 'S_210', 'C_037', 'IKOLOMANI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(211, 'S_211', 'C_038', 'VIHIGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(212, 'S_212', 'C_038', 'SABATIA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(213, 'S_213', 'C_038', 'HAMISI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(214, 'S_214', 'C_038', 'LUANDA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(215, 'S_215', 'C_038', 'EMUHAYA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(216, 'S_216', 'C_039', 'MT. ELGON', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(217, 'S_217', 'C_039', 'SIRISIA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(218, 'S_218', 'C_039', 'KABUCHAI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(219, 'S_219', 'C_039', 'BUMULA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(220, 'S_220', 'C_039', 'KANDUYI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(221, 'S_221', 'C_039', 'WEBUYE EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(222, 'S_222', 'C_039', 'WEBUYE WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(223, 'S_223', 'C_039', 'KIMILILI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(224, 'S_224', 'C_039', 'TONGAREN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(225, 'S_225', 'C_040', 'TESO NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(226, 'S_226', 'C_040', 'TESO SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(227, 'S_227', 'C_040', 'NAMBALE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(228, 'S_228', 'C_040', 'MATAYOS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(229, 'S_229', 'C_040', 'BUTULA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(230, 'S_230', 'C_040', 'FUNYULA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(231, 'S_231', 'C_040', 'BUDALANGI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(232, 'S_232', 'C_041', 'UGENYA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(233, 'S_233', 'C_041', 'UGUNJA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(234, 'S_234', 'C_041', 'ALEGO USONGA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(235, 'S_235', 'C_041', 'GEM', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(236, 'S_236', 'C_041', 'BONDO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(237, 'S_237', 'C_041', 'RARIEDA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(238, 'S_238', 'C_042', 'KISUMU EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(239, 'S_239', 'C_042', 'KISUMU WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(240, 'S_240', 'C_042', 'KISUMU CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(241, 'S_241', 'C_042', 'SEME', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(242, 'S_242', 'C_042', 'NYANDO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(243, 'S_243', 'C_042', 'MUHORONI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(244, 'S_244', 'C_042', 'NYAKACH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(245, 'S_245', 'C_043', 'KASIPUL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(246, 'S_246', 'C_043', 'KABONDO KASIPUL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(247, 'S_247', 'C_043', 'KARACHUONYO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(248, 'S_248', 'C_043', 'RANGWE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(249, 'S_249', 'C_043', 'HOMA BAY TOWN', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(250, 'S_250', 'C_043', 'NDHIWA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(251, 'S_251', 'C_043', 'SUBA NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(252, 'S_252', 'C_043', 'SUBA SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(253, 'S_253', 'C_044', 'RONGO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(254, 'S_254', 'C_044', 'AWENDO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(255, 'S_255', 'C_044', 'SUNA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(256, 'S_256', 'C_044', 'SUNA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(257, 'S_257', 'C_044', 'URIRI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(258, 'S_258', 'C_044', 'NYATIKE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(259, 'S_259', 'C_044', 'KURIA WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(260, 'S_260', 'C_044', 'KURIA EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(261, 'S_261', 'C_045', 'BONCHARI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(262, 'S_262', 'C_045', 'SOUTH MUGIRANGO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(263, 'S_263', 'C_045', 'BOMACHOGE BORABU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(264, 'S_264', 'C_045', 'BOBASI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(265, 'S_265', 'C_045', 'BOMACHOGE CHACHE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(266, 'S_266', 'C_045', 'NYARIBARI MASABA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(267, 'S_267', 'C_045', 'NYARIBARI CHACHE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(268, 'S_268', 'C_045', 'KITUTU CHACHE NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(269, 'S_269', 'C_045', 'KITUTU CHACHE SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(270, 'S_270', 'C_046', 'KITUTU MASABA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(271, 'S_271', 'C_046', 'WEST MUGIRANGO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(272, 'S_272', 'C_046', 'NORTH MUGIRANGO', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(273, 'S_273', 'C_046', 'BORABU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(274, 'S_274', 'C_047', 'WESTLANDS', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(275, 'S_275', 'C_047', 'DAGORETTI NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(276, 'S_276', 'C_047', 'DAGORETTI SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(277, 'S_277', 'C_047', 'LANGATA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(278, 'S_278', 'C_047', 'KIBRA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(279, 'S_279', 'C_047', 'ROYSAMBU', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(280, 'S_280', 'C_047', 'KASARANI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(281, 'S_281', 'C_047', 'RUARAKA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(282, 'S_282', 'C_047', 'EMBAKASI SOUTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(283, 'S_283', 'C_047', 'EMBAKASI NORTH', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(284, 'S_284', 'C_047', 'EMBAKASI CENTRAL', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(285, 'S_285', 'C_047', 'EMBAKASI EAST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(286, 'S_286', 'C_047', 'EMBAKASI WEST', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(287, 'S_287', 'C_047', 'MAKADARA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(288, 'S_288', 'C_047', 'KAMUKUNJI', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(289, 'S_289', 'C_047', 'STAREHE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(290, 'S_290', 'C_047', 'MATHARE', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(291, 'S_291', 'C_048', 'DIASPORA', '2022-01-13 05:05:21', '2022-01-13 05:05:21'),
(292, 'S_292', 'C_049', 'PRISONS', '2022-01-13 05:05:21', '2022-01-13 05:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `testdevices`
--

CREATE TABLE `testdevices` (
  `testdevice_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ppb_agent_id` bigint(20) UNSIGNED NOT NULL,
  `device_owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_share_agreement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_d_c_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_d_c_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_d_c_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teststation_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teststations`
--

CREATE TABLE `teststations` (
  `teststation_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tstations`
--

CREATE TABLE `tstations` (
  `tstation_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unique_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `po_box` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gps_pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `words` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` bigint(20) DEFAULT NULL,
  `mobile_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_reset_toekn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `date_of_birth`, `gender`, `national_id`, `mobile_number`, `email`, `photo`, `role`, `email_verified_at`, `password`, `password_reset_toekn`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Lucy  Koinange', '1982-01-04', 'female', 18479036785, NULL, 'lucy@halistawi.com', NULL, NULL, NULL, '$2y$10$hofbXg.7ZO9J3DWeScm7rOk42jCCPliKh4bNIGHg1qgI8aCdRndEW', NULL, NULL, '2022-01-03 23:54:44', '2022-01-03 23:54:44'),
(7, 'Lucy Test1', '2000-01-01', 'female', 123, NULL, 'lkoinange@gmail.com', NULL, NULL, NULL, '$2y$10$MJchi9KrlN6r8jVS7IMK6.v.wvYStr2eHyXsVxbmVghfDOnnHr3tC', NULL, NULL, '2022-01-05 13:34:59', '2022-01-05 13:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `county_code` varchar(15) NOT NULL,
  `sub_county_code` varchar(15) NOT NULL,
  `ward_code` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `county_code`, `sub_county_code`, `ward_code`, `name`, `created_at`, `updated_at`) VALUES
(1, 'C_001', 'S_001', 'WC_0001', 'PORT REITZ', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(2, 'C_001', 'S_001', 'WC_0001', 'KIPEVU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(3, 'C_001', 'S_001', 'WC_0001', 'AIRPORT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(4, 'C_001', 'S_001', 'WC_0001', 'CHANGAMWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(5, 'C_001', 'S_001', 'WC_0001', 'CHAANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(6, 'C_001', 'S_002', 'WC_0001', 'JOMVU KUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(7, 'C_001', 'S_002', 'WC_0001', 'MIRITINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(8, 'C_001', 'S_002', 'WC_0001', 'MIKINDANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(9, 'C_001', 'S_003', 'WC_0001', 'MJAMBERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(10, 'C_001', 'S_003', 'WC_0001', 'JUNDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(11, 'C_001', 'S_003', 'WC_0001', 'BAMBURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(12, 'C_001', 'S_003', 'WC_0001', 'MWAKIRUNGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(13, 'C_001', 'S_003', 'WC_0001', 'MTOPANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(14, 'C_001', 'S_003', 'WC_0001', 'MAGOGONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(15, 'C_001', 'S_003', 'WC_0001', 'SHANZU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(16, 'C_001', 'S_004', 'WC_0001', 'FRERE TOWN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(17, 'C_001', 'S_004', 'WC_0001', 'ZIWA LA NG\'OMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(18, 'C_001', 'S_004', 'WC_0001', 'MKOMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(19, 'C_001', 'S_004', 'WC_0001', 'KONGOWEA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(20, 'C_001', 'S_004', 'WC_0001', 'KADZANDANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(21, 'C_001', 'S_005', 'WC_0001', 'MTONGWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(22, 'C_001', 'S_005', 'WC_0001', 'SHIKA ADABU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(23, 'C_001', 'S_005', 'WC_0001', 'BOFU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(24, 'C_001', 'S_005', 'WC_0001', 'LIKONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(25, 'C_001', 'S_005', 'WC_0001', 'TIMBWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(26, 'C_001', 'S_006', 'WC_0001', 'MJI WA KALE/MAKADARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(27, 'C_001', 'S_006', 'WC_0001', 'TUDOR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(28, 'C_001', 'S_006', 'WC_0001', 'TONONOKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(29, 'C_001', 'S_006', 'WC_0001', 'SHIMANZI/GANJONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(30, 'C_001', 'S_006', 'WC_0001', 'MAJENGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(31, 'C_002', 'S_007', 'WC_0001', 'GOMBATO BONGWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(32, 'C_002', 'S_007', 'WC_0001', 'UKUNDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(33, 'C_002', 'S_007', 'WC_0001', 'KINONDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(34, 'C_002', 'S_007', 'WC_0001', 'RAMISI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(35, 'C_002', 'S_008', 'WC_0001', 'PONGWE/KIKONENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(36, 'C_002', 'S_008', 'WC_0001', 'DZOMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(37, 'C_002', 'S_008', 'WC_0001', 'MWERENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(38, 'C_002', 'S_008', 'WC_0001', 'VANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(39, 'C_002', 'S_009', 'WC_0001', 'TSIMBA GOLINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(40, 'C_002', 'S_009', 'WC_0001', 'WAA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(41, 'C_002', 'S_009', 'WC_0001', 'TIWI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(42, 'C_002', 'S_009', 'WC_0001', 'KUBO SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(43, 'C_002', 'S_009', 'WC_0001', 'MKONGANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(44, 'C_002', 'S_010', 'WC_0001', 'NDAVAYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(45, 'C_002', 'S_010', 'WC_0001', 'PUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(46, 'C_002', 'S_010', 'WC_0001', 'KINANGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(47, 'C_002', 'S_010', 'WC_0001', 'MACKINNON ROAD', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(48, 'C_002', 'S_010', 'WC_0001', 'CHENGONI/SAMBURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(49, 'C_002', 'S_010', 'WC_0001', 'MWAVUMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(50, 'C_002', 'S_010', 'WC_0001', 'KASEMENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(51, 'C_003', 'S_011', 'WC_0001', 'TEZO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(52, 'C_003', 'S_011', 'WC_0001', 'SOKONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(53, 'C_003', 'S_011', 'WC_0001', 'KIBARANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(54, 'C_003', 'S_011', 'WC_0001', 'DABASO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(55, 'C_003', 'S_011', 'WC_0001', 'MATSANGONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(56, 'C_003', 'S_011', 'WC_0001', 'WATAMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(57, 'C_003', 'S_011', 'WC_0001', 'MNARANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(58, 'C_003', 'S_012', 'WC_0001', 'JUNJU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(59, 'C_003', 'S_012', 'WC_0001', 'MWARAKAYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(60, 'C_003', 'S_012', 'WC_0001', 'SHIMO LA TEWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(61, 'C_003', 'S_012', 'WC_0001', 'CHASIMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(62, 'C_003', 'S_012', 'WC_0001', 'MTEPENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(63, 'C_003', 'S_013', 'WC_0001', 'MARIAKANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(64, 'C_003', 'S_013', 'WC_0001', 'KAYAFUNGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(65, 'C_003', 'S_013', 'WC_0001', 'KALOLENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(66, 'C_003', 'S_013', 'WC_0001', 'MWANAMWINGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(67, 'C_003', 'S_014', 'WC_0001', 'MWAWESA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(68, 'C_003', 'S_014', 'WC_0001', 'RURUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(69, 'C_003', 'S_014', 'WC_0001', 'KAMBE/RIBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(70, 'C_003', 'S_014', 'WC_0001', 'RABAI/KISURUTINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(71, 'C_003', 'S_015', 'WC_0001', 'GANZE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(72, 'C_003', 'S_015', 'WC_0001', 'BAMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(73, 'C_003', 'S_015', 'WC_0001', 'JARIBUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(74, 'C_003', 'S_015', 'WC_0001', 'SOKOKE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(75, 'C_003', 'S_016', 'WC_0001', 'JILORE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(76, 'C_003', 'S_016', 'WC_0001', 'KAKUYUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(77, 'C_003', 'S_016', 'WC_0001', 'GANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(78, 'C_003', 'S_016', 'WC_0001', 'MALINDI TOWN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(79, 'C_003', 'S_016', 'WC_0001', 'SHELLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(80, 'C_003', 'S_017', 'WC_0001', 'MARAFA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(81, 'C_003', 'S_017', 'WC_0001', 'MAGARINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(82, 'C_003', 'S_017', 'WC_0001', 'GONGONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(83, 'C_003', 'S_017', 'WC_0001', 'ADU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(84, 'C_003', 'S_017', 'WC_0001', 'GARASHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(85, 'C_003', 'S_017', 'WC_0001', 'SABAKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(86, 'C_004', 'S_018', 'WC_0001', 'KIPINI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(87, 'C_004', 'S_018', 'WC_0001', 'GARSEN SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(88, 'C_004', 'S_018', 'WC_0001', 'KIPINI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(89, 'C_004', 'S_018', 'WC_0001', 'GARSEN CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(90, 'C_004', 'S_018', 'WC_0001', 'GARSEN WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(91, 'C_004', 'S_018', 'WC_0001', 'GARSEN NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(92, 'C_004', 'S_019', 'WC_0001', 'KINAKOMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(93, 'C_004', 'S_019', 'WC_0001', 'MIKINDUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(94, 'C_004', 'S_019', 'WC_0001', 'CHEWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(95, 'C_004', 'S_019', 'WC_0001', 'WAYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(96, 'C_004', 'S_020', 'WC_0001', 'CHEWELE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(97, 'C_004', 'S_020', 'WC_0001', 'HIRIMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(98, 'C_004', 'S_020', 'WC_0001', 'BANGALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(99, 'C_004', 'S_020', 'WC_0001', 'SALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(100, 'C_004', 'S_020', 'WC_0001', 'MADOGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(101, 'C_005', 'S_021', 'WC_0001', 'FAZA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(102, 'C_005', 'S_021', 'WC_0001', 'KIUNGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(103, 'C_005', 'S_021', 'WC_0001', 'BASUBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(104, 'C_005', 'S_022', 'WC_0001', 'SHELLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(105, 'C_005', 'S_022', 'WC_0001', 'MKOMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(106, 'C_005', 'S_022', 'WC_0001', 'HINDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(107, 'C_005', 'S_022', 'WC_0001', 'MKUNUMBI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(108, 'C_005', 'S_022', 'WC_0001', 'HONGWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(109, 'C_005', 'S_022', 'WC_0001', 'WITU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(110, 'C_005', 'S_022', 'WC_0001', 'BAHARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(111, 'C_006', 'S_023', 'WC_0001', 'CHALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(112, 'C_006', 'S_023', 'WC_0001', 'MAHOO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(113, 'C_006', 'S_023', 'WC_0001', 'BOMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(114, 'C_006', 'S_023', 'WC_0001', 'MBOGHONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(115, 'C_006', 'S_023', 'WC_0001', 'MATA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(116, 'C_006', 'S_024', 'WC_0001', 'WUNDANYI/MBALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(117, 'C_006', 'S_024', 'WC_0001', 'WERUGHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(118, 'C_006', 'S_024', 'WC_0001', 'WUMINGU/KISHUSHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(119, 'C_006', 'S_024', 'WC_0001', 'MWANDA/MGANGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(120, 'C_006', 'S_025', 'WC_0001', 'RONG\'E', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(121, 'C_006', 'S_025', 'WC_0001', 'MWATATE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(122, 'C_006', 'S_025', 'WC_0001', 'BURA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(123, 'C_006', 'S_025', 'WC_0001', 'CHAWIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(124, 'C_006', 'S_025', 'WC_0001', 'WUSI/KISHAMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(125, 'C_006', 'S_026', 'WC_0001', 'MBOLOLO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(126, 'C_006', 'S_026', 'WC_0001', 'SAGALLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(127, 'C_006', 'S_026', 'WC_0001', 'KALOLENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(128, 'C_006', 'S_026', 'WC_0001', 'MARUNGU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(129, 'C_006', 'S_026', 'WC_0001', 'KASIGAU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(130, 'C_006', 'S_026', 'WC_0001', 'NGOLIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(131, 'C_007', 'S_027', 'WC_0001', 'WABERI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(132, 'C_007', 'S_027', 'WC_0001', 'GALBET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(133, 'C_007', 'S_027', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(134, 'C_007', 'S_027', 'WC_0001', 'IFTIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(135, 'C_007', 'S_028', 'WC_0001', 'BALAMBALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(136, 'C_007', 'S_028', 'WC_0001', 'DANYERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(137, 'C_007', 'S_028', 'WC_0001', 'JARA JARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(138, 'C_007', 'S_028', 'WC_0001', 'SAKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(139, 'C_007', 'S_028', 'WC_0001', 'SANKURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(140, 'C_007', 'S_029', 'WC_0001', 'MODOGASHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(141, 'C_007', 'S_029', 'WC_0001', 'BENANE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(142, 'C_007', 'S_029', 'WC_0001', 'GOREALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(143, 'C_007', 'S_029', 'WC_0001', 'MAALIMIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(144, 'C_007', 'S_029', 'WC_0001', 'SABENA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(145, 'C_007', 'S_029', 'WC_0001', 'BARAKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(146, 'C_007', 'S_030', 'WC_0001', 'DERTU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(147, 'C_007', 'S_030', 'WC_0001', 'DADAAB', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(148, 'C_007', 'S_030', 'WC_0001', 'LABASIGALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(149, 'C_007', 'S_030', 'WC_0001', 'DAMAJALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(150, 'C_007', 'S_030', 'WC_0001', 'LIBOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(151, 'C_007', 'S_030', 'WC_0001', 'ABAKAILE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(152, 'C_007', 'S_031', 'WC_0001', 'BURA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(153, 'C_007', 'S_031', 'WC_0001', 'DEKAHARIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(154, 'C_007', 'S_031', 'WC_0001', 'JARAJILA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(155, 'C_007', 'S_031', 'WC_0001', 'FAFI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(156, 'C_007', 'S_031', 'WC_0001', 'NANIGHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(157, 'C_007', 'S_032', 'WC_0001', 'HULUGHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(158, 'C_007', 'S_032', 'WC_0001', 'SANGAILU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(159, 'C_007', 'S_032', 'WC_0001', 'IJARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(160, 'C_007', 'S_032', 'WC_0001', 'MASALANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(161, 'C_008', 'S_033', 'WC_0001', 'GURAR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(162, 'C_008', 'S_033', 'WC_0001', 'BUTE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(163, 'C_008', 'S_033', 'WC_0001', 'KORONDILE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(164, 'C_008', 'S_033', 'WC_0001', 'MALKAGUFU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(165, 'C_008', 'S_033', 'WC_0001', 'BATALU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(166, 'C_008', 'S_033', 'WC_0001', 'DANABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(167, 'C_008', 'S_033', 'WC_0001', 'GODOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(168, 'C_008', 'S_034', 'WC_0001', 'WAGBERI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(169, 'C_008', 'S_034', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(170, 'C_008', 'S_034', 'WC_0001', 'BARWAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(171, 'C_008', 'S_034', 'WC_0001', 'KHOROF/HARAR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(172, 'C_008', 'S_035', 'WC_0001', 'ELBEN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(173, 'C_008', 'S_035', 'WC_0001', 'SARMAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(174, 'C_008', 'S_035', 'WC_0001', 'TARBAJ', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(175, 'C_008', 'S_035', 'WC_0001', 'WARGADUD', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(176, 'C_008', 'S_036', 'WC_0001', 'ARBAJAHAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(177, 'C_008', 'S_036', 'WC_0001', 'HADADO/ATHIBOHOL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(178, 'C_008', 'S_036', 'WC_0001', 'ADAMASAJIDE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(179, 'C_008', 'S_036', 'WC_0001', 'GANYURE/WAGALLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(180, 'C_008', 'S_037', 'WC_0001', 'ELDAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(181, 'C_008', 'S_037', 'WC_0001', 'DELLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(182, 'C_008', 'S_037', 'WC_0001', 'LAKOLEY SOUTH/BASIR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(183, 'C_008', 'S_037', 'WC_0001', 'ELNUR/TULA TULA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(184, 'C_008', 'S_038', 'WC_0001', 'BENANE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(185, 'C_008', 'S_038', 'WC_0001', 'BURDER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(186, 'C_008', 'S_038', 'WC_0001', 'DADAJA BULLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(187, 'C_008', 'S_038', 'WC_0001', 'HABASSWEIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(188, 'C_008', 'S_038', 'WC_0001', 'LAGBOGHOL SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(189, 'C_008', 'S_038', 'WC_0001', 'IBRAHIM URE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(190, 'C_008', 'S_038', 'WC_0001', 'DIIF', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(191, 'C_009', 'S_039', 'WC_0001', 'TAKABA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(192, 'C_009', 'S_039', 'WC_0001', 'TAKABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(193, 'C_009', 'S_039', 'WC_0001', 'LAGSURE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(194, 'C_009', 'S_039', 'WC_0001', 'DANDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(195, 'C_009', 'S_039', 'WC_0001', 'GITHER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(196, 'C_009', 'S_040', 'WC_0001', 'BANISSA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(197, 'C_009', 'S_040', 'WC_0001', 'DERKHALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(198, 'C_009', 'S_040', 'WC_0001', 'GUBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(199, 'C_009', 'S_040', 'WC_0001', 'MALKAMARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(200, 'C_009', 'S_040', 'WC_0001', 'KILIWEHIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(201, 'C_009', 'S_041', 'WC_0001', 'ASHABITO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(202, 'C_009', 'S_041', 'WC_0001', 'GUTICHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(203, 'C_009', 'S_041', 'WC_0001', 'MOROTHILE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(204, 'C_009', 'S_041', 'WC_0001', 'RHAMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(205, 'C_009', 'S_041', 'WC_0001', 'RHAMU-DIMTU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(206, 'C_009', 'S_042', 'WC_0001', 'WARGADUD', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(207, 'C_009', 'S_042', 'WC_0001', 'KUTULO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(208, 'C_009', 'S_042', 'WC_0001', 'ELWAK SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(209, 'C_009', 'S_042', 'WC_0001', 'ELWAK NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(210, 'C_009', 'S_042', 'WC_0001', 'SHIMBIR FATUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(211, 'C_009', 'S_043', 'WC_0001', 'ARABIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(212, 'C_009', 'S_043', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(213, 'C_009', 'S_043', 'WC_0001', 'NEBOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(214, 'C_009', 'S_043', 'WC_0001', 'KHALALIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(215, 'C_009', 'S_043', 'WC_0001', 'LIBEHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(216, 'C_009', 'S_044', 'WC_0001', 'SALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(217, 'C_009', 'S_044', 'WC_0001', 'FINO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(218, 'C_009', 'S_044', 'WC_0001', 'LAFEY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(219, 'C_009', 'S_044', 'WC_0001', 'WARANQARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(220, 'C_009', 'S_044', 'WC_0001', 'ALANGO GOF', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(221, 'C_010', 'S_045', 'WC_0001', 'BUTIYE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(222, 'C_010', 'S_045', 'WC_0001', 'SOLOLO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(223, 'C_010', 'S_045', 'WC_0001', 'HEILLU/MANYATTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(224, 'C_010', 'S_045', 'WC_0001', 'GOLBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(225, 'C_010', 'S_045', 'WC_0001', 'MOYALE TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(226, 'C_010', 'S_045', 'WC_0001', 'URAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(227, 'C_010', 'S_045', 'WC_0001', 'OBBU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(228, 'C_010', 'S_046', 'WC_0001', 'DUKANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(229, 'C_010', 'S_046', 'WC_0001', 'MAIKONA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(230, 'C_010', 'S_046', 'WC_0001', 'TURBI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(231, 'C_010', 'S_046', 'WC_0001', 'NORTH HORR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(232, 'C_010', 'S_046', 'WC_0001', 'ILLERET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(233, 'C_010', 'S_047', 'WC_0001', 'SAGANTE/JALDESA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(234, 'C_010', 'S_047', 'WC_0001', 'KARARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(235, 'C_010', 'S_047', 'WC_0001', 'MARSABIT CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(236, 'C_010', 'S_048', 'WC_0001', 'LOIYANGALANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(237, 'C_010', 'S_048', 'WC_0001', 'KARGI/SOUTH HORR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(238, 'C_010', 'S_048', 'WC_0001', 'KORR/NGURUNIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(239, 'C_010', 'S_048', 'WC_0001', 'LOGO LOGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(240, 'C_010', 'S_048', 'WC_0001', 'LAISAMIS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(241, 'C_011', 'S_049', 'WC_0001', 'WABERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(242, 'C_011', 'S_049', 'WC_0001', 'BULLA PESA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(243, 'C_011', 'S_049', 'WC_0001', 'CHARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(244, 'C_011', 'S_049', 'WC_0001', 'CHERAB', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(245, 'C_011', 'S_049', 'WC_0001', 'NGARE MARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(246, 'C_011', 'S_049', 'WC_0001', 'BURAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(247, 'C_011', 'S_049', 'WC_0001', 'OLDO/NYIRO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(248, 'C_011', 'S_050', 'WC_0001', 'GARBATULLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(249, 'C_011', 'S_050', 'WC_0001', 'KINNA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(250, 'C_011', 'S_050', 'WC_0001', 'SERICHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(251, 'C_012', 'S_051', 'WC_0001', 'MAUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(252, 'C_012', 'S_051', 'WC_0001', 'KIEGOI/ANTUBOCHIU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(253, 'C_012', 'S_051', 'WC_0001', 'ATHIRU GAITI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(254, 'C_012', 'S_051', 'WC_0001', 'AKACHIU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(255, 'C_012', 'S_051', 'WC_0001', 'KANUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(256, 'C_012', 'S_052', 'WC_0001', 'AKIRANG\'ONDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(257, 'C_012', 'S_052', 'WC_0001', 'ATHIRU RUUJINE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(258, 'C_012', 'S_052', 'WC_0001', 'IGEMBE EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(259, 'C_012', 'S_052', 'WC_0001', 'NJIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(260, 'C_012', 'S_052', 'WC_0001', 'KANGETA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(261, 'C_012', 'S_053', 'WC_0001', 'ANTUAMBUI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(262, 'C_012', 'S_053', 'WC_0001', 'NTUNENE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(263, 'C_012', 'S_053', 'WC_0001', 'ANTUBETWE KIONGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(264, 'C_012', 'S_053', 'WC_0001', 'NAATHU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(265, 'C_012', 'S_053', 'WC_0001', 'AMWATHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(266, 'C_012', 'S_054', 'WC_0001', 'ATHWANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(267, 'C_012', 'S_054', 'WC_0001', 'AKITHII', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(268, 'C_012', 'S_054', 'WC_0001', 'KIANJAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(269, 'C_012', 'S_054', 'WC_0001', 'NKOMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(270, 'C_012', 'S_054', 'WC_0001', 'MBEU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(271, 'C_012', 'S_055', 'WC_0001', 'THANGATHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(272, 'C_012', 'S_055', 'WC_0001', 'MIKINDURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(273, 'C_012', 'S_055', 'WC_0001', 'KIGUCHWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(274, 'C_012', 'S_055', 'WC_0001', 'MUTHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(275, 'C_012', 'S_055', 'WC_0001', 'KARAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(276, 'C_012', 'S_056', 'WC_0001', 'MUNICIPALITY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(277, 'C_012', 'S_056', 'WC_0001', 'NTIMA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(278, 'C_012', 'S_056', 'WC_0001', 'NTIMA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(279, 'C_012', 'S_056', 'WC_0001', 'NYAKI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(280, 'C_012', 'S_056', 'WC_0001', 'NYAKI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(281, 'C_012', 'S_057', 'WC_0001', 'TIMAU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(282, 'C_012', 'S_057', 'WC_0001', 'KISIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(283, 'C_012', 'S_057', 'WC_0001', 'KIIRUA/NAARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(284, 'C_012', 'S_057', 'WC_0001', 'RUIRI/RWARERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(285, 'C_012', 'S_057', 'WC_0001', 'KIBIRICHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(286, 'C_012', 'S_058', 'WC_0001', 'MWANGANTHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(287, 'C_012', 'S_058', 'WC_0001', 'ABOTHUGUCHI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(288, 'C_012', 'S_058', 'WC_0001', 'ABOTHUGUCHI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(289, 'C_012', 'S_058', 'WC_0001', 'KIAGU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(290, 'C_012', 'S_059', 'WC_0001', 'MITUNGUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(291, 'C_012', 'S_059', 'WC_0001', 'IGOJI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(292, 'C_012', 'S_059', 'WC_0001', 'IGOJI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(293, 'C_012', 'S_059', 'WC_0001', 'ABOGETA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(294, 'C_012', 'S_059', 'WC_0001', 'ABOGETA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(295, 'C_012', 'S_059', 'WC_0001', 'NKUENE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(296, 'C_013', 'S_060', 'WC_0001', 'MITHERU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(297, 'C_013', 'S_060', 'WC_0001', 'MUTHAMBI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(298, 'C_013', 'S_060', 'WC_0001', 'MWIMBI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(299, 'C_013', 'S_060', 'WC_0001', 'GANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(300, 'C_013', 'S_060', 'WC_0001', 'CHOGORIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(301, 'C_013', 'S_061', 'WC_0001', 'MARIANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(302, 'C_013', 'S_061', 'WC_0001', 'KARINGANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(303, 'C_013', 'S_061', 'WC_0001', 'MAGUMONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(304, 'C_013', 'S_061', 'WC_0001', 'MUGWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(305, 'C_013', 'S_061', 'WC_0001', 'IGAMBANG\'OMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(306, 'C_013', 'S_062', 'WC_0001', 'GATUNGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(307, 'C_013', 'S_062', 'WC_0001', 'MUKOTHIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(308, 'C_013', 'S_062', 'WC_0001', 'NKONDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(309, 'C_013', 'S_062', 'WC_0001', 'CHIAKARIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(310, 'C_013', 'S_062', 'WC_0001', 'MARIMANTI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(311, 'C_014', 'S_063', 'WC_0001', 'RUGURU/NGANDORI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(312, 'C_014', 'S_063', 'WC_0001', 'KITHIMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(313, 'C_014', 'S_063', 'WC_0001', 'NGINDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(314, 'C_014', 'S_063', 'WC_0001', 'MBETI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(315, 'C_014', 'S_063', 'WC_0001', 'KIRIMARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(316, 'C_014', 'S_063', 'WC_0001', 'GATURI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(317, 'C_014', 'S_064', 'WC_0001', 'GATURI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(318, 'C_014', 'S_064', 'WC_0001', 'KAGAARI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(319, 'C_014', 'S_064', 'WC_0001', 'CENTRAL  WARD', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(320, 'C_014', 'S_064', 'WC_0001', 'KAGAARI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(321, 'C_014', 'S_064', 'WC_0001', 'KYENI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(322, 'C_014', 'S_064', 'WC_0001', 'KYENI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(323, 'C_014', 'S_065', 'WC_0001', 'MWEA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(324, 'C_014', 'S_065', 'WC_0001', 'MAKIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(325, 'C_014', 'S_065', 'WC_0001', 'MBETI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(326, 'C_014', 'S_065', 'WC_0001', 'MAVURIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(327, 'C_014', 'S_065', 'WC_0001', 'KIAMBERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(328, 'C_014', 'S_066', 'WC_0001', 'NTHAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(329, 'C_014', 'S_066', 'WC_0001', 'MUMINJI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(330, 'C_014', 'S_066', 'WC_0001', 'EVURORE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(331, 'C_015', 'S_067', 'WC_0001', 'NGOMENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(332, 'C_015', 'S_067', 'WC_0001', 'KYUSO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(333, 'C_015', 'S_067', 'WC_0001', 'MUMONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(334, 'C_015', 'S_067', 'WC_0001', 'TSEIKURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(335, 'C_015', 'S_067', 'WC_0001', 'THARAKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(336, 'C_015', 'S_068', 'WC_0001', 'KYOME/THAANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(337, 'C_015', 'S_068', 'WC_0001', 'NGUUTANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(338, 'C_015', 'S_068', 'WC_0001', 'MIGWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(339, 'C_015', 'S_068', 'WC_0001', 'KIOMO/KYETHANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(340, 'C_015', 'S_069', 'WC_0001', 'CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(341, 'C_015', 'S_069', 'WC_0001', 'KIVOU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(342, 'C_015', 'S_069', 'WC_0001', 'NGUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(343, 'C_015', 'S_069', 'WC_0001', 'NUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(344, 'C_015', 'S_069', 'WC_0001', 'MUI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(345, 'C_015', 'S_069', 'WC_0001', 'WAITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(346, 'C_015', 'S_070', 'WC_0001', 'MUTONGUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(347, 'C_015', 'S_070', 'WC_0001', 'KAUWI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(348, 'C_015', 'S_070', 'WC_0001', 'MATINYANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(349, 'C_015', 'S_070', 'WC_0001', 'KWA MUTONGA/KITHUMULA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(350, 'C_015', 'S_071', 'WC_0001', 'KISASI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(351, 'C_015', 'S_071', 'WC_0001', 'MBITINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(352, 'C_015', 'S_071', 'WC_0001', 'KWAVONZA/YATTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(353, 'C_015', 'S_071', 'WC_0001', 'KANYANGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(354, 'C_015', 'S_072', 'WC_0001', 'MIAMBANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(355, 'C_015', 'S_072', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(356, 'C_015', 'S_072', 'WC_0001', 'KYANGWITHYA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(357, 'C_015', 'S_072', 'WC_0001', 'MULANGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(358, 'C_015', 'S_072', 'WC_0001', 'KYANGWITHYA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(359, 'C_015', 'S_073', 'WC_0001', 'ZOMBE/MWITIKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(360, 'C_015', 'S_073', 'WC_0001', 'NZAMBANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(361, 'C_015', 'S_073', 'WC_0001', 'CHULUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(362, 'C_015', 'S_073', 'WC_0001', 'VOO/KYAMATU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(363, 'C_015', 'S_073', 'WC_0001', 'ENDAU/MALALANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(364, 'C_015', 'S_073', 'WC_0001', 'MUTITO/KALIKU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(365, 'C_015', 'S_074', 'WC_0001', 'IKANGA/KYATUNE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(366, 'C_015', 'S_074', 'WC_0001', 'MUTOMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(367, 'C_015', 'S_074', 'WC_0001', 'MUTHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(368, 'C_015', 'S_074', 'WC_0001', 'IKUTHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(369, 'C_015', 'S_074', 'WC_0001', 'KANZIKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(370, 'C_015', 'S_074', 'WC_0001', 'ATHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(371, 'C_016', 'S_075', 'WC_0001', 'KIVAA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(372, 'C_016', 'S_075', 'WC_0001', 'MASINGA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(373, 'C_016', 'S_075', 'WC_0001', 'EKALAKALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(374, 'C_016', 'S_075', 'WC_0001', 'MUTHESYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(375, 'C_016', 'S_075', 'WC_0001', 'NDITHINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(376, 'C_016', 'S_076', 'WC_0001', 'NDALANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(377, 'C_016', 'S_076', 'WC_0001', 'MATUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(378, 'C_016', 'S_076', 'WC_0001', 'KITHIMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(379, 'C_016', 'S_076', 'WC_0001', 'IKOMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(380, 'C_016', 'S_076', 'WC_0001', 'KATANGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(381, 'C_016', 'S_077', 'WC_0001', 'KANGUNDO NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(382, 'C_016', 'S_077', 'WC_0001', 'KANGUNDO CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(383, 'C_016', 'S_077', 'WC_0001', 'KANGUNDO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(384, 'C_016', 'S_077', 'WC_0001', 'KANGUNDO WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(385, 'C_016', 'S_078', 'WC_0001', 'TALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(386, 'C_016', 'S_078', 'WC_0001', 'MATUNGULU NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(387, 'C_016', 'S_078', 'WC_0001', 'MATUNGULU EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(388, 'C_016', 'S_078', 'WC_0001', 'MATUNGULU WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(389, 'C_016', 'S_078', 'WC_0001', 'KYELENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(390, 'C_016', 'S_079', 'WC_0001', 'MITABONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(391, 'C_016', 'S_079', 'WC_0001', 'KATHIANI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(392, 'C_016', 'S_079', 'WC_0001', 'UPPER KAEWA/IVETI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(393, 'C_016', 'S_079', 'WC_0001', 'LOWER KAEWA/KAANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(394, 'C_016', 'S_080', 'WC_0001', 'ATHI RIVER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(395, 'C_016', 'S_080', 'WC_0001', 'KINANIE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(396, 'C_016', 'S_080', 'WC_0001', 'MUTHWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(397, 'C_016', 'S_080', 'WC_0001', 'SYOKIMAU/MULOLONGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(398, 'C_016', 'S_081', 'WC_0001', 'KALAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(399, 'C_016', 'S_081', 'WC_0001', 'MUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(400, 'C_016', 'S_081', 'WC_0001', 'MUTITUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(401, 'C_016', 'S_081', 'WC_0001', 'MACHAKOS CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(402, 'C_016', 'S_081', 'WC_0001', 'MUMBUNI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(403, 'C_016', 'S_081', 'WC_0001', 'MUVUTI/KIIMA-KIMWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(404, 'C_016', 'S_081', 'WC_0001', 'KOLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(405, 'C_016', 'S_082', 'WC_0001', 'MBIUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(406, 'C_016', 'S_082', 'WC_0001', 'MAKUTANO/ MWALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(407, 'C_016', 'S_082', 'WC_0001', 'MASII', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(408, 'C_016', 'S_082', 'WC_0001', 'MUTHETHENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(409, 'C_016', 'S_082', 'WC_0001', 'WAMUNYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(410, 'C_016', 'S_082', 'WC_0001', 'KIBAUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(411, 'C_017', 'S_083', 'WC_0001', 'TULIMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(412, 'C_017', 'S_083', 'WC_0001', 'MBOONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(413, 'C_017', 'S_083', 'WC_0001', 'KITHUNGO/KITUNDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(414, 'C_017', 'S_083', 'WC_0001', 'KITETA/KISAU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(415, 'C_017', 'S_083', 'WC_0001', 'WAIA-KAKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(416, 'C_017', 'S_083', 'WC_0001', 'KALAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(417, 'C_017', 'S_084', 'WC_0001', 'KASIKEU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(418, 'C_017', 'S_084', 'WC_0001', 'MUKAA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(419, 'C_017', 'S_084', 'WC_0001', 'KIIMA KIU/KALANZONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(420, 'C_017', 'S_085', 'WC_0001', 'UKIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(421, 'C_017', 'S_085', 'WC_0001', 'KEE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(422, 'C_017', 'S_085', 'WC_0001', 'KILUNGU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(423, 'C_017', 'S_085', 'WC_0001', 'ILIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(424, 'C_017', 'S_086', 'WC_0001', 'WOTE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(425, 'C_017', 'S_086', 'WC_0001', 'MUVAU/KIKUUMINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(426, 'C_017', 'S_086', 'WC_0001', 'MAVINDINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(427, 'C_017', 'S_086', 'WC_0001', 'KITISE/KITHUKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(428, 'C_017', 'S_086', 'WC_0001', 'KATHONZWENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(429, 'C_017', 'S_086', 'WC_0001', 'NZAUI/KILILI/KALAMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(430, 'C_017', 'S_086', 'WC_0001', 'MBITINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(431, 'C_017', 'S_087', 'WC_0001', 'MAKINDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(432, 'C_017', 'S_087', 'WC_0001', 'NGUUMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(433, 'C_017', 'S_087', 'WC_0001', 'KIKUMBULYU NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(434, 'C_017', 'S_087', 'WC_0001', 'KIKUMBULYU SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(435, 'C_017', 'S_087', 'WC_0001', 'NGUU/MASUMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(436, 'C_017', 'S_087', 'WC_0001', 'EMALI/MULALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(437, 'C_017', 'S_088', 'WC_0001', 'MASONGALENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(438, 'C_017', 'S_088', 'WC_0001', 'MTITO ANDEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(439, 'C_017', 'S_088', 'WC_0001', 'THANGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(440, 'C_017', 'S_088', 'WC_0001', 'IVINGONI/NZAMBANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(441, 'C_018', 'S_089', 'WC_0001', 'ENGINEER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(442, 'C_018', 'S_089', 'WC_0001', 'GATHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(443, 'C_018', 'S_089', 'WC_0001', 'NORTH KINANGOP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(444, 'C_018', 'S_089', 'WC_0001', 'MURUNGARU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(445, 'C_018', 'S_089', 'WC_0001', 'NJABINIKIBURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(446, 'C_018', 'S_089', 'WC_0001', 'NYAKIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(447, 'C_018', 'S_089', 'WC_0001', 'GITHABAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(448, 'C_018', 'S_089', 'WC_0001', 'MAGUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(449, 'C_018', 'S_090', 'WC_0001', 'WANJOHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(450, 'C_018', 'S_090', 'WC_0001', 'KIPIPIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(451, 'C_018', 'S_090', 'WC_0001', 'GETA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(452, 'C_018', 'S_090', 'WC_0001', 'GITHIORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(453, 'C_018', 'S_091', 'WC_0001', 'KARAU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(454, 'C_018', 'S_091', 'WC_0001', 'KANJUIRI RANGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(455, 'C_018', 'S_091', 'WC_0001', 'MIRANGINE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(456, 'C_018', 'S_091', 'WC_0001', 'KAIMBAGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(457, 'C_018', 'S_091', 'WC_0001', 'RURII', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(458, 'C_018', 'S_092', 'WC_0001', 'GATHANJI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(459, 'C_018', 'S_092', 'WC_0001', 'GATIMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(460, 'C_018', 'S_092', 'WC_0001', 'WERU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(461, 'C_018', 'S_092', 'WC_0001', 'CHARAGITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(462, 'C_018', 'S_093', 'WC_0001', 'LESHAU/PONDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(463, 'C_018', 'S_093', 'WC_0001', 'KIRIITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(464, 'C_018', 'S_093', 'WC_0001', 'CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(465, 'C_018', 'S_093', 'WC_0001', 'SHAMATA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(466, 'C_019', 'S_094', 'WC_0001', 'DEDAN KIMANTHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(467, 'C_019', 'S_094', 'WC_0001', 'WAMAGANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(468, 'C_019', 'S_094', 'WC_0001', 'AGUTHI-GAAKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(469, 'C_019', 'S_095', 'WC_0001', 'MWEIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(470, 'C_019', 'S_095', 'WC_0001', 'NAROMORU KIAMATHAGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(471, 'C_019', 'S_095', 'WC_0001', 'MWIYOGO/ENDARASHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(472, 'C_019', 'S_095', 'WC_0001', 'MUGUNDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(473, 'C_019', 'S_095', 'WC_0001', 'GATARAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(474, 'C_019', 'S_095', 'WC_0001', 'THEGU RIVER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(475, 'C_019', 'S_095', 'WC_0001', 'KABARU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(476, 'C_019', 'S_095', 'WC_0001', 'GAKAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(477, 'C_019', 'S_096', 'WC_0001', 'RUGURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(478, 'C_019', 'S_096', 'WC_0001', 'MAGUTU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(479, 'C_019', 'S_096', 'WC_0001', 'IRIAINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(480, 'C_019', 'S_096', 'WC_0001', 'KONYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(481, 'C_019', 'S_096', 'WC_0001', 'KIRIMUKUYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(482, 'C_019', 'S_096', 'WC_0001', 'KARATINA TOWN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(483, 'C_019', 'S_097', 'WC_0001', 'MAHIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(484, 'C_019', 'S_097', 'WC_0001', 'IRIA-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(485, 'C_019', 'S_097', 'WC_0001', 'CHINGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(486, 'C_019', 'S_097', 'WC_0001', 'KARIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(487, 'C_019', 'S_098', 'WC_0001', 'GIKONDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(488, 'C_019', 'S_098', 'WC_0001', 'RUGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(489, 'C_019', 'S_098', 'WC_0001', 'MUKURWE-INI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(490, 'C_019', 'S_098', 'WC_0001', 'MUKURWE-INI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(491, 'C_019', 'S_099', 'WC_0001', 'KIGANJO/MATHARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(492, 'C_019', 'S_099', 'WC_0001', 'RWARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(493, 'C_019', 'S_099', 'WC_0001', 'GATITU/MURUGURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(494, 'C_019', 'S_099', 'WC_0001', 'RURING\'U', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(495, 'C_019', 'S_099', 'WC_0001', 'KAMAKWA/MUKARO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(496, 'C_020', 'S_100', 'WC_0001', 'MUTITHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(497, 'C_020', 'S_100', 'WC_0001', 'KANGAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(498, 'C_020', 'S_100', 'WC_0001', 'THIBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(499, 'C_020', 'S_100', 'WC_0001', 'WAMUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(500, 'C_020', 'S_100', 'WC_0001', 'NYANGATI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(501, 'C_020', 'S_100', 'WC_0001', 'MURINDUKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(502, 'C_020', 'S_100', 'WC_0001', 'GATHIGIRIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(503, 'C_020', 'S_100', 'WC_0001', 'TEBERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(504, 'C_020', 'S_101', 'WC_0001', 'KABARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(505, 'C_020', 'S_101', 'WC_0001', 'BARAGWI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(506, 'C_020', 'S_101', 'WC_0001', 'NJUKIINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(507, 'C_020', 'S_101', 'WC_0001', 'NGARIAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(508, 'C_020', 'S_101', 'WC_0001', 'KARUMANDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(509, 'C_020', 'S_102', 'WC_0001', 'MUKURE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(510, 'C_020', 'S_102', 'WC_0001', 'KIINE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(511, 'C_020', 'S_102', 'WC_0001', 'KARITI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(512, 'C_020', 'S_103', 'WC_0001', 'MUTIRA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(513, 'C_020', 'S_103', 'WC_0001', 'KANYEKINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(514, 'C_020', 'S_103', 'WC_0001', 'KERUGOYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(515, 'C_020', 'S_103', 'WC_0001', 'INOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(516, 'C_021', 'S_104', 'WC_0001', 'KANYENYA-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(517, 'C_021', 'S_104', 'WC_0001', 'MUGURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(518, 'C_021', 'S_104', 'WC_0001', 'RWATHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(519, 'C_021', 'S_105', 'WC_0001', 'GITUGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(520, 'C_021', 'S_105', 'WC_0001', 'KIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(521, 'C_021', 'S_105', 'WC_0001', 'KAMACHARIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(522, 'C_021', 'S_106', 'WC_0001', 'WANGU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(523, 'C_021', 'S_106', 'WC_0001', 'MUGOIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(524, 'C_021', 'S_106', 'WC_0001', 'MBIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(525, 'C_021', 'S_106', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(526, 'C_021', 'S_106', 'WC_0001', 'MURARANDIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(527, 'C_021', 'S_106', 'WC_0001', 'GATURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(528, 'C_021', 'S_107', 'WC_0001', 'KAHUMBU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(529, 'C_021', 'S_107', 'WC_0001', 'MUTHITHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(530, 'C_021', 'S_107', 'WC_0001', 'KIGUMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(531, 'C_021', 'S_107', 'WC_0001', 'KANGARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(532, 'C_021', 'S_107', 'WC_0001', 'KINYONA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(533, 'C_021', 'S_108', 'WC_0001', 'KIMORORI/WEMPA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(534, 'C_021', 'S_108', 'WC_0001', 'MAKUYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(535, 'C_021', 'S_108', 'WC_0001', 'KAMBITI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(536, 'C_021', 'S_108', 'WC_0001', 'KAMAHUHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(537, 'C_021', 'S_108', 'WC_0001', 'ICHAGAKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(538, 'C_021', 'S_108', 'WC_0001', 'NGINDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(539, 'C_021', 'S_109', 'WC_0001', 'NG\'ARARIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(540, 'C_021', 'S_109', 'WC_0001', 'MURUKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59');
INSERT INTO `wards` (`id`, `county_code`, `sub_county_code`, `ward_code`, `name`, `created_at`, `updated_at`) VALUES
(541, 'C_021', 'S_109', 'WC_0001', 'KAGUNDU-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(542, 'C_021', 'S_109', 'WC_0001', 'GAICHANJIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(543, 'C_021', 'S_109', 'WC_0001', 'ITHIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(544, 'C_021', 'S_109', 'WC_0001', 'RUCHU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(545, 'C_021', 'S_110', 'WC_0001', 'ITHANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(546, 'C_021', 'S_110', 'WC_0001', 'KAKUZI/MITUBIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(547, 'C_021', 'S_110', 'WC_0001', 'MUGUMO-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(548, 'C_021', 'S_110', 'WC_0001', 'KIHUMBU-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(549, 'C_021', 'S_110', 'WC_0001', 'GATANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(550, 'C_021', 'S_110', 'WC_0001', 'KARIARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(551, 'C_022', 'S_111', 'WC_0001', 'KIAMWANGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(552, 'C_022', 'S_111', 'WC_0001', 'KIGANJO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(553, 'C_022', 'S_111', 'WC_0001', 'NDARUGU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(554, 'C_022', 'S_111', 'WC_0001', 'NGENDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(555, 'C_022', 'S_112', 'WC_0001', 'GITUAMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(556, 'C_022', 'S_112', 'WC_0001', 'GITHOBOKONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(557, 'C_022', 'S_112', 'WC_0001', 'CHANIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(558, 'C_022', 'S_112', 'WC_0001', 'MANG\'U', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(559, 'C_022', 'S_113', 'WC_0001', 'MURERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(560, 'C_022', 'S_113', 'WC_0001', 'THETA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(561, 'C_022', 'S_113', 'WC_0001', 'JUJA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(562, 'C_022', 'S_113', 'WC_0001', 'WITEITHIE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(563, 'C_022', 'S_113', 'WC_0001', 'KALIMONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(564, 'C_022', 'S_114', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(565, 'C_022', 'S_114', 'WC_0001', 'KAMENU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(566, 'C_022', 'S_114', 'WC_0001', 'HOSPITAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(567, 'C_022', 'S_114', 'WC_0001', 'GATUANYAGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(568, 'C_022', 'S_114', 'WC_0001', 'NGOLIBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(569, 'C_022', 'S_115', 'WC_0001', 'GITOTHUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(570, 'C_022', 'S_115', 'WC_0001', 'BIASHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(571, 'C_022', 'S_115', 'WC_0001', 'GATONGORA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(572, 'C_022', 'S_115', 'WC_0001', 'KAHAWA SUKARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(573, 'C_022', 'S_115', 'WC_0001', 'KAHAWA WENDANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(574, 'C_022', 'S_115', 'WC_0001', 'KIUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(575, 'C_022', 'S_115', 'WC_0001', 'MWIKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(576, 'C_022', 'S_115', 'WC_0001', 'MWIHOKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(577, 'C_022', 'S_116', 'WC_0001', 'GITHUNGURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(578, 'C_022', 'S_116', 'WC_0001', 'GITHIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(579, 'C_022', 'S_116', 'WC_0001', 'IKINU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(580, 'C_022', 'S_116', 'WC_0001', 'NGEWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(581, 'C_022', 'S_116', 'WC_0001', 'KOMOTHAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(582, 'C_022', 'S_117', 'WC_0001', 'TING\'ANG\'A', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(583, 'C_022', 'S_117', 'WC_0001', 'NDUMBERI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(584, 'C_022', 'S_117', 'WC_0001', 'RIABAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(585, 'C_022', 'S_117', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(586, 'C_022', 'S_118', 'WC_0001', 'CIANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(587, 'C_022', 'S_118', 'WC_0001', 'KARURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(588, 'C_022', 'S_118', 'WC_0001', 'NDENDERU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(589, 'C_022', 'S_118', 'WC_0001', 'MUCHATHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(590, 'C_022', 'S_118', 'WC_0001', 'KIHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(591, 'C_022', 'S_119', 'WC_0001', 'GITARU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(592, 'C_022', 'S_119', 'WC_0001', 'MUGUGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(593, 'C_022', 'S_119', 'WC_0001', 'NYADHUNA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(594, 'C_022', 'S_119', 'WC_0001', 'KABETE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(595, 'C_022', 'S_119', 'WC_0001', 'UTHIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(596, 'C_022', 'S_120', 'WC_0001', 'KARAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(597, 'C_022', 'S_120', 'WC_0001', 'NACHU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(598, 'C_022', 'S_120', 'WC_0001', 'SIGONA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(599, 'C_022', 'S_120', 'WC_0001', 'KIKUYU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(600, 'C_022', 'S_120', 'WC_0001', 'KINOO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(601, 'C_022', 'S_121', 'WC_0001', 'BIBIRIONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(602, 'C_022', 'S_121', 'WC_0001', 'LIMURU CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(603, 'C_022', 'S_121', 'WC_0001', 'NDEIYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(604, 'C_022', 'S_121', 'WC_0001', 'LIMURU EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(605, 'C_022', 'S_121', 'WC_0001', 'NGECHA TIGONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(606, 'C_022', 'S_122', 'WC_0001', 'KINALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(607, 'C_022', 'S_122', 'WC_0001', 'KIJABE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(608, 'C_022', 'S_122', 'WC_0001', 'NYANDUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(609, 'C_022', 'S_122', 'WC_0001', 'KAMBURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(610, 'C_022', 'S_122', 'WC_0001', 'LARI/KIRENGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(611, 'C_023', 'S_123', 'WC_0001', 'KAERIS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(612, 'C_023', 'S_123', 'WC_0001', 'LAKE ZONE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(613, 'C_023', 'S_123', 'WC_0001', 'LAPUR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(614, 'C_023', 'S_123', 'WC_0001', 'KAALENG/KAIKOR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(615, 'C_023', 'S_123', 'WC_0001', 'KIBISH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(616, 'C_023', 'S_123', 'WC_0001', 'NAKALALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(617, 'C_023', 'S_124', 'WC_0001', 'KAKUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(618, 'C_023', 'S_124', 'WC_0001', 'LOPUR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(619, 'C_023', 'S_124', 'WC_0001', 'LETEA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(620, 'C_023', 'S_124', 'WC_0001', 'SONGOT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(621, 'C_023', 'S_124', 'WC_0001', 'KALOBEYEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(622, 'C_023', 'S_124', 'WC_0001', 'LOKICHOGGIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(623, 'C_023', 'S_124', 'WC_0001', 'NANAAM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(624, 'C_023', 'S_125', 'WC_0001', 'KERIO DELTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(625, 'C_023', 'S_125', 'WC_0001', 'KANG\'ATOTHA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(626, 'C_023', 'S_125', 'WC_0001', 'KALOKOL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(627, 'C_023', 'S_125', 'WC_0001', 'LODWAR TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(628, 'C_023', 'S_125', 'WC_0001', 'KANAMKEMER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(629, 'C_023', 'S_126', 'WC_0001', 'KOTARUK/LOBEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(630, 'C_023', 'S_126', 'WC_0001', 'TURKWEL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(631, 'C_023', 'S_126', 'WC_0001', 'LOIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(632, 'C_023', 'S_126', 'WC_0001', 'LOKIRIAMA/LORENGIPPI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(633, 'C_023', 'S_127', 'WC_0001', 'KAPUTIR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(634, 'C_023', 'S_127', 'WC_0001', 'KATILU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(635, 'C_023', 'S_127', 'WC_0001', 'LOBOKAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(636, 'C_023', 'S_127', 'WC_0001', 'KALAPATA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(637, 'C_023', 'S_127', 'WC_0001', 'LOKICHAR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(638, 'C_023', 'S_128', 'WC_0001', 'KAPEDO/NAPEITOM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(639, 'C_023', 'S_128', 'WC_0001', 'KATILIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(640, 'C_023', 'S_128', 'WC_0001', 'LOKORI/KOCHODIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(641, 'C_024', 'S_129', 'WC_0001', 'RIWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(642, 'C_024', 'S_129', 'WC_0001', 'KAPENGURIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(643, 'C_024', 'S_129', 'WC_0001', 'MNAGEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(644, 'C_024', 'S_129', 'WC_0001', 'SIYOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(645, 'C_024', 'S_129', 'WC_0001', 'ENDUGH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(646, 'C_024', 'S_129', 'WC_0001', 'SOOK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(647, 'C_024', 'S_130', 'WC_0001', 'SEKERR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(648, 'C_024', 'S_130', 'WC_0001', 'MASOOL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(649, 'C_024', 'S_130', 'WC_0001', 'LOMUT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(650, 'C_024', 'S_130', 'WC_0001', 'WEIWEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(651, 'C_024', 'S_131', 'WC_0001', 'SUAM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(652, 'C_024', 'S_131', 'WC_0001', 'KODICH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(653, 'C_024', 'S_131', 'WC_0001', 'KASEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(654, 'C_024', 'S_131', 'WC_0001', 'KAPCHOK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(655, 'C_024', 'S_131', 'WC_0001', 'KIWAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(656, 'C_024', 'S_131', 'WC_0001', 'ALALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(657, 'C_024', 'S_132', 'WC_0001', 'CHEPARERIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(658, 'C_024', 'S_132', 'WC_0001', 'BATEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(659, 'C_024', 'S_132', 'WC_0001', 'LELAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(660, 'C_024', 'S_132', 'WC_0001', 'TAPACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(661, 'C_025', 'S_133', 'WC_0001', 'LODOKEJEK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(662, 'C_025', 'S_133', 'WC_0001', 'SUGUTA MARMAR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(663, 'C_025', 'S_133', 'WC_0001', 'MARALAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(664, 'C_025', 'S_133', 'WC_0001', 'LOOSUK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(665, 'C_025', 'S_133', 'WC_0001', 'PORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(666, 'C_025', 'S_134', 'WC_0001', 'EL-BARTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(667, 'C_025', 'S_134', 'WC_0001', 'NACHOLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(668, 'C_025', 'S_134', 'WC_0001', 'NDOTO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(669, 'C_025', 'S_134', 'WC_0001', 'NYIRO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(670, 'C_025', 'S_134', 'WC_0001', 'ANGATA NANYOKIE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(671, 'C_025', 'S_134', 'WC_0001', 'BAAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(672, 'C_025', 'S_135', 'WC_0001', 'WASO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(673, 'C_025', 'S_135', 'WC_0001', 'WAMBA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(674, 'C_025', 'S_135', 'WC_0001', 'WAMBA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(675, 'C_025', 'S_135', 'WC_0001', 'WAMBA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(676, 'C_026', 'S_136', 'WC_0001', 'KAPOMBOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(677, 'C_026', 'S_136', 'WC_0001', 'KWANZA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(678, 'C_026', 'S_136', 'WC_0001', 'KEIYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(679, 'C_026', 'S_136', 'WC_0001', 'BIDII', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(680, 'C_026', 'S_137', 'WC_0001', 'CHEPCHOINA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(681, 'C_026', 'S_137', 'WC_0001', 'ENDEBESS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(682, 'C_026', 'S_137', 'WC_0001', 'MATUMBEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(683, 'C_026', 'S_138', 'WC_0001', 'KINYORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(684, 'C_026', 'S_138', 'WC_0001', 'MATISI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(685, 'C_026', 'S_138', 'WC_0001', 'TUWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(686, 'C_026', 'S_138', 'WC_0001', 'SABOTI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(687, 'C_026', 'S_138', 'WC_0001', 'MACHEWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(688, 'C_026', 'S_139', 'WC_0001', 'KIMININI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(689, 'C_026', 'S_139', 'WC_0001', 'WAITALUK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(690, 'C_026', 'S_139', 'WC_0001', 'SIRENDE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(691, 'C_026', 'S_139', 'WC_0001', 'HOSPITAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(692, 'C_026', 'S_139', 'WC_0001', 'SIKHENDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(693, 'C_026', 'S_139', 'WC_0001', 'NABISWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(694, 'C_026', 'S_140', 'WC_0001', 'SINYERERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(695, 'C_026', 'S_140', 'WC_0001', 'MAKUTANO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(696, 'C_026', 'S_140', 'WC_0001', 'KAPLAMAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(697, 'C_026', 'S_140', 'WC_0001', 'MOTOSIET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(698, 'C_026', 'S_140', 'WC_0001', 'CHERANGANY/SUWERWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(699, 'C_026', 'S_140', 'WC_0001', 'CHEPSIRO/KIPTOROR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(700, 'C_026', 'S_140', 'WC_0001', 'SITATUNGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(701, 'C_027', 'S_141', 'WC_0001', 'MOI\'S BRIDGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(702, 'C_027', 'S_141', 'WC_0001', 'KAPKURES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(703, 'C_027', 'S_141', 'WC_0001', 'ZIWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(704, 'C_027', 'S_141', 'WC_0001', 'SEGERO/BARSOMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(705, 'C_027', 'S_141', 'WC_0001', 'KIPSOMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(706, 'C_027', 'S_141', 'WC_0001', 'SOY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(707, 'C_027', 'S_141', 'WC_0001', 'KUINET/KAPSUSWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(708, 'C_027', 'S_142', 'WC_0001', 'NGENYILEL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(709, 'C_027', 'S_142', 'WC_0001', 'TAPSAGOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(710, 'C_027', 'S_142', 'WC_0001', 'KAMAGUT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(711, 'C_027', 'S_142', 'WC_0001', 'KIPLOMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(712, 'C_027', 'S_142', 'WC_0001', 'KAPSAOS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(713, 'C_027', 'S_142', 'WC_0001', 'HURUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(714, 'C_027', 'S_143', 'WC_0001', 'TEMBELIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(715, 'C_027', 'S_143', 'WC_0001', 'SERGOIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(716, 'C_027', 'S_143', 'WC_0001', 'KARUNA/MEIBEKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(717, 'C_027', 'S_143', 'WC_0001', 'MOIBEN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(718, 'C_027', 'S_143', 'WC_0001', 'KIMUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(719, 'C_027', 'S_144', 'WC_0001', 'KAPSOYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(720, 'C_027', 'S_144', 'WC_0001', 'KAPTAGAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(721, 'C_027', 'S_144', 'WC_0001', 'AINABKOI/OLARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(722, 'C_027', 'S_145', 'WC_0001', 'SIMAT/KAPSERET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(723, 'C_027', 'S_145', 'WC_0001', 'KIPKENYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(724, 'C_027', 'S_145', 'WC_0001', 'NGERIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(725, 'C_027', 'S_145', 'WC_0001', 'MEGUN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(726, 'C_027', 'S_145', 'WC_0001', 'LANGAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(727, 'C_027', 'S_146', 'WC_0001', 'RACECOURSE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(728, 'C_027', 'S_146', 'WC_0001', 'CHEPTIRET/KIPCHAMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(729, 'C_027', 'S_146', 'WC_0001', 'TULWET/CHUIYAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(730, 'C_027', 'S_146', 'WC_0001', 'TARAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(731, 'C_028', 'S_147', 'WC_0001', 'KAPYEGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(732, 'C_028', 'S_147', 'WC_0001', 'SAMBIRIR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(733, 'C_028', 'S_147', 'WC_0001', 'ENDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(734, 'C_028', 'S_147', 'WC_0001', 'EMBOBUT / EMBULOT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(735, 'C_028', 'S_148', 'WC_0001', 'LELAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(736, 'C_028', 'S_148', 'WC_0001', 'SENGWER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(737, 'C_028', 'S_148', 'WC_0001', 'CHERANG\'ANY/CHEBORORWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(738, 'C_028', 'S_148', 'WC_0001', 'MOIBEN/KUSERWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(739, 'C_028', 'S_148', 'WC_0001', 'KAPSOWAR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(740, 'C_028', 'S_148', 'WC_0001', 'ARROR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(741, 'C_028', 'S_149', 'WC_0001', 'EMSOO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(742, 'C_028', 'S_149', 'WC_0001', 'KAMARINY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(743, 'C_028', 'S_149', 'WC_0001', 'KAPCHEMUTWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(744, 'C_028', 'S_149', 'WC_0001', 'TAMBACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(745, 'C_028', 'S_150', 'WC_0001', 'KAPTARAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(746, 'C_028', 'S_150', 'WC_0001', 'CHEPKORIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(747, 'C_028', 'S_150', 'WC_0001', 'SOY NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(748, 'C_028', 'S_150', 'WC_0001', 'SOY SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(749, 'C_028', 'S_150', 'WC_0001', 'KABIEMIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(750, 'C_028', 'S_150', 'WC_0001', 'METKEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(751, 'C_029', 'S_151', 'WC_0001', 'SONGHOR/SOBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(752, 'C_029', 'S_151', 'WC_0001', 'TINDIRET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(753, 'C_029', 'S_151', 'WC_0001', 'CHEMELIL/CHEMASE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(754, 'C_029', 'S_151', 'WC_0001', 'KAPSIMOTWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(755, 'C_029', 'S_152', 'WC_0001', 'KABWARENG', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(756, 'C_029', 'S_152', 'WC_0001', 'TERIK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(757, 'C_029', 'S_152', 'WC_0001', 'KEMELOI-MARABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(758, 'C_029', 'S_152', 'WC_0001', 'KOBUJOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(759, 'C_029', 'S_152', 'WC_0001', 'KAPTUMO-KABOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(760, 'C_029', 'S_152', 'WC_0001', 'KOYO-NDURIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(761, 'C_029', 'S_153', 'WC_0001', 'NANDI HILLS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(762, 'C_029', 'S_153', 'WC_0001', 'CHEPKUNYUK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(763, 'C_029', 'S_153', 'WC_0001', 'OL\'LESSOS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(764, 'C_029', 'S_153', 'WC_0001', 'KAPCHORUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(765, 'C_029', 'S_154', 'WC_0001', 'CHEMUNDU/KAPNG\'ETUNY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(766, 'C_029', 'S_154', 'WC_0001', 'KOSIRAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(767, 'C_029', 'S_154', 'WC_0001', 'LELMOKWO/NGECHEK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(768, 'C_029', 'S_154', 'WC_0001', 'KAPTEL/KAMOIYWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(769, 'C_029', 'S_154', 'WC_0001', 'KIPTUYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(770, 'C_029', 'S_155', 'WC_0001', 'CHEPKUMIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(771, 'C_029', 'S_155', 'WC_0001', 'KAPKANGANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(772, 'C_029', 'S_155', 'WC_0001', 'KAPSABET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(773, 'C_029', 'S_155', 'WC_0001', 'KILIBWONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(774, 'C_029', 'S_156', 'WC_0001', 'CHEPTERWAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(775, 'C_029', 'S_156', 'WC_0001', 'KIPKAREN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(776, 'C_029', 'S_156', 'WC_0001', 'KURGUNG/SURUNGAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(777, 'C_029', 'S_156', 'WC_0001', 'KABIYET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(778, 'C_029', 'S_156', 'WC_0001', 'NDALAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(779, 'C_029', 'S_156', 'WC_0001', 'KABISAGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(780, 'C_029', 'S_156', 'WC_0001', 'SANGALO/KEBULONIK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(781, 'C_030', 'S_157', 'WC_0001', 'TIRIOKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(782, 'C_030', 'S_157', 'WC_0001', 'KOLOWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(783, 'C_030', 'S_157', 'WC_0001', 'RIBKWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(784, 'C_030', 'S_157', 'WC_0001', 'SILALE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(785, 'C_030', 'S_157', 'WC_0001', 'LOIYAMOROCK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(786, 'C_030', 'S_157', 'WC_0001', 'TANGULBEI/KOROSSI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(787, 'C_030', 'S_157', 'WC_0001', 'CHURO/AMAYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(788, 'C_030', 'S_158', 'WC_0001', 'BARWESSA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(789, 'C_030', 'S_158', 'WC_0001', 'KABARTONJO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(790, 'C_030', 'S_158', 'WC_0001', 'SAIMO/KIPSARAMAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(791, 'C_030', 'S_158', 'WC_0001', 'SAIMO/SOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(792, 'C_030', 'S_158', 'WC_0001', 'BARTABWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(793, 'C_030', 'S_159', 'WC_0001', 'KABARNET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(794, 'C_030', 'S_159', 'WC_0001', 'SACHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(795, 'C_030', 'S_159', 'WC_0001', 'TENGES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(796, 'C_030', 'S_159', 'WC_0001', 'EWALEL/CHAPCHAP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(797, 'C_030', 'S_159', 'WC_0001', 'KAPROPITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(798, 'C_030', 'S_160', 'WC_0001', 'MARIGAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(799, 'C_030', 'S_160', 'WC_0001', 'ILCHAMUS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(800, 'C_030', 'S_160', 'WC_0001', 'MOCHONGOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(801, 'C_030', 'S_160', 'WC_0001', 'MUKUTANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(802, 'C_030', 'S_161', 'WC_0001', 'MOGOTIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(803, 'C_030', 'S_161', 'WC_0001', 'EMINING', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(804, 'C_030', 'S_161', 'WC_0001', 'KISANANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(805, 'C_030', 'S_162', 'WC_0001', 'LEMBUS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(806, 'C_030', 'S_162', 'WC_0001', 'LEMBUS KWEN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(807, 'C_030', 'S_162', 'WC_0001', 'RAVINE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(808, 'C_030', 'S_162', 'WC_0001', 'MUMBERES/MAJI MAZURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(809, 'C_030', 'S_162', 'WC_0001', 'LEMBUS/PERKERRA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(810, 'C_030', 'S_162', 'WC_0001', 'KOIBATEK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(811, 'C_031', 'S_163', 'WC_0001', 'OL-MORAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(812, 'C_031', 'S_163', 'WC_0001', 'RUMURUTI TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(813, 'C_031', 'S_163', 'WC_0001', 'GITHIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(814, 'C_031', 'S_163', 'WC_0001', 'MARMANET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(815, 'C_031', 'S_163', 'WC_0001', 'IGWAMITI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(816, 'C_031', 'S_163', 'WC_0001', 'SALAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(817, 'C_031', 'S_164', 'WC_0001', 'NGOBIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(818, 'C_031', 'S_164', 'WC_0001', 'TIGITHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(819, 'C_031', 'S_164', 'WC_0001', 'THINGITHU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(820, 'C_031', 'S_164', 'WC_0001', 'NANYUKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(821, 'C_031', 'S_164', 'WC_0001', 'UMANDE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(822, 'C_031', 'S_165', 'WC_0001', 'SOSIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(823, 'C_031', 'S_165', 'WC_0001', 'SEGERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(824, 'C_031', 'S_165', 'WC_0001', 'MUGOGODO WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(825, 'C_031', 'S_165', 'WC_0001', 'MUGOGODO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(826, 'C_032', 'S_166', 'WC_0001', 'MARIASHONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(827, 'C_032', 'S_166', 'WC_0001', 'ELBURGON', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(828, 'C_032', 'S_166', 'WC_0001', 'TURI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(829, 'C_032', 'S_166', 'WC_0001', 'MOLO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(830, 'C_032', 'S_167', 'WC_0001', 'MAU NAROK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(831, 'C_032', 'S_167', 'WC_0001', 'MAUCHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(832, 'C_032', 'S_167', 'WC_0001', 'KIHINGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(833, 'C_032', 'S_167', 'WC_0001', 'NESSUIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(834, 'C_032', 'S_167', 'WC_0001', 'LARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(835, 'C_032', 'S_167', 'WC_0001', 'NJORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(836, 'C_032', 'S_168', 'WC_0001', 'BIASHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(837, 'C_032', 'S_168', 'WC_0001', 'HELLS GATE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(838, 'C_032', 'S_168', 'WC_0001', 'LAKE VIEW', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(839, 'C_032', 'S_168', 'WC_0001', 'MAI MAHIU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(840, 'C_032', 'S_168', 'WC_0001', 'MAIELLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(841, 'C_032', 'S_168', 'WC_0001', 'OLKARIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(842, 'C_032', 'S_168', 'WC_0001', 'NAIVASHA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(843, 'C_032', 'S_168', 'WC_0001', 'VIWANDANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(844, 'C_032', 'S_169', 'WC_0001', 'GILGIL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(845, 'C_032', 'S_169', 'WC_0001', 'ELEMENTAITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(846, 'C_032', 'S_169', 'WC_0001', 'MBARUK/EBURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(847, 'C_032', 'S_169', 'WC_0001', 'MALEWA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(848, 'C_032', 'S_169', 'WC_0001', 'MURINDATI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(849, 'C_032', 'S_170', 'WC_0001', 'AMALO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(850, 'C_032', 'S_170', 'WC_0001', 'KERINGET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(851, 'C_032', 'S_170', 'WC_0001', 'KIPTAGICH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(852, 'C_032', 'S_170', 'WC_0001', 'TINET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(853, 'C_032', 'S_171', 'WC_0001', 'KIPTORORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(854, 'C_032', 'S_171', 'WC_0001', 'NYOTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(855, 'C_032', 'S_171', 'WC_0001', 'SIRIKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(856, 'C_032', 'S_171', 'WC_0001', 'KAMARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(857, 'C_032', 'S_172', 'WC_0001', 'SUBUKIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(858, 'C_032', 'S_172', 'WC_0001', 'WASEGES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(859, 'C_032', 'S_172', 'WC_0001', 'KABAZI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(860, 'C_032', 'S_173', 'WC_0001', 'MENENGAI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(861, 'C_032', 'S_173', 'WC_0001', 'SOIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(862, 'C_032', 'S_173', 'WC_0001', 'VISOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(863, 'C_032', 'S_173', 'WC_0001', 'MOSOP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(864, 'C_032', 'S_173', 'WC_0001', 'SOLAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(865, 'C_032', 'S_174', 'WC_0001', 'DUNDORI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(866, 'C_032', 'S_174', 'WC_0001', 'KABATINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(867, 'C_032', 'S_174', 'WC_0001', 'KIAMAINA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(868, 'C_032', 'S_174', 'WC_0001', 'LANET/UMOJA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(869, 'C_032', 'S_174', 'WC_0001', 'BAHATI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(870, 'C_032', 'S_175', 'WC_0001', 'BARUT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(871, 'C_032', 'S_175', 'WC_0001', 'LONDON', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(872, 'C_032', 'S_175', 'WC_0001', 'KAPTEMBWO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(873, 'C_032', 'S_175', 'WC_0001', 'KAPKURES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(874, 'C_032', 'S_175', 'WC_0001', 'RHODA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(875, 'C_032', 'S_175', 'WC_0001', 'SHAABAB', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(876, 'C_032', 'S_176', 'WC_0001', 'BIASHARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(877, 'C_032', 'S_176', 'WC_0001', 'KIVUMBINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(878, 'C_032', 'S_176', 'WC_0001', 'FLAMINGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(879, 'C_032', 'S_176', 'WC_0001', 'MENENGAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(880, 'C_032', 'S_176', 'WC_0001', 'NAKURU EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(881, 'C_033', 'S_177', 'WC_0001', 'KILGORIS CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(882, 'C_033', 'S_177', 'WC_0001', 'KEYIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(883, 'C_033', 'S_177', 'WC_0001', 'ANGATA BARIKOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(884, 'C_033', 'S_177', 'WC_0001', 'SHANKOE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(885, 'C_033', 'S_177', 'WC_0001', 'KIMINTET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(886, 'C_033', 'S_177', 'WC_0001', 'LOLGORIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(887, 'C_033', 'S_178', 'WC_0001', 'ILKERIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(888, 'C_033', 'S_178', 'WC_0001', 'OLOlMASANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(889, 'C_033', 'S_178', 'WC_0001', 'MOGONDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(890, 'C_033', 'S_178', 'WC_0001', 'KAPSASIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(891, 'C_033', 'S_179', 'WC_0001', 'OLPUSIMORU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(892, 'C_033', 'S_179', 'WC_0001', 'OLOKURTO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(893, 'C_033', 'S_179', 'WC_0001', 'NAROK TOWN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(894, 'C_033', 'S_179', 'WC_0001', 'NKARETA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(895, 'C_033', 'S_179', 'WC_0001', 'OLORROPIL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(896, 'C_033', 'S_179', 'WC_0001', 'MELILI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(897, 'C_033', 'S_180', 'WC_0001', 'MOSIRO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(898, 'C_033', 'S_180', 'WC_0001', 'ILDAMAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(899, 'C_033', 'S_180', 'WC_0001', 'KEEKONYOKIE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(900, 'C_033', 'S_180', 'WC_0001', 'SUSWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(901, 'C_033', 'S_181', 'WC_0001', 'MAJIMOTO/NAROOSURA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(902, 'C_033', 'S_181', 'WC_0001', 'OLOLULUNG\'A', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(903, 'C_033', 'S_181', 'WC_0001', 'MELELO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(904, 'C_033', 'S_181', 'WC_0001', 'LOITA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(905, 'C_033', 'S_181', 'WC_0001', 'SOGOO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(906, 'C_033', 'S_181', 'WC_0001', 'SAGAMIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(907, 'C_033', 'S_182', 'WC_0001', 'ILMOTIOK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(908, 'C_033', 'S_182', 'WC_0001', 'MARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(909, 'C_033', 'S_182', 'WC_0001', 'SIANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(910, 'C_033', 'S_182', 'WC_0001', 'NAIKARRA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(911, 'C_034', 'S_183', 'WC_0001', 'OLKERI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(912, 'C_034', 'S_183', 'WC_0001', 'ONGATA RONGAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(913, 'C_034', 'S_183', 'WC_0001', 'NKAIMURUNYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(914, 'C_034', 'S_183', 'WC_0001', 'OLOOLUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(915, 'C_034', 'S_183', 'WC_0001', 'NGONG', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(916, 'C_034', 'S_184', 'WC_0001', 'PURKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(917, 'C_034', 'S_184', 'WC_0001', 'ILDAMAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(918, 'C_034', 'S_184', 'WC_0001', 'DALALEKUTUK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(919, 'C_034', 'S_184', 'WC_0001', 'MATAPATO NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(920, 'C_034', 'S_184', 'WC_0001', 'MATAPATO SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(921, 'C_034', 'S_185', 'WC_0001', 'KAPUTIEI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(922, 'C_034', 'S_185', 'WC_0001', 'KITENGELA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(923, 'C_034', 'S_185', 'WC_0001', 'OLOOSIRKON/SHOLINKE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(924, 'C_034', 'S_185', 'WC_0001', 'KENYAWA-POKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(925, 'C_034', 'S_185', 'WC_0001', 'IMARORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(926, 'C_034', 'S_186', 'WC_0001', 'KEEKONYOKIE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(927, 'C_034', 'S_186', 'WC_0001', 'ILOODOKILANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(928, 'C_034', 'S_186', 'WC_0001', 'MAGADI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(929, 'C_034', 'S_186', 'WC_0001', 'EWUASO OoNKIDONG\'I', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(930, 'C_034', 'S_186', 'WC_0001', 'MOSIRO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(931, 'C_034', 'S_187', 'WC_0001', 'ENTONET/LENKISIM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(932, 'C_034', 'S_187', 'WC_0001', 'MBIRIKANI/ESELENKEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(933, 'C_034', 'S_187', 'WC_0001', 'KUKU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(934, 'C_034', 'S_187', 'WC_0001', 'ROMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(935, 'C_034', 'S_187', 'WC_0001', 'KIMANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(936, 'C_035', 'S_188', 'WC_0001', 'LONDIANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(937, 'C_035', 'S_188', 'WC_0001', 'KEDOWA/KIMUGUL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(938, 'C_035', 'S_188', 'WC_0001', 'CHEPSEON', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(939, 'C_035', 'S_188', 'WC_0001', 'TENDENO/SORGET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(940, 'C_035', 'S_189', 'WC_0001', 'KUNYAK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(941, 'C_035', 'S_189', 'WC_0001', 'KAMASIAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(942, 'C_035', 'S_189', 'WC_0001', 'KIPKELION', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(943, 'C_035', 'S_189', 'WC_0001', 'CHILCHILA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(944, 'C_035', 'S_190', 'WC_0001', 'KAPSOIT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(945, 'C_035', 'S_190', 'WC_0001', 'AINAMOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(946, 'C_035', 'S_190', 'WC_0001', 'KAPKUGERWET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(947, 'C_035', 'S_190', 'WC_0001', 'KIPCHEBOR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(948, 'C_035', 'S_190', 'WC_0001', 'KIPCHIMCHIM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(949, 'C_035', 'S_190', 'WC_0001', 'KAPSAOS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(950, 'C_035', 'S_191', 'WC_0001', 'KISIARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(951, 'C_035', 'S_191', 'WC_0001', 'TEBESONIK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(952, 'C_035', 'S_191', 'WC_0001', 'CHEBOIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(953, 'C_035', 'S_191', 'WC_0001', 'CHEMOSOT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(954, 'C_035', 'S_191', 'WC_0001', 'LITEIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(955, 'C_035', 'S_191', 'WC_0001', 'CHEPLANGET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(956, 'C_035', 'S_191', 'WC_0001', 'KAPKATET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(957, 'C_035', 'S_192', 'WC_0001', 'WALDAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(958, 'C_035', 'S_192', 'WC_0001', 'KABIANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(959, 'C_035', 'S_192', 'WC_0001', 'CHEPTORORIET/SERETUT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(960, 'C_035', 'S_192', 'WC_0001', 'CHAIK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(961, 'C_035', 'S_192', 'WC_0001', 'KAPSUSER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(962, 'C_035', 'S_193', 'WC_0001', 'SIGOWET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(963, 'C_035', 'S_193', 'WC_0001', 'KAPLELARTET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(964, 'C_035', 'S_193', 'WC_0001', 'SOLIAT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(965, 'C_035', 'S_193', 'WC_0001', 'SOIN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(966, 'C_036', 'S_194', 'WC_0001', 'NDANAI/ABOSI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(967, 'C_036', 'S_194', 'WC_0001', 'CHEMAGEL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(968, 'C_036', 'S_194', 'WC_0001', 'KIPSONOI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(969, 'C_036', 'S_194', 'WC_0001', 'KAPLETUNDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(970, 'C_036', 'S_194', 'WC_0001', 'RONGENA/MANARET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(971, 'C_036', 'S_195', 'WC_0001', 'KONG\'ASIS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(972, 'C_036', 'S_195', 'WC_0001', 'NYANGORES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(973, 'C_036', 'S_195', 'WC_0001', 'SIGOR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(974, 'C_036', 'S_195', 'WC_0001', 'CHEBUNYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(975, 'C_036', 'S_195', 'WC_0001', 'SIONGIROI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(976, 'C_036', 'S_196', 'WC_0001', 'MERIGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(977, 'C_036', 'S_196', 'WC_0001', 'KEMBU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(978, 'C_036', 'S_196', 'WC_0001', 'LONGISA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(979, 'C_036', 'S_196', 'WC_0001', 'KIPRERES', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(980, 'C_036', 'S_196', 'WC_0001', 'CHEMANER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(981, 'C_036', 'S_197', 'WC_0001', 'SILIBWET TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(982, 'C_036', 'S_197', 'WC_0001', 'NDARAWETA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(983, 'C_036', 'S_197', 'WC_0001', 'SINGORWET', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(984, 'C_036', 'S_197', 'WC_0001', 'CHESOEN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(985, 'C_036', 'S_197', 'WC_0001', 'MUTARAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(986, 'C_036', 'S_198', 'WC_0001', 'CHEPCHABAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(987, 'C_036', 'S_198', 'WC_0001', 'KIMULOT', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(988, 'C_036', 'S_198', 'WC_0001', 'MOGOGOSIEK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(989, 'C_036', 'S_198', 'WC_0001', 'BOITO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(990, 'C_036', 'S_198', 'WC_0001', 'EMBOMOS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(991, 'C_037', 'S_199', 'WC_0001', 'MAUTUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(992, 'C_037', 'S_199', 'WC_0001', 'LUGARI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(993, 'C_037', 'S_199', 'WC_0001', 'LUMAKANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(994, 'C_037', 'S_199', 'WC_0001', 'CHEKALINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(995, 'C_037', 'S_199', 'WC_0001', 'CHEVAYWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(996, 'C_037', 'S_199', 'WC_0001', 'LWANDETI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(997, 'C_037', 'S_200', 'WC_0001', 'LIKUYANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(998, 'C_037', 'S_200', 'WC_0001', 'SANGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(999, 'C_037', 'S_200', 'WC_0001', 'KONGONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1000, 'C_037', 'S_200', 'WC_0001', 'NZOIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1001, 'C_037', 'S_200', 'WC_0001', 'SINOKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1002, 'C_037', 'S_201', 'WC_0001', 'WEST KABRAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1003, 'C_037', 'S_201', 'WC_0001', 'CHEMUCHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1004, 'C_037', 'S_201', 'WC_0001', 'EAST KABRAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1005, 'C_037', 'S_201', 'WC_0001', 'BUTALI/CHEGULO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1006, 'C_037', 'S_201', 'WC_0001', 'MANDA-SHIVANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1007, 'C_037', 'S_201', 'WC_0001', 'SHIRUGU-MUGAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1008, 'C_037', 'S_201', 'WC_0001', 'SOUTH KABRAS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1009, 'C_037', 'S_202', 'WC_0001', 'BUTSOTSO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1010, 'C_037', 'S_202', 'WC_0001', 'BUTSOTSO SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1011, 'C_037', 'S_202', 'WC_0001', 'BUTSOTSO CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1012, 'C_037', 'S_202', 'WC_0001', 'SHEYWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1013, 'C_037', 'S_202', 'WC_0001', 'MAHIAKALO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1014, 'C_037', 'S_202', 'WC_0001', 'SHIRERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1015, 'C_037', 'S_203', 'WC_0001', 'INGOSTSE-MATHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1016, 'C_037', 'S_203', 'WC_0001', 'SHINOYI-SHIKOMARI-ESUMEYIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1017, 'C_037', 'S_203', 'WC_0001', 'BUNYALA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1018, 'C_037', 'S_203', 'WC_0001', 'BUNYALA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1019, 'C_037', 'S_203', 'WC_0001', 'BUNYALA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1020, 'C_037', 'S_204', 'WC_0001', 'MUMIAS CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1021, 'C_037', 'S_204', 'WC_0001', 'MUMIAS NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1022, 'C_037', 'S_204', 'WC_0001', 'ETENJE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1023, 'C_037', 'S_204', 'WC_0001', 'MUSANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1024, 'C_037', 'S_205', 'WC_0001', 'LUSHEYA/LUBINU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1025, 'C_037', 'S_205', 'WC_0001', 'MALAHA/ISONGO/MAKUNGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1026, 'C_037', 'S_205', 'WC_0001', 'EAST WANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1027, 'C_037', 'S_206', 'WC_0001', 'KOYONZO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1028, 'C_037', 'S_206', 'WC_0001', 'KHOLERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1029, 'C_037', 'S_206', 'WC_0001', 'KHALABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1030, 'C_037', 'S_206', 'WC_0001', 'MAYONI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1031, 'C_037', 'S_206', 'WC_0001', 'NAMAMALI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1032, 'C_037', 'S_207', 'WC_0001', 'MARAMA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1033, 'C_037', 'S_207', 'WC_0001', 'MARAMA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1034, 'C_037', 'S_207', 'WC_0001', 'MARENYO - SHIANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1035, 'C_037', 'S_207', 'WC_0001', 'MARAMA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1036, 'C_037', 'S_207', 'WC_0001', 'MARAMA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1037, 'C_037', 'S_208', 'WC_0001', 'KISA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1038, 'C_037', 'S_208', 'WC_0001', 'KISA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1039, 'C_037', 'S_208', 'WC_0001', 'KISA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1040, 'C_037', 'S_208', 'WC_0001', 'KISA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1041, 'C_037', 'S_209', 'WC_0001', 'ISUKHA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1042, 'C_037', 'S_209', 'WC_0001', 'MURHANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1043, 'C_037', 'S_209', 'WC_0001', 'ISUKHA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1044, 'C_037', 'S_209', 'WC_0001', 'ISUKHA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1045, 'C_037', 'S_209', 'WC_0001', 'ISUKHA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1046, 'C_037', 'S_209', 'WC_0001', 'ISUKHA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1047, 'C_037', 'S_210', 'WC_0001', 'IDAKHO SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1048, 'C_037', 'S_210', 'WC_0001', 'IDAKHO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1049, 'C_037', 'S_210', 'WC_0001', 'IDAKHO NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1050, 'C_037', 'S_210', 'WC_0001', 'IDAKHO CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1051, 'C_038', 'S_211', 'WC_0001', 'LUGAGA-WAMULUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1052, 'C_038', 'S_211', 'WC_0001', 'SOUTH MARAGOLI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1053, 'C_038', 'S_211', 'WC_0001', 'CENTRAL MARAGOLI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1054, 'C_038', 'S_211', 'WC_0001', 'MUNGOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1055, 'C_038', 'S_212', 'WC_0001', 'LYADUYWA/IZAVA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1056, 'C_038', 'S_212', 'WC_0001', 'WEST SABATIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1057, 'C_038', 'S_212', 'WC_0001', 'CHAVAKALI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1058, 'C_038', 'S_212', 'WC_0001', 'NORTH MARAGOLI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1059, 'C_038', 'S_212', 'WC_0001', 'WODANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1060, 'C_038', 'S_212', 'WC_0001', 'BUSALI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1061, 'C_038', 'S_213', 'WC_0001', 'SHIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1062, 'C_038', 'S_213', 'WC_0001', 'GISAMBAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1063, 'C_038', 'S_213', 'WC_0001', 'SHAMAKHOKHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1064, 'C_038', 'S_213', 'WC_0001', 'BANJA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1065, 'C_038', 'S_213', 'WC_0001', 'MUHUDU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1066, 'C_038', 'S_213', 'WC_0001', 'TAMBUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1067, 'C_038', 'S_213', 'WC_0001', 'JEPKOYAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1068, 'C_038', 'S_214', 'WC_0001', 'LUANDA TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1069, 'C_038', 'S_214', 'WC_0001', 'WEMILABI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1070, 'C_038', 'S_214', 'WC_0001', 'MWIBONA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1071, 'C_038', 'S_214', 'WC_0001', 'LUANDA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1072, 'C_038', 'S_214', 'WC_0001', 'EMABUNGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1073, 'C_038', 'S_215', 'WC_0001', 'NORTH EAST BUNYORE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1074, 'C_038', 'S_215', 'WC_0001', 'CENTRAL BUNYORE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1075, 'C_038', 'S_215', 'WC_0001', 'WEST BUNYORE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1076, 'C_039', 'S_216', 'WC_0001', 'CHEPTAIS', '2022-01-13 05:40:59', '2022-01-13 05:40:59');
INSERT INTO `wards` (`id`, `county_code`, `sub_county_code`, `ward_code`, `name`, `created_at`, `updated_at`) VALUES
(1077, 'C_039', 'S_216', 'WC_0001', 'CHESIKAKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1078, 'C_039', 'S_216', 'WC_0001', 'CHEPYUK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1079, 'C_039', 'S_216', 'WC_0001', 'KAPKATENY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1080, 'C_039', 'S_216', 'WC_0001', 'KAPTAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1081, 'C_039', 'S_216', 'WC_0001', 'ELGON', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1082, 'C_039', 'S_217', 'WC_0001', 'NAMWELA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1083, 'C_039', 'S_217', 'WC_0001', 'MALAKISI/SOUTH KULISIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1084, 'C_039', 'S_217', 'WC_0001', 'LWANDANYI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1085, 'C_039', 'S_218', 'WC_0001', 'KABUCHAI/CHWELE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1086, 'C_039', 'S_218', 'WC_0001', 'WEST NALONDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1087, 'C_039', 'S_218', 'WC_0001', 'BWAKE/LUUYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1088, 'C_039', 'S_218', 'WC_0001', 'MUKUYUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1089, 'C_039', 'S_219', 'WC_0001', 'SOUTH BUKUSU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1090, 'C_039', 'S_219', 'WC_0001', 'BUMULA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1091, 'C_039', 'S_219', 'WC_0001', 'KHASOKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1092, 'C_039', 'S_219', 'WC_0001', 'KABULA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1093, 'C_039', 'S_219', 'WC_0001', 'KIMAETI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1094, 'C_039', 'S_219', 'WC_0001', 'WEST BUKUSU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1095, 'C_039', 'S_219', 'WC_0001', 'SIBOTI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1096, 'C_039', 'S_220', 'WC_0001', 'BUKEMBE WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1097, 'C_039', 'S_220', 'WC_0001', 'BUKEMBE EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1098, 'C_039', 'S_220', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1099, 'C_039', 'S_220', 'WC_0001', 'KHALABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1100, 'C_039', 'S_220', 'WC_0001', 'MUSIKOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1101, 'C_039', 'S_220', 'WC_0001', 'EAST SANG\'ALO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1102, 'C_039', 'S_220', 'WC_0001', 'MARAKARU/TUUTI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1103, 'C_039', 'S_220', 'WC_0001', 'WEST SANG\'ALO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1104, 'C_039', 'S_221', 'WC_0001', 'MIHUU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1105, 'C_039', 'S_221', 'WC_0001', 'NDIVISI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1106, 'C_039', 'S_221', 'WC_0001', 'MARAKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1107, 'C_039', 'S_222', 'WC_0001', 'MISIKHU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1108, 'C_039', 'S_222', 'WC_0001', 'SITIKHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1109, 'C_039', 'S_222', 'WC_0001', 'MATULO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1110, 'C_039', 'S_222', 'WC_0001', 'BOKOLI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1111, 'C_039', 'S_223', 'WC_0001', 'KIBINGEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1112, 'C_039', 'S_223', 'WC_0001', 'KIMILILI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1113, 'C_039', 'S_223', 'WC_0001', 'MAENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1114, 'C_039', 'S_223', 'WC_0001', 'KAMUKUYWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1115, 'C_039', 'S_224', 'WC_0001', 'MBAKALO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1116, 'C_039', 'S_224', 'WC_0001', 'NAITIRI/KABUYEFWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1117, 'C_039', 'S_224', 'WC_0001', 'MILIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1118, 'C_039', 'S_224', 'WC_0001', 'NDALU/ TABANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1119, 'C_039', 'S_224', 'WC_0001', 'TONGAREN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1120, 'C_039', 'S_224', 'WC_0001', 'SOYSAMBU/ MITUA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1121, 'C_040', 'S_225', 'WC_0001', 'MALABA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1122, 'C_040', 'S_225', 'WC_0001', 'MALABA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1123, 'C_040', 'S_225', 'WC_0001', 'ANG\'URAI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1124, 'C_040', 'S_225', 'WC_0001', 'ANG\'URAI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1125, 'C_040', 'S_225', 'WC_0001', 'ANG\'URAI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1126, 'C_040', 'S_225', 'WC_0001', 'MALABA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1127, 'C_040', 'S_226', 'WC_0001', 'ANG\'OROM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1128, 'C_040', 'S_226', 'WC_0001', 'CHAKOL SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1129, 'C_040', 'S_226', 'WC_0001', 'CHAKOL NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1130, 'C_040', 'S_226', 'WC_0001', 'AMUKURA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1131, 'C_040', 'S_226', 'WC_0001', 'AMUKURA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1132, 'C_040', 'S_226', 'WC_0001', 'AMUKURA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1133, 'C_040', 'S_227', 'WC_0001', 'NAMBALE TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1134, 'C_040', 'S_227', 'WC_0001', 'BUKHAYO NORTH/WALTSI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1135, 'C_040', 'S_227', 'WC_0001', 'BUKHAYO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1136, 'C_040', 'S_227', 'WC_0001', 'BUKHAYO CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1137, 'C_040', 'S_228', 'WC_0001', 'BUKHAYO WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1138, 'C_040', 'S_228', 'WC_0001', 'MAYENJE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1139, 'C_040', 'S_228', 'WC_0001', 'MATAYOS SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1140, 'C_040', 'S_228', 'WC_0001', 'BUSIBWABO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1141, 'C_040', 'S_228', 'WC_0001', 'BURUMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1142, 'C_040', 'S_229', 'WC_0001', 'MARACHI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1143, 'C_040', 'S_229', 'WC_0001', 'KINGANDOLE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1144, 'C_040', 'S_229', 'WC_0001', 'MARACHI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1145, 'C_040', 'S_229', 'WC_0001', 'MARACHI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1146, 'C_040', 'S_229', 'WC_0001', 'MARACHI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1147, 'C_040', 'S_229', 'WC_0001', 'ELUGULU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1148, 'C_040', 'S_230', 'WC_0001', 'NAMBOBOTO NAMBUKU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1149, 'C_040', 'S_230', 'WC_0001', 'NANGINA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1150, 'C_040', 'S_230', 'WC_0001', 'AGENG\'A NANGUBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1151, 'C_040', 'S_230', 'WC_0001', 'BWIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1152, 'C_040', 'S_231', 'WC_0001', 'BUNYALA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1153, 'C_040', 'S_231', 'WC_0001', 'BUNYALA NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1154, 'C_040', 'S_231', 'WC_0001', 'BUNYALA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1155, 'C_040', 'S_231', 'WC_0001', 'BUNYALA SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1156, 'C_041', 'S_232', 'WC_0001', 'WEST UGENYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1157, 'C_041', 'S_232', 'WC_0001', 'UKWALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1158, 'C_041', 'S_232', 'WC_0001', 'NORTH UGENYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1159, 'C_041', 'S_232', 'WC_0001', 'EAST UGENYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1160, 'C_041', 'S_233', 'WC_0001', 'SIDINDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1161, 'C_041', 'S_233', 'WC_0001', 'SIGOMERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1162, 'C_041', 'S_233', 'WC_0001', 'UGUNJA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1163, 'C_041', 'S_234', 'WC_0001', 'USONGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1164, 'C_041', 'S_234', 'WC_0001', 'WEST ALEGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1165, 'C_041', 'S_234', 'WC_0001', 'CENTRAL ALEGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1166, 'C_041', 'S_234', 'WC_0001', 'SIAYA TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1167, 'C_041', 'S_234', 'WC_0001', 'NORTH ALEGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1168, 'C_041', 'S_234', 'WC_0001', 'SOUTH EAST ALEGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1169, 'C_041', 'S_235', 'WC_0001', 'NORTH GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1170, 'C_041', 'S_235', 'WC_0001', 'WEST GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1171, 'C_041', 'S_235', 'WC_0001', 'CENTRAL GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1172, 'C_041', 'S_235', 'WC_0001', 'YALA TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1173, 'C_041', 'S_235', 'WC_0001', 'EAST GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1174, 'C_041', 'S_235', 'WC_0001', 'SOUTH GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1175, 'C_041', 'S_236', 'WC_0001', 'WEST YIMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1176, 'C_041', 'S_236', 'WC_0001', 'CENTRAL SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1177, 'C_041', 'S_236', 'WC_0001', 'SOUTH SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1178, 'C_041', 'S_236', 'WC_0001', 'YIMBO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1179, 'C_041', 'S_236', 'WC_0001', 'WEST SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1180, 'C_041', 'S_236', 'WC_0001', 'NORTH SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1181, 'C_041', 'S_237', 'WC_0001', 'EAST ASEMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1182, 'C_041', 'S_237', 'WC_0001', 'WEST ASEMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1183, 'C_041', 'S_237', 'WC_0001', 'NORTH UYOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1184, 'C_041', 'S_237', 'WC_0001', 'SOUTH UYOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1185, 'C_041', 'S_237', 'WC_0001', 'WEST UYOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1186, 'C_042', 'S_238', 'WC_0001', 'KAJULU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1187, 'C_042', 'S_238', 'WC_0001', 'KOLWA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1188, 'C_042', 'S_238', 'WC_0001', 'MANYATTA\'B ', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1189, 'C_042', 'S_238', 'WC_0001', 'NYALENDA\'A ', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1190, 'C_042', 'S_238', 'WC_0001', 'KOLWA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1191, 'C_042', 'S_239', 'WC_0001', 'SOUTH WEST KISUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1192, 'C_042', 'S_239', 'WC_0001', 'CENTRAL KISUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1193, 'C_042', 'S_239', 'WC_0001', 'KISUMU NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1194, 'C_042', 'S_239', 'WC_0001', 'WEST KISUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1195, 'C_042', 'S_239', 'WC_0001', 'NORTH WEST KISUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1196, 'C_042', 'S_240', 'WC_0001', 'RAILWAYS', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1197, 'C_042', 'S_240', 'WC_0001', 'MIGOSI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1198, 'C_042', 'S_240', 'WC_0001', 'SHAURIMOYO KALOLENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1199, 'C_042', 'S_240', 'WC_0001', 'MARKET MILIMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1200, 'C_042', 'S_240', 'WC_0001', 'KONDELE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1201, 'C_042', 'S_240', 'WC_0001', 'NYALENDA B', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1202, 'C_042', 'S_241', 'WC_0001', 'WEST SEME', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1203, 'C_042', 'S_241', 'WC_0001', 'CENTRAL SEME', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1204, 'C_042', 'S_241', 'WC_0001', 'EAST SEME', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1205, 'C_042', 'S_241', 'WC_0001', 'NORTH SEME', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1206, 'C_042', 'S_242', 'WC_0001', 'EAST KANO/WAWIDHI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1207, 'C_042', 'S_242', 'WC_0001', 'AWASI/ONJIKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1208, 'C_042', 'S_242', 'WC_0001', 'AHERO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1209, 'C_042', 'S_242', 'WC_0001', 'KABONYO/KANYAGWAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1210, 'C_042', 'S_242', 'WC_0001', 'KOBURA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1211, 'C_042', 'S_243', 'WC_0001', 'MIWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1212, 'C_042', 'S_243', 'WC_0001', 'OMBEYI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1213, 'C_042', 'S_243', 'WC_0001', 'MASOGO/NYANG\'OMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1214, 'C_042', 'S_243', 'WC_0001', 'CHEMELIL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1215, 'C_042', 'S_243', 'WC_0001', 'MUHORONI/KORU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1216, 'C_042', 'S_244', 'WC_0001', 'SOUTH WEST NYAKACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1217, 'C_042', 'S_244', 'WC_0001', 'NORTH NYAKACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1218, 'C_042', 'S_244', 'WC_0001', 'CENTRAL NYAKACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1219, 'C_042', 'S_244', 'WC_0001', 'WEST NYAKACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1220, 'C_042', 'S_244', 'WC_0001', 'SOUTH EAST NYAKACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1221, 'C_043', 'S_245', 'WC_0001', 'WEST KASIPUL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1222, 'C_043', 'S_245', 'WC_0001', 'SOUTH KASIPUL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1223, 'C_043', 'S_245', 'WC_0001', 'CENTRAL KASIPUL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1224, 'C_043', 'S_245', 'WC_0001', 'EAST KAMAGAK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1225, 'C_043', 'S_245', 'WC_0001', 'WEST KAMAGAK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1226, 'C_043', 'S_246', 'WC_0001', 'KABONDO EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1227, 'C_043', 'S_246', 'WC_0001', 'KABONDO WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1228, 'C_043', 'S_246', 'WC_0001', 'KOKWANYO/KAKELO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1229, 'C_043', 'S_246', 'WC_0001', 'KOJWACH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1230, 'C_043', 'S_247', 'WC_0001', 'WEST KARACHUONYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1231, 'C_043', 'S_247', 'WC_0001', 'NORTH KARACHUONYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1232, 'C_043', 'S_247', 'WC_0001', 'CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1233, 'C_043', 'S_247', 'WC_0001', 'KANYALUO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1234, 'C_043', 'S_247', 'WC_0001', 'KIBIRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1235, 'C_043', 'S_247', 'WC_0001', 'WANGCHIENG', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1236, 'C_043', 'S_247', 'WC_0001', 'KENDU BAY TOWN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1237, 'C_043', 'S_248', 'WC_0001', 'WEST GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1238, 'C_043', 'S_248', 'WC_0001', 'EAST GEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1239, 'C_043', 'S_248', 'WC_0001', 'KAGAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1240, 'C_043', 'S_248', 'WC_0001', 'KOCHIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1241, 'C_043', 'S_249', 'WC_0001', 'HOMA BAY CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1242, 'C_043', 'S_249', 'WC_0001', 'HOMA BAY ARUJO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1243, 'C_043', 'S_249', 'WC_0001', 'HOMA BAY WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1244, 'C_043', 'S_249', 'WC_0001', 'HOMA BAY EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1245, 'C_043', 'S_250', 'WC_0001', 'KWABWAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1246, 'C_043', 'S_250', 'WC_0001', 'KANYADOTO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1247, 'C_043', 'S_250', 'WC_0001', 'KANYIKELA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1248, 'C_043', 'S_250', 'WC_0001', 'KABUOCH NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1249, 'C_043', 'S_250', 'WC_0001', 'KABUOCH SOUTH/PALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1250, 'C_043', 'S_250', 'WC_0001', 'KANYAMWA KOLOGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1251, 'C_043', 'S_250', 'WC_0001', 'KANYAMWA KOSEWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1252, 'C_043', 'S_251', 'WC_0001', 'MFANGANO ISLAND', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1253, 'C_043', 'S_251', 'WC_0001', 'RUSINGA ISLAND', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1254, 'C_043', 'S_251', 'WC_0001', 'KASGUNGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1255, 'C_043', 'S_251', 'WC_0001', 'GEMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1256, 'C_043', 'S_251', 'WC_0001', 'LAMBWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1257, 'C_043', 'S_252', 'WC_0001', 'GWASSI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1258, 'C_043', 'S_252', 'WC_0001', 'GWASSI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1259, 'C_043', 'S_252', 'WC_0001', 'KAKSINGRI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1260, 'C_043', 'S_252', 'WC_0001', 'RUMA-KAKSINGRI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1261, 'C_044', 'S_253', 'WC_0001', 'NORTH KAMAGAMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1262, 'C_044', 'S_253', 'WC_0001', 'CENTRAL KAMAGAMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1263, 'C_044', 'S_253', 'WC_0001', 'EAST KAMAGAMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1264, 'C_044', 'S_253', 'WC_0001', 'SOUTH KAMAGAMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1265, 'C_044', 'S_254', 'WC_0001', 'NORTH SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1266, 'C_044', 'S_254', 'WC_0001', 'SOUTH SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1267, 'C_044', 'S_254', 'WC_0001', 'WEST SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1268, 'C_044', 'S_254', 'WC_0001', 'CENTRAL SAKWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1269, 'C_044', 'S_255', 'WC_0001', 'GOD JOPE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1270, 'C_044', 'S_255', 'WC_0001', 'SUNA CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1271, 'C_044', 'S_255', 'WC_0001', 'KAKRAO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1272, 'C_044', 'S_255', 'WC_0001', 'KWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1273, 'C_044', 'S_256', 'WC_0001', 'WIGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1274, 'C_044', 'S_256', 'WC_0001', 'WASWETA II', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1275, 'C_044', 'S_256', 'WC_0001', 'RAGANA-ORUBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1276, 'C_044', 'S_256', 'WC_0001', 'WASIMBETE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1277, 'C_044', 'S_257', 'WC_0001', 'WEST KANYAMKAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1278, 'C_044', 'S_257', 'WC_0001', 'NORTH KANYAMKAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1279, 'C_044', 'S_257', 'WC_0001', 'CENTRAL KANYAMKAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1280, 'C_044', 'S_257', 'WC_0001', 'SOUTH KANYAMKAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1281, 'C_044', 'S_257', 'WC_0001', 'EAST KANYAMKAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1282, 'C_044', 'S_258', 'WC_0001', 'KACHIEN\'G', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1283, 'C_044', 'S_258', 'WC_0001', 'KANYASA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1284, 'C_044', 'S_258', 'WC_0001', 'NORTH KADEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1285, 'C_044', 'S_258', 'WC_0001', 'MACALDER/KANYARWANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1286, 'C_044', 'S_258', 'WC_0001', 'KALER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1287, 'C_044', 'S_258', 'WC_0001', 'GOT KACHOLA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1288, 'C_044', 'S_258', 'WC_0001', 'MUHURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1289, 'C_044', 'S_259', 'WC_0001', 'BUKIRA EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1290, 'C_044', 'S_259', 'WC_0001', 'BUKIRA CENTRL/IKEREGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1291, 'C_044', 'S_259', 'WC_0001', 'ISIBANIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1292, 'C_044', 'S_259', 'WC_0001', 'MAKERERO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1293, 'C_044', 'S_259', 'WC_0001', 'MASABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1294, 'C_044', 'S_259', 'WC_0001', 'TAGARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1295, 'C_044', 'S_259', 'WC_0001', 'NYAMOSENSE/KOMOSOKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1296, 'C_044', 'S_260', 'WC_0001', 'GOKEHARAKA/GETAMBWEGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1297, 'C_044', 'S_260', 'WC_0001', 'NTIMARU WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1298, 'C_044', 'S_260', 'WC_0001', 'NTIMARU EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1299, 'C_044', 'S_260', 'WC_0001', 'NYABASI EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1300, 'C_044', 'S_260', 'WC_0001', 'NYABASI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1301, 'C_045', 'S_261', 'WC_0001', 'BOMARIBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1302, 'C_045', 'S_261', 'WC_0001', 'BOGIAKUMU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1303, 'C_045', 'S_261', 'WC_0001', 'BOMORENDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1304, 'C_045', 'S_261', 'WC_0001', 'RIANA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1305, 'C_045', 'S_262', 'WC_0001', 'TABAKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1306, 'C_045', 'S_262', 'WC_0001', 'BOIKANG\'A', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1307, 'C_045', 'S_262', 'WC_0001', 'BOGETENGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1308, 'C_045', 'S_262', 'WC_0001', 'BORABU / CHITAGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1309, 'C_045', 'S_262', 'WC_0001', 'MOTICHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1310, 'C_045', 'S_262', 'WC_0001', 'GETENGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1311, 'C_045', 'S_263', 'WC_0001', 'BOMBABA BORABU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1312, 'C_045', 'S_263', 'WC_0001', 'BOOCHI BORABU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1313, 'C_045', 'S_263', 'WC_0001', 'BOKIMONGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1314, 'C_045', 'S_263', 'WC_0001', 'MAGENCHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1315, 'C_045', 'S_264', 'WC_0001', 'MASIGE WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1316, 'C_045', 'S_264', 'WC_0001', 'MASIGE EAST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1317, 'C_045', 'S_264', 'WC_0001', 'BASI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1318, 'C_045', 'S_264', 'WC_0001', 'NYACHEKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1319, 'C_045', 'S_264', 'WC_0001', 'BASI BOGETAORIO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1320, 'C_045', 'S_264', 'WC_0001', 'BOBASI CHACHE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1321, 'C_045', 'S_264', 'WC_0001', 'SAMETA/MOKWERERO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1322, 'C_045', 'S_264', 'WC_0001', 'BOBASI BOITANGARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1323, 'C_045', 'S_265', 'WC_0001', 'MAJOGE BASI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1324, 'C_045', 'S_265', 'WC_0001', 'BOOCHI/TENDERE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1325, 'C_045', 'S_265', 'WC_0001', 'BOSOTI/SENGERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1326, 'C_045', 'S_266', 'WC_0001', 'ICHUNI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1327, 'C_045', 'S_266', 'WC_0001', 'NYAMASIBI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1328, 'C_045', 'S_266', 'WC_0001', 'MASIMBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1329, 'C_045', 'S_266', 'WC_0001', 'GESUSU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1330, 'C_045', 'S_266', 'WC_0001', 'KIAMOKAMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1331, 'C_045', 'S_267', 'WC_0001', 'BOBARACHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1332, 'C_045', 'S_267', 'WC_0001', 'KISII CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1333, 'C_045', 'S_267', 'WC_0001', 'KEUMBU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1334, 'C_045', 'S_267', 'WC_0001', 'KIOGORO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1335, 'C_045', 'S_267', 'WC_0001', 'BIRONGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1336, 'C_045', 'S_267', 'WC_0001', 'IBENO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1337, 'C_045', 'S_268', 'WC_0001', 'MONYERERO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1338, 'C_045', 'S_268', 'WC_0001', 'SENSI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1339, 'C_045', 'S_268', 'WC_0001', 'MARANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1340, 'C_045', 'S_268', 'WC_0001', 'KEGOGI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1341, 'C_045', 'S_269', 'WC_0001', 'BOGUSERO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1342, 'C_045', 'S_269', 'WC_0001', 'BOGEKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1343, 'C_045', 'S_269', 'WC_0001', 'NYAKOE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1344, 'C_045', 'S_269', 'WC_0001', 'KITUTU   CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1345, 'C_045', 'S_269', 'WC_0001', 'NYATIEKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1346, 'C_046', 'S_270', 'WC_0001', 'RIGOMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1347, 'C_046', 'S_270', 'WC_0001', 'GACHUBA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1348, 'C_046', 'S_270', 'WC_0001', 'KEMERA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1349, 'C_046', 'S_270', 'WC_0001', 'MAGOMBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1350, 'C_046', 'S_270', 'WC_0001', 'MANGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1351, 'C_046', 'S_270', 'WC_0001', 'GESIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1352, 'C_046', 'S_271', 'WC_0001', 'NYAMAIYA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1353, 'C_046', 'S_271', 'WC_0001', 'BOGICHORA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1354, 'C_046', 'S_271', 'WC_0001', 'BOSAMARO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1355, 'C_046', 'S_271', 'WC_0001', 'BONYAMATUTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1356, 'C_046', 'S_271', 'WC_0001', 'TOWNSHIP', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1357, 'C_046', 'S_272', 'WC_0001', 'ITIBO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1358, 'C_046', 'S_272', 'WC_0001', 'BOMWAGAMO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1359, 'C_046', 'S_272', 'WC_0001', 'BOKEIRA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1360, 'C_046', 'S_272', 'WC_0001', 'MAGWAGWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1361, 'C_046', 'S_272', 'WC_0001', 'EKERENYO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1362, 'C_046', 'S_273', 'WC_0001', 'MEKENENE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1363, 'C_046', 'S_273', 'WC_0001', 'KIABONYORU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1364, 'C_046', 'S_273', 'WC_0001', 'NYANSIONGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1365, 'C_046', 'S_273', 'WC_0001', 'ESISE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1366, 'C_047', 'S_274', 'WC_0001', 'KITISURU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1367, 'C_047', 'S_274', 'WC_0001', 'PARKLANDS/HIGHRIDGE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1368, 'C_047', 'S_274', 'WC_0001', 'KARURA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1369, 'C_047', 'S_274', 'WC_0001', 'KANGEMI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1370, 'C_047', 'S_274', 'WC_0001', 'MOUNTAIN VIEW', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1371, 'C_047', 'S_275', 'WC_0001', 'KILIMANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1372, 'C_047', 'S_275', 'WC_0001', 'KAWANGWARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1373, 'C_047', 'S_275', 'WC_0001', 'GATINA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1374, 'C_047', 'S_275', 'WC_0001', 'KILELESHWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1375, 'C_047', 'S_275', 'WC_0001', 'KABIRO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1376, 'C_047', 'S_276', 'WC_0001', 'MUTU-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1377, 'C_047', 'S_276', 'WC_0001', 'NGANDO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1378, 'C_047', 'S_276', 'WC_0001', 'RIRUTA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1379, 'C_047', 'S_276', 'WC_0001', 'UTHIRU/RUTHIMITU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1380, 'C_047', 'S_276', 'WC_0001', 'WAITHAKA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1381, 'C_047', 'S_277', 'WC_0001', 'KAREN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1382, 'C_047', 'S_277', 'WC_0001', 'NAIROBI WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1383, 'C_047', 'S_277', 'WC_0001', 'MUGUMU-INI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1384, 'C_047', 'S_277', 'WC_0001', 'SOUTH C', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1385, 'C_047', 'S_277', 'WC_0001', 'NYAYO HIGHRISE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1386, 'C_047', 'S_278', 'WC_0001', 'LAINI SABA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1387, 'C_047', 'S_278', 'WC_0001', 'LINDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1388, 'C_047', 'S_278', 'WC_0001', 'MAKINA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1389, 'C_047', 'S_278', 'WC_0001', 'WOODLEY/KENYATTA GOLF COURSE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1390, 'C_047', 'S_278', 'WC_0001', 'SARANGOMBE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1391, 'C_047', 'S_279', 'WC_0001', 'GITHURAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1392, 'C_047', 'S_279', 'WC_0001', 'KAHAWA WEST', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1393, 'C_047', 'S_279', 'WC_0001', 'ZIMMERMAN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1394, 'C_047', 'S_279', 'WC_0001', 'ROYSAMBU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1395, 'C_047', 'S_279', 'WC_0001', 'KAHAWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1396, 'C_047', 'S_280', 'WC_0001', 'CLAY CITY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1397, 'C_047', 'S_280', 'WC_0001', 'MWIKI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1398, 'C_047', 'S_280', 'WC_0001', 'KASARANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1399, 'C_047', 'S_280', 'WC_0001', 'NJIRU', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1400, 'C_047', 'S_280', 'WC_0001', 'RUAI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1401, 'C_047', 'S_281', 'WC_0001', 'BABA DOGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1402, 'C_047', 'S_281', 'WC_0001', 'UTALII', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1403, 'C_047', 'S_281', 'WC_0001', 'MATHARE NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1404, 'C_047', 'S_281', 'WC_0001', 'LUCKY SUMMER', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1405, 'C_047', 'S_281', 'WC_0001', 'KOROGOCHO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1406, 'C_047', 'S_282', 'WC_0001', 'IMARA DAIMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1407, 'C_047', 'S_282', 'WC_0001', 'KWA NJENGA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1408, 'C_047', 'S_282', 'WC_0001', 'KWA REUBEN', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1409, 'C_047', 'S_282', 'WC_0001', 'PIPELINE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1410, 'C_047', 'S_282', 'WC_0001', 'KWARE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1411, 'C_047', 'S_283', 'WC_0001', 'KARIOBANGI NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1412, 'C_047', 'S_283', 'WC_0001', 'DANDORA AREA I', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1413, 'C_047', 'S_283', 'WC_0001', 'DANDORA AREA II', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1414, 'C_047', 'S_283', 'WC_0001', 'DANDORA AREA III', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1415, 'C_047', 'S_283', 'WC_0001', 'DANDORA AREA IV', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1416, 'C_047', 'S_284', 'WC_0001', 'KAYOLE NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1417, 'C_047', 'S_284', 'WC_0001', 'KAYOLE CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1418, 'C_047', 'S_284', 'WC_0001', 'KAYOLE SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1419, 'C_047', 'S_284', 'WC_0001', 'KOMAROCK', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1420, 'C_047', 'S_284', 'WC_0001', 'MATOPENI/SPRING VALLEY', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1421, 'C_047', 'S_285', 'WC_0001', 'UPPER SAVANNAH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1422, 'C_047', 'S_285', 'WC_0001', 'LOWER SAVANNAH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1423, 'C_047', 'S_285', 'WC_0001', 'EMBAKASI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1424, 'C_047', 'S_285', 'WC_0001', 'UTAWALA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1425, 'C_047', 'S_285', 'WC_0001', 'MIHANGO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1426, 'C_047', 'S_286', 'WC_0001', 'UMOJA I', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1427, 'C_047', 'S_286', 'WC_0001', 'UMOJA II', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1428, 'C_047', 'S_286', 'WC_0001', 'MOWLEM', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1429, 'C_047', 'S_286', 'WC_0001', 'KARIOBANGI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1430, 'C_047', 'S_287', 'WC_0001', 'MARINGO/HAMZA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1431, 'C_047', 'S_287', 'WC_0001', 'VIWANDANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1432, 'C_047', 'S_287', 'WC_0001', 'HARAMBEE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1433, 'C_047', 'S_287', 'WC_0001', 'MAKONGENI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1434, 'C_047', 'S_288', 'WC_0001', 'PUMWANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1435, 'C_047', 'S_288', 'WC_0001', 'EASTLEIGH NORTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1436, 'C_047', 'S_288', 'WC_0001', 'EASTLEIGH SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1437, 'C_047', 'S_288', 'WC_0001', 'AIRBASE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1438, 'C_047', 'S_288', 'WC_0001', 'CALIFORNIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1439, 'C_047', 'S_289', 'WC_0001', 'NAIROBI CENTRAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1440, 'C_047', 'S_289', 'WC_0001', 'NGARA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1441, 'C_047', 'S_289', 'WC_0001', 'PANGANI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1442, 'C_047', 'S_289', 'WC_0001', 'ZIWANI/KARIOKOR', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1443, 'C_047', 'S_289', 'WC_0001', 'LANDIMAWE', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1444, 'C_047', 'S_289', 'WC_0001', 'NAIROBI SOUTH', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1445, 'C_047', 'S_290', 'WC_0001', 'HOSPITAL', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1446, 'C_047', 'S_290', 'WC_0001', 'MABATINI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1447, 'C_047', 'S_290', 'WC_0001', 'HURUMA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1448, 'C_047', 'S_290', 'WC_0001', 'NGEI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1449, 'C_047', 'S_290', 'WC_0001', 'MLANGO KUBWA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1450, 'C_047', 'S_290', 'WC_0001', 'KIAMAIKO', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1451, 'C_048', 'S_291', 'WC_0001', 'TANZANIA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1452, 'C_048', 'S_291', 'WC_0001', 'UGANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1453, 'C_048', 'S_291', 'WC_0001', 'RWANDA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1454, 'C_048', 'S_291', 'WC_0001', 'BURUNDI', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1455, 'C_048', 'S_291', 'WC_0001', 'SOUTH AFRICA', '2022-01-13 05:40:59', '2022-01-13 05:40:59'),
(1456, 'C_049', 'S_292', 'WC_0001', 'PRISONS', '2022-01-13 05:40:59', '2022-01-13 05:40:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergies`
--
ALTER TABLE `allergies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`appoinment_id`);

--
-- Indexes for table `body_part`
--
ALTER TABLE `body_part`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `body_part_section`
--
ALTER TABLE `body_part_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `body_part_id` (`body_part_id`),
  ADD KEY `body_section_id` (`body_section_id`);

--
-- Indexes for table `body_section`
--
ALTER TABLE `body_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkins`
--
ALTER TABLE `checkins`
  ADD PRIMARY KEY (`checkin_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `counties`
--
ALTER TABLE `counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`dependent_id`);

--
-- Indexes for table `deviceoperations`
--
ALTER TABLE `deviceoperations`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`device_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_prescriptions`
--
ALTER TABLE `doctor_prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`emergency_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `individuals`
--
ALTER TABLE `individuals`
  ADD PRIMARY KEY (`individual_id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ppbagents`
--
ALTER TABLE `ppbagents`
  ADD PRIMARY KEY (`ppbagent_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `refers`
--
ALTER TABLE `refers`
  ADD PRIMARY KEY (`refer_id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_counties`
--
ALTER TABLE `sub_counties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testdevices`
--
ALTER TABLE `testdevices`
  ADD PRIMARY KEY (`testdevice_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `teststations`
--
ALTER TABLE `teststations`
  ADD PRIMARY KEY (`teststation_id`);

--
-- Indexes for table `tstations`
--
ALTER TABLE `tstations`
  ADD PRIMARY KEY (`tstation_id`),
  ADD UNIQUE KEY `tstations_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergies`
--
ALTER TABLE `allergies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `appoinment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `body_part`
--
ALTER TABLE `body_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `body_part_section`
--
ALTER TABLE `body_part_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `body_section`
--
ALTER TABLE `body_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `checkins`
--
ALTER TABLE `checkins`
  MODIFY `checkin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `counties`
--
ALTER TABLE `counties`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `dependents`
--
ALTER TABLE `dependents`
  MODIFY `dependent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deviceoperations`
--
ALTER TABLE `deviceoperations`
  MODIFY `operation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `device_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctor_prescriptions`
--
ALTER TABLE `doctor_prescriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `emergency_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `individuals`
--
ALTER TABLE `individuals`
  MODIFY `individual_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ppbagents`
--
ALTER TABLE `ppbagents`
  MODIFY `ppbagent_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refers`
--
ALTER TABLE `refers`
  MODIFY `refer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_counties`
--
ALTER TABLE `sub_counties`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `testdevices`
--
ALTER TABLE `testdevices`
  MODIFY `testdevice_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `test_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teststations`
--
ALTER TABLE `teststations`
  MODIFY `teststation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tstations`
--
ALTER TABLE `tstations`
  MODIFY `tstation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1457;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `body_part_section`
--
ALTER TABLE `body_part_section`
  ADD CONSTRAINT `body_part_section_ibfk_1` FOREIGN KEY (`body_part_id`) REFERENCES `body_part` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `body_part_section_ibfk_2` FOREIGN KEY (`body_section_id`) REFERENCES `body_section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
