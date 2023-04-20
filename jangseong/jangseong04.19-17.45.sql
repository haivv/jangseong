-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 10:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jangseong`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `num` varchar(10) NOT NULL,
  `date` text NOT NULL,
  `memID` varchar(20) NOT NULL UNIQUE KEY,
  `name` text NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `num`, `date`, `memID`, `name`, `password`) VALUES
(1, '23-2', '2023-04-17', '23-000001', '정재혁', ''),
(2, '23-2', '2023-04-17', '23-000002', '김신우', ''),
(3, '23-2', '2023-04-17', '23-000003', '황희철', ''),
(4, '24-1', '2024-01-17', '24-000002', '권정인', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL PRIMARY KEY,
  `memID` varchar(20) NOT NULL,
  `result` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `equipment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `record` (`id`, `memID`, `result`, `time`, `equipment`) VALUES
(1, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(2, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(3, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(4, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(5, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(6, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(7, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(8, '23-000001', '합격', '00:03:30', '휠형 굴착기'),
(9, '23-000001', '합격', '00:03:30', '휠형 굴착기');

ALTER TABLE `record`
  ADD KEY `ReTest` (`memID`);

ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `record`
  ADD CONSTRAINT `ReTest` FOREIGN KEY (`memID`) REFERENCES `member` (`memID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
