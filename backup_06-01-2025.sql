-- MySQL dump 10.13  Distrib 8.0.40, for Linux (x86_64)
--
-- Host: localhost    Database: cham_cong
-- ------------------------------------------------------
-- Server version	8.0.40-0ubuntu0.24.10.1

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
-- Table structure for table `bo_phan`
--

DROP TABLE IF EXISTS `bo_phan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bo_phan` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Ten` varchar(50) NOT NULL,
  `Tenql` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `ma_pb` varchar(50) DEFAULT NULL,
  `ten_bp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Ten` (`Ten`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bo_phan`
--

LOCK TABLES `bo_phan` WRITE;
/*!40000 ALTER TABLE `bo_phan` DISABLE KEYS */;
INSERT INTO `bo_phan` VALUES (16,'HR',NULL,'demo@gmail.com',NULL,'hr','hr'),(17,'Kế toán',NULL,'vietanh911998@gmail.com',NULL,'KT','KT');
/*!40000 ALTER TABLE `bo_phan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ca_lam_viec`
--

DROP TABLE IF EXISTS `ca_lam_viec`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ca_lam_viec` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Tenca` varchar(255) NOT NULL,
  `Gio_bat_dau` time NOT NULL,
  `Gio_ket_thuc` time NOT NULL,
  `Thu` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ca_lam_viec`
--

LOCK TABLES `ca_lam_viec` WRITE;
/*!40000 ALTER TABLE `ca_lam_viec` DISABLE KEYS */;
INSERT INTO `ca_lam_viec` VALUES (10,'S','06:00:00','15:00:00','2-7'),(11,'S','06:00:00','16:00:00','2-7'),(12,'S','06:00:00','17:00:00','2-7'),(13,'S','06:00:00','18:00:00','2-7'),(14,'S','06:00:00','14:00:00','CN'),(15,'GS','08:00:00','17:00:00','2-7'),(16,'GS','08:00:00','18:00:00','2-7'),(17,'GS','08:00:00','19:00:00','2-7'),(18,'GS','08:00:00','20:00:00','2-7'),(19,'GS','08:00:00','16:00:00','CN'),(20,'T','12:00:00','21:00:00','2-7'),(21,'T','12:00:00','22:00:00','2-7'),(22,'T','12:00:00','23:00:00','2-7'),(23,'T','12:00:00','00:00:00','2-7'),(24,'T','12:00:00','20:00:00','CN'),(25,'GC','14:00:00','23:00:00','2-7'),(26,'GC','14:00:00','00:00:00','2-7'),(27,'GC','14:00:00','01:00:00','2-7'),(28,'GC','14:00:00','02:00:00','2-7'),(29,'GC','14:00:00','22:00:00','CN'),(30,'D','17:00:00','02:00:00','2-7'),(31,'D','16:00:00','02:00:00','2-7'),(32,'D','15:00:00','02:00:00','2-7'),(33,'D','14:00:00','02:00:00','2-7'),(34,'D','17:00:00','01:00:00','CN'),(35,'K','21:00:00','06:00:00','2-7'),(36,'K','20:00:00','06:00:00','2-7'),(37,'K','22:00:00','06:00:00','CN'),(38,'VP','00:00:00','00:00:00',''),(39,'P','00:00:00','00:00:00','');
/*!40000 ALTER TABLE `ca_lam_viec` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cham_bu`
--

DROP TABLE IF EXISTS `cham_bu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cham_bu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Ma_nv` varchar(50) NOT NULL,
  `Ngay_thieu` date NOT NULL,
  `Ngay_cham_bu` date NOT NULL,
  `Gio_bat_dau` time NOT NULL,
  `Gio_ket_thuc` time NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cham_bu`
--

LOCK TABLES `cham_bu` WRITE;
/*!40000 ALTER TABLE `cham_bu` DISABLE KEYS */;
INSERT INTO `cham_bu` VALUES (5,'NV5701','2024-10-02','2024-10-05','16:22:00','19:53:00',1),(6,'NV5701','2024-10-02','2024-10-08','11:37:00','23:31:00',1);
/*!40000 ALTER TABLE `cham_bu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cham_cong`
--

DROP TABLE IF EXISTS `cham_cong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cham_cong` (
  `ID_cham_cong` int NOT NULL AUTO_INCREMENT COMMENT 'ID chấm công',
  `Ma_nv` varchar(50) NOT NULL COMMENT 'Mã nhân viên',
  `Ngay` date NOT NULL COMMENT 'Ngày tháng năm chấm công',
  `Gio_checkin` time DEFAULT NULL,
  `Gio_checkout` time DEFAULT NULL,
  `so_gio_lam` decimal(10,1) DEFAULT NULL,
  `so_gio_thieu` decimal(10,1) DEFAULT NULL,
  `Tinh_trang` varchar(10) NOT NULL DEFAULT 'Đi làm' COMMENT 'Tình trạng',
  `phe_duyet` int NOT NULL DEFAULT '0' COMMENT '0 là chưa duyệt công\r\n1 là đã duyệt',
  `role` int DEFAULT '0' COMMENT '0 là chấm công mặc định\r\n1 là chấm bù',
  PRIMARY KEY (`ID_cham_cong`)
) ENGINE=InnoDB AUTO_INCREMENT=1269520 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cham_cong`
--

LOCK TABLES `cham_cong` WRITE;
/*!40000 ALTER TABLE `cham_cong` DISABLE KEYS */;
INSERT INTO `cham_cong` VALUES (1269519,'NV8','2025-01-06','13:41:35',NULL,NULL,NULL,'Đi làm',0,0);
/*!40000 ALTER TABLE `cham_cong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message_id` int NOT NULL,
  `user_id` int NOT NULL,
  `assigned_to` int NOT NULL,
  `message` text NOT NULL,
  `role` int NOT NULL DEFAULT '2' COMMENT '0 là admin\r\n1 là tp\r\n2 là nv',
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (1,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:10:26'),(2,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:36:54'),(3,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:37:03'),(4,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:37:03'),(5,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:40:12'),(6,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:40:12'),(7,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:40:12'),(8,4,6,2,'Tôi cần hỗ trợ tôi cần hỗ trợ',2,0,'2024-10-21 03:40:12'),(10,4,6,2,'abc',2,0,'2024-10-21 04:40:23'),(11,13,6,2,'lisahjk gkjdsf',2,1,'2024-10-21 08:04:57'),(12,13,1,2,'abc',2,1,'2024-10-21 08:22:17'),(14,13,6,2,'ok chÆ°a',2,1,'2024-10-21 08:35:12'),(15,13,6,2,'hihihih',2,1,'2024-10-21 09:02:40'),(16,13,2,2,'ok rá»“i nhÃ©',2,0,'2024-10-21 09:22:22'),(17,15,6,2,'gsdfgsdfgh',2,1,'2024-10-21 10:22:04'),(18,13,6,2,'abc',2,0,'2024-10-21 15:40:30'),(19,15,6,2,'hehe xin chÃ o admin',2,1,'2024-10-21 15:42:15'),(20,15,6,2,'xzczx',2,0,'2024-10-21 15:49:39'),(21,15,6,2,'adfsd',2,0,'2024-10-21 15:49:42'),(22,15,1,2,'acdsas',2,1,'2024-10-21 16:06:02'),(23,16,6,2,'TÃ´i cáº§n admin há»— trá»£',2,1,'2024-10-21 16:15:03'),(24,16,1,2,'ChÃ o báº¡n mÃ¬nh lÃ  admin group sau Ä‘Ã¢y báº¡n chien1 sáº½ há»— trá»£ báº¡n',2,1,'2024-10-21 16:15:27'),(25,16,6,2,'oke',2,1,'2024-10-21 16:15:42'),(26,16,2,2,'chÃ o báº¡n mÃ¬nh lÃ  chiáº¿n 1 sáº½ há»— trá»£ báº¡n',2,1,'2024-10-21 16:16:05'),(27,17,6,2,'admin Æ¡i mÃ¬nh muá»‘n há»— trá»£',2,1,'2024-10-22 03:59:43'),(28,17,1,2,'ChÃ o báº¡n trÆ°á»Ÿng phÃ²ng chien1 sáº½ há»— trá»£ b nhÃ©',2,1,'2024-10-22 04:00:13'),(29,17,2,2,'Hello mÃ¬nh cáº§n há»— trá»£ gÃ¬ nhá»‰',2,1,'2024-10-22 04:00:35'),(30,17,6,2,'váº«n chÆ°a hiá»‡n tin nháº¯n cá»§a chien1 nhá»‰ cháº¯c pháº£i Ä‘á»£i admin duyá»‡t ',2,1,'2024-10-22 04:01:07'),(31,17,1,2,'Ä‘Ãºng rá»“i nha admin duyá»‡t tá»«ng tin nháº¯n nhÃ©',2,1,'2024-10-22 04:01:33'),(33,17,1,2,'xÃ³a r nhÃ© k Ä‘Æ°á»£c nháº¯n tin Ä‘Ã¢u',2,1,'2024-10-22 04:02:19'),(34,17,6,2,'hehe',2,1,'2024-10-25 04:02:09'),(35,18,6,2,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',2,1,'2024-11-05 09:03:00'),(36,25,6,2,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',2,1,'2024-11-05 09:22:48'),(37,27,6,2,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',2,1,'2024-11-05 09:33:28'),(38,27,1,2,'....',2,1,'2025-01-03 11:20:01'),(39,29,20,22,'tôi là admin',2,1,'2025-01-06 05:27:01'),(40,29,20,22,'đây là tôi',2,1,'2025-01-06 05:35:02'),(41,29,22,22,'Xin chào lại là tôi đây',2,1,'2025-01-06 05:35:45'),(42,30,22,23,'đây là tôi quản lý',2,1,'2025-01-06 05:41:18'),(43,31,20,1,'dđ',2,1,'2025-01-06 05:54:21'),(44,32,22,24,'đây là tôi',2,1,'2025-01-06 06:34:47');
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_chat`
--

DROP TABLE IF EXISTS `group_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_chat`
--

LOCK TABLES `group_chat` WRITE;
/*!40000 ALTER TABLE `group_chat` DISABLE KEYS */;
INSERT INTO `group_chat` VALUES (1,1,'admin đây','2024-10-21 16:33:43'),(2,6,'abc','2024-10-21 16:43:29'),(3,2,'hehe','2024-10-21 16:44:41'),(4,2,'hehehe','2024-10-21 16:44:56'),(5,2,'hehehe','2024-10-21 16:47:54'),(6,6,'abc','2024-10-21 16:48:27'),(7,2,'bá»‹ sao tháº¿','2024-10-21 16:49:13'),(8,6,'Ä‘Æ°á»£c cáº¥p quyá»n r hehe','2024-10-22 04:03:22'),(9,1,'Jjjj','2025-01-03 11:20:26'),(10,1,'dlkasjdlajlsk','2025-01-03 11:26:49'),(11,20,'sdfádfád','2025-01-06 03:44:32'),(12,22,'xin chào','2025-01-06 05:23:57'),(13,20,'tôi là tôi','2025-01-06 05:34:51');
/*!40000 ALTER TABLE `group_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_chat_nb`
--

DROP TABLE IF EXISTS `group_chat_nb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_chat_nb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_chat_nb`
--

LOCK TABLES `group_chat_nb` WRITE;
/*!40000 ALTER TABLE `group_chat_nb` DISABLE KEYS */;
INSERT INTO `group_chat_nb` VALUES (1,14,'mÃ¬nh lÃ  chiáº¿n quáº£n lÃ½ nhÃ³m má»›i','2024-12-17 08:07:20'),(2,2,'hihi mÃ¬nh lÃ  chiáº¿n 1 Ä‘Ã¢y','2024-12-17 08:08:37'),(3,6,'hi mÃ¬nh lÃ  chiáº¿n 05073007 Ä‘Ã£ Ä‘Æ°á»£c cáº¥p quyá»n chat','2024-12-17 08:43:59'),(4,18,'alo','2025-01-03 13:20:55');
/*!40000 ALTER TABLE `group_chat_nb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `luong`
--

DROP TABLE IF EXISTS `luong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `luong` (
  `He_so_luong` int NOT NULL COMMENT 'Hệ số lương',
  `Luong_co_ban` int NOT NULL COMMENT 'Lương cơ bản',
  PRIMARY KEY (`He_so_luong`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `luong`
--

LOCK TABLES `luong` WRITE;
/*!40000 ALTER TABLE `luong` DISABLE KEYS */;
INSERT INTO `luong` VALUES (1,4600000),(2,4400000),(3,4100000),(4,2050000);
/*!40000 ALTER TABLE `luong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message_sample`
--

DROP TABLE IF EXISTS `message_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message_sample` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message_sample`
--

LOCK TABLES `message_sample` WRITE;
/*!40000 ALTER TABLE `message_sample` DISABLE KEYS */;
/*!40000 ALTER TABLE `message_sample` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `message` text NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 là chưa duyệt\r\n1 là đã duyệt',
  `assigned_to` int DEFAULT NULL,
  `active` int DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (7,6,'háº¿ loooooooooo',1,2,1,'2024-10-21 14:51:57'),(8,6,'heslo',1,2,1,'2024-10-21 14:53:40'),(9,6,'hihi',1,2,1,'2024-10-21 14:55:10'),(12,6,'heheh',1,2,1,'2024-10-21 15:01:37'),(13,6,'lisahjk gkjdsf',1,2,1,'2024-10-21 15:04:07'),(14,8,'leifgsag',0,NULL,1,'2024-10-21 15:07:35'),(15,6,'gsdfgsdfgh',1,2,1,'2024-10-21 15:07:37'),(16,6,'TÃ´i cáº§n admin há»— trá»£',1,2,1,'2024-10-21 23:14:46'),(17,6,'admin Æ¡i mÃ¬nh muá»‘n há»— trá»£',1,2,1,'2024-10-22 10:59:29'),(18,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',1,2,1,'2024-11-05 15:58:31'),(19,6,'Ä‚n uá»‘ng, nhÃ  á»Ÿ\r\n',0,NULL,1,'2024-11-05 15:58:31'),(20,6,'CÃ´ng viá»‡c cá»§a team',0,NULL,1,'2024-11-05 16:10:20'),(21,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',0,NULL,1,'2024-11-05 16:18:06'),(22,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',0,NULL,1,'2024-11-05 16:19:28'),(23,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',0,NULL,1,'2024-11-05 16:19:29'),(24,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',0,NULL,1,'2024-11-05 16:20:38'),(25,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',1,2,0,'2024-11-05 16:21:03'),(26,6,'Ä‚n uá»‘ng, nhÃ  á»Ÿ\r\n',0,NULL,1,'2024-11-05 16:21:03'),(27,6,' Cháº¿ Ä‘á»™ lÆ°Æ¡ng, thÆ°á»Ÿng',1,2,0,'2024-11-05 16:32:50'),(29,20,'Tôi là admin',1,22,1,'2025-01-06 12:26:45'),(30,22,'Tôi là admin',1,23,1,'2025-01-06 12:41:05'),(31,20,'Tôi là admin',1,1,1,'2025-01-06 12:54:07'),(32,22,'Tôi là admin',1,24,1,'2025-01-06 13:34:42');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_luong`
--

DROP TABLE IF EXISTS `nhan_luong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhan_luong` (
  `ID` int NOT NULL AUTO_INCREMENT COMMENT 'ID nhân lương',
  `Ma_nv` varchar(50) NOT NULL COMMENT 'Mã nhân viên',
  `He_so_luong` int NOT NULL COMMENT 'Hệ số lương',
  `So_ngay_lam` int NOT NULL COMMENT 'Số ngày làm',
  `Tien_thuong` int DEFAULT '0' COMMENT 'Tiền thưởng',
  `Tien_phat` int DEFAULT '0' COMMENT 'Tiền phạt',
  `Tien_ung` int DEFAULT '0' COMMENT 'Tiền ứng',
  `Tong` int NOT NULL COMMENT 'Tổng',
  `Thoi_gian` date NOT NULL,
  `Tinh_trang` varchar(50) NOT NULL DEFAULT 'Chưa thanh toán',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_luong`
--

LOCK TABLES `nhan_luong` WRITE;
/*!40000 ALTER TABLE `nhan_luong` DISABLE KEYS */;
INSERT INTO `nhan_luong` VALUES (2,'NV02',2,23,0,0,0,3614286,'2023-12-30','Đã thanh toán'),(4,'NV05',3,23,0,0,0,3367857,'2023-12-30','Đã thanh toán'),(11,'NV05',3,0,0,0,0,0,'2023-08-15','Đã thanh toán'),(14,'NV02',2,0,0,0,0,0,'2023-08-15','Đã thanh toán');
/*!40000 ALTER TABLE `nhan_luong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nhan_vien`
--

DROP TABLE IF EXISTS `nhan_vien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nhan_vien` (
  `Ma_nv` varchar(50) NOT NULL COMMENT 'Mã nhân viên',
  `username` varchar(50) NOT NULL COMMENT 'Họ tên nhân viên',
  `Gioitinh` varchar(20) NOT NULL COMMENT 'Giới tính',
  `Ngaysinh` date DEFAULT NULL COMMENT 'Ngày sinh',
  `chucdanh` varchar(255) DEFAULT NULL,
  `ID_bophan` int NOT NULL,
  `He_so_luong` int NOT NULL COMMENT 'Hệ số lương',
  `Ma_bo` varchar(255) DEFAULT NULL,
  `Ma_nhom` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1',
  `login` int NOT NULL DEFAULT '0' COMMENT '0 là không hoạt động\r\n1 là đang hoạt động',
  PRIMARY KEY (`Ma_nv`),
  KEY `ID_bophan` (`ID_bophan`),
  KEY `He_so_luong` (`He_so_luong`),
  CONSTRAINT `fk_nhanvien_bophan` FOREIGN KEY (`ID_bophan`) REFERENCES `bo_phan` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nhan_vien`
--

LOCK TABLES `nhan_vien` WRITE;
/*!40000 ALTER TABLE `nhan_vien` DISABLE KEYS */;
INSERT INTO `nhan_vien` VALUES ('NV','Nguyễn Việt Anh','Nam',NULL,'Quản lý',17,3,'KT','KT','vietanh911998@gmail.com','Anh911998@',1,0),('NV1','HR 1','Nam',NULL,'Mobile Developer',16,3,'HR','HR','demo@gmail.com','123456',1,0),('NV4','ddd','Nam',NULL,'RomRom',17,3,'123','123','namnv@gmail.com','123123',1,0),('NV8','Nguyễn Thanh Bình','Nam',NULL,'nhân viên',17,3,'KT','KT','anhnv@9pay.vn','123@123',1,1);
/*!40000 ALTER TABLE `nhan_vien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phan_ca_lam`
--

DROP TABLE IF EXISTS `phan_ca_lam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `phan_ca_lam` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Ma_nv` varchar(50) NOT NULL,
  `id_calam` int NOT NULL,
  `ngay` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phan_ca_lam`
--

LOCK TABLES `phan_ca_lam` WRITE;
/*!40000 ALTER TABLE `phan_ca_lam` DISABLE KEYS */;
INSERT INTO `phan_ca_lam` VALUES (38,'chien1',10,'2024-11-11'),(50,'NV5678',25,'2024-11-20'),(51,'NV6768453',10,'2024-11-20'),(52,'NV6768453',10,'2024-11-21'),(53,'NV6768453',10,'2024-11-22'),(54,'NV6768453',10,'2024-11-23'),(55,'NV6768453',10,'2024-11-24'),(63,'NV6768453',39,'2024-11-30'),(64,'NV6768453',39,'2024-12-01'),(65,'NV6768453',16,'2024-11-25'),(77,'NV8',10,'2025-01-06'),(78,'NV8',10,'2025-01-07');
/*!40000 ALTER TABLE `phan_ca_lam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tang_ca`
--

DROP TABLE IF EXISTS `tang_ca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tang_ca` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Ma_nv` varchar(50) NOT NULL,
  `Ngay` date NOT NULL,
  `Gio_bat_dau` time NOT NULL,
  `Gio_ket_thuc` time NOT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1 là hoạt đọng \r\n0 là không hđ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tang_ca`
--

LOCK TABLES `tang_ca` WRITE;
/*!40000 ALTER TABLE `tang_ca` DISABLE KEYS */;
INSERT INTO `tang_ca` VALUES (2,'NV5701','2024-10-08','14:15:00','23:16:00',1);
/*!40000 ALTER TABLE `tang_ca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thuong_phat`
--

DROP TABLE IF EXISTS `thuong_phat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thuong_phat` (
  `ID_thuong_phat` int NOT NULL AUTO_INCREMENT COMMENT 'ID thưởng phạt',
  `Ma_nv` varchar(50) NOT NULL COMMENT 'Mã nhân viên',
  `Loai_hinh` varchar(50) NOT NULL COMMENT 'Loại hình',
  `So_tien` int NOT NULL COMMENT 'Số tiền',
  `Li_do` varchar(50) NOT NULL COMMENT 'Lí do',
  `Ngay_thuc_hien` date NOT NULL COMMENT 'Ngày thực hiện',
  PRIMARY KEY (`ID_thuong_phat`),
  KEY `fk_thuong_phat` (`Ma_nv`),
  KEY `So_tien` (`So_tien`),
  CONSTRAINT `fk_thuong_phat` FOREIGN KEY (`Ma_nv`) REFERENCES `nhan_vien` (`Ma_nv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thuong_phat`
--

LOCK TABLES `thuong_phat` WRITE;
/*!40000 ALTER TABLE `thuong_phat` DISABLE KEYS */;
/*!40000 ALTER TABLE `thuong_phat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ung_luong`
--

DROP TABLE IF EXISTS `ung_luong`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ung_luong` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Ma_nv` varchar(50) NOT NULL,
  `So_tien` int NOT NULL,
  `Ngay_ung` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Ma_nv` (`Ma_nv`),
  KEY `So_tien` (`So_tien`),
  CONSTRAINT `fk_ungtien` FOREIGN KEY (`Ma_nv`) REFERENCES `nhan_vien` (`Ma_nv`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ung_luong`
--

LOCK TABLES `ung_luong` WRITE;
/*!40000 ALTER TABLE `ung_luong` DISABLE KEYS */;
/*!40000 ALTER TABLE `ung_luong` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `role` int NOT NULL DEFAULT '1' COMMENT '0 là admin\r\n1 là quản lý',
  `active_message` int NOT NULL DEFAULT '0' COMMENT '0 là không được gửi \r\n1 là được gửi',
  `active_message_nb` int DEFAULT '0',
  `approve_message` int DEFAULT '0',
  `TK_Admin` int NOT NULL DEFAULT '0',
  `QL_Nhanvien` int NOT NULL DEFAULT '0',
  `QL_phongban` int NOT NULL DEFAULT '0',
  `QL_calamviec` int NOT NULL DEFAULT '0',
  `Chamtangca` int NOT NULL DEFAULT '0',
  `Chambu` int NOT NULL DEFAULT '0',
  `Phanquyen` int NOT NULL DEFAULT '0',
  `Duyetchamcong` int NOT NULL DEFAULT '0',
  `Sualichlam` int DEFAULT '0',
  `Phophong` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','admin',0,1,0,1,1,1,1,1,0,0,1,0,0,0),(20,'demo@gmail.com',NULL,'123456',1,0,0,1,0,1,1,1,1,1,1,1,1,0),(21,'vonam@gmail.com',NULL,'123456',2,0,0,0,0,0,0,0,0,0,0,0,0,0),(22,'vietanh911998@gmail.com',NULL,'Anh911998@',1,0,0,1,0,1,1,1,1,1,1,1,1,0),(23,'anhnv@9pay.vn',NULL,'123@123',2,0,0,0,0,0,0,0,0,0,0,0,0,0),(24,'namnv@gmail.com',NULL,'123123',1,0,0,0,0,1,1,1,1,1,1,1,1,0);
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

-- Dump completed on 2025-01-06 13:49:38
