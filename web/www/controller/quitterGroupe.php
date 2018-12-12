<?php
    require_once("connect.php");
    session_start();

    $id_groupe = $_POST['id_groupe'];
    $id_utilisateur = $_SESSION['id_utilisateur'];

    mysqli_query($co,"DELETE FROM est_membre WHERE id_groupe = '$id_groupe' AND id_utilisateur = '$id_utilisateur'");
    
    header("Location: ../view/groupe.php");
?>