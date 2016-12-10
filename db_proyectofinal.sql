/*
MySQL Backup
Source Server Version: 10.1.16
Source Database: db_proyectofinal
Date: 10/12/2016 08:22:51
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `configuraciones`
-- ----------------------------
DROP TABLE IF EXISTS `configuraciones`;
CREATE TABLE `configuraciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temas_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_temas_configuraciones` (`temas_id`),
  CONSTRAINT `FK_temas_configuraciones` FOREIGN KEY (`temas_id`) REFERENCES `temas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `temas`
-- ----------------------------
DROP TABLE IF EXISTS `temas`;
CREATE TABLE `temas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `tiposmovimientos`
-- ----------------------------
DROP TABLE IF EXISTS `tiposmovimientos`;
CREATE TABLE `tiposmovimientos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `usuarios_id` int(11) DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `almacenes` VALUES ('1','Almacén 1','1','2016-11-28 20:34:39',''), ('2','Almacén 2','1','2016-11-28 20:34:19',''), ('3','Almacén 3','1','2016-11-28 20:34:32',''), ('4','Bodega Centro','1','2016-12-09 22:50:48',''), ('5','Bodega Sur','1','2016-12-09 23:03:36','');
INSERT INTO `categorias` VALUES ('1','Zapato formal','1','2016-11-24 23:34:54',''), ('2','Zapato casual','1','2016-11-24 23:35:03',''), ('3','Tenis para correr','1','2016-11-24 23:35:10',''), ('4','Tenis casual','1','2016-11-24 23:35:23',''), ('5','Tenis skate','1','2016-11-24 23:37:43',''), ('6','Tacones','1','2016-11-24 23:35:39',''), ('7','Valerinas','1','2016-11-24 23:35:47',''), ('8','Tachos de futbol','1','2016-12-09 23:02:10','\0'), ('9','Mocasin','1','2016-11-24 23:36:53',''), ('10','Bostoniano','1','2016-11-24 23:37:01',''), ('11','Bota insdustrial','1','2016-11-24 23:37:10',''), ('12','Bota casual','1','2016-11-24 23:37:18',''), ('13','Zapatillas de ballet','1','2016-11-26 02:16:55',''), ('14','Tachones de futbol americano','1','2016-12-09 22:48:51','\0'), ('15','Bota vaquera','1','2016-12-09 23:01:47','');
INSERT INTO `configuraciones` VALUES ('1','3');
INSERT INTO `marcas` VALUES ('1','Brantano','1','2016-11-24 23:39:01',''), ('2','Flexi','1','2016-11-24 23:39:11',''), ('3','EFE','1','2016-11-24 23:39:15',''), ('4','Capa de Ozono','1','2016-11-24 23:39:30',''), ('5','Fabián Arenas','1','2016-11-24 23:39:46',''), ('6','Aretina','1','2016-11-24 23:39:52',''), ('7','Nike','1','2016-11-24 23:44:37',''), ('8','Sperry','1','2016-12-09 22:50:29','\0'), ('9','Prada','1','2016-12-09 22:49:56',''), ('10','Gucci','1','2016-12-09 22:50:03',''), ('11','Converse','1','2016-12-09 22:50:17',''), ('12','Zara','1','2016-12-09 23:03:05','');
INSERT INTO `movimientos` VALUES ('1','10','Lo que sea','1','1','1','1','2016-12-03 11:59:58'), ('2','20','Lo que sea','1','2','2','1','2016-12-03 11:59:58'), ('3','15','Lo que sea','1','3','3','1','2016-12-03 11:59:58'), ('4','22','Lo que sea','1','4','1','1','2016-12-03 11:59:58'), ('5','43','Lo que sea','1','1','2','1','2016-12-03 11:59:59'), ('6','12','Lo que sea','1','2','3','1','2016-12-03 11:59:59'), ('7','9','Lo que sea','1','3','1','1','2016-12-03 11:59:59'), ('8','25','Lo que sea','1','4','2','1','2016-12-03 12:00:00'), ('9','1','','2','1','1','1','2016-12-07 20:08:17'), ('10','1','','2','1','1','1','2016-12-07 20:08:48'), ('11','10','Entran 10 pares al inventario','1','2','4','1','2016-12-09 22:51:41'), ('12','-5','Salen 5 pares del inventario','2','2','4','1','2016-12-09 22:52:24'), ('13','1','Al cliente no le gustó :(','3','2','4','1','2016-12-09 22:54:47'), ('14','-1','Se echó a perder un tenis','4','2','4','1','2016-12-09 22:55:22'), ('15','10','Entran 10 converse al inventario','1','5','5','1','2016-12-09 23:05:33'), ('16','-5','Salen 5 pares a tienda','2','5','5','1','2016-12-09 23:06:11'), ('17','1','No le gustaron al cliente :\'(','3','5','5','1','2016-12-09 23:06:42'), ('18','-1','Se estropeó un par','4','5','5','1','2016-12-09 23:07:12');
INSERT INTO `productos` VALUES ('1','Mocasin modelo 4F56 color chocolate','Mocasines casuales','2','1','5','1','2016-11-24 23:43:12',''), ('2','Tenis Nike Running modelo v8 color Blanco/Negro','Especiales para correr','1','1','7','1','2016-11-24 23:44:51',''), ('3','Bahamas color café','Una descripción','4','1','8','1','2016-11-26 00:18:10',''), ('4','Zapatilla de ballet rosa','KJDHFKJDHFKJHEL','13','1','3','1','2016-11-26 02:17:50',''), ('5','Converse blanco choclo','Converse clásicos en color blanco','4','1','11','1','2016-12-09 23:04:36','');
INSERT INTO `temas` VALUES ('1','Amarillo','assets/css/themes/amarillo.css'), ('2','Azul','assets/css/themes/azul.css'), ('3','Verde','assets/css/themes/verde.css');
INSERT INTO `tiposmovimientos` VALUES ('1','Entrada','+'), ('2','Salida','-'), ('3','Devolución','+'), ('4','Merma','-');
INSERT INTO `unidades` VALUES ('1','Par','par','1','2016-11-24 23:41:50',''), ('2','Pieza','pza','1','2016-12-09 22:49:13',''), ('3','Kilogramo','Kg','1','2016-12-09 22:49:24',''), ('4','Metro','m','1','2016-12-09 22:49:35',''), ('5','Litro','lt','1','2016-12-09 23:02:45','');
INSERT INTO `usuarios` VALUES ('1','Jorge Hernández García','1','jorge','cc03e747a6afbbcbf8be7668acfebee5','1','2016-11-24 22:56:55',''), ('2','Sleiman Elachkar Michell','1','soly','0192023a7bbd73250516f069df18b500','1','2016-11-26 02:18:46',''), ('3','Pedro López','1','pedro','cc03e747a6afbbcbf8be7668acfebee5','1','2016-12-09 22:47:46','\0'), ('4','Pedro López','2','pedro','cc03e747a6afbbcbf8be7668acfebee5','1','2016-12-09 23:01:17','\0');
