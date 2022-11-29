<?php
    session_start();

    if(isset($_SESSION['username'])){
        //Enlever nom d'utilisateur de la session
        unset($_SESSION['username']);
        //Retour a la page index
        header('Location: http://localhost/W34-Tp2-Code/index.php');
        exit();
    }
?>