INSERT INTO `ufs` (`id`, `name`, `code`) VALUES (NULL, 'Web', 'UF1'), (NULL, 'Reseaux', 'UF2');
INSERT INTO `classrooms` (`id`, `code`) VALUES ('2800', '1617A-BINFO-1343-1'), ('2802', '1617A-BCPTA-1343-1');
INSERT INTO `roles` (`id`, `role`) VALUES (NULL, 'Admin'), (NULL, 'Eleve'), (NULL, 'Scribe'), (NULL, 'Direction'), (NULL, 'Professeur');
INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `name`, `birthdate`, `phone`, `mobile`, `street`, `number`, `city`, `postal_code`, `country`, `validate`, `create`, `classrooms_id`) VALUES (NULL, 'gerard.dupont@free.fr', '1234', 'Gérard', 'Dupont', '13/08/1985', '063654978', '0498532654', 'du Centre', '15', 'Athus', '6790', 'Belgique', NULL, NULL, '2800'), (NULL, 'andre@gmail.fr', '1234', 'André', 'Dupont', '15/08/1972', '063654878', '0497552654', 'du VIllage', '74', 'Aubange', '6790', 'Belgique', NULL, NULL, '2802');
INSERT INTO `formreturns` (`id`, `create`, `commentaire_1`, `evaluation_1`, `commentaire_2`, `evaluation_2`, `commentaire_3`, `evaluation_3`, `commentaire_4`, `evaluation_4`, `commentaire_5`, `evaluation_5`, `commentaire_6`, `evaluation_6`,`commentaire_7`, `evaluation_7`, `ufs_id`) VALUES (1, '2016-11-30 19:20:00', 'Ceci est mon premier commentaire', 4, 'Ceci est mon second commentaire', 3, 'Ceci est mon troisieme commentaire', 4, 'Ceci est mon quatrième commentaire', 3, 'Ceci est mon cinquième commentaire', 2, 'Ceci est mon sixième commentaire', 3,'Ceci est mon septième commentaire', 3, 2), (2, '2016-11-30 19:21:00', 'Premier Commentaire', 4, 'Deuxième Commentaire', 3, 'Troisième Commentaire', 5, 'Quatrième Commentaire', 1, 'Cinquième Commentaire', 2, 'Sixième Commentaire', 3,'Septième Commentaire', 3, 2);
INSERT INTO `formulaires` (`id`, `version`, `name`, `titre_1`, `titre_2`, `titre_3`, `titre_4`, `titre_5`, `titre_6`,`titre_7`) VALUES (NULL, 'v1', 'Formulaire1', 'La mesure dans laquelle le but du cours est atteint', 'La mesure dans laquelle les exigences et attentes définies sont rencontrées', 'Matières : Le contenu du cours', 'Main d\'oeuvre : le chargé de cours', 'Méthodes utilisées', 'Moyens disponibles et utilisés','Milieu : horaire,école,local de classe, le groupe,...');
INSERT INTO `users_roles` (`user_id`, `role_id`) VALUES ('1', '2'), ('2', '4');