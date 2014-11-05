-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 05 Novembre 2014 à 17:40
-- Version du serveur :  5.6.16
-- Version de PHP :  5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `snapblog_oo`
--
CREATE DATABASE IF NOT EXISTS `snapblog_oo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `snapblog_oo`;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postId` int(11) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `postId`, `content`, `username`, `email`, `published`, `dateCreated`, `dateModified`) VALUES
(1, 1, 'Pas terrible ton idée.', 'jean', 'jean@gmail.com', 1, '2014-11-03 09:08:04', '2014-11-03 09:08:04'),
(2, 1, 'N''importe quoi mec tu déconnes.', 'lucie77', 'lucie77@hotmail.com', 1, '2014-11-03 09:08:18', '2014-11-03 09:08:18'),
(3, 1, 'viagra viagra viagra. Buy online at viagra.com.', 'viagra', 'viagra@viagra.com', 0, '2014-11-03 09:09:06', '2014-11-03 09:09:06'),
(4, 3, 'yoyoyoyo', 'blabla', 'bla@bla.com', 1, '2014-11-04 14:58:57', '2014-11-04 14:58:57'),
(5, 1, 'dfsdasfadsf', 'jeandasfdas', 'jean23423423@gmail.com', 1, '2014-11-04 15:04:49', '2014-11-04 15:04:49'),
(6, 1, 'dfsdasfadsf', 'jeandasfdas', 'jean23423423@gmail.com', 1, '2014-11-04 15:04:53', '2014-11-04 15:04:53'),
(7, 1, 'qqqqq', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:05:02', '2014-11-04 15:05:02'),
(8, 1, 'qqqqq', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:07:18', '2014-11-04 15:07:18'),
(9, 1, 'uyuyu', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:07:27', '2014-11-04 15:07:27'),
(10, 1, 'uyuyu', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:07:45', '2014-11-04 15:07:45'),
(11, 1, 'uyuyu', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:08:25', '2014-11-04 15:08:25'),
(12, 1, '', 'jean', 'jean@gmail.com', 1, '2014-11-04 15:08:28', '2014-11-04 15:08:28'),
(13, 28, 'gdfsgdfsgdfsgdgs', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:11:07', '2014-11-05 17:11:07'),
(14, 28, 'sdfgdfs', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:11:09', '2014-11-05 17:11:09'),
(15, 28, 'qew', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:11:11', '2014-11-05 17:11:11');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT '1',
  `dateCreated` datetime NOT NULL,
  `dateModified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `content`, `username`, `email`, `published`, `dateCreated`, `dateModified`) VALUES
(28, 'yo ! éê jakdfaskj dls', 'yo-ee-jakdfaskj-dls', 'djsfkadjs ldfsj ', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:00:45', '2014-11-05 17:00:45'),
(29, '!#$?$#?!?#$abc', 'abc', 'safdasfds', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:03:50', '2014-11-05 17:03:50'),
(30, 'aaa', 'aaa', 'bbbb', 'dasfdsafds', 'yo@bla.com', 1, '2014-11-05 17:09:56', '2014-11-05 17:09:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
