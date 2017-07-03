-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 03:48 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbamidis`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_agen`
--

CREATE TABLE IF NOT EXISTS `t_agen` (
  `id_agen` int(5) NOT NULL AUTO_INCREMENT,
  `nama_agen` varchar(50) DEFAULT NULL,
  `alamat_agen` text,
  `kontak` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` enum('aktif','tidak aktif') DEFAULT NULL,
  PRIMARY KEY (`id_agen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `t_agen`
--

INSERT INTO `t_agen` (`id_agen`, `nama_agen`, `alamat_agen`, `kontak`, `email`, `status`) VALUES
(1, 'giant', 'jl.angkasa', '08976573212', 'giant@gmail.com', 'tidak aktif'),
(2, 'air port', 'jl.mawar ', '08765645781', 'ap@gmail.com', 'aktif'),
(3, 'bip', 'jl.badak', '089765453123', 'bip@gmail.com', 'aktif'),
(4, 'ktp', 'jl.soreang', '082564345467', 'ktp@gmail.com', 'tidak aktif'),
(5, 'Borma', 'Jl.Dahkota Bandung', '089456876574', 'dk@gmail.com', 'aktif'),
(6, 'Mineral Depot', 'Jl Dr Setiabudi 278-a Cidadap Bandung', '089123758238', 'mdepot@gmail.com', 'aktif'),
(7, 'Dewi Sri', 'Jl Cisokan 60 Rt 001/07 Cibenying Kidul Bandung', '087123765867', 'sri@gmail.com', 'aktif'),
(8, 'Surya Toko', 'Jl kopo 141 Bojongloa Kidul Bandung', '081235465789', 'surya@gmail.com', 'aktif'),
(9, 'Airy CV', 'Jl Terusan Jakarta 233-a Cicadas Bandung', '089234823417', 'Airy@gmail.com', 'aktif'),
(10, 'Cahaya Filter', 'Jl Terusan Buahbatu 149 Margacinta Bandung', '089814478983', 'cahaya@gmail.com', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `t_bom`
--

CREATE TABLE IF NOT EXISTS `t_bom` (
  `id_bom` int(12) NOT NULL AUTO_INCREMENT,
  `id_peramalan` int(20) DEFAULT NULL,
  `bulan_tahun` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id_bom`),
  KEY `kode_produk` (`id_peramalan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_detail_pemesanan` (
  `id_detail_pemesanan` int(20) NOT NULL AUTO_INCREMENT,
  `sub_total` int(50) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `kode_pesan` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  PRIMARY KEY (`id_detail_pemesanan`),
  KEY `id_detail_pemesanan` (`id_detail_pemesanan`),
  KEY `kode_produk` (`kode_produk`),
  KEY `kode_pesan` (`kode_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `t_detail_pemesanan`
--

INSERT INTO `t_detail_pemesanan` (`id_detail_pemesanan`, `sub_total`, `kode_produk`, `kode_pesan`, `jumlah`) VALUES
(39, 519400000, 'GL', 127, 37100),
(40, 397600000, 'GL', 128, 28400),
(41, 478800000, 'GL', 129, 34200),
(42, 350000000, 'GL', 130, 25000),
(43, 539000000, 'GL', 131, 38500),
(44, 495600000, 'GL', 132, 35400),
(45, 200000, 'BTL', 133, 100);

--
-- Triggers `t_detail_pemesanan`
--
DROP TRIGGER IF EXISTS `tgr_detail_pemesanan`;
DELIMITER //
CREATE TRIGGER `tgr_detail_pemesanan` BEFORE INSERT ON `t_detail_pemesanan`
 FOR EACH ROW BEGIN
 INSERT INTO t_detail_pemesanan_seq VALUES (NULL);
 SET NEW.id_detail_pemesanan = CONCAT('DP', LPAD(LAST_INSERT_ID(),2,'0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_detail_pemesanan_seq`
--

CREATE TABLE IF NOT EXISTS `t_detail_pemesanan_seq` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Dumping data for table `t_detail_pemesanan_seq`
--

INSERT INTO `t_detail_pemesanan_seq` (`id`) VALUES
(1),
(14),
(15),
(17),
(18),
(19),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147);

-- --------------------------------------------------------

--
-- Table structure for table `t_karyawan`
--

CREATE TABLE IF NOT EXISTS `t_karyawan` (
  `id_karyawan` int(5) NOT NULL AUTO_INCREMENT,
  `nip` int(20) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `kontak` varchar(13) NOT NULL,
  `jabatan` enum('admin','operational direktur','ppic','gudang','purchasing','supir') NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `t_karyawan`
--

INSERT INTO `t_karyawan` (`id_karyawan`, `nip`, `nama_karyawan`, `kontak`, `jabatan`, `email`, `status`, `password`) VALUES
(20, 10112275, 'Fahrul Andzar', '089765473252', 'admin', 'admin@gmail.com', 'aktif', 'admin'),
(51, 100101, 'Andri', '089123758238', 'purchasing', 'Tito@gmail ', 'aktif', 'purchasing'),
(52, 100102, 'Tito', '081256456475', 'ppic', 'rudi@gmail.com ', 'aktif', 'ppic'),
(53, 100103, 'Rudy', '089742675834', 'gudang', 'andri@gmail.com ', 'aktif', 'gudang'),
(54, 100104, 'Yohan', '089456876574', 'operational direktur', 'faris@gmail.com ', 'aktif', 'direktur'),
(55, 100106, 'udin', '089748556345', 'supir', 'udin@gmail.com', 'aktif', ''),
(56, 100107, 'asep', '0891237573845', 'supir', 'asep@gmail.com ', 'aktif', 'supir');

-- --------------------------------------------------------

--
-- Table structure for table `t_kendaraan`
--

CREATE TABLE IF NOT EXISTS `t_kendaraan` (
  `no_polisi` varchar(20) NOT NULL,
  `jenis_kendaraan` enum('Engkel','Fuso') NOT NULL,
  `kendaraan` varchar(10) NOT NULL,
  `kapasitas` varchar(20) NOT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL,
  PRIMARY KEY (`no_polisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kendaraan`
--

INSERT INTO `t_kendaraan` (`no_polisi`, `jenis_kendaraan`, `kendaraan`, `kapasitas`, `status`) VALUES
('D12344DF', 'Engkel', 'Mobil 1', '300 ', 'tersedia'),
('D4262SDF', 'Engkel', 'Mobil 3', '300', 'tersedia'),
('D6538GH', 'Engkel', 'Mobil 5', '300', 'tersedia'),
('D6548GB', 'Engkel', 'Mobil 4', '300', 'tersedia'),
('D6574YHT', 'Engkel', 'Mobil 2', '300', 'tersedia'),
('D6583QW', 'Engkel', 'Mobil 6', '300', 'tersedia'),
('D6853SWE', 'Fuso', 'Truk 1', '800', 'tersedia'),
('D8749KL', 'Fuso', 'Truk 4', '800', 'tersedia'),
('D8965FG', 'Fuso', 'Truk 3', '800', 'tersedia'),
('D8976HG', 'Fuso', 'Truk 2', '800', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `t_material`
--

CREATE TABLE IF NOT EXISTS `t_material` (
  `id_material` int(20) NOT NULL AUTO_INCREMENT,
  `nama_material` varchar(12) NOT NULL,
  `qty` int(12) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(12) NOT NULL,
  `pengeluaran` int(12) NOT NULL,
  `sisa` int(12) NOT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `total_harga` int(20) NOT NULL,
  `safety_stock` int(20) DEFAULT NULL,
  `status` enum('persediaan aman','persediaan tidak aman') NOT NULL,
  `id_bom` int(12) NOT NULL,
  PRIMARY KEY (`id_material`),
  KEY `id_bom` (`id_bom`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `t_material`
--

INSERT INTO `t_material` (`id_material`, `nama_material`, `qty`, `harga`, `stok`, `pengeluaran`, `sisa`, `bulan`, `total_harga`, `safety_stock`, `status`, `id_bom`) VALUES
(5, 'Cap', 1, 70000, 5, 33600, 2000, 'Januari', 70000, 3360, 'persediaan tidak aman', 2),
(6, 'Cap Seal', 1, 50000, 30001, 34500, 1599, 'Januari', 50000, 3450, 'persediaan tidak aman', 0),
(7, 'Tisu', 1, 50000, 35000, 33600, 800, 'Januari', 50000, 3360, 'persediaan tidak aman', 0),
(12, 'Stiker', 1, 40000, 50000, 35300, 20001, 'Januari', 40000, 3530, 'persediaan aman', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan`
--

CREATE TABLE IF NOT EXISTS `t_pemesanan` (
  `kode_pesan` int(20) NOT NULL AUTO_INCREMENT,
  `tgl_pesan` date NOT NULL,
  `verifikasi` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `status` enum('sudah di setujui','belum di setujui') NOT NULL,
  `id_agen` int(12) NOT NULL,
  `total_harga` int(50) NOT NULL,
  PRIMARY KEY (`kode_pesan`),
  KEY `id_agen` (`id_agen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `t_pemesanan`
--

INSERT INTO `t_pemesanan` (`kode_pesan`, `tgl_pesan`, `verifikasi`, `status`, `id_agen`, `total_harga`) VALUES
(127, '2016-01-14', 'sudah', 'sudah di setujui', 1, 519400000),
(128, '2016-02-03', 'sudah', 'sudah di setujui', 4, 397600000),
(129, '2016-03-09', 'sudah', 'sudah di setujui', 7, 478800000),
(130, '2016-04-13', 'sudah', 'sudah di setujui', 5, 350000000),
(131, '2016-05-19', 'sudah', 'sudah di setujui', 9, 539000000),
(132, '2016-06-22', 'sudah', 'sudah di setujui', 3, 495600000),
(133, '2017-02-22', 'sudah', 'sudah di setujui', 3, 200000);

--
-- Triggers `t_pemesanan`
--
DROP TRIGGER IF EXISTS `tgr_pemesanan`;
DELIMITER //
CREATE TRIGGER `tgr_pemesanan` BEFORE INSERT ON `t_pemesanan`
 FOR EACH ROW BEGIN
 INSERT INTO t_pemesanan_seq VALUES (NULL);
 SET NEW.kode_pesan = CONCAT('PMS', LPAD(LAST_INSERT_ID(),2,'0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_pemesanan_seq`
--

CREATE TABLE IF NOT EXISTS `t_pemesanan_seq` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `t_pemesanan_seq`
--

INSERT INTO `t_pemesanan_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengadaan`
--

CREATE TABLE IF NOT EXISTS `t_pengadaan` (
  `id_pengadaan` int(5) NOT NULL AUTO_INCREMENT,
  `tgl_pengadaan` date NOT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `total_harga` int(20) NOT NULL,
  `verifikasi` enum('sudah','belum') NOT NULL DEFAULT 'belum',
  `id_supplier` int(5) NOT NULL,
  `Status` enum('sudah diterima','belum diterima') NOT NULL,
  `id_material` int(20) DEFAULT NULL,
  PRIMARY KEY (`id_pengadaan`),
  KEY `id_supplier` (`id_supplier`),
  KEY `id_material` (`id_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `t_pengadaan`
--

INSERT INTO `t_pengadaan` (`id_pengadaan`, `tgl_pengadaan`, `jumlah`, `total_harga`, `verifikasi`, `id_supplier`, `Status`, `id_material`) VALUES
(13, '2017-02-13', 34426, 0, 'sudah', 1, 'sudah diterima', 5),
(14, '2017-02-13', 34426, 0, 'sudah', 2, 'sudah diterima', 6);

--
-- Triggers `t_pengadaan`
--
DROP TRIGGER IF EXISTS `trg_pengadaan`;
DELIMITER //
CREATE TRIGGER `trg_pengadaan` BEFORE INSERT ON `t_pengadaan`
 FOR EACH ROW Begin
 INSERT INTO t_pengadaan_seq VALUES (NULL);
 SET NEW.id_pengadaan = CONCAT('P', LPAD(LAST_INSERT_ID(),2,'0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengadaan_seq`
--

CREATE TABLE IF NOT EXISTS `t_pengadaan_seq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `t_pengadaan_seq`
--

INSERT INTO `t_pengadaan_seq` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengiriman`
--

CREATE TABLE IF NOT EXISTS `t_pengiriman` (
  `id_kirim` int(10) NOT NULL AUTO_INCREMENT,
  `tgl_kirim` date DEFAULT NULL,
  `status` enum('Diterima','Dalam Pengiriman') DEFAULT NULL,
  `id_detail_pemesanan` int(20) DEFAULT NULL,
  `id_karyawan` int(5) DEFAULT NULL,
  `no_polisi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_kirim`),
  KEY `id_detail_pemesanan` (`id_detail_pemesanan`),
  KEY `id_karyawan` (`id_karyawan`),
  KEY `no_polisi` (`no_polisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `t_pengiriman`
--

INSERT INTO `t_pengiriman` (`id_kirim`, `tgl_kirim`, `status`, `id_detail_pemesanan`, `id_karyawan`, `no_polisi`) VALUES
(48, '2017-02-15', 'Dalam Pengiriman', 39, 55, 'D12344DF'),
(49, '2017-02-15', 'Dalam Pengiriman', 40, 55, 'D6548GB');

-- --------------------------------------------------------

--
-- Table structure for table `t_peramalan`
--

CREATE TABLE IF NOT EXISTS `t_peramalan` (
  `id_peramalan` int(20) NOT NULL AUTO_INCREMENT,
  `peramalan` varchar(20) DEFAULT NULL,
  `hasil` float DEFAULT NULL,
  `kode_produk` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_peramalan`),
  KEY `id_detail_pemesanan` (`kode_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `t_peramalan`
--

INSERT INTO `t_peramalan` (`id_peramalan`, `peramalan`, `hasil`, `kode_produk`) VALUES
(8, '07-2016', 34425.5, 'GL'),
(23, '02-2016', 37100, 'GL'),
(24, '03-2016', 36230, 'GL'),
(25, '04-2016', 0, 'CP'),
(26, '04-2016', 34403, 'GL'),
(27, '05-2016', 28308.8, 'GL'),
(28, '06-2016', 34181.9, 'GL'),
(29, '07-2016', 34425.5, 'GL'),
(30, '07-2016', 34425.5, 'GL'),
(31, '07-2016', 34425.5, 'GL'),
(32, '07-2016', 34425.5, 'GL'),
(33, '07-2016', 34425.5, 'GL'),
(34, '07-2016', 34425.5, 'GL');

--
-- Triggers `t_peramalan`
--
DROP TRIGGER IF EXISTS `tgr_peramalan`;
DELIMITER //
CREATE TRIGGER `tgr_peramalan` BEFORE INSERT ON `t_peramalan`
 FOR EACH ROW BEGIN
 INSERT INTO t_peramalan_seq VALUES (NULL);
 SET NEW.id_peramalan = CONCAT('RML', LPAD(LAST_INSERT_ID(),2,'0'));
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `t_peramalan_seq`
--

CREATE TABLE IF NOT EXISTS `t_peramalan_seq` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `t_peramalan_seq`
--

INSERT INTO `t_peramalan_seq` (`id`) VALUES
(1),
(2),
(3),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37);

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE IF NOT EXISTS `t_produk` (
  `kode_produk` varchar(20) NOT NULL,
  `jenis` varchar(12) NOT NULL,
  `harga` int(12) NOT NULL,
  `jumlah` int(12) NOT NULL,
  `status` enum('tersedia','tidak tersedia') NOT NULL,
  `id_karyawan` int(5) DEFAULT NULL,
  PRIMARY KEY (`kode_produk`),
  KEY `id_karyawan` (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`kode_produk`, `jenis`, `harga`, `jumlah`, `status`, `id_karyawan`) VALUES
('BTL', 'Botol', 2000, 20, 'tersedia', NULL),
('CP', 'Cup', 500, 0, 'tersedia', NULL),
('GL', 'Galon', 14000, 10, 'tersedia', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_produk_seq`
--

CREATE TABLE IF NOT EXISTS `t_produk_seq` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_supplier`
--

CREATE TABLE IF NOT EXISTS `t_supplier` (
  `id_supplier` int(5) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat_supplier` text NOT NULL,
  `kontak` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` enum('aktif','tidak aktif') NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_supplier`
--

INSERT INTO `t_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `kontak`, `email`, `status`) VALUES
(1, 'PT. Argantara', 'jakarta selatan', '089765456432', 'argantara@yahoo.com', 'tidak aktif'),
(2, 'PT. Uniplastindo Interbuana', 'Jakarta', '087546324765', 'buana@gmail.com', 'aktif'),
(3, 'PT. Tirta Masindo', 'Medan', '081235465789', 'masindo@gmail.com', 'aktif'),
(4, 'PT. Adiguna Label Indonesia', 'surabaya', '089897654678', 'adiguna@gmail.com', 'aktif');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_bom`
--
ALTER TABLE `t_bom`
  ADD CONSTRAINT `t_bom_ibfk_1` FOREIGN KEY (`id_peramalan`) REFERENCES `t_peramalan` (`id_peramalan`);

--
-- Constraints for table `t_detail_pemesanan`
--
ALTER TABLE `t_detail_pemesanan`
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_1` FOREIGN KEY (`kode_produk`) REFERENCES `t_produk` (`kode_produk`),
  ADD CONSTRAINT `t_detail_pemesanan_ibfk_2` FOREIGN KEY (`kode_pesan`) REFERENCES `t_pemesanan` (`kode_pesan`);

--
-- Constraints for table `t_pemesanan`
--
ALTER TABLE `t_pemesanan`
  ADD CONSTRAINT `t_pemesanan_ibfk_1` FOREIGN KEY (`id_agen`) REFERENCES `t_agen` (`id_agen`);

--
-- Constraints for table `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  ADD CONSTRAINT `t_pengiriman_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `t_karyawan` (`id_karyawan`),
  ADD CONSTRAINT `t_pengiriman_ibfk_2` FOREIGN KEY (`no_polisi`) REFERENCES `t_kendaraan` (`no_polisi`),
  ADD CONSTRAINT `t_pengiriman_ibfk_7` FOREIGN KEY (`id_detail_pemesanan`) REFERENCES `t_detail_pemesanan` (`id_detail_pemesanan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
