SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE DATABASE  IF NOT EXISTS tis /*!40100 DEFAULT CHARACTER SET latin1*/;
USE tis;

DROP TABLE IF EXISTS `TipoResponsable` ;
DROP TABLE IF EXISTS `EstCarrera` ;
DROP TABLE IF EXISTS `ProfTesis` ;
DROP TABLE IF EXISTS `EstTesis` ;
DROP TABLE IF EXISTS `Titulo` ;
DROP TABLE IF EXISTS `Docente` ;
DROP TABLE IF EXISTS `Profesional` ;
DROP TABLE IF EXISTS `Modalidad` ;
DROP TABLE IF EXISTS `GestionPer` ;
DROP TABLE IF EXISTS `Tesis` ;
DROP TABLE IF EXISTS `Tribunal` ;
DROP TABLE IF EXISTS `Estudiante` ;
DROP TABLE IF EXISTS `Sesion` ;
DROP TABLE IF EXISTS `Area` ;
DROP TABLE IF EXISTS `AreasProfesional` ;
DROP TABLE IF EXISTS `AreaTesis` ;
DROP TABLE IF EXISTS `Carrera` ;

CREATE  TABLE IF NOT EXISTS `TipoResponsable` (
  `id_tipo` INT NOT NULL ,
  `nombre_tipo` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id_tipo`) )
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `EstCarrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `EstCarrera` (
  `cod_est` INT NOT NULL ,
  `cod_carrera` INT NOT NULL ,
  PRIMARY KEY (`cod_est`, `cod_carrera`) ,
  INDEX `cod_carrera_idx` (`cod_carrera` ASC) ,
  INDEX `cod_est_idx` (`cod_est` ASC) ,
  CONSTRAINT `cod_est`
    FOREIGN KEY (`cod_est` )
    REFERENCES `Estudiante` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_carrera`
    FOREIGN KEY (`cod_carrera` )
    REFERENCES `Carrera` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ProfTesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `ProfTesis` (
  `cod_prof` INT NOT NULL ,
  `cod_tesis` INT NOT NULL ,
  `tipo_resp` INT NOT NULL,
  PRIMARY KEY (`cod_prof`, `cod_tesis`) ,
  INDEX `cod_prof_idx` (`cod_prof` ASC) ,
  INDEX `cod_tesis_idx` (`cod_tesis` ASC) ,
  CONSTRAINT `cod_prof`
    FOREIGN KEY (`cod_prof` )
    REFERENCES `Profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_tesis`
    FOREIGN KEY (`cod_tesis` )
    REFERENCES `Tesis` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `tipo_resp`
    FOREIGN KEY (`tipo_resp` )
    REFERENCES `TipoResponsable` (`id_tipo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `EstTesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `EstTesis` (
  `cod_alumno` INT NOT NULL ,
  `cod_tes` INT NOT NULL ,
  PRIMARY KEY (`cod_alumno`, `cod_tes`) ,
  INDEX `cod_tes_idx` (`cod_tes` ASC) ,
  INDEX `cod_alumno_idx` (`cod_alumno` ASC) ,
  CONSTRAINT `cod_alumno`
    FOREIGN KEY (`cod_alumno` )
    REFERENCES `Estudiante` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_tes`
    FOREIGN KEY (`cod_tes` )
    REFERENCES `Tesis` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Titulo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Titulo` (
  `codigo` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`codigo`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Docente`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Docente` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `carga_horaria` VARCHAR(45) NULL ,
  `telefono` VARCHAR(8) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `ci` VARCHAR(45) NULL ,
  `dir_fot` VARCHAR(45) NULL ,
  `cod_tip` INT NULL ,
  `cod_cue` INT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `idDocente_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Profesional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Profesional` (
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
    REFERENCES `Titulo` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_docente`
    FOREIGN KEY (`cod_docente` )
    REFERENCES `Docente` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Modalidad`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Modalidad` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `descripcion` VARCHAR(1000) NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `GestionPer`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `GestionPer` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `fecha_ini` DATE NULL ,
  `fecha_fin` DATE NULL ,
  `periodo` INT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Tesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Tesis` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `codigo_tesis` VARCHAR(45) NULL ,
  `nombre` VARCHAR(450) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `estado` VARCHAR(45) NOT NULL ,
  `dir_form` VARCHAR(45) NULL ,
  `cod_ges_per_ini` INT NULL ,
  `cod_ges_per_fin` INT NULL ,
  `fecha_registro` INT NULL ,
  `cod_modalidad` INT NOT NULL ,
  `cod_emp` INT NULL ,
  `obj_gral` VARCHAR(200) NULL ,
  `carrera` INT NULL,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `idProyecto_UNIQUE` (`codigo` ASC) ,
  INDEX `cod_modalidad_idx` (`cod_modalidad` ASC) ,
  INDEX `cod_ges_per_ini_idx` (`cod_ges_per_ini` ASC) ,
  INDEX `cod_ges_per_fin_idx` (`cod_ges_per_fin` ASC) ,
  INDEX `carrera_idx` (`carrera` ASC),
  CONSTRAINT `cod_modalidad`
    FOREIGN KEY (`cod_modalidad` )
    REFERENCES `Modalidad` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_ges_per_ini`
    FOREIGN KEY (`cod_ges_per_ini` )
    REFERENCES `GestionPer` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `cod_ges_per_fin`
    FOREIGN KEY (`cod_ges_per_fin` )
    REFERENCES `GestionPer` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
CONSTRAINT `carrera`
    FOREIGN KEY (`carrera` )
    REFERENCES `Carrera` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Tribunal`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Tribunal` (
  `idTribunal` INT NOT NULL AUTO_INCREMENT ,
  `id_profesional1` INT NOT NULL ,
  `id_profesional2` INT NOT NULL ,
  `id_profesional3` INT NOT NULL ,
  `id_tesis` INT NOT NULL ,
  `fecha_defensa` DATE NOT NULL ,
  PRIMARY KEY (`idTribunal`) ,
  INDEX `id_proyecto_idx` (`id_tesis` ASC) ,
  UNIQUE INDEX `id_proyecto_UNIQUE` (`id_tesis` ASC) ,
  UNIQUE INDEX `idTribunal_UNIQUE` (`idTribunal` ASC) ,
  INDEX `profesional1_idx` (`id_profesional1` ASC) ,
  INDEX `profesional2_idx` (`id_profesional2` ASC) ,
  INDEX `profesional3_idx` (`id_profesional3` ASC) ,
  CONSTRAINT `profesional1`
    FOREIGN KEY (`id_profesional1` )
    REFERENCES `Profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_proyecto`
    FOREIGN KEY (`id_tesis` )
    REFERENCES `Tesis` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional2`
    FOREIGN KEY (`id_profesional2` )
    REFERENCES `Profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional3`
    FOREIGN KEY (`id_profesional3` )
    REFERENCES `Profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Estudiante`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Estudiante` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `cod_sis` INT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido_pat` VARCHAR(45) NULL ,
  `apellido_mat` VARCHAR(45) NULL ,
  `telefono` INT NULL ,
  `direccion` VARCHAR(45) NULL ,
  `cod_cue` VARCHAR(45) NULL ,
  `correo` VARCHAR(100) NULL,
  `ci` VARCHAR(45) NULL ,
  `dir_fot` INT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `id_estudiante_UNIQUE` (`codigo` ASC) ,
  UNIQUE INDEX `cod_sis_UNIQUE` (`cod_sis` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `baseDatosTis`.`Sesion`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Sesion` (
  `usuario` INT NOT NULL ,
  `correo` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(45) NULL DEFAULT 'hashtag',
  `nivel` INT NOT NULL ,
  PRIMARY KEY (`usuario`, `pass`, `nivel`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Area`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Area` (
  `idArea` INT NOT NULL AUTO_INCREMENT ,
  `nombre_area` VARCHAR(1000)  NULL,
  `descripcion` VARCHAR(1000) NULL DEFAULT 'Descripcion no disponible' ,
  `id_subarea` INT NULL,
  PRIMARY KEY (`idArea`) ,
  INDEX `id_subarea_idx` (`id_subarea` ASC) ,
  UNIQUE INDEX `idArea_UNIQUE` (`idArea` ASC) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `AreasProfesional`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `AreasProfesional` (
  `id_profesional` INT NOT NULL ,
  `id_area` INT NOT NULL ,
  INDEX `area_idx` (`id_area` ASC) ,
  PRIMARY KEY (`id_profesional`, `id_area`) ,
  INDEX `profesional_idx` (`id_profesional` ASC) ,
  CONSTRAINT `area`
    FOREIGN KEY (`id_area` )
    REFERENCES `Area` (`idArea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `profesional`
    FOREIGN KEY (`id_profesional` )
    REFERENCES `Profesional` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `AreaTesis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `AreaTesis` (
  `id_area` INT NOT NULL ,
  `id_tesis` INT NOT NULL ,
  INDEX `area_idx` (`id_area` ASC) ,
  INDEX `proyecto_idx` (`id_tesis` ASC) ,
  PRIMARY KEY (`id_tesis`, `id_area`) ,
  CONSTRAINT `area0`
    FOREIGN KEY (`id_area` )
    REFERENCES `Area` (`idArea` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `proyecto`
    FOREIGN KEY (`id_tesis` )
    REFERENCES `Tesis` (`codigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `Carrera`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Carrera` (
  `codigo` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(50) NOT NULL ,
  `descripcion` VARCHAR(200) NULL ,
  `anios_est` INT NOT NULL ,
  PRIMARY KEY (`codigo`) ,
  UNIQUE INDEX `codigo_UNIQUE` (`codigo` ASC) ,
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC) )
ENGINE = InnoDB;

INSERT INTO `tis`.`sesion` (`usuario`, `correo`, `pass`, `nivel`) VALUES ('0', 'jhojannjr@gmail.com', 'admin', '1');

INSERT INTO `tis`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('1', 'Trabajo Dirigido', 'Consiste en trabajos prácticos evaluados y supervisados en instituciones, empresas públicas o privadas, encargadas de proyectar o implementar obras para lo cual y sobre la base de un temario se proyecta, dirige o fiscaliza bajo la dirección de un supervisor o guía de la institución o empresa, también otro campo de acción es el de verificar las soluciones de problemas específicos, demostrando dominio amplio del tema y capacidad para resolver.');
INSERT INTO `tis`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('2', 'Proyecto de Grado', 'Es el trabajo de investigación, análisis y diseño de <b>objetos de fin social</b> y que cumple con exigencias de metodología cientifica con profundidad similar al de un proyecto de investigación (tesis).');
INSERT INTO `tis`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('3', 'Adscripcion', 'Se establece la Adscripción como la incorporación de estudiantes de la UMSS a la realización de actividades en los ámbitos académico, de investigación, interacción, y/o de gestión universitaria. La Adscripción consiste en la realización de un Trabajo Dirigido y/o una práctica profesional supervisada (internado) dentro de la Universidad Mayor de San Simón, que desarrollado dentro del marco de las disposiciones del presente reglamento, habilita al estudiante a presentar como Proyecto Final.<p> Para las Carreras de Informática y Sistemas, se plantea clasificar esta modalidad en dos:<br><ul><li><b>Adscripción a la Catedra,</b> si las actividades a realizar persiguen fines netamente académicos y de investigación enmarcadas en el proceso enseñanza-aprendizaje de las carreras de Informática y Sistemas.</li><li><b>Adscripción,</b> si las actividades a realizar no están enmarcadas en el ámbito de la Adscripción a la Cátedra.</li></ul>');
INSERT INTO `tis`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('4', 'Proyecto de investigacion', 'Es un trabajo de investigación, que cumple con exigencias de metodología científica, a objeto de conocer y dar respuestas a un problema, planteando alternativas aplicables o proponiendo soluciones prácticas y/o teóricas.');
INSERT INTO `tis`.`modalidad` (`codigo`, `nombre`, `descripcion`) VALUES ('5', 'Excelencia', 'Es una modalidad en donde el estudiante obtiene su titulo directamente debido a su desempeno a lo largo de la carrera.');

INSERT INTO `tis`.`carrera` (`codigo`, `nombre`, `descripcion`, `anios_est`) VALUES ('1', 'Licenciatura en Ingenieria de Sistemas', '', '5');
INSERT INTO `tis`.`carrera` (`codigo`, `nombre`, `descripcion`, `anios_est`) VALUES ('2', 'Licenciatura en Ingenieria Informatica', '', '5');

INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('1', 'Lic.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('2', 'Ing.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('3', 'Msc.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('4', 'Msc. Lic.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('5', 'Msc. Ing.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('6', 'Doc.');
INSERT INTO `tis`.`titulo` (`codigo`, `nombre`) VALUES ('7', 'Prof.');

INSERT INTO `tis`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('1', 'Tutor');
INSERT INTO `tis`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('2', 'Tribunal');
INSERT INTO `tis`.`tiporesponsable` (`id_tipo`, `nombre_tipo`) VALUES ('3', 'Tutor-Tribunal');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
