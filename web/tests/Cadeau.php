<?php

    require_once("connect.php");
    
    $query = "SELECT * FROM Cadeau";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Cadeau';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id_utilisateur_est_souhaite'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            $offert = $row['id_utilisateur_est_offert'];
            
            //si le cadeau est déja offert...
            if(isset($offert))
            {
                $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$offert'";
                $id_offert = mysqli_query($co,$query2);
                $id_offert = mysqli_fetch_assoc($id_offert);
                $id_offert = $id_offert['prenom'];
                $etat = "Cadeau acheté par ".$id_offert;
                
            }else {$etat = "Cadeau pas encore offert";}
           
           
              
            echo $row['id_cadeau']."     &ensp; ".$row['nom']."&ensp;     description : ".$row['description']."&ensp;      prix : ".$row['prix']."&ensp;       image : ".$row['img']."&ensp;      lien : ".$row['lien']. "&ensp;      Souhaité par : ".$prenom."&ensp;         Statut : ".$etat."<br/>";
        }
        
    }
    
?>