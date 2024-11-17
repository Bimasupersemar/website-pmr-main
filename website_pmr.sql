-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for website_pmr
DROP DATABASE IF EXISTS `website_pmr`;
CREATE DATABASE IF NOT EXISTS `website_pmr` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `website_pmr`;

-- Dumping structure for table website_pmr.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table website_pmr.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(2, 'admin', '12345'),
	(3, 'atmin', 'atmin'),
	(4, 'ahmin', 'ahmin');

-- Dumping structure for table website_pmr.berita
DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table website_pmr.berita: ~0 rows (approximately)
INSERT INTO `berita` (`id`, `nama`, `foto`, `isi`, `tgl_isi`) VALUES
	(1, 'SMKN1 Bawang', 'partners_1731829405_279203015_100237229345200_8235803435206455557_n(1).jpg', '<p>SMKN 1 Bawang</p>', '2024-11-17 07:43:25');

-- Dumping structure for table website_pmr.halaman
DROP TABLE IF EXISTS `halaman`;
CREATE TABLE IF NOT EXISTS `halaman` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `kutipan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table website_pmr.halaman: ~3 rows (approximately)
INSERT INTO `halaman` (`id`, `judul`, `kutipan`, `isi`, `tgl_isi`) VALUES
	(11, 'Website PMR SMK Negeri 1 Bawang', 'Website apalah', '<p><img src="../gambar/045117b0e0a11a242b9765e79cbf113f.jpg" style="width: 150px;">&nbsp;<b>PMR SMKN 1 BAWANG</b><span style="font-size: 36px;">﻿</span><br></p>', '2024-11-17 11:56:58'),
	(12, 'Sejarah PMR', 'Sejarah PMR', 'Begini Sejarahnya', '2024-11-17 12:37:58');

-- Dumping structure for table website_pmr.info
DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table website_pmr.info: ~0 rows (approximately)
INSERT INTO `info` (`id`, `judul`, `isi`, `tgl_isi`) VALUES
	(1, 'Infokan', '<p><a href="/Website-PMR-main/admin/login.php" target="_blank">•</a><br></p>', '2024-11-17 14:19:21');

-- Dumping structure for table website_pmr.pendaftaran
DROP TABLE IF EXISTS `pendaftaran`;
CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `nis` int DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text,
  `nomor` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table website_pmr.pendaftaran: ~0 rows (approximately)
INSERT INTO `pendaftaran` (`id`, `nama_lengkap`, `kelas`, `nis`, `gender`, `alamat`, `nomor`) VALUES
	(1, 'Subagyo', '11 rpl', 19016, 'Laki-laki', 'Gemuruh', '018993729'),
	(6, 'Disyun', '11 rpl', 19017, 'Perempuan', 'Somawangi', '086781221');

-- Dumping structure for table website_pmr.pengurus
DROP TABLE IF EXISTS `pengurus`;
CREATE TABLE IF NOT EXISTS `pengurus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `isi` text COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_isi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table website_pmr.pengurus: ~0 rows (approximately)
INSERT INTO `pengurus` (`id`, `nama`, `foto`, `isi`, `tgl_isi`) VALUES
	(1, 'Anto', 'pengurus_1731827987_WhatsApp Image 2024-05-30 at 13.43.15_fec1d3da.jpg', '<p><b>Ketua PMR</b></p>', '2024-11-17 07:19:47');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
