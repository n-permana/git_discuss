-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2014 at 02:13 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sis`
--
CREATE DATABASE IF NOT EXISTS `sis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sis`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `answer` text COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '276 gan', 3, 7, '2014-01-24 17:00:00', '2014-01-24 17:00:00'),
(3, '4 gan', 1, 11, '2014-01-25 04:44:50', '2014-01-25 04:44:50'),
(4, 'ga bisa edit ya', 1, 11, '2014-01-25 04:45:06', '2014-01-25 04:45:06'),
(5, 'selasa om', 5, 8, '2014-01-25 07:17:41', '2014-01-25 07:17:41'),
(6, 'senen gan', 5, 6, '2014-01-25 07:18:17', '2014-01-25 07:18:17'),
(7, 'ga ada yang tau?', 6, 11, '2014-01-25 09:17:37', '2014-01-25 09:17:37'),
(8, '20 om', 6, 2, '2014-01-25 09:18:24', '2014-01-25 09:18:24'),
(9, 'thanks guest2', 6, 11, '2014-01-25 09:18:58', '2014-01-25 09:18:58'),
(10, 'ok', 7, 3, '2014-01-25 21:58:05', '2014-01-25 21:58:05'),
(11, 'thx', 7, 11, '2014-01-25 21:58:30', '2014-01-25 21:58:30'),
(12, 'apaan tuh..?', 17, 7, '2014-02-08 09:41:12', '2014-02-08 09:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categorie_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categorie_name`, `created_at`, `updated_at`) VALUES
(1, 'categori_1', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(2, 'categori_2', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(3, 'categori_3', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(4, 'categori_4', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(5, 'categori_5', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(6, 'categori_6', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(7, 'categori_7', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(8, 'categori_8', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(9, 'categori_9', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(10, 'categori_10', '2014-01-24 09:53:42', '2014-01-24 09:53:42');

-- --------------------------------------------------------

--
-- Table structure for table `messageattachments`
--

CREATE TABLE IF NOT EXISTS `messageattachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `attachment_name` varchar(250) NOT NULL,
  `attachment_path` varchar(250) NOT NULL,
  `attachment_mime` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `messagedistributions`
--

CREATE TABLE IF NOT EXISTS `messagedistributions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `message_to` int(11) NOT NULL,
  `message_placed` int(11) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `messagedistributions`
--

INSERT INTO `messagedistributions` (`id`, `message_id`, `message_to`, `message_placed`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 2, 3, 1, 1, '2014-02-06 11:42:07', '2014-02-06 04:42:07'),
(4, 2, 4, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 5, 1, 1, '2014-02-06 11:40:29', '2014-02-06 04:40:29'),
(10, 9, 5, 1, 1, '2014-02-06 11:39:43', '2014-02-06 04:39:43'),
(11, 9, 6, 1, 0, '2014-02-06 03:58:49', '2014-02-06 03:58:49'),
(12, 9, 7, 1, 1, '2014-02-08 16:43:47', '2014-02-08 09:43:47'),
(13, 9, 8, 1, 0, '2014-02-06 03:58:49', '2014-02-06 03:58:49'),
(14, 10, 11, 1, 1, '2014-02-09 05:45:54', '2014-02-08 22:45:54'),
(15, 11, 11, 1, 1, '2014-02-06 11:44:25', '2014-02-06 04:44:25'),
(16, 12, 890, 1, 0, '2014-02-08 11:49:56', '2014-02-08 11:49:56'),
(17, 13, 0, 1, 0, '2014-02-08 13:24:31', '2014-02-08 13:24:31'),
(24, 16, 7, 1, 0, '2014-02-08 23:58:21', '2014-02-08 23:58:21'),
(25, 16, 3, 1, 0, '2014-02-08 23:58:21', '2014-02-08 23:58:21'),
(26, 17, 1, 1, 0, '2014-02-09 00:00:52', '2014-02-09 00:00:52'),
(27, 17, 2, 1, 0, '2014-02-09 00:00:52', '2014-02-09 00:00:52'),
(28, 17, 3, 1, 0, '2014-02-09 00:00:52', '2014-02-09 00:00:52'),
(29, 17, 4, 1, 0, '2014-02-09 00:00:52', '2014-02-09 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_from` int(11) NOT NULL,
  `message_to` varchar(500) NOT NULL,
  `message_title` varchar(250) NOT NULL,
  `message_body` text NOT NULL,
  `message_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_from`, `message_to`, `message_title`, `message_body`, `message_status`, `created_at`, `updated_at`) VALUES
(2, 11, '1,2,3,4,5', 'test email', 'isi email', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 5, '5,6,7,8', 'test mail2', 'isi dari email 2', 1, '2014-02-06 03:58:49', '2014-02-06 03:58:49'),
(10, 3, '11', 'n test', 'isinya', 1, '2014-02-06 04:42:28', '2014-02-06 04:42:28'),
(11, 3, '11', 'n test', 'isinya', 1, '2014-02-06 04:43:04', '2014-02-06 04:43:04'),
(12, 11, '890;j[', '', '', 1, '2014-02-08 11:49:56', '2014-02-08 11:49:56'),
(13, 11, 'Nama guest1', '', '', 1, '2014-02-08 13:24:31', '2014-02-08 13:24:31'),
(16, 11, '7,3', 'test 7 dan 3', 'ok', 1, '2014-02-08 23:58:20', '2014-02-08 23:58:20'),
(17, 11, '1,2,3,4', 'test kirim 4', 'ok', 1, '2014-02-09 00:00:52', '2014-02-09 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_01_23_141711_create_users_table', 1),
('2014_01_23_141800_create_questions_table', 1),
('2014_01_23_141827_create_answers_table', 1),
('2014_01_23_142914_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionattachments`
--

CREATE TABLE IF NOT EXISTS `questionattachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `attachment_name` varchar(250) NOT NULL,
  `attachment_path` varchar(250) NOT NULL,
  `attachment_mime` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `post_count` int(11) NOT NULL,
  `best_answer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `questions_title_unique` (`title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `content`, `user_id`, `categorie_id`, `post_count`, `best_answer_id`, `created_at`, `updated_at`) VALUES
(1, 'judul1', '2 X 2 ?', 3, 2, 2, 0, '2014-01-23 10:00:00', '2014-01-25 04:45:06'),
(2, 'judul2', 'Siapa nama presiden amerika ?', 7, 5, 0, 0, '2014-01-23 10:00:00', '2014-01-23 10:00:00'),
(3, 'judul3', '23 x 12 ?', 8, 2, 0, 0, '2014-01-23 10:00:00', '2014-01-23 10:00:00'),
(4, 'judul4', 'ibukota perancis ?', 7, 5, 0, 0, '2014-01-23 10:00:00', '2014-01-23 10:00:00'),
(5, 'test tanya', 'hari setelah hari minggu', 11, 9, 2, 6, '2014-01-25 06:53:50', '2014-01-25 08:09:42'),
(6, 'math', '10 * 0 + 20 ?', 11, 10, 3, 8, '2014-01-25 09:17:22', '2014-01-25 09:19:06'),
(7, 'test cat 8', 'polk', 11, 8, 2, 10, '2014-01-25 21:57:31', '2014-01-25 21:58:34'),
(9, 'upload', 'test upload', 11, 1, 0, 0, '2014-02-08 04:29:25', '2014-02-08 04:29:25'),
(10, 'test upload 3', 'upload file', 11, 1, 0, 0, '2014-02-08 04:36:32', '2014-02-08 04:36:32'),
(11, '', '', 11, 1, 0, 0, '2014-02-08 05:11:51', '2014-02-08 05:11:51'),
(14, 'daku 7', 'test upload 7', 11, 7, 0, 0, '2014-02-08 06:19:47', '2014-02-08 06:19:47'),
(15, 'lucky 8', 'harusnya id 15', 11, 8, 0, 0, '2014-02-08 06:24:27', '2014-02-08 06:24:27'),
(17, 'upload 9', 'test upload', 11, 9, 1, 0, '2014-02-08 09:13:54', '2014-02-08 09:41:12'),
(18, 'tes ipload', 'ok', 11, 1, 0, 0, '2014-02-09 00:09:14', '2014-02-09 00:09:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `fullname`, `password`, `created_at`, `updated_at`) VALUES
(1, 'guest1', 'guest1@gmail.com', 'Nama guest1', '$2y$10$CG2PlhM8zWHKpg/fwW4pS.p4iZdfGhmo.mNr62FoaKjjQ4LJo7X1W', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(2, 'guest2', 'guest2@gmail.com', 'Nama guest2', '$2y$10$eAXbniMQDCKRmFXD5rgBCurDwuORHcLsgbBaFYxOyHisWmaEn1vbi', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(3, 'guest3', 'guest3@gmail.com', 'Nama guest3', '$2y$10$i6P2ggf0He4w6xqqpvuJ7.4C.UpBdx2gpCS35SRcuapSrG2x.K/9W', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(4, 'guest4', 'guest4@gmail.com', 'Nama guest4', '$2y$10$ZHYXZ7/lYFU/S6rIO4SdL.0uv0tYX0JG7McMKwxajMpJaw6f2CSFS', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(5, 'guest5', 'guest5@gmail.com', 'Nama guest5', '$2y$10$oTtI8T9W1L9Pbb1If7rMGepK3Z8YGEgOSCZ.9P22.x.PNQ3zYX.sC', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(6, 'guest6', 'guest6@gmail.com', 'Nama guest6', '$2y$10$AElH.WNchkcTdUCkGK4c7ORP42aH9tlh6AIVJE/1caBwDLxNd8L96', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(7, 'guest7', 'guest7@gmail.com', 'Nama guest7', '$2y$10$2nP.WrIUNhxeai0Pj0O1Fem4Gfd.XGCqU/al0Wm4Y94LbCy9JgJRK', '2014-01-24 09:53:41', '2014-01-24 09:53:41'),
(8, 'guest8', 'guest8@gmail.com', 'Nama guest8', '$2y$10$RjQnOBRNg.MGT/NXrpB6O.GOuvjrErzTAaweYbQ3Log4DMFHZTgBO', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(9, 'guest9', 'guest9@gmail.com', 'Nama guest9', '$2y$10$RVRHU8f7ohqNCP9FuOAdfuREF/VFCJqAI.TZ4pqZ7o4BzIPv9KY.K', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(10, 'guest10', 'guest10@gmail.com', 'Nama guest10', '$2y$10$D9ZPCqc3H5QHkAeodKiw9upBhmlU5qnzXyNEVMDrFpNIhNwSRGwQe', '2014-01-24 09:53:42', '2014-01-24 09:53:42'),
(11, 'nandang', 'permana041567@gmail.com', 'nandang permana', '$2y$10$yJljw/LQenUJi.n2PnqGLOt0cIw7H95IcNKqg/4mzqEm5Xm/3TuYC', '2014-01-25 02:49:31', '2014-01-25 02:49:31'),
(12, 'coba', 'a@b.c', 'coba baru', '$2y$10$MDMbSyKiwIM9I7z.fJKD..hpqwhDC.HPU95FKhLLQM7dueMp3Sc9K', '2014-02-07 11:04:40', '2014-02-07 11:04:40'),
(13, 'test', 'x@y.z', 'test valid', '$2y$10$dQnamhEmYIcHiWuZwwB0qeHD6XLk9KZnM5bO2Kc4cYdSOz/4Nn10e', '2014-02-08 03:42:11', '2014-02-08 03:42:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
