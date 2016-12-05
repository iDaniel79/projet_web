-- MySQL Script generated by MySQL Workbench
-- 12/05/16 21:01:48
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_formulaires
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_formulaires` ;

-- -----------------------------------------------------
-- Schema db_formulaires
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_formulaires` DEFAULT CHARACTER SET utf8 ;
USE `db_formulaires` ;

-- -----------------------------------------------------
-- Table `db_formulaires`.`ufs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`ufs` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`ufs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `code` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`tokens` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`tokens` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `date_creation` DATE NULL DEFAULT NULL,
  `date_fin` DATE NULL DEFAULT NULL,
  `statut` BIT(1) NULL DEFAULT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `ufs_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tokens_ufs1_idx` (`ufs_id` ASC),
  CONSTRAINT `fk_tokens_ufs1`
    FOREIGN KEY (`ufs_id`)
    REFERENCES `db_formulaires`.`ufs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`classrooms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`classrooms` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`classrooms` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`users` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL DEFAULT NULL,
  `firstname` VARCHAR(45) NULL DEFAULT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `birthdate` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL DEFAULT NULL,
  `mobile` VARCHAR(45) NULL DEFAULT NULL,
  `street` VARCHAR(45) NULL DEFAULT NULL,
  `number` VARCHAR(45) NULL DEFAULT NULL,
  `city` VARCHAR(45) NULL,
  `postal_code` VARCHAR(8) NULL,
  `country` VARCHAR(45) NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 0,
  `create` DATETIME NULL,
  `classrooms_id` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_users_classrooms1_idx` (`classrooms_id` ASC),
  CONSTRAINT `fk_users_classrooms1`
    FOREIGN KEY (`classrooms_id`)
    REFERENCES `db_formulaires`.`classrooms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`formulaires`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`formulaires` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`formulaires` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `version` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  `titre_1` TEXT(200) NULL,
  `titre_2` TEXT(200) NULL,
  `titre_3` TEXT(200) NULL,
  `titre_4` TEXT(200) NULL,
  `titre_5` TEXT(200) NULL,
  `titre_6` TEXT(200) NULL,
  `titre_7` TEXT(200) NULL,
  `token_length` INT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`formreturns`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`formreturns` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`formreturns` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `create` DATETIME NULL,
  `commentaire_1` TEXT(400) NULL,
  `evaluation_1` TINYINT NULL,
  `commentaire_2` TEXT(400) NULL,
  `evaluation_2` TINYINT NULL,
  `commentaire_3` TEXT(400) NULL,
  `evaluation_3` TINYINT NULL,
  `commentaire_4` TEXT(400) NULL,
  `evaluation_4` TINYINT NULL,
  `commentaire_5` TEXT(400) NULL,
  `evaluation_5` TINYINT NULL,
  `commentaire_6` TEXT(400) NULL,
  `evaluation_6` TINYINT NULL,
  `commentaire_7` TEXT(400) NULL,
  `evaluation_7` TINYINT NULL,
  `ufs_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_formreturns_ufs1_idx` (`ufs_id` ASC),
  CONSTRAINT `fk_formreturns_ufs1`
    FOREIGN KEY (`ufs_id`)
    REFERENCES `db_formulaires`.`ufs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`roles` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`zones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`zones` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`zones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `path` VARCHAR(225) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`roles_zones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`roles_zones` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`roles_zones` (
  `role_id` INT NOT NULL,
  `zone_id` INT NOT NULL,
  INDEX `fk_roles_has_zones_zones1_idx` (`zone_id` ASC),
  INDEX `fk_roles_has_zones_roles1_idx` (`role_id` ASC),
  CONSTRAINT `fk_roles_has_zones_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_formulaires`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_zones_zones1`
    FOREIGN KEY (`zone_id`)
    REFERENCES `db_formulaires`.`zones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_formulaires`.`users_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`users_roles` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`users_roles` (
  `user_id` INT(11) NOT NULL,
  `role_id` INT NOT NULL,
  INDEX `fk_users_has_roles_roles1_idx` (`role_id` ASC),
  INDEX `fk_users_has_roles_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_roles_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_formulaires`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_formulaires`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`users_ufs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`users_ufs` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`users_ufs` (
  `user_id` INT(11) NOT NULL,
  `uf_id` INT(11) NOT NULL,
  INDEX `fk_users_has_ufs_ufs1_idx` (`uf_id` ASC),
  INDEX `fk_users_has_ufs_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_ufs_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_formulaires`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_ufs_ufs1`
    FOREIGN KEY (`uf_id`)
    REFERENCES `db_formulaires`.`ufs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
