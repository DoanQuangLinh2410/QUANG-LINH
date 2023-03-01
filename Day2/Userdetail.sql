-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 05:09 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ltmt4k10`
--

-- --------------------------------------------------------

--
-- Table structure for table `Userdetail`
--

CREATE TABLE `userdetail` (
  `Id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` varchar(50) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Hobby` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Userdetail`
--

INSERT INTO `Userdetail` (`Id`, `Name`, `DOB`, `Image`, `Hobby`, `email`) VALUES
(0, 'Nguy?n Xuân Minh', '2000/11/24', 'Penguins.jpg0', 'Sport', 'minh@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
