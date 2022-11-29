<?php
    require_once '../classes/db.classe.php';
    require_once '../classes/panier.classe.php';

    $DB = new DB();
    $panier = new panier();

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['country']) 
    && isset($_POST['adresse']) && isset($_POST['postcode']) && isset($_POST['phone'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $country = $_POST['country'];
        $adresse = $_POST['adresse'];
        $postcode = $_POST['postcode'];
        $phone = $_POST['phone'];

        $username = $_SESSION['username'];

        $user_id = $DB->query("SELECT id FROM users where nom = '$username'");

        if(!empty($user_id)){
            $id = $user_id[0][0];
            $DB->queryCUD("INSERT INTO orders(`user_id`, `firstname`, `lastname`, `country`, `adresse`, `codepostal`, `phone`) 
                        VALUES ('$id', '$fname', '$lname', '$country', '$adresse', '$postcode', '$phone')");
                        
        }

        header('Location: http://localhost/W34-Tp2-Code/index.php');
        exit();
    }
    

?>