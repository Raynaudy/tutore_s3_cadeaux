<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $host = "localhost";
    $user = "projettutore";
    $bdd = "projettutore";
    $passwd = "milkshake";

    $co = mysqli_connect($host,$user,$passwd,$bdd) or die("erreur de connexion");

    if (mysqli_connect_errno())
     {
         echo "Failed to connect to MySQL: " . mysqli_connect_error();
     }
?>