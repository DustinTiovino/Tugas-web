-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 02:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sun_atk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(1, 'dustin', 'e99a18c428cb38d5f260853678922e03'),
(2, 'hazel', 'e99a18c428cb38d5f260853678922e03'),
(3, 'william', 'e99a18c428cb38d5f260853678922e03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `no_barang` int(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `harga_barang` varchar(20) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`no_barang`, `nama_barang`, `jumlah`, `harga_barang`, `gambar`) VALUES
(1, 'Pen standard AE7 hitam 0.5', 10, '3000', 'pen_standard_AE7_hitam_0,5.jpg'),
(2, 'Correction fluid joyko', 10, '4000', 'correction_fluid_joyko.jpg'),
(3, 'Pensil 2B faber-castell', 10, '5000', 'pensil_2B_faber_castell.jpg'),
(4, 'Binder note A5', 10, '19000', 'binder_note_A5.jpg'),
(5, 'Binder note A6', 10, '13000', 'binder_note_A6.jpg'),
(6, 'Foam double side tape merk nachi tape', 10, ' 13000', 'foam_double_side_tape_merk_nachi_tape.jpg'),
(7, 'Lakban cokelat 100yard merk gold tape', 10, '15000', 'lakban_cokelat_100yard_merk_gold_tape.jpg'),
(8, 'Lakban bening 100yard merk gold tape', 10, '15000', 'lakban_bening_100yard_merk_gold_tape.jpg'),
(9, 'Glue stick kenko 8g', 10, '4000', 'glue_stick_kenko_8g.jpg'),
(10, 'Double tape 1inch joyko', 10, '6500', 'double_tape_1inch_joyko.jpg'),
(11, 'Lakban hitam 1,5inch nachi tape', 10, '15000', 'lakban_hitam_1,5inch_nachi_tape.jpg'),
(12, 'Lem fox 150g', 10, '13000', 'lem_fox_150g.jpg'),
(13, 'Kapur tulis 8cm isi 50 batang merk sarjana', 10, '7000', 'kapur_tulis_8cm_isi_50_batang_merk_sarjana.jpg'),
(14, 'Correction tape 12m x 5mm joyko', 10, '7000', 'correction_tape_12m_x_5mm_joyko.jpg'),
(15, 'Penghapus faber-castell', 10, '9000', 'penghapus_faber_castell.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`no_barang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `no_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
