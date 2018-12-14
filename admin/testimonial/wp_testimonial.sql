-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 06:23 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `etax`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_testimonial`
--

CREATE TABLE IF NOT EXISTS `wp_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_testimonial`
--

INSERT INTO `wp_testimonial` (`id`, `name`, `designation`, `description`, `image`) VALUES
(6, 'Stephen Hill', 'Marketing Manager', 'This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,', 'http://localhost/etax/wp-content/uploads/2016/12/testimonial01-1.png'),
(7, 'Stephen Hill', 'Marketing Manager', 'This is Photoshop''s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,', 'http://localhost/etax/wp-content/uploads/2016/12/testimonial02-1.png'),
(8, 'Stephen Hill', 'Marketing Manager', 'his is Photoshop''s version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin,', 'http://localhost/etax/wp-content/uploads/2016/12/testimonial03.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_testimonial`
--
ALTER TABLE `wp_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_testimonial`
--
ALTER TABLE `wp_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
