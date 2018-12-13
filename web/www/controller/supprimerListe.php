<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
    
    mysqli_query($co,"DELETE FROM est_partagee WHERE id_liste = '$id_liste'");
    mysqli_query($co,"DELETE FROM fait_partie WHERE id_liste = '$id_liste'");
    mysqli_query($co,"DELETE FROM Liste WHERE id_liste = '$id_liste'");
    
    header("Location:../view/mesListes.php");
?>