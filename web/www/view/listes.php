<?php
  require_once('../controller/connect.php');
  error_reporting(E_ALL);
  ini_set('display_errors', 1);             

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
              <a class="btn btn-lg btn-danger active" href="groupe.php">Groupes</a>
              <a class="btn btn-lg btn-danger" href="mesListes.php">Listes</a>
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
    <div class=" mt-5 container h-75">
      <div class="row h-100 ">
        <div class="col-md-3 border-right">
          <div class="card h-100" >
              <?php 
              if ('POST' == $_SERVER['REQUEST_METHOD']) 
              {
                $id_groupe = $_POST['id_groupe'];
                $_SESSION['id_groupe'] = $id_groupe;
              }
              else $id_groupe = $_SESSION['id_groupe'];
                
              $id_utilisateur = $_SESSION['id_utilisateur'];

              $nom_groupe = mysqli_fetch_assoc(mysqli_query($co,"SELECT nom FROM Groupe WHERE id_groupe = '$id_groupe'"));
                
              $liste = mysqli_query($co,"SELECT Liste.id_liste,Liste.libelle FROM Liste,est_partagee WHERE Liste.id_liste = est_partagee.id_liste AND est_partagee.id_groupe = '$id_groupe' AND Liste.id_utilisateur = '$id_utilisateur'");

              if (mysqli_num_rows($liste) == 0){ // Si l'utilisateur n'a pas de liste dans ce groupe
                echo '<div class="card-body">';
                echo '<button type="button" data-toggle="modal" data-target="#modalAjouterListe"class="btn btn-outline-danger  my-2 my-sm-0">Ajouter une liste au groupe</button>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<button type="button" data-toggle="modal" data-target="#modalAjouterListeInactif"class="btn btn-outline-danger  my-2 my-sm-0">Ajouter une liste inactif</button>';
                echo '</div>';
              }
              else { //Si l'utilisateur a une liste
                $liste = mysqli_fetch_assoc($liste);
                $libelle_liste = $liste['libelle'];
                $id_liste = $liste['id_liste'];

                echo '<div class="card-header">';
                echo $libelle_liste;
                echo '</div>';

                echo '<div class="card-body">';
                $cadeaux = "SELECT Cadeau.nom, Cadeau.id_cadeau FROM fait_partie, Cadeau WHERE fait_partie.id_liste  = '$id_liste' AND fait_partie.id_cadeau = Cadeau.id_cadeau";
                $cadeaux = mysqli_query($co,$cadeaux);

                echo '<ul>';
                while($row = mysqli_fetch_assoc($cadeaux)){
                  echo '<li>'.$row['nom'].'<a href = "../controller/supprimerCadeauListe.php?id_cadeau='.$row['id_cadeau'].'&id_liste='.$id_liste.'"><i class="far fa-trash-alt float-right"></i></a></li>';
                }
                echo '</ul>';
                echo '<form method = "post" action = "../view/selectionnerCadeauListe.php">';
                echo '<input type="hidden" name = "id_liste" value ="'.$id_liste.'" >';
                echo '<button type="submit" class="btn btn-outline-danger  my-2 my-sm-0">Ajouter un cadeau</button>';
                echo '</form>';
                echo '<!--<span class="text-danger"><i class="fas fa-plus"></i><a class="text-danger" href=""> <u>Ajouter un cadeau</u></a></span>-->';
                echo '<a class="btn btn-primary btn-outline-danger" href="../view/cadeaux.php" role="button">Editer mes cadeaux</a>';
                echo '</div>';

                echo '<div class="card-footer">';
                echo '<button type="button" data-toggle="modal" data-target="#modalAjouterListeInactif"class="btn btn-outline-danger  my-2 my-sm-0">Ajouter une liste inactif</button>';
                echo '<form method = "post" action = "../controller/retirerListeGroupe.php">';
                echo '<button type="submit" class="btn btn-danger  my-2 my-sm-0">Retirer cette liste</button>';
                echo '<input type="hidden" name = "id_liste" value ="'.$id_liste.'" >';
                echo '<input type="hidden" name = "id_groupe" value="'.$id_groupe.'">';
                echo '</form>';
                echo '</div>';
              }
              ?>
          </div>
        </div>

        <!--Ajouter une liste-->
        <div class="modal fade" id="modalAjouterListe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une liste</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method = "post" action="../controller/ajouterListeGroupe.php">
                <?php 
                  $listes = mysqli_query($co,"SELECT libelle,id_liste FROM Liste WHERE id_utilisateur = '$id_utilisateur'");
                  while($row = mysqli_fetch_assoc($listes)){
                    echo '<li>'.$row['libelle'].'<input type="radio" name="selectedListe" value="'.$row['id_liste'].'"/></li>';
                  }
                ?>
                <input type="hidden" name = "id_groupe" value="<?php echo $id_groupe;?>">
                <button class="btn btn-primary btn-danger" type="submit">Ajouter au groupe</a>
              </form>
            </div>
          </div>
        </div>
        </div>

        <!--Ajouter une liste inactif-->
        <div class="modal fade" id="modalAjouterListeInactif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ajouter une liste pour un utilisateur inactif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form method = "post" action="../controller/ajouterListeGroupeInactif.php">
                <?php 
                  $listes = mysqli_query($co,"SELECT liste.libelle,liste.id_liste,utilisateur.prenom, utilisateur.nom FROM Liste,Utilisateur,UtilisateurInactif WHERE liste.id_utilisateur = utilisateur.id_utilisateur AND utilisateur.id_utilisateur = utilisateurInactif.id_utilisateur");
                  while($row = mysqli_fetch_assoc($listes)){
                    echo '<li>'.$row['libelle'].'<input type="radio" name="selectedListe" value="'.$row['id_liste'].'"/></li>';
                  }
                ?>
                <input type="hidden" name = "id_groupe" value="<?php echo $id_groupe;?>">
                <button class="btn btn-primary btn-danger" type="submit">Ajouter au groupe</a>
              </form>
            </div>
          </div>
        </div>
        </div>

        <div class="col-md-9  h-75">
          <h2 class="text-center pb-5 "> <?php echo $nom_groupe['nom']; ?></h2>
          <div class="container-cards h-100">
            <?php
              $membres = mysqli_query($co,"SELECT Liste.id_utilisateur, Utilisateur.nom, prenom, Liste.id_liste FROM Liste, est_partagee, Utilisateur WHERE Liste.id_liste = est_partagee.id_liste AND Liste.id_utilisateur = Utilisateur.id_utilisateur AND est_partagee.id_groupe = '$id_groupe' AND Utilisateur.id_utilisateur != '$id_utilisateur'");
              
              while($row =  mysqli_fetch_assoc($membres))
              {
              
                $id_util = $row['id_utilisateur'];
                $id_liste = $row['id_liste'];
                
                $inactif = mysqli_query($co,"SELECT id_utilisateur FROM UtilisateurInactif WHERE id_utilisateur = '$id_util'");
                if(mysqli_num_rows($inactif) >= 1)
                {   
                    $inactif = true;
                }else $inactif=false;
              
                echo ' <div class="card mw mr-3 mb-2  mb-2">
                <div class="card-header">'.mysqli_real_escape_string($co,$row['prenom']).' '.mysqli_real_escape_string($co,$row['nom']).'</div>
                <div class="card-body">
                ';
              
              
                $cadeaux = "SELECT Cadeau.nom, Cadeau.id_cadeau, Cadeau.id_utilisateur FROM est_partagee,fait_partie,Cadeau,Liste WHERE est_partagee.id_groupe = '$id_groupe' AND est_partagee.id_liste = Liste.id_liste AND fait_partie.id_cadeau = Cadeau.id_cadeau AND Liste.id_utilisateur = '$id_util' AND Liste.id_liste = fait_partie.id_liste";
                $cadeaux = mysqli_query($co,$cadeaux);
              
                while($rowInt = mysqli_fetch_assoc($cadeaux))
                {
              
                 if($rowInt['id_utilisateur'] == NULL) 
                 {
                  echo ' <div class="form-check">
                  <label class="form-check-label">
                  <a href = "../controller/acheterCadeau.php?id_cadeau='.$rowInt['id_cadeau'].'"><i class="far fa-square"></i></a>&nbsp'.$rowInt['nom'].'';
                  if($inactif == true)
                    echo '<a href = "../controller/supprimerCadeauListe.php?id_cadeau='.$rowInt['id_cadeau'].'&id_liste='.$id_liste.'"><i class="far fa-trash-alt float-right"></i></a></li>';
                 
                  echo '
                    </label>
                  </div>
                  ';
                }
                else
                {
                 echo ' <div class="form-check">
                 <label class="form-check-label">
                 <i class="far fa-check-square"></i>'.$rowInt['nom'].'
                 </label>
                 </div>
                 ';
               }
              }
              
              //déterminer si l'utilisateur est inactif...
              
              
              if($inactif == true) //si oui alors afficher le lien pour creer/ajouter un cadeau a cette liste
                echo '<a href = "../view/selectionnerCadeauListeInactif.php?id_liste='.$id_liste.'&id_util='.$id_util.'">Ajouter un cadeau</a>';
              
              echo '
              </div>
              </div>
              ';
              }
              
              ?>
            <!--
              <div class="card mw mr-3 mb-2  mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe 
                      </label>
                      <i class="pt-1 far fa-question-circle float-right"></i>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                      <i class="pt-1 far fa-question-circle float-right"></i>
                    </div>
                  </div>
              </div>  
              
              <div class="card mw mr-3 mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                    </div>
                  </div>
              </div>  
              
              
              <div class="card mw mr-3 mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                    </div>
                  </div>
              </div>  
              
              
              <div class="card mw mr-3 mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                    </div>
                  </div>
              </div>  
              
              
              <div class="card mw mr-3 mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                    </div>
                  </div>
              </div>  
              
              
              <div class="card mw mr-3 mb-2">
                <div class="card-header">Liste de Marge</div>
                  <div class="card-body">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Echarpe
                      </label>
                    </div>
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Gants
                      </label>
                    </div>
                  </div>
              </div>  
              -->
          </div>
        </div>
      </div>
    </div>
    </div>
  </body>
</html>