<?php

    require_once("connect.php");
    
    $id_groupe = $_POST['id_groupe'];
    $new_name = $_POST['new_name'];
   
    mysqli_query($co,"UPDATE Groupe SET nom = '$new_name' WHERE id_groupe = '$id_groupe'");
    
    header("Location: ../view/groupe.php");
    
    
?>