-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: lp3ipustaka
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1


--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;

CREATE TABLE `buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(45) DEFAULT NULL,
  `pengarang` varchar(45) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `telpon` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
);