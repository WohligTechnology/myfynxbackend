-- phpMyAdmin SQL Dump
-- version 4.4.1.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2015 at 12:44 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myfynx`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner1`
--

CREATE TABLE IF NOT EXISTS `banner1` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `fromdate` date NOT NULL,
  `todate` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `template` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `centrealign` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner1`
--

INSERT INTO `banner1` (`id`, `name`, `link`, `target`, `status`, `fromdate`, `todate`, `image`, `template`, `class`, `text`, `centrealign`) VALUES
(1, '', 'http://google.com', '', 1, '0000-00-00', '0000-00-00', '918796622179-1430025530.jpg', '<p>farsg<strong>fE&nbsp;<em>rwrtr</em></strong></p>', 'ryt', 'vbhjnm', 'cvbn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner1`
--
ALTER TABLE `banner1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner1`
--
ALTER TABLE `banner1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
