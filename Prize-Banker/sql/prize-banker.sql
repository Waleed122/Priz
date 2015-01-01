-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2013 at 12:30 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prize-banker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'muazzam', 'muazzam');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE IF NOT EXISTS `causes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `causes`
--

INSERT INTO `causes` (`id`, `title`) VALUES
(1, 'Asim'),
(2, 'Ayaz'),
(7, 'Muazzam'),
(4, 'Adam'),
(5, 'Owais'),
(6, 'Ali Qazi'),
(9, 'Example');

-- --------------------------------------------------------

--
-- Table structure for table `email_records`
--

CREATE TABLE IF NOT EXISTS `email_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `email_records`
--


-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE IF NOT EXISTS `funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `transaction_id` text NOT NULL,
  `item_name` text NOT NULL,
  `amount` text NOT NULL,
  `email` text NOT NULL,
  `date` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `street_address` text NOT NULL,
  `zip` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `funds`
--


-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE IF NOT EXISTS `panels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `panels`
--

INSERT INTO `panels` (`id`, `title`, `description`) VALUES
(1, 'A FUN WAY TO DO SERIOUS BUSINESSSM', 'Prize Banker is the Performance Incentive Initiative of the Social Compact Project. SCP is a Substance Entertainment series of online and venue events that inspires Personal Growth, Individual Responsibility, and Celebrates American Ideals. 0.90 cents of every $1.00 you FUND goes to Prize Banker to provide; scholarships, trophies, cash and other prizes, and to cover its administrative costs including the promotion and production of SCP events. Choose a Funding option below and receive one or both eBooks, or get both eBooks and a VIP Listing. See Sweepstakes Facts to see how you can improve your chance of winning $1,000,000. Do a good thing and get a chance at becoming a 2013 millionaire'),
(2, 'SWEEPSTAKES FACTS', 'Each time a registered and logged in User Funds an Option, that person is entered one time into the sweepstakes pool. Each time a registered and logged in User refers (3) friends using the send to a friend email feature the logged in Users name is entered into the sweepstakes a second second time and so on for each three referrals and or for each Funding transactions'),
(3, '', '$678,554,000');

-- --------------------------------------------------------

--
-- Table structure for table `sweepstakes`
--

CREATE TABLE IF NOT EXISTS `sweepstakes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sweepstakes`
--


-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `title`, `code`) VALUES
(22, 'Sports', 'Zce-QT7MGSE'),
(23, 'Sports', 'Zce-QT7MGSE'),
(21, 'PHP Tutorial', 'EwJujkxYLZs');

-- --------------------------------------------------------

--
-- Table structure for table `vips`
--

CREATE TABLE IF NOT EXISTS `vips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `fund` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `vips`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
