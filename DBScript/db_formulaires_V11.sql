-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 11 Décembre 2016 à 10:41
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_formulaires`
--
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




-- --------------------------------------------------------

--
-- Structure de la table `classrooms`
--
DROP TABLE IF EXISTS `db_formulaires`.`classrooms` ;
CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `classrooms`
--

INSERT INTO `classrooms` (`id`, `code`) VALUES
(2800, '1617A-BINFO-1343-1'),
(2802, '1617A-BCPTA-1343-1');

-- --------------------------------------------------------

--
-- Structure de la table `formreturns`
--
DROP TABLE IF EXISTS `db_formulaires`.`formreturns` ;

CREATE TABLE `formreturns` (
  `id` int(11) NOT NULL,
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
  `ufs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formreturns`
--

INSERT INTO `formreturns` (`id`, `create`, `commentaire_1`, `evaluation_1`, `commentaire_2`, `evaluation_2`, `commentaire_3`, `evaluation_3`, `commentaire_4`, `evaluation_4`, `commentaire_5`, `evaluation_5`, `commentaire_6`, `evaluation_6`, `commentaire_7`, `evaluation_7`, `ufs_id`) VALUES
(1, '2016-11-30 19:20:00', 'Ceci est mon premier commentaire', 4, 'Ceci est mon second commentaire', 3, 'Ceci est mon troisieme commentaire', 4, 'Ceci est mon quatrième commentaire', 3, 'Ceci est mon cinquième commentaire', 2, 'Ceci est mon sixième commentaire', 3, 'Ceci est mon septième commentaire', 3, 2),
(2, '2016-11-30 19:21:00', 'Premier Commentaire', 4, 'Deuxième Commentaire', 3, 'Troisième Commentaire', 5, 'Quatrième Commentaire', 1, 'Cinquième Commentaire', 2, 'Sixième Commentaire', 3, 'Septième Commentaire', 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `formulaires`
--
DROP TABLE IF EXISTS `db_formulaires`.`formulaires` ;
CREATE TABLE `formulaires` (
  `id` int(11) NOT NULL,
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
  `error_message` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formulaires`
--

