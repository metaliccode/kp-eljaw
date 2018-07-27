-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2018 at 04:35 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_jadwal_r`
--
CREATE DATABASE IF NOT EXISTS `db_jadwal_r` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_jadwal_r`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'Wildan Adzani', 'wildan', 'ac174e67e662c4d31dcc2e8b16358024'),
(3, 'Ihsan Miftahul Huda', 'ihsan', 'ccbc2bffe69e83479314d2df030a2cdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE IF NOT EXISTS `tb_dosen` (
  `id_dosen` int(10) NOT NULL AUTO_INCREMENT,
  `nip` bigint(20) NOT NULL,
  `dosen` varchar(50) NOT NULL,
  `d_prodi` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `nip` (`nip`),
  KEY `d_prodi` (`d_prodi`),
  KEY `d_prodi_2` (`d_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nip`, `dosen`, `d_prodi`, `email`, `no_hp`) VALUES
(2, 1002, 'Wildan Adzani Fajriansyah', 'Informatika', 'wildan@gmail.com', ''),
(3, 1001, 'Ihsan Miftahul Huda', 'Informatika', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE IF NOT EXISTS `tb_jadwal` (
  `id_jadwal` int(10) NOT NULL AUTO_INCREMENT,
  `hari` varchar(20) NOT NULL,
  `waktu1` time NOT NULL,
  `waktu2` time NOT NULL,
  `kd_matkul` varchar(20) NOT NULL,
  `kd_dosen` int(10) NOT NULL,
  `kd_ruang` varchar(20) NOT NULL,
  `kd_jurusan` varchar(20) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `kd_matkul` (`kd_matkul`,`kd_dosen`,`kd_ruang`),
  KEY `kelas` (`kelas`),
  KEY `kd_jurusan` (`kd_jurusan`),
  KEY `kd_ruang` (`kd_ruang`),
  KEY `kd_dosen` (`kd_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE IF NOT EXISTS `tb_jurusan` (
  `id_jurusan` int(10) NOT NULL AUTO_INCREMENT,
  `kd_jurusan` varchar(20) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  UNIQUE KEY `kd_jurusan` (`kd_jurusan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `kd_jurusan`, `jurusan`) VALUES
(1, 'IF01', 'Informatika'),
(3, 'HES', 'Hukum Ekonomi Syariah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_kelas` (
  `id_kelas` int(10) NOT NULL AUTO_INCREMENT,
  `kd_kelas` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  UNIQUE KEY `kelas` (`kelas`),
  UNIQUE KEY `kd_kelas` (`kd_kelas`,`kelas`),
  UNIQUE KEY `kd_kelas_2` (`kd_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kd_kelas`, `kelas`) VALUES
(1, 'k1', 'A'),
(2, 'k2', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE IF NOT EXISTS `tb_matkul` (
  `id_matkul` int(10) NOT NULL AUTO_INCREMENT,
  `kd_matkul` varchar(20) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `sks` int(50) NOT NULL,
  `kd_jurusan` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  PRIMARY KEY (`id_matkul`),
  UNIQUE KEY `kd_matkul` (`kd_matkul`),
  KEY `kd_jurusan` (`kd_jurusan`,`semester`),
  KEY `semester` (`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`id_matkul`, `kd_matkul`, `matkul`, `sks`, `kd_jurusan`, `semester`) VALUES
(1, '10001', 'Basis Data', 3, 'IF01', 2),
(3, '10002', 'Bahasa Arab 2 (Muthala''ah)', 2, 'HES', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruangan`
--

CREATE TABLE IF NOT EXISTS `tb_ruangan` (
  `id_ruang` int(10) NOT NULL AUTO_INCREMENT,
  `kd_ruang` varchar(20) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ruang`),
  UNIQUE KEY `kd_ruang` (`kd_ruang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruang`, `kd_ruang`, `nama_ruang`) VALUES
(1, 'R1', 'Gedung Ruang A1'),
(2, 'R2', 'Ruang B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_semester`
--

CREATE TABLE IF NOT EXISTS `tb_semester` (
  `id_smt` int(10) NOT NULL AUTO_INCREMENT,
  `semester` int(5) NOT NULL,
  `ket` varchar(20) NOT NULL,
  PRIMARY KEY (`id_smt`),
  UNIQUE KEY `semester` (`semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_smt`, `semester`, `ket`) VALUES
(1, 1, 'Ganjil'),
(2, 2, 'Genap'),
(3, 3, 'Ganjil'),
(4, 4, 'Genap'),
(5, 5, 'Ganjil'),
(6, 6, 'Genap'),
(7, 7, 'Ganjil'),
(8, 8, 'Genap');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`kd_matkul`) REFERENCES `tb_matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_10` FOREIGN KEY (`kd_ruang`) REFERENCES `tb_ruangan` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_11` FOREIGN KEY (`kd_matkul`) REFERENCES `tb_matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_12` FOREIGN KEY (`kd_jurusan`) REFERENCES `tb_jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_13` FOREIGN KEY (`kd_ruang`) REFERENCES `tb_ruangan` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_14` FOREIGN KEY (`kd_dosen`) REFERENCES `tb_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_15` FOREIGN KEY (`kd_matkul`) REFERENCES `tb_matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_16` FOREIGN KEY (`kelas`) REFERENCES `tb_kelas` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`kd_dosen`) REFERENCES `tb_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_3` FOREIGN KEY (`kelas`) REFERENCES `tb_kelas` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_4` FOREIGN KEY (`kd_ruang`) REFERENCES `tb_ruangan` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_5` FOREIGN KEY (`kd_ruang`) REFERENCES `tb_ruangan` (`kd_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_6` FOREIGN KEY (`kelas`) REFERENCES `tb_kelas` (`kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_7` FOREIGN KEY (`kd_matkul`) REFERENCES `tb_matkul` (`kd_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_8` FOREIGN KEY (`kd_dosen`) REFERENCES `tb_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_jadwal_ibfk_9` FOREIGN KEY (`kd_jurusan`) REFERENCES `tb_jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD CONSTRAINT `tb_matkul_ibfk_1` FOREIGN KEY (`kd_jurusan`) REFERENCES `tb_jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_2` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_3` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_4` FOREIGN KEY (`kd_jurusan`) REFERENCES `tb_jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_5` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_6` FOREIGN KEY (`semester`) REFERENCES `tb_semester` (`semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_matkul_ibfk_7` FOREIGN KEY (`kd_jurusan`) REFERENCES `tb_jurusan` (`kd_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
