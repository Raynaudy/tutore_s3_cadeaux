<?php

    require_once("connect.php");
     
    $query = "SELECT * FROM Groupe";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Groupe';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            echo $row['id_groupe']."&ensp;".$row['nom']."&ensp; créé par :   ".$prenom."<br/>";
        }
        
    }


?>