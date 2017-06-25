-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: case_result
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `case_summary`
--

DROP TABLE IF EXISTS `case_summary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `case_summary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(200) NOT NULL COMMENT '包名',
  `version` varchar(20) DEFAULT NULL COMMENT '版本号',
  `module` varchar(200) DEFAULT NULL COMMENT '模块名称',
  `platform` varchar(20) DEFAULT NULL COMMENT '标签',
  `lable` varchar(200) DEFAULT NULL COMMENT '标签',
  `caseTotalNum` int(11) DEFAULT '1' COMMENT '总case条数',
  `caseFailedNum` int(11) DEFAULT '0' COMMENT '失败的case条数',
  `caseStartTime` datetime DEFAULT NULL COMMENT 'case开始时间',
  `caseEndTime` datetime DEFAULT NULL COMMENT 'case结束时间',
  `creatTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `case_summary`
--

LOCK TABLES `case_summary` WRITE;
/*!40000 ALTER TABLE `case_summary` DISABLE KEYS */;
INSERT INTO `case_summary` VALUES (44,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','2017-05-14 11:17:26'),(43,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,1,'2017-05-14 19:00:16','2017-05-14 19:02:02','2017-05-14 11:02:05'),(42,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,1,'2017-05-14 18:47:36','2017-05-14 18:49:27','2017-05-14 10:50:49'),(41,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,1,'2017-05-14 18:47:36','2017-05-14 18:49:27','2017-05-14 10:50:48'),(40,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,NULL,'2017-05-14 18:37:41','2017-05-14 18:39:21','2017-05-14 10:47:01'),(39,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,NULL,'2017-05-14 18:37:41','2017-05-14 18:39:21','2017-05-14 10:46:57'),(38,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,NULL,'2017-05-14 18:37:41','2017-05-14 18:39:21','2017-05-14 10:46:55'),(36,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2017-05-14 10:44:44'),(37,'com.qiyi.video','8.5.0','channel',NULL,NULL,2,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00','2017-05-14 10:44:55'),(45,'com.qiyi.video','8.5.5','topranklist.function','Android',NULL,1,0,'2017-06-10 08:42:27','2017-06-10 08:42:33','2017-06-10 08:42:34'),(46,'com.qiyi.video','8.5.5','topranklist.function','Android',NULL,1,0,'2017-06-10 08:43:41','2017-06-10 08:43:49','2017-06-10 08:43:49'),(47,'com.qiyi.video','8.5.5','topranklist.function','Android',NULL,1,1,'2017-06-10 08:45:03','2017-06-10 08:47:53','2017-06-10 08:47:53');
/*!40000 ALTER TABLE `case_summary` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-25 23:41:33
