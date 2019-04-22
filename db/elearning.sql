-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2019 pada 11.55
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(8) NOT NULL,
  `admin_level` varchar(5) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_level`, `alamat`, `email`, `no_telp`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'Yogyakarta', 'admin@gmail.com', '08979820135'),
(2, 'Samuel Hw', 'Samuel', 'sam', 'admin', 'Janti, Sleman.', 'samuelhw@gmail.com', '082223676866');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `guru_nip` varchar(20) DEFAULT NULL,
  `guru_nama` varchar(100) DEFAULT NULL,
  `guru_username` varchar(50) DEFAULT NULL,
  `guru_password` varchar(8) DEFAULT NULL,
  `guru_level` varchar(4) DEFAULT NULL,
  `guru_telp` varchar(20) DEFAULT NULL,
  `guru_alamat` text,
  `guru_email` varchar(50) DEFAULT NULL,
  `pelajaran_id` int(15) NOT NULL,
  `kelas_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`guru_id`, `guru_nip`, `guru_nama`, `guru_username`, `guru_password`, `guru_level`, `guru_telp`, `guru_alamat`, `guru_email`, `pelajaran_id`, `kelas_id`) VALUES
(11, '121233080063010001', 'Akhmad Soleh, S. Pd.I', 'akhmad', 'akhmad', 'guru', '081325484731', 'Manding, Bantul', 'akhmadsoleh@gmail.com', 15, 0),
(12, '121233080063040002', 'Nur Fathan, S.Pd', 'Nur Fathan', 'nur', 'guru', '085725382715', 'Ngadirojo Secang, Magelang', 'nurfathan@gmail.com', 12, 0),
(13, '121233080063070003', 'Arif Wicaksono, S.Pd', 'Arif', 'arif', 'guru', '085292208333', 'Ngadirojo Secang, Magelang', 'arifwicaksono@gmail.com', 1, 0),
(14, '121233080063240004', 'Haidar Sinwani, S.Pd', 'Haidar', 'haidar', 'guru', '085201765199', 'Ngadirojo Secang, Magelang', 'haidarsinwani@gmail.com', 9, 0),
(20, '121233080663010000', 'Arifin, S.Pd', 'Arifin', 'arifin', 'guru', '085643261621', 'Dampit Windusari, Magelang', 'Arifin@gmail.com', 14, 0),
(21, '121233080063290006', 'Arif Mafruhin, S.Pd', 'Arif', 'ari', 'guru', '085643786675', 'Ngabean Secang, Mgelang', 'arif@gmail.com', 6, 0),
(22, '121233080063120007', 'Ning Nihayatul Faizah, S.Pd', 'Faizah', 'faizah', 'guru', '081328774965', 'Prapak Kranggan, Magelang', 'faizah@gmail.com', 3, 0),
(23, '121233080063160008', 'Ahmad Nur Islah', 'Islah', 'islah', 'guru', '085643739370', 'Bumen Sumowono, Semarang', 'Islah@gmail.com', 13, 0),
(24, '121233080063110009', 'Soim Anam, S.Ag', 'Anam', 'anam', 'guru', '081578631969', 'Pare Kranggan, Temanggung', 'anam@gmail.com', 7, 0),
(25, '121233080063070010', 'Dwi Setyowinarti, S.Pd.I', 'Dwi', 'dwi', 'guru', '085600496428', 'Badran Kranggan, Temanggung', 'dwi@gmail.com', 4, 0),
(26, '121233080063160011', 'Asrofi, S.Pd', 'Asrofi', 'asrofi', 'guru', '085868855227', 'Lebak Grabag, Magelang', 'asrofi@gmail.com', 11, 0),
(27, '121233080063160012', 'Erni Susbiyati, S.Pd', 'Erni', 'erni', 'guru', '081392915340', 'Ngadirojo secang, Magelang', 'erni@gmail.com', 5, 0),
(28, '121233080063160013', 'Siti Maesarohi, S.Pd.I', 'Siti', 'budi', 'guru', '08157957111', 'Gedongkuning, Jogja', 'sitims@gmail.com', 2, 0),
(29, '121233080063160014', 'Samsodin, S.Ag, M.Pd.I', 'Samsodin', 'samsodin', 'guru', '085643227337', 'Ngadirojo Secang, Magelang', 'samsodin@gmail.com', 17, 0),
(30, '121233080063160015', 'Miko', 'Miko', 'miko', 'guru', '0898986589', 'sorowajan, bantul', 'mikomm@gmail.com', 18, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `jawaban_id` int(10) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `tipe_file` varchar(20) DEFAULT NULL,
  `ukuran_file` varchar(20) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `guru_id` int(10) DEFAULT NULL,
  `kelas_id` int(10) NOT NULL,
  `siswa_id` int(25) DEFAULT NULL,
  `pelajaran_id` int(11) DEFAULT NULL,
  `soal_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`jawaban_id`, `judul`, `file`, `tipe_file`, `ukuran_file`, `tanggal_upload`, `guru_id`, `kelas_id`, `siswa_id`, `pelajaran_id`, `soal_id`) VALUES
(33, 'Sebelum UTS', 'TUGAS 2.docx', 'docx', '12323', '2018-07-25', 13, 85, 15, 1, '52'),
(34, 'Pilihan Ganda', 'TUGAS 1.docx', 'docx', '12323', '2018-07-25', 11, 85, 15, 15, '37'),
(35, 'Pilihan Ganda', 'TUGAS 1 VII A.docx', 'docx', '12323', '2018-07-28', 27, 81, 39, 5, '67'),
(36, 'Sebelum UTS', 'TUGAS 2.pdf', 'pdf', '235782', '2018-07-25', 28, 81, 39, 2, '58'),
(38, 'Pilihan Ganda', 'TUGAS 1.docx', 'docx', '12323', '2018-07-25', 11, 85, 1, 15, '37'),
(39, 'Sebelum UTS', 'TUGAS 2.pdf', 'pdf', '235782', '2018-07-25', 13, 85, 1, 1, '52'),
(41, 'Pilihan Ganda', 'TUGAS 1 VII A.pdf', 'pdf', '1961118', '2018-07-27', 28, 81, 39, 2, '57'),
(42, 'Pilihan Ganda', 'TUGAS 1 VII A.docx', 'docx', '12323', '2018-07-27', 13, 81, 25, 1, '47'),
(43, 'Pilihan Ganda', 'TUGAS 1 VIII A.pdf', 'pdf', '1961118', '2018-07-27', 28, 81, 25, 2, '57'),
(44, 'Pilihan Ganda', 'TUGAS 1 VIII A.pdf', 'pdf', '1961118', '2018-07-27', 11, 81, 25, 15, '35'),
(45, 'Pilihan Ganda', 'TUGAS 1 VIII A.docx', 'docx', '12323', '2018-07-27', 27, 81, 25, 5, '67'),
(46, 'Pilihan Ganda', 'TUGAS 1 VIII B.docx', 'docx', '101341', '2018-07-27', 27, 82, 31, 5, '69'),
(47, 'Pilihan Ganda', 'TUGAS 1 VIII A.pdf', 'pdf', '1961118', '2018-07-27', 28, 82, 31, 2, '59'),
(48, 'Pilihan Ganda', 'TUGAS.pdf', 'pdf', '235782', '2018-07-27', 11, 82, 31, 15, '36'),
(49, 'Pilihan Ganda', 'TUGAS 1 VII B.docx', 'docx', '12323', '2018-07-27', 11, 72, 47, 15, '34'),
(50, 'Sebelum UTS', 'TUGAS 1 VII B.docx', 'docx', '12323', '2018-07-27', 11, 72, 47, 15, '39'),
(51, 'Pilihan Ganda', 'TUGAS 1 VII B.pdf', 'pdf', '1961118', '2018-07-27', 27, 72, 47, 5, '65'),
(52, 'Pilihan Ganda', 'TUGAS 1 VII A.docx', 'docx', '12323', '2018-07-27', 13, 72, 46, 1, '45'),
(53, 'Pilihan Ganda', 'TUGAS 1 VII B.pdf', 'pdf', '1961118', '2018-07-27', 28, 72, 46, 2, '55'),
(54, 'Sebelum UTS', 'TUGAS 2 VII B.pdf', 'pdf', '1562959', '2018-07-27', 13, 72, 46, 1, '46'),
(55, 'Sebelum UTS', 'TUGAS 2 VII B.docx', 'docx', '16864', '2018-07-27', 28, 72, 46, 2, '56'),
(56, 'Pilihan Ganda', 'TUGAS 1 VII A.docx', 'docx', '12323', '2018-07-27', 27, 71, 51, 5, '63'),
(57, 'Sebelum UTS', 'TUGAS 2 VII A.docx', 'docx', '12323', '2018-07-27', 27, 71, 51, 5, '64'),
(58, 'Pilihan Ganda', 'TUGAS 1 VII A.pdf', 'pdf', '1961118', '2018-07-27', 28, 71, 51, 2, '53'),
(59, 'Sebelum UTS', 'TUGAS 2 VII A.pdf', 'pdf', '235782', '2018-07-27', 28, 71, 51, 2, '54'),
(60, 'Pilihan Ganda', 'TUGAS 1 IX.docx', 'docx', '34370', '2018-07-28', 27, 85, 1, 5, '71');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(10) NOT NULL,
  `kelas_nama` varchar(25) DEFAULT NULL,
  `guru_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`, `guru_id`) VALUES
(71, 'X TKJ', 21),
(72, 'XI TKJ', 29),
(81, 'XII TKJ', 12),
(82, 'X LISTRIK', 25),
(85, 'XI LISTRIK', 22),
(86, 'XII LISTRIK', 26),
(87, 'X OTOMOTIF', 13),
(88, 'XI OTOMOTIF', 13),
(89, 'XII OTOMOTIF', 13),
(90, 'X Multimedia', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(10) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `nama_file` varchar(100) DEFAULT NULL,
  `pelajaran_id` int(5) NOT NULL,
  `tipe_file` varchar(30) DEFAULT NULL,
  `ukuran_file` varchar(20) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `guru_nama` varchar(30) NOT NULL,
  `kelas_id` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `tanggal_upload`, `nama_file`, `pelajaran_id`, `tipe_file`, `ukuran_file`, `file`, `guru_nama`, `kelas_id`) VALUES
(137, '2018-07-16', 'BAB IV', 1, 'docx', '86959', 'MATERI BAB IV.docx', 'Arif Wicaksono, S.Pd', 71),
(113, '2018-07-16', 'BAB V', 15, 'docx', '34370', 'MATERI BAB V.docx', 'Akhmad Soleh, S. Pd.I', 71),
(112, '2018-07-16', 'BAB IV', 15, 'docx', '86959', 'MATERI BAB IV.docx', 'Akhmad Soleh, S. Pd.I', 71),
(170, '2018-07-16', 'BAB III', 5, 'pdf', '583566', 'MATERI BAB III.pdf', 'Erni Susbiyati, S.Pd', 72),
(111, '2018-07-16', 'BAB III', 15, 'pdf', '583566', 'MATERI BAB III.pdf', 'Akhmad Soleh, S. Pd.I', 71),
(178, '2018-07-16', 'BAB V', 5, 'docx', '34370', 'MATERI BAB V.docx', 'Erni Susbiyati, S.Pd', 85),
(169, '2018-07-16', 'BAB I', 5, 'docx', '330487', 'MATERI BAB I.docx', 'Erni Susbiyati, S.Pd', 71),
(173, '2018-07-16', 'BAB V', 5, 'pdf', '235782', 'MATERI BAB V.pdf', 'Erni Susbiyati, S.Pd', 72),
(177, '2018-07-16', 'BAB IV', 5, 'docx', '86959', 'MATERI BAB IV.docx', 'Erni Susbiyati, S.Pd', 85),
(109, '2018-07-16', 'BAB I', 15, 'pdf', '235782', 'MATERI BAB I.pdf', 'Akhmad Soleh, S. Pd.I', 71),
(136, '2018-07-16', 'BAB III', 1, 'docx', '101341', 'MATERI BAB III.docx', 'Arif Wicaksono, S.Pd', 71),
(176, '2018-07-16', 'BAB III', 5, 'pdf', '583566', 'MATERI BAB III.pdf', 'Erni Susbiyati, S.Pd', 81),
(175, '2018-07-16', 'BAB I', 5, 'docx', '330487', 'MATERI BAB I.docx', 'Erni Susbiyati, S.Pd', 82),
(174, '2018-07-16', 'BAB II', 5, 'docx', '101341', 'MATERI BAB II.docx', 'Erni Susbiyati, S.Pd', 82),
(110, '2018-07-16', 'BAB II', 15, 'docx', '101341', 'MATERI BAB II.docx', 'Akhmad Soleh, S. Pd.I', 71),
(135, '2018-07-16', 'BAB II', 1, 'pdf', '1562959', 'MATERI BAB II.pdf', 'Arif Wicaksono, S.Pd', 71),
(134, '2018-07-16', 'BAB I', 1, 'docx', '330487', 'MATERI BAB I.docx', 'Arif Wicaksono, S.Pd', 71),
(172, '2018-07-16', 'BAB IV', 5, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Erni Susbiyati, S.Pd', 81),
(171, '2018-07-16', 'BAB II', 5, 'docx', '101341', 'MATERI BAB II.docx', 'Erni Susbiyati, S.Pd', 71),
(114, '2018-07-16', 'BAB I', 15, 'pdf', '235782', 'BAB I.pdf', 'Akhmad Soleh, S. Pd.I', 72),
(115, '2018-07-16', 'BAB II', 15, 'pdf', '1562959', 'BAB II.pdf', 'Akhmad Soleh, S. Pd.I', 72),
(116, '2018-07-16', 'BAB III', 15, 'pdf', '583566', 'BAB III.pdf', 'Akhmad Soleh, S. Pd.I', 72),
(117, '2018-07-16', 'BAB IV', 15, 'docx', '86959', 'MATERI BAB IV.docx', 'Akhmad Soleh, S. Pd.I', 72),
(118, '2018-07-16', 'BAB V', 15, 'docx', '34370', 'MATERI BAB V.docx', 'Akhmad Soleh, S. Pd.I', 72),
(119, '2018-07-16', 'BAB I', 15, 'docx', '330487', 'MATERI BAB I.docx', 'Akhmad Soleh, S. Pd.I', 81),
(120, '2018-07-16', 'BAB II', 15, 'docx', '101341', 'MATERI BAB II.docx', 'Akhmad Soleh, S. Pd.I', 81),
(121, '2018-07-16', 'BAB III', 15, 'docx', '101341', 'MATERI BAB III.docx', 'Akhmad Soleh, S. Pd.I', 81),
(122, '2018-07-16', 'BAB IV', 15, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Akhmad Soleh, S. Pd.I', 81),
(123, '2018-07-16', 'BAB V', 15, 'pdf', '235782', 'MATERI BAB V.pdf', 'Akhmad Soleh, S. Pd.I', 81),
(124, '2018-07-16', 'BAB I', 15, 'docx', '330487', 'MATERI BAB I.docx', 'Akhmad Soleh, S. Pd.I', 82),
(125, '2018-07-16', 'BAB II', 15, 'pdf', '1562959', 'BAB II.pdf', 'Akhmad Soleh, S. Pd.I', 82),
(126, '2018-07-16', 'BAB III', 15, 'pdf', '583566', 'BAB III.pdf', 'Akhmad Soleh, S. Pd.I', 82),
(127, '2018-07-16', 'BAB IV', 15, 'docx', '86959', 'MATERI BAB IV.docx', 'Akhmad Soleh, S. Pd.I', 82),
(128, '2018-07-16', 'BAB V', 15, 'pdf', '235782', 'MATERI BAB V.pdf', 'Akhmad Soleh, S. Pd.I', 82),
(129, '2018-07-16', 'BAB I', 15, 'docx', '330487', 'MATERI BAB I.docx', 'Akhmad Soleh, S. Pd.I', 85),
(130, '2018-07-16', 'BAB II', 15, 'pdf', '1562959', 'MATERI BAB II.pdf', 'Akhmad Soleh, S. Pd.I', 85),
(131, '2018-07-16', 'BAB III', 15, 'docx', '101341', 'MATERI BAB III.docx', 'Akhmad Soleh, S. Pd.I', 85),
(132, '2018-07-16', 'BAB IV', 15, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Akhmad Soleh, S. Pd.I', 85),
(133, '2018-07-16', 'BAB V', 15, 'pdf', '235782', 'MATERI BAB V.pdf', 'Akhmad Soleh, S. Pd.I', 85),
(138, '2018-07-16', 'BAB V', 1, 'pdf', '235782', 'MATERI BAB V.pdf', 'Arif Wicaksono, S.Pd', 71),
(139, '2018-07-16', 'BAB I', 1, 'pdf', '235782', 'MATERI BAB I.pdf', 'Arif Wicaksono, S.Pd', 72),
(140, '2018-07-16', 'BAB II', 1, 'docx', '101341', 'MATERI BAB II.docx', 'Arif Wicaksono, S.Pd', 72),
(141, '2018-07-16', 'BAB III', 1, 'pdf', '583566', 'MATERI BAB III.pdf', 'Arif Wicaksono, S.Pd', 72),
(142, '2018-07-16', 'BAB IV', 1, 'docx', '86959', 'MATERI BAB IV.docx', 'Arif Wicaksono, S.Pd', 72),
(143, '2018-07-16', 'BAB V', 1, 'pdf', '235782', 'MATERI BAB V.pdf', 'Arif Wicaksono, S.Pd', 72),
(144, '2018-07-16', 'BAB I', 1, 'pdf', '235782', 'MATERI BAB I.pdf', 'Arif Wicaksono, S.Pd', 81),
(145, '2018-07-16', 'BAB II', 1, 'docx', '101341', 'MATERI BAB II.docx', 'Arif Wicaksono, S.Pd', 81),
(146, '2018-07-16', 'BAB III', 1, 'pdf', '583566', 'MATERI BAB III.pdf', 'Arif Wicaksono, S.Pd', 81),
(147, '2018-07-16', 'BAB IV', 1, 'docx', '86959', 'MATERI BAB IV.docx', 'Arif Wicaksono, S.Pd', 81),
(148, '2018-07-16', 'BAB V', 1, 'pdf', '235782', 'MATERI BAB V.pdf', 'Arif Wicaksono, S.Pd', 81),
(149, '2018-07-16', 'BAB I', 1, 'docx', '330487', 'MATERI BAB I.docx', 'Arif Wicaksono, S.Pd', 82),
(150, '2018-07-16', 'BAB II', 1, 'pdf', '1562959', 'MATERI BAB II.pdf', 'Arif Wicaksono, S.Pd', 82),
(151, '2018-07-16', 'BAB III', 1, 'docx', '101341', 'MATERI BAB III.docx', 'Arif Wicaksono, S.Pd', 82),
(152, '2018-07-16', 'BAB IV', 1, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Arif Wicaksono, S.Pd', 82),
(153, '2018-07-16', 'BAB V', 1, 'docx', '34370', 'MATERI BAB V.docx', 'Arif Wicaksono, S.Pd', 82),
(154, '2018-07-16', 'BAB I', 1, 'pdf', '235782', 'MATERI BAB I.pdf', 'Arif Wicaksono, S.Pd', 85),
(155, '2018-07-16', 'BAB II', 1, 'docx', '101341', 'MATERI BAB II.docx', 'Arif Wicaksono, S.Pd', 85),
(156, '2018-07-16', 'BAB III', 1, 'pdf', '583566', 'MATERI BAB III.pdf', 'Arif Wicaksono, S.Pd', 85),
(157, '2018-07-16', 'BAB IV', 1, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Arif Wicaksono, S.Pd', 85),
(158, '2018-07-16', 'BAB V', 1, 'docx', '34370', 'MATERI BAB V.docx', 'Arif Wicaksono, S.Pd', 85),
(159, '2018-07-16', 'BAB I', 2, 'docx', '330487', 'MATERI BAB I.docx', 'Budi Hartati, S.Pd.I', 71),
(160, '2018-07-16', 'BAB II', 2, 'docx', '101341', 'MATERI BAB II.docx', 'Budi Hartati, S.Pd.I', 71),
(161, '2018-07-16', 'BAB III', 2, 'pdf', '583566', 'MATERI BAB III.pdf', 'Budi Hartati, S.Pd.I', 72),
(162, '2018-07-16', 'BAB IV', 2, 'pdf', '1961118', 'MATERI BAB IV.pdf', 'Budi Hartati, S.Pd.I', 72),
(163, '2018-07-16', 'BAB II', 2, 'pdf', '1562959', 'MATERI BAB II.pdf', 'Budi Hartati, S.Pd.I', 81),
(164, '2018-07-16', 'BAB III', 2, 'docx', '101341', 'MATERI BAB III.docx', 'Budi Hartati, S.Pd.I', 81),
(165, '2018-07-16', 'BAB V', 2, 'pdf', '235782', 'MATERI BAB V.pdf', 'Budi Hartati, S.Pd.I', 82),
(166, '2018-07-16', 'BAB I', 2, 'pdf', '235782', 'MATERI BAB I.pdf', 'Budi Hartati, S.Pd.I', 82),
(167, '2018-07-16', 'BAB IV', 2, 'docx', '86959', 'MATERI BAB IV.docx', 'Budi Hartati, S.Pd.I', 85),
(168, '2018-07-16', 'BAB V', 2, 'docx', '34370', 'MATERI BAB V.docx', 'Budi Hartati, S.Pd.I', 85),
(179, '2018-07-18', 'ada', 1, 'pdf', '1562959', 'TUGAS 3.pdf', 'Arif Wicaksono, S.Pd', 72),
(184, '2019-03-03', 'qqqqqqqqqqqqqq', 15, 'docx', '2824099', 'aljabar.docx', 'Akhmad Soleh, S. Pd.I', 71);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `pelajaran_id` int(10) NOT NULL,
  `pelajaran_nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`pelajaran_id`, `pelajaran_nama`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'Bahasa Inggris'),
