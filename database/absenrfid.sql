-- MySQL dump 10.13  Distrib 8.0.21, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: absenrfid
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absensi`
--

DROP TABLE IF EXISTS `absensi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `absensi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomorkartu` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_pulang` time DEFAULT NULL,
  `terlambat` int DEFAULT NULL,
  `pulanglebihawal` int DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absensi`
--

LOCK TABLES `absensi` WRITE;
/*!40000 ALTER TABLE `absensi` DISABLE KEYS */;
INSERT INTO `absensi` VALUES (12,'1951708314','2023-07-31','14:10:36','14:32:57',NULL,NULL,''),(13,'16351252182','2023-07-31','14:10:47','14:33:05',NULL,NULL,''),(20,'1951708314','2023-08-02','19:07:37','19:07:37',NULL,NULL,''),(21,'1951708314','2023-08-02','19:07:37','19:07:37',NULL,NULL,''),(22,'1951708314','2023-08-03','11:43:31','11:43:44',NULL,NULL,''),(23,'16351252182','2023-08-03','11:43:52','11:43:53',NULL,NULL,''),(24,'1951708314','2023-08-05','22:29:06','22:29:40',NULL,NULL,''),(25,'16351252182','2023-08-05','22:29:28','22:29:38',NULL,NULL,''),(28,'16351252182','2023-08-06','09:20:18','09:20:18',NULL,NULL,''),(29,'16351252182','2023-08-06','09:20:18','09:20:18',NULL,NULL,''),(30,'1951708314','2023-08-06','09:20:22','09:20:22',NULL,NULL,''),(32,'1951708314','2023-08-07','13:36:30','13:39:47',1,1,'HADIR'),(35,'16351252182','2023-08-07',NULL,NULL,NULL,NULL,'ALFA');
/*!40000 ALTER TABLE `absensi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configdate`
--

DROP TABLE IF EXISTS `configdate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `configdate` (
  `jammasuk` time DEFAULT NULL,
  `jamkeluar` time DEFAULT NULL,
  `id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configdate`
--

LOCK TABLES `configdate` WRITE;
/*!40000 ALTER TABLE `configdate` DISABLE KEYS */;
INSERT INTO `configdate` VALUES ('07:00:00','18:00:00',1);
/*!40000 ALTER TABLE `configdate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siswa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomorkartu` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nis` int NOT NULL,
  `kelas` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` VALUES (10,'1951708314','Mesa ',2147483647,'XI 6','Jl Nanggeleng No 129'),(17,'16351252182','Reni Rahayu',1111,'XI 1','asd');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status` (
  `mode` int NOT NULL,
  PRIMARY KEY (`mode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (2);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmprfid`
--

DROP TABLE IF EXISTS `tmprfid`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tmprfid` (
  `nomorkartu` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`nomorkartu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmprfid`
--

LOCK TABLES `tmprfid` WRITE;
/*!40000 ALTER TABLE `tmprfid` DISABLE KEYS */;
/*!40000 ALTER TABLE `tmprfid` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL,
  `status` enum('Y','N') COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_record` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'naufal','naufal',1,'Y','2023-08-05 15:07:35'),(2,'robi','robi',2,'Y','2023-08-05 15:07:35');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-07 14:57:37
