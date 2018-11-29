<?php

    require_once("connect.php");
    
    /*A faire directement dans phpMyAdmin au moment de la création de la base
    #création de la famille
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (1,'Simpson','Lisa');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (2,'Simpson','Bart');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (3,'Simpson','Marge');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (4,'Simpson','Homer');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (5,'Simpson','Maggie');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (6,'Simpson','Abraham');

INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (1,'lisa111','azerty','Simpson','Lisa');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (2,'bart1234','qwerty33','Simpson','Bart');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (3,'margeSimpson','1234','Simpson','Marge');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (4,'homer','azerty','Simpson','Homer');

INSERT INTO UtilisateurInactif(id_utilisateur,nom,prenom) VALUES (5,'Simpson','Maggie');
INSERT INTO UtilisateurInactif(id_utilisateur,nom,prenom) VALUES (6,'Simpson','Abraham');

#amis de Bart, qui décident de faire Noel entre eux aussi
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (7,'Van Houten','Milhouse');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (8,'Flanders','Todd');
INSERT INTO Utilisateur(id_utilisateur,nom,prenom) VALUES (9,'Flanders','Rod');

INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (7,'milhouse','ilike2study','Van Houten','Milhouse');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (8,'todd11','todd','Flanders','Todd');
INSERT INTO UtilisateurActif(id_utilisateur,login,mdp,nom,prenom) VALUES (9,'rod22','rod','Flanders','Rod');
    
    */
    //Afficher Utilisateur
    
    $query = "SELECT * FROM Utilisateur";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
    
    
    //Afficher Utilisateur Actif et Inactif
    $query = "SELECT * FROM UtilisateurActif";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur Actifs ';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
    
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
    
    $query = "SELECT * FROM UtilisateurInactif";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur Inactifs';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
    
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
    
    /* Créer un groupe
    $query = "SELECT id_utilisateur FROM Utilisateur WHERE nom = 'Simpson' AND prenom = 'Marge'";
    $id = mysqli_query($co,$query);
    $id = mysqli_fetch_assoc($id);
    $id = $id['id_utilisateur'];
    
    
    $query = "INSERT INTO Groupe(nom,id_utilisateur) VALUES ('Simpson family christmas 2018','$id')";
    $result = mysqli_query($co,$query);
    $id_groupe = mysqli_insert_id($co);
    
    //le créateur est automatiquement membre
    mysqli_query($co,"INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES ('$id_groupe','$id')");
    
    */
    
    /*
    //2ème groupe, créé par Bart
    $query = "SELECT id_utilisateur FROM Utilisateur WHERE nom = 'Simpson' AND prenom = 'Bart'";
    $id = mysqli_query($co,$query);
    $id = mysqli_fetch_assoc($id);
    $id = $id['id_utilisateur'];
    
    
    $query = "INSERT INTO Groupe(nom,id_utilisateur) VALUES ('Bart & friends Christman','$id')";
    $result = mysqli_query($co,$query);
    $id_groupe = mysqli_insert_id($co);
    
    
    //le créateur est automatiquement membre
    mysqli_query($co,"INSERT INTO est_membre(id_groupe,id_utilisateur) ('$id_groupe','$id')");
    
    */
    
    
    $query = "SELECT * FROM Groupe";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Groupe';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            echo $row['id_groupe']."&ensp;".$row['nom']."&ensp; créé par :   ".$prenom."<br/>";
        }
        
    }
    
    
    //inviter des personnes a rejoindre le groupe 1 avec toute la famille ; si inactif, affecté tout de suite comme membre.
    /*
    $query = "SELECT * FROM Utilisateur WHERE nom = 'Simpson'";
    $result = mysqli_query($co,$query);
    
    
    $createur = mysqli_query($co,"SELECT id_utilisateur FROM Groupe WHERE nom = 'Simpson family christmas 2018'");
    $createur = mysqli_fetch_assoc($createur);
    $createur = $createur['id_utilisateur'];
   
    while ($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id_utilisateur'];
        if($id != $createur)
        {
            //si il est inactif, l'ajouter dans les membres
            if (mysqli_num_rows(mysqli_query($co,"SELECT * FROM UtilisateurInactif WHERE id_utilisateur = '$id'")) != 0)
            {
                $query_membre = mysqli_query($co,"INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (1,'$id')");
            }
            else 
            {
                $query_invite = mysqli_query($co,"INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES ('$createur',1,'$id')");
                //et envoyer un mail
            }
        }
    }*/
    
    /*
    //inviter des personnes a rejoindre le groupe 2 : seulement quelques personnes
    
    $createur = mysqli_query($co,"SELECT id_utilisateur FROM Groupe WHERE nom = 'Bart & friends Christman'");
    $createur = mysqli_fetch_assoc($createur);
    $createur = $createur['id_utilisateur'];
    
    $noms = Array(0 => Array("prenom" => "Lisa","nom" => "Simpson"), 1 => Array("prenom" => "Milhouse","nom" => "Van Houten"), 2 => Array("prenom" => "Todd","nom" => "Flanders"), 4 => Array("prenom" => "Rod","nom" => "Flanders"));
    
    foreach($noms as $unNom)
    {
            $prenom = $unNom['prenom'];
            $nom = $unNom['nom'];
            $id = mysqli_query($co,"SELECT id_utilisateur FROM Utilisateur WHERE nom = '$nom' AND prenom = '$prenom'");
            $id = mysqli_fetch_assoc($id);
            $id = $id['id_utilisateur'];
            
            if($id != $createur)
            {
                 if (mysqli_num_rows(mysqli_query($co,"SELECT * FROM UtilisateurInactif WHERE id_utilisateur = '$id'")) != 0)
                {
                    $query_membre = mysqli_query($co,"INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES (2,'$id')");
                }
                else 
                {
                    $query_invite = mysqli_query($co,"INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES ('$createur',2,'$id')");
                    //et envoyer un mail
                }
            
            }
        
    }
    */
    
    
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    
    
    $query = "SELECT * FROM est_invite";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'est_invite';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            $id2 = $row['id_utilisateur_est_invite'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id2'";
            $prenomInvite = mysqli_query($co,$query2);
            $prenomInvite = mysqli_fetch_assoc($prenomInvite);
            $prenomInvite = $prenomInvite['prenom'];
            
            $groupe = $row['id_groupe'];
            $query2 = "SELECT nom FROM Groupe WHERE id_groupe = '$groupe'";
            $groupe = mysqli_query($co,$query2);
            $groupe = mysqli_fetch_assoc($groupe);
            $groupe = $groupe['nom'];
              
            echo $prenomInvite."    est invité par   ".$prenom."     dans le groupe :      ".$groupe."<br/>";
        }
    }
    
    
     
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    
    
    $query = "SELECT * FROM est_membre";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'est_membre';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            $groupe = $row['id_groupe'];
            $query2 = "SELECT nom FROM Groupe WHERE id_groupe = '$groupe'";
            $groupe = mysqli_query($co,$query2);
            $groupe = mysqli_fetch_assoc($groupe);
            $groupe = $groupe['nom'];
              
            echo $prenom."   est membre du groupe :      ".$groupe."<br/>";
        }
        
    }
    
    
    /*A rentrer dans phpMyAdmin
    
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
    
    */
    
     /*UPDATE un cadeau comme acheté : Homer a acheté un cadeau de Lisa
    
    
    UPDATE TABLE Cadeau SET 
    
    */
    
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    
    
    $query = "SELECT * FROM Cadeau";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Cadeau';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur_est_souhaite'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            $offert = $row['id_utilisateur_est_offert'];
            
            //si le cadeau est déja offert...
            if(isset($offert))
            {
                $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$offert'";
                $id_offert = mysqli_query($co,$query2);
                $id_offert = mysqli_fetch_assoc($id_offert);
                $id_offert = $id_offert['prenom'];
                $etat = "Cadeau acheté par ".$id_offert;
                
            }else {$etat = "Cadeau pas encore offert";}
           
           
              
            echo $row['id_cadeau']."     &ensp; ".$row['nom']."&ensp;     description : ".$row['description']."&ensp;      prix : ".$row['prix']."&ensp;       image : ".$row['img']."&ensp;      lien : ".$row['lien']. "&ensp;      Souhaité par : ".$prenom."&ensp;         Statut : ".$etat."<br/>";
        }
        
    }
    
    /*dans phpMyAdmin : Insérer des nouvelles Listes
    
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('marge\'s wishlist',3);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('lisa\'s wishlist',1);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('bart\'s wishlist',2);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('homer\'s wishlist',4);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('abraham\'s wishlist',7);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('milhouse\'s wishlist',8);
    INSERT INTO Liste(libelle,id_utilisateur) VALUES ('lisa\'s second wishlist',1);

    
    Ajouter les cadeaux précédants dans les listes construites - certaines personnes ont 2 groupes et décident de partager la même liste(Bart), ou pas(Lisa)
    
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
    
    */
    
    
    /*Affecter les listes a un groupe
    
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (1,1);
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (2,1);
    //les deux listes de bart
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (3,1);
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (3,2);
    
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (4,1);
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (5,1);
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (6,2);
    INSERT INTO est_partagee(id_liste,id_groupe) VALUES (7,2);

    */
    
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';
    
    
    $query = "SELECT * FROM Liste";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Liste';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            
            $id_liste = $row['id_liste'];
            
            //récupérer les noms des groupes
            $query2 = "SELECT id_groupe FROM est_partagee WHERE id_liste = '$id_liste'";
            $lesGroupes = mysqli_query($co,$query2);
            $nomsGroupes = "";
            
            if(mysqli_num_rows($lesGroupes)!=0)
            {
                while($row2 = mysqli_fetch_assoc($lesGroupes))
                {
                    $idlocale = $row2['id_groupe'];
                    $query3 = "SELECT nom FROM Groupe WHERE id_groupe = '$idlocale'";
                    $resultq3 = mysqli_query($co,$query3);
                    $resultq3 = mysqli_fetch_assoc($resultq3);
                    $nomlocal = $resultq3['nom'];
                    $nomsGroupes = $nomsGroupes.$nomlocal." | ";
                }
            }
                
            //récupérer les noms des cadeaux
            $query2 = "SELECT id_cadeau FROM fait_partie WHERE id_liste = '$id_liste'";
            $lesCadeaux = mysqli_query($co,$query2);
            $nomsCadeaux = "";
            
            if(mysqli_num_rows($lesCadeaux)!=0)
            {
                while($row2 = mysqli_fetch_assoc($lesCadeaux))
                {
                    $idlocale = $row2['id_cadeau'];
                    $query3 = "SELECT nom FROM Cadeau WHERE id_cadeau = '$idlocale'";
                    $resultq3 = mysqli_query($co,$query3);
                    $resultq3 = mysqli_fetch_assoc($resultq3);
                    $nomlocal = $resultq3['nom'];
                    $nomsCadeaux = $nomsCadeaux.$nomlocal." | ";
                }
            }
           
           
           echo "Liste de ".$prenom."&ensp;&ensp; ; &ensp; appartenant au(x) groupe(s) : ".$nomsGroupes. " &ensp;&ensp; et est constitué de : ".$nomsCadeaux."<br/>";
        }
        
    }
   
    
    
    
?>