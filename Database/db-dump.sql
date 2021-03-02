-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: pwpproject
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`),
  KEY `comments_content_id_foreign` (`content_id`),
  CONSTRAINT `comments_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`slug`),
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'mind blowing movie','inception',1,NULL,NULL),(2,'nice','end-game',2,NULL,NULL),(3,'joker is best','the-dark-knight',2,NULL,NULL),(4,'amazing movie','12-angry-men ',3,NULL,NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_genres`
--

DROP TABLE IF EXISTS `content_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `content_genres` (
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` bigint unsigned NOT NULL,
  KEY `content_genres_content_id_index` (`content_id`),
  KEY `content_genres_genre_id_index` (`genre_id`),
  CONSTRAINT `content_genres_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`slug`),
  CONSTRAINT `content_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_genres`
--

LOCK TABLES `content_genres` WRITE;
/*!40000 ALTER TABLE `content_genres` DISABLE KEYS */;
INSERT INTO `content_genres` VALUES ('infinity-war',1),('end-game',1),('inception',13),('the-shawshank-redemption',5),('the-godfather ',4),('the-dark-knight',1),('12-angry-men ',4),('forrest -gump',5),('the-matrix',1),('Interstellar',13);
/*!40000 ALTER TABLE `content_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contents` (
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `release_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `contents_slug_index` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contents`
--

LOCK TABLES `contents` WRITE;
/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES ('infinity-war','Avengers: Infinity War','https://www.youtube.com/watch?v=6ZfuNTqbHE8','The Avengers and their allies must be willing to sacrifice all in an attempt to defeat the powerful Thanos before his blitz of devastation and ruin puts an end to the universe.','Anthony Russo','2018',NULL,NULL,NULL),('end-game','Avengers: Endgame ','https://www.youtube.com/watch?v=TcMBFSGVi1c','After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos\' actions and restore balance to the universe','Anthony Russo','2019',NULL,NULL,NULL),('inception','inception','https://www.youtube.com/watch?v=YoHD9XEInc0','A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',' Christopher Nolan','2010',NULL,NULL,NULL),('the-shawshank-redemption','The shawshank redemption','https://www.youtube.com/watch?v=NmzuHjWmXOc','Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.','Frank Darabont','1994',NULL,NULL,NULL),('the-godfather ','The Godfather ','https://www.imdb.com/video/vi1348706585?playlistId=tt0068646&ref_=tt_ov_vi','An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son.','Francis Ford Coppola','1972',NULL,NULL,NULL),('the-dark-knight','The Dark Knight','https://www.imdb.com/video/vi324468761?playlistId=tt0468569&ref_=tt_ov_vi','When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',' Christopher Nolan','2008',NULL,NULL,NULL),('12-angry-men ','12 Angry Men ','https://www.imdb.com/video/vi3452609817?playlistId=tt0050083&ref_=tt_ov_vi','A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence.','Sidney Lumet','1957',NULL,NULL,NULL),('forrest -gump','Forrest Gump','https://www.imdb.com/video/vi3567517977?playlistId=tt0109830&ref_=tt_ov_vi','The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate and other historical events unfold through the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.','Robert Zemeckis','1994',NULL,NULL,NULL),('the-matrix','The Matrix','https://imdb.com/video/vi1032782617?playlistId=tt0133093&ref_=tt_ov_vi','When a beautiful stranger leads computer hacker Neo to a forbidding underworld, he discovers the shocking truth--the life he knows is the elaborate deception of an evil cyber-intelligence.',' Lana Wachowski ','1999',NULL,NULL,NULL),('Interstellar','Interstellar','https://www.imdb.com/video/vi1586278169?playlistId=tt0816692&ref_=tt_ov_vi','A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.','Christopher Nolan','2014',NULL,NULL,NULL);
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `countries_code_index` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES ('AF','Afghanistan'),('AX','Aland Islands'),('AL','Albania'),('DZ','Algeria'),('AS','American Samoa'),('AD','Andorra'),('AO','Angola'),('AI','Anguilla'),('AQ','Antarctica'),('AG','Antigua and Barbuda'),('AR','Argentina'),('AM','Armenia'),('AW','Aruba'),('AU','Australia'),('AT','Austria'),('AZ','Azerbaijan'),('BS','Bahamas'),('BH','Bahrain'),('BD','Bangladesh'),('BB','Barbados'),('BY','Belarus'),('BE','Belgium'),('BZ','Belize'),('BJ','Benin'),('BM','Bermuda'),('BT','Bhutan'),('BO','Bolivia'),('BQ','Bonaire, Saint Eustatius and Saba'),('BA','Bosnia and Herzegovina'),('BW','Botswana'),('BV','Bouvet Island'),('BR','Brazil'),('IO','British Indian Ocean Territory'),('VG','British Virgin Islands'),('BN','Brunei'),('BG','Bulgaria'),('BF','Burkina Faso'),('BI','Burundi'),('KH','Cambodia'),('CM','Cameroon'),('CA','Canada'),('CV','Cape Verde'),('KY','Cayman Islands'),('CF','Central African Republic'),('TD','Chad'),('CL','Chile'),('CN','China'),('CX','Christmas Island'),('CC','Cocos Islands'),('CO','Colombia'),('KM','Comoros'),('CK','Cook Islands'),('CR','Costa Rica'),('HR','Croatia'),('CU','Cuba'),('CW','Curacao'),('CY','Cyprus'),('CZ','Czech Republic'),('CD','Democratic Republic of the Congo'),('DK','Denmark'),('DJ','Djibouti'),('DM','Dominica'),('DO','Dominican Republic'),('TL','East Timor'),('EC','Ecuador'),('EG','Egypt'),('SV','El Salvador'),('GQ','Equatorial Guinea'),('ER','Eritrea'),('EE','Estonia'),('ET','Ethiopia'),('FK','Falkland Islands'),('FO','Faroe Islands'),('FJ','Fiji'),('FI','Finland'),('FR','France'),('GF','French Guiana'),('PF','French Polynesia'),('TF','French Southern Territories'),('GA','Gabon'),('GM','Gambia'),('GE','Georgia'),('DE','Germany'),('GH','Ghana'),('GI','Gibraltar'),('GR','Greece'),('GL','Greenland'),('GD','Grenada'),('GP','Guadeloupe'),('GU','Guam'),('GT','Guatemala'),('GG','Guernsey'),('GN','Guinea'),('GW','Guinea-Bissau'),('GY','Guyana'),('HT','Haiti'),('HM','Heard Island and McDonald Islands'),('HN','Honduras'),('HK','Hong Kong'),('HU','Hungary'),('IS','Iceland'),('IN','India'),('ID','Indonesia'),('IR','Iran'),('IQ','Iraq'),('IE','Ireland'),('IM','Isle of Man'),('IL','Israel'),('IT','Italy'),('CI','Ivory Coast'),('JM','Jamaica'),('JP','Japan'),('JE','Jersey'),('JO','Jordan'),('KZ','Kazakhstan'),('KE','Kenya'),('KI','Kiribati'),('XK','Kosovo'),('KW','Kuwait'),('KG','Kyrgyzstan'),('LA','Laos'),('LV','Latvia'),('LB','Lebanon'),('LS','Lesotho'),('LR','Liberia'),('LY','Libya'),('LI','Liechtenstein'),('LT','Lithuania'),('LU','Luxembourg'),('MO','Macao'),('MK','Macedonia'),('MG','Madagascar'),('MW','Malawi'),('MY','Malaysia'),('MV','Maldives'),('ML','Mali'),('MT','Malta'),('MH','Marshall Islands'),('MQ','Martinique'),('MR','Mauritania'),('MU','Mauritius'),('YT','Mayotte'),('MX','Mexico'),('FM','Micronesia'),('MD','Moldova'),('MC','Monaco'),('MN','Mongolia'),('ME','Montenegro'),('MS','Montserrat'),('MA','Morocco'),('MZ','Mozambique'),('MM','Myanmar'),('NA','Namibia'),('NR','Nauru'),('NP','Nepal'),('NL','Netherlands'),('NC','New Caledonia'),('NZ','New Zealand'),('NI','Nicaragua'),('NE','Niger'),('NG','Nigeria'),('NU','Niue'),('NF','Norfolk Island'),('KP','North Korea'),('MP','Northern Mariana Islands'),('NO','Norway'),('OM','Oman'),('PK','Pakistan'),('PW','Palau'),('PS','Palestinian Territory'),('PA','Panama'),('PG','Papua New Guinea'),('PY','Paraguay'),('PE','Peru'),('PH','Philippines'),('PN','Pitcairn'),('PL','Poland'),('PT','Portugal'),('PR','Puerto Rico'),('QA','Qatar'),('CG','Republic of the Congo'),('RE','Reunion'),('RO','Romania'),('RU','Russia'),('RW','Rwanda'),('BL','Saint Barthelemy'),('SH','Saint Helena'),('KN','Saint Kitts and Nevis'),('LC','Saint Lucia'),('MF','Saint Martin'),('PM','Saint Pierre and Miquelon'),('VC','Saint Vincent and the Grenadines'),('WS','Samoa'),('SM','San Marino'),('ST','Sao Tome and Principe'),('SA','Saudi Arabia'),('SN','Senegal'),('RS','Serbia'),('SC','Seychelles'),('SL','Sierra Leone'),('SG','Singapore'),('SX','Sint Maarten'),('SK','Slovakia'),('SI','Slovenia'),('SB','Solomon Islands'),('SO','Somalia'),('ZA','South Africa'),('GS','South Georgia and the South Sandwich Islands'),('KR','South Korea'),('SS','South Sudan'),('ES','Spain'),('LK','Sri Lanka'),('SD','Sudan'),('SR','Suriname'),('SJ','Svalbard and Jan Mayen'),('SZ','Swaziland'),('SE','Sweden'),('CH','Switzerland'),('SY','Syria'),('TW','Taiwan'),('TJ','Tajikistan'),('TZ','Tanzania'),('TH','Thailand'),('TG','Togo'),('TK','Tokelau'),('TO','Tonga'),('TT','Trinidad and Tobago'),('TN','Tunisia'),('TR','Turkey'),('TM','Turkmenistan'),('TC','Turks and Caicos Islands'),('TV','Tuvalu'),('VI','U.S. Virgin Islands'),('UG','Uganda'),('UA','Ukraine'),('AE','United Arab Emirates'),('GB','United Kingdom'),('US','United States'),('UM','United States Minor Outlying Islands'),('UY','Uruguay'),('UZ','Uzbekistan'),('VU','Vanuatu'),('VA','Vatican'),('VE','Venezuela'),('VN','Vietnam'),('WF','Wallis and Futuna'),('EH','Western Sahara'),('YE','Yemen'),('ZM','Zambia'),('ZW','Zimbabwe');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `favorite_movies`
--

DROP TABLE IF EXISTS `favorite_movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `favorite_movies` (
  `user_id` bigint unsigned NOT NULL,
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  KEY `favorite_movies_user_id_index` (`user_id`),
  KEY `favorite_movies_content_id_index` (`content_id`),
  CONSTRAINT `favorite_movies_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`slug`),
  CONSTRAINT `favorite_movies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `favorite_movies`
--

LOCK TABLES `favorite_movies` WRITE;
/*!40000 ALTER TABLE `favorite_movies` DISABLE KEYS */;
INSERT INTO `favorite_movies` VALUES (1,'inception'),(2,'end-game');
/*!40000 ALTER TABLE `favorite_movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `friends` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('new','accepted','rejected','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `requester` bigint unsigned NOT NULL,
  `requested` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `friends_requester_foreign` (`requester`),
  KEY `friends_requested_foreign` (`requested`),
  CONSTRAINT `friends_requested_foreign` FOREIGN KEY (`requested`) REFERENCES `users` (`id`),
  CONSTRAINT `friends_requester_foreign` FOREIGN KEY (`requester`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,'accepted',1,2),(2,'rejected',3,4);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Action'),(2,'Adventure'),(3,'Comedy'),(4,'Crime'),(5,'Drama'),(6,'Fantasy'),(7,'Horror'),(8,'Mystery'),(9,'Political'),(10,'Romance'),(11,'Thriller'),(12,'Animation'),(13,'sci-fi');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `user_id` bigint unsigned NOT NULL,
  `comment_id` bigint unsigned NOT NULL,
  KEY `likes_user_id_index` (`user_id`),
  KEY `likes_comment_id_index` (`comment_id`),
  CONSTRAINT `likes_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,2),(3,4);
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2021_02_01_093004_create_countries_table',1),(3,'2021_02_02_091407_create_profiles_table',1),(4,'2021_02_03_201112_create_friends_table',1),(5,'2021_02_06_203010_create_contents_table',1),(6,'2021_02_07_201046_create_comments_table',1),(7,'2021_02_07_201119_create_ratings_table',1),(8,'2021_02_16_091909_create_genres_table',1),(9,'2021_02_16_092017_create_profile_genres_table',1),(10,'2021_02_16_093815_create_content_genres_table',1),(11,'2021_02_16_094811_create_favorite_movies_table',1),(12,'2021_02_16_095521_create_likes_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_genres`
--

DROP TABLE IF EXISTS `profile_genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile_genres` (
  `profile_id` bigint unsigned NOT NULL,
  `genre_id` bigint unsigned NOT NULL,
  KEY `profile_genres_profile_id_index` (`profile_id`),
  KEY `profile_genres_genre_id_index` (`genre_id`),
  CONSTRAINT `profile_genres_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`),
  CONSTRAINT `profile_genres_profile_id_foreign` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_genres`
--

LOCK TABLES `profile_genres` WRITE;
/*!40000 ALTER TABLE `profile_genres` DISABLE KEYS */;
INSERT INTO `profile_genres` VALUES (1,2),(1,12),(1,13),(2,13),(3,5),(3,6),(3,1),(4,2),(4,4);
/*!40000 ALTER TABLE `profile_genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profiles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profiles_country_id_foreign` (`country_id`),
  CONSTRAINT `profiles_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`code`),
  CONSTRAINT `profiles_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'hadi',25,'male','FI','2007-12-31 18:30:01'),(2,'elon',49,'male','US','2007-12-31 18:30:01'),(3,'tony stark',55,'male','US','2007-12-31 18:30:01'),(4,'jon snow',35,'male','CA','2007-12-31 18:30:01');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ratings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `value` int unsigned NOT NULL,
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_user_id_foreign` (`user_id`),
  KEY `ratings_content_id_foreign` (`content_id`),
  CONSTRAINT `ratings_content_id_foreign` FOREIGN KEY (`content_id`) REFERENCES `contents` (`slug`),
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,5,'infinity-war',1),(2,4,'inception',2),(3,5,'the-dark-knight',3),(4,4,'forrest -gump',4),(5,3,'12-angry-men ',4);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'hadimir22@gmail.com','password',NULL,'2007-12-31 18:30:01',NULL),(2,'elonmusk@tesla.com','tothemoon',NULL,'2008-01-01 23:30:01',NULL),(3,'tony@stark.com','ironman',NULL,'2020-02-08 19:30:10',NULL),(4,'jon@snow.com','kinginthenorth',NULL,'2020-02-08 19:30:10',NULL);
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

-- Dump completed on 2021-03-02 15:25:38
