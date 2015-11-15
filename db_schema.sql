-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2015 at 10:34 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `job_hunt`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternate_posting`
--

CREATE TABLE IF NOT EXISTS `alternate_posting` (
  `apst_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text NOT NULL,
  `pstg_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`apst_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE IF NOT EXISTS `posting` (
  `pstg_id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text,
  `company` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_descr` text NOT NULL,
  `job_notes` text NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `date_emailed` datetime DEFAULT NULL,
  `reply_recvd` enum('false','true') NOT NULL DEFAULT 'false',
  `reply_notes` text,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pstg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
