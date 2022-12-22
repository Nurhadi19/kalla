-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `db_kalla`;

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `tb_data_prospek`;
CREATE TABLE `tb_data_prospek` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `media` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `sumber_prospek` varchar(100) NOT NULL,
  `model_kendaraan` varchar(100) NOT NULL,
  `type_kendaraan` varchar(100) NOT NULL,
  `status_prospek` varchar(50) NOT NULL,
  `tanggal_prospek` date NOT NULL,
  `keterangan_prospek` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `tb_data_prospek_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_data_prospek` (`id_data`, `id_user`, `jabatan`, `nama_customer`, `media`, `alamat`, `sumber_prospek`, `model_kendaraan`, `type_kendaraan`, `status_prospek`, `tanggal_prospek`, `keterangan_prospek`) VALUES
(5,	1,	'Supervisor',	'Maryam Azzahrah',	'Facebook',	'BTP',	'Nurhadi Sasono',	'Toyota',	'Vitara',	'Low',	'2022-12-13',	'Menunggu'),
(6,	3,	'Sales',	'Maryam Azzahrah',	'Facebook',	'BTN Antara Blok A25 No.2',	'Nurhadi Sasono',	'Toyota',	'M150',	'Low',	'2022-12-13',	'Menunggu'),
(8,	1,	'Supervisor',	'Muflihun Azis',	'Instagram',	'BTN Antara Blok A25 No.10',	'Nama Sales 3',	'Suzuki',	'M150',	'Hot',	'2022-12-14',	'Menunggu'),
(9,	3,	'Sales',	'Muhammad Akbar Yunus',	'Instagram',	'Pinrang',	'Nurhadi Sasono',	'Suzuki',	'M150',	'Low',	'2022-12-14',	'coba'),
(11,	3,	'Sales',	'Widya Kartika',	'Instagram',	'BTP Blok AF',	'Tegar Wijaksana',	'Toyota',	'M150',	'Medium',	'2022-12-14',	'coba'),
(15,	1,	'Supervisor',	'Nama 1',	'Facebook',	'Pinrang',	'Tegar Wijaksana',	'Toyota',	'M150',	'Low',	'2022-12-17',	'Menunggu'),
(16,	3,	'Sales',	'Fahrah',	'Facebook',	'BTN Ranggong',	'Tegar Wijaksana',	'Suzuki',	'M150',	'Medium',	'2022-12-17',	'Menunggu'),
(17,	3,	'Sales',	'Risal',	'Twitter',	'BTP',	'Nurhadi Sasono',	'Toyota',	'M150',	'Hot',	'2022-12-17',	'Menunggu'),
(18,	1,	'Supervisor',	'Ketapang',	'Twitter',	'BTN Antara Blok A25 No.2',	'Ikhwanul Umra',	'Toyota',	'M150',	'Low',	'2022-12-21',	'Menunggu'),
(19,	9,	'Sales',	'Henry',	'Facebook',	'BTN Antara Blok A25 No.2',	'Sales 1',	'Suzuki',	'M150',	'Medium',	'2022-12-21',	'Menunggu');

DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1,	'Admin'),
(2,	'User');

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `foto_profil`, `jabatan`) VALUES
(1,	'Nurhadi Sasono',	'nurhadi',	'e10adc3949ba59abbe56e057f20f883e',	'belum ada',	'Supervisor'),
(3,	'Tegar Wijaksana',	'tegar123',	'e10adc3949ba59abbe56e057f20f883e',	'belum ada',	'Sales'),
(5,	'Ainun Zulkiah',	'ainun123',	'e10adc3949ba59abbe56e057f20f883e',	'Logo_PNUP__Politeknik_Negeri_Ujung_Pandang__Original-removebg-preview.png',	'Supervisor'),
(6,	'Irvan Samben',	'irvan123',	'e10adc3949ba59abbe56e057f20f883e',	'AVA_3929.JPG',	'Supervisor'),
(7,	'Muhammad Ashar Al-hakim',	'aca',	'e10adc3949ba59abbe56e057f20f883e',	'gsw.png',	'Supervisor'),
(8,	'Ikhwanul Umra',	'ketapang',	'e10adc3949ba59abbe56e057f20f883e',	'kemendikbud.png',	'Supervisor'),
(9,	'Sales 1',	'sales123',	'e10adc3949ba59abbe56e057f20f883e',	'kampus_merdeka.png',	'Sales');

-- 2022-12-21 09:43:16
