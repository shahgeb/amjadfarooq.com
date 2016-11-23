-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2016 at 11:24 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `Likes`
--

INSERT INTO `Likes` (`ID`, `User_ID`, `IP`) VALUES
(12, 2, '39.59.254.217'),
(11, 1, '39.59.254.217'),
(13, 16, '39.59.254.217'),
(14, 16, '175.110.135.27'),
(15, 2, '175.110.135.27'),
(16, 1, '203.128.11.9'),
(17, 2, '203.128.11.9'),
(18, 21, '203.128.11.9');

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
  `Secret` text,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `LastName`, `Gender`, `Age`, `Email`, `Password`, `Status`, `Likes`, `Image`, `Secret`) VALUES
(1, 'Rizwan', 'Rao', 'Male', '24', 'rizwan.wb1m@gmail.com', 'a05886304befaedc46fbc8ddb7ce02f2', 0, 1, '1.jpg', NULL),
(2, 'test', 'test', 'Male', '26', 'test@test.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2.jpg', NULL),
(16, 'Zara', 'Kanwal', 'Female', '25', 'rizwan.wbm2@gmail.com', 'a05886304befaedc46fbc8ddb7ce02f2', 1, 1, 'above-adventure-aerial-air.jpg', NULL),
(17, 'amjad', 'faroow', 'Male', '32', 'superior.amjad@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 0, 'Male.jpg', NULL),
(20, 'Zahid', 'Chohan', 'Male', '25', 'rizwan.wbm@gmail.com', 'a05886304befaedc46fbc8ddb7ce02f2', 1, 0, 'Male.jpg', 'd1ZDOWlZWk5QU0U1N016YXp5UkhBQ3pyZDlwS0pVWmdRQ3A5QnBYcmhDeHBwNnpZRnJHZjRmR2hvNTE4'),
(21, 'sadaf', 'moodi', 'Female', '25', 'sadaf.mehmood26@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, 1, 'Male.jpg', 'MlpUSjMxTXg2cjdYQTc5R2lGelk1MzFuSjNDTGp2SG12QjZ5Q1M1SmpjR1VqUUFDdmFBQWVCWVhGQUpa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
