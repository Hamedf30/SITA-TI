-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2024 at 12:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwata`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_sidangs`
--

CREATE TABLE `dokumen_sidangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) DEFAULT NULL,
  `nobp` varchar(225) DEFAULT NULL,
  `laporan_pkl` varchar(225) NOT NULL,
  `lembar_bimbingan` varchar(225) NOT NULL,
  `proposal_ta_id` bigint(20) DEFAULT NULL,
  `laporan_ta` varchar(225) NOT NULL,
  `verifikasi` varchar(225) DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_sidangs`
--

INSERT INTO `dokumen_sidangs` (`id`, `mahasiswa_id`, `nobp`, `laporan_pkl`, `lembar_bimbingan`, `proposal_ta_id`, `laporan_ta`, `verifikasi`, `komentar`, `created_at`, `updated_at`) VALUES
(12, 7, '0812757169', '1720109659_adsasda.docx', '1720109659_asdas.docx', 71, '1720109659_tutor.docx', '1', 'Nice', '2024-07-04 16:14:19', '2024-07-04 16:15:37'),
(13, 9, '5543345623', '1720145973_CV Abdillah Rahman.docx', '1720145973_CV Abdillah Rahman.docx', 72, '1720145973_1718539994_SKPL-KEL1 rev.docx', '1', NULL, '2024-07-05 02:19:33', '2024-07-05 02:20:39'),
(14, 10, '6455434534', '1720152033_essay.docx', '1720152033_essay.docx', 73, '1720152033_essay.docx', NULL, NULL, '2024-07-05 04:00:33', '2024-07-05 04:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `user_id`, `nama`, `nidn`, `prodi_id`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(6, 94, 'Alde Alanda, S.Kom., M.T', '0025088802\n', 7, '08434232', 'Komp. Unand Blok B/III/04/01 Gadut', '2024-06-18 13:49:18', '2024-06-18 13:51:39'),
(7, 60, 'Ainil Mardiah, S.Kom., M.Cs', '0009039307', 9, '0834564312', 'Jl. Bariang Indah I No. 89', '2024-05-30 13:16:48', '2024-07-02 11:06:34'),
(11, 93, 'Aldo Erianda, S.ST., M.T', '0003078904', 6, '08123122', 'Perumahan Jala Utama Rindang Alam 1 Blok C No 1', '2024-06-18 13:50:00', '2024-06-18 13:50:51'),
(12, 98, 'Indri Rahmayuni, S.T., M.T', '0025068301', 7, '078978787', 'Komp. Jondul Rawang Blok Pp No. 4', '2024-06-25 13:31:37', '2024-06-25 13:32:31'),
(13, 99, 'Andrew Kurniawan Vadreas, S.Kom., M.T', '1021028702', 7, '097868755', 'Perum Ardhana Kampung Olo Blok C No 2', '2024-06-25 13:32:06', '2024-06-25 13:33:03'),
(15, 113, 'Harfebi Fryonanda, S.Kom., M.Kom', '0310119101', 7, '834564312', 'Komp. Unand Blok D4.01.03', '2024-06-26 07:07:17', '2024-06-26 07:27:53'),
(16, 121, 'Ir. Hanriyawan Adnan Mooduto, M.Kom', '0010056606', 5, '089675654', 'Jl.Urip Sumoharjo No.11 RT.08', '2024-07-04 12:55:49', '2024-07-04 13:13:38'),
(17, 122, 'Dr. Ir. Yuhefizar, S.Kom., M.Kom', '0013017604', 6, '086755454', 'Komp. Griya Kharisma Permai II, Blok C, No. 9', '2024-07-04 12:56:50', '2024-07-04 13:14:20'),
(18, 123, 'Ir. Rahmat Hidayat, S.T., M.Sc.IT', '1015047801', 7, '086756445', 'Komp. Griya Tui Indah No. C-7, Belimbing', '2024-07-04 13:10:07', '2024-07-04 13:14:48'),
(19, 124, 'Defni, S.Si., M.Kom', '0007128104', 6, '0867675433', 'Limau Manis No. 105 Rt 12 Rw O6', '2024-07-04 13:11:26', '2024-07-04 13:15:12');

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
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan_id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `ruangan_id`, `hari`, `dari_jam`, `sampai_jam`, `created_at`, `updated_at`) VALUES
(3, 8, 'kamis', '11:00:00', '12:00:00', '2024-05-30 15:55:53', '2024-05-31 01:59:08'),
(5, 6, 'kamis', '08:00:00', '10:00:00', '2024-05-30 15:58:12', '2024-05-30 15:58:12'),
(7, 5, 'kamis', '09:00:00', '00:10:00', '2024-06-20 01:29:53', '2024-06-20 01:29:53');

