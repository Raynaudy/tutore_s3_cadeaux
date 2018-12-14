<?php
  include("../model/cadeau.php");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once('../controller/connect.php');
  session_start();

  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $lien = $_POST['lien'];
  $img = $_POST['img'];

  $cadeau = new cadeau($co,$nom,$description,$prix,$lien,$img,$_SESSION['id_utilisateur']);

  header("Location:../view/cadeaux.php");
?>
