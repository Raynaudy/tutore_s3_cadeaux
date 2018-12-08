<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('connect.php');
session_start();

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
  <form class="form-signin rounded border border-danger" method = "post" action="ajouterMembre.php">
  <h2 class=" mb-4 mt-1 font-weight-normal">Invitez des amis </h2>
    <p>Selectionner les membres à ajouter : </p>
    
    <?php
    
    $id_groupe = $_POST['id'];
    $id_createur = $_SESSION['id_utilisateur'];
    
    echo '<input type="hidden" name = "id_groupe" value="'.$id_groupe.'"/>';
    echo '<input type="hidden" name = "id_createur" value="'.$id_createur.'"/>';
    

    $all = "SELECT id_utilisateur,nom,prenom FROM Utilisateur";
    $result = mysqli_query($co,$all);
    
    
    while ($row = mysqli_fetch_assoc($result))
    {
        $id = $row['id_utilisateur'];
        //si il est ni membre ni invité, alors proposer
        $membres = "SELECT * FROM est_membre WHERE id_groupe = '$id_groupe' AND id_utilisateur = '$id'";
        $membre = mysqli_query($co,$membres);
        
        if(mysqli_num_rows($membre) < 1)
        {
            //déterminer si l'utilisateur est invité ou membre
            $invites = "SELECT * FROM est_invite WHERE id_groupe = '$id_groupe' AND id_utilisateur_est_invite = '$id'";
            $invite = mysqli_query($co,$invites);
            if(mysqli_num_rows($invite) < 1)
            {
                echo '<input type="checkbox" name = "membre[]" value="'.$id.'"/><label>'.$row['prenom'].' '.$row['nom'].'</label>';echo '<br/>';
            }
        }

    }
    ?>

    <button class="btn btn-lg btn-danger btn-block" type="submit">Ajouter !</button>
    <p class="mt-3 mb-0 text-muted">&copy; 2018</p>
  </form>
</body>
</html>