-- --------------------------------------------------------

--
-- Table structure for table `kaprodis`
--

CREATE TABLE `kaprodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama` varchar(225) NOT NULL,
  `nidn` varchar(225) NOT NULL,
  `prodi_id` int(20) UNSIGNED NOT NULL,
  `no_telp` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kaprodis`
--

INSERT INTO `kaprodis` (`id`, `user_id`, `nama`, `nidn`, `prodi_id`, `no_telp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 96, 'Meri Azmi, S.T., M.Cs', '0029068102', 7, '08654564', 'Padang', '2024-06-20 02:47:01', '2024-07-02 11:15:27'),
(2, 126, 'Andre Febrian Kasmar, S.T., M.T.', '0020028804', 5, '08678674', 'Komplek Pemda Limau Manis', '2024-06-20 03:10:41', '2024-07-04 13:26:52'),
(3, 127, 'Taufik Gusman, S.ST., M.Ds', '0010088805', 9, '078978766', 'Padang', '2024-06-20 03:11:47', '2024-07-04 13:27:38'),
(4, 128, 'Roni Putra, S.Kom., M.T', '0022078607', 6, '09898677', 'Padang', '2024-07-04 12:51:58', '2024-07-04 13:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nobp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `prodi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `user_id`, `nobp`, `nama`, `telp`, `alamat`, `prodi_id`, `created_at`, `updated_at`) VALUES
(7, 70, '0812757169', 'Abdillah Rahman', '0789676876', 'Solok', 7, '2024-06-13 09:02:08', '2024-06-13 09:02:41'),
(8, 91, '2133453434', 'Alfa Ramadhan', '0876757656', 'Teluk', 7, '2024-06-18 09:49:32', '2024-06-18 10:10:52'),
(9, 92, '5543345623', 'Farhan', '0832423423', 'Solok', 7, '2024-06-18 13:47:08', '2024-06-18 13:47:53'),
(10, 97, '6455434534', 'Rayhan Juliansyah', '07987765', 'Padang', 7, '2024-06-21 15:16:54', '2024-06-21 15:18:10'),
(13, 119, '2342322323', 'Putra Tanjung', '987978787', 'Solok', 7, '2024-07-04 09:52:03', '2024-07-04 10:18:48');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_03_040519_create_jurusans_table', 1),
(6, '2022_02_03_051314_create_mapels_table', 1),
(7, '2022_02_03_051430_create_gurus_table', 1),
(8, '2022_02_03_051554_create_kelas_table', 1),
(9, '2022_02_03_051656_create_siswas_table', 1),
(10, '2022_02_14_062239_create_materis_table', 1),
(11, '2022_02_15_132849_create_tugas_table', 1),
(12, '2022_02_15_134138_create_jawabans_table', 1),
(13, '2022_11_24_084715_create_jadwals_table', 1),
(14, '2024_06_11_212907_create_sesis_table', 2),
(15, '2024_06_13_110336_create_proposal_tas_table', 3),
(16, '2024_06_16_161503_create_pembimbing1s_table', 4),
(17, '2024_06_16_161541_create_pembimbing2s_table', 5),
(18, '2024_06_19_202551_create_sidang_proposals_table', 6),
(19, '2024_06_20_092404_create_kaprodis_table', 7),
(20, '2024_06_22_164130_create_dokomen_sidangs_table', 8),
(21, '2024_06_23_224446_create_sidang_tas_table', 9),
(22, '2024_06_24_154538_create_nilai_tas_table', 10),
(23, '2024_06_24_160752_create_nilai_ketuas_table', 11),
(24, '2024_06_25_200653_create_nilai_sekretaris_table', 12),
(25, '2024_06_25_201022_create_nilai_penguji2s_table', 13),
(26, '2024_06_25_201047_create_nilai_pembimbing2s_table', 14),
(27, '2024_06_25_201036_create_nilai_pembimbing1s_table', 15),
(28, '2024_06_25_201010_create_nilai_penguji1s_table', 16),
(29, '2024_06_27_084414_create_nilai_tas_table', 17);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ketuas`
--

CREATE TABLE `nilai_ketuas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) DEFAULT NULL,
  `dosen_id` bigint(20) DEFAULT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `p1` double DEFAULT NULL,
  `p2` double DEFAULT NULL,
  `p3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_ketuas`
