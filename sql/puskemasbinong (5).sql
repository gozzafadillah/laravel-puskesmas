-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2023 at 03:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskemasbinong`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `kode_antrian` varchar(255)  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `NIK` varchar(255)  NOT NULL,
  `tgllahir` varchar(255)  NOT NULL,
  `kode_poli` varchar(255)  NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Balita', 'balita', 'category-images/IJ4gFd3mXETQ5u41sjCSHf4WWkmgqZbD7ghw7tjx.png', '2023-05-12 05:06:48', '2023-05-12 05:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `category_pelayanan`
--

CREATE TABLE `category_pelayanan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_category` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `category_pelayanan`
--

INSERT INTO `category_pelayanan` (`id`, `nama_category`, `created_at`, `updated_at`) VALUES
(1, 'pelayanan kesehatan', '2023-06-09 13:36:55', '2023-06-09 13:36:58'),
(2, 'pelayanan penunjang', '2023-06-09 13:37:00', '2023-06-09 13:37:03'),
(3, 'tarif tambahan poli gigi', '2023-06-09 13:37:03', '2023-06-09 13:37:36'),
(4, 'tarif tambahan poli bidan', '2023-06-09 13:37:03', '2023-06-09 13:37:36'),
(5, 'tarif tambahan UGD', '2023-06-09 13:37:03', '2023-06-09 13:37:36'),
(6, 'tarif tambahan laboratorium', '2023-06-09 13:37:03', '2023-06-09 13:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `userid` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id`, `name`, `userid`, `created_at`, `updated_at`) VALUES
(1, 'Gilandra', 10, '2023-05-13 23:27:49', '2023-05-13 23:27:49'),
(2, 'Faishal Rahmat', 11, '2023-05-13 23:30:12', '2023-05-13 23:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255)  NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_02_041715_create_posts_table', 1),
(6, '2023_03_02_131049_create_categories_table', 1),
(7, '2023_03_10_083149_add_is_admin_to_users_table', 1),
(8, '2023_03_18_024412_create_obats_table', 1),
(9, '2023_04_27_064009_create_obat_categories_table', 1),
(10, '2023_05_12_121510_create_polis_table', 2),
(11, '2023_05_12_123129_poli', 3),
(12, '2023_05_13_145759_create_ruangans_table', 4),
(13, '2023_05_14_061119_create_dokters_table', 5),
(14, '2023_05_14_192712_antrian', 6),
(15, '2023_05_31_142121_rekam_medis', 7),
(16, '2023_06_07_083203_surat_rujukan', 8),
(17, '2023_06_08_222944_resep_obat', 9),
(18, '2023_06_09_133118_category_pelayanan', 10),
(19, '2023_06_09_133126_pelayanan', 11),
(20, '2023_06_13_120610_p_pelayanan', 12),
(21, '2023_06_13_121144_p_pelayanan', 13);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `kode_obat` varchar(255)  NOT NULL,
  `nama_obat` varchar(255)  NOT NULL,
  `kategori_obat` varchar(255)  NOT NULL,
  `stok` int NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`kode_obat`, `nama_obat`, `kategori_obat`, `stok`, `harga`, `created_at`, `updated_at`) VALUES
