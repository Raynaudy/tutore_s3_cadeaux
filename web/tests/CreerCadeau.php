<?php

    require_once("connect.php");
    
    $nom = $_POST['nom'];
    $id = $_POST['id'];
    
    if(empty($nom))
    {
        echo 'Veuillez remplir au moins le nom';
        System.exit();
    }
    
    
    
    if(empty($id))
    {
        $query = "INSERT INTO Cadeau(nom) VALUES ('$nom')";
        $result = mysqli_query($co,$query);
        $id_cadeau = mysqli_insert_id($co);
    }
    else 
    {
        $query = "INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES ('$nom','$id')";
        $result = mysqli_query($co,$query);
        $id_cadeau = mysqli_insert_id($co);
    }
    
    echo 'Création réussie !';
    echo '<br/>';
    echo '<a href = "Cadeau.php">Voir les cadeaux </a>';
    
    echo '<br/> Ajouter ce cadeau a une liste : ';
    
    echo '<form method = "post" action="selectionnerListe.php" >';
    
    echo '<input type="hidden" name = "id_cadeau" value="'.$id_cadeau.'"/>';
    echo '<input type="hidden" name = "id_createur" value="'.$id.'"/>';
    echo '<input type="submit" value = "Ajouter à des listes"/>';
    echo '<form/>';
    
?>