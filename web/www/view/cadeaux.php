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
    <title>Cadeaux | Giftlist </title>
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
                    <a class="btn btn-lg btn-danger " href="mesListes.php">Listes</a>
                    <a class="btn btn-lg btn-danger active" href="cadeaux.php">Cadeaux</a>
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
<div class="album py-5">
    <div class="container">

        <div class="row"> <!-- 3 card per row -->

            <?php
            require_once('../controller/connect.php');

            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            $id_utilisateur = $_SESSION['id_utilisateur'];
            $cadeaux = "SELECT * FROM Cadeau WHERE id_utilisateur_est_souhaite = '$id_utilisateur'";
            $cadeaux = mysqli_query($co,$cadeaux);


            while($row = mysqli_fetch_assoc($cadeaux))
            {
            
                    $id_cadeau = $row['id_cadeau'];
                    echo '
                    <!-- card - group owner -->
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body">
                                <h1 class="display-4 pb-3">'.mysqli_real_escape_string($co,$row['nom']).'</h2>
                                <form class="mt-1 mb-1 text-center" method="post" action="voirCadeau.php">
                                    <input type="hidden" name = "id_cadeau" value='.$id_cadeau.'>
                                    <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus"></i> de détail</button>
                                </form>
                                <form class="mt-1 mb-1 text-center" method = "post" action = "../controller/modifierCadeau.php">
                                    <input type="hidden" name = "id_cadeau" value = '.$id_cadeau.'>
                                    <button type="submit"  class="btn btn-outline-danger  my-2 my-sm-0">Modifier le cadeau</button>
                                </form>
                                <form class="mt-1 mb-1 text-center" method = "post" action = "../controller/supprimerCadeau.php">
                                    <input type="hidden" name = "id_cadeau" value = '.$id_cadeau.'>
                                    <button type="submit"  class="btn btn-outline-danger  my-2 my-sm-0">Supprimer le cadeau</button>
                                </form>
                               
                                
                            </div>
                        </div>
                    </div>';
                    
            }

            ?>

            <!-- has to be the last card -->
            <div class="col-md-4">
                <a data-toggle="modal" data-target="#modalCreerCadeau" class="d-block nounderline">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h1 class="display-4 text-center"> <i class="fas fa-plus"></i></h1>
                        </div>
                    </div>
                </a>
            </div>

            <!--créer un cadeau-->
            <div class="modal fade" id="modalCreerCadeau" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Créer un nouveau cadeau</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method = "post" action="../controller/creerCadeau.php">
                                <label for="inputNom" class="float-left mb-1">Nom : </label>
                                <input type="text" id="inputNom" name="nom" class="form-control input-text mb-1" placeholder="" required autofocus>
                                <label for="inputNom" class="float-left mb-1">Description : </label>
                                <input type="text" id="inputDescription" name="description" class="form-control input-text mb-1" placeholder="">
                                <label for="inputNom" class="float-left mb-1">Prix : </label>
                                <input type="text" id="inputPrix" name="prix" class="form-control input-text mb-1" placeholder="">
                                <label for="inputNom" class="float-left mb-1">Lien : </label>
                                <input type="text" id="inputLien" name="lien" class="form-control input-text mb-1" placeholder="">
                                <label for="inputImg" class="float-left mb-1">Image (lien) : </label>
                                <input type="text" id="inputImg" name="img" class="form-control input-text mb-1" placeholder="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Créer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            
            <!---->

            <!-- ajouter des membres
            
            <div class="modal fade" id="modalAjouterMembres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Selectionner des membres à ajouter :</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                    ajouter balises php
                    
                    $id_groupe = $_POST['id'];
                      
                    echo '<form method = "post" action="../controller/ajouterMembre.php" >';
                    echo '<input type="hidden" name = "id_groupe" value="'.$id_groupe.'"/>';
                    echo '<input type="hidden" name = "id_createur" value="'.$_SESSION['id_utilisateur'].'"/>';
                   
                    $id = $_SESSION['id_utilisateur'];
                  
                    $all = "SELECT id_utilisateur,nom,prenom FROM Utilisateur WHERE id_utilisateur != '$id'";
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
                    
                ajouter balises php
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
                </div>
            </div>
            </div>
            
            
           -->



    </div>
</div>

</body>
</html>