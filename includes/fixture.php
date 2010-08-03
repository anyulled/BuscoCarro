<?php
$consulta = <<<Dump
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
DROP DATABASE `buscocarro`;
CREATE DATABASE `buscocarro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `buscocarro`;
--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `urlImagen` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='Marcas' AUTO_INCREMENT=60 ;

--
-- Volcar la base de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `urlImagen`) VALUES
(1, 'acura', 'acura.gif'),
(2, 'alfa-romeo', 'alfa-romeo.gif'),
(3, 'audi', 'audi.gif'),
(4, 'bmw', 'bmw.gif'),
(5, 'buick', 'buick.gif'),
(6, 'byd', 'byd.gif'),
(7, 'cadillac', 'cadillac.gif'),
(8, 'chana', 'chana.gif'),
(9, 'chery', 'chery.gif'),
(10, 'chevrolet', 'chevrolet.gif'),
(11, 'chrysler', 'chrysler.gif'),
(12, 'citroen', 'citroen.gif'),
(13, 'corvette', 'corvette.gif'),
(14, 'daewoo', 'daewoo.gif'),
(15, 'dodge', 'dodge.gif'),
(16, 'ferrari', 'ferrari.gif'),
(17, 'fiat', 'fiat.jpg'),
(18, 'ford', 'ford.gif'),
(19, 'geely', 'geely.gif'),
(20, 'great-wall', 'great-wall.gif'),
(21, 'hafei', 'hafei.gif'),
(22, 'haima', 'haima.gif'),
(23, 'honda', 'honda.gif'),
(24, 'hummer', 'hummer.gif'),
(25, 'hyundai', 'hyundai.gif'),
(26, 'infinity', 'infinity.gif'),
(27, 'isuzu', 'isuzu.gif'),
(28, 'jaguar', 'jaguar.gif'),
(29, 'jeep', 'jeep.gif'),
(30, 'jmc', 'jmc.gif'),
(31, 'kia', 'kia.gif'),
(32, 'lada', 'lada.gif'),
(33, 'land-rover', 'land-rover.gif'),
(34, 'lexus', 'lexus.gif'),
(35, 'lifan', 'lifan.gif'),
(36, 'lincoln', 'lincoln.gif'),
(37, 'maserati', 'maserati.gif'),
(38, 'mazda', 'mazda.gif'),
(39, 'mercedes', 'mercedes.gif'),
(40, 'mercury', 'mercury.gif'),
(41, 'mini', 'mini.gif'),
(42, 'mitsubishi', 'mitsubishi.gif'),
(43, 'nissan', 'nissan.gif'),
(44, 'peugeot', 'peugeot.gif'),
(45, 'pontiac', 'pontiac.gif'),
(46, 'porsche', 'porsche.gif'),
(47, 'renault', 'renault.gif'),
(48, 'saic-wuling', 'saic-wuling.gif'),
(49, 'scion', 'scion.gif'),
(50, 'seat', 'seat.gif'),
(51, 'skoda', 'skoda.gif'),
(52, 'smart', 'smart.gif'),
(53, 'subaru', 'subaru.gif'),
(54, 'tata', 'tata.gif'),
(55, 'toyota', 'toyota.gif'),
(56, 'tyanye', 'tyanye.gif'),
(57, 'volkswagen', 'volkswagen.gif'),
(58, 'zhongxing', 'zhongxing.gif'),
(59, 'zotye', 'zotye');
Dump;

$resultado = $db->exec_query($consulta);
krumo::dump($resultado, $consulta);
?>