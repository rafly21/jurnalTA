-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2019 at 05:52 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jurnal`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id_user` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permission` enum('manajemen','pengelola','guest','') NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL,
  `dihapus_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id_user`, `username`, `password`, `permission`, `dibuat_pada`, `diubah_pada`, `dihapus_pada`) VALUES
(1, 'm', '6f8f57715090da2632453988d9a1501b', 'manajemen', NULL, NULL, NULL),
(5, 'p', '83878c91171338902e0fe0fb97a8c47a', 'pengelola', NULL, NULL, NULL),
(10, 'p1', 'ec6ef230f1828039ee794566b9c58adc', 'pengelola', NULL, NULL, NULL),
(14, 'pr1', 'e060bb629c10e1b143614cc1e9ccdc67', 'pengelola', NULL, NULL, NULL),
(17, 'newuser', '0354d89c28ec399c00d3cb2d094cf093', 'pengelola', NULL, NULL, NULL),
(18, 'usera', '697aa03927398125bb6282e2f414a6be', 'pengelola', '2019-01-16 09:03:21', NULL, '2019-01-16 09:33:39'),
(19, 'ahaha', '32c239f5926298d951f7b8adbef1341c', 'pengelola', '2019-01-17 09:17:10', NULL, '2019-01-17 09:17:21'),
(20, 'prabowo', '8fc9ea4323c75d30cd28d1ca854d56d8', 'pengelola', '2019-01-17 09:22:47', NULL, '2019-01-17 09:22:52'),
(21, 'imam', 'eaccb8ea6090a40a98aa28c071810371', 'pengelola', '2019-01-30 13:23:29', NULL, NULL),
(22, 'sri', 'd1565ebd8247bbb01472f80e24ad29b6', 'pengelola', '2019-01-30 13:26:06', NULL, NULL),
(23, 'didik', '2ff462bc49e322708a48d3d5e3ca4bab', 'pengelola', '2019-01-30 13:31:38', NULL, NULL),
(24, 'retno', 'edd39370424d54db23ccec123f0ce66b', 'pengelola', '2019-01-30 19:24:45', NULL, NULL),
(25, 'asih', '9a27adf1714b77f749db78b0e5f2f75c', 'pengelola', '2019-01-30 20:35:26', NULL, NULL),
(26, 'mustafid', 'fd7795c9ab6eb42bed9450216a5989d5', 'pengelola', '2019-01-30 23:10:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bulan_penerbitan`
--

