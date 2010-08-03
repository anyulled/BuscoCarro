SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
DROP SCHEMA IF EXISTS `buscocarro` ;
CREATE SCHEMA IF NOT EXISTS `buscocarro` DEFAULT CHARACTER SET latin1 ;

-- -----------------------------------------------------
-- Table `buscocarro`.`marcas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`marcas` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(100) NOT NULL DEFAULT 0 ,
  `urlImagen` VARCHAR(200) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
AUTO_INCREMENT = 60
DEFAULT CHARACTER SET = latin1
COMMENT = 'Marcas';


-- -----------------------------------------------------
-- Table `buscocarro`.`modelos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`modelos` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`modelos` (
  `idmodelos` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `idmarcas` INT NULL ,
  PRIMARY KEY (`idmodelos`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`Estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`Estado` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`Estado` (
  `idEstado` INT NOT NULL ,
  `Estado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idEstado`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`ciudad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`ciudad` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`ciudad` (
  `idciudad` INT NOT NULL ,
  `ciudad` VARCHAR(45) NOT NULL ,
  `Estado_idEstado` INT NOT NULL ,
  PRIMARY KEY (`idciudad`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`usuarios` (
  `idusuarios` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `fechacreacion` DATE NOT NULL DEFAULT '1000-01-01' ,
  `cedula-rif` VARCHAR(45) NOT NULL ,
  `telefono1` VARCHAR(45) NOT NULL ,
  `telefono2` VARCHAR(45) NULL ,
  `direccion` VARCHAR(200) NOT NULL ,
  `Estado_idEstado` INT NOT NULL ,
  `ciudad_idciudad` INT NOT NULL ,
  PRIMARY KEY (`idusuarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`tipovehiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`tipovehiculo` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`tipovehiculo` (
  `idtipovehiculo` INT NOT NULL ,
  `tipovehiculo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idtipovehiculo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`modelovehiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`modelovehiculo` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`modelovehiculo` (
  `idmodelovehiculo` INT NOT NULL ,
  `modelovehiculo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idmodelovehiculo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`transmisionvehiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`transmisionvehiculo` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`transmisionvehiculo` (
  `idtransmisionvehiculo` INT NOT NULL ,
  `transmisionvehiculo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idtransmisionvehiculo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`traccionvehiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`traccionvehiculo` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`traccionvehiculo` (
  `idtraccionvehiculo` INT NOT NULL ,
  `traccionvehiculo` VARCHAR(45) NULL ,
  PRIMARY KEY (`idtraccionvehiculo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`direccionVehiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`direccionVehiculo` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`direccionVehiculo` (
  `iddireccionVehiculo` INT NOT NULL ,
  `direccionVehiculo` VARCHAR(45) NULL ,
  PRIMARY KEY (`iddireccionVehiculo`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`carros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`carros` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`carros` (
  `idCarro` INT NOT NULL ,
  `idMarca` INT NULL ,
  `idModelo` INT NULL ,
  `anio` INT NULL ,
  `transmision` INT NULL ,
  `km` VARCHAR(45) NULL ,
  `tipoVehiculo` INT NULL ,
  `modeloVehiculo` INT NULL ,
  `version` VARCHAR(45) NULL ,
  `color` VARCHAR(45) NULL ,
  `placa` VARCHAR(45) NULL ,
  `motor` VARCHAR(45) NULL ,
  `cilindros` VARCHAR(45) NULL ,
  `traccion` VARCHAR(45) NULL ,
  `vidriosAhumados` TINYINT(1)  NULL ,
  `tapizado` TINYINT(1)  NULL ,
  `airbag` TINYINT(1)  NULL ,
  `frenosAbs` TINYINT(1)  NULL ,
  `aireAcondicionado` TINYINT(1)  NULL ,
  `estereo` TINYINT(1)  NULL ,
  `direccionVehiculo` INT NULL ,
  `precioVehiculo` INT NULL ,
  `negociable` TINYINT(1)  NULL ,
  PRIMARY KEY (`idCarro`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`usuarios_has_carros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`usuarios_has_carros` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`usuarios_has_carros` (
  `usuarios_idusuarios` INT NOT NULL ,
  `carros_idcarros` INT NOT NULL ,
  `status` TINYINT(1)  NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`usuarios_idusuarios`, `carros_idcarros`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`tipoimagen`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`tipoimagen` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`tipoimagen` (
  `idtipoimagen` INT NOT NULL ,
  `tipoimagen` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idtipoimagen`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`ImagenesCarros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`ImagenesCarros` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`ImagenesCarros` (
  `idImagenesCarros` INT NOT NULL ,
  `urlImagen` VARCHAR(1000) NOT NULL ,
  `titulo` VARCHAR(60) NOT NULL ,
  `tipoimagen_idtipoimagen` INT NOT NULL ,
  PRIMARY KEY (`idImagenesCarros`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`carros_has_ImagenesCarros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`carros_has_ImagenesCarros` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`carros_has_ImagenesCarros` (
  `carros_idCarro` INT NOT NULL ,
  `ImagenesCarros_idImagenesCarros` INT NOT NULL ,
  PRIMARY KEY (`carros_idCarro`, `ImagenesCarros_idImagenesCarros`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`publicaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`publicaciones` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`publicaciones` (
  `idpublicaciones` INT NOT NULL ,
  `titulo` VARCHAR(140) NOT NULL ,
  `urlDestino` VARCHAR(1000) NOT NULL ,
  `urlImagen` VARCHAR(1000) NOT NULL ,
  `vecesVisto` INT NULL DEFAULT 0 ,
  `vecesClick` INT NULL DEFAULT 0 ,
  PRIMARY KEY (`idpublicaciones`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`servicio` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`servicio` (
  `idservicio` INT NOT NULL ,
  `servicio` VARCHAR(45) NULL ,
  PRIMARY KEY (`idservicio`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`local`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`local` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`local` (
  `idlocal` INT NOT NULL ,
  `Nombre` VARCHAR(200) NOT NULL ,
  `descripcion` VARCHAR(300) NOT NULL ,
  `localcol` VARCHAR(45) NULL ,
  `Estado_idEstado` INT NOT NULL ,
  `ciudad_idciudad` INT NOT NULL ,
  `servicio_idservicio` INT NOT NULL ,
  `vinculo1` VARCHAR(100) NULL ,
  `vinculo2` VARCHAR(100) NULL ,
  `vinculo3` VARCHAR(100) NULL ,
  `vinculo4` VARCHAR(100) NULL ,
  `HTML1` BLOB NULL ,
  `HTML2` BLOB NULL ,
  `HTML3` BLOB NULL ,
  `HTML4` BLOB NULL ,
  `localcol1` VARCHAR(45) NULL ,
  `direccion` VARCHAR(500) NULL ,
  `telefono1` VARCHAR(40) NULL ,
  `telefono2` VARCHAR(40) NULL ,
  `fax1` VARCHAR(40) NULL ,
  `email` VARCHAR(200) NULL ,
  `web` VARCHAR(200) NULL ,
  PRIMARY KEY (`idlocal`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`usuarios_has_local`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`usuarios_has_local` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`usuarios_has_local` (
  `usuarios_idusuarios` INT NOT NULL ,
  `local_idlocal` INT NOT NULL ,
  `status` TINYINT(1)  NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`usuarios_idusuarios`, `local_idlocal`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`concesionarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`concesionarios` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`concesionarios` (
  `idconcesionarios` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(200) NOT NULL ,
  `productos y servicios` VARCHAR(500) NULL ,
  `contacto` VARCHAR(500) NULL ,
  `direccion` VARCHAR(200) NULL ,
  `Estado_idEstado` INT NOT NULL ,
  `ciudad_idciudad` INT NOT NULL ,
  PRIMARY KEY (`idconcesionarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`usuarios_has_concesionarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`usuarios_has_concesionarios` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`usuarios_has_concesionarios` (
  `usuarios_idusuarios` INT NOT NULL ,
  `concesionarios_idconcesionarios` INT NOT NULL ,
  `status` TINYINT(1)  NULL DEFAULT 0 ,
  PRIMARY KEY (`usuarios_idusuarios`, `concesionarios_idconcesionarios`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscocarro`.`concesionarios_has_carros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `buscocarro`.`concesionarios_has_carros` ;

CREATE  TABLE IF NOT EXISTS `buscocarro`.`concesionarios_has_carros` (
  `concesionarios_idconcesionarios` INT NOT NULL ,
  `carros_idCarro` INT NOT NULL ,
  PRIMARY KEY (`concesionarios_idconcesionarios`, `carros_idCarro`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
