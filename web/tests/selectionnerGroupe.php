<?php

    require_once("connect.php");
    
    $id_liste = $_POST['id_liste'];
    
    $result = mysqli_query($co,"SELECT id_utilisateur FROM Liste WHERE id_liste = '$id_liste'");
    $result = mysqli_fetch_assoc($result);
    $id_createur = $result['id_utilisateur'];
    
    
    echo '<form method = "post" action="ajouterListeGroupe.php" >';
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    
    //seul les groupes dont il est membre
    $all = "SELECT G.id_groupe, G.nom FROM Groupe G, est_membre E WHERE G.id_groupe = E.id_groupe AND E.id_utilisateur = '$id_createur'";
    $result = mysqli_query($co,$all);
    
    if(mysqli_num_rows($result) == 0)
    {
        echo 'Membre de aucun groupe';
    }
    
   
    while ($row = mysqli_fetch_assoc($result))
    {
        
        $id_groupe = $row['id_groupe'];
         //et dans lequel la personne n'a pas encore de liste
        $result2 = mysqli_query($co,"SELECT * FROM Liste L, est_partagee E WHERE E.id_groupe = '$id_groupe' AND L.id_utilisateur = '$id_createur' AND L.id_liste = E.id_liste");
        if(mysqli_num_rows($result2) == 0)
        {
            echo '<input type="checkbox" name = "groupe[]" value="'.$row['id_groupe'].'"/><label>'.$row['nom'].'</label>';
            echo '<br/>';
        }
    }
    
    echo '<input type="submit" name="submit" value="Submit"/>';
    echo '<form/>';
    
    echo '<a href="Liste.php">Pas de groupes disponibles, cliquez pour voir les listes.</a>';

?>
