<?php
    $host = "localhost";
    $user = "phpmyadmin";
    $bdd = "phpmyadmin";
    $passwd = "milkshake";
    $co = mysqli_connect($host,$user,$passwd,$bdd) or die("erreur de connexion");
?>