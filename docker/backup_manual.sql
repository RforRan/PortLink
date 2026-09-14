-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: main
-- ------------------------------------------------------
-- Server version	8.0.45

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
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guest_rate_limits`
--

DROP TABLE IF EXISTS `guest_rate_limits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `guest_rate_limits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fingerprint_hash` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `count` tinyint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_grl_ip_fp_date` (`ip`,`fingerprint_hash`,`date`),
  KEY `guest_rate_limits_ip_index` (`ip`),
  KEY `idx_grl_fp_date` (`fingerprint_hash`,`date`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guest_rate_limits`
--

LOCK TABLES `guest_rate_limits` WRITE;
/*!40000 ALTER TABLE `guest_rate_limits` DISABLE KEYS */;
INSERT INTO `guest_rate_limits` VALUES (1,'172.18.0.1','54445fd512a1957fbc88f874c729eada7e3abe0c90c5beb0e8766520f48aa631','2026-03-30',0,'2026-03-30 00:45:03','2026-03-30 00:45:03'),(2,'172.18.0.1','8bf3dc364b5b83936848da49057c7350a023226a8089a58988e90e18140ac6fa','2026-03-30',0,'2026-03-30 02:21:35','2026-03-30 02:21:35'),(3,'172.18.0.1','a57705852df6a4f55315d40c18ed8dd2600fac82fcb244ee8d1c6a5355dad85b','2026-03-30',0,'2026-03-30 03:57:07','2026-03-30 03:57:07'),(4,'172.18.0.1','54445fd512a1957fbc88f874c729eada7e3abe0c90c5beb0e8766520f48aa631','2026-03-31',0,'2026-03-31 03:49:32','2026-03-31 03:49:32');
/*!40000 ALTER TABLE `guest_rate_limits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026_02_04_044927_create_sessions_table',1),(2,'2026_02_05_010136_create_cache_table',1),(3,'2026_02_06_000001_create_guest_rate_limits_table',1),(4,'2026_02_06_000002_create_short_url_table',1),(5,'2026_02_06_000003_unique_short_url',1),(6,'2026_02_06_000004_create_visits_table',1),(7,'2026_02_06_000005_add_judul_deskripsi',1),(8,'2026_02_06_000006_add_guest_columns_to_short_urls',1),(9,'2026_02_06_000007_add_guest_fp_to_short_urls',1),(10,'2026_02_06_000008_add_visitor_hash_to_visits',1),(11,'2026_02_06_000009_add_visits_link_qr',1),(12,'2026_02_06_000010_add_index_to_visits',1),(13,'2026_02_06_000011_add_fingerprint_to_guest_rate_limits',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `short_urls`
--

DROP TABLE IF EXISTS `short_urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `short_urls` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `npp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_guest` tinyint(1) NOT NULL DEFAULT '0',
  `guest_ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_fp` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` timestamp NULL DEFAULT NULL,
  `original_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `visits` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `visits_link` bigint unsigned NOT NULL DEFAULT '0',
  `visits_qr` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_urls_short_url_unique` (`short_url`),
  KEY `idx_short_urls_guest_fp` (`guest_fp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `short_urls`
--

LOCK TABLES `short_urls` WRITE;
/*!40000 ALTER TABLE `short_urls` DISABLE KEYS */;
INSERT INTO `short_urls` VALUES (1,'6908321002',0,NULL,NULL,NULL,'https://simekar.upgris.ac.id/login','ShortMekar1','Simekar','Simekar shortlink','4',4,0,'2026-03-27 03:12:20','2026-03-30 03:21:24'),(2,'690839804',0,NULL,NULL,NULL,'https://simekar.upgris.ac.id/iss/beranda','2',NULL,NULL,'0',0,0,'2026-03-30 01:47:50','2026-03-30 01:47:50');
/*!40000 ALTER TABLE `short_urls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visits`
--

DROP TABLE IF EXISTS `visits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `short_url_id` bigint unsigned NOT NULL,
  `is_qr` tinyint(1) NOT NULL DEFAULT '0',
  `visitor_hash` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `visits_short_url_id_visited_at_index` (`short_url_id`,`visited_at`),
  KEY `visits_visited_at_index` (`visited_at`),
  KEY `visits_visitor_hash_index` (`visitor_hash`),
  KEY `idx_visits_shorturl_time` (`short_url_id`,`visited_at`),
  KEY `idx_visits_shorturl_qr_time` (`short_url_id`,`is_qr`,`visited_at`),
  CONSTRAINT `visits_short_url_id_foreign` FOREIGN KEY (`short_url_id`) REFERENCES `short_urls` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visits`
--

LOCK TABLES `visits` WRITE;
/*!40000 ALTER TABLE `visits` DISABLE KEYS */;
INSERT INTO `visits` VALUES (1,1,0,'220aacac4c49590b240e9015fd965add45bcfbc069418a99bcce34df7b94c8ba','2026-03-27 03:13:08'),(2,1,0,'220aacac4c49590b240e9015fd965add45bcfbc069418a99bcce34df7b94c8ba','2026-03-27 03:13:19'),(3,1,0,'220aacac4c49590b240e9015fd965add45bcfbc069418a99bcce34df7b94c8ba','2026-03-27 03:13:19'),(4,1,0,'220aacac4c49590b240e9015fd965add45bcfbc069418a99bcce34df7b94c8ba','2026-03-30 03:21:24');
/*!40000 ALTER TABLE `visits` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-01  8:11:56
