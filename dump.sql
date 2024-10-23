-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: mysql-8.2.local    Database: test_auth
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_tokens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashed_validator` varchar(255) NOT NULL,
  `expiry` datetime NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_tokens_users_FK` (`user_id`),
  CONSTRAINT `user_tokens_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_tokens`
--

LOCK TABLES `user_tokens` WRITE;
/*!40000 ALTER TABLE `user_tokens` DISABLE KEYS */;
INSERT INTO `user_tokens` VALUES (2,'d058f345b92d32494e49ff632900b56d','$2y$10$17.zYuLG2ekQ3TDSoaZDPeZMsC1gfDSFSXvVzqOem24c4qIQ2Q32W','2024-11-22 08:31:27',25),(3,'558f3a54eca3de01688d1bb21b101c0b','$2y$10$Dn8Y8.si3fTppbtatAkcV.PFuh4yxWElyhJNQWIc3djPo/H7/z/J2','2024-11-22 08:33:37',1);
/*!40000 ALTER TABLE `user_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` binary(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_unique` (`email`),
  UNIQUE KEY `users_unique_1` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pilnov.nickita@yandex.ru','Vatop',_binary '$2y$10$7FNRgsod5A.S81MTw3wk3OarUwanvhDL6PA/IZCy1v1Lb97TtsPlm'),(15,'fnm@g.gdf','Vato',_binary '$2y$10$KugTH3I.VOw2NeVGlfpmJ.To/9LLUe8jHuZ6eiwmsZ5w/EjQAMUFO'),(18,'mk@mk.mk','Va',_binary '$2y$10$Qqu9qBGuVbyeQ6S7fmDngekFxgW0nNQkKT7ucUoOUD4IiIwPH8W/K'),(19,'abc@def.com','abc',_binary '$2y$10$a4a5jzogG6FBHj8yZYyd/.cjPu4gp7aA0c83z8vFhTAAKhimWgKmC'),(20,'klo@klo.kl','klo',_binary '$2y$10$y5hDJkU4cXPaTAIva6app.bczYOqA7z8cK80Xw6E8pvOa2QJZGkcq'),(21,'lula@silva.br','Luul',_binary '$2y$10$4BAyIlIXvAwLMTbd9Ljef.4JXoQT433E0rp66gkmcSSeP6OdQuG3y'),(22,'pilnov.nickita@yandex.ruhjgjgh','ll',_binary '$2y$10$bWWlOFUp46jrmwNS1FTYE.L9cD56NwcpsJ8Vh6is4nLXXjNGFeJxS'),(23,'ross@vadas.bl','Ross',_binary '$2y$10$UNXg5tIfdlFRbeYDR7Trrujma63Yis0h9yyg9QHkcn7qrwLlFnkp.'),(24,'manul@tima.ru','Manul',_binary '$2y$10$9kQ3/emVS4DrE4KwDEyguevkI7ZCPZQvgkBLMucjmoRleY6dZ2gwO'),(25,'naib@bukele.sl','naib',_binary '$2y$10$nlGxTJWrYsqPUj3JiQKbjOSJPVfhkHWkeO4MgD8dE4H56UK7kBW06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'test_auth'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-23  9:03:06
