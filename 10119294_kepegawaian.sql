-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: db_kepegawaian
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bagian`
--

DROP TABLE IF EXISTS `bagian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(30) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bagian`
--

LOCK TABLES `bagian` WRITE;
/*!40000 ALTER TABLE `bagian` DISABLE KEYS */;
INSERT INTO `bagian` VALUES (1,'Marketing'),(2,'IT'),(4,'Gudang');
/*!40000 ALTER TABLE `bagian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pegawai` char(6) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `keterangan` text NOT NULL,
  `lama_cuti` int(3) NOT NULL,
  PRIMARY KEY (`id_cuti`),
  KEY `kode_pegawai` (`kode_pegawai`),
  CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai` (`kode_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES (4,'PG-001','2021-08-15','sakit',2);
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` VALUES (1,'Sales Manager'),(2,'Programmer'),(3,'Devops'),(5,'Product Manager');
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_pegawai`
--

DROP TABLE IF EXISTS `log_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_pegawai` (
  `id_logp` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `aksi` varchar(7) NOT NULL,
  `keterangan` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id_logp`),
  KEY `log_pegawai_ibfk_1` (`id_user`),
  CONSTRAINT `log_pegawai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_pegawai`
--

LOCK TABLES `log_pegawai` WRITE;
/*!40000 ALTER TABLE `log_pegawai` DISABLE KEYS */;
INSERT INTO `log_pegawai` VALUES (1,1,'INSERT','Penambahan data pegawai dengan kode PG-002','2021-08-14 13:36:54'),(2,1,'DELETE','Penghapusan data pegawai dengan kode PG-002','2021-08-14 14:46:53'),(3,1,'UPDATE','Perubahan data pegawai dengan kode PG-001','2021-08-14 15:32:55'),(4,1,'INSERT','Penambahan data pegawai dengan kode PG-002','2021-08-14 15:35:56'),(5,1,'DELETE','Penghapusan data pegawai dengan kode PG-002','2021-08-14 15:44:05'),(6,1,'INSERT','Penambahan data pegawai dengan kode PG-002','2021-08-14 15:54:59'),(7,1,'UPDATE','Perubahan data pegawai dengan kode PG-001','2021-08-14 15:56:18'),(8,1,'UPDATE','Perubahan data pegawai dengan kode PG-001','2021-08-14 17:49:19');
/*!40000 ALTER TABLE `log_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `kode_pegawai` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gaji` double NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `status` enum('Menikah','Belum Menikah') NOT NULL,
  `photo` varchar(75) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`kode_pegawai`),
  KEY `id_bagian` (`id_bagian`),
  KEY `id_jabatan` (`id_jabatan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id_bagian`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pegawai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('PG-001',' Strom Spirit 2','Pria','Islam','ujung berung','2002-02-14',3500000,'123123123','Belum Menikah','1628898659_FB_IMG_1610624324930.jpg',1,1,1),('PG-002','Ahmad Fajar','Pria','Islam','Jalan Cibaduyut','2001-06-11',2500000,'08923154738','Belum Menikah','1628931299_FB_IMG_1610624324930.jpg',2,2,1);
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER ins_pegawai AFTER INSERT ON pegawai
	FOR EACH ROW
	BEGIN
	INSERT INTO log_pegawai VALUES (DEFAULT,NEW.id_user,'INSERT',
		CONCAT('Penambahan data pegawai dengan kode ',NEW.kode_pegawai),NOW());
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER updt_pegawai BEFORE UPDATE ON pegawai
	FOR EACH ROW
	BEGIN
	INSERT INTO log_pegawai VALUES (DEFAULT,OLD.id_user,'UPDATE',
		CONCAT('Perubahan data pegawai dengan kode ',OLD.kode_pegawai),NOW());
	END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER dlt_pegawai AFTER DELETE ON pegawai
    FOR EACH ROW
    BEGIN
    INSERT INTO log_pegawai VALUES (DEFAULT,OLD.id_user,'DELETE',
        CONCAT('Penghapusan data pegawai dengan kode ',OLD.kode_pegawai),NOW());
    END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@mail.com',NULL,'$2y$10$CdmMq2mtloZEvWDgrH8WQesjdJ4swl4E07unjvE6fpjbCtVswZzZ2',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 17:58:46
