-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 11:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scomptec`
--

-- --------------------------------------------------------

--
-- Table structure for table `instruktur`
--

CREATE TABLE `instruktur` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tgl_bergabung` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instruktur`
--

INSERT INTO `instruktur` (`id`, `nama`, `alamat`, `telepon`, `email`, `status`, `tgl_lahir`, `tgl_bergabung`, `created_at`, `updated_at`) VALUES
(18, 'Mahfud Efendi', 'Jl. Temporary Test No. 123 Surabaya', '081234567890', 'm.efendi@gmail.com', 'Full Time', '1876-03-22', '2019-09-28', '2019-09-28 04:25:41', '2019-09-28 04:25:41'),
(19, 'Adi Wielijarni', 'Jl. Temporary Test No. 13 Surabaya', '089612345678', 'adi.w@gmail.com', 'Full Time', '1876-04-22', '2019-09-28', '2019-09-28 04:26:22', '2019-11-10 19:49:20'),
(21, 'Setioko', 'Jl. HR. Muhammad no. 13, Surabaya', '089612351234', 'setioko@gmail.com', 'Full Time', '1993-10-30', '2019-10-18', '2019-10-18 04:07:46', '2019-10-18 04:07:46'),
(22, 'Faisal Nurmansyah', 'Jl. Kedung Rukem 4 no. 22, Surabaya', '089642135837', 'faisal@gmail.com', 'Full Time', '1997-01-13', '2019-10-18', '2019-10-18 04:11:14', '2019-10-18 04:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `instruktur_id` int(11) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asisten1` int(11) DEFAULT 0,
  `asisten2` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `program_kursus_id` int(11) NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `durasi` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `jenis_kelas` enum('REG','PRI') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `program_kursus_id`, `kode`, `durasi`, `kapasitas`, `status`, `jenis_kelas`, `created_at`, `updated_at`) VALUES
