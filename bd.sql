CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;
-- -----------------------------------------------------
-- Table `mydb`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Rol` (
 `id` INT NOT NULL AUTO_INCREMENT,
 `nombre` VARCHAR(45) NULL,
 `descripcion` VARCHAR(255) NULL,
 `activo` SMALLINT(11) NULL,
 PRIMARY KEY (`id`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
 `id` INT(11) NOT NULL AUTO_INCREMENT,
 `nombres` VARCHAR(150) NULL,
 `apellidos` VARCHAR(150) NULL,
 `email` VARCHAR(150) NULL,
 `telefono` VARCHAR(100) NULL,
 `username` VARCHAR(45) NOT NULL,
 `password` VARCHAR(255) NOT NULL,
 `fecha_creacion` DATE NULL,
 `activo` SMALLINT(11) NULL,
 `Rol_id` INT NOT NULL,
 INDEX `fk_Usuario_Rol1_idx` (`Rol_id` ASC),
 PRIMARY KEY (`id`);
 
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Rol1` FOREIGN KEY (`Rol_id`) REFERENCES `Rol` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
