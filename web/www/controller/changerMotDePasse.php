<?php
    require_once("connect.php");
    include("../model/utilisateur.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $ancienMotDePasse = $_POST['ancienMotDePasse'];
    $nouveauMotDePasse = $_POST['nouveauMotDePasse'];
    $confirmation = $_POST['confirmation'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    echo 'id utilisateur = ' . $id_utilisateur . "<br>";



    $resultUser  = mysqli_query($co, "SELECT mdp FROM UtilisateurActif WHERE id_utilisateur = '$id_utilisateur'");

    $row = mysqli_fetch_assoc($resultUser);
    
    echo "pwd de la table = " . $row['mdp'] . "<br>";

    echo "pwd du form = " . $ancienMotDePasse;
    if(password_verify($ancienMotDePasse, $row['mdp'])) {
        echo 'trye';
    } else {
        echo 'false';
    }
    
	if (!(password_verify($ancienMotDePasse, $row['mdp']))) {
        echo "<script type='text/javascript'>alert('Votre ancien mot de passe ne correspond pas !'); window.location.href = '../view/modifInfos.php';</script>";
    }

    if ($nouveauMotDePasse != $confirmation) {
        echo "<script type='text/javascript'>alert('Confirmation du mot de passe erronée !'); window.location.href = '../view/modifInfos.php';</script>";
    } 

    $nouveauMotDePasse = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);

    $result = mysqli_query($co,"UPDATE UtilisateurActif SET mdp = '$nouveauMotDePasse' WHERE id_utilisateur = '$id_utilisateur'");

    if ($result) { 
        echo "<script type='text/javascript'>alert('Votre mot de passe a bien été changé !'); window.location.href = '../view/modifInfos.php';</script>";
    } else { 
        echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!'); window.location.href = '../view/modifInfos.php';</script>";
    }