('Kapsul-IN001', 'Intunal Xtra', '2', 41, 100000, '2023-05-19 08:57:18', '2023-06-13 08:04:00'),
('Vaksin-SB001', 'Vaksin SB', '1', 48, 120000, '2023-05-19 08:57:18', '2023-06-13 08:04:00'),
('Vaksin-SH001', 'Vaksin SH', '1', 161, 100000, '2023-05-19 08:57:18', '2023-06-09 05:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `obat_categories`
--

CREATE TABLE `obat_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `obat_categories`
--

INSERT INTO `obat_categories` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Vaksin', 'vaksin', 'obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png', '2023-05-19 08:56:51', '2023-05-19 08:56:51'),
(2, 'Kapsul', 'kapsul', 'obat_category/Lcv8nJ3lgZdEn1pmoTzV8YDs4hY5utbHnUVkFvBk.png', '2023-05-19 08:56:51', '2023-05-19 08:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id` bigint UNSIGNED NOT NULL,
  `category` bigint NOT NULL,
  `layanan` varchar(255)  NOT NULL,
  `biaya` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id`, `category`, `layanan`, `biaya`, `created_at`, `updated_at`) VALUES
(1, 1, 'pelayanan rawat jalan', 14000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(2, 1, 'pelayanan UGD dan Observasi', 75000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(3, 1, 'pelayanan observasi pasien poned', 75000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(4, 1, 'pemeriksaan Haji tahap 1', 150000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(5, 1, 'keuring untuk anak sekolah atau kuliah', 15000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(6, 1, 'keuring umum', 25000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(7, 1, 'pemberkasan casn/p3k', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(8, 1, 'keuring calon pengantin', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(9, 1, 'keuring polisi asuransi', 100000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(10, 2, 'pelayanan ambulan angkut jenazah 5km', 150000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(11, 2, 'pelayanan angkut jenazah 50km', 150000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(12, 3, 'tumpatan tetap dengan GIC', 70000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(13, 3, 'pencabutan gigi dengan CE', 30000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(14, 3, 'pencabutan gigi dengan anestesi lokal (tanpa penyulit)', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(15, 3, 'pencabutan gigi dengan anestesi lokal (dengan penyulit)', 100000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(16, 4, 'oksigen 30 menit pertama', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(17, 4, 'oksigen 30 menit berikutnya', 15000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(18, 5, 'pemasangan botol infus pertama', 150000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(19, 5, 'pemasangan infus tiap botol berikutnya', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(20, 5, 'tindakan jahit luka 1 sampai dengan 3 jahitan ', 75000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(21, 5, 'tindakan jahit luka setiap jahitan berikutnya', 10000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(22, 5, 'tindakan angkat jahitan', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(23, 5, 'tindakan ekstrasi kuku', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(24, 5, 'tindakan simkursisi', 350000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(25, 5, 'tindakan perawatan luka dengan penyulit', 50000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(26, 6, 'carik celup urine sendimen', 43000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(27, 6, 'hemogoblin', 14000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(28, 6, 'golongan darah ABO', 14000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(29, 6, 'golongan darah ABO + Rhesus', 14000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(30, 6, 'mikroskopis ZN(BTA)1x', 85000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(31, 6, 'mikroskopis ZN(BTA)3x', 100000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(32, 6, 'widal/aglutinassi', 42000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(33, 6, 'asam urat', 42000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43'),
(34, 6, 'glukosa', 42000.00, '2023-06-09 13:53:43', '2023-06-09 13:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255)  NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `kode_poli` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `description` varchar(255)  NOT NULL,
  `dokter` int NOT NULL,
  `ruangan` varchar(255)  NOT NULL,
  `jadwal` varchar(255)  NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`kode_poli`, `name`, `description`, `dokter`, `ruangan`, `jadwal`, `isActive`, `created_at`, `updated_at`) VALUES
('A002', 'Poli Anak', '<div>Poli Untuk anak</div>', 2, '01-001', '08:00 s/d 13:00', 1, '2023-05-14 12:20:37', '2023-05-14 12:20:37'),
('U001', 'Poli Umum', '<div>Poli untuk umum</div>', 1, '01-002', '08:00 s/d 14:00', 1, '2023-05-14 12:22:38', '2023-05-14 12:22:38'),
('K001', 'Poli KIA', '<div>cek poli kia</div>', 1, '01-001', '07:00 s/d 15:00', 1, '2023-05-19 08:32:29', '2023-06-13 08:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255)  NOT NULL,
  `slug` varchar(255)  NOT NULL,
  `image` varchar(255)  DEFAULT NULL,
  `excerpt` text  NOT NULL,
  `body` text  NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Balita Indonesia', 'balita-indonesia', 'post-images/88b0vioVxEaeEy3dSKeWJFSHEiWGubIXtAV1kMla.png', 'Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.', '<div>Balita indonesia mengalami gizi buruk karena kurang nya perhatian dan gizi oleh orang tua. Karena itu banyak nya balita mengalami kekurusan dan gizi buruk seperti busung lapar.</div>', NULL, '2023-05-12 05:08:06', '2023-05-12 05:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `p_pelayanan`
--

CREATE TABLE `p_pelayanan` (
  `pelayanan_id` bigint NOT NULL,
  `kode_rekammedis` varchar(255)  NOT NULL,
  `biaya` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `p_resep_obat`
--

CREATE TABLE `p_resep_obat` (
  `kode_resep_obat` varchar(255) NOT NULL,
  `kode_obat` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `dosis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `kode_rekammedis` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `antrian` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `bpjs` varchar(255) CHARACTER SET utf8mb4  DEFAULT NULL,
  `anamnesa` text  NOT NULL,
  `pemeriksaan_fisik` text  NOT NULL,
  `diagnosa` varchar(255)  NOT NULL,
  `tindakan` varchar(255)  NOT NULL,
  `giz` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `kode_resep_obat` varchar(255)  NOT NULL,
  `kode_rekamedis` varchar(255) CHARACTER SET utf8mb4  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `kode` varchar(255)  NOT NULL,
  `name` varchar(255)  NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`kode`, `name`, `status`, `created_at`, `updated_at`) VALUES
