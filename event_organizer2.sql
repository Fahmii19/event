-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2022 at 10:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id` int(11) NOT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `alasan` varchar(200) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `kategori_peserta_id` int(11) NOT NULL,
  `nosertifikat` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id`, `tanggal_daftar`, `alasan`, `users_id`, `kegiatan_id`, `kategori_peserta_id`, `nosertifikat`) VALUES
(3, '2022-06-12', 'ingin kuliah di luar negerid', 2, 1, 2, 'S-2022-VI-001');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kegiatan`
--

CREATE TABLE `jenis_kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_kegiatan`
--

INSERT INTO `jenis_kegiatan` (`id`, `nama`) VALUES
(1, 'Seminar'),
(2, 'Workshop'),
(3, 'Event Olah Raga'),
(4, 'Bazaar'),
(5, 'Pelatihan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_peserta`
--

CREATE TABLE `kategori_peserta` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_peserta`
--

INSERT INTO `kategori_peserta` (`id`, `nama`) VALUES
(1, 'Pelajar'),
(2, 'Mahasiswa'),
(3, 'Karyawan Swasta'),
(4, 'Guru/Dosen'),
(5, 'Umum'),
(6, 'ASN');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `harga_tiket` double DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `narasumber` varchar(200) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `pic` varchar(45) DEFAULT NULL,
  `foto_flyer` text DEFAULT NULL,
  `jenis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `judul`, `kapasitas`, `harga_tiket`, `tanggal`, `narasumber`, `tempat`, `pic`, `foto_flyer`, `jenis_id`) VALUES
(1, 'Seminar Sukses Kuliah di Luar Negeri', 100, 25000, '2022-06-30', 'Dr. Seto Waluyo, Dr. Annisa PhD, Misna Azqia M.Kom', 'Aula Kampus B2 STT-NF', 'ahmad fathan', 'flyer-220708-5d07a922e7.png', 1),
(7, 'fahmi', 434, 45345, '2022-07-07', '3453', '5345', '34543', 'flyer-220708-0e6018f17e.png', 3),
(16, 'Seminar Sukses Kuliah di Luar Negeri', 12, 1222, '2022-07-08', 'Fahmi', 'BCC', 'Agnes Monica', 'flyer-220708-30a89de8e8.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `last_login`, `status`, `role`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', '2022-06-12 00:07:42', '2022-06-12 00:07:42', 1, 'administrator'),
(2, 'aminah', '90b74c589f46e8f3a484082d659308bd', 'aminah@gmail.com', '2022-06-12 00:07:44', '2022-06-12 00:07:44', 1, 'public'),
(3, 'fahmi', 'f11d50d63d3891a44c332e46d6d7d561', 'fahmi@gmail.com', '2022-07-30 19:54:36', '2022-07-30 19:54:36', 1, 'public');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pesanan_users1_idx` (`users_id`),
  ADD KEY `fk_pesanan_produk1_idx` (`kegiatan_id`),
  ADD KEY `fk_daftar_kategori_peserta1_idx` (`kategori_peserta_id`);

--
-- Indexes for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_jenis_produk_idx` (`jenis_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_kegiatan`
--
ALTER TABLE `jenis_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kategori_peserta`
--
ALTER TABLE `kategori_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `fk_daftar_kategori_peserta1` FOREIGN KEY (`kategori_peserta_id`) REFERENCES `kategori_peserta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesanan_produk1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pesanan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_produk_jenis_produk` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
