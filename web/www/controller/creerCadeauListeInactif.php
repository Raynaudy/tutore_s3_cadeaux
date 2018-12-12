<?php
  include("../model/cadeau.php");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once('../controller/connect.php');
  
  $id_util = $_POST['id_inactif'];
  $id_liste = $_POST['id_liste'];

  $nom = $_POST['nom'];
  $description = $_POST['description'];
  $prix = $_POST['prix'];
  $lien = $_POST['lien'];

  $cadeau = new cadeau($co,$nom,$description,$prix,$lien,$id_util);
  $id_cadeau = $cadeau->getID();
  
  mysqli_query($co,"INSERT INTO fait_partie(id_cadeau,id_liste) VALUES ('$id_cadeau','$id_liste')");
  
  header("Location:../view/listes.php");
?>
