SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE  IF NOT EXISTS hashtag_db CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE hashtag_db;

DROP TABLE IF EXISTS `tiporesponsable` ;
DROP TABLE IF EXISTS `titulo` ;
DROP TABLE IF EXISTS `docente` ;
DROP TABLE IF EXISTS `modalidad` ;
DROP TABLE IF EXISTS `gestionper` ;
DROP TABLE IF EXISTS `estudiante` ;
DROP TABLE IF EXISTS `sesion` ;
DROP TABLE IF EXISTS `area` ;
DROP TABLE IF EXISTS `carrera` ;
DROP TABLE IF EXISTS `estcarrera` ;
DROP TABLE IF EXISTS `proftesis` ;
DROP TABLE IF EXISTS `esttesis` ;
DROP TABLE IF EXISTS `profesional` ;
DROP TABLE IF EXISTS `tesis` ;
DROP TABLE IF EXISTS `tribunal` ;
DROP TABLE IF EXISTS `areasprofesional` ;
DROP TABLE IF EXISTS `areatesis` ;

CREATE  TABLE IF NOT EXISTS `tiporesponsable` (
  `id_tipo` INT NOT NULL ,
  `nombre_tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_tipo`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `titulo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `titulo` (
  `codigo` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`codigo`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `docente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `docente` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `carga_horaria` VARCHAR(45) NULL ,
  `telefono` VARCHAR(8) NULL ,
  `direccion` VARCHAR(100) NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `idDocente_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `modalidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `modalidad` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(1000) NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `gestionper`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gestionper` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `fecha_ini` DATE NULL ,
  `fecha_fin` DATE NULL ,
  `periodo` INT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `estudiante` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `cod_sis` INT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido_pat` VARCHAR(45) NULL ,
  `apellido_mat` VARCHAR(45) NULL ,
  `correo` VARCHAR(100) NULL,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `id_estudiante_UNIQUE` (`codigo` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `sesion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sesion` (
  `usuario` INT NOT NULL ,
  `correo` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NULL DEFAULT 'hashtag',
  `nivel` INT NOT NULL ,
  PRIMARY KEY (`correo`),
  UNIQUE INDEX `correo_UNIQUE` (`correo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `area`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `area` (
  `idarea` INT NOT NULL AUTO_INCREMENT ,
  `nombre_area` VARCHAR(1000)  NULL,
  `descripcion` VARCHAR(5000) NULL DEFAULT 'Descripcion no disponible' ,
  `id_subarea` INT NULL,
  PRIMARY KEY (`idArea`) ,
  INDEX `id_subarea_idx` (`id_subarea` ASC) ,
  UNIQUE INDEX `idArea_UNIQUE` (`idArea` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `carrera` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `anios_est` INT NOT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `estcarrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `estcarrera` (
  `cod_est` INT NOT NULL ,
  `cod_carrera` INT NOT NULL ,
  PRIMARY KEY (`cod_est`, `cod_carrera`) ,
  INDEX `cod_carrera_idx` (`cod_carrera` ASC) ,
  INDEX `cod_est_idx` (`cod_est` ASC) ,
  CONSTRAINT `cod_est`
    FOREIGN KEY (`cod_est` )
    REFERENCES `estudiante` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_carrera`
    FOREIGN KEY (`cod_carrera` )
    REFERENCES `carrera` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `proftesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `proftesis` (
  `cod_prof` INT NOT NULL ,
  `cod_tesis` INT NOT NULL ,
  `tipo_resp` INT NOT NULL,
  PRIMARY KEY (`cod_prof`, `cod_tesis`, `tipo_resp`) ,
  INDEX `cod_prof_idx` (`cod_prof` ASC) ,
  INDEX `cod_tesis_idx` (`cod_tesis` ASC) ,
  INDEX `tipo_resp_idx` (`tipo_resp` ASC) ,
  CONSTRAINT `tipo_resp`
    FOREIGN KEY (`tipo_resp` )
    REFERENCES `tiporesponsable` (`id_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `esttesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `esttesis` (
  `cod_alumno` INT NOT NULL ,
  `cod_tes` INT NOT NULL ,
  PRIMARY KEY (`cod_alumno`, `cod_tes`) ,
  INDEX `cod_tes_idx` (`cod_tes` ASC) ,
  INDEX `cod_alumno_idx` (`cod_alumno` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `profesional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `profesional` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido_paterno` VARCHAR(45) NULL ,
  `apellido_materno` VARCHAR(45) NULL ,
  `titulo` INT NOT NULL ,
  `cod_docente` INT NULL,
  `correo` VARCHAR(100) NULL,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `id_UNIQUE` (`codigo` ASC) ,
  INDEX `titulo_idx` (`titulo` ASC) ,
  UNIQUE INDEX `cod_docente_UNIQUE` (`cod_docente` ASC) ,
  CONSTRAINT `titulo`
    FOREIGN KEY (`titulo` )
    REFERENCES `titulo` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_docente`
    FOREIGN KEY (`cod_docente` )
    REFERENCES `docente` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tesis` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(500) NOT NULL ,
  `descripcion` VARCHAR(1000) NULL ,
  `estado` INT NOT NULL ,
  `dir_form` VARCHAR(45) NULL ,
  `fecha_registro` INT NULL ,
  `cod_modalidad` INT NOT NULL ,
  `carrera` INT NULL,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `idProyecto_UNIQUE` (`codigo` ASC) ,
  INDEX `cod_modalidad_idx` (`cod_modalidad` ASC) ,
  INDEX `carrera_idx` (`carrera` ASC),
  CONSTRAINT `cod_modalidad`
    FOREIGN KEY (`cod_modalidad` )
    REFERENCES `modalidad` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `carrera`
    FOREIGN KEY (`carrera` )
    REFERENCES `carrera` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `tribunal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tribunal` (
  `idTribunal` INT NOT NULL AUTO_INCREMENT ,
  `id_profesional1` INT NULL ,
  `id_profesional2` INT NULL ,
  `id_profesional3` INT NULL ,
  `id_tesis` INT NOT NULL ,
  `fecha_defensa` DATE NOT NULL ,
  `nro_hcc` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idTribunal`) ,
  INDEX `id_proyecto_idx` (`id_tesis` ASC) ,
  UNIQUE INDEX `id_proyecto_UNIQUE` (`id_tesis` ASC) ,
  UNIQUE INDEX `idTribunal_UNIQUE` (`idTribunal` ASC) ,
  INDEX `profesional1_idx` (`id_profesional1` ASC) ,
  INDEX `profesional2_idx` (`id_profesional2` ASC) ,
  INDEX `profesional3_idx` (`id_profesional3` ASC) ,
  CONSTRAINT `profesional1`
    FOREIGN KEY (`id_profesional1` )
    REFERENCES `profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_proyecto`
    FOREIGN KEY (`id_tesis` )
    REFERENCES `tesis` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional2`
    FOREIGN KEY (`id_profesional2` )
    REFERENCES `profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional3`
    FOREIGN KEY (`id_profesional3` )
    REFERENCES `profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `areasprofesional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `areasprofesional` (
  `id_profesional` INT NOT NULL ,
  `id_area` INT NOT NULL ,
  INDEX `area_idx` (`id_area` ASC) ,
  PRIMARY KEY (`id_profesional`, `id_area`) ,
  INDEX `profesional_idx` (`id_profesional` ASC) ,
  CONSTRAINT `area`
    FOREIGN KEY (`id_area` )
    REFERENCES `area` (`idArea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional`
    FOREIGN KEY (`id_profesional` )
    REFERENCES `profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `areatesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `areatesis` (
  `id_area` INT NOT NULL ,
  `id_tesis` INT NOT NULL ,
  INDEX `area_idx` (`id_area` ASC) ,
  INDEX `proyecto_idx` (`id_tesis` ASC) ,
  PRIMARY KEY (`id_tesis`, `id_area`))
ENGINE = InnoDB;

INSERT INTO `hashtag_db`.`sesion` (`usuario`, `correo`, `pass`, `nivel`) VALUES ('0', 'hashtag.tis2018@gmail.com', 'admin', '1');

INSERT INTO `hashtag_db`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('1', 'Trabajo Dirigido', 'Consiste en trabajos prácticos evaluados y supervisados en instituciones, empresas públicas o privadas, encargadas de proyectar o implementar obras para lo cual y sobre la base de un temario se proyecta, dirige o fiscaliza bajo la dirección de un supervisor o guía de la institución o empresa, también otro campo de acción es el de verificar las soluciones de problemas específicos, demostrando dominio amplio del tema y capacidad para resolver.');
INSERT INTO `hashtag_db`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('2', 'Proyecto de Grado', 'Es el trabajo de investigación, análisis y diseño de <b>objetos de fin social</b> y que cumple con exigencias de metodología cientifica con profundidad similar al de un proyecto de investigación (tesis).');
INSERT INTO `hashtag_db`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('3', 'Adscripcion', 'Se establece la Adscripción como la incorporación de estudiantes de la UMSS a la realización de actividades en los ámbitos académico, de investigación, interacción, y/o de gestión universitaria. La Adscripción consiste en la realización de un Trabajo Dirigido y/o una práctica profesional supervisada (internado) dentro de la Universidad Mayor de San Simón, que desarrollado dentro del marco de las disposiciones del presente reglamento, habilita al estudiante a presentar como Proyecto Final.<p> Para las Carreras de Informática y Sistemas, se plantea clasificar esta modalidad en dos:<br><ul><li><b>Adscripción a la Catedra,</b> si las actividades a realizar persiguen fines netamente académicos y de investigación enmarcadas en el proceso enseñanza-aprendizaje de las carreras de Informática y Sistemas.</li><li><b>Adscripción,</b> si las actividades a realizar no están enmarcadas en el ámbito de la Adscripción a la Cátedra.</li></ul>');
INSERT INTO `hashtag_db`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('4', 'Proyecto de investigacion', 'Es un trabajo de investigación, que cumple con exigencias de metodología científica, a objeto de conocer y dar respuestas a un problema, planteando alternativas aplicables o proponiendo soluciones prácticas y/o teóricas.');
INSERT INTO `hashtag_db`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('5', 'Excelencia', 'Es una modalidad en donde el estudiante obtiene su titulo directamente debido a su desempeno a lo largo de la carrera.');

INSERT INTO `hashtag_db`.`carrera` (`codigo`, `nombre`, `descripcion`, `anios_est`) VALUES ('1', 'Licenciatura en Ingenieria de Sistemas', '', '5');
INSERT INTO `hashtag_db`.`carrera` (`codigo`, `nombre`, `descripcion`, `anios_est`) VALUES ('2', 'Licenciatura en Ingenieria Informatica', '', '5');

INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('1', 'Lic.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('2', 'Ing.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('3', 'Msc.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('4', 'Msc. Lic.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('5', 'Msc. Ing.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('6', 'Doc.');
INSERT INTO `hashtag_db`.`titulo` (`codigo`, `nombre`) VALUES ('7', 'Prof.');

INSERT INTO `hashtag_db`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('1', 'Tutor');
INSERT INTO `hashtag_db`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('2', 'Tribunal');
INSERT INTO `hashtag_db`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('3', 'Tutor-Tribunal');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
