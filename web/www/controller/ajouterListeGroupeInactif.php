<?php

    require_once("connect.php");

    if(isset($_POST['selectedListe'])){
      $id_liste = $_POST['selectedListe'];
      $id_groupe = $_POST['id_groupe'];
      mysqli_query($co,"INSERT INTO est_partagee(id_liste,id_groupe) VALUES ('$id_liste','$id_groupe')");
    }

    header("Location:../view/listes.php");
?>