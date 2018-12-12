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

    $sql=("SELECT * FROM UtilisateurActif WHERE id_utilisateur = '$id_utilisateur'");
    $db_check=$co->query($sql);
    if(password_verify($ancienMotDePasse,$db_check->fetch_assoc()['mdp'])) {
        if ($nouveauMotDePasse != $confirmation) {
            echo "<script type='text/javascript'>alert('Confirmation du mot de passe erronée !'); window.location.href = '../view/modifInfos.php';</script>";
        } 
        $hashNouveauMotDePasse = password_hash($nouveauMotDePasse, PASSWORD_DEFAULT);
        $fetch=$co->query("UPDATE UtilisateurActif SET mdp = '$hashNouveauMotDePasse' WHERE id_utilisateur ='$id_utilisateur'");
        echo "<script type='text/javascript'>alert('Votre mot de passe a bien été changé !'); window.location.href = '../view/modifInfos.php';</script>";

    }

    

