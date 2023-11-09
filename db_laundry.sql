-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Nov 2023 pada 20.51
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
('CS001', 'Novia Rahayu Kartika Sari', '0896756454', 'Dsn Perning', '2023-10-08 10:49:06', '2023-10-08 10:49:06'),
('CS002', 'Novaldo Gadha Pamungkas', '087657768', 'Dsn Sidoduwe', '2023-10-08 10:54:37', '2023-10-08 10:54:37'),
('CS003', 'M. Umar Iqbaluddin', '089786763', 'Dsn Sidotangi', '2023-10-08 10:55:12', '2023-10-08 10:55:12'),
('CS004', 'Ayu Sari', '089764783', 'Jln. Hayam Wuruk', '2023-10-09 15:15:39', '2023-10-23 18:38:57'),
('CS005', 'Destiana Indah', '081237568', 'Jln. Raya Perning', '2023-10-23 18:40:45', '2023-10-23 18:40:45'),
('CS006', 'Raffa Ganesha Rama', '082345566', 'Dsn. Kepuh Kelagen', '2023-10-23 18:41:26', '2023-10-23 18:41:26'),
('CS007', 'Galih Ramadhan', '0856783202', 'Dsn. Sidorembug', '2023-10-23 18:42:26', '2023-10-23 18:42:26'),
('CS008', 'Naufal Arif Satrio', '0817234556', 'Jln. Tunas Bangsa', '2023-10-23 18:43:06', '2023-10-23 18:43:06'),
('CS009', 'Yessinta Salsabila', '0811167283', 'Dsn. Sidoduwe', '2023-10-23 18:44:00', '2023-10-23 18:44:00'),
('CS010', 'Aulia Raninta', '0858382798', 'Jln. Bhayangkara', '2023-10-23 18:44:47', '2023-10-23 18:44:47'),
('CS011', 'Vino Syahreza Putra', '082312728', 'Jln. Gajah Mada', '2023-10-23 18:45:41', '2023-10-23 18:45:41'),
('CS012', 'Zein Syafri', '085627823', 'Jln. Terusan', '2023-10-23 19:02:45', '2023-10-23 19:02:45'),
('CS013', 'Shinta Bella', '0821738764', 'Dsn. Gedangan', '2023-10-23 19:03:10', '2023-10-23 19:03:10'),
('CS014', 'Raihan Galih Zakaria', '089728783', 'Jln. Raya Bypass Krian', '2023-10-23 19:04:03', '2023-10-23 19:04:03'),
('CS015', 'Kinan Ryoka', '08971872', 'Dsn. Latsari', '2023-10-23 19:04:41', '2023-10-23 19:04:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers_progress`
--

CREATE TABLE `customers_progress` (
  `id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `progress_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers_progress`
--

INSERT INTO `customers_progress` (`id`, `invoice_id`, `progress_id`, `user_id`, `created_at`, `updated_at`) VALUES
('CP00001', 'INV0001', 'PG01', 'US002', '2023-10-11 14:25:44', '2023-10-11 14:25:44'),
('CP00002', 'INV0001', 'PG02', 'US002', '2023-10-23 18:57:23', '2023-10-23 18:57:23'),
('CP00003', 'INV0001', 'PG03', 'US002', '2023-10-23 18:57:42', '2023-10-23 18:57:42'),
('CP00004', 'INV0001', 'PG05', 'US002', '2023-10-23 18:57:53', '2023-10-23 18:57:53'),
('CP00005', 'INV0001', 'PG06', 'US002', '2023-10-23 18:58:08', '2023-10-23 18:58:08'),
('CP00006', 'INV0006', 'PG01', 'US003', '2023-10-23 19:00:52', '2023-10-23 19:00:52'),
('CP00007', 'INV0006', 'PG02', 'US003', '2023-10-23 19:01:03', '2023-10-23 19:01:03'),
('CP00008', 'INV0006', 'PG03', 'US003', '2023-10-23 19:01:12', '2023-10-23 19:01:12'),
('CP00009', 'INV0006', 'PG04', 'US003', '2023-10-23 19:01:24', '2023-10-23 19:01:24'),
('CP00010', 'INV0006', 'PG05', 'US003', '2023-10-23 19:01:37', '2023-10-23 19:01:37'),
('CP00011', 'INV0006', 'PG06', 'US003', '2023-10-23 19:01:46', '2023-10-23 19:01:46'),
('CP00012', 'INV0007', 'PG01', 'US004', '2023-10-23 20:06:39', '2023-10-23 20:06:39'),
('CP00013', 'INV0012', 'PG04', 'US003', '2023-10-23 20:08:11', '2023-10-23 20:08:11'),
('CP00014', 'INV0009', 'PG01', 'US003', '2023-10-23 20:07:19', '2023-10-23 20:07:19'),
('CP00015', 'INV0010', 'PG01', 'US004', '2023-10-23 20:07:43', '2023-10-23 20:07:43'),
('CP00017', 'INV0012', 'PG05', 'US003', '2023-10-23 20:53:26', '2023-10-23 20:53:26'),
('CP00018', 'INV0007', 'PG02', 'US004', '2023-10-23 20:08:49', '2023-10-23 20:08:49'),
('CP00019', 'INV0008', 'PG04', 'US002', '2023-10-23 20:09:22', '2023-10-23 20:09:22'),
('CP00020', 'INV0009', 'PG02', 'US003', '2023-10-23 20:09:49', '2023-10-23 20:09:49'),
('CP00021', 'INV0007', 'PG03', 'US004', '2023-10-23 20:43:59', '2023-10-23 20:43:59'),
('CP00022', 'INV0008', 'PG05', 'US002', '2023-10-23 20:45:09', '2023-10-23 20:45:09'),
('CP00023', 'INV0009', 'PG03', 'US003', '2023-10-23 20:46:40', '2023-10-23 20:46:40'),
('CP00024', 'INV0010', 'PG03', 'US004', '2023-10-23 20:47:13', '2023-10-23 20:47:13'),
('CP00026', 'INV0012', 'PG06', 'US003', '2023-10-23 20:54:49', '2023-10-23 20:54:49'),
('CP00027', 'INV0008', 'PG06', 'US002', '2023-10-23 21:00:42', '2023-10-23 21:00:42'),
('CP00028', 'INV0007', 'PG04', 'US004', '2023-10-23 21:04:04', '2023-10-23 21:04:04'),
('CP00029', 'INV0009', 'PG04', 'US003', '2023-10-23 21:04:38', '2023-10-23 21:04:38'),
('CP00030', 'INV0010', 'PG04', 'US004', '2023-10-23 21:05:07', '2023-10-23 21:05:07'),
('CP00032', 'INV0007', 'PG05', 'US004', '2023-10-23 21:05:52', '2023-10-23 21:05:52'),
('CP00033', 'INV0009', 'PG05', 'US003', '2023-10-23 21:06:04', '2023-10-23 21:06:04'),
('CP00034', 'INV0010', 'PG05', 'US004', '2023-10-23 21:06:25', '2023-10-23 21:06:25'),
('CP00036', 'INV0007', 'PG06', 'US004', '2023-10-23 21:07:46', '2023-10-23 21:07:46'),
('CP00037', 'INV0009', 'PG06', 'US003', '2023-10-23 21:07:57', '2023-10-23 21:07:57'),
('CP00038', 'INV0010', 'PG06', 'US004', '2023-10-23 21:08:07', '2023-10-23 21:08:07'),
('CP00039', 'INV0013', 'PG01', 'US002', '2023-11-09 19:44:25', '2023-11-09 19:44:25'),
('CP00040', 'INV0013', 'PG02', 'US002', '2023-11-09 19:45:15', '2023-11-09 19:45:15'),
('CP00041', 'INV0013', 'PG03', 'US002', '2023-11-09 19:45:25', '2023-11-09 19:45:25'),
('CP00042', 'INV0013', 'PG04', 'US002', '2023-11-09 19:45:35', '2023-11-09 19:45:35'),
('CP00043', 'INV0013', 'PG05', 'US002', '2023-11-09 19:45:44', '2023-11-09 19:45:44'),
('CP00044', 'INV0013', 'PG06', 'US002', '2023-11-09 19:45:54', '2023-11-09 19:45:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices`
--

CREATE TABLE `invoices` (
  `id` varchar(255) NOT NULL,
  `invoice_date` date NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('paid','unpaid','canceled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_date`, `customer_id`, `total`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
('INV0001', '2023-10-10', 'CS003', 35000, 'US002', 'paid', '2023-10-10 05:27:03', '2023-10-23 18:35:40'),
('INV0002', '2023-10-11', 'CS002', 10000, 'US001', 'canceled', '2023-10-10 19:34:35', '2023-10-10 23:09:17'),
('INV0003', '2023-10-11', 'CS001', 40000, 'US001', 'canceled', '2023-10-10 23:13:17', '2023-10-12 07:01:15'),
('INV0004', '2023-10-11', 'CS004', 10000, 'US002', 'canceled', '2023-10-11 13:03:29', '2023-10-11 13:05:33'),
('INV0005', '2023-10-11', 'CS002', 30000, 'US001', 'canceled', '2023-10-11 13:04:43', '2023-10-12 07:00:29'),
('INV0006', '2023-10-12', 'CS003', 25000, 'US001', 'paid', '2023-10-11 23:46:30', '2023-10-12 06:53:38'),
('INV0007', '2023-10-24', 'CS005', 40000, 'US001', 'paid', '2023-10-23 19:22:58', '2023-10-23 23:50:06'),
('INV0008', '2023-10-24', 'CS007', 20000, 'US001', 'paid', '2023-10-23 20:00:53', '2023-10-23 23:50:25'),
('INV0009', '2023-10-24', 'CS015', 15000, 'US001', 'paid', '2023-10-23 20:01:45', '2023-10-23 23:50:38'),
('INV0010', '2023-10-24', 'CS009', 20000, 'US001', 'paid', '2023-10-23 20:02:19', '2023-10-23 23:50:52'),
('INV0011', '2023-10-24', 'CS014', 15000, 'US001', 'canceled', '2023-10-23 20:02:54', '2023-11-09 13:02:31'),
('INV0012', '2023-10-24', 'CS012', 30000, 'US001', 'paid', '2023-10-23 20:03:47', '2023-10-23 23:52:02'),
('INV0013', '2023-11-09', 'CS014', 15000, 'US001', 'paid', '2023-11-09 13:06:06', '2023-11-09 19:47:26'),
('INV0014', '2023-11-10', 'CS013', 20000, 'US002', 'unpaid', '2023-11-09 19:48:49', '2023-11-09 19:48:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoices_detil`
--

CREATE TABLE `invoices_detil` (
  `id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `uom_id` varchar(255) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `invoices_detil`
--

INSERT INTO `invoices_detil` (`id`, `invoice_id`, `service_id`, `price`, `qty`, `uom_id`, `total`, `created_at`, `updated_at`) VALUES
('IDT00001', 'INV0001', 'SV001', 10000, 3, 'UM01', 30000, '2023-10-10 05:27:03', '2023-10-10 05:27:03'),
('IDT00002', 'INV0001', 'SV005', 5000, 1, 'UM02', 5000, '2023-10-10 05:27:03', '2023-10-10 05:27:03'),
('IDT00003', 'INV0002', 'SV004', 5000, 1, 'UM02', 5000, '2023-10-10 19:34:35', '2023-10-10 19:34:35'),
('IDT00004', 'INV0002', 'SV005', 5000, 1, 'UM02', 5000, '2023-10-10 19:34:35', '2023-10-10 19:34:35'),
('IDT00005', 'INV0003', 'SV002', 20000, 2, 'UM01', 40000, '2023-10-10 23:13:18', '2023-10-10 23:13:18'),
('IDT00006', 'INV0004', 'SV003', 10000, 1, 'UM01', 10000, '2023-10-11 13:03:29', '2023-10-11 13:03:29'),
('IDT00007', 'INV0005', 'SV002', 20000, 1, 'UM01', 20000, '2023-10-11 13:04:43', '2023-10-11 13:04:43'),
('IDT00008', 'INV0005', 'SV005', 5000, 2, 'UM02', 10000, '2023-10-11 13:04:43', '2023-10-11 13:04:43'),
('IDT00009', 'INV0006', 'SV005', 5000, 1, 'UM02', 5000, '2023-10-11 23:46:30', '2023-10-11 23:46:30'),
('IDT00010', 'INV0006', 'SV002', 20000, 1, 'UM01', 20000, '2023-10-11 23:46:30', '2023-10-11 23:46:30'),
('IDT00011', 'INV0007', 'SV002', 20000, 2, 'UM01', 40000, '2023-10-23 19:22:58', '2023-10-23 19:22:58'),
('IDT00012', 'INV0008', 'SV003', 10000, 2, 'UM01', 20000, '2023-10-23 20:00:53', '2023-10-23 20:00:53'),
('IDT00013', 'INV0009', 'SV005', 5000, 3, 'UM02', 15000, '2023-10-23 20:01:45', '2023-10-23 20:01:45'),
('IDT00014', 'INV0010', 'SV002', 20000, 1, 'UM01', 20000, '2023-10-23 20:02:20', '2023-10-23 20:02:20'),
('IDT00015', 'INV0011', 'SV004', 5000, 1, 'UM02', 5000, '2023-10-23 20:02:54', '2023-10-23 20:02:54'),
('IDT00016', 'INV0011', 'SV005', 5000, 2, 'UM02', 10000, '2023-10-23 20:02:54', '2023-10-23 20:02:54'),
('IDT00017', 'INV0012', 'SV003', 10000, 3, 'UM01', 30000, '2023-10-23 20:03:48', '2023-10-23 20:03:48'),
('IDT00018', 'INV0013', 'SV004', 5000, 2, 'UM02', 10000, '2023-11-09 13:06:07', '2023-11-09 13:06:07'),
('IDT00019', 'INV0013', 'SV005', 5000, 1, 'UM02', 5000, '2023-11-09 13:06:07', '2023-11-09 13:06:07'),
('IDT00020', 'INV0014', 'SV001', 10000, 2, 'UM01', 20000, '2023-11-09 19:48:49', '2023-11-09 19:48:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_09_18_204730_uom', 1),
(4, '2023_09_18_204955_services', 1),
(5, '2023_09_18_205214_invoices', 1),
(6, '2023_09_18_210112_payments', 1),
(7, '2023_09_18_210152_invoices_detil', 1),
(8, '2023_09_18_221912_customers', 1),
(9, '2023_09_18_222137_progress', 1),
(10, '2023_10_02_182528_customers_progress', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `id` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `payment_date` date NOT NULL,
  `customer_payment` bigint(20) NOT NULL,
  `customer_return` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('done','canceled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `payment_date`, `customer_payment`, `customer_return`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
('PM0001', 'INV0005', '2023-10-12', 30000, 0, 'US002', 'canceled', '2023-10-12 06:51:44', '2023-10-12 06:52:03'),
('PM0002', 'INV0003', '2023-10-12', 50000, 10000, 'US002', 'canceled', '2023-10-12 06:52:45', '2023-10-12 06:55:40'),
('PM0003', 'INV0006', '2023-10-12', 30000, 5000, 'US001', 'done', '2023-10-12 06:53:38', '2023-10-12 06:53:38'),
('PM0004', 'INV0001', '2023-10-24', 40000, 5000, 'US001', 'done', '2023-10-23 18:35:40', '2023-10-23 18:35:40'),
('PM0005', 'INV0007', '2023-10-24', 40000, 0, 'US001', 'done', '2023-10-23 23:50:06', '2023-10-23 23:50:06'),
('PM0006', 'INV0008', '2023-10-24', 50000, 30000, 'US001', 'done', '2023-10-23 23:50:25', '2023-10-23 23:50:25'),
('PM0007', 'INV0009', '2023-10-24', 20000, 5000, 'US001', 'done', '2023-10-23 23:50:38', '2023-10-23 23:50:38'),
('PM0008', 'INV0010', '2023-10-24', 20000, 0, 'US001', 'done', '2023-10-23 23:50:51', '2023-10-23 23:50:51'),
('PM0009', 'INV0011', '2023-10-24', 15000, 0, 'US001', 'canceled', '2023-10-23 23:51:06', '2023-10-23 23:51:15'),
('PM0010', 'INV0012', '2023-10-24', 30000, 0, 'US001', 'done', '2023-10-23 23:52:02', '2023-10-23 23:52:02'),
('PM0011', 'INV0013', '2023-11-10', 15000, 0, 'US002', 'done', '2023-11-09 19:47:26', '2023-11-09 19:47:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id`, `desc`, `created_at`, `updated_at`) VALUES
('PG01', 'Prewash', '2023-10-08 10:47:35', '2023-10-11 13:18:28'),
('PG02', 'Washing', '2023-10-08 10:47:46', '2023-10-11 13:18:39'),
('PG03', 'Drying', '2023-10-08 10:47:56', '2023-10-11 13:19:15'),
('PG04', 'Pressing', '2023-10-08 10:48:05', '2023-10-11 13:19:30'),
('PG05', 'Packing', '2023-10-11 02:54:18', '2023-10-11 02:55:28'),
('PG06', 'Done', '2023-10-11 02:56:17', '2023-10-11 02:56:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `uom_id` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `desc`, `uom_id`, `price`, `created_at`, `updated_at`) VALUES
('SV001', 'Cuci Saja', 'UM01', 10000, '2023-10-08 10:55:53', '2023-10-08 10:55:53'),
('SV002', 'Cuci Setrika', 'UM01', 20000, '2023-10-08 10:56:17', '2023-10-08 10:56:17'),
('SV003', 'Setrika Saja', 'UM01', 10000, '2023-10-08 10:56:38', '2023-10-08 10:56:38'),
('SV004', 'Selimut', 'UM02', 5000, '2023-10-08 10:57:00', '2023-10-08 10:57:00'),
('SV005', 'Seprei', 'UM02', 5000, '2023-10-08 10:57:24', '2023-10-08 10:57:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uom`
--

CREATE TABLE `uom` (
  `id` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `uom`
--

INSERT INTO `uom` (`id`, `desc`, `created_at`, `updated_at`) VALUES
('UM01', 'kg', '2023-10-08 10:48:21', '2023-10-08 10:48:21'),
('UM02', 'pcs', '2023-10-08 10:48:29', '2023-10-08 10:48:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('owner','employee') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
('US001', 'Novia', 'novia@gmail.com', '$2y$10$oByE3i3oKxj2CbOcEaTUxuzpNrh4Z6K1BCQWH3qwJBLKB3tmRKE46', 'owner', '2023-10-08 10:47:04', '2023-10-23 20:14:26'),
('US002', 'Nia', 'nia@gmail.com', '$2y$10$WG8JAv9sz693PXJF/vTKdudUveID1cMxs.LYlYVJSim0GB3oTd4IS', 'employee', '2023-10-08 10:47:04', '2023-10-23 20:14:16'),
('US003', 'Ratih', 'ratih@gmail.com', '$2y$10$2Ais9rDZDhqv7hcnemG0DOCyVLjgQbFGjptjKppQmBY2laDdsRwGi', 'employee', '2023-10-23 20:14:05', '2023-10-23 20:14:05'),
('US004', 'Salsa', 'salsa@gmail.com', '$2y$10$Y77w/MAXFa.LkNCJJPGQjuvHZM14orH.ikvYS8qlnRpQfAcz6hkLi', 'employee', '2023-10-23 20:14:54', '2023-10-23 20:14:54');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers_progress`
--
ALTER TABLE `customers_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `invoices_detil`
--
ALTER TABLE `invoices_detil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `uom_id` (`uom_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uom_id` (`uom_id`);

--
-- Indeks untuk tabel `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `customers_progress`
--
ALTER TABLE `customers_progress`
  ADD CONSTRAINT `customers_progress_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `customers_progress_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `invoices_detil`
--
ALTER TABLE `invoices_detil`
  ADD CONSTRAINT `invoices_detil_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoices_detil_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `invoices_detil_ibfk_3` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`);

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`uom_id`) REFERENCES `uom` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
