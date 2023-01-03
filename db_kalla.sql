-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `db_kalla` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_kalla`;

DROP TABLE IF EXISTS `tb_data_prospek`;
CREATE TABLE `tb_data_prospek` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `nama_sales` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `media` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `sumber_prospek` varchar(100) NOT NULL,
  `id_model_kendaraan` int(11) NOT NULL,
  `type_kendaraan` varchar(100) NOT NULL,
  `status_prospek` varchar(50) NOT NULL,
  `tanggal_prospek` date NOT NULL,
  `keterangan_prospek` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data`),
  KEY `id_user` (`id_user`),
  KEY `id_model_kendaraan` (`id_model_kendaraan`),
  CONSTRAINT `tb_data_prospek_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_data_prospek_ibfk_2` FOREIGN KEY (`id_model_kendaraan`) REFERENCES `tb_model_kendaraan` (`id_model_kendaraan`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_data_prospek` (`id_data`, `id_user`, `jabatan`, `nama_sales`, `nama_customer`, `media`, `alamat`, `no_hp`, `sumber_prospek`, `id_model_kendaraan`, `type_kendaraan`, `status_prospek`, `tanggal_prospek`, `keterangan_prospek`) VALUES
(22,	1,	'Supervisor',	'Nurhadi Sasono',	'Maryam Azzahrah',	'Visit',	'BTN Antara Blok A25 No.2',	'081242099765',	'Walk In',	1,	'M150',	'Medium',	'2022-12-28',	'Menunggu'),
(25,	1,	'Supervisor',	'Nurhadi Sasono',	'Widya Kartika',	'Visit',	'BTP Blok AF',	'081245066769',	'Canvasing',	2,	'M150',	'Low',	'2022-12-28',	'Menunggu'),
(26,	1,	'Supervisor',	'Nurhadi Sasono',	'Muflihun Azis',	'Visit',	'BTN Ranggong',	'081245066769',	'Canvasing',	17,	'M150',	'Low',	'2022-12-28',	'Menunggu'),
(27,	1,	'Supervisor',	'Nurhadi Sasono',	'Muhammad Akbar Yunus',	'Telepon',	'BTP Blok AF',	'081242099765',	'Canvasing',	9,	'M150',	'Medium',	'2022-12-28',	'Menunggu'),
(28,	1,	'Supervisor',	'Nurhadi Sasono',	'Nurul Azizah',	'WhatsApp',	'BTN Antara Blok A25 No.2',	'081242099765',	'Walk In',	11,	'M150',	'Medium',	'2022-12-28',	'Menunggu'),
(30,	1,	'Supervisor',	'Nurhadi Sasono',	'Nurul Ilmi',	'Visit',	'BTP',	'081242099765',	'Reference',	6,	'M150',	'DO',	'2022-12-28',	'Menunggu'),
(31,	1,	'Supervisor',	'Nurhadi Sasono',	'Muhammad Tegar Wijaksana',	'Visit',	'BTP Blok AD No.14',	'081304271108',	'Walk In',	1,	'M150',	'SPK',	'2022-12-06',	'Menunggu'),
(32,	1,	'Supervisor',	'Sales 1',	'Irvan Samben',	'Telepon',	'BTN Daya Raya',	'081242099765',	'Media Sosial',	5,	'M150',	'Hot',	'2022-12-28',	'Menunggu'),
(33,	9,	'Sales',	'Sales 1',	'Muhammad Akbar',	'WhatsApp',	'BTN Antara Blok A25 No.2',	'081245066769',	'Repeat Order',	1,	'M150',	'DO',	'2022-12-28',	'Menunggu')
ON DUPLICATE KEY UPDATE `id_data` = VALUES(`id_data`), `id_user` = VALUES(`id_user`), `jabatan` = VALUES(`jabatan`), `nama_sales` = VALUES(`nama_sales`), `nama_customer` = VALUES(`nama_customer`), `media` = VALUES(`media`), `alamat` = VALUES(`alamat`), `no_hp` = VALUES(`no_hp`), `sumber_prospek` = VALUES(`sumber_prospek`), `id_model_kendaraan` = VALUES(`id_model_kendaraan`), `type_kendaraan` = VALUES(`type_kendaraan`), `status_prospek` = VALUES(`status_prospek`), `tanggal_prospek` = VALUES(`tanggal_prospek`), `keterangan_prospek` = VALUES(`keterangan_prospek`);

DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1,	'Admin'),
(2,	'User')
ON DUPLICATE KEY UPDATE `id_jabatan` = VALUES(`id_jabatan`), `nama_jabatan` = VALUES(`nama_jabatan`);

DROP TABLE IF EXISTS `tb_model_kendaraan`;
CREATE TABLE `tb_model_kendaraan` (
  `id_model_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_model_kendaraan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_model_kendaraan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tb_model_kendaraan` (`id_model_kendaraan`, `nama_model_kendaraan`) VALUES
(1,	'Agya'),
(2,	'Alphard/Vellfire'),
(3,	'Avanza'),
(4,	'Calya'),
(5,	'Camry'),
(6,	'C-HR'),
(7,	'Corolla Altis'),
(8,	'Dyna'),
(9,	'Fortuner 4x2'),
(10,	'Fortuner 4x4'),
(11,	'FT86'),
(12,	'Hiace'),
(13,	'Hilux DC'),
(14,	'Hilux SC'),
(15,	'Innova'),
(16,	'Rush'),
(17,	'Sienta'),
(18,	'Vios'),
(19,	'Voxy'),
(20,	'Yaris'),
(21,	'Raize'),
(22,	'Veloz')
ON DUPLICATE KEY UPDATE `id_model_kendaraan` = VALUES(`id_model_kendaraan`), `nama_model_kendaraan` = VALUES(`nama_model_kendaraan`);

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
(1,	'Nurhadi Sasono',	'nurhadi',	'e10adc3949ba59abbe56e057f20f883e',	'hme-pnup.jpg',	'Supervisor'),
(3,	'Tegar Wijaksana',	'tegar123',	'e10adc3949ba59abbe56e057f20f883e',	'belum ada',	'Sales'),
(5,	'Ainun Zulkiah Rahmadani',	'ainun123',	'e10adc3949ba59abbe56e057f20f883e',	'kalla-toyota.png',	'Supervisor'),
(6,	'Irvan Samben',	'irvan123',	'e10adc3949ba59abbe56e057f20f883e',	'AVA_3929.JPG',	'Supervisor'),
(7,	'Muhammad Ashar Al-hakim',	'aca',	'e10adc3949ba59abbe56e057f20f883e',	'gsw.png',	'Supervisor'),
(8,	'Ikhwanul Umra',	'ketapang',	'e10adc3949ba59abbe56e057f20f883e',	'kemendikbud.png',	'Supervisor'),
(9,	'Sales 1',	'sales123',	'e10adc3949ba59abbe56e057f20f883e',	'kampus_merdeka.png',	'Sales'),
(10,	'Condeng',	'condeng',	'e10adc3949ba59abbe56e057f20f883e',	'kosan_taufik.jpeg',	'Sales')
ON DUPLICATE KEY UPDATE `id_user` = VALUES(`id_user`), `nama_lengkap` = VALUES(`nama_lengkap`), `username` = VALUES(`username`), `password` = VALUES(`password`), `foto_profil` = VALUES(`foto_profil`), `jabatan` = VALUES(`jabatan`);

-- 2022-12-28 06:25:21
