-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2025 at 09:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sigap`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(5) UNSIGNED NOT NULL,
  `type` int(1) UNSIGNED DEFAULT NULL,
  `jenis_name` enum('Permohonan','Gangguan') NOT NULL,
  `judul` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `type`, `jenis_name`, `judul`, `description`) VALUES
(1, 1, 'Permohonan', 'Permohonan Server, Aplikasi, Calotation dan Domain', NULL),
(2, 1, 'Permohonan', 'Permohonan Pointing dan Integrasi', NULL),
(3, 1, 'Permohonan', 'Permohonan Upload dan Publikasi', NULL),
(4, 1, 'Permohonan', 'Permohonan Jaringan', NULL),
(5, 1, 'Permohonan', 'Permohonan Pembuatan dan Kapasitas Akun dan Email', NULL),
(6, 1, 'Permohonan', 'Permohonan Peminjaman Ruangan', NULL),
(7, 1, 'Permohonan', 'Permohonan Kunjungan Data Center dan Server', NULL),
(8, 2, 'Gangguan', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', NULL),
(9, 2, 'Gangguan', 'Error Kendala Aplikasi', NULL),
(10, 2, 'Gangguan', 'Permasalahan Akun dan Email', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-10-28-205117', 'App\\Database\\Migrations\\Order', 'default', 'App', 1734858045, 1),
(2, '2024-10-28-205118', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1734858045, 1),
(3, '2025-07-20-112309', 'App\\Database\\Migrations\\AddPriorityAndDeadlineToOrders', 'default', 'App', 1753011138, 2),
(4, '2025-07-30-151550', 'App\\Database\\Migrations\\CreateUserGroupsTable', 'default', 'App', 1753888584, 3),
(5, '2025-07-30-152157', 'App\\Database\\Migrations\\AddUsergroupIdToUsersTable', 'default', 'App', 1753888937, 4),
(6, '2025-07-30-153104', 'App\\Database\\Migrations\\CreateJenisTable', 'default', 'App', 1753889488, 5),
(7, '2025-07-30-153903', 'App\\Database\\Migrations\\AddJudulToJenis', 'default', 'App', 1753889969, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(5) UNSIGNED NOT NULL,
  `no_order` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `jenis` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `priority` int(3) DEFAULT 1,
  `deadline` date DEFAULT NULL,
  `tanggal_input` datetime DEFAULT NULL,
  `tanggal_ubah` datetime DEFAULT NULL,
  `type` int(1) UNSIGNED DEFAULT NULL,
  `user_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `no_order`, `username`, `judul`, `jenis`, `detail`, `status`, `email`, `file_name`, `file_type`, `file_size`, `file_path`, `priority`, `deadline`, `tanggal_input`, `tanggal_ubah`, `type`, `user_id`) VALUES
