<?php

    require_once("connect.php");
    
    $id_groupe = $_POST['id_groupe'];
    $id_createur = $_POST['id_createur'];
   
    foreach($_POST['membre'] as $selected)
    {
        
        $result = mysqli_query($co,"SELECT id_utilisateur FROM UtilisateurInactif WHERE id_utilisateur = '$selected'");
        if(mysqli_num_rows($result) != 0)
        {
            mysqli_query($co,"INSERT INTO est_membre(id_utilisateur,id_groupe) VALUES ('$selected','$id_groupe')");
        }
        else
        {
             
            mysqli_query($co,"INSERT INTO est_invite(id_utilisateur,id_groupe,id_utilisateur_est_invite) VALUES ('$id_createur','$id_groupe','$selected')");
            //envoyer un mail
            //récupérer l'email 
            $result = mysqli_query($co,"SELECT login FROM UtilisateurActif WHERE id_utilisateur = '$selected'");
            $result = mysqli_fetch_assoc($result);
            $to = $result['login'];
            $subject = 'Nouvelle invitation sur un groupe - GiftList';
            
            $message = '
                        You have received a new invitation to join a group !
                        
                        Please click this link to accept the invitation :
                        <a href="localhost/view/groupe.php">localhost/view/groupe.php</a>
                        
                        ';
                     
            $header = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            $header .= 'From: GiftList <giftlist@christmas.com>';
           
            mail($to,$subject,$message,$header);
            
        }
    
    }
    
    header("Location: ../view/groupe.php");
    
    
?>