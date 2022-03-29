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
                                <li class="breadcrumb-item"><a href="index.php" class="couleurJaune">Home</a></li>
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
                                                    <img id="" src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($article['image']) ?>" alt="product image">


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



                                            <div class="product-details-action">


                                                <a href="./panier/addpanier.php?id=<?= $article['id'] ?>" data-id="<?= $article['id'] ?>" class="btn-product addPanier btn-cart"><span class="compteParProduit"><?php
                                                                                                                                                                                                                if (!empty($_SESSION['panier'][$article['id']])) {
                                                                                                                                                                                                                    echo  $_SESSION['panier'][$article['id']];
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>
                                                    </span></a>
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













                        <div class="container mb-4 mt-4">
                            <div class="heading mb-4">
                                <h2 class="title couleurJaune">Découvrez nos pokes :</h2><!-- End .title -->


                            </div><!-- End .heading -->

                            <div class="tab-content tab-content-carousel">
                                <div class="tab-pane p-0 fade show active" id="trending-all-tab" role="tabpanel" aria-labelledby="trending-all-link">
                                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                                    <a href="">
                                                        <img src="./sysadmin/html/assets/uploads/<?= $randArticle['image'] ?>" alt="Product image" class="product-image">
                                                        
                                                    </a>

                                                    <div class="product-action-vertical">
                                                       
                                                    </div><!-- End .product-action-vertical -->

                                                    <div class="product-action" data-id="<?= $randArticle['id'] ?>">
                                                    <a href="./panier/addpanier.php?id=<?= $randArticle['id'] ?>" data-id="<?= $randArticle['id'] ?>" class="btn-product addPanier btn-cart"><span class="compteParProduit"><?php
                                                                                                                                                                                                                if (!empty($_SESSION['panier'][$randArticle['id']])) {
                                                                                                                                                                                                                    echo  $_SESSION['panier'][$randArticle['id']];
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>
                                                    </span></a>
                                                    </div><!-- End .product-action -->
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                     
                                                    </div><!-- End .product-cat -->
                                                    <h3 class="product-title couleurJaune"><a href=""><?= $randArticle['name'] ?></a></h3>
                                                    <!-- End .product-title -->
                                                    <div class="product-price couleurBlanche">
                                                        <?= $randArticle['price'] ?> €
                                                    </div><!-- End .product-price -->


                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        <?php
                                        }
                                        ?>


                                    </div><!-- End .owl-carousel -->
                                </div><!-- .End .tab-pane -->

                            </div><!-- End .tab-content -->
                            <div class="text-center mt-2 mb-3">
                                <div class="text-center btn-wrap">
                                    <a href="menu.php" class="btn btn-outline-darker btn-more"><span class="couleurBlanche">VOIR NOTRE MENU</span><i class="icon-long-arrow-right"></i></a>

                                </div><!-- End .btn-wrap -->
                            </div><!-- End .col-md-4 col-lg-2 -->
                        </div>




























                       
                    </div><!-- End .container -->
            </div><!-- End .page-content -->
            </main><!-- End .main -->


            <?php require("./assets/componants/footer.php"); ?>
            <?php require("./assets/componants/navmenumobile.php"); ?>
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