CREATE TABLE `bulan_penerbitan` (
  `id` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `bulan_terbit` varchar(2) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan_penerbitan`
--

INSERT INTO `bulan_penerbitan` (`id`, `id_jurnal`, `bulan_terbit`, `dibuat_pada`, `diubah_pada`) VALUES
(123, 39, '8', NULL, NULL),
(133, 23, '3', NULL, NULL),
(134, 23, '6', NULL, NULL),
(135, 23, '9', NULL, NULL),
(136, 23, '12', NULL, NULL),
(141, 40, '2', NULL, NULL),
(149, 20, '2', NULL, '2019-01-16 05:13:47'),
(150, 20, '4', NULL, '2019-01-16 05:13:47'),
(155, 24, '6', NULL, '2019-01-30 19:20:38'),
(156, 24, '12', NULL, '2019-01-30 19:20:38'),
(159, 34, '3', NULL, '2019-01-30 19:21:35'),
(160, 34, '5', NULL, '2019-01-30 19:21:36'),
(161, 35, '4', NULL, '2019-01-30 19:33:52'),
(162, 35, '10', NULL, '2019-01-30 19:33:52'),
(163, 36, '2', NULL, '2019-01-30 19:36:38'),
(164, 36, '5', NULL, '2019-01-30 19:36:38'),
(165, 21, '3', NULL, '2019-01-30 19:37:16'),
(166, 21, '5', NULL, '2019-01-30 19:37:16'),
(177, 38, '4', NULL, '2019-01-30 23:18:45'),
(178, 38, '10', NULL, '2019-01-30 23:18:45'),
(179, 37, '6', NULL, '2019-01-30 23:19:24'),
(180, 37, '12', NULL, '2019-01-30 23:19:24'),
(185, 41, '4', NULL, '2019-02-13 15:01:46'),
(186, 41, '9', NULL, '2019-02-13 15:01:46'),
(189, 22, '1', NULL, NULL),
(190, 22, '4', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `data_pengelola`
--

CREATE TABLE `data_pengelola` (
  `id_pengelola` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL,
  `dihapus_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengelola`
--

INSERT INTO `data_pengelola` (`id_pengelola`, `id_user`, `nama`, `email`, `no_telp`, `foto`, `dibuat_pada`, `diubah_pada`, `dihapus_pada`) VALUES
(1, 1, 'LPPM', 'lppm@undip.ac.id', '81097654', '', NULL, NULL, NULL),
(3, 5, 'Uripno Budiono', 'besudigdo@gmail.com', '87731437', 'assets/Foto/1547647634-uripno-budiono.jpg', NULL, '2019-01-16 08:07:14', NULL),
(8, 10, 'Edy Kurnianto', 'rezafp@gmail.com', '87341267', 'assets/Foto/271218-reza.jpg', NULL, '2019-01-30 12:39:13', NULL),
(12, 14, 'FX Adji Samekto', 'pri@gmail.com', '8765431', 'assets/Foto/271218-pro.jpg', NULL, '2019-01-30 12:39:58', NULL),
(15, 17, 'Ambariyanto', 'newuser@mail.test', '087512643931', 'assets/Foto/271218-newuser.jpg', NULL, '2019-01-30 19:07:37', NULL),
(16, 18, 'usera', 'usera@gmail.com', '087512643912', '', '2019-01-16 09:03:21', '2019-01-16 09:06:54', '2019-01-16 09:33:39'),
(17, 19, 'ahaha', 'aha@gmail.com', '087512643916', '', '2019-01-17 09:17:10', NULL, '2019-01-17 09:17:21'),
(18, 20, 'pra bowo', 'aha@gmail.com', '087512643915', '', '2019-01-17 09:22:47', NULL, '2019-01-17 09:22:52'),
(19, 21, 'Imam Buchori', 'aha@gmail.com', '08751264365', 'assets/Foto/300119-imam-buchori.jpg', '2019-01-30 13:23:29', '2019-01-30 13:35:26', NULL),
(20, 22, 'Sri Padma Sari', 'useri@gmail.com', '087512643534', 'assets/Foto/300119-sri-padma-sari.png', '2019-01-30 13:26:06', NULL, NULL),
(21, 23, 'Eko Didik Widianto', 'usery@gmail.com', '08751264375', 'assets/Foto/300119-eko-didik-widianto.jpg', '2019-01-30 13:31:38', NULL, NULL),
(22, 24, 'Retno Kusumaningrum', 'newusera@mail.test', '087512643680', 'assets/Foto/310119-retno-kusumaningrum.jpg', '2019-01-30 19:24:45', NULL, NULL),
(23, 25, 'D I Asih Maruddani', 'aha2@gmail.com', '087512643102', 'assets/Foto/310119-d-i-asih-maruddani.png', '2019-01-30 20:35:26', NULL, NULL),
(24, 26, 'Mustafid', 'mus@mail.test', '08751264354', 'assets/Foto/310119-mustafid.jpg', '2019-01-30 23:10:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(50) NOT NULL,
  `id_fak` int(11) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`, `id_fak`, `dibuat_pada`, `diubah_pada`) VALUES
