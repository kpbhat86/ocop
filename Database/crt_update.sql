-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2013 at 01:05 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ocopcrt`
--

-- --------------------------------------------------------

--
-- Table structure for table `drq_birth_death_info`
--

CREATE TABLE IF NOT EXISTS `drq_birth_death_info` (
  `drq_birth_death_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `birth_reason` varchar(50) DEFAULT NULL,
  `anc_1` varchar(50) DEFAULT NULL,
  `anc_2` varchar(30) DEFAULT NULL,
  `anc_3` varchar(30) DEFAULT NULL,
  `services_received` varchar(30) DEFAULT NULL,
  `treatment_visit` varchar(30) DEFAULT NULL,
  `advice_recieved` varchar(30) DEFAULT NULL,
  `pregnancy_period` varchar(50) DEFAULT NULL,
  `delivery_place` varchar(50) DEFAULT NULL,
  `delivered_home_assisted` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`drq_birth_death_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `drq_birth_death_info`
--

INSERT INTO `drq_birth_death_info` (`drq_birth_death_info_id`, `household_voters_id`, `summary_id`, `birth_reason`, `anc_1`, `anc_2`, `anc_3`, `services_received`, `treatment_visit`, `advice_recieved`, `pregnancy_period`, `delivery_place`, `delivered_home_assisted`) VALUES
(1, 'ARAO1234', 2, 'na', 'No', 'Yes', 'No', 'None', 'No', 'HIV/AIDS', 'Normal', 'Home', 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `drq_father_data`
--

CREATE TABLE IF NOT EXISTS `drq_father_data` (
  `drq_father_data` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `fatherstatus` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fatherdob` varchar(30) DEFAULT NULL,
  `childage` varchar(30) NOT NULL,
  `mrgage` varchar(30) DEFAULT NULL,
  `dateofdeath` varchar(50) NOT NULL,
  `registrationdate` varchar(50) DEFAULT NULL,
  `deathreason` varchar(30) DEFAULT NULL,
  `merragedate` varchar(30) DEFAULT NULL,
  `hospitalvisited` varchar(30) DEFAULT NULL,
  `reasonforvisit` varchar(50) DEFAULT NULL,
  `sfatheroccupation` varchar(50) DEFAULT NULL,
  `fathereducation` varchar(30) DEFAULT NULL,
  `fathereincome` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drq_father_data`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `drq_father_data`
--

INSERT INTO `drq_father_data` (`drq_father_data`, `household_voters_id`, `summary_id`, `fatherstatus`, `fathername`, `fatherdob`, `childage`, `mrgage`, `dateofdeath`, `registrationdate`, `deathreason`, `merragedate`, `hospitalvisited`, `reasonforvisit`, `sfatheroccupation`, `fathereducation`, `fathereincome`, `creation_date`) VALUES
(1, 'HH1', 1, 'available', 'ABC', 'undefined', 'aaa', 'aa', 'aaa', 'Yes', 'aaa', 'aa', 'Yes', 'gfdgs', 'dsgds', 'dsgsdg', 'dsgsdg', '2012-09-12 17:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `drq_general_info`
--

CREATE TABLE IF NOT EXISTS `drq_general_info` (
  `drq_general_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `death_reason` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `dod` varchar(30) DEFAULT NULL,
  `periodfordeath` varchar(30) NOT NULL,
  `deathreg` varchar(30) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `mothercarrying` varchar(50) DEFAULT NULL,
  `anc2` varchar(30) DEFAULT NULL,
  `anc3` varchar(30) DEFAULT NULL,
  `services` varchar(30) DEFAULT NULL,
  `visitinghospital` varchar(50) DEFAULT NULL,
  `pregnecyperiod` varchar(50) DEFAULT NULL,
  `deleveryplace` varchar(30) DEFAULT NULL,
  `childedustatus` varchar(30) DEFAULT NULL,
  `birthorder` varchar(30) DEFAULT NULL,
  `immudeath` varchar(50) DEFAULT NULL,
  `anc1` varchar(50) DEFAULT NULL,
  `treatmentstatus3` varchar(30) DEFAULT NULL,
  `deleveryassist` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drq_general_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `drq_general_info`
--

