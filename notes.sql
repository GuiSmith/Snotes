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
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (2,'Snotes Documentation','<h1 style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; text-align: center;\">Snotes</h1><p style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;\">This document refers to the functionalities Snotes has, here is a list of them:</p><ol style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;\"><li style=\"text-align: left;\">User control: Users can create an account, edit their name and nickname and recover their passwords if they have access to the e-mail registered.</li><li style=\"text-align: left;\">Notes: users can create notes, these notes will have a limit of 255 characters (may have changes). Notes are affected by the&nbsp;<b>visibility settings*.</b></li><li style=\"text-align: left;\">Stories: users can create stories, these stories will not have a limit of characters (may have changes). Stories are affected by the&nbsp;<b>visibility settings*</b></li></ol><p style=\"color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-size: medium;\">This documentation is due to change</p>',14,0),(3,'Grade contábil','<p>Grades contábeis devem ser criadas para clientes que emitem nota fiscal 55 para vendas de mercadorias ou comodatos</p>',14,1),(4,'Double Clicks','<p><font color=\"#ff0000\">JavaScript</font></p><p>It seems like JS is the answer for double clicks. How would have thought, huh?</p>',14,1),(5,'Title','<p>TExt</p>',14,1),(6,'Testando título','<p>AGORA SIM MLK</p>',14,1),(7,'O que é uma anotação?','<h1 style=\"text-align: center; \">Anotação</h1><h3 style=\"text-align: center;\">Qualquer coisa, mas simples</h3><p style=\"text-align: center;\"><br></p><p style=\"text-align: left;\">Uma anotação é um registro breve e conciso de informações importantes. Geralmente escrita de forma sucinta, uma anotação captura os pontos-chave de um evento, ideia ou tarefa, permitindo um rápido acesso a informações relevantes. As anotações são úteis para lembrar detalhes, organizar pensamentos ou documentar insights importantes. Elas podem ser feitas em papel, dispositivos eletrônicos ou qualquer meio disponível para o indivíduo. As anotações facilitam a retenção de informações e servem como referência rápida quando necessário.</p><p style=\"text-align: left;\">Aqui está um exemplo de usos de uma anotação:</p><ul><li>Tomar notas em reuniões: Anotações podem ser usadas para registrar pontos-chave, ações a serem tomadas e ideias discutidas durante reuniões de trabalho, conferências ou palestras.</li><li>Fazer listas de tarefas: Anotações são úteis para criar listas de tarefas diárias, semanais ou mensais, ajudando a manter o foco e a organização das atividades.</li><li>Registrar informações de contato: Ao receber informações de contato, como nomes, números de telefone ou endereços de e-mail, anotá-las em um local seguro pode evitar a perda desses dados importantes.</li><li>Capturar ideias e insights: Sempre que uma ideia criativa ou um insight interessante surgir, anotá-los imediatamente permite que você os registre antes que desapareçam da memória.</li><li>Anotar lembretes e lembretes rápidos: Anotações podem ser usadas para registrar lembretes rápidos, como comprar algo no supermercado, ligar para alguém ou realizar pequenas tarefas.</li></ul>',14,1),(8,'Título','<h1 style=\"text-align: center; \">Título</h1><p style=\"text-align: center;\"><br></p><p style=\"text-align: center;\">Central</p>',13,1);
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
INSERT INTO `users` VALUES (13,'Peter','guilherme.rodrigues@ixcsoft.com.br','$2y$10$ldjJdo121XL17e1HmVMwg.BMzd7LYbn8sQGA7XMQxD5ZBOBn/uRFS','2023-06-10 21:46:35','2023-07-06 22:52:53','2023-07-06 22:52:53',0,NULL,''),(14,'Guilherme','guilhermessmith2014@gmail.com','$2y$10$2zP5MXf6ihONHYkm570S/eJyBccS/0y7T1nfZRf5jYZs1Buc.P/26','2023-06-10 22:09:58','2023-07-06 22:53:24','2023-07-06 22:53:24',0,634176,'Smith'),(15,'Fernandinho','ludansiguer@gmail.com','$2y$10$BfxaJjjFRkYwS7nehG3qquvszR.Vf7fz0Sa8ttdzzBercDxHm.nBi','2023-06-10 22:22:46','2023-07-04 07:59:08',NULL,0,NULL,NULL),(16,'Fernandinho','gabismithdansiguer@gmail.com','$2y$10$z1vkryk.CZ3koFup3lQ5wuh0E7yhw4mn/hmh5QH7S6wkAILODhrLO','2023-06-10 23:39:43','2023-07-04 07:59:08',NULL,0,NULL,NULL),(17,'Fernandinho','lusmithdansiguer@gmail.com','$2y$10$2Fw5zX368iSb9icgKqTarOPfQdhSyP9.okC/MJpQEjylim.4yrqCu','2023-06-11 01:26:39','2023-07-06 22:29:28',NULL,0,740395,NULL),(18,'Fernandinho','jonas.tot@gmail.com','$2y$10$DF9c3V6PXWuZl1JdRWXag.U1MCxq199WA1aeGqxmXPWBrdg0INvvu','2023-06-18 02:02:05','2023-07-04 07:59:08',NULL,0,NULL,NULL),(19,'Fernandinho','guilhermessmith2020@gmail.com','$2y$10$pvehB.qjl8WCHzk38pij8Ol5clsdl9gGzyT.UZtsWM916Ii1ntyrK','2023-06-20 22:35:15','2023-07-04 07:59:08',NULL,0,NULL,NULL),(20,'Fernandinho','jonathan@gmail.com','$2y$10$i4wxtaYbjjAhOTNCN63ZJOmqHhBX6ZZbp3WcK7Z9LcsGzPY/nneKC','2023-06-21 20:36:29','2023-07-04 07:59:08',NULL,0,NULL,NULL),(21,'Fernandinho','mateus.lima@gmail.com','$2y$10$kPjx2pNjvTY9EeFKODGZ0eO1KsxnnmTlokLXrQnDOZ8BCWxEwmqLu','2023-06-21 20:52:10','2023-07-04 07:59:08',NULL,0,NULL,NULL),(29,'Guilherme','guilhermessmith2022@gmail.com','$2y$10$9vqlicBPgas1b6h9rOpMq.R7u60/eFcIy.2luD.ZrVnkhH/accA3O','2023-07-04 21:18:25','2023-07-04 21:18:36','2023-07-04 21:18:36',0,NULL,NULL);
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

-- Dump completed on 2023-07-06 23:00:26
