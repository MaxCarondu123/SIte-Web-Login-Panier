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
        <h1>Update / Produit # <?= $product[0]->id ?></h1>
        <form name="" action="code/product-update.code.php?id=<?= $product[0]->id ?>" onsubmit="" method="POST">
            <p>
                <label>Nom: </label>
                <input type="text" id="nom" name="nom" value="<?= $product[0]->nom ?>">
            </p>
            <p>
                <label>Prix: </label>
                <input type="text" id="prix" name="prix" value="<?= $product[0]->prix ?>">
            </p>
            <p>
                <label>Quantiter: </label>
                <input type="text" id="quantite" name="quantite" value="<?= $product[0]->quantite ?>">
            </p>
            <p>
                <input type="submit" id="btnSubmit" value="Update">
            </p>
        </form>
    </div>
<?php include 'include/footer.php'?> 