<?php
    require_once("connect.php");
    session_start();
    
    $id_cadeau = $_GET['id_cadeau'];
    $id_util = $_SESSION['id_utilisateur'];
    $id_groupe = $_SESSION['id_groupe'];
    
    mysqli_query($co,"UPDATE Cadeau SET id_utilisateur = '$id_util' WHERE id_cadeau = '$id_cadeau'");
    
    //envoyer un mail a tout le monde dans le groupe
    /*
    $mails = "SELECT login FROM Utilisateur, UtilisateurActif,est_membre WHERE est_membre.id_groupe = '$id_groupe' AND est_membre.id_utilisateur != '$id_util' AND est_membre.id_utilisateur = Utilisateur.id_utilisateur AND Utilisateur.id_utilisateur=UtilisateurActif.id_utilisateur";
    
    $subject = 'Achat d\'un cadeau - GiftList';
            
            $message = '
                        A new gift was bought in one of your groups !
                        </br>
                        Click this link to check out your groups :
                        <a href="localhost/view/groupe.php">localhost/view/groupe.php</a>
                        
                        ';
                     
            $header = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
            $header .= 'From: GiftList <giftlist@christmas.com>';
           
    while($row = mysqli_fetch_assoc($mails))
    {
        $to = $row['login'];
        mail($to,$subject,$message,$header);
    }
    */
    
    //mail de test a une adresse qui fonctionne
    $subject = 'Achat d\'un cadeau - GiftList';
    
    $message = '
                A new gift was bought in one of your groups !
                </br>
                Click this link to check out your groups :
                <a href="localhost/view/groupe.php">localhost/view/groupe.php</a>
                
                ';
                
    $header = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
    $header .= 'From: GiftList <giftlist@christmas.com>';

    $to = "lisejoli@free.fr";
    mail($to,$subject,$message,$header);
    
    header("Location:../view/listes.php");
?>