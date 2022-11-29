<?php
    require_once 'classes/db.classe.php';
    require_once 'classes/panier.classe.php';

    $DB = new DB();
    $panier = new panier();
?>

    <?php  include 'include/head.php'?>

    <?php include 'include/navigation.php' ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Panier</h2>
                    </div> 

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Quantiter</th>
                                <th>Action</th>                
                            </tr>
                        </thead>
                        <?php
                        $ids = array_keys($_SESSION['panier']); 
                        $products = $DB->queryObj('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');
                        ?>
                        <?php foreach($products as $product): ?>
                        <tbody>
                            <tr>
                                <td><?= $product->id; ?></td>
                                <td><?= $product->nom; ?></td>
                                <td><?= $product->prix; ?></td>
                                <td><?= $product->quantite; ?></td>
                                <td>
                                    <a href=""><i class="fa-regular fa-cart-circle-xmark"></i>Remove</a>              
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach ?>  
                    </table>
                    <form action="checkout.php?<?php foreach($products as $product){ echo 'id=' . $product->id; } ?>" method="POST">
                        <input type="submit" id="checkout" value="checkout">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include 'include/footer.php'?> 