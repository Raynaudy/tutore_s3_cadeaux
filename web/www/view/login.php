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
		<h1 class="h4 mb-4 mt-1 font-weight-normal">Connectez vous sur <b>Gift</b>list</h1>
		<p>Connectez vous afin d'accéder à toutes les fonctionnalités de notre service</p>

		<label for="inputEmail" class="sr-only">Identifiant</label>
		<input type="text" name="login" id="inputEmail" class="form-control bootstrap-overrides" placeholder="E-mail" required autofocus>
		<label for="inputPassword" class="sr-only">Password</label>
		<input type="password" id="inputPassword" name="mdp" class="form-control" placeholder="Mot de passe" required>
		
		<?php

		if ('POST' == $_SERVER['REQUEST_METHOD']) {
			$login = mysqli_real_escape_string($co, $_POST['login']);
			$mdp   = mysqli_real_escape_string($co, $_POST['mdp']);
			
			
			$getUser = "SELECT id_utilisateur, mdp FROM UtilisateurActif WHERE login = '$login'";
			$result  = mysqli_query($co, $getUser);
			
			if (mysqli_num_rows($result) < 1) {
				echo '<p class="alert alert-danger">Mail incorrect ! Réessayez.</p>';
			} 
			else {
				$result = mysqli_fetch_assoc($result);
				if (password_verify($mdp, $result['mdp'])) 
				{
                                    $utilisateur = new utilisateur($co,$result['id_utilisateur'],$login,$mdp);
                                    header("Location:groupe.php");
				} 
				else
				{
                                    echo '<p class="alert alert-danger">Mot de passe incorrect ! Réessayez.</p>';
				}
			}
		}

		?>

		<button class="btn btn-lg btn-danger btn-block" type="submit">Se connecter !</button>
		<p><small>Pas encore de compte ? <a class="text-danger" href="signup.php">Clique ici !</a></small></p> 
		<p class="mt-3 mb-0 text-muted">&copy; 2018</p>
	</form>
</body>
</html>