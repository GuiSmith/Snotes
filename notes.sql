-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: notes
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `api`
--

DROP TABLE IF EXISTS `api`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `api` (
  `client_id` varchar(255) DEFAULT NULL,
  `client_secret` varchar(255) DEFAULT NULL,
  `access_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api`
--

LOCK TABLES `api` WRITE;
/*!40000 ALTER TABLE `api` DISABLE KEYS */;
/*!40000 ALTER TABLE `api` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (1,'Título','<p>Texto</p>',14);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logged_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `adm` tinyint(1) DEFAULT 0,
  `passcode` int(6) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'Peter','guilherme.rodrigues@ixcsoft.com.br','$2y$10$ldjJdo121XL17e1HmVMwg.BMzd7LYbn8sQGA7XMQxD5ZBOBn/uRFS','2023-06-10 21:46:35','2023-07-03 08:52:02','2023-07-03 08:52:02',0,NULL,''),(14,'Guilherme','guilhermessmith2014@gmail.com','$2y$10$EVtv6/3BkwjqZfxYTjhszuwqQB2LGctbVeoB0NY85xDOcjn9HOIum','2023-06-10 22:09:58','2023-07-06 00:00:50','2023-07-06 00:00:50',0,NULL,'Smiths'),(15,'Fernandinho','ludansiguer@gmail.com','$2y$10$BfxaJjjFRkYwS7nehG3qquvszR.Vf7fz0Sa8ttdzzBercDxHm.nBi','2023-06-10 22:22:46','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(17,'Fernandinho','lusmithdansiguer@gmail.com','$2y$10$2Fw5zX368iSb9icgKqTarOPfQdhSyP9.okC/MJpQEjylim.4yrqCu','2023-06-11 01:26:39','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(18,'Fernandinho','jonas.tot@gmail.com','$2y$10$DF9c3V6PXWuZl1JdRWXag.U1MCxq199WA1aeGqxmXPWBrdg0INvvu','2023-06-18 02:02:05','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(19,'Fernandinho','guilhermessmith2020@gmail.com','$2y$10$pvehB.qjl8WCHzk38pij8Ol5clsdl9gGzyT.UZtsWM916Ii1ntyrK','2023-06-20 22:35:15','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(20,'Fernandinho','jonathan@gmail.com','$2y$10$i4wxtaYbjjAhOTNCN63ZJOmqHhBX6ZZbp3WcK7Z9LcsGzPY/nneKC','2023-06-21 20:36:29','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(21,'Fernandinho','mateus.lima@gmail.com','$2y$10$kPjx2pNjvTY9EeFKODGZ0eO1KsxnnmTlokLXrQnDOZ8BCWxEwmqLu','2023-06-21 20:52:10','2023-07-03 08:17:59','2023-07-03 08:17:59',0,NULL,NULL),(29,'Gabi','gabismithdansiguer@gmail.com','$2y$10$yY/BpOnmX6mbIxIjOXVd/uBdqEWgd2Vbk5TbWycO1UsAei.VVSpke','2023-07-05 23:23:49','2023-07-05 23:24:26','2023-07-05 23:24:26',0,NULL,'gabicoolc');
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

-- Dump completed on 2023-07-06  0:04:21
