//création de la famille
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (1,'Simpson','Lisa');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (2,'Simpson','Bart');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (3,'Simpson','Marge');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (4,'Simpson','Homer');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (5,'Simpson','Maggie');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (6,'Simpson','Abraham');

//!!! insérer avec les mdp cryptés !!!
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (1,'lisasimpson@gmail.com','$2y$10$SuB.10d2qq6.aJSB554yi.v3YajypAB5kC5ORC2PkoxhFT2Puc8ey');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (2,'bart1234@free.fr','$2y$10$1W1GeFu1Epn10uCYQ8bq3OrijzpkK5ojWxtvGNcj0.uv85dJZI.F.');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (3,'margeSimpson@gmail.com','$2y$10$yHw5tPpeipQDKs3Ok/BJVe98bQaHlU7vwoSsWo27UCvC7GEJZdPNy');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (4,'homer@gmail.com','$2y$10$WQ6VNZl054As7a8IOYk5LOuMbAgemavKdabt2xbZrhO9gUBbL5Yla');

//pour avoir les mots de passe en clair...
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (1,'lisa111','azerty');
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (2,'bart1234','qwerty33');
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (3,'margeSimpson','1234');
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (4,'homer','azerty');

INSERT INTO UtilisateurInactif(id_utilisateur) VALUES (5);
INSERT INTO UtilisateurInactif(id_utilisateur) VALUES (6);

//amis de Bart
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (7,'Van Houten','Milhouse');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (8,'Flanders','Todd');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (9,'Flanders','Rod');

//!!! insérer avec les mdp cryptés !!!
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (7,'milhouse@gmail.com','$2y$10$csy7wnA8RSJVMVjKrIdm8e53VoBBmRAKr7BEaBYzNqLab3cDvNJ0e');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (8,'todd11@free.fr','$2y$10$XrjkyOcVrQaJbnpZB8twG./rQK539.Qvvtp6tl1Bxk69aVq3FoDTa');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (9,'rod22@free.fr','$2y$10$ikr0v6fenPGvLe1wVr1lKurQbZadMEJTN41RL8DLUUmu306cT5POG');

//pour avoir les mots de passe en clair...
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (7,'milhouse','ilike2study');
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (8,'todd11','todd');
//INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES (9,'rod22','rod');

//Créer un groupe
INSERT INTO Groupe(nom,id_utilisateur) VALUES ('Simpson family christmas 2018',3);

//le créateur est automatiquement membre
INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (1,3);
    
//2ème groupe, créé par Bart
INSERT INTO Groupe(nom,id_utilisateur) VALUES ('Bart & friends Christman',2);
    
//le créateur est automatiquement membre
INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (2,2);

//les inactifs dans le groupe 1
INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (1,5);
INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (1,6);

//les actifs 
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (3,1,1);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (3,1,2);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (3,1,4);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (2,2,1);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (2,2,8);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (2,2,9);
INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES (2,2,10);

//Créer des cadeaux
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (1,'iphone X',2);
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (2,'watch',4);
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (3,'book',1);
INSERT INTO Cadeau(id_cadeau,nom) VALUES (4,'Avatar (movie)');
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (5,'scarf',3);
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (6,'candle',3);
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (7,'gloves',1);
INSERT INTO Cadeau(id_cadeau,nom,id_utilisateur_est_souhaite) VALUES (8,'calendar',7);
INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES ('glasses',8);
INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES ('magazines',2);
INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES ('saxophone',1);

//Créer des listes
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('marge\'s wishlist',3);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('lisa\'s wishlist',1);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('bart\'s wishlist',2);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('homer\'s wishlist',4);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('abraham\'s wishlist',7);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('milhouse\'s wishlist',8);
INSERT INTO Liste(libelle,id_utilisateur) VALUES ('lisa\'s second wishlist',1);

//Ajouter les cadeaux précédants dans les listes construites - certaines personnes ont 2 groupes et décident de partager la même liste(Bart)
//ou pas(Lisa)
//marge
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (1,5);
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (1,6);

//lisa -- elle a 2 listes
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (2,3);
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (2,7);
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (7,11);

//bart
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (3,1);
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (3,10);

//homer
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (4,2);

//abraham
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (5,8);

//milhouse
INSERT INTO fait_partie(id_liste,id_cadeau) VALUES (6,9);


//Affecter les listes a un groupe
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (1,1);
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (2,1);

//les deux listes de bart
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (3,1);
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (3,2);

INSERT INTO est_partagee(id_liste,id_groupe) VALUES (4,1);
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (5,1);
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (6,2);
INSERT INTO est_partagee(id_liste,id_groupe) VALUES (7,2);

//Indiquer l'achat d'un cadeau
UPDATE Cadeau SET id_utilisateur_est_offert = 4 WHERE id_utilisateur_est_souhaite = 1 AND id_cadeau = 3;


    
