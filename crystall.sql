-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2018 at 09:51 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crystall`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pembayaran`
--

CREATE TABLE `bukti_pembayaran` (
  `invoice` binary(13) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `id_user` binary(13) NOT NULL,
  `status` varchar(30) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_paket`
--

CREATE TABLE `order_paket` (
  `invoice` binary(13) NOT NULL,
  `id_paket` binary(13) NOT NULL,
  `id_user` binary(13) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `harga` int(30) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` varchar(300) DEFAULT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paket_reguler`
--

CREATE TABLE `paket_reguler` (
  `id` binary(13) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(30) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `class` varchar(20) NOT NULL,
  `tag` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket_reguler`
--

INSERT INTO `paket_reguler` (`id`, `nama_paket`, `harga`, `deskripsi`, `class`, `tag`) VALUES
(0x35633034303263336561343730, 'Silver', 400, 'Suka cita dengan nuansa mewah yang menjadikan hari anda penuh dengan kebahagian yang mengakar sampai akhir waktu dalam paket silver. ', 'High class', 'Internasional'),
(0x35633034303330646561353538, 'Premium', 700, 'Suka cita dengan nuansa mewah yang menjadikan hari anda penuh dengan kebahagian yang mengakar sampai akhir waktu dalam paket silver. ', 'High class', 'Internasional'),
(0x35633131646365623630373832, 'Gold', 850, 'Suka cita dengan nuansa mewah yang menjadikan hari anda penuh dengan kebahagian yang mengakar sampai akhir waktu dalam paket silver. ', 'High class', 'Internasional'),
(0x35633131646432386233303732, 'Elegant', 950, 'Suka cita dengan nuansa mewah yang menjadikan hari anda penuh dengan kebahagian yang mengakar sampai akhir waktu dalam paket silver. ', 'Premium luxury', 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` binary(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `foto_profil` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti_pembayaran`
--
ALTER TABLE `bukti_pembayaran`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `order_paket`
--
ALTER TABLE `order_paket`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `paket_reguler`
--
ALTER TABLE `paket_reguler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
