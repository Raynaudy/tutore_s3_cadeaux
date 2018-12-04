<?php

    require_once("connect.php");
    
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
    
    if(empty($nom) || empty($prenom))
    {
        echo 'Veuillez remplir les champs';
        System.exit();
    }
    
    $query = "INSERT INTO Utilisateur(nom,prenom) VALUES ('$nom', '$prenom')";
    $result = mysqli_query($co,$query);
    $id_utilisateur = mysqli_insert_id($co);
   
    $query = "INSERT INTO UtilisateurInactif(id_utilisateur) VALUES ('$id_utilisateur')";
    $result=mysqli_query($co,$query);
    
    echo 'Inscription réussie !';
    echo '<br/>';
    echo '<a href = "Utilisateur.php">Voir les tables </a>';
?>