(20, 'Departemen Teknik Arsitektur', 1, NULL, NULL),
(21, 'Departemen Teknik Komputer', 1, NULL, NULL),
(22, 'Departemen Teknik Perencanaan Wilayah Dan Kota', 1, NULL, NULL),
(23, 'Departemen Teknik Elektro', 1, NULL, NULL),
(24, 'Departemen Teknik Geodesi', 1, NULL, NULL),
(25, 'Departemen Teknik Geologi', 1, NULL, NULL),
(26, 'Departemen Teknik Industri', 1, NULL, NULL),
(27, 'Departemen Teknik Kimia', 1, NULL, NULL),
(28, 'Departemen Teknik Lingkungan', 1, NULL, NULL),
(29, 'Departemen Teknik Mesin', 1, NULL, NULL),
(30, 'Departemen Teknik Perkapalan', 1, NULL, NULL),
(31, 'Departemen Teknik Sipil', 1, NULL, NULL),
(32, 'Program Studi Ilmu Hukum', 2, NULL, NULL),
(33, 'Departemen Manajemen', 3, NULL, NULL),
(34, 'Departemen Akuntansi', 3, NULL, NULL),
(35, 'Departemen Ekonomi Pembangunan', 3, NULL, NULL),
(36, 'Departemen Ilmu Ekonomi Syariah ', 3, NULL, NULL),
(37, 'Program Studi Sastra Inggris', 4, NULL, NULL),
(38, 'Program Studi Sastra Indonesia', 4, NULL, NULL),
(39, 'Program Studi Ilmu Sejarah', 4, NULL, NULL),
(40, 'Program Studi Ilmu Perpustakaan', 4, NULL, NULL),
(41, 'Program Studi Sastra Jepang', 4, NULL, NULL),
(42, 'Program Studi Administrasi Bisnis', 5, NULL, NULL),
(43, 'Program Studi Ilmu Komunikasi', 5, NULL, NULL),
(44, 'Program Studi Administrasi Publik', 5, NULL, NULL),
(45, 'Program Studi Ilmu Pemerintahan', 5, NULL, NULL),
(46, 'Program Studi Hubungan Internasional', 5, NULL, NULL),
(47, 'Program Studi Ilmu Kedokteran', 6, NULL, NULL),
(48, 'Program Studi Ilmu Gizi', 6, NULL, NULL),
(49, 'Program Studi Ilmu Keperawatan', 6, NULL, NULL),
(50, 'Program Studi Ilmu Anestesi dan Terapi Intensif', 6, NULL, NULL),
(51, 'Program Studi Kesehatan Masyarakat', 7, NULL, NULL),
(52, 'Departemen Sumberdaya Akuatik', 8, NULL, NULL),
(53, 'Departemen Akuakultur', 8, NULL, NULL),
(54, 'Departemen Perikanan Tangkap', 8, NULL, NULL),
(55, 'Departemen Teknologi Hasil Perikanan', 8, NULL, NULL),
(56, 'Departemen Ilmu Kelautan', 8, NULL, NULL),
(57, 'Departemen Oseanografi', 8, NULL, NULL),
(58, 'Program Studi Peternakan', 9, NULL, NULL),
(59, 'Program Studi Agribisnis', 9, NULL, NULL),
(60, 'Program Studi Agroekoteknologi', 9, NULL, NULL),
(61, 'Program Studi Teknologi Pangan', 9, NULL, NULL),
(62, 'Departemen Matematika', 10, NULL, NULL),
(63, 'Departemen Biologi', 10, NULL, NULL),
(64, 'Departemen Kimia', 10, NULL, NULL),
(65, 'Departemen Fisika', 10, NULL, NULL),
(66, 'Departemen Statistika', 10, NULL, NULL),
(67, 'Departemen Informatika', 10, NULL, NULL),
(68, 'Program Studi Psikologi', 11, NULL, NULL),
(69, 'Magister Ilmu Kesehatan Masyarakat', 13, NULL, NULL),
(70, 'Magister Kenotariatan', 13, NULL, NULL),
(71, 'Magister Sistem Informasi', 13, NULL, NULL),
(72, 'Magister Epidemiologi', 13, NULL, NULL),
(73, 'Magister Energi', 13, NULL, NULL),
(74, 'Doktor Ilmu Lingkungan', 13, NULL, NULL),
(75, 'Magister Ilmu Lingkungan', 13, NULL, NULL),
(76, 'Magister Manajemen', 13, NULL, NULL),
(77, 'Magister Akuntansi', 13, NULL, NULL),
(78, 'Magister Ekonomi Pembangunan', 13, NULL, NULL),
(79, 'Doktor Ilmu Ekonomi', 13, NULL, NULL),
(80, 'Magister Ilmu Hukum', 13, NULL, NULL),
(81, 'Doktor Ilmu Hukum', 13, NULL, NULL),
(82, 'Magister Ilmu Sejarah', 13, NULL, NULL),
(83, 'Magister Susastra', 13, NULL, NULL),
(84, 'Magister Ilmu Linguistik', 13, NULL, NULL),
(85, 'Magister Ilmu Antropologi Sosial', 13, NULL, NULL),
(86, 'Magister Ilmu Komunikasi', 13, NULL, NULL),
(87, 'Magister Ilmu Administrasi Publik', 13, NULL, NULL),
(88, 'Magister Ilmu Politik', 13, NULL, NULL),
(89, 'Doktor Ilmu Sosial', 13, NULL, NULL),
(90, 'Doktor Administrasi Publik', 13, NULL, NULL),
(91, 'Magister Keperawatan', 13, NULL, NULL),
(92, 'Magister Ilmu Biomedik', 13, NULL, NULL),
(93, 'Doktor Ilmu Kedokteran', 13, NULL, NULL),
(94, 'Magister Kesehatan Masyarakat', 13, NULL, NULL),
(95, 'Magister Kesehatan Lingkungan', 13, NULL, NULL),
(96, 'Magister Promosi Kesehatan', 13, NULL, NULL),
(97, 'Doktor Ilmu Kesehatan Masyarakat', 13, NULL, NULL),
(98, 'Magister Ilmu Kelautan', 13, NULL, NULL),
(99, 'Magister Manajemen Sumber Daya Pantai', 13, NULL, NULL),
(100, 'Doktor Ilmu Kelautan', 13, NULL, NULL),
(101, 'Doktor Manajemen Sumberdaya Pantai', 13, NULL, NULL),
(102, 'Magister Ilmu Peternakan', 13, NULL, NULL),
(103, 'Magister Agribisnis', 13, NULL, NULL),
(104, 'Doktor Ilmu Peternakan', 13, NULL, NULL),
(105, 'Magister Biologi', 13, NULL, NULL),
(106, 'Magister Fisika', 13, NULL, NULL),
(107, 'Magister Kimia', 13, NULL, NULL),
(108, 'Magister Matematika', 13, NULL, NULL),
(109, 'Magister Teknik Elektro', 13, NULL, NULL),
(110, 'Magister Teknik Arsitektur', 13, NULL, NULL),
(111, 'Magister Teknik Perencanaan Wilayah dan Kota', 13, NULL, NULL),
(112, 'Magister Teknik Sipil', 13, NULL, NULL),
(113, 'Magister Teknik Mesin', 13, NULL, NULL),
(114, 'Magister Teknik Kimia', 13, NULL, NULL),
(115, 'Doktor Teknik Arsitektur', 13, NULL, NULL),
(116, 'Doktor Teknik Sipil', 13, NULL, NULL),
(117, 'Doktor Teknik Mesin', 13, NULL, NULL),
(118, 'Doktor Teknik Kimia', 13, NULL, NULL),
(119, 'Departemen Ilmu Bedah', 6, NULL, NULL),
(120, 'Departemen Ilmu Patologi Klinik', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fak` int(11) NOT NULL,
  `nama_fak` varchar(100) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fak`, `nama_fak`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'Fakultas Teknik', NULL, NULL),
