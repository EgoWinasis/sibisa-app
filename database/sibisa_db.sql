-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 06 Bulan Mei 2024 pada 05.42
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibisa_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `beasiswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id`, `siswa_id`, `beasiswa`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(13, 20, NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(14, 21, NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(15, 22, NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(16, 23, NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(17, 24, NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(18, 25, NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(19, 26, NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(20, 27, NULL, '2024-04-06 07:49:10', '2024-04-06 07:49:10'),
(21, 28, NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(22, 29, NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(23, 30, NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(24, 31, NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(25, 32, NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(26, 33, NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `id` bigint UNSIGNED NOT NULL,
  `id_siswa` int NOT NULL,
  `kelas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggal_kelas` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id`, `id_siswa`, `kelas`, `tinggal_kelas`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(89, 19, '1', 'false', '2023/2024', '2023-05-04 17:49:00', '2024-05-03 10:06:59'),
(90, 19, '2', 'false', NULL, '2023-05-04 17:49:00', '2023-11-17 21:32:47'),
(91, 19, '3', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(92, 19, '4', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(93, 19, '5', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(94, 19, '6', 'false', NULL, '2023-05-04 17:49:00', '2023-05-04 17:49:00'),
(95, 20, '1', 'false', '2023/2024', '2024-04-06 07:32:25', '2024-05-01 09:43:18'),
(96, 20, '2', 'false', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(97, 20, '3', 'false', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(98, 20, '4', 'false', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(99, 20, '5', 'false', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(100, 20, '6', 'false', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(101, 21, '1', 'false', NULL, '2024-04-06 07:34:49', '2024-04-08 10:20:49'),
(102, 21, '2', 'false', '2023/2024', '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(103, 21, '3', 'false', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(104, 21, '4', 'false', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(105, 21, '5', 'false', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(106, 21, '6', 'false', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(107, 22, '1', 'false', NULL, '2024-04-06 07:37:30', '2024-04-08 10:20:49'),
(108, 22, '2', 'false', '2023/2024', '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(109, 22, '3', 'false', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(110, 22, '4', 'false', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(111, 22, '5', 'false', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(112, 22, '6', 'false', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(113, 23, '1', 'false', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(114, 23, '2', 'false', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(115, 23, '3', 'false', '2023/2024', '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(116, 23, '4', 'false', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(117, 23, '5', 'false', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(118, 23, '6', 'false', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(119, 24, '1', 'false', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(120, 24, '2', 'false', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(121, 24, '3', 'false', '2023/2024', '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(122, 24, '4', 'false', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(123, 24, '5', 'false', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(124, 24, '6', 'false', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(125, 25, '1', 'false', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(126, 25, '2', 'false', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(127, 25, '3', 'false', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(128, 25, '4', 'false', '2023/2024', '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(129, 25, '5', 'false', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(130, 25, '6', 'false', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(131, 26, '1', 'false', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(132, 26, '2', 'false', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(133, 26, '3', 'false', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(134, 26, '4', 'false', '2023/2024', '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(135, 26, '5', 'false', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(136, 26, '6', 'false', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(137, 27, '1', 'false', NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(138, 27, '2', 'false', NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(139, 27, '3', 'false', NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(140, 27, '4', 'false', NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(141, 27, '5', 'false', '2023/2024', '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(142, 27, '6', 'false', NULL, '2024-04-06 07:49:11', '2024-04-08 10:42:15'),
(143, 28, '1', 'false', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(144, 28, '2', 'false', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(145, 28, '3', 'false', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(146, 28, '4', 'false', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(147, 28, '5', 'false', '2023/2024', '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(148, 28, '6', 'false', NULL, '2024-04-06 07:50:57', '2024-04-08 10:42:15'),
(149, 29, '1', 'false', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(150, 29, '2', 'false', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(151, 29, '3', 'false', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(152, 29, '4', 'false', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(153, 29, '5', 'false', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(154, 29, '6', 'false', '2023/2024', '2024-04-06 08:02:46', '2024-04-08 10:42:28'),
(155, 30, '1', 'false', NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(156, 30, '2', 'false', NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(157, 30, '3', 'false', NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(158, 30, '4', 'false', NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(159, 30, '5', 'false', NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(160, 30, '6', 'false', '2023/2024', '2024-04-06 08:04:16', '2024-04-08 10:42:28'),
(161, 31, '1', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(162, 31, '2', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(163, 31, '3', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(164, 31, '4', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(165, 31, '5', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(166, 31, '6', 'false', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(167, 32, '1', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(168, 32, '2', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(169, 32, '3', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(170, 32, '4', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(171, 32, '5', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(172, 32, '6', 'false', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(173, 33, '1', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42'),
(174, 33, '2', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42'),
(175, 33, '3', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42'),
(176, 33, '4', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42'),
(177, 33, '5', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42'),
(178, 33, '6', 'false', NULL, '2024-04-30 23:01:42', '2024-04-30 23:01:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b1c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `created_at`, `updated_at`) VALUES
(16, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(17, '2022/2023', '2', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(19, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', '90', 'Selalu aktif dalam mengikuti pelajaran dan berpartisipasi aktif dalam diskusi serta kegiatan pembelajaran lainnya.', '70', 'Ikuti kegiatan ekskul dengan aktif dan antusias, serta jadilah anggota yang proaktif dalam berkontribusi.', '2024-04-08 09:38:04', '2024-05-03 23:45:18'),
(20, '2023/2024', '1', 'ADE VIKA FITRIANA', NULL, NULL, NULL, NULL, '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jen_kel` varchar(50) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `jen_kel`, `tempat_lahir`, `tgl_lahir`, `alamat`, `telepon`, `jabatan`, `status`, `created_at`, `updated_at`) VALUES
(1, '197005241999032005', 'Ely Hastuti , S.Pd.SD', 'Perempuan', 'TEGAL', '1985-12-08', 'Mejasem', '089694589456', 'Kepala Sekolah', 'Aktif', '2024-05-01 06:48:12', '2024-05-01 07:03:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ijazah`
--

CREATE TABLE `ijazah` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skhun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ijazah`
--

INSERT INTO `ijazah` (`id`, `id_siswa`, `ijazah`, `skl`, `skhun`, `created_at`, `updated_at`) VALUES
(3, '19', '645453501f3e8.pdf', '645453502b411.pdf', '645453502c239.pdf', '2023-05-04 17:52:32', '2023-05-04 17:52:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kenaikan`
--

CREATE TABLE `kenaikan` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kenaikan`
--

INSERT INTO `kenaikan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `status`, `status_kelas`, `created_at`, `updated_at`) VALUES
(6, '2022/2023', '1', 'Ahmad Sodikin', 'Naik', '2', '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(7, '2022/2023', '2', 'Ahmad Sodikin', 'Naik', '1', '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(9, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', 'Naik', '2', '2024-04-08 09:38:04', '2024-05-03 23:47:07'),
(10, '2023/2024', '1', 'ADE VIKA FITRIANA', 'Naik', '1', '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kesehatan_jasmani`
--

CREATE TABLE `kesehatan_jasmani` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `jas_th_1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_3` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_4` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_5` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_th_6` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_3` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_4` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_5` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_bb_6` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_1` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_2` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_3` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_4` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_5` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_tb_6` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_pt_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jas_kj_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kesehatan_jasmani`
--

INSERT INTO `kesehatan_jasmani` (`id`, `siswa_id`, `jas_th_1`, `jas_th_2`, `jas_th_3`, `jas_th_4`, `jas_th_5`, `jas_th_6`, `jas_bb_1`, `jas_bb_2`, `jas_bb_3`, `jas_bb_4`, `jas_bb_5`, `jas_bb_6`, `jas_tb_1`, `jas_tb_2`, `jas_tb_3`, `jas_tb_4`, `jas_tb_5`, `jas_tb_6`, `jas_pt_1`, `jas_pt_2`, `jas_pt_3`, `jas_pt_4`, `jas_pt_5`, `jas_pt_6`, `jas_kj_1`, `jas_kj_2`, `jas_kj_3`, `jas_kj_4`, `jas_kj_5`, `jas_kj_6`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(13, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(14, 21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(15, 22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(16, 23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(17, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(18, 25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(19, 26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(20, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:49:10', '2024-04-06 07:49:10'),
(21, 28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(22, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(23, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(24, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(25, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(26, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketidakhadiran`
--

CREATE TABLE `ketidakhadiran` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sakit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `izin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanpa_keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ketidakhadiran`
--

INSERT INTO `ketidakhadiran` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `sakit`, `izin`, `tanpa_keterangan`, `created_at`, `updated_at`) VALUES
(15, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(16, '2022/2023', '2', 'Ahmad Sodikin', NULL, NULL, NULL, '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(18, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', '0', '0', '999', '2024-04-08 09:38:04', '2024-05-03 18:54:58'),
(19, '2023/2024', '1', 'ADE VIKA FITRIANA', NULL, NULL, NULL, '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetensi`
--

CREATE TABLE `kompetensi` (
  `id` int UNSIGNED NOT NULL,
  `id_siswa` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_1_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_1_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_2_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_2_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_3_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_3_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_4_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_4_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_5_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_5_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_6_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_6_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_7` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kls` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_7_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_7_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mapel_8` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kls_2` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ck_8_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ck_8_2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kompetensi`
--

INSERT INTO `kompetensi` (`id`, `id_siswa`, `mapel_1`, `ck_1_1`, `ck_1_2`, `mapel_2`, `ck_2_1`, `ck_2_2`, `mapel_3`, `ck_3_1`, `ck_3_2`, `mapel_4`, `ck_4_1`, `ck_4_2`, `mapel_5`, `ck_5_1`, `ck_5_2`, `mapel_6`, `ck_6_1`, `ck_6_2`, `mapel_7`, `kls`, `ck_7_1`, `ck_7_2`, `mapel_8`, `kls_2`, `ck_8_1`, `ck_8_2`, `created_at`, `updated_at`) VALUES
(3, '19', 'Matematika', 'Peserta didik menunjukkan pemahaman pecahan sebagai bagian dari keseluruhan melalui konteks membagi sebuah benda atau kumpulan benda sama banyak, pecahan yang diperkenalkan adalah setengah dan seperempat.', 'peserta didik dapat membandingkan panjang dan berat benda secara langsung, dan membandingkan durasi waktu. Mereka dapat mengukur dan mengestimasi panjang benda menggunakan satuan tidak baku', 'Bahasa Indonesia', 'Peserta didik mampu memahami ide pokok (gagasan) suatu pesan lisan, informasi dari media audio, teks aural (teks yang dibacakan dan/atau didengar), dan instruksi lisan yang berkaitan dengan tujuan berkomunikasi. Peserta didik mampu memahami dan memaknai teks narasi yang dibacakan atau dari media audio', 'Peserta didik mampu memahami ide pokok (gagasan) suatu pesan lisan, informasi dari media audio, teks aural (teks yang dibacakan dan/atau didengar), dan instruksi lisan yang berkaitan dengan tujuan berkomunikasi. Peserta didik mampu memahami dan memaknai teks narasi yang dibacakan atau dari media audio', 'PPKN', 'Peserta didik mampu mengenal dan menceritakan simbol dan sila-sila Pancasila dalam lambang negara Garuda Pancasila. Peserta didik mampu mengidentifikasi dan menjelaskan hubungan antara simbol dan sila dalam lambang negara Garuda Pancasila. Peserta didik mampu menerapkan nilainilai Pancasila di lingkungan keluarga dan sekolah', 'Peserta didik mampu mengenal aturan di lingkungan keluarga dan sekolah. Peserta didik mampu menceritakan contoh sikap mematuhi dan tidak mematuhi aturan di keluarga dan sekolah. Peserta didik mampu menunjukkan perilaku mematuhi aturan di keluarga dan sekolah.', 'PAI', 'Peserta didik mampu membaca surah-surah pendek atau ayat Al-Qur’an dan menjelaskan pesan pokoknya dengan baik. Peserta didik mengenal hadis tentang kewajiban salat dan menjaga hubungan baik dengan sesama serta mampu menerapkan dalam kehidupan seharihari', 'Peserta didik memahami sifat-sifat bagi Allah, beberapa asmaulhusna, mengenal kitab-kitab Allah, para nabi dan rasul Allah yang wajib diimani.', 'IPAS', 'Peserta didik mengoptimalkan penggunaan pancaindra untuk melakukan pengamatan dan bertanya tentang makhluk hidup dan perubahan benda ketika diberikan perlakuan tertentu. Peserta didik menggunakan hasil pengamatan untuk menjelaskan pola sebab akibat sederhana dengan menggunakan beberapa media/alat bantu.', 'Peserta didik mengenal anggota tubuh manusia (pancaindra), menjelaskan fungsinya dan cara merawatnya dengan benar. Peserta didik dapat membedakan antara hewan dan tumbuhan sesuai dengan bentuk dan ciri-ciri umumnya. Peserta didik mampu mengelaborasikan pemahamannya tentang konsep waktu (pagisiang-sore-malam), mengenal nama-nama hari, nama bulan, kondisi cuaca dalam keterkaitannya dengan aktivitas sehari-hari', 'PJOK', 'peserta didik menunjukkan kemampuan dalam menirukan aktivitas pola gerak dasar, aktivitas senam, aktivitas gerak berirama, dan aktivitas permainan dan olahraga air (kondisional).', 'peserta didik memahami prosedur dalam melakukan pola gerak dasar, aktivitas senam, aktivitas gerak berirama, dan aktivitas permainan dan olahraga air (kondisional).', NULL, '1', NULL, NULL, NULL, '1', NULL, NULL, '2023-05-04 17:51:34', '2024-05-03 22:46:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lain_lain`
--

CREATE TABLE `lain_lain` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `lain_lain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lain_lain`
--

INSERT INTO `lain_lain` (`id`, `siswa_id`, `lain_lain`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(13, 20, NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(14, 21, NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(15, 22, NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(16, 23, NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(17, 24, NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(18, 25, NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(19, 26, NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(20, 27, NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(21, 28, NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(22, 29, NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(23, 30, NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(24, 31, NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(25, 32, NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(26, 33, NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meninggalkan_sekolah`
--

CREATE TABLE `meninggalkan_sekolah` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `thn_tamat` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ijazah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lanjut_sekolah_tamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dari_tingkat` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ke_tingkat` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lanjut_sekolah_pindah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_keluar_sekolah` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alasan_keluar_sekolah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meninggalkan_sekolah`
--

INSERT INTO `meninggalkan_sekolah` (`id`, `siswa_id`, `thn_tamat`, `no_ijazah`, `lanjut_sekolah_tamat`, `dari_tingkat`, `ke_tingkat`, `lanjut_sekolah_pindah`, `tgl_keluar_sekolah`, `alasan_keluar_sekolah`, `created_at`, `updated_at`) VALUES
(12, 19, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(13, 20, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(14, 21, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(15, 22, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(16, 23, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(17, 24, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(18, 25, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(19, 26, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(20, 27, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:49:11', '2024-04-06 07:49:11'),
(21, 28, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(22, 29, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(23, 30, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 08:04:16', '2024-04-06 08:04:16'),
(24, 31, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(25, 32, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(26, 33, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(37, '2014_10_12_000000_create_users_table', 1),
(38, '2014_10_12_100000_create_password_resets_table', 1),
(39, '2019_08_19_000000_create_failed_jobs_table', 1),
(40, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(41, '2023_03_22_034351_create_students_table', 1),
(42, '2023_03_26_073009_create_class_table', 1),
(43, '2023_04_01_080033_create_parents_table', 1),
(44, '2023_04_01_080213_create_progress_students_table', 1),
(50, '2023_04_19_084502_create_pelajar_pancasilas_table', 2),
(51, '2023_04_19_084800_create_pengetahuans_table', 2),
(52, '2023_04_19_084937_create_ekstrakulikulers_table', 2),
(53, '2023_04_19_084953_create_prestasis_table', 2),
(54, '2023_04_19_085027_create_ketidakhadirans_table', 2),
(55, '2023_04_22_235446_create_gurus_table', 3),
(56, '2023_04_28_120535_create_model_kesehatans_table', 4),
(57, '2023_04_28_122145_create_model_beasiswas_table', 4),
(58, '2023_04_28_122607_create_model_meninggalkan_sekolahs_table', 4),
(59, '2023_04_28_123442_create_model_lain_lains_table', 4),
(60, '2023_04_30_043107_create_model_kenaikans_table', 5),
(61, '2023_04_30_043446_create_model_tanda_tangans_table', 5),
(65, '2023_05_02_111333_create_model_kompetensis_table', 6),
(66, '2023_05_03_012548_create_model_ijazahs_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parents`
--

CREATE TABLE `parents` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pendidikan_ayah` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_ibu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pekerjaan_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `hubungan_wali` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `pendidikan_wali` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_wali` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parents`
--

INSERT INTO `parents` (`id`, `siswa_id`, `nama_ayah`, `nama_ibu`, `pendidikan_ayah`, `pendidikan_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `hubungan_wali`, `pendidikan_wali`, `pekerjaan_wali`, `created_at`, `updated_at`) VALUES
(16, 19, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(17, 20, 'Jono', 'Wina', 'D3', 'S1', 'Wiraswasta', 'Guru', NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(18, 21, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(19, 22, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(20, 23, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(21, 24, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(22, 25, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(23, 26, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(24, 27, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:49:10', '2024-04-06 07:49:10'),
(25, 28, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(26, 29, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(27, 30, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 08:04:15', '2024-04-06 08:04:15'),
(28, 31, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(29, 32, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(30, 33, NULL, NULL, 'Tidak Sekolah', 'Tidak Sekolah', NULL, NULL, NULL, NULL, 'Tidak Sekolah', NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `nip` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `otor_by` int NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`id`, `id_user`, `nip`, `otor_by`, `status`, `created_at`) VALUES
(1, 8, '197005241999032006', 7, 'COMPLETED', '2024-05-01 07:57:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajar_pancasila`
--

CREATE TABLE `pelajar_pancasila` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelajar_pancasila`
--

INSERT INTO `pelajar_pancasila` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `b3c1`, `b3c2`, `b4c1`, `b4c2`, `b5c1`, `b5c2`, `b6c1`, `b6c2`, `created_at`, `updated_at`) VALUES
(17, '2022/2023', '1', 'Ahmad Sodikin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(18, '2022/2023', '2', 'Ahmad Sodikin', '23', 'e', '23', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(20, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', 'Akhlak beragama', 'Mengenal dan mencintai Tuhan Yang Maha Esa', 'Mengenal dan menghargai budaya', 'Mengeksplorasi dan membandingkan pengetahuan budaya, kepercayaan, serta praktiknya', 'Kepedulian', 'Tanggap terhadap lingkungan sosial', 'Pemahaman diri dan situasi yang dihadapi', 'Mengenali kualitas dan minat diri serta tantangan yang dihadapi', 'Memperoleh dan memproses informasi dan gagasan', 'Mengajukan pertanyaan', 'Menghasilkan gagasan yang orisinal', '', '2024-04-08 09:38:04', '2024-05-04 03:17:16'),
(21, '2023/2024', '1', 'ADE VIKA FITRIANA', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', 'Baik', '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b2c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b3c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b4c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b5c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b6c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b7c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b8c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b9c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b10c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b11c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b12c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b13c4` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengetahuan`
--

INSERT INTO `pengetahuan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b1c3`, `b1c4`, `b2c1`, `b2c2`, `b2c3`, `b2c4`, `b3c1`, `b3c2`, `b3c3`, `b3c4`, `b4c1`, `b4c2`, `b4c3`, `b4c4`, `b5c1`, `b5c2`, `b5c3`, `b5c4`, `b6c1`, `b6c2`, `b6c3`, `b6c4`, `b7c1`, `b7c2`, `b7c3`, `b7c4`, `b8c1`, `b8c2`, `b8c3`, `b8c4`, `b9c1`, `b9c2`, `b9c3`, `b9c4`, `b10c1`, `b10c2`, `b10c3`, `b10c4`, `b11c1`, `b11c2`, `b11c3`, `b11c4`, `b12c1`, `b12c2`, `b12c3`, `b12c4`, `b13c1`, `b13c2`, `b13c3`, `b13c4`, `created_at`, `updated_at`) VALUES
(17, '2022/2023', '1', 'Ahmad Sodikin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(18, '2022/2023', '2', 'Ahmad Sodikin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(20, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', '85', 'Peserta didik dapat mengevaluasi fakta, konsep, prinsip, dan prosedur dalam melakukan evaluasi penerapan keterampilan gerak berupa permainan dan olahraga, aktivitas senam, aktivitas gerak berirama, dan aktivitas permainan dan olahraga air (kondisional) pada permainan, aktivitas jasmani lainnya, dan kehidupan nyata seharihari.', '87', 'Peserta didik mampu mengenal rukun Islam dan kalimah syahadatain, menerapkan tata cara bersuci, salat fardu, azan, ikamah, zikir dan berdoa setelah salat.', '82', 'Peserta didik mampu menyebutkan identitas dirinya sesuai dengan jenis kelamin, ciri-ciri fisik, dan hobinya. Peserta didik mampu menyebutkan identitas diri (fisik dan non fisik) keluarga dan temantemannya di lingkungan rumah dan di sekolah.', '84', 'Peserta didik mampu menceritakan dan menghargai perbedaan baik fisik (contoh : warna kulit, jenis rambut, dll) maupun nonfisik (contoh : miskin, kaya, dll) keluarga dan teman-temannya di lingkungan rumah dan sekolah.', '88', 'Peserta didik mampu menceritakan kembali suatu isi informasi yang dibaca atau didengar; dan menceritakan kembali teks narasi yang dibacakan atau dibaca dengan topik diri dan lingkungan.', '85', 'Peserta didik mampu menulis teks deskripsi dengan beberapa kalimat sederhana, menulis teks rekon tentang pengalaman diri, menulis kembali narasi berdasarkan teks fiksi yang dibaca atau didengar, menulis teks prosedur tentang kehidupan sehari-hari, dan menulis teks eksposisi tentang kehidupan sehari-hari.', '80', 'Peserta didik dapat menunjukan pemahaman makna simbol matematika \"=\" dalam suatu kalimat matematika yang terkait dengan penjumlahan dan pengurangan bilangan cacah sampai 20 menggunakan gambar.', '83', 'Peserta didik dapat membandingkan panjang dan berat benda secara langsung, dan membandingkan durasi waktu. Mereka dapat mengukur dan mengestimasi panjang benda menggunakan satuan tidak baku.', '79', 'Peserta didik mengidentifikasi dan mengajukan pertanyaan tentang apa yang ada pada dirinya maupun kondisi di lingkungan rumah dan sekolah serta mengidentifikasi permasalahan sederhana yang berkaitan dengan kehidupan sehari-hari.', '80', 'Peserta didik mengamati fenomena dan peristiwa secara sederhana dengan mengoptimalkan penggunaan pancaindra', '78', 'Peserta didik merespon secara lisan terhadap teks pendek sederhana dan familiar, berbentuk teks tulis yang dibacakan oleh guru. Peserta didik menunjukkan pemahaman teks yang dibacakan atau gambar/ilustrasi yang diperlihatkan padanya, menggunakan komunikasi non-verbal.', '80', 'Peserta didik menggunakan bahasa Inggris sederhana untuk berinteraksi dalam situasi sosial dan kelas seperti berkenalan, memberikan informasi diri, mengucapkan salam dan selamat tinggal.', '87', 'Peserta didik menunjukkan kemampuan dalam menirukan aktivitas pola gerak dasar, aktivitas senam, aktivitas gerak berirama, dan aktivitas permainan dan olahraga air (kondisional)', '85', 'Peserta didik memahami prosedur dalam melakukan pola gerak dasar, aktivitas senam, aktivitas gerak berirama, dan aktivitas permainan dan olahraga air (kondisional).', '79', 'Peserta didik mampu mengidentifikasi perangkat TIK di antara perangkat lainnya dan kehadiran komputer atau komponennya dalam perangkat sehari-hari, menggunakan perangkat TIK yang sudah dikonfigurasi sesuai konteks dan usianya untuk berkomunikasi, belajar, menggambar, dan berkarya kreatif serta menerapkan praktik baik yang memperhatikan aspek kesehatan, kenyamanan, keamanan, dan keselamatan', '85', 'Peserta didik mampu menjelaskan pengalaman atau kejadian dengan runtut dan logis dalam bahasa sehari-hari, menjalankan instruksi sederhana dan menjelaskan maknanya yang secara semantik diasosiasikan dengan istilah pemrograman seperti kalimat kondisional dan pengulangan, serta mengkomposisi simbol dan mengenali struktur logis dari sebuah komposisi simbol', '83', 'Peserta didik mampu menciptakan karya dengan mengeksplorasi dan menggunakan elemen seni rupa berupa garis, bentuk dan warna.', '80', 'Peserta didik mampu mengenali dan menceritakan fokus dari karya yang diciptakan atau dilihatnya (dari teman sekelas karya seni dari orang lain) serta pengalaman dan perasaannya mengenai karya tersebut', '79', 'Peserta didik mampu mengimitasi bunyi-musik sederhana dengan mengenal unsur-unsur bunyi-musik baik intrinsik maupun ekstrinsik', '80', 'Peserta didik mampu mengenali diri sendiri, sesama, dan lingkungan yang beragam (berkebhinekaan), serta mampu memberi kesan atas praktik bermusik lewat bernyanyi atau bermain alat/media musik baik sendiri maupun bersama-sama dalam bentuk sederhana', '78', 'Peserta didik mampu mengamati bentuk tari sebagai media komunikasi serta mengembangkan kesadaran diri dalam mengeksplorasi unsur utama tari meliputi gerak, ruang, waktu, tenaga, serta gerak di tempat dan gerak berpindah', '80', 'Peserta didik mampu mengidentifikasi unsur utama tari (gerak, ruang, waktu, dan tenaga), gerak di tempat dan gerak berpindah untuk membuat gerak yang memiliki kesatuan gerak yang indah.', '80', 'Mengembangkan keterampilan dasar dalam konseling seperti mendengarkan aktif, memberikan dukungan, mengajukan pertanyaan, dan memberikan umpan balik yang efektif.', '82', 'Memahami berbagai model pendekatan konseling seperti pendekatan psikodinamik, kognitif, behavioral, humanistik, dan eksistensial.', '80', 'Peserta didik mampu mengamati dan menganalisis struktur bahasa Jawa, serta mengembangkan kemampuan berkomunikasi dalam bahasa Jawa baik lisan maupun tulis.', '80', 'Peserta didik mampu memahami percakapan atau instruksi dalam Bahasa Jawa.', '2024-04-08 09:38:04', '2024-05-03 23:43:47'),
(21, '2023/2024', '1', 'ADE VIKA FITRIANA', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '80', 'Baik', '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int NOT NULL,
  `id_siswa` int NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `id_siswa`, `kelas`, `tahun_ajaran`, `status`, `tanggal`, `created_at`, `updated_at`) VALUES
(5, 19, '1', '2023/2024', 'Sakit', '2024-05-04', '2024-05-04 02:29:18', '2024-05-04 03:16:09'),
(6, 20, '1', '2023/2024', 'Hadir', '2024-05-04', '2024-05-04 02:29:18', '2024-05-04 02:29:18'),
(7, 19, '1', '2023/2024', 'Hadir', '2024-05-05', '2024-05-05 05:52:14', '2024-05-05 05:52:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `b1c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b1c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b2c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b3c1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b3c2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `b1c1`, `b1c2`, `b2c1`, `b2c2`, `b3c1`, `b3c2`, `created_at`, `updated_at`) VALUES
(16, '2022/2023', '1', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(17, '2022/2023', '2', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(19, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', 'Pesta Siaga Tingkat Kecamtan T.A 2023', 'Juara 3', NULL, NULL, NULL, NULL, '2024-04-08 09:38:04', '2024-05-03 23:47:17'),
(20, '2023/2024', '1', 'ADE VIKA FITRIANA', NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress_students`
--

CREATE TABLE `progress_students` (
  `id` int UNSIGNED NOT NULL,
  `siswa_id` int NOT NULL,
  `asal_sekolah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_tk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tgl_sttb` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0000-00-00',
  `no_sttb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `asal_sekolah_pindah` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tingkat_sekolah_pindah` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_diterima` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '0000-00-00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `progress_students`
--

INSERT INTO `progress_students` (`id`, `siswa_id`, `asal_sekolah`, `nama_tk`, `tgl_sttb`, `no_sttb`, `asal_sekolah_pindah`, `tingkat_sekolah_pindah`, `tgl_diterima`, `created_at`, `updated_at`) VALUES
(16, 19, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(17, 20, 'TK', 'TK Muslimat NU', '29-12-2010', '485456', NULL, '1', NULL, '2024-04-06 07:32:25', '2024-04-06 07:32:25'),
(18, 21, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:34:49', '2024-04-06 07:34:49'),
(19, 22, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:37:30', '2024-04-06 07:37:30'),
(20, 23, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:39:01', '2024-04-06 07:39:01'),
(21, 24, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:40:56', '2024-04-06 07:40:56'),
(22, 25, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:43:08', '2024-04-06 07:43:08'),
(23, 26, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:46:38', '2024-04-06 07:46:38'),
(24, 27, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:49:10', '2024-04-06 07:49:10'),
(25, 28, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 07:50:57', '2024-04-06 07:50:57'),
(26, 29, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 08:02:46', '2024-04-06 08:02:46'),
(27, 30, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 08:04:15', '2024-04-06 08:04:15'),
(28, 31, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 12:28:14', '2024-04-06 12:28:14'),
(29, 32, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-06 12:29:26', '2024-04-06 12:29:26'),
(30, 33, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-04-30 23:01:42', '2024-04-30 23:04:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `desa` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `alamat`, `desa`, `kecamatan`, `kota`, `provinsi`, `created_at`, `updated_at`) VALUES
(4, 'SDN GETASKEREP 01', 'JALAN PROJOSUMARTO 1', 'DESA GETASKEREP', 'TALANG', 'KABUPATEN TEGAL', 'JAWA TENGAH', '2024-05-01 02:32:02', '2024-05-01 02:32:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_data_siswa`
--

CREATE TABLE `setting_data_siswa` (
  `id` int NOT NULL,
  `id_setting_siswa` int NOT NULL,
  `id_student` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_data_siswa`
--

INSERT INTO `setting_data_siswa` (`id`, `id_setting_siswa`, `id_student`, `created_at`, `updated_at`) VALUES
(9, 5, 21, '2024-04-06 09:43:43', '2024-04-06 09:43:43'),
(10, 5, 22, '2024-04-06 09:43:44', '2024-04-06 09:43:44'),
(24, 6, 23, '2024-04-06 12:21:37', '2024-04-06 12:21:37'),
(25, 6, 24, '2024-04-06 12:21:37', '2024-04-06 12:21:37'),
(26, 7, 25, '2024-04-06 12:23:21', '2024-04-06 12:23:21'),
(27, 7, 26, '2024-04-06 12:23:21', '2024-04-06 12:23:21'),
(28, 8, 27, '2024-04-06 12:25:53', '2024-04-06 12:25:53'),
(29, 8, 28, '2024-04-06 12:25:53', '2024-04-06 12:25:53'),
(32, 10, 31, '2024-04-06 12:31:37', '2024-04-06 12:31:37'),
(33, 10, 32, '2024-04-06 12:31:37', '2024-04-06 12:31:37'),
(36, 4, 19, '2024-04-08 10:21:41', '2024-04-08 10:21:41'),
(37, 4, 20, '2024-04-08 10:21:41', '2024-04-08 10:21:41'),
(40, 9, 29, '2024-04-08 10:42:27', '2024-04-08 10:42:27'),
(41, 9, 30, '2024-04-08 10:42:28', '2024-04-08 10:42:28'),
(42, 11, 19, '2024-05-01 09:43:18', '2024-05-01 09:43:18'),
(43, 11, 20, '2024-05-01 09:43:18', '2024-05-01 09:43:18'),
(45, 10, 33, '2024-05-01 10:10:35', '2024-05-01 10:10:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_guru`
--

CREATE TABLE `setting_guru` (
  `id` int NOT NULL,
  `id_tahun_ajaran` int NOT NULL,
  `id_guru1` int NOT NULL,
  `id_guru2` int NOT NULL,
  `id_guru3` int NOT NULL,
  `id_guru4` int NOT NULL,
  `id_guru5` int NOT NULL,
  `id_guru6` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_guru`
--

INSERT INTO `setting_guru` (`id`, `id_tahun_ajaran`, `id_guru1`, `id_guru2`, `id_guru3`, `id_guru4`, `id_guru5`, `id_guru6`, `created_at`, `updated_at`) VALUES
(2, 1, 8, 13, 15, 14, 12, 9, '2024-04-05 09:58:52', '2024-04-06 13:59:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_siswa`
--

CREATE TABLE `setting_siswa` (
  `id` int NOT NULL,
  `id_tahun_ajaran` int NOT NULL,
  `kelas` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `setting_siswa`
--

INSERT INTO `setting_siswa` (`id`, `id_tahun_ajaran`, `kelas`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2024-04-06 09:36:16', '2024-04-06 09:36:16'),
(5, 1, 2, '2024-04-06 09:43:43', '2024-04-06 09:43:43'),
(6, 1, 3, '2024-04-06 12:21:37', '2024-04-06 12:21:37'),
(7, 1, 4, '2024-04-06 12:23:21', '2024-04-06 12:23:21'),
(8, 1, 5, '2024-04-06 12:25:53', '2024-04-06 12:25:53'),
(9, 1, 6, '2024-04-06 12:30:30', '2024-04-06 12:30:30'),
(10, 1, 7, '2024-04-06 12:31:37', '2024-04-06 12:31:37'),
(11, 2, 1, '2024-05-01 09:43:18', '2024-05-01 09:43:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id` int UNSIGNED NOT NULL,
  `nis` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '-',
  `nik` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `no_kk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `nama_lengkap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_panggilan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jen_kel` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Laki-laki',
  `tempat_lahir` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tgl_lahir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kewarganegaraan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jml_saudara` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bahasa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `gol_darah` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `tempat_tinggal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `jarak` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '-',
  `foto_siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_default_profil.png',
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Aktif',
  `angkatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id`, `nis`, `nisn`, `nik`, `no_kk`, `nama_lengkap`, `nama_panggilan`, `jen_kel`, `tempat_lahir`, `tgl_lahir`, `agama`, `kewarganegaraan`, `jml_saudara`, `bahasa`, `gol_darah`, `alamat`, `telepon`, `tempat_tinggal`, `jarak`, `foto_siswa`, `status`, `angkatan`, `created_at`, `updated_at`) VALUES
(19, '2104', '0094611409', '3328120812000009', '3328120812000008', 'MUHAMMAD FITZAL ASFA', 'FITZAL', 'Laki-laki', 'Tegal', '16-06-2015', 'Islam', 'Indonesia', '1', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589244', 'Rumah Orang Tua', '2', '661163c1f3319.png', 'Aktif', '2023/2024', '2023-05-04 17:49:00', '2024-04-30 23:15:40'),
(20, '2105', '0116530887', '3328120812000004', '3328120812000008', 'ADE VIKA FITRIANA', 'VIKA', 'Perempuan', 'Tegal', '08-12-2015', 'Islam', 'Indonesia', '1', 'Bahasa Indonesia', 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589268', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Keluar', '2023/2024', '2024-04-06 07:32:25', '2024-04-30 21:57:44'),
(21, '2106', '0116593598', '3328120812000006', '3328120812000008', 'ADIT SAPUTRA', 'ADIT', 'Laki-laki', 'TEGAL', '12-03-2015', 'Islam', 'Indonesia', '0', 'Bahasa Indonesia', 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Pacul, Kecamatan Talang', '089694589275', 'Rumah Orang Tua', '3', 'user_default_profil.png', 'Pindah', '2023/2024', '2024-04-06 07:34:49', '2024-04-30 22:05:03'),
(22, '2107', '0124434244', '3328120812000228', '3328120812000229', 'ALIYACH SULISTIA WATI', 'SULISTIA', 'Perempuan', 'TEGAL', '24-09-2015', 'Islam', 'Indonesia', '1', 'Bahasa Indonesia', 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589279', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:37:30', '2024-04-30 21:58:06'),
(23, '2108', '0126935011', '332812081200056', '332812081200089', 'ANNISA LUTFIATI', 'ANNISA', 'Perempuan', 'Tegal', '19-08-2015', 'Islam', 'Indonesia', '3', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589279', 'Rumah Orang Tua', '1', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:39:01', '2024-04-30 21:58:14'),
(24, '2109', '0126878124', '3328120812000018', '3328120812000019', 'ASYA SAHRISYAH', 'ASYA', 'Perempuan', 'Tegal', '27-07-2015', 'Islam', 'Indonesia', '2', 'Bahasa Indonesia', 'AB', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589299', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:40:56', '2024-04-30 21:58:27'),
(25, '2110', '0128918676', '332812081200021', '332812081200028', 'DWI SEPTIANINGSIH', 'SEPTI', 'Laki-laki', 'Tegal', '13-05-2015', 'Islam', 'Indonesia', '3', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589275', 'Rumah Orang Tua', '1', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:43:08', '2024-04-30 21:58:35'),
(26, '2111', '0112303159', '3328120812000088', '3328120812000099', 'FADILLAH RAMADHANI', 'FADIL', 'Laki-laki', 'TEGAL', '18-03-2015', 'Islam', 'Indonesia', '2', 'Bahasa Indonesia', 'O', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Pacul, Kecamatan Talang', '089694589277', 'Rumah Orang Tua', '1', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:46:38', '2024-04-30 21:58:41'),
(27, '2112', '0129994262', '3328120812000009', '3328120812000008', 'FARAHDINA AULIYA FITRI', 'AULIYA', 'Perempuan', 'Tegal', '15-07-2015', 'Islam', 'Indonesia', '1', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589289', 'Rumah Orang Tua', '1', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:49:10', '2024-04-30 21:58:47'),
(28, '2113', '0114806105', '3328120812000002', '3328120812000008', 'FINO MEI DWI PURNOMO', 'FINO', 'Laki-laki', 'TEGAL', '20-05-2015', 'Islam', 'Indonesia', '0', 'Bahasa Indonesia', 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589266', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 07:50:57', '2024-04-30 21:58:54'),
(29, '2114', '0129868664', '3328120812000002', NULL, 'GINA MAULIDAH', 'GINA', 'Perempuan', 'TEGAL', '19-08-2015', 'Islam', 'Indonesia', '0', 'Bahasa Indonesia', 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Pacul, Kecamatan Talang', '089694589255', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 08:02:46', '2024-04-30 21:59:01'),
(30, '2115', '0129306904', '3328120812000003', NULL, 'IBAS MAULANA IBRAHIM', 'IBAS', 'Laki-laki', 'TEGAL', '10-06-2015', 'Islam', 'Indonesia', '0', NULL, 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Pacul, Kecamatan Talang', '089694589244', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 08:04:15', '2024-04-30 21:59:11'),
(31, '2116', '0101912944', '3328120812000004', '3328120812000004', 'ILHAM DWI AJI SAPUTRA', 'ILHAM', 'Laki-laki', 'TEGAL', '21-08-2013', 'Islam', 'Indonesia', '2', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Kaladawa, Kecamatan Talang', '089694589278', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 12:28:14', '2024-04-30 21:59:23'),
(32, '2117', '0092316853', '3328120812000023', '3328120812000024', 'LIYANA ROMAEDI', 'LIYANA', 'Perempuan', 'TEGAL', '20-08-2014', 'Islam', 'Indonesia', '1', 'Bahasa Indonesia', 'B', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Getaskerep, Kecamatan Talang', '089694589233', 'Rumah Orang Tua', '2', 'user_default_profil.png', 'Aktif', '2023/2024', '2024-04-06 12:29:26', '2024-04-30 21:59:34'),
(33, '2122', '3153238184', '3328120812000012', NULL, 'EGO WINASIS', 'Ego', 'Laki-laki', 'Tegal', '08-12-2000', 'Islam', 'Indonesia', '0', NULL, 'A', 'Jalan Projosumarto 1 Rt: 014/ Rw: 003 , Desa Kaladawa, Kecamatan Talang', '089694589275', NULL, NULL, 'user_default_profil.png', 'Lulus', '2023/2024', '2024-04-30 23:01:42', '2024-05-01 10:10:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int NOT NULL,
  `tahun_ajaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `status`, `created_at`, `updated_at`) VALUES
(1, '2023/2024', 1, '2024-04-05 07:50:49', '2024-04-08 06:28:41'),
(2, '2022/2023', 0, '2024-04-05 08:14:49', '2024-04-08 06:28:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_tangan`
--

CREATE TABLE `tanda_tangan` (
  `id` int UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `siswa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepsek` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_kepsek` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_kepsek` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wali_kelas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip_wali_kelas` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barcode_wali_kelas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_print` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanda_tangan`
--

INSERT INTO `tanda_tangan` (`id`, `tahun_ajaran`, `kelas`, `siswa`, `kepsek`, `nip_kepsek`, `barcode_kepsek`, `wali_kelas`, `nip_wali_kelas`, `barcode_wali_kelas`, `tgl_print`, `created_at`, `updated_at`) VALUES
(6, '2022/2023', '1', 'Ahmad Sodikin', 'Hartono, S.Pd.', '0122334343', '645452e3df38f.png', 'Sumiyati, S.Ag.', '55454545', '645452e3e4d0e.png', '16-03-2024', '2023-05-04 17:50:43', '2024-03-16 08:33:14'),
(7, '2022/2023', '2', 'Ahmad Sodikin', NULL, NULL, NULL, NULL, NULL, NULL, '12-11-2023', '2023-11-17 21:28:18', '2023-11-17 21:32:47'),
(8, '2023/2024', '1', 'MUHAMMAD FITZAL ASFA', 'Ely Hastuti, S.Pd.SD', '197005241999032005', '6635b74b3b20c.png', 'Ego Winasis, S.Kom.', '121212212', NULL, '04-05-2024', '2024-04-08 09:38:04', '2024-05-03 21:19:23'),
(9, '2023/2024', '1', 'ADE VIKA FITRIANA', NULL, NULL, NULL, NULL, NULL, NULL, '08-04-2024', '2024-04-08 11:41:38', '2024-04-08 11:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guru',
  `isActive` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nip`, `name`, `email`, `email_verified_at`, `password`, `role`, `isActive`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, '197005241999032005', 'Ely Hastuti, S.Pd, Sd', 'elyhastuti@gmail.com', NULL, '$2y$10$I6yXypsocv0q/rh3FmFOXObKz3CHHO2BWWpMLY7GcLpP1SZip/k2a', 'admin', 1, '660ffbed4834d.png', NULL, '2024-04-05 06:10:55', '2024-04-08 11:07:41', NULL),
(8, '197005241999032006', 'Sujilah, S.Pd', 'sujilah@gmail.com', NULL, '$2y$10$QcHkCWD2ayu38T0t9KcJnedRYgpUfwjSyDVVPpu0M5.CevbXNt.JS', 'guru', 1, '66100003435fd.png', NULL, '2024-04-05 06:40:51', '2024-05-01 08:16:26', NULL),
(9, '197005241999032007', 'Putri, S.Pd', 'putri@gmail.com', NULL, '$2y$10$MlWuHDJ.7ERLleHAcRJzjejNnQmytcC2NZTMoCKzObjPcaQUFzfwW', 'guru', 1, '66142c1ed2c27.png', NULL, '2024-04-05 06:47:06', '2024-04-08 10:40:46', NULL),
(12, '197005241999032008', 'Septa, S.Pd', 'septa@gmail.com', NULL, '$2y$10$RWZgLt34PPTd6fEs4s0sqO51Etb/Kf.mgPKHrn1WXXCt57m98/QuG', 'guru', 1, '66142d25b8c43.png', NULL, '2024-04-05 07:00:58', '2024-04-08 10:45:09', NULL),
(13, '197005241999032009', 'Fani, S.Pd', 'fani@gmail.com', NULL, '$2y$10$mqouOlSw0I6nqgHb.sIGc.s0EREnpkv.gONyRX35ipWr4lSh1xe3C', 'guru', 1, '66142d926e7a4.png', NULL, '2024-04-05 09:45:46', '2024-04-08 10:46:58', NULL),
(14, '197005241999032004', 'Azhar, S.Ag', 'azhar@gmail.com', NULL, '$2y$10$mkadqKf4SNKlXhbUDK/n0.w3eGs7N1TnoNJ/9Tf0RLF0Ys2vf23RC', 'guru', 1, '66142f82ba5ac.jpg', NULL, '2024-04-05 09:46:23', '2024-04-08 10:55:14', NULL),
(15, '197005241999032003', 'Septi, S.Pd', '', NULL, '$2y$10$m9bi0xshuynVeNIE3Yx2Mu1Cer3U92IFeLH/q1sNjrUPhVv/fcPNq', 'guru', 1, 'user.png', NULL, '2024-04-06 13:58:31', '2024-04-06 13:58:48', NULL),
(16, '123456789', 'SDN GETASKEREP 01', '', NULL, '$2y$10$LIIL2TNJ5AVK4c.KuQFPE.Bj79C0Vj6q9YxUkAmof5o1jUBnD3aMy', 'admin', 0, 'user.png', NULL, '2024-04-08 11:19:43', '2024-04-08 11:20:13', '2024-04-08 11:20:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_wali`
--

CREATE TABLE `users_wali` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `isActive` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users_wali`
--

INSERT INTO `users_wali` (`id`, `nis`, `name`, `email`, `email_verified_at`, `password`, `role`, `isActive`, `image`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '2104', 'MUHAMMAD FITZAL ASFA', '', NULL, '$2y$10$QLv33rNBk2rpDdATOwJEFeah4LJE4SFXFbXkANmGmffI4NfSgcMyG', 'user', 1, 'user.png', NULL, '2024-05-04 05:22:10', '2024-05-04 06:09:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kenaikan`
--
ALTER TABLE `kenaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kesehatan_jasmani`
--
ALTER TABLE `kesehatan_jasmani`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kompetensi`
--
ALTER TABLE `kompetensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lain_lain`
--
ALTER TABLE `lain_lain`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meninggalkan_sekolah`
--
ALTER TABLE `meninggalkan_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`id_user`);

--
-- Indeks untuk tabel `pelajar_pancasila`
--
ALTER TABLE `pelajar_pancasila`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progress_students`
--
ALTER TABLE `progress_students`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_data_siswa`
--
ALTER TABLE `setting_data_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_guru`
--
ALTER TABLE `setting_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_siswa`
--
ALTER TABLE `setting_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_nis_unique` (`nis`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD UNIQUE KEY `nisn_2` (`nisn`);

--
-- Indeks untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indeks untuk tabel `users_wali`
--
ALTER TABLE `users_wali`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT untuk tabel `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kenaikan`
--
ALTER TABLE `kenaikan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kesehatan_jasmani`
--
ALTER TABLE `kesehatan_jasmani`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `ketidakhadiran`
--
ALTER TABLE `ketidakhadiran`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `kompetensi`
--
ALTER TABLE `kompetensi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lain_lain`
--
ALTER TABLE `lain_lain`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `meninggalkan_sekolah`
--
ALTER TABLE `meninggalkan_sekolah`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelajar_pancasila`
--
ALTER TABLE `pelajar_pancasila`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `progress_students`
--
ALTER TABLE `progress_students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `setting_data_siswa`
--
ALTER TABLE `setting_data_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `setting_guru`
--
ALTER TABLE `setting_guru`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting_siswa`
--
ALTER TABLE `setting_siswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `students`
--
ALTER TABLE `students`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tanda_tangan`
--
ALTER TABLE `tanda_tangan`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users_wali`
--
ALTER TABLE `users_wali`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
