-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jul 2021 pada 09.43
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spkpkh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `kd_pengguna` int(11) NOT NULL,
  `nama_berkas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `kd_pengguna`, `nama_berkas`) VALUES
(39, 49, 'williab_1fix leaflet.docx'),
(40, 49, 'williab_SURAT 1.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kd_hasil` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nilai` float DEFAULT NULL,
  `tahun` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`kd_hasil`, `kd_jenis_bantuan`, `nomor`, `nilai`, `tahun`) VALUES
(208, 7, 30, 0.6, '2021'),
(209, 7, 34, 0.85, '2021'),
(210, 7, 31, 0.75, '2021'),
(211, 7, 32, 0.6875, '2021'),
(212, 7, 33, 0.675, '2021'),
(213, 7, 35, 0.6625, '2021'),
(214, 7, 38, 0.6375, '2021'),
(215, 7, 36, 0.6125, '2021'),
(216, 7, 39, 0.5875, '2021'),
(217, 7, 37, 0.575, '2021'),
(220, 7, 44, 1, '2021'),
(221, 7, 45, 0.775, '2021'),
(222, 7, 46, 0.7625, '2021'),
(223, 7, 49, 0.825, '2021'),
(235, 7, 63, 0.7375, '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bantuan`
--

CREATE TABLE `jenis_bantuan` (
  `kd_jenis_bantuan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_bantuan`
--

INSERT INTO `jenis_bantuan` (`kd_jenis_bantuan`, `nama`) VALUES
(7, 'Bantuan PKH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_kriteria` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sifat` enum('min','max') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kd_kriteria`, `kd_jenis_bantuan`, `nama`, `sifat`) VALUES
(17, 7, 'Kondisi Ibu', 'min'),
(18, 7, 'Anak Balita', 'max'),
(19, 7, 'Anak SD', 'max'),
(20, 7, 'Anak SMP', 'max'),
(21, 7, 'Anak SMA', 'max'),
(22, 7, 'Lanjut Usia', 'max'),
(23, 7, 'Disabilitas', 'min'),
(24, 7, 'Kondisi Rumah', 'min');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `kd_model` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `bobot` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`kd_model`, `kd_jenis_bantuan`, `kd_kriteria`, `bobot`) VALUES
(43, 7, 17, '0.15'),
(44, 7, 18, '0.15'),
(45, 7, 19, '0.05'),
(46, 7, 20, '0.05'),
(47, 7, 21, '0.1'),
(48, 7, 22, '0.15'),
(49, 7, 23, '0.15'),
(50, 7, 24, '0.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) DEFAULT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_jenis_bantuan`, `kd_kriteria`, `nomor`, `nilai`) VALUES
(166, 7, 17, 30, 0.25),
(167, 7, 18, 30, 0.5),
(168, 7, 19, 30, 0.5),
(169, 7, 20, 30, 1),
(170, 7, 21, 30, 1),
(171, 7, 22, 30, 1),
(172, 7, 23, 30, 0.75),
(173, 7, 24, 30, 0.5),
(174, 7, 17, 31, 0.25),
(175, 7, 18, 31, 0.5),
(176, 7, 19, 31, 0.5),
(177, 7, 20, 31, 1),
(178, 7, 21, 31, 1),
(179, 7, 22, 31, 1),
(180, 7, 23, 31, 0.25),
(181, 7, 24, 31, 1),
(182, 7, 17, 32, 0.25),
(183, 7, 18, 32, 0.5),
(184, 7, 19, 32, 1),
(185, 7, 20, 32, 0.5),
(186, 7, 21, 32, 1),
(187, 7, 22, 32, 1),
(188, 7, 23, 32, 1),
(189, 7, 24, 32, 0.5),
(190, 7, 17, 33, 0.5),
(191, 7, 18, 33, 0.5),
(192, 7, 19, 33, 0.5),
(193, 7, 20, 33, 1),
(194, 7, 21, 33, 1),
(195, 7, 22, 33, 1),
(196, 7, 23, 33, 0.25),
(197, 7, 24, 33, 1),
(198, 7, 17, 34, 0.25),
(199, 7, 18, 34, 0.5),
(200, 7, 19, 34, 1),
(201, 7, 20, 34, 1),
(202, 7, 21, 34, 1),
(203, 7, 22, 34, 1),
(204, 7, 23, 34, 0.25),
(205, 7, 24, 34, 1),
(206, 7, 17, 35, 0.25),
(207, 7, 18, 35, 0.5),
(208, 7, 19, 35, 1),
(209, 7, 20, 35, 0.5),
(210, 7, 21, 35, 0.5),
(211, 7, 22, 35, 0.5),
(212, 7, 23, 35, 1),
(213, 7, 24, 35, 0.25),
(214, 7, 17, 36, 0.5),
(215, 7, 18, 36, 0.5),
(216, 7, 19, 36, 0.5),
(217, 7, 20, 36, 0.5),
(218, 7, 21, 36, 1),
(219, 7, 22, 36, 0.5),
(220, 7, 23, 36, 1),
(221, 7, 24, 36, 0.25),
(222, 7, 17, 37, 0.5),
(223, 7, 18, 37, 0.5),
(224, 7, 19, 37, 1),
(225, 7, 20, 37, 0.5),
(226, 7, 21, 37, 1),
(227, 7, 22, 37, 0.5),
(228, 7, 23, 37, 0.5),
(229, 7, 24, 37, 0.5),
(230, 7, 17, 38, 0.25),
(231, 7, 18, 38, 0.5),
(232, 7, 19, 38, 0.5),
(233, 7, 20, 38, 1),
(234, 7, 21, 38, 0.5),
(235, 7, 22, 38, 1),
(236, 7, 23, 38, 1),
(237, 7, 24, 38, 0.5),
(238, 7, 17, 39, 0.25),
(239, 7, 18, 39, 0.5),
(240, 7, 19, 39, 1),
(241, 7, 20, 39, 1),
(242, 7, 21, 39, 0.5),
(243, 7, 22, 39, 0.5),
(244, 7, 23, 39, 1),
(245, 7, 24, 39, 0.5),
(246, 7, 17, 45, 0.25),
(247, 7, 18, 45, 0.5),
(248, 7, 19, 45, 0.5),
(249, 7, 20, 45, 1),
(250, 7, 21, 45, 1),
(251, 7, 22, 45, 1),
(252, 7, 23, 45, 0.75),
(253, 7, 24, 45, 0.5),
(254, 7, 17, 46, 0.25),
(255, 7, 18, 46, 0.5),
(256, 7, 19, 46, 1),
(257, 7, 20, 46, 0.5),
(258, 7, 21, 46, 1),
(259, 7, 22, 46, 1),
(260, 7, 23, 46, 1),
(261, 7, 24, 46, 0.5),
(262, 7, 17, 49, 0.25),
(263, 7, 18, 49, 0.5),
(264, 7, 19, 49, 0.5),
(265, 7, 20, 49, 1),
(266, 7, 21, 49, 1),
(267, 7, 22, 49, 1),
(268, 7, 23, 49, 0.25),
(269, 7, 24, 49, 1),
(358, 7, 17, 63, 0.25),
(359, 7, 18, 63, 0.5),
(360, 7, 19, 63, 1),
(361, 7, 20, 63, 0.5),
(362, 7, 21, 63, 0.5),
(363, 7, 22, 63, 0.5),
(364, 7, 23, 63, 1),
(365, 7, 24, 63, 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `kd_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` enum('petugas','warga') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kd_pengguna`, `username`, `password`, `status`) VALUES
(19, 'petugas', '4bf31e6f4b818056eaacb83dff01c9b8', 'petugas'),
(70, 'ponirah', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(73, 'suwaji', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(74, 'mardiyah', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(75, 'sumarni', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(76, 'ngatemi', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(77, 'suryanto', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(78, 'sugianto', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(79, 'toyibah', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(80, 'turiman', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(81, 'wiwin', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(82, 'alfani', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(83, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'petugas'),
(84, 'adi', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(86, 'nando', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(87, 'hrd', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(88, 'titin', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(89, 'ran', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(90, 'agung', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(91, 'rizal', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(92, 'niko', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(93, 'w', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(104, 'q', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(107, 'didik', 'c4ca4238a0b923820dcc509a6f75849b', 'warga'),
(109, 'rom', 'c4ca4238a0b923820dcc509a6f75849b', 'warga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) DEFAULT NULL,
  `kd_kriteria` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `bobot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `kd_jenis_bantuan`, `kd_kriteria`, `keterangan`, `bobot`) VALUES
(6, 7, 17, 'Menyusui', 1),
(7, 7, 17, 'Hamil', 0.5),
(8, 7, 17, 'Tidak Hamil', 0.25),
(9, 7, 18, 'Ada', 1),
(10, 7, 18, 'Tidak Ada', 0.5),
(11, 7, 19, 'Ada', 1),
(12, 7, 19, 'Tidak Ada', 0.5),
(13, 7, 20, 'Ada', 1),
(14, 7, 20, 'Tidak Ada', 0.5),
(15, 7, 21, 'Ada', 1),
(16, 7, 21, 'Tidak Ada', 0.5),
(17, 7, 22, '>60', 1),
(18, 7, 22, '<60', 0.5),
(19, 7, 23, 'Fisik', 1),
(20, 7, 23, 'Intelektual', 0.75),
(21, 7, 23, 'Mental', 0.5),
(22, 7, 23, 'Tidak Disabilitas', 0.25),
(23, 7, 24, 'Tidak Layak', 1),
(24, 7, 24, 'Cukup', 0.5),
(25, 7, 24, 'Layak', 0.25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE `warga` (
  `nomor` int(11) NOT NULL,
  `nik` bigint(21) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `kd_jenis_bantuan` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `kondisi_ibu` enum('hamil','menyusui','tidak hamil') DEFAULT NULL,
  `anak_balita` enum('ada','tidak ada') DEFAULT NULL,
  `anak_sd` enum('ada','tidak ada') DEFAULT NULL,
  `anak_smp` enum('ada','tidak ada') DEFAULT NULL,
  `anak_sma` enum('ada','tidak ada') DEFAULT NULL,
  `lanjut_usia` enum('<60','>60') DEFAULT NULL,
  `disabilitas` enum('tidak disabilitas','intelektual','mental','fisik') DEFAULT NULL,
  `tahun_mengajukan` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`nomor`, `nik`, `username`, `kd_jenis_bantuan`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `kondisi_ibu`, `anak_balita`, `anak_sd`, `anak_smp`, `anak_sma`, `lanjut_usia`, `disabilitas`, `tahun_mengajukan`) VALUES
(30, 5678698907898, 'ponirah', 7, 'ponirah', 'sidorejo', '1982-02-02', 'Perempuan', 'tidak hamil', 'tidak ada', 'tidak ada', 'ada', 'ada', '>60', 'intelektual', '2021'),
(31, 8978707015, 'suwaji', 7, 'suwaji', 'sidorejo', '1992-01-31', 'Laki-laki', 'tidak hamil', 'tidak ada', 'tidak ada', 'ada', 'ada', '>60', 'tidak disabilitas', '2021'),
(32, 7807897789079, 'mardiyah', 7, 'Mardiyah', 'sidorejo', '1987-10-07', 'Perempuan', 'tidak hamil', 'tidak ada', 'ada', 'tidak ada', 'ada', '>60', 'fisik', '2021'),
(33, 52364757475775, 'sumarni', 7, 'Sumarni', 'sidorejo', '2002-06-07', 'Perempuan', 'hamil', 'tidak ada', 'tidak ada', 'ada', 'ada', '>60', 'tidak disabilitas', '2021'),
(34, 871785656709565, 'ngatemi', 7, 'Ngatemi', 'sidorejo', '2003-06-07', 'Perempuan', 'tidak hamil', 'tidak ada', 'ada', 'ada', 'ada', '>60', 'tidak disabilitas', '2021'),
(35, 74345743, 'suryanto', 7, 'Suryanto', 'sidorejo', '1990-02-07', 'Laki-laki', 'tidak hamil', 'tidak ada', 'ada', 'tidak ada', 'tidak ada', '<60', 'fisik', '2021'),
(36, 896715809779865, 'sugianto', 7, 'Sugianto', 'sidorejo', '1997-06-07', 'Laki-laki', 'hamil', 'tidak ada', 'tidak ada', 'tidak ada', 'ada', '<60', 'fisik', '2021'),
(37, 5177545765375776, 'toyibah', 7, 'Toyibah', 'sidorejo', '2000-10-07', 'Laki-laki', 'hamil', 'tidak ada', 'ada', 'tidak ada', 'ada', '<60', 'mental', '2021'),
(38, 1322536615753, 'turiman', 7, 'Turiman', 'sidorejo', '1999-07-07', 'Laki-laki', 'tidak hamil', 'tidak ada', 'tidak ada', 'ada', 'tidak ada', '>60', 'fisik', '2021'),
(39, 4346775734773, 'wiwin', 7, 'Wiwin', 'sidorejo', '1998-02-07', 'Perempuan', 'tidak hamil', 'tidak ada', 'ada', 'ada', 'tidak ada', '<60', 'fisik', '2021'),
(44, 350921040170000, 'titin', 7, 'titin', 'probolinggo', '1888-02-03', 'Laki-laki', 'hamil', 'tidak ada', 'tidak ada', 'tidak ada', 'tidak ada', '>60', 'intelektual', '2021'),
(45, 12345, 'ran', 7, 'chandra', 'Lumajang', '1888-02-03', 'Laki-laki', 'tidak hamil', 'tidak ada', 'tidak ada', 'ada', 'ada', '>60', 'intelektual', '2021'),
(46, 3467, 'agung', 7, 'adi', 'sidorejo', '1945-03-31', 'Laki-laki', 'tidak hamil', 'tidak ada', 'ada', 'tidak ada', 'ada', '>60', 'fisik', '2021'),
(49, 12345, 'w', 7, 'williab', 'bromo', '1922-01-02', 'Laki-laki', 'tidak hamil', 'tidak ada', 'tidak ada', 'ada', 'ada', '>60', 'tidak disabilitas', '2021'),
(63, 67967697968, 'didik', 7, 'didik', 'sidorejo', '1978-02-07', 'Laki-laki', 'tidak hamil', 'tidak ada', 'ada', 'tidak ada', 'tidak ada', '<60', 'fisik', '2021'),
(65, NULL, 'rom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kd_hasil`),
  ADD KEY `fk_mahasiswa` (`nomor`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indexes for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`kd_jenis_bantuan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_kriteria`),
  ADD KEY `kd_beasiswa` (`kd_jenis_bantuan`),
  ADD KEY `kd_beasiswa_2` (`kd_jenis_bantuan`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kd_model`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_mahasiswa` (`nomor`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `fk_kriteria` (`kd_kriteria`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indexes for table `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `kd_jenis_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `kd_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `warga`
--
ALTER TABLE `warga`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_ibfk_3` FOREIGN KEY (`nomor`) REFERENCES `warga` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD CONSTRAINT `fk_beasiswa` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nomor`) REFERENCES `warga` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kd_kriteria`) REFERENCES `kriteria` (`kd_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
