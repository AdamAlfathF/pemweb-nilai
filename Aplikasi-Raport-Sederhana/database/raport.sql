-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 02:11 PM
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
-- Database: `raport`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(18) NOT NULL,
  `kd_mp` int(11) DEFAULT NULL,
  `nama_guru` varchar(30) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('ISLAM','PROTESTAN','KATHOLIK','HINDU','BUDHA','KONGHUCU','LAINNYA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `kd_mp`, `nama_guru`, `alamat`, `jenis_kelamin`, `agama`) VALUES
('197303012006040082', 10, 'Bambang', 'Pamengpeuk', 'L', 'ISLAM'),
('197303012006041013', 1, 'Budi', 'Cikancung', 'L', 'ISLAM'),
('197303012006041093', 3, 'Rini Sopiati', 'Ciledug', 'P', 'ISLAM'),
('197303012006041434', 5, 'Titin Suratin', 'Pamengpeuk', 'P', 'ISLAM'),
('197303012006041439', 8, 'Tina Martil', 'Baleendah', 'P', 'ISLAM'),
('197303012006041801', 9, 'Jajang', 'Cikancung', 'L', 'PROTESTAN'),
('197303012006041867', 4, 'Abdul Halim', 'Tarogong', 'L', 'ISLAM'),
('197303012006042817', 2, 'Anwar', 'Pamengpeuk', 'L', 'ISLAM'),
('197303012006047117', 7, 'Hani', 'Tarogong', 'P', 'ISLAM'),
('197303012006048803', 11, 'Entis', 'Panyileukan', 'P', 'ISLAM'),
('197303012006048865', 6, 'Tarno', 'Mengkurakyat', 'L', 'ISLAM'),
('7827892', 14, 'Wilson', 'medan    ', 'L', 'KATHOLIK');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kd_mp` int(11) NOT NULL,
  `nama_mp` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kd_mp`, `nama_mp`) VALUES
(1, 'Pendidikan Agama Islam'),
(2, 'PKN'),
(3, 'Bahasa Indonesia'),
(4, 'Matematika'),
(5, 'Ilmu Pengetahuan Alam'),
(6, 'Ilmu Pengetahuan Sosial'),
(7, 'Bahasa Inggris'),
(8, 'Seni Budaya'),
(9, 'Penjasorkes'),
(10, 'Prakarya'),
(11, 'Bahasa Sunda'),
(14, 'Pemrograman Web');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `nis` varchar(8) NOT NULL,
  `kd_mp` int(11) NOT NULL,
  `semester` enum('1','2') DEFAULT NULL,
  `nilai` int(3) DEFAULT NULL,
  `predikat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`nis`, `kd_mp`, `semester`, `nilai`, `predikat`) VALUES
('77241560', 4, '1', 80, 'B'),
('77241560', 5, '1', 76, 'C'),
('77241560', 6, '1', 67, 'C'),
('77241560', 7, '1', 68, 'C'),
('77241560', 8, '1', 82, 'B'),
('77241560', 9, '1', 79, 'B'),
('77241560', 10, '1', 90, 'A'),
('77241560', 11, '1', 73, 'C'),
('77287165', 1, '1', 80, 'B'),
('77287165', 2, '1', 66, 'C'),
('77287165', 3, '1', 70, 'C'),
('77287165', 4, '1', 67, 'C'),
('77287165', 5, '1', 82, 'B'),
('77287165', 6, '1', 66, 'C'),
('77287165', 7, '1', 92, 'A'),
('77287165', 8, '1', 85, 'B'),
('77287165', 9, '1', 71, 'C'),
('77287165', 10, '1', 70, 'C'),
('77287165', 11, '1', 79, 'B'),
('77228601', 1, '1', 72, 'C'),
('77228601', 2, '1', 81, 'B'),
('77228601', 3, '1', 69, 'C'),
('77228601', 4, '1', 77, 'B'),
('77228601', 5, '1', 85, 'B'),
('77228601', 6, '1', 65, 'C'),
('77228601', 7, '1', 81, 'B'),
('77228601', 8, '1', 72, 'C'),
('77228601', 9, '1', 66, 'C'),
('77228601', 10, '1', 90, 'A'),
('77228601', 11, '1', 82, 'B'),
('77288132', 1, '1', 90, 'A'),
('77288132', 2, '1', 77, 'B'),
('77288132', 3, '1', 65, 'C'),
('77288132', 4, '1', 87, 'B'),
('77288132', 5, '1', 80, 'B'),
('77288132', 6, '1', 70, 'C'),
('77288132', 7, '1', 83, 'B'),
('77288132', 8, '1', 66, 'C'),
('77288132', 9, '1', 72, 'C'),
('77288132', 10, '1', 67, 'C'),
('77288132', 11, '1', 70, 'C'),
('87528528', 1, '1', 81, 'B'),
('77228601', 14, '2', 80, 'B'),
('77288132', 14, '1', 100, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `kelas` enum('1','2','3') NOT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `agama` enum('ISLAM','PROTESTAN','KATHOLIK','HINDU','BUDHA','KONGHUCU','LAINNYA') DEFAULT NULL,
  `orang_tua` varchar(30) DEFAULT NULL,
  `asal_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `kelas`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `orang_tua`, `asal_sekolah`) VALUES
('2302003', 'Adam Al Faathih Febriano', 'kutabumi ', '', '2005-02-02', 'L', 'ISLAM', '', 'Politeknik Gajah Tunggal'),
('77228601', 'akmal', 'Jl. Cimarantes ', '', '2005-02-05', 'L', 'ISLAM', 'Joko', 'SMAN 1 Kota Tangerang'),
('77241560', 'alika', 'Jl. Garut Tasik', '', '2007-07-17', 'P', 'ISLAM', 'Tono', 'SDN Ngamplang Sari 4'),
('77287165', 'siti', 'Jl. Margalaksana', '', '2007-08-10', 'P', 'ISLAM', 'Jakaria', 'SDN Ngamplang Sari 4'),
('77288132', 'adi', 'Jl. Tarogong', '', '2008-08-18', 'L', 'ISLAM', 'Hasan', 'SDN Ngamplang Sari 4'),
('87528528', 'Daffa', 'Baleendah', '', '2022-07-02', 'L', 'ISLAM', 'Orang Tua tapi yang botol', 'SDN Balebale');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin@aga.com', 'admin123', 'admin'),
(1, 'Admin', 'admin', 'admin', 'admin'),
(2, 'Dosen', 'dosen', 'dosen', 'dosen'),
(2, 'Dosen', 'dosen@aga.com', 'dosen123', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `kd_mp` (`kd_mp`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kd_mp`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD KEY `nis` (`nis`),
  ADD KEY `kd_mp` (`kd_mp`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `kd_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kd_mp`) REFERENCES `mata_pelajaran` (`kd_mp`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`kd_mp`) REFERENCES `mata_pelajaran` (`kd_mp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
