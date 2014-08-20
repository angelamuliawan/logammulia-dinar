-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2014 at 04:19 AM
-- Server version: 5.5.37-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k6589122_tgs99`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgs_administrator`
--

CREATE TABLE IF NOT EXISTS `tgs_administrator` (
  `id_administrator` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin_permission` tinyint(2) NOT NULL,
  `date_register` datetime NOT NULL,
  `date_login` datetime NOT NULL,
  `activate_key` varchar(100) NOT NULL,
  PRIMARY KEY (`id_administrator`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tgs_administrator`
--

INSERT INTO `tgs_administrator` (`id_administrator`, `username`, `password`, `name`, `email`, `admin_permission`, `date_register`, `date_login`, `activate_key`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aditia.tamar@yahoo.com', 2, '2012-12-05 00:00:00', '0000-00-00 00:00:00', 'HRQkqeqp2317ADQEfalsieasdawewq1241DDKWB'),
(2, 'backoffices', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', 'backoffice@tokoemas.com', 0, '2012-12-27 11:27:51', '0000-00-00 00:00:00', 'mVcO0NPIleDURZFuXrykGh1iSgYtjKadbEQHs4B3J96LCpWv2Tq7Axz5Mf8onw'),
(5, 'admin2', 'a8f5f167f44f4964e6c998dee827110c', 'Admin 2', 'admin2@admin.net', 1, '2012-12-27 01:15:17', '0000-00-00 00:00:00', 'xsqavUlr5IeAu6yc801n2hM9woXbZOGjCRpiBVTEmzktNJYPgdHLQ3f7DW4SKF'),
(7, 'qweqwe', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', 'asd@asd.asd', 0, '2013-09-28 10:07:58', '0000-00-00 00:00:00', 'VeJmDTyhR0YwdpLN216cCK3qbZGWXnjQiSvogMBPaF7Is5xU948fAEuztOrklH'),
(8, 'adit', '81dc9bdb52d04dc20036dbd8313ed055', 'adit', 'aditia.hariadi@yahoo.com', 0, '2013-10-05 04:45:11', '0000-00-00 00:00:00', '42hj0IEOAcgdkymrM8SoU3Y5sfDwnH7FLaXuz6Blpvt9KVQ1eZqxJibRGCTNWP');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_celengan`
--

CREATE TABLE IF NOT EXISTS `tgs_celengan` (
  `id_celengan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `total_balance` bigint(20) NOT NULL,
  `date_celengan` datetime NOT NULL,
  `status_celengan` int(11) NOT NULL,
  PRIMARY KEY (`id_celengan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tgs_celengan`
--

INSERT INTO `tgs_celengan` (`id_celengan`, `id_user`, `total_balance`, `date_celengan`, `status_celengan`) VALUES
(7, 2, 716000, '2013-04-15 04:19:52', 1),
(8, 5, 480000, '2013-06-01 08:54:05', 1),
(9, 3, 200000, '2013-09-28 07:29:26', 1),
(10, 7, 200000, '2013-09-28 08:53:17', 1),
(11, 9, 0, '2013-09-29 12:06:31', 1),
(12, 10, 500000, '2013-11-04 10:02:35', 1),
(13, 14, 11022396, '2014-03-27 02:36:29', 1),
(14, 16, 2596000, '2014-08-16 11:02:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_celengan_detail`
--

CREATE TABLE IF NOT EXISTS `tgs_celengan_detail` (
  `id_celengan_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_celengan` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `date_celengan_detail` datetime NOT NULL,
  `status_celengan_detail` int(11) NOT NULL,
  PRIMARY KEY (`id_celengan_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `tgs_celengan_detail`
--

INSERT INTO `tgs_celengan_detail` (`id_celengan_detail`, `id_celengan`, `id_product`, `qty`, `balance`, `date_celengan_detail`, `status_celengan_detail`) VALUES
(48, 7, 0, 0, 2000000, '2013-04-15 04:20:36', 1),
(49, 7, 10, 1, -520000, '2013-04-15 04:31:35', 2),
(50, 7, 10, 2, -1040000, '2013-04-15 04:37:45', 2),
(51, 7, 0, 0, 200000, '2013-04-15 04:38:55', 5),
(52, 7, 0, 0, 300000, '2013-04-15 04:59:40', 0),
(53, 7, 13, 1, -88000, '2013-04-15 05:00:56', 2),
(54, 7, 10, 3, 508000, '2013-04-16 01:34:56', 7),
(55, 7, 0, 0, 2000000, '2013-04-16 01:35:48', 1),
(56, 7, 10, 3, -1560000, '2013-04-16 01:36:50', 2),
(57, 7, 10, 3, 1524000, '2013-04-16 01:49:23', 7),
(58, 7, 10, 3, -1560000, '2013-04-16 01:51:57', 2),
(59, 7, 10, 1, 508000, '2013-04-16 01:52:05', 7),
(60, 7, 10, 2, 1016000, '2013-04-16 01:54:35', 7),
(61, 7, 13, 1, -88000, '2013-04-17 09:41:01', 2),
(62, 7, 10, 1, -520000, '2013-04-17 10:04:13', 2),
(63, 7, 0, 0, 200000, '2013-06-01 08:23:04', 1),
(64, 7, 10, 1, -520000, '2013-06-01 08:24:47', 2),
(65, 8, 0, 0, 1000000, '2013-06-01 08:54:18', 1),
(66, 8, 10, 1, -520000, '2013-06-01 08:56:59', 2),
(67, 7, 0, 0, 5000000, '2013-06-11 11:38:49', 1),
(68, 7, 0, 0, 200000, '2013-07-13 09:10:57', 1),
(69, 7, 0, 0, -1000000, '2013-07-13 09:13:15', 3),
(70, 7, 5, 1, -2770000, '2013-07-13 09:20:32', 2),
(71, 7, 10, 1, 508000, '2013-07-13 09:22:52', 7),
(72, 7, 5, 1, 508000, '2013-07-13 09:24:15', 7),
(73, 7, 10, 1, 508000, '2013-07-13 09:25:08', 7),
(74, 7, 10, 1, -520000, '2013-07-13 09:26:10', 2),
(75, 7, 0, 0, 400000, '2013-08-29 09:08:51', 0),
(76, 9, 0, 0, 200000, '2013-09-28 07:29:51', 1),
(77, 10, 0, 0, 200000, '2013-09-28 08:56:50', 1),
(78, 7, 0, 0, -200000, '2013-09-28 09:01:57', 3),
(79, 7, 9, 2, -2006000, '2013-09-28 09:07:05', 2),
(80, 7, 11, 1, -2500000, '2013-09-28 09:16:50', 2),
(81, 11, 0, 0, 200000, '2013-10-24 12:21:03', 0),
(82, 12, 0, 0, 500000, '2013-11-04 10:16:22', 1),
(83, 12, 0, 0, 500000, '2013-11-04 10:17:05', 5),
(84, 11, 0, 0, 500000, '2013-12-08 12:45:05', 0),
(85, 7, 11, 1, 508000, '2013-12-21 04:46:08', 7),
(86, 7, 15, 1, -580000, '2013-12-21 09:47:57', 2),
(87, 7, 0, 0, 200000, '2013-12-21 10:06:23', 0),
(88, 7, 0, 0, -200000, '2013-12-21 10:07:55', 3),
(89, 13, 0, 0, 200000, '2014-03-27 02:37:17', 1),
(90, 13, 0, 0, 10000000, '2014-03-27 02:38:32', 1),
(91, 13, 15, 1, -571000, '2014-03-27 06:53:21', 2),
(92, 13, 11, 1, -2037604, '2014-03-27 06:55:55', 2),
(93, 13, 11, 1, 508000, '2014-03-27 07:00:39', 7),
(94, 13, 5, 1, -2585000, '2014-03-27 07:03:26', 2),
(95, 13, 5, 1, 508000, '2014-03-27 07:03:50', 7),
(96, 13, 0, 0, 5000000, '2014-03-27 07:16:18', 1),
(97, 14, 0, 0, 10000000, '2014-08-16 11:03:06', 1),
(98, 14, 5, 1, -2605000, '2014-08-16 11:05:47', 2),
(99, 14, 9, 2, -2194000, '2014-08-16 11:07:07', 2),
(100, 14, 5, 1, -2605000, '2014-08-16 11:07:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_celengan_emas`
--

CREATE TABLE IF NOT EXISTS `tgs_celengan_emas` (
  `id_celengan_emas` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_celengan` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `harga_pas_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_celengan_emas` datetime NOT NULL,
  `status_celengan_emas` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_celengan_emas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tgs_celengan_emas`
--

INSERT INTO `tgs_celengan_emas` (`id_celengan_emas`, `id_celengan`, `id_product`, `harga_pas_beli`, `qty`, `date_celengan_emas`, `status_celengan_emas`) VALUES
(5, 7, 13, 88000, 2, '2013-04-17 09:41:01', 1),
(7, 7, 10, 520000, 2, '2013-07-13 09:26:10', 1),
(8, 8, 10, 520000, 1, '2013-06-01 08:56:59', 1),
(9, 7, 9, 1003000, 2, '2013-09-28 09:07:05', 1),
(11, 7, 15, 580000, 1, '2013-12-21 09:47:57', 1),
(12, 13, 15, 571000, 1, '2014-03-27 06:53:21', 1),
(13, 14, 5, 2605000, 2, '2014-08-16 11:07:36', 1),
(14, 14, 9, 1097000, 2, '2014-08-16 11:07:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_cicilan`
--

CREATE TABLE IF NOT EXISTS `tgs_cicilan` (
  `id_cicilan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `harga_pas_beli` bigint(20) NOT NULL,
  `administrasi_pas_beli` int(11) NOT NULL,
  `biaya_titip` int(11) NOT NULL,
  `total_biaya` bigint(20) NOT NULL,
  `status_transfer` tinyint(2) NOT NULL,
  `total_denda` bigint(20) NOT NULL,
  `date_mulai_cicilan` datetime NOT NULL,
  PRIMARY KEY (`id_cicilan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tgs_cicilan`
--

INSERT INTO `tgs_cicilan` (`id_cicilan`, `id_user`, `id_product`, `id_order`, `jangka_waktu`, `harga_pas_beli`, `administrasi_pas_beli`, `biaya_titip`, `total_biaya`, `status_transfer`, `total_denda`, `date_mulai_cicilan`) VALUES
(3, 2, 10, 10, 3, 520000, 0, 7000, 627000, 2, 0, '2013-07-13 12:17:17'),
(4, 3, 10, 13, 10, 520000, 0, 6000, 626000, 1, 0, '2013-09-12 02:06:28'),
(5, 7, 10, 15, 12, 520000, 0, 6000, 626000, 1, 0, '2013-09-28 08:25:45'),
(6, 7, 10, 16, 12, 520000, 0, 6000, 626000, 1, 0, '2013-09-28 08:27:07'),
(8, 7, 11, 18, 12, 2500000, 0, 0, 2600000, 1, 0, '2013-09-28 08:47:24'),
(9, 9, 4, 23, 6, 5160000, 0, 60000, 5320000, 1, 0, '2013-10-24 12:09:13'),
(10, 9, 4, 24, 6, 5160000, 0, 60000, 5320000, 1, 0, '2013-10-24 12:10:35'),
(11, 9, 4, 30, 6, 5160000, 0, 120000, 10640000, 1, 0, '2013-11-03 06:13:14'),
(12, 9, 14, 31, 6, 10320000, 0, 120000, 10540000, 1, 0, '2013-11-03 06:14:36'),
(13, 10, 1, 40, 3, 50000000, 0, 600000, 50700000, 1, 0, '2013-11-05 05:32:08'),
(14, 10, 1, 42, 3, 50000000, 0, 600000, 50700000, 2, 0, '2013-11-05 05:39:13'),
(15, 14, 3, 62, 10, 12525000, 0, 150000, 12775000, 1, 0, '2014-03-27 01:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_cicilan_detail`
--

CREATE TABLE IF NOT EXISTS `tgs_cicilan_detail` (
  `id_cicilan_detail` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_cicilan` int(11) NOT NULL,
  `date_jatuh_tempo` date NOT NULL,
  `date_terbayar` date NOT NULL,
  `status_cicilan` tinyint(4) NOT NULL,
  `cannot_pay` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_cicilan_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `tgs_cicilan_detail`
--

INSERT INTO `tgs_cicilan_detail` (`id_cicilan_detail`, `id_cicilan`, `date_jatuh_tempo`, `date_terbayar`, `status_cicilan`, `cannot_pay`) VALUES
(25, 3, '2013-07-13', '0000-00-00', 1, 0),
(26, 3, '2013-08-13', '0000-00-00', 1, 0),
(27, 3, '2013-09-13', '0000-00-00', 1, 0),
(28, 4, '2013-09-12', '2013-09-19', 1, 0),
(29, 4, '2013-10-12', '0000-00-00', 1, 0),
(30, 4, '2013-11-12', '0000-00-00', 1, 0),
(31, 4, '2013-12-12', '0000-00-00', 1, 0),
(32, 4, '2014-01-12', '0000-00-00', 1, 0),
(33, 4, '2014-02-12', '0000-00-00', 1, 0),
(34, 4, '2014-03-12', '0000-00-00', 1, 0),
(35, 4, '2014-04-12', '0000-00-00', 1, 0),
(36, 4, '2014-05-12', '0000-00-00', 1, 0),
(37, 4, '2014-06-12', '0000-00-00', 1, 0),
(38, 5, '2013-09-28', '0000-00-00', 1, 0),
(39, 5, '2013-10-28', '0000-00-00', 1, 0),
(40, 5, '2013-11-28', '0000-00-00', 1, 0),
(41, 5, '2013-12-28', '0000-00-00', 1, 0),
(42, 5, '2014-01-28', '0000-00-00', 1, 0),
(43, 5, '2014-02-28', '0000-00-00', 1, 0),
(44, 5, '2014-03-28', '0000-00-00', 1, 0),
(45, 5, '2014-04-28', '0000-00-00', 1, 0),
(46, 5, '2014-05-28', '0000-00-00', 1, 0),
(47, 5, '2014-06-28', '0000-00-00', 1, 0),
(48, 5, '2014-07-28', '0000-00-00', 1, 0),
(49, 5, '2014-08-28', '0000-00-00', 1, 0),
(50, 6, '2013-09-28', '0000-00-00', 1, 0),
(51, 6, '2013-10-28', '0000-00-00', 1, 0),
(52, 6, '2013-11-28', '0000-00-00', 1, 0),
(53, 6, '2013-12-28', '0000-00-00', 1, 0),
(54, 6, '2014-01-28', '0000-00-00', 1, 0),
(55, 6, '2014-02-28', '0000-00-00', 1, 0),
(56, 6, '2014-03-28', '0000-00-00', 1, 0),
(57, 6, '2014-04-28', '0000-00-00', 1, 0),
(58, 6, '2014-05-28', '0000-00-00', 1, 0),
(59, 6, '2014-06-28', '0000-00-00', 1, 0),
(60, 6, '2014-07-28', '0000-00-00', 1, 0),
(61, 6, '2014-08-28', '0000-00-00', 1, 0),
(86, 8, '2013-09-28', '0000-00-00', 1, 0),
(87, 8, '2013-10-28', '0000-00-00', 1, 0),
(88, 8, '2013-11-28', '0000-00-00', 1, 0),
(89, 8, '2013-12-28', '0000-00-00', 1, 0),
(90, 8, '2014-01-28', '0000-00-00', 1, 0),
(91, 8, '2014-02-28', '0000-00-00', 1, 0),
(92, 8, '2014-03-28', '0000-00-00', 1, 0),
(93, 8, '2014-04-28', '0000-00-00', 1, 0),
(94, 8, '2014-05-28', '0000-00-00', 1, 0),
(95, 8, '2014-06-28', '0000-00-00', 1, 0),
(96, 8, '2014-07-28', '0000-00-00', 1, 0),
(97, 8, '2014-08-28', '0000-00-00', 1, 0),
(98, 9, '2013-10-24', '0000-00-00', 1, 0),
(99, 9, '2013-11-24', '0000-00-00', 1, 0),
(100, 9, '2013-12-24', '0000-00-00', 1, 0),
(101, 9, '2014-01-24', '0000-00-00', 1, 0),
(102, 9, '2014-02-24', '0000-00-00', 1, 0),
(103, 9, '2014-03-24', '0000-00-00', 1, 0),
(104, 10, '2013-10-24', '2013-12-21', 2, 0),
(105, 10, '2013-11-24', '0000-00-00', 1, 0),
(106, 10, '2013-12-24', '0000-00-00', 1, 0),
(107, 10, '2014-01-24', '0000-00-00', 1, 0),
(108, 10, '2014-02-24', '0000-00-00', 1, 0),
(109, 10, '2014-03-24', '0000-00-00', 1, 0),
(110, 11, '2013-11-03', '0000-00-00', 1, 0),
(111, 11, '2013-12-03', '0000-00-00', 1, 0),
(112, 11, '2014-01-03', '0000-00-00', 1, 0),
(113, 11, '2014-02-03', '0000-00-00', 1, 0),
(114, 11, '2014-03-03', '0000-00-00', 1, 0),
(115, 11, '2014-04-03', '0000-00-00', 1, 0),
(116, 12, '2013-11-03', '0000-00-00', 1, 0),
(117, 12, '2013-12-03', '0000-00-00', 1, 0),
(118, 12, '2014-01-03', '0000-00-00', 1, 0),
(119, 12, '2014-02-03', '0000-00-00', 1, 0),
(120, 12, '2014-03-03', '0000-00-00', 1, 0),
(121, 12, '2014-04-03', '0000-00-00', 1, 0),
(122, 13, '2013-11-05', '0000-00-00', 1, 0),
(123, 13, '2013-12-05', '0000-00-00', 1, 0),
(124, 13, '2014-01-05', '0000-00-00', 1, 0),
(125, 14, '2013-11-05', '2014-02-07', 2, 0),
(126, 14, '2013-12-05', '2014-02-07', 2, 0),
(127, 14, '2014-01-05', '2014-02-07', 2, 0),
(128, 15, '2014-03-27', '2014-03-27', 2, 0),
(129, 15, '2014-04-27', '2014-03-27', 2, 0),
(130, 15, '2014-05-27', '0000-00-00', 1, 0),
(131, 15, '2014-06-27', '0000-00-00', 1, 0),
(132, 15, '2014-07-27', '0000-00-00', 1, 0),
(133, 15, '2014-08-27', '0000-00-00', 1, 0),
(134, 15, '2014-09-27', '0000-00-00', 1, 0),
(135, 15, '2014-10-27', '0000-00-00', 1, 0),
(136, 15, '2014-11-27', '0000-00-00', 1, 0),
(137, 15, '2014-12-27', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_comment`
--

CREATE TABLE IF NOT EXISTS `tgs_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_news` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `name_comment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  `status_comment` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tgs_comment`
--

INSERT INTO `tgs_comment` (`id_comment`, `id_news`, `id_user`, `avatar`, `name_comment`, `email`, `comment`, `date_comment`, `status_comment`) VALUES
(1, 4, 0, '', 'Zuhdi Robbani', 'zuhdirobbani@gmail.com', 'Mantap gan sharenya. nice info nih', '2013-03-06 00:00:00', 2),
(5, 4, 0, '', 'Zuhdi Robbani', 'zuhdirobbani@gmail.com', '<p>Thanks gan infonya</p>', '2013-03-07 10:46:27', 2),
(6, 3, 0, '', 'Robbani', 'asdf@asd.asd', '<p>terima kasih atas penjelasannya</p>', '2013-03-07 11:02:04', 2),
(7, 4, 0, '', 'Robbani', 'asdf@asd.asd', '<p>nice share gan</p>', '2013-03-11 02:46:06', 2),
(8, 4, 0, '', 'Waitasd', 'asdasd@asd.asd', '<p>asdasdasdasd</p>', '2013-03-16 08:24:00', 3),
(9, 3, 0, '', '0jopyuoyoitu', 'fjfyf@adg.hh', '<p>yyjfjiugikj</p>', '2013-09-19 09:36:33', 3),
(10, 3, 0, '', 'Ahahahah', 'haris.tung@gmail.com', '<p>Wow bagus y</p>', '2013-09-28 07:47:21', 3),
(11, 4, 0, '', 'rahmi ', 'rahmi.khairwina@gmail.com', '<p>apakah gadai ini sudah sesuai syariah??</p>', '2013-09-29 11:37:40', 2),
(12, 5, 0, '', 'okanurlyza', 'ockanurlyza@hotmail.com', '<p>recomended</p>', '2013-10-24 12:32:33', 2),
(13, 6, 0, '', 'adith', 'aditia.hariadi@yahoo.com', '<p>bagus nih artikelnya</p>', '2013-12-21 10:21:20', 2),
(14, 3, 0, '', 'Morty', 'support@superbsocial.net', 'Hello, my name is Morty Goldman; I just stumbled upon your site - logammulia-dinar.com - I''m sorry to write in such an odd manner, I thought to call you but I didn''t want to take up your time. What I have to say may be of great interest to you. Did you know that an overwhelming majority of businesses, organizations and celebrities buy likes and followers? What, you thought your competitor''s likes and followers are organic and naturally gained? Ha ha. Just recently Gangman Style ( http://www.youtube.com/watch?v=9bZkp7q19f0 ) reached a record 2 billion views. Now imagine the scale of Gangnam Style''s popularity being applied to your business! This is exactly how I deliver results to my clients - and I assure you that you''ll be overwhelmingly pleased with the outcome. \n \nGive us a call: +1 (877) 410-4002 \nor visit us at http://www.SuperbSocial.net', '2014-06-30 09:41:01', 1),
(15, 2, 0, '', 'Morty', 'support@superbsocial.net', 'Hello, my name is Morty Goldman; I just stumbled upon your site - logammulia-dinar.com - I''m sorry to write in such an odd manner, I thought to call you but I didn''t want to take up your time. What I have to say may be of great interest to you. Did you know that an overwhelming majority of businesses, organizations and celebrities buy likes and followers? What, you thought your competitor''s likes and followers are organic and naturally gained? Ha ha. Just recently Gangman Style ( http://www.youtube.com/watch?v=9bZkp7q19f0 ) reached a record 2 billion views. Now imagine the scale of Gangnam Style''s popularity being applied to your business! This is exactly how I deliver results to my clients - and I assure you that you''ll be overwhelmingly pleased with the outcome. \n \nGive us a call: +1 (877) 410-4002 \nor visit us at http://www.SuperbSocial.net', '2014-07-01 05:58:33', 1),
(16, 2, 0, '', 'AlixInfit', 'AlixInfitN@blog-1.ru', '?????????? ???? ?????? ru http://mortalkombat.co.gp/ - ??????? ???? ?? ????? ????? ?????? ???? ?????? \n??????????, ??????????? ?????? ???? ???????? 5 ??? ????, — ? ???????. \n? ???? ??, ??????? ???? ?????? ????????? ? ???????? ?? ???????? ????????????? ??????? \n??????????????), ??? ? ???? ???????? ?????? ? ???? ?????? ???? ????? ?? ????????????… \n??? ????????. ?? ?????????? ???? ????? ???? ?????? ????????? 8 ??? ???????? ????????????? ?????. \n???????????, ?? ????? ?????? ???? ?????? ????? ???? ???? ?????? ? ??????????', '2014-07-22 10:36:41', 1),
(17, 2, 0, '', 'AlixInfit', 'AlixInfitN@blog-1.ru', '???? ?????? ???? http://mortalkombat.co.gp/ - ??????? ???????????? ?? ??????? ?????????? ???? ?????? ??? ??????? \n????????????, ??? ??????? ?????? ???? ?????? ????????? ??? ?????? ???????? \n?????? ??? ?????? -?????? ?????????? ?????? ???? ?? 2 ??????? ??????? ?????. ?? \n???????????? ? ????? ?????? ????????. ???? ?????? ????? ?????? ? ????????????? ??????, \n? ????????? ????????? ??????, ????? ???? ?????? ?????????? ?? ????? — ????? ????? ? ????????. \n?? ???????, ??? ?????? ??????? ???? ?????? ????????? ???????? ? ???????????? ?????????', '2014-08-13 02:05:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_data_transaksi`
--

CREATE TABLE IF NOT EXISTS `tgs_data_transaksi` (
  `id_data_transaksi` int(11) NOT NULL,
  `total_transaksi_member` int(11) NOT NULL,
  `total_transaksi_nonmember` int(11) NOT NULL,
  `total_transaksi_cicilan` int(11) NOT NULL,
  PRIMARY KEY (`id_data_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgs_data_transaksi`
--

INSERT INTO `tgs_data_transaksi` (`id_data_transaksi`, `total_transaksi_member`, `total_transaksi_nonmember`, `total_transaksi_cicilan`) VALUES
(1, 44, 21, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_gadai`
--

CREATE TABLE IF NOT EXISTS `tgs_gadai` (
  `id_gadai` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `no_id_emas` varchar(50) NOT NULL,
  `tanggal_sertifikat` date NOT NULL,
  `gram_gadai` int(11) NOT NULL,
  `nilai_taksiran` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL,
  `cicilan_lunas` int(11) NOT NULL,
  `status_gadai` tinyint(2) NOT NULL,
  `date_gadai` datetime NOT NULL,
  PRIMARY KEY (`id_gadai`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tgs_gadai`
--

INSERT INTO `tgs_gadai` (`id_gadai`, `id_user`, `no_id_emas`, `tanggal_sertifikat`, `gram_gadai`, `nilai_taksiran`, `jangka_waktu`, `pinjaman`, `cicilan_lunas`, `status_gadai`, `date_gadai`) VALUES
(3, 2, '1325', '2011-10-18', 2, 1050000, 5, 900000, 0, 1, '2013-06-01 12:54:02'),
(4, 5, '4y4y464', '2009-06-04', 5, 2429000, 10, 2100000, 0, 1, '2013-06-01 12:58:05'),
(5, 2, 'GF104', '2010-06-15', 1, 500000, 4, 300000, 200000, 1, '2013-06-01 07:52:08'),
(6, 2, 'asdasd', '2011-02-08', 1, 500000, 2, 450000, 0, 1, '2013-06-18 11:58:40'),
(7, 2, 'asdasd', '2011-02-08', 1, 500000, 2, 450000, 0, 1, '2013-06-18 11:58:40'),
(8, 2, 'kjabsfasjfb', '2012-06-07', 2, 1000000, 6, 800000, 0, 1, '2013-09-28 09:26:05'),
(9, 2, 'ojowjfwo', '2012-02-07', 1, 500000, 2, 400000, 0, 1, '2013-09-28 09:30:30'),
(10, 14, 'fwrewqrwer', '2014-03-29', 10, 100000000, 7, 100000000, 0, 1, '2014-03-27 07:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_harga_beli`
--

CREATE TABLE IF NOT EXISTS `tgs_harga_beli` (
  `id_harga_beli` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(300) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `date_harga_beli` datetime NOT NULL,
  PRIMARY KEY (`id_harga_beli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tgs_harga_beli`
--

INSERT INTO `tgs_harga_beli` (`id_harga_beli`, `name_product`, `harga_beli`, `date_harga_beli`) VALUES
(1, 'Logam Mulia', 508000, '2013-03-20 00:00:00'),
(2, 'Dinar', 2143000, '2013-03-20 00:00:00'),
(3, 'Dirham', 69093, '2013-03-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_jawab_konsultasi`
--

CREATE TABLE IF NOT EXISTS `tgs_jawab_konsultasi` (
  `id_jawab` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_konsultasi` bigint(20) NOT NULL,
  `id_backoffice` int(11) NOT NULL,
  `jawaban` longtext NOT NULL,
  `date_jawaban` datetime NOT NULL,
  `date_jawaban_edit` datetime NOT NULL,
  PRIMARY KEY (`id_jawab`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tgs_jawab_konsultasi`
--

INSERT INTO `tgs_jawab_konsultasi` (`id_jawab`, `id_konsultasi`, `id_backoffice`, `jawaban`, `date_jawaban`, `date_jawaban_edit`) VALUES
(1, 3, 1, 'mungkin sedang ada masalah dengan server kami, atau anda belom login terlebih dahulu. Terima Kasih :)', '2013-03-02 13:17:41', '2013-03-02 04:26:02'),
(5, 2, 1, 'Maaf, anda sedang nulis apa yah? Terima Kasih', '2013-03-02 04:26:56', '0000-00-00 00:00:00'),
(6, 4, 1, 'Silahkan Buka Menu Cara Transaksi, untuk lebih jelasnya :) Terima Kasih', '2013-03-02 04:30:19', '0000-00-00 00:00:00'),
(7, 5, 1, 'Gampang Caranya: Kerja.', '2013-03-02 04:35:23', '0000-00-00 00:00:00'),
(8, 1, 1, 'Kamu mau ngapain hayoo test-test', '2013-03-03 09:48:54', '0000-00-00 00:00:00'),
(9, 8, 2, 'ini dibalas', '2013-03-16 07:32:40', '0000-00-00 00:00:00'),
(10, 10, 1, 'saat ini baru di plaza semanggi', '2013-11-05 09:52:34', '2013-11-05 09:53:30'),
(11, 7, 1, 'dehjfaobhahfansfj', '2013-11-05 09:54:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_jual`
--

CREATE TABLE IF NOT EXISTS `tgs_jual` (
  `id_jual` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `shipping` tinyint(4) NOT NULL,
  `harga_pas_jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_jual` datetime NOT NULL,
  `date_diambil` date NOT NULL,
  `status_jual` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_jual`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tgs_jual`
--

INSERT INTO `tgs_jual` (`id_jual`, `id_user`, `id_product`, `shipping`, `harga_pas_jual`, `qty`, `date_jual`, `date_diambil`, `status_jual`) VALUES
(3, 2, 1, 2, 508000, 2, '2013-04-13 12:01:07', '0000-00-00', 1),
(4, 2, 1, 2, 508000, 10, '2013-04-13 07:09:27', '0000-00-00', 2),
(5, 2, 1, 2, 508000, 10, '2013-04-13 07:28:59', '0000-00-00', 1),
(6, 2, 1, 2, 508000, 1, '2013-04-15 04:59:59', '0000-00-00', 1),
(7, 2, 1, 2, 508000, 2, '2013-07-13 11:24:59', '0000-00-00', 1),
(8, 7, 1, 2, 508000, 1, '2013-09-28 09:35:30', '0000-00-00', 1),
(9, 9, 1, 2, 508000, 10, '2013-09-29 12:19:43', '0000-00-00', 1),
(10, 9, 1, 2, 508000, 5, '2013-10-24 12:26:34', '0000-00-00', 1),
(11, 9, 1, 2, 508000, 10, '2013-10-24 12:26:43', '0000-00-00', 2),
(12, 9, 1, 2, 508000, 2, '2013-12-08 12:43:26', '2013-12-21', 1),
(13, 9, 2, 1, 2143000, 2, '2013-12-08 12:44:00', '2013-12-21', 1),
(14, 2, 1, 0, 508000, 1, '2013-12-21 04:39:57', '0000-00-00', 2),
(15, 2, 1, 0, 508000, 1, '2013-12-21 07:29:05', '0000-00-00', 2),
(16, 2, 1, 0, 508000, 1, '2013-12-21 07:29:43', '0000-00-00', 3),
(17, 14, 1, 0, 508000, 10, '2014-03-27 01:03:41', '0000-00-00', 1),
(18, 14, 2, 0, 2143000, 2, '2014-03-27 01:06:31', '0000-00-00', 1),
(19, 14, 1, 0, 508000, 5, '2014-03-27 01:41:42', '0000-00-00', 1),
(20, 14, 1, 0, 508000, 5, '2014-03-27 01:42:09', '0000-00-00', 1),
(21, 16, 2, 0, 2143000, 1, '2014-08-16 11:24:27', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_konfirmasi`
--

CREATE TABLE IF NOT EXISTS `tgs_konfirmasi` (
  `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_bank` int(11) NOT NULL,
  `code_order` varchar(20) NOT NULL,
  `date_konfirmasi` datetime NOT NULL,
  PRIMARY KEY (`id_konfirmasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `tgs_konfirmasi`
--

INSERT INTO `tgs_konfirmasi` (`id_konfirmasi`, `id_bank`, `code_order`, `date_konfirmasi`) VALUES
(19, 1, 'TGSCREDIT13', '2013-03-16 07:26:57'),
(29, 1, 'TGSCREDIT4', '2013-07-13 09:28:57'),
(32, 1, 'TGSCREDIT4', '2013-08-29 10:10:02'),
(33, 1, 'TGSCREDIT5', '2013-09-28 07:28:42'),
(38, 1, 'TGSCASH12', '2013-10-24 12:08:27'),
(39, 1, 'TGSCREDIT12', '2013-10-24 12:15:09'),
(41, 1, 'TGSCASH16', '2013-11-03 06:09:46'),
(43, 1, 'TGSCASH40', '2013-12-21 08:24:40'),
(44, 1, 'TGSNM20', '2014-03-22 05:53:32'),
(45, 2, 'TGSNM21', '2014-03-22 05:57:00'),
(46, 1, 'TGSNM21', '2014-03-22 06:00:04'),
(47, 1, 'TGSCREDIT18', '2014-03-27 02:04:27'),
(48, 1, 'TGSCREDIT18', '2014-03-27 02:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_konsultasi`
--

CREATE TABLE IF NOT EXISTS `tgs_konsultasi` (
  `id_konsultasi` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `konsultasi` longtext NOT NULL,
  `date_konsultasi` datetime NOT NULL,
  `status_konsultasi` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_konsultasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tgs_konsultasi`
--

INSERT INTO `tgs_konsultasi` (`id_konsultasi`, `id_user`, `subject`, `konsultasi`, `date_konsultasi`, `status_konsultasi`) VALUES
(1, 2, 'test', 'test', '2013-02-28 10:29:42', 3),
(2, 3, 'asd', 'lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet ', '2013-02-28 10:50:57', 3),
(3, 2, 'Kenapa Saya nggak bisa Komentar?', 'Hayoo kenapa saya nggak bisa komentar yaa? hayoo kenapa hayoo?', '2013-03-02 03:02:51', 3),
(4, 3, 'Bagaimana Proses Membeli Emas?', 'Bagaimana yah cara dan proses membeli emas logam muliad dari toko online ini?', '2013-03-02 04:28:16', 3),
(5, 3, 'Tanya Lagi dong.', 'Mau tanya lagi nih, gimana yah caranya supaya saya bisa cepet Kaya?', '2013-03-02 04:32:54', 3),
(6, 3, 'Investasi', 'Bagaimana cara Investasi LM yg Baik?', '2013-03-03 10:55:27', 1),
(7, 2, 'asd', 'asdasd', '2013-03-16 07:05:08', 3),
(8, 2, 'ertanyaaangwi', 'kenapa asfiwafiwj', '2013-03-16 07:31:36', 3),
(9, 4, 'Tanya', 'Tanya aapa', '2013-04-13 08:24:20', 2),
(10, 9, 'OU', 'OUTLETNYA ADA DIMANA AJA?', '2013-10-24 12:20:12', 2),
(11, 2, 'Test', 'ini test', '2013-12-21 10:18:39', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_links`
--

CREATE TABLE IF NOT EXISTS `tgs_links` (
  `id_links` int(11) NOT NULL AUTO_INCREMENT,
  `title_links` varchar(140) NOT NULL,
  `links` varchar(500) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status_links` int(11) NOT NULL,
  PRIMARY KEY (`id_links`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tgs_links`
--

INSERT INTO `tgs_links` (`id_links`, `title_links`, `links`, `sort_order`, `status_links`) VALUES
(1, 'Kitco', 'http://www.kitco.com/', 0, 1),
(2, 'Gerai Dinar', 'http://geraidinar.com/', 1, 1),
(3, 'Bank BCA', 'http://www.klikbca.com', 2, 1),
(4, 'Bank Mandiri', 'http://www.bankmandiri.co.id', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_news`
--

CREATE TABLE IF NOT EXISTS `tgs_news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title_news` varchar(200) NOT NULL,
  `content_news` longtext NOT NULL,
  `image_news` varchar(400) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `status_news` tinyint(2) NOT NULL,
  `id_creator` int(11) NOT NULL,
  PRIMARY KEY (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tgs_news`
--

INSERT INTO `tgs_news` (`id_news`, `title_news`, `content_news`, `image_news`, `date_insert`, `date_update`, `status_news`, `id_creator`) VALUES
(2, 'Mengenal Rupiah: Ciri-ciri keaslian uang kertas', '<p align="justify">Sudahkah Anda tahu ciri-ciri Uang Rupiah yang asli? Perlu Anda ketahui bahwa Bank Indonesia senantiasa melakukan evaluasi dan peningkatan kualitas uang sehingga mudah dikenali ciri-ciri keasliannya dan aman dari upaya pemalsuan.</p>\n<p align="justify">&nbsp;</p>\n<p align="justify">Agar lebih mudah mengenali keaslian Uang Rupiah, maka pahami Panduan Ciri-Ciri Keaslian Uang Rupiah sehingga Anda dapat dengan mudah mengenali Uang Rupiah asli dari Unsur Pengaman yang terdapat pada Uang Rupiah tersebut.</p>\n<p align="justify">&nbsp;</p>\n<p align="justify">Uang Rupiah memiliki ciri-ciri berupa tanda-tanda tertentu yang bertujuan mengamankan uang Rupiah dari upaya pemalsuan. Secara umum, ciri-ciri keaslian uang Rupiah dapat dikenali dari unsur pengaman yang tertanam pada bahan uang dan teknik cetak yang digunakan, yaitu :</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Tanda Air (Watermark) dan Electrotype</strong></li>\n</ul>\n<p align="justify">Pada kertas uang terdapat tanda air berupa gambar yang akan terlihat apabila diterawangkan ke arah cahaya.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Benang Pengaman (Security Thread)</strong></li>\n</ul>\n<p align="justify">Ditanam di tengah ketebalan kertas atau terlihat seperti dianyam sehingga tampak sebagai garis melintang dari atas ke bawah, dapat dibuat tidak memendar maupun memendar di bawah sinar ultraviolet dengan satu warna atau beberapa warna.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Cetak Intaglio</strong></li>\n</ul>\n<p align="justify">Cetakan yang terasa kasar apabila diraba.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Gambar Saling Isi (Rectoverso)</strong>&nbsp;</li>\n</ul>\n<p align="justify">Pencetakan suatu ragam bentuk yang menghasilkan cetakan pada bagian muka dan belakang beradu tepat dan saling mengisi jika diterawangkan ke arah cahaya.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Tinta Berubah Warna (Optical Variable Ink)</strong></li>\n</ul>\n<p align="justify">Hasil cetak mengkilap (glittering) yang berubah-ubah warnanya bila dilihat dari sudut pandang yang berbeda.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Tulisan Mikro (Micro Text)&nbsp;</strong></li>\n</ul>\n<p align="justify">Tulisan berukuran sangat kecil yang hanya dapat dibaca dengan menggunakan kaca pembesar.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Tinta Tidak Tampak (Invisible Ink)</strong></li>\n</ul>\n<p align="justify">Hasil cetak tidak kasat mata yang akan memendar di bawah sinar ultraviolet.</p>\n<p align="justify"><strong><br /></strong></p>\n<ul>\n<li><strong>Gambar Tersembunyi (Latent Image)</strong></li>\n</ul>\n<p align="justify">Teknik cetak dimana terdapat tulisan tersembunyi yang dapat dilihat dari sudut pandang tertentu.</p>', '', '2012-12-07 11:29:11', '2013-12-13 10:13:11', 2, 1),
(3, 'Tips transaksi dengan Tamargoldshop menggunakan EDC Bank BCA', '<p>Tahukah anda? bahwa saat ini untuk bertransaksi di dunia maya banyak sekali terdapat kelicikan kecurangan dan banyak penipuan?</p>\r\n<p>Oleh karena itu kami sangat paham dengan kondisi anda. Berikut-berikut ini adalah tips-tips transaksi yang aman dengan Tamargoldshop menggunakan EDC BCA</p>\r\n<ul>\r\n<li>Periksa nilai transaksi</li>\r\n<li>Selalu ikuti keberadaan kartu</li>\r\n<li>Tutup dengan tangan saat input PIN</li>\r\n<li>Mintalah kartu Paspor BCA Anda kembali</li>\r\n<li>Jangan beritahukan PIN kepada orang lain termasuk petugas bank atau keluarga&nbsp;</li>\r\n<li>Jika Anda mengalami kesulitan di EDC, hubungi segera&nbsp;<strong>Halo BCA</strong>&nbsp;pada nomor&nbsp;<strong>(021) 500888</strong>&nbsp;via ponsel</li>\r\n</ul>', '', '2012-12-07 11:35:02', '2013-02-16 04:44:33', 2, 1),
(4, 'Tips Berkebun Emas', '<p>Beberapa tips dalam berkebun emas:</p>\r\n<ul>\r\n<li>Beli pada saat harga emas rendah, jual pada saat harga emas tinggi. Jika terpaksa menebus dan menjual emas pada saat harga turun, investor bukan saja bisa kehilangan potensi keuntungan, tapi juga berpotensi mengalami kerugian dari biaya gadai yang sudah dibayarkan.</li>\r\n<li>Agar bisa mendapatkan keuntungan maksimal dari teknik berkebun emas, gadaikan emas anda di tempat gadai yang menawarkan nilai gadai paling tinggi dengan biaya paling rendah.</li>\r\n<li>Gadaikan emas dalam waktu sesingkat mungkin jika anda bermaksud mendapatkan keuntungan jangka pendek dari teknik berkebun emas ini.</li>\r\n</ul>', '', '2013-02-04 10:01:26', '2013-02-04 11:56:38', 2, 5),
(5, 'Operasional outlet plasa semanggi', '<p>Kami membuka layanan transaksi emas antara lain: Jual-Beli, Program Cicilan, Program Gadai Syariah, Program SIMPAN, konsultasi Emas. Jam operasional outlet Plaza Semanggi yaitu dari jam 11.00 &ndash; 19.30 setiap hari. Plaza Semanggi sebagai tempat yang strategis dan kemudahan jalur transportasi, membuat anda lebih dekat untuk bertransaksi emas dengan Tamar Goldshop.</p>\n<p>&nbsp;</p>\n<p>Tersedia emas batangan Logam Mulia Antam mulai dari pecahan 1 gram, 2 gram, 2.5 gram, 3 gram, 4 gram, 5 gram, 10 gram, 25 gram, 50 gram dan 100 gram. Tersedia pula Dinar dan Dirham Antam. Emas fisik untuk investasi merupakan perencanaan keuangan yang baik dan aman.</p>\n<p>&nbsp;</p>\n<p>Nikmati layanan terbaik dan kenyamanan bertransaksi emas dengan Tamar Goldshop!</p>\n<p>&nbsp;</p>\n<p><img title="outlet plasa semanggi" src="http://tamargoldshop.files.wordpress.com/2011/05/outlet-plaza-semanggi.jpg" alt="tamargoldshop plasa semanggi logam mulia dan dinar" width="300" height="225" /></p>', '', '2013-10-05 03:58:28', '2013-10-05 04:47:04', 2, 1),
(6, 'Beli Emas dengan Program Cicilan', '<p>Tamargoldshop hadir dengan memberikan fasilitas kepada Anda untuk berinvestasi logam mulia dan dinar secara cicilan. Maka cara ini akan sangat membantu, karena tidak merasa berat dan tidak mengganggu cashflow rumah tangga anda, serta investasi tetap berkembang seiring berjalannya waktu.</p>\n<p>&nbsp;</p>\n<p>Ini merupakan solusi alternatif jika kita memiliki dana yang terbatas untuk investasi emas batangan logam mulia.</p>\n<p>&nbsp;</p>\n<p>Program Cicil Emas Tamargoldshop adalah penjualan logam Mulia dan dinar oleh Tamargoldshop kepada masyarakat secara cicilan dengan jangka waktu Fleksibel hingga 36 bulan. Pecahan LM yang dapat dicicil yaitu 1-100 gram.</p>\n<p>&nbsp;</p>\n<p>Dengan prinsip syariah, perjanjian dilakukan dengan Akad Murabahah Logam Mulia atau Dinar, yaitu persetujuan atau kesepakatan yang dibuat bersama antara Tamargoldshop dan Nasabah atas sejumlah pembelian secara cicil Logam Mulia atau Dinar disertai keuntungan dan biaya-biaya yang disepakati. Apabila gagal bayar, cicilan pokok kami kembalikan sebagai hak Anda.</p>\n<p>&nbsp;</p>\n<p>Harga jual mengikat pada saat akad dilakukan, dan cicilan tetap. Biaya titip sebesar Rp 6.000 per gram tiap bulannya.</p>\n<p>&nbsp;</p>\n<p>Contoh:</p>\n<p>Pada tanggal 13 Desember 2013, anda akan memulai cicilan LM 10 gram selama 10 bulan. Harga jual hari itu 5.005.000. Untuk cicilan pokok yang harus dibayar tiap bulan yaitu 5.005.000 : 10 = Rp 500.500. Dan biaya titip tiap bulan 10 gram x Rp 6.000 = Rp 60.000. Jadi&nbsp;Anda tiap bulan membayar cicilan sebesar Rp 560.500.</p>\n<p>&nbsp;</p>\n<p><span>Untuk informasi lebih lanjut anda dapat menghubungi kami melalui telepon, bbm atau email, lihat halaman CONTACT US.</span></p>', '', '2013-12-13 09:52:27', '2013-12-13 10:14:22', 2, 1),
(7, 'Mengapa emas dipilih sebagai alat investasi?', '<p>Untuk konsistensi pertumbuhan jangka panjang, para pakar investasi seringkali menganjurkan para investor untuk mendiversifikasikan investasi mereka dengan emas. Emas merupakan sarana lindung nilai klasik untuk melawan inflasi, menambah nilai dalam kondisi ketidakstabilan fluktuasi nilai mata uang.</p>\n<p>&nbsp;</p>\n<p>Emas dikenal luas sebagai pilihan investasi paling aman, terlebih saat kondisi ekonomi sedang labil atau sulit diprediksi.</p>\n<p>&nbsp;</p>\n<p>Investasi emas yang baik adalah investasi emas dalam bentuk emas batangan (gold bar) karena mudah dijual kembali. Selain itu, emas batangan biaya produksinya tidak seperti emas perhiasan.</p>\n<p>&nbsp;</p>\n<p>Disebut emas batangan karena emas ini berbentuk seperti batangan pipih dengan kadar emas murni 99,99%.</p>\n<p>&nbsp;</p>\n<p>Keuntungan memiliki emas murni batangan diantaranya adalah karena harga jual yang sama dengan harga pasar, serta dilindungi dengan sertifikat sebagai salah satu cara untuk mencegah pemalsuan serta untuk memudahkan penjualan kembali.</p>\n<p>&nbsp;</p>\n<p>Ketika anda membeli emas logam mulia, anda telah menginvestasikan sejumlah dana yang nilainya akan terus menguat dari waktu ke waktu. Ketika investasi di bursa efek dirundung ketidakpastian akibat nilai saham yang kadang melambung atau sesekali jatuh terkapar, emas tetap kokoh sebagai sarana investasi yang solid, karena nilai emas tidak tergantung kepada sukses tidaknya suatu perusahaan atau industri.</p>\n<p>&nbsp;</p>\n<p>Emas adalah asset yang menentukan nilainya sendiri, berwujud nyata, mudah dibawa, dapat dicairkan kapan dan dimana saja.</p>', '', '2014-02-07 03:40:02', '2014-02-07 03:40:44', 2, 1),
(8, 'Mengenal emas logam mulia', '<p>Perlu Anda ketahui bahwa logam mulia merupakan salah satu instrumen investasi tertua sepanjang sejarah umat manusia. Sejak zaman dahulu, logam mulia telah menjadi alat untuk menyimpan kekayaan yang teruji dalam kurun waktu yang panjang. Apa pun masalah yang dialami suatu bangsa / negara, logam mulia : emas tetap menunjukkan keperkasaannya.</p>\n<p>&nbsp;</p>\n<p>Ada anggapan bahwa bila investor sudah memiliki saham, obligasi, reksa dana dan properti maka ia telah terdiversifikasi, akan tetapi apabila logam mulia : emas dan perak, dll belum masuk dalam portofolio investasi mereka, maka mereka sesungguhnya belum benar-benar terdiversifikasi. Seorang Investor yang sukses adalah investor yang memilih secara tepat instrumen investasi unggulan, dan membeli dengan harga murah dan meraih keuntungan manakala harganya naik secara signifikan. Biarpun logam mulia belum terjangkau radar investasi pada investor kebanyakan, sesungguhnya logam mulia mempunyai potensi imbah hasil yang cukup baik di masa depan. Memang logam mulia bersifat defensif yaitu untuk melindungi Anda dari perekonomian yang memburuk. Tapi logam mulia juga bisa ofensif untuk mencari keuntungan tinggi melalui spekulasi. Memang lebih disarankan, investor menggunakan logam mulia untuk yang lebih bersifat defensif atau lindung nilai dibandingkan dengan yang infensif.</p>\n<p>&nbsp;</p>\n<p>Belakangan ini, popularitas logam mulia kembali menanjak ditandai dengan naiknya harga logam mulia yang tinggi, dimana mata uang dollar dalam keadaan turun. Sebagian dari mata uang tersebut bahkan mencapai titik terendah sepanjang sejarahnya. Terlebih lagi, pemburukan ekonomi yang terjadi di sejumlah negara di dunia membuat performa logam mulia seperti emas menjadi makin menggila harganya.</p>\n<p>&nbsp;</p>\n<p>Maka dari itu, dikala keadaan ekonomi memburuk, tidak menentu, alangkah baiknya Anda mendiversifikasi investasi Anda ke dalam logam mulia, terutama emas batangan.</p>', '', '2014-02-07 03:43:21', '0000-00-00 00:00:00', 2, 1),
(9, 'Diversifikasi aset', '<p>Jangan taruh semua telur dalam satu keranjang. Kebanyakan financial planner memberikan nasihat investasi agar investor mendiversifikasikan asetnya di deposito, saham,reksadana,obligasiuntuk sharing resiko? Apa iya?? Yuk kita bahas sedikit.</p>\n<p>Kalau taruhnya di deposito, saham, reksadana, obligasi, itu namanya msh dalam satu keranjang. Yap! Aset kertas semua! Jika ekonomi memburuk, apa yang akan terjadi? Semua aset kertas yang anda miliki ikut memburuk. Trus sama aja bodong dong?</p>\n<p>Substansi tidak mengubah bentuk. Nama bisa beda tetapi intinya sama. Saham, obligasi, reksadana, deposito semuanya set kertas. Diversifikasi dapat dibedakan menjadi aset riil dan tidak riil. Aset riil itu property, bisnis dan komoditas (emas/perak). Aset tidak riil itu ya semacam aset kertas yang dijelaskan di atas. Anda tidak punya kuasa atas aset kertas yang anda miliki. Even punya beberapa lembar/unit saham, anda tidak bisa mengatur perusahaan tsb. Tidak ada kendali anda di sana. Tetapi jika anda memiliki aset riil seperti bisnis, property, komoditas (emas/perak), kendali sepenuhnya ada di tangan anda. Suka-suka anda mau diapakan.</p>\n<p>Maka lebih baik simpan di aset kertas boleh, sisanya bisa ke aset property, komoditas (emas/perak), atau bisnis.</p>', '', '2014-02-07 03:56:53', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_order`
--

CREATE TABLE IF NOT EXISTS `tgs_order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `harga_pas_beli` bigint(20) NOT NULL,
  `date_order` datetime NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `cicilan` tinyint(2) NOT NULL,
  `shipping` tinyint(2) NOT NULL,
  `status_order` tinyint(2) NOT NULL,
  `code_order` varchar(20) NOT NULL,
  `tanggal_dikirim` date NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `tgs_order`
--

INSERT INTO `tgs_order` (`id_order`, `id_user`, `id_product`, `harga_pas_beli`, `date_order`, `qty`, `total_price`, `cicilan`, `shipping`, `status_order`, `code_order`, `tanggal_dikirim`) VALUES
(1, 2, 10, 520000, '2013-06-01 03:01:43', 2, 1040000, 1, 1, 3, 'TGSCASH1', '0000-00-00'),
(2, 2, 9, 1003000, '2013-06-01 03:10:47', 1, 1003000, 1, 2, 3, 'TGSCASH2', '0000-00-00'),
(3, 2, 10, 520000, '2013-06-01 08:07:34', 1, 520000, 1, 1, 2, 'TGSCASH3', '0000-00-00'),
(4, 2, 10, 520000, '2013-06-01 08:37:12', 1, 520000, 1, 1, 1, 'TGSCASH4', '0000-00-00'),
(5, 2, 10, 520000, '2013-06-01 08:47:40', 1, 520000, 1, 1, 4, 'TGSCASH5', '0000-00-00'),
(6, 2, 10, 520000, '2013-07-12 12:49:02', 1, 520000, 1, 1, 1, 'TGSCASH6', '0000-00-00'),
(7, 2, 5, 2770000, '2013-07-12 12:49:28', 1, 2770000, 2, 1, 1, 'TGSCREDIT1', '0000-00-00'),
(8, 2, 5, 2770000, '2013-07-12 12:58:05', 1, 2770000, 2, 2, 1, 'TGSCREDIT2', '0000-00-00'),
(9, 2, 5, 2770000, '2013-07-12 12:59:58', 1, 2770000, 2, 2, 1, 'TGSCREDIT3', '0000-00-00'),
(10, 2, 10, 520000, '2013-07-13 12:17:17', 1, 520000, 2, 1, 1, 'TGSCREDIT4', '0000-00-00'),
(11, 2, 10, 520000, '2013-07-13 02:38:01', 1, 520000, 1, 2, 1, 'TGSCASH7', '0000-00-00'),
(12, 2, 10, 520000, '2013-08-29 09:32:18', 1, 520000, 1, 2, 1, 'TGSCASH8', '0000-00-00'),
(13, 3, 10, 520000, '2013-09-12 02:06:28', 1, 520000, 2, 1, 1, 'TGSCREDIT5', '0000-00-00'),
(14, 7, 9, 1003000, '2013-09-28 08:03:49', 1, 1003000, 1, 2, 1, 'TGSCASH9', '0000-00-00'),
(15, 7, 10, 520000, '2013-09-28 08:25:45', 1, 520000, 2, 1, 1, 'TGSCREDIT6', '0000-00-00'),
(16, 7, 10, 520000, '2013-09-28 08:27:07', 1, 520000, 2, 1, 1, 'TGSCREDIT7', '0000-00-00'),
(17, 7, 4, 5030000, '2013-09-28 08:30:28', 3, 15090000, 2, 1, 1, 'TGSCREDIT8', '0000-00-00'),
(18, 7, 11, 2500000, '2013-09-28 08:47:24', 1, 2500000, 2, 1, 1, 'TGSCREDIT9', '0000-00-00'),
(19, 9, 4, 5160000, '2013-10-24 11:57:47', 1, 5160000, 2, 1, 1, 'TGSCREDIT10', '0000-00-00'),
(20, 9, 4, 5160000, '2013-10-24 12:02:27', 1, 5160000, 1, 2, 1, 'TGSCASH10', '0000-00-00'),
(21, 9, 4, 5160000, '2013-10-24 12:04:39', 1, 5160000, 1, 2, 1, 'TGSCASH11', '0000-00-00'),
(22, 9, 4, 5160000, '2013-10-24 12:06:32', 1, 5160000, 1, 2, 1, 'TGSCASH12', '0000-00-00'),
(23, 9, 4, 5160000, '2013-10-24 12:09:13', 1, 5160000, 2, 1, 1, 'TGSCREDIT11', '0000-00-00'),
(24, 9, 4, 5160000, '2013-10-24 12:10:35', 1, 5160000, 2, 1, 1, 'TGSCREDIT12', '0000-00-00'),
(25, 9, 5, 2640000, '2013-11-03 05:54:52', 2, 5280000, 1, 2, 1, 'TGSCASH13', '0000-00-00'),
(26, 9, 5, 2640000, '2013-11-03 05:58:01', 2, 5280000, 1, 2, 1, 'TGSCASH14', '0000-00-00'),
(27, 9, 5, 2640000, '2013-11-03 05:59:41', 2, 5280000, 1, 2, 1, 'TGSCASH15', '0000-00-00'),
(28, 9, 5, 2640000, '2013-11-03 06:02:03', 3, 7920000, 1, 2, 1, 'TGSCASH16', '0000-00-00'),
(29, 9, 4, 5160000, '2013-11-03 06:12:15', 2, 10320000, 1, 1, 1, 'TGSCASH17', '0000-00-00'),
(30, 9, 4, 5160000, '2013-11-03 06:13:14', 2, 10320000, 2, 2, 1, 'TGSCREDIT13', '0000-00-00'),
(31, 9, 14, 10320000, '2013-11-03 06:14:36', 1, 10320000, 2, 1, 1, 'TGSCREDIT14', '0000-00-00'),
(32, 10, 1, 50000000, '2013-11-05 05:06:27', 1, 50000000, 1, 1, 1, 'TGSCASH18', '0000-00-00'),
(33, 10, 1, 50000000, '2013-11-05 05:07:18', 1, 50000000, 1, 1, 1, 'TGSCASH19', '0000-00-00'),
(34, 10, 1, 50000000, '2013-11-05 05:10:35', 1, 50000000, 1, 1, 1, 'TGSCASH20', '0000-00-00'),
(35, 10, 1, 50000000, '2013-11-05 05:12:03', 1, 50000000, 1, 1, 1, 'TGSCASH21', '0000-00-00'),
(36, 10, 1, 50000000, '2013-11-05 05:12:22', 1, 50000000, 1, 1, 1, 'TGSCASH22', '0000-00-00'),
(37, 10, 1, 50000000, '2013-11-05 05:19:33', 1, 50000000, 1, 1, 1, 'TGSCASH23', '0000-00-00'),
(38, 10, 1, 50000000, '2013-11-05 05:25:03', 1, 50000000, 1, 1, 1, 'TGSCASH24', '0000-00-00'),
(39, 10, 1, 50000000, '2013-11-05 05:25:31', 0, 0, 1, 1, 1, 'TGSCASH25', '0000-00-00'),
(40, 10, 1, 50000000, '2013-11-05 05:32:08', 1, 50000000, 2, 1, 1, 'TGSCREDIT15', '0000-00-00'),
(41, 10, 1, 50000000, '2013-11-05 05:33:36', 1, 50000000, 2, 1, 1, 'TGSCREDIT16', '0000-00-00'),
(42, 10, 1, 50000000, '2013-11-05 05:39:13', 1, 50000000, 2, 1, 1, 'TGSCREDIT17', '0000-00-00'),
(43, 10, 1, 50000000, '2013-11-05 06:03:46', 1, 50000000, 1, 1, 1, 'TGSCASH26', '0000-00-00'),
(49, 10, 1, 50000000, '2013-11-05 09:22:18', 1, 50000000, 1, 2, 1, 'TGSCASH32', '0000-00-00'),
(50, 10, 1, 50000000, '2013-11-05 09:27:02', 1, 50000000, 1, 2, 2, 'TGSCASH33', '0000-00-00'),
(51, 10, 1, 50000000, '2013-11-05 09:27:24', 1, 50000000, 1, 2, 2, 'TGSCASH34', '0000-00-00'),
(52, 10, 1, 50000000, '2013-11-05 09:31:29', 1, 50000000, 1, 2, 4, 'TGSCASH35', '0000-00-00'),
(53, 10, 1, 50000000, '2013-11-05 09:37:15', 1, 50000000, 1, 2, 5, 'TGSCASH36', '0000-00-00'),
(54, 10, 1, 50000000, '2013-11-05 09:45:10', 1, 50000000, 1, 2, 4, 'TGSCASH37', '0000-00-00'),
(55, 10, 1, 50000000, '2013-11-05 10:01:22', 1, 50000000, 1, 2, 4, 'TGSCASH38', '0000-00-00'),
(56, 2, 15, 580000, '2013-12-21 08:11:49', 1, 580000, 1, 1, 4, 'TGSCASH39', '0000-00-00'),
(57, 2, 15, 580000, '2013-12-21 08:19:33', 1, 580000, 1, 1, 4, 'TGSCASH40', '0000-00-00'),
(58, 12, 11, 2025994, '2014-03-13 12:41:48', 10, 20259940, 1, 2, 1, 'TGSCASH41', '0000-00-00'),
(59, 14, 3, 12575000, '2014-03-22 05:09:11', 1, 12575000, 1, 2, 1, 'TGSCASH42', '0000-00-00'),
(60, 14, 1, 49500000, '2014-03-27 01:30:58', 1, 49500000, 1, 1, 2, 'TGSCASH43', '0000-00-00'),
(61, 14, 15, 571000, '2014-03-27 01:46:15', 1, 571000, 1, 1, 2, 'TGSCASH44', '0000-00-00'),
(62, 14, 3, 12525000, '2014-03-27 01:48:13', 1, 12525000, 2, 1, 1, 'TGSCREDIT18', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_order_nonmember`
--

CREATE TABLE IF NOT EXISTS `tgs_order_nonmember` (
  `id_order_nonmember` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` longtext NOT NULL,
  `harga_pas_beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `account_number` int(11) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `shipping` tinyint(2) NOT NULL,
  `tanggal_dikirim` datetime NOT NULL,
  `date_order` datetime NOT NULL,
  `status_order` tinyint(4) NOT NULL,
  `code_order` varchar(10) NOT NULL,
  PRIMARY KEY (`id_order_nonmember`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tgs_order_nonmember`
--

INSERT INTO `tgs_order_nonmember` (`id_order_nonmember`, `id_product`, `name`, `email`, `phone_number`, `address`, `harga_pas_beli`, `qty`, `total_price`, `account_number`, `atas_nama`, `shipping`, `tanggal_dikirim`, `date_order`, `status_order`, `code_order`) VALUES
(7, 10, 'lamdlamsdl', 'asd@asd.asd', '24242', 'lamdlsadmal', 520000, 1, '520000', 232424, 'a;mf;af', 1, '0000-00-00 00:00:00', '2013-09-06 12:58:54', 3, 'TGSNM1'),
(12, 10, 'adit', 'adit@yahoo.com', '0813144406756', 'Ajygcjhgchgf', 520000, 1, '520000', 2147483647, 'adit', 2, '0000-00-00 00:00:00', '2013-09-29 03:19:01', 1, 'TGSNM6'),
(13, 10, 'adit', 'adit@yahoo.com', '0813144406756', 'Ajygcjhgchgf', 520000, 1, '520000', 2147483647, 'adit', 2, '0000-00-00 00:00:00', '2013-09-29 03:19:24', 1, 'TGSNM7'),
(14, 10, 'adit', 'adit@yahoo.com', '0813144406756', 'Ajygcjhgchgf', 520000, 1, '520000', 2147483647, 'adit', 2, '0000-00-00 00:00:00', '2013-09-29 03:19:42', 1, 'TGSNM8'),
(15, 10, 'adit', 'adit@yahoo.com', '0813144406756', 'Ajygcjhgchgf', 520000, 1, '520000', 2147483647, 'adit', 2, '0000-00-00 00:00:00', '2013-09-29 03:20:02', 1, 'TGSNM9'),
(16, 10, 'adit', 'adit@yahoo.com', '0813144406756', 'Ajygcjhgchgf', 520000, 1, '520000', 2147483647, 'adit', 2, '0000-00-00 00:00:00', '2013-09-29 03:20:16', 4, 'TGSNM10'),
(17, 14, 'Aditia Hariadi', 'aditia.tamar@yahoo.com', '081314440552', 'Jl. Sadewa VI No. 4', 10150000, 1, '10150000', 2147483647, 'Aditia Hariadi Tamar', 2, '0000-00-00 00:00:00', '2013-10-05 04:33:30', 4, 'TGSNM11'),
(18, 14, 'Khairil Anshari', 'iril@yahoo.com', '08132312414123', 'Jl. Sudirman', 10320000, 1, '10320000', 2147483647, 'Khairil ', 2, '0000-00-00 00:00:00', '2013-10-05 06:11:34', 4, 'TGSNM12'),
(19, 14, 'OKA NURLYZA', 'OKANIRHLUZA@YAHOO.COM', '0875258877', 'JL.MURIA', 10320000, 1, '10320000', 2147483647, 'OKA', 1, '0000-00-00 00:00:00', '2013-10-23 06:42:23', 1, 'TGSNM13'),
(20, 14, 'OKA NURLYZA', 'OKANIRHLUZA@YAHOO.COM', '0875258877', 'JL.MURIA', 10320000, 1, '10320000', 2147483647, 'OKA', 2, '0000-00-00 00:00:00', '2013-10-23 06:43:14', 1, 'TGSNM14'),
(24, 5, 'aditia hariadi', 'aditia.tamar@yahoo.com', '081314440552', 'Jl. Sudirman No. 8 Jakarta', 2585000, 1, '2585000', 2147483647, 'aditia hariadi tamar', 2, '0000-00-00 00:00:00', '2014-03-22 04:52:36', 2, 'TGSNM18'),
(25, 4, 'aditia hariadi', 'aditia.tamar@yahoo.com', '081314440552', 'Jl. Sudirman', 5130000, 1, '5130000', 2147483647, 'aditia hariadi tamar', 2, '0000-00-00 00:00:00', '2014-03-22 04:58:18', 4, 'TGSNM19'),
(26, 6, 'ardie', 'aditia.tamar@yahoo.com', '081314440552', 'Jl. Gatot Subroto', 2104000, 1, '2104000', 2147483647, 'ardie', 2, '0000-00-00 00:00:00', '2014-03-22 05:50:12', 2, 'TGSNM20'),
(27, 7, 'ardie', 'aditia.tamar@yahoo.com', '081314440552', 'Jl. dfa', 1602000, 1, '1602000', 2147483647, 'ardie', 1, '0000-00-00 00:00:00', '2014-03-22 05:55:21', 1, 'TGSNM21');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_product`
--

CREATE TABLE IF NOT EXISTS `tgs_product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name_product` varchar(100) NOT NULL,
  `image_product` varchar(200) NOT NULL,
  `description_product` longtext NOT NULL,
  `stock` int(11) NOT NULL,
  `base_price` int(11) NOT NULL,
  `margin` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `date_insert` datetime NOT NULL,
  `date_update` datetime NOT NULL,
  `date_update_margin` datetime NOT NULL,
  `sort_order` int(11) NOT NULL,
  `gram` float NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tgs_product`
--

INSERT INTO `tgs_product` (`id_product`, `name_product`, `image_product`, `description_product`, `stock`, `base_price`, `margin`, `sell_price`, `date_insert`, `date_update`, `date_update_margin`, `sort_order`, `gram`) VALUES
(1, 'Logam Mulia 100gr', '', '<p>Logam Mulia 100 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 3,73 mm</p>\n<p>Dimensi 50 x 30 mm</p>', 10, 49250000, 250000, 49500000, '2013-01-31 14:31:09', '2014-08-19 10:05:41', '2014-08-18 09:12:35', 1, 100),
(2, 'Logam Mulia 50gr', '', '<p>Logam Mulia 50 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 2,53 mm</p>\n<p>Dimensi 42,5 x 25,5 mm</p>', 10, 24650000, 100000, 24750000, '2013-01-31 04:14:40', '2014-08-19 10:05:49', '2014-08-18 09:02:29', 2, 50),
(3, 'Logam Mulia 25gr', '', '<p>Logam Mulia 25 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 2,07 mm</p>\n<p>Dimensi 33,3 x 20 mm</p>', 10, 12350000, 50000, 12400000, '2013-01-31 04:15:51', '2014-08-19 10:06:01', '2014-08-18 09:11:34', 3, 25),
(4, 'Logam Mulia 10gr', '', '<p>Logam Mulia 10 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 1,22 mm</p>\n<p>Dimensi 27,5 x 16,5 mm</p>', 10, 4970000, 90000, 5060000, '2013-01-31 04:16:28', '2014-08-19 10:06:16', '2014-08-18 09:02:04', 4, 10),
(5, 'Logam Mulia 5gr', '', '<p>Logam Mulia 5 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 1,09 mm</p>\n<p>Dimensi 20,5 x 12,3 mm</p>', 10, 2510000, 80000, 2590000, '2013-01-31 04:16:51', '2014-08-19 10:06:32', '2014-08-18 09:01:52', 5, 5),
(6, 'Logam Mulia 4gr', '', '<p>Logam Mulia 4 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 0,83 mm</p>\n<p>Dimensi 20,5 x 12,3 mm</p>', 10, 2008000, 70000, 2078000, '2013-01-31 04:17:29', '2014-08-19 10:06:40', '2014-08-18 09:01:46', 6, 4),
(7, 'Logam Mulia 3gr', '', '<p>Logam Mulia 3 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 1,03 mm</p>\n<p>Dimensi 16,7 x 10 mm</p>', 10, 1515000, 70000, 1585000, '2013-01-31 04:17:48', '2014-08-19 10:06:50', '2014-08-18 09:01:30', 7, 3),
(8, 'Logam Mulia 2,5gr', '', '<p>Logam Mulia 2,5 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 0,83 mm</p>\n<p>Dimensi 16,7 x 10 mm</p>', 10, 1267500, 70000, 1337500, '2013-01-31 04:18:33', '2014-08-19 10:07:04', '2014-08-18 09:01:23', 8, 2.5),
(9, 'Logam Mulia 2gr', '', '<p>Logam Mulia 2 gram produksi Antam</p>\n<p>Kadar Emas 99,99% atau 24 karat</p>\n<p>Panjang 0,75 mm</p>\n<p>Dimensi 15,6 x 9,4 mm</p>', 10, 1022000, 70000, 1092000, '2013-01-31 04:18:56', '2014-08-19 10:07:13', '2014-08-18 09:01:03', 9, 2),
(11, 'Dinar', '', '<p>Koin produksi Antam dengan kadar Emas 91,7% dan Perak 8,3% dengan berat 4,25 gram.&nbsp;</p>', 10, 1914791, 30000, 1944791, '2013-01-31 04:20:50', '2014-08-20 09:15:58', '2014-07-19 08:06:57', 11, 4.25),
(13, 'Dirham', '', '<p>Koin Perak Murni. Kadar 99,95% dengan berat 2,975 gram</p>', 100, 91000, 1000, 92000, '2013-01-31 05:08:20', '2014-01-23 03:14:11', '2013-11-07 10:17:38', 12, 0),
(15, 'Logam Mulia 1gr', '', '<p>Logam Mulia 1gr</p>', 100, 531000, 40000, 571000, '2013-12-21 08:08:49', '2014-08-19 10:07:21', '2014-07-19 08:10:01', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_rekening_bank`
--

CREATE TABLE IF NOT EXISTS `tgs_rekening_bank` (
  `id_rekening_bank` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_rekening` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rekening_bank`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tgs_rekening_bank`
--

INSERT INTO `tgs_rekening_bank` (`id_rekening_bank`, `nama_bank`, `nomor_rekening`, `atas_nama`) VALUES
(1, 'BCA', '5270735322', 'Ardie Arief Tamar'),
(2, 'Bank Mandiri', '0700004811456', 'Ardie Arief Tamar');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_review`
--

CREATE TABLE IF NOT EXISTS `tgs_review` (
  `id_review` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `date_review` datetime NOT NULL,
  PRIMARY KEY (`id_review`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tgs_setting`
--

CREATE TABLE IF NOT EXISTS `tgs_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `title_website` varchar(100) NOT NULL,
  `description_website` longtext NOT NULL,
  `company_profile` longtext NOT NULL,
  `default_theme` varchar(200) NOT NULL,
  `fav_icon` varchar(500) NOT NULL,
  `logo_website` varchar(200) NOT NULL,
  `mou_akad_celengan` longtext NOT NULL,
  `mou_akad_simpan` longtext NOT NULL,
  `mou_akad_gadai` longtext NOT NULL,
  `no_account` varchar(50) NOT NULL,
  `email_website` varchar(200) NOT NULL,
  `under_maintenance` tinyint(2) NOT NULL,
  `margin_default` int(11) NOT NULL,
  `biaya_titip_gadai` bigint(20) NOT NULL,
  `administrasi_cicilan` bigint(20) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `cara_transaksi` longtext NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tgs_setting`
--

INSERT INTO `tgs_setting` (`id_setting`, `title_website`, `description_website`, `company_profile`, `default_theme`, `fav_icon`, `logo_website`, `mou_akad_celengan`, `mou_akad_simpan`, `mou_akad_gadai`, `no_account`, `email_website`, `under_maintenance`, `margin_default`, `biaya_titip_gadai`, `administrasi_cicilan`, `footer`, `cara_transaksi`) VALUES
(1, 'Tamar Gold Shop - Jual-Beli, Program Cicilan, Gadai Syariah, SIMPAN, Celengan Emas, Konsultasi - Log', 'Jual-Beli, Program Cicilan, Gadai Syariah, Simpan, Celengan Emas, Konsultasi - Logam Mulia dan Dinar', '', 'default', '', '', 'Untuk Mengikuti dan Mengaktifkan Celengan Emas kamu harus :<br /><br />\r\n1. Mempunyai Account Tamar Gold Shop<br />\r\n2. Top UP saldo minimum sebesar Rp. 200.000<br /><br />', '', '', '123456789012345', 'aditia.tamar@yahoo.com', 0, 4500, 7500, 100000, 'Powered By Tamar Gold Shop || ', '');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_simpan`
--

CREATE TABLE IF NOT EXISTS `tgs_simpan` (
  `id_simpan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_simpan` datetime NOT NULL,
  `date_akhir` datetime NOT NULL,
  `status_simpan` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_simpan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tgs_simpan`
--

INSERT INTO `tgs_simpan` (`id_simpan`, `id_user`, `date_simpan`, `date_akhir`, `status_simpan`) VALUES
(4, 2, '2013-03-31 02:16:08', '2015-03-29 00:00:00', 1),
(5, 4, '2013-04-13 07:40:31', '2015-04-13 00:00:00', 1),
(6, 3, '2013-09-12 03:09:48', '2015-09-12 00:00:00', 1),
(7, 7, '2013-09-28 09:33:54', '2015-09-28 00:00:00', 1),
(8, 9, '2013-09-29 12:20:39', '2015-09-29 00:00:00', 2),
(9, 14, '2014-03-27 02:23:22', '2016-03-27 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_simpan_detail`
--

CREATE TABLE IF NOT EXISTS `tgs_simpan_detail` (
  `id_simpan_detail` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_simpan` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `date_simpan_detail` datetime NOT NULL,
  `status_simpan_detail` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_simpan_detail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tgs_simpan_detail`
--

INSERT INTO `tgs_simpan_detail` (`id_simpan_detail`, `id_simpan`, `id_product`, `qty`, `date_simpan_detail`, `status_simpan_detail`) VALUES
(10, 4, 10, 3, '2013-04-15 04:51:08', 2),
(11, 4, 9, 2, '2013-04-15 04:51:20', 2),
(13, 4, 10, 2, '2013-04-17 11:10:14', 2),
(16, 4, 9, 1, '2013-04-17 11:21:51', 3),
(17, 4, 9, 1, '2013-04-17 11:22:18', 4),
(18, 4, 10, 1, '2013-04-17 10:11:46', 1),
(19, 4, 10, 2, '2013-06-01 08:43:13', 4),
(20, 6, 10, 1, '2013-09-12 03:26:32', 1),
(21, 7, 9, 1, '2013-09-28 09:34:37', 2),
(22, 7, 9, 1, '2013-09-28 09:39:04', 4),
(23, 4, 4, 1, '2013-12-21 09:44:00', 1),
(24, 9, 15, 1, '2014-03-27 02:24:12', 2),
(25, 9, 15, 1, '2014-03-27 02:26:05', 4),
(26, 9, 4, 3, '2014-03-27 02:29:31', 2),
(27, 9, 7, 1, '2014-03-27 02:29:53', 2),
(28, 9, 7, 1, '2014-03-27 02:29:53', 2),
(29, 9, 3, 4, '2014-03-27 02:32:36', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_simpan_emas`
--

CREATE TABLE IF NOT EXISTS `tgs_simpan_emas` (
  `id_simpan_emas` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `id_simpan` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_simpan_emas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tgs_simpan_emas`
--

INSERT INTO `tgs_simpan_emas` (`id_simpan_emas`, `id_product`, `id_simpan`, `qty`) VALUES
(10, 10, 4, 3),
(12, 9, 4, 1),
(14, 7, 9, 2),
(15, 4, 9, 3),
(16, 3, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_slideshow`
--

CREATE TABLE IF NOT EXISTS `tgs_slideshow` (
  `id_slideshow` int(11) NOT NULL AUTO_INCREMENT,
  `title_slideshow` varchar(100) NOT NULL,
  `link_url` varchar(300) NOT NULL,
  `image_slideshow` varchar(500) NOT NULL,
  `status_slideshow` tinyint(2) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `date_slideshow` datetime NOT NULL,
  PRIMARY KEY (`id_slideshow`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tgs_slideshow`
--

INSERT INTO `tgs_slideshow` (`id_slideshow`, `title_slideshow`, `link_url`, `image_slideshow`, `status_slideshow`, `sort_order`, `date_slideshow`) VALUES
(5, 'outlet plasa semanggi', 'http://tamargoldshop.files.wordpress.com/2011/05/outlet-plaza-semanggi.jpg', 'http://tamargoldshop.files.wordpress.com/2011/05/outlet-plaza-semanggi.jpg', 2, 0, '2013-10-05 04:02:03'),
(7, 'dinar & LM', 'http://logammulia-dinar.com/product/order/11/dinar', 'https://pbs.twimg.com/media/BR60FkqCIAEgY1z.jpg:large', 2, 0, '2013-11-07 11:19:31'),
(8, 'gold', 'http://i1244.photobucket.com/albums/gg572/kevinmatheussuwandi/6fa958f3.png', 'http://i1244.photobucket.com/albums/gg572/kevinmatheussuwandi/6fa958f3.png', 2, 0, '2013-11-07 11:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `tgs_user`
--

CREATE TABLE IF NOT EXISTS `tgs_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` longtext NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `date_register` datetime NOT NULL,
  `date_login` datetime NOT NULL,
  `activate_key` varchar(100) NOT NULL,
  `status_user` tinyint(2) NOT NULL,
  `image_user` varchar(200) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `atas_nama` varchar(200) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tgs_user`
--

INSERT INTO `tgs_user` (`id_user`, `username`, `password`, `email`, `name`, `address`, `gender`, `date_register`, `date_login`, `activate_key`, `status_user`, `image_user`, `account_number`, `atas_nama`, `no_hp`) VALUES
(2, 'zuhdirobbani', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'zuhdirobbani@asd.asd', 'Zuhdi Robbanis', 'Jalan Brawijaya', 1, '2012-12-27 12:02:59', '0000-00-00 00:00:00', 'zhwDHckrf6ea1MXolFAvLgKG74R8TVdqbjQIWnsp0iOZm2NSBECtxY3yUu5P9J', 1, 'http://logammulia-dinar.com/asset/images/avatars/zuhdirobbani-5902.jpg', '55624242', 'Zuhdi Robbani', '085696370672'),
(3, 'asdasd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'asdf@asd.asd', 'asd', 'asd', 1, '2013-02-28 10:50:06', '0000-00-00 00:00:00', 'Y1jsXfh9OZxqgtHEalBiIcPL7z0TvGCdWJnMR32kAQFuVrDUopySwK56Nemb84', 1, '', '11212421', 'asdasd', '21312'),
(5, 'robbani', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'robbanizuhdi@gmail.com', 'robbani zuhdi', 'Jalan', 1, '2013-03-25 10:37:55', '0000-00-00 00:00:00', '765b81176e0025b396460969fd159ebc10af366a', 1, '', '12345678', 'Robbani', '085696370672'),
(7, 'fave', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'fave@bncc.net', 'Zuhdi Robbanis', 'Kemanggisan Anggrek', 1, '2013-09-28 19:52:15', '0000-00-00 00:00:00', '7d46d44c725ee543e369137fb3a968b25a4b8f6d', 1, 'http://logammulia-dinar.com/asset/images/avatars/fave-8352.jpg', '24242', 'faves', '08562324222'),
(9, 'OkaNurlyza', 'ab5ce6bac1df6cb6c6e8b940bb0fa5f2026950b4', 'ockanurlyza@hotmail.com', 'Oka Nurlyza', 'Jl. Muria 1 No.6', 2, '2013-09-29 11:55:07', '0000-00-00 00:00:00', '32dd6a7982987251becc363f94f6df9cf903b8f4', 1, '', '5270735322', 'oka', '08979992589'),
(10, 'ardietamar', '4ffd928bdf7754312747fd3fedf70008dd6766e0', 'ardie.tamar@gmail.com', 'ardie arief tamar', 'Graha Surveyor Indonesia lantai 5, Jl. Gatot Subroto kav. 56, jakarta selatan 12950', 1, '2013-10-23 14:47:09', '0000-00-00 00:00:00', '5cf04d042846ae8f63a0bf8eb26fd04c683e2ef0', 1, 'http://logammulia-dinar.com/asset/images/avatars/ardietamar-1481.jpg', '5040185161', 'ardie arief tamar', '0817770165'),
(11, 'rud1anto', 'a406d9a8d15a4e4bd6ba1319e7abe22f1304b5f5', 'mdrud1anto', 'M . Dian Rudianto', 'Taman meruya ilir blok i-8 no 35', 1, '2014-02-20 11:48:42', '0000-00-00 00:00:00', 'bd3ef7faa4978f571f230f70a1f93829067e1275', 0, '', '4890161699', 'Mohammad Dian Rudianto', '081383787846'),
(12, 'gotham001', '33af68528c1a750eeb300b47bf473c8300d4a0e0', 'chk.ced@gmail.com', 'Chandra Kusuma', 'Gedung Ratu Prabu I Lt. 7 (Seberang Trackindo) Jl. TB. Simatupang Kav 20 Cilandak Timur, Jakarta Selatan 12560', 1, '2014-03-13 12:38:49', '0000-00-00 00:00:00', '01702e614686f294eaf53ef5bc546a0fde25026a', 1, '', '1370007813674', 'Chandra Kusuma', '082192559347'),
(13, 'irsan1501', 'cee33ec901b758fa2887b3a07b23406ffd441f0f', 'irsantinorossi@yahoo.co.id', 'mohamad irsan subrata', 'jl. medan merdeka barat no.17 gedung sapta pesona lt.19 biro hukum dan kepegawaian', 1, '2014-03-20 19:54:40', '0000-00-00 00:00:00', '8dcdb4c02c2685030f734b4440ed1bb3b68cefac', 0, '', '9000007117808', 'mohamad irsan subrata', '0813255284'),
(14, 'adithariadi', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'aditia.hariadi@yahoo.com', 'aditia hariadi tamar', 'Jl. Sadewa VI', 1, '2014-03-22 16:39:25', '0000-00-00 00:00:00', '0c1da82722c4f3b8696757f70d01e47852b2f1e6', 1, '', '5270105302', 'aditia hariadi tamar', '081314440552'),
(15, 'ruru', '04b590ca76462aa37ff010a76e2e442a8a5be5a6', 'm.ruharmana@gmail.com', 'Mohammad Ruharmana', 'Sawo No.3. Pondok Gede', 1, '2014-07-01 08:42:03', '0000-00-00 00:00:00', '89cf3f3d6c1a4ca81c00304493ecbe767a5af5ac', 0, '', '68704668360', 'Bank Central Asia', '081382002141'),
(16, 'brianalexandro', '3da541559918a808c2402bba5012f6c60b27661c', 'alexandrobrian15@gmail.com', 'brian alexandro', 'ASDF', 1, '2014-08-16 10:57:31', '0000-00-00 00:00:00', '04c9d4eb21657f26401f90de918ef835ba296271', 1, '', '5678888888', 'Brian Alexandro', '1243456778');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
