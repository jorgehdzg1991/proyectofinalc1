/*
MySQL Backup
Source Server Version: 10.1.16
Source Database: db_proyectofinal
Date: 15/11/2016 19:16:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `almacenes`
-- ----------------------------
DROP TABLE IF EXISTS `almacenes`;
CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FK_almacenes_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_almacenes_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `categorias`
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FK_categorias_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_categorias_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `marcas`
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FK_marcas_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_marcas_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `movimientos`
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad` int(11) DEFAULT NULL,
  `observaciones` text,
  `tiposmovimientos_id` int(11) DEFAULT NULL,
  `productos_id` int(11) DEFAULT NULL,
  `almacenes_id` int(11) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_movimientos_tiposmovimientos` (`tiposmovimientos_id`),
  KEY `FK_movimientos_productos` (`productos_id`),
  KEY `FK_movimientos_almacenes` (`almacenes_id`),
  KEY `FK_movimientos_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_movimientos_almacenes` FOREIGN KEY (`almacenes_id`) REFERENCES `almacenes` (`id`),
  CONSTRAINT `FK_movimientos_productos` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `FK_movimientos_tiposmovimientos` FOREIGN KEY (`tiposmovimientos_id`) REFERENCES `tiposmovimientos` (`id`),
  CONSTRAINT `FK_movimientos_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `productos`
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` text,
  `categorias_id` int(11) DEFAULT NULL,
  `unidades_id` int(11) DEFAULT NULL,
  `marcas_id` int(11) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FK_productos_categorias` (`categorias_id`),
  KEY `FK_productos_unidades` (`unidades_id`),
  KEY `FK_productos_marcas` (`marcas_id`),
  KEY `FK_productos_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_productos_categorias` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`),
  CONSTRAINT `FK_productos_marcas` FOREIGN KEY (`marcas_id`) REFERENCES `marcas` (`id`),
  CONSTRAINT `FK_productos_unidades` FOREIGN KEY (`unidades_id`) REFERENCES `unidades` (`id`),
  CONSTRAINT `FK_productos_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tiposmovimientos`
-- ----------------------------
DROP TABLE IF EXISTS `tiposmovimientos`;
CREATE TABLE `tiposmovimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `unidades`
-- ----------------------------
DROP TABLE IF EXISTS `unidades`;
CREATE TABLE `unidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL,
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`),
  KEY `FK_unidades_usuarios` (`usuarios_id`),
  CONSTRAINT `FK_unidades_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `perfil` tinyint(4) DEFAULT NULL,
  `login` varchar(25) DEFAULT NULL,
  `passwd` varchar(32) DEFAULT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1','Jorge Hernández García','1','jorge','cc03e747a6afbbcbf8be7668acfebee5','2016-11-14 23:17:59',''), ('2','Florencia Quiroz','1','flor','098f6bcd4621d373cade4e832627b4f6','2016-11-15 19:16:39','');
