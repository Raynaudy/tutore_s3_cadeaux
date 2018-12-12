<?php
    session_start();
    if(isset($_SESSION['loggedin'])) {
        $_SESSION['loggedin'] = "false";  
        unset($_SESSION['loggedin']);
        unset($_SESSION);
        session_destroy(); 

        var_dump($_SESSION);
        header("Location:../view/disconnect.php");
    }
?>