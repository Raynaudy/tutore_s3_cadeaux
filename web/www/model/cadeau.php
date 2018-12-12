<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');

class Cadeau
{
    private $connection;
    private $nom;
    private $description;
    private $prix;
    private $lien;
    private $id_utilisateur_est_souhaite;

    function __construct()

    {
        $nbArgs = func_num_args();
        $args = func_get_args();
        switch($nbArgs)
        {
            case 6 :
                $this->connection = $args[0];
                $this->nom = $args[1];
                $this->description = $args[2];
                $this->prix = floatval($args[3]);
                $this->lien = $args[4];
                $this->id_utilisateur_est_souhaite = $args[5];

                $query = "INSERT INTO Cadeau(nom,description,prix,lien,id_utilisateur_est_souhaite) VALUES ('$this->nom','$this->description','$this->prix','$this->lien','$this->id_utilisateur_est_souhaite')";
                $result = mysqli_query($this->connection, $query);        }

    }
}
?>