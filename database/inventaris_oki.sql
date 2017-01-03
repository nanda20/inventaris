-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Jan 2017 pada 05.40
-- Versi Server: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_oki`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(35) NOT NULL,
  `kondisi` varchar(35) NOT NULL,
  `jumlah_barang` int(3) NOT NULL,
  `jumlah_tersedia` int(3) NOT NULL,
  `id_ukm` int(3) NOT NULL,
  `id_kategori` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kondisi`, `jumlah_barang`, `jumlah_tersedia`, `id_ukm`, `id_kategori`) VALUES
('1', 'karpet', 'baru', 2, 2, 1, '2'),
('2', 'Sound System', 'Baru', 4, 4, 2, '2'),
('3', 'Mix ', 'Sedang', 4, 2, 1, '2'),
('4', 'LCD', 'baru', 2, 1, 1, '2'),
('5', 'meja duduk', 'baik', 2, 1, 2, '2'),
('8', 'screen ', 'bagus', 4, 2, 3, '2'),
('9', 'roll kabel', 'baru', 4, 1, 4, '1'),
('6', 'kursi plastik', 'bagus', 6, 2, 5, '4'),
('7', 'galon', 'bagus', 5, 2, 6, '2'),
('10', 'papan tulis', 'baik', 2, 1, 9, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('1', 'M01'),
('2', 'M02'),
('3', 'M03'),
('4', 'M04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `id_peminjam` int(10) NOT NULL,
  `nama_peminjam` varchar(35) NOT NULL,
  `jurusan` varchar(35) NOT NULL,
  `id_ukm` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjam`
--

INSERT INTO `peminjam` (`id_peminjam`, `nama_peminjam`, `jurusan`, `id_ukm`) VALUES
(1, 'maya', 'akuntansi', 2),
(2, 'Reno Pradana', 'teknik elektro', 1),
(3, 'Aini isamiatul', 'akuntansi', 6),
(4, 'Deni aksya', 'teknik kimia', 9),
(5, 'Genia dara', 'jaringan telekomunikasi digital', 12),
(6, 'Laksa dwi ', 'Sistem kelistrikan', 8),
(7, 'Eno diatul ', 'Akuntansi manajemen', 3),
(8, 'Eka indah', 'teknik elektro', 10),
(9, 'widya indah', 'administrasi bisnis', 4),
(10, 'Rio eka', 'teknik mesin', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` varchar(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jumlah_pinjam` int(3) NOT NULL,
  `id_barang` varchar(5) NOT NULL,
  `id_peminjam` varchar(10) NOT NULL,
  `id_user` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `jumlah_pinjam`, `id_barang`, `id_peminjam`, `id_user`) VALUES
('1', '2016-12-22', '2016-12-25', 1, '1', '1', '2'),
('2', '2016-12-26', '2016-12-28', 2, '7', '2', '4'),
('3', '2016-12-23', '2017-01-22', 2, '10', '4', '5'),
('4', '2016-12-24', '2016-12-27', 3, '9', '5', '6'),
('5', '2016-12-22', '2017-01-20', 2, '7', '8', '5'),
('6', '2016-12-24', '2016-12-26', 2, '6', '4', '3'),
('7', '2016-12-28', '2016-12-30', 2, '7', '9', '6'),
('8', '2016-12-19', '2016-12-23', 1, '10', '5', '5'),
('9', '2016-12-21', '2016-12-23', 1, '2', '3', '2'),
('10', '2016-12-27', '2016-12-30', 2, '3', '6', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE IF NOT EXISTS `ukm` (
  `id_ukm` int(3) NOT NULL,
  `nama_ukm` varchar(35) NOT NULL,
  `kontak` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama_ukm`, `kontak`) VALUES
(1, 'PP Polinema', '085789657821'),
(2, 'BKM Polinema', '085765245786'),
(3, 'PLFM polinema', '085789421657'),
(4, 'USMA polinema', '085678410872'),
(5, 'HIMANIA polinema', '082278041760'),
(6, 'PASTI polinema', '082224781056'),
(7, 'HMM polinema', '087817850901'),
(8, 'HME polinema', '089786015292'),
(9, 'TALITAKUM polinema', '082245190870'),
(10, 'RISPOL polinema', '089776810245'),
(11, 'Ganendra diri', '082244871560'),
(12, 'LPM Kompen', '087880912451'),
(13, 'Menwa polinema', '087120764580'),
(14, 'KMK polinema', '082245710862');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL,
  `nama_user` varchar(35) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `id_ukm` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `jurusan`, `id_ukm`) VALUES
(1, 'user1', '12345', 'teknik telekomunikasi', '1'),
(2, 'user2', '09876', 'teknik informatika', '2'),
(3, 'user3', '1290', 'manajemen pemasaran', '5'),
(4, 'user4', '5647', 'teknik mesin', '7'),
(5, 'user5', 'asdf12', 'manajemen rekayasa kontruksi', '13'),
(6, 'user6', 'qwe12', 'teknik listrik', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
