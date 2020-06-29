-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2020 at 03:13 PM
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
-- Database: `agmds`
--
CREATE DATABASE IF NOT EXISTS `agmds` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agmds`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `paddartist` (IN `pname` VARCHAR(50), IN `pcontact` VARCHAR(50), IN `pbirthdate` VARCHAR(50), IN `pemail` VARCHAR(50), IN `ppassword` VARCHAR(50))  NO SQL
INSERT INTO `tartist`(`name`, `contact`, `birthdate`, `email`, `password`) VALUES (pname, pcontact, pbirthdate, pemail, ppassword)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `paddcustomer` (IN `pname` VARCHAR(50), IN `paddress` VARCHAR(50), IN `pemail` VARCHAR(50), IN `ppassword` VARCHAR(50))  NO SQL
INSERT INTO `tcustomer`(`name`, `address`, `email`, `password`) VALUES (pname, paddress, pemail, ppassword)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `taccounts`
--

CREATE TABLE `taccounts` (
  `recNo` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `taccounts`
--
DELIMITER $$
CREATE TRIGGER `rAddAccountsDateCreated` BEFORE INSERT ON `taccounts` FOR EACH ROW SET NEW.dateCreated = CURDATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tartist`
--

CREATE TABLE `tartist` (
  `artistID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tartist`
--
DELIMITER $$
CREATE TRIGGER `rRecordNewArtist` AFTER INSERT ON `tartist` FOR EACH ROW INSERT INTO taccounts(email, type) VALUES (NEW.email, 'artist')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tartwork`
--

CREATE TABLE `tartwork` (
  `artworkID` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `artStyle` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `price` double NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tartwork`
--
DELIMITER $$
CREATE TRIGGER `rAddArtworkDate` BEFORE INSERT ON `tartwork` FOR EACH ROW SET NEW.date = CURDATE()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tcustomer`
--

CREATE TABLE `tcustomer` (
  `customerID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `moneySpent` double NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tcustomer`
--
DELIMITER $$
CREATE TRIGGER `rRecordNewCustomer` AFTER INSERT ON `tcustomer` FOR EACH ROW INSERT INTO taccounts(email, type) VALUES (NEW.email, 'customer')
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tsales`
--

CREATE TABLE `tsales` (
  `recNo` int(11) NOT NULL,
  `artistID` int(11) NOT NULL,
  `artworkID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `price` double NOT NULL,
  `dateSold` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `tsales`
--
DELIMITER $$
CREATE TRIGGER `rAddSalesDateSold` BEFORE INSERT ON `tsales` FOR EACH ROW SET NEW.dateSold = CURDATE()
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rSetArtworkStatus` AFTER INSERT ON `tsales` FOR EACH ROW UPDATE tartwork SET status = 1 WHERE artworkID = NEW.artworkID
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `vaccountidentifier`
-- (See below for the actual view)
--
CREATE TABLE `vaccountidentifier` (
`ID` int(11)
,`type` varchar(30)
,`name` varchar(50)
,`contact` varchar(30)
,`birthdate` date
,`address` varchar(150)
,`moneySpent` double
,`email` varchar(30)
,`password` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vartisttoartworkchecker`
-- (See below for the actual view)
--
CREATE TABLE `vartisttoartworkchecker` (
`artistID` int(11)
,`name` varchar(50)
,`contact` varchar(30)
,`birthdate` date
,`email` varchar(30)
,`artworkID` int(11)
,`title` varchar(150)
,`artStyle` varchar(30)
,`date` date
,`price` double
,`file` varchar(255)
,`status` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vcustomertosaleschecker`
-- (See below for the actual view)
--
CREATE TABLE `vcustomertosaleschecker` (
`artworkID` int(11)
,`customerID` int(11)
,`dateSold` date
,`customerName` varchar(50)
,`address` varchar(150)
,`moneySpent` double
,`artistID` int(11)
,`artistName` varchar(50)
,`title` varchar(150)
,`artStyle` varchar(30)
,`date` date
,`price` double
,`file` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vtotalsales`
-- (See below for the actual view)
--
CREATE TABLE `vtotalsales` (
`month` int(2)
,`name` varchar(50)
,`totalSales` double
);

-- --------------------------------------------------------

--
-- Structure for view `vaccountidentifier`
--
DROP TABLE IF EXISTS `vaccountidentifier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vaccountidentifier`  AS  select coalesce(`b`.`artistID`,`c`.`customerID`) AS `ID`,`a`.`type` AS `type`,coalesce(`b`.`name`,`c`.`name`) AS `name`,`b`.`contact` AS `contact`,`b`.`birthdate` AS `birthdate`,`c`.`address` AS `address`,`c`.`moneySpent` AS `moneySpent`,`a`.`email` AS `email`,coalesce(`b`.`password`,`c`.`password`) AS `password` from ((`taccounts` `a` left join `tartist` `b` on(`a`.`email` = `b`.`email`)) left join `tcustomer` `c` on(`a`.`email` = `c`.`email`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vartisttoartworkchecker`
--
DROP TABLE IF EXISTS `vartisttoartworkchecker`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vartisttoartworkchecker`  AS  select coalesce(`a`.`artistID`,`b`.`artistID`) AS `artistID`,`a`.`name` AS `name`,`a`.`contact` AS `contact`,`a`.`birthdate` AS `birthdate`,`a`.`email` AS `email`,`b`.`artworkID` AS `artworkID`,`b`.`title` AS `title`,`b`.`artStyle` AS `artStyle`,`b`.`date` AS `date`,`b`.`price` AS `price`,`b`.`file` AS `file`,`b`.`status` AS `status` from (`tartist` `a` left join `tartwork` `b` on(`a`.`artistID` = `b`.`artistID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vcustomertosaleschecker`
--
DROP TABLE IF EXISTS `vcustomertosaleschecker`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcustomertosaleschecker`  AS  select coalesce(`a`.`artworkID`,`c`.`artworkID`) AS `artworkID`,coalesce(`a`.`customerID`,`b`.`customerID`) AS `customerID`,`a`.`dateSold` AS `dateSold`,`b`.`name` AS `customerName`,`b`.`address` AS `address`,`b`.`moneySpent` AS `moneySpent`,`c`.`artistID` AS `artistID`,`c`.`name` AS `artistName`,`c`.`title` AS `title`,`c`.`artStyle` AS `artStyle`,`c`.`date` AS `date`,`c`.`price` AS `price`,`c`.`file` AS `file` from ((`tsales` `a` left join `tcustomer` `b` on(`a`.`customerID` = `b`.`customerID`)) left join `vartisttoartworkchecker` `c` on(`a`.`artworkID` = `c`.`artworkID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vtotalsales`
--
DROP TABLE IF EXISTS `vtotalsales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtotalsales`  AS  select month(`a`.`dateSold`) AS `month`,`b`.`name` AS `name`,sum(`a`.`price`) AS `totalSales` from (`tsales` `a` left join `tartist` `b` on(`a`.`artistID` = `b`.`artistID`)) group by `a`.`artistID`,`a`.`dateSold` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `taccounts`
--
ALTER TABLE `taccounts`
  ADD PRIMARY KEY (`recNo`);

--
-- Indexes for table `tartist`
--
ALTER TABLE `tartist`
  ADD PRIMARY KEY (`artistID`);

--
-- Indexes for table `tartwork`
--
ALTER TABLE `tartwork`
  ADD PRIMARY KEY (`artworkID`);

--
-- Indexes for table `tcustomer`
--
ALTER TABLE `tcustomer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tsales`
--
ALTER TABLE `tsales`
  ADD PRIMARY KEY (`recNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `taccounts`
--
ALTER TABLE `taccounts`
  MODIFY `recNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tartist`
--
ALTER TABLE `tartist`
  MODIFY `artistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tartwork`
--
ALTER TABLE `tartwork`
  MODIFY `artworkID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tcustomer`
--
ALTER TABLE `tcustomer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tsales`
--
ALTER TABLE `tsales`
  MODIFY `recNo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
