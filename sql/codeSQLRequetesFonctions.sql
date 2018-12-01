//Code des requetes en SQL pour effectuer les fonctions de l'applications
//Projet Tutoré 2018 
//Yvain Raynaud
//Eugène Leclerc
//Lise Jolicoeur
//29 novembre 2018


//Inscription
INSERT INTO Utilisateur(nom,prenom) VALUES (nom, prenom);
//Actif
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (unIDutilisateur,unMail,unMdp);
//Inactif
INSERT INTO UtilisateurInactif(id_utilisateur) VALUES (unIDutilisateur);

//Créer un cadeau (actif ou inactif)
INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES (unNom,unIDutilisateur);

//Supprimer un cadeau
DELETE FROM fait_partie WHERE id_cadeau = unIDCadeau; //supprimer de toutes les listes
DELETE FROM Cadeau WHERE id_cadeau = unIDCadeau;

//Indiquer l'achat d'un cadeau (actif ou inactif)
UPDATE Cadeau SET id_utilisateur_est_offert = unIDutilisateur WHERE id_cadeau = unIDCadeau;

//Desindiquer l'achat d'un cadeau (actif ou inactif)
UPDATE Cadeau SET id_utilisateur_est_offert = NULL WHERE id_cadeau = unIDCadeau;

//Ajouter un cadeau dans une liste (actif ou inactif)
INSERT INTO fait_partie(id_cadeau,id_liste) VALUES (unIDCadeau,unIDliste);

//Retirer un cadeau d'une liste (actif ou inactif)
DELETE FROM fait_partie WHERE id_liste = unIDliste AND id_cadeau = unIDCadeau;

//Créer un liste (actif ou inactif)
INSERT INTO Liste(libelle,id_utilisateur) VALUES (unNom,unIDutilisateur);

//Changer le nom d'une liste
UPDATE Liste SET libelle = unNom WHERE id_liste= unIDListe;

//Supprimer une liste
DELETE FROM est_partagee WHERE id_liste = unIDListe; //supprimer de tous les groupes dans lesquels elle était
DELETE FROM fait_partie WHERE id_liste = unIDListe;//supprimer les associations entre les cadeaux et cette liste
DELETE FROM Liste WHERE id_liste = unIDListe;

//Partager une liste à un groupe
INSERT INTO est_partagee(id_groupe,id_liste) VALUES (unIDGroupe,unIDListe);

//Enlever une liste d'un groupe
DELETE FROM est_partagee WHERE id_groupe = unIDGroupe AND id_liste = unIDListe;

//Créer un groupe 
INSERT INTO Groupe(nom,id_utilisateur) VALUES (unNom,unIDutilisateur);

//Supprimer un groupe
DELETE FROM Groupe WHERE id_groupe = unIDGroupe;

//Changer le nom d'un groupe
UPDATE Groupe SET  nom = nom WHERE id_groupe = unIDGroupe;

//Supprimer un groupe
DELETE FROM est_membre WHERE id_groupe = unIDGroupe;
DELETE FROM est_invite WHERE id_groupe = unIDGroupe;
DELETE FROM est_partagee WHERE id_groupe = unIDGroupe; //on supprime les associations entre ce groupe et les listes
DELETE FROM Groupe WHERE id_groupe = unIDGroupe;

//Inviter un membre actif dans un groupe
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (unIDcreateur,unIDGroupe,unIDutilisateur)

//Ajouter une personne inactive dans un groupe
INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES (unIDutilisateur,unIDGroupe);

//Accepter une invitation
DELETE FROM est_invite WHERE id_utilisateur = id_utilisateur AND id_groupe = id_groupe;
INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES (unIDutilisateur,unIDGroupe);

//Refuser une invitation
DELETE FROM est_invite WHERE id_utilisateur = unIDutilisateur;
