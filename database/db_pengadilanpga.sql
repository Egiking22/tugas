-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2020 at 03:44 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_pengadilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_persidangan_perdata`
--

CREATE TABLE IF NOT EXISTS `jadwal_persidangan_perdata` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nomor_perkara` varchar(25) NOT NULL,
  `pihak` varchar(30) NOT NULL,
  `hakim` varchar(30) NOT NULL,
  `pp` varchar(30) NOT NULL,
  `keterngan` text NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_persidangan_tilang`
--

CREATE TABLE IF NOT EXISTS `jadwal_persidangan_tilang` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nomor_perkara` varchar(10) NOT NULL,
  `terdakwa` varchar(20) NOT NULL,
  `hakim` varchar(20) NOT NULL,
  `pp` varchar(25) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jawal_persidanagn_pidana`
--

CREATE TABLE IF NOT EXISTS `jawal_persidanagn_pidana` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `nomor_perkara` varchar(10) NOT NULL,
  `terdakwa` varchar(30) NOT NULL,
  `hakim` varchar(30) NOT NULL,
  `pp` varchar(20) NOT NULL,
  `jpu` varchar(30) NOT NULL,
  `agenda` varchar(30) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
