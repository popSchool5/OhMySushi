<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
require('./assets/componants/header.php');
 
if(empty($_SESSION['panier'])){
    header('location: index.php'); 
}
?>

<body>
    <div class="page-wrapper">
    <?php require('./assets/componants/barreMenu.php') ?>

        <main class="main">
            <div class="page-header text-center" style="background:#010101">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Mon panier<span></span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active couleurJaune"><a class="active couleurBlanche" href="cart.php">Panier</a></li>

                        <li class="breadcrumb-item " aria-current="page">Accompagnement</li>
                        <li class="breadcrumb-item " aria-current="page">Adresse</li>
                        <li class="breadcrumb-item" aria-current="page">Mode de livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Paiement</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">

                <div class="cart">

                    <div class="container">
                        <?php require('./aa.php');
                        if (isset($_POST['promo'])) {

                            $req = $bdd->prepare("SELECT * FROM promo WHERE name = ? AND now() BETWEEN debut AND fin");

                            $req->execute(array(
                                $_POST['promo']
                            ));

                            $promo = $req->fetch();

                            if (!$promo) {
                                ?>
                        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
                               Code promo : "<?= htmlspecialchars($_POST['promo']) ?>" , n'est pas valide.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <?php
                             
                            }
                        
                        }
                        if (!empty($_SESSION['promo']) && isset($_SESSION['promo'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
                                Code promo utilisé : <?= $_SESSION['promo']['name'];  ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php
                        }
                       
                        ?>
                        <div class="checkout-discount">
                            <form action="./cart.php" method="POST">
                                <input type="text" name="promo" class="form-control" required id="checkout-discount-input">
                                <label for="checkout-discount-input" class="text-truncate">Un code promo? <span>Cliquer et entrer votre code</span></label>
                            </form>
                        </div><!-- End .checkout-discount -->
                        <div class="row">

                            <div class="col-lg-9">
                                <table class="table table-cart table-mobile">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Prix Unitaire</th>
                                            <th>Quantité</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <script>
                                            function nombreCommande(v) {
                                                let id = v;
                                                //console.log(id);
                                                let stock = document.getElementById('nombreDeProduit').value;
                                                let a = document.getElementById('nombreDeProduit');
                                                const data = new FormData();
                                                data.append('stock', stock);
                                                data.append('id', id);
                                                console.log(a);


                                            }
                                        </script>
                                        <?php foreach ($productsDansLePanier as $productDansLePanier) { ?>


                                            <tr>
                                                <td class="product-col">
                                                    <div class="product">
                                                        <figure class="product-media">
                                                            <a href="#">
                                                                <img src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($productDansLePanier['image']) ?>" alt="Product image">
                                                            </a>
                                                        </figure>

                                                        <h3 class="product-title">
                                                            <a href="#" class="text-white"><?= htmlspecialchars($productDansLePanier['name']) ?></a>
                                                        </h3><!-- End .product-title -->
                                                    </div><!-- End .product -->
                                                </td>
                                                <td class="price-col text-white"><?= htmlspecialchars(number_format($productDansLePanier['price'], 2, ',', ' ')) ?>€</td>
                                                <td class="quantity-col">

                                                    <style>
                                                        .cart-product-quantity {
                                                            display: flex;

                                                        }

                                                        .cart-product-quantity input {
                                                            display: flex;
                                                            max-width: 35px;
                                                            border: none;
                                                            background: white;
                                                            text-align: center;
                                                            padding: 0 !important;
                                                            margin: 0 !important;
                                                        }

                                                        .cart-product-quantity button {

                                                            border: none;

                                                        }

                                                        .cart-product-quantity .btn-spinner {
                                                            display: none;

                                                        }
                                                    </style>

                                                    <div class="cart-product-quantity">

                                                        <!-- <input onchange="nombreCommande(<?= $productDansLePanier['id'] ?>)" name="panier[quantity][<?= $productDansLePanier['id'] ?>]" type="number" id="nombreDeProduit" class="form-control" value="<?= $_SESSION['panier'][$productDansLePanier['id']] ?>" min="1" data-decimals="0" required> -->

                                                        <a href="./panier/ajoutPanierViaCart.php?productid=<?= $productDansLePanier['id'] ?>&action=moins"> <button class="minus">-</button></a>
                                                        <input disabled class="number" name="panier[quantity][<?= $productDansLePanier['id'] ?>]" type="number" min="1" value="<?= $_SESSION['panier'][$productDansLePanier['id']] ?>">
                                                        <a href="./panier/ajoutPanierViaCart.php?productid=<?= $productDansLePanier['id'] ?>&action=plus"><button class="plus">+</button></a>


                                                    </div><!-- End .cart-product-quantity -->


                                                </td>
                                             
                                                <td class="total-col"><?= htmlspecialchars($productDansLePanier['price'] * $_SESSION['panier'][$productDansLePanier['id']]) ?>€</td>
                                                <td class="remove-col"><a href="./panier/delpanier.php?del=<?= htmlspecialchars($productDansLePanier['id']) ?>"><button class="btn-remove"><i class="icon-close"></i></button></a></td>
                                            </tr>


                                        <?php } ?>

                                    </tbody>
                                </table><!-- End .table table-wishlist -->

                                <style>
                                    .lessauces {
                                        display: flex;
                                        flex-direction: row;
                                        justify-content: space-around;

                                    }

                                    .salee,
                                    .sucree {
                                        border: 1px dotted grey;
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: space-around;
                                        align-items: center;
                                        width: 150px;

                                        border-radius: 2px;

                                    }




                                    .bgbg {
                                        border: 1px solid red;
                                        background-color: rgba(255, 71, 71, 0.7);
                                    }

                                    #salee,
                                    #sucree {
                                        display: none;
                                    }
                                </style>
                                <script>
                                    function mafvt() {
                                        let voir = document.getElementById('salee').checked
                                        let bgbg = document.getElementById('bgbg')
                                        console.log(voir)
                                        if (voir == true) {
                                            bgbg.classList.add('bgbg');
                                            console.log('if voir normalement')
                                        } else if (voir == false) {
                                            bgbg.classList.remove('bgbg')
                                        }
                                    }

                                    function mafctSucree() {
                                        let checksucree = document.getElementById('sucree').checked
                                        let labelSucree = document.getElementById('labelSucree')

                                        if (checksucree == true) {
                                            labelSucree.classList.add('bgbg');

                                        } else if (checksucree == false) {
                                            labelSucree.classList.remove('bgbg')
                                        }
                                    }
                                </script>

                                <?php if (!empty($_SESSION['panier'])) { ?>
                                    <div class="">


                                        <form action="accompagnement2.php" method="POST">



                                    </div><!-- End .cart-bottom -->


                                <?php } ?>

                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">

                                <div class="summary summary-cart">
                                    <h3 class="summary-title ">Notre récapitulatif</h3><!-- End .summary-title -->


                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>Total:</td>

                                                <?php

                                                if (isset($_POST['promo'])) {

                                                    $req = $bdd->prepare("SELECT * FROM promo WHERE name = ? AND now() BETWEEN debut AND fin");

                                                    $req->execute(array(
                                                        $_POST['promo']
                                                    ));

                                                    $promo = $req->fetch();

                                                    if ($promo) {

                                                        $_SESSION["promo"] = $promo;
                                                    }
                                                   
                                                }
                                               
                                                
                                                $total = $panier->total();

                                                ?>

                                                <td> <span data-total-panier><?= number_format($total, 2, ',', ' ') ?></span>€ <br>


                                                </td>

                                               
                                             

                                            </tr><!-- End .summary-subtotal -->
                                            <?php
                                            if (!empty($_SESSION['promo'])) {
                                            ?>
                                                <tr>

                                                    <td>
                                                        Montant promo :
                                                    </td>
                                                    <td> <?= number_format($_SESSION['promo']['amount'], 2, ',', ' ') ?>%</td>


                                                </tr>

                                            <?php } ?>
                                            <?php if($_SESSION['panier'][$productDansLePanier['id']] && (isset($productDansLePanier)) && (!empty($productDansLePanier)) && isset($_SESSION['promo'])) {?>
                                            <tr>
                                                <td>Prix sans promo :</td>
                                                <td> <?= htmlspecialchars($productDansLePanier['price'] * $_SESSION['panier'][$productDansLePanier['id']]) ?> €</td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <!-- <button type="button" data-toggle="modal" data-target="#modalAccompagnement" class="btn btn-outline-primary-2 btn-order btn-block">PROCEDER AU PAIEMENT</button> -->



                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PASSER AU ACCOMPAGNEMENT</button>

                                    </form>



                                </div><!-- End .summary -->



                                <a href="menu.php" class="btn btn-outline-dark-2  btn-block mb-3 btn-blanc"><span class="couleurJaune">CONTINUE LES COURSES</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php require("./assets/componants/footer.php"); ?>
        <?php require("./assets/componants/navmenumobile.php"); ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>

  
    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>
    <?php require('./assets/componants/navmenumobile.php'); ?>
    <?php require('./assets/componants/menu.php'); ?>
    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="./assets/js/app.js"></script>

    </html>