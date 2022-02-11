<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/componants/header.php');

require('./assets/php/function.php');
if (!empty($_GET['id'])) {
    $article = viewOnlyArticle($_GET['id']);

    $req = $bdd->prepare('SELECT * FROM products WHERE id = ?');
    $req->execute(array($article['id']));
    $compte = $req->fetchColumn();
    $fermerOuOuvert = magasinFermerOuOuvert();

    if ($compte) {

?>

        <body>
            <div class="page-wrapper">
                <?php require('./assets/componants/barreMenu.php') ?>

                <main class="main">
                    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                        <div class="container d-flex align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html" class="couleurJaune">Home</a></li>
                                <li class="breadcrumb-item"><a href="#" class="couleurJaune">Produit</a></li>
                                <li class="breadcrumb-item active" aria-current="page" class="couleurBlanche"><a href="#" class="couleurBlanche"><?= $article['name'] ?></a></li>
                            </ol>


                        </div><!-- End .container -->
                    </nav><!-- End .breadcrumb-nav -->

                    <div class="page-content">
                        <div class="container">
                            <div class="product-details-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="product-gallery product-gallery-vertical">
                                            <div class="row">
                                                <figure class="product-main-image">
                                                    <img id="product-zoom" src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($article['image']) ?>" alt="product image">


                                                </figure><!-- End .product-main-image -->


                                            </div><!-- End .row -->
                                        </div><!-- End .product-gallery -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="product-details">
                                            <h1 class="product-title couleurBlanche"><?= htmlspecialchars($article['name']) ?></h1><!-- End .product-title -->



                                            <div class="product-price">
                                                <?= htmlspecialchars($article['price']) ?> €
                                            </div><!-- End .product-price -->

                                            <div class="product-content">
                                                <p class="couleurBlanche"><?= htmlspecialchars($article['description']) ?> </p>
                                            </div><!-- End .product-content -->


                                        </div><!-- End .details-filter-row -->

                                        <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>
                                            <div class="details-filter-row details-row-size">
                                                <label class="couleurJaune" for="qty">Quantité:</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
                                                </div><!-- End .product-details-quantity -->
                                            </div><!-- End .details-filter-row -->


                                            <div class="product-details-action">
                                                <a href="./panier/addpanier.php?id=<?= $article['id'] ?>" class="addPanier btn-product btn-cart"><span>AJOUTER AU PANIER</span></a>
                                            </div><!-- End .product-details-action -->
                                        <?php } ?>

                                        <div class="product-details-footer">
                                            <div class="product-cat">
                                                <span>Catégorie:</span>
                                                <a href="#"><?= htmlspecialchars($article['label']) ?></a>

                                            </div><!-- End .product-cat -->

                                            <div class="social-icons social-icons-sm">
                                                <span class="social-label">Partager:</span>
                                                <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                                <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            </div>
                                        </div><!-- End .product-details-footer -->
                                    </div><!-- End .product-details -->
                                </div><!-- End .col-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product-details-top -->

                        <h2 class="title text-center mb-4 mt-5 pt-5 couleurBlanche">Vous pouvre etre interesser par </h2><!-- End .title text-center -->

                        <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                            <?php
                            $randArticles = randMenu();
                            foreach ($randArticles as $randArticle) {
                            ?>
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <!-- <span class="product-label label-new">New</span> -->
                                        <a href="product.php?id=<?= htmlspecialchars($randArticle['id']) ?>">
                                            <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($randArticle['image']) ?>" alt="Product image" class="product-image">
                                        </a>

                                            <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>

                                                <div class="product-action">
                                                    <a href="./panier/addpanier.php?id=<?= htmlspecialchars($randArticle['id']) ?>" class="addPanier btn-product btn-cart"><span>Ajouter au panier</span></a>
                                                </div><!-- End .product-action -->
                                            <?php } ?>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">

                                        <h3 class="product-title"><a class="couleurBlanche" href="product.php?id=<?= htmlspecialchars($randArticle['id']) ?>"><?= htmlspecialchars($randArticle['name']) ?></a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <?= htmlspecialchars($randArticle['price']) ?> €
                                        </div><!-- End .product-price -->


                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            <?php } ?>
                        </div><!-- End .owl-carousel -->
                    </div><!-- End .container -->
            </div><!-- End .page-content -->
            </main><!-- End .main -->

            <footer class="footer">
                <div class="footer-middle">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <div class="widget widget-about">
                                    <img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                    <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

                                    <div class="social-icons">
                                        <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                                        <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                                        <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                                        <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
                                        <a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
                                    </div><!-- End .soial-icons -->
                                </div><!-- End .widget about-widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="about.html">About Molla</a></li>
                                        <li><a href="#">How to shop on Molla</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="contact.html">Contact us</a></li>
                                        <li><a href="login.html">Log in</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Payment Methods</a></li>
                                        <li><a href="#">Money-back guarantee!</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Terms and conditions</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->

                            <div class="col-sm-6 col-lg-3">
                                <div class="widget">
                                    <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                                    <ul class="widget-list">
                                        <li><a href="#">Sign In</a></li>
                                        <li><a href="cart.html">View Cart</a></li>
                                        <li><a href="#">My Wishlist</a></li>
                                        <li><a href="#">Track My Order</a></li>
                                        <li><a href="#">Help</a></li>
                                    </ul><!-- End .widget-list -->
                                </div><!-- End .widget -->
                            </div><!-- End .col-sm-6 col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-middle -->

                <div class="footer-bottom">
                    <div class="container">
                        <p class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                        <figure class="footer-payments">
                            <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
                        </figure><!-- End .footer-payments -->
                    </div><!-- End .container -->
                </div><!-- End .footer-bottom -->
            </footer><!-- End .footer -->
            </div><!-- End .page-wrapper -->
            <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
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
            <script src="assets/js/jquery.elevateZoom.min.js"></script>
            <script src="assets/js/bootstrap-input-spinner.js"></script>
            <script src="assets/js/jquery.magnific-popup.min.js"></script>
            <!-- Main JS File -->
            <script src="assets/js/main.js"></script>
            <script src="./assets/js/app.js"></script>
        </body>


<?php
    } else {
        header('location: ./404.php');
    }
}
?>

</html>