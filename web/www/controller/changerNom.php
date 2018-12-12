<?php
    require_once("connect.php");
    include("../model/utilisateur.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $nom = $_POST['nom'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $result = mysqli_query($co,"UPDATE Utilisateur SET nom = '$nom' WHERE id_utilisateur = '$id_utilisateur'");

    if ($result) { 
        $_SESSION['nom'] = $nom;
        echo "<script type='text/javascript'>alert('Votre nom a bien été changé !'); window.location.href = '../view/modifInfos.php';</script>";
    } else { 
        echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!'); window.location.href = '../view/modifInfos.php';</script>";
    }

