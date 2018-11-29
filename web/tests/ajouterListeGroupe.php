<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
   
    foreach($_POST['groupe'] as $selected)
    {
        mysqli_query($co,"INSERT INTO est_partagee(id_groupe,id_liste) VALUES ('$selected','$id_liste')");
    }
    
    echo 'Ajout réussi ! <br/>';
    echo '<a href = "Liste.php">Voir les listes </a>';
  
?>