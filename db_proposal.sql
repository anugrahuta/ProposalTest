-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 02:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proposal`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `id_approval` char(1) NOT NULL,
  `appr_stat` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`id_approval`, `appr_stat`) VALUES
('0', 'Pending'),
('1', 'Approved'),
('2', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id_proposal` int(11) NOT NULL,
  `username` varchar(24) NOT NULL,
  `nama_proposal` varchar(256) NOT NULL,
  `file_proposal` varchar(256) NOT NULL,
  `file_izin` varchar(256) NOT NULL,
  `tgl_acara` date NOT NULL,
  `approval_kms` varchar(12) NOT NULL,
  `approval_kaprodi` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id_proposal`, `username`, `nama_proposal`, `file_proposal`, `file_izin`, `tgl_acara`, `approval_kms`, `approval_kaprodi`) VALUES
(25, 'ukmif', 'Proposal 1', 'tesProp8.pdf', '', '2020-05-08', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` char(1) NOT NULL,
  `nama_status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('1', 'ukm'),
('2', 'kms'),
('3', 'kaprodi'),
('4', 'Layanan Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(7) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `pwd` varchar(256) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `pwd`, `status`) VALUES
('01ukmif', 'ukmif', 'UKM Informatika', '$2y$10$vPNYJsuPfU8S1N2cwYv3O.L6Lqx.0.QKND.OH7GqWJ/dC9jKW.4Tq', '1'),
('02kms', 'kms', 'Kemahasiswaan', '$2y$10$vPNYJsuPfU8S1N2cwYv3O.L6Lqx.0.QKND.OH7GqWJ/dC9jKW.4Tq', '2'),
('03kp_if', 'kpif', 'Kaprodi Informatika', '$2y$10$vPNYJsuPfU8S1N2cwYv3O.L6Lqx.0.QKND.OH7GqWJ/dC9jKW.4Tq', '3'),
('04lm', 'lm', 'Layanan Mahasiswa', '$2y$10$vPNYJsuPfU8S1N2cwYv3O.L6Lqx.0.QKND.OH7GqWJ/dC9jKW.4Tq', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`id_approval`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id_proposal`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id_proposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
