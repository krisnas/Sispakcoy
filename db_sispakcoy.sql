-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 07:14 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sispakcoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `iduser` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`iduser`, `username`, `password`, `nama`) VALUES
('U001', 'admin', 'sispakcoy', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `basispengetahuan`
--

CREATE TABLE `basispengetahuan` (
  `namapenyakit` varchar(100) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basispengetahuan`
--

INSERT INTO `basispengetahuan` (`namapenyakit`, `gejala`) VALUES
('Bercak Daun Alternaria', 'Daun berubah menjadi kuning'),
('Bercak Daun Alternaria', 'Akar membusuk'),
('Daun Busuk', 'Daun berubah menjadi kuning'),
('Daun Busuk', 'Daun mengeluarkan lendir'),
('Daun Busuk', 'Daun membusuk'),
('Daun Busuk', 'Akar mengering'),
('Akar Gada', 'Tanaman mulai layu'),
('Akar Gada', 'Akar membusuk'),
('Akar Gada', 'Akar mengering'),
('Akar Gada', 'Tanaman tiba-tiba mati'),
('Akar Gada', 'Akar membesar'),
('Bercak Pada Daun', 'Daun berubah menjadi kuning'),
('Bercak Pada Daun', 'Daun menjadi layu lalu mati'),
('Akar Menjadi Basah Lunak', 'Daun berubah menjadi kuning'),
('Akar Menjadi Basah Lunak', 'Daun membusuk'),
('Akar Menjadi Basah Lunak', 'Tanaman menjadi kerdil'),
('Akar Menjadi Basah Lunak', 'Akar mengeluarkan lendir');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `idgejala` varchar(10) NOT NULL,
  `gejala` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`idgejala`, `gejala`) VALUES
('KG1', 'Daun berubah menjadi kuning'),
('KG10', 'Akar membesar'),
('KG11', 'Akar mengeluarkan lendir'),
('KG13', 'Daun menjadi layu lalu mati'),
('KG2', 'Daun mengeluarkan lendir'),
('KG3', 'Daun membusuk'),
('KG4', 'Tanaman mulai layu'),
('KG5', 'Akar membusuk'),
('KG6', 'Akar mengering'),
('KG7', 'Tanaman menjadi kerdil'),
('KG8', 'Tanaman tiba-tiba mati');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `idpenyakit` varchar(20) NOT NULL,
  `namapenyakit` varchar(1000) NOT NULL,
  `pengendalian` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`idpenyakit`, `namapenyakit`, `pengendalian`) VALUES
('KP1', 'Daun busuk', 'Melakukan penyemprotan fungisida seperti Topsin M 70 WB dan Kocide 60 WDG dan Bion M 1/48 Wp pada tanaman sawi dengan dosis tertentu.'),
('KP2', 'Akar gada', '1. Rotasi tanaman\r\n2. Lakukan pengolahan tanah metode sub soil\r\n3. Penggunaan mulsa bahan organik\r\n4. Menanam tanaman penyubur tanah\r\n5. Gunakan benih yang tahan terhadap penyakit akar gada\r\n6. Bersihkan lahan dari gulma dan tanaman pengganggu lainnya dan juga perbaiki saluran drainase untuk menghindari genangan air yang bisa memperluas penyebaran penyakit'),
('KP3', 'Bercak Daun Alternaria', 'Semprot menggunakan fungisida seperti Dithane dengan dosis tertentu.'),
('KP4', 'Bercak Pada Daun', 'Semprot menggunakan fungisida berbahan aktif berupa Bion M 1/ 48 WP.'),
('KP5', 'Akar Menjadi Basah Lunak', 'Pangkas bagian akar yang busuk menggunakan gunting yang telah dicelupkan pada disinfektan, lalu tanaman kembali bagian yang tersisa pada wadah yang telah disterilkan dengan drainase yang tepat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`idgejala`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`idpenyakit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