--

INSERT INTO `nilai_ketuas` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `p1`, `p2`, `p3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(30, 37, 7, 7, 12, 80, 89, 78, 76, 90, 90, 89, 89, 98, 89, 86.3, 'Semangat', '2024-07-04 16:16:34', '2024-07-04 16:19:29'),
(38, 45, 17, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pembimbing1s`
--

CREATE TABLE `nilai_pembimbing1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `b1` double DEFAULT NULL,
  `b2` double DEFAULT NULL,
  `b3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_pembimbing1s`
--

INSERT INTO `nilai_pembimbing1s` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `b1`, `b2`, `b3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(20, 37, 7, 7, 12, 80, 78, 80, 90, 89, 89, 90, 90, 89, 89, 86.45, 'Bagus', '2024-07-04 16:16:34', '2024-07-04 16:19:01'),
(28, 45, 17, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pembimbing2s`
--

CREATE TABLE `nilai_pembimbing2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `b1` double DEFAULT NULL,
  `b2` double DEFAULT NULL,
  `b3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_pembimbing2s`
--

INSERT INTO `nilai_pembimbing2s` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `b1`, `b2`, `b3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(20, 37, 6, 7, 12, 80, 89, 89, 89, 90, 89, 90, 89, 90, 89, 88.8, 'Bagus', '2024-07-04 16:16:34', '2024-07-04 16:24:18'),
(28, 45, 12, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penguji1s`
--

CREATE TABLE `nilai_penguji1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `p1` double DEFAULT NULL,
  `p2` double DEFAULT NULL,
  `p3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_penguji1s`
--

INSERT INTO `nilai_penguji1s` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `p1`, `p2`, `p3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(20, 37, 13, 7, 12, 80, 78, 80, 80, 80, 80, 89, 80, 90, 90, 84.25, 'Naice', '2024-07-04 16:16:34', '2024-07-04 16:22:51'),
(28, 45, 19, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_penguji2s`
--

CREATE TABLE `nilai_penguji2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `p1` double DEFAULT NULL,
  `p2` double DEFAULT NULL,
  `p3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_penguji2s`
--

INSERT INTO `nilai_penguji2s` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `p1`, `p2`, `p3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(20, 37, 11, 7, 12, 80, 89, 90, 90, 89, 89, 78, 89, 90, 78, 84.45, 'Naise', '2024-07-04 16:16:34', '2024-07-04 16:23:30'),
(28, 45, 16, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sekretaris`
--

CREATE TABLE `nilai_sekretaris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `p1` double DEFAULT NULL,
  `p2` double DEFAULT NULL,
  `p3` double DEFAULT NULL,
  `m1` double DEFAULT NULL,
  `m2` double DEFAULT NULL,
  `m3` double DEFAULT NULL,
  `m4` double DEFAULT NULL,
  `m5` double DEFAULT NULL,
  `m6` double DEFAULT NULL,
  `pro` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_sekretaris`
--

INSERT INTO `nilai_sekretaris` (`id`, `sidang_ta_id`, `dosen_id`, `mahasiswa_id`, `dokumen_sidang_id`, `p1`, `p2`, `p3`, `m1`, `m2`, `m3`, `m4`, `m5`, `m6`, `pro`, `total`, `komentar`, `created_at`, `updated_at`) VALUES
(20, 37, 12, 7, 12, 80, 78, 89, 80, 78, 78, 90, 89, 90, 89, 86.1, 'Bagus', '2024-07-04 16:16:34', '2024-07-04 16:21:29'),
(28, 45, 15, 9, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-05 17:10:51', '2024-07-05 17:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tas`
--

CREATE TABLE `nilai_tas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sidang_ta_id` bigint(20) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `total_pem1` double DEFAULT NULL,
  `total_pem2` double DEFAULT NULL,
  `rata_pem` double DEFAULT NULL,
  `total_ketua` double DEFAULT NULL,
  `total_sekretaris` double DEFAULT NULL,
  `total_penguji1` double DEFAULT NULL,
  `total_penguji2` double DEFAULT NULL,
  `rata_penguji` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilai_tas`
--

INSERT INTO `nilai_tas` (`id`, `sidang_ta_id`, `mahasiswa_id`, `total_pem1`, `total_pem2`, `rata_pem`, `total_ketua`, `total_sekretaris`, `total_penguji1`, `total_penguji2`, `rata_penguji`, `total`, `status`, `created_at`, `updated_at`) VALUES
(5, 37, 7, 86.45, 88.8, 87.63, 86.3, 86.1, 84.25, 84.45, 85.28, 86.06, '1', '2024-07-04 16:17:01', '2024-07-04 16:24:49'),
(6, 39, 9, 83.2, 88.85, 86.03, 88.45, 89.4, 88.95, 88.9, 88.93, 87.96, '1', '2024-07-05 02:32:37', '2024-07-05 13:12:00');

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
('kevin@mail.com', '$2y$10$19H2cJT9CPc.P.zUH8Hd4uEW4QBPuRsLszNLukh/3HKYc7j.blpJu', '2024-03-29 13:31:07'),
('kambiacukir29@gmail.com', '$2y$10$yYqKpIAcKBKaC8PSSJjZ4ef0BwowSg7XJg.1sDA9QPTZ9rBh5BARO', '2024-06-15 12:28:22'),
('abdillahrahman2912@gmail.com', '$2y$10$/tzhgbCLoDXnKeVTnM2pue1dejpJ.CGOTycl9CZ/fz9CVPO0u38vq', '2024-06-26 03:42:13'),
('12344321@mail.com', '$2y$10$GhYrKEPQetvUd7BU2WcXGupk1ng.6jN2gPRPJagB.u35kc2VpPNqO', '2024-07-06 16:59:46'),
('admin2@mail.com', '$2y$10$kv0/uVNPAQBdckDU25kyre2VeckHzmw4fCgNrFbMcpkZg031uftqC', '2024-07-06 17:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing1s`
--

CREATE TABLE `pembimbing1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_ta_id` bigint(20) DEFAULT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `dokumen_sidang_id` bigint(20) DEFAULT NULL,
  `status_dokumen` varchar(225) DEFAULT NULL,
  `komentar_dokumen` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbing1s`
--

INSERT INTO `pembimbing1s` (`id`, `proposal_ta_id`, `mahasiswa_id`, `dosen_id`, `status`, `komentar`, `dokumen_sidang_id`, `status_dokumen`, `komentar_dokumen`, `created_at`, `updated_at`) VALUES
(45, 71, 7, 7, '1', 'mantap', 12, '1', 'Hebat', '2024-07-04 16:11:03', '2024-07-04 16:14:47'),
(46, 72, 9, 17, '1', NULL, 13, '1', NULL, '2024-07-05 02:15:22', '2024-07-05 02:19:57'),
(47, 73, 10, 11, '1', NULL, 14, NULL, NULL, '2024-07-05 03:56:46', '2024-07-05 04:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing2s`
--

CREATE TABLE `pembimbing2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_ta_id` bigint(20) DEFAULT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `dosen_id` bigint(20) DEFAULT NULL,
  `status` varchar(225) DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `dokumen_sidang_id` bigint(20) DEFAULT NULL,
  `status_dokumen` varchar(225) DEFAULT NULL,
  `komentar_dokumen` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembimbing2s`
--

INSERT INTO `pembimbing2s` (`id`, `proposal_ta_id`, `mahasiswa_id`, `dosen_id`, `status`, `komentar`, `dokumen_sidang_id`, `status_dokumen`, `komentar_dokumen`, `created_at`, `updated_at`) VALUES
(45, 71, 7, 6, '1', 'Bagus', 12, '1', 'Hebat', '2024-07-04 16:11:03', '2024-07-04 16:15:10'),
(46, 72, 9, 12, '1', NULL, 13, '1', NULL, '2024-07-05 02:15:22', '2024-07-05 02:20:17'),
(47, 73, 10, 13, '1', NULL, 14, NULL, NULL, '2024-07-05 03:56:46', '2024-07-05 04:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodis`
--

INSERT INTO `prodis` (`id`, `nama_prodi`, `created_at`, `updated_at`) VALUES
(5, 'Teknik Komputer', '2024-05-30 10:12:15', '2024-05-30 10:19:22'),
(6, 'Manajemen Informatika', '2024-05-30 10:19:42', '2024-05-30 10:19:42'),
(7, 'Teknologi Rekayasa Perangkat Lunak', '2024-05-30 10:20:00', '2024-05-30 10:20:00'),
(9, 'Animasi', '2024-05-30 15:44:45', '2024-05-30 15:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_tas`
--

CREATE TABLE `proposal_tas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nobp` varchar(255) DEFAULT NULL,
  `judul` varchar(225) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(225) DEFAULT NULL,
  `komentar` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proposal_tas`
--

INSERT INTO `proposal_tas` (`id`, `mahasiswa_id`, `nobp`, `judul`, `file`, `verifikasi`, `komentar`, `created_at`, `updated_at`) VALUES
(71, 7, '0812757169', 'Penerapan JavaScript pada Web', '1720109463_asd.docx', '1', 'Bagus', '2024-07-04 16:11:03', '2024-07-04 16:13:06'),
(72, 9, '5543345623', 'Ui UX', '1720145722_CV Abdillah Rahman.docx', '1', NULL, '2024-07-05 02:15:22', '2024-07-05 02:18:06'),
(73, 10, '6455434534', 'Web Dasar', '1720151806_Permohonan LPDP.docx', '1', NULL, '2024-07-05 03:56:46', '2024-07-05 03:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `nama_ruangan`, `created_at`, `updated_at`) VALUES
(5, 'E204', '2024-05-30 13:18:43', '2024-05-30 13:18:43'),
(6, 'E208', '2024-05-30 13:19:01', '2024-05-30 13:19:01'),
(7, 'E301', '2024-05-30 13:19:08', '2024-05-30 13:19:08'),
(8, 'E304', '2024-05-30 13:19:15', '2024-05-30 13:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `sesis`
--

CREATE TABLE `sesis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dari_jam` time NOT NULL,
  `sampai_jam` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sesis`
--

INSERT INTO `sesis` (`id`, `dari_jam`, `sampai_jam`, `created_at`, `updated_at`) VALUES
(1, '08:00:00', '10:00:00', '2024-06-13 04:31:22', '2024-06-13 04:31:22'),
(2, '10:00:00', '12:00:00', '2024-06-20 02:48:37', '2024-06-20 02:48:37'),
(3, '13:00:00', '15:00:00', '2024-06-20 02:49:20', '2024-06-20 02:49:20'),
(4, '15:00:00', '17:00:00', '2024-06-20 02:49:40', '2024-06-20 02:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_proposals`
--

CREATE TABLE `sidang_proposals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proposal_ta_id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `sesi` varchar(225) NOT NULL,
  `mahasiswa_id` bigint(20) NOT NULL,
  `pem1_id` bigint(20) NOT NULL,
  `pem2_id` bigint(20) NOT NULL,
  `penguji_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_proposals`
--

INSERT INTO `sidang_proposals` (`id`, `proposal_ta_id`, `tanggal`, `ruangan`, `sesi`, `mahasiswa_id`, `pem1_id`, `pem2_id`, `penguji_id`, `created_at`, `updated_at`) VALUES
(8, 71, '2024-07-06', '6', '2', 7, 7, 6, 13, '2024-07-04 16:13:32', '2024-07-04 16:13:32'),
(9, 72, '2024-07-06', '5', '3', 9, 17, 12, 19, '2024-07-05 02:18:44', '2024-07-05 02:18:44'),
(10, 73, '2024-07-19', '6', '2', 10, 11, 13, 17, '2024-07-05 03:59:57', '2024-07-05 03:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `sidang_tas`
--

CREATE TABLE `sidang_tas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumen_sidang_id` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `ruangan` varchar(225) NOT NULL,
  `sesi` varchar(225) NOT NULL,
  `mahasiswa_id` bigint(20) DEFAULT NULL,
  `pem1_id` bigint(20) DEFAULT NULL,
  `pem2_id` bigint(20) DEFAULT NULL,
  `ketua_id` bigint(20) NOT NULL,
  `sekretaris_id` bigint(20) NOT NULL,
  `penguji1_id` bigint(20) NOT NULL,
  `penguji2_id` bigint(20) NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidang_tas`
--

INSERT INTO `sidang_tas` (`id`, `dokumen_sidang_id`, `tanggal`, `ruangan`, `sesi`, `mahasiswa_id`, `pem1_id`, `pem2_id`, `ketua_id`, `sekretaris_id`, `penguji1_id`, `penguji2_id`, `status`, `created_at`, `updated_at`) VALUES
(37, 12, '2024-07-03', '6', '2', 7, 7, 6, 7, 12, 13, 11, '1', '2024-07-04 16:16:34', '2024-07-05 02:07:44'),
(45, 13, '2024-07-03', '8', '2', 9, 17, 12, 17, 15, 19, 16, '1', '2024-07-05 17:10:51', '2024-07-05 17:13:07');

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
  `roles` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `nobp` varchar(255) DEFAULT NULL,
  `nidn` varchar(255) DEFAULT NULL,
  `nip` varchar(225) DEFAULT NULL,
  `permissions` varchar(225) NOT NULL DEFAULT 'view-only',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `remember_token`, `nobp`, `nidn`, `nip`, `permissions`, `created_at`, `updated_at`) VALUES
(6, 'admin', 'admin@mail.com', NULL, '$2y$10$I5yR2kJ4pSQoH1rjL3QfXeTcZG4ZMhPBNjVGY.cvOy8jkmCVc5PkS', 'admin', NULL, NULL, NULL, '1022122345', 'all', '2024-03-29 06:10:20', '2024-03-29 06:10:20'),
(60, 'Ainil Mardiah', 'ainil@mail.com', NULL, '$2y$10$qtmJslRO4tFyQFL8YuJOkOGEkrJtEueue1x34/wqjIjhEU5oeuw9m', 'dosen', NULL, NULL, '	0009039307', NULL, 'view-only', '2024-05-30 13:48:25', '2024-07-06 16:35:13'),
(70, 'Abdillah Rahman', 'abdi@mail.com', NULL, '$2y$10$8nZqeHp4rg/46I6jM6MlVe0YAyblv1C4DjT3/Jy9sevGNjJsGpQyG', 'mahasiswa', NULL, '0812757169', NULL, NULL, 'view-only', '2024-06-13 09:02:41', '2024-06-13 09:02:41'),
(91, 'Alfa Ramadhan', 'alfa@mail.com', NULL, '$2y$10$1wyi98ajvsK7qdMmktQM5uC3I88HQJWupRxdS8DjTDwUn/1l9ZEp.', 'mahasiswa', NULL, '2133453434', NULL, NULL, 'view-only', '2024-06-18 10:10:52', '2024-06-18 10:10:52'),
(92, 'Farhan', 'farhan@mail.com', NULL, '$2y$10$xWwbDUMy1cq1IH6O6.gmluHyZSJJF9CHo6ldTXQoF.XlrN4iMTGgW', 'mahasiswa', NULL, '5543345623', NULL, NULL, 'view-only', '2024-06-18 13:47:53', '2024-06-18 13:47:53'),
(93, 'Aldo Erianda', 'aldo@mail.com', NULL, '$2y$10$tC9xnxGUBMprmuG71LB9EeeGF/rXZqAYlVPYqFfheekyJbJCGAwWC', 'dosen', NULL, NULL, '0003078904', NULL, 'view-only', '2024-06-18 13:50:51', '2024-06-18 13:50:51'),
(94, 'Alde Alanda', 'alde@mail.com', NULL, '$2y$10$M0qNY4Io4LcJTjgRyFnzfunS2qXzvpyjb0hfTjoFi91A0Buiv/TO6', 'dosen', NULL, NULL, '0025088802', NULL, 'view-only', '2024-06-18 13:51:39', '2024-06-18 13:51:39'),
(95, 'Kaprodi', 'kaprodi@mail.com', NULL, '$2y$10$lYcKxjJkgol4rxIOOJuDY.WOwFeioLPukCqYvGxloR59Z5AzbXApy', 'kaprodi', NULL, NULL, '3545342165', NULL, 'view-only', '2024-06-18 16:18:40', '2024-06-18 16:18:40'),
(96, 'Meri Azmi', 'meri@mail.com', NULL, '$2y$10$ZOqU6Q/DLgS2/ZJSI7fqjuBa/14Fded5mq8kIoqNXyvWLw/skC0PG', 'kaprodi', NULL, NULL, '0029068102\r\n', NULL, 'view-only', '2024-06-20 04:17:15', '2024-07-02 11:15:52'),
(97, 'Rayhan Juliansyah', 'rayhan@mail.com', NULL, '$2y$10$XbUIRBznm/vKp9MrI5F3E.F2fL9Z1TAa7hhK9u5rqoOFKxMg1l.pa', 'mahasiswa', NULL, '6455434534', NULL, NULL, 'view-only', '2024-06-21 15:18:10', '2024-07-04 11:02:57'),
(98, 'Indri Rahmayuni', 'indrirahmayuni@mail.com', NULL, '$2y$10$Deb0CQcThmAlhWG.Yo7RmOnVLECrcE0EXadY4uC1zVmvJ.XObPuQK', 'dosen', NULL, NULL, '0025068301', NULL, 'view-only', '2024-06-25 13:32:31', '2024-06-25 13:32:31'),
(99, 'Andrew Kurniawan Vadreas', 'andrew@mail.com', NULL, '$2y$10$LJ/OXJkAFCLNYDWdQRKB/uHNdlO.EXjouxFIJYV3m9vwVcE/i2SDS', 'dosen', NULL, NULL, '1021028702', NULL, 'view-only', '2024-06-25 13:33:03', '2024-06-25 13:33:03'),
(113, 'Harfebi Fryonanda\r\n', 'febi@mail.com', NULL, '$2y$10$MCi9gxZP5xo4gVGLyEW7.OQ.9aQhWPfy9fLydK.qx9XwUZpPaVhLi', 'dosen', NULL, NULL, '0310119101', NULL, 'view-only', '2024-06-26 07:27:53', '2024-06-26 07:27:53'),
(115, 'admin1', '12344321@mail.com', NULL, '$2y$10$HQZQMYQOSc7waADlUBnuKe4ptDgynckQ5JGF7NB1fRdC/4/Gt9uvq', 'admin', NULL, NULL, NULL, '1212323445', 'view-only', '2024-07-02 15:30:12', '2024-07-06 16:02:27'),
(119, 'Putra Tanjung', 'putt@mail.com', NULL, '$2y$10$PTBABBsmRi8k9eeFlF.u4exvv/hiYlKP4kU5K46.ZJhueyc2qXWVW', 'mahasiswa', NULL, '2342322323', NULL, NULL, 'view-only', '2024-07-04 10:18:48', '2024-07-06 16:46:41'),
(121, 'Ir. Hanriyawan Adnan Mooduto, M.Kom', 'moduto@mail.com', NULL, '$2y$10$1cp4Onr1vPXtEvazkg2mKOu0aryzcIY/OWVJPKIz6nBYYT042QL2y', 'dosen', NULL, NULL, '0010056606', NULL, 'view-only', '2024-07-04 13:13:38', '2024-07-04 13:13:38'),
(122, 'Dr. Ir. Yuhefizar, S.Kom., M.Kom', 'yuhefizar@mail.com', NULL, '$2y$10$5HUi2srH94IeSWbiZO/fAemRE7rnbqQsh3xov.mCZ1uBqV6DOQb4C', 'dosen', NULL, NULL, '0013017604', NULL, 'view-only', '2024-07-04 13:14:20', '2024-07-04 13:14:20'),
(123, 'Ir. Rahmat Hidayat, S.T., M.Sc.IT', 'rahmat@mail.com', NULL, '$2y$10$1tZWC7yzoSvWQkDGUMvZTeKJ7CA/4BLGcd7tnFrW.qeqkxfdO7pGq', 'dosen', NULL, NULL, '1015047801', NULL, 'view-only', '2024-07-04 13:14:48', '2024-07-04 13:14:48'),
(124, 'Defni, S.Si., M.Kom', 'defni@mail.com', NULL, '$2y$10$12iR7ciHktDIhMSxLh.TVugFpRCC0fMujvYLKl8.hDhyytrFIGoOq', 'dosen', NULL, NULL, '0007128104', NULL, 'view-only', '2024-07-04 13:15:12', '2024-07-04 13:15:12'),
(126, 'Andre Febrian Kasmar, S.T., M.T.', 'andre@mail.com', NULL, '$2y$10$cNcz54N2OhcfAmd32k0XOuLWtXNCFXYqmJmc4r6RUKEJRH3JvY3zG', 'kaprodi', NULL, NULL, '0020028804', NULL, 'view-only', '2024-07-04 13:26:52', '2024-07-04 13:26:52'),
(127, 'Taufik Gusman, S.ST., M.Ds', 'taufik@mail.com', NULL, '$2y$10$7wcDOycxhG.UplgQvi4VQuo9V3h7mCIciO/u5Ex7QtYujmCcFtTbS', 'kaprodi', NULL, NULL, '0010088805', NULL, 'view-only', '2024-07-04 13:27:38', '2024-07-04 13:27:38'),
(128, 'Roni Putra, S.Kom., M.T', 'roni@mail.com', NULL, '$2y$10$3g8M1jDfgI4.q.pYT58ehOqW2xA3t05IStyb3yTMw8s8oq.RndYvy', 'kaprodi', NULL, NULL, '0022078607', NULL, 'view-only', '2024-07-04 13:28:07', '2024-07-04 13:28:07'),
(130, 'Admin 2 nih', 'admin2@mail.com', NULL, '$2y$10$4WkfL4S7/CfuEwrrpGlb/ucgXfTbVOBuz/4gQZmjXvoMZY2dqVUTO', 'admin', NULL, NULL, NULL, '56756756', 'all', '2024-07-06 16:38:20', '2024-07-06 16:40:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokumen_sidangs`
--
ALTER TABLE `dokumen_sidangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`),
  ADD KEY `dosens_prodi_id_foreign` (`prodi_id`),
  ADD KEY `dosens_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_kelas_id_foreign` (`ruangan_id`);

--
-- Indexes for table `kaprodis`
--
ALTER TABLE `kaprodis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nobp` (`nobp`),
  ADD KEY `mahasiswas_prodi_id_foreign` (`prodi_id`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_ketuas`
--
ALTER TABLE `nilai_ketuas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_pembimbing1s`
--
ALTER TABLE `nilai_pembimbing1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_pembimbing2s`
--
ALTER TABLE `nilai_pembimbing2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_penguji1s`
--
ALTER TABLE `nilai_penguji1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_penguji2s`
--
ALTER TABLE `nilai_penguji2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_sekretaris`
--
ALTER TABLE `nilai_sekretaris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_tas`
--
ALTER TABLE `nilai_tas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembimbing1s`
--
ALTER TABLE `pembimbing1s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembimbing1_dosen_id_foreign` (`dosen_id`);

--
-- Indexes for table `pembimbing2s`
--
ALTER TABLE `pembimbing2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal_tas`
--
ALTER TABLE `proposal_tas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposal_tas_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `proposal_tas_nobp_foreign` (`nobp`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sesis`
--
ALTER TABLE `sesis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang_proposals`
--
ALTER TABLE `sidang_proposals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidang_tas`
--
ALTER TABLE `sidang_tas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `nis` (`nobp`),
  ADD UNIQUE KEY `nis_2` (`nobp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokumen_sidangs`
--
ALTER TABLE `dokumen_sidangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kaprodis`
--
ALTER TABLE `kaprodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nilai_ketuas`
--
ALTER TABLE `nilai_ketuas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `nilai_pembimbing1s`
--
ALTER TABLE `nilai_pembimbing1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nilai_pembimbing2s`
--
ALTER TABLE `nilai_pembimbing2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nilai_penguji1s`
--
ALTER TABLE `nilai_penguji1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nilai_penguji2s`
--
ALTER TABLE `nilai_penguji2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nilai_sekretaris`
--
ALTER TABLE `nilai_sekretaris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `nilai_tas`
--
ALTER TABLE `nilai_tas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembimbing1s`
--
ALTER TABLE `pembimbing1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `pembimbing2s`
--
ALTER TABLE `pembimbing2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `proposal_tas`
--
ALTER TABLE `proposal_tas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sesis`
--
ALTER TABLE `sesis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sidang_proposals`
--
ALTER TABLE `sidang_proposals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sidang_tas`
--
ALTER TABLE `sidang_tas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosens`
--
ALTER TABLE `dosens`
  ADD CONSTRAINT `dosens_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dosens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_kelas_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_prodi_id_foreign` FOREIGN KEY (`prodi_id`) REFERENCES `prodis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
