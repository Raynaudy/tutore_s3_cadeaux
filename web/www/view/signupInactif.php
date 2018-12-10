<?php
include("../model/utilisateur.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

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

  <link rel="stylesheet" type="text/css" media="screen" href="style/signup.css" />

</head>
<body class="text-center">
  <form class="form-signin rounded border border-danger" method = "post">
    <h2 class=" mb-4 mt-1 font-weight-normal">Bienvenue sur <b>Gift</b>list</h2>
    <p>Créez vous un compte afin d'accéder à toutes les fonctionnalités de notre service</p>

    <label for="inputNom" class="float-left mb-1">Nom : </label>
    <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>
    
    <label for="inputPrenom" class="float-left mb-1">Prénom : </label>
    <input type="text" id="inputPrenom" name="prenom" class="form-control input-text mb-1" placeholder="" required autofocus>
    
    <?php
    
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
      $nom     = $_POST['nom'];
      $prenom  = $_POST['prenom'];

      $checkNomPrenom = mysqli_query($co, "SELECT * FROM UtilisateurInactif,Utilisateur WHERE UtilisateurInactif.id_utilisateur = Utilisateur.id_utilisateur AND '$nom' = Utilisateur.nom AND '$prenom' = Utilisateur.prenom");

      if (mysqli_num_rows($checkNomPrenom) > 0) {
        echo '<p class="alert alert-danger">' . "Il existe déjà un utilisateur inactif nommé comme ca !" . '</p>';
      }
      else {
        $utilisateur = new utilisateur($co,$nom,$prenom);
        header("Location:groupe.php");
      }
    }

    ?>
    
    <button class="btn btn-lg btn-danger btn-block" type="submit">Créer mon compte !</button>
    <p><small>Compte existant ? <a class="text-danger" href="login.php">Clique ici !</a></small></p> 
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
  </form>
</body>
</html>