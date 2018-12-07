

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
              <div class="col-sm-2">
                  <span class="mb-0 h1 text-danger pl-1 "><b>Gift</b>list</span></a>
              </div>
              <div class="col-sm-8 text-center">
                <nav class="btn-group btn-lg">
                   <button class="btn btn-lg btn-danger active" >Groupes</button>
                   <button class="btn btn-lg btn-danger" >Listes</button>
                   <button class="btn btn-lg btn-danger">Cadeaux</button>
                </nav>
              </div>
              <div class="col-sm-2">
               <div class="dropdown show btn-lg  float-right">
                  <a class="btn btn-lg btn-link dropdown-toggle color-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Bonjour Yvain Raynaud
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

     <div class="album py-5">
        <div class="container">

          <div class="row"> <!-- 3 card per row -->

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h1 class="display-4 pb-3"> Simpson's family 2018 </h2>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Renommer</button>
                    </div>
                    <small class="text-muted">5 membres</small>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h1 class="display-4 pb-3"> Bart and friend 2018 </h2>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group invisible "> <!-- put invisible if the user is not the owner -->
                      <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-plus"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-minus"></i></button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Renommer</button>
                    </div>
                    <small class="text-muted">5 membres</small>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-md-4">
              <div class="card mb-4 box-shadow bg-light">
                <div class="card-body ">
                  <h1 class="display-4 pb-3"> Krusty TV show 2018 </h2>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group ">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Accepter</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Refuser</button>
                    </div>
                    <small class="text-muted invisible">5 membres</small> <!-- if the user is not in the group yet, do not show number of users -->
                  </div>
                </div>
              </div>
            </div>

            <!-- has to be the last card -->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <div class="card-body">
                  <h1 class="display-4 text-center"> <i class="fas fa-plus"></i></h2>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

  </body>
</html>