(3, 10, 'CAD.001', 90, 12, 'Aktif', 'REG', '2019-09-25 19:29:08', '2019-09-25 19:29:08'),
(5, 10, 'CAD.002', 45, 10, 'Aktif', 'REG', '2019-09-25 19:32:19', '2019-09-25 19:32:19'),
(12, 27, 'ADM.004', 45, 20, '', 'REG', '2019-09-26 03:59:14', '2019-09-26 03:59:14'),
(14, 10, 'CAD.003', 45, 10, 'Aktif', 'REG', '2019-09-26 04:03:48', '2019-09-26 04:03:48'),
(15, 27, 'ADM.001', 60, 15, 'Aktif', 'REG', '2019-09-26 04:07:01', '2019-09-26 04:38:51'),
(16, 27, 'ADM.002', 45, 12, '', 'REG', '2019-09-26 04:07:57', '2019-09-26 04:07:57'),
(17, 27, 'ADM.003', 90, 20, '', 'REG', '2019-09-26 04:11:11', '2019-09-26 04:11:11'),
(19, 27, 'ADM.005', 45, 25, 'Aktif', 'REG', '2019-09-26 04:47:57', '2019-09-26 04:48:12'),
(22, 27, 'ADM.006', 45, 10, 'Aktif', 'REG', '2019-11-13 02:35:07', '2019-11-13 02:35:07'),
(24, 27, 'ADM.RIZQY', 90, 1, 'Aktif', 'PRI', '2019-11-13 08:33:06', '2019-11-13 08:33:06'),
(25, 27, 'ADM.7', 90, 1, 'Aktif', 'REG', '2019-11-13 08:33:25', '2019-11-13 08:33:25'),
(27, 27, 'CAD.RIZQY', 90, 1, 'Aktif', NULL, '2019-11-13 08:42:25', '2019-11-13 08:42:25'),
(28, 27, 'ADM.8', 90, 4, 'Aktif', NULL, '2019-11-13 08:45:49', '2019-11-13 08:45:49');

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
(4, '2019_09_24_131817_create_program_kursuses_table', 2),
(5, '2019_09_25_014314_create_instrukturs_table', 3),
(6, '2019_09_25_202325_create_role_table', 4),
(8, '2019_09_25_223613_create_kelas_table', 5),
(11, '2019_09_26_203350_create_jadwals_table', 6);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `jenis_pembayaran` enum('Pendaftaran','Cicilan') NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `terima_dari` varchar(50) NOT NULL,
  `jumlah_uang` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `pesan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `jenis_pembayaran`, `pendaftar_id`, `terima_dari`, `jumlah_uang`, `tgl_pembayaran`, `pesan`, `created_at`, `updated_at`) VALUES
(13, 'Pendaftaran', 18, 'Rizqy Edits', 200000, '2019-11-08', 'Tes 1', '2019-11-12 13:48:40', '2019-11-13 07:28:50'),
(14, 'Pendaftaran', 19, 'Rizqy', 200000, '2019-11-11', 'Tes', '2019-11-12 16:35:46', '2019-11-12 16:35:46'),
(15, 'Pendaftaran', 20, 'Faisal', 200000, '2019-11-12', 'Test', '2019-11-12 19:48:15', '2019-11-12 19:48:15'),
(16, 'Pendaftaran', 21, 'Adi', 200000, '2019-11-12', 'Test adi', '2019-11-13 04:36:16', '2019-11-13 04:36:16'),
(17, 'Pendaftaran', 22, 'Ferdi', 200000, '2019-11-13', 'test ferdi', '2019-11-13 04:43:04', '2019-11-13 04:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `jenis_kursus` enum('Private','Reguler') NOT NULL,
  `program_kursus_id` int(11) NOT NULL,
  `biaya_pendaftaran` int(11) NOT NULL,
  `biaya_kursus` int(11) NOT NULL,
  `status_pembayaran` enum('Lunas','Belum Lunas') DEFAULT 'Belum Lunas',
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `gelar_akademis` varchar(50) DEFAULT '-',
  `alamat` varchar(250) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telepon` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `jenis_kursus`, `program_kursus_id`, `biaya_pendaftaran`, `biaya_kursus`, `status_pembayaran`, `nama`, `jenis_kelamin`, `gelar_akademis`, `alamat`, `kota`, `kode_pos`, `telepon`, `email`, `tgl_lahir`, `created_at`, `updated_at`) VALUES
