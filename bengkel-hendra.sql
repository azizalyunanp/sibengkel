-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Sep 2020 pada 15.50
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel-hendra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('owner','admin','developer') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `nama_lengkap`, `password`, `level`) VALUES
(7, 'owner', 'owner', '$2y$10$JaY3k3LTvRmTaX1eTlWdwOX2NW407m3cNvSuo1wx1H9tkvNl8/GgW', 'owner'),
(5, 'azizalyunanp', 'azizal yuna', '$2y$10$YgERHSwdLU1biFVSdsF.BeX40UtanOaXyMFldNNIuxYcSGuQc8eA2', 'developer'),
(8, 'admin', 'admin', '$2y$10$LVVjAl6rgIZCEZImfKLd4uHR70KMM2fxJfnUhl5D2zHz0UrF74lc2', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `sub_1` varchar(20) NOT NULL,
  `sub_2` varchar(20) NOT NULL,
  `sub_3` varchar(20) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_barang`
--

INSERT INTO `tbl_barang` (`id`, `nama`, `kategori`, `sub_1`, `sub_2`, `sub_3`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'GM5Z-3B KIT', 'aki', '2W', 'ASPIRA', '', 20000, 100000, 31),
(2, 'GM7B-4B KIT', 'aki', '2W', 'GS', '', 50000, 100000, 48),
(3, 'GT6A (GM5Z-3B MF)', 'aki', '2W', 'GS', '', 50000, 100000, 50),
(4, 'GTZ-4V MF', 'aki', '2W', 'GS', '', 70000, 100000, 50),
(5, 'GTZ-5S MF', 'aki', '2W', 'GS', '', 70000, 100000, 49),
(6, 'GTZ-7S MF', 'aki', '2W', 'GS', '', 70000, 100000, 50),
(7, 'GTZ-6V MF\n', 'aki', '2W', 'GS', '', 0, 100000, 50),
(8, '12N10-3B', 'aki', '2W', 'GS', '', 0, 100000, 50),
(9, '12N10-3BM', 'aki', '2W', 'GS', '', 0, 100000, 49),
(10, 'GM3-3A', 'aki', '2W', 'GS', '', 0, 100000, 50),
(11, 'GM3-3B', 'aki', '2W', 'GS', '', 0, 100000, 50),
(12, 'GM4-3B', 'aki', '2W', 'GS', '', 0, 100000, 50),
(13, '6N4-2A-2', 'aki', '2W', 'GS', '', 0, 100000, 50),
(14, '6N4-2A-4', 'aki', '2W', 'GS', '', 0, 100000, 50),
(15, '6N6-3B  ', 'aki', '2W', 'GS', '', 0, 100000, 50),
(16, '6N6-3B-1', 'aki', '2W', 'GS', '', 0, 100000, 50),
(17, 'GM2,5A-3C-2', 'aki', '2W', 'GS', '', 0, 100000, 50),
(18, '12N5,5-4BM', 'aki', '2W', 'GS', '', 0, 100000, 50),
(19, '12N9-4B-1M', 'aki', '2W', 'GS', '', 0, 100000, 50),
(20, 'GM5Z-3B Kit', 'aki', '2W', 'ASPIRA', '', 10000, 100000, 49),
(21, 'GM5Z-3B MF', 'aki', '2W', 'ASPIRA', '', 0, 100000, 50),
(22, 'GTZ-4V', 'aki', '2W', 'ASPIRA', '', 0, 100000, 50),
(23, 'GTZ-5S', 'aki', '2W', 'ASPIRA', '', 0, 100000, 50),
(24, 'GTZ-5S', 'aki', '2W', 'NS Hawk 12\n \n', '', 0, 100000, 50),
(25, 'GTZ-7S', 'aki', '2W', 'NS Hawk 12\n \n', '', 0, 100000, 50),
(26, 'GTZ-5S', 'aki', '2W', 'NS Eagle 18\n ', '', 0, 100000, 50),
(27, 'GTZ-7S', 'aki', '2W', 'NS Eagle 18\n ', '', 0, 100000, 50),
(28, 'GTZ-5S', 'aki', '2W', 'YAMAGATA', '', 0, 100000, 50),
(29, 'GTZ-7S', 'aki', '2W', 'YAMAGATA', '', 0, 100000, 50),
(30, 'GM5Z-3B MF', 'aki', '2W', 'YAMAGATA', '', 0, 100000, 50),
(31, 'GTZ-5S', 'aki', '2W', 'KAYABA', '', 0, 100000, 50),
(32, 'MTX3L (GM3-3B) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(33, 'MTZ5S (GTZ-5S) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(34, 'MTX5AL (GM5Z-3B)', 'aki', '2W', 'MOTOBATT', '', 10000, 100000, 50),
(35, 'MTZ6S (GTZ-7S) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(36, 'MTX7A (YTX-7A) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(37, 'MTX7D (GM7B-4B) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(38, 'MTX9 (12N9-4B) ', 'aki', '2W', 'MOTOBATT', '', 0, 100000, 50),
(39, 'GTZ-5S', 'aki', '2W', 'OTODO', '', 0, 100000, 50),
(40, 'OT4-6', 'aki', '2W', 'OTODO', '', 0, 100000, 50),
(41, 'OT7-12', 'aki', '2W', 'OTODO', '', 0, 100000, 50),
(42, 'OT9-12', 'aki', '2W', 'OTODO', '', 0, 100000, 50),
(43, 'GTZ-5S', 'aki', '2W', 'SILVER', '', 0, 100000, 50),
(44, 'GTZ-7S', 'aki', '2W', 'SILVER', '', 0, 100000, 50),
(45, 'GM7Z-4A', 'aki', '2W', 'G-FORCE', '', 0, 100000, 50),
(46, 'GM7B-4B', 'aki', '2W', 'G-FORCE', '', 0, 100000, 50),
(47, 'GM7A-4B', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(48, 'YTX9-BS', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(49, 'YB7 A (Thunder)', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(50, 'YB7 B (Tiger)', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(51, 'YTZ5S', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(52, '12N10 A (Multipole)', 'aki', '2W', 'YUASA', '', 0, 100000, 50),
(53, '12N10 B', 'aki', '2W', 'YUASA', '', 0, 100000, 48),
(54, 'YTX9-BS MF', 'aki', '2W', 'YUASA', '', 80000, 100000, 33),
(62, 'YTX9-BS MF', 'aki', 'BEKAS', '', '', 0, 0, 17),
(63, 'coba', 'aki', 'OTODO', 'NS Hawk 12', '', 10000, 12000, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_pembelian`
--

CREATE TABLE `tbl_detail_pembelian` (
  `no` int(11) NOT NULL,
  `nonota` varchar(100) NOT NULL,
  `id_brg` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jml_brg` varchar(100) NOT NULL,
  `harga_brg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_pembelian`
--

INSERT INTO `tbl_detail_pembelian` (`no`, `nonota`, `id_brg`, `nama_brg`, `jml_brg`, `harga_brg`) VALUES
(1, '1000', '62', 'YTX9-BS MF', '1', '20000'),
(2, '1001', '62', 'YTX9-BS MF', '1', '20000'),
(3, '1002', '62', 'YTX9-BS MF', '1', '50000'),
(4, '1003', '62', 'YTX9-BS MF', '1', '20000'),
(5, '1004', '62', 'YTX9-BS MF', '1', '20000'),
(6, '1005', '62', 'YTX9-BS MF', '1', '20000'),
(7, '1006', '62', 'YTX9-BS MF', '1', '20000'),
(8, '1007', '62', 'YTX9-BS MF', '1', '20000'),
(9, '1008', '62', 'YTX9-BS MF', '1', '20000'),
(10, '1009', '62', 'YTX9-BS MF', '1', '20000'),
(11, '1010', '62', 'YTX9-BS MF', '1', '20000'),
(12, '1011', '62', 'YTX9-BS MF', '1', '20000'),
(13, '1012', '62', 'YTX9-BS MF', '1', '20000'),
(14, '1013', '62', 'YTX9-BS MF', '1', '20000'),
(15, '1014', '62', 'YTX9-BS MF', '1', '20000'),
(16, '1015', '62', 'YTX9-BS MF', '1', '20000'),
(17, '1016', '54', 'YTX9-BS MF', '1', '80000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_penjualan`
--

CREATE TABLE `tbl_detail_penjualan` (
  `no` int(11) NOT NULL,
  `nonota` varchar(100) NOT NULL,
  `id_brg` varchar(100) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `jml_brg` varchar(100) NOT NULL,
  `harga_brg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_penjualan`
--

INSERT INTO `tbl_detail_penjualan` (`no`, `nonota`, `id_brg`, `nama_brg`, `jml_brg`, `harga_brg`) VALUES
(1, '1000', '1', 'GM5Z-3B KIT', '2', '100000'),
(2, '1001', '1', 'GM5Z-3B KIT', '1', '100000'),
(3, '1002', '1', 'GM5Z-3B KIT', '1', '100000'),
(4, '1003', '1', 'GM5Z-3B KIT', '1', '100000'),
(5, '1004', '1', 'GM5Z-3B KIT', '1', '100000'),
(6, '1005', '1', 'GM5Z-3B KIT', '1', '100000'),
(7, '1006', '1', 'GM5Z-3B KIT', '1', '100000'),
(8, '1007', '1', 'GM5Z-3B KIT', '1', '100000'),
(9, '1008', '1', 'GM5Z-3B KIT', '1', '100000'),
(10, '1009', '1', 'GM5Z-3B KIT', '1', '100000'),
(11, '1010', '1', 'GM5Z-3B KIT', '1', '100000'),
(12, '1011', '1', 'GM5Z-3B KIT', '1', '100000'),
(13, '1012', '1', 'GM5Z-3B KIT', '1', '100000'),
(14, '1013', '54', 'YTX9-BS MF', '1', '100000'),
(15, '1014', '54', 'YTX9-BS MF', '1', '100000'),
(16, '1015', '54', 'YTX9-BS MF', '1', '100000'),
(17, '1016', '54', 'YTX9-BS MF', '1', '100000'),
(18, '1017', '54', 'YTX9-BS MF', '1', '100000'),
(19, '1018', '54', 'YTX9-BS MF', '1', '100000'),
(20, '1019', '54', 'YTX9-BS MF', '1', '100000'),
(21, '1020', '54', 'YTX9-BS MF', '1', '100000'),
(22, '1021', '54', 'YTX9-BS MF', '2', '100000'),
(23, '1022', '54', 'YTX9-BS MF', '1', '100000'),
(24, '1023', '54', 'YTX9-BS MF', '1', '100000'),
(25, '1024', '54', 'YTX9-BS MF', '2', '100000'),
(26, '1025', '54', 'YTX9-BS MF', '1', '100000'),
(27, '1026', '54', 'YTX9-BS MF', '1', '100000'),
(28, '1027', '54', 'YTX9-BS MF', '1', '100000'),
(29, '1028', '54', 'YTX9-BS MF', '1', '100000'),
(30, '1029', '54', 'YTX9-BS MF', '1', '100000'),
(31, '1030', '54', 'YTX9-BS MF', '1', '100000'),
(32, '1031', '54', 'YTX9-BS MF', '1', '100000'),
(33, '1032', '54', 'YTX9-BS MF', '1', '100000'),
(34, '1033', '1', 'GM5Z-3B KIT', '1', '100000'),
(35, '1034', '1', 'GM5Z-3B KIT', '1', '100000'),
(36, '1034', '2', 'GM7B-4B KIT', '2', '100000'),
(37, '1035', '5', 'GTZ-5S MF', '1', '100000'),
(38, '1035', '9', '12N10-3BM', '1', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jurnal_umum`
--

CREATE TABLE `tbl_jurnal_umum` (
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_perkiraan` varchar(45) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jurnal_umum`
--

INSERT INTO `tbl_jurnal_umum` (`no`, `tanggal`, `nama_perkiraan`, `debet`, `kredit`, `keterangan`) VALUES
(1, '2017-11-04', 'Kas', 300000, 0, 'Penjualan'),
(2, '2017-11-04', 'Penjualan', 0, 300000, ''),
(3, '2017-11-04', 'Sewa dibayar di muka', 1000000, 0, ''),
(4, '2017-11-04', 'Kas', 0, 1000000, ''),
(5, '2020-09-12', 'Kas', 217000, 0, 'Penjualan'),
(6, '2020-09-12', 'Penjualan', 0, 217000, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kategori`) VALUES
(1, 'aki'),
(2, 'oli'),
(3, 'ban');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`no`, `nama`, `alamat`, `no_hp`) VALUES
(1, 'azizal', 'gedongan', '081567020405');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `no` int(11) NOT NULL,
  `no_beli` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembelian`
--

INSERT INTO `tbl_pembelian` (`no`, `no_beli`, `total`, `tanggal`, `waktu`, `keterangan`) VALUES
(1, '1000', 20000, '2017-03-30', '2017-03-29 20:29:04', 'tukar tambah'),
(2, '1001', 20000, '2017-03-30', '2017-03-29 20:30:19', 'tukar tambah'),
(3, '1002', 50000, '2017-03-30', '2017-03-29 20:39:00', 'tukar tambah'),
(4, '1003', 20000, '2017-03-30', '2017-03-29 20:41:15', 'tukar tambah'),
(5, '1004', 20000, '2017-03-30', '2017-03-29 20:46:13', 'tukar tambah'),
(6, '1005', 20000, '2017-03-30', '2017-03-29 20:47:04', 'tukar tambah'),
(7, '1006', 20000, '2017-03-30', '2017-03-29 20:56:04', 'tukar tambah'),
(8, '1007', 20000, '2017-03-30', '2017-03-29 20:57:55', 'tukar tambah'),
(9, '1008', 20000, '2017-03-30', '2017-03-29 21:02:21', 'tukar tambah'),
(10, '1009', 20000, '2017-03-30', '2017-03-29 21:08:02', 'tukar tambah'),
(11, '1010', 20000, '2017-03-30', '2017-03-29 21:09:23', 'tukar tambah'),
(12, '1011', 20000, '2017-03-30', '2017-03-29 21:12:22', 'tukar tambah'),
(13, '1012', 20000, '2017-03-30', '2017-03-29 21:49:23', 'tukar tambah'),
(14, '1013', 20000, '2017-03-30', '2017-03-29 21:50:58', 'tukar tambah'),
(15, '1014', 20000, '2017-03-30', '2017-03-29 21:51:52', 'tukar tambah'),
(16, '1015', 20000, '2017-03-30', '2017-03-29 21:52:36', 'tukar tambah'),
(17, '1016', 80000, '2017-04-10', '2017-04-10 03:05:29', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `no` int(11) NOT NULL,
  `nonota` varchar(100) NOT NULL,
  `kode_pel` varchar(16) NOT NULL,
  `diskon` int(11) NOT NULL,
  `biaya_jasa` int(11) NOT NULL DEFAULT '0',
  `keterangan` varchar(255) NOT NULL DEFAULT '-',
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `garansi` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`no`, `nonota`, `kode_pel`, `diskon`, `biaya_jasa`, `keterangan`, `total`, `tanggal`, `waktu`, `garansi`) VALUES
(1, '1000', '1', 0, 0, '-', 200000, '2017-03-30', '2017-03-29 20:29:05', '-'),
(2, '1001', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:30:20', '-'),
(3, '1002', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:39:00', '-'),
(4, '1003', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:41:15', '-'),
(5, '1004', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:46:14', '-'),
(6, '1005', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:47:04', '6 bulan'),
(7, '1006', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:55:02', '6 bulan'),
(8, '1007', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:56:05', '-'),
(9, '1008', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 20:57:55', '6 bulan'),
(10, '1009', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:02:21', '-'),
(11, '1010', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:08:03', '-'),
(12, '1011', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:09:23', '6 bulan'),
(13, '1012', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:12:21', '-'),
(14, '1013', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:49:22', '6 bulan'),
(15, '1014', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:50:57', '6 bulan'),
(16, '1015', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:51:51', '6 bulan'),
(17, '1016', '1', 0, 0, '-', 100000, '2017-03-30', '2017-03-29 21:52:36', '6 bulan'),
(18, '1017', '1', 0, 0, '-', 100000, '2017-04-04', '2017-04-03 21:57:40', '6 bulan'),
(19, '1018', '1', 0, 0, '-', 100000, '2017-04-04', '2017-04-03 21:59:01', '-'),
(20, '1019', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:35:55', '6 bulan'),
(21, '1020', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:36:56', '5 bulan'),
(22, '1021', '1', 0, 0, '-', 200000, '2017-04-05', '2017-04-04 19:45:07', '6 bulan'),
(23, '1022', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:45:59', '6 bulan'),
(24, '1023', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:49:51', '6 bulan'),
(25, '1024', '1', 0, 0, '-', 200000, '2017-04-05', '2017-04-04 19:51:42', '2'),
(26, '1025', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:54:41', '-'),
(27, '1026', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 19:56:43', '6 bulan'),
(28, '1027', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 21:49:10', '6 bulan'),
(29, '1028', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 21:51:26', '6 bulan'),
(30, '1029', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 21:56:09', '6 bulan'),
(31, '1030', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 22:00:52', '-'),
(32, '1031', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 22:01:26', '-'),
(33, '1032', '1', 0, 0, '-', 100000, '2017-04-05', '2017-04-04 22:02:15', '6 bulan'),
(34, '1033', '1', 0, 0, '-', 100000, '2017-04-10', '2017-04-10 03:04:29', '6 bulan'),
(35, '1034', '1', 0, 0, '-', 300000, '2017-11-04', '2017-11-03 19:50:54', ''),
(36, '1035', '1', 0, 17000, '-', 217000, '2020-09-12', '2020-09-12 08:13:50', '6 bulan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ref`
--

CREATE TABLE `tbl_ref` (
  `id` int(11) NOT NULL,
  `no_ref` int(11) NOT NULL,
  `nama_perkiraan` varchar(100) NOT NULL,
  `posisi` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ref`
--

INSERT INTO `tbl_ref` (`id`, `no_ref`, `nama_perkiraan`, `posisi`) VALUES
(1, 101, 'Kas', 'Aktiva Lancar'),
(2, 102, 'Piutang Pegawai', ''),
(3, 103, 'Piutang Dagang', 'Aktiva Lancar'),
(4, 104, 'Persediaan Barang', 'Aktiva Lancar'),
(5, 105, 'Sewa dibayar di muka ', 'Aktiva Lancar'),
(6, 106, 'Perlengkapan', 'Aktiva Lancar'),
(7, 107, 'Inventaris', 'Aktiva Tetap'),
(8, 108, 'Kendaraan', 'Aktiva Tetap'),
(9, 109, 'Akum.Peny.Inventaris', ''),
(10, 110, 'Akum.Peny.Kendaraan', ''),
(11, 201, 'Hutang Dagang', 'Pasiva'),
(12, 202, 'Hutang Bank', 'Pasiva'),
(13, 203, 'Hutang Gaji', 'Pasiva'),
(14, 301, 'Modal Owner', ''),
(15, 302, 'Prive Owner', ''),
(16, 501, 'Biaya Pembelian', 'Rugi-Laba'),
(17, 502, 'Biaya Servis Kendaraan', 'Rugi-Laba'),
(18, 503, 'Biaya Gaji', 'Rugi-Laba'),
(25, 504, 'Biaya Rek Air', 'Rugi-Laba'),
(20, 505, 'Biaya Peny.Inventaris', 'Rugi-Laba'),
(21, 506, 'Biaya Peny.Kendaraan', 'Rugi-Laba'),
(22, 507, 'Biaya Listrik & Telepon', 'Rugi-Laba'),
(23, 508, 'Biaya lain-lain', 'Rugi-Laba'),
(24, 401, 'Pembelian', ''),
(26, 402, 'Penjualan', ''),
(27, 509, 'Beban Persediaan', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_so`
--

CREATE TABLE `tbl_so` (
  `id` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(60) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `beli` int(11) NOT NULL,
  `jual` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_so`
--

INSERT INTO `tbl_so` (`id`, `id_brg`, `nama_brg`, `tanggal`, `beli`, `jual`) VALUES
(1, 1, 'GM5Z-3B KIT', '2016-11-30', 0, 10),
(2, 1, 'GM5Z-3B KIT', '2016-11-30', 0, 10),
(3, 2, 'GM7B-4B KIT', '2016-11-30', 0, 5),
(4, 1, 'GM5Z-3B KIT', '2016-11-30', 15, 0),
(5, 1, 'GM5Z-3B KIT', '2016-11-30', 5, 0),
(6, 2, 'GM7B-4B KIT', '2016-11-30', 5, 0),
(7, 1, 'GM5Z-3B KIT', '2016-11-29', 0, 10),
(8, 1, 'GM5Z-3B KIT', '2016-11-29', 0, 10),
(9, 2, 'GM7B-4B KIT', '2016-11-29', 0, 5),
(10, 1, 'GM5Z-3B KIT', '2016-11-29', 15, 0),
(11, 1, 'GM5Z-3B KIT', '2016-11-28', 5, 0),
(12, 2, 'GM7B-4B KIT', '2016-11-27', 5, 0),
(13, 1, 'GM5Z-3B KIT', '2016-11-30', 0, 2),
(14, 1, 'GM5Z-3B KIT', '2016-11-30', 0, 1),
(15, 1, 'GM5Z-3B KIT', '2016-12-01', 5, 0),
(16, 2, 'GM7B-4B KIT', '2016-12-01', 3, 0),
(17, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 2),
(18, 2, 'GM7B-4B KIT', '2016-12-07', 0, 3),
(19, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 5),
(20, 2, 'GM7B-4B KIT', '2016-12-07', 0, 6),
(21, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 20),
(22, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 50),
(23, 2, 'GM7B-4B KIT', '2016-12-07', 0, 2),
(24, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 10),
(25, 2, 'GM7B-4B KIT', '2016-12-07', 0, 2),
(26, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 2),
(27, 2, 'GM7B-4B KIT', '2016-12-07', 0, 2),
(28, 1, 'GM5Z-3B KIT', '2016-12-07', 0, 5),
(29, 2, 'GM7B-4B KIT', '2016-12-07', 0, 1),
(30, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(31, 2, 'GM7B-4B KIT', '2016-12-08', 0, 2),
(32, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(33, 2, 'GM7B-4B KIT', '2016-12-08', 0, 1),
(34, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(35, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(36, 2, 'GM7B-4B KIT', '2016-12-08', 0, 1),
(37, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(38, 1, 'GM5Z-3B KIT', '2016-12-08', 0, 2),
(39, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(40, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(41, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(42, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(43, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(44, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(45, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(46, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(47, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(48, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(49, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(50, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(51, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(52, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(53, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(54, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(55, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(56, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(57, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(58, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(59, 5, 'GTZ-5S MF', '2016-12-09', 0, 1),
(60, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(61, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(62, 6, 'GTZ-7S MF', '2016-12-09', 0, 1),
(63, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(64, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(65, 6, 'GTZ-7S MF', '2016-12-09', 0, 2),
(66, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(67, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(68, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(69, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(70, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(71, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(72, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(73, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(74, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(75, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(76, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(77, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(78, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(79, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(80, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(81, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(82, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(83, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(84, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(85, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(86, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(87, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(88, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(89, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(90, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(91, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(92, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(93, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(94, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(95, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(96, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(97, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(98, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(99, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(100, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(101, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(102, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(103, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(104, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 2),
(105, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(106, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(107, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(108, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(109, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(110, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(111, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(112, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(113, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(114, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(115, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(116, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(117, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(118, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(119, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(120, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(121, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(122, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(123, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(124, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(125, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(126, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(127, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(128, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(129, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(130, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(131, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(132, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(133, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(134, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(135, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(136, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(137, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(138, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(139, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(140, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(141, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(142, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(143, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(144, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(145, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(146, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(147, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(148, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(149, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(150, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(151, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(152, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 3),
(153, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(154, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(155, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(156, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(157, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(158, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(159, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(160, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(161, 3, 'GT6A (GM5Z-3B MF)', '2016-12-09', 0, 2),
(162, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(163, 3, 'GT6A (GM5Z-3B MF)', '2016-12-09', 0, 2),
(164, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 4),
(165, 3, 'GT6A (GM5Z-3B MF)', '2016-12-09', 0, 2),
(166, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(167, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(168, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(169, 1, 'GM5Z-3B KIT', '2016-12-09', 0, 1),
(170, 1, 'GM5Z-3B KIT', '2016-12-15', 0, 1),
(171, 3, 'GT6A (GM5Z-3B MF)', '2016-12-15', 0, 2),
(172, 1, 'GM5Z-3B KIT', '2016-12-15', 0, 1),
(173, 3, 'GT6A (GM5Z-3B MF)', '2016-12-15', 0, 2),
(174, 1, 'GM5Z-3B KIT', '2016-12-15', 0, 1),
(175, 3, 'GT6A (GM5Z-3B MF)', '2016-12-15', 0, 2),
(176, 1, 'GM5Z-3B KIT', '2016-12-19', 0, 1),
(177, 2, 'GM7B-4B KIT', '2016-12-19', 0, 5),
(178, 1, 'GM5Z-3B KIT', '2016-12-19', 1, 0),
(179, 1, 'GM5Z-3B KIT', '2016-12-19', 0, 1),
(180, 2, 'GM7B-4B KIT', '2016-12-19', 0, 5),
(181, 1, 'GM5Z-3B KIT', '2016-12-19', 10, 0),
(182, 1, 'GM5Z-3B KIT', '2016-12-19', 0, 1),
(183, 2, 'GM7B-4B KIT', '2016-12-19', 0, 5),
(184, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(185, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(186, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(187, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(188, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(189, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(190, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(191, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(192, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(193, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(194, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(195, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(196, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(197, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(198, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(199, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(200, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(201, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(202, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(203, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(204, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(205, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(206, 1, 'GM5Z-3B KIT', '2016-12-21', 0, 1),
(207, 2, 'GM7B-4B KIT', '2016-12-21', 0, 2),
(208, 1, 'GM5Z-3B KIT', '2017-01-20', 0, 2),
(209, 3, 'GT6A (GM5Z-3B MF)', '2017-01-20', 0, 3),
(210, 4, 'GTZ-4V MF', '2017-01-20', 0, 2),
(211, 4, 'GTZ-4V MF', '2017-01-20', 0, 2),
(212, 2, 'GM7B-4B KIT', '2017-01-20', 0, 2),
(213, 1, 'GM5Z-3B KIT', '2017-02-01', 1, 0),
(214, 1, 'GM5Z-3B KIT', '2017-03-02', 0, 2),
(215, 4, 'GTZ-4V MF', '2017-03-14', 0, 2),
(216, 4, 'GTZ-4V MF', '2017-03-14', 0, 3),
(217, 3, 'GT6A (GM5Z-3B MF)', '2017-03-14', 0, 2),
(218, 3, 'GT6A (GM5Z-3B MF)', '2017-03-14', 0, 2),
(219, 54, 'YTX9-BS MF', '2017-03-16', 0, 2),
(220, 53, '12N10 B', '2017-03-16', 0, 2),
(221, 20, 'GM5Z-3B Kit', '2017-03-16', 0, 1),
(222, 1, 'GM5Z-3B KIT', '2017-03-16', 0, 1),
(223, 62, 'YTX9-BS MF', '2017-03-29', 1, 0),
(224, 1, 'GM5Z-3B KIT', '2017-03-29', 0, 2),
(225, 54, 'YTX9-BS MF', '2017-03-29', 2, 0),
(226, 54, 'YTX9-BS MF', '2017-03-29', 2, 0),
(227, 54, 'YTX9-BS MF', '2017-03-29', 2, 0),
(228, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(229, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 2),
(230, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(231, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(232, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(233, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(234, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(235, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(236, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(237, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(238, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(239, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(240, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(241, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(242, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(243, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(244, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(245, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(246, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(247, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(248, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(249, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(250, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(251, 1, 'GM5Z-3B KIT', '2017-03-30', 0, 1),
(252, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(253, 54, 'YTX9-BS MF', '2017-03-30', 0, 1),
(254, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(255, 54, 'YTX9-BS MF', '2017-03-30', 0, 1),
(256, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(257, 54, 'YTX9-BS MF', '2017-03-30', 0, 1),
(258, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(259, 54, 'YTX9-BS MF', '2017-03-30', 0, 1),
(260, 62, 'YTX9-BS MF', '2017-03-30', 1, 0),
(261, 54, 'YTX9-BS MF', '2017-04-04', 0, 1),
(262, 54, 'YTX9-BS MF', '2017-04-04', 0, 1),
(263, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(264, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(265, 54, 'YTX9-BS MF', '2017-04-05', 0, 2),
(266, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(267, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(268, 54, 'YTX9-BS MF', '2017-04-05', 0, 2),
(269, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(270, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(271, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(272, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(273, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(274, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(275, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(276, 54, 'YTX9-BS MF', '2017-04-05', 0, 1),
(277, 1, 'GM5Z-3B KIT', '2017-04-10', 0, 1),
(278, 54, 'YTX9-BS MF', '2017-04-10', 1, 0),
(279, 1, 'GM5Z-3B KIT', '2017-11-04', 0, 1),
(280, 2, 'GM7B-4B KIT', '2017-11-04', 0, 2),
(281, 5, 'GTZ-5S MF', '2020-09-12', 0, 1),
(282, 9, '12N10-3BM', '2020-09-12', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sub_kategori`
--

CREATE TABLE `tbl_sub_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `sub_kategori` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sub_kategori`
--

INSERT INTO `tbl_sub_kategori` (`id`, `kategori`, `sub_kategori`) VALUES
(1, 'aki', '2W'),
(2, 'aki', 'GS'),
(3, 'aki', 'ASPIRA'),
(4, 'aki', 'NS Hawk 12'),
(5, 'aki', 'NS Eagle 18'),
(6, 'aki', 'YAMAGATA'),
(7, 'aki', 'KAYABA'),
(8, 'aki', 'MOTOBATT'),
(9, 'aki', 'OTODO'),
(10, 'aki', 'SILVER'),
(11, 'aki', 'G-FORCE'),
(12, 'aki', 'YUASA'),
(13, 'aki', 'GS HYB'),
(14, 'aki', 'GS (MF)'),
(15, 'aki', 'GS PRm'),
(16, 'aki', 'BOSCH'),
(17, 'aki', 'FB	\r\n'),
(18, 'aki', 'N S_Jaguar'),
(19, 'aki', 'N S_Cheetah'),
(20, 'aki', 'INCOE PREMIUM'),
(21, 'aki', 'INCOE GOLD'),
(22, 'aki', 'G - FORCE'),
(23, 'oli', 'AHM'),
(24, 'oli', 'BM1'),
(25, 'oli', 'CASTROL'),
(26, 'oli', 'EVALUBE'),
(27, 'oli', 'FEDERAL OIL'),
(28, 'oli', 'IDEMITSU'),
(29, 'oli', 'KAWASAKI'),
(30, 'oli', 'ORANGE'),
(31, 'oli', 'PERTAMINA'),
(32, 'oli', 'REPSOL'),
(33, 'oli', 'SGO'),
(34, 'oli', 'SHELL'),
(35, 'oli', 'TOP 1'),
(36, 'oli', 'YAMAHA'),
(37, 'oli', 'OIL RANTAI'),
(38, 'oli', 'COOLANT'),
(39, 'oli', 'M-ONE'),
(40, 'oli', 'JUMBO'),
(41, 'oli', 'TGMO'),
(42, 'ban', 'AHM'),
(43, 'ban', 'ASPIRA'),
(44, 'ban', 'IRC'),
(45, 'ban', 'ban luar '),
(46, 'ban', 'ban dalam'),
(47, 'ban', 'FDR'),
(51, 'aki', 'BEKAS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_temp_beli`
--

CREATE TABLE `tbl_temp_beli` (
  `no` int(11) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_temp_beli`
--

INSERT INTO `tbl_temp_beli` (`no`, `sess_id`, `id`, `name`, `qty`, `price`, `subtotal`) VALUES
(1, '0a2129d79a8de8b745437dc33df8e071874a1533', '54', 'YTX9-BS MF', 2, 80000, 160000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_temp_tt`
--

CREATE TABLE `tbl_temp_tt` (
  `no` int(11) NOT NULL,
  `id` varchar(15) NOT NULL,
  `sess_id` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `price` int(100) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_temp_tt`
--

INSERT INTO `tbl_temp_tt` (`no`, `id`, `sess_id`, `name`, `qty`, `price`, `subtotal`) VALUES
(7, '62', 'fc1bb7be642670d047b6bc2464b7af267ba5b3ba', 'YTX9-BS MF', 1, 20000, 20000),
(18, '62', '4be0cbfd0794436ede4095c75b8d2f016ec5df9d', 'YTX9-BS MF', 1, 20000, 20000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_jurnal_umum`
--
ALTER TABLE `tbl_jurnal_umum`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_ref`
--
ALTER TABLE `tbl_ref`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_so`
--
ALTER TABLE `tbl_so`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_temp_beli`
--
ALTER TABLE `tbl_temp_beli`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tbl_temp_tt`
--
ALTER TABLE `tbl_temp_tt`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_pembelian`
--
ALTER TABLE `tbl_detail_pembelian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_penjualan`
--
ALTER TABLE `tbl_detail_penjualan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tbl_jurnal_umum`
--
ALTER TABLE `tbl_jurnal_umum`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_ref`
--
ALTER TABLE `tbl_ref`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_so`
--
ALTER TABLE `tbl_so`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT untuk tabel `tbl_sub_kategori`
--
ALTER TABLE `tbl_sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_temp_beli`
--
ALTER TABLE `tbl_temp_beli`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_temp_tt`
--
ALTER TABLE `tbl_temp_tt`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
