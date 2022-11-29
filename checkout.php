<?php
    require_once 'classes/db.classe.php';
    require_once 'classes/panier.classe.php';

    $DB = new DB();
    $panier = new panier();

    $ids = array_keys($_SESSION['panier']); 
    $products = $DB->queryObj('SELECT * FROM produits WHERE id IN ('.implode(',',$ids).')');

    $prixTotal = 0;
    $allProduits = "";

    foreach($products as $product){
        $prixTotal = $prixTotal + $product->prix;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/checkout.css">
</head>

<body>
    <div class="container">
        <div class="title">
            <h2>Product Order</h2>
        </div>
        <div class="d-flex">
            <form name="fOrder" action="code/checkout.code.php" method="post" onsubmit="return validation()">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname"><br>

                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname"><br>

                <label for="country">Country:</label>
                <input type="text" id="country" name="country"><br>

                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse" name="adresse"><br>

                <label for="postcode">Postcode:</label>
                <input type="text" id="postcode" name="postcode"><br>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone"><br>
   
                <div class="">
                    <table>
                        <tr>
                            <th colspan="2">Your order</th>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td><?= $prixTotal ?> $</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>Free shipping</td>
                        </tr>
                    </table><br>
                    <div>
                        <div>
                            <input type="radio" name="dbt" value="cd"> Paypal 
                            <span>
                                <img src="https://www.logolynx.com/images/logolynx/c3/c36093ca9fb6c250f74d319550acac4d.jpeg" alt="" width="50">
                            </span>
                        </div>                               
                    </div>
                    <input class="button" type="submit" value="order">    
                </form>
            </div>
            
    </div>

    <script>
        function validation(){
            var id = document.fOrder.fname.value;

            if(id.length == ""){
                alert("Les chmaps username et password sont vide.");
                return false;
            }else{
                if(id.length == ""){
                    alert("Le champ username est vide.");
                    return false;
                }
            }
        }
    </script>

<?php include 'include/footer.php'?> 