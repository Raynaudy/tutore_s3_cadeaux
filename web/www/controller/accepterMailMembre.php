<?php

    require_once("connect.php");
    
    $id_utilisateur = mysqli_real_escape_string($co,$_GET['$id_utilisateur']);
    $id_groupe = mysqli_real_escape_string($co,$_GET['$id_groupe']);
    $hash = mysqli_real_escape_string($co,$_GET['hash']);
    
    if(isset($id_utilisateur) && isset($id_groupe) && isset($hash))
    {
        $search = "SELECT * FROM est_invite WHERE id_utilisateur_est_invite='$id_utilisateur' AND id_groupe='$id_groupe' AND hash='$hash'";
        $match = mysqli_num_rows($search);
        
        if($match>0)
        {
             mysqli_query($co,"DELETE FROM est_invite WHERE id_groupe = '$id_groupe' AND id_utilisateur_est_invite = '$id_utilisateur'");
             mysqli_query($co,"INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES ('$id_utilisateur','$id_groupe')");
        }
    
    }
    header("Location:../view/groupe.php");
?>