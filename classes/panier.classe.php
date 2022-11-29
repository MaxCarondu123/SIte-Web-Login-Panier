<?php
class panier{
    //Construteur
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
        if(!isset($_SESSION['panier'])){
            $_SESSION['panier'] = array();
        }
    }
    
    //Fonction permettant d'ajouter un produit au panier
    public function add($product_id){
        $_SESSION['panier'][$product_id] = 1;
    }
}

?>