-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2020 at 12:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik`
--

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
(22, '2020_02_22_080735_create_tabel_pendaftaran', 1),
(40, '2014_10_12_000000_create_users_table', 2),
(41, '2014_10_12_100000_create_password_resets_table', 2),
(42, '2019_08_19_000000_create_failed_jobs_table', 2),
(43, '2020_02_19_144555_create_tabel_dokter', 2),
(44, '2020_02_19_153223_create_tabel_penyakit', 2),
(45, '2020_02_22_080735_create_tabel_anggota', 2),
(46, '2020_02_22_105642_create_tabel_antrian', 2);

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
-- Table structure for table `tabel_anggota`
--

CREATE TABLE `tabel_anggota` (
  `idAnggota` bigint(5) NOT NULL,
  `namaAnggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_anggota`
--

INSERT INTO `tabel_anggota` (`idAnggota`, `namaAnggota`, `ktp`, `usia`, `alamat`, `created_at`, `updated_at`) VALUES
(66, 'Udin', '2009', '25', 'Kopo', '2020-02-23 00:28:56', '2020-02-23 00:28:56'),
(69, 'Kangmas', '123123123', '70', 'Bandung', '2020-02-25 16:35:32', '2020-02-25 16:35:32'),
(70, 'Zakariya', '32731231231238908800', '19', 'Kiaracondong', '2020-02-26 16:40:17', '2020-02-26 16:40:17'),
(71, 'Ahmad', '327318274273410003', '27', 'Antapani', '2020-02-26 16:41:01', '2020-02-26 16:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_antrian`
--

CREATE TABLE `tabel_antrian` (
  `idAntrian` bigint(20) NOT NULL,
  `idAnggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDokter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noAntrian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keluhan` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penyakit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `obat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_antrian`
--

INSERT INTO `tabel_antrian` (`idAntrian`, `idAnggota`, `idDokter`, `noAntrian`, `keluhan`, `status`, `penyakit`, `obat`, `created_at`, `updated_at`) VALUES
(43, '66', '1', '1', 'Pusing Mak', 'dalam proses pengobatan', NULL, NULL, '2020-02-23 00:56:29', '2020-02-25 16:34:10'),
(44, '66', '1', '2', 'Sakit Perut Mak', 'dalam proses pengobatan', NULL, NULL, '2020-02-23 00:57:10', '2020-02-25 16:34:10'),
(45, '66', '1', '1', 'Pusing', 'dalam proses pengobatan', NULL, NULL, '2020-02-25 16:03:04', '2020-02-25 16:34:10'),
(46, '69', '1', '2', 'Maag', 'dalam proses pengobatan', NULL, NULL, '2020-02-25 16:35:32', '2020-02-26 05:35:20'),
(47, '69', '1', '1', 'Sakit Perut', 'selesai berobat', 'qwe', 'akjsdhkjh', '2020-02-26 05:32:44', '2020-02-26 06:02:17'),
(48, '66', '1', '2', 'Sakit Perut', 'selesai berobat', 'maag', 'Optisan', '2020-02-26 16:39:39', '2020-02-26 16:46:14'),
(49, '70', '1', '3', 'Pusing', 'dalam proses pengobatan', NULL, NULL, '2020-02-26 16:40:17', '2020-02-26 16:45:18'),
(50, '71', '1', '4', 'Sakit Perut', 'dalam antrian', NULL, NULL, '2020-02-26 16:41:01', '2020-02-26 16:41:01');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dokter`
--

CREATE TABLE `tabel_dokter` (
  `idDokter` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kualifikasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenisKelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempatPraktek` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `universitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'tidak hadir',
  `alamat` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_dokter`
--

INSERT INTO `tabel_dokter` (`idDokter`, `nama`, `foto`, `str`, `kualifikasi`, `jenisKelamin`, `tempatPraktek`, `universitas`, `kontak`, `status`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Maman', NULL, '123123123', 'Dokter Umum', 'Pria', NULL, 'UI', '0981231823612', 'hadir', 'kopo', '2020-02-22 07:17:15', '2020-02-23 00:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penyakit`
--

CREATE TABLE `tabel_penyakit` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tabel_penyakit`
--

INSERT INTO `tabel_penyakit` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Tipes', 'Tifus (tipes) atau demam tifoid adalah penyakit yang disebabkan oleh infeksi bakteri Salmonella typhii. Tifus dapat menular dengan cepat, umumnya melalui konsumsi makanan atau minuman yang sudah terkontaminasi tinja yang mengandung bakteri Salmonella typhii. Pada kasus yang jarang terjadi, penularan tifus dapat terjadi karena terpapar urine yang sudah terinfeksi bakteri Salmonella typhii.', '2020-02-25 02:12:10', '2020-02-26 16:42:50'),
(3, 'migren', 'Migren merupakan gangguan nyeri kepala heterogen, dengan nyeri hebat dan berdurasi lama dibandingkan nyeri kepala lainnya. Karakteristik migren di antaranya, berlokasi unilateral, nyeri berdenyut (pulsating) dengan intensitas sedang atau berat yang diperberat oleh aktivitas fisik rutin.', '2020-02-25 16:43:21', '2020-02-26 16:43:46'),
(4, 'maag', 'Sakit maag atau dispepsia adalah gejala penyakit berupa rasa nyeri dan panas pada lambung yang terjadi akibat sejumlah kondisi. Di antaranya adalah luka terbuka pada lapisan dalam lambung (tukak lambung), infeksi bakteri Helicobacter pylori, efek samping penggunaan obat antiinflamasi nonsteroid (OAINS), dan stres.', '2020-02-26 16:44:21', '2020-02-26 16:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', NULL, '$2y$10$lHCfQMm8r2PvB62OUQmZI.VDH6ymFIUt0uZQSfMbazHKrv8bQdGWe', NULL, 'Admin', '2020-02-22 07:16:50', '2020-02-24 20:37:43'),
(16, 'dokter', 'dokter', NULL, '$2y$10$Fau9vc/u7dprvJbHw46Q2eK8yB/fSZbz6CiocaqABs60i3Rx19JB2', NULL, 'Dokter', '2020-02-25 00:56:11', '2020-02-25 00:56:11'),
(17, 'petugas', 'petugas', NULL, '$2y$10$Fau9vc/u7dprvJbHw46Q2eK8yB/fSZbz6CiocaqABs60i3Rx19JB2', NULL, 'Petugas', '2020-02-25 00:56:11', '2020-02-25 00:56:11');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  ADD PRIMARY KEY (`idAnggota`);

--
-- Indexes for table `tabel_antrian`
--
ALTER TABLE `tabel_antrian`
  ADD PRIMARY KEY (`idAntrian`);

--
-- Indexes for table `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  ADD PRIMARY KEY (`idDokter`);

--
-- Indexes for table `tabel_penyakit`
--
ALTER TABLE `tabel_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tabel_anggota`
--
ALTER TABLE `tabel_anggota`
  MODIFY `idAnggota` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tabel_antrian`
--
ALTER TABLE `tabel_antrian`
  MODIFY `idAntrian` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tabel_dokter`
--
ALTER TABLE `tabel_dokter`
  MODIFY `idDokter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tabel_penyakit`
--
ALTER TABLE `tabel_penyakit`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
