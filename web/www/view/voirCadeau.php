<?php
        require_once("../controller/connect.php");
        session_start();
        //si l'utilisateur n'est pas encore connecté
        if(!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
            echo 'redirection';
            
            header("Location:error503.php");
        }
        
        $id_cadeau = $_POST['id_cadeau'];
        
        $result = mysqli_query($co,"SELECT nom,description,prix,lien,img FROM Cadeau WHERE id_cadeau = '$id_cadeau'");
        $result = mysqli_fetch_assoc($result);
?>


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
                 
                    <a class="btn btn-lg btn-danger mt-2" href="cadeaux.php">Retourner à mes cadeaux</a>
                </nav>
              </div>
              <div class="col-sm-2">
               <div class="dropdown show btn-lg float-md-right float-lg-right float-xl-right">
                  <a class="btn btn-lg btn-link dropdown-toggle color-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php ; echo $_SESSION['prenom']." ".$_SESSION['nom'];?>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="modifInfos.php">Voir mon profil</a>
                    <a class="dropdown-item" href="signupInactif.php">Créer un compte invité</a>
                    <a class="dropdown-item" href="../controller/logout.php">Se déconnecter</a>
                  </div>
                </div>
              </div>
          </div>
      </div>

     <div class="album py-5">
        <div class="container">

        <div class=" card error404 p-5 border border-danger">
            <div class="card-body text-center">
                <h1 class="display-1"><?php echo $result['nom'];?></h1>
               
              
                <p>Description : <?php  echo $result['description']; ?></p>
                <br/>
                <p>Prix : <?php  echo $result['prix']; ?></p>
                <br/>
                <p>Lien : <?php  echo $result['lien']; ?></p>
            
                <img src="<?php  echo $result['img']; ?>" class="img-fluid">
                
                
            </div>
        </div>
            
        
        
        </div>
      </div>

  </body>
</html>