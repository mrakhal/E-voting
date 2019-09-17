-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 09:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_bem`
--

CREATE TABLE `calon_bem` (
  `no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `photo` varchar(500) NOT NULL,
  `suara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calon_bem`
--

INSERT INTO `calon_bem` (`no`, `nama`, `photo`, `suara`) VALUES
(1, 'Soeltan Batoegana', 'bem_1.jpg', 0),
(2, 'Sule Sutisna', 'bem_2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`, `keterangan`) VALUES
(1, 'Ilmu Komputer', NULL),
(2, 'Fisika', NULL),
(3, 'Kimia', NULL),
(4, 'Biologi', NULL),
(5, 'Matematika', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fakultas` varchar(5) CHARACTER SET utf8 DEFAULT NULL,
  `status` varchar(100) DEFAULT ' ',
  `nama` varchar(34) CHARACTER SET utf8 DEFAULT NULL,
  `jurusan` varchar(24) CHARACTER SET utf8 DEFAULT NULL,
  `jenjang` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa2`
--

CREATE TABLE `mahasiswa2` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa2`
--

INSERT INTO `mahasiswa2` (`nim`, `nama`, `jurusan`, `status`) VALUES
('1403123295', 'tito santana', 'ilmu komputer', ''),
('1403123296', 'tito santana', 'fisika', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `status`) VALUES
('admin', 'pemira123', 'admin', 'admin'),
('user', 'pemira123', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_bem`
--
ALTER TABLE `calon_bem`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mahasiswa2`
--
ALTER TABLE `mahasiswa2`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
