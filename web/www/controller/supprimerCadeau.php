<?php

    require_once("connect.php");
    
    $id_cadeau = $_POST['id_cadeau'];
    
    mysqli_query($co,"DELETE FROM fait_partie WHERE id_cadeau = '$id_cadeau'");
    mysqli_query($co,"DELETE FROM Cadeau WHERE id_cadeau = '$id_cadeau'");
    
    header("Location:../view/cadeaux.php");
?>