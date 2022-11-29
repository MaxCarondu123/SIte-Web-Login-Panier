<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">TP1</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <!-- Bouton vers Produits-->
                <li class="nav-item"><a class="nav-link active" href="product.php">Produits</a></li>
                <!-- Bouton vers Membres-->
                <?php if(isset($_SESSION['username'])){ ?>
                    <li class="nav-item"><a class="nav-link active"  href="membre.php" >Membres</a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a class="nav-link active"  href="index.php" >Membres</a></li>
                <?php } ?>
                <!-- Bouton vers Login-->
                <?php if(isset($_SESSION['username'])){ ?>
                    <li class="nav-item"><a class="nav-link active" href="code/logout.code.php">Log Out</a></li>
                    <!-- Afficher si l'utilisateur est connecter un message de Bienvenue-->
                    <li class="nav-item"><a class="nav-link active">Bienvenue <?= $_SESSION['username'] ?></a></li>
                <?php }else{ ?>
                    <li class="nav-item"><a class="nav-link active" href="login.php">Login</a></li>
                <?php } ?>
            </ul>
            <form class="d-flex">
                <!-- Bouton vers le Panier-->
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    <a href="cart.php">Panier</a>
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>