(18, 'Reguler', 9, 200000, 750000, 'Lunas', 'Rizqy Nurmansyah', 'Laki-laki', 'S1', 'Jl. Kedung Rukem 4 No 22', 'Surabaya', 60261, '081234567890', 'pixeldoz@gmail.com', '1995-11-22', '2019-11-12 13:48:06', '2019-11-12 13:48:40'),
(19, 'Reguler', 27, 200000, 550000, 'Lunas', 'Fisyahbilillah', 'Perempuan', NULL, 'Jl. Kedung Rukem 4 No 22', 'Surabaya', 60261, '08962348529', 'test@gmail.com', '0204-05-20', '2019-11-12 13:54:45', '2019-11-12 16:35:46'),
(20, 'Reguler', 27, 200000, 550000, 'Lunas', 'Faisan Ramadhan', 'Laki-laki', 'S1', 'Jl. Kedung Rukem 4 No 22', 'Surabaya', 60261, '08962348529', 'pixeldoz@gmail.com', '1997-11-13', '2019-11-12 17:01:08', '2019-11-12 19:48:15'),
(21, 'Reguler', 9, 200000, 750000, 'Lunas', 'Adi Wielijarni', 'Laki-laki', 'S1', 'Jl. Test lorem 2 no 1', 'Surabaya', 60261, '08962348529', 'pixeldoz@gmail.com', '1996-11-13', '2019-11-13 04:34:49', '2019-11-13 04:36:16'),
(22, 'Reguler', 27, 200000, 550000, 'Lunas', 'Ferdi R', 'Laki-laki', NULL, 'Jl. Kedung Rukem 4 No 22', 'Surabaya', 60261, '0312345678', 'pixeldoz@gmail.com', '2019-11-13', '2019-11-13 04:40:57', '2019-11-13 04:43:04'),
(23, 'Private', 27, 200000, 2150000, 'Belum Lunas', 'Aang Rikad', 'Laki-laki', 'S1', 'Jl. Kedung Rukem 4 No 22', 'Surabaya', 60261, '081234567890', 'pixeldoz@gmail.com', '1995-11-06', '2019-11-13 07:09:16', '2019-11-13 07:09:16'),
(26, 'Reguler', 10, 250000, 750000, 'Belum Lunas', '12312r1', 'Laki-laki', '123', '123123', 'Surabaya', 60261, '12312', 'pixeldoz@gmail.com', '2019-11-18', '2019-11-13 07:47:23', '2019-11-13 07:47:23'),
(27, 'Reguler', 10, 250000, 750000, 'Belum Lunas', '12312r1', 'Laki-laki', '123', '123123', 'Surabaya', 60261, '12312', 'pixeldoz@gmail.com', '2019-11-18', '2019-11-13 07:47:51', '2019-11-13 07:47:51'),
(28, 'Reguler', 15, 200000, 800000, 'Belum Lunas', '12312312', 'Laki-laki', '2343', '23432', 'Surabaya', 60261, '23432432', 'pixeldoz@gmail.com', '2019-11-12', '2019-11-13 07:49:59', '2019-11-13 07:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `program_kursus`
--

CREATE TABLE `program_kursus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biaya_pendaftaran` int(11) NOT NULL DEFAULT 0,
  `biaya_reguler` int(11) NOT NULL DEFAULT 0,
  `biaya_private` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_kursus`
--

INSERT INTO `program_kursus` (`id`, `nama`, `kode`, `biaya_pendaftaran`, `biaya_reguler`, `biaya_private`, `created_at`, `updated_at`) VALUES
(9, 'Desain Grafis', 'DPB', 200000, 750000, 2000000, '2019-09-24 09:44:32', '2019-09-24 09:44:32'),
(10, 'AutoCAD 23/3D', 'CAD', 250000, 750000, 2250000, '2019-09-24 09:44:54', '2019-09-24 09:44:54'),
(11, 'PHP', 'PHP', 250000, 800000, 2000000, '2019-09-24 09:45:05', '2019-09-24 09:45:05'),
(12, 'VB.Net', 'VBN', 200000, 550000, 2000000, '2019-09-24 09:45:27', '2019-09-24 09:45:27'),
(13, 'Network - LAN', 'LAN', 200000, 750000, 3000000, '2019-09-24 09:45:42', '2019-09-24 09:45:42'),
(14, 'Teknik Komputer', 'TEK', 250000, 550000, 2250000, '2019-09-24 09:46:12', '2019-09-24 09:46:12'),
(15, 'Digital Marketing', 'DGM', 200000, 800000, 2000000, '2019-09-24 09:46:27', '2019-09-24 09:46:27'),
(16, 'Sertifikasi International', 'SFI', 200000, 550000, 3000000, '2019-09-24 09:46:53', '2019-09-24 09:46:53'),
(17, 'Pemgrograman Android', 'PAN', 250000, 550000, 2250000, '2019-09-24 09:47:17', '2019-09-24 09:47:17'),
(18, 'Macro Excel', 'MAE', 200000, 750000, 2000000, '2019-09-24 09:47:43', '2019-09-24 09:47:43'),
(19, 'Open Office', 'OPO', 200000, 550000, 1500000, '2019-09-24 09:48:04', '2019-09-24 09:48:04'),
(20, 'Internet', 'INT', 200000, 550000, 2000000, '2019-09-24 09:48:48', '2019-09-24 09:48:48'),
(21, 'Game Development', 'GDV', 250000, 800000, 2250000, '2019-09-24 09:49:19', '2019-09-24 09:49:19'),
(27, 'Aplikasi Perkantoran', 'ADM', 200000, 550000, 2150000, '2019-09-24 17:51:40', '2019-11-11 14:16:12'),
(32, 'Test New Program Kursus', 'TNPK', 100000, 500000, 1500000, '2019-11-11 14:04:42', '2019-11-11 14:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', '2019-09-25 13:51:22', '2019-09-25 13:51:25'),
(2, 'Kordinator', '2019-09-25 13:52:15', '2019-09-25 13:52:16'),
(3, 'Admin', '2019-09-25 13:52:38', '2019-09-25 13:52:39'),
(4, 'Keuangan', '2019-09-25 13:52:50', '2019-09-25 13:52:50'),
(5, 'Pengguna', '2019-09-25 13:52:59', '2019-09-25 13:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `pendaftar_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `gelar_akademis` varchar(50) DEFAULT NULL,
  `alamat` varchar(250) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `telepon` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `biaya_kursus` int(11) NOT NULL DEFAULT 0,
  `sisa_pembayaran` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rizqy Nurmansyah', 'superadmin', 'nurmansyah.rizqy@gmail.com', NULL, '$2y$10$n.wUQbSi2ut5WXVrTimOn.xVLF3Fr6G3ik9GqsdkxdceK8bUa.SqW', '1', 'ZcYrWRqYsfWGozCQsrdu8F1tMPb5raMj3lRryqwOVcPAvqySA41hrS32WPJZ', '2019-09-23 10:04:23', '2019-09-23 10:04:23'),
(2, 'Kordinator 01', 'kordinator_01', 'kordinator.01@scomptec.com', NULL, '$2y$10$h3ZzpVnNETWqwIjX2YuhJu3bw0siRjdayAWiFEh.lZ/d5hTB50bZa', '2', 'FqM0v6sQYlJ6dhDhojR8eOleS5VGCGT2EBUVNw8gTiUvBg5U8LRUzEVix4hm', '2019-09-23 10:09:38', '2019-09-23 10:09:38'),
(3, 'Admin 01', 'admin_01', 'admin.01@scomptec.com', NULL, '$2y$10$x3tVrXweRj0S8QuL4D9bKuPOnYJwRDphigEgCLkKtKAbGb9Zc0oh2', '3', 'fZLfZeXicAfuScQFHZ4D7xbNXHPtUjmNye2KDuHAtwws5zSlaLWbzOmfeXOp', '2019-09-23 10:10:11', '2019-09-23 10:10:11'),
(4, 'Keuangan 01', 'keuangan_01', 'keuangan.01@scomptec.com', NULL, '$2y$10$1LbYbZDga/97WUjZJcp/EeJa3oHYn/lHtMxKFz4x4VQPRpNtU7Eoe', '4', '1hasPWI2VgzoAIkI6NHBF6iJRX3uNM01xVC0msktgnvvDhUoNVwFYViexTd4', '2019-09-23 10:10:53', '2019-09-23 10:10:53'),
(5, 'User 01', 'user_01', 'user.01@gmail.com', NULL, '$2y$10$sVnZOy1G/LwscP1JT13LdOVWZ7dR6SX7y2Bmr..WYoZBWt0Z1y38u', '5', 'JSaabPyAqdsA7uftUg3oQzgqPpMoSMYXKlVKDjNTJ8UnDD1zC1G5p153nU9W', '2019-09-23 10:11:20', '2019-09-23 10:11:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instruktur`
--
ALTER TABLE `instruktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_kursus`
--
ALTER TABLE `program_kursus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instruktur`
--
ALTER TABLE `instruktur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `program_kursus`
--
ALTER TABLE `program_kursus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
