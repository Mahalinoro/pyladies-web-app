-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2020 at 02:15 PM
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
-- Database: `pyladiesTnr`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus-request`
--

CREATE TABLE `contactus-request` (
  `requestID` bigint(20) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus-request`
--

INSERT INTO `contactus-request` (`requestID`, `fullName`, `emailAddress`, `subject`, `message`) VALUES
(1, 'dsdd', 'dad@sdsds.com', 'dasdad', 'aasdasddsda');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters-subscription`
--

CREATE TABLE `newsletters-subscription` (
  `subID` bigint(20) NOT NULL,
  `emailAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletters-subscription`
--

INSERT INTO `newsletters-subscription` (`subID`, `emailAddress`) VALUES
(1, 'hello@yahoo.fr'),
(2, 'helloworld@Yahoo.fr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` bigint(20) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `userName`, `dateOfBirth`, `emailAddress`, `password`) VALUES
(1, 'world', 'hello', 'hello12', '2020-03-05', 'hello@yahoo.fr', '$2y$10$JQdMPbwmdULcYFCq6Lu9YuT8RD6SH4iuhgUTWqEAA5bXW0YPUW6oG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus-request`
--
ALTER TABLE `contactus-request`
  ADD PRIMARY KEY (`requestID`);

--
-- Indexes for table `newsletters-subscription`
--
ALTER TABLE `newsletters-subscription`
  ADD PRIMARY KEY (`subID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus-request`
--
ALTER TABLE `contactus-request`
  MODIFY `requestID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters-subscription`
--
ALTER TABLE `newsletters-subscription`
  MODIFY `subID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
