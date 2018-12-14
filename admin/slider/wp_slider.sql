-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 08:25 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `otaku`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_slider`
--

CREATE TABLE IF NOT EXISTS `wp_slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `Caption` text NOT NULL,
  `Caption_txt` text NOT NULL,
  `Caption2` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wp_slider`
--

INSERT INTO `wp_slider` (`id`, `image`, `Caption`, `Caption_txt`, `Caption2`) VALUES
(1, 'http://localhost/otaku/wp-content/uploads/2017/10/slide1-2.jpg', 'OTAKU is a\r\n', 'Local & professional services provider in <span>UAE</span>', ' specializes in delivering software solutions, managed by an experts and professionals individuals Emirati. '),
(2, 'http://localhost/otaku/wp-content/uploads/2017/10/slide1-2.jpg', 'OTAKU is a', 'Local & professional services provider in UAE', 'specializes in delivering software solutions, managed by an experts and professionals individuals Emirati. ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_slider`
--
ALTER TABLE `wp_slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_slider`
--
ALTER TABLE `wp_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
