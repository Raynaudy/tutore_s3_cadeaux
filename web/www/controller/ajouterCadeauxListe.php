<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
   
    foreach($_POST['cadeau'] as $selected)
    {
        mysqli_query($co,"INSERT INTO fait_partie(id_cadeau,id_liste) VALUES ('$selected','$id_liste')");
    }
    
    echo 'Ajout réussi ! <br/>';
    echo '<a href = "Liste.php">Voir les listes </a>';
    echo 'Ajouter cette liste a un groupe : ';
    
    echo ' <form method = "post" action="selectionnerGroupe.php" >';
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    
    echo '<input type="submit" name="submit" value="Ajouter a un groupe"/>';
    echo '<form/>';
    
?>