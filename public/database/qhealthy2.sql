-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 04:06 PM
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
-- Database: `qhealthy2`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pasien`
--

CREATE TABLE `daftar_pasien` (
  `No` int(7) NOT NULL,
  `No_RM` varchar(8) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Usia` int(3) NOT NULL,
  `Jenis_Kelamin` varchar(12) NOT NULL,
  `Gol_Darah` varchar(12) NOT NULL,
  `TB` int(3) NOT NULL,
  `BB` int(3) NOT NULL,
  `Pekerjaan` varchar(50) NOT NULL,
  `Alamat` varchar(250) NOT NULL,
  `No_Telp` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_pasien`
--

INSERT INTO `daftar_pasien` (`No`, `No_RM`, `Nama`, `Usia`, `Jenis_Kelamin`, `Gol_Darah`, `TB`, `BB`, `Pekerjaan`, `Alamat`, `No_Telp`) VALUES
(0, '15-08-01', 'Muhammad Arfi', 19, 'Laki-Laki', '', 0, 0, 'Mahasiswa', 'Jl. Babu Dayah Alim, Kec. Batureoh, Lamlagan', '8382'),
(0, '15-08-02', 'Rubaidah', 61, 'Perempuan', '', 0, 0, 'IRT', 'Jl. Kebayoran TImur', '2938');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_lab`
--

CREATE TABLE `hasil_lab` (
  `id_rm` int(7) NOT NULL,
  `No_RM` varchar(8) NOT NULL,
  `Tgl_Pemeriksaan` date NOT NULL,
  `Jenis_Lab` varchar(20) NOT NULL,
  `Nama_Laboran` varchar(50) NOT NULL,
  `Hasil_Lab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `id_rm` int(7) NOT NULL,
  `No_RM` varchar(8) NOT NULL,
  `Tgl_Rawat` date NOT NULL,
  `Poliklinik` varchar(50) NOT NULL,
  `Nama_Dokter` varchar(50) NOT NULL,
  `Periksa` text NOT NULL,
  `Tindakan` text NOT NULL,
  `Diagnosis` text NOT NULL,
  `Obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rm`, `No_RM`, `Tgl_Rawat`, `Poliklinik`, `Nama_Dokter`, `Periksa`, `Tindakan`, `Diagnosis`, `Obat`) VALUES
(1, '15-08-02', '2022-05-14', '', 'Alzam', 'Pusing', 'Diberikan obat', 'Flu', 'Paracetamol'),
(2, '15-08-01', '2022-05-22', '', 'Rahma', 'Batuk', 'Diberikan Vitamin', 'Sakit TBC', 'Obat antibiotik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` varchar(15) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `user`, `username`, `email`, `password`) VALUES
(1, 'Aulia Mentari', '', 'aulia', 'aulia@gmail.com', 'aulia'),
(2, 'adminq', '', 'adminq', 'adminq@gmail.com', 'qwerty123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pasien`
--
ALTER TABLE `daftar_pasien`
  ADD PRIMARY KEY (`No_RM`);

--
-- Indexes for table `hasil_lab`
--
ALTER TABLE `hasil_lab`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `No_RM` (`No_RM`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `No RM` (`No_RM`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_lab`
--
ALTER TABLE `hasil_lab`
  MODIFY `id_rm` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rm` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_lab`
--
ALTER TABLE `hasil_lab`
  ADD CONSTRAINT `hasil_lab_ibfk_1` FOREIGN KEY (`No_RM`) REFERENCES `daftar_pasien` (`No_RM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`No_RM`) REFERENCES `daftar_pasien` (`No_RM`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
