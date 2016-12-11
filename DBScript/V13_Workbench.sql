-- MySQL Script generated by MySQL Workbench
-- 12/11/16 18:49:11
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
-- Table `db_formulaires`.`classrooms`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`classrooms` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`classrooms` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `code` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2803
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`ufs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`ufs` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`ufs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `code` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`formreturns`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`formreturns` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`formreturns` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `create` DATETIME NULL DEFAULT NULL,
  `commentaire_1` TEXT NULL DEFAULT NULL,
  `evaluation_1` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_2` TEXT NULL DEFAULT NULL,
  `evaluation_2` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_3` TEXT NULL DEFAULT NULL,
  `evaluation_3` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_4` TEXT NULL DEFAULT NULL,
  `evaluation_4` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_5` TEXT NULL DEFAULT NULL,
  `evaluation_5` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_6` TEXT NULL DEFAULT NULL,
  `evaluation_6` TINYINT(4) NULL DEFAULT NULL,
  `commentaire_7` TEXT NULL DEFAULT NULL,
  `evaluation_7` TINYINT(4) NULL DEFAULT NULL,
  `ufs_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_formreturns_ufs1_idx` (`ufs_id` ASC),
  CONSTRAINT `fk_formreturns_ufs1`
    FOREIGN KEY (`ufs_id`)
    REFERENCES `db_formulaires`.`ufs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`formulaires`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`formulaires` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`formulaires` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `version` VARCHAR(45) NULL DEFAULT NULL,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `titre_1` TEXT NULL DEFAULT NULL,
  `titre_2` TEXT NULL DEFAULT NULL,
  `titre_3` TEXT NULL DEFAULT NULL,
  `titre_4` TEXT NULL DEFAULT NULL,
  `titre_5` TEXT NULL DEFAULT NULL,
  `titre_6` TEXT NULL DEFAULT NULL,
  `titre_7` TEXT NULL DEFAULT NULL,
  `token_length` INT(11) NULL DEFAULT NULL,
  `scribe_check` TINYINT(1) NULL DEFAULT '0',
  `date_scribe_check` DATE NULL DEFAULT NULL,
  `directeur_check` TINYINT(1) NULL DEFAULT '0',
  `date_directeur_check` DATE NULL DEFAULT NULL,
  `verif_check` TINYINT(1) NULL DEFAULT '0',
  `date_verif_check` DATE NULL DEFAULT NULL,
  `error_check` TINYINT(1) NULL DEFAULT '0',
  `error_message` TEXT NULL DEFAULT NULL,
  `date_error` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`roles` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `role` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`zones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`zones` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`zones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `path` VARCHAR(225) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 17
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`roles_zones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`roles_zones` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`roles_zones` (
  `role_id` INT(11) NOT NULL,
  `zone_id` INT(11) NOT NULL,
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
  `formulaires_id` INT(11) NULL DEFAULT NULL,
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
  `city` VARCHAR(45) NULL DEFAULT NULL,
  `postal_code` VARCHAR(8) NULL DEFAULT NULL,
  `country` VARCHAR(45) NULL DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT '0',
  `create` DATETIME NULL DEFAULT NULL,
  `classrooms_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_users_classrooms1_idx` (`classrooms_id` ASC),
  CONSTRAINT `fk_users_classrooms1`
    FOREIGN KEY (`classrooms_id`)
    REFERENCES `db_formulaires`.`classrooms` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_formulaires`.`users_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_formulaires`.`users_roles` ;

