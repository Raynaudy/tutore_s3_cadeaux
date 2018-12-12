<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
    $id_createur = $_POST['id_createur'];
    
    echo '<form method = "post" action="ajouterCadeau.php" >';
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    
    $all = "SELECT id_cadeau,nom FROM Cadeau WHERE id_utilisateur_est_souhaite = '$id_createur'";
    $result = mysqli_query($co,$all);
    
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '<input type="checkbox" name = "cadeau[]" value="'.$row['id_cadeau'].'"/><label>'.$row['nom'].'</label>';
        echo '<br/>';
    }
    
    echo '<input type="submit" name="submit" value="Submit"/>';
    echo '<form/>';

?>
