<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
require('./assets/componants/header.php');

?>

<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>

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


                                        <form action="accompagnement.php" method="POST">



                                    </div><!-- End .cart-bottom -->


                                <?php } ?>

                                <div class="pt-5">

                                    <style>
                                        .sectionMenuAleatoire {
                                            display: flex;
                                            flex-wrap: wrap;
                                        }
                                    </style>
                                    <h5 class="couleurJaune">Vous pouvez aussi aimer </h5>
                                    <div class="sectionMenuAleatoire">

                                        <?php
                                        $produitAle = randMenu();
                                        foreach ($produitAle as $aleatoirProduit) {
                                        ?>
                                            <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                                <div class="product product-7 text-center">
                                                    <figure class="product-media">
                                                        <!-- <span class="product-label label-new">New</span> -->
                                                        <a href="product.php?id=<?= htmlspecialchars($aleatoirProduit['id']) ?>">
                                                            <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($aleatoirProduit['image']) ?>" alt="Product image" class="product-image">
                                                        </a>


                                                        <!-- <div class="product-action">
                                                            <a href="./panier/addpanier.php?id=<?= htmlspecialchars($aleatoirProduit['id']) ?>" class="btn-product addPanier btn-cart"><span>Ajouter au
                                                                    panier</span></a>
                                                        </div>End .product-action -->
                                                    </figure><!-- End .product-media -->

                                                    <div class="product-body">

                                                        <h3 class="product-title couleurBlanche"><a href="product.php?id=<?= htmlspecialchars($aleatoirProduit['id']) ?>"><?= htmlspecialchars($aleatoirProduit['name']) ?></a></h3><!-- End .product-title -->
                                                        <div class=" product-price couleurJaune">
                                                            <?= htmlspecialchars($aleatoirProduit['price']) ?> €
                                                        </div><!-- End .product-price -->

                                                    </div><!-- End .product-body -->
                                                </div><!-- End .product -->
                                            </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                        <?php } ?>

                                    </div>
                                </div>
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

                                                <td> <span data-total-panier><?= $total ?></span>€</td>





                                            </tr><!-- End .summary-subtotal -->


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

        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="assets/images/logoOMS2.jpg" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate
                                    magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Liens du site</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Menu</a></li>
                                    <li><a href="#">Recrutement</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Contactez nous</a></li>
                                    <li><a href="login.html">Connexion</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Nos services</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Moyens de paiements</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#">Livraisons</a></li>
                                    <li><a href="#">Emportez</a></li>
                                    <li><a href="#">Termes et conditions</a></li>
                                    <li><a href="#">RGPD</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Mon compte</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Connexion / Inscription</a></li>
                                    <li><a href="">Mon panier</a></li>
                                    <li><a href="#">Mes favoris</a></li>
                                    <li><a href="#"></a></li>

                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2021 Oh My Sushi. All Rights Reserved.</p>
                    <!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            <nav class="mobile-nav">
                <style>
                    .mobile-nav ul li {
                        padding: 0.5rem;
                        text-align: center;
                    }
                </style>
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.html">Menu</a>

                    </li>
                    <li>
                        <a href="#signin-modal" data-toggle="modal">Se connecter / s'inscrire</a>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Commander</a>

                    </li>
                    <li>
                        <a href="#">Recrutement</a>
                    </li>
                    <li>
                        <a href="#">Glossaire des ingrédients</a>
                    </li>
                    <li>
                        <a href="actualites.html">Actualités</a>
                    </li>

                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>
    <?php require('./assets/componants/navmenumobile.php'); ?>


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