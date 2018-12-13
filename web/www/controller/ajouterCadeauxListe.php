<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
   
    foreach($_POST['cadeau'] as $selected)
    {
        mysqli_query($co,"INSERT INTO fait_partie(id_cadeau,id_liste) VALUES ('$selected','$id_liste')");
    }

    header("Location:../view/mesListes.php");
?>