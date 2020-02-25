-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 02:51 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iporter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brian', 'brian@gmail.com', '$2y$10$HtRUAIAxi.lve0VgYhCXf.j2RdvXrTTSGzhMm.U7RQE6rsxt6EObG', 'Makassar', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_25_033724_create_porters_table', 2),
(5, '2019_10_25_042325_create_porters_table', 3),
(6, '2019_10_25_073844_create_orders_table', 4),
(7, '2019_10_30_144707_create_admins_table', 5),
(8, '2019_10_30_145821_create_admins_table', 6),
(9, '2019_10_30_153617_create_admins_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `jarak_berat` int(5) NOT NULL,
  `tip` int(11) NOT NULL,
  `status` enum('ambil','beli') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook_porter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_porter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_porter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_to` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `verified_by` int(11) DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `destinasi`, `nama_barang`, `harga`, `jarak_berat`, `tip`, `status`, `alamat_awal`, `alamat_tujuan`, `facebook_porter`, `twitter_porter`, `instagram_porter`, `order_to`, `created_by`, `tanggal_selesai`, `verified_by`, `deleted`, `created_at`, `updated_at`) VALUES
(4, 'luar_kota', 'Dompet Jeep', 250000, 1, 20000, 'beli', 'Antang, Makassar', 'Mandai, Maros', 'juliastri', NULL, NULL, NULL, 1, '2019-11-23 13:15:17', 1, 1, '2019-10-29 13:49:25', '2019-11-23 05:15:17'),
(5, 'luar_kota', 'kjhhk', NULL, 1, 20000, 'ambil', 'jxjka', 'afssjh', NULL, NULL, NULL, NULL, 11, NULL, NULL, 0, '2019-11-14 01:08:08', '2019-11-14 01:08:08'),
(6, 'luar_kota', 'monitor', NULL, 1, 20000, 'ambil', 'asdasd', 'asdasd', NULL, NULL, NULL, NULL, 18, NULL, NULL, 0, '2019-11-16 23:24:23', '2019-11-16 23:24:23'),
(7, 'luar_kota', 'asd', NULL, 1, 20000, 'ambil', 'asd', 'asd', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2019-11-17 00:04:24', '2019-11-17 00:04:24'),
(8, 'luar_kota', 'asd', NULL, 1, 20000, 'ambil', 'A', 'A', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2019-11-17 00:09:23', '2019-11-17 00:09:23'),
(9, 'luar_kota', 'asda', NULL, 1, 20000, 'ambil', 'asda', 'asda', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2019-11-17 00:10:55', '2019-11-17 00:10:55'),
(10, 'luar_kota', 'asd', NULL, 1, 20000, 'ambil', 'as', 'as', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2019-11-17 00:14:31', '2019-11-17 00:14:31'),
(11, 'luar_kota', 'asd', NULL, 1, 20000, 'ambil', 'dsa', 'dsa', NULL, NULL, NULL, NULL, 1, NULL, NULL, 0, '2019-11-17 01:04:38', '2019-11-17 01:04:38'),
(13, 'dalam_kota', 'Pizza', 50000, 11, 7000, 'beli', 'Paccerakkang', 'Somba Opu', 'rian', 'rian21', '@rian', NULL, 1, '2019-11-23 00:00:00', NULL, 1, '2019-11-23 01:32:29', '2019-11-23 05:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('khaeruddinasdar12@gmail.com', '$2y$10$fnqcDHpxC5d/DEJbcthJcelKRJ80gnKtQf.QwG293DeyMMXEg59le', '2019-11-12 16:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `porters`
--

CREATE TABLE `porters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `destinasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jarak` int(11) DEFAULT NULL,
  `kendaraan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porters`
--

INSERT INTO `porters` (`id`, `destinasi`, `alamat_awal`, `alamat_tujuan`, `jarak`, `kendaraan`, `kapasitas`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'on', 'bone', 'koe', NULL, 'mobil', 3, 1, '2019-10-24 21:09:00', '2019-10-24 21:09:00'),
(2, 'on', 'bone', 'koe', NULL, 'mobil', 3, 1, '2019-10-24 21:09:27', '2019-10-24 21:09:27'),
(3, 'on', 'bone', 'koe', NULL, 'mobil', 3, 1, '2019-10-24 21:13:12', '2019-10-24 21:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_ktp` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selfie_ktp` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_profile` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(192) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_verified_at` date DEFAULT NULL,
  `admin_verified_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `status`, `foto_ktp`, `selfie_ktp`, `nik`, `foto_profile`, `alamat`, `tanggal_lahir`, `phone`, `instagram`, `twitter`, `facebook`, `password`, `remember_token`, `admin_verified_at`, `admin_verified_by`, `created_at`, `updated_at`) VALUES
(1, 'Khaeruddin Asdar', 'khaeruddinasdar12@gmail.com', '2019-11-16 16:00:00', 'active', 'foto_ktp/e4VLNyqJyv7lzCyMIeMOVfYCD6hfTvtBsxD9Nqg0.jpeg', 'selfie_ktp/rUcmNlg6mYhReFZMe8Q4rSElk3vySkadC5gjTMAr.jpeg', '78789798789987', '', 'btp, makassar Koe belah', '2019-11-06', '0823449494505', NULL, NULL, NULL, '$2y$10$6EHZ7T/Kfr2XWU0b/NDGw.DFxv6jROc5Nw5lDAWzD99leA0vNJX/.', 'PMsJWE9L2pEDapNNPOWNfqzQWZDQLNcNjFJV8LtRjRUyQmaywflwrvkaYtqJ', NULL, NULL, '2019-10-20 04:34:02', '2019-11-22 19:46:55'),
(7, 'Juliastri', 'juli@gmail.com', '2019-11-12 16:00:00', 'active', NULL, NULL, '11323123123', NULL, 'btp, makassar koe', '2019-11-05', '082344949505', 'asdar', 'qweqwe', 'seqwe', '$2y$10$W6q82xazfJtLyn.egwkHcepdPJl2uNrpfG7ToMbdNPQ5GItKS9x/O', NULL, NULL, NULL, '2019-10-29 17:24:38', '2019-11-15 15:34:09'),
(10, 'Keru', 'mulayfor@gmail.com', NULL, 'active', NULL, NULL, '23758137567165', NULL, NULL, NULL, '0987654321', NULL, NULL, NULL, '$2y$10$d8Aqs97//rv9zB2L0W4rWO6eYLRjdrOXt2LGS5KXW.HEFUsCBRU2.', NULL, NULL, NULL, '2019-11-14 00:00:56', '2019-11-14 00:00:56'),
(11, 'boy', 'muhsinshaleh@gmail.com', NULL, 'active', NULL, NULL, '78798', NULL, NULL, NULL, '0989786786767', NULL, NULL, NULL, '$2y$10$BLanm8IwTVSkcLte8iTSreZ1ii5fDi15Pw1VZS4/1nfXQcAUJIJU2', NULL, NULL, NULL, '2019-11-14 00:58:17', '2019-11-14 00:58:17'),
(18, 'Juliastri', 'juliastri@gmail.com', '2019-11-16 16:00:00', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$IekBWDxxjYjYUbLeHZJ9bOx7HZkyCykxPzXVYBOA7H9J4hfuupi6.', NULL, NULL, NULL, '2019-11-16 18:42:59', '2019-11-16 18:42:59'),
(19, 'Adhe Pratama', 'adheejr77@gmail.com', NULL, 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$x5lIK2A9Bpl57CfkBrfHW.J6P3YAxp6pPf05QVZEAZkd63JKfWY/y', NULL, NULL, NULL, '2019-11-19 00:24:57', '2019-11-19 00:29:15'),
(20, 'Tomi', 'tommydarma16@gmail.com', '2019-11-22 16:00:00', 'active', NULL, NULL, '78789798789987', NULL, 'btp, makassar', '2019-11-15', '082344949505', NULL, NULL, NULL, '$2y$10$y6SxHPEDJNrvc10OjhL9suJE4rbDlfVNref5.CbwcsJQ5papzlqPu', NULL, NULL, NULL, '2019-11-22 19:48:48', '2019-11-22 19:54:41'),
(21, 'apul', 'apullo.20@gmail.com', '2019-11-22 23:25:08', 'active', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$fePUTq.RTy/yTl.S6VOpnuSpqq6K1895p6aWVEdImMmlrTyk61fA6', NULL, NULL, NULL, '2019-11-22 22:51:41', '2019-11-22 23:25:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_created_by_foreign` (`created_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `porters`
--
ALTER TABLE `porters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `porters_created_by_foreign` (`created_by`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `porters`
--
ALTER TABLE `porters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `porters`
--
ALTER TABLE `porters`
  ADD CONSTRAINT `porters_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
