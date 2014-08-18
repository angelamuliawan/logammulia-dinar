-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2013 at 02:07 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tamargoldshop`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tgs_administrator`
--

INSERT INTO `tgs_administrator` (`id_administrator`, `username`, `password`, `name`, `email`, `admin_permission`, `date_register`, `date_login`, `activate_key`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Zuhdi Robbani', 'admin@tamargoldshop.com', 2, '2012-12-05 00:00:00', '0000-00-00 00:00:00', 'HRQkqeqp2317ADQEfalsieasdawewq1241DDKWB'),
(2, 'backoffices', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', 'backoffice@tokoemas.com', 0, '2012-12-27 11:27:51', '0000-00-00 00:00:00', 'mVcO0NPIleDURZFuXrykGh1iSgYtjKadbEQHs4B3J96LCpWv2Tq7Axz5Mf8onw'),
(5, 'admin2', 'a8f5f167f44f4964e6c998dee827110c', 'Admin 2', 'admin2@admin.net', 1, '2012-12-27 01:15:17', '0000-00-00 00:00:00', 'xsqavUlr5IeAu6yc801n2hM9woXbZOGjCRpiBVTEmzktNJYPgdHLQ3f7DW4SKF');

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
  `biaya_titip` int(11) NOT NULL,
  `total_biaya` bigint(20) NOT NULL,
  `status_transfer` tinyint(2) NOT NULL,
  `total_denda` bigint(20) NOT NULL,
  `date_mulai_cicilan` datetime NOT NULL,
  PRIMARY KEY (`id_cicilan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tgs_cicilan`
--

INSERT INTO `tgs_cicilan` (`id_cicilan`, `id_user`, `id_product`, `id_order`, `jangka_waktu`, `harga_pas_beli`, `biaya_titip`, `total_biaya`, `status_transfer`, `total_denda`, `date_mulai_cicilan`) VALUES
(20, 2, 10, 8, 6, 520000, 6000, 626000, 1, 0, '2013-03-03 10:44:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `tgs_cicilan_detail`
--

INSERT INTO `tgs_cicilan_detail` (`id_cicilan_detail`, `id_cicilan`, `date_jatuh_tempo`, `date_terbayar`, `status_cicilan`, `cannot_pay`) VALUES
(113, 20, '2013-03-03', '0000-00-00', 1, 0),
(114, 20, '2013-04-03', '0000-00-00', 1, 0),
(115, 20, '2013-05-03', '0000-00-00', 1, 0),
(116, 20, '2013-06-03', '0000-00-00', 1, 0),
(117, 20, '2013-07-03', '0000-00-00', 1, 0),
(118, 20, '2013-08-03', '0000-00-00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tgs_comment`
--

CREATE TABLE IF NOT EXISTS `tgs_comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_comment` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` longtext NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgs_data_transaksi`
--

INSERT INTO `tgs_data_transaksi` (`id_data_transaksi`, `total_transaksi_member`, `total_transaksi_nonmember`, `total_transaksi_cicilan`) VALUES
(1, 1, 0, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tgs_jawab_konsultasi`
--

INSERT INTO `tgs_jawab_konsultasi` (`id_jawab`, `id_konsultasi`, `id_backoffice`, `jawaban`, `date_jawaban`, `date_jawaban_edit`) VALUES
(1, 3, 1, 'mungkin sedang ada masalah dengan server kami, atau anda belom login terlebih dahulu. Terima Kasih :)', '2013-03-02 13:17:41', '2013-03-02 04:26:02'),
(5, 2, 1, 'Maaf, anda sedang nulis apa yah? Terima Kasih', '2013-03-02 04:26:56', '0000-00-00 00:00:00'),
(6, 4, 1, 'Silahkan Buka Menu Cara Transaksi, untuk lebih jelasnya :) Terima Kasih', '2013-03-02 04:30:19', '0000-00-00 00:00:00'),
(7, 5, 1, 'Gampang Caranya: Kerja.', '2013-03-02 04:35:23', '0000-00-00 00:00:00'),
(8, 1, 1, 'Kamu mau ngapain hayoo test-test', '2013-03-03 09:48:54', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tgs_konfirmasi`
--

INSERT INTO `tgs_konfirmasi` (`id_konfirmasi`, `id_bank`, `code_order`, `date_konfirmasi`) VALUES
(15, 1, 'TGSCASH1', '2013-03-04 10:46:12'),
(16, 1, 'TGSNM1', '2013-03-04 11:02:25');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tgs_konsultasi`
--

INSERT INTO `tgs_konsultasi` (`id_konsultasi`, `id_user`, `subject`, `konsultasi`, `date_konsultasi`, `status_konsultasi`) VALUES
(1, 2, 'test', 'test', '2013-02-28 10:29:42', 3),
(2, 3, 'asd', 'lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet ', '2013-02-28 10:50:57', 3),
(3, 2, 'Kenapa Saya nggak bisa Komentar?', 'Hayoo kenapa saya nggak bisa komentar yaa? hayoo kenapa hayoo?', '2013-03-02 03:02:51', 3),
(4, 3, 'Bagaimana Proses Membeli Emas?', 'Bagaimana yah cara dan proses membeli emas logam muliad dari toko online ini?', '2013-03-02 04:28:16', 3),
(5, 3, 'Tanya Lagi dong.', 'Mau tanya lagi nih, gimana yah caranya supaya saya bisa cepet Kaya?', '2013-03-02 04:32:54', 3),
(6, 3, 'Investasi', 'Bagaimana cara Investasi LM yg Baik?', '2013-03-03 10:55:27', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tgs_news`
--

INSERT INTO `tgs_news` (`id_news`, `title_news`, `content_news`, `image_news`, `date_insert`, `date_update`, `status_news`, `id_creator`) VALUES
(1, 'Berita 1', 'lorem ipsum dolor sil amet, lorom ipsum dolor sil amet', '', '2012-12-07 11:13:08', '0000-00-00 00:00:00', 1, 1),
(2, 'Mengenal Rupiah: Ciri-ciri keaslian uang kertas', '<p align="justify">Sudahkah Anda tahu ciri-ciri Uang Rupiah yang asli? Perlu Anda ketahui bahwa Bank Indonesia senantiasa melakukan evaluasi dan peningkatan kualitas uang sehingga mudah dikenali ciri-ciri keasliannya dan aman dari upaya pemalsuan.</p>\r\n<p align="justify">Agar lebih mudah mengenali keaslian Uang Rupiah, maka pahami Panduan Ciri-Ciri Keaslian Uang Rupiah sehingga Anda dapat dengan mudah mengenali Uang Rupiah asli dari Unsur Pengaman yang terdapat pada Uang Rupiah tersebut.</p>\r\n<p align="justify">Uang Rupiah memiliki ciri-ciri berupa tanda-tanda tertentu yang bertujuan mengamankan uang Rupiah dari upaya pemalsuan. Secara umum, ciri-ciri keaslian uang Rupiah dapat dikenali dari unsur pengaman yang tertanam pada bahan uang dan teknik cetak yang digunakan, yaitu :</p>\r\n<p align="justify"><strong>Tanda Air (Watermark) dan Electrotype</strong><br />Pada kertas uang terdapat tanda air berupa gambar yang akan terlihat apabila diterawangkan ke arah cahaya.</p>\r\n<p align="justify"><strong>Benang Pengaman (Security Thread)</strong><br />Ditanam di tengah ketebalan kertas atau terlihat seperti dianyam sehingga tampak sebagai garis melintang dari atas ke bawah, dapat dibuat tidak memendar maupun memendar di bawah sinar ultraviolet dengan satu warna atau beberapa warna.</p>\r\n<p align="justify"><strong>Cetak Intaglio</strong><br />Cetakan yang terasa kasar apabila diraba.</p>\r\n<p align="justify"><strong>Gambar Saling Isi (Rectoverso)</strong>&nbsp;<br />Pencetakan suatu ragam bentuk yang menghasilkan cetakan pada bagian muka dan belakang beradu tepat dan saling mengisi jika diterawangkan ke arah cahaya.</p>\r\n<p align="justify"><strong>Tinta Berubah Warna (Optical Variable Ink)</strong><br />Hasil cetak mengkilap (glittering) yang berubah-ubah warnanya bila dilihat dari sudut pandang yang berbeda.</p>\r\n<p align="justify"><strong>Tulisan Mikro (Micro Text)&nbsp;</strong><br />Tulisan berukuran sangat kecil yang hanya dapat dibaca dengan menggunakan kaca pembesar.</p>\r\n<p align="justify"><strong>Tinta Tidak Tampak (Invisible Ink)</strong><br />Hasil cetak tidak kasat mata yang akan memendar di bawah sinar ultraviolet.</p>\r\n<p align="justify"><strong>Gambar Tersembunyi (Latent Image)</strong><br />Teknik cetak dimana terdapat tulisan tersembunyi yang dapat dilihat dari sudut pandang tertentu.</p>', '', '2012-12-07 11:29:11', '2013-02-16 04:38:38', 2, 1),
(3, 'Tips transaksi dengan Tamargoldshop menggunakan EDC Bank BCA', '<p>Tahukah anda? bahwa saat ini untuk bertransaksi di dunia maya banyak sekali terdapat kelicikan kecurangan dan banyak penipuan?</p>\r\n<p>Oleh karena itu kami sangat paham dengan kondisi anda. Berikut-berikut ini adalah tips-tips transaksi yang aman dengan Tamargoldshop menggunakan EDC BCA</p>\r\n<ul>\r\n<li>Periksa nilai transaksi</li>\r\n<li>Selalu ikuti keberadaan kartu</li>\r\n<li>Tutup dengan tangan saat input PIN</li>\r\n<li>Mintalah kartu Paspor BCA Anda kembali</li>\r\n<li>Jangan beritahukan PIN kepada orang lain termasuk petugas bank atau keluarga&nbsp;</li>\r\n<li>Jika Anda mengalami kesulitan di EDC, hubungi segera&nbsp;<strong>Halo BCA</strong>&nbsp;pada nomor&nbsp;<strong>(021) 500888</strong>&nbsp;via ponsel</li>\r\n</ul>', '', '2012-12-07 11:35:02', '2013-02-16 04:44:33', 2, 1),
(4, 'Tips Berkebun Emas', '<p>Beberapa tips dalam berkebun emas:</p>\r\n<ul>\r\n<li>Beli pada saat harga emas rendah, jual pada saat harga emas tinggi. Jika terpaksa menebus dan menjual emas pada saat harga turun, investor bukan saja bisa kehilangan potensi keuntungan, tapi juga berpotensi mengalami kerugian dari biaya gadai yang sudah dibayarkan.</li>\r\n<li>Agar bisa mendapatkan keuntungan maksimal dari teknik berkebun emas, gadaikan emas anda di tempat gadai yang menawarkan nilai gadai paling tinggi dengan biaya paling rendah.</li>\r\n<li>Gadaikan emas dalam waktu sesingkat mungkin jika anda bermaksud mendapatkan keuntungan jangka pendek dari teknik berkebun emas ini.</li>\r\n</ul>', '', '2013-02-04 10:01:26', '2013-02-04 11:56:38', 2, 5);

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
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tgs_order`
--

INSERT INTO `tgs_order` (`id_order`, `id_user`, `id_product`, `harga_pas_beli`, `date_order`, `qty`, `total_price`, `cicilan`, `shipping`, `status_order`, `code_order`) VALUES
(8, 2, 10, 520000, '2013-03-03 10:44:13', 1, 520000, 2, 1, 1, 'TGSCREDIT6'),
(9, 2, 10, 520000, '2013-03-03 10:48:16', 1, 520000, 2, 2, 1, 'TGSCREDIT7'),
(10, 2, 10, 520000, '2013-03-04 10:03:36', 1, 520000, 1, 1, 1, 'TGSCASH1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tgs_order_nonmember`
--

INSERT INTO `tgs_order_nonmember` (`id_order_nonmember`, `id_product`, `name`, `email`, `phone_number`, `address`, `harga_pas_beli`, `qty`, `total_price`, `account_number`, `atas_nama`, `shipping`, `tanggal_dikirim`, `date_order`, `status_order`, `code_order`) VALUES
(19, 10, 'Zuhdi Robbani', 'zuhdirobbani@gmail.com', '08569123456', 'A', 520000, 1, 520000, 2147483647, 'Zuhdi Robbani', 1, '0000-00-00 00:00:00', '2013-03-04 11:00:22', 1, 'TGSNM1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tgs_product`
--

INSERT INTO `tgs_product` (`id_product`, `name_product`, `image_product`, `description_product`, `stock`, `base_price`, `margin`, `sell_price`, `date_insert`, `date_update`, `date_update_margin`, `sort_order`, `gram`) VALUES
(1, 'Logam Mulia 100gr', '', '<p>Logam Mulia seberat 100 gram</p>', 0, 54950000, 5000, 54805000, '2013-01-31 14:31:09', '2013-02-20 10:16:06', '2013-02-02 09:52:22', 1, 100),
(2, 'Logam Mulia 50gr', '', '', 10, 27545000, 20000, 27565000, '2013-01-31 04:14:40', '2013-02-16 11:18:56', '2013-02-04 09:29:50', 2, 50),
(3, 'Logam Mulia 25gr', '', '', 10, 13000000, 55000, 13055000, '2013-01-31 04:15:51', '2013-02-16 11:19:55', '2013-02-16 05:51:01', 3, 25),
(4, 'Logam Mulia 10gr', '', '', 10, 5000000, 30000, 5030000, '2013-01-31 04:16:28', '2013-02-16 11:20:02', '2013-02-04 09:30:03', 4, 10),
(5, 'Logam Mulia 5gr', '', '', 10, 2500000, 15000, 2515000, '2013-01-31 04:16:51', '2013-02-16 11:20:08', '2013-02-04 09:30:10', 5, 5),
(6, 'Logam Mulia 4gr', '', '', 10, 2000000, 5000, 2005000, '2013-01-31 04:17:29', '2013-02-16 11:20:14', '2013-02-04 09:30:18', 6, 4),
(7, 'Logam Mulia 3gr', '', '', 10, 1500000, 90000, 1590000, '2013-01-31 04:17:48', '2013-02-16 11:20:21', '2013-02-04 09:30:25', 7, 3),
(8, 'Logam Mulia 2,5gr', '', '', 10, 1300000, 4000, 1304000, '2013-01-31 04:18:33', '2013-02-16 11:22:08', '2013-02-04 09:30:34', 8, 2.5),
(9, 'Logam Mulia 2gr', '', '', 10, 1000000, 3000, 1003000, '2013-01-31 04:18:56', '2013-02-16 11:24:02', '2013-02-04 09:30:41', 9, 2),
(10, 'Logam Mulia 1gr', '', '', 10, 500000, 20000, 520000, '2013-01-31 04:20:08', '2013-02-16 11:24:12', '2013-02-04 09:30:47', 10, 1),
(11, 'Dinar', '', '', 10, 2000000, 500000, 2500000, '2013-01-31 04:20:50', '2013-02-04 11:42:37', '2013-02-05 10:26:30', 11, 0),
(13, 'Dirham', '', '', 100, 80000, 8000, 88000, '2013-01-31 05:08:20', '2013-02-04 11:42:42', '2013-02-05 10:26:42', 12, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tgs_rekening_bank`
--

INSERT INTO `tgs_rekening_bank` (`id_rekening_bank`, `nama_bank`, `nomor_rekening`, `atas_nama`) VALUES
(1, 'BCA', '63469363', 'Firstname Lastname');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `mou_akad_arisan` longtext NOT NULL,
  `mou_akad_gadai` longtext NOT NULL,
  `no_account` varchar(50) NOT NULL,
  `email_website` varchar(200) NOT NULL,
  `under_maintenance` tinyint(2) NOT NULL,
  `margin_default` int(11) NOT NULL,
  `footer` varchar(300) NOT NULL,
  `cara_transaksi` longtext NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tgs_setting`
--

INSERT INTO `tgs_setting` (`id_setting`, `title_website`, `description_website`, `company_profile`, `default_theme`, `fav_icon`, `logo_website`, `mou_akad_celengan`, `mou_akad_arisan`, `mou_akad_gadai`, `no_account`, `email_website`, `under_maintenance`, `margin_default`, `footer`, `cara_transaksi`) VALUES
(1, 'Tamar Gold Shop', 'Jual Logam Mulia, Dinar, Dirham.', '', 'default', '', '', '', '', '', '123456789012345', 'admin@tamargoldshop.com', 0, 0, '©2012-2013 Tamar Gold Shop . ', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tgs_slideshow`
--

INSERT INTO `tgs_slideshow` (`id_slideshow`, `title_slideshow`, `link_url`, `image_slideshow`, `status_slideshow`, `sort_order`, `date_slideshow`) VALUES
(3, 'wall e', 'http://localhost/tgs/news/read/2/mengenal-rupiah-ciri-ciri-keaslian-uang-kertas', 'http://localhost/tgs/asset/images/slideshow/walle.jpg', 2, 1, '2013-02-25 05:44:17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tgs_user`
--

INSERT INTO `tgs_user` (`id_user`, `username`, `password`, `email`, `name`, `address`, `gender`, `date_register`, `date_login`, `activate_key`, `status_user`, `image_user`, `account_number`, `atas_nama`, `no_hp`) VALUES
(2, 'zuhdirobbani', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'asdf@asd.asd', 'Zuhdi Robbani', 'asd', 1, '2012-12-27 12:02:59', '0000-00-00 00:00:00', 'zhwDHckrf6ea1MXolFAvLgKG74R8TVdqbjQIWnsp0iOZm2NSBECtxY3yUu5P9J', 1, 'http://localhost/tgs/asset/images/avatars/zuhdirobbani-7316.jpg', '11212421', 'asdasd', '21312'),
(3, 'asdasd', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', 'asdf@asd.asd', 'asdasd', 'asd', 1, '2013-02-28 10:50:06', '0000-00-00 00:00:00', 'Y1jsXfh9OZxqgtHEalBiIcPL7z0TvGCdWJnMR32kAQFuVrDUopySwK56Nemb84', 1, '', '11212421', 'asdasd', '21312');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
