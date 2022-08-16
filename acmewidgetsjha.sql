-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2021 at 01:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acmewidgetsjha`
--

-- --------------------------------------------------------

--
-- Table structure for table `jha_data`
--

DROP TABLE IF EXISTS `jha_data`;
CREATE TABLE IF NOT EXISTS `jha_data` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `jha_ID` int(11) UNSIGNED NOT NULL,
  `StepNumber` int(11) UNSIGNED NOT NULL,
  `Step` varchar(45) NOT NULL,
  `PotentialHazards` varchar(1000) NOT NULL,
  `Controls` varchar(1000) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jha_data`
--

INSERT INTO `jha_data` (`ID`, `jha_ID`, `StepNumber`, `Step`, `PotentialHazards`, `Controls`) VALUES
(1, 1, 1, 'Get Shoveling Equipment', 'Injury in a disorganized work shed, failure to get proper equipment', 'Train employees on proper equipment procedure, organize work sheds regularly to avoid any unnecessary accidents.'),
(3, 1, 2, 'Locate Digging Site	', 'Getting lost and digging at a wrong location, loss of time', 'Clearly outline the location of the dig site on a map and with physical markers to avoid confusion\r\n\r\n'),
(4, 1, 3, 'Performing the Digging Job', 'On the job injuries during digging, damaging of equipment', 'Training and procedure for proper conduct while digging, backup measures in case of equipment failure.'),
(10, 3, 1, 'Schedule Tasks', 'Disorganization, lack of proper perspective on scope of project, lack of understanding of team members', 'Careful and throughout analysis of the project, the team and their abilities. Project Manager should be able to effectively organize resources to maximize the chances of a successful project. '),
(6, 4, 1, 'Create JHA', 'Potential misunderstandings from doing a poor job', 'Carefully organize the JHA to clearly and precisely outline what a particular job requires procedure wise as well as safety wise'),
(7, 4, 2, 'Write out Job Steps', 'Incorrectly labeling steps and causing confusion', 'Carefully think out and label steps to prevent misinterpretation'),
(8, 4, 3, 'Identify Potential Hazards', 'Incorrectly accessing potential hazards can lead to negative incidents that the company is not prepared to handle.  ', 'Thoroughly assess the threats potential hazards may pose and focus on identifying as many scenarios as possible. '),
(9, 4, 4, 'List Controls for Potential Hazards', 'Controls must properly mitigate risks and prevent consequences of an unexpected incidents. Otherwise the controls are ineffective.', 'If possible, test out controls in experimental environments to ensure their efficacy. Properly research the validity of their use on a potential hazard. '),
(12, 3, 2, 'Test Delete Function	', 'Delete this Record	', 'Delete this Record	');

-- --------------------------------------------------------

--
-- Table structure for table `jha_metadata`
--

DROP TABLE IF EXISTS `jha_metadata`;
CREATE TABLE IF NOT EXISTS `jha_metadata` (
  `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TitleOfJob` varchar(45) NOT NULL,
  `Date` date NOT NULL,
  `TitleOfPersonProvidingTheJob` varchar(45) NOT NULL,
  `Supervisor` varchar(45) NOT NULL,
  `AnalysisPerformedBy` varchar(45) NOT NULL,
  `Organization` varchar(45) NOT NULL,
  `Location` varchar(45) NOT NULL,
  `Department` varchar(45) NOT NULL,
  `ReviewedBy` varchar(45) NOT NULL,
  `RequiredPPE` varchar(45) NOT NULL,
  `RequiredTraining` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jha_metadata`
--

INSERT INTO `jha_metadata` (`ID`, `TitleOfJob`, `Date`, `TitleOfPersonProvidingTheJob`, `Supervisor`, `AnalysisPerformedBy`, `Organization`, `Location`, `Department`, `ReviewedBy`, `RequiredPPE`, `RequiredTraining`) VALUES
(1, 'Shoveling', '2021-04-07', 'Builder', 'Bob', 'Chris H', 'Acme Widgets', 'VA', 'Construction', 'John Doe', 'Hardhat, Gloves', 'Construction'),
(3, 'Scheduling Tasks', '2021-04-14', 'Project Manager', 'Steve', 'Chris H', 'Acme Widgets', 'VA', 'Operations', 'John Doe', 'None', 'Project Management'),
(4, 'Completing JHA', '2021-04-22', 'Compliance Administrator', 'Phil ', 'Chris H', 'Acme Widgets', 'WI', 'Operations', 'John Doe', 'None', 'Proficient Writing, Reasoning Skills');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
