<?php

    require_once("connect.php");
    
    $mail = $_POST['login'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    
    
    if(empty($nom) || empty($prenom) || empty($mail) || empty($mdp))
    {
        echo 'Veuillez remplir les champs';
        System.exit();
    }
    
    if(!preg_match("#^[^@]+@[^@]+\.[a-zA-Z]{2,3}$#",$mail))
    {
        echo 'login érroné ! Rappel : abcdef@xyz.com';
        System.exit();
    }
    
    
    $query = "INSERT INTO Utilisateur(nom,prenom) VALUES ('$nom', '$prenom')";
    $result = mysqli_query($co,$query);
    $id_utilisateur = mysqli_insert_id($co);
   
    $query = "INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES ('$id_utilisateur','$mail','$mdp')";
    $result=mysqli_query($co,$query);
    
    echo 'Inscription réussie !';
    echo '<br/>';
    echo '<a href = "Utilisateur.php">Voir les tables </a>';
    
?>