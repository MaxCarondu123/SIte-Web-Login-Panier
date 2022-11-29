<?php
    require_once '../classes/db.classe.php';
    $DB = new DB();

    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['quantite'])){
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];

        //Requete permettant d'inserer un nouveau produit
        $DB->queryCUD("INSERT INTO produits( `nom`, `prix`, `quantite`) VALUES ('$nom', '$prix', '$quantite')");
        //Retour a la page des produits
        header('Location: http://localhost/W34-Tp2-Code/product.php');
        exit();
    }

?>