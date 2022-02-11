<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/componants/header.php');

require('./assets/php/function.php');

$promos = promoAafficher();
$crudIndex = crudIndex();
// var_dump($crudIndex);
$fermerOuOuvert = magasinFermerOuOuvert();

?>

<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php') ?>
        <main class="main">

            <style>
                .alert-warning {
                    border-radius: 3px;
                }
            </style>
            <div class="intro-section pb-6">
                <div class="container">
                    <?php require('./aa.php'); ?>
                    <!-- TODO si y'a une code promo a afficher les bg et les messages dcerreur ou de succes  -->

                    <?php if ($promos) { ?>
                        <style>
                            .cta-display {
                                height: 240px;
                            }
                        </style>
                        <?php foreach ($promos as $promo) { ?>
                            <div class="cta cta-display bg-image pt-4 pb-4" <?php if ($promo['image'] == null) { ?> style="background-image: url(assets/images/im.jfif);" <?php } else { ?> style="background-image: url(./sysadmin/html/assets/uploads/<?= $promo['image'] ?>); width= 100%;" <?php } ?>>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 col-lg-9 col-xl-8">
                                            <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                                <div class="col">
                                                    <h3 class="cta-title text-white"><?= htmlspecialchars($promo['text']); ?></h3><!-- End .cta-title -->
                                                    <p class="cta-desc text-white"><?= htmlspecialchars($promo['name']); ?></p><!-- End .cta-desc -->
                                                </div><!-- End .col -->

                                                <div class="col-auto">
                                                    <a href="login.html" class="btn btn-outline-white"><span>J'EN PROFITE</span><i class="icon-long-arrow-right"></i></a>
                                                </div><!-- End .col-auto -->
                                            </div><!-- End .row no-gutters -->
                                        </div><!-- End .col-md-10 col-lg-9 -->
                                    </div><!-- End .row -->
                                </div><!-- End .container -->
                            </div><!-- End .cta -->
                        <?php } ?>
                    <?php } ?>
                    <div class="row mt-2">
                        <div class="col-lg-8">
                            <div class="intro-slider-container slider-container-ratio slider-container-1 mb-2 mb-lg-0">
                                <div class="intro-slider intro-slider-1 owl-carousel owl-simple owl-light owl-nav-inside" data-toggle="owl" data-owl-options='{
                                        "nav": false, 
                                        "responsive": {
                                            "768": {
                                                "nav": true
                                            }
                                        }
                                    }'>

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="assets/images/carousel1.jfif">
                                                <img src="assets/images/carousel1.jfif" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->
                                        <style>
                                            .testshadow {
                                                text-shadow: 1px 2px rgb(0 0 0 / 25%);
                                            }
                                        </style>
                                        <div class="intro-content">
                                            <h3 class="intro-subtitle ">Nouveautées</h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title testshadow ">Découvrez nos <br>nouveautées</h1><!-- End .intro-title -->

                                            <a href="menu.php" class="btn btn-outline-white">
                                                <span>Voir le menu</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="assets/images/sushi.jfif">
                                                <img src="assets/images/sushi.jfif" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle"></h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">Nos sushi <br> du moment</h1><!-- End .intro-title -->

                                            <a href="menu.php" class="btn btn-outline-white">
                                                <span>Voir le menu</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->

                                    <div class="intro-slide">
                                        <figure class="slide-image">
                                            <picture>
                                                <source media="(max-width: 480px)" srcset="assets/images/carousel3.jfif">
                                                <img src="assets/images/carousel3.jfif" alt="Image Desc">
                                            </picture>
                                        </figure><!-- End .slide-image -->

                                        <div class="intro-content">
                                            <h3 class="intro-subtitle"></h3><!-- End .h3 intro-subtitle -->
                                            <h1 class="intro-title">Nos pokes à <br>partager</h1><!-- End .intro-title -->

                                            <a href="menu.php" class="btn btn-outline-white">
                                                <span>Voir le menu</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </a>
                                        </div><!-- End .intro-content -->
                                    </div><!-- End .intro-slide -->
                                </div><!-- End .intro-slider owl-carousel owl-simple -->

                                <span class="slider-loader"></span><!-- End .slider-loader -->
                            </div><!-- End .intro-slider-container -->
                        </div><!-- End .col-lg-8 -->
                        <div class="col-lg-4">
                            <div class="intro-banners">
                                <div class="row row-sm">
                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display">
                                            <a href="#">
                                                <img src="assets/images/sushijournal.jfif" alt="Banner">
                                            </a>

                                            <div class="banner-content">
                                                <h4 class="banner-subtitle text-darkwhite"><a href="#">Actualités</a></h4><!-- End .banner-subtitle -->
                                                <h3 class="banner-title text-white "><a href="#">Découvrez nos <br>Actualités</a></h3><!-- End .banner-title -->
                                                <a href="actualites.php" class="btn btn-outline-white banner-link">Voir nos actu<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->

                                    <div class="col-md-6 col-lg-12">
                                        <div class="banner banner-display mb-0">
                                            <a href="#">
                                                <img src="ohmysushigifx.gif" alt="Banner">
                                            </a>

                                            <div class="banner-content">
                                                <h4 class="banner-subtitle text-darkwhite"><a href="menu.php"></a></h4><!-- End .banner-subtitle -->

                                                <a href="#" class="btn btn-outline-white banner-link">Voir le menu<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .banner-content -->
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 col-lg-12 -->
                                </div><!-- End .row row-sm -->
                            </div><!-- End .intro-banners -->
                        </div><!-- End .col-lg-4 -->
                    </div><!-- End .row -->

                    <div class="mb-6"></div><!-- End .mb-6 -->
                    <style>
                        .couleurJaune {
                            color: #b4a895 !important;
                        }

                        .couleurBlanche {
                            color: white !important;
                        }
                    </style>
                    <div class="container">

                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-6">
                                <div class="icon-box icon-box-card text-center">
                                    <span class="icon-box-icon">
                                        <i class="icon-rocket couleurJaune"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title couleurJaune">Paiement et Livraison</h3><!-- End .icon-box-title -->
                                        <p class="couleurBlanche">Lorem ipsum dolor sit.</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-lg-4 col-sm-6 -->

                            <div class="col-lg-4 col-sm-6">
                                <div class="icon-box icon-box-card text-center">
                                    <span class="icon-box-icon">
                                        <i class="icon-rotate-left couleurJaune"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title couleurJaune"> Paiement 100% sécurisé</h3><!-- End .icon-box-title -->
                                        <p class="couleurBlanche">Lorem ipsum dolor sit.</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-lg-4 col-sm-6 -->

                            <div class="col-lg-4 col-sm-6">
                                <div class="icon-box icon-box-card text-center">
                                    <span class="icon-box-icon">
                                        <i class="icon-life-ring couleurJaune"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h3 class="icon-box-title couleurJaune">Qualité des produits</h3><!-- End .icon-box-title -->
                                        <p class="couleurBlanche">Lorem ipsum dolor sit.</p>
                                    </div><!-- End .icon-box-content -->
                                </div><!-- End .icon-box -->
                            </div><!-- End .col-lg-4 col-sm-6 -->
                        </div><!-- End .row -->

                        <div class="mb-2"></div><!-- End .mb-2 -->
                    </div><!-- End .container -->
                </div><!-- End .container -->
            </div><!-- End .bg-lighter -->
            <style>
                .bannierPartiUne {
                    max-height: 590px;
                    object-fit: cover;
                    filter: brightness(85%);
                }
            </style>

            <!-- debut de la premiere image banniere  -->
            <div class="container-fluid">
                <div class="row bgrow">
                    <div class="col-12">

                        <div class="banner banner-big">
                            <a href="#">
                                <img class="bannierPartiUne" src="assets/images/essaipoidimage.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle text-primary">Nouveautés</h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title text-white">Nouvelles <br>créations.</h3>
                                <!-- End .banner-title -->
                                <p class="d-none d-lg-block couleurBlanche">Aussi savoureuses que généreuse, à découvrir sans plus attendre!</p>

                                <a href="#" class="btn btn-primary btn-rounded"><span>Je découvre</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-12 -->
                </div><!-- End .row -->

            </div>
            <!--fin de la premiere image banniere -->

            <div class="mb-5"></div><!-- End .mb-6 -->

            <div class="container mb-4 mt-4">
                <div class="heading mb-4">
                    <h2 class="title couleurJaune">Découvrez nos nouveautés :</h2><!-- End .title -->


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
                            $nouveautees = viewIndexMenuNew();

                            foreach ($nouveautees as $nouveautee) {
                            ?>
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="./product.php?id=<?= $nouveautee['id'] ?>">
                                            <img src="./sysadmin/html/assets/uploads/petite<?= $nouveautee['image'] ?>" alt="Product image" class="product-image">
                                            <span class="product-label label-sale">Nouveautées</span>
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

                                                <a href="./panier/addpanier.php?id=<?= $nouveautee['id'] ?>" data-id="<?= $nouveautee['id'] ?>" class="btn-product addPanier btn-cart"><span class="compteParProduit"><?php
                                                                                                                                                                                                                                                        if (!empty($_SESSION['panier'][$nouveautee['id']])) {
                                                                                                                                                                                                                                                            echo  $_SESSION['panier'][$nouveautee['id']];
                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                        ?>
                                                    </span></a>
                                            </div><!-- End .product-action -->
                                        <?php } ?>
                                    </figure><!-- End .product-media -->
                                    <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>
                                        <div class="couleurJaune product-mobile-version w-100">
                                            <a href="./panier/addpanier.php?id=<?= $nouveautee['id'] ?>"  data-id="<?= $nouveautee['id'] ?>"  class="btn-product addPanier btn-cart">
                                                <span class="compteParProduit"><?php
                                                                                if (!empty($_SESSION['panier'][$nouveautee['id']])) {
                                                                                    echo  $_SESSION['panier'][$nouveautee['id']];
                                                                                }
                                                                                ?>
                                                </span></a>

                                        </div>
                                    <?php } ?>
                                    <div class="product-body">

                                        <div class="product-cat">
                                            <a href="#" class="couleurJaune"><?= $nouveautee['label'] ?></a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title couleurBlanche"><a href="./product.php?id=<?= $nouveautee['id'] ?>"><?= $nouveautee['name'] ?></a></h3>
                                        <!-- End .product-title -->
                                        <div class="product-price">
                                            <?= $nouveautee['price'] ?> €
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
                        <a href="menu.php" class="btn btn-outline-darker btn-more"><span class="couleurBlanche">VOIR NOTRE MENU</span><i class="icon-long-arrow-right couleurJaune"></i></a>

                    </div><!-- End .btn-wrap -->
                </div><!-- End .col-md-4 col-lg-2 -->
            </div>
            <!-- fin menu avec quelque nouveautés -->


            <div class="mb-5"></div><!-- End .mb-6 -->

      

            <!-- SECTION OU IL PEUT MODIFIER AVEC LA SECTION DE BASE SI IL NYA RIEN -->
            <?php if (empty($crudIndex)) { ?>
                <!-- debut de la deuxieme image banniere  -->
                <div class="container-fluid">
                    <div class="row bgrow">
                        <div class="col-12">

                            <div class="banner banner-big">
                                <a href="#">
                                    <img class="bannierPartiUne" src="./nospoke.gif" alt="Banner">
                                </a>

                                <div class="banner-content">
                                    <h4 class="banner-subtitle text-primary">Nos pokes</h4><!-- End .banner-subtitle -->
                                    <h3 class="banner-title text-white">Même <br> à plusieurs .</h3>
                                    <!-- End .banner-title -->
                                    <p class="d-none d-lg-block">Découvrez nos pokes, tout seul ou à partager.</p>

                                    <a href="#" class="btn btn-primary btn-rounded"><span>Click Here</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div><!-- End .col-12 -->
                    </div><!-- End .row -->

                </div>
                <!--fin de la deuxieme image banniere -->

                <!-- menu avec quelque poke -->
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
                                $decouvrezSushi = viewIndexMenuPartiSushi();
                                foreach ($decouvrezSushi as $nosSushiIndex) { ?>
                                    <div class="product product-7 text-center">
                                        <figure class="product-media">
                                            <a href="./product.php?id=<?= $nosSushiIndex['id'] ?>">
                                                <img src=" ./sysadmin/html/assets/uploads/petite<?= $nosSushiIndex['image'] ?>" alt="Product image" class="product-image">
                                                <!-- <span class="product-label label-sale">Nouveautées</span> -->
                                            </a>

                                            <!-- <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favoris</span></a>
                                            </div>End .product-action-vertical -->
                                            <?php if ($fermerOuOuvert['valeur'] == "ouvert") { ?>

                                                <div class="product-action">
                                                    <a href="./panier/addpanier.php?id=<?= $nosSushiIndex['id'] ?>" class="btn-product addPanier btn-cart"><span>ajouter au panier</span></a>
                                                </div><!-- End .product-action -->
                                            <?php } ?>
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?= $nosSushiIndex['label'] ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title couleurJaune"><a href="./product.php?id=<?= $nosSushiIndex['id'] ?>"><?= $nosSushiIndex['name'] ?></a></h3>
                                            <!-- End .product-title -->
                                            <div class="product-price couleurBlanche">
                                                <?= $nosSushiIndex['price'] ?> €
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
                <!-- fin menu avec quelque poke -->
                <?php } else {
                var_dump($crudIndex);
                foreach ($crudIndex as $indexCrud) {
                ?>

                    <!-- debut de la deuxieme image banniere  -->
                    <div class="container-fluid">
                        <div class="row bgrow">
                            <div class="col-12">

                                <div class="banner banner-big">
                                    <a href="#">
                                        <img class="bannierPartiUne" src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($indexCrud['image']) ?>" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 class="banner-subtitle text-primary">Nos pokes</h4><!-- End .banner-subtitle -->
                                        <h3 class="banner-title text-white"><?= htmlspecialchars($indexCrud['titre']) ?></h3>
                                        <!-- End .banner-title -->
                                        <p class="d-none d-lg-block"><?= htmlspecialchars($indexCrud['texte']) ?></p>

                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-12 -->
                        </div><!-- End .row -->

                    </div>
                    <!--fin de la deuxieme image banniere -->

                    <!-- menu avec quelque poke -->
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
                                    $crudIndexMenu = crudIndexPourLesMenu();
                                    foreach ($crudIndexMenu as $nosMenu) { ?>
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <a href="">
                                                    <img src="./sysadmin/html/assets/uploads/petite<?= $nosMenu['image'] ?>" alt="Product image" class="product-image">
                                                    <span class="product-label label-sale">Nouveautées</span>
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>ajouter au favoris</span></a>
                                                </div><!-- End .product-action-vertical -->

                                                <div class="product-action" data-id="<?= $nosMenu['id'] ?>">
                                                    <a href="./panier/addpanier.php?id=<?= $nosMenu['id'] ?>" class="btn-product addPanier btn-cart"><span>ajotuter au panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#"><?= $nosMenu['label'] ?></a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title couleurJaune"><a href=""><?= $nosMenu['name'] ?></a></h3>
                                                <!-- End .product-title -->
                                                <div class="product-price couleurBlanche">
                                                    <?= $nosMenu['price'] ?> €
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
                    <!-- fin menu avec quelque poke -->

            <?php }
            } ?>

            <!-- FIN SECTION OU IL PEUT MODIFIER AVEC LA SECTION DE BASE SI IL NYA RIEN -->
            <div class="mb-5"></div><!-- End .mb-6 -->

            <!-- debut du menu categorie   -->
            <div class="container categories pt-6">
                <h2 class="title-lg text-center couleurJaune mb-4">Découvrez par menu</h2><!-- End .title-lg text-center -->

                <div class="row">
                    <div class="col-6 col-lg-4">
                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="assets/images/indexmenuportrait2.jfif" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Sushi</a></h3><!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Voir Menu<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    <div class="col-6 col-lg-4 order-lg-last">
                        <div class="banner banner-display banner-link-anim">
                            <a href="#">
                                <img src="assets/images/indexmenubg.jfif" alt="Banner">
                            </a>

                            <div class="banner-content banner-content-center">
                                <h3 class="banner-title text-white"><a href="#">Sushi</a></h3><!-- End .banner-title -->
                                <a href="#" class="btn btn-outline-white banner-link">Voir Menu<i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-sm-6 col-lg-3 -->
                    <div class="col-sm-12 col-lg-4 banners-sm">
                        <div class="row">
                            <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                <a href="#">
                                    <img src="assets/images/indexmenubgbg.jfif" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h3 class="banner-title text-white"><a href="#">Poke</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Voir Menu<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->

                            <div class="banner banner-display banner-link-anim col-lg-12 col-6">
                                <a href="#">
                                    <img src="assets/images/indexmenulandscape2.jfif" alt="Banner">
                                </a>

                                <div class="banner-content banner-content-center">
                                    <h3 class="banner-title text-white"><a href="#">Poke</a></h3><!-- End .banner-title -->
                                    <a href="#" class="btn btn-outline-white banner-link">Voir Menu<i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .banner-content -->
                            </div><!-- End .banner -->
                        </div>
                    </div><!-- End .col-sm-6 col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
            <!-- fin du menu categorie   -->

            <div class="mb-5"></div><!-- End .mb-6 -->
            <!-- debut des actualites   -->
            <?php
            $actualitess = viewIndexFullActualites();

            if ($actualitess) {
            ?>
                <div class="blog-posts pt-7 pb-7" style="background-color: #000;">
                    <div class="container">
                        <h2 class="title-lg text-center mb-5 mb-md-4 couleurJaune">Découvrez notre actualités :</h2><!-- End .title-lg text-center -->

                        <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>

                            <?php

                            foreach ($actualitess as $actualite) {

                                $extract = extraitIndex($actualite['description']);

                            ?>
                                <article class="entry entry-display">
                                    <figure class="entry-media">
                                        <a href="actualite.php?id=<?= $actualite['id'] ?>">
                                            <img src="./sysadmin/html/assets/uploads/petite<?= $actualite['image'] ?>" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body pb-4 text-center">


                                        <h3 class="entry-title couleurBlanche">
                                            <a href="actualite.php?id=<?= $actualite['id'] ?>"><?= $actualite['name'] ?>.</a>
                                        </h3><!-- End .entry-title -->
                                        <style>
                                            .extraitActu {
                                                text-overflow: ellipsis;
                                            }
                                        </style>
                                        <div class="entry-content couleurBlanche">
                                            <!-- <p class="couleurBlanche extraitActu"><?= $extract ?> </p> -->
                                            <a href="actualite.php?id=<?= $actualite['id'] ?>" class="read-more">Lire la suite</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </article><!-- End .entry -->
                            <?php } ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- container -->

                    <div class="more-container text-center mb-0 mt-3">
                        <a href="actualites.php" class="btn btn-outline-darker btn-more"><span class="couleurBlanche">VOIR NOS ARTICLES</span><i class="icon-long-arrow-right"></i></a>
                    </div><!-- End .more-container -->
                </div>
                <!-- fin des actualites  -->
            <?php
            }
            ?>


            <?php if ($promos) { ?>
                <style>
                    .cta-display {
                        height: 240px;
                    }
                </style>
                <?php foreach ($promos as $promo) { ?>
                    <div class="cta cta-display bg-image pt-4 pb-4" <?php if ($promo['image'] == null) { ?> style="background-image: url(assets/images/im.jfif);" <?php } else { ?> style="background-image: url(./sysadmin/html/assets/uploads/<?= $promo['image'] ?>); width= 100%;" <?php } ?>>
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-9 col-xl-8">
                                    <div class="row no-gutters flex-column flex-sm-row align-items-sm-center">
                                        <div class="col">
                                            <h3 class="cta-title text-white"><?= htmlspecialchars($promo['text']); ?></h3><!-- End .cta-title -->
                                            <p class="cta-desc text-white"><?= htmlspecialchars($promo['name']); ?></p><!-- End .cta-desc -->
                                        </div><!-- End .col -->

                                        <div class="col-auto">
                                            <a href="login.html" class="btn btn-outline-white"><span>J'EN PROFITE</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row no-gutters -->
                                </div><!-- End .col-md-10 col-lg-9 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .cta -->
                <?php } ?>
            <?php } ?>
            <!-- fin du inscrit toi  -->
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
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="./assets/js/app.js"></script>

</body>


</html>