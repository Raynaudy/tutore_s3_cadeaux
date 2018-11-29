<?php

    require_once("connect.php");
     
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
    
?>