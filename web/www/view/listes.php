

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
                    <a class="btn btn-lg btn-danger" href="groupe.php">Groupes</a>
                    <a class="btn btn-lg btn-danger active" href="listes.php">Listes</a>
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
                    <a class="dropdown-item" href="#">Se déconnecter</a>
                  </div>
                </div>
              </div>
          </div>
      </div>


      <div class=" mt-5 container h-75">
        <div class="row h-100 ">
          <div class="col-md-3 border-right">
            <div class="card h-100" >
              <div class="card-header">
                Ma liste de cadeau
              </div>
              <div class="card-body">
                <ul>
                  <li>iPhône 10 <i class="far fa-trash-alt float-right"></i></li>
                  <li>Maquintouch <i class="far fa-trash-alt float-right"></i></li>
                  <li>iPoud <i class="far fa-trash-alt float-right"></i></li>
                  <li>earPouds <i class="far fa-trash-alt float-right"></i></li>
                </ul>
                <span class="text-danger"><i class="fas fa-plus"></i><a class="text-danger" href=""> <u>Ajouter un cadeau</u></a></span>
                <a class="btn btn-primary btn-outline-danger" href="#" role="button">Editer mes cadeaux</a>
              </div>
            </div>
          </div>
              
          <div class="col-md-9  h-75">
            <h2 class="text-center pb-5 "> Simspons family <b>Gift</b>list</h2>
            <div class="container-cards h-100">
                  
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



              </div>
            </div>
          </div>
        </div>
     </div>

    

  </body>
</html>