<?php
    require_once '../classes/db.classe.php';
    $DB = new DB();

    if(isset($_GET['id'])){
        var_dump($_GET['id']);
        
        //Requete permettant de supprimer un produit
        $DB->queryCUD("DELETE FROM produits WHERE id=:id", array('id' => $_GET['id']));
        //Retour a la page des produits
        header('Location: http://localhost/W34-Tp2-Code/product.php');
        exit();
    }
    
?>