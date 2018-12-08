<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

class Groupe 
{
  private $connection;
  private $id;
  private $nom;
  private $createur;

  function __construct()
  {
        $nbArgs = func_num_args();
        $args = func_get_args();
        switch($nbArgs)
        {
            case 3 : 
                $this->connection = $args[0];
                $this->nom = $args[1];
                $this->createur = $args[2];
                
                $query = "INSERT INTO Groupe(nom,id_utilisateur) VALUES ('$this->nom', '$this->createur')";
                $result = mysqli_query($this->connection, $query);
                $this->id = mysqli_insert_id($this->connection);
                
                //ajouter le créateur en tant que membre
                //faire un fonction avec une boucle pour ajouter des membres/invités
                mysqli_query($this->connection, "INSERT INTO est_membre(id_groupe,id_utilisateur) VALUES ('$this->id', '$this->createur')");
        }
        
    }
}
?>