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
  `id` int(11) NOT NULL,
  `num` varchar(10) NOT NULL,
  `date` text NOT NULL,
  `memID` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `password` varchar(20) NOT NULL,
  `nofpass` int(11) NOT NULL,
  `noftest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `num`, `date`, `memID`, `name`, `password`, `nofpass`, `noftest`) VALUES
(30, '23-2', '2023-04-17', '23-000003', '정재혁', '', 0, 0),
(32, '23-2', '2023-04-17', '23-000002', '김신우', '1234', 0, 0),
(33, '22-1', '2022-01-17', '22-000001', '황희철', '1234', 0, 0),
(34, '24-1', '2024-01-17', '24-000002', '권정인', '1234', 0, 0),
(48, '22-3', '2023-10-14', '23-123145', '김원수', '', 0, 0),
(49, '22-3', '2023-10-14', '23-123145', '김원수', '', 0, 0),
(50, '22-3', '2023-10-14', '23-123145', '김원수2', '', 0, 0),
(51, '23', '2023-04-18', '23', '임은수', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `tbmemID` int(11) NOT NULL,
  `result` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `equipment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `tbmemID`, `result`, `time`, `equipment`) VALUES
(1, 51, '합격', '00:34:40', '휠형 굴착기'),
(2, 51, '불합격', '00:02:40', '휠형 굴착기'),
(3, 51, '불합격', '00:34:40', '궤도형 굴착기'),
(4, 51, '합격', '00:02:40', '도저'),
(5, 30, '불합격', '00:34:40', '휠형 굴착기'),
(6, 30, '합격', '00:02:40', '도저'),
(7, 32, '합격', '00:34:40', '휠형 굴착기'),
(8, 34, '합격', '00:02:40', '도저');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ReTest` (`tbmemID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `ReTest` FOREIGN KEY (`tbmemID`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
