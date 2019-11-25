CREATE TABLE `itc`.`serv_folios` (
    `id` INT NOT NULL AUTO_INCREMENT,
  `despacho` INT NULL,
  `falla` INT NULL,
  `cluster` INT NULL,
  `inicio` DATETIME NULL,
  `final` DATETIME NULL,
  `duracion` TIME NULL,
  `horas_efectivas` TIME NULL,
  `standby` TIME NULL,
  `motivo_standby` TEXT NULL,
  `script_cierre` VARCHAR(245) NULL,
  `observaciones` TEXT NULL,
  `dtto` INT NULL,
  `material` INT NULL,
  `coordenadas` VARCHAR(100) NULL,
  `cuadrilla` INT NULL,
  `comentarios` TEXT NULL,
  `tecnico` INT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `itc`.`cat_materiales` (
  `id_material` INT NOT NULL AUTO_INCREMENT,
  `nombre_material` VARCHAR(245) NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`id_material`));

CREATE TABLE `itc`.`cat_cluster` (
  `id_cluster` INT NOT NULL AUTO_INCREMENT,
  `cluster` VARCHAR(100) NULL,
  `direccion` VARCHAR(245) NULL,
  `descripcion` VARCHAR(245) NULL,
  PRIMARY KEY (`id_cluster`));

CREATE TABLE `itc`.`cat_motivos` (
  `id_motivos` INT NOT NULL AUTO_INCREMENT,
  `motivo` VARCHAR(245) NULL,
  `descripcion` VARCHAR(245) NULL,
  PRIMARY KEY (`id_motivos`));

CREATE TABLE `itc`.`cat_dtto` (
  `id_dtto` INT NOT NULL AUTO_INCREMENT,
  `dtto` VARCHAR(145) NULL,
  `descripcion` VARCHAR(245) NULL,
  PRIMARY KEY (`id_dtto`));

CREATE TABLE `itc`.`cat_despachos` (
  `id_despachos` INT NOT NULL AUTO_INCREMENT,
  `despacho` VARCHAR(145) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_despachos`));

CREATE TABLE `itc`.`cat_fallas` (
  `id_fallas` INT NOT NULL AUTO_INCREMENT,
  `tipo_falla` INT NULL,
  `falla` VARCHAR(245) NULL,
  `descripcion` VARCHAR(245) NULL,
  PRIMARY KEY (`id_fallas`));

CREATE TABLE `itc`.`cat_cuadrillas` (
  `id_cuadrillas` INT NOT NULL AUTO_INCREMENT,
  `identificador_cuadrilla` VARCHAR(145) NULL,
  `tecnico` INT NULL,
  PRIMARY KEY (`id_cuadrillas`));

CREATE TABLE `itc`.`cat_tecnicos` (
  `id_tecnicos` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(145) NULL,
  PRIMARY KEY (`id_tecnicos`));

CREATE TABLE `itc`.`serv_materiales` (
  `idserv_materiales` INT NOT NULL AUTO_INCREMENT,
  `folio` INT NULL,
  `material` INT NULL,
  `fecha_material` DATETIME NULL,
  `observaciones` TEXT NULL,
  PRIMARY KEY (`idserv_materiales`));

CREATE TABLE `itc`.`cat_tipo_fallas` (
  `id_tipo_fallas` INT NOT NULL AUTO_INCREMENT,
  `nombre_tipo_falla` VARCHAR(245) NULL,
  PRIMARY KEY (`id_tipo_fallas`));

