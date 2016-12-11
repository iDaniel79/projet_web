-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `db_formulaires`;
CREATE DATABASE `db_formulaires` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_formulaires`;

DROP TABLE IF EXISTS `classrooms`;
CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `classrooms` (`id`, `code`) VALUES
(2800,	'1617A-BINFO-1343-1'),
(2802,	'1617A-BCPTA-1343-1');

DROP TABLE IF EXISTS `formreturns`;
CREATE TABLE `formreturns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create` datetime DEFAULT NULL,
  `commentaire_1` text,
  `evaluation_1` tinyint(4) DEFAULT NULL,
  `commentaire_2` text,
  `evaluation_2` tinyint(4) DEFAULT NULL,
  `commentaire_3` text,
  `evaluation_3` tinyint(4) DEFAULT NULL,
  `commentaire_4` text,
  `evaluation_4` tinyint(4) DEFAULT NULL,
  `commentaire_5` text,
  `evaluation_5` tinyint(4) DEFAULT NULL,
  `commentaire_6` text,
  `evaluation_6` tinyint(4) DEFAULT NULL,
  `commentaire_7` text,
  `evaluation_7` tinyint(4) DEFAULT NULL,
  `ufs_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_formreturns_ufs1_idx` (`ufs_id`),
  CONSTRAINT `fk_formreturns_ufs1` FOREIGN KEY (`ufs_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `formreturns` (`id`, `create`, `commentaire_1`, `evaluation_1`, `commentaire_2`, `evaluation_2`, `commentaire_3`, `evaluation_3`, `commentaire_4`, `evaluation_4`, `commentaire_5`, `evaluation_5`, `commentaire_6`, `evaluation_6`, `commentaire_7`, `evaluation_7`, `ufs_id`) VALUES
(1,	'2016-11-30 19:20:00',	'Ceci est mon premier commentaire',	4,	'Ceci est mon second commentaire',	3,	'Ceci est mon troisieme commentaire',	4,	'Ceci est mon quatrième commentaire',	3,	'Ceci est mon cinquième commentaire',	2,	'Ceci est mon sixième commentaire',	3,	'Ceci est mon septième commentaire',	3,	2),
(2,	'2016-11-30 19:21:00',	'Premier Commentaire',	4,	'Deuxième Commentaire',	3,	'Troisième Commentaire',	5,	'Quatrième Commentaire',	1,	'Cinquième Commentaire',	2,	'Sixième Commentaire',	3,	'Septième Commentaire',	3,	2);

DROP TABLE IF EXISTS `formulaires`;
CREATE TABLE `formulaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `titre_1` text,
  `titre_2` text,
  `titre_3` text,
  `titre_4` text,
  `titre_5` text,
  `titre_6` text,
  `titre_7` text,
  `token_length` int(11) DEFAULT NULL,
  `scribe_check` tinyint(1) DEFAULT '0',
  `date_scribe_check` date DEFAULT NULL,
  `directeur_check` tinyint(1) DEFAULT '0',
  `date_directeur_check` date DEFAULT NULL,
  `verif_check` tinyint(1) DEFAULT '0',
  `date_verif_check` date DEFAULT NULL,
  `error_check` tinyint(1) DEFAULT '0',
  `error_message` text,
   `date_error` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `formulaires` (`id`, `version`, `name`, `titre_1`, `titre_2`, `titre_3`, `titre_4`, `titre_5`, `titre_6`, `titre_7`, `token_length`, `scribe_check`, `date_scribe_check`, `directeur_check`, `date_directeur_check`, `verif_check`, `date_verif_check`, `error_check`, `error_message`) VALUES
(1,	'v1',	'Formulaire1',	'La mesure dans laquelle le but du cours est atteint',	'La mesure dans laquelle les exigences et attentes définies sont rencontrées',	'Matières : Le contenu du cours',	'Main d\'oeuvre : le chargé de cours',	'Méthodes utilisées',	'Moyens disponibles et utilisés',	'Milieu : horaire,école,local de classe, le groupe,...',	NULL,	0,	NULL,	0,	NULL,	0,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `role`) VALUES
(1,	'Admin'),
(2,	'Eleve'),
(3,	'Scribe'),
(4,	'Direction'),
(5,	'Professeur'),
(6,	'Secrétaire'),
(7,	'Vérificateur');

DROP TABLE IF EXISTS `roles_zones`;
CREATE TABLE `roles_zones` (
  `role_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  KEY `fk_roles_has_zones_zones1_idx` (`zone_id`),
  KEY `fk_roles_has_zones_roles1_idx` (`role_id`),
  CONSTRAINT `fk_roles_has_zones_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_zones_zones1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `roles_zones` (`role_id`, `zone_id`) VALUES
(1,	1),
(1,	2),
(1,	3),
(1,	4),
(1,	5),
(1,	6),
(7,	2),
(1,	7),
(1,	8),
(3,	8),
(1,	9),
(1,	10),
(1,	11),
(1,	12),
(1,	13),
(1,	14),
(4,	1),
(6,	1),
(3,	2),
(4,	2),
(4,	3),
(6,	3),
(4,	6),
(6,	6),
(4,	7),
(6,	7),
(4,	12),
(6,	12),
(4,	13),
(6,	13),
(4,	14),
(6,	14),
(1,	15),
(4,	15),
(7,	15),
(1,	16),
(6,	16);

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_creation` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` bit(1) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `ufs_id` int(11) NOT NULL,
  `formulaires_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tokens_ufs1_idx` (`ufs_id`),
  CONSTRAINT `fk_tokens_ufs1` FOREIGN KEY (`ufs_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `ufs`;
