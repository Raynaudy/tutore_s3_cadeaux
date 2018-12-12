#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id_utilisateur Int  Auto_increment  NOT NULL ,
        nom            Varchar (16) NOT NULL ,
        prenom         Varchar (16) NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cadeau
#------------------------------------------------------------

CREATE TABLE Cadeau(
        id_cadeau                   Int  Auto_increment  NOT NULL ,
        nom                         Varchar (16) NOT NULL ,
        description                 Varchar (100),
        prix                        Float,
        img                         Varchar (100),
        lien                        Varchar (100),
        id_utilisateur              Int ,
        id_utilisateur_est_souhaite Int
	,CONSTRAINT Cadeau_PK PRIMARY KEY (id_cadeau)

	,CONSTRAINT Cadeau_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
	,CONSTRAINT Cadeau_Utilisateur0_FK FOREIGN KEY (id_utilisateur_est_souhaite) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id_groupe      Int  Auto_increment  NOT NULL ,
        nom            Varchar (100) NOT NULL ,
        id_utilisateur Int NOT NULL
	,CONSTRAINT Groupe_PK PRIMARY KEY (id_groupe)

	,CONSTRAINT Groupe_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Liste
#------------------------------------------------------------

CREATE TABLE Liste(
        id_liste       Int  Auto_increment  NOT NULL ,
        libelle        Varchar (100) NOT NULL ,
        id_utilisateur Int NOT NULL
	,CONSTRAINT Liste_PK PRIMARY KEY (id_liste)

	,CONSTRAINT Liste_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UtilisateurActif
#------------------------------------------------------------

CREATE TABLE UtilisateurActif(
        id_utilisateur Int NOT NULL ,
        login          Varchar (50) NOT NULL ,
        mdp            Varchar (300) NOT NULL
	,CONSTRAINT UtilisateurActif_PK PRIMARY KEY (id_utilisateur)

	,CONSTRAINT UtilisateurActif_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UtilisateurInactif
#------------------------------------------------------------

CREATE TABLE UtilisateurInactif(
        id_utilisateur Int NOT NULL
	,CONSTRAINT UtilisateurInactif_PK PRIMARY KEY (id_utilisateur)

	,CONSTRAINT UtilisateurInactif_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: fait_partie
#------------------------------------------------------------

CREATE TABLE fait_partie(
        id_liste  Int NOT NULL ,
        id_cadeau Int NOT NULL
	,CONSTRAINT fait_partie_PK PRIMARY KEY (id_liste,id_cadeau)

	,CONSTRAINT fait_partie_Liste_FK FOREIGN KEY (id_liste) REFERENCES Liste(id_liste)
	,CONSTRAINT fait_partie_Cadeau0_FK FOREIGN KEY (id_cadeau) REFERENCES Cadeau(id_cadeau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: est_partagee
#------------------------------------------------------------

CREATE TABLE est_partagee(
        id_liste  Int NOT NULL ,
        id_groupe Int NOT NULL
	,CONSTRAINT est_partagee_PK PRIMARY KEY (id_liste,id_groupe)

	,CONSTRAINT est_partagee_Liste_FK FOREIGN KEY (id_liste) REFERENCES Liste(id_liste)
	,CONSTRAINT est_partagee_Groupe0_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: est_membre
#------------------------------------------------------------

CREATE TABLE est_membre(
        id_groupe      Int NOT NULL ,
        id_utilisateur Int NOT NULL
	,CONSTRAINT est_membre_PK PRIMARY KEY (id_groupe,id_utilisateur)

	,CONSTRAINT est_membre_Groupe_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
	,CONSTRAINT est_membre_Utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: est_invite
#------------------------------------------------------------

CREATE TABLE est_invite(
        id_utilisateur            Int NOT NULL ,
        id_groupe                 Int NOT NULL ,
        id_utilisateur_est_invite Int NOT NULL
	,CONSTRAINT est_invite_PK PRIMARY KEY (id_utilisateur,id_groupe,id_utilisateur_est_invite)

	,CONSTRAINT est_invite_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
	,CONSTRAINT est_invite_Groupe0_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
	,CONSTRAINT est_invite_Utilisateur1_FK FOREIGN KEY (id_utilisateur_est_invite) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


