#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id_utilisateur Int  Auto_increment  NOT NULL ,
        login          Varchar (16) NOT NULL ,
        mdp            Varchar (16) NOT NULL ,
        nom            Varchar (16) NOT NULL ,
        prenom         Varchar (16) NOT NULL ,
        actif          Bool NOT NULL
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Cadeau
#------------------------------------------------------------

CREATE TABLE Cadeau(
        id_cadeau   Int  Auto_increment  NOT NULL ,
        nom         Varchar (16) NOT NULL ,
        description Varchar (100) NOT NULL ,
        prix        Float NOT NULL ,
        img         Varchar (100) NOT NULL ,
        lien        Varchar (100) NOT NULL
	,CONSTRAINT Cadeau_PK PRIMARY KEY (id_cadeau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        id_groupe Int  Auto_increment  NOT NULL ,
        nom       Varchar (100) NOT NULL
	,CONSTRAINT Groupe_PK PRIMARY KEY (id_groupe)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Liste
#------------------------------------------------------------

CREATE TABLE Liste(
        id_liste       Int  Auto_increment  NOT NULL ,
        nom            Varchar (100) NOT NULL ,
        id_utilisateur Int NOT NULL
	,CONSTRAINT Liste_PK PRIMARY KEY (id_liste)

	,CONSTRAINT Liste_Utilisateur_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cadeauListe
#------------------------------------------------------------

CREATE TABLE cadeauListe(
        id_liste  Int NOT NULL ,
        id_cadeau Int NOT NULL
	,CONSTRAINT cadeauListe_PK PRIMARY KEY (id_liste,id_cadeau)

	,CONSTRAINT cadeauListe_Liste_FK FOREIGN KEY (id_liste) REFERENCES Liste(id_liste)
	,CONSTRAINT cadeauListe_Cadeau0_FK FOREIGN KEY (id_cadeau) REFERENCES Cadeau(id_cadeau)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: cadeauUtilisateur
#------------------------------------------------------------

CREATE TABLE cadeauUtilisateur(
        id_cadeau      Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        achete         Bool NOT NULL
	,CONSTRAINT cadeauUtilisateur_PK PRIMARY KEY (id_cadeau,id_utilisateur)

	,CONSTRAINT cadeauUtilisateur_Cadeau_FK FOREIGN KEY (id_cadeau) REFERENCES Cadeau(id_cadeau)
	,CONSTRAINT cadeauUtilisateur_Utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: utilisateurGroupe
#------------------------------------------------------------

CREATE TABLE utilisateurGroupe(
        id_groupe      Int NOT NULL ,
        id_utilisateur Int NOT NULL
	,CONSTRAINT utilisateurGroupe_PK PRIMARY KEY (id_groupe,id_utilisateur)

	,CONSTRAINT utilisateurGroupe_Groupe_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
	,CONSTRAINT utilisateurGroupe_Utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: groupeListe
#------------------------------------------------------------

CREATE TABLE groupeListe(
        id_liste  Int NOT NULL ,
        id_groupe Int NOT NULL
	,CONSTRAINT groupeListe_PK PRIMARY KEY (id_liste,id_groupe)

	,CONSTRAINT groupeListe_Liste_FK FOREIGN KEY (id_liste) REFERENCES Liste(id_liste)
	,CONSTRAINT groupeListe_Groupe0_FK FOREIGN KEY (id_groupe) REFERENCES Groupe(id_groupe)
)ENGINE=InnoDB;

