-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for web_hotel
CREATE DATABASE IF NOT EXISTS `web_hotel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `web_hotel`;

-- Dumping structure for table web_hotel.kamar
CREATE TABLE IF NOT EXISTS `kamar` (
  `id_kamar` int(11) NOT NULL AUTO_INCREMENT,
  `no_kamar` int(11) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jml_ranjang` int(11) DEFAULT '1',
  `lokasi` text,
  `deskripsi` text,
  `status` int(11) DEFAULT '1',
  `gambar` longtext,
  PRIMARY KEY (`id_kamar`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table web_hotel.kamar: ~16 rows (approximately)
/*!40000 ALTER TABLE `kamar` DISABLE KEYS */;
INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `tipe`, `harga`, `jml_ranjang`, `lokasi`, `deskripsi`, `status`, `gambar`) VALUES
	(1, 101, 'Regular', 150000, 1, 'JL. Mawar, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(23, 102, 'Regular', 250000, 2, 'JL. Mawar, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(24, 103, 'Regular', 200000, 2, 'JL. Melati, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(25, 201, 'Deluxe', 300000, 2, 'JL. Mawar, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(26, 202, 'Deluxe', 300000, 2, 'JL. Mawar, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(27, 203, 'Deluxe', 300000, 2, 'JL. Melati, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(28, 204, 'Deluxe', 300000, 2, 'JL. Melati, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images2.jpg'),
	(29, 107, 'Regular', 150000, 1, 'JL. Melati, Malang', 'halo', 1, '/uploads/kamar/images2.jpg'),
	(30, 108, 'Regular', 150000, 1, 'JL. Melati, Malang', 'halo', 0, '/uploads/kamar/images2.jpg'),
	(32, 109, 'Regular', 150000, 1, 'JL. Ijen, Malang', 'halo', 1, '/uploads/kamar/images2.jpg'),
	(37, 301, 'Royal', 500000, 3, 'JL. Melati, Malang', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur quae, quibusdam aut minus ex consequatur eaque vel veritatis! Perferendis tempore velit reiciendis illo distinctio inventore cum culpa dolores molestias rerum?', 1, '/uploads/kamar/images3.jpg'),
	(38, 302, 'Royal', 500000, 3, 'JL. Melati, Malang', 'Larang', 1, '/uploads/kamar/images3.jpg'),
	(39, 303, 'Royal', 500000, 3, 'JL. Ijen, Malang', 'Larang', 1, '/uploads/kamar/images3.jpg'),
	(40, 304, 'Royal', 500000, 3, 'JL. Ijen, Kepanjen', 'alsk', 1, '/uploads/kamar/images3.jpg'),
	(41, 305, 'Royal', 500000, 3, 'JL. Ijen, Malang', 'Lala', 1, '/uploads/kamar/images3.jpg'),
	(42, 306, 'Royal', 500000, 3, 'JL. Ijen, Malang', 'Lala', 1, '/uploads/kamar/images3.jpg');
/*!40000 ALTER TABLE `kamar` ENABLE KEYS */;

-- Dumping structure for table web_hotel.transaksi
CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kamar` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_transaksi`),
  KEY `FK_transaksi_kamar` (`id_kamar`),
  KEY `FK_transaksi_user` (`id_user`),
  CONSTRAINT `FK_transaksi_kamar` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table web_hotel.transaksi: ~4 rows (approximately)
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` (`id_transaksi`, `id_kamar`, `id_user`, `tanggal`, `checkin`, `checkout`, `total`) VALUES
	(1, 1, 1, '2019-12-13 15:34:29', '2019-12-13 15:34:30', '2019-12-13 15:34:31', 150000),
	(2, 1, 1, '2019-12-13 15:35:32', '2019-12-13 00:00:00', '2019-12-13 00:00:00', 200000),
	(5, 23, 1, '2019-12-14 21:08:55', '2019-12-14 00:00:00', '2019-12-14 00:00:00', 265000),
	(6, 30, 2, '2019-12-20 00:00:00', '2019-12-28 00:00:00', '2019-12-31 00:00:00', 150000);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;

-- Dumping structure for table web_hotel.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('Admin','User') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table web_hotel.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `nama`, `email`, `no_telp`, `username`, `password`, `role`) VALUES
	(1, 'Marsina', 'a@a.com', NULL, 'rizna', '123', 'Admin'),
	(2, 'Joker', 'a@a.com', NULL, 'joker', '123', 'User');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
