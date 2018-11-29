<?php

    require_once("connect.php");

    $query = "SELECT * FROM Liste";
    $result = mysqli_query($co,$query);
    
    
    if(mysqli_num_rows($result)!=0)
    {
        echo 'Liste';
        echo '<br/>';
        echo '<br/>';
       
        while($row = mysqli_fetch_assoc($result))
        {
        
            $libelle = $row['libelle'];
            
        
            $id = $row['id_utilisateur'];
            $query2 = "SELECT prenom FROM Utilisateur WHERE id_utilisateur = '$id'";
            $prenom = mysqli_query($co,$query2);
            $prenom = mysqli_fetch_assoc($prenom);
            $prenom = $prenom['prenom'];
            
            
            $id_liste = $row['id_liste'];
            
            //récupérer les noms des groupes
            $query2 = "SELECT id_groupe FROM est_partagee WHERE id_liste = '$id_liste'";
            $lesGroupes = mysqli_query($co,$query2);
            $nomsGroupes = "";
            
            if(mysqli_num_rows($lesGroupes)!=0)
            {
                while($row2 = mysqli_fetch_assoc($lesGroupes))
                {
                    $idlocale = $row2['id_groupe'];
                    $query3 = "SELECT nom FROM Groupe WHERE id_groupe = '$idlocale'";
                    $resultq3 = mysqli_query($co,$query3);
                    $resultq3 = mysqli_fetch_assoc($resultq3);
                    $nomlocal = $resultq3['nom'];
                    $nomsGroupes .= $nomlocal." | ";
                }
            }
                
            //récupérer les noms des cadeaux
            $query2 = "SELECT id_cadeau FROM fait_partie WHERE id_liste = '$id_liste'";
            $lesCadeaux = mysqli_query($co,$query2);
            $nomsCadeaux = "";
            
            if(mysqli_num_rows($lesCadeaux)!=0)
            {
                while($row2 = mysqli_fetch_assoc($lesCadeaux))
                {
                    $idlocale = $row2['id_cadeau'];
                    $query3 = "SELECT nom FROM Cadeau WHERE id_cadeau = '$idlocale'";
                    $resultq3 = mysqli_query($co,$query3);
                    $resultq3 = mysqli_fetch_assoc($resultq3);
                    $nomlocal = $resultq3['nom'];
                    $nomsCadeaux .= $nomlocal." | ";
                }
            }
           
           
           echo "(".$libelle.")&ensp;Liste de ".$prenom.",&ensp; appartenant au(x) groupe(s) : ".$nomsGroupes. " &ensp;&ensp; et est constituée de : ".$nomsCadeaux."<br/>";
        }
        
    }
?>