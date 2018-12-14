<?php
include("../model/utilisateur.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

$id_cadeau = $_POST['id_cadeau'];
$result = mysqli_query($co,"SELECT nom,description,prix,lien FROM Cadeau WHERE id_cadeau = '$id_cadeau'");
$result = mysqli_fetch_assoc($result);
$nom = $result['nom'];
$description = $result['description'];
$prix = $result['prix'];
$lien = $result['lien'];

?>

<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sign up - Giftlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" media="screen" href="../view/style/signup.css" />

</head>
<body class="text-center">
  <form class="form-signin rounded border border-danger" method = "post" action="updateCadeau.php">
    <h2 class=" mb-4 mt-1 font-weight-normal">Modifier un cadeau</h2>
    <p>Modifiez les champs </p>
    <input type="hidden" name="id_cadeau" value ="<?php  echo $id_cadeau;?>">

    <label for="inputNom" class="float-left mb-1">Nom : </label>
    <input type="text" id="inputNom" name="nom" value ="<?php  echo $nom;  ?>" class="form-control input-text mb-1" placeholder="" required autofocus>
    
    <label for="inputPrenom" class="float-left mb-1">Description : </label>
    <input type="text" id="inputDesc" name="desc" value ="<?php  echo $description;  ?>" class="form-control input-text mb-1" placeholder="" autofocus>

    <label for="inputEmail" class="float-left mb-1">Prix :</label>
    <input type="text" id="inputPrix" name="prix" value ="<?php  echo $prix;  ?>" class="form-control bootstrap-overrides mb-1 rounded" placeholder="" autofocus>

    <label for="inputPassword" class="float-left mb-1">Lien :</label>
    <input type="text" id="inputLien" name="lien" value ="<?php  echo $lien;  ?>" class="form-control bootstrap-overrides mb-3 rounded" placeholder="">
    
    <button class="btn btn-lg btn-danger btn-block" type="submit">Modifier ce cadeau !</button>
    <p><small>Plus envie de le modifier ? <a class="text-danger" href="../controller/cadeaux.php">Clique ici !</a></small></p> 
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
  </form>
</body>
</html>