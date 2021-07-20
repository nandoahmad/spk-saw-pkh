-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2021 pada 17.15
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripskrip`
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
(15, 0, 'Classification and analysis of cardiac arrhythmia based on i'),
(16, 0, 'Cover Buku Folio.docx'),
(17, 0, 'cindy cantik.docx'),
(18, 0, 'TA yusdiko.docx'),
(19, 0, 'Classification and analysis of cardiac arrhythmia based on i'),
(20, 0, '1624718505.docx'),
(21, 0, '1624718505.docx'),
(22, 0, 'draft proposal.docx1Maulana Malik Ibrahim.docx'),
(23, 0, 'SKRIPSI_1.pdf2Maulana Malik Ibrahim.pdf'),
(24, 0, 'Maulana Malik Ibrahim_1Proposal Adi 1.docx'),
(25, 0, 'Maulana Malik Ibrahim_2Proposal Adi 9.docx'),
(26, 0, 'Maulana Malik Ibrahim_3Proposal Adi 10.docx'),
(27, 0, 'adi_1Lengkap.docx'),
(28, 0, 'adi_1draft proposal.docx'),
(29, 0, 'adi_1Proposal Adi 6.docx'),
(30, 0, 'adi_1Proposal Adi 1.docx'),
(31, 1, 'adi_1Lengkap.docx'),
(32, 1, 'adi_2Proposal Skripsi Adi Lukito E41171164.docx'),
(33, 8, 'nando_3Wawancara part 1 dengan HRD Grand City.docx');

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
(7, 'Customer Service'),
(10, 'Covid');

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
(194, 7, 1, 1, '2021'),
(195, 7, 3, 0.925, '2021'),
(196, 7, 2, 0.7875, '2021'),
(197, 7, 10, 0.925, '2021'),
(198, 7, 7, 0.7875, '2021'),
(199, 7, 4, 0.65, '2021'),
(200, 7, 6, 0.6375, '2021'),
(201, 7, 9, 0.625, '2021'),
(202, 7, 11, 0.6125, '2021'),
(203, 7, 8, 0.5625, '2021'),
(204, 7, 12, 0.5625, '2021'),
(205, 7, 5, 0.5375, '2021'),
(206, 7, 13, 0.525, '2021'),
(207, 7, 14, 0.6, '2021');

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
  `pendidikan` enum('D1','D2','D3','D4','S1','S2') DEFAULT NULL,
  `bidang_studi` varchar(100) DEFAULT NULL,
  `anak_sd` enum('Sudah Menikah','Belum Menikah') DEFAULT NULL,
  `pengalaman_kerja` enum('Fresh Graduate','1 Tahun','2 Tahun') DEFAULT NULL,
  `tahun_mengajukan` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`nomor`, `nik`, `username`, `kd_jenis_bantuan`, `nama`, `alamat`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `bidang_studi`, `anak_sd`, `pengalaman_kerja`, `tahun_mengajukan`) VALUES
(1, 3509192105990006, 'adi', 7, 'adi', 'mastrip', '1992-02-02', 'Perempuan', 'S1', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(2, 0, 'inant', 7, 'inant', 'mastrip', '1995-02-02', 'Perempuan', 'S1', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(3, 0, 'david', 7, 'david', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(4, 0, 'iyek', 7, 'iyek', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(5, 0, 'fathan', 7, 'fathan', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(6, 3509192105990006, 'al', 7, 'al', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(7, 0, 'busran', 7, 'busran', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(8, 0, 'nando', 7, 'nando', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(9, 0, 'avis', 7, 'avis', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(10, 0, 'diko', 7, 'diko', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(11, 0, 'cakndut', 7, 'cakndut', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', '', '1 Tahun', '2021'),
(12, 0, 'bram', 7, 'polije', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(13, 0, 'refo', 7, 'refo', 'mastrip', '1999-02-02', 'Perempuan', 'D4', 'TA', 'Sudah Menikah', '1 Tahun', '2021'),
(14, 0, 'wahyu', 7, 'wahyu', 'lumajang', '1997-12-08', 'Laki-laki', 'D3', 'Perikanan', 'Sudah Menikah', '1 Tahun', '2021'),
(17, 0, 'adam', 10, 'adam', 'jember', '1995-08-05', 'Laki-laki', 'D4', 'Perikanan', 'Sudah Menikah', 'Fresh Graduate', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kd_jenis_bantuan` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `sifat` enum('min','max') DEFAULT NULL,
  `jenis` enum('range','non-range') NOT NULL,
  `tahap` enum('tahap 1','tahap 2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kd_jenis_bantuan`, `kd_jenis_bantuan`, `nama`, `sifat`, `jenis`, `tahap`) VALUES
(17, 7, 'Umur', 'min', 'range', 'tahap 1'),
(18, 7, 'Pengalaman Kerja ', 'min', 'non-range', 'tahap 1'),
(19, 7, 'Pendidikan', 'max', 'non-range', 'tahap 1'),
(20, 7, 'Penampilan', 'max', 'non-range', 'tahap 2'),
(21, 7, 'Status Perkawinan', 'min', 'non-range', 'tahap 1'),
(22, 7, 'Penguasaan Komputer', 'max', 'range', 'tahap 2'),
(23, 7, 'Nilai Psikotest', 'max', 'range', 'tahap 2'),
(24, 7, 'Cara Berbicara', 'max', 'non-range', 'tahap 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `model`
--

CREATE TABLE `model` (
  `kd_model` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `bobot` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `model`
--

INSERT INTO `model` (`kd_model`, `kd_jenis_bantuan`, `kd_jenis_bantuan`, `bobot`) VALUES
(25, 7, 17, '0.15'),
(26, 7, 18, '0.15'),
(27, 7, 19, '0.1'),
(28, 7, 20, '0.2'),
(29, 7, 21, '0.15'),
(30, 7, 22, '0.05'),
(31, 7, 23, '0.05'),
(32, 7, 24, '0.15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kd_nilai` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) DEFAULT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kd_nilai`, `kd_jenis_bantuan`, `kd_jenis_bantuan`, `nomor`, `nilai`) VALUES
(383, 7, 17, 1, 25),
(384, 7, 18, 1, 1),
(385, 7, 19, 1, 0),
(386, 7, 21, 1, 0),
(387, 7, 20, 1, 0.5),
(388, 7, 22, 1, 0.25),
(389, 7, 23, 1, 0.25),
(390, 7, 24, 1, 0.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `kd_pengguna` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` enum('petugas','calonwarga') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kd_pengguna`, `username`, `password`, `email`, `status`) VALUES
(19, 'hrd', '4bf31e6f4b818056eaacb83dff01c9b8', '', 'petugas'),
(20, 'admin', '202cb962ac59075b964b07152d234b70', '', 'petugas'),
(42, 'adi', 'c46335eb267e2e1cde5b017acb4cd799', 'adi@gmail.com', 'calonwarga'),
(43, 'inant', '50db136258dff6092d1b7bb3be759c7a', 'inant.kharisma@gmail.com', 'calonwarga'),
(44, 'david', '172522ec1028ab781d9dfd17eaca4427', 'gadgetin@gmail.com', 'calonwarga'),
(45, 'iyek', 'fc626c11dfa7baf0874dc24872e8cbbb', 'halamadrid@gmail.com', 'calonwarga'),
(46, 'fathan', 'c31573e9fd10409dca20572ae7ad69f9', 'kokgangomong@gmail.com', 'calonwarga'),
(47, 'al', '97282b278e5d51866f8e57204e4820e5', 'al@gmail.com', 'calonwarga'),
(48, 'busran', 'c92db52563834474b8e7cb414cb9c77e', 'busran@gmail.com', 'calonwarga'),
(49, 'nando', '45a9a31e5f1ff59621b681a5edbffe85', 'nando@gmail.com', 'calonwarga'),
(50, 'avis', 'f35a8740b65be2b1aa45f588f2809377', 'avicennamaula@gmail.com', 'calonwarga'),
(51, 'diko', '348bd010cf8e2233c882b4077cda612c', 'diko@gmail.com', 'calonwarga'),
(52, 'cakndut', '37ac5b5ab939fd8bf10f3dea5727a0ac', 'cakndut@gmail.com', 'calonwarga'),
(53, 'bram', 'e4fa3adecabcf036f6f95da68bfe76bb', 'bramadam@gmail.com', 'calonwarga'),
(54, 'refo', '213a4202e9302b6ec7e893316a1c3f31', 'refo@gmail.com', 'calonwarga'),
(55, 'wahyu', '32c9e71e866ecdbc93e497482aa6779f', 'wahyu@gmail.com', 'calonwarga'),
(58, 'adam', '1d7c2923c1684726dc23d2901c4d8157', 'adam@gmail.com', 'calonwarga'),
(59, 'el', '65c10911d8b8591219a21ebacf46da01', 'ijsuvhosihfisu@gmail.com', 'calonwarga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `kd_penilaian` int(11) NOT NULL,
  `kd_jenis_bantuan` int(11) DEFAULT NULL,
  `kd_jenis_bantuan` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `bobot` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`kd_penilaian`, `kd_jenis_bantuan`, `kd_jenis_bantuan`, `keterangan`, `bobot`) VALUES
(130, 7, 17, '22 - 24', 1),
(131, 7, 17, '25 - 27', 0.5),
(132, 7, 17, '28 - 99', 0.25),
(133, 7, 18, 'Fresh Graduate', 1),
(134, 7, 18, '1 Tahun', 0.5),
(135, 7, 18, '2 Tahun', 0.25),
(136, 7, 19, 'D3', 0.25),
(137, 7, 19, 'S1', 1),
(138, 7, 19, 'S2', 0.5),
(139, 7, 20, 'Cukup', 0.5),
(140, 7, 20, 'Menarik', 1),
(141, 7, 21, 'Belum Menikah', 1),
(142, 7, 21, 'Sudah Menikah', 0.5),
(143, 7, 22, '1 - 3', 0.25),
(144, 7, 22, '4 - 7', 0.5),
(145, 7, 22, '8 - 10', 1),
(146, 7, 23, '10 - 14', 0.25),
(147, 7, 23, '15 - 17', 0.5),
(148, 7, 23, '18 - 20', 1),
(149, 7, 24, 'Cukup', 0.5),
(150, 7, 24, 'Baik', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  ADD PRIMARY KEY (`kd_jenis_bantuan`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kd_hasil`),
  ADD KEY `fk_mahasiswa` (`nomor`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indeks untuk tabel `warga`
--
ALTER TABLE `warga`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kd_jenis_bantuan`),
  ADD KEY `kd_beasiswa` (`kd_jenis_bantuan`),
  ADD KEY `kd_beasiswa_2` (`kd_jenis_bantuan`);

--
-- Indeks untuk tabel `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`kd_model`),
  ADD KEY `fk_kriteria` (`kd_jenis_bantuan`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kd_nilai`),
  ADD KEY `fk_kriteria` (`kd_jenis_bantuan`),
  ADD KEY `fk_mahasiswa` (`nomor`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`kd_penilaian`),
  ADD KEY `fk_kriteria` (`kd_jenis_bantuan`),
  ADD KEY `fk_beasiswa` (`kd_jenis_bantuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `jenis_bantuan`
--
ALTER TABLE `jenis_bantuan`
  MODIFY `kd_jenis_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `kd_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT untuk tabel `warga`
--
ALTER TABLE `warga`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `kd_jenis_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `model`
--
ALTER TABLE `model`
  MODIFY `kd_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kd_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `kd_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

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
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `kriteria` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `kriteria` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_4` FOREIGN KEY (`nomor`) REFERENCES `warga` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `kriteria` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penilaian_ibfk_2` FOREIGN KEY (`kd_jenis_bantuan`) REFERENCES `jenis_bantuan` (`kd_jenis_bantuan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
