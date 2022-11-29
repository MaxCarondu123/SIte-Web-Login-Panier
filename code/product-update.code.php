<?php
    require_once '../classes/db.classe.php';
    $DB = new DB();

    if(isset($_GET['id'])){
        if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['quantite'])){
            $nom = $_POST['nom'];
            $prix = $_POST['prix'];
            $quantite = $_POST['quantite'];
            
            //Requete permettant de modifier un produit
            $DB->queryCUD("UPDATE produits SET nom='$nom',prix='$prix',quantite='$quantite' WHERE id=:id", array('id' => $_GET['id']));
            //Retour a la page des produits
            header('Location: http://localhost/W34-Tp2-Code/product.php');
            exit();
        }
    }
?>