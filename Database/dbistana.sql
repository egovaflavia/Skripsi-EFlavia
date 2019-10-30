-- phpMyAdmin SQL Dump
-- version 3.1.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 16. Januari 2019 jam 08:03
-- Versi Server: 5.1.35
-- Versi PHP: 5.2.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbistana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'Admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `idanggota` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `tgldaftar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idanggota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`idanggota`, `username`, `password`, `namalengkap`, `jk`, `tgllahir`, `alamat`, `nohp`, `tgldaftar`) VALUES
(1, 'Egova', 'asdasd12', 'Egova Riva Gustino', 'P', '2018-12-04', 'Padang', '0819629431', '2018-12-25 06:49:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `idbrand` int(11) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `namabrand` varchar(30) NOT NULL,
  PRIMARY KEY (`idbrand`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `brand`
--

INSERT INTO `brand` (`idbrand`, `idkat`, `idadmin`, `namabrand`) VALUES
(1, 1, 1, 'ACTIV'),
(2, 1, 1, 'OLYMPIC'),
(3, 2, 1, 'MODERNO'),
(5, 3, 1, 'BIGLAND'),
(6, 3, 1, 'KANGOROO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `idcart` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL,
  `tglcart` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idcart`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `cart`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `nama` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `komen` varchar(120) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `cek` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`nama`, `email`, `komen`, `waktu`, `cek`) VALUES
('Egova', 'egovaflavia@gmail.com', 'Min barang nya kapan nyampe', '2018-12-19, 06:30 am', 'cek'),
('Admin', 'Admin', 'Tes', '2018-12-19, 06:58 am', 'cek'),
('Admin', 'Admin', 'Tes', '2018-12-19, 06:58 am', 'cek'),
('Admin', 'Admin', 'A', '2018-12-19, 06:59 am', 'cek'),
('Admin', 'Admin', 'Yaaaaa', '2018-12-19, 07:00 am', 'cek'),
('Admin', 'Admin', 'yeah', '2018-12-19, 07:33 am', 'cek'),
('Admin', 'Admin', 'yea', '2018-12-19, 07:34 am', 'cek'),
('Admin', 'Admin', 'yeah', '2018-12-19, 07:35 am', 'cek'),
('Admin', 'Admin', 'egooo', '2018-12-19, 07:35 am', 'cek'),
('Admin', 'Admin', 'hAHAHA', '2018-12-19, 07:35 am', 'cek');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkat` int(11) NOT NULL AUTO_INCREMENT,
  `idadmin` int(11) NOT NULL,
  `namakat` varchar(40) NOT NULL,
  PRIMARY KEY (`idkat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idkat`, `idadmin`, `namakat`) VALUES
(1, 1, 'FURNITURE'),
(2, 1, 'KARPET'),
(3, 1, 'TEMPAT TIDUR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE IF NOT EXISTS `komentar` (
  `idkomentar` int(11) NOT NULL AUTO_INCREMENT,
  `idproduk` int(11) NOT NULL,
  `idanggota` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tglkomentar` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `statuskomentar` char(1) NOT NULL,
  PRIMARY KEY (`idkomentar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `idproduk`, `idanggota`, `komentar`, `tglkomentar`, `statuskomentar`) VALUES
(1, 13, 1, 'Karpet yang bagus', '2018-12-17 06:49:27', 'P'),
(2, 11, 1, 'Gimana cara pesannya', '2018-12-17 06:51:43', 'P'),
(3, 13, 4, 'Produk Bagus', '2018-12-17 10:57:21', 'P'),
(4, 13, 5, 'Barang GG', '2018-12-19 06:55:59', 'P'),
(5, 13, 1, 'Karpet bagus', '2018-12-19 11:04:51', 'P');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasibayar`
--

CREATE TABLE IF NOT EXISTS `konfirmasibayar` (
  `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `idorder` int(11) NOT NULL,
  `namabankpengirim` varchar(50) NOT NULL,
  `namapengirim` varchar(50) NOT NULL,
  `jumlahtransfer` double NOT NULL,
  `tgltransfer` date NOT NULL,
  `namabankpenerima` varchar(50) NOT NULL,
  `bukti` text NOT NULL,
  PRIMARY KEY (`idkonfirmasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `konfirmasibayar`
--

INSERT INTO `konfirmasibayar` (`idkonfirmasi`, `idorder`, `namabankpengirim`, `namapengirim`, `jumlahtransfer`, `tgltransfer`, `namabankpenerima`, `bukti`) VALUES
(1, 8, 'BRI', 'Egova', 49000000, '2018-12-27', 'BRI', 'New Picture.bmp'),
(2, 14, 'BRI', 'Egova', 49000000, '2018-12-27', '5544 0101 2262 6253 2 A/N ISRA MIHARTIN ', 'skema-arsitektur-informasi.png'),
(3, 15, 'gkh', 'hlkhl', 450000, '2019-01-15', '5544 0101 2262 6253 2 A/N ISRA MIHARTIN ', 'dsgsg.jpg'),
(4, 16, 'hgfdggfj', 'fjfjg', 340000, '2019-01-22', '5544 0101 2262 6253 2 A/N ISRA MIHARTIN ', 'Tampilan menu Beranda.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderdetail`
--

CREATE TABLE IF NOT EXISTS `orderdetail` (
  `idorder` int(11) NOT NULL,
  `idproduk` int(11) NOT NULL,
  `idjasa` int(11) NOT NULL,
  `jumlahbeli` int(11) NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orderdetail`
--

INSERT INTO `orderdetail` (`idorder`, `idproduk`, `idjasa`, `jumlahbeli`, `subtotal`) VALUES
(14, 11, 0, 1, 49000000),
(15, 5, 0, 1, 450000),
(16, 6, 0, 1, 900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `idorder` int(11) NOT NULL AUTO_INCREMENT,
  `idanggota` int(11) NOT NULL,
  `alamatkirim` text NOT NULL,
  `total` double NOT NULL,
  `tglorder` date NOT NULL,
  `statusorder` varchar(40) NOT NULL,
  PRIMARY KEY (`idorder`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`idorder`, `idanggota`, `alamatkirim`, `total`, `tglorder`, `statusorder`) VALUES
(14, 1, 'Jalan Parak Karakah No 21 Padang', 49000000, '2018-12-27', 'Sudah Diterima Pembeli'),
(15, 1, 'dfsg', 450000, '2019-01-15', 'Sudah Diterima Pembeli'),
(16, 1, 'lklknkln', 900000, '2019-01-15', 'Sudah Diterima Pembeli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pimpinan`
--

CREATE TABLE IF NOT EXISTS `pimpinan` (
  `idpimpinan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET swe7 NOT NULL,
  `password` varchar(20) CHARACTER SET swe7 NOT NULL,
  `namalengkap` varchar(20) CHARACTER SET swe7 NOT NULL,
  PRIMARY KEY (`idpimpinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `pimpinan`
--

INSERT INTO `pimpinan` (`idpimpinan`, `username`, `password`, `namalengkap`) VALUES
(1, 'Eriva', 'asdasd12', 'Eriva Joni'),
(2, 'pimpinan', 'pimpinan', 'Andi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL,
  `namaproduk` varchar(100) NOT NULL,
  `hargaproduk` double NOT NULL,
  `stok` int(11) NOT NULL,
  `spesifikasi` text NOT NULL,
  `detailproduk` text NOT NULL,
  `foto1` text NOT NULL,
  `foto2` text NOT NULL,
  `tglpost` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`idproduk`, `idkat`, `idbrand`, `namaproduk`, `hargaproduk`, `stok`, `spesifikasi`, `detailproduk`, `foto1`, `foto2`, `tglpost`) VALUES
(1, 2, 3, 'MODERNO LVNDR', 450000, 4, 'Karpet Lantai', 'P : 160 L : 210', '769f69ff391a284fae09850dde90cc9c.jpg', '', '2018-12-17 05:49:38'),
(2, 1, 2, 'CSD0111192', 800000, 5, 'Mejar Tv Minimalis', 'Size \r\nW : 1.500 x D : 450 x H : 845 mm\r\nColor \r\nSonoma Oak', 'CSD0111192.jpg', '', '2018-12-17 05:50:38'),
(3, 1, 2, 'DCH0113698', 1300000, 5, 'Lemari Pajang / Hias', 'Size \r\nW : 809 x D : 420 x H : 1.841 mm\r\nColor \r\nDark Oak', 'DCH0113698.jpg', '', '2018-12-17 05:51:34'),
(4, 2, 3, 'MODERNO GRN', 450000, 7, 'Karpet Lantai', 'P : 160 L : 210', 'f10341610971408d1bd70f1754fc48b2.jpg', '', '2018-12-17 05:52:43'),
(5, 2, 3, 'MODERNO BRWN', 450000, 9, 'Karpet Lantai', 'P : 160 L : 210', 'c66e17efbf178eb55758338fa0c22534.jpg', '', '2018-12-17 05:53:29'),
(6, 1, 1, 'ACTIV VIERA LS 800', 900000, 6, 'Lemari Sepatu dan Sandal', 'P : 830 L : 1200 T : 1200', 'ACTIV_VIERA_LS_800.jpg', '', '2018-12-17 05:58:33'),
(11, 3, 5, 'BED SET SINGLE PILLOW TOP', 49000000, 0, 'Springbed + Divan + Sandaran', 'P : 205 L : 185 T : 105', 'big-49f3d69ce687bfa3.png', '', '2018-12-17 06:35:54');
