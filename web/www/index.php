<?php
    //comment
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	require_once('controller/connect.php');

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>GiftList - les cadeaux de noël réiventés</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" media="screen" href="view/style/main.css" />

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- FA Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
      <nav class="navbar navbar-expand-lg transp ">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars fa-lg"></i></span>
          </button>
          <a class="navbar-brand " href="index.php"><span class="mb-0 h2 text-danger "><b>Gift</b>list</span></a>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              <li class="form-inline my-2 my-lg-0">
                <a href="view/signup.php" class="btn btn-outline-danger my-2 my-sm-0 mr-2">S'inscrire</a>
              </li> 
            <li class="form-inline my-2 my-lg-0">
                <a href="view/login.php" class="btn btn-danger  my-2 my-sm-0" >Se connecter</a>
              </li> 
            </ul>
          </div>
       </nav>

      <header class="masthead ">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="content-box">
                    </div>
                </div>
            <div class="col-sm-8">
                <div class="content-box absolute">
                    <div class="text-right red">
                        <div class="h1">Bienvenue, </div>
                        <br>
                        <div class="h2">N'achetez plus jamais de cadeau en double grâce à <b>Gift</b>list</div>
                    </div>
                </div>
            </div>
        </div>
    </header> 
  </body>
</html>