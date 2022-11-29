<?php
    require_once 'classes/db.classe.php';
    $DB = new DB();

    $count = $DB->query('SELECT max(id) FROM produits');
    $productCreate = $count[0][0] + 1;
?>

    <?php  include 'include/head.php'?> 
    
    <?php include 'include/navigation.php' ?>
    <div id="frm" style="text-align: center;">
        <h1>Create / Produit # <?= $productCreate ?></h1>
        <form name="" action="code/product-create.code.php" onsubmit="" method="POST">
            <p>
                <label>Nom: </label>
                <input type="text" id="nom" name="nom">
            </p>
            <p>
                <label>Prix: </label>
                <input type="text" id="prix" name="prix">
            </p>
            <p>
                <label>Quantiter: </label>
                <input type="text" id="quantite" name="quantite">
            </p>
            <p>
                <input type="submit" id="btnSubmit" value="Create">
            </p>
        </form>
    </div>
<?php include 'include/footer.php'?> 