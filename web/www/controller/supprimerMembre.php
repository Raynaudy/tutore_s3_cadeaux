<?php

    require_once("connect.php");
    
    $id_groupe = $_POST['id_groupe'];
   
    foreach($_POST['membre'] as $selected)
    {
      mysqli_query($co,"DELETE FROM est_membre WHERE id_utilisateur = '$selected' AND id_groupe = '$id_groupe'");
      mysqli_query($co,"DELETE FROM est_invite WHERE id_utilisateur_est_invite = '$selected' AND id_groupe = '$id_groupe'");
    }
    
    header("Location: ../view/groupe.php");
    
    
?>