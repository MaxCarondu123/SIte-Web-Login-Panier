<?php
    require_once 'classes/db.classe.php';
    $DB = new DB();

    if(isset($_GET['id'])){
        $product = $DB->queryObj("SELECT * FROM produits WHERE id=:id", array('id' => $_GET['id']));
        if(empty($product)){         
            die('Aucun produit est selectionner pour etre modifier');
        }    
    }   
?>

    <?php  include 'include/head.php'?> 

    <?php include 'include/navigation.php' ?>

    <div id="frm" style="text-align: center;">
        <h1>Etes-vous sur de vouloir supprimer le produit # <?= $product[0]->id ?> ?</h1>
        <form name="" action="code/product-delete.code.php?id=<?= $product[0]->id ?>" onsubmit="" method="POST">
            <p>
                <input type="submit" id="oui" value="oui">
            </p>
        </form>
        <form name="" action="product.php" onsubmit="">
            <p>
                <input type="submit" id="non" value="non">
            </p>
        </form>
    </div>
<?php include 'include/footer.php'?> 