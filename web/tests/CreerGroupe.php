<?php

    require_once("connect.php");
    
    $nom = $_POST['nom'];
    $id_createur = $_POST['id'];
    
    if(empty($nom) || empty($id_createur) )
    {
        echo 'Veuillez remplir au moins le nom';
        System.exit();
    }
    
   
    $query = "INSERT INTO Groupe(nom,id_utilisateur) VALUES ('$nom','$id_createur')";
    $result = mysqli_query($co,$query);
    $id_groupe = mysqli_insert_id($co);
    
    //ajouter le créateur aux membres
    mysqli_query($co,"INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES ('$id_createur','$id_groupe')");
   
    
    echo 'Création réussie !';
    echo '<br/>';
    echo '<a href = "Groupe.php">Voir les groupes </a>';
    
    echo '<br/>';
    echo 'Ajouter des membres : ';
    echo '<br/>';
    echo ' <form method = "post" action="selectionnerMembre.php" >';
    
    echo '<input type="hidden" name = "id_groupe" value="'.$id_groupe.'"/>';
    echo '<input type="hidden" name = "id_createur" value="'.$id_createur.'"/>';
    
    echo '<input type="submit" name="submit" value="Ajouter des membres"/>';
    echo '<form/>';
    
    
?>