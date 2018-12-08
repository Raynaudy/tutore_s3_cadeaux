<?php

    require_once("connect.php");
    
    $id_groupe = $_POST['id_groupe'];
    $id_createur = $_POST['id_createur'];
   
    foreach($_POST['membre'] as $selected)
    {
        
        $result = mysqli_query($co,"SELECT id_utilisateur FROM UtilisateurInactif WHERE id_utilisateur = '$selected'");
        if(mysqli_num_rows($result) != 0)
        {
            mysqli_query($co,"INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES ('$selected','$id_groupe')");
        }
        else
        {
            mysqli_query($co,"INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES ('$id_createur','$id_groupe','$selected')");
            //envoyer un mail
        }
    
    }
    
    header("Location: ../view/groupe.php");
    
    
?>