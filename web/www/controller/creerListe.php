<?php
  include("../model/cadeau.php");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once('../controller/connect.php');
  session_start();

  $nom = $_POST['nom'];
  $id = $_SESSION['id_utilisateur'];

  mysqli_query($co,"INSERT INTO Liste(libelle,id_utilisateur) VALUES ('$nom','$id')");

  header("Location:../view/mesListes.php");
?>
