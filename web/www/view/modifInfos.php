<?php
        session_start();
        //si l'utilisateur n'est pas encore connecté
        if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
            echo 'redirection';
            
            header("Location:error503.php");
        }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modifier mes infos perso | Giftlist </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--custom css-->

    <link rel="stylesheet" type="text/css" media="screen" href="style/app.css" />
    <!-- FA Icon -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  </head>
  <body>
      <div class="container-fluid pt-1">
          <div class="row">
              <div class="col-sm-2 ">
                  <span class="mb-0 h1 text-danger pl-1 "><b>Gift</b>list</span></a>
              </div>
              <div class="col-sm-8 text-center">
                <nav>
                 
                    <a class="btn btn-lg btn-danger mt-2" href="groupe.php">Retourner à mes groupes</a>
                </nav>
              </div>
              <div class="col-sm-2">
               <div class="dropdown show btn-lg float-md-right float-lg-right float-xl-right">
                  <a class="btn btn-lg btn-link dropdown-toggle color-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php 
                    echo $_SESSION['prenom']." ".$_SESSION['nom'];    
                    ?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="modifInfos.php">Voir mon profil</a>
                    <a class="dropdown-item" href="#">Créer un compte invité</a>
                    <a class="dropdown-item" href="loginInactif.php">Se loguer en tant que xxx </a>
                    <a class="dropdown-item" href="../controller/logout.php">Se déconnecter</a>
                  </div>
                </div>
              </div>
          </div>
      </div>

      <div class="container col-md-7 mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="mb-4 mt-2">Mon profil : </h1>
                <span class="pt-1"><strong>Mon prénom :</strong> <?php echo $_SESSION['prenom']; ?> <a data-toggle="modal" data-target="#modalModifierPrenom" class=" btn btn-outline-danger btn-sm float-right ">Modifier prénom</a></span>
                <span class="pt-1"><strong>Mon nom :</strong> <?php echo $_SESSION['nom']; ?> <a data-toggle="modal" data-target="#modalModifierNom" class=" btn btn-outline-danger btn-sm float-right ">Modifier nom</a></span>
                <span class="pt-1"><strong>Mon mot de passe :</strong> ••••••••••••  <a data-toggle="modal" data-target="#modalModifierMotDePasse" class=" btn btn-outline-danger btn-sm float-right ">Modifier mot de passe</a></span>
            </div>
        </div>
      </div>


        <!--Modifier prenom-->
        <div class="modal fade" id="modalModifierPrenom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier mon prénom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action="../controller/changerPrenom.php">
                        <label for="inputPrenom" class="float-left mb-1">Mon nouveau prénom : </label>
                        <input type="text" id="inputPrenom" name="prenom" class="form-control input-text mb-1" placeholder="" required autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!--Modifier nom-->
        <div class="modal fade" id="modalModifierNom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier mon nom</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action="../controller/changerNom.php">
                        <label for="inputNom" class="float-left mb-1">Mon nouveau nom : </label>
                        <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


          <!--Modifier mot de passe-->
          <div class="modal fade" id="modalModifierMotDePasse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier mon mot de passe</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method = "post" action="../controller/changerMotDePasse.php">
                        <label for="inputAncienMotDePasse" class="float-left mb-1">Mon ancien mot de passe : </label>
                        <input type="password" id="inputAncienMotDePasse" name="ancienMotDePasse" class="form-control input-text mb-1" placeholder="" required autofocus>

                        <label for="inputNouveauMotDePasse" class="float-left mb-1">Mon nouveau mot de passe : </label>
                        <input type="password" id="inputNouveauMotDePasse" name="nouveauMotDePasse" class="form-control input-text mb-1" placeholder="" required>

                        <label for="inputConfirmation" class="float-left mb-1">Confirmation : </label>
                        <input type="password" id="inputConfirmation" name="confirmation" class="form-control input-text mb-1" placeholder="" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-danger">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     

  </body>
</html>