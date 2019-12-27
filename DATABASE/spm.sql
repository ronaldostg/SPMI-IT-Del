-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2019 pada 05.57
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_dosen`
--

CREATE TABLE `absensi_dosen` (
  `id_absensi_dosen` int(11) NOT NULL,
  `jumlah_absen_per_bulan` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `id_bulan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `absensi_dosen`
--

INSERT INTO `absensi_dosen` (`id_absensi_dosen`, `jumlah_absen_per_bulan`, `semester`, `tahun`, `id_dosen`, `id_matkul`, `id_bulan`) VALUES
(1, 20, 1, 2019, 1, 1, 1),
(3, 30, 1, 2019, 1, 1, 2),
(4, 30, 1, 2019, 1, 5, 1),
(5, 21, 1, 2019, 5, 5, 1),
(6, 23, 1, 2019, 3, 3, 1),
(7, 40, 1, 2019, 3, 3, 2),
(8, 30, 1, 2019, 3, 3, 3),
(9, 40, 1, 2019, 3, 3, 4),
(10, 21, 1, 2019, 3, 3, 5),
(11, 37, 1, 2019, 5, 5, 2),
(12, 21, 2, 2019, 5, 5, 7),
(13, 10, 2, 2019, 5, 5, 7),
(14, 32, 2, 2019, 1, 5, 7),
(20, 3, 2, 2019, 1, 1, 8),
(25, 32, 2, 2019, 4, 6, 7),
(27, 25, 1, 2019, 7, 2, 1),
(29, 36, 1, 2019, 7, 1, 1),
(35, 21, 2, 2019, 1, 6, 7),
(43, 20, 1, 2019, 1, 2, 2),
(46, 12, 1, 2019, 1, 3, 1),
(49, 32, 1, 2019, 7, 1, 2),
(53, 32, 1, 2019, 1, 2, 1),
(54, 20, 2, 2019, 8, 6, 7),
(55, 21, 2, 2019, 7, 2, 7),
(56, 32, 1, 2019, 9, 6, 1),
(57, 21, 1, 2019, 1, 5, 2),
(65, 45, 2, 2019, 1, 5, 8),
(66, 12, 1, 2019, 1, 5, 2),
(67, 12, 1, 2019, 1, 5, 3),
(68, 23, 1, 2019, 1, 5, 1),
(69, 12, 1, 2019, 1, 5, 2),
(70, 12, 1, 2019, 1, 5, 1),
(71, 23, 1, 2019, 1, 5, 1),
(72, 21, 1, 2019, 1, 5, 1),
(73, 12, 1, 2019, 1, 5, 1),
(74, 12, 1, 2018, 1, 5, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi_berita`, `gambar`, `tanggal`) VALUES
(38, 'Kunjungan SPM IT Del di kantor SPMI universitas sumatera utara', '<p>INni wf wjef erj nerg jerjg ergerk gerjk gerjkgjergkergjrekgjer gerre g</p>\r\n', 'IMG-13_06_20191.jpeg', '2019-06-13 09:55:00'),
(43, 'Workshop SPMI IT Del ', '<p>wfe<strong>&nbsp;wefwewe<em>wf eewwf e</em></strong>w&nbsp;</p>\r\n', 'IMG-13_06_2019.jpeg', '2019-06-13 09:55:00'),
(45, 'fewwfewf', '<p>dwqqw dqwd w qwd</p>\r\n', 'IMG-18_06_2019.jpeg', '2019-06-18 07:02:00'),
(46, 'workshop spmi', '<p>qfewf ewf wef ew</p>\r\n', 'IMG-18_06_20191.jpeg', '2019-06-18 01:56:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bulan`
--

CREATE TABLE `bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `bulan`
--

INSERT INTO `bulan` (`id_bulan`, `bulan`, `semester`) VALUES
(1, 'Januari', 1),
(2, 'Februari', 1),
(3, 'Maret', 1),
(4, 'April', 1),
(5, 'Mei', 1),
(6, 'Juni', 1),
(7, 'Juli', 2),
(8, 'Agustus', 2),
(9, 'September', 2),
(10, 'Oktober', 2),
(11, 'November', 2),
(12, 'Desember', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen`
--

CREATE TABLE `dokumen` (
  `iddokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(1000) DEFAULT NULL,
  `tanggal_upload` datetime DEFAULT NULL,
  `kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dokumen`
--

INSERT INTO `dokumen` (`iddokumen`, `nama_dokumen`, `tanggal_upload`, `kategori`) VALUES
(62, 'WDWQDQ-11_05_2019.pdf', '2019-05-11 09:55:00', 0),
(118, 'SK_Rektor_tentang_SPMI-14_06_2019.pdf', '2019-06-14 02:46:00', 3),
(119, 'SK_REKTNRGINGE-14_06_2019.pdf', '2019-06-14 02:46:00', 3),
(120, 'SOP_MAKAN_DI_KANTIN-15_06_2019.pdf', '2019-06-15 12:13:00', 2),
(121, 'SOP_Rambut-16_06_2019.pdf', '2019-06-16 04:12:00', 2),
(122, 'SPMI_2018-18_06_2019.PDF', '2019-06-18 03:49:00', 2),
(123, 'SK_Rektor_2018-18_06_2019.pdf', '2019-06-18 03:55:00', 3),
(124, 'SOP_tentang_SPMI_IT_Del-18_06_2019.pdf', '2019-06-18 07:01:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` varchar(45) DEFAULT NULL,
  `nama_dosen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nama_dosen`) VALUES
(1, '1445', 'Teamsar Mulyadi Panggabean'),
(2, '45466', 'Yuniarta Basani'),
(4, '13234234', 'Togu Novriansyah Turnip'),
(7, '232321', 'Roy Deddy L. Tobing'),
(8, '12132', 'Anthon Robert Tampubolon, S.Kom'),
(9, '1212121', 'Yohansen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` int(11) NOT NULL,
  `kode_matkul` varchar(45) DEFAULT NULL,
  `nama_matkul` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kode_matkul`, `nama_matkul`) VALUES
(1, 'IF3221121', 'Pengembangan Aplikasi Mobile'),
(2, 'IF32201', 'Pemrograman Berorientasi Objek'),
(3, 'KU3201', 'Matematika Dasar II'),
(4, 'KU3405', 'Probablitika dan Statistika'),
(5, 'IF32203', 'Pengembangan Aplikasi Sistem Terdistribusi'),
(6, 'IF32356', 'Pengembangan Situs Web II'),
(8, 'ELS32322', 'Rangkaian Elektronika');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul_yang_diambil`
--

CREATE TABLE `matkul_yang_diambil` (
  `id_matkul_yang_diambil` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `matkul_yang_diambil`
--

INSERT INTO `matkul_yang_diambil` (`id_matkul_yang_diambil`, `id_dosen`, `id_matkul`) VALUES
(2, 1, 5),
(3, 2, 3),
(4, 4, 6),
(7, 2, 4),
(10, 7, 1),
(11, 7, 2),
(12, 1, 6),
(13, 1, 2),
(14, 8, 6),
(15, 1, 3),
(17, 9, 6),
(18, 9, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'Jason Borisman Tambun', 'jason@del.ac.id', 'jason123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_dosen`
--
ALTER TABLE `absensi_dosen`
  ADD PRIMARY KEY (`id_absensi_dosen`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bulan`);

--
-- Indeks untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`iddokumen`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indeks untuk tabel `matkul_yang_diambil`
--
ALTER TABLE `matkul_yang_diambil`
  ADD PRIMARY KEY (`id_matkul_yang_diambil`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_dosen`
--
ALTER TABLE `absensi_dosen`
  MODIFY `id_absensi_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `iddokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `matkul_yang_diambil`
--
ALTER TABLE `matkul_yang_diambil`
  MODIFY `id_matkul_yang_diambil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
