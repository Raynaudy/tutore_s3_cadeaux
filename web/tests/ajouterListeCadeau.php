<?php

    require_once("connect.php");
    
    $id_cadeau = $_POST['id_cadeau'];
   
    foreach($_POST['liste'] as $selected)
    {
        mysqli_query($co,"INSERT INTO fait_partie(id_liste,id_cadeau) VALUES ('$selected','$id_cadeau')");
    }
    
    echo 'Ajout réussi ! <br/>';
    echo '<a href = "Liste.php">Voir les listes </a>';
    
?>