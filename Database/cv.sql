-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 10:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `nama_project` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link_project` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `nama_project`, `keterangan`, `image`, `link_project`) VALUES
(1, 'Rancang Bangun Sistem Informasi Absensi SMK Al-mujahid Sebagai Web Desain ', 'Proyek ini bertujuan untuk merancang dan membangun sistem informasi absensi berbasis web untuk SMK Al-Mujahid. Sistem ini dirancang untuk mempermudah proses pencatatan, pengelolaan, dan pelaporan kehadiran siswa secara efisien dan terstruktur.', 'Screenshot 2024-12-20 143448.png', 'https://www.figma.com/design/Nr5OELSCP5MUIe5BeHEkGL/Untitled?node-id=0-1&t=9yVDi8gw3IqDTedT-1'),
(2, 'Coming Soon Web Taraju', 'Web Taraju adalah proyek pengembangan situs web yang dirancang untuk mempromosikan dan menyediakan informasi lengkap tentang daerah Taraju. Proyek ini bertujuan untuk memberikan platform digital yang mendukung pengenalan budaya, wisata, potensi lokal, dan informasi terkait lainnya kepada masyarakat luas.', 'Screenshot 2024-12-20 152346.png', 'https://github.com/cyzahr'),
(3, 'Desain Interaktif Aplikasi Rental Sepeda Figma', 'Proyek ini bertujuan untuk merancang aplikasi rental sepeda yang interaktif, modern, dan user-friendly.', 'Screenshot 2025-01-04 114441.png', 'https://www.figma.com/design/zQ2kCfLjiuuTTXC7ghxZTo/Prototype-Aplikasi-Sewa-Sepeda?node-id=0-1&t=TGZj7EKzUGoXJpl8-1');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pendidikan`
--

CREATE TABLE `riwayat_pendidikan` (
  `id` int(11) NOT NULL,
  `pendidikan` text DEFAULT NULL,
  `tahun` varchar(10) DEFAULT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pendidikan`
--

INSERT INTO `riwayat_pendidikan` (`id`, `pendidikan`, `tahun`, `nama_sekolah`) VALUES
(1, 'SD', '2010-2016', 'SDN Lengkongbarang'),
(2, 'SLTP', '2016-2019', 'SMPN 2 Cikatomas'),
(3, 'SLTA', '2019-2022', 'Man 1 Tasikmalaya | MIPA'),
(4, 'S1', '2022-2026', 'Universitas Perjuangan Tasikmalaya | Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `jenis_kelamin`, `alamat`, `deskripsi`, `foto`) VALUES
(1, 'Cahyani Azhar', 'Perempuan', 'Kp. Mekartanjung Desa Cayur Kecamatan Cikatomas Kabupaten Tasikmalaya1', 'Aku adalah seorang yang mencintai hujan dan menemukan kenyamanan dalam kesunyian. Sebagai seorang introvert, aku cenderung menikmati waktu sendiri dibandingkan bersosialisasi, meskipun itu bukan berarti aku tidak menghargai kehadiran orang lain. Trust issue yang aku miliki membuatku selektif dalam membuka diri, tetapi aku selalu menghargai hubungan yang tulus dan penuh pengertian. Ketenangan adalah rumah bagiku, tempat aku bisa merasa damai dan mendengar suara hatiku sendiri.', '1684483985235.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_pendidikan`
--
ALTER TABLE `riwayat_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
