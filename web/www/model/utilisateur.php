<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

class Utilisateur 
{
  private $connection;
  private $id;
  private $login;
  private $mdp;
  private $nom;
  private $prenom;

  function __construct()
  {
    $nbArgs = func_num_args();
    $args = func_get_args();
    switch($nbArgs)
    {
      case 5 : //création d'un utilisateur
        $this->connection = $args[0];
        $this->login = $args[1];
        $this->mdp = $args[2];
        $this->nom = $args[3];
        $this->prenom = $args[4];
        
        $query = "INSERT INTO Utilisateur(nom,prenom) VALUES ('$this->nom', '$this->prenom')";
        $result = mysqli_query($this->connection, $query);
        $this->id = mysqli_insert_id($this->connection);
        
        $this->mdp = password_hash($this->mdp, PASSWORD_DEFAULT);
        $query = "INSERT INTO UtilisateurActif(id_utilisateur,login,mdp) VALUES ('$this->id','$this->login','$this->mdp')";
        mysqli_query($this->connection, $query);
        

      case 4 : //utilisateur existant
        $this->connection = $args[0];
        $this->id = $args[1];
        $this->login = $args[2];
        $this->mdp = $args[3];
        
        $query = "SELECT nom,prenom FROM Utilisateur WHERE id_utilisateur = '$this->id'";
        $result = mysqli_query($this->connection, $query);
        $result = mysqli_fetch_assoc($result);
        $this->nom = $result['nom'];
        $this->prenom = $result['prenom'];
        
        $this->ouvrirSession();
      }
    }

    public function ouvrirSession()
    {
        session_start();
        $_SESSION['id_utilisateur'] = $this->id;
        $_SESSION['nom'] = $this->nom;
        $_SESSION['prenom'] = $this->prenom;
    }
  
}
?>