('01-001', 'Ruangan Lt 1 - 001', 0, '2023-05-14 07:47:16', '2023-05-14 07:47:18'),
('01-002', 'Ruangan Lt 1 - 002', 0, '2023-05-14 00:49:40', '2023-05-14 00:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `surat_rujukan`
--

CREATE TABLE `surat_rujukan` (
  `kode_rujukan` varchar(255)  NOT NULL,
  `kode_rekammedis` varchar(255)  NOT NULL,
  `fasilitas` varchar(255)  NOT NULL,
  `rencana_tindak_lanjut` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `NIK` varchar(255)  NOT NULL,
  `alamat` varchar(255)  NOT NULL,
  `kepalakeluarga` varchar(255)  NOT NULL,
  `opsibpjs` varchar(255)  NOT NULL,
  `bpjs` varchar(255)  DEFAULT NULL,
  `tgllahir` date NOT NULL,
  `age` int NOT NULL,
  `username` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `cek` int NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `NIK`, `alamat`, `kepalakeluarga`, `opsibpjs`, `bpjs`, `tgllahir`, `age`, `username`, `email`, `email_verified_at`, `password`, `cek`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'admin', '10121212012012010', 'Jl kav korobokan. kel Citeureup. Kec Cimahi utara', 'admin', 'TIDAK', NULL, '2000-03-09', 23, 'admin', 'admin@email.com', NULL, '$2y$10$KtncpJF44p.h7UPAXTirluV96KrckTaEE7LpfxlHT8KY1ITvgXv7y', 1, NULL, '2023-05-12 01:29:31', '2023-05-12 01:30:21', 1),
(2, 'farmasi', '10121212012012011', 'Jl kav korobokan. kel Citeureup. Kec Cimahi utara', 'farmasi', 'TIDAK', NULL, '2000-03-09', 23, 'farmasi', 'farmasi@email.com', NULL, '$2y$10$U7F8Yd8f0uW2iYIDVmzlPud/rVJ8vN8jQH6hu5XenT2lJIqnzbs8G', 1, NULL, '2023-05-12 01:31:19', '2023-05-12 01:31:19', 4),
(4, 'administrasi', '10121212012012014', 'Jl kav korobokan. kel Citeureup. Kec Cimahi utara', 'administrasi', 'TIDAK', NULL, '2000-03-09', 23, 'administrasi', 'administrasi@email.com', NULL, '$2y$10$AXmHDElmWDdjjmCrGmgu2O.a9gUK/5UXLN2tQp4P30E2TR6gDbXOy', 1, NULL, '2023-05-12 01:33:21', '2023-05-12 01:33:21', 3),
(5, 'Muhammad Fadillah Abdul Aziz', '101212120120120212', 'Jl kav korobokan. kel Citeureup. Kec Cimahi utara', 'Fadil', 'YA', '1011931212121', '2000-03-09', 23, 'Fadillah', 'gozzafadillah@gmail.com', NULL, '$2y$10$vqvTkHXRoAdmkoT8PIPyXOMJtFH1e3pLU2G6q/rCJOcS/caIJYzXu', 1, NULL, '2023-05-12 01:34:09', '2023-05-12 01:34:09', 0),
(9, 'Dea Belinda', '101212120120120192', 'JL Sarijadi No 1 A', 'Dea', 'TIDAK', NULL, '2000-03-09', 23, 'Dea', 'dea@gmail.com', NULL, '$2y$10$LhOLOGwWq0uxkSZucSzBVuCkF9hK7COA1yTLwZzG4x.J9oHMwZFya', 1, NULL, '2023-05-13 23:26:20', '2023-05-13 23:26:20', 0),
(10, 'Gilandra', '10121212012012022', 'JL Sarinah No 1 A', 'Gilan', 'TIDAK', NULL, '2000-03-09', 23, 'Gilandra', 'Gilandra@dokter.com', NULL, '$2y$10$lFXYwGm0.RVSljUWk4B1auLRaWbZ5hr3cMj9yOCQbMOS9KuXR5Y6.', 1, NULL, '2023-05-13 23:27:49', '2023-05-13 23:27:49', 2),
(11, 'Faishal Rahmat', '10121212012012009', 'JL Sarijadi No 1 A', 'Dr Faishal', 'TIDAK', NULL, '2000-03-09', 23, 'Faishal', 'faishal@dokter.com', NULL, '$2y$10$6AgKjiUfTBIjOl2JQWKfzOYbMkb/zSa4copAjV/RTH58c1NfxTKwy', 1, NULL, '2023-05-13 23:30:12', '2023-05-13 23:30:12', 2),
(12, 'Idris Mardefi', '101212120120120220', 'JL Sarijadi No 1 B', 'Idris', 'YA', '1011931212130', '2000-03-09', 23, 'Idris', 'idris@gmail.com', NULL, '$2y$10$SN4MBj.KBOB8rwoyxbOGAONcX5Ww4ZecRDki4U8js5XDKddzYBa0.', 1, NULL, '2023-05-19 08:45:12', '2023-06-10 06:05:23', 0),
(13, 'Aldy Pratama', '101212131212121212131414', 'JL Sarijadi No 1 A', 'Aldy', 'YA', '1230192381241031312', '2000-03-09', 23, 'Aldy', 'aldy@gmail.com', NULL, '$2y$10$YzwtrvWiMVaHYNm7sTjv7eqP9lRg0AUzCDesQQUtraW0hPB49M8sy', 2, NULL, '2023-06-11 04:46:43', '2023-06-11 04:46:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `category_pelayanan`
--
ALTER TABLE `category_pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `obat_categories`
--
ALTER TABLE `obat_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`kode_resep_obat`);

--
-- Indexes for table `surat_rujukan`
--
ALTER TABLE `surat_rujukan`
  ADD PRIMARY KEY (`kode_rujukan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`NIK`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_pelayanan`
--
ALTER TABLE `category_pelayanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `obat_categories`
--
ALTER TABLE `obat_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
