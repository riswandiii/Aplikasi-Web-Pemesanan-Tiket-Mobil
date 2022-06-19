-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 04:53 PM
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
-- Database: `pemesanan_tiket_bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_panggilan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `no_handphone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_panggilan`, `username`, `no_handphone`, `email`, `password`) VALUES
(2, 'admin', 'admin', '085676453987', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `id_booking` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_booking` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_mobil`, `id_user`, `status_booking`, `tanggal`, `harga`) VALUES
(3, 6, 3, '0', '2022-06-19', 180000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `nama_mobil` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `jam_berangkat` varchar(100) NOT NULL,
  `jam_tiba` varchar(100) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `id_rute`, `nama_mobil`, `fasilitas`, `jam_berangkat`, `jam_tiba`, `tanggal_berangkat`, `harga`) VALUES
(3, 3, 'Manggala', 'Selimut, Ac', '20.00', '05.00', '2022-06-28', 150000),
(5, 6, 'Borlindo', 'Selimut, Ac, Tv', '09.00', '05.30', '2022-06-05', 200000),
(6, 5, 'Primadona', 'Selimut, Ac', '17.00', '03.00', '2022-06-12', 180000),
(7, 6, 'Pelindo', 'Ac, Selimut', '08.00', '15.00', '2022-05-31', 250000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id_rute` int(11) NOT NULL,
  `rute` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rute`
--

INSERT INTO `tb_rute` (`id_rute`, `rute`) VALUES
(2, 'Makassar - Toraja'),
(3, 'Makassar - Luwu Utara'),
(4, 'Makassar - Mamuju'),
(5, 'Makassar - Enrekang'),
(6, 'Makassar - Palopo'),
(7, 'Makassar - Bulukumba');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no_handphone` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `no_handphone`, `alamat`) VALUES
(3, 'srywanty', 'srywanti@gmail.com', 'password', '085654676497', 'Toraja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_rute` (`id_rute`);

--
-- Indexes for table `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id_rute`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_rute`
--
ALTER TABLE `tb_rute`
  MODIFY `id_rute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD CONSTRAINT `tb_booking_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_booking_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tb_mobil` (`id_mobil`);

--
-- Constraints for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD CONSTRAINT `tb_mobil_ibfk_1` FOREIGN KEY (`id_rute`) REFERENCES `tb_rute` (`id_rute`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
