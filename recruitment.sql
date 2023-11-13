-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for recruitment
DROP DATABASE IF EXISTS `recruitment`;
CREATE DATABASE IF NOT EXISTS `recruitment` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `recruitment`;

-- Dumping structure for table recruitment.lga
DROP TABLE IF EXISTS `lga`;
CREATE TABLE IF NOT EXISTS `lga` (
  `lga_id` int(11) NOT NULL AUTO_INCREMENT,
  `lga_state` int(11) NOT NULL,
  `lga_name` varchar(20) NOT NULL,
  PRIMARY KEY (`lga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.lga: ~70 rows (approximately)
/*!40000 ALTER TABLE `lga` DISABLE KEYS */;
INSERT INTO `lga` (`lga_id`, `lga_state`, `lga_name`) VALUES
	(1, 1, 'Dutse'),
	(2, 1, 'jahun'),
	(3, 1, 'maigatari'),
	(4, 1, 'Suletankarkar'),
	(5, 1, 'birniwa'),
	(6, 2, 'rano'),
	(7, 3, 'katsina'),
	(8, 3, 'Dikko'),
	(9, 3, 'katsina'),
	(10, 1, 'kazaure'),
	(11, 1, 'kiyawa'),
	(12, 1, 'kafin hausa'),
	(13, 5, 'ummu ahiya'),
	(14, 6, 'yola'),
	(15, 10, 'uyo'),
	(16, 11, 'aukwa'),
	(17, 4, 'bauchi'),
	(18, 12, 'yenagoa'),
	(19, 13, 'makurdi'),
	(20, 14, 'asaba'),
	(21, 2, 'kano'),
	(22, 16, 'kaduna'),
	(23, 9, 'kebbi'),
	(24, 1, 'kirikasamma'),
	(25, 1, 'gwaram'),
	(26, 1, 'gwiwa'),
	(27, 1, 'babura'),
	(28, 1, 'birnin kudu'),
	(29, 1, 'gagarawa'),
	(30, 1, 'guri'),
	(31, 1, 'garki'),
	(32, 1, 'malam madori'),
	(33, 1, 'miga'),
	(34, 1, 'taura'),
	(35, 1, 'yankwashi'),
	(36, 1, 'gumel'),
	(37, 1, 'hadejia'),
	(38, 1, 'ringim'),
	(39, 1, 'auyo'),
	(40, 1, 'kaugama'),
	(41, 1, 'buji'),
	(42, 1, 'roni'),
	(43, 2, 'kumbotso'),
	(44, 15, 'akure'),
	(45, 31, 'minna'),
	(46, 32, 'lokoja'),
	(47, 33, 'enugu'),
	(48, 34, 'Ado Ekiti'),
	(49, 30, 'Borno'),
	(50, 36, 'Calabar'),
	(51, 28, 'Abakalki'),
	(52, 8, 'Abuja'),
	(53, 26, 'Ilori'),
	(54, 27, 'Ikeja'),
	(55, 17, 'Lfiya'),
	(56, 20, 'Ogun'),
	(57, 18, 'Ondo'),
	(58, 19, 'Oshogbo'),
	(59, 7, 'Oyo'),
	(60, 21, 'Jos'),
	(61, 37, 'Rivers'),
	(62, 5, 'Sokoto'),
	(63, 35, 'Sokoto'),
	(64, 24, 'Jalingo'),
	(65, 22, 'Damaturu'),
	(66, 23, 'Gusau'),
	(67, 29, 'Gombe'),
	(68, 25, 'Imo'),
	(69, 3, 'Daura'),
	(70, 2, 'Yakasai');
/*!40000 ALTER TABLE `lga` ENABLE KEYS */;

-- Dumping structure for table recruitment.recruitment
DROP TABLE IF EXISTS `recruitment`;
CREATE TABLE IF NOT EXISTS `recruitment` (
  `uid` int(11) NOT NULL,
  `rand_char` varchar(10) NOT NULL DEFAULT '0',
  `year` int(5) NOT NULL DEFAULT '0',
  `profile_upload` varchar(50) DEFAULT '',
  `first_name` varchar(15) DEFAULT NULL,
  `middle_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `gender` varchar(15) DEFAULT NULL,
  `date_of_birth` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `lga` varchar(15) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `address_2` varchar(100) DEFAULT NULL,
  `lga_2` varchar(15) DEFAULT NULL,
  `state_2` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `nin` varchar(50) DEFAULT NULL,
  `declaration_upload` varchar(30) DEFAULT NULL,
  `indigene_upload` varchar(30) DEFAULT NULL,
  `nin_upload` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `phone_2` varchar(15) DEFAULT NULL,
  `name_primary` varchar(100) DEFAULT NULL,
  `name_secondary` varchar(100) DEFAULT NULL,
  `name_tertiary` varchar(100) DEFAULT NULL,
  `name_tertiary_2` varchar(100) DEFAULT NULL,
  `result_primary` varchar(100) DEFAULT NULL,
  `result_tertiary` varchar(100) DEFAULT NULL,
  `result_tertiary_2` varchar(100) DEFAULT NULL,
  `result_primary_upload` varchar(30) DEFAULT NULL,
  `result_secondary_upload` varchar(30) DEFAULT NULL,
  `result_secondary_2_upload` varchar(30) DEFAULT NULL,
  `result_tertiary_upload` varchar(30) DEFAULT NULL,
  `result_tertiary_2_upload` varchar(30) DEFAULT NULL,
  `apply_for` int(11) DEFAULT NULL,
  `apply_date` varchar(50) DEFAULT NULL,
  `apply_submit` int(11) DEFAULT '0',
  `apply_approve` int(11) DEFAULT '0',
  `apply_approver` int(11) DEFAULT '0',
  `apply_approve_date` int(11) DEFAULT '0',
  `decline` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.recruitment: ~12 rows (approximately)
/*!40000 ALTER TABLE `recruitment` DISABLE KEYS */;
INSERT INTO `recruitment` (`uid`, `rand_char`, `year`, `profile_upload`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `address`, `lga`, `state`, `address_2`, `lga_2`, `state_2`, `country`, `nin`, `declaration_upload`, `indigene_upload`, `nin_upload`, `phone`, `phone_2`, `name_primary`, `name_secondary`, `name_tertiary`, `name_tertiary_2`, `result_primary`, `result_tertiary`, `result_tertiary_2`, `result_primary_upload`, `result_secondary_upload`, `result_secondary_2_upload`, `result_tertiary_upload`, `result_tertiary_2_upload`, `apply_for`, `apply_date`, `apply_submit`, `apply_approve`, `apply_approver`, `apply_approve_date`, `decline`) VALUES
	(13, 'KUVGFN', 2023, '13_profile.png', 'UMAR', 'TAHIR', 'BAKO', 'm', '796262400', 'Jigawar Sarki, Dutse, JIgawa State', '1', '1', 'jigawar sarki dutse, jigawa state', '0', '1', 'Nigeria', '230038120990', '13_declaration.png', '13_indigene.png', '13_nin.png', '09069588503', '07076389293', 'GADADIN PRIMARY SCHOOL, DUTSE L.G.A', 'GADADIN SECONDAY SCHOOL DUTSE', 'JIGAWA STATE POLYTECHNIC DUTSE', 'FEDERAL UNIVERSITY DUTSE', 'F.S.L.C', 'DIPLOMA IN INFORMATION AND COMMUNICATION TECHNOLOGY', 'UPPER CREDIT', '13_result_primary.png', '13_result_secondary.png', '13_result_secondary_2.png', '13_result_tertiary.png', '13_result_tertiary_2.png', 15, '1689084712', 1, 1, 0, 0, 0),
	(16, 'DLSFNU', 2023, '16_profile.png', 'USMAN', '', 'HAREETH', 'm', '1017705600', 'GADADIN', '1', '1', 'GADADIN', '0', '1', 'NIGERIA', '23347834520', NULL, '16_indigene.png', NULL, '09126636767', '', 'ZAI PRIMARY SCHOOL, DUTSE', 'GADADIN SECONDARY SCHOOL DUTSE', '', '', 'F.S.L.C', '', '', '16_result_primary.png', '16_result_secondary.png', '16_result_secondary_2.png', '16_result_tertiary.png', '16_result_tertiary_2.png', 13, '1683220543', 0, 1, 0, 0, 0),
	(22, 'WBIZME', 2023, '22_profile.png', 'MUHAMMADA', 'MAGAJI', 'M', 'm', '631152000', 'MIGA QUARTERS, MIGA L.G.A', '1', '1', 'Somewhere street, Abuja, Nigeria', '1', '8', 'NIGERIA', '90276892319', '22_declaration.png', NULL, NULL, '080837627367', '090263527432', 'MIGA PRIMARY SCHOOL', 'MIGA SECONDARY SCHOOL', 'JIGAWA STATE POLYTECHNIC', 'FEDERAL UNIVERSITY DUTSE', 'F.S.L.C', 'DIPLOMA IN INFORMATION AND COMMUNICATION TECHNOLOGY', 'UPPER CREDIT', '22_result_primary.png', '22_result_secondary.png', '22_result_secondary_2.png', '22_result_tertiary.png', '22_result_tertiary_2.png', 15, '1686065217', 1, 1, 0, 0, 0),
	(23, 'ZVAAOL', 2023, '23_profile.png', 'AISHA', '', 'ATTAHIR', 'f', '1012694400', 'JIGAWAR SARKI QUARTERS', '0', '1', '', '0', '0', 'NIGERIA', '930984832549', NULL, NULL, NULL, '08144557668', '', 'GADADIN PRIMARY SCHOOL, DUTSE', 'NIL', 'NIL', '', 'F.S.L.C', '', '', NULL, NULL, NULL, '23_result_tertiary.png', '23_result_tertiary_2.png', 0, '1686749901', 1, 1, 0, 0, 0),
	(15, 'IKMLPL', 2023, '15_profile.png', 'maryam', '', 'attahir', 'f', '949449600', 'JIGAWAR SARKI QUARTERS', '1', '1', 'wuse', '52', '8', 'Nigeria', '9837377487', '15_declaration.png', '15_indigene.png', '15_nin.png', '0901938383', '', 'GADADIN PRIMARY SCHOOL, DUTSE', '', '', '', 'F.S.L.C', '', '', '15_result_primary.png', '15_result_secondary.png', '15_result_secondary_2.png', '15_result_tertiary.png', '15_result_tertiary_2.png', 15, '1686753859', 1, 1, 0, 0, 0),
	(24, 'TRVIHO', 2023, '24_profile.png', 'USAMA', '', 'ADAMU', 'm', '1320969600', 'GADADIN', '28', '30', '', '1', '1', '', '4354546565654', NULL, NULL, NULL, '08064966859', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '1686910964', 1, 1, 0, 0, 0),
	(25, 'IERRKA', 2023, '25_profile.png', 'RABIU', '', 'HAMBALI', 'm', '631152000', 'KACHI QUARTERS, DUTSE', '1', '1', 'WUSE 2', '52', '8', 'NIGERIA', '84984887495', NULL, NULL, NULL, '080238848768', '07088477387', 'KACHI PRIMARY SCHOOL', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, 13, '1687278936', 1, 1, 0, 0, 0),
	(26, 'ZCYDRC', 2023, '26_profile.png', 'SULAIMAN', '', 'ATTAHIR', 'm', '1044144000', 'J-SARKI', '1', '1', 'J-SARKI', '1', '1', 'NIGERIA', '98877978687', NULL, NULL, NULL, '0908389277', '093999499', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, '1689004881', 1, 1, 0, 0, 0),
	(27, 'QXNHZB', 2023, '27_profile.png', 'MARYAM', '', 'ATTAHIR', 'f', '1012608000', 'J-SARKI', '1', '1', 'J-SARKI', '1', '1', 'NIGERIA', '79372873842', '27_declaration.png', '27_indigene.png', '27_nin.png', '0809387398', '093879788', 'GADADIN PRIMARY SCHOOL, DUTSE', 'GOVERNMENT GIRLS ARABIC SECONDARY SCHOOL, BAURE, DUTSE', 'NIL', 'NIL', 'F.S.L.C', 'NIL', 'NIL', '27_result_primary.png', '27_result_secondary.png', '27_result_secondary_2.png', '27_result_tertiary.png', '27_result_tertiary_2.png', 15, '1689075828', 1, 1, 0, 0, 0),
	(28, 'WBNFEQ', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1689256371', 0, 0, 0, 0, 0),
	(29, 'XFGMJA', 2023, '29_profile.png', 'UMAR', 'TAHIR', 'BAKO', 'm', '978307200', 'JIGAWAR SARKI QUARTERS, DUTSE', '1', '1', 'JIGAWAR SARKI QUARTERS, DUTSE', '1', '1', 'NIGERIA', '93847838723', '29_declaration.png', '29_indigene.png', '29_nin.png', '08131168825', '09024066380', 'GADADIN PRIMARY SCHOOL, DUTSE', 'GADADIN SECONDARY SCHOOL, DUTSE', 'JIGAWA STATE POLYTECHNIC, DUTSE', 'NIL', 'F.S.L.C', 'DISTINCTION (INFORMATION TECHNOLOGY)', 'NIL', '29_result_primary.png', '29_result_secondary.png', NULL, '29_result_tertiary.png', NULL, 15, '1689257050', 1, 1, 0, 0, 0),
	(30, 'PXGWGW', 2023, '', 'UMAR', '', 'HARISU', 'm', '1019433600', 'GADADIN DUTSE', '1', '1', 'GADADIN DUTSE', '1', '1', 'NIGERIA', '12405912839', NULL, NULL, NULL, '09126636767', '', 'ZAI PRIMARY SCHOOL', 'KAYA BABBA SECONDARY SCHOOL', 'JIGAWA STATE POLYTECNIC DUTSE', '', 'FSLC', 'LOWER RESULT', '', NULL, NULL, NULL, NULL, NULL, 14, '1689350063', 0, 0, 0, 0, 0),
	(31, 'NONPYI', 2023, '31_profile.png', 'ADAM', 'YAU', 'ABUBAKAR', 'm', '216518400', 'BARANDA TOWN', '1', '1', 'SABON GARIN DANMASARA', '1', '1', 'NIGERIA', '52369875121', '31_declaration.png', '31_indigene.png', '31_nin.png', '08065526669', '', 'IUYRJ  Y', 'GV BHFD GGV BHFD GGV BHFD GGV BHFD G', 'GV BHFD GGV BHFD GGV BHFD GGV BHFD G', 'NIL', 'F.L.S.C', 'GV BHFD GGV BHFD GGV BHFD GGV BHFD G', 'NIL', NULL, NULL, NULL, NULL, NULL, 17, '1689675437', 1, 0, 0, 0, 0),
	(32, 'USPKVE', 2023, '', '', '', '', 'Choose gender', '0', '', '0', '0', '', '0', '0', '', '', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, '1693913928', 0, 0, 0, 0, 0),
	(33, 'FRIWTG', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879593', 0, 0, 0, 0, 0),
	(34, 'WSNQMA', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879751', 0, 0, 0, 0, 0),
	(35, 'WLRHUR', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879755', 0, 0, 0, 0, 0),
	(36, 'KKJMLV', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879757', 0, 0, 0, 0, 0),
	(37, 'GMFWKR', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879758', 0, 0, 0, 0, 0),
	(38, 'ZWCAKL', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879792', 0, 0, 0, 0, 0),
	(39, 'ALEUBT', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879795', 0, 0, 0, 0, 0),
	(40, 'OJXSAV', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879798', 0, 0, 0, 0, 0),
	(41, 'ARQFDK', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879800', 0, 0, 0, 0, 0),
	(42, 'WCGFNZ', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879802', 0, 0, 0, 0, 0),
	(43, 'LTJZFK', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879803', 0, 0, 0, 0, 0),
	(44, 'FGAGMV', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879804', 0, 0, 0, 0, 0),
	(45, 'XLVOSJ', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879806', 0, 0, 0, 0, 0),
	(46, 'FYBLUE', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879807', 0, 0, 0, 0, 0),
	(47, 'OOEYLZ', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879820', 0, 0, 0, 0, 0),
	(48, 'UCIDZM', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879823', 0, 0, 0, 0, 0),
	(49, 'JGEEJL', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879834', 0, 0, 0, 0, 0),
	(50, 'FLURSD', 2023, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1699879865', 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `recruitment` ENABLE KEYS */;

-- Dumping structure for table recruitment.recruitment_level
DROP TABLE IF EXISTS `recruitment_level`;
CREATE TABLE IF NOT EXISTS `recruitment_level` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_level` varchar(50) NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.recruitment_level: ~6 rows (approximately)
/*!40000 ALTER TABLE `recruitment_level` DISABLE KEYS */;
INSERT INTO `recruitment_level` (`rec_id`, `rec_level`) VALUES
	(13, 'Constable'),
	(14, 'Officer'),
	(15, 'General Duty'),
	(16, 'Medical Attendance'),
	(17, 'Special Duty I'),
	(18, 'Special Duty II');
/*!40000 ALTER TABLE `recruitment_level` ENABLE KEYS */;

-- Dumping structure for table recruitment.recruitment_release
DROP TABLE IF EXISTS `recruitment_release`;
CREATE TABLE IF NOT EXISTS `recruitment_release` (
  `rec_year` int(11) NOT NULL DEFAULT '0',
  `rec_start` int(11) NOT NULL DEFAULT '0',
  `rec_stop` int(11) NOT NULL DEFAULT '0',
  `rec_setter` int(11) NOT NULL DEFAULT '0',
  `rec_release` int(11) NOT NULL DEFAULT '0',
  `rec_release_till` int(11) NOT NULL DEFAULT '0',
  `rec_releaser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.recruitment_release: ~0 rows (approximately)
/*!40000 ALTER TABLE `recruitment_release` DISABLE KEYS */;
INSERT INTO `recruitment_release` (`rec_year`, `rec_start`, `rec_stop`, `rec_setter`, `rec_release`, `rec_release_till`, `rec_releaser`) VALUES
	(2023, 1699228800, 1700438400, 1, 1700438400, 1703894400, 1);
/*!40000 ALTER TABLE `recruitment_release` ENABLE KEYS */;

-- Dumping structure for table recruitment.secondary_details
DROP TABLE IF EXISTS `secondary_details`;
CREATE TABLE IF NOT EXISTS `secondary_details` (
  `uid` int(11) NOT NULL,
  `sbj_1_type` int(11) DEFAULT NULL,
  `sbj_2_type` int(11) DEFAULT NULL,
  `sbj_3_type` int(11) DEFAULT NULL,
  `sbj_4_type` int(11) DEFAULT NULL,
  `sbj_5_type` int(11) DEFAULT NULL,
  `sbj_6_type` int(11) DEFAULT NULL,
  `sbj_7_type` int(11) DEFAULT NULL,
  `sbj_8_type` int(11) DEFAULT NULL,
  `sbj_9_type` int(11) DEFAULT NULL,
  `sbj_1` int(11) DEFAULT NULL,
  `sbj_2` int(11) DEFAULT NULL,
  `sbj_3` int(11) DEFAULT NULL,
  `sbj_4` int(11) DEFAULT NULL,
  `sbj_5` int(11) DEFAULT NULL,
  `sbj_6` int(11) DEFAULT NULL,
  `sbj_7` int(11) DEFAULT NULL,
  `sbj_8` int(11) DEFAULT NULL,
  `sbj_9` int(11) DEFAULT NULL,
  `sbj_1_grd` int(11) DEFAULT NULL,
  `sbj_2_grd` int(11) DEFAULT NULL,
  `sbj_3_grd` int(11) DEFAULT NULL,
  `sbj_4_grd` int(11) DEFAULT NULL,
  `sbj_5_grd` int(11) DEFAULT NULL,
  `sbj_6_grd` int(11) DEFAULT NULL,
  `sbj_7_grd` int(11) DEFAULT NULL,
  `sbj_8_grd` int(11) DEFAULT NULL,
  `sbj_9_grd` int(11) DEFAULT NULL,
  `sbj_1_exam_number` varchar(15) DEFAULT NULL,
  `sbj_2_exam_number` varchar(15) DEFAULT NULL,
  `sbj_3_exam_number` varchar(15) DEFAULT NULL,
  `sbj_4_exam_number` varchar(15) DEFAULT NULL,
  `sbj_5_exam_number` varchar(15) DEFAULT NULL,
  `sbj_6_exam_number` varchar(15) DEFAULT NULL,
  `sbj_7_exam_number` varchar(15) DEFAULT NULL,
  `sbj_8_exam_number` varchar(15) DEFAULT NULL,
  `sbj_9_exam_number` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.secondary_details: 15 rows
/*!40000 ALTER TABLE `secondary_details` DISABLE KEYS */;
INSERT INTO `secondary_details` (`uid`, `sbj_1_type`, `sbj_2_type`, `sbj_3_type`, `sbj_4_type`, `sbj_5_type`, `sbj_6_type`, `sbj_7_type`, `sbj_8_type`, `sbj_9_type`, `sbj_1`, `sbj_2`, `sbj_3`, `sbj_4`, `sbj_5`, `sbj_6`, `sbj_7`, `sbj_8`, `sbj_9`, `sbj_1_grd`, `sbj_2_grd`, `sbj_3_grd`, `sbj_4_grd`, `sbj_5_grd`, `sbj_6_grd`, `sbj_7_grd`, `sbj_8_grd`, `sbj_9_grd`, `sbj_1_exam_number`, `sbj_2_exam_number`, `sbj_3_exam_number`, `sbj_4_exam_number`, `sbj_5_exam_number`, `sbj_6_exam_number`, `sbj_7_exam_number`, `sbj_8_exam_number`, `sbj_9_exam_number`) VALUES
	(13, 2, 2, 1, 1, 1, 1, 2, 2, NULL, 7, 10, 3, 2, 13, 1, 5, 1, NULL, 5, 1, 2, 3, 3, 7, 7, 6, NULL, '89437345DND', '098746543ER', '89437345DND', '89437345DND', '89437345DND', '89437345DND', '89437345DND', '89437345DND', NULL),
	(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(15, 1, 1, 1, 1, 1, 1, 1, 2, NULL, 1, 2, 3, 4, 5, 6, 8, 7, NULL, 1, 4, 2, 4, 5, 2, 3, 5, NULL, '803288590HB', '803288590HB', '803288590HB', '803288590HB', '803288590HB', '803288590HB', '803288590HB', '9988784388GD', NULL),
	(16, 1, 1, 1, 2, 2, 2, 2, 2, NULL, 1, 2, 3, 4, 5, 6, 7, 8, NULL, 1, 1, 2, 2, 3, 1, 2, 1, NULL, '676856767GH', '676856767GH', '676856767GH', '676856767GH', '676856767GH', '676856767GH', '676856767GH', '676856767GH', NULL),
	(23, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', '', '', '', '', '', '', '', NULL),
	(22, 1, 1, 1, 1, 1, 1, 2, 2, NULL, 1, 2, 3, 4, 5, 6, 7, 8, NULL, 1, 2, 3, 5, 3, 4, 2, 6, NULL, '793836879028FR', '793836879028FR', '793836879028FR', '793836879028FR', '793836879028FR', '793836879028FR', '572553782663GP', '572553782663GP', NULL),
	(24, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '', '', '', '', '', '', '', '', NULL),
	(25, 1, 1, 1, 1, 2, 0, 0, 0, NULL, 2, 10, 6, 8, 5, 0, 0, 0, NULL, 2, 5, 1, 2, 2, 0, 0, 0, NULL, '7747885489YH', '7747885489YH', '7747885489YH', '7747885489YH', '46545476564TH', '', '', '', NULL),
	(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(27, 1, 2, 0, 0, 0, 0, 0, 0, NULL, 1, 3, 0, 0, 0, 0, 0, 0, NULL, 1, 3, 0, 0, 0, 0, 0, 0, NULL, '326578DXS', '2657pewhy5', '', '', '', '', '', '', NULL),
	(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(29, 1, 0, 1, 1, 1, 1, 1, 1, NULL, 1, 2, 3, 4, 5, 7, 13, 9, NULL, 2, 3, 4, 4, 4, 3, 4, 1, NULL, '6366498364GV', '6366498364GV', '6366498364GV', '6366498364GV', '6366498364GV', '6366498364GV', '6366498364GV', '6366498364GV', NULL),
	(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(31, 1, 1, 0, 0, 0, 0, 0, 0, 0, 4, 2, 0, 0, 0, 0, 0, 0, 0, 1, 2, 0, 0, 0, 0, 0, 0, 0, '548690435GP', '548690435GP', '', '', '', '', '', '', ''),
	(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(49, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `secondary_details` ENABLE KEYS */;

-- Dumping structure for table recruitment.staffs
DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `reg` int(11) NOT NULL DEFAULT '0',
  `gender` varchar(1) NOT NULL DEFAULT 'm',
  `dob` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.staffs: ~5 rows (approximately)
/*!40000 ALTER TABLE `staffs` DISABLE KEYS */;
INSERT INTO `staffs` (`staff_id`, `username`, `firstname`, `lastname`, `email`, `phone`, `reg`, `gender`, `dob`, `type`, `password`) VALUES
	(1, 'umtab', 'Umar', 'Attahir', 'umartahirbako@gmail.com', '08131168825', 1688643843, 'm', 796262400, 1, '$2y$10$U5PLvdVcxb3B.H.yoHEWueTE/Iw94hr8lJWjQqKIXNJyenvyP0poe'),
	(5, 'muhammad', 'Muhammad', 'Magaji', 'mmagaji@umtab.com', '989889888', 1688647650, 'm', 0, 0, '$2y$10$4BMVEqWyiQGgd5ePIlM5YulSsuXEXbO/DuaGZs9zkksXXNwR4q6p6'),
	(6, 'attahir', 'Attahir', 'Abdulhamid', 'attahir@umtab.com', '08140813821', 1688647924, 'm', 946684800, 1, '$2y$10$IAMfKB2bV8HP5d2rKsCWJeulu.r3h4z2xOkKg3utbOm2bf8JcUU5O'),
	(7, 'sulaiman', 'Sulaiman', 'Attahir', 'sattahir@umtab.com', '0908379798', 1689157225, 'm', 978307200, 2, '$2y$10$P27ePXjZV5VCbUvng3BBTe1KX8XT.UgRLeZgyg.IWqwwbq9JreshS'),
	(8, 'jibrin', 'Jibrin', 'Idris', 'jibrinidris@umtab.com', '09037839893', 1689257387, 'm', 1009843200, 2, '$2y$10$6SrhzRcrGusXFRCK3HSThuTBkv0sqxQPH4ypuTRyuH8pFt2JLfCIu');
/*!40000 ALTER TABLE `staffs` ENABLE KEYS */;

-- Dumping structure for table recruitment.states
DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(20) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.states: ~37 rows (approximately)
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` (`st_id`, `st_name`) VALUES
	(1, 'Jigawa'),
	(2, 'Kano'),
	(3, 'katsina'),
	(4, 'bauchi'),
	(5, 'Abia'),
	(6, 'adamawa'),
	(7, 'oyo'),
	(8, 'FCT (Abuja)'),
	(9, 'kebbi'),
	(10, 'Akwa Ibom'),
	(11, 'anambra'),
	(12, 'bayelsa'),
	(13, 'benue'),
	(14, 'delta'),
	(15, 'edo'),
	(16, 'kaduna'),
	(17, 'nasarawa'),
	(18, 'Ondo'),
	(19, 'osun'),
	(20, 'ogun'),
	(21, 'Platueau'),
	(22, 'yobe'),
	(23, 'zamfara'),
	(24, 'Taraba'),
	(25, 'imo'),
	(26, 'kwara'),
	(27, 'lagos'),
	(28, 'ebonyi'),
	(29, 'gombe'),
	(30, 'borno'),
	(31, 'niger'),
	(32, 'kogi'),
	(33, 'enugu'),
	(34, 'Ekiti'),
	(35, 'Sokoto'),
	(36, 'cross river'),
	(37, 'rivers');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;

-- Dumping structure for table recruitment.subjects
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `subj_id` int(11) NOT NULL AUTO_INCREMENT,
  `subj_name` varchar(20) NOT NULL,
  PRIMARY KEY (`subj_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.subjects: ~13 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`subj_id`, `subj_name`) VALUES
	(1, 'mathematics'),
	(2, 'english language'),
	(3, 'islamic studies'),
	(4, 'physics'),
	(5, 'chemistry'),
	(6, 'biology'),
	(7, 'computer'),
	(8, 'geography'),
	(9, 'hausa language'),
	(10, 'government'),
	(11, 'commerce'),
	(12, 'civic eduation'),
	(13, 'agriculture');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table recruitment.subject_grade
DROP TABLE IF EXISTS `subject_grade`;
CREATE TABLE IF NOT EXISTS `subject_grade` (
  `grd_id` int(11) NOT NULL AUTO_INCREMENT,
  `grd_name` varchar(20) NOT NULL,
  `grd_char` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`grd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.subject_grade: ~9 rows (approximately)
/*!40000 ALTER TABLE `subject_grade` DISABLE KEYS */;
INSERT INTO `subject_grade` (`grd_id`, `grd_name`, `grd_char`) VALUES
	(1, 'distinction', 'a1'),
	(2, 'very good', 'b2'),
	(3, 'good', 'b3'),
	(4, 'credit', 'c4'),
	(5, 'credit', 'c5'),
	(6, 'credit', 'c6'),
	(7, 'pass', 'd7'),
	(8, 'pass', 'e8'),
	(9, 'fail', 'f9');
/*!40000 ALTER TABLE `subject_grade` ENABLE KEYS */;

-- Dumping structure for table recruitment.subject_type
DROP TABLE IF EXISTS `subject_type`;
CREATE TABLE IF NOT EXISTS `subject_type` (
  `sbj_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `sbj_type_name` varchar(50) NOT NULL,
  `sbj_type_abbrev` varchar(10) NOT NULL,
  PRIMARY KEY (`sbj_type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.subject_type: 2 rows
/*!40000 ALTER TABLE `subject_type` DISABLE KEYS */;
INSERT INTO `subject_type` (`sbj_type_id`, `sbj_type_name`, `sbj_type_abbrev`) VALUES
	(1, 'west african examination council', 'waec'),
	(2, 'national examination council', 'neco');
/*!40000 ALTER TABLE `subject_type` ENABLE KEYS */;

-- Dumping structure for table recruitment.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `reg_date` int(11) NOT NULL,
  `reg_token` varchar(60) NOT NULL,
  `fname` varchar(15) DEFAULT NULL,
  `mname` varchar(15) DEFAULT NULL,
  `lname` varchar(15) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `lga` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `marital` varchar(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `is_staff` int(1) DEFAULT '0',
  `staff_level` int(1) DEFAULT '0',
  `activate` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table recruitment.users: 15 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`uid`, `fullname`, `email`, `pass`, `reg_date`, `reg_token`, `fname`, `mname`, `lname`, `address`, `lga`, `state`, `marital`, `gender`, `dob`, `is_staff`, `staff_level`, `activate`) VALUES
	(15, 'maryam attahir', 'maryamattahir@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1681342261, '0TyIvwrY9brJ1iLAelIok0gWjfzKvJCrVijKaoGyqFJDc3NPoH', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 1, 0, 0),
	(13, 'UMAR TAHIR BAKO', 'umartahirbako@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1680133449, '563sjYD7cFBwWBeuwhyD-HbMtfkEDsaVkYwooPSmxdK0Ri4nng', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0, 0),
	(14, 'ALI MUHD', 'ALIMUHD@GMAIL.COM', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1680550093, 'Sn1ctfBvlInW1bIhnaUDhwovp5jERHLqHq7xd6BO8M0kTr3s2X', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0, 0),
	(16, 'USMAN HARIS', 'usmhareeth@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1683218050, 'TYY8kBgEKsLRagxVEpNGVVyiZQMyJ0el5nIjSBDHdLLZ3w6IUr', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0, 0),
	(22, 'MUHAMMAD MAGAJI', 'muhammadmagaji@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1686064662, 'qUkFTIREsQ0g-wSVlbaz_AeY5PEHJS43eCEGtui0b2NVgpFYXq', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, 0, 0, 0),
	(23, 'AISHA ATTAHIR', 'aishaattahir@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1686749268, 'fLP1IqOjDTRmoSXgBXeFkZ3pCEgktRL7xYdksGvPzwb3C2GTFW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(24, 'USAMA ADAMU', 'uasamaadamu@umtab.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1686910791, 'FCUzJBCTRQmLmUr8fAoZDZDVLHlUR5brD8BhSAfq32FjSIbNYW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(25, 'RABIU HAMBALI', 'rabiuhambali@gmail.com', '$2y$10$Z/yLjmfKgH9/wc0AqCcx9O5GJgX5Z0jjX9l1pQanTQ.i3Q.zwji06', 1687278710, 'PLiEC7AJZ2f8yvoehQPiPiekp3WCJjUDrEmCc00DqRGgsLj8gw', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(26, 'SULAIMAN ATTAHIR', 'sulaiman@umtab.com', '$2y$10$r74KcFWtDBCXz854vSjQhefmYAFBytIUttIbnQKI0l5yAOidYESv2', 1689004592, 'KZlvIsGbTyUt9CXSFIgJznS4KcNwnJlyuGfsLUX7iOtReupfmY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(27, 'MARYAM ATTAHIR', 'maryam@umtab.com', '$2y$10$s9zWzRf19BFTt2MAUNaYvurMFg4Ep.7DuXv09g9IcU6VI6LNah7jW', 1689071807, '9JN_UsVP1w6DIp2diAqmJAoI6vLihNy1xdOQBfnLuVPXlRFm5X', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(28, 'ISAH AHMED', 'isahahmed@gmail.com', '$2y$10$5Ypd1/5yyP0rGlSHXJjs4OyiEPVxK3pBN.R.syFkYvYPCGkMWsdv2', 1689256371, 'UJ9hUhZNqJa6LjC6sgrjSaCwUlFbtnrAC7gGqgjEMpEbQHLKxZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(29, 'UMAR TAHIR BAKO', 'umartahirbako@yahoo.com', '$2y$10$Aarb8U0XEkKVHC.I3UwQzOfnzbTxgsdLNfukJch8F6muwzTheGkQ.', 1689256661, 'PAtEG1CVDirjlvHMCgYe6LrHWepcwTMl7b9ABxiKauB83aVCX9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(30, 'umar harisu dutse', 'umarhrs@gmail.com', '$2y$10$Ja12ccsgrreBUDPGP8g5Je5FpJ7AHBH3H5Nfi4kY5GVhuNvRWDA7O', 1689350063, 'SOWznkiG7BZpGbhCDkASmM3OFT9KNJU6LuvbM5YHXhT3hpF0sC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(31, 'ADAM YAU ABUBAKAR', 'baranda2122@gmail.com', '$2y$10$UShpBvuaIeMsOjWIbuVw8.Mw.tmj.eJ9O9gATnS2PGp9.LRmYmREi', 1689675038, 'Ffb7TuCz7t1Umj9LCLdvYRwldUmgcHzSbkjxO419DjqR9OqEeI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(32, 'HAMISU YUSUF', 'HAMISU@GMAIL.COM', '$2y$10$SbUmNSMAs2Fl/rQV0vG84u5YBXxaE1k/eAQsruPYyqkO1oRlsK0oO', 1693913928, 'Ur06qxZQgk4CFzLhMrlHol1Czimr4VDpSLcYUkeJPqMX709_DN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0),
	(33, 'AISHA ATTAHIR', 'aishaattahir@umtab.com', '$2y$10$CYNBgcea.q/NBWysl26NRe8EumMfZjpHRWXXlBnY8yVzMwGnGNgsS', 1699879593, 'KCPdekOUKl1pgmZZXFLjIljGmWAzGs2lNRbCSVhLAN3ukqtYfI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