(48, 'ORD-1753020663', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'dd', 'ditolak', 'wayyu@gmail.com', '1753020663_db85a64e568a09eede5c.pdf', 'application/pdf', 272226, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753020663_db85a64e568a09eede5c.pdf', 4, '2025-07-21', '2025-07-20 14:11:03', '2025-07-20 14:14:30', 1, NULL),
(49, 'ORD-1753020863', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'wqwjidsjxc', 'ditolak', 'wayyu@gmail.com', '1753020863_429c03ea46f3bd300f83.png', 'image/png', 38432, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753020863_429c03ea46f3bd300f83.png', 4, '2025-07-21', '2025-07-20 14:14:23', '2025-07-20 14:14:31', 1, NULL),
(50, 'ORD-1753021330', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'shuxjn', 'done', 'wayyu@gmail.com', '1753021330_52a4dc0e9c403d9cecb3.png', 'image/png', 38432, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753021330_52a4dc0e9c403d9cecb3.png', 10, '2025-07-21', '2025-07-20 14:22:10', '2025-07-21 11:34:15', 1, NULL),
(51, 'ORD-1753021640', 'wayu', 'Permohonan Peminjaman Ruangan', 'Permohonan', 'akjsbnxjk, n', 'done', 'wayyu@gmail.com', '1753021640_4d73a12f88cce106d4db.png', 'image/png', 38432, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753021640_4d73a12f88cce106d4db.png', 4, '2025-07-21', '2025-07-20 14:27:20', '2025-07-21 11:40:31', 1, NULL),
(52, 'ORD-1753021679', 'wayu', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Gangguan', 'telasomu', 'ditolak', 'wayyu@gmail.com', '1753021679_611114938d78c5dd975f.pdf', 'application/pdf', 272226, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753021679_611114938d78c5dd975f.pdf', 6, '2025-07-21', '2025-07-20 14:27:59', '2025-07-20 14:33:33', 2, NULL),
(53, 'ORD-1753021730', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 's', 'ditolak', 'wayyu@gmail.com', '1753021730_3619978491eebbd75aa8.png', 'image/png', 38432, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753021730_3619978491eebbd75aa8.png', 9, '2025-07-23', '2025-07-20 14:28:50', '2025-07-20 14:33:35', 1, NULL),
(54, 'ORD-1753021785', 'wayu', 'Permohonan Jaringan', 'Permohonan', 'sd', 'done', 'wayyu@gmail.com', '1753021785_e1cedd011f95137f92ab.pdf', 'application/pdf', 272226, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753021785_e1cedd011f95137f92ab.pdf', 7, '2025-07-22', '2025-07-20 14:29:45', '2025-07-21 11:40:25', 1, NULL),
(55, 'ORD-1753022035', 'wayu', 'Permohonan Peminjaman Ruangan', 'Permohonan', 'aa', 'ditolak', 'wayyu@gmail.com', '1753022035_a7b10731acfa9d8de84a.png', 'image/png', 38432, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753022035_a7b10731acfa9d8de84a.png', 1, '2025-07-25', '2025-07-20 14:33:55', '2025-07-21 11:11:51', 1, NULL),
(56, 'ORD-1753096349', 'wayu', 'Permohonan Pembuatan dan Kapasitas Akun dan Email', 'Permohonan', 'cukurukuk', 'ditolak', 'wayyu@gmail.com', '1753096349_8c3f1d35eba40ab56954.png', 'image/png', 44647, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753096349_8c3f1d35eba40ab56954.png', 6, '2025-07-23', '2025-07-21 11:12:29', '2025-07-21 11:13:07', 1, NULL),
(57, 'ORD-1753198040', 'wayu', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Gangguan', 'wkd,smd', 'done', 'wayyu@gmail.com', '1753198040_c9bb205b6dbb58092046.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1347896, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753198040_c9bb205b6dbb58092046.docx', 6, '2025-07-24', '2025-07-22 15:27:20', '2025-07-30 18:23:09', 2, NULL),
(58, 'ORD-1753276944', 'caca', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Gangguan', 'fgh', 'ditolak', 'caca@gmail.com', '1753276944_828773eb899309db6a97.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1342641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753276944_828773eb899309db6a97.docx', 3, '2025-07-28', '2025-07-23 13:22:24', '2025-07-23 15:51:57', 2, NULL),
(59, 'ORD-1753303065', 'caca', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Gangguan', 'contoh', 'ditolak', 'caca@gmail.com', '1753303065_db3b6abdbdf8b840fa31.pdf', 'application/pdf', 1085641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753303065_db3b6abdbdf8b840fa31.pdf', 3, '2025-07-30', '2025-07-23 20:37:45', '2025-07-24 06:55:06', 2, NULL),
(60, 'ORD-1753303205', 'wayu', 'Permohonan Pembuatan dan Kapasitas Akun dan Email', 'Permohonan', 'contoh 2', 'ditolak', 'wayyu@gmail.com', '1753303205_a73473f3c2dae25c3960.png', 'image/png', 59320, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753303205_a73473f3c2dae25c3960.png', 3, '2025-07-30', '2025-07-23 20:40:05', '2025-07-24 06:55:09', 1, NULL),
(61, 'ORD-1753303271', 'user', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'contoh 3', 'ditolak', 'user@gmail.com', '1753303271_b85bfd144753a2397542.png', 'image/png', 32795, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753303271_b85bfd144753a2397542.png', 7, '2025-07-26', '2025-07-23 20:41:11', '2025-07-24 06:55:13', 1, NULL),
(62, 'ORD-1753303476', 'wayu', 'Permohonan Pointing dan Integrasi', 'Permohonan', 'contoh3', 'ditolak', 'wayyu@gmail.com', '1753303476_aec7ae673d2f17c41afd.png', 'image/png', 41125, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753303476_aec7ae673d2f17c41afd.png', 6, '2025-07-27', '2025-07-23 20:44:36', '2025-07-24 06:55:16', 1, NULL),
(63, 'ORD-1753340010', 'caca', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'seceoastnya', 'ditolak', 'caca@gmail.com', '1753340010_5b6a84434c68451e1f05.png', 'image/png', 32795, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340010_5b6a84434c68451e1f05.png', 7, '2025-07-27', '2025-07-24 06:53:30', '2025-07-24 06:55:19', 1, NULL),
(64, 'ORD-1753340150', 'caca', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'cepat ya', 'ditolak', 'caca@gmail.com', '1753340150_09db260649640fb654f9.png', 'image/png', 47553, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340150_09db260649640fb654f9.png', 7, '2025-07-27', '2025-07-24 06:55:50', '2025-07-24 07:06:00', 1, NULL),
(65, 'ORD-1753340168', 'caca', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Gangguan', 'cepat', 'ditolak', 'caca@gmail.com', '1753340168_b28bc68cf3ffa70aea43.png', 'image/png', 47553, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340168_b28bc68cf3ffa70aea43.png', 3, '2025-07-31', '2025-07-24 06:56:08', '2025-07-24 07:06:03', 2, NULL),
(66, 'ORD-1753340188', 'caca', 'Permohonan Pointing dan Integrasi', 'Permohonan', 'segera', 'ditolak', 'caca@gmail.com', '1753340188_1c44e0615fbf73841855.pdf', 'application/pdf', 1211456, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340188_1c44e0615fbf73841855.pdf', 6, '2025-07-28', '2025-07-24 06:56:28', '2025-07-24 07:06:06', 1, NULL),
(67, 'ORD-1753340403', 'wayu', 'Permohonan Upload dan Publikasi', 'Permohonan', 'cek', 'ditolak', 'wayyu@gmail.com', '1753340403_16bc43b8a874c904aa81.png', 'image/png', 59320, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340403_16bc43b8a874c904aa81.png', 5, '2025-07-29', '2025-07-24 07:00:03', '2025-07-24 07:06:11', 1, NULL),
(68, 'ORD-1753340809', 'wayu', 'Permohonan Kunjungan Data Center dan Server', 'Permohonan', 'cek', 'done', 'wayyu@gmail.com', '1753340809_d2576e2079d8b409e115.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1342641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340809_d2576e2079d8b409e115.docx', 7, '2025-07-27', '2025-07-24 07:06:49', '2025-07-30 18:24:28', 1, NULL),
(69, 'ORD-1753340823', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'cek', 'done', 'wayyu@gmail.com', '1753340823_68865a582fdd94c47e22.png', 'image/png', 59320, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340823_68865a582fdd94c47e22.png', 7, '2025-07-27', '2025-07-24 07:07:03', '2025-07-30 18:30:48', 1, NULL),
(70, 'ORD-1753340880', 'wayu', 'Permasalahan Akun dan Email', 'Gangguan', 'm', 'done', 'wayyu@gmail.com', '1753340880_fd70ab850925d4066c4c.png', 'image/png', 47553, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340880_fd70ab850925d4066c4c.png', 1, '2025-08-02', '2025-07-24 07:08:00', '2025-07-30 18:26:56', 2, NULL),
(71, 'ORD-1753340932', 'wayu', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'klj,', 'done', 'wayyu@gmail.com', '1753340932_0b31c52752c2c1d5f1f8.png', 'image/png', 47553, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753340932_0b31c52752c2c1d5f1f8.png', 7, '2025-07-27', '2025-07-24 07:08:52', '2025-07-30 18:30:50', 1, NULL),
(72, 'ORD-1753341386', 'user', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'p', 'done', 'user@gmail.com', '1753341386_5376ec053926d60a7851.pdf', 'application/pdf', 1085641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753341386_5376ec053926d60a7851.pdf', 7, '2025-07-27', '2025-07-24 07:16:26', '2025-07-30 18:27:01', 1, NULL),
(73, 'ORD-1753341621', 'caca', 'Permohonan Peminjaman Ruangan', 'Permohonan', 'qjlaxn', 'done', 'caca@gmail.com', '1753341621_7a957db1f574a8e109ee.pdf', 'application/pdf', 1085641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753341621_7a957db1f574a8e109ee.pdf', 1, '2025-08-02', '2025-07-24 07:20:21', '2025-07-30 18:30:53', 1, NULL),
(74, 'ORD-1753341635', 'caca', 'Permohonan Server, Aplikasi, Calotation dan Domain', 'Permohonan', 'qwelksd mx,c  ', 'done', 'caca@gmail.com', '1753341635_fdfca731412e16f5a69a.pdf', 'application/pdf', 1211456, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753341635_fdfca731412e16f5a69a.pdf', 7, '2025-07-27', '2025-07-24 07:20:35', '2025-07-30 18:27:04', 1, NULL),
(75, 'ORD-1753342332', 'wayu', 'Permohonan Kunjungan Data Center dan Server', 'Permohonan', 'jwjeldbnljwns d', 'done', 'wayyu@gmail.com', '1753342332_92a72fba6a504c722dd9.pdf', 'application/pdf', 1085641, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753342332_92a72fba6a504c722dd9.pdf', 7, '2025-07-27', '2025-07-24 07:32:12', '2025-07-30 18:30:51', 1, NULL),
(76, 'ORD-1753900136', 'wayu', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Layanan Gangguan', 'internet lantai 3 lambat', 'ditolak', 'wayyu@gmail.com', '1753900136_1e37a8c2135ca922bd51.csv', 'application/octet-stream', 13052, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753900136_1e37a8c2135ca922bd51.csv', 3, '2025-08-06', '2025-07-30 18:28:56', '2025-07-30 18:29:44', NULL, NULL),
(77, 'ORD-1753909115', 'wayu', 'Gangguan VPN Tidak Terhubung, Internet Lambat, dan Bandwidth Error', 'Layanan Gangguan', 'testing', 'pending', 'wayyu@gmail.com', '1753909115_291dcb42b2a2d39370d5.csv', 'application/octet-stream', 13052, 'C:\\xampp\\htdocs\\sigap1\\writable\\uploads/1753909115_291dcb42b2a2d39370d5.csv', 3, '2025-08-06', '2025-07-30 20:58:35', '2025-07-30 20:58:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin','superadmin','kasusbag') NOT NULL DEFAULT 'user',
  `usergroup_id` int(5) UNSIGNED DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`, `usergroup_id`, `email`, `no_wa`, `created_at`, `updated_at`) VALUES
(1, 'superadmin user', 'superadmin', '$2y$10$H./aKq7sdGxtka5J1AKC8O4r2KF9ft0RsFhO7rJ7tqdxf.Hse.D.q', 'superadmin', 1, 'superadmin@gmail.com', '081354969042', NULL, NULL),
(2, 'admin user', 'admin', '$2y$10$tzavQ60eQjS5Z7JuFiUhk.VJi9iHphHCiIOR2jI56fMDh2GYTICom', 'admin', 2, 'admin@gmail.com', '081354969041', NULL, NULL),
(3, 'pengguna', 'user', '$2y$10$zwCsPnTeVTzC36zXU7chhu6f3/gjwR3uAs7qD/NstxLnfD4RUZN7q', 'user', 4, 'user@gmail.com', '081354969043', NULL, NULL),
(4, 'Siti Nurul Magfirah ', 'mage05', '$2y$10$yYYO4qVolVWIkeh9GhQkyeGp/HnT4IHEbjEYYuDH.oPIiaRjEmvh.', 'user', 4, 'mage@gmail.com', '0812345678998', '2025-01-20 10:27:08', '2025-01-20 10:27:08'),
(5, 'Putra Abadi Wahyudi Sitorus', 'putrabadiws', '$2y$10$xqr6l1ipHVGcOJRp1vVmZepKxcWr171.jFDl3CXtxFaMdUzCp9dkm', 'user', 4, 'putrasayang_mama@yahoo.com', '081354969045', '2025-04-17 07:27:04', '2025-04-17 07:27:04'),
(6, 'wayyu', 'wayu', '$2y$10$ISoN3IDfPSlmIjB8jAMWW.HbRPthgr/QFA5Z7A3G12WSKLFA1E78.', 'user', 4, 'wayyu@gmail.com', '082254969041', '2025-07-06 05:59:09', '2025-07-06 05:59:09'),
(7, 'caca', 'caca', '$2y$10$kOKOQczsnluEIx0rovTdzekz.BJy0eV3VdO.mIIbx9W7u/4gyO5P6', 'user', 4, 'caca@gmail.com', '0812345678998', '2025-07-23 13:20:35', '2025-07-23 13:20:35'),
(10, 'kasusbag 1', 'kasusbag_user', '$2y$10$xfGFAAVPKVolnpnAzuqStOt5cdK6bD9kCqBfuvtVqmJfJF.z90gXK', 'kasusbag', 3, 'kasusbag@example.com', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(5) UNSIGNED NOT NULL,
  `group_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `description`) VALUES
(1, 'superadmin', 'Super Administrator with full control'),
(2, 'admin', 'Administrator with certain access rights'),
(3, 'kasusbag', 'Responsible for case management'),
(4, 'user', 'Standard user with basic access rights');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` int(5) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `user_id`, `action`, `timestamp`) VALUES
(1, 6, 'User logged in', '2025-07-30 22:58:37'),
(2, 10, 'User logged in', '2025-07-30 22:59:09'),
(3, 1, 'User logged in', '2025-07-30 22:59:32'),
(4, 1, 'User logged in', '2025-07-30 23:05:58'),
(5, 1, 'User logged in', '2025-07-30 23:41:14'),
(6, 1, 'User logged in', '2025-07-30 23:50:42'),
(7, 6, 'User logged in', '2025-07-31 00:09:46'),
(8, 1, 'User logged in', '2025-07-31 00:10:10'),
(9, 1, 'User logged in', '2025-07-31 00:32:27'),
(10, 1, 'User logged in', '2025-07-31 05:36:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_type` (`type`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_group` (`usergroup_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `fk_jenis_type` FOREIGN KEY (`type`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `jenis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_group` FOREIGN KEY (`usergroup_id`) REFERENCES `user_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
