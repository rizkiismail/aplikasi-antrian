-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2021 at 04:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`) VALUES
(7, 'Rizki', 'ri7@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

DROP TABLE IF EXISTS `antrian`;
CREATE TABLE IF NOT EXISTS `antrian` (
  `antrian_id` int(35) NOT NULL AUTO_INCREMENT,
  `no_antrian` int(100) NOT NULL,
  `nim` varchar(35) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `no_handphone` varchar(15) DEFAULT NULL,
  `type` enum('mahasiswa','umum') NOT NULL DEFAULT 'mahasiswa',
  `bagian_id` int(35) NOT NULL,
  `keperluan` text NOT NULL,
  `status` enum('tunggu','dipanggil','selesai') NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`antrian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`antrian_id`, `no_antrian`, `nim`, `name`, `no_handphone`, `type`, `bagian_id`, `keperluan`, `status`, `tanggal`) VALUES
(5, 2, 'A2.1700054', 'Ihsan Saeful Alam', NULL, 'mahasiswa', 2, 'Bayar SKS', 'selesai', '2021-01-20 01:00:04'),
(8, 3, 'A2.1700056', 'Ilyasa Firdaus', NULL, 'mahasiswa', 2, 'Bayar SKS', 'selesai', '2021-01-20 01:00:04'),
(9, 4, 'A2.1700058', 'Indrianti Retno Palupi', NULL, 'mahasiswa', 2, 'Bayar SKS', 'selesai', '2021-01-20 01:00:04'),
(10, 1, 'A3.1700041', 'Rosi Rojanah', NULL, 'mahasiswa', 3, 'Bayar SKS', 'selesai', '2021-01-21 01:46:36'),
(20, 2, 'A3.1700042', 'Satriya Laksana', NULL, 'mahasiswa', 3, 'Bayar SKS', 'selesai', '2021-01-21 13:50:38'),
(21, 3, NULL, 'Ihsan', '08912912', 'umum', 3, 'Bayar SKS', 'selesai', '2021-01-21 13:51:39'),
(22, 5, NULL, 'Ilyasa', '089189', 'umum', 2, 'Ada', 'selesai', '2021-01-21 14:01:55'),
(23, 1, NULL, 'Indrianti', '078121', 'umum', 1, 'ada', 'selesai', '2021-01-21 14:05:49'),
(24, 2, 'A3.1700041', 'Rosi Rojanah', NULL, 'mahasiswa', 1, 'ada', 'selesai', '2021-01-21 14:07:55'),
(25, 3, 'A3.1700042', 'Satriya Laksana', NULL, 'mahasiswa', 1, 'Ada', 'selesai', '2021-01-21 14:08:30'),
(26, 4, 'A1.1800006', 'Rizki Andriana Ismail', NULL, 'mahasiswa', 1, 'Ada', 'selesai', '2021-01-22 02:33:22'),
(27, 4, NULL, 'Rizki', '089089089089', 'umum', 3, 'Ada', 'selesai', '2021-01-22 02:56:00'),
(28, 5, NULL, 'Ismail', '089089089089', 'umum', 1, 'Konseling', 'dipanggil', '2021-01-22 03:16:35'),
(29, 5, NULL, 'Andri', '081208120812', 'umum', 3, 'Pembayaran', 'dipanggil', '2021-01-22 03:41:57'),
(30, 6, 'A1.1800006', 'Rizki Andriana Ismail', NULL, 'mahasiswa', 2, 'Pengambilan Jadwal', 'dipanggil', '2021-01-22 03:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

DROP TABLE IF EXISTS `bagian`;
CREATE TABLE IF NOT EXISTS `bagian` (
  `bagian_id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` enum('ready','break') NOT NULL DEFAULT 'break',
  PRIMARY KEY (`bagian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `name`, `status`) VALUES
(1, 'Umum', 'ready'),
(2, 'Jurusan', 'ready'),
(3, 'Keuangan', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` varchar(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `name`, `email`, `password`) VALUES
('A1.1800006', 'Rizki Andriana Ismail', 'rizkiandriana17@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(35) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `email`, `password`) VALUES
(3, 'Rizki Ismail', 'rizkiismail@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'Rizki', 'ri7@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`) USING HASH
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
