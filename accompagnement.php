<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
if (isset($_GET['del'])) {
    $panier->del($_GET['del']);
}
require('./assets/componants/header.php');
$promos = promoAafficher();
$crudIndex = crudIndex();
// var_dump($crudIndex);
$fermerOuOuvert = magasinFermerOuOuvert();

?>



<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>
        <main class="main">
            <div class="page-header text-center" style="background:#010101">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Mes accompagnements<span></span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>

                        <li class="breadcrumb-item active couleurJaune" aria-current="page">Accompagnement</li>
                        <li class="breadcrumb-item" aria-current="page">Adresse</li>
                        <li class="breadcrumb-item" aria-current="page">Mode de livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Paiement</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-9">

                                <style>
                                   
                                    .queLesSauces,
                                    .choixBaguetteOuCouvert {
                                        display: flex;
                                        flex-direction: row;
                                        justify-content: space-evenly;
                                        flex-wrap: wrap;
                                        /* justify-content: center; */
                                    }

                                    .salee,
                                    .sucree {
                                        border: 1px dotted grey;
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: space-around;
                                        align-items: center;
                                        width: 170px;

                                        border-radius: 2px;
                                        min-height: 150px;
                                    }

                                    .choixBaguette {
                                        border: 1px dotted grey;
                                        display: flex;
                                        flex-direction: column;
                                        justify-content: space-around;
                                        align-items: center;
                                        width: 180px;


                                        min-height: 150px;
                                        padding: 2rem;
                                        border-radius: 2px;

                                    }

                                    .choixBaguette input {
                                        width: 50% !important;
                                    }


                                    .bgbg {
                                        border: 1px solid red;
                                        background-color: rgba(255, 71, 71, 0.7);
                                    }

                                    #salee,
                                    #sucree,
                                    #nem,
                                    #wasabi,
                                    #gingembre {
                                        display: none;
                                    }
                                </style>
                                <script>
                                    function mafctSucree() {
                                        let checksucree = document.getElementById('sucree').checked
                                        let labelSucree = document.getElementById('labelSucree')

                                        if (checksucree == true) {
                                            labelSucree.classList.add('bgbg');

                                        } else if (checksucree == false) {
                                            labelSucree.classList.remove('bgbg')
                                        }
                                    }


                                    function mafvt() {
                                        let voir = document.getElementById('salee').checked
                                        let bgbg = document.getElementById('bgbg')
                                        console.log(voir)
                                        if (voir == true) {
                                            bgbg.classList.add('bgbg');
                                        } else if (voir == false) {
                                            bgbg.classList.remove('bgbg')
                                        }
                                    }

                                    function mafvt2() {
                                        let voire = document.getElementById('wasabi').checked
                                        let bgbg = document.getElementById('labelWasabi')
                                        console.log(voire)
                                        if (voire == true) {
                                            bgbg.classList.add('bgbg');
                                        } else if (voire == false) {
                                            bgbg.classList.remove('bgbg')
                                        }
                                    }

                                    function mafctSucreee() {
                                        let checksucree = document.getElementById('nem').checked
                                        let labelSucree = document.getElementById('labelnem')

                                        if (checksucree == true) {
                                            labelSucree.classList.add('bgbg');

                                        } else if (checksucree == false) {
                                            labelSucree.classList.remove('bgbg')
                                        }
                                    }

                                    function mafctSucreeee() {
                                        let checksucree = document.getElementById('gingembre').checked
                                        let labelSucree = document.getElementById('labelgingembre')

                                        if (checksucree == true) {
                                            labelSucree.classList.add('bgbg');

                                        } else if (checksucree == false) {
                                            labelSucree.classList.remove('bgbg')
                                        }
                                    }
                                </script>
                                <?php if (!empty($_SESSION['panier'])) { ?>
                                    <div class="">

                                        <div class="row">
                                            <h3 class="couleurJaune">Envie d’un accompagnement ?</h3>
                                        </div>
                                        <form action="bg.php" method="POST">

                                            <div class="row lessauces mt-3">
                                                <div class="queLesSauces">


                                                    <label for="nem" class="sucree" id="labelnem">
                                                        <input onclick="mafctSucreee()" type="checkbox" name="nem" id="nem">
                                                        <img src="./iconsauce2.png" class="pt-2 pb-1" alt="">
                                                        <h6 class="couleurBlanche">Sauce Nem</h6>
                                                    </label>
                                                    <label for="gingembre" class="sucree" id="labelgingembre">
                                                        <input onclick="mafctSucreeee()" type="checkbox" name="gingembre" id="gingembre">
                                                        <img src="./iconsauce2.png" class="pt-2 pb-1" alt="">
                                                        <h6 class="couleurBlanche">Sauce gingembre</h6>
                                                    </label>
                                                    <label for="salee" class="salee" id="bgbg">
                                                        <input onclick="mafvt()" type="checkbox" name="salee" id="salee">
                                                        <img src="./iconsauce2.png" class="pt-2 pb-1" alt="">
                                                        <h6 class="couleurBlanche">Sauce salé</h6>
                                                    </label>
                                                    <label for="wasabi" class="sucree" id="labelWasabi">
                                                        <input onclick="mafvt2()" type="checkbox" name="wasabi" id="wasabi">
                                                        <img src="./iconsauce2.png" class="pt-2 pb-1" alt="">
                                                        <h6 class="couleurBlanche">Wasabi</h6>
                                                    </label>

                                                    <label for="sucree" class="sucree" id="labelSucree">
                                                        <input onclick="mafctSucree()" type="checkbox" name="sucree" id="sucree">
                                                        <img src="./iconsauce2.png" class="pt-2 pb-1" alt="">
                                                        <h6 class="couleurBlanche">Sauce Sucré</h6>
                                                    </label>
                                                </div>
                                                <style>

                                                </style>

                                                <div class="choixBaguetteOuCouvert">
                                                    <div class="choixBaguette">
                                                        <label for="baguette" class="baguette">
                                                            Baguette
                                                        </label>
                                                        <input type="number" name="quantityBaguette">
                                                    </div>
                                                    <div class="choixBaguette">
                                                        <label for="baguette" class="baguette">
                                                            Couvert
                                                        </label>
                                                        <input type="number" name="quantityCouvert">
                                                    </div>
                                                </div>

                                            </div>

                                            
                                    </div><!-- End .cart-bottom -->


                                <?php } ?>
                                <div class="pt-5">
                                    <div class="heading mb-4">
                                        <h2 class="title couleurJaune">Envie d'un dessert ? </h2><!-- End .title -->


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
                                                $produitAle = randMenu();
                                                foreach ($produitAle as $aleatoirProduit) {
                                                ?>
                                                    <div class="product product-7 text-center">
                                                        <figure class="product-media">
                                                            <a href="./product.php?id=<?= $aleatoirProduit['id'] ?>">
                                                                <img src="./sysadmin/html/assets/uploads/petite<?= $aleatoirProduit['image'] ?>" alt="Product image" class="product-image">

                                                            </a>

                                                            <!-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favoris</span></a>
                                        </div>End .product-action-vertical -->
                                                            <style>
                                                                @media (max-width: 1024px) {
                                                                    .product-desktop-version {
                                                                        display: none;
                                                                    }

                                                                    .product-mobile-version {

                                                                        background-color: #363636 !important;
                                                                    }

                                                                    .product-mobile-version .btn-product {

                                                                        background-color: #0F0F10 !important;
                                                                        border-bottom: .1rem solid #07080D !important;
                                                                    }
                                                                }

                                                                @media (min-width: 1024px) {
                                                                    .product-mobile-version {
                                                                        display: none;

                                                                    }
                                                                }
                                                            </style>


                                                            <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>

                                                                <div class="product-action product-desktop-version">

                                                                    <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>"  data-id="<?=$aleatoirProduit['id'] ?>"  class="btn-product addPanier btn-cart"><span>ajouter au panier </span> <span class="compteParProduit"><?php
                                                                                                                                                                                                                                            if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                                                                                                                                                                echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                            ?>
                                                                        </span></a>
                                                                </div><!-- End .product-action -->
                                                            <?php } ?>
                                                        </figure><!-- End .product-media -->
                                                        <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>
                                                            <div class="couleurJaune product-mobile-version w-100">
                                                                <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>"  data-id="<?=$aleatoirProduit['id'] ?>" class="btn-product addPanier btn-cart">
                                                                    <span class="compteParProduit"><?php
                                                                                                    if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                        echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                    }
                                                                                                    ?>
                                                                    </span></a>

                                                            </div>
                                                        <?php } ?>
                                                        <div class="product-body">

                                                            <div class="product-cat">
                                                            </div><!-- End .product-cat -->
                                                            <h3 class="product-title couleurBlanche"><a href="./product.php?id=<?= $aleatoirProduit['id'] ?>"><?= $aleatoirProduit['name'] ?></a></h3>
                                                            <!-- End .product-title -->
                                                            <div class="product-price">
                                                                <?= $aleatoirProduit['price'] ?> €
                                                            </div><!-- End .product-price -->


                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .product -->
                                                <?php
                                                }
                                                ?>


                                            </div><!-- End .owl-carousel -->
                                        </div><!-- .End .tab-pane -->

                                    </div><!-- End .tab-content -->

                                </div>
                                <div class="pt-4">
                                    <div class="heading mb-4">
                                        <h2 class="title couleurJaune">Envie d'un dessert ? </h2><!-- End .title -->


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
                                                $produitAle = randMenu();
                                                foreach ($produitAle as $aleatoirProduit) {
                                                ?>
                                                    <div class="product product-7 text-center">
                                                        <figure class="product-media">
                                                            <a href="./product.php?id=<?= $aleatoirProduit['id'] ?>">
                                                                <img src="./sysadmin/html/assets/uploads/petite<?= $aleatoirProduit['image'] ?>" alt="Product image" class="product-image">

                                                            </a>

                                                            <!-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favoris</span></a>
                                        </div>End .product-action-vertical -->
                                                            <style>
                                                                @media (max-width: 1024px) {
                                                                    .product-desktop-version {
                                                                        display: none;
                                                                    }

                                                                    .product-mobile-version {

                                                                        background-color: #363636 !important;
                                                                    }

                                                                    .product-mobile-version .btn-product {

                                                                        background-color: #0F0F10 !important;
                                                                        border-bottom: .1rem solid #07080D !important;
                                                                    }
                                                                }

                                                                @media (min-width: 1024px) {
                                                                    .product-mobile-version {
                                                                        display: none;

                                                                    }
                                                                }
                                                            </style>


                                                            <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>

                                                                <div class="product-action product-desktop-version">

                                                                    <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>"  data-id="<?= $aleatoirProduit['id'] ?>" class="btn-product addPanier btn-cart"><span>ajouter au panier </span> <span class="compteParProduit"><?php
                                                                                                                                                                                                                                            if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                                                                                                                                                                echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                            ?>
                                                                        </span></a>
                                                                </div><!-- End .product-action -->
                                                            <?php } ?>
                                                        </figure><!-- End .product-media -->
                                                        <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>
                                                            <div class="couleurJaune product-mobile-version w-100">
                                                                <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>" class="btn-product addPanier btn-cart">
                                                                    <span class="compteParProduit"><?php
                                                                                                    if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                        echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                    }
                                                                                                    ?>
                                                                    </span></a>

                                                            </div>
                                                        <?php } ?>
                                                        <div class="product-body">

                                                            <div class="product-cat">
                                                            </div><!-- End .product-cat -->
                                                            <h3 class="product-title couleurBlanche"><a href="./product.php?id=<?= $aleatoirProduit['id'] ?>"><?= $aleatoirProduit['name'] ?></a></h3>
                                                            <!-- End .product-title -->
                                                            <div class="product-price">
                                                                <?= $aleatoirProduit['price'] ?> €
                                                            </div><!-- End .product-price -->


                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .product -->
                                                <?php
                                                }
                                                ?>


                                            </div><!-- End .owl-carousel -->
                                        </div><!-- .End .tab-pane -->

                                    </div><!-- End .tab-content -->

                                </div>

                                <div class="pt-4">
                                    <div class="heading mb-4">
                                        <h2 class="title couleurJaune">Envie d'un dessert ? </h2><!-- End .title -->


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
                                                $produitAle = randMenu();
                                                foreach ($produitAle as $aleatoirProduit) {
                                                ?>
                                                    <div class="product product-7 text-center">
                                                        <figure class="product-media">
                                                            <a href="./product.php?id=<?= $aleatoirProduit['id'] ?>" >
                                                                <img src="./sysadmin/html/assets/uploads/petite<?= $aleatoirProduit['image'] ?>" alt="Product image" class="product-image">

                                                            </a>

                                                            <!-- <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favoris</span></a>
                                        </div>End .product-action-vertical -->
                                                            <style>
                                                                @media (max-width: 1024px) {
                                                                    .product-desktop-version {
                                                                        display: none;
                                                                    }

                                                                    .product-mobile-version {

                                                                        background-color: #363636 !important;
                                                                    }

                                                                    .product-mobile-version .btn-product {

                                                                        background-color: #0F0F10 !important;
                                                                        border-bottom: .1rem solid #07080D !important;
                                                                    }
                                                                }

                                                                @media (min-width: 1024px) {
                                                                    .product-mobile-version {
                                                                        display: none;

                                                                    }
                                                                }
                                                            </style>


                                                            <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>

                                                                <div class="product-action product-desktop-version">

                                                                    <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>"  data-id="<?=$aleatoirProduit['id'] ?>" class="btn-product addPanier btn-cart"><span>ajouter au panier </span> <span class="compteParProduit"><?php
                                                                                                                                                                                                                                            if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                                                                                                                                                                echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                            ?>
                                                                        </span></a>
                                                                </div><!-- End .product-action -->
                                                            <?php } ?>
                                                        </figure><!-- End .product-media -->
                                                        <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>
                                                            <div class="couleurJaune product-mobile-version w-100">
                                                                <a href="./panier/addpanier.php?id=<?= $aleatoirProduit['id'] ?>"  data-id="<?=$aleatoirProduit['id'] ?>"  class="btn-product addPanier btn-cart">
                                                                    <span class="compteParProduit"><?php
                                                                                                    if (!empty($_SESSION['panier'][$aleatoirProduit['id']])) {
                                                                                                        echo  $_SESSION['panier'][$aleatoirProduit['id']];
                                                                                                    }
                                                                                                    ?>
                                                                    </span></a>

                                                            </div>
                                                        <?php } ?>
                                                        <div class="product-body">

                                                            <div class="product-cat">
                                                            </div><!-- End .product-cat -->
                                                            <h3 class="product-title couleurBlanche"><a href="./product.php?id=<?= $aleatoirProduit['id'] ?>"><?= $aleatoirProduit['name'] ?></a></h3>
                                                            <!-- End .product-title -->
                                                            <div class="product-price">
                                                                <?= $aleatoirProduit['price'] ?> €
                                                            </div><!-- End .product-price -->


                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .product -->
                                                <?php
                                                }
                                                ?>


                                            </div><!-- End .owl-carousel -->
                                        </div><!-- .End .tab-pane -->

                                    </div><!-- End .tab-content -->

                                </div>

                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">
                                <style>
                                    aside .summary-cart {
                                        position: sticky;
                                        top: 120px;
                                    }
                                </style>
                                <div class="summary summary-cart">
                                    <h3 class="summary-title ">Notre récapitulatif</h3><!-- End .summary-title -->


                                    <table class="table table-summary">
                                        <tbody>
                                            <!-- <tr class="summary-subtotal">
                                                <td>Sous-total:</td>
                                                <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                            </tr>End .summary-subtotal -->

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                              <td>  <span data-total-panier><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?></span>€</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->

                                    <!-- <button type="button" data-toggle="modal" data-target="#modalAccompagnement" class="btn btn-outline-primary-2 btn-order btn-block">PROCEDER AU PAIEMENT</button> -->

                                    <?php
                                    if (!empty($_SESSION['panier'])) {
                                        if (!empty($_SESSION['users'])) { ?>
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PROCEDER AU PAIEMENT</button>
                                        <?php } else { ?>
                                            <button type="button" href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2 btn-order btn-block">PROCEDER AU PAIEMENT</button>
                                    <?php   }
                                    } ?>

                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">PASSER A L'ADRESSE DE FACTURATION</button>

                                    </form>




                                </div><!-- End .summary -->


                                <a href="menu.php" class="btn btn-outline-dark-2 btnContinuerLesCourses  btn-block mb-3 btn-blanc"><span class="couleurJaune">CONTINUE LES COURSES</span><i class="icon-refresh"></i></a>
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