INSERT INTO `drq_general_info` (`drq_general_id`, `household_voters_id`, `summary_id`, `death_reason`, `dob`, `dod`, `periodfordeath`, `deathreg`, `gender`, `mothercarrying`, `anc2`, `anc3`, `services`, `visitinghospital`, `pregnecyperiod`, `deleveryplace`, `childedustatus`, `birthorder`, `immudeath`, `anc1`, `treatmentstatus3`, `deleveryassist`, `creation_date`) VALUES
(1, 'HH1', 1, 'malaria', '1987-10-10', '2012-09-11', 'aweek', 'No', '1', 'na', 'Yes', 'No', 'na', 'na', 'normal', 'home', 'na', 'na', 'na', 'No', 'Yes', 'dayi', '2012-09-12 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `drq_immunization`
--

CREATE TABLE IF NOT EXISTS `drq_immunization` (
  `drq_immunization_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `bcgandopv` varchar(50) NOT NULL,
  `hpatities1` varchar(50) DEFAULT NULL,
  `dptandopv` varchar(30) DEFAULT NULL,
  `hpatities2` varchar(30) DEFAULT NULL,
  `dpv2andopv3` varchar(30) DEFAULT NULL,
  `dpv3andopv4` varchar(30) DEFAULT NULL,
  `hepatitiesB3` varchar(30) DEFAULT NULL,
  `measlesandopv5` varchar(50) NOT NULL,
  `mmr` varchar(50) DEFAULT NULL,
  `booster1` varchar(30) DEFAULT NULL,
  `typhoid` varchar(30) DEFAULT NULL,
  `booster2` varchar(30) DEFAULT NULL,
  `tetanustoxid1` varchar(30) DEFAULT NULL,
  `tetanustoxide2` varchar(30) DEFAULT NULL,
  `hib1` varchar(100) DEFAULT NULL,
  `hib2` varchar(30) DEFAULT NULL,
  `hib3` varchar(30) DEFAULT NULL,
  `hibbooster` varchar(30) DEFAULT NULL,
  `hepa1` varchar(30) DEFAULT NULL,
  `hepa2` varchar(30) DEFAULT NULL,
  `vita` varchar(30) DEFAULT NULL,
  `chicknpox` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drq_immunization_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `drq_immunization`
--

INSERT INTO `drq_immunization` (`drq_immunization_id`, `household_voters_id`, `summary_id`, `bcgandopv`, `hpatities1`, `dptandopv`, `hpatities2`, `dpv2andopv3`, `dpv3andopv4`, `hepatitiesB3`, `measlesandopv5`, `mmr`, `booster1`, `typhoid`, `booster2`, `tetanustoxid1`, `tetanustoxide2`, `hib1`, `hib2`, `hib3`, `hibbooster`, `hepa1`, `hepa2`, `vita`, `chicknpox`, `creation_date`) VALUES
(1, 'HH1', 1, 'given', 'given', 'notgiven', 'notgiven', 'dnr', 'given', 'notgiven', 'notgiven', 'dnr', 'notgiven', 'dnr', 'notgiven', 'given', 'dnr', 'given', 'given', 'notgiven', 'dnr', 'dnr', 'dnr', 'given', 'given', '2012-09-12 16:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `drq_mother_data`
--

CREATE TABLE IF NOT EXISTS `drq_mother_data` (
  `drq_mother_data` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_dob` varchar(30) DEFAULT NULL,
  `motherdeathstatus` varchar(30) NOT NULL,
  `periodofdeath` varchar(30) DEFAULT NULL,
  `services_recieved` varchar(50) NOT NULL,
  `pregnancyperiod` varchar(50) DEFAULT NULL,
  `deliveryplace` varchar(30) DEFAULT NULL,
  `deliveryassistby` varchar(30) DEFAULT NULL,
  `hospitaldistance` varchar(30) DEFAULT NULL,
  `hospitaltype` varchar(50) DEFAULT NULL,
  `amountpaid` varchar(50) DEFAULT NULL,
  `hospital_reason_anc1` varchar(30) DEFAULT NULL,
  `hospital_reason_anc2` varchar(30) DEFAULT NULL,
  `hospital_reason_anc3` varchar(30) DEFAULT NULL,
  `deliverytype` varchar(50) DEFAULT NULL,
  `deliveryexplanation` varchar(50) DEFAULT NULL,
  `birthchild` varchar(30) DEFAULT NULL,
  `hospitalvisited` varchar(30) DEFAULT NULL,
  `datevisitedhospital` varchar(30) DEFAULT NULL,
  `mrgdate` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drq_mother_data`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `drq_mother_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `drq_normal_mother_data`
--

CREATE TABLE IF NOT EXISTS `drq_normal_mother_data` (
  `drq_normal_mother_data` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `mothername` varchar(50) NOT NULL,
  `motherdob` varchar(50) NOT NULL,
  `hospitalreason` varchar(30) DEFAULT NULL,
  `mothereducation` varchar(30) NOT NULL,
  `motherage` varchar(30) DEFAULT NULL,
  `motherdeathage` varchar(50) NOT NULL,
  `deathregistration` varchar(50) DEFAULT NULL,
  `ration_status` varchar(30) DEFAULT NULL,
  `mothermrgage` varchar(30) DEFAULT NULL,
  `txtmotheroccu` varchar(30) DEFAULT NULL,
  `txtmotherdeathrsn` varchar(50) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drq_normal_mother_data`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `drq_normal_mother_data`
--


-- --------------------------------------------------------

--
-- Table structure for table `drq_summary`
--

CREATE TABLE IF NOT EXISTS `drq_summary` (
  `drq_summary_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `door_num` varchar(50) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `village` varchar(30) NOT NULL,
  `grama` varchar(30) NOT NULL,
  `taluk` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `divison` varchar(30) DEFAULT NULL,
  `headname` varchar(50) NOT NULL,
  `enumerator` varchar(50) DEFAULT NULL,
  `respondant` varchar(50) DEFAULT NULL,
  `father_death` varchar(50) DEFAULT NULL,
  `relationship` varchar(50) DEFAULT NULL,
  `child_death` varchar(50) DEFAULT NULL,
  `num_child_death` varchar(50) DEFAULT NULL,
  `num_pre_birth` varchar(50) DEFAULT NULL,
  `num_post_birth` varchar(50) DEFAULT NULL,
  `mother_death` varchar(20) DEFAULT NULL,
  `pregnancy_period` varchar(50) DEFAULT NULL,
  `general` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`drq_summary_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `drq_summary`
--

INSERT INTO `drq_summary` (`drq_summary_id`, `household_voters_id`, `door_num`, `sdate`, `village`, `grama`, `taluk`, `district`, `divison`, `headname`, `enumerator`, `respondant`, `father_death`, `relationship`, `child_death`, `num_child_death`, `num_pre_birth`, `num_post_birth`, `mother_death`, `pregnancy_period`, `general`) VALUES
(1, 'G1', '14', '2012-09-10', 'Itanal ', 'Itanal ', 'Rayabagh', 'belgaum', '0', 'Gaurav', 'XYZ', 'ABC', 'No', 'BRO', 'No', '0', '0', '0', 'No', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_archives`
--

CREATE TABLE IF NOT EXISTS `fuel_archives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_id` int(10) unsigned NOT NULL,
  `table_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `version` smallint(5) unsigned NOT NULL,
  `version_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `archived_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=105 ;

--
-- Dumping data for table `fuel_archives`
--

INSERT INTO `fuel_archives` (`id`, `ref_id`, `table_name`, `data`, `version`, `version_timestamp`, `archived_user_id`) VALUES
(1, 2, 'fuel_blog_categories', 'a:4:{s:2:"id";i:2;s:4:"name";s:4:"test";s:9:"permalink";s:4:"test";s:9:"published";s:3:"yes";}', 1, '2012-04-17 13:39:18', 1),
(2, 1, 'fuel_blog_users', 'a:9:{s:12:"fuel_user_id";s:1:"1";s:12:"display_name";s:3:"wer";s:7:"website";s:0:"";s:5:"about";s:0:"";s:12:"avatar_image";s:0:"";s:7:"twitter";s:0:"";s:8:"facebook";s:0:"";s:10:"date_added";s:19:"2012-04-17 07:55:47";s:6:"active";s:3:"yes";}', 1, '2012-04-17 20:24:36', 1),
(18, 6398, 'aspen_tblinwardentry', 'a:13:{s:9:"vIRnumber";s:5:"03065";s:13:"dReceivedDate";s:10:"2012-04-01";s:8:"vLorryNo";s:9:"OR16B4725";s:10:"vInvoiceNo";s:4:"6398";s:12:"dInvoiceDate";s:10:"2008-01-03";s:6:"nMatId";s:2:"11";s:6:"fWidth";s:4:"1220";s:10:"fThickness";s:3:"0.7";s:9:"fQuantity";s:4:"6575";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:1:"0";s:8:"dSysDate";s:19:"2009-06-23 13:17:00";s:8:"nPartyId";s:1:"0";}', 1, '2012-04-25 14:55:31', 1),
(4, 1743, 'aspen_tblinwardentry', 'a:13:{s:9:"vIRnumber";s:4:"1743";s:13:"dReceivedDate";s:10:"2007-09-24";s:8:"vLorryNo";s:10:"cg045 4175";s:10:"vInvoiceNo";s:3:"368";s:12:"dInvoiceDate";s:10:"2007-09-24";s:6:"nMatId";s:2:"11";s:6:"fWidth";s:4:"1220";s:10:"fThickness";s:4:"0.65";s:9:"fQuantity";s:4:"1825";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:1:"0";s:8:"dSysDate";s:19:"2008-02-12 12:03:00";s:8:"nPartyId";s:1:"0";}', 1, '2012-04-24 10:01:45', 1),
(29, 1, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:7:"asdadsa";s:6:"nMatId";i:1;}', 1, '2012-05-11 10:42:50', 1),
(30, 1, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:11:"asdadsahhhh";s:6:"nMatId";s:1:"1";}', 2, '2012-05-11 13:50:28', 1),
(31, 43, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:2:"36";s:6:"nMatId";i:43;}', 1, '2012-05-11 14:02:33', 1),
(32, 1, 'aspen_tblmatdescription', 'a:1:{s:6:"nMatId";i:1;}', 3, '2012-05-11 14:03:14', 1),
(8, 19677, 'aspen_tblinwardentry', 'a:13:{s:9:"vIRnumber";s:5:"19677";s:13:"dReceivedDate";s:10:"2011-12-12";s:8:"vLorryNo";s:9:"KA10 9000";s:10:"vInvoiceNo";s:10:"2044708273";s:12:"dInvoiceDate";s:10:"2011-12-12";s:6:"nMatId";s:2:"12";s:6:"fWidth";s:4:"1250";s:10:"fThickness";s:3:"0.8";s:9:"fQuantity";s:4:"6468";s:7:"vStatus";s:13:"Ready To Bill";s:7:"fLength";s:1:"0";s:8:"dSysDate";s:19:"2011-12-13 16:37:00";s:8:"nPartyId";s:1:"0";}', 1, '2012-04-25 12:53:06', 1),
(47, 246, 'aspen_tblpartydetails', 'a:9:{s:8:"nPartyId";i:246;s:10:"nPartyName";s:14:"hoodukutesting";s:9:"vAddress1";s:11:"2-3-2 block";s:9:"vAddress2";s:11:"koramangala";s:5:"vCity";s:9:"Bangalore";s:6:"vState";s:0:"";s:8:"vCountry";s:0:"";s:6:"nPinId";s:2:"32";s:10:"nTinNumber";s:6:"545454";}', 1, '2012-05-14 12:13:34', 1),
(10, 2849, 'aspen_tblinwardentry', 'a:13:{s:9:"vIRnumber";s:4:"2849";s:13:"dReceivedDate";s:10:"2007-12-25";s:8:"vLorryNo";s:12:"KA 21 A 0328";s:10:"vInvoiceNo";s:4:"5035";s:12:"dInvoiceDate";s:10:"2007-12-25";s:6:"nMatId";s:2:"11";s:6:"fWidth";s:4:"1250";s:10:"fThickness";s:3:"0.6";s:9:"fQuantity";s:4:"7190";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:1:"0";s:8:"dSysDate";s:19:"2008-02-14 20:01:00";s:8:"nPartyId";s:1:"0";}', 1, '2012-04-25 13:14:37', 1),
(48, 45, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:9:"ttgtgtgtg";s:6:"nMatId";i:45;}', 1, '2012-05-15 19:51:43', 1),
(19, 19677, 'aspen_tblinwardentry', 'a:13:{s:9:"vIRnumber";s:5:"19647";s:13:"dReceivedDate";s:10:"2011-12-12";s:8:"vLorryNo";s:9:"KA10 3444";s:10:"vInvoiceNo";s:10:"2044708245";s:12:"dInvoiceDate";s:10:"2011-12-12";s:6:"nMatId";s:2:"12";s:6:"fWidth";s:4:"1250";s:10:"fThickness";s:3:"0.8";s:9:"fQuantity";s:4:"6468";s:7:"vStatus";s:13:"Ready To Bill";s:7:"fLength";s:1:"0";s:8:"dSysDate";s:19:"2011-12-13 16:37:00";s:8:"nPartyId";s:1:"0";}', 2, '2012-04-25 16:27:57', 1),
(26, 1, 'aspen_tblowner', 'a:2:{s:9:"vIRnumber";s:0:"";s:13:"nOwnerPartyId";b:1;}', 1, '2012-05-03 10:00:47', 1),
(44, 1235, 'aspen_tblcuttinginstruction', 'a:6:{s:9:"vIRnumber";s:4:"1235";s:4:"nSno";s:2:"44";s:5:"dDate";s:10:"2012-05-15";s:7:"nLength";s:1:"2";s:11:"nNoOfPieces";s:1:"2";s:12:"nTotalWeight";s:4:"2000";}', 1, '2012-05-14 10:16:30', 1),
(46, 9, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:14:"hoodukutesting";s:6:"nMatId";i:9;}', 1, '2012-05-14 12:12:18', 1),
(33, 2, 'aspen_tblmatdescription', 'a:1:{s:6:"nMatId";i:2;}', 1, '2012-05-11 14:04:17', 1),
(34, 4, 'aspen_tblmatdescription', 'a:1:{s:6:"nMatId";i:4;}', 1, '2012-05-11 14:04:58', 1),
(35, 4, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:1:"2";s:6:"nMatId";s:1:"5";}', 2, '2012-05-11 14:46:20', 1),
(36, 6, 'aspen_tblmatdescription', 'a:2:{s:12:"vDescription";s:5:"adasd";s:6:"nMatId";i:6;}', 1, '2012-05-11 14:54:24', 1),
(37, 245, 'aspen_tblpartydetails', 'a:9:{s:8:"nPartyId";i:245;s:10:"nPartyName";s:7:"testing";s:9:"vAddress1";s:11:"2-3-2 block";s:9:"vAddress2";s:11:"koramangala";s:5:"vCity";s:9:"bangalore";s:6:"vState";s:9:"karnataka";s:8:"vCountry";s:1:"0";s:6:"nPinId";s:2:"32";s:10:"nTinNumber";s:4:"2345";}', 1, '2012-05-11 19:16:22', 1),
(38, 1, 'aspen_tblpartydetails', 'a:9:{s:8:"nPartyId";i:1;s:10:"nPartyName";s:0:"";s:9:"vAddress1";s:11:"2-3-2 block";s:9:"vAddress2";s:11:"koramangala";s:5:"vCity";s:9:"bangalore";s:6:"vState";s:9:"karnataka";s:8:"vCountry";s:5:"India";s:6:"nPinId";s:5:"56001";s:10:"nTinNumber";s:4:"2356";}', 1, '2012-05-14 06:49:57', 1),
(39, 12, 'aspen_tblpartydetails', 'a:9:{s:8:"nPartyId";i:12;s:10:"nPartyName";s:1:"1";s:9:"vAddress1";s:12:"2-3a-2 block";s:9:"vAddress2";s:11:"koramangala";s:5:"vCity";s:9:"Bangalore";s:6:"vState";s:9:"karnataka";s:8:"vCountry";s:5:"India";s:6:"nPinId";s:6:"589666";s:10:"nTinNumber";s:6:"123334";}', 1, '2012-05-14 07:13:47', 1),
(40, 2, 'aspen_tblpartydetails', 'a:8:{s:8:"nPartyId";i:2;s:9:"vAddress1";s:13:"42-3a-2 block";s:9:"vAddress2";s:10:"HSR Layout";s:5:"vCity";s:9:"Mangalore";s:6:"vState";s:9:"karnataka";s:8:"vCountry";s:5:"India";s:6:"nPinId";s:5:"56001";s:10:"nTinNumber";s:5:"78787";}', 1, '2012-05-14 07:16:14', 1),
(41, 3, 'aspen_tblpartydetails', 'a:8:{s:8:"nPartyId";i:3;s:9:"vAddress1";s:7:"23-9-8A";s:9:"vAddress2";s:11:"Rajajinagar";s:5:"vCity";s:9:"Bangalore";s:6:"vState";s:9:"Karnataka";s:8:"vCountry";s:5:"India";s:6:"nPinId";s:6:"560026";s:10:"nTinNumber";s:6:"111111";}', 1, '2012-05-14 08:41:02', 1),
(42, 5, 'aspen_tblpartydetails', 'a:8:{s:8:"nPartyId";i:5;s:9:"vAddress1";s:13:"2-3aa-2 block";s:9:"vAddress2";s:10:"HSR Layout";s:5:"vCity";s:9:"Bangalore";s:6:"vState";s:9:"Karnataka";s:8:"vCountry";s:5:"India";s:6:"nPinId";s:6:"560021";s:10:"nTinNumber";s:8:"12333411";}', 1, '2012-05-14 09:06:11', 1),
(93, 1, 'aspen_tblinwardentry', 'a:14:{s:9:"vIRnumber";s:4:"0004";s:13:"dReceivedDate";b:1;s:8:"vLorryNo";s:10:"KA-01-2346";s:10:"vInvoiceNo";s:4:"0004";s:12:"dInvoiceDate";s:10:"2012-06-15";s:6:"nMatId";s:2:"27";s:6:"fWidth";s:4:"1500";s:10:"fThickness";s:3:"0.6";s:9:"fQuantity";s:4:"7000";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:0:"";s:8:"dSysDate";s:1:"0";s:8:"nPartyId";s:3:"207";s:11:"vHeatnumber";s:0:"";}', 47, '2012-06-22 18:28:41', 1),
(92, 1, 'aspen_tblinwardentry', 'a:14:{s:9:"vIRnumber";s:4:"0003";s:13:"dReceivedDate";b:1;s:8:"vLorryNo";s:10:"PY-01-5678";s:10:"vInvoiceNo";s:5:"00003";s:12:"dInvoiceDate";s:10:"2012-06-23";s:6:"nMatId";s:2:"37";s:6:"fWidth";s:4:"1200";s:10:"fThickness";s:3:"0.5";s:9:"fQuantity";s:4:"5000";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:0:"";s:8:"dSysDate";s:1:"0";s:8:"nPartyId";s:3:"227";s:11:"vHeatnumber";s:0:"";}', 46, '2012-06-22 18:16:22', 1),
(70, 2, 'fuel_suppliers', 'a:16:{s:2:"id";i:2;s:4:"name";s:14:"Anupama Shenoy";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:3:"124";s:11:"description";s:5:"INDIA";s:10:"date_added";s:19:"2012-06-15 02:48:36";s:10:"created_by";s:7:"Anupama";s:13:"last_modified";s:19:"2012-06-15 02:48:36";s:11:"modified_by";s:6:"Shenoy";s:11:"supplier_id";s:4:"1234";s:10:"address_id";s:4:"5678";s:17:"address_type_code";s:3:"111";s:9:"date_from";s:10:"2012-06-01";s:7:"date_to";s:10:"2012-06-13";}', 3, '2012-06-15 15:17:48', 1),
(63, 2, 'fuel_suppliers', 'a:16:{s:2:"id";i:2;s:4:"name";s:14:"Anupama Shenoy";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9739459122";s:12:"supplier_fax";s:3:"124";s:11:"description";s:3:"123";s:10:"date_added";s:19:"2012-06-14 23:44:03";s:10:"created_by";s:2:"11";s:13:"last_modified";s:19:"2012-06-14 23:44:03";s:11:"modified_by";s:0:"";s:11:"supplier_id";s:0:"";s:10:"address_id";s:0:"";s:17:"address_type_code";s:0:"";s:9:"date_from";s:1:"0";s:7:"date_to";s:1:"0";}', 1, '2012-06-15 12:13:15', 1),
(64, 2, 'fuel_suppliers', 'a:16:{s:2:"id";s:1:"2";s:4:"name";s:14:"Anupama Shenoy";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9739459122";s:12:"supplier_fax";s:3:"124";s:11:"description";s:5:"asads";s:10:"date_added";s:19:"2012-06-14 23:44:03";s:10:"created_by";s:10:"2012-06-15";s:13:"last_modified";s:19:"2012-06-15 00:53:18";s:11:"modified_by";s:1:"0";s:11:"supplier_id";s:1:"0";s:10:"address_id";s:1:"0";s:17:"address_type_code";s:1:"0";s:9:"date_from";s:1:"0";s:7:"date_to";s:1:"0";}', 2, '2012-06-15 13:22:30', 1),
(75, 1, 'fuel_item_suppliers', 'a:16:{s:2:"id";i:1;s:11:"supplier_id";s:1:"1";s:22:"value_supplied_to_date";s:3:"123";s:25:"quantity_supplied_to_date";s:3:"122";s:24:"first_item_supplied_date";s:10:"2012-06-04";s:23:"last_item_supplied_date";s:10:"2012-06-11";s:18:"delivery_lead_time";s:3:"132";s:14:"standard_price";s:3:"122";s:19:"percentage_discount";s:2:"23";s:18:"min_order_quantity";s:2:"12";s:18:"max_order_quantity";s:2:"12";s:11:"description";s:2:"12";s:10:"date_added";s:19:"2012-06-16 00:12:47";s:10:"created_by";s:3:"122";s:13:"last_modified";s:19:"2012-06-16 00:12:47";s:11:"modified_by";s:3:"321";}', 1, '2012-06-16 12:41:59', 1),
(77, 2, 'fuel_suppliers', 'a:24:{s:2:"id";i:2;s:14:"supplier_cname";s:7:"Hooduku";s:4:"name";s:14:"Anupama Shenoy";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9739459122";s:12:"supplier_fax";s:9:"123456789";s:11:"description";s:0:"";s:10:"date_added";s:19:"2012-06-16 04:51:53";s:10:"created_by";s:0:"";s:13:"last_modified";s:10:"2012-06-16";s:11:"modified_by";s:0:"";s:11:"supplier_id";s:0:"";s:10:"address_id";s:0:"";s:17:"address_type_code";s:0:"";s:9:"date_from";s:10:"2012-06-16";s:7:"date_to";s:10:"2012-06-21";s:6:"line_1";s:8:"9th Main";s:6:"line_2";s:10:"HSR Layout";s:6:"line_3";s:10:"7th sector";s:4:"city";s:9:"Bangalore";s:17:"zip_or_postalcode";s:6:"575006";s:8:"state_id";s:9:"Karnataka";s:10:"country_id";s:0:"";}', 4, '2012-06-16 17:21:05', 1),
(67, 1, 'fuel_suppliers', 'a:16:{s:2:"id";s:1:"1";s:4:"name";s:4:"abhi";s:5:"email";s:14:"arao@gmail.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:3:"124";s:11:"description";s:5:"INDIA";s:10:"date_added";s:19:"2012-06-15 02:13:59";s:10:"created_by";s:7:"Anupama";s:13:"last_modified";s:19:"2012-06-15 02:14:11";s:11:"modified_by";s:6:"Manutd";s:11:"supplier_id";s:3:"123";s:10:"address_id";s:3:"080";s:17:"address_type_code";s:3:"123";s:9:"date_from";s:10:"2012-06-06";s:7:"date_to";s:10:"2012-06-20";}', 4, '2012-06-15 14:43:23', 1),
(68, 1, 'fuel_suppliers', 'a:16:{s:2:"id";s:1:"1";s:4:"name";s:4:"abhi";s:5:"email";s:14:"arao@gmail.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:3:"124";s:11:"description";s:5:"INDIA";s:10:"date_added";s:19:"2012-06-15 02:13:59";s:10:"created_by";s:7:"Abhirao";s:13:"last_modified";s:19:"2012-06-15 02:14:38";s:11:"modified_by";s:6:"Manutd";s:11:"supplier_id";s:3:"123";s:10:"address_id";s:3:"080";s:17:"address_type_code";s:3:"123";s:9:"date_from";s:10:"2012-06-06";s:7:"date_to";s:10:"2012-06-20";}', 5, '2012-06-15 14:43:50', 1),
(69, 1, 'fuel_suppliers', 'a:1:{s:2:"id";b:1;}', 6, '2012-06-15 15:15:08', 1),
(71, 3, 'fuel_suppliers', 'a:16:{s:2:"id";i:3;s:4:"name";s:4:"abhi";s:5:"email";s:11:"def@def.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9739459122";s:12:"supplier_fax";s:3:"123";s:11:"description";s:5:"INDIA";s:10:"date_added";s:19:"2012-06-15 02:49:34";s:10:"created_by";s:10:"06/15/2012";s:13:"last_modified";s:19:"2012-06-15 02:49:34";s:11:"modified_by";s:6:"Manutd";s:11:"supplier_id";s:3:"123";s:10:"address_id";s:4:"5678";s:17:"address_type_code";s:3:"111";s:9:"date_from";s:10:"2012-06-07";s:7:"date_to";s:10:"2012-06-08";}', 1, '2012-06-15 15:18:46', 1),
(72, 4, 'fuel_suppliers', 'a:16:{s:2:"id";i:4;s:4:"name";s:4:"abhi";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:3:"123";s:11:"description";s:5:"INDIA";s:10:"date_added";s:19:"2012-06-15 02:52:44";s:10:"created_by";s:10:"06/15/2012";s:13:"last_modified";s:19:"2012-06-15 02:52:44";s:11:"modified_by";s:6:"Manutd";s:11:"supplier_id";s:3:"123";s:10:"address_id";s:4:"5678";s:17:"address_type_code";s:3:"123";s:9:"date_from";s:1:"0";s:7:"date_to";s:1:"0";}', 1, '2012-06-15 15:21:56', 1),
(73, 5, 'fuel_suppliers', 'a:16:{s:2:"id";i:5;s:4:"name";s:4:"abhi";s:5:"email";s:13:"test@test.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9739459122";s:12:"supplier_fax";s:3:"124";s:11:"description";s:7:"aabcdef";s:10:"date_added";s:19:"2012-06-15 02:55:28";s:10:"created_by";s:7:"Anupama";s:13:"last_modified";s:19:"2012-06-15 02:55:28";s:11:"modified_by";s:3:"12A";s:11:"supplier_id";s:3:"234";s:10:"address_id";s:3:"080";s:17:"address_type_code";s:3:"111";s:9:"date_from";s:1:"0";s:7:"date_to";s:1:"0";}', 1, '2012-06-15 15:24:40', 1),
(74, 1, 'fuel_suppliers', 'a:23:{s:2:"id";i:1;s:11:"supplier_id";s:1:"1";s:4:"name";s:4:"abhi";s:5:"email";s:14:"arao@gmail.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:6:"123456";s:11:"description";s:7:"aabcdef";s:10:"date_added";s:19:"2012-06-15 23:55:47";s:10:"created_by";s:0:"";s:11:"modified_by";s:0:"";s:13:"last_modified";s:10:"2012-06-15";s:10:"address_id";s:0:"";s:17:"address_type_code";s:3:"123";s:9:"date_from";s:10:"2012-06-16";s:7:"date_to";s:10:"2012-06-14";s:6:"line_1";s:6:"sddsds";s:6:"line_2";s:6:"dfdffd";s:6:"line_3";s:6:"dfdfdd";s:10:"country_id";s:2:"12";s:8:"state_id";s:4:"1223";s:4:"city";s:5:"sddds";s:17:"zip_or_postalcode";s:6:"sddsdd";}', 7, '2012-06-16 12:24:59', 1),
(76, 1, 'fuel_suppliers', 'a:24:{s:2:"id";i:1;s:14:"supplier_cname";s:5:"asdas";s:4:"name";s:6:"sadasd";s:5:"email";s:18:"anu1989s@gmail.com";s:5:"phone";s:10:"9844618604";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:3:"124";s:11:"description";s:7:"aabcdef";s:10:"date_added";s:19:"2012-06-16 00:28:21";s:10:"created_by";s:0:"";s:13:"last_modified";s:10:"2012-06-16";s:11:"modified_by";s:0:"";s:11:"supplier_id";s:0:"";s:10:"address_id";s:0:"";s:17:"address_type_code";s:3:"123";s:9:"date_from";s:10:"2012-05-29";s:7:"date_to";s:10:"2012-06-06";s:6:"line_1";s:6:"sddsds";s:6:"line_2";s:6:"dfdffd";s:6:"line_3";s:6:"dfdfdd";s:4:"city";s:5:"sddds";s:17:"zip_or_postalcode";s:6:"sddsdd";s:8:"state_id";s:4:"1223";s:10:"country_id";s:2:"12";}', 8, '2012-06-16 12:57:33', 1),
(78, 2, 'fuel_item_suppliers', 'a:16:{s:2:"id";i:2;s:11:"supplier_id";s:0:"";s:22:"value_supplied_to_date";s:3:"123";s:25:"quantity_supplied_to_date";s:3:"123";s:24:"first_item_supplied_date";s:10:"2012-06-06";s:23:"last_item_supplied_date";s:10:"2012-06-04";s:18:"delivery_lead_time";s:8:"13211111";s:14:"standard_price";s:4:"1211";s:19:"percentage_discount";s:2:"12";s:18:"min_order_quantity";s:2:"12";s:18:"max_order_quantity";s:2:"21";s:11:"description";s:0:"";s:10:"date_added";s:19:"2012-06-16 06:27:09";s:10:"created_by";s:0:"";s:13:"last_modified";s:19:"2012-06-16 06:27:09";s:11:"modified_by";s:0:"";}', 1, '2012-06-16 18:56:21', 1),
(79, 3, 'fuel_suppliers', 'a:24:{s:2:"id";i:3;s:14:"supplier_cname";s:7:"Hooduku";s:4:"name";s:14:"Anupama Shenoy";s:5:"email";s:19:"ashenoy@hooduku.com";s:5:"phone";s:10:"9739459122";s:19:"supplier_cell_phone";s:10:"9844618604";s:12:"supplier_fax";s:9:"123456789";s:11:"description";s:0:"";s:10:"date_added";s:19:"2012-06-17 20:45:28";s:10:"created_by";s:0:"";s:13:"last_modified";s:10:"2012-06-17";s:11:"modified_by";s:0:"";s:11:"supplier_id";s:0:"";s:10:"address_id";s:0:"";s:17:"address_type_code";s:0:"";s:9:"date_from";s:10:"2012-06-07";s:7:"date_to";s:10:"2012-06-20";s:6:"line_1";s:8:"9th Main";s:6:"line_2";s:10:"HSR Layout";s:6:"line_3";s:10:"7th sector";s:4:"city";s:9:"Bangalore";s:17:"zip_or_postalcode";s:6:"575006";s:8:"state_id";s:9:"Karnataka";s:10:"country_id";s:0:"";}', 2, '2012-06-18 09:14:40', 1),
(80, 3, 'fuel_item_suppliers', 'a:16:{s:2:"id";i:3;s:11:"supplier_id";s:0:"";s:22:"value_supplied_to_date";s:5:"12000";s:25:"quantity_supplied_to_date";s:2:"12";s:24:"first_item_supplied_date";s:10:"2012-06-06";s:23:"last_item_supplied_date";s:10:"2012-06-19";s:18:"delivery_lead_time";s:10:"2012-06-20";s:14:"standard_price";s:3:"100";s:19:"percentage_discount";s:2:"10";s:18:"min_order_quantity";s:2:"10";s:18:"max_order_quantity";s:2:"30";s:11:"description";s:0:"";s:10:"date_added";s:19:"2012-06-17 20:50:10";s:10:"created_by";s:0:"";s:13:"last_modified";s:19:"2012-06-17 20:50:10";s:11:"modified_by";s:0:"";}', 1, '2012-06-18 09:19:22', 1),
(81, 1, 'module_groups', 'a:6:{s:2:"id";i:1;s:4:"name";s:4:"test";s:11:"description";s:4:"test";s:6:"active";s:3:"yes";s:10:"date_added";s:19:"2012-06-18 01:57:23";s:13:"last_modified";s:19:"2012-06-18 01:57:23";}', 1, '2012-06-18 14:26:36', 1),
(94, 1, 'aspen_tblinwardentry', 'a:14:{s:9:"vIRnumber";s:10:"9999900111";s:13:"dReceivedDate";b:1;s:8:"vLorryNo";s:10:"KA-01-2345";s:10:"vInvoiceNo";s:6:"009001";s:12:"dInvoiceDate";s:10:"2012-06-27";s:6:"nMatId";s:2:"17";s:6:"fWidth";s:4:"1200";s:10:"fThickness";s:3:"0.2";s:9:"fQuantity";s:4:"3000";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:0:"";s:8:"dSysDate";s:1:"0";s:8:"nPartyId";s:3:"178";s:11:"vHeatnumber";s:0:"";}', 48, '2012-06-25 16:25:30', 1),
(95, 1, 'aspen_tblinwardentry', 'a:14:{s:9:"vIRnumber";s:4:"0005";s:13:"dReceivedDate";b:1;s:8:"vLorryNo";s:10:"KA-01-2333";s:10:"vInvoiceNo";s:5:"00005";s:12:"dInvoiceDate";s:10:"2012-06-25";s:6:"nMatId";s:2:"37";s:6:"fWidth";s:4:"1200";s:10:"fThickness";s:3:"0.3";s:9:"fQuantity";s:4:"6000";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:0:"";s:8:"dSysDate";s:1:"0";s:8:"nPartyId";s:3:"119";s:11:"vHeatnumber";s:0:"";}', 49, '2012-06-25 19:52:13', 1),
(96, 1, 'fuel_brands', 'a:3:{s:8:"brand_id";i:1;s:16:"brand_short_name";s:3:"RBK";s:10:"brand_name";s:6:"Reebok";}', 1, '2012-06-26 10:19:57', 1),
(97, 1, 'fuel_ref_item_categories', 'a:3:{s:16:"item_category_id";i:1;s:4:"name";s:18:"Reebok Buckets III";s:4:"code";s:15:"sadsfsfdfsfdsdf";}', 1, '2012-06-26 10:25:28', 1),
(98, 4, 'fuel_inventory_items', 'a:12:{s:7:"item_id";i:4;s:8:"brand_id";s:1:"1";s:16:"item_category_id";s:1:"1";s:11:"description";s:14:"adxccx ghfghgf";s:21:"average_monthly_usage";s:3:"100";s:13:"reorder_level";s:2:"12";s:16:"reorder_quantity";s:3:"221";s:18:"other_item_details";s:0:"";s:10:"created_by";s:0:"";s:12:"created_date";s:19:"1969-12-31 16:00:00";s:11:"modified_by";s:0:"";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 1, '2012-06-26 10:25:57', 1),
(91, 1, 'aspen_tblinwardentry', 'a:14:{s:9:"vIRnumber";s:4:"0002";s:13:"dReceivedDate";b:1;s:8:"vLorryNo";s:10:"KA-01-2345";s:10:"vInvoiceNo";s:5:"00002";s:12:"dInvoiceDate";s:10:"2012-06-23";s:6:"nMatId";s:2:"37";s:6:"fWidth";s:4:"1420";s:10:"fThickness";s:1:"2";s:9:"fQuantity";s:4:"6000";s:7:"vStatus";s:8:"Received";s:7:"fLength";s:3:"100";s:8:"dSysDate";s:1:"0";s:8:"nPartyId";s:3:"229";s:11:"vHeatnumber";s:3:"110";}', 45, '2012-06-22 18:05:02', 1),
(99, 1, 'fuel_inventory_lists', 'a:16:{s:7:"item_id";i:1;s:3:"sku";s:0:"";s:9:"item_name";s:0:"";s:11:"description";s:0:"";s:9:"item_cost";s:1:"0";s:11:"item_weight";s:1:"0";s:10:"brand_name";s:0:"";s:16:"quantity_on_hand";s:1:"0";s:17:"quantity_on_order";s:1:"0";s:21:"average_monthly_usage";s:1:"0";s:19:"minimum_stock_level";s:1:"0";s:16:"reorder_quantity";s:1:"0";s:11:"supplier_id";s:0:"";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"1969-12-31 16:00:00";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 1, '2012-07-18 12:48:02', 1),
(100, 1, 'fuel_inventory_lists', 'a:16:{s:7:"item_id";i:1;s:8:"item_sku";s:5:"SKU_1";s:9:"item_name";s:11:"Hide & Seek";s:11:"description";s:131:"Hide & Seek Milano is a rich and exotic cookie. Available in four flavours - Chocolate Chip, Butterscotch, Butter Nut and Choconut.";s:10:"brand_name";s:5:"Parle";s:11:"supplier_id";s:1:"4";s:9:"item_cost";s:2:"15";s:11:"item_weight";s:3:"200";s:16:"quantity_on_hand";s:3:"100";s:17:"quantity_on_order";s:1:"0";s:21:"average_monthly_usage";s:2:"25";s:19:"minimum_stock_level";s:2:"25";s:16:"reorder_quantity";s:1:"0";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"1969-12-31 16:00:00";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 2, '2012-07-18 13:04:45', 1),
(101, 2, 'fuel_inventory_lists', 'a:16:{s:7:"item_id";i:2;s:8:"item_sku";s:5:"SKU_2";s:9:"item_name";s:9:"KrackJack";s:11:"description";s:140:"KrackJack is India''s first & original sweet and salty biscuit. It is crispy and delicious with a perfect balance of sweetness and saltiness.";s:10:"brand_name";s:5:"Parle";s:11:"supplier_id";s:1:"4";s:9:"item_cost";s:2:"10";s:11:"item_weight";s:3:"100";s:16:"quantity_on_hand";s:3:"250";s:17:"quantity_on_order";s:3:"100";s:21:"average_monthly_usage";s:2:"20";s:19:"minimum_stock_level";s:1:"2";s:16:"reorder_quantity";s:1:"0";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"1969-12-31 16:00:00";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 1, '2012-07-18 13:06:42', 1),
(102, 2, 'fuel_inventory_lists', 'a:16:{s:7:"item_id";s:1:"2";s:8:"item_sku";s:5:"SKU_2";s:9:"item_name";s:9:"KrackJack";s:11:"description";s:140:"KrackJack is India''s first & original sweet and salty biscuit. It is crispy and delicious with a perfect balance of sweetness and saltiness.";s:10:"brand_name";s:5:"Parle";s:11:"supplier_id";s:1:"5";s:9:"item_cost";s:2:"10";s:11:"item_weight";s:3:"100";s:16:"quantity_on_hand";s:3:"250";s:17:"quantity_on_order";s:3:"100";s:21:"average_monthly_usage";s:2:"20";s:19:"minimum_stock_level";s:1:"2";s:16:"reorder_quantity";s:1:"0";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"0000-00-00 00:00:00";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 2, '2012-07-18 20:34:58', 1),
(103, 1, 'fuel_inventory_lists', 'a:16:{s:7:"item_id";s:1:"1";s:8:"item_sku";s:5:"SKU_1";s:9:"item_name";s:11:"Hide & Seek";s:11:"description";s:131:"Hide & Seek Milano is a rich and exotic cookie. Available in four flavours - Chocolate Chip, Butterscotch, Butter Nut and Choconut.";s:10:"brand_name";s:5:"Parle";s:11:"supplier_id";s:1:"4";s:9:"item_cost";s:2:"15";s:11:"item_weight";s:3:"200";s:16:"quantity_on_hand";s:3:"119";s:17:"quantity_on_order";s:1:"0";s:21:"average_monthly_usage";s:2:"25";s:19:"minimum_stock_level";s:2:"25";s:16:"reorder_quantity";s:1:"0";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"2012-07-25 17:50:42";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 3, '2012-07-26 11:51:22', 1),
(104, 3, 'fuel_inventory_lists', 'a:17:{s:7:"item_id";i:3;s:8:"item_sku";s:16:"sanju_corn_flour";s:9:"item_name";s:10:"Corn Flour";s:11:"description";s:10:"Corn Flour";s:10:"brand_name";s:6:"Fruits";s:11:"supplier_id";s:1:"6";s:18:"item_purchase_cost";s:3:"100";s:9:"item_cost";s:3:"120";s:11:"item_weight";s:4:"1 kg";s:16:"quantity_on_hand";s:2:"10";s:17:"quantity_on_order";s:1:"0";s:21:"average_monthly_usage";s:1:"0";s:19:"minimum_stock_level";s:1:"0";s:16:"reorder_quantity";s:1:"0";s:6:"active";s:3:"yes";s:13:"creation_date";s:19:"1969-12-31 16:00:00";s:13:"modified_date";s:19:"0000-00-00 00:00:00";}', 1, '2012-08-20 15:01:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_blocks`
--

CREATE TABLE IF NOT EXISTS `fuel_blocks` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `view` text COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_blocks`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_categories`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'If left blank, the permalink will automatically be created for you.',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permalink` (`permalink`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fuel_blog_categories`
--

INSERT INTO `fuel_blog_categories` (`id`, `name`, `permalink`, `published`) VALUES
(1, 'Uncategorized', 'uncategorized', 'yes'),
(2, 'test', 'test', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_comments`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `author_id` int(10) unsigned NOT NULL,
  `author_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author_ip` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `is_spam` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_blog_comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_links`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `target` enum('blank','self','parent') DEFAULT 'blank',
  `description` varchar(100) DEFAULT NULL,
  `precedence` int(11) NOT NULL DEFAULT '0',
  `published` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_blog_links`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_posts`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'This is the last part of the url string. If left blank, the permalink will automatically be created for you.',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `content_filtered` text COLLATE utf8_unicode_ci NOT NULL,
  `formatting` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'A condensed version of the content',
  `author_id` int(10) unsigned NOT NULL COMMENT 'If left blank, you will assumed be the author.',
  `sticky` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `allow_comments` enum('yes','no') COLLATE utf8_unicode_ci DEFAULT 'no',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permalink` (`permalink`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_blog_posts`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_posts_to_categories`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_posts_to_categories` (
  `post_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel_blog_posts_to_categories`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_settings`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_settings` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel_blog_settings`
--

INSERT INTO `fuel_blog_settings` (`name`, `value`) VALUES
('title', 'My Blog'),
('uri', 'blog/'),
('theme_layout', 'blog'),
('theme_path', 'themes/default/'),
('theme_module', 'blog'),
('use_cache', '0'),
('cache_ttl', '3600'),
('per_page', '2'),
('description', ''),
('use_captchas', '1'),
('monitor_comments', '1'),
('save_spam', '1'),
('allow_comments', '1'),
('akismet_api_key', ''),
('comments_time_limit', ''),
('multiple_comment_submission_time_limit', '30'),
('asset_upload_path', 'images/blog/');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_blog_users`
--

CREATE TABLE IF NOT EXISTS `fuel_blog_users` (
  `fuel_user_id` int(10) unsigned NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `website` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `avatar_image` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`fuel_user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fuel_blog_users`
--

INSERT INTO `fuel_blog_users` (`fuel_user_id`, `display_name`, `website`, `about`, `avatar_image`, `twitter`, `facebook`, `date_added`, `active`) VALUES
(1, 'wer', '', '', '', '', '', '2012-04-17 07:55:47', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_logs`
--

CREATE TABLE IF NOT EXISTS `fuel_logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entry_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=85 ;

--
-- Dumping data for table `fuel_logs`
--

INSERT INTO `fuel_logs` (`id`, `entry_date`, `user_id`, `message`) VALUES
(1, '2012-04-17 01:10:30', 1, 'Categories item <em>test</em> edited'),
(2, '2012-04-17 07:55:48', 1, 'Authors item <em>wer</em> edited'),
(3, '2012-04-23 21:29:45', 1, 'Inward Entry item <em>2012-04-24</em> edited'),
(4, '2012-04-23 21:32:57', 1, 'Inward Entry item <em>2007-09-24</em> edited'),
(5, '2012-04-24 18:06:15', 1, 'Inward Entry item <em>2012-04-24</em> edited'),
(6, '2012-04-24 23:12:22', 1, 'Partwise Register item <em>2012-04-24</em> edited'),
(7, '2012-04-24 23:54:29', 1, 'Partwise Register item <em>2012-04-24</em> edited'),
(8, '2012-04-25 00:24:18', 1, 'Inward Entry item <em>2011-12-12</em> edited'),
(9, '2012-04-25 00:25:15', 1, 'Inward Entry item <em>2012-04-24</em> edited'),
(10, '2012-04-25 00:45:49', 1, 'Inward Entry item <em>2007-12-25</em> edited'),
(11, '2012-04-25 00:46:57', 1, 'Inward Entry item <em>2012-04-24</em> edited'),
(12, '2012-04-25 01:03:44', 1, 'Inward Entry item <em>2012-04-01</em> edited'),
(13, '2012-04-25 01:15:09', 1, 'Inward Entry item <em>2012-04-01</em> edited'),
(14, '2012-04-25 01:59:18', 1, 'Inward Entry item <em>2011-12-12</em> edited'),
(15, '2012-04-25 02:02:01', 1, 'Multiple module inward_entry data deleted'),
(16, '2012-04-25 02:18:36', 1, 'Inward Entry item <em>2011-12-12</em> edited'),
(17, '2012-04-25 02:26:43', 1, 'Inward Entry item <em>2012-04-01</em> edited'),
(18, '2012-04-25 03:59:09', 1, 'Inward Entry item <em>2011-12-12</em> edited'),
(19, '2012-04-25 04:01:06', 1, 'Multiple module inward_entry data deleted'),
(20, '2012-04-25 22:52:32', 1, 'Multiple module partywise_register data deleted'),
(21, '2012-04-25 22:53:29', 1, 'Multiple module partywise_register data deleted'),
(22, '2012-05-10 22:14:02', 1, 'Material Description item <em> 1</em> edited'),
(23, '2012-05-11 01:21:40', 1, 'Material Description item <em> 1</em> edited'),
(24, '2012-05-11 01:33:45', 1, 'Material Description item <em>43</em> edited'),
(25, '2012-05-11 01:34:26', 1, 'Material Description item <em> 1</em> edited'),
(26, '2012-05-11 01:35:29', 1, 'Material Description item <em> 2</em> edited'),
(27, '2012-05-11 01:36:10', 1, 'Material Description item <em> 4</em> edited'),
(28, '2012-05-11 02:17:32', 1, 'Material Description item <em> 4</em> edited'),
(29, '2012-05-11 02:25:36', 1, 'Material Description item <em> 6</em> edited'),
(30, '2012-05-11 06:47:34', 1, 'Party Details item <em>testing</em> edited'),
(31, '2012-05-13 18:21:09', 1, 'Party Name Details item <em>  </em> edited'),
(32, '2012-05-13 18:44:59', 1, 'Party Name Details item <em> 1</em> edited'),
(33, '2012-05-13 18:47:26', 1, 'Party Name Details item <em>  </em> edited'),
(34, '2012-05-13 20:12:14', 1, 'Party Name Details item <em>  </em> edited'),
(35, '2012-05-13 20:37:23', 1, 'Party Name Details item <em>  </em> edited'),
(36, '2012-05-13 20:38:33', 1, 'Multiple module partyname_details data deleted'),
(37, '2012-05-13 21:47:42', 1, 'Cuttting Instruction item <em>44</em> edited'),
(38, '2012-05-13 23:43:30', 1, 'Material Description item <em> 9</em> edited'),
(39, '2012-05-13 23:44:46', 1, 'Party Name Details item <em>hoodukutesting</em> edited'),
(40, '2012-05-15 07:22:56', 1, 'Material Description item <em>45</em> edited'),
(41, '2012-06-14 23:43:03', 1, 'Suppliers item <em>abhi</em> edited'),
(42, '2012-06-14 23:44:03', 1, 'Suppliers item <em>Anupama Shenoy</em> edited'),
(43, '2012-06-15 00:53:18', 1, 'Suppliers item <em>Anupama Shenoy</em> edited'),
(44, '2012-06-15 02:05:45', 1, 'Suppliers item <em>abhi</em> edited'),
(45, '2012-06-15 02:13:59', 1, 'Suppliers item <em>abhi</em> edited'),
(46, '2012-06-15 02:14:11', 1, 'Suppliers item <em>abhi</em> edited'),
(47, '2012-06-15 02:14:16', 1, 'Suppliers item <em>abhi</em> edited'),
(48, '2012-06-15 02:14:38', 1, 'Suppliers item <em>abhi</em> edited'),
(49, '2012-06-15 02:45:22', 1, 'Multiple module suppliers data deleted'),
(50, '2012-06-15 02:48:36', 1, 'Suppliers item <em>Anupama Shenoy</em> edited'),
(51, '2012-06-15 02:49:34', 1, 'Suppliers item <em>abhi</em> edited'),
(52, '2012-06-15 02:50:58', 1, 'Multiple module suppliers data deleted'),
(53, '2012-06-15 02:52:44', 1, 'Suppliers item <em>abhi</em> edited'),
(54, '2012-06-15 02:55:28', 1, 'Suppliers item <em>abhi</em> edited'),
(55, '2012-06-15 02:56:38', 1, 'Suppliers item <em>abhi</em> edited'),
(56, '2012-06-15 02:59:06', 1, 'Multiple module suppliers data deleted'),
(57, '2012-06-15 23:55:47', 1, 'Suppliers item <em>abhi</em> edited'),
(58, '2012-06-16 00:12:47', 1, 'Item suppliers item <em>123</em> edited'),
(59, '2012-06-16 00:28:21', 1, 'Suppliers item <em>asdas</em> edited'),
(60, '2012-06-16 04:51:53', 1, 'Suppliers item <em>Hooduku</em> edited'),
(61, '2012-06-16 06:27:09', 1, 'Item suppliers item <em>123</em> edited'),
(62, '2012-06-17 20:41:35', 1, 'Multiple module suppliers data deleted'),
(63, '2012-06-17 20:41:46', 1, 'Multiple module suppliers data deleted'),
(64, '2012-06-17 20:45:28', 1, 'Suppliers item <em>Hooduku</em> edited'),
(65, '2012-06-17 20:45:49', 1, 'Multiple module item_suppliers data deleted'),
(66, '2012-06-17 20:45:59', 1, 'Multiple module item_suppliers data deleted'),
(67, '2012-06-17 20:50:10', 1, 'Item suppliers item <em>12000</em> edited'),
(68, '2012-06-18 01:44:31', 1, 'Permissions item <em>rate_details</em> edited'),
(69, '2012-06-18 01:45:39', 1, 'Users item <em>arao@arao.com</em> edited'),
(70, '2012-06-18 01:49:35', 1, 'Users item <em>arao@arao.com</em> edited'),
(71, '2012-06-18 01:57:24', 1, 'Group Access item <em>test</em> edited'),
(72, '2012-06-20 04:10:24', 1, 'Multiple module inward_entry data deleted'),
(73, '2012-06-25 00:10:27', 1, 'Users item <em>abhithegreat@arao.com</em> edited'),
(74, '2012-06-25 21:50:21', 1, 'Brands item <em>RBK</em> edited'),
(75, '2012-06-25 21:55:52', 1, 'Ref Item Categories item <em>Reebok Buckets III</em> edited'),
(76, '2012-06-25 21:56:21', 1, 'Inventory Items item <em>adxccx ghfghgf</em> edited'),
(77, '2012-07-17 05:07:29', 1, 'Multiple module customers data deleted'),
(78, '2012-07-18 00:18:26', 1, 'Inventory Lists item <em>  </em> edited'),
(79, '2012-07-18 00:35:09', 1, 'Inventory Lists item <em>SKU_1</em> edited'),
(80, '2012-07-18 00:37:06', 1, 'Inventory Lists item <em>SKU_2</em> edited'),
(81, '2012-07-18 08:05:22', 1, 'Inventory Lists item <em>SKU_2</em> edited'),
(82, '2012-07-25 23:21:46', 1, 'Inventory Lists item <em>SKU_1</em> edited'),
(83, '2012-08-20 02:31:29', 1, 'Inventory Lists item <em>sanju_corn_flour</em> edited'),
(84, '2013-02-12 04:15:17', 1, 'Multiple module users data deleted');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_navigation`
--

CREATE TABLE IF NOT EXISTS `fuel_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(5) unsigned NOT NULL DEFAULT '1',
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The part of the path after the domain name that you want the link to go to (e.g. comany/about)',
  `nav_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The nav key is a friendly ID that you can use for setting the selected state. If left blank, a default value will be set for you',
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name you want to appear in the menu',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Used for creating menu hierarchies. No value means it is a root level menu item',
  `precedence` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'The higher the number, the greater the precedence and farther up the list the navigational element will appear',
  `attributes` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Extra attributes that can be used for navigation implementation',
  `selected` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The pattern to match for the active state. Most likely you leave this field blank',
  `hidden` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no' COMMENT 'A hidden value can be used in rendering the menu. In some areas, the menu item may not want to be displayed',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Determines whether the item is displayed or not',
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`location`,`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_navigation`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_navigation_groups`
--

CREATE TABLE IF NOT EXISTS `fuel_navigation_groups` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fuel_navigation_groups`
--

INSERT INTO `fuel_navigation_groups` (`id`, `name`, `published`) VALUES
(1, 'main', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_pages`
--

CREATE TABLE IF NOT EXISTS `fuel_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Add the part of the url after the root of your site (usually after the domain name). For the homepage, just put the word ''home''',
  `layout` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'The name of the template to associate with this page',
  `published` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'A ''yes'' value will display the page and an ''no'' value will give a 404 error message',
  `cache` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes' COMMENT 'Cache controls whether the page will pull from the database or from a saved file which is more effeicent. If a page has content that is dynamic, it''s best to set cache to ''no''',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_modified_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `location` (`location`),
  KEY `layout` (`layout`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_page_variables`
--

CREATE TABLE IF NOT EXISTS `fuel_page_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('string','int','boolean','array','template') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'string',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `page_id` (`page_id`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_page_variables`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_permissions`
--

CREATE TABLE IF NOT EXISTS `fuel_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Permissions beginning with ''Manage '' will allow items to appear on the left menu',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

--
-- Dumping data for table `fuel_permissions`
--

INSERT INTO `fuel_permissions` (`id`, `name`, `description`, `active`) VALUES
(1, 'pages', 'Manage pages', 'yes'),
(2, 'pages_publish', 'Publish Pages', 'yes'),
(3, 'pages_delete', 'Delete Pages', 'yes'),
(4, 'navigation', 'Manage navigation', 'yes'),
(5, 'users', 'Manage users', 'yes'),
(6, 'tools/backup', 'Manage database backup', 'yes'),
(7, 'manage/cache', 'Manage the page cache', 'yes'),
(8, 'manage/activity', 'View activity logs', 'yes'),
(9, 'myPHPadmin', 'myPHPadmin', 'yes'),
(10, 'google_analytics', 'Google Analytics', 'yes'),
(11, 'tools/user_guide', 'Access the User Guide', 'yes'),
(12, 'manage', 'View the Manage Dashboard Page', 'yes'),
(13, 'permissions', 'Manage Permissions', 'yes'),
(14, 'tools', 'Manage Tools', 'yes'),
(15, 'tools/seo/google_keywords', 'Google Keywords', 'yes'),
(16, 'sitevariables', 'Site Variables', 'yes'),
(17, 'blog/posts', 'Blog Posts', 'yes'),
(18, 'blog/categories', 'Blog Categories', 'yes'),
(19, 'blog/comments', 'Blog Comments', 'yes'),
(20, 'blog/links', 'Blog Links', 'yes'),
(21, 'blog/users', 'Blog Authors', 'yes'),
(22, 'blog/settings', 'Blog Settings', 'yes'),
(23, 'assets', 'Assets', 'yes'),
(24, 'tools/validate', 'Validate', 'yes'),
(25, 'tools/seo', 'Page Analysis', 'yes'),
(26, 'tools/tester', 'Tester Module', 'yes'),
(27, 'blocks', 'Manage Blocks', 'yes'),
(28, 'site_docs', 'Site Documentation', 'yes'),
(29, 'tools/cronjobs', 'Cronjobs', 'yes'),
(30, 'group_access', 'Manage Group Access', 'yes'),
(31, 'rate_details', 'Rate Details', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_site_variables`
--

CREATE TABLE IF NOT EXISTS `fuel_site_variables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'leave blank if you want the variable to be available to all pages',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fuel_site_variables`
--


-- --------------------------------------------------------

--
-- Table structure for table `fuel_sort`
--

CREATE TABLE IF NOT EXISTS `fuel_sort` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `sys_date` date NOT NULL,
  `add_in` varchar(255) NOT NULL,
  `lorry_no` varchar(255) NOT NULL,
  `party_tin` int(11) NOT NULL,
  `inw_challan` int(11) NOT NULL,
  `dated` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=123125 ;

--
-- Dumping data for table `fuel_sort`
--

INSERT INTO `fuel_sort` (`invoice_id`, `sys_date`, `add_in`, `lorry_no`, `party_tin`, `inw_challan`, `dated`) VALUES
(23, '0000-00-00', '34', '344', 23, 23345, 3423),
(67, '0000-00-00', '34', '344', 23, 23345, 3423),
(3223, '0000-00-00', '323', '22', 32, 32, 3223),
(12334, '0000-00-00', '243dfdcdf', 'dd34dfcdf', 3323433, 34243, 33344),
(123123, '0000-00-00', '123123', '123123', 123123, 123123, 123123),
(123124, '0000-00-00', '', '', 0, 23345, 3423);

-- --------------------------------------------------------

--
-- Table structure for table `fuel_users`
--

CREATE TABLE IF NOT EXISTS `fuel_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'english',
  `reset_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `super_admin` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `fuel_users`
--

INSERT INTO `fuel_users` (`id`, `user_name`, `password`, `email`, `first_name`, `last_name`, `language`, `reset_key`, `super_admin`, `active`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'arao@hooduku.com', 'abhilash', 'rao', 'english', '', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_user_to_permissions`
--

CREATE TABLE IF NOT EXISTS `fuel_user_to_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fuel_user_to_permissions`
--


-- --------------------------------------------------------

--
-- Table structure for table `household_entry`
--

CREATE TABLE IF NOT EXISTS `household_entry` (
  `household_entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `entry_village_name` varchar(255) NOT NULL,
  `entry_grama_panchayat` varchar(255) NOT NULL,
  `entry_door_no` int(11) NOT NULL,
  `entry_date_today` date NOT NULL,
  `entry_taluk_block` varchar(255) NOT NULL,
  `entry_district_name` varchar(255) NOT NULL,
  `entry_name_head_of_fly` varchar(255) NOT NULL,
  `entry_division` varchar(50) NOT NULL,
  `entry_name_of_resp` varchar(255) NOT NULL,
  `entry_name_of_enum` varchar(255) NOT NULL,
  `entry_rel_wid_child` varchar(255) NOT NULL,
  `entry_tot_no_ppl` int(11) NOT NULL,
  `entry_no_of_male_ppl` int(11) NOT NULL,
  `entry_no_of_female_ppl` int(11) NOT NULL,
  `entry_type_of_rationcrd` varchar(100) NOT NULL,
  `entry_tot_no_childrns` int(11) NOT NULL,
  `entry_age0_3yrsmale` int(11) NOT NULL,
  `entry_age3_6yrsmale` int(11) NOT NULL,
  `entry_age6_14yrsmale` int(11) NOT NULL,
  `entry_age14_18yrsmale` int(11) NOT NULL,
  `entry_age0_3yrsfemale` int(11) DEFAULT NULL,
  `entry_age3_6yrsfemale` int(11) DEFAULT NULL,
  `entry_age6_14yrsfemale` int(11) DEFAULT NULL,
  `entry_age14_18yrsfemale` int(11) DEFAULT NULL,
  `entry_no_of_male_chld` int(11) NOT NULL,
  `entry_no_of_female_chld` int(11) NOT NULL,
  `entry_no_orp_semi` int(11) NOT NULL,
  `entry_no_child_disability_male` int(11) DEFAULT NULL,
  `entry_no_of_male_orpdis` int(11) DEFAULT NULL,
  `entry_no_child_disability_female` int(11) DEFAULT NULL,
  `entry_no_of_female_orpdis` int(11) DEFAULT NULL,
  `entry_child_death` varchar(255) DEFAULT NULL,
  `entry_mother_death` varchar(255) DEFAULT NULL,
  `entry_father_death` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`household_entry_id`),
  UNIQUE KEY `household_voters_id` (`household_voters_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `household_entry`
--

INSERT INTO `household_entry` (`household_entry_id`, `household_voters_id`, `entry_village_name`, `entry_grama_panchayat`, `entry_door_no`, `entry_date_today`, `entry_taluk_block`, `entry_district_name`, `entry_name_head_of_fly`, `entry_division`, `entry_name_of_resp`, `entry_name_of_enum`, `entry_rel_wid_child`, `entry_tot_no_ppl`, `entry_no_of_male_ppl`, `entry_no_of_female_ppl`, `entry_type_of_rationcrd`, `entry_tot_no_childrns`, `entry_age0_3yrsmale`, `entry_age3_6yrsmale`, `entry_age6_14yrsmale`, `entry_age14_18yrsmale`, `entry_age0_3yrsfemale`, `entry_age3_6yrsfemale`, `entry_age6_14yrsfemale`, `entry_age14_18yrsfemale`, `entry_no_of_male_chld`, `entry_no_of_female_chld`, `entry_no_orp_semi`, `entry_no_child_disability_male`, `entry_no_of_male_orpdis`, `entry_no_child_disability_female`, `entry_no_of_female_orpdis`, `entry_child_death`, `entry_mother_death`, `entry_father_death`) VALUES
(1, 'G1', 'Itanal ', 'Itanal ', 14, '2012-08-21', 'Rayabagh', 'belgaum', 'Gaurav', '0', 'ABC', 'XYZ', 'BRO', 6, 0, 3, '0', 3, 0, 0, 1, 2, NULL, NULL, NULL, NULL, 0, 3, 0, NULL, 0, NULL, 0, '1', '0', '0'),
(2, 'J1', 'Kamalanagara', 'Kamalanagara', 278, '2012-08-21', 'Aland', 'gulbarga', 'V K Singh', '0', 'GG', 'JG', 'FATHER', 5, 0, 3, '0', 3, 0, 0, 0, 3, NULL, NULL, NULL, NULL, 0, 3, 0, NULL, 0, NULL, 0, 'No', 'No', 'No'),
(3, 'S1', 'Kamalanagara', 'Kamalanagara', 243, '2012-08-21', 'Aland', 'gulbarga', 'S Singh', '0', 'S', 'V', 'Mother', 5, 0, 3, '0', 3, 0, 0, 0, 3, NULL, NULL, NULL, NULL, 0, 3, 0, NULL, 0, NULL, 0, 'No', 'No', 'No'),
(4, 'VVN', 'Alakhanur ', 'Alakhanur ', 123, '2012-08-24', 'Rayabagh', 'belgaum', 'VN Singh', '0', 'SS', 'GG', 'father', 5, 0, 3, '0', 5, 0, 0, 0, 1, 0, 0, 0, 2, 0, 3, 0, 0, 0, 0, 0, 'Yes', 'Yes', 'Yes'),
(7, 'aqng2786', 'Savadatti', 'Savasuddi', 2786, '2012-08-27', 'Ramadurga', 'gulbarga', 'V Singh', '0', 'S Singh', 'g2', 'father', 5, 0, 3, '0', 3, 0, 0, 0, 1, 0, 0, 0, 2, 0, 3, 0, 0, 0, 0, 0, 'No', 'No', 'No'),
(8, 'HH1', 'Alakhanur', 'Alakhanur', 12345, '2012-08-27', 'Belgaum', 'gulbarga', 'ABC', '0', 'XYZ', 'QRST', 'father', 5, 0, 3, '0', 3, 0, 1, 1, 0, 0, 0, 1, 0, 0, 3, 0, 0, 0, 0, 0, 'No', 'No', 'No'),
(9, 'ARAO1234', 'Bekkeri', 'Bekkeri', 12345, '2012-08-29', 'Chikkodi', 'belgaum', 'ABCD', '0', 'QPR', 'MANU', 'WINGER', 11, 0, 4, '0', 11, 1, 2, 3, 1, 1, 1, 0, 2, 0, 4, 0, 0, 0, 0, 0, 'No', 'No', 'No'),
(10, 'GSG1234', 'Alagawadi', 'Alakhanur', 12345, '2012-09-11', 'Chikkodi', 'gulbarga', 'ABC', '', 'QPR', 'XYZ', 'F', 3, 0, 2, 'NA', 2, 0, 0, 0, 1, 1, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 'No', 'No', 'No'),
(11, '9611843809', 'Alagawadi', 'Alagawadi', 12, '2012-09-14', 'Rayabagh', 'belgaum', 'govindappa', 'belgaum', 'girish', 'nagaraja', 'father', 10, 0, 4, 'bpl', 6, 1, 0, 2, 0, 0, 1, 0, 2, 0, 4, 0, 0, 0, 0, 0, 'Yes', 'Yes', 'No'),
(12, 'grvgt', 'Bekkeri', 'Bhiradi', 123456, '2012-09-17', 'Gokak', 'gulbarga', 'fff', 'gulbarga', 'bbbb', 'cggvgh', 'ghjk', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'No', 'No', 'No'),
(13, 'PNQG11234', '27', '0', 123, '2012-09-17', 'Rayabagh', 'belgaum', 'ABC', 'belgaum', 'QPR', 'XYZ', 'FATHER', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Yes', 'No', 'No'),
(14, '9611912025', 'Alagawadi', 'Alagawadi', 77, '2013-02-14', 'Rayabagh', 'belgaum', 'Deve Gownda', 'belgaum', 'Abhilash', 'Varun', 'Father', 8, 0, 4, 'BPL', 4, 0, 0, 2, 0, 0, 0, 1, 1, 0, 4, 0, 0, 0, 0, 0, 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `household_survey_list`
--

CREATE TABLE IF NOT EXISTS `household_survey_list` (
  `household_survey_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `survey_name_survey` varchar(255) NOT NULL,
  `survey_age_survey` int(11) NOT NULL,
  `survey_gender_survey` varchar(10) NOT NULL,
  `survey_relationship_with_head_family` varchar(255) NOT NULL,
  `survey_mother_child_relationship_survey` varchar(255) NOT NULL,
  `survey_father_child_relationship_survey` varchar(255) NOT NULL,
  `survey_guardian_child_relationship_survey` varchar(255) NOT NULL,
  `survey_alive_dead_survey` varchar(255) NOT NULL,
  `survey_education_survey` varchar(255) NOT NULL,
  `survey_occupation_survey` varchar(255) NOT NULL,
  `survey_annual_income_survey` varchar(255) NOT NULL,
  `survey_marital_status_survey` varchar(255) NOT NULL,
  `survey_married_age_survey` int(11) NOT NULL,
  PRIMARY KEY (`household_survey_list_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `household_survey_list`
--

INSERT INTO `household_survey_list` (`household_survey_list_id`, `ref_id`, `list_id`, `survey_name_survey`, `survey_age_survey`, `survey_gender_survey`, `survey_relationship_with_head_family`, `survey_mother_child_relationship_survey`, `survey_father_child_relationship_survey`, `survey_guardian_child_relationship_survey`, `survey_alive_dead_survey`, `survey_education_survey`, `survey_occupation_survey`, `survey_annual_income_survey`, `survey_marital_status_survey`, `survey_married_age_survey`) VALUES
(1, 2, 1, 'VN', 55, 'm', 'F', 'NA', 'f', 'p', 'A', 'LLB', 'aDV', '5', 'M', 27),
(2, 2, 2, 'ss', 49, 'F', 'F', 'na', 'M', 'P', 'a', 'iNTER', 'HW', '0', 'm', 20),
(6, 3, 1, 'VN', 55, 'm', 'F', 'NA', 'f', 'p', 'A', 'LLB', 'aDV', '5', 'M', 27),
(7, 3, 2, 'ss', 49, 'F', 'F', 'na', 'M', 'P', 'a', 'iNTER', 'HW', '0', 'm', 20),
(8, 4, 1, 'gs', 28, '2', '9', 'd', 'd', 'd', '1', '7', '1', '1', '1', 21),
(9, 4, 2, 'jg', 26, '2', '9', 'd', 'd', 'd', '1', '7', '5', '5', '2', 0),
(10, 4, 3, 'gg', 24, '1', '8', 's', 's', 's', '1', '7', '5', '5', '2', 0),
(11, 5, 1, 'a', 12, '1', '1', 'NA', 'NA', 'NA', '1', '6', '2', '2', '1', 11),
(12, 5, 2, 'b', 12, '1', '2', 'NA', 'NA', 'NA', '1', '5', '3', '3', '2', 12),
(13, 5, 3, 'c', 24, '2', '5', 'NA', 'NA', 'NA', '1', '4', '4', '4', '1', 12),
(14, 5, 4, 'd', 11, '1', '4', 'NA', 'NA', 'NA', '1', '2', '6', '5', '2', 12),
(15, 6, 1, 'PQRS', 10, '1', '8', 'NA', 'NA', 'NA', '1', '7', '10', '1', '2', 0),
(16, 8, 1, 'govindappa', 55, '1', '10', '', '', '', '1', '3', '2', '3', '1', 20),
(17, 8, 2, 'lakshmi devamma', 45, '2', '7', '', '', '', '1', '1', '1', '1', '1', 16),
(18, 8, 3, 'Ramachandra', 35, '1', '8', '', '', '', '1', '7', '6', '3', '1', 26),
(19, 8, 4, 'kalavathi', 28, '2', '10', '', '', '', '1', '3', '1', '1', '1', 18),
(20, 8, 5, 'nagaraja', 15, '1', '10', 'Kalavathi', 'Ramachandra', '', '1', '4', '10', '1', '2', 0),
(21, 8, 6, 'dhanushri', 12, '2', '10', 'kalavathi', 'ramachandra', '', '1', '3', '10', '1', '2', 0),
(22, 8, 7, 'mohan', 10, '2', '10', 'kalvathi', 'ramachandra', '', '1', '2', '11', '1', '2', 0),
(23, 8, 8, 'girija', 17, '2', '10', '', '', 'govindappa', '1', '5', '10', '1', '2', 0),
(24, 11, 1, '', 0, '0', '0', '', '', '', '0', '0', '0', '0', '0', 0),
(25, 11, 2, '', 0, '0', '0', '', '', '', '0', '0', '0', '0', '0', 0),
(26, 11, 3, '', 0, '0', '0', '', '', '', '0', '0', '0', '0', '0', 0),
(27, 11, 4, '', 0, '0', '0', '', '', '', '0', '0', '0', '0', '0', 0),
(28, 11, 5, '', 0, '0', '0', '', '', '', '0', '0', '0', '0', '0', 0),
(29, 12, 1, 'Arun', 7, '1', '9', 'Sri Devi', 'Deve Gownda', '', '1', '2', '10', '1', '2', 0),
(30, 12, 2, 'Boman', 11, '1', '9', 'Sri Devi', 'Deve Gownda', '', '1', '3', '10', '1', '2', 0),
(31, 12, 3, 'renuka', 13, '2', '10', 'Sri Devi', 'Deve Gownda', '', '1', '3', '10', '1', '2', 0),
(32, 12, 4, 'Vijaya', 15, '2', '10', 'Sri Devi', 'Deve Gownda', '', '1', '4', '10', '1', '1', 14),
(33, 12, 5, 'Kinga', 23, '1', '9', 'Sri Devi', 'Deve Gownda', '', '1', '5', '4', '4', '1', 23),
(34, 12, 6, 'Binga', 20, '2', '14', 'Sri Devi', 'Deve Gownda', '', '1', '4', '1', '1', '1', 17),
(35, 12, 7, 'Sri Devi', 55, '2', '8', 'Boridevi', 'Boranna', '', '1', '1', '2', '2', '1', 15),
(36, 12, 8, 'Deve Gownda', 65, '1', '16', 'Hangama', 'Hanganna', '', '1', '4', '2', '4', '1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `household_survey_main`
--

CREATE TABLE IF NOT EXISTS `household_survey_main` (
  `household_survey_main_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `survey_name_of_head_family` varchar(255) DEFAULT NULL,
  `survey_address_of_head_family` varchar(255) NOT NULL,
  `survey_religion_survey` varchar(255) NOT NULL,
  `survey_caste_survey` varchar(255) NOT NULL,
  PRIMARY KEY (`household_survey_main_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `household_survey_main`
--

INSERT INTO `household_survey_main` (`household_survey_main_id`, `household_voters_id`, `survey_name_of_head_family`, `survey_address_of_head_family`, `survey_religion_survey`, `survey_caste_survey`) VALUES
(1, 'G1', 'Gaurav', '14;Itanal ', 'Hindu', 'SC'),
(2, 'J1', 'V K Singh', '278;Kamalanagara', 'Hindu', 'SC'),
(3, 'S1', 'S Singh', '243;Kamalanagara', 'Hindu', 'SC'),
(4, 'aqng2786', 'V Singh', '2786;Savadatti', 'Other', 'ST'),
(5, 'ARAO1234', 'ABCD', '12345;Bekkeri', 'Hindu', 'Other'),
(6, 'GSG1234', 'ABC', '12345;Alagawadi', 'Christian', 'OBC'),
(7, '', '', ';', 'Hindu', 'SC'),
(8, '9611843809', 'govindappa', '12;Alagawadi', 'Hindu', 'SC'),
(9, '', 'y', ';', 'Hindu', 'SC'),
(10, '', 'govindappa ', ';', 'Hindu', 'SC'),
(11, 'S1', 'S Singh', '243;Kamalanagara', 'Hindu', 'SC'),
(12, '9611912025', 'Deve Gownda', '77;Alagawadi', 'Hindu', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `house_dropdwn`
--

CREATE TABLE IF NOT EXISTS `house_dropdwn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `villages` varchar(255) NOT NULL,
  `grama_panchayat` varchar(255) NOT NULL,
  `division` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `taluk` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `house_dropdwn`
--

INSERT INTO `house_dropdwn` (`id`, `villages`, `grama_panchayat`, `division`, `district`, `states`, `taluk`) VALUES
(1, 'Alagawadi', 'Alagawadi', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(2, 'Alaknoor', 'Alaknoor', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(3, 'Alakhanur ', 'Alaknoor', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(4, 'Bekkeri ', 'Bekkeri ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(5, 'Bhendwad ', 'Bhendwad ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(6, 'Byakud', 'Byakud', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(7, 'Chinchali ', 'Chinchali ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(8, 'Diggewadi', 'Diggewadi', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(9, 'Handigunda ', 'Handigunda ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(10, 'Harogeri ', 'Harogeri ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(11, 'Hidakal ', 'Hidakal ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(12, 'Hubbarwadi ', 'Hubbarwadi ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(13, 'Itanal ', 'Itanal ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(14, 'Kandanawadi \n', 'Kandanawadi \n', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(15, 'Kappalguddi \n', 'Kappalguddi \n', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(16, 'Katakbhavi ', 'Katakbhavi ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(17, 'Khemalapur', 'Khemalapur', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(18, 'Koligudda', 'Koligudda', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(19, 'Kudachi (Rural)', 'Kudachi (Rural)', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(20, 'Mekhali ', 'Mekhali ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(21, 'Morab ', 'Morab ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(22, 'Mugalkhoda ', 'Mugalkhoda', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(23, 'Nandikurali', 'Nandikurali', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(24, 'Nasalapur ', 'Nasalapur', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(25, 'Nidagundi ', 'Nidagundi ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(26, 'Nilaji ', 'Nilaji ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(27, 'Nipanal ', 'Nipanal ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(28, 'Palbhavi ', 'Palbhavi ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(29, 'Paramandawadi', 'Paramandawadi', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(30, 'Raibhag (Rural)', 'Raibhag (Rural)', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(31, 'Savadatti ', 'Savadatti ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(32, 'Savasuddi', 'Savasuddi ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(33, 'Shiragur ', 'Shiragur ', 'Belgaum', 'Belgaum', 'Karnataka', 'Rayabagh'),
(34, 'Kamalanagara', 'Kamalanagara', 'Gulbarga', 'Gulbarga', 'Karnataka', 'Aland');

-- --------------------------------------------------------

--
-- Table structure for table `module_groups`
--

CREATE TABLE IF NOT EXISTS `module_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `date_added` datetime DEFAULT NULL,
  `last_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `module_groups`
--

INSERT INTO `module_groups` (`id`, `name`, `description`, `active`, `date_added`, `last_modified`) VALUES
(1, 'test', 'test', 'yes', '2012-06-18 01:57:23', '2012-06-18 01:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `module_group_to_permissions`
--

CREATE TABLE IF NOT EXISTS `module_group_to_permissions` (
  `group_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_group_to_permissions`
--

INSERT INTO `module_group_to_permissions` (`group_id`, `permission_id`) VALUES
(1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `module_group_to_users`
--

CREATE TABLE IF NOT EXISTS `module_group_to_users` (
  `group_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_group_to_users`
--

INSERT INTO `module_group_to_users` (`group_id`, `user_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ocop_birth_details`
--

CREATE TABLE IF NOT EXISTS `ocop_birth_details` (
  `ocop_birth_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `birth_weight` varchar(50) NOT NULL,
  `birth_disability` varchar(50) DEFAULT NULL,
  `birth_registration` varchar(30) NOT NULL,
  `birth_certificate` varchar(30) NOT NULL,
  `birth_not_registered` varchar(30) NOT NULL,
  `nutricious_received` varchar(30) NOT NULL,
  `pregnancy_period` varchar(30) DEFAULT NULL,
  `delivery_place` varchar(50) NOT NULL,
  `delivery_assisted` varchar(50) NOT NULL,
  `hospital_distance` varchar(50) NOT NULL,
  `hospital_type` varchar(50) NOT NULL,
  `delivery_paid` varchar(50) NOT NULL,
  `delivery_type` varchar(50) NOT NULL,
  `delivery_difficult` varchar(50) DEFAULT NULL,
  `delivery_number` varchar(50) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_birth_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ocop_birth_details`
--

INSERT INTO `ocop_birth_details` (`ocop_birth_details_id`, `household_voters_id`, `summary_id`, `birth_weight`, `birth_disability`, `birth_registration`, `birth_certificate`, `birth_not_registered`, `nutricious_received`, `pregnancy_period`, `delivery_place`, `delivery_assisted`, `hospital_distance`, `hospital_type`, `delivery_paid`, `delivery_type`, `delivery_difficult`, `delivery_number`, `creation_date`) VALUES
(1, 'HH1', 1, '9', 'plus', 'Yes', 'G786', 'NA', 'Yes', 'plus', 'division', 'multiple', '10', 'division', '10001', 'plus', 'NA', 'G2786', '2012-08-29 14:55:11'),
(2, 'ARAO1234', 2, '12', 'None', 'Yes', 'asdasfa', 'asfdasdf', 'Yes', 'Normal', 'Hospital', 'Doctor', '33', 'Others', '12', 'Simple', 'NA', '123', '2012-08-29 18:26:31'),
(3, '9611843809', 4, '2 k.g', 'None', 'Yes', '12345', '', 'No', 'Normal', 'Hospital', 'ANM', '20 k.m', 'Government', '500', 'Simple', '', '1', '2012-09-14 15:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_current_details`
--

CREATE TABLE IF NOT EXISTS `ocop_current_details` (
  `ocop_current_details_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `child_weight` varchar(50) NOT NULL,
  `child_height` varchar(50) DEFAULT NULL,
  `child_disability` varchar(30) NOT NULL,
  `child_problem` varchar(30) NOT NULL,
  `assistance_recieved` varchar(30) NOT NULL,
  `assistance_given` varchar(30) NOT NULL,
  `health_center` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_current_details_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ocop_current_details`
--

INSERT INTO `ocop_current_details` (`ocop_current_details_id`, `household_voters_id`, `summary_id`, `child_weight`, `child_height`, `child_disability`, `child_problem`, `assistance_recieved`, `assistance_given`, `health_center`, `creation_date`) VALUES
(1, 'HH1', 1, '10', '100', 'None', 'No', 'No', 'Government', 'less than 1 km', '2012-09-03 12:32:23'),
(2, '9611843809', 4, '35 k.g', '4.2 ft', 'None', 'No', 'No', '', '2-5 km', '2012-09-14 15:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_education`
--

CREATE TABLE IF NOT EXISTS `ocop_education` (
  `ocop_education_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `enrollment_school` varchar(50) NOT NULL,
  `present_class` varchar(50) DEFAULT NULL,
  `enrollment_pre_primary` varchar(30) DEFAULT NULL,
  `pre_primary_type` varchar(30) DEFAULT NULL,
  `pre_primary_date` varchar(30) DEFAULT NULL,
  `enrollment_primary` varchar(30) DEFAULT NULL,
  `primary_type` varchar(30) DEFAULT NULL,
  `primary_date` varchar(50) NOT NULL,
  `present_school` varchar(50) DEFAULT NULL,
  `attending_regularly` varchar(30) DEFAULT NULL,
  `mismatch_reason` varchar(30) DEFAULT NULL,
  `non_enrollment_reasons` varchar(30) DEFAULT NULL,
  `drop_out_reason` varchar(30) DEFAULT NULL,
  `re_enrolment_attempts` varchar(30) DEFAULT NULL,
  `failure_attempts_reasons` varchar(100) DEFAULT NULL,
  `disabled_facilities` varchar(30) DEFAULT NULL,
  `special_school` varchar(30) DEFAULT NULL,
  `transport_mode` varchar(30) DEFAULT NULL,
  `distance_traveled` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_education_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ocop_education`
--

INSERT INTO `ocop_education` (`ocop_education_id`, `household_voters_id`, `summary_id`, `enrollment_school`, `present_class`, `enrollment_pre_primary`, `pre_primary_type`, `pre_primary_date`, `enrollment_primary`, `primary_type`, `primary_date`, `present_school`, `attending_regularly`, `mismatch_reason`, `non_enrollment_reasons`, `drop_out_reason`, `re_enrolment_attempts`, `failure_attempts_reasons`, `disabled_facilities`, `special_school`, `transport_mode`, `distance_traveled`, `creation_date`) VALUES
(1, 'HH1', 1, 'Yes', 'BE', 'Yes', 'private', '1990-09-03', 'Yes', 'private', '1994-09-03', 'private', 'Yes', 'early enrolled', 'other', 'not interested', 'Yes', 'NA', 'other', 'vocational training', 'bicycle', '2-5KM', '2012-09-03 16:59:21'),
(2, '9611843809', 4, 'Yes', 'puc', 'Yes', 'government', '1989-09-10', 'Yes', 'government', '1993-12-09', 'government', 'Yes', 'drop out', 'no school nearby', 'taking care of siblings', 'No', '', '', '', 'bus', 'above 5KM', '2012-09-14 15:27:24'),
(3, '9611843809', 5, 'No', '0', 'No', '', '', 'No', '', '', '', '', '', '', '', 'undefined', '', '', '', '', '', '2012-12-21 12:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_father_data`
--

CREATE TABLE IF NOT EXISTS `ocop_father_data` (
  `ocop_father_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `fatherstatus` varchar(50) NOT NULL,
  `fathername` varchar(50) NOT NULL,
  `fatherdob` varchar(30) DEFAULT NULL,
  `fatherpreaddr` varchar(30) NOT NULL,
  `fatherperaddr` varchar(30) DEFAULT NULL,
  `fatherreligion` varchar(50) NOT NULL,
  `fathercaste` varchar(50) DEFAULT NULL,
  `fatherration` varchar(30) DEFAULT NULL,
  `fatherrationtype` varchar(30) DEFAULT NULL,
  `fathermrg` varchar(30) DEFAULT NULL,
  `fathermrgage` varchar(50) DEFAULT NULL,
  `fatherhosvisited` varchar(50) DEFAULT NULL,
  `fatherhosdate` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_father_data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ocop_father_data`
--

INSERT INTO `ocop_father_data` (`ocop_father_data_id`, `household_voters_id`, `summary_id`, `fatherstatus`, `fathername`, `fatherdob`, `fatherpreaddr`, `fatherperaddr`, `fatherreligion`, `fathercaste`, `fatherration`, `fatherrationtype`, `fathermrg`, `fathermrgage`, `fatherhosvisited`, `fatherhosdate`, `creation_date`) VALUES
(1, '9611843809', 4, 'available', 'ramachandra', '1873-01-01', 'alagavadi', 'alagavadi', 'Hindu', 'SC', 'Yes', 'BPL', 'no', 'no', 'Yes', 'nil', '2012-09-14 15:42:27');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_general_info`
--

CREATE TABLE IF NOT EXISTS `ocop_general_info` (
  `ocop_general_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `mother_name` varchar(30) NOT NULL,
  `present_addr` varchar(30) NOT NULL,
  `permanent_addr` varchar(30) DEFAULT NULL,
  `child_living` varchar(50) NOT NULL,
  `child_orphan` varchar(50) NOT NULL,
  `child_orphan_yes` varchar(50) DEFAULT NULL,
  `child_orphan_since` varchar(50) DEFAULT NULL,
  `adopted_child` varchar(50) DEFAULT NULL,
  `religion` varchar(50) NOT NULL,
  `caste` varchar(50) NOT NULL,
  `ration_card_name` varchar(50) DEFAULT NULL,
  `ration_card_type` varchar(50) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_general_info_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ocop_general_info`
--

INSERT INTO `ocop_general_info` (`ocop_general_info_id`, `household_voters_id`, `summary_id`, `child_name`, `dob`, `gender`, `father_name`, `mother_name`, `present_addr`, `permanent_addr`, `child_living`, `child_orphan`, `child_orphan_yes`, `child_orphan_since`, `adopted_child`, `religion`, `caste`, `ration_card_name`, `ration_card_type`, `creation_date`) VALUES
(1, 'HH1', 1, 'GG', '1987-10-10', '1', 'Vivekanand Singh', 'Sandhya Singh', 'bangalore', 'varanasi', 'Friend', 'No', 'None', 'NA', '', 'Hindu', 'Other', 'Yes', 'Anthyodaya', '2012-08-29 17:34:51'),
(2, 'ARAO1234', 2, 'AAA', '1987-10-10', '1', 'AAAA', 'SSS', 'bangalore', 'mangalore', 'Parents', 'No', 'None', '', '', 'Hindu', 'Other', 'No', 'APL', '2012-08-29 18:23:43'),
(3, '9611843809', 4, 'nagaraja', '1987-10-10', '1', 'ramachandra', 'kalavathi', 'alagavadi village', 'alagavadi village', 'Parents', 'No', '', 'nil', 'nil', 'Hindu', 'SC', 'Yes', 'BPL', '2012-09-14 14:08:17'),
(4, '9611843809', 4, 'nagaraja', '1985-09-09', '1', 'ramachandra', 'kalavathi', 'alagavadi', 'alagavadi', 'Parents', 'No', '', 'nil', 'nil', 'Hindu', 'SC', 'Yes', 'BPL', '2012-09-14 15:50:26'),
(6, '9611912025', 6, 'Arun', '14-02-2007', '1', 'Deve Gownda', 'Sri Devi', '77 A street Anganwadi', '77 A street Anganwadi', '', 'No', '', '', 'NA', 'Hindu', 'Other', '', '', '2013-02-14 16:12:43'),
(7, '9611912025', 7, 'Boman', '05-02-1992', '1', 'Deve Gownda', 'Sri Devi', '77 9th Street Anganwadi', '77 9th Street Anganwadi', 'Parents', 'No', '', '', '', 'Hindu', 'Other', 'No', '', '2013-02-14 16:19:15'),
(8, '9611912025', 8, 'renuka', '15-05-1990', '2', 'Deve Gownda', 'Sri Devi', '77 9th Street Anganwadi', '77 9th Street Anganwadi', 'Parents', 'No', '', '', '', 'Hindu', 'Other', 'Yes', 'BPL', '2013-02-14 16:20:31'),
(9, '9611912025', 9, 'Vijaya', '15-11-1990', '2', 'Deve Gownda', 'Sri Devi', '77 9th Street Anganwadi', '77 9th Street Anganwadi', '', 'No', '', '', '', 'Hindu', 'Other', 'Yes', 'BPL', '2013-02-14 16:22:16');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_guardian_data`
--

CREATE TABLE IF NOT EXISTS `ocop_guardian_data` (
  `ocop_guardian_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `guardian_status` varchar(50) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_dob` varchar(30) DEFAULT NULL,
  `guardian_preaddr` varchar(30) NOT NULL,
  `guardian_peraddr` varchar(30) DEFAULT NULL,
  `guardian_religion` varchar(50) NOT NULL,
  `guardian_caste` varchar(50) DEFAULT NULL,
  `guardian_ration` varchar(30) DEFAULT NULL,
  `guardian_rationtype` varchar(30) DEFAULT NULL,
  `guardian_mrg` varchar(30) DEFAULT NULL,
  `guardian_mrgage` varchar(50) DEFAULT NULL,
  `guardian_hosvisited` varchar(50) DEFAULT NULL,
  `guardian_hosdate` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_guardian_data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ocop_guardian_data`
--

INSERT INTO `ocop_guardian_data` (`ocop_guardian_data_id`, `household_voters_id`, `summary_id`, `guardian_status`, `guardian_name`, `guardian_dob`, `guardian_preaddr`, `guardian_peraddr`, `guardian_religion`, `guardian_caste`, `guardian_ration`, `guardian_rationtype`, `guardian_mrg`, `guardian_mrgage`, `guardian_hosvisited`, `guardian_hosdate`, `creation_date`) VALUES
(1, '9611843809', 4, 'notavilable', '', '', '', '', '', '', '', '', '', '', 'Yes', '', '2012-09-14 15:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_immunization`
--

CREATE TABLE IF NOT EXISTS `ocop_immunization` (
  `ocop_immunization_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `bcgandopv` varchar(50) NOT NULL,
  `hpatities1` varchar(50) DEFAULT NULL,
  `dptandopv` varchar(30) DEFAULT NULL,
  `hpatities2` varchar(30) DEFAULT NULL,
  `dpv2andopv3` varchar(30) DEFAULT NULL,
  `dpv3andopv4` varchar(30) DEFAULT NULL,
  `hepatitiesB3` varchar(30) DEFAULT NULL,
  `measlesandopv5` varchar(50) NOT NULL,
  `mmr` varchar(50) DEFAULT NULL,
  `booster1` varchar(30) DEFAULT NULL,
  `typhoid` varchar(30) DEFAULT NULL,
  `booster2` varchar(30) DEFAULT NULL,
  `tetanustoxid1` varchar(30) DEFAULT NULL,
  `tetanustoxide2` varchar(30) DEFAULT NULL,
  `hib1` varchar(100) DEFAULT NULL,
  `hib2` varchar(30) DEFAULT NULL,
  `hib3` varchar(30) DEFAULT NULL,
  `hibbooster` varchar(30) DEFAULT NULL,
  `hepa1` varchar(30) DEFAULT NULL,
  `hepa2` varchar(30) DEFAULT NULL,
  `vita` varchar(30) DEFAULT NULL,
  `chicknpox` varchar(30) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_immunization_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ocop_immunization`
--

INSERT INTO `ocop_immunization` (`ocop_immunization_id`, `household_voters_id`, `summary_id`, `bcgandopv`, `hpatities1`, `dptandopv`, `hpatities2`, `dpv2andopv3`, `dpv3andopv4`, `hepatitiesB3`, `measlesandopv5`, `mmr`, `booster1`, `typhoid`, `booster2`, `tetanustoxid1`, `tetanustoxide2`, `hib1`, `hib2`, `hib3`, `hibbooster`, `hepa1`, `hepa2`, `vita`, `chicknpox`, `creation_date`) VALUES
(1, '9611843809', 4, 'given', 'given', 'given', 'dnr', 'dnr', 'notgiven', 'given', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2012-09-14 15:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_mother_data`
--

CREATE TABLE IF NOT EXISTS `ocop_mother_data` (
  `ocop_mother_data_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `mother_status` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_dob` varchar(50) DEFAULT NULL,
  `present_address` varchar(100) NOT NULL,
  `permanent_address` varchar(100) DEFAULT NULL,
  `mother_religion` varchar(50) NOT NULL,
  `mother_caste` varchar(50) DEFAULT NULL,
  `ration_status` varchar(30) DEFAULT NULL,
  `ration_type` varchar(30) DEFAULT NULL,
  `marriage_date` varchar(50) DEFAULT NULL,
  `marriage_age` varchar(50) DEFAULT NULL,
  `hospital_visited` varchar(50) DEFAULT NULL,
  `hospital_reason` varchar(50) DEFAULT NULL,
  `hospital_reason_anc1` varchar(30) DEFAULT NULL,
  `hospital_reason_anc2` varchar(30) DEFAULT NULL,
  `hospital_reason_anc3` varchar(30) DEFAULT NULL,
  `madilu_scheme` varchar(50) DEFAULT NULL,
  `taayi_scheme` varchar(50) DEFAULT NULL,
  `janani_scheme` varchar(30) DEFAULT NULL,
  `services_recieved` varchar(50) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_mother_data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ocop_mother_data`
--

INSERT INTO `ocop_mother_data` (`ocop_mother_data_id`, `household_voters_id`, `summary_id`, `mother_status`, `mother_name`, `mother_dob`, `present_address`, `permanent_address`, `mother_religion`, `mother_caste`, `ration_status`, `ration_type`, `marriage_date`, `marriage_age`, `hospital_visited`, `hospital_reason`, `hospital_reason_anc1`, `hospital_reason_anc2`, `hospital_reason_anc3`, `madilu_scheme`, `taayi_scheme`, `janani_scheme`, `services_recieved`, `creation_date`) VALUES
(1, 'HH1', 1, 'Available', 'SS', '1960-09-10', 'VNS', 'Up, VNS', 'Hindu', 'Other', 'Yes', 'Anthyodaya', '1978-09-10', '18', 'No', NULL, 'No', 'No', 'No', 'Availed', 'Not Availed', 'Not Aware', 'Referral Service', '2012-09-04 17:48:20'),
(2, '9611843809', 4, 'Available', 'kalavathi', '1985-01-01', 'alagavadi ', 'alagavadi', 'Hindu', 'SC-ST', 'Yes', 'BPL', '1999-08-09', '17', 'Yes', NULL, 'Yes', 'Yes', 'Yes', 'Not Availed', 'Not Availed', 'Not Availed', 'Supplementary nutrition', '2012-09-14 15:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_protection`
--

CREATE TABLE IF NOT EXISTS `ocop_protection` (
  `ocop_protection_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `child_working` varchar(50) NOT NULL,
  `working_status` varchar(50) DEFAULT NULL,
  `work_type` varchar(30) DEFAULT NULL,
  `whom_work` varchar(30) DEFAULT NULL,
  `missing` varchar(30) DEFAULT NULL,
  `missing_reason` varchar(30) DEFAULT NULL,
  `missing_date` varchar(30) DEFAULT NULL,
  `fir_date` varchar(50) DEFAULT NULL,
  `return_date` varchar(50) DEFAULT NULL,
  `marriage_date` varchar(50) DEFAULT NULL,
  `minor_pregnancy` varchar(50) DEFAULT NULL,
  `devadasi_mother` varchar(50) DEFAULT NULL,
  `devadasi_system` varchar(50) DEFAULT NULL,
  `devadasi_reason` varchar(150) DEFAULT NULL,
  `before_cwc` varchar(100) DEFAULT NULL,
  `service_kind` varchar(100) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_protection_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ocop_protection`
--

INSERT INTO `ocop_protection` (`ocop_protection_id`, `household_voters_id`, `summary_id`, `child_working`, `working_status`, `work_type`, `whom_work`, `missing`, `missing_reason`, `missing_date`, `fir_date`, `return_date`, `marriage_date`, `minor_pregnancy`, `devadasi_mother`, `devadasi_system`, `devadasi_reason`, `before_cwc`, `service_kind`, `creation_date`) VALUES
(2, 'HH1', 1, 'Yes', 'Full', 'Agriculture', 'Own', 'No', 'Other', '2012-09-04', '2012-09-07', '2012-09-06', '2012-09-05', 'No', 'No', 'No', 'aaaa', 'aaa', 'aa', '2012-09-04 12:29:55'),
(3, '9611843809', 4, 'Yes', '', 'Animal rearing', 'Relative', 'Yes', 'Traffic for labour', '2000-01-01', '2012-09-01', '2012-09-13', '2012-09-11', 'No', 'No', 'No', '', '', '', '2012-09-14 15:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_summary`
--

CREATE TABLE IF NOT EXISTS `ocop_summary` (
  `ocop_summary_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `door_num` varchar(50) NOT NULL,
  `sdate` varchar(50) NOT NULL,
  `village` varchar(30) NOT NULL,
  `grama` varchar(30) NOT NULL,
  `taluk` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `divison` varchar(30) DEFAULT NULL,
  `headname` varchar(50) NOT NULL,
  `enumerator` varchar(50) NOT NULL,
  `respondant` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `child_name` varchar(50) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `present_class` varchar(50) DEFAULT NULL,
  `orphan` varchar(30) DEFAULT NULL,
  `disability_type` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`ocop_summary_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ocop_summary`
--

INSERT INTO `ocop_summary` (`ocop_summary_id`, `household_voters_id`, `door_num`, `sdate`, `village`, `grama`, `taluk`, `district`, `divison`, `headname`, `enumerator`, `respondant`, `guardian`, `relationship`, `mother_name`, `father_name`, `child_name`, `age`, `gender`, `present_class`, `orphan`, `disability_type`) VALUES
(1, 'HH1', '12345', '2012-08-27', 'Alakhanur', 'Alakhanur', 'Belgaum', 'gulbarga', '0', 'ABC', 'QRST', 'XYZ', 'SSS', 'father', 'SS', 'VNS', 'GG', '24', '1', 'GEN', 'No', 'NA'),
(2, 'ARAO1234', '12345', '2012-08-29', 'Bekkeri', 'Bekkeri', 'Chikkodi', 'belgaum', '12', 'ABCD', 'MANU', 'QPR', 'XYZ', 'WINGER', 'SSS', 'AAAA', 'AAA', '12', '1', '12', 'No', '121'),
(3, 'GSG1234', '12345', '2012-09-11', 'Alagawadi', 'Alakhanur', 'Chikkodi', 'gulbarga', 'aaa', 'ABC', 'XYZ', 'QPR', 'asd', 'F', 'asdf', 'pqr', 'ABC', '12', '1', 'Student', 'Yes', 'NA'),
(4, '9611843809', '12', '2012-09-14', 'Alagawadi', 'Alagawadi', 'Rayabagh', 'belgaum', 'belgaum', 'govindappa', 'nagaraja', 'girish', 'govindappa', 'father', 'kalavathi', 'ramachandra', 'nagaraja', '16', '1', '10', '', 'nil'),
(5, '9611843809', '77-5', '2012-12-02', 'jharkhan', 'jalianwala', 'Anupamataluk', 'Karnataka', 'bangalore', 'Gaurav', 'Veena', 'Anupama', 'kiran', '4', 'Gauravama', 'Gauravappa', 'dhanushri', '55', '1', '1', '', ''),
(6, '9611912025', '77', '2013-02-14', 'Alagawadi', 'Alagawadi', 'Rayabagh', 'belgaum', 'belgaum', 'Deve Gownda', 'Varun', 'Abhilash', '', '9', 'Sri Devi', 'Deve Gownda', 'Arun', '7', '1', '2', 'No', ''),
(7, '9611912025', '77', '2013-02-14', 'Alagawadi', 'Alagawadi', 'Rayabagh', 'belgaum', 'belgaum', 'Deve Gownda', 'Varun', 'Abhilash', 'NA', '9', 'Sri Devi', 'Deve Gownda', 'Boman', '11', '1', '3', 'No', 'NA'),
(8, '9611912025', '77', '2013-02-14', 'Alagawadi', 'Alagawadi', 'Rayabagh', 'belgaum', 'belgaum', 'Deve Gownda', 'Varun', 'Abhilash', '', '10', 'Sri Devi', 'Deve Gownda', 'renuka', '13', '2', '3', 'No', ''),
(9, '9611912025', '77', '2013-02-14', 'Alagawadi', 'Alagawadi', 'Rayabagh', 'belgaum', 'belgaum', 'Deve Gownda', 'Varun', 'Abhilash', '', '10', 'Sri Devi', 'Deve Gownda', 'Vijaya', '15', '2', '4', 'No', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `ocop_welfare`
--

CREATE TABLE IF NOT EXISTS `ocop_welfare` (
  `ocop_welfare_id` int(11) NOT NULL AUTO_INCREMENT,
  `household_voters_id` varchar(255) NOT NULL,
  `summary_id` int(11) NOT NULL,
  `bhagyalaxmi_scheme` varchar(50) DEFAULT NULL,
  `bicycle_scheme` varchar(50) DEFAULT NULL,
  `devadasi_scheme` varchar(50) DEFAULT NULL,
  `disability_certificate` varchar(50) DEFAULT NULL,
  `facilities_provided` varchar(150) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ocop_welfare_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ocop_welfare`
--

INSERT INTO `ocop_welfare` (`ocop_welfare_id`, `household_voters_id`, `summary_id`, `bhagyalaxmi_scheme`, `bicycle_scheme`, `devadasi_scheme`, `disability_certificate`, `facilities_provided`, `creation_date`) VALUES
(1, 'HH1', 1, 'Availed', 'Not Availed', 'Not Aware', 'Not Availed', 'NA', '2012-09-04 14:03:48'),
(2, 'HH1', 1, 'Availed', 'Availed', 'Availed', 'Availed', 'aa', '2012-09-04 14:09:58'),
(3, 'HH1', 1, 'Availed', 'Not Availed', 'Not Aware', 'Not Availed', 'NA', '2012-09-04 14:13:13'),
(4, '9611843809', 4, 'Not Aware', 'Availed', 'Not Availed', 'Not Availed', '', '2012-09-14 15:31:30'),
(5, '9611843809', 5, '', '', '', '', '', '2012-12-21 12:26:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
