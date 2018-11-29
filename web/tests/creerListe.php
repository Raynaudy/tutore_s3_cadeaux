<?php

    require_once("connect.php");
    
    $nom = $_POST['nom'];
    $id_utilisateur = $_POST['id'];
    
    if(empty($nom) || empty($id_utilisateur) )
    {
        echo 'Veuillez remplir les champs';
        System.exit();
    }
    
   
    $query = "INSERT INTO Liste(libelle,id_utilisateur) VALUES ('$nom','$id_utilisateur')";
    $result = mysqli_query($co,$query);
    $id_liste = mysqli_insert_id($co);
    
    echo 'Création réussie !';
    echo '<br/>';
    echo '<a href = "Liste.php">Voir les listes </a>';
    
    echo '<br/>';
    echo 'Ajouter des cadeaux : ';
    echo '<br/>';
    
    echo ' <form method = "post" action="selectionnerCadeau.php" >';
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    echo '<input type="hidden" name = "id_createur" value="'.$id_utilisateur.'"/>';
    
    echo '<input type="submit" name="submit" value="Ajouter des cadeaux"/>';
    echo '<form/>';
    
    
?>