<?php

require_once("connect.php");

$id_cadeau = $_POST['id_cadeau'];

$nom = mysqli_escape_string($co,$_POST['nom']);
$description = mysqli_escape_string($co,$_POST['desc']);
$prix = mysqli_escape_string($co,$_POST['prix']);
$lien = mysqli_escape_string($co,$_POST['lien']);
$img = mysqli_escape_string($co,$_POST['img']);

mysqli_query($co,"UPDATE Cadeau SET nom = '$nom', description = '$description', prix = '$prix', lien = '$lien', img='$img' WHERE id_cadeau = '$id_cadeau'");

header("Location:../view/cadeaux.php");

?>