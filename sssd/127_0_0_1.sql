-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2019 at 02:32 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `extra`
--
CREATE DATABASE IF NOT EXISTS `extra` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `extra`;

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(100) NOT NULL,
  `pname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `amo` int(100) NOT NULL,
  `amop` int(100) NOT NULL,
  `tests` varchar(111) NOT NULL,
  `timecancel` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `count`
--

CREATE TABLE `count` (
  `count` int(100) NOT NULL,
  `ref` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `count`
--

INSERT INTO `count` (`count`, `ref`) VALUES
(0, '2019-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `pass`
--

CREATE TABLE `pass` (
  `pass` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass`
--

INSERT INTO `pass` (`pass`) VALUES
('7010');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `tid` int(100) NOT NULL,
  `tnames` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`tid`, `tnames`) VALUES
(1, 'CBP'),
(2, 'ESR'),
(3, 'Blood Parasites MP/Microfilaria'),
(4, 'Malarial Parasites(Rapid test or card Method)'),
(5, 'Haemoglobin'),
(6, 'A.E.c.\r\n'),
(7, 'Platelet count'),
(8, 'BT & CT'),
(9, 'Blood Grouping + Rh Typing'),
(10, 'C.U.E.'),
(11, 'B.S.,B.P.'),
(12, 'Stool Exam Routine'),
(13, 'Stool for PH & Reducing Substances'),
(14, 'urine pregnancy test'),
(15, 'Semen Analysis'),
(16, 'Random Blood Sugar'),
(17, 'Fasting/Post Lunch Blood sugar'),
(18, 'Blood urea'),
(19, 'S. Creatinine'),
(20, 'S. Uric Acid'),
(21, 'S. Cholesterol'),
(22, 'S. Triglycerides'),
(23, 'S. Calcium'),
(24, 'S. Proteins with A/G Ratio'),
(25, 'S.Bilirubin'),
(26, 'S. Electrolytes'),
(27, 'S. Lipid Profile'),
(28, 'LFT'),
(29, 'Widal Test'),
(30, 'TB lgG/lgM'),
(31, 'Denque lgG/lgM'),
(32, 'ASO'),
(33, 'RA Factor'),
(34, 'CRP'),
(35, 'VDRL'),
(36, 'HBsAg.'),
(37, 'HIV I&II'),
(38, 'Mantoux Test'),
(39, 'Sputum for AFB'),
(40, 'Other');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`datetime`);

--
-- Indexes for table `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `tid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
