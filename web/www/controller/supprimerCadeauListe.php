<?php
    require_once("connect.php");
    
    $id_liste = $_GET['id_liste'];
    $id_cadeau = $_GET['id_cadeau'];
    
    mysqli_query($co,"DELETE FROM fait_partie WHERE id_cadeau = '$id_cadeau' AND id_liste = '$id_liste'");
    
    header("Location:../view/listes.php");
    

?>