<?php
        session_start();
        //si l'utilisateur n'est pas encore connecté
        if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
            echo 'redirection';
            
            header("Location:error503.php");
        }
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once('../controller/connect.php');

?>

<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Giftlist</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!--bootstrap-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" media="screen" href="../view/style/signup.css" />

</head>
<body class="text-center">

    <!--Créer un cadeau et l'insérer dans la liste-->

  <form class="form-signin rounded border border-danger" method = "post" action="creerCadeauListeInactif.php">
  <h2 class=" mb-4 mt-1 font-weight-normal">Créer un cadeau et l'ajouter à la liste </h2>
    <p>Rentrez les informations sur le cadeau : </p>
    
    <?php
    
    $id_liste = $_GET['id_liste'];
    $id_inactif = $_GET['id_util'];
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    echo '<input type="hidden" name = "id_inactif" value="'.$id_inactif.'"/>';
    
    echo '
    <label for="inputNom" class="float-left mb-1">Nom(*) : </label>
    <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>

    <label for="inputDesc" class="float-left mb-1">Description :</label>
    <input type="text" id="inputDesc" name="description" class="form-control bootstrap-overrides mb-1 rounded" placeholder="" autofocus>

    <label for="inputPrix" class="float-left mb-1">Prix :</label>
    <input type="text" id="inputPrix" name="prix" class="form-control bootstrap-overrides mb-3 rounded" placeholder="">

    <label for="inputLien" class="float-left mb-1">Lien :</label>
    <input type="text" id="inputLien" name="lien" class="form-control bootstrap-overrides mb-3 rounded" placeholder="">';
     
     ?>
    
    <button class="btn btn-lg btn-danger btn-block" type="submit">Créer et ajouter !</button>
    <p><small>Revenir aux listes ? <a class="text-danger" href="../view/listes.php">Clique ici !</a></small></p> 
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
    </form>
    
    
    
    <!--Selectionner des cadeaux existants-->
    
  <form class="form-signin rounded border border-danger" method = "post" action="../controller/ajouterCadeauListeInactif.php">
  <h2 class=" mb-4 mt-1 font-weight-normal">Ajouter des cadeaux </h2>
    <p>Selectionner les cadeaux à ajouter : </p>
    
    <?php
    
    $id_liste = $_GET['id_liste'];
    $id_inactif = $_GET['id_util'];
    
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    
    $all = "SELECT id_cadeau,nom FROM Cadeau WHERE id_utilisateur_est_souhaite = '$id_inactif'";
    $result = mysqli_query($co,$all);
    
    while ($row = mysqli_fetch_assoc($result))
    {
         $leCadeau = $row['id_cadeau'];
         $unCadeau = "SELECT id_cadeau FROM fait_partie WHERE id_cadeau = '$leCadeau' AND id_liste = '$id_liste'";
         $unCadeau = mysqli_query($co,$unCadeau);
    
        if(mysqli_num_rows($unCadeau) <1)
        { 
            echo '<input type="checkbox" name = "cadeau[]" value="'.$row['id_cadeau'].'"/><label>'.$row['nom'].'</label>';
            echo '<br/>';
        }
    }
     ?>
    
    <button class="btn btn-lg btn-danger btn-block" type="submit">Ajouter !</button>
    <p><small>Revenir aux listes ? <a class="text-danger" href="../view/listes.php">Clique ici !</a></small></p> 
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
    </form>
</body>
</html>