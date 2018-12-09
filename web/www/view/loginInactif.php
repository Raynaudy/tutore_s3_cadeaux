<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include('../model/utilisateur.php');
require_once('../controller/connect.php');

?>

<html lang="fr">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login - Giftlist</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" media="screen" href="style/login.css" />

</head>
<body class="text-center">
	<form class="form-signin rounded border border-danger" method = "post">
		<p>Connectez vous en tant qu'un utilisateur inactif</p>

		<label for="inputSurname" class="sr-only">Prenom</label>
		<input type="text" id="inputSurname" name="prenom" class="form-control" placeholder="Prenom" required>
		
		<label for="inputName" class="sr-only">Nom</label>
		<input type="text" name="nom" id="inputName" class="form-control bootstrap-overrides" placeholder="Nom" required autofocus>
		
		<?php
                session_start();
		if ('POST' == $_SERVER['REQUEST_METHOD']) {
			$nom = mysqli_real_escape_string($co, $_POST['nom']);
			$prenom   = mysqli_real_escape_string($co, $_POST['prenom']);
			
			
			$getUser = "SELECT UtilisateurInactif.id_utilisateur FROM Utilisateur, UtilisateurInactif WHERE UtilisateurInactif.id_utilisateur = Utilisateur.id_utilisateur AND Utilisateur.nom = '$nom' AND Utilisateur.prenom = '$prenom'";
			$result  = mysqli_query($co, $getUser);
			
			if (mysqli_num_rows($result) < 1) 
			{
				echo '<p class="alert alert-danger">Nom incorrect ! Réessayez.</p>';
			} 
			else 
			{
				$result = mysqli_fetch_assoc($result);
                                $_SESSION['utilisateur']->ajouterInactif($result['id_utilisateur'],$nom,$prenom);
                                header("Location:groupe.php");
			}
		}

		?>

		<button class="btn btn-lg btn-danger btn-block" type="submit">Se connecter !</button>
		<p><small>Ajouter un nouvel utilisateur inactif ? <a class="text-danger" href="signupInactif.php">Clique ici !</a></small></p> 
		<p class="mt-3 mb-0 text-muted">&copy; 2018</p>
	</form>
</body>
</html>