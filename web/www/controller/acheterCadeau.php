<?php
    require_once("connect.php");
    session_start();
    
    $id_cadeau = $_GET['id_cadeau'];
    $id_util = $_SESSION['id_utilisateur'];
    
    mysqli_query($co,"UPDATE Cadeau SET id_utilisateur = '$id_util' WHERE id_cadeau = '$id_cadeau'");
    
    header("Location:../view/listes.php");
?>