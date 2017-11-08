# MySQL-Front 5.0  (Build 1.107)

/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE */;
/*!40101 SET SQL_MODE='' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES */;
/*!40103 SET SQL_NOTES='ON' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;


# Host: localhost    Database: reservasala
# ------------------------------------------------------
# Server version 5.5.27

CREATE DATABASE `reservasala` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `reservasala`;

#
# Table structure for table reservas
#

CREATE TABLE `reservas` (
  `id_reserva` int(6) NOT NULL AUTO_INCREMENT,
  `id_sala` int(6) DEFAULT NULL,
  `data` varchar(17) DEFAULT NULL,
  `hora_inicial` varchar(10) DEFAULT NULL,
  `hora_final` varchar(10) DEFAULT NULL,
  `disponivel` char(1) DEFAULT NULL,
  `id_usuario` int(4) DEFAULT NULL,
  PRIMARY KEY (`id_reserva`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table reservas
#
LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;

/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table salas
#

CREATE TABLE `salas` (
  `id_sala` int(6) NOT NULL AUTO_INCREMENT,
  `sala` int(6) DEFAULT NULL,
  `nome_sala` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Dumping data for table salas
#
LOCK TABLES `salas` WRITE;
/*!40000 ALTER TABLE `salas` DISABLE KEYS */;

/*!40000 ALTER TABLE `salas` ENABLE KEYS */;
UNLOCK TABLES;

#
# Table structure for table usuarios
#

CREATE TABLE `usuarios` (
  `id_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(10) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `senha` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Dumping data for table usuarios
#
LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;

INSERT INTO `usuarios` VALUES (1,'Admin','Administrador','123');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
