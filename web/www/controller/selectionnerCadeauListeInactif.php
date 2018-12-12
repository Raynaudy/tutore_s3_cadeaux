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
  <form class="form-signin rounded border border-danger" method = "post" action="ajouterCadeauxListe.php">
  <h2 class=" mb-4 mt-1 font-weight-normal">Invitez des amis </h2>
    <p>Selectionner les cadeaux à ajouter : </p>
    
    <?php
    
    $id_liste = $_POST['id_liste'];
    $id_inactif = $_POST['id_inactif'];
    echo '<input type="hidden" name = "id_liste" value="'.$id_liste.'"/>';
    
    $all = "SELECT id_cadeau,nom FROM Cadeau WHERE id_utilisateur_est_souhaite = '$id_createur'";
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
    <p><small>Pas de cadeaux a ajouter ? Créé en des nouveaux,<a class="text-danger" href="../view/cadeaux.php">Clique ici !</a></small></p> 
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
    </form>
</body>
</html>