CREATE TABLE IF NOT EXISTS `db_formulaires`.`users_roles` (
  `user_id` INT(11) NOT NULL,
  `role_id` INT(11) NOT NULL,
  INDEX `fk_users_has_roles_roles1_idx` (`role_id` ASC),
  INDEX `fk_users_has_roles_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_roles_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `db_formulaires`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_formulaires`.`users` (`id`)
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
  CONSTRAINT `fk_users_has_ufs_ufs1`
    FOREIGN KEY (`uf_id`)
    REFERENCES `db_formulaires`.`ufs` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_ufs_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `db_formulaires`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



-- -----------------------------------------
-- ------Insertion des données--------------
-- -----------------------------------------

INSERT INTO `classrooms` (`id`, `code`) VALUES
(2800, '1617A-BINFO-1343-1'),
(2802, '1617A-BCPTA-1343-1');

INSERT INTO `formreturns` (`id`, `create`, `commentaire_1`, `evaluation_1`, `commentaire_2`, `evaluation_2`, `commentaire_3`, `evaluation_3`, `commentaire_4`, `evaluation_4`, `commentaire_5`, `evaluation_5`, `commentaire_6`, `evaluation_6`, `commentaire_7`, `evaluation_7`, `ufs_id`) VALUES
(1, '2016-11-30 19:20:00', 'Ceci est mon premier commentaire', 4, 'Ceci est mon second commentaire', 3, 'Ceci est mon troisieme commentaire', 4, 'Ceci est mon quatrième commentaire', 3, 'Ceci est mon cinquième commentaire', 2, 'Ceci est mon sixième commentaire', 3, 'Ceci est mon septième commentaire', 3, 2),
(2, '2016-11-30 19:21:00', 'Premier Commentaire', 4, 'Deuxième Commentaire', 3, 'Troisième Commentaire', 5, 'Quatrième Commentaire', 1, 'Cinquième Commentaire', 2, 'Sixième Commentaire', 3, 'Septième Commentaire', 3, 2);

INSERT INTO `formulaires` (`id`, `version`, `name`, `titre_1`, `titre_2`, `titre_3`, `titre_4`, `titre_5`, `titre_6`, `titre_7`, `token_length`, `scribe_check`, `date_scribe_check`, `directeur_check`, `date_directeur_check`, `verif_check`, `date_verif_check`, `error_check`, `error_message`, `date_error`) VALUES
(1, 'v1', 'Formulaire1', 'La mesure dans laquelle le but du cours est atteint', 'La mesure dans laquelle les exigences et attentes définies sont rencontrées', 'Matières : Le contenu du cours', 'Main d\'oeuvre : le chargé de cours', 'Méthodes utilisées', 'Moyens disponibles et utilisés', 'Milieu : horaire,école,local de classe, le groupe,...', NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, NULL);

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Eleve'),
(3, 'Scribe'),
(4, 'Direction'),
(5, 'Professeur'),
(6, 'Secrétaire'),
(7, 'Vérificateur');

INSERT INTO `roles_zones` (`role_id`, `zone_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(7, 2),
(1, 7),
(1, 8),
(3, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(4, 1),
(6, 1),
(3, 2),
(4, 2),
(4, 3),
(6, 3),
(4, 6),
(6, 6),
(4, 7),
(6, 7),
(4, 12),
(6, 12),
(1, 15),
(4, 15),
(7, 15),
(1, 16),
(6, 16);

INSERT INTO `ufs` (`id`, `name`, `code`) VALUES
(1, 'Web', 'UF1'),
(2, 'Reseaux', 'UF2');

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `name`, `birthdate`, `phone`, `mobile`, `street`, `number`, `city`, `postal_code`, `country`, `active`, `create`, `classrooms_id`) VALUES
(3, 'admin@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 09:34:00', 2800),
(4, 'eleve@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:46:00', 2800),
(5, 'secretaire@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:47:00', 2800),
(6, 'professeur@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:48:00', 2800),
(7, 'direction@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:50:00', 2800),
(8, 'scribe@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:50:00', 2800),
(9, 'verificateur@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:53:00', 2800);


INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(3, 1),
(4, 2),
(5, 6),
(6, 5),
(7, 4),
(8, 3),
(9, 7);


INSERT INTO `users_ufs` (`user_id`, `uf_id`) VALUES
(4, 1);

INSERT INTO `zones` (`id`, `name`, `path`) VALUES
(1, 'Utilisateurs', '/Users/'),
(2, 'Formulaires', '/Formulaires/'),
(3, 'Retour de formulaires', '/Formreturns/'),
(4, 'Zones', '/Zones/'),
(5, 'Roles', '/Roles/'),
(6, 'Classes', '/Classrooms/'),
(7, 'Ajout d\'utilisateur', '/Users/add'),
(8, 'Créer un nouveau formulaire', '/Formulaires/add'),
(9, 'Remplir un formulaire', '/Formreturns/add'),
(10, 'Ajouter une zone', '/Zones/add'),
(11, 'Ajouter un rôle', '/Roles/add'),
(12, 'Ajouter une classe', '/Classrooms/add'),
(15, 'Rapport de formulaires', '/Formreturns/rapport'),
(16, 'Import élèves', '/Users/import');



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;