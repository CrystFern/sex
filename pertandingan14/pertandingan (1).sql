 -- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 02:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pertandingan`
--

-- --------------------------------------------------------

--
-- Table structure for table `hakim`
--

CREATE TABLE `hakim` (
  `idhakim` varchar(3) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namahakim` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `nokp` varchar(12) NOT NULL,
  `idpenilaian` varchar(4) NOT NULL,
  `markah` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `idpenilaian` varchar(3) NOT NULL,
  `aspek` varchar(30) DEFAULT NULL,
  `markahpenuh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `nokp` varchar(12) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namapeserta` varchar(30) DEFAULT NULL,
  `telefon` varchar(12) DEFAULT NULL,
  `idhakim` varchar(3) DEFAULT NULL,
  `idurusetia` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `urusetia`
--

CREATE TABLE `urusetia` (
  `idurusetia` varchar(3) NOT NULL,
  `password` varchar(8) DEFAULT NULL,
  `namaurusetia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hakim`
--
ALTER TABLE `hakim`
  ADD PRIMARY KEY (`idhakim`);

--
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`nokp`,`idpenilaian`),
  ADD KEY `nokp` (`nokp`,`idpenilaian`),
  ADD KEY `idpenilaian` (`idpenilaian`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`idpenilaian`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`nokp`),
  ADD KEY `idhakim` (`idhakim`),
  ADD KEY `idurusetia` (`idurusetia`);

--
-- Indexes for table `urusetia`
--
ALTER TABLE `urusetia`
  ADD PRIMARY KEY (`idurusetia`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD CONSTRAINT `keputusan_penilaian` FOREIGN KEY (`idpenilaian`) REFERENCES `penilaian` (`idpenilaian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_peserta` FOREIGN KEY (`nokp`) REFERENCES `penilaian` (`idpenilaian`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_hakim` FOREIGN KEY (`idhakim`) REFERENCES `hakim` (`idhakim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peserta_urusetia` FOREIGN KEY (`idurusetia`) REFERENCES `urusetia` (`idurusetia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
