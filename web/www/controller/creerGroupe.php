<?php
include("../model/groupe.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../controller/connect.php');
session_start();

$nom = $_POST['nom'];

$groupe = new groupe($co,$nom,$_SESSION['id_utilisateur']);
header("Location:../view/groupe.php");
?>
    