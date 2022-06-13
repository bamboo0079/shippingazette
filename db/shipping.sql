-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 02:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `id` int(11) NOT NULL,
  `agent_nm_vn` varchar(1024) NOT NULL,
  `agent_nm_en` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(12) NOT NULL,
  `country_nm_vn` varchar(1024) NOT NULL,
  `coutry_nm_en` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(12) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title_vn` varchar(1024) NOT NULL,
  `title_en` varchar(1024) NOT NULL,
  `content_vn` text NOT NULL,
  `content_en` text NOT NULL,
  `inp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` int(1) NOT NULL,
  `del_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `port`
--

CREATE TABLE `port` (
  `id` int(10) NOT NULL,
  `port_nm_vn` varchar(1024) NOT NULL,
  `port_nm_en` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `port`
--

INSERT INTO `port` (`id`, `port_nm_vn`, `port_nm_en`, `status`) VALUES
(1, 'ALGER (DZALG), DZ', 'ALGER (DZALG), DZ', 0),
(2, 'VLORE (ALVOA), AL', 'VLORE (ALVOA), AL', 0),
(3, 'ANNABA (DZAAE), DZ', 'ANNABA (DZAAE), DZ', 0),
(4, 'VLORE (ALVOA)', 'VLORE (ALVOA)', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scenario`
--

CREATE TABLE `scenario` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `boss_port_id` int(11) NOT NULL COMMENT '#cảng dỡ',
  `unloading_port_id` int(11) NOT NULL COMMENT '#cảng dỡ',
  `ship_id` int(11) NOT NULL COMMENT '#tàu id',
  `agent_id` int(11) NOT NULL,
  `departure_day` date NOT NULL COMMENT '#ngày khởi hành',
  `arrival_date` date NOT NULL COMMENT '#ngày đến',
  `total_date` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(11) NOT NULL,
  `ship_nm_vn` varchar(1024) NOT NULL,
  `ship_nm_en` varchar(1024) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ship`
--

INSERT INTO `ship` (`id`, `ship_nm_vn`, `ship_nm_en`, `status`) VALUES
(1, 'AEL', 'AEL', 0),
(2, 'APL', 'APL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(1024) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `name` varchar(1024) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `address` varchar(1024) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `level` int(1) NOT NULL DEFAULT 1,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `name`, `email`, `address`, `phone`, `level`, `status`) VALUES
(1, 'minhnhut0079@gmail.com', '8c50f39e32986f69c4f210b40e0be29c', 'Nguyen Minh Nhut', 'minhnhut0079@gmail.com', 'Long An', '0969411898', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `port`
--
ALTER TABLE `port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scenario`
--
ALTER TABLE `scenario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `port`
--
ALTER TABLE `port`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scenario`
--
ALTER TABLE `scenario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
