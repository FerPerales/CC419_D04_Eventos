SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `EventosHackerGarage` ;
CREATE SCHEMA IF NOT EXISTS `EventosHackerGarage` DEFAULT CHARACTER SET utf8 ;
USE `EventosHackerGarage` ;

-- -----------------------------------------------------
-- Table `EventosHackerGarage`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `EventosHackerGarage`.`categoria` (
  `idcategoria` INT NOT NULL ,
  `categoria` VARCHAR(45) NOT NULL ,
  `color` VARCHAR(8) NULL ,
  PRIMARY KEY (`idcategoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `EventosHackerGarage`.`usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `EventosHackerGarage`.`usuario` (
  `twitter` INT NOT NULL ,
  `username` VARCHAR(25) NULL ,
  `token_twitter` VARCHAR(50) NOT NULL ,
  `access_token_s` VARCHAR(45) NULL ,
  `admin` INT NOT NULL ,
  PRIMARY KEY (`twitter`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `EventosHackerGarage`.`evento`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `EventosHackerGarage`.`evento` (
  `idevento` INT NOT NULL ,
  `creadoPor` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `rutaFlyer` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(45) NOT NULL ,
  `precio` INT NOT NULL ,
  `capacidad` INT NOT NULL ,
  `fechaEvento` DATE NOT NULL ,
  `fechaCreacion` DATE NOT NULL ,
  `status` VARCHAR(15) NOT NULL ,
  `categoria` INT NOT NULL ,
  `motivo` VARCHAR(100) NULL ,
  PRIMARY KEY (`idevento`) ,
  CONSTRAINT `creadoPor`
    FOREIGN KEY (`creadoPor` )
    REFERENCES `EventosHackerGarage`.`usuario` (`twitter` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `categoria`
    FOREIGN KEY (`categoria` )
    REFERENCES `EventosHackerGarage`.`categoria` (`idcategoria` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `creadoPor` ON `EventosHackerGarage`.`evento` (`creadoPor` ASC) ;

CREATE INDEX `categoria` ON `EventosHackerGarage`.`evento` (`categoria` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `EventosHackerGarage`.`categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `EventosHackerGarage`;
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (1, 'curso/taller', '#FF0000');
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (2, 'conferencia', '#00FFFF');
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (3, 'convivencia', '#66FF00');
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (4, 'junta de comunidad', '#FFFF33');
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (5, 'torneo', '#0000FF');
INSERT INTO `EventosHackerGarage`.`categoria` (`idcategoria`, `categoria`, `color`) VALUES (6, 'hackaton', '#00FF00');

COMMIT;
