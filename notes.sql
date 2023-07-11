-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: notes
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.10.1

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
  `active` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `visibility` varchar(255) DEFAULT 'personal',
  `encryption_key` varbinary(32) NOT NULL,
  `encryption_IV` varbinary(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (16,'Testando','TcMAU+JfbbmXN7OyXstFlw==',14,0,'2023-07-09 19:28:52','2023-07-09 20:46:49','personal','\n∑ádüÔÀL’é2ÉBã','EÇI{öYÊ‰\Z›Î_Å'),(17,'Teste Segundo','A849wCLRg41wfQhl4bgQ1dbiB59vEqvCzyRazGJcZmI=',14,0,'2023-07-09 19:40:32','2023-07-09 20:46:45','personal','û“Kø9˚9nNL†ÿ√”æ','öD˜Ò4RÊU∫˛>ÓÕ'),(18,'Teste Terceiro','0gyL/LfKeBo/K0t8pkVfakt65EBJW7uNbCmynv+iemutaw9O5GpLkL0gFW0fDlqVWwErTboaryG8VyG6t6OIEjyXHF+hOGel5XR7JbJMrbIcFTi0F5rkhS7S8V5TVj1K',14,0,'2023-07-09 19:41:59','2023-07-09 20:46:43','personal','e997ef7a616124ed071bf0ecc57d147a','3dc92b7f53298804d177b090eb5448b2'),(19,'Bot√£o','FHwN3VlTiRYrk6mOdE5/HOMrYBd1CqeOm174XL5tVQBgStnAmNydxvZ8DNU9SRTCNUle+ysNM8cnWlMr63NQZXGKm4CQp54dbc4AdsahLIsntlosfSSdr73NDLJ/Lla9',14,0,'2023-07-09 20:05:18','2023-07-09 20:46:42','personal','1b3f81eba1b861e12b68b85ecbbf7270','1464200e8579c25311b1e29540e6a5ef'),(20,'Teste','BteLN7+PQoTErFdrs8KH4A==',14,0,'2023-07-09 20:46:08','2023-07-09 20:46:40','personal','be48890cd4e77ebbe0f58dadcb196736','44c2d4cb1d679c69101a735da4e00f79'),(21,'Teste','+nce2Kj9kuXz2Tz+Grgy0w==',14,0,'2023-07-09 20:46:55','2023-07-09 20:47:03','personal','f5a260b0184e0727aa3ddbc622b92ebb','50432b248292d1a2b0151a09aba4bdc0'),(22,'Snotes Documentation','tIvOxa/ZCIFU+rq26lLOhkEcSpKBWapHo2EiZ9P6aHiSfe98T0oI5FpvXNBWnGXZhDSzJyosgQLtInz6Ogf/ir5F5e9cEGCfywuOU7OThnogwwuLeIkPg1WUsZl9iWq9A699adFbObtl0enGOs51ArkPY86VXYsFZRLVYVPTTumqG3eEh7diou9gU3DKiTV+esQnP9sUsgp/JoOz5OHF8Eh2rI4xI8HAechnvGTW76J5f1ekWdGHIO2UPd3zfXta',14,0,'2023-07-09 20:51:18','2023-07-10 00:07:12','personal','7f197483f21e98b57896a95bb824747a','12beab2b6c943c16c80e805c049e0bde'),(23,'Teste','yJgz6DMHdRfJbtr6oCCwKA==',14,0,'2023-07-10 00:07:22','2023-07-10 00:07:26','personal','50db251e8c92401b69c93d5b51771653','3db73b3b44321f8aa465b0343d251fcb'),(24,'Teste','aP+oldi8Eolt3W0q5KJQKg==',14,0,'2023-07-10 00:07:31','2023-07-10 00:11:25','personal','0b1e9585c063627ada4ca131032299ba','b9caa34155512a687c4f2d09e7f125ab'),(25,'Teste','aDOzCH2PFjmQUfSzahOasQ==',14,0,'2023-07-10 00:12:28','2023-07-10 00:12:30','personal','2643e04136e2aeafd5bfb47976c45127','64e354748c9e7ec22e655c2c42faeff2'),(26,'Teste','fADFDcAS6rLO4VUaDOfd5Q==',14,0,'2023-07-10 00:12:55','2023-07-10 00:12:56','personal','315aae66daf4d6a7aa6309f7cd1c3afd','dcfa45788a0448b65f0b3ada9980d192'),(27,'TEste','Q0XoYyF5T8sWjYTHgxAAzg==',14,0,'2023-07-10 00:13:02','2023-07-10 00:13:32','personal','c4ec35e8b96287a85de9bc4d5c6e4440','7bc355f50e6bc24b300fbb0869e66da5'),(28,'Anota√ß√£o - GPT','A50itSvLdbEq+HF+P74RrMtr+e+DHHJhR26s/oddQx0g02XF0aN/YtbSmwoxS6jf/gzyNfyaJvCzzlXxHUERVzES0wHXTvezeLUD/6yW0Wp9XQ9BjkaGOTwRqtjtEW+x7oqiQiUguhuel9oowcvUM0F65hO4D/E1adtePYe7kwZmgHnvDqyjyjxaYazfjVQ42e4E+ZLjsq0TMpkdll6K5IoL3GkDJyPLVv9AW34CPHvB5Z9IQh2Ux8PC1l6/ZdrRZoy6BsXZwjnMmUxXJesANGv6nAJCfLZcTgQUIQPe7MO2zDZcVcsAjfwqFX5k4NYqn0ABsa0lcrOU972YHvkwaeObPXipYlEHDEHlIibril7W7zVY02CxYrok81BJ9lbRSniBo6qIFOEyurHgo0Vz/dJpPWlhZpBD11dqKhjiTF+FRKXBw7py0qqzgPCnKN6EjGpctnMDrrFX9EZP33mXpJuhW2MxG/cM5C4d4hEnQYp8xiwFUR983qMdIIJXO39ow4oomF+Qecpi0ytYEvIMTf7zGZ5gbCOTFITolLlr84N1zNMD//jgBjVNVShZrRmWkPmN0OMC/WYeI3V9fQf67GbVx6RIivcEEHPVsBu5vAJjgambfJoxl90RB1H2knAbYtim8MDox/WJdmhJrwCA8a2702gK8PGbX4wQfz0H/ImY2fJ4Sw3ishduy4RMugRBRJm+xg/yoQVJ29mVd2v856VT7dtuFqxY/HFIKrxwMzWr9YnGkGjiJWp2QAwdgsyk598Nm1LzIJaDqgLjzFqeXp6wozBpCQH9jM4khxF2kdZON66xKpC9eR8Ka3gRvmWp8YgKc+E92i2oPLmgTrplgeYehEhVDHo7IyAxPjxv4hciij+JMLYn03x0LyicK1UjLmTfTS9b82VJ+g4DMLEdebXz/AjfKaw9WwNZBPNpiHxIGdYPmmjoIWEybo7arVA9OXThec1NIY91RnOBT/Yt5+5joM/O/2hkPlxmSwSwk06fywk6uI9a2LXpp9cr+EpbhuoFEBPAVxTOIc3cXzUx04dUZ3cZRCb0cBX/0RM+KZWegzEOvB/jvhQxozAnXZLi75PFZy0ipBHRKByIBu1jNA==',14,1,'2023-07-10 00:13:39','2023-07-10 13:25:04','personal','9ef102032f78f8a3f14f25d08e308d2d','70540054287a640ace161dd28cd9fda1'),(29,'Teste','LIt0E6EYHE5909qBve81nA==',14,0,'2023-07-10 18:02:10','2023-07-10 21:44:46','personal','abc929a843f57c95c324720d9ea49e3f','029464622a5d28afd5d389652b97c21b'),(30,'Testesssss','flU7O5CkHkpErDKzcim0k4B8u1ZnPW5ykqnCTQX51HUyzdt6hhSEjKj2AedGxXiYZ5VqLH6y9Iij3eGQ+3qMzg==',14,0,'2023-07-10 18:02:22','2023-07-10 21:44:38','personal','db053fe3f84b718f6783705a8910f8cb','cac2d6cc79501cd5d5f6caae894e5f6d'),(31,'Input Radio','yJIupruh3wpF44nLQn//f2739yKV+f+b/mDS9jFL3gY4XCbQ8JFunLG0TEKsRsBW8XvcHRtcLLjNQ991gsR1B4FUk0rMYK5HlI6SEj9BT2SplGnw9qdq7ti88vFcqxlPY9BdP25M1hRUd0F+l48uCjgI1Tnqtvab9uHOOoJ1MztdmeY4vAjnxOTGy0yp1kLDScwhGYCrrYbA4DhZs+d0MMyrcNBQJEluYycH3h6UdXqGk84Bgak7GMckuIq9ueuJ5jsebm9askgTNAHF0Dw814HsxyFH6PY4XcK+thaC5iS/ihIorU1ngvsvuGDNIszpUQkBUltU0KBPv0sGutrRcTi5AtLRyu9rs/6/dmwoJxNtFqUqKT/ZVYqQuFAoA6LyYD/xiw64fPtSX6kp4RS3L8+d5myFUZUwi8X9vJTD0OC4lI/melpLY2tW8EzxiLUaepEomqqE1HBSfjo4StjRWpvMUUhucVpUpN1XESpCfEjDzNCWYLlsKZ46GhY76/MSUw+dT0zz6gJqNwb31eARR/InX4aSpa/uUUaG7QxoWvrTyQ4BGJTvhx07rt/XmsI09mOeoJ2s5QARWx+76PAn+iy57q0mRSbub5KjTiDBSm2n3YbF87vVfP4dAJpuBhAsFHq089ME6AwW0nXLmRhYZqxEyhZ4clEAlk89zjDj5zABC8zbTXvs6z0PBkbHxXtuhPXXaj7a3x4p2/VkIgNZ4BJ7RKG+642QMsXQgrVaxUzjOSRhrg37xXK2TnyVDVYiRSQRnPZczt04MzZvYheSMrbmB2ofUBvXUnQ3ugdCth2s3niWtK6CZQGUuNYAwBf8jTN+1ypsJcRH/XDe/2iS+/KrZhTGL0S0NOxS1iMX7VdQ6CHtv4raaYW4cu9aFO3c7fd6FECFYJw6J3FxsW35j2GlX0o6XvLYqAtBluLaJ0nS92oOUcV9q+OO4ORg6HwvPbTLvMCLOvAqkfyCZ30S1cRqfpuAIaCgSAZYf/AOdlIEsM/ZLTbh5OUROIUv3TSScOIw+VjXpuY4DuQeahm21vH0/83hprzAvIx6HXB2hlYZWEhQIy0n98+LLVWVbD51Q5GEvxIJ/qIont8+daBb6KjiziH9lfqJR273E9YmiFvne2Cc02RrZE51Twh1V2Tg46YeOkmknrR2x5PUK6zIw6ac9/6sT6zkUbnWhi0BLGAYzXaLDNQarMyCGztkmslH4Vhdt7gB8XmfYxGonDXST7wfabf5vkUY+j8R2ANdafSEJoodkaQNGJPAehjfc62DbvEK8JFCfwAEgV4rtcsg/r1kDULpAFPGNCjmTKSX9oYnkm7iyrdmrllaCfE/dgiQ9sDkxLUa6LF9YK5feGLDwE5bn9SGf90HtyfWvyJAzJZH9cM4GS7+X5ZPIHzGT+C3g15397kR+LxE5ZtUSxPmysfZimJhWmol22PEPenu9BbwmAe+tOEnxFCWgu3RcxMz8bXosY9vywlJJmC/UYkpw+ZGnAS9n740F/pR+BHrcsVAcROteLbt49ct3js8/pCG3Tkz/+/ke3+X36GUOS5b/2x+tk+Jj9bhmoWaMxhi5L5SYbOvaRK0GrKHSMIK0HwB',14,1,'2023-07-10 21:54:48','2023-07-10 21:58:39','personal','0e3b494e98832ad6ef65aab27236b669','62c2b11e47d904c34316582c15031afb');
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
  `logged_at` datetime DEFAULT NULL,
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
INSERT INTO `users` VALUES (13,'Peter','guilherme.rodrigues@ixcsoft.com.br','$2y$10$ldjJdo121XL17e1HmVMwg.BMzd7LYbn8sQGA7XMQxD5ZBOBn/uRFS','2023-06-10 21:46:35','2023-07-06 22:52:53','2023-07-06 22:52:53',0,NULL,''),(14,'Guilherme','guilhermessmith2014@gmail.com','$2y$10$2zP5MXf6ihONHYkm570S/eJyBccS/0y7T1nfZRf5jYZs1Buc.P/26','2023-06-10 22:09:58','2023-07-11 12:49:24','2023-07-11 12:49:24',0,634176,'Smith'),(15,'Fernandinho','ludansiguer@gmail.com','$2y$10$BfxaJjjFRkYwS7nehG3qquvszR.Vf7fz0Sa8ttdzzBercDxHm.nBi','2023-06-10 22:22:46','2023-07-04 07:59:08',NULL,0,NULL,NULL),(16,'Fernandinho','gabismithdansiguer@gmail.com','$2y$10$z1vkryk.CZ3koFup3lQ5wuh0E7yhw4mn/hmh5QH7S6wkAILODhrLO','2023-06-10 23:39:43','2023-07-04 07:59:08',NULL,0,NULL,NULL),(17,'Fernandinho','lusmithdansiguer@gmail.com','$2y$10$2Fw5zX368iSb9icgKqTarOPfQdhSyP9.okC/MJpQEjylim.4yrqCu','2023-06-11 01:26:39','2023-07-06 22:29:28',NULL,0,740395,NULL),(18,'Fernandinho','jonas.tot@gmail.com','$2y$10$DF9c3V6PXWuZl1JdRWXag.U1MCxq199WA1aeGqxmXPWBrdg0INvvu','2023-06-18 02:02:05','2023-07-04 07:59:08',NULL,0,NULL,NULL),(19,'Fernandinho','guilhermessmith2020@gmail.com','$2y$10$pvehB.qjl8WCHzk38pij8Ol5clsdl9gGzyT.UZtsWM916Ii1ntyrK','2023-06-20 22:35:15','2023-07-04 07:59:08',NULL,0,NULL,NULL),(20,'Fernandinho','jonathan@gmail.com','$2y$10$i4wxtaYbjjAhOTNCN63ZJOmqHhBX6ZZbp3WcK7Z9LcsGzPY/nneKC','2023-06-21 20:36:29','2023-07-04 07:59:08',NULL,0,NULL,NULL),(21,'Fernandinho','mateus.lima@gmail.com','$2y$10$kPjx2pNjvTY9EeFKODGZ0eO1KsxnnmTlokLXrQnDOZ8BCWxEwmqLu','2023-06-21 20:52:10','2023-07-04 07:59:08',NULL,0,NULL,NULL),(29,'Guilherme','guilhermessmith2022@gmail.com','$2y$10$9vqlicBPgas1b6h9rOpMq.R7u60/eFcIy.2luD.ZrVnkhH/accA3O','2023-07-04 21:18:25','2023-07-04 21:18:36','2023-07-04 21:18:36',0,NULL,NULL);
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

-- Dump completed on 2023-07-11 18:13:54
