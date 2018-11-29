<?php

    require_once("connect.php");
    
    $id_cadeau = $_POST['id_cadeau'];
    $id_createur = $_POST['id_createur'];
    
    echo '<form method = "post" action="ajouterListeCadeau.php" >';
    
    echo '<input type="hidden" name = "id_cadeau" value="'.$id_cadeau.'"/>';
    
    echo 'Mes listes : <br/>';
    $all = "SELECT id_liste,libelle FROM Liste WHERE id_utilisateur = '$id_createur'";
    $result = mysqli_query($co,$all);
    
    while ($row = mysqli_fetch_assoc($result))
    {
        echo '<input type="checkbox" name = "liste[]" value="'.$row['id_liste'].'"/><label>'.$row['libelle'].'</label>';
        echo '<br/>';
    }
    
    echo '<input type="submit" name="submit" value="Submit"/>';
    echo '<form/>';

?>
