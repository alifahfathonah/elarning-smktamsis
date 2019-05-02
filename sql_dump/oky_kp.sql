-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 11:13 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oky_kp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(8) NOT NULL,
  `admin_nama` varchar(100) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(6) DEFAULT NULL,
  `admin_level` varchar(5) DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_level`, `alamat`, `email`, `no_telp`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '																jogja\r\n							\r\n							', 'admin@gmail.com', '08123456789');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(8) NOT NULL,
  `guru_nip` varchar(20) DEFAULT NULL,
  `guru_nama` varchar(100) DEFAULT NULL,
  `guru_username` varchar(50) DEFAULT NULL,
  `guru_password` varchar(6) DEFAULT NULL,
  `guru_level` varchar(4) DEFAULT NULL,
  `guru_telp` varchar(20) DEFAULT NULL,
  `guru_alamat` text,
  `guru_email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_username`, `guru_password`, `guru_level`, `guru_telp`, `guru_alamat`, `guru_email`) VALUES
(1, '1985033020190428', 'guru satu', 'guru', 'guru', 'guru', '08123456789', 'jogja', 'gurusatu@gmail.com'),
(3, '1991010120190428', 'Guru Tiga', 'gurutiga', 'guruti', 'guru', '08123456789', 'bantul							', 'gurutiga@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` int(10) NOT NULL,
  `soal_id` int(10) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `siswa_id` varchar(10) NOT NULL,
  `file` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(8) NOT NULL,
  `kelas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(2, 'kelas 1'),
(3, 'kelas 2'),
(4, 'kelas 3');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `materi_id` int(10) NOT NULL,
  `materi_nama` varchar(64) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `guru_id` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pbm`
--

CREATE TABLE `pbm` (
  `tahun_ajaran` varchar(4) DEFAULT NULL,
  `pelajaran_id` int(15) DEFAULT NULL,
  `siswa_id` int(10) DEFAULT NULL,
  `mapel_id` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `pelajaran_id` int(8) NOT NULL,
  `pelajaran_nama` varchar(50) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`pelajaran_id`, `pelajaran_nama`, `kelas_id`) VALUES
(4, 'Matematika', 2),
(5, 'Bahasa Indonesia', 3),
(6, 'Bahasa Inggris', 4);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(8) NOT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `siswa_username` varchar(50) DEFAULT NULL,
  `siswa_password` varchar(6) DEFAULT NULL,
  `siswa_level` varchar(5) DEFAULT NULL,
  `siswa_telp` varchar(20) DEFAULT NULL,
  `siswa_alamat` text,
  `siswa_email` varchar(50) DEFAULT NULL,
  `kelas_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_username`, `siswa_password`, `siswa_level`, `siswa_telp`, `siswa_alamat`, `siswa_email`, `kelas_id`) VALUES
(1, '111235020000120001', 'siswa satu', 'siswa', 'siswa', 'siswa', '08123456789', 'jogja', 'siswasatu@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(10) NOT NULL,
  `jawaban_id` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(15) DEFAULT NULL,
  `tanggal_soal` date DEFAULT NULL,
  `file` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`materi_id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `pelajaran_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