(2, 'Fakultas Hukum', NULL, NULL),
(3, 'Fakultas Ekonomika dan Bisnis', NULL, NULL),
(4, 'Fakultas Ilmu Budaya', NULL, NULL),
(5, 'Fakultas Ilmu Sosial dan Ilmu Politik', NULL, NULL),
(6, 'Fakultas Kedokteran', NULL, NULL),
(7, 'Fakultas Kesehatan Masyarakat', NULL, NULL),
(8, 'Fakultas Perikanan dan Ilmu Kelautan', NULL, NULL),
(9, 'Fakultas Peternakan dan Pertanian', NULL, NULL),
(10, 'Fakultas Sains dan Matematika', NULL, NULL),
(11, 'Fakultas Psikologi', NULL, NULL),
(12, 'Sekolah Vokasi', NULL, NULL),
(13, 'Sekolah PascaSarjana', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `no_jurnal` int(4) NOT NULL,
  `id_pengelola` int(11) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `singkatan` varchar(30) NOT NULL,
  `sponsor` varchar(100) DEFAULT NULL,
  `e_issn` varchar(15) DEFAULT NULL,
  `p_issn` varchar(15) DEFAULT NULL,
  `english` tinyint(1) NOT NULL,
  `thn_mulai` varchar(4) NOT NULL,
  `no_terakhir` varchar(1) NOT NULL,
  `terbit_terakhir` int(4) NOT NULL,
  `doi` varchar(10) DEFAULT NULL,
  `mpgundip` tinyint(1) NOT NULL,
  `id_portal` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `url_sinta` varchar(200) DEFAULT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL,
  `dihapus_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `no_jurnal`, `id_pengelola`, `judul`, `singkatan`, `sponsor`, `e_issn`, `p_issn`, `english`, `thn_mulai`, `no_terakhir`, `terbit_terakhir`, `doi`, `mpgundip`, `id_portal`, `url`, `url_sinta`, `dibuat_pada`, `diubah_pada`, `dihapus_pada`) VALUES
(20, 5, 8, 'Journal of the Indonesian Tropical Animal Agricultur', 'JITAA', ' Indonesian Society of Animal Agriculture', '2460-6278', '2087-8273', 1, '2012', '4', 2017, '10.14710', 1, 1, 'jitaa', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=678', NULL, '2019-01-16 05:13:47', NULL),
(21, 5, 12, 'Masalah Masalah Hukum', 'MMH', '', '2460-6278', '2087-8273', 0, '2012', '4', 2017, '10.14710', 1, 1, 'hohohoh', '', NULL, '2019-01-30 19:37:15', NULL),
(22, 8, 3, 'Jurnal anestesiologi indonesiya', 'Janesti', 'oiyhi', '2460-6278', '2087-8273', 1, '2012', '4', 2017, '10.14719', 1, 1, 'afaaf', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=678', NULL, '2019-02-17 07:56:17', NULL),
(23, 4, 15, 'ILMU KELAUTAN: Indonesian Journal of Marine Sciences', 'IJRED', '', '2098-6745', '2098-2976', 1, '2012', '4', 2017, '10.14710', 1, 1, 'ijred', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=678', NULL, NULL, NULL),
(24, 7, 20, 'Nurse Media Journal of Nursing', 'Medianers', '', '2406-8799', '2087-7811', 1, '2012', '2', 2017, '10.14710', 0, 1, 'medianers', 'http://sinta2.ristekdikti.go.id/journals/detail?id=914', NULL, '2019-01-30 19:20:38', NULL),
(34, 91, 19, 'Geoplanning: Journal of Geomatics and Planning', 'Geomatics', 'Geomatics and Planning Laboratory', '2355-6544', '', 1, '2014', '4', 2017, '10.14710', 1, 1, 'geoplanning', 'http://sinta2.ristekdikti.go.id/journals/detail?id=933', NULL, '2019-01-30 19:21:35', NULL),
(35, 35, 22, 'Jurnal Masyarakat Informatika', 'J_MASIF', '', '', '2086-4930', 0, '2012', '2', 2015, '', 0, 1, 'jmasif', 'http://sinta2.ristekdikti.go.id/journals/detail?id=396', NULL, '2019-01-30 19:33:52', NULL),
(36, 8, 21, 'jurnal teknologi dan sistem komputer', 'jsiskom', '', '2460-6278', '2087-8273', 1, '2015', '4', 2017, '10.14710', 1, 1, 'jtsiskom', 'http://sinta2.ristekdikti.go.id/journals/detail?id=914', NULL, '2019-01-30 19:36:38', NULL),
(37, 7, 23, 'Media Statistika', 'medstat', 'jjj', '2477-0647', '1979-3693', 0, '2012', '1', 2017, '10.14710', 1, 1, 'media_statistika', 'http://sinta2.ristekdikti.go.id/journals/detail?id=1963', NULL, '2019-01-30 23:19:23', NULL),
(38, 62, 24, 'Jurnal Sistem Informasi Bisnis', 'JSINBIS', '', '2502-2377', '2088-3587', 0, '2012', '2', 2017, '10.21456', 1, 1, 'jsinbis', 'http://sinta2.ristekdikti.go.id/journals/detail?id=1074', NULL, '2019-01-30 23:18:44', NULL),
(39, 54, 12, 'jurnal ccc', 'ggg', '', '2460-6265', '', 0, '2015', '1', 2016, '10.14710', 0, 2, 'ccc', '', NULL, NULL, NULL),
(40, 77, 15, 'jurnal jurnala', 'oleole', 'obobobo', '2460-6264', '2087-8200', 0, '2013', '1', 2015, '10.14710', 0, 1, 'jln', 'http://sinta2.ristekdikti.go.id/journals/detail/?id=918', NULL, NULL, NULL),
(41, 98, 15, 'jurnal api', 'okok', '', '2460-6274', '2087-8222', 1, '2014', '2', 2018, '10.14710', 1, 2, 'apik', '', '2019-01-16 04:37:20', '2019-02-13 15:01:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_pengindeks`
--

CREATE TABLE `jurnal_pengindeks` (
  `id_jurnal` int(11) NOT NULL,
  `id_jp` int(11) NOT NULL,
  `id_pengindeks` int(11) NOT NULL,
  `url_pengindeks` varchar(60) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal_pengindeks`
--

INSERT INTO `jurnal_pengindeks` (`id_jurnal`, `id_jp`, `id_pengindeks`, `url_pengindeks`, `dibuat_pada`, `diubah_pada`) VALUES
(23, 53, 2, 'https://doaj.org/toc/2098-2976', NULL, NULL),
(40, 58, 1, 'https://scopus.org/toc/2087-8273', NULL, NULL),
(20, 63, 2, 'https://doaj.org/toc/2087-8273', NULL, '2019-01-16 05:13:47'),
(24, 66, 2, 'https://doaj.org/toc/2406-8799', NULL, '2019-01-30 19:20:39'),
(34, 67, 2, 'https://doaj.org/toc/2087-8273', NULL, '2019-01-30 19:21:36'),
(21, 68, 2, 'https://doaj.org/toc/2087-8273', NULL, '2019-01-30 19:37:16'),
(38, 72, 2, 'https://doaj.org/toc/2502-2377', NULL, '2019-01-30 23:18:45'),
(41, 75, 3, 'https://esci.org/toc/2087-8264', NULL, '2019-02-13 15:01:46'),
(22, 77, 2, 'https://doaj.org/toc/2087-8273', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(11) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `id_dept` int(11) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`, `id_dept`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'laboratorium embedded', 21, NULL, NULL),
(6, 'laboratorium rekayasa perangkat lunak', 65, NULL, '2019-01-31 09:18:08');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nama_lembaga` varchar(50) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id_lembaga`, `nama_lembaga`, `dibuat_pada`, `diubah_pada`) VALUES
(100, 'Center of Biomass and Renewable Energy (CBIORE)', NULL, '2019-01-16 05:39:37'),
(101, 'Lembaga Penelitian dan Pengabdian Masyarakat', NULL, NULL),
(102, 'Waste Resources Research Center (WRRC)', NULL, NULL),
(103, 'lembaga a', NULL, '2019-01-31 09:17:19'),
(104, 'lembaga b', NULL, '2019-01-31 09:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `id_jurnal` int(11) DEFAULT NULL,
  `jenis_penerbit` enum('departemen','fakultas','lab','lembaga') DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `id_jurnal`, `jenis_penerbit`, `id_jenis`, `dibuat_pada`, `diubah_pada`) VALUES
