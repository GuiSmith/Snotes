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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (16,'Testando','TcMAU+JfbbmXN7OyXstFlw==',14,0,'2023-07-09 19:28:52','2023-07-13 08:56:22','personal','\n��d���LՎ2�B�','E�I{�Y��\Z��_�'),(17,'Teste Segundo','A849wCLRg41wfQhl4bgQ1dbiB59vEqvCzyRazGJcZmI=',14,0,'2023-07-09 19:40:32','2023-07-13 08:56:24','personal','��K�9�9nNL���Ӿ','�D��4R�U��>��'),(18,'Teste Terceiro','0gyL/LfKeBo/K0t8pkVfakt65EBJW7uNbCmynv+iemutaw9O5GpLkL0gFW0fDlqVWwErTboaryG8VyG6t6OIEjyXHF+hOGel5XR7JbJMrbIcFTi0F5rkhS7S8V5TVj1K',14,0,'2023-07-09 19:41:59','2023-07-13 08:56:37','personal','e997ef7a616124ed071bf0ecc57d147a','3dc92b7f53298804d177b090eb5448b2'),(19,'Botão','FHwN3VlTiRYrk6mOdE5/HOMrYBd1CqeOm174XL5tVQBgStnAmNydxvZ8DNU9SRTCNUle+ysNM8cnWlMr63NQZXGKm4CQp54dbc4AdsahLIsntlosfSSdr73NDLJ/Lla9',14,0,'2023-07-09 20:05:18','2023-07-12 08:13:36','personal','1b3f81eba1b861e12b68b85ecbbf7270','1464200e8579c25311b1e29540e6a5ef'),(20,'Teste','BteLN7+PQoTErFdrs8KH4A==',14,0,'2023-07-09 20:46:08','2023-07-12 08:13:38','personal','be48890cd4e77ebbe0f58dadcb196736','44c2d4cb1d679c69101a735da4e00f79'),(21,'Teste','+nce2Kj9kuXz2Tz+Grgy0w==',14,0,'2023-07-09 20:46:55','2023-07-12 08:13:41','personal','f5a260b0184e0727aa3ddbc622b92ebb','50432b248292d1a2b0151a09aba4bdc0'),(22,'Snotes Documentation','tIvOxa/ZCIFU+rq26lLOhkEcSpKBWapHo2EiZ9P6aHiSfe98T0oI5FpvXNBWnGXZEgDVZQOcl4iCLpT941K9OYKukm3FUQS00shvvqo3YDOyGFJxR0VeulO9765MmGGbScBTgOoRX7QTotwcLMMgm7TG3Tfm4BUdooa6f8Q0YAGsKLGqAJF/AIVQDAGiT3563xK4hrLSJfp5bO9N4FIpBsgToWy+8pVtvVxURmdFvchhnK95RSm2wiHO2ZsrW0WZVPtJN+YniS/hOelXecW+Rw==',14,0,'2023-07-09 20:51:18','2023-07-14 07:48:55','personal','7f197483f21e98b57896a95bb824747a','12beab2b6c943c16c80e805c049e0bde'),(23,'Teste','yJgz6DMHdRfJbtr6oCCwKA==',14,0,'2023-07-10 00:07:22','2023-07-12 08:13:44','personal','50db251e8c92401b69c93d5b51771653','3db73b3b44321f8aa465b0343d251fcb'),(24,'Teste','aP+oldi8Eolt3W0q5KJQKg==',14,0,'2023-07-10 00:07:31','2023-07-12 08:13:46','personal','0b1e9585c063627ada4ca131032299ba','b9caa34155512a687c4f2d09e7f125ab'),(25,'Teste','aDOzCH2PFjmQUfSzahOasQ==',14,0,'2023-07-10 00:12:28','2023-07-12 08:13:48','personal','2643e04136e2aeafd5bfb47976c45127','64e354748c9e7ec22e655c2c42faeff2'),(26,'Teste','fADFDcAS6rLO4VUaDOfd5Q==',14,0,'2023-07-10 00:12:55','2023-07-12 08:13:50','personal','315aae66daf4d6a7aa6309f7cd1c3afd','dcfa45788a0448b65f0b3ada9980d192'),(27,'TEste','Q0XoYyF5T8sWjYTHgxAAzg==',14,0,'2023-07-10 00:13:02','2023-07-12 08:13:33','personal','c4ec35e8b96287a85de9bc4d5c6e4440','7bc355f50e6bc24b300fbb0869e66da5'),(28,'Anotação - GPT','A50itSvLdbEq+HF+P74RrMtr+e+DHHJhR26s/oddQx0g02XF0aN/YtbSmwoxS6jf/gzyNfyaJvCzzlXxHUERVzES0wHXTvezeLUD/6yW0Wp9XQ9BjkaGOTwRqtjtEW+x7oqiQiUguhuel9oowcvUM0F65hO4D/E1adtePYe7kwZmgHnvDqyjyjxaYazfjVQ42e4E+ZLjsq0TMpkdll6K5IoL3GkDJyPLVv9AW34CPHvB5Z9IQh2Ux8PC1l6/ZdrRZoy6BsXZwjnMmUxXJesANGv6nAJCfLZcTgQUIQPe7MO2zDZcVcsAjfwqFX5k4NYqn0ABsa0lcrOU972YHvkwaeObPXipYlEHDEHlIibril7W7zVY02CxYrok81BJ9lbRSniBo6qIFOEyurHgo0Vz/dJpPWlhZpBD11dqKhjiTF+FRKXBw7py0qqzgPCnKN6EjGpctnMDrrFX9EZP33mXpJuhW2MxG/cM5C4d4hEnQYp8xiwFUR983qMdIIJXO39ow4oomF+Qecpi0ytYEvIMTf7zGZ5gbCOTFITolLlr84N1zNMD//jgBjVNVShZrRmWkPmN0OMC/WYeI3V9fQf67GbVx6RIivcEEHPVsBu5vAJjgambfJoxl90RB1H2knAbYtim8MDox/WJdmhJrwCA8a2702gK8PGbX4wQfz0H/ImY2fJ4Sw3ishduy4RMugRBRJm+xg/yoQVJ29mVd2v856VT7dtuFqxY/HFIKrxwMzWr9YnGkGjiJWp2QAwdgsyk598Nm1LzIJaDqgLjzFqeXp6wozBpCQH9jM4khxF2kdZON66xKpC9eR8Ka3gRvmWp8YgKc+E92i2oPLmgTrplgeYehEhVDHo7IyAxPjxv4hciij+JMLYn03x0LyicK1UjLmTfTS9b82VJ+g4DMLEdebXz/AjfKaw9WwNZBPNpiHxIGdYPmmjoIWEybo7arVA9OXThec1NIY91RnOBT/Yt5+5joM/O/2hkPlxmSwSwk06fywk6uI9a2LXpp9cr+EpbhuoFEBPAVxTOIc3cXzUx04dUZ3cZRCb0cBX/0RM+KZWegzEOvB/jvhQxozAnXZLi75PFZy0ipBHRKByIBu1jNA==',14,0,'2023-07-10 00:13:39','2023-07-14 07:49:07','personal','9ef102032f78f8a3f14f25d08e308d2d','70540054287a640ace161dd28cd9fda1'),(29,'Teste','LIt0E6EYHE5909qBve81nA==',14,0,'2023-07-10 18:02:10','2023-07-12 08:13:55','personal','abc929a843f57c95c324720d9ea49e3f','029464622a5d28afd5d389652b97c21b'),(30,'Testesssss','flU7O5CkHkpErDKzcim0k4B8u1ZnPW5ykqnCTQX51HUyzdt6hhSEjKj2AedGxXiYZ5VqLH6y9Iij3eGQ+3qMzg==',14,0,'2023-07-10 18:02:22','2023-07-13 08:56:40','personal','db053fe3f84b718f6783705a8910f8cb','cac2d6cc79501cd5d5f6caae894e5f6d'),(31,'Input Radio','yJIupruh3wpF44nLQn//f2739yKV+f+b/mDS9jFL3gY4XCbQ8JFunLG0TEKsRsBW8XvcHRtcLLjNQ991gsR1B4FUk0rMYK5HlI6SEj9BT2SplGnw9qdq7ti88vFcqxlPY9BdP25M1hRUd0F+l48uCjgI1Tnqtvab9uHOOoJ1MztdmeY4vAjnxOTGy0yp1kLDScwhGYCrrYbA4DhZs+d0MMyrcNBQJEluYycH3h6UdXqGk84Bgak7GMckuIq9ueuJ5jsebm9askgTNAHF0Dw814HsxyFH6PY4XcK+thaC5iS/ihIorU1ngvsvuGDNIszpUQkBUltU0KBPv0sGutrRcTi5AtLRyu9rs/6/dmwoJxNtFqUqKT/ZVYqQuFAoA6LyYD/xiw64fPtSX6kp4RS3L8+d5myFUZUwi8X9vJTD0OC4lI/melpLY2tW8EzxiLUaepEomqqE1HBSfjo4StjRWpvMUUhucVpUpN1XESpCfEjDzNCWYLlsKZ46GhY76/MSUw+dT0zz6gJqNwb31eARR/InX4aSpa/uUUaG7QxoWvrTyQ4BGJTvhx07rt/XmsI09mOeoJ2s5QARWx+76PAn+iy57q0mRSbub5KjTiDBSm2n3YbF87vVfP4dAJpuBhAsFHq089ME6AwW0nXLmRhYZqxEyhZ4clEAlk89zjDj5zABC8zbTXvs6z0PBkbHxXtuhPXXaj7a3x4p2/VkIgNZ4BJ7RKG+642QMsXQgrVaxUzjOSRhrg37xXK2TnyVDVYiRSQRnPZczt04MzZvYheSMrbmB2ofUBvXUnQ3ugdCth2s3niWtK6CZQGUuNYAwBf8jTN+1ypsJcRH/XDe/2iS+/KrZhTGL0S0NOxS1iMX7VdQ6CHtv4raaYW4cu9aFO3c7fd6FECFYJw6J3FxsW35j2GlX0o6XvLYqAtBluLaJ0nS92oOUcV9q+OO4ORg6HwvPbTLvMCLOvAqkfyCZ30S1cRqfpuAIaCgSAZYf/AOdlIEsM/ZLTbh5OUROIUv3TSScOIw+VjXpuY4DuQeahm21vH0/83hprzAvIx6HXB2hlYZWEhQIy0n98+LLVWVbD51Q5GEvxIJ/qIont8+daBb6KjiziH9lfqJR273E9YmiFvne2Cc02RrZE51Twh1V2Tg46YeOkmknrR2x5PUK6zIw6ac9/6sT6zkUbnWhi0BLGAYzXaLDNQarMyCGztkmslH4Vhdt7gB8XmfYxGonDXST7wfabf5vkUY+j8R2ANdafSEJoodkaQNGJPAehjfc62DbvEK8JFCfwAEgV4rtcsg/r1kDULpAFPGNCjmTKSX9oYnkm7iyrdmrllaCfE/dgiQ9sDkxLUa6LF9YK5feGLDwE5bn9SGf90HtyfWvyJAzJZH9cM4GS7+X5ZPIHzGT+C3g15397kR+LxE5ZtUSxPmysfZimJhWmol22PEPenu9BbwmAe+tOEnxFCWgu3RcxMz8bXosY9vywlJJmC/UYkpw+ZGnAS9n740F/pR+BHrcsVAcROteLbt49ct3js8/pCG3Tkz/+/ke3+X36GUOS5b/2x+tk+Jj9bhmoWaMxhi5L5SYbOvaRK0GrKHSMIK0HwB',14,0,'2023-07-10 21:54:48','2023-07-14 07:49:10','personal','0e3b494e98832ad6ef65aab27236b669','62c2b11e47d904c34316582c15031afb'),(32,'Array Search','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',14,0,'2023-07-11 21:05:22','2023-07-13 08:56:16','private','9d99b897122ac36695e3f3d1de6b9363','56ebc017d91075c9e372ade3d635cd3f'),(33,'Array Search','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',14,1,'2023-07-11 21:11:14','2023-07-17 11:44:04','personal','dce864f183a8d91afeba5e15fd776a44','097ae41f8e7e195926eb75f60c496213'),(34,'INNOVA - 26764','lYBfLF5n4WuU4ZI4F02oz3hPhYvyN+EJdJXhlksiQ5FgHhltoovq6gq88qzAe5cAkVH5BcV7OEcRUPMESXAqgjFj9vDcdfvKoil1MwDy8iMIQaprow9YH8+rLd4SDW5zSrGjlYNnvnT0LQNeH/obFjt3AA7B3B97Xl2UOhxpNUdj0+y1SgTyQgbHau8wxQ5DmdBH1v/N/sCozI5YEYKNRUldLCHdS5D4ztnz3mOGwlbelp7jaAvhTaoDHeuCWiVhJiMMulxkAWh4P/qPe2OZ4Ha7RMd4MZZpwrC9fzWuTLce3B27ogimN6mkcyC0aW9DDRkx0D+tjmv9qPb9CtWc5nX8p5pOy1fOrCaMKxbtR7KkdsHHZeDAtEuJTal7KURrqbQa7cDCSolnz0upbf53m7/YHPVO2aHqrZyzvSBwcDB6Z4Tt/ySy6ZR/QBh22U4FqZ51mwzUZb+S92mmuPRJKw5tcxnPWkY2dt+OiLCOnoEDBWUAcBiMCTOGQt0GiNw+sGHNwE4CldgGoGDYAEIx9ZonLYXz6ZZbt/r4cNWwe/G+RDp6nfXNIeh8ybtGp2Ei65kN3p881VwdS5kC85VEyP6QGTbqDy2i6ghuLXyo8K9ySMQrySmIvVDSi1XaasV8eEC0TgiD2YxOFgdujBag9W+59JVjqQbQgkzgLzTspowWWeDn2hHdFUXCOLBR3TkcRvNevkzun0DYOKEDlin3lkysdJ+uWJQlNBCYCic06p6QAMeVPpvpdPjn3fM3layVj2RkCg6jpZ+WTsleiRdG2MWNiM5wn6jzzdwQ/wI3Je1MqWSKAmn+xlkvqZsqWoIPuDVXIwYTO8xX49nZVNtNuTq27g0Ll2vYEtKrV2mU9L3r2Bat/t3nkqXAoeV0LZf5',14,0,'2023-07-12 08:11:56','2023-07-17 10:54:05','private','e9c5fcacc0e17349e27a88e493d3450f','2636ece9d7b58140d84cd6a974a10d61'),(35,'NAVEGA - 9h - 27204','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',14,1,'2023-07-12 08:24:12','2023-07-17 11:47:30','private','3d26f48c485c0f528f4a416f1183b97c','e6116042d19542a3e278aa75159d1ddb'),(36,'Venda de Mercadoria','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',14,1,'2023-07-12 09:00:10','2023-07-17 11:44:13','personal','5770cd6fecf76670cad8bbb7969c774b','392277bb13c7edd29bca90ffdc64dcca'),(37,'Nota 55 remessa comodato','9m/ygrVWqGdGixFtK0t0s8zNmpvahenmSuCZ5WbZhC6I3z5ZEkgRWTfJemhIposKvYj5/Dgt2Gl5+/1oL8oV8psIj7TP06s5GCyl7rfr4EPwfN6M3aYimH2DOKbNqS29vtlzLGjT1lXD0IzzBg/qxNAIKdx9m3Jjca1zf0r8JvHAdkBHeqqShiYKCRMiWtPESfxACxpzl1+K2RqyjJZ6SNWIS9EDU0iM2hys8P18bqbPTXahznXHPupI8jKq8gVZHLCDUOpuYXzDfdha7YZPL22WEHUmrZAWf447IqayMYRnV5dtop3eJA++PrJSCTHIEyAijOKGDuj0wr63wQaUEAU8Wni+xmPEq89jorYUx2ppO2b27J1HTDoj7IUXd91uqAOjRF96Y6UeJxL33HXMV5nRgHc2zcO6EDCuQfuCu/5tLwKwIz7o4+DUuRZKeZOH0MN2FJshjZE3n/IaukBL3B7GNY41U0YCGg4+5myVf+sQA3NhJPl+nyYPYtlGr4ibCU2gqX3SQNgfsPiRVydQ6xhGru4+isUXouawg2vvfz1XuAPwjApHZW2FyTQLrCj7DkFs+5tXgtI2+3vPAklwOYWYgxUzj5u9prscxXwjLtFbbnI/oBe9TOK5ERFTESDfoDQ42iH+dseh/MplGXT23U6LaMiWTOuKxujdlvMabiXy+6Wgq2VqCwgqPjV0ncS3BlvzezS6LSALgqWeA44jD5ikT7NV8+0jRVKPPMCyRBKD8/irFXtI/lubCwTsXz/5IDpqC9zlhOFNzwOQw5Y0rJovZeQGU4XZbqEEjgm6HGyNbSeCWaqPiAifYkhAFH1kCErqqtH4olXMtqNZu3ZBbIgZQE11h6sxZn1HIaI7NpGvqaR1hSPm9bPtpfYFzR3zsSvq6nFULKMCkHedSj1MBdR7COQI8XKmE07xLAffXOhaFqX3MNxyGKIBRJNvqYZgXcLSuTU3+HmOnpRgS0Uq/OVNgoPDpiLjZxWLMQzvBNM9aK3HtebvkwGCCrroL49Uk99TQk7ZsGCjUgHjVBfczse1zGFq+nFKEyWU/r8Fv4DNDiqMPRv1XEqnD5o79U9Czz8CXvwv3qtqfi1HRmRVnRbFBCKND8UZL4VstS5V47Q=',14,1,'2023-07-12 09:13:50','2023-07-17 11:44:45','personal','9808fef43e862174ad726cc9e535382b','93ca39108302cc0d7827e385c285e1a5'),(38,'Nota 55 retorno comodato','SpqNS1RHfcMHRIcxrYu96i2BRi0rjn54kSbZZCPudeuv52OSGBntKRmctJN7Fdq89+7UyLfnUZBpr3eiAYLJeb30Sx7y9wZp+EJVuhZBOi3Q6QB/LtnwFkX5kKMEGj55ZoYOZz9nO1xUeAOr8ZkcgXC+BgHGET+N/7JX/OuskYltqpK500QZMOUQ8/NenFRa5jM/6f98sGnGFNGcZoXAbhcLQip/ZtVljgLQxyjHugCR0nOjyQpRnfskgc7xADcjlVR2vv7JPmclbEugYNNWd6+/Rh7F0EshCLZHKAUG14siTTvDWyWViYcrtiQqEc3CxXs8/+qMcb81c8JHEHvEQyxKPDcKyEzTJA6bmVQbg1FBUNv2ri3seY/9pSlWAsSvixPvCLiRpIsOg/1MMIZU8JZp3nhr0XkhPOnmDIj4Ah5vdgfvaFex8+23FIodAVVc5ryJacNANkyxXM85Zrck0rr3OGqHCI8PkDBDewpPoyAx1tiCYZtXFIDmaO9vQxOzBvNJpx9zvF1CTNVFP0DsJU1UEvmsoFxad+8ZnjslQp85AJOjx9Q3qyvXBq6Eo7dEbLLIbZQi6x/Qilte6nGpgEJDOho8e/iHdzbUNySrO1p3fb21VZuQQlIICP9E7y0vhwC0zOMUACNGT4ZqNY0bMbi3U5fvbeixOTXA5qfY9V8StboarYm8spJOvw97ROMcrgfItYnDC6fRY0KLgXg8GVrWd2MSCXS5o4edNIE5+euLva/SaHiCSJmjlmexMMX7YGWWgbNzZIy8pdBFRE5Ky8LdLneay4GrMPP6gJTScRKfGtP5nwNltE0M0EeQkUg5Af0rvanvxnkSesfAJNBNp9NRyv4N95nZYee7QSjhftWOGYIwnvfigxSPETeZ60bMIzyBs7q0mMsiiic9HVhy26H3P9+rpsbPIbVT7lT9PjcFu7THHDE5YG5v4asjq6rlK4UgPKID5264No179skXAnGDiHu0Wker4o8bPXzoQ1ppa73SAYoGxS3c1JwDvxZMjyXl8T5Kz808XRdfW888qvDKB1sTH/rLutQIPeKGsATtOz4zyFaj8mhVz3LOj3mNEi3fX4pRImWHpzFfaz1fmcHU7Tp1aHF+cKIQrv381uljQzJHKXL3Rt8oaoqZIbld',14,1,'2023-07-12 09:20:03','2023-07-17 11:44:54','personal','1ca9dbc05bd08530060fb2f9589d43b7','40a8ff4d0843123be7d225d4b54867d5'),(39,'NETPOWER - 11h - 1414','Ajt5IpNhuBq6lEPrCxJ5Apso1Gi/p1vPuZpJbev7RwGya1Hcdt0/FbiqddoALVpsslOPbPhe0U+NISrdvyftXsQuN6dQMgnJMQphxCcylL+JT6PYFzajAYKhupLLnoWcpiobd0FClq576wQS/EjicnKS6kGbQsAX++/rqmUqQiTxJzgh26Kp8n5oix3aswdMTAW13nNZjfBkcEKO3qosJG5gSe6Dqrewq1gJRrH2QXqQHCKH4S21ZalMezm8rgKKZ+lH+VZy1fJxXgOuaxCXxBCcSJ2dgKgIEH5qXf2UCRHifYW79l4r2TvqMq4Gc6OL59Q2GHBzHqoX7aVE340xOWyPQOmaiZKCuPyospBZeTLnS3aByNcE/CCk0PSrWWgglb2m1jeugxqgRd1ys+s83aRCK5d3mcHzGUnlRLGWFZffDzQ0NjaE6hO5MQ/snXQaGwEEr+AwcV6z72dsk1Coh9nnbvRD4gjvs86V4qVz6Mwomjqj5xAiSHaZoR+lQhAjGgFEVurgacxe7LsWPR68kAW7rqMa8i+t2Gwf5svOhU2qdp91I60TBeIfEdvUV+6ET8WXVBCwFF+JBQ6UjHvLTPMGP5elaznh/ID9vu8yIgwi+j6QOZ0JCeCLtv0LbrP0HG17XJFFgvZxr7LnETf/T8D4okB9BcoIbnV8oadNQt7GFB+d6crrWLGWdsRht5DLcXBlv6FB0vlmFSljmHhUmBj2eZd1d7MLwf/62VbgamrMBuFmEZlDQzP9RNtiDoTVqSYQwM0skXPpcROOI9GceMIXvca+9gtHM0YDv5k9BMIiXFDCL7hKzP2mcGsv/11FqYd584PKeVviOwpKBiJ2OyCkPq/2aOj49c6/Bzb4VTwdw4W467xmDOG2wuU0OS15a7n90Ax54806endEOteVpFAWKmK6wMjE4OgsvRUMbUusfDYMWbnD4OlGoxsSeiPsj9HL0IjRpew2vfXGumCnRZPFecV8YvZw+d/Eq4oPOGUciy0Moub7OMwDyMCHl/kWKn4c/i7WlIwyb7k2StTBwwHj8fyiIL4cd3qwA+nH7p5cjL31fnIhRB2auIGmDuo5CpPjARQOWkjepFHybK8SORBSgbsl+5QZkHAe3Eiqcpof655iTM8X3+cj/N/v2wzVDd5lyWrODMP2fISt5Oj3l7hmAoMNagjK7rkVlAU5nm8MwotpA+oW3DuMaMuQMtx1akvsC97x5Nyc6aVPktzBIU9EgaGdj7UInznl+AHfYLJQZcOcH9KTDra+4MuSQHW67d6HTjMuFeIIO82rQrRkUSkvGFCJ4w5g/djy9TvfF48DlOd6WtINdbuNZcxxnnQn',14,1,'2023-07-12 11:29:37','2023-07-17 11:45:02','private','c00274abbe79d1e577e780686539a4e5','5bbdcc1eeba8f410876148c848290bbe'),(40,'ROSEMARY - 14h - 27121','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',14,1,'2023-07-13 18:37:00','2023-07-17 17:31:40','private','b127f3007bd065e8a3d1f77b35068cab','42582bf767bed6bef27c3012dece22cf'),(41,'Aula BDD 17/07','tGbuPcMuRdxctUPPt0IqT4o9lTOdIdLInHzaNzfeTrBYiqFd4VW4MCyH+EEL9AieVcZWYYx2SEYaMceDc10H1u63qZRozBdrTQpR0TU0FS42tagj34IFFTQLHa3eREYG1AhB5RUvfQ7nU34zm5uR9t9DEgVwEJUW7s4TE7b6j4c3JGScbQms2RWoAIoonDFVfETxUqDEgZoIkwlhpjX7I9G2f9LW1jjFfl4p4YjBp46RYQdh79ZOWRwgIj6hkcz77oo1Ck32CbpDWSEVDXA29g==',14,1,'2023-07-17 09:05:35',NULL,'personal','eed5e29b8d7c21ae9502fa7b2a78452b','4902f2e72dcb76918805f35824578660'),(42,'OMEGA - 10h - 7963','7dqMZ8gWKsgUOs+Rvx63q0n0Ulp4fjG2ShueVUEKiU2+x4n/Hmag6ieWyN74z37vwLyeA4M2vnhaKsVjaMbSmuDbqGCZUnD3d2wH8o2f6/kx0CnnXZ8yB2ZaOHkrGwGPTyBkKwCw5a8ySqIIWK563+/3W4hRJATSagUfQfgWzIzY9ky/HF1NTozfacGbpN0h+nPgBaH2axhTfOuLratr8dICUEH0cBnMzIQtcNQ35coIvVQYbR+sH7fIDx3sUHRQfTOSv9zag9YwdR7Sc3hZ8OfoHl7YB2+Og9MzF2wfEA8F8+SF7C26uB3ly3ZfAFmQzV9NrlADtkEySsLHRcorY5QMCxdD+NhEj+qTVii7+nYEblhGacA3HrVNZiyHYxJbDYeIn3TW5hl2KsxdOvOhB8KpdXMeFYCgmvA2VTMl/hJhylYeGioV8g9R5TY70UDbprtX79KMlz/8r6fXY4PBN4kXtrsuXJZFhpWiTPdwWye9dGAvTfDFPpMaTSqF2PvHicyqmtLx4Napbx7Gs4h/h9ojeD0EjW/k+Jz7c1XmiLDfVo+yaFbeoK9tNvsKJ/Ux+msMaSatXM4A3NzE7EDcJvN9idob59bwp+0m47h0gylgqQdjZoMrcXi/lSn4ntgYTZwCdRaBHA+fKvWDs2vncMZ3Nn88LxZA/CDiDu45ncMeZtWP5mVxFE9LPzE0f+dyJtsHdG0HLGeQthRj+QLQhgcfHdL0DhzUBqH5RLsIwFbGYqV7IqF58Y/U4T0+FNjco0AeXtaRBbl56semiOMQDzkwTaeVt9CLVtEtDqTVxCT4WCirPph28Sxr9ZIaqbmgxHp0t8n0h3mohdCC2/XrAZ4x4maNW9c0lfdsSVUcvgY3GitXDSWXSHx5f9NHMHy2XRh7zTwHAbAAP+s+gl0LM5KqJAK1YH73Ts8nyjEYkeiapzVHAgqwGe8tH0x+e4iSsIAkZ9bUbwo2AajsVUT7VIf4/8bkMSMywKNXLq/Vt5wBMAMy1XUvnIi+CekuW50zlhkX/DHVwSSHoLXS8At578WZnvVxgrSgrQ6r8E9xxSMhWD3sEhi1XXnqVfLBhnNWa42HZPpuQMJNzE+AjKF/SfN0LU5k+RGq8OzPF2SFY9mPDLGNVeVM8UD0uOlbBtLoV6+jIYD8PVB/fOaY4xVAtW9JkPnHvVKkK9ITN8ts0zOBbJUrXryPp4LncafwRFtGwoyHB+clBL5OalJmeQqJuGCxzviqC+BAKvNQw7dYsbyboVIlnMueMk0GtKMmIm9I8QZ7YMYR5iRBmPqKxZCTb6vYuX1o9FBBktTH5c4sN3IGjqgL2xzT5KUy6AOqpSh5IN9RJi3/DtQFNGSbt/3w2t5QRYpWGFdRG1gd8teO908=',14,1,'2023-07-17 10:05:34','2023-07-17 11:45:53','private','d1dee8dd406ec4108b9d45201fd44534','e28cc6bdc3537ff9ccfd6a2328fd8e8b'),(43,'R.R.SILVA - 15h - 9594','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',14,1,'2023-07-17 11:26:37','2023-07-17 18:14:22','private','bca7400b91596e5a9fae9ad58d3842bc','b143a0e279aedbeb19df5093bc29d5f9'),(44,'erro no template','mXHZ67MZGsoCE+EGmZ9Cho3Ln5lD+60FNcyIF/0AldrknidUd7ykmwi3pBBFa3tTPgYI1iVfx/VcO+tquFIYPQ==',14,1,'2023-07-17 17:36:02',NULL,'personal','220e9adaa96be678ba918c6b44746280','b2a374a3dede9845426f8b2028cf0124');
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
INSERT INTO `users` VALUES (13,'Peter','guilherme.rodrigues@ixcsoft.com.br','$2y$10$ldjJdo121XL17e1HmVMwg.BMzd7LYbn8sQGA7XMQxD5ZBOBn/uRFS','2023-06-10 21:46:35','2023-07-06 22:52:53','2023-07-06 22:52:53',0,NULL,''),(14,'Guilherme','guilhermessmith2014@gmail.com','$2y$10$2zP5MXf6ihONHYkm570S/eJyBccS/0y7T1nfZRf5jYZs1Buc.P/26','2023-06-10 22:09:58','2023-07-17 18:11:03','2023-07-17 18:11:03',0,634176,'Smith'),(15,'Fernandinho','ludansiguer@gmail.com','$2y$10$BfxaJjjFRkYwS7nehG3qquvszR.Vf7fz0Sa8ttdzzBercDxHm.nBi','2023-06-10 22:22:46','2023-07-04 07:59:08',NULL,0,NULL,NULL),(16,'Fernandinho','gabismithdansiguer@gmail.com','$2y$10$z1vkryk.CZ3koFup3lQ5wuh0E7yhw4mn/hmh5QH7S6wkAILODhrLO','2023-06-10 23:39:43','2023-07-04 07:59:08',NULL,0,NULL,NULL),(17,'Fernandinho','lusmithdansiguer@gmail.com','$2y$10$2Fw5zX368iSb9icgKqTarOPfQdhSyP9.okC/MJpQEjylim.4yrqCu','2023-06-11 01:26:39','2023-07-06 22:29:28',NULL,0,740395,NULL),(18,'Fernandinho','jonas.tot@gmail.com','$2y$10$DF9c3V6PXWuZl1JdRWXag.U1MCxq199WA1aeGqxmXPWBrdg0INvvu','2023-06-18 02:02:05','2023-07-04 07:59:08',NULL,0,NULL,NULL),(19,'Fernandinho','guilhermessmith2020@gmail.com','$2y$10$pvehB.qjl8WCHzk38pij8Ol5clsdl9gGzyT.UZtsWM916Ii1ntyrK','2023-06-20 22:35:15','2023-07-04 07:59:08',NULL,0,NULL,NULL),(20,'Fernandinho','jonathan@gmail.com','$2y$10$i4wxtaYbjjAhOTNCN63ZJOmqHhBX6ZZbp3WcK7Z9LcsGzPY/nneKC','2023-06-21 20:36:29','2023-07-04 07:59:08',NULL,0,NULL,NULL),(21,'Fernandinho','mateus.lima@gmail.com','$2y$10$kPjx2pNjvTY9EeFKODGZ0eO1KsxnnmTlokLXrQnDOZ8BCWxEwmqLu','2023-06-21 20:52:10','2023-07-04 07:59:08',NULL,0,NULL,NULL),(29,'Guilherme','guilhermessmith2022@gmail.com','$2y$10$9vqlicBPgas1b6h9rOpMq.R7u60/eFcIy.2luD.ZrVnkhH/accA3O','2023-07-04 21:18:25','2023-07-04 21:18:36','2023-07-04 21:18:36',0,NULL,NULL);
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

-- Dump completed on 2023-07-17 18:15:30
