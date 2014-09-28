-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2014 at 07:11 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbnyoman`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblabout`
--

CREATE TABLE IF NOT EXISTS `tblabout` (
  `abt_content_id` int(1) NOT NULL AUTO_INCREMENT,
  `abt_history_header` text NOT NULL,
  `abt_history_content` text NOT NULL,
  `abt_team_header` text NOT NULL,
  PRIMARY KEY (`abt_content_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblabout`
--

INSERT INTO `tblabout` (`abt_content_id`, `abt_history_header`, `abt_history_content`, `abt_team_header`) VALUES
(1, 'Originally created by a doctor who has passion in computer science, ArthaMD has become one of the most popular site for doctors to study and simulate <em>Ujian Kompetensi Dokter Indonesia (UKDI)</em>', '<p>ArthaMD was created at Denpasar, Bali in mid-2014 by Nyoman Artha Megayasa, whose at the time a fresh graduate doctor. Whilst waiting for STR and prior being deployed for internship, Nyoman searched a way to be useful for others, and that resulted in ArthaMD being born. ArthaMD served as the core training and study materials for doctors at all levels to sharpen their knowledge, and continues to do so today.</p>\r\n  <p>Originally released on Friday, October 22, 2014, we''ve since had over 10.000+ exam''s question in our database, and its increasing everyday. In ArthaMD, all exam''s questions are strictly filtered to ensure high quality materials and are always updated following with SKDI. Hence, many found it to be the best place to study before the real exam.</p>', 'ArthaMD is maintained by the founding team and a small group of invaluable core contributors, with the massive support and involvement of our community.');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `idadmin` int(1) NOT NULL AUTO_INCREMENT,
  `emailadm` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`idadmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`idadmin`, `emailadm`, `password`) VALUES
(1, 'admin@yahoo.com', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarousel`
--

CREATE TABLE IF NOT EXISTS `tblcarousel` (
  `crs_id` int(2) NOT NULL AUTO_INCREMENT,
  `crs_img` varchar(100) NOT NULL,
  `crs_header` varchar(150) NOT NULL,
  PRIMARY KEY (`crs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblcarousel`
--

INSERT INTO `tblcarousel` (`crs_id`, `crs_img`, `crs_header`) VALUES
(1, '01.gif', 'The Best is Yet to Be! ok'),
(2, '02.gif', 'Ini Header Carousel nomor 2'),
(3, '03.gif', 'Ini Header Carousel nomor 3');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE IF NOT EXISTS `tblcategory` (
  `cat_id` int(3) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_img` varchar(100) NOT NULL,
  `cat_description` varchar(250) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`cat_id`, `cat_name`, `cat_img`, `cat_description`) VALUES
(1, 'Cardiology', 'car_360x275.png', 'Ilmu Anatomi yang sangat penting!'),
(2, 'Dermatology', 'der_360x275.png', 'Ilmu Penyakit Kulit'),
(3, 'Endocrinology', 'end_360x275.png', 'Ilmu Kesehatan Mata'),
(4, 'Forensic', 'for_360x275.png', 'Ilmu Kesehatan Mata'),
(5, 'Gastrointestinal', 'gas_360x275.png', ''),
(6, 'Hemato-Oncology', 'ho_360x275.png', ''),
(7, 'Immunology', 'im_360x275.png', ''),
(8, 'Law', 'law_360x275.png', ''),
(9, 'Muskuloskeletal', 'mus_360x275.png', ''),
(10, 'Neurology', 'neu_360x275.png', ''),
(11, 'Obgyn', 'obg_360x275.png', ''),
(12, 'Ophthalmology', 'oph_360x275.png', ''),
(13, 'Otolaryngology', 'oto_360x275.png', ''),
(14, 'Pediatrics', 'ped_360x275.png', ''),
(15, 'Public Health', 'ph_360x275.png', ''),
(16, 'Psychiatry', 'psy_360x275.png', ''),
(17, 'Radiology', 'rad_360x275.png', ''),
(18, 'Respiratorology', 'res_360x275.png', ''),
(19, 'Surgery', 'sur_360x275.png', 'Ilmu Bedah');

-- --------------------------------------------------------

--
-- Table structure for table `tblcoreteam`
--

CREATE TABLE IF NOT EXISTS `tblcoreteam` (
  `ct_id` int(1) NOT NULL AUTO_INCREMENT,
  `ct_header` varchar(250) NOT NULL,
  `ct_content` text NOT NULL,
  `ct_img` varchar(100) NOT NULL,
  PRIMARY KEY (`ct_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblcoreteam`
--

INSERT INTO `tblcoreteam` (`ct_id`, `ct_header`, `ct_content`, `ct_img`) VALUES
(1, 'Header untuk Core Team', 'Content untuk Core team\r\nContent untuk Core team\r\nContent untuk Core team', ''),
(2, 'Header untuk Core Team 2', 'Content untuk Core team 2\r\nContent untuk Core team 2\r\nContent untuk Core team 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbllevel`
--

CREATE TABLE IF NOT EXISTS `tbllevel` (
  `idLevel` int(2) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) NOT NULL,
  `cat_id` varchar(250) NOT NULL,
  PRIMARY KEY (`idLevel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbllevel`
--

INSERT INTO `tbllevel` (`idLevel`, `level`, `cat_id`) VALUES
(1, 'Moderator Cardiology', '1'),
(2, 'Moderator Dermatology', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tblmoderator`
--

CREATE TABLE IF NOT EXISTS `tblmoderator` (
  `mod_id` int(2) NOT NULL AUTO_INCREMENT,
  `mod_name` varchar(150) NOT NULL,
  `mod_img` varchar(100) NOT NULL,
  `mod_email` varchar(100) NOT NULL,
  `mod_password` varchar(100) NOT NULL,
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmodteam`
--

CREATE TABLE IF NOT EXISTS `tblmodteam` (
  `modt_id` int(1) NOT NULL AUTO_INCREMENT,
  `modt_header` varchar(250) NOT NULL,
  `modt_content` text NOT NULL,
  `modt_img` varchar(100) NOT NULL,
  PRIMARY KEY (`modt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblmodteam`
--

INSERT INTO `tblmodteam` (`modt_id`, `modt_header`, `modt_content`, `modt_img`) VALUES
(1, 'HeaderMOD1', 'Content Mod1Cont entMod1ContentMo d1ContentMod 1ContentMo d1Conten tMod1Cont entMod1Cont entMod1Con tentMod1Co ntentMod1Conte ntMod1 ContentMod1ContentMod1Co nten tMod1ContentMod1Co ntentMod1 ', ''),
(2, 'HeaderMOD2', 'kita coba saja dulu', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbloption`
--

CREATE TABLE IF NOT EXISTS `tbloption` (
  `opt_id` int(5) NOT NULL AUTO_INCREMENT,
  `qst_id` int(4) NOT NULL,
  `opt_choices` text NOT NULL,
  `opt_truefalse` enum('True','False') NOT NULL,
  PRIMARY KEY (`opt_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `tbloption`
--

INSERT INTO `tbloption` (`opt_id`, `qst_id`, `opt_choices`, `opt_truefalse`) VALUES
(6, 2, '5 Hari', 'False'),
(7, 2, '6 Hari', 'False'),
(8, 2, '7 Hari', 'True'),
(9, 2, '4 Hari', 'False'),
(10, 2, '2 Hari', 'False'),
(11, 3, '12 Jam', 'False'),
(12, 3, '24 Jam', 'True'),
(13, 4, 'salah', 'False'),
(14, 4, 'salah', 'False'),
(15, 4, 'salah', 'False'),
(16, 4, 'benar', 'True'),
(17, 5, 'salah', 'False'),
(18, 5, 'salah', 'False'),
(19, 5, 'salah', 'False'),
(20, 5, 'benar', 'True'),
(21, 6, 'salah', 'False'),
(22, 6, 'salah', 'False'),
(23, 6, 'salah', 'False'),
(24, 6, 'benar', 'True'),
(25, 7, 'salah', 'False'),
(26, 7, 'salah', 'False'),
(27, 7, 'benar', 'True'),
(28, 8, 'salah', 'False'),
(29, 8, 'salah', 'False'),
(30, 8, 'benar', 'True'),
(31, 9, 'salah', 'False'),
(32, 9, 'salah', 'False'),
(33, 9, 'benar', 'True'),
(34, 10, 'benar', 'True'),
(35, 10, 'salah', 'False'),
(36, 11, 'salah', 'False'),
(37, 11, 'benar', 'True'),
(38, 11, 'salah', 'False'),
(39, 12, 'benar', 'True'),
(40, 12, 'salah', 'False'),
(41, 13, 'salah', 'False'),
(42, 13, 'benar', 'True'),
(43, 13, 'salah', 'False'),
(44, 14, 'salah', 'False'),
(45, 14, 'salah', 'False'),
(46, 14, 'salah', 'True'),
(47, 15, 'benar', 'True'),
(48, 15, 'salah', 'False'),
(49, 7, '0', ''),
(50, 7, '0', ''),
(51, 7, 'coba coba', 'False'),
(52, 7, 'coba coba', 'True'),
(53, 26, 'option 1 true', 'True'),
(54, 26, 'option 2 false', 'True'),
(55, 26, 'option 3 false', 'True'),
(56, 26, 'option 4 false', 'True'),
(57, 28, 'option 1 true', 'True'),
(58, 28, 'option 2 false', 'True'),
(59, 28, 'option 3 false', 'True'),
(60, 28, 'option 4 false', 'True'),
(61, 29, 'adadadada F', 'False'),
(62, 29, 'adadadad F', 'False'),
(63, 29, 'adadad T', 'True'),
(64, 30, '102', 'True'),
(65, 30, '2', 'True'),
(66, 30, '3', 'True'),
(67, 30, '4', 'True'),
(68, 31, '', 'True'),
(69, 32, 'option nomor 1', 'True'),
(70, 32, 'option nomor 2', 'False'),
(71, 32, 'option nomor 3', 'False'),
(72, 32, 'option nomor 4', 'False'),
(73, 45, 'ilmu 1', 'False'),
(74, 45, 'ilmu 2', 'False'),
(75, 46, 'option1', 'True'),
(76, 46, 'option 2', 'False'),
(77, 46, 'option 3', 'False'),
(118, 1, '5', 'True'),
(119, 1, '6', 'False'),
(120, 1, '7', 'False'),
(121, 1, '8', 'False'),
(122, 1, '9', 'False'),
(123, 48, 'as', 'True'),
(124, 49, '1', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE IF NOT EXISTS `tblquestion` (
  `qst_id` int(4) NOT NULL AUTO_INCREMENT,
  `qst_description` text NOT NULL,
  `qst_question` text NOT NULL,
  `qst_answerkey` text NOT NULL,
  `qst_showexam` enum('Show','No') NOT NULL,
  `cat_id` int(3) NOT NULL,
  `qst_iduser` int(4) NOT NULL,
  `qst_idmoderator` int(3) NOT NULL,
  `qst_postdate` date NOT NULL,
  `qst_confirmeddate` date NOT NULL,
  `qst_status` enum('Confirmed','Pending','Denied') NOT NULL,
  `qst_img` varchar(100) NOT NULL,
  PRIMARY KEY (`qst_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`qst_id`, `qst_description`, `qst_question`, `qst_answerkey`, `qst_showexam`, `cat_id`, `qst_iduser`, `qst_idmoderator`, `qst_postdate`, `qst_confirmeddate`, `qst_status`, `qst_img`) VALUES
(1, 'Cat 1 Pasien membuka mata dengan rangsang nyeri, mengerang dengan rangsang nyeri, extremitas extensi abnormal.                                                                                                                                    ', 'Berapakan GCS pada pasien ini?', 'tambahan4', 'No', 1, 0, 0, '0000-00-00', '0000-00-00', 'Pending', 'bulan.jpg'),
(2, 'Cat 2 Seorang laki-laki usia 25 tahun, Kecelakaan lalu lintas dibawa ke IGD RS. Terjadi open fraktur femur kanan dan kiri. Perdarahan sekitar 2000ml. Tanda vital didapatkan TD 80/60 mmhg, N 140x/menit, RR 38x/menit.', 'Gangguan asam basa apakah yang terjadi?', 'Desc...', 'Show', 2, 1, 1, '2014-08-27', '2014-08-27', 'Pending', 'hari.jpg'),
(3, 'Cat 3 Laki-laki datang ke UGD dengan Compos Mentis sehabis kecelakaan. Tekanan darah dalam batas normal. Ada fraktur tertutup pada 1/3 fibula.            ', 'apa? Triase apa yang tepat untuk pasien ini?', 'Desc...', 'No', 3, 0, 0, '0000-00-00', '0000-00-00', '', 'hari.jpg'),
(4, 'Cat 11 Seorang laki-laki, usia 54 tahun, datang ke dokter dengan keluhan mudah lelah dan sering mengantuk sejak 6 bulan yang lalu. Sejak 3 bulan lalu berat badannya turun dan pasien merasa sering haus dan lapar. pasien mengaku kurang berolahraga. Ibu pasien merupakan penderita DM. Pemeriksaan fisik dalam batas normal.  ', 'Apa pemeriksaan penunjang yang diperlukan untuk menegakkan diagnosis?', 'Desc...', 'Show', 11, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(5, 'Cat 5 Seorang laki-laki 35 tahun datang ke UGD dengan keluhan luka bernanah yang sulit sembuh di telapak kakinya dan disertai demam. Sekitar 2 minggu yang lalu kakinya tertusuk paku, kemudian luka meluas sampai dengan punggung kaki dan berbau busuk, namun pasien tidak merasa nyeri. Pasien memiliki DM namun tidak rutin minum obat. Pemeriksaan fisik TD 120/80mmhg, suhu 38&deg;C, RR 20x/menit, GDS 450mg/dl.', 'Terapi untuk pasien ini adalah?', 'Desc...', 'Show', 5, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(6, 'Cat 4  Seorang laki-laki 35 tahun datang ke UGD dengan keluhan luka bernanah yang sulit sembuh di telapak kakinya dan disertai demam. Sekitar 2 minggu yang lalu kakinya tertusuk paku, kemudian luka meluas sampai dengan punggung kaki dan berbau busuk, namun pasien tidak merasa nyeri. Pasien memiliki DM namun tidak rutin minum obat. Pemeriksaan fisik TD 120/80mmhg, suhu 38&deg;C, RR 20x/menit, GDS 450mg/dl.', 'Terapi untuk pasien ini adalah?', 'Desc...', 'Show', 4, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(7, 'Cat 6 Pasien membuka mata dengan rangsang nyeri, mengerang dengan rangsang nyeri, extremitas extensi abnormal.', 'Berapakan GCS pada pasien ini?', 'Desc...', 'Show', 6, 1, 1, '2014-08-27', '2014-08-27', '', 'bulan.jpg'),
(8, 'Cat 7 Laki-laki datang ke UGD dengan Compos Mentis sehabis kecelakaan. Tekanan darah dalam batas normal. Ada fraktur tertutup pada 1/3 fibula.', 'Triase apa yang tepat untuk pasien ini?', 'Desc...', 'Show', 7, 1, 1, '2014-08-27', '2014-08-27', '', 'hari.jpg'),
(9, 'Cat 8 Seorang laki-laki usia 25 tahun, Kecelakaan lalu lintas dibawa ke IGD RS. Terjadi open fraktur femur kanan dan kiri. Perdarahan sekitar 2000ml. Tanda vital didapatkan TD 80/60 mmhg, N 140x/menit, RR 38x/menit.', 'Gangguan asam basa apakah yang terjadi?', 'Desc...', 'Show', 8, 1, 1, '2014-08-27', '2014-08-27', '', 'hari.jpg'),
(10, 'Cat 9 Laki-laki datang ke UGD dengan Compos Mentis sehabis kecelakaan. Tekanan darah dalam batas normal. Ada fraktur tertutup pada 1/3 fibula.', 'Triase apa yang tepat untuk pasien ini?', 'Desc...', 'Show', 9, 1, 1, '2014-08-27', '2014-08-27', '', 'hari.jpg'),
(11, 'Cat 12 Seorang laki-laki, usia 54 tahun, datang ke dokter dengan keluhan mudah lelah dan sering mengantuk sejak 6 bulan yang lalu. Sejak 3 bulan lalu berat badannya turun dan pasien merasa sering haus dan lapar. pasien mengaku kurang berolahraga. Ibu pasien merupakan penderita DM. Pemeriksaan fisik dalam batas normal.  ', 'Apa pemeriksaan penunjang yang diperlukan untuk menegakkan diagnosis?', 'Desc...', 'Show', 12, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(12, 'Cat 13 Seorang laki-laki, usia 54 tahun, datang ke dokter dengan keluhan mudah lelah dan sering mengantuk sejak 6 bulan yang lalu. Sejak 3 bulan lalu berat badannya turun dan pasien merasa sering haus dan lapar. pasien mengaku kurang berolahraga. Ibu pasien merupakan penderita DM. Pemeriksaan fisik dalam batas normal.  ', 'Apa pemeriksaan penunjang yang diperlukan untuk menegakkan diagnosis?', 'Desc...', 'Show', 13, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(13, 'Cat 1-2 Pasien membuka mata dengan rangsang nyeri, mengerang dengan rangsang nyeri, extremitas extensi abnormal.', 'Berapakan GCS pada pasien ini?', 'Desc...', 'Show', 1, 1, 1, '2014-08-27', '2014-08-27', 'Pending', 'bulan.jpg'),
(15, 'Cat 14Pasien membuka mata dengan rangsang nyeri, mengerang dengan rangsang nyeri, extremitas extensi abnormal.', 'Berapakan GCS pada pasien ini?', 'Desc...', 'Show', 14, 1, 1, '2014-08-27', '2014-08-27', '', 'bulan.jpg'),
(16, 'Cat 2-2 Seorang laki-laki usia 25 tahun, Kecelakaan lalu lintas dibawa ke IGD RS. Terjadi open fraktur femur kanan dan kiri. Perdarahan sekitar 2000ml. Tanda vital didapatkan TD 80/60 mmhg, N 140x/menit, RR 38x/menit.', 'Gangguan asam basa apakah yang terjadi?', 'Desc...', 'Show', 2, 1, 1, '2014-08-27', '2014-08-27', '', 'hari.jpg'),
(17, 'Cat 3-2 Laki-laki datang ke UGD dengan Compos Mentis sehabis kecelakaan. Tekanan darah dalam batas normal. Ada fraktur tertutup pada 1/3 fibula.', 'Triase apa yang tepat untuk pasien ini?', 'Desc...', 'Show', 3, 1, 1, '2014-08-27', '2014-08-27', '', 'hari.jpg'),
(18, 'Cat 4-2  Seorang laki-laki 35 tahun datang ke UGD dengan keluhan luka bernanah yang sulit sembuh di telapak kakinya dan disertai demam. Sekitar 2 minggu yang lalu kakinya tertusuk paku, kemudian luka meluas sampai dengan punggung kaki dan berbau busuk, namun pasien tidak merasa nyeri. Pasien memiliki DM namun tidak rutin minum obat. Pemeriksaan fisik TD 120/80mmhg, suhu 38&deg;C, RR 20x/menit, GDS 450mg/dl.', 'Terapi untuk pasien ini adalah?', 'Desc...', 'Show', 4, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(19, 'Cat 5-2 Seorang laki-laki 35 tahun datang ke UGD dengan keluhan luka bernanah yang sulit sembuh di telapak kakinya dan disertai demam. Sekitar 2 minggu yang lalu kakinya tertusuk paku, kemudian luka meluas sampai dengan punggung kaki dan berbau busuk, namun pasien tidak merasa nyeri. Pasien memiliki DM namun tidak rutin minum obat. Pemeriksaan fisik TD 120/80mmhg, suhu 38&deg;C, RR 20x/menit, GDS 450mg/dl.', 'Terapi untuk pasien ini adalah?', 'Desc...', 'Show', 5, 0, 0, '0000-00-00', '0000-00-00', '', ''),
(20, 'Cat 6-2 Pasien membuka mata dengan rangsang nyeri, mengerang dengan rangsang nyeri, extremitas extensi abnormal.', 'Berapakan GCS pada pasien ini?', 'Desc...', 'Show', 6, 1, 1, '2014-08-27', '2014-08-27', '', 'bulan.jpg'),
(21, '								', '', '								', 'No', 17, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(22, 'aaaaaaaaa								', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa								', 'No', 13, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(23, 'aaaaaaaaa								', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa								', 'No', 13, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(24, 'aaaaaaaaa								', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa								', 'No', 13, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(25, 'aaaaaaaaa								', 'aaaaaaaaaaaa', 'aaaaaaaaaaaaa								', 'No', 13, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(26, 'kali ini coba								', 'coba lah ya', 'option 1								', 'No', 1, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(27, 'kali ini coba								', 'coba lah ya', 'option 1								', 'No', 1, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(28, 'kali ini coba								', 'coba lah ya', 'option 1								', 'No', 1, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(29, 'dadadadad								', 'adadadadad', '								', 'No', 1, 0, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(30, 'coba admin								', 'coba admin', 'aaa								', 'No', 8, 1, 1, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(31, '123123123								', '123123123', '123123123								', 'No', 1, 1, 1, '2014-09-16', '2014-09-16', '', 'noimage.png'),
(32, 'kita coba sekarang', 'apakah yang kita lakukan?', '								', 'No', 1, 1, 1, '2014-09-17', '2014-09-17', '', 'noimage.png'),
(33, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(34, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(35, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(36, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(37, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(38, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(39, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(40, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(41, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(42, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(43, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(44, '								', '', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(45, '	ilmu							', 'ilmu', '								', 'No', 1, 1, 0, '0000-00-00', '0000-00-00', '', 'noimage.png'),
(46, '			sekarang tanggal 28 september					', 'tgl september 2014 cobakah?', 'ini jawaban								', 'Show', 1, 2, 0, '2014-09-28', '0000-00-00', '', 'noimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblseoabout`
--

CREATE TABLE IF NOT EXISTS `tblseoabout` (
  `abt_seotitle` varchar(60) NOT NULL,
  `abt_seokeywords` varchar(120) NOT NULL,
  `abt_seodescription` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblseoabout`
--

INSERT INTO `tblseoabout` (`abt_seotitle`, `abt_seokeywords`, `abt_seodescription`) VALUES
('Tentang Kompetensi Dokter Indonesia | Ujian dan Tryout UKDI', 'Ujian Kompetensi, Dokter Indonesia, Tryout UKDI', 'Halaman tentang Ujian Kompetensi Dokter Indonesia dan Tryout UKDI');

-- --------------------------------------------------------

--
-- Table structure for table `tbltmpresult`
--

CREATE TABLE IF NOT EXISTS `tbltmpresult` (
  `idresult` int(4) NOT NULL AUTO_INCREMENT,
  `qst_id` int(4) NOT NULL,
  `opt_idku` int(5) NOT NULL,
  `statusresult` enum('True','False') NOT NULL,
  PRIMARY KEY (`idresult`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbltmpresult`
--

INSERT INTO `tbltmpresult` (`idresult`, `qst_id`, `opt_idku`, `statusresult`) VALUES
(1, 1, 1, 'True'),
(2, 13, 42, 'True'),
(3, 14, 45, 'False'),
(4, 1, 1, 'True'),
(5, 13, 42, 'True'),
(6, 14, 45, 'False'),
(7, 1, 1, 'True'),
(8, 13, 42, 'True'),
(9, 14, 45, 'False'),
(10, 1, 1, 'True'),
(11, 13, 42, 'True'),
(12, 14, 45, 'False'),
(13, 13, 42, 'True'),
(14, 15, 47, 'True'),
(15, 10, 34, 'True'),
(16, 13, 42, 'True'),
(17, 15, 47, 'True'),
(18, 10, 34, 'True'),
(19, 5, 0, 'False'),
(20, 19, 0, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `usr_id` int(4) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(150) NOT NULL,
  `usr_img` varchar(100) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `usr_username` varchar(50) NOT NULL,
  `usr_password` varchar(100) NOT NULL,
  `usr_level` varchar(100) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`usr_id`, `usr_name`, `usr_img`, `usr_email`, `usr_username`, `usr_password`, `usr_level`) VALUES
(0, 'Admin', 'wayan.jpg', 'wayan@gmail.com', 'wayan', '6f3792a964f0e3a5f06a35dfe609716c', ''),
(1, 'Admin', 'wayan.jpg', 'wayan@gmail.com', 'wayan', '6f3792a964f0e3a5f06a35dfe609716c', ''),
(2, 'Ketut', 'ketut.jpg', 'ketut@yahoo.com', 'ketut', '1fc6dc59da127369acab8cef9791687e', 'moderator'),
(3, 'wayan', '', 'wayan@yahoo.com', '', '6f3792a964f0e3a5f06a35dfe609716c', 'moderator');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlevel`
--

CREATE TABLE IF NOT EXISTS `tbluserlevel` (
  `idrelasi` int(4) NOT NULL AUTO_INCREMENT,
  `iduser` int(4) NOT NULL,
  `idlevel` int(2) NOT NULL,
  PRIMARY KEY (`idrelasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbluserlevel`
--

INSERT INTO `tbluserlevel` (`idrelasi`, `iduser`, `idlevel`) VALUES
(1, 2, 1),
(2, 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