CREATE TABLE `ufs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ufs` (`id`, `name`, `code`) VALUES
(1,	'Web',	'UF1'),
(2,	'Reseaux',	'UF2');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `birthdate` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `street` varchar(45) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `create` datetime DEFAULT NULL,
  `classrooms_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_classrooms1_idx` (`classrooms_id`),
  CONSTRAINT `fk_users_classrooms1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `name`, `birthdate`, `phone`, `mobile`, `street`, `number`, `city`, `postal_code`, `country`, `active`, `create`, `classrooms_id`) VALUES
(3,	'admin@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 09:34:00',	2800),
(4,	'eleve@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:46:00',	2800),
(5,	'secretaire@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:47:00',	2800),
(6,	'professeur@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:48:00',	2800),
(7,	'direction@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:50:00',	2800),
(8,	'scribe@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:50:00',	2800),
(9,	'verificateur@projetweb2016.com',	'8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf',	'',	'',	'',	'',	'',	'',	'',	'',	'',	'',	1,	'2016-12-10 18:53:00',	2800);

DROP TABLE IF EXISTS `users_roles`;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `fk_users_has_roles_roles1_idx` (`role_id`),
  KEY `fk_users_has_roles_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_roles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(3,	1),
(4,	2),
(5,	6),
(6,	5),
(7,	4),
(8,	3),
(9,	7);

DROP TABLE IF EXISTS `users_ufs`;
CREATE TABLE `users_ufs` (
  `user_id` int(11) NOT NULL,
  `uf_id` int(11) NOT NULL,
  KEY `fk_users_has_ufs_ufs1_idx` (`uf_id`),
  KEY `fk_users_has_ufs_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_ufs_ufs1` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_ufs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_ufs` (`user_id`, `uf_id`) VALUES
(4,	1);

DROP TABLE IF EXISTS `zones`;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `path` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `zones` (`id`, `name`, `path`) VALUES
(1,	'Utilisateurs',	'/Users/'),
(2,	'Formulaires',	'/Formulaires/'),
(3,	'Retour de formulaires',	'/Formreturns/'),
(4,	'Zones',	'/Zones/'),
(5,	'Roles',	'/Roles/'),
(6,	'Classes',	'/Classrooms/'),
(7,	'Ajout d\'utilisateur',	'/Users/add'),
(8,	'Créer un nouveau formulaire',	'/Formulaires/add'),
(9,	'Remplir un formulaire',	'/Formreturns/add'),
(10,	'Ajouter une zone',	'/Zones/add'),
(11,	'Ajouter un rôle',	'/Roles/add'),
(12,	'Ajouter une classe',	'/Classrooms/add'),
(13,	'Sections',	'/Sections/'),
(14,	'Ajouter une section',	'/Sections/add'),
(15,	'Rapport de formulaires',	'/Formreturns/rapport'),
(16,	'Import élèves',	'/Users/import');

-- 2016-12-11 13:48:42
