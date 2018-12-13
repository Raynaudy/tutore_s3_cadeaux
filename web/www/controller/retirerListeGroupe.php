<?php

    require_once("connect.php");

    $id_liste = $_POST['id_liste'];
    $id_groupe = $_POST['id_groupe'];
    mysqli_query($co,"DELETE FROM est_partagee WHERE id_liste = '$id_liste' AND id_groupe = '$id_groupe'");

    header("Location:../view/listes.php");
?>