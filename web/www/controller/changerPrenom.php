<?php
    require_once("connect.php");
    include("../model/utilisateur.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    session_start();
    $prenom = $_POST['prenom'];
    $id_utilisateur = $_SESSION['id_utilisateur'];
    $result = mysqli_query($co,"UPDATE Utilisateur SET prenom = '$prenom' WHERE id_utilisateur = '$id_utilisateur'");

    if ($result) { 
        $_SESSION['prenom'] = $prenom;
        echo "<script type='text/javascript'>alert('Votre prénom a bien été changé !'); window.location.href = '../view/modifInfos.php';</script>";
    } else { 
        echo "<script type='text/javascript'>alert('Unsuccessful - ERROR!'); window.location.href = '../view/modifInfos.php';</script>";
    }