(20, 20, 'fakultas', 9, NULL, '2019-01-16 05:13:47'),
(21, 21, 'fakultas', 2, NULL, '2019-01-30 19:37:16'),
(22, 22, 'departemen', 50, NULL, '2019-01-30 19:37:40'),
(23, 23, 'lembaga', 100, NULL, NULL),
(24, 24, 'departemen', 49, NULL, '2019-01-30 19:20:38'),
(25, 34, 'departemen', 24, NULL, '2019-01-30 19:21:36'),
(26, 35, 'departemen', 67, NULL, '2019-01-30 19:33:53'),
(27, 36, 'departemen', 21, NULL, '2019-01-30 19:36:38'),
(28, 37, 'departemen', 66, NULL, '2019-01-30 23:19:24'),
(29, 38, 'departemen', 71, NULL, '2019-01-30 23:18:45'),
(30, 39, 'departemen', 78, NULL, NULL),
(31, 40, 'fakultas', 4, NULL, NULL),
(32, 41, 'departemen', 64, '2019-01-16 04:37:20', '2019-02-13 15:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `pengindeks`
--

CREATE TABLE `pengindeks` (
  `nama` varchar(20) NOT NULL,
  `id_pengindeks` int(11) NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengindeks`
--

INSERT INTO `pengindeks` (`nama`, `id_pengindeks`, `dibuat_pada`, `diubah_pada`) VALUES
('Scopus', 1, NULL, NULL),
('DOAJ', 2, NULL, NULL),
('ESCI', 3, NULL, NULL),
('ACI', 4, NULL, NULL),
('Google Scholar', 5, NULL, NULL),
('EBSCO', 7, '2019-01-25 03:51:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `nama_portal` varchar(10) NOT NULL,
  `id_portal` int(11) NOT NULL,
  `base_url` varchar(200) DEFAULT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`nama_portal`, `id_portal`, `base_url`, `dibuat_pada`, `diubah_pada`) VALUES
('ejournal1', 1, 'https://ejournal.undip.ac.id/index.php/', NULL, NULL),
('ejournal2', 2, 'https://ejournal2.undip.ac.id/index.php/', NULL, NULL),
('ejournal3', 3, 'https://ejournal3.undip.ac.id/index.php/', NULL, NULL),
('lainnya', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `id_sk` int(11) NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `tanggal_penetapan` date NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk`
--

INSERT INTO `sk` (`id_sk`, `no_sk`, `deskripsi`, `tanggal_penetapan`, `dibuat_pada`, `diubah_pada`) VALUES
(1, 'SK 12/M/Kp/II/2015 ', '', '2016-10-26', NULL, '2019-01-30 20:55:31'),
(4, 'SK 60/E/KPT/2016  ', '', '2017-02-07', NULL, '2019-01-30 20:55:41'),
(7, 'SK 60/E/KPT/2014  ', '', '2016-07-06', NULL, '2019-01-30 20:55:20'),
(8, ' 51/E/KPT/2017 ', '', '2017-08-18', NULL, '2019-01-31 09:08:59'),
(9, '28/E/KPT/2017	', 'Hasil Akreditasi Jurnal Ilmiah Periode 2 2017', '2017-06-05', NULL, '2019-01-31 09:08:47'),
(11, '21/E/KPT/2018', 'Hasil Akreditasi Jurnal Ilmiah Periode 1 2018', '2018-07-09', '2019-01-30 20:50:31', NULL),
(12, '30/E/KPT/2018', 'Hasil Akreditasi Jurnal Ilmiah Periode 2 2018', '2018-10-24', '2019-01-30 23:24:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sk_jurnal`
--

CREATE TABLE `sk_jurnal` (
  `id_sk_jurnal` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `peringkat_sinta` varchar(2) DEFAULT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `dibuat_pada` timestamp NULL DEFAULT NULL,
  `diubah_pada` timestamp NULL DEFAULT NULL,
  `dihapus_pada` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sk_jurnal`
--

INSERT INTO `sk_jurnal` (`id_sk_jurnal`, `id_jurnal`, `id_sk`, `peringkat_sinta`, `tanggal_mulai`, `tanggal_berakhir`, `dibuat_pada`, `diubah_pada`, `dihapus_pada`) VALUES
(12, 20, 8, 'S2', '2015-02-06', '0000-00-00', NULL, NULL, '2019-01-30 23:20:42'),
(14, 22, 7, 'S3', '2016-08-03', '0000-00-00', NULL, NULL, NULL),
(15, 23, 4, 'S3', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(16, 24, 4, 'S4', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(17, 20, 1, 'S1', '0000-00-00', '0000-00-00', NULL, NULL, '2019-01-30 23:00:22'),
(18, 20, 4, 'S2', '0000-00-00', '0000-00-00', NULL, NULL, '2019-01-30 23:00:54'),
(19, 20, 8, 'S3', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(20, 20, 9, 'S2', '0000-00-00', '0000-00-00', NULL, NULL, NULL),
(27, 40, 8, 'S1', '2021-06-15', '2026-06-17', NULL, NULL, '2019-01-16 06:04:10'),
(28, 40, 8, 'S2', '2019-01-11', '2022-07-22', '2019-01-16 06:03:18', NULL, '2019-01-16 06:04:10'),
(29, 37, 11, 'S2', '2016-06-11', '2020-07-14', '2019-01-30 21:06:50', NULL, NULL),
(30, 38, 8, 'S2', '2017-07-12', '2021-11-17', '2019-01-30 23:17:46', NULL, NULL),
(31, 21, 12, '--', '2017-06-08', '2021-08-19', '2019-01-30 23:25:19', NULL, '2019-01-30 23:26:52'),
(32, 21, 12, 'S2', '2017-06-13', '2021-07-21', '2019-01-30 23:27:13', NULL, NULL),
(33, 39, 1, '--', '2019-01-09', '2022-06-07', '2019-01-31 07:30:30', NULL, '2019-01-31 07:32:54'),
(34, 39, 4, 'nu', '2016-07-13', '2022-07-14', '2019-01-31 07:33:14', NULL, '2019-01-31 07:34:03'),
(35, 39, 4, 'S0', '2019-03-15', '2021-07-07', '2019-01-31 07:34:22', NULL, '2019-01-31 08:01:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `bulan_penerbitan`
--
ALTER TABLE `bulan_penerbitan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_terbit_jurnal` (`id_jurnal`);

--
-- Indexes for table `data_pengelola`
--
ALTER TABLE `data_pengelola`
  ADD PRIMARY KEY (`id_pengelola`),
  ADD KEY `fk_pengelola_user` (`id_user`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`),
  ADD KEY `fk_dept_fak` (`id_fak`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `fk_pengelola_jurnal` (`id_pengelola`),
  ADD KEY `fk_portal_jurnal` (`id_portal`);

--
-- Indexes for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  ADD PRIMARY KEY (`id_jp`),
  ADD KEY `fk_jp_jurnal` (`id_jurnal`),
  ADD KEY `fk_jp_pengindeks` (`id_pengindeks`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`),
  ADD KEY `fk_lab_dept` (`id_dept`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`),
  ADD KEY `fk_penerbit_jurnal` (`id_jurnal`);

--
-- Indexes for table `pengindeks`
--
ALTER TABLE `pengindeks`
  ADD PRIMARY KEY (`id_pengindeks`);

--
-- Indexes for table `portal`
--
ALTER TABLE `portal`
  ADD PRIMARY KEY (`id_portal`);

--
-- Indexes for table `sk`
--
ALTER TABLE `sk`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indexes for table `sk_jurnal`
--
ALTER TABLE `sk_jurnal`
  ADD PRIMARY KEY (`id_sk_jurnal`),
  ADD KEY `fk_skjurnal_jurnal` (`id_jurnal`),
  ADD KEY `fk_skjurnal_sk` (`id_sk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bulan_penerbitan`
--
ALTER TABLE `bulan_penerbitan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `data_pengelola`
--
ALTER TABLE `data_pengelola`
  MODIFY `id_pengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  MODIFY `id_jp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengindeks`
--
ALTER TABLE `pengindeks`
  MODIFY `id_pengindeks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portal`
--
ALTER TABLE `portal`
  MODIFY `id_portal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sk_jurnal`
--
ALTER TABLE `sk_jurnal`
  MODIFY `id_sk_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bulan_penerbitan`
--
ALTER TABLE `bulan_penerbitan`
  ADD CONSTRAINT `fk_terbit_jurnal` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_pengelola`
--
ALTER TABLE `data_pengelola`
  ADD CONSTRAINT `fk_pengelola_user` FOREIGN KEY (`id_user`) REFERENCES `auth` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `departemen`
--
ALTER TABLE `departemen`
  ADD CONSTRAINT `fk_dept_fak` FOREIGN KEY (`id_fak`) REFERENCES `fakultas` (`id_fak`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `fk_pengelola_jurnal` FOREIGN KEY (`id_pengelola`) REFERENCES `data_pengelola` (`id_pengelola`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_portal_jurnal` FOREIGN KEY (`id_portal`) REFERENCES `portal` (`id_portal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  ADD CONSTRAINT `fk_jp_jurnal` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jp_pengindeks` FOREIGN KEY (`id_pengindeks`) REFERENCES `pengindeks` (`id_pengindeks`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lab`
--
ALTER TABLE `lab`
  ADD CONSTRAINT `fk_lab_dept` FOREIGN KEY (`id_dept`) REFERENCES `departemen` (`id_dept`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD CONSTRAINT `fk_penerbit_jurnal` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sk_jurnal`
--
ALTER TABLE `sk_jurnal`
  ADD CONSTRAINT `fk_skjurnal_jurnal` FOREIGN KEY (`id_jurnal`) REFERENCES `jurnal` (`id_jurnal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_skjurnal_sk` FOREIGN KEY (`id_sk`) REFERENCES `sk` (`id_sk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
