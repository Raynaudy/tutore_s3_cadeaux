<?php
        session_start();
        //si l'utilisateur n'est pas encore connecté
        if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) 
        {
            echo 'redirection';
            
            header("Location:error503.php");
        }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Listes | Giftlist </title>
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
                    <a class="btn btn-lg btn-danger " href="groupe.php">Groupes</a>
                    <a class="btn btn-lg btn-danger active" href="mesListes.php">Listes</a>
                    <a class="btn btn-lg btn-danger" href="cadeaux.php">Cadeaux</a>
                   </div>
                </nav>
              </div>
              <div class="col-sm-2">
               <div class="dropdown show btn-lg float-md-right float-lg-right float-xl-right">
                  <a class="btn btn-lg btn-link dropdown-toggle color-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $_SESSION['prenom']." ".$_SESSION['nom'];?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="modifInfos.php">Voir mon profil</a>
                    <a class="dropdown-item" href="#">Créer un compte invité</a>
                    <a class="dropdown-item" href="../controller/logout.php">Se déconnecter</a>
                  </div>
                </div>
              </div>
          </div>
      </div>
<div class="container h-75">
  <h2 class="text-center pb-5 "></h2>
    <div class="container-cards h-100">

            <?php
            require_once('../controller/connect.php');

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            $id_utilisateur = $_SESSION['id_utilisateur'];
            $listes = mysqli_query($co,"SELECT * FROM Liste WHERE id_utilisateur = '$id_utilisateur'");
            
            while($row = mysqli_fetch_assoc($listes))
            {
              $libelle = $row['libelle'];
              $id_liste = $row['id_liste'];
              $cadeaux = mysqli_query($co,"SELECT Cadeau.nom,Cadeau.id_cadeau FROM Cadeau,fait_partie WHERE Cadeau.id_cadeau = fait_partie.id_cadeau AND fait_partie.id_liste = '$id_liste'");
              
              echo '<div class="col-md-3">';
                echo '<div class="card h-100">';
                  echo '<div class="card-header">';
                    echo $libelle;
                  echo '</div>';
                  echo '<div class="card-body">';
                    echo '<ul>';
                    while($rowCadeaux = mysqli_fetch_assoc($cadeaux)){
                      echo '<li>'.$rowCadeaux['nom'].'<a href = "../controller/supprimerCadeauListe.php?id_cadeau='.$rowCadeaux['id_cadeau'].'&id_liste='.$id_liste.'"><i class="far fa-trash-alt float-right"></i></a></li>';
                    }
                    echo '</ul>';
                  echo '</div>';
                  echo '<div class="card-footer">';
                    echo '<form class="mt-1 mb-3 text-center" method = "post" action = "../view/selectionnerCadeauListe.php">';
                      echo '<input type="hidden" name = "id_liste" value ="'.$id_liste.'" >';
                      echo '<button type="submit"  class="btn btn-outline-danger  my-2 my-sm-0">Ajouter un cadeau à la liste</button>';
                    echo '</form>';
                    echo '<form class="mt-1 mb-3 text-center" method = "post" action = "../controller/supprimerListe.php">';
                      echo '<input type="hidden" name = "id_liste" value ="'.$id_liste.'" >';
                      echo '<button type="submit"  class="btn btn-danger  my-2 my-sm-0">Supprimer la liste</button>';
                     echo '</form>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';

              }
              ?>

            <!-- has to be the last card -->
            <div class="col-md-3">
                <a data-toggle="modal" data-target="#modalCreerListe" class="d-block nounderline">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h1 class="display-4 text-center"> <i class="fas fa-plus"></i></h1>
                        </div>
                    </div>
                </a>
            </div>

            <!--créer une liste-->
            <div class="modal fade" id="modalCreerListe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Créer une nouvelle liste</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method = "post" action="../controller/creerListe.php">
                                <label for="inputNom" class="float-left mb-1">Nom : </label>
                                <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</body>
</html>