INSERT INTO `formulaires` (`id`, `version`, `name`, `titre_1`, `titre_2`, `titre_3`, `titre_4`, `titre_5`, `titre_6`, `titre_7`, `token_length`, `scribe_check`, `date_scribe_check`, `directeur_check`, `date_directeur_check`, `verif_check`, `date_verif_check`, `error_check`, `error_message`) VALUES
(1, 'v1', 'Formulaire1', 'La mesure dans laquelle le but du cours est atteint', 'La mesure dans laquelle les exigences et attentes définies sont rencontrées', 'Matières : Le contenu du cours', 'Main d\'oeuvre : le chargé de cours', 'Méthodes utilisées', 'Moyens disponibles et utilisés', 'Milieu : horaire,école,local de classe, le groupe,...', NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--
DROP TABLE IF EXISTS `db_formulaires`.`roles` ;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Eleve'),
(3, 'Scribe'),
(4, 'Direction'),
(5, 'Professeur'),
(6, 'Secrétaire'),
(7, 'Vérificateur');

-- --------------------------------------------------------

--
-- Structure de la table `roles_zones`
--
DROP TABLE IF EXISTS `db_formulaires`.`roles_zones` ;
CREATE TABLE `roles_zones` (
  `role_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `roles_zones`
--

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
(1, 13),
(1, 14),
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
(4, 13),
(6, 13),
(4, 14),
(6, 14),
(1, 15),
(4, 15),
(7, 15),
(1, 16),
(6, 16);

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--
DROP TABLE IF EXISTS `db_formulaires`.`sections` ;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sections`
--

INSERT INTO `sections` (`id`, `name`) VALUES
(1, 'Informatique'),
(2, 'Comptabilité'),
(3, 'Menuiserie');

-- --------------------------------------------------------

--
-- Structure de la table `tokens`
--
DROP TABLE IF EXISTS `db_formulaires`.`tokens` ;
CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `date_creation` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `statut` bit(1) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `ufs_id` int(11) NOT NULL,
  `formulaires_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ufs`
--
DROP TABLE IF EXISTS `db_formulaires`.`ufs` ;
CREATE TABLE `ufs` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ufs`
--

INSERT INTO `ufs` (`id`, `name`, `code`) VALUES
(1, 'Web', 'UF1'),
(2, 'Reseaux', 'UF2');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--
DROP TABLE IF EXISTS `db_formulaires`.`users` ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `sections_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `name`, `birthdate`, `phone`, `mobile`, `street`, `number`, `city`, `postal_code`, `country`, `active`, `create`, `classrooms_id`, `sections_id`) VALUES
(3, 'admin@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 09:34:00', 2800, 2),
(4, 'eleve@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:46:00', 2800, 1),
(5, 'secretaire@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:47:00', 2800, 1),
(6, 'professeur@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:48:00', 2800, 1),
(7, 'direction@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:50:00', 2800, 1),
(8, 'scribe@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:50:00', 2800, 1),
(9, 'verificateur@projetweb2016.com', '8cc4e03c60fcee35bfdefbb733cbbce65fb3c5cf', '', '', '', '', '', '', '', '', '', '', 1, '2016-12-10 18:53:00', 2800, 1);

-- --------------------------------------------------------

--
-- Structure de la table `users_roles`
--
DROP TABLE IF EXISTS `db_formulaires`.`users_roles` ;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_roles`
--

INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES
(3, 1),
(4, 2),
(5, 6),
(6, 5),
(7, 4),
(8, 3),
(9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `users_ufs`
--
DROP TABLE IF EXISTS `db_formulaires`.`users_ufs` ;
CREATE TABLE `users_ufs` (
  `user_id` int(11) NOT NULL,
  `uf_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users_ufs`
--

INSERT INTO `users_ufs` (`user_id`, `uf_id`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `zones`
--
DROP TABLE IF EXISTS `db_formulaires`.`zones` ;
CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `path` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `zones`
--

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
(13, 'Sections', '/Sections/'),
(14, 'Ajouter une section', '/Sections/add'),
(15, 'Rapport de formulaires', '/Formreturns/rapport'),
(16, 'Import élèves', '/Users/import');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formreturns`
--
ALTER TABLE `formreturns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_formreturns_ufs1_idx` (`ufs_id`);

--
-- Index pour la table `formulaires`
--
ALTER TABLE `formulaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles_zones`
--
ALTER TABLE `roles_zones`
  ADD KEY `fk_roles_has_zones_zones1_idx` (`zone_id`),
  ADD KEY `fk_roles_has_zones_roles1_idx` (`role_id`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tokens_ufs1_idx` (`ufs_id`);

--
-- Index pour la table `ufs`
--
ALTER TABLE `ufs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_classrooms1_idx` (`classrooms_id`),
  ADD KEY `fk_users_sections1_idx` (`sections_id`);

--
-- Index pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD KEY `fk_users_has_roles_roles1_idx` (`role_id`),
  ADD KEY `fk_users_has_roles_users1_idx` (`user_id`);

--
-- Index pour la table `users_ufs`
--
ALTER TABLE `users_ufs`
  ADD KEY `fk_users_has_ufs_ufs1_idx` (`uf_id`),
  ADD KEY `fk_users_has_ufs_users1_idx` (`user_id`);

--
-- Index pour la table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2803;
--
-- AUTO_INCREMENT pour la table `formreturns`
--
ALTER TABLE `formreturns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `formulaires`
--
ALTER TABLE `formulaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ufs`
--
ALTER TABLE `ufs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formreturns`
--
ALTER TABLE `formreturns`
  ADD CONSTRAINT `fk_formreturns_ufs1` FOREIGN KEY (`ufs_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `roles_zones`
--
ALTER TABLE `roles_zones`
  ADD CONSTRAINT `fk_roles_has_zones_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roles_has_zones_zones1` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `fk_tokens_ufs1` FOREIGN KEY (`ufs_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_classrooms1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_sections1` FOREIGN KEY (`sections_id`) REFERENCES `sections` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_users_has_roles_roles1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_roles_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users_ufs`
--
ALTER TABLE `users_ufs`
  ADD CONSTRAINT `fk_users_has_ufs_ufs1` FOREIGN KEY (`uf_id`) REFERENCES `ufs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_ufs_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
