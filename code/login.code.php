<?php
    require_once 'C:/wamp64/www/W34-Tp2-Code/classes/db.classe.php';
    $DB = new DB();

    if(!isset($_SESSION)){
        session_start();
    }

    //Verifier les variables ont bien ete recu
    if(isset($_POST['user']) && isset($_POST['pass'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];

        //Enlever les guilmets
        $username = stripslashes($username);
        $password = stripslashes($password);

        //Convertir en texte
        $username = htmlentities($username);
        $password = htmlentities($password);

        //Requete permettant de verifier si l'utilisateur existe
        $user = $DB->queryObj("SELECT * FROM users WHERE nom ='$username' AND motdepasse ='$password'");

        if(!empty($user)){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            //Retour a la page index
            header('Location: http://localhost/W34-Tp2-Code/index.php');
            exit();
        }else{
            //Retour a la page login avec un incorrect
            header('Location: http://localhost/W34-Tp2-Code/login.php?incorrect=1');
            exit();
        }
    }
?>