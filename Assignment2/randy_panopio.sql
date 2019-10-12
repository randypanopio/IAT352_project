-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2019 at 07:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randy_panopio`
--
CREATE DATABASE IF NOT EXISTS `randy_panopio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `randy_panopio`;

-- --------------------------------------------------------

--
-- Table structure for table `creators`
--

DROP TABLE IF EXISTS `creators`;
CREATE TABLE IF NOT EXISTS `creators` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `creators`
--

INSERT INTO `creators` (`id`, `username`, `email`, `password`, `name`, `genre`, `bio`) VALUES
(1, 'user', 'user@user.user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'user', 'Entertainment', 'user bio'),
(2, 'Milly', 'milly@sfu.edu', '1fcb3f32555f68b483c07dd39450f772153b55a89faba95732b040ba34c2480d', 'Milly Rutherford', 'Educational', 'I talk about birds'),
(3, 'sam', 'sam@sam.sam', 'e96e02d8e47f2a7c03be5117b3ed175c52aa30fb22028cf9c96f261563577605', 'sam', 'Educational', ''),
(4, 'xQcOW', 'xqcOW@gg.com', '960f984285701c6d8dba5dc71c35c55c0397ff276b06423146dde88741ddf1af', 'Felix', 'Gaming', 'https://www.youtube.com/channel/UCmDTrq0LNgPodDOFZiSbsww'),
(5, 'm0xyy', '5head@gg.ca', 'ba8d78f5334ea4cf66a9e9bbc16b220b7b2b9d49e2f4575dfa135b2a7a7fa299', '5Head', 'Gaming', 'smart'),
(6, 'TheSushiDragon', 'green@screen.com', 'b6dc933311bc2357cc5fc636a4dbe41a01b7a33b583d043a7f870f3440697e27', 'Stefan Li', 'Entertainment', 'I do green screens');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

DROP TABLE IF EXISTS `followers`;
CREATE TABLE IF NOT EXISTS `followers` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `username`, `email`, `password`) VALUES
(1, 'visitor', 'visit@visit.visit', '5f14f9e6d80f802a65269804f2552ef9889f2c7ccec5067214e58a1e48e0b3ff'),
(2, 'superfan44', 'superfan44@gmail.com', '55166d81ae92a63f5c7ad31c271f9c1fcd9b369356eec210a902319ff25a5bce'),
(3, 'boxcaryellowcar', 'gg@gg.gg', 'cc4308c3c127cad2919d2546ef0afceaca6b312533267f5aafb6cf0305351386'),
(4, 'MillyFan', 'loveheart@gmail.com', '376c6fd8cc8383666c293114e6a58b4e3e981e65a21455ef1551749d92b4b1a6'),
(5, 'TestFollower', 'test@follower.account', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(6, 'follower', 'f@f.f', '074cdde4132a64f0abe703cfd21858a21d525ae944a8c11ad975fada0ae5a7ff'),
(7, '123', '132', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `user_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`user_id`, `title`, `content`, `date`) VALUES
(1, 'CoolBeans', 'hello hello hello hello hello hello hello hello hello hello hello hello ', '2019-10-12 05:11:55'),
(6, 'WOOO', 'hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello hello ', '2019-10-12 05:12:18'),
(6, 'TEST TEST', 'And here is how to do it with all popular PHP database drivers:\r\n\r\nAdding data literals using mysql_query\r\nSuch a driver doesn\'t exist.', '2019-10-12 05:12:30'),
(6, ' Such a driver doesn\'t exist.', '\r\nSuch a driver doesn\'t exist.\r\nSuch a driver doesn\'t exist.\r\nSuch a driver doesn\'t exist.\r\nSuch a driver doesn\'t exist.\r\nSuch a driver doesn\'t exist.', '2019-10-12 05:12:47'),
(1, 'I wrote a blog post here once', 'but i forgot', '2019-10-12 05:13:29'),
(1, 'TOBE', 'Article evident arrived express highest men did boy. Mistress sensible entirely am so. Quick can manor smart money hopes worth too. Comfort produce husband boy her had hearing. Law others theirs passed but wishes. You day real less till dear read. Considered use dispatched melancholy sympathize discretion led. Oh feel if up to till like. \r\n', '2019-10-12 05:13:51'),
(3, 'W H OMEGALUL', 'ashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. ', '2019-10-12 05:14:16'),
(3, 'WOW', 'ashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined.  ashwoods see frankness objection abilities the. As hastened oh produced prospect formerly up am. Placing forming nay looking old married few has. Margaret disposed add screened rendered six say his striking confined. ', '2019-10-12 05:14:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
