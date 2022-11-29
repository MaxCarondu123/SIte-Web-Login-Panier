<?php
require_once '../classes/db.classe.php';
require_once '../classes/panier.classe.php';

$DB = new DB();
$panier = new panier();

if(isset($_GET['id'])){
    //Requete permettant de voir si le produit existe
    $product = $DB->queryObj('SELECT id FROM produits WHERE id=:id', array('id' => $_GET['id']));
    
    if(empty($product)){
        die("Ce produit n'existe pas");
    }else{
        //Ajouter le produit au panier
        $panier->add($product[0]->id);
        die("Ce produit a ete ajouter au panier");
    }
}else{
    die("Vous n'avez pas selectionner de produit a ajouter au panier");
}