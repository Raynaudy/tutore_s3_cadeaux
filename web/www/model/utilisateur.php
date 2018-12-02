<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

class Utilisateur {
  private $connection;
  private $id;
  private $login;
  private $mdp;
  private $nom;
  private $prenom;

  function __construct(){
    $nbArgs = func_num_args();
    $args = func_get_args();
    switch($nbArgs){
      case 5 : 
        $this->connection = $args[0];
        $this->login = $args[1];
        $this->mdp = $args[2];
        $this->nom = $args[3];
        $this->prenom = $args[4];

      case 3 :
        $this->connection = $args[0];
        $this->login = $args[1];
        $this->mdp = $args[2];
    }
  }

  public function checkMdp(){
    $getMdp = "SELECT mdp FROM UtilisateurActif WHERE login = '$this->login'";
    $result = mysqli_query($this->connection,$getMdp);
    $result = mysqli_fetch_assoc($result);
    return (password_verify($this->mdp, $result['mdp']));
  }
}

?>