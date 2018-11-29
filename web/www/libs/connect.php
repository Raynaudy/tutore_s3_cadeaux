<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $host = "yvainfrkab2018.mysql.db";
    $user = "yvainfrkab2018";
    $bdd = "yvainfrkab2018";
    $passwd = "ELSprojets3";

    $co = mysqli_connect($host,$user,$passwd,$bdd) or die("erreur de connexion");

    if (mysqli_connect_errno())
     {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
?>