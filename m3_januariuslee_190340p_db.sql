-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2020 at 03:56 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m3_januariuslee_190340p_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `digital_storage`
--

DROP TABLE IF EXISTS `digital_storage`;
CREATE TABLE IF NOT EXISTS `digital_storage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digital_storage`
--

INSERT INTO `digital_storage` (`id`, `username`, `image`) VALUES
(1, 'janL', 'digital_storage/urban-sanden-LSkz2HbtqJg-unsplash.jpg'),
(2, 'janL', 'digital_storage/samuel-sng-24oVTguuXa0-unsplash.jpg'),
(3, 'janL', 'digital_storage/eric-han-WJ6fmN1D-h0-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pet_image`
--

DROP TABLE IF EXISTS `pet_image`;
CREATE TABLE IF NOT EXISTS `pet_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `petimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_image`
--

INSERT INTO `pet_image` (`id`, `username`, `petimage`) VALUES
(1, 'janL', 'uploaded_pet_files/willian-justen-de-vasconcellos-1hBWrLIDSCc-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pet_info`
--

DROP TABLE IF EXISTS `pet_info`;
CREATE TABLE IF NOT EXISTS `pet_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `petname` varchar(255) NOT NULL,
  `petgender` varchar(255) NOT NULL,
  `petdateofbirth` date NOT NULL,
  `petBreed` varchar(255) NOT NULL,
  `petpersonality` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pet_info`
--

INSERT INTO `pet_info` (`id`, `username`, `petname`, `petgender`, `petdateofbirth`, `petBreed`, `petpersonality`) VALUES
(1, 'janL', 'kitty', 'Female', '2005-09-30', 'cat', 'happy, playful');

-- --------------------------------------------------------

--
-- Table structure for table `referal_codes`
--

DROP TABLE IF EXISTS `referal_codes`;
CREATE TABLE IF NOT EXISTS `referal_codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `codes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referal_codes`
--

INSERT INTO `referal_codes` (`id`, `username`, `codes`) VALUES
(2, 'annieT', 'vTBSbxfx'),
(3, 'annieT', 'crkmfMEc'),
(4, 'annieT', 'H1henGEn'),
(5, 'annieT', 'xCNUo9HH');

-- --------------------------------------------------------

--
-- Table structure for table `user_appointment`
--

DROP TABLE IF EXISTS `user_appointment`;
CREATE TABLE IF NOT EXISTS `user_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `endtime` time DEFAULT NULL,
  `category` enum('Indoor','Outdoor','Studio','') NOT NULL,
  `Grooming` enum('Yes','No') DEFAULT 'No',
  `Warm_up` enum('Yes','No') DEFAULT 'No',
  `Accessories` enum('Yes','No') DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_appointment`
--

INSERT INTO `user_appointment` (`id`, `username`, `date`, `time`, `endtime`, `category`, `Grooming`, `Warm_up`, `Accessories`) VALUES
(1, 'janL', '2020-08-15', '13:40:00', '15:40:00', 'Indoor', 'Yes', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

DROP TABLE IF EXISTS `user_image`;
CREATE TABLE IF NOT EXISTS `user_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `profileimage` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`id`, `username`, `profileimage`) VALUES
(1, 'janL', 'uploaded_files/dmitriy-mkhmcekA6wQ-unsplash.jpg'),
(2, 'janL', 'uploaded_files/dmitriy-idoedMZ732E-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `contactnum` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `firstname`, `lastname`, `gender`, `email`, `username`, `address`, `dateofbirth`, `contactnum`, `password`) VALUES
(1, 'Annie', 'Tan', 'Female', 'annie@gmail.com', 'annieT', 'Hougang ave 4', '2001-01-30', '98254890', '123'),
(2, 'jan', 'lee', 'Male', 'jan@gmail.com', 'janL', 'Hougang ave 4', '2001-08-30', '98254890', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
