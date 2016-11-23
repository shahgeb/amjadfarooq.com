-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2016 at 02:53 AM
-- Server version: 5.5.52-cll
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webeyete_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `Likes`
--

CREATE TABLE IF NOT EXISTS `Likes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  `IP` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`ID`, `User_ID`, `IP`) VALUES
(12, 2, '39.59.254.217'),
(11, 1, '39.59.254.217'),
(13, 16, '39.59.254.217');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Gender` text NOT NULL,
  `Age` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `Likes` int(11) NOT NULL DEFAULT '0',
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Gender`, `Age`, `Email`, `Password`, `Status`, `Likes`, `Image`) VALUES
(1, 'Rizwan', 'Rao', 'Male', '24', 'rizwan.wb1m@gmail.com', 'a05886304befaedc46fbc8ddb7ce02f2', 0, 6, '1.jpg'),
(2, 'test', 'test', 'Male', '26', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 8, '2.jpg'),
(16, 'Rizwann', 'Raoaaa', 'Male', '24', 'rizwan.wbm@gmail.com', 'a05886304befaedc46fbc8ddb7ce02f2', 1, 4, '3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
