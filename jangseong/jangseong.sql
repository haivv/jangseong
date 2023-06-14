-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 08:10 AM
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
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `authority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accID`, `username`, `password`, `authority`) VALUES
(1, 'member1', '123', 1),
(2, 'member2', '123', 2),
(3, 'member3', '123', 3),
(4, 'member4', '123', 4),
(5, 'member5', '123', 5);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `name`) VALUES
(1, 'admin'),
(2, '휠형'),
(3, '궤도형'),
(4, '도저'),
(5, '로더'),
(6, '그레이더');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `num` varchar(10) NOT NULL,
  `class` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `memID` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `num`, `class`, `date`, `memID`, `name`, `password`) VALUES
(1, '23-12', '인천', '2023-04-17', '23-000001', '정재혁', ''),
(2, '23-02', '울산', '2023-04-17', '23-000002', '김신우', ''),
(3, '23-02', '대구', '2023-04-17', '23-000003', '황희철', ''),
(4, '24-12', '서울', '2024-01-17', '24-000002', '권정인', ''),
(53, '23-12', '울산', '2023-05-03', '23-444444', '임은수', ''),
(54, '23-12', '대구', '2023-05-15', '23-111111', '임은수', ''),
(55, '23-01', '서울', '2023-05-09', '23-12345', '임은수', ''),
(56, '23-02', '서울', '2023-05-02', '23-11111', '김원상', ''),
(57, '22-03', '울산', '2022-10-14', '22-123145', '김원수', ''),
(60, '22-04', '울산', '2022-02-01', '22-123456', '임은수', ''),
(61, '23-05', '울산', '2023-05-16', '23-13564', '임은수', ''),
(66, '23-05', '울산', '2023-05-16', '23-143444', '박성만', ''),
(228, '23-03', '울산', '2023-10-14', '23-123150', '김원수', ''),
(229, '23-03', '울산', '2023-10-14', '23-123147', '김하은', ''),
(356, '23-11', '울산', '2023-05-09', '23-264445', '김주하', ''),
(364, '23-11', '울산', '2023-05-09', '23-222225', '김주하', ''),
(372, '23-04', '울산', '2023-05-10', '23-123459', '김주하', ''),
(373, '23-12', '서울', '2023-05-09', '23-123450', '임은수', ''),
(468, '23-11', '하남', '2023-07-16', '23-071611', '박가나', ''),
(665, '23-11', '울산', '2023-06-15', '23-322222', '김주하', ''),
(666, '23-11', '울산', '2023-06-07', '23-222230', '정재혁', ''),
(667, '03-12', '서울', '2023-06-07', '23-205557', '김하은', ''),
(668, '23-03', '부산', '2023-10-14', '23-123137', '김하은', ''),
(766, '23-02', '울산', '2023-10-14', '23-123146', '김원수', '');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `memID` varchar(20) NOT NULL,
  `result` varchar(10) NOT NULL,
  `time` time NOT NULL,
  `mode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `memID`, `result`, `time`, `mode`) VALUES
(1, '23-000001', '불합격', '00:03:30', '시험'),
(2, '23-000001', '불합격', '00:03:30', '연습'),
(3, '23-000001', '합격', '00:03:30', '자율'),
(4, '23-000001', '합격', '00:03:30', '자율'),
(5, '23-000001', '불합격', '00:03:30', '연습'),
(6, '23-000002', '불합격', '00:03:30', '연습'),
(7, '23-000001', '불합격', '00:03:30', '자율'),
(8, '23-000001', '불합격', '00:03:30', '시험'),
(9, '23-000002', '합격', '00:03:30', '자율'),
(12, '23-000001', '불합격', '00:03:30', '연습');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accID`),
  ADD KEY `Authority` (`authority`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `memID` (`memID`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ReTest` (`memID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=767;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `Authority` FOREIGN KEY (`authority`) REFERENCES `authority` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `ReTest` FOREIGN KEY (`memID`) REFERENCES `member` (`memID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
