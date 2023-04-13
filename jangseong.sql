-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2023 at 04:01 AM
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
  `num` text NOT NULL,
  `date` text NOT NULL,
  `memID` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `num`, `date`, `memID`, `name`) VALUES
(5, '22-2', '2022-10-14', '22-123145', '김원수'),
(9, '22-2', '2022-10-14', '22-123145', '김재순'),
(10, '22-2', '2022-10-14', '22-123145', '이준호'),
(11, '22-2', '2022-10-14', '19-123145', '성만'),
(12, '22-2', '2022-10-14', '22-12345', '김원수'),
(13, '22-2', '2022-10-14', '22-54321', '김원수'),
(14, '22-2', '2022-10-14', '22-123145', '김원수'),
(15, '22-2', '2022-10-14', '22-123145', '볌규'),
(16, '22-2', '2022-10-14', '22-123145', '정제혁'),
(17, '22-2', '2022-10-14', '22-123145', '기은하'),
(18, '22-3', '2023-03-14', '23-123145', '기은하 2'),
(19, '22-3', '2023-03-12', '23-863145', '기은하 3'),
(20, '22-3', '2023-03-14', '23-123145', '기은하 4'),
(21, '22-3', '2023-03-14', '23-123145', '김동연 1'),
(22, '22-5', '2022-03-14', '23-123145', '김동연 3'),
(23, '22-5', '2022-03-14', '23-123145', '김동연 3'),
(24, '22-5', '2022-03-14', '23-123145', '김동연 3'),
(25, '22-5', '2022-03-14', '23-123145', '김동연 3'),
(26, '22-5', '2022-03-14', '23-123145', '김동연 3'),
(27, 'g', 'g', 'g', 'g'),
(28, 'hjhjh', '2023-04-04', '123', 'abc'),
(29, '123', '2023-04-18', '123', '임은수'),
(30, '12', '2023-04-04', '123', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_data`
--

CREATE TABLE `tb_data` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_data`
--
ALTER TABLE `tb_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_data`
--
ALTER TABLE `tb_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
