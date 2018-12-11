<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

class Cadeau
{
    private $connection;
    private $nom;
    private $id_utilisateur_est_souhaite;

    private $description;
    private $prix;
    private $lien;

    function __construct()
    {
        $nbArgs = func_num_args();
        $args = func_get_args();
        switch($nbArgs)
        {
            case 3 :
                $this->connection = $args[0];
                $this->nom = $args[1];
                $this->id_utilisateur_est_souhaite = $args[2];

                $query = "INSERT INTO Cadeau(nom,id_utilisateur_est_souhaite) VALUES ('$this->nom', '$this->id_utilisateur_est_souhaite')";
                $result = mysqli_query($this->connection, $query);
        }

    }
}
?>