
<!DOCTYPE html>
<html lang="fr">
  <head>
  	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Groupe | Giftlist </title>
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
                  <div class="btn-group btn-lg" >
                    <a class="btn btn-lg btn-danger active" href="groupe.php">Groupes</a>
                    <a class="btn btn-lg btn-danger " href="listes.php">Listes</a>
                   </div>
                   <a class="btn btn-lg btn-danger" href="cadeaux.php">Cadeaux</a>
                </nav>
              </div>
              <div class="col-sm-2">
               <div class="dropdown show btn-lg float-md-right float-lg-right float-xl-right">
                  <a class="btn btn-lg btn-link dropdown-toggle color-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bonjour <?php session_start(); echo $_SESSION['prenom']." ".$_SESSION['nom'];?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Voir mon profil</a>
                    <a class="dropdown-item" href="#">Créer un compte invité</a>
                    <a class="dropdown-item" href="#">Se loguer en tant que xxx </a>
                    <a class="dropdown-item" href="login.php">Se déconnecter</a>
                  </div>
                </div>
              </div>
          </div>
      </div>

     <div class="album py-5">
        <div class="container">

          <div class="row"> <!-- 3 card per row -->

          <?php
          require_once('../controller/connect.php');

          error_reporting(E_ALL);
          ini_set('display_errors', 1);
          
          $id_utilisateur = $_SESSION['id_utilisateur'];
          
          $groupes = "SELECT * FROM Groupe";
          $groupes = mysqli_query($co,$groupes);
          
          
          while($row = mysqli_fetch_assoc($groupes))
          {
                //il faut les réinitialiser à chaque passage de la boucle -.-
                $est_membre = true;
                $est_invite = true;
                $is_owner = false;
          
                $id_groupe = $row['id_groupe'];
                $owner = $row['id_utilisateur'];
                
                //est le propriétaire
                if($owner == $id_utilisateur)
                {
                    $is_owner = true;
               
                }
                else 
                {
                
                    //déterminer si l'utilisateur est invité ou membre
                    $membres = "SELECT * FROM est_membre WHERE id_groupe = '$id_groupe' AND id_utilisateur = '$id_utilisateur'";
                    $membre = mysqli_query($co,$membres);
                    if(mysqli_num_rows($membre) < 1)
                    {
                        $est_membre = false;
                        //déterminer si l'utilisateur est invité ou membre
                        $invites = "SELECT * FROM est_invite WHERE id_groupe = '$id_groupe' AND id_utilisateur_est_invite = '$id_utilisateur'";
                        $invite = mysqli_query($co,$invites);
                        if(mysqli_num_rows($invite) < 1) $est_invite = false;
                    }
                }
               
                //récupérer le nombre de membres
                $membre = "SELECT * FROM est_membre WHERE id_groupe = '$id_groupe'";
                $membre = mysqli_query($co,$membre);
                
                //afficher le groupe
                if($is_owner === true)
                {
                    echo '
                    <!-- card - group owner -->
                    <div class="col-md-4">
                    <a href="listes.php" class="d-block nounderline">
                        <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h1 class="display-4 pb-3">'.mysqli_real_escape_string($co,$row['nom']).'</h2>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Renommer</button>
                            </div>
                            <small class="text-muted">'.mysqli_num_rows($membre).' membres</small>
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>';
                }
                elseif($est_membre === true)
                {
                
                    echo '
                    <!-- card - simple user -->
                    <div class="col-md-4">
                    <a href="#" class="d-block nounderline">
                        <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h1 class="display-4 pb-3">'.mysqli_real_escape_string($co,$row['nom']).'</h2>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group invisible "> <!-- put invisible if the user is not the owner -->
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Renommer</button>
                            </div>
                            <small class="text-muted">'.mysqli_num_rows($membre).' membres</small>
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>';
                }
                elseif($est_invite === true)
                {
                    echo '
                    <!-- card - not yet accepted -->
                    <div class="col-md-4">
                    <a href="#" class="d-block nounderline">
                        <div class="card mb-4 box-shadow bg-light">
                        <div class="card-body ">
                            <h1 class="display-4 pb-3">'.mysqli_real_escape_string($co,$row['nom']).'</h2>
                            <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group ">
                                <button type="button" class="btn btn-sm btn-outline-secondary btn-accept">Accepter</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary  btn-deny">Refuser</button>
                            </div>
                            <small class="text-muted invisible">'.mysqli_num_rows($membre).' membres</small> <!-- if the user is not in the group yet, do not show number of users -->
                            </div>
                        </div>
                        </div>
                    </a>
                    </div>';
                }
            }
            
            ?>
            
            <!-- has to be the last card -->
            <div class="col-md-4">
              <a data-toggle="modal" data-target="#exampleModal" class="d-block nounderline">
                <div class="card mb-4 box-shadow">
                  <div class="card-body">
                    <h1 class="display-4 text-center"> <i class="fas fa-plus"></i></h2>
                  </div>
                </div>
              </a>
            </div>
            
            <!--créer un groupe-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Créer un nouveau groupe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method = "post" action="../controller/creerGroupe.php">
                    <label for="inputNom" class="float-left mb-1">Nom : </label>
                    <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Créer</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!---->
            
          </div>
        </div>
      </div>

  </body>
</html>