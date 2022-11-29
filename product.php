<?php
    require_once 'classes/db.classe.php';
    require_once 'classes/panier.classe.php';

    $DB = new DB();
    $panier = new panier();

    if(isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['quantite'])){
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];

        //Enlever les guilmets
        $nom = stripslashes($nom);
        $prix = stripslashes($prix);
        $quantite = stripslashes($quantite);

        //Convertir en texte
        $username = htmlentities($username);
        $password = htmlentities($password);
    }
?>

    <?php  include 'include/head.php'?> 
    
    <?php include 'include/navigation.php' ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Produits</h2>
                        <?php if(isset($_SESSION['username'])){ ?>
                            <div class="pull-right"><a href="product-create.php"><i class="fa-solid fa-plus"></i></a></div>
                        <?php } ?>                 
                    </div> 

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prix</th>
                                <th>Quantiter</th>
                                <th>Panier</th>
                                <?php if(isset($_SESSION['username'])){ ?>
                                    <th>Action</th>
                                <?php } ?>                
                            </tr>
                        </thead>
                        <?php $products = $DB->queryObj('SELECT * FROM produits') ?>
                        <?php foreach($products as $product): ?>
                        <tbody>
                            <tr>
                                <td><?= $product->id; ?></td>
                                <td><?= $product->nom; ?></td>
                                <td><?= $product->prix; ?></td>
                                <td><?= $product->quantite; ?></td>
                                <td>
                                    <a href="code/addcart.code.php?id=<?= $product->id ?>"><i class="fa-solid fa-cart-plus"></i></a>
                                </td>
                                <?php if(isset($_SESSION['username'])){ ?>
                                    <td>              
                                        <a href="product-update.php?id=<?= $product->id ?>"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="product-delete.php?id=<?= $product->id ?>"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                <?php } ?>
                            </tr>
                        </tbody>
                        <?php endforeach ?>  
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include 'include/footer.php'?> 