(3, 'IPA'),
(4, 'IPS'),
(5, 'Matematika'),
(6, 'Bahasa Jawa'),
(7, 'Seni Budaya'),
(8, 'TIK'),
(9, 'Penjaskes'),
(11, 'Kimia'),
(12, 'Fisika'),
(13, 'Permesinan'),
(14, 'Jaringan Komputer'),
(15, 'Sistem Pengendali Elektromagnetik'),
(16, 'PKn'),
(17, 'Bahasa Arab'),
(18, 'Matematika'),
(19, 'Multimedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nis` varchar(20) DEFAULT NULL,
  `siswa_nama` varchar(100) DEFAULT NULL,
  `siswa_username` varchar(50) DEFAULT NULL,
  `siswa_password` varchar(8) DEFAULT NULL,
  `siswa_level` varchar(5) DEFAULT NULL,
  `siswa_telp` varchar(20) DEFAULT NULL,
  `siswa_alamat` text,
  `siswa_email` varchar(50) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `pelajaran_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `siswa_nis`, `siswa_nama`, `siswa_username`, `siswa_password`, `siswa_level`, `siswa_telp`, `siswa_alamat`, `siswa_email`, `kelas_id`, `pelajaran_id`) VALUES
(1, '3308202304010001', 'Muhamad Nurul Huda', 'huda', 'huda', 'siswa', '08807798087', 'Gedongkuning', 'm.nurulhuda@gmail.com', 85, NULL),
(2, '3308207004020001', 'Farah Fauziyah', 'farah', 'farah', 'siswa', '08647760181', 'Sempu Ngadirojo Secang Magelang', 'farahfauziyah@gmail.com', 85, NULL),
(4, '3308180108010001', 'Abdi Matin', 'abdi', 'abdi', 'siswa', '08647762180', 'Citrosono Citroson Grabag Magelang', 'abdimatin@gmail.com', 85, NULL),
(5, '3324081210010001', 'Muhamad Ibnu Umar', 'ibnu', 'ibnu', 'siswa', '08647762017', 'Klaseman Barat Kutoharjo Kaliwungu Kendal', 'm.ibnu@gmail.com', 85, NULL),
(14, '1119042812020003', 'Muhamad Reza Ainul Yaqin', 'reza', 'reza', 'siswa', '0897765890', 'Citrosono Citroson Grabag Magelang', 'reza.ainul@gmail.com', 85, NULL),
(15, '1119071404010003', 'Abdullah Usman', 'usman', 'usman', 'siswa', '086868681439', 'Kalisari Ngadirejo Tegalrejo Magelang', 'usman.abdullah@gmail.com', 85, NULL),
(16, '3308130409020003', 'Erwin Septi Abdi', 'erwin', 'erwin', 'siswa', '085729434889', 'Kebonlegi Kebonlegi Kaliangkrik Magelang', 'erwin.sa@gmail.com', 85, NULL),
(17, '3323061405010001', 'Anang Khusaini', 'anang', 'anang', 'siswa', '08158834890', 'Samiranan Kandangan Gemanggung', 'anang@gmail.com', 85, NULL),
(18, '3323066010010001', 'Aan Agusty Habibah', 'aan', 'aan', 'siswa', '087890789223', 'Kedungumpul Kandangan Temanggung', 'aan.habibah@gmail.com', 85, NULL),
(19, '3323024112010002', 'Puji Lestari', 'lestari', 'lestari', 'siswa', '085743667575', 'Tawangsari Tembarak Temanggung', 'pujilestari@gmail.com', 85, NULL),
(20, '3323024801020001', 'Susilowati', 'wati', 'wati', 'siswa', '08188369364', 'Tinebah Purwodadi Tembarak Temanggung', 'susilowati@gmail.com', 85, NULL),
(21, '3308191101030002', 'Amar Makruf Budiarto', 'amar', 'amar', 'siswa', '08930317162', 'Geger II Girirejo Tegalrejo Magelang\r\n', 'amar.mb@gmail', 85, NULL),
(22, '3323024903020001', 'Nila Khoirul Mustafidah', 'nila', 'nila', 'siswa', '085643266942', 'Dalem Tawangsari Tembarak Temanggung\r\n', 'nilakhoirul@gmail.com', 85, NULL),
(23, '3323065904020002', 'Fauziatul Munawaroh', 'fauzi', 'fauzi', 'siswa', '085642839805', 'Kedungumpul Kandangan Temanggung\r\n', 'munawaroh.f@gmail.com', 85, NULL),
(25, '3308200404020001', 'Abdul Ghofur', 'abdul', 'abdul', 'siswa', '08995173630', 'Kragon Madyogondo Ngablak Magelang\r\n', 'abdul.g@gmail.com', 81, NULL),
(26, '3323060610030002', 'Imam Adi Rifai', 'imam', 'imam', 'siswa', '081533341818', 'Sandari Kembangsari Kandangan Temanggung\r\n', 'adi.r@gmail.com', 81, NULL),
(27, '3323062010020004', 'Isa Mahendra', 'mahendra', 'mahendra', 'siswa', '085729839846', 'Kembangsari Kembangsari Kandangan Temanggung\r\n', 'mahendra@gmail.com', 81, NULL),
(28, '3322076206020001', 'Sara Anjun Fitriani', 'anjun', 'anjun', 'siswa', '085743706607', 'Deles Ngrapah Banyubiru Semarang\r\n', 'anjunfitriani@gmail.com', 82, NULL),
(29, '3308206506020001', 'Nur Fatimah', 'fatimah', 'fatimah', 'siswa', '081520100701', 'Gioso Gunung Candisari Secang magelang\r\n', 'nurfatimah@gmail.com', 82, NULL),
(30, '3323205405000003', 'Kalimatus Sakdiyah', 'diah', 'diah', 'siswa', '08993281342', 'Depok Gemawang Gemawang Temanggung\r\n', 'diah.k@gmail.com', 82, NULL),
(31, '3322115508030001', 'Sania Naja Inda Sabila', 'sania', 'sania', 'siswa', '085643874517', 'Klotok Doplang Bawen Semarang\r\n', 'sania.sabila@gmail.com', 82, NULL),
(32, '3308196204020002', 'Nur Azizizah', 'azizizah', 'zizizah', 'siswa', '085643502304', 'Tumbu Purwodadi Tegalrejo Magelang\r\n', 'nurazizizah@gmail.com', 82, NULL),
(33, '3308131103030001', 'Fredi Setiawan', 'fredi', 'fredi', 'siswa', '08996647338', 'Mangli Kaliangkrik Magelang\r\n', 'fredisetiawan@gmail.com', 81, NULL),
(34, '3322070501040004', 'Mukhammad Ikhsanudin', 'ikhsan', 'ikhsan', 'siswa', '081500486490', 'Dsn.Watu Lawang Sepakung Banyu Biru Semarang \r\n', 'm.ikhsanudin@gamil.com', 81, NULL),
(35, '3323045411020001', 'Siti Mafiroh', 'siti', 'siti', 'siswa', '0856453289003', 'Gunungkekep Kupen Pringsurat Temanggung\r\n', 'sitimafiroh@gmail.com', 82, NULL),
(36, '3308185706010001', 'Aulia Ravita Sari', 'aulia', 'aulia', 'siswa', '085743840394', 'Banyusari Grabag Magelang\r\n', 'aulia.rs@gmail.com', 82, NULL),
(37, '3322090205030001', 'Rizqi Maulana Putra', 'rizqi', 'rizqi', 'siswa', '085643886900', 'Dsn. Nyampuran Sumowono Sumowono Semarang\r\n', 'rizqimp@gmail.com', 81, NULL),
(38, '3322130110010001', 'Miftahul Chandra', 'chandra', 'chandra', 'siswa', '085642387952', 'Lingkungan Lemah Abang Bergas Semarang \r\n', 'chandra.m@gmail.com', 81, NULL),
(39, '3322132807020003', 'Akhmad Ngafif Muzaki', 'muzaki', 'muzaki', 'siswa', '085643181850', 'Lingkungan Lemah Abang Bergas Semarang \r\n', 'muzaki.a@gmail.com', 81, NULL),
(40, '3322101311010002', 'Dwi Ramdoni', 'ramdoni', 'ramdoni', 'siswa', '088184733598', 'Lingk. Seneng Ngampin Ambarawa Semarang\r\n', 'dwiramdoni@gmail.com', 81, NULL),
(41, '3308215602030002', 'Dhea Putriana', 'dhea', 'dhea', 'siswa', '089937159291', 'Kwayuhan Lor Pasangsari Windusari Magelang\r\n', 'dheaputriana@gmail.com', 82, NULL),
(42, '3212162010020006', 'Alan Sulistyo Setiawan', 'alan', 'alan', 'siswa', '0037523275', 'JL. Manunggal Demayu Sindang Indramayu\r\n', 'alan.ss@gmail.com', 81, NULL),
(43, '3308201108030002', 'Muchammad Faishal Faris Akbar', 'faris', 'faris', 'siswa', '085643717543', 'Dsn. Kembangan. I Madusari Secang Magelang\r\n', 'm.faisal.fa@gmail.com', 81, NULL),
(44, '3308216204030001', 'Devita Chairani S.S', 'devita', 'devita', 'siswa', '08939741171', 'Dsn. Sreyal Ngemplak Windusari Magelang\r\n', 'devitacss@gmail.com', 82, NULL),
(45, '3308215402030001', 'Siti Zuzinah ', 'zuzinah', 'zuzinah', 'siswa', '085643547788', 'Kembangan II Madusari Secang Magelang\r\n', 'sitizuzinah@gmail.com', 82, NULL),
(46, '3308146101050001', 'Fiya Zulfa Nabila', 'zulfa', 'zulfa', 'siswa', '085643877141', 'Campursari Gandusari Bandongan Magelang \r\n', 'f.zulfanabila@gmail.com', 72, NULL),
(47, '3322094106040002', 'Hanik Sholichati', 'hanik', 'hanik', 'siswa', '089965988900', 'Suruan jubelan sumowono semarang\r\n', 'haniks@gmail.com', 72, NULL),
(48, '3308205707030002', 'Ika Arifatul  Hikmah', 'ika', 'ika', 'siswa', '085643470432', 'Mlobo karangkajen Secang magelang\r\n', 'ikaarifatul@gmail.com', 72, NULL),
(49, '3308184808040004', 'Hasna Safa Salsabila', 'hasna', 'hasna', 'siswa', '085647773233', 'Ngencek Kalikuto Grabag Magelang\r\n', 'hasna.ss@gmail.com', 72, NULL),
(50, '3371026706040001', 'Fani Asifatun Nikmah', 'fani', 'fani', 'siswa', '085645923349', 'Dalangan Kramat Utara Magelang Utara Kota Magelang\r\n\r\n', 'fani.an@gmail.com', 72, NULL),
(51, '3173070503030005', 'Daffa Mahdy Syafiqri', 'daffa', 'daffa', 'siswa', '085743783900', 'Palmerah Palmerah Jakarta Barat DKI Jakarta\r\n', 'daffa.ms@gmail.com', 71, NULL),
(52, '3327122609020002', 'Faruq Ibrahim', 'faruq', 'faruq', 'siswa', '081565451755', 'Purwosari Comal Pemalang\r\n', 'faruq.i@gmail.com', 71, NULL),
(53, '3323062008030002', 'Seva Adji Sasongko Jati', 'adji', 'adji', 'siswa', '085643695127', 'Blimbing Kandangan Temanggung\r\n', 's.adji@gmail.com', 71, NULL),
(54, '3323062301030002', 'Ahmad Nurul Solikhin', 'solikhin', 'solikhin', 'siswa', '085643343919', 'Tegesan Samiranan Kandangan Temanggung\r\n', 'solikhin.an@gmail.com', 71, NULL),
(55, '3308134807040011', 'Nurma Arinda', 'arinda', 'arind', 'siswa', '085643645504', 'Kebonlegi Kaliangkrik Magelang\r\n', 'nurmaarinda@gmil.com', 72, NULL),
(56, '3308145203030001', 'Novita Arda Setyaningsih', 'novita', 'novita', 'siswa', '085643711257', 'Kalegen Bandongan Magelang\r\n', 'novita.as@gmail.com', 72, NULL),
(57, '3371020803030001', 'Ryan Firmansyah', 'ryan', 'ryan', 'siswa', '088337102080', 'Sempu Ngadirojo Secang Magelang\r\n', 'ryan.f@gmail.com', 71, NULL),
(58, '3308181004040006', 'Ruwanto', 'ruwanto', 'ruwanto', 'siswa', '085643833378', 'Wanteyan Lebag Grabag\r\n', 'ruwanto@gmail.com', 71, NULL),
(59, '3324104202020002', 'Dewi Shinta', 'dewi', 'dewi', 'siswa', '085643410420', 'Margomulyo Pegandon kendal\r\n', 'dewi.s@gmail.com', 72, NULL),
(60, '3308205803040002', 'Zaimatul Khoirin Nisa', 'nisa', 'nisa', 'siswa', '081582058030', 'Komprengan Ngabean Secang magelang\r\n', 'niss.zk@gmail.com', 72, NULL),
(61, '3322090711040001', 'Muhammad Naufal Dzaky', 'naufal', 'naufal', 'siswa', '089920907110', 'Suruan jubelan sumowono semarang\r\n', 'm.naufal@gmail.com', 71, NULL),
(62, '3308182205040002', 'Maulana Muhammad Nadzif', 'maulana', 'maulana', 'siswa', '081822050400', 'Semarum Sumurarum Grabag Magelang\r\n', 'maulana@gmail.com', 71, NULL),
(63, '3323026611030002', 'Anisa Alfi Hidayah', 'anisa', 'anisa', 'siswa', '085643266103', 'Dalem Tawangsari Tembarak Temanggung\r\n', 'ania.alfi@gmail.com', 72, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `soal_id` int(10) NOT NULL,
  `judul` varchar(25) DEFAULT NULL,
  `pelajaran_id` int(11) DEFAULT NULL,
  `kelas_id` int(10) DEFAULT NULL,
  `tipe_file` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `ukuran_file` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `guru_nama` varchar(50) CHARACTER SET utf8 NOT NULL,
  `tanggal_tugas` date DEFAULT NULL,
  `batas_upload` date NOT NULL,
  `file` varchar(25) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`soal_id`, `judul`, `pelajaran_id`, `kelas_id`, `tipe_file`, `ukuran_file`, `guru_nama`, `tanggal_tugas`, `batas_upload`, `file`, `guru_id`) VALUES
(33, 'Pilihan Ganda', 15, 71, 'docx', '12323', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-08-01', 'TUGAS 1 VII A.docx', 11),
(34, 'Pilihan Ganda', 15, 72, 'pdf', '1961118', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-08-02', 'TUGAS 1 VII B.pdf', 11),
(35, 'Pilihan Ganda', 15, 81, 'docx', '12323', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-08-05', 'TUGAS 1 VIII A.docx', 11),
(36, 'Pilihan Ganda', 15, 82, 'docx', '101341', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-07-30', 'TUGAS 1 VIII B.docx', 11),
(37, 'Pilihan Ganda', 15, 85, 'docx', '34370', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-07-30', 'TUGAS 1 IX.docx', 11),
(38, 'Sebelum UTS', 15, 71, 'pdf', '235782', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-07-31', 'TUGAS 2 VII A.pdf', 11),
(39, 'Sebelum UTS', 15, 72, 'docx', '16864', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-08-03', 'TUGAS 2 VII B.docx', 11),
(40, 'Sebelum UTS', 15, 81, 'pdf', '235782', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-08-04', 'TUGAS 2 VIII B.pdf', 11),
(41, 'Sebelum UTS', 15, 82, 'pdf', '235782', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-07-31', 'TUGAS 2 VIII B.pdf', 11),
(42, 'Sebelum UTS', 15, 85, 'docx', '12323', 'Akhmad Soleh, S. Pd.I', '2018-07-27', '2018-07-29', 'TUGAS 2 IX.docx', 11),
(43, 'Pilihan Ganda', 1, 71, 'docx', '12323', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-29', 'TUGAS 1 VII A.docx', 13),
(44, 'Sebelum UTS', 1, 71, 'pdf', '235782', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-30', 'TUGAS 2 VII A.pdf', 13),
(45, 'Pilihan Ganda', 1, 72, 'pdf', '1961118', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-08-31', 'TUGAS 1 VII B.pdf', 13),
(46, 'Sebelum UTS', 1, 72, 'docx', '16864', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-08-01', 'TUGAS 2 VII B.docx', 13),
(47, 'Pilihan Ganda', 1, 81, 'docx', '12323', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-30', 'TUGAS 1 VIII A.docx', 13),
(48, 'Sebelum UTS', 1, 81, 'pdf', '235782', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-02', 'TUGAS 2 VIII A.pdf', 13),
(49, 'Pilihan Ganda', 1, 82, 'docx', '101341', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-23', 'TUGAS 1 VIII B.docx', 13),
(50, 'Sebelum UTS', 1, 82, 'pdf', '235782', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-07-23', 'TUGAS 2 VIII B.pdf', 13),
(51, 'Pilihan Ganda', 1, 85, 'docx', '34370', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-08-10', 'TUGAS 1 IX.docx', 13),
(52, 'Sebelum UTS', 1, 85, 'pdf', '235782', 'Arif Wicaksono, S.Pd', '2018-07-27', '2018-08-20', 'TUGAS 2 IX.pdf', 13),
(53, 'Pilihan Ganda', 2, 71, 'pdf', '1961118', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-28', 'TUGAS 1 VII A.pdf', 28),
(54, 'Sebelum UTS', 2, 71, 'docx', '12323', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-28', 'TUGAS 2 VII A.docx', 28),
(55, 'Pilihan Ganda', 2, 72, 'docx', '12323', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-31', 'TUGAS 1 VII B.docx', 28),
(56, 'Sebelum UTS', 2, 72, 'pdf', '1562959', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-31', 'TUGAS 2 VII B.pdf', 28),
(57, 'Pilihan Ganda', 2, 81, 'docx', '12323', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-29', 'TUGAS 1 VIII A.docx', 28),
(58, 'Sebelum UTS', 2, 81, 'pdf', '235782', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-29', 'TUGAS 2 VIII A.pdf', 28),
(59, 'Pilihan Ganda', 2, 82, 'pdf', '1562959', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-30', 'TUGAS 1 VIII B.pdf', 28),
(60, 'Sebelum UTS', 2, 82, 'docx', '12323', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-30', 'TUGAS 2 VIII B.docx', 28),
(61, 'Pilihan Ganda', 2, 85, 'docx', '34370', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-01', 'TUGAS 1 IX.docx', 28),
(62, 'Sebelum UTS', 2, 85, 'pdf', '235782', 'Budi Hartati, S.Pd.I', '2018-07-27', '2018-07-01', 'TUGAS 2 IX.pdf', 28),
(63, 'Pilihan Ganda', 5, 71, 'docx', '12323', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-01', 'TUGAS 1 VII A.docx', 27),
(64, 'Sebelum UTS', 5, 71, 'pdf', '235782', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-01', 'TUGAS 2 VII A.pdf', 27),
(65, 'Pilihan Ganda', 5, 72, 'pdf', '1961118', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-02', 'TUGAS 1 VII B.pdf', 27),
(66, 'Sebelum UTS', 5, 72, 'docx', '16864', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-02', 'TUGAS 2 VII B.docx', 27),
(67, 'Pilihan Ganda', 5, 81, 'pdf', '1961118', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-03', 'TUGAS 1 VIII A.pdf', 27),
(68, 'Sebelum UTS', 5, 81, 'pdf', '235782', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-03', 'TUGAS 2 VIII A.pdf', 27),
(69, 'Pilihan Ganda', 5, 82, 'docx', '101341', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-04', 'TUGAS 1 VIII B.docx', 27),
(70, 'Sebelum UTS', 5, 82, 'docx', '12323', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-08-04', 'TUGAS 2 VIII B.docx', 27),
(71, 'Pilihan Ganda', 5, 85, 'docx', '34370', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-07-31', 'TUGAS 1 IX.docx', 27),
(72, 'Sebelum UTS', 5, 85, 'pdf', '235782', 'Erni Susbiyati, S.Pd', '2018-07-27', '2018-07-31', 'TUGAS 2 IX.pdf', 27);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`),
  ADD KEY `pelajaran_id` (`pelajaran_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`jawaban_id`),
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `guru_id` (`guru_id`),
  ADD KEY `pelajaran_id` (`pelajaran_id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `users_id` (`guru_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `guru_nama` (`guru_nama`),
  ADD KEY `pelajaran_id` (`pelajaran_id`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`pelajaran_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `pelajaran_id` (`pelajaran_id`),
  ADD KEY `kelas_id_2` (`kelas_id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `guru_nama` (`guru_nama`),
  ADD KEY `pelajaran_id` (`pelajaran_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `jawaban_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `pelajaran_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `soal_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`pelajaran_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `jawaban_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_ibfk_4` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`pelajaran_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`guru_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`pelajaran_id`) REFERENCES `pelajaran` (`pelajaran_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`kelas_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
