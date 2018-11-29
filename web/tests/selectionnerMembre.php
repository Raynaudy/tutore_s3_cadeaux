<?php

    require_once("connect.php");
    
    $id_groupe = $_POST['id_groupe'];
    $id_createur = $_POST['id_createur'];
    
    echo 'Selectionner des membres : <br/>';
    
    echo ' <form method = "post" action="ajouterMembre.php" >';
    
    echo '<input type="hidden" name = "id_groupe" value="'.$id_groupe.'"/>';
    echo '<input type="hidden" name = "id_createur" value="'.$id_createur.'"/>';
    

    $all = "SELECT id_utilisateur,nom,prenom FROM Utilisateur";
    $result = mysqli_query($co,$all);
    
    
    while ($row = mysqli_fetch_assoc($result))
    {
        if($row['id_utilisateur'] != $id_createur)
        {
            echo '<input type="checkbox" name = "membre[]" value="'.$row['id_utilisateur'].'"/><label>'.$row['prenom'].' '.$row['nom'].'</label>';echo '<br/>';
        }
    }
    
    echo '<input type="submit" name="submit" value="Submit"/>';


?>
