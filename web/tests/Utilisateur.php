<?php

    require_once("connect.php");
    
    $query = "SELECT * FROM Utilisateur";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
    
    
    //Afficher Utilisateur Actif et Inactif
    $query = "SELECT * FROM UtilisateurActif";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur Actifs ';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
    
     echo '<br/>';
     echo '<br/>';
     echo '<br/>';
    
    $query = "SELECT * FROM UtilisateurInactif";
    $result = mysqli_query($co,$query);
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Utilisateur Inactifs';
        echo '<br/>';
        echo '<br/>';
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['id_utilisateur']."&ensp;".$row['nom']."&ensp;".$row['prenom']."<br/>";
        }
    }
?>