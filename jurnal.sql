-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2018 at 04:17 PM
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
  `id_user` int(3) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `permission` enum('manajemen','pengelola','guest','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id_user`, `username`, `password`, `permission`) VALUES
(1, 'm', '6f8f57715090da2632453988d9a1501b', 'manajemen'),
(5, 'p', '83878c91171338902e0fe0fb97a8c47a', 'pengelola'),
(10, 'p1', 'ec6ef230f1828039ee794566b9c58adc', 'pengelola'),
(14, 'pr1', 'e060bb629c10e1b143614cc1e9ccdc67', 'pengelola'),
(15, 'gg', '73c18c59a39b18382081ec00bb456d43', 'pengelola'),
(16, 'hh', '5e36941b3d856737e81516acd45edc50', 'pengelola');

-- --------------------------------------------------------

--
-- Table structure for table `bulan_penerbitan`
--

CREATE TABLE `bulan_penerbitan` (
  `id` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `bulan_terbit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pengelola`
--

CREATE TABLE `data_pengelola` (
  `id_pengelola` int(3) NOT NULL,
  `id_user` int(2) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `no_telp` int(20) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pengelola`
--

INSERT INTO `data_pengelola` (`id_pengelola`, `id_user`, `nama`, `email`, `no_telp`, `foto`) VALUES
(1, 1, 'LPPM', 'lppm@undip.ac.id', 81097654, 'a.jpg'),
(3, 5, 'BONI', 'besudigdo@gmail.com', 87731438, 'b.jpg'),
(8, 10, 'reza', 'rezafp@gmail.com', 87341267, ''),
(12, 14, 'pri', 'pri@gmail.com', 8765431, ''),
(13, 15, 'Robi', 'robi@gmail.com', 8764532, ''),
(14, 16, 'amien', 'amien@gmail.com', 877314567, '');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(50) NOT NULL,
  `id_fak` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`, `id_fak`) VALUES
(20, 'Departemen Teknik Arsitektur', 1),
(21, 'Departemen Teknik Komputer', 1),
(22, 'Departemen Teknik Perencanaan Wilayah Dan Kota', 1),
(23, 'Departemen Teknik Elektro', 1),
(24, 'Departemen Teknik Geodesi', 1),
(25, 'Departemen Teknik Geologi', 1),
(26, 'Departemen Teknik Industri', 1),
(27, 'Departemen Teknik Kimia', 1),
(28, 'Departemen Teknik Lingkungan', 1),
(29, 'Departemen Teknik Mesin', 1),
(30, 'Departemen Teknik Perkapalan', 1),
(31, 'Departemen Teknik Sipil', 1),
(32, 'Program Studi Ilmu Hukum', 2),
(33, 'Departemen Manajemen', 3),
(34, 'Departemen Akuntansi', 3),
(35, 'Departemen Ekonomi Pembangunan', 3),
(36, 'Departemen Ilmu Ekonomi Syariah ', 3),
(37, 'Program Studi Sastra Inggris', 4),
(38, 'Program Studi Sastra Indonesia', 4),
(39, 'Program Studi Ilmu Sejarah', 4),
(40, 'Program Studi Ilmu Perpustakaan', 4),
(41, 'Program Studi Sastra Jepang', 4),
(42, 'Program Studi Administrasi Bisnis', 5),
(43, 'Program Studi Ilmu Komunikasi', 5),
(44, 'Program Studi Administrasi Publik', 5),
(45, 'Program Studi Ilmu Pemerintahan', 5),
(46, 'Program Studi Hubungan Internasional', 5),
(47, 'Program Studi Ilmu Kedokteran', 6),
(48, 'Program Studi Ilmu Gizi', 6),
(49, 'Program Studi Ilmu Keperawatan', 6),
(50, 'Program Studi Ilmu Anestesi dan Terapi Intensif', 6),
(51, 'Program Studi Kesehatan Masyarakat', 7),
(52, 'Departemen Sumberdaya Akuatik', 8),
(53, 'Departemen Akuakultur', 8),
(54, 'Departemen Perikanan Tangkap', 8),
(55, 'Departemen Teknologi Hasil Perikanan', 8),
(56, 'Departemen Ilmu Kelautan', 8),
(57, 'Departemen Oseanografi', 8),
(58, 'Program Studi Peternakan', 9),
(59, 'Program Studi Agribisnis', 9),
(60, 'Program Studi Agroekoteknologi', 9),
(61, 'Program Studi Teknologi Pangan', 9),
(62, 'Departemen Matematika', 10),
(63, 'Departemen Biologi', 10),
(64, 'Departemen Kimia', 10),
(65, 'Departemen Fisika', 10),
(66, 'Departemen Statistika', 10),
(67, 'Departemen Informatika', 10),
(68, 'Program Studi Psikologi', 11),
(69, 'Magister Ilmu Kesehatan Masyarakat', 13),
(70, 'Magister Kenotariatan', 13),
(71, 'Magister Sistem Informasi', 13),
(72, 'Magister Epidemiologi', 13),
(73, 'Magister Energi', 13),
(74, 'Doktor Ilmu Lingkungan', 13),
(75, 'Magister Ilmu Lingkungan', 13),
(76, 'Magister Manajemen', 13),
(77, 'Magister Akuntansi', 13),
(78, 'Magister Ekonomi Pembangunan', 13),
(79, 'Doktor Ilmu Ekonomi', 13),
(80, 'Magister Ilmu Hukum', 13),
(81, 'Doktor Ilmu Hukum', 13),
(82, 'Magister Ilmu Sejarah', 13),
(83, 'Magister Susastra', 13),
(84, 'Magister Ilmu Linguistik', 13),
(85, 'Magister Ilmu Antropologi Sosial', 13),
(86, 'Magister Ilmu Komunikasi', 13),
(87, 'Magister Ilmu Administrasi Publik', 13),
(88, 'Magister Ilmu Politik', 13),
(89, 'Doktor Ilmu Sosial', 13),
(90, 'Doktor Administrasi Publik', 13),
(91, 'Magister Keperawatan', 13),
(92, 'Magister Ilmu Biomedik', 13),
(93, 'Doktor Ilmu Kedokteran', 13),
(94, 'Magister Kesehatan Masyarakat', 13),
(95, 'Magister Kesehatan Lingkungan', 13),
(96, 'Magister Promosi Kesehatan', 13),
(97, 'Doktor Ilmu Kesehatan Masyarakat', 13),
(98, 'Magister Ilmu Kelautan', 13),
(99, 'Magister Manajemen Sumber Daya Pantai', 13),
(100, 'Doktor Ilmu Kelautan', 13),
(101, 'Doktor Manajemen Sumberdaya Pantai', 13),
(102, 'Magister Ilmu Peternakan', 13),
(103, 'Magister Agribisnis', 13),
(104, 'Doktor Ilmu Peternakan', 13),
(105, 'Magister Biologi', 13),
(106, 'Magister Fisika', 13),
(107, 'Magister Kimia', 13),
(108, 'Magister Matematika', 13),
(109, 'Magister Teknik Elektro', 13),
(110, 'Magister Teknik Arsitektur', 13),
(111, 'Magister Teknik Perencanaan Wilayah dan Kota', 13),
(112, 'Magister Teknik Sipil', 13),
(113, 'Magister Teknik Mesin', 13),
(114, 'Magister Teknik Kimia', 13),
(115, 'Doktor Teknik Arsitektur', 13),
(116, 'Doktor Teknik Sipil', 13),
(117, 'Doktor Teknik Mesin', 13),
(118, 'Doktor Teknik Kimia', 13),
(119, 'Program Studi Ilmu Kebidanan Dan Penyakit Kandunga', 6),
(120, 'Program Studi Ilmu Kedokteran Forensik', 6),
(121, 'Program Studi Ilmu Kesehatan Anak', 6),
(122, 'Program Studi Ilmu Patologi Anatomi', 6),
(123, 'Program Studi Ilmu Patologi Klinik', 6),
(124, 'Program Studi Ilmu Penyakit Dalam', 6),
(125, 'Program Studi Ilmu Penyakit Jantung Dan Pembuluh D', 6),
(126, 'Program Studi Ilmu Penyakit Kulit Dan Kelamin', 6),
(127, 'Program Studi Ilmu Penyakit Mata', 6),
(128, 'Program Studi Ilmu Penyakit Syaraf', 6),
(129, 'Program Studi Ilmu Penyakit Tht', 6),
(130, 'Program Studi Mikrobiologi Klinik', 6),
(131, 'Program Studi Psikiatri', 6),
(132, 'Program Studi Radiologi', 6),
(133, 'Program Studi Rehabilitasi Medik', 6),
(134, 'Program Studi Gizi Klinik', 6),
(135, 'Program Studi Ilmu Bedah', 6);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fak` int(2) NOT NULL,
  `nama_fak` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fak`, `nama_fak`) VALUES
(1, 'Fakultas Teknik'),
(2, 'Fakultas Hukum'),
(3, 'Fakultas Ekonomika dan Bisnis'),
(4, 'Fakultas Ilmu Budaya'),
(5, 'Fakultas Ilmu Sosial dan Ilmu Politik'),
(6, 'Fakultas Kedokteran'),
(7, 'Fakultas Kesehatan Masyarakat'),
(8, 'Fakultas Perikanan dan Ilmu Kelautan'),
(9, 'Fakultas Peternakan dan Pertanian'),
(10, 'Fakultas Sains dan Matematika'),
(11, 'Fakultas Psikologi'),
(12, 'Sekolah Vokasi'),
(13, 'Sekolah PascaSarjana');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` int(11) NOT NULL,
  `no_jurnal` int(11) NOT NULL,
  `id_pengelola` int(3) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `id_penerbit` int(2) NOT NULL,
  `singkatan` varchar(30) NOT NULL,
  `e_issn` varchar(15) NOT NULL,
  `p_issn` varchar(15) NOT NULL,
  `english` tinyint(1) NOT NULL,
  `thn_mulai` varchar(4) NOT NULL,
  `no_terakhir` int(11) NOT NULL,
  `terbit_terakhir` varchar(4) NOT NULL,
  `doi` varchar(10) DEFAULT NULL,
  `mpgundip` tinyint(1) NOT NULL,
  `url` varchar(100) NOT NULL,
  `peringkat_sinta` varchar(2) NOT NULL,
  `url_sinta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id_jurnal`, `no_jurnal`, `id_pengelola`, `judul`, `id_penerbit`, `singkatan`, `e_issn`, `p_issn`, `english`, `thn_mulai`, `no_terakhir`, `terbit_terakhir`, `doi`, `mpgundip`, `url`, `peringkat_sinta`, `url_sinta`) VALUES
(1, 85, 3, 'Jurnal Anestesiologi Indonesia', 2, 'Janesti', '2089-970X', '2337-5124', 0, '2012', 1, '2016', '10.14710', 0, '', '', ''),
(2, 4, 8, 'ILMU KELAUTAN: Indonesian Journal of Marine Sciences', 3, 'IJMS', '2406-7598', '0853-7291', 0, '2012', 4, '2017', '10.14710', 0, '', '', ''),
(3, 80, 12, 'International Journal of Renewable Energy Development', 4, 'IJRED', '2252-4940', '', 0, '2012', 3, '2017', '10.14710', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_pengindeks`
--

CREATE TABLE `jurnal_pengindeks` (
  `id_jurnal` int(4) NOT NULL,
  `id_jp` int(4) NOT NULL,
  `id_pengindeks` int(2) NOT NULL,
  `url` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id_lab` int(2) NOT NULL,
  `nama_lab` varchar(50) NOT NULL,
  `id_dept` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id_lab`, `nama_lab`, `id_dept`) VALUES
(1, 'laboratorium embedded', 21),
(2, 'laboratorium skidipapap digidaw uwuwu', 22);

-- --------------------------------------------------------

--
-- Table structure for table `last_update`
--

CREATE TABLE `last_update` (
  `id_last` int(3) NOT NULL,
  `id_jurnal` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nama_lembaga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id_lembaga`, `nama_lembaga`) VALUES
(100, 'Center of Biomass and Renewable Energy (CBIORE)'),
(101, 'Lembaga Penelitian dan Pengabdian Masyarakat'),
(102, 'Waste Resources Research Center (WRRC)');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(2) NOT NULL,
  `id_dept` int(2) DEFAULT NULL,
  `id_fak` int(2) DEFAULT NULL,
  `id_lab` int(2) DEFAULT NULL,
  `id_lembaga` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `id_dept`, `id_fak`, `id_lab`, `id_lembaga`) VALUES
(2, 50, 6, 0, 0),
(3, 56, 8, 0, 0),
(4, 1, 0, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `pengindeks`
--

CREATE TABLE `pengindeks` (
  `nama` varchar(20) NOT NULL,
  `id_pengindeks` int(2) NOT NULL,
  `tingkatan` varchar(2) NOT NULL,
  `grade` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengindeks`
--

INSERT INTO `pengindeks` (`nama`, `id_pengindeks`, `tingkatan`, `grade`) VALUES
('Scopus', 1, 'S2', 'Internasional Sedang'),
('DOAJ', 2, 'S2', 'Internasional Sedang'),
('ESCI', 3, 'S3', 'Internasional rendah'),
('ACI', 4, 'S4', 'Nasional Tinggi'),
('Google Scholar', 14, 'S3', 'Internasional Rendah'),
('aaa', 16, 'S3', 'Internasional Rendah');

-- --------------------------------------------------------

--
-- Table structure for table `portal`
--

CREATE TABLE `portal` (
  `id_portal` int(2) NOT NULL,
  `nama_portal` varchar(10) NOT NULL,
  `base_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portal`
--

INSERT INTO `portal` (`id_portal`, `nama_portal`, `base_url`) VALUES
(1, 'ejournal1', 'https://ejournal.undip.ac.id/index.php'),
(2, 'ejournal2', 'https://ejournal2.undip.ac.id/index.php'),
(3, 'ejournal3', 'https://ejournal3.undip.ac.id/index.php'),
(4, 'ejournal4', 'https://ejournal4.undip.ac.id/index.php');

-- --------------------------------------------------------

--
-- Table structure for table `sk`
--

CREATE TABLE `sk` (
  `id_sk` int(4) NOT NULL,
  `id_jurnal` int(4) NOT NULL,
  `no_sk` int(20) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_berakhir` date NOT NULL,
  `tanggal_penetapan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sk_jurnal`
--

CREATE TABLE `sk_jurnal` (
  `id` int(11) NOT NULL,
  `id_jurnal` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(3) NOT NULL,
  `id_jurnal` int(3) NOT NULL,
  `nama_sponsor` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pengelola`
--
ALTER TABLE `data_pengelola`
  ADD PRIMARY KEY (`id_pengelola`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fak`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`);

--
-- Indexes for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  ADD PRIMARY KEY (`id_jp`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `last_update`
--
ALTER TABLE `last_update`
  ADD PRIMARY KEY (`id_last`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bulan_penerbitan`
--
ALTER TABLE `bulan_penerbitan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_pengelola`
--
ALTER TABLE `data_pengelola`
  MODIFY `id_pengelola` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fak` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id_jurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurnal_pengindeks`
--
ALTER TABLE `jurnal_pengindeks`
  MODIFY `id_jp` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id_lab` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `last_update`
--
ALTER TABLE `last_update`
  MODIFY `id_last` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengindeks`
--
ALTER TABLE `pengindeks`
  MODIFY `id_pengindeks` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `portal`
--
ALTER TABLE `portal`
  MODIFY `id_portal` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sk`
--
ALTER TABLE `sk`
  MODIFY `id_sk` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sk_jurnal`
--
ALTER TABLE `sk_jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
