<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');

$lesCategory = categoryMenu();
$products = products();

require('./assets/componants/header.php');

?>


<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php');  ?>
        <style>
            .btnbtnbtn {
                width: 100%;
                border-radius: 2px;
            }

            .modal-footer,
            .modal-header {
                border: none;
            }

            .imgimgimg {
                width: 50%;
            }

            .imgmodal {
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .btn-close {
                color: white !important;
                background-color: #ebebeb;
            }
        </style>
        <!-- Modal -->
        <div class="modal  fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class=" bg-black modal-content">
                    <div class="text-white modal-header">
                        <h5 class="text-white modal-title" id="exampleModalLabel">Titre du produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <h6 class="text-white-50 modal-sub-title text-center" id="">Catégorie du produit</h6>
                    <div class="modal-body">
                        <div class="imgmodal">
                            <img src="./assets/images/product1parti1.jfif" alt="" class="imgimgimg img-fluid" srcset="">
                        </div>
                        <div class="text-white m-5 prix text-center">
                            12€
                        </div>
                        <div class="text-white description">
                            Lorem ipsum dolor sit amet consectetur.
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btnbtnbtn mb-3 btn-primary">Ajouter au panier</button>
                    </div>
                </div>
            </div>
        </div>
        <main class="main">
            <div class="page-header text-center" style="background: #000">
                <div class="container">
                    <h1 class="page-title"><span>Notre menu</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Notre menu</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <style>
                @media screen and (max-width: 1024px) {
                    .page-contentLaptot {
                        display: none;
                    }

                }

                @media screen and (min-width: 1024px) {
                    .page-contentMobile {
                        display: none;
                    }
                }

                .categoryList {
                    display: flex;

                    justify-content: space-around;

                }

                .articlePanierLaptop {
                    display: flex;
                    justify-content: space-around;
                    align-items: center;
                    flex-direction: row;

                    border-bottom: 1px solid #b4a895;
                }

                .articlePanierLaptop .imageArticlePanierLaptop {
                    flex: 1;
                }

                .articlePanierLaptop .titreProduitPanierLaptop {
                    flex: 2;
                }

                .articlePanierLaptop .prixProduitPanierLaptop {
                    flex: 1;
                }

                .quantiteProduitPanierLaptop {
                    flex: 1;
                }
            </style>
            <div class="page-content page-contentLaptot m-5">
                <div class="">
                    <div class="row">

                        <div class="col-lg-10">
                            <div class="toolbox">
                                <div class="toolbox-right m-5">

                                    <div class="toolbox-layout">
                                        <a href="menuAligneeMobile.php" class="btn-layout">
                                            <svg width="16" height="10">
                                                <rect x="0" y="0" width="4" height="4" />
                                                <rect x="6" y="0" width="10" height="4" />
                                                <rect x="0" y="6" width="4" height="4" />
                                                <rect x="6" y="6" width="10" height="4" />
                                            </svg>
                                        </a>

                                        <a href="#" class="btn-layout active">
                                            <svg width="10" height="10">
                                                <rect x="0" y="0" width="4" height="4" />
                                                <rect x="6" y="0" width="4" height="4" />
                                                <rect x="0" y="6" width="4" height="4" />
                                                <rect x="6" y="6" width="4" height="4" />
                                            </svg>
                                        </a>


                                    </div><!-- End .toolbox-layout -->
                                </div><!-- End .toolbox-right -->


                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-start">
                                    <?php foreach ($products as $product) {

                                    ?>
                                        <div class="col-4 col-md-4 col-lg-4 col-xl-3">
                                            <div class="product product-7 text-center">
                                                <figure class="product-media">
                                                    <!-- <span class="product-label label-new">New</span> -->
                                                    <a href="product.html">
                                                        <img src="./sysadmin/html/assets/uploads/petite<?= $product['image'] ?>" alt="Product image" class="product-image">
                                                    </a>

                                                    <style>
                                                        .btn-product-rupture {
                                                            padding-top: 1.1rem;
                                                            padding-bottom: 1.1rem;
                                                            color: #c96;
                                                            background-color: #fff;
                                                            text-transform: uppercase;
                                                            border-bottom: .1rem solid #ebebeb;

                                                        }
                                                    </style>

                                                    <?php
                                                    if ($product['stoc'] == 'rupture') { ?>
                                                        <div class="product-action">
                                                            <a href="#" class="btn-product-rupture ">Rupture de stock</a>
                                                        </div><!-- End .product-action -->
                                                    <?php } else {

                                                    ?>

                                                        <div class="product-action">
                                                            <a class="add addPanier btn-product btn-cart" href="./panier/addpanier.php?id=<?= $product['id'] ?>"><span>Ajovuter au
                                                                    panier</span></a>
                                                        </div><!-- End .product-action -->
                                                    <?php } ?>
                                                </figure><!-- End .product-media -->

                                                <div class="product-body">
                                                    <div class="product-cat">
                                                        <a href="#"><?= $product['label'] ?></a>
                                                    </div><!-- End .product-cat -->
                                                    <style>
                                                        .maclasse {
                                                            text-decoration: line-through;
                                                        }
                                                    </style>
                                                    <?php if ($product['stoc'] == 'rupture') { ?>
                                                        <h3 class="product-title maclasse"><a href="product.html"><?= $product['name'] ?></a></h3><!-- End .product-title -->
                                                        <div class="maclasse product-price">
                                                            <?= $product['price'] ?> €
                                                        </div><!-- End .product-price -->
                                                    <?php } else { ?>
                                                        <h3 class="product-title"><a href="product.html"><?= $product['name'] ?></a></h3><!-- End .product-title -->
                                                        <div class="product-price">
                                                            <?= $product['price'] ?> €
                                                        </div><!-- End .product-price -->

                                                    <?php } ?>

                                                </div><!-- End .product-body -->
                                            </div><!-- End .product -->
                                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                    <?php } ?>

                                </div><!-- End .row -->
                            </div><!-- End .products -->



                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-2  order-lg-first">
                            <div class="sidebar sidebar-shop">
                                <div class="text-whitewidget widget-clean">
                                    <label>Filtre:</label>
                                    <a href="#" class="sidebar-filter-clear">Clean All</a>
                                </div><!-- End .widget widget-clean -->

                                <div class="widget widget-collapsible">
                                    <h3 class="text-white widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            Cagtégorie
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="lescategorie">
                                        <div class="categorie mt-2">
                                            <a href="" class="border">Tout les menu</a>
                                        </div>
                                        <?php foreach ($lesCategory as $category) { ?>
                                            <div class="categorie mt-2">
                                                <a href="" class="border"><?= $category['label'] ?></a>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div><!-- End .widget -->




                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->

                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->

            <div class="page-contentMobile">
                <div class="page-content">
                    <div class="container">
                        <nav class="blog-nav ">
                            <div class="toolbox-layout text-center mb-3 pb-2">
                                <a class="btn-layout buttonligne">
                                    <svg width="16" height="10">
                                        <rect x="0" y="0" width="4" height="4"></rect>
                                        <rect x="6" y="0" width="10" height="4"></rect>
                                        <rect x="0" y="6" width="4" height="4"></rect>
                                        <rect x="6" y="6" width="10" height="4"></rect>
                                    </svg>
                                </a>

                                <a class="btn-layout buttonnormal">
                                    <svg width="10" height="10">
                                        <rect x="0" y="0" width="4" height="4"></rect>
                                        <rect x="6" y="0" width="4" height="4"></rect>
                                        <rect x="0" y="6" width="4" height="4"></rect>
                                        <rect x="6" y="6" width="4" height="4"></rect>
                                    </svg>
                                </a>


                            </div>
                            <ul class="menu-cat entry-filter justify-content-center">
                                <li class="active"><a href="#" data-filter="*">Toute lesd acutalitées</a></li>
                                <?php foreach ($lesCategory as $category) { ?>
                                    <li><a class=" text-white" href="#" data-filter=".<?= $category['label'] ?>"><?= $category['label'] ?></a></li>
                                <?php } ?>

                            </ul><!-- End .blog-menu -->
                        </nav><!-- End .blog-nav -->

                        <div class="entry-container  modeLigne  max-col-2" data-layout="fitRows">
                            <?php
                            foreach ($products as $product) {

                            ?>
                                <div class="entry-item <?= $product['label'] ?> shopping col-sm-6">
                                    <div class="product product-list">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="product-media">
                                                    <!-- <span class="product-label label-new">New</span> -->
                                                    <!-- Button trigger modal -->

                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="./sysadmin/html/assets/uploads/petite<?= $product['image'] ?>" alt="Product image" class="product-image">
                                                    </a>
                                                </figure><!-- End .product-media -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->
                                            <div class="col-6 order-lg-last">
                                                <div class="product-list-action">
                                                    <div class="">
                                                        <p class="titreduproduitMobile"><?= $product['name'] ?></p>
                                                        <p class="descriptionduproduitMobile"><?= $product['description'] ?></p>
                                                    </div><!-- End .product-action -->
                                                    <div class="product-price">
                                                        <?= $product['price'] ?>€
                                                    </div><!-- End .product-price -->

                                                </div><!-- End .product-list-action -->
                                            </div><!-- End .col-sm-6 col-lg-3 -->
                                            <style>
                                                .testlog {
                                                    position: relative;


                                                    text-decoration: none;


                                                    transition: all .2s;
                                                }

                                                .testlog span {
                                                    position: absolute;
                                                    top: -1.2rem;
                                                    right: -1.2rem;
                                                    background: #FF4754;
                                                    width: 27px;
                                                    height: 27px;
                                                    display: flex;
                                                    align-items: center;
                                                    justify-content: center;
                                                    border: 4px solid #121212;
                                                    border-radius: 50%;
                                                }
                                            </style>
                                            <div class="col-3 ajoutPanierFas">
                                                <a class="addPanier testlog" href="./panier/addpanier.php?id=<?= $product['id'] ?>">
                                                    <i class="fas fa-plus"></i><span class="cart-count" id="count"><?= $panier->count() ?></span>
                                                </a>
                                            </div>
                                        </div><!-- End .row -->
                                    </div><!-- End .product -->
                                </div><!-- End .entry-item -->
                            <?php
                            }
                            ?>
                            <style>
                                .product-body,
                                .product {
                                    background: black;
                                }

                                .heading .title,
                                .title-lg {
                                    font-size: 30px;

                                }

                                .product-body .product-cat a,
                                .product.price {
                                    color: #b4a895;
                                }

                                .product-body .product-title {
                                    color: white;
                                }

                                .product .product-action .btn-cart {
                                    margin: 0;
                                }

                                .product .product-media img {
                                    max-height: 285px;
                                }

                                .product-col .product-title a,
                                .table-cart tbody .price-col {
                                    color: white;
                                }

                                .ajoutPanierFas {
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .fas {
                                    color: rgba(187, 171, 148, .4);
                                    ;
                                    font-size: 16px;
                                    border: 1px solid rgba(187, 171, 148, .4);
                                    padding: 6px;
                                    border-radius: 100%;
                                }

                                .product.product-list {
                                    box-shadow: none;
                                    padding-bottom: 0.4rem;
                                    border-bottom: .1rem dotted rgba(187, 171, 148, .4);
                                    margin-bottom: 0.4rem;
                                }

                                .product.product-list .product-list-action {
                                    padding: 1.8rem 0 0;
                                }

                                .figure {
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .product {
                                    margin: 0;
                                    padding: 0;
                                }

                                .product-media {
                                    background-color: #000;
                                }

                                .product.product-list .product-media img {

                                    height: 90%;
                                    object-fit: cover;
                                }

                                .titreduproduitMobile {
                                    color: #b4a895;
                                }

                                .descriptionduproduitMobile {
                                    color: white;
                                }
                            </style>
                        </div><!-- End .entry-container -->
                        <div class="modeNormal enlever">
                            <div class="products mb-3">
                                <div class="row justify-content-start">

                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <!-- <span class="product-label label-new">New</span> -->
                                                <a href="product.html">
                                                    <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
                                                </a>


                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>Ajouter au
                                                            panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">catégorie du produit</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Titre du produit de
                                                        bg</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60.00 €
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <!-- <span class="product-label label-new">New</span> -->
                                                <a href="product.html">
                                                    <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
                                                </a>


                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>Ajouter au
                                                            panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">catégorie du produit</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Titre du produit de
                                                        bg</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60.00 €
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <!-- <span class="product-label label-new">New</span> -->
                                                <a href="product.html">
                                                    <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
                                                </a>


                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>Ajouter au
                                                            panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">catégorie du produit</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Titre du produit de
                                                        bg</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60.00 €
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <!-- <span class="product-label label-new">New</span> -->
                                                <a href="product.html">
                                                    <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
                                                </a>


                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>Ajouter au
                                                            panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">catégorie du produit</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Titre du produit de
                                                        bg</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60.00 €
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                    <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <!-- <span class="product-label label-new">New</span> -->
                                                <a href="product.html">
                                                    <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
                                                </a>


                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>Ajouter au
                                                            panier</span></a>
                                                </div><!-- End .product-action -->
                                            </figure><!-- End .product-media -->

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">catégorie du produit</a>
                                                </div><!-- End .product-cat -->
                                                <h3 class="product-title"><a href="product.html">Titre du produit de
                                                        bg</a></h3><!-- End .product-title -->
                                                <div class="product-price">
                                                    60.00 €
                                                </div><!-- End .product-price -->

                                            </div><!-- End .product-body -->
                                        </div><!-- End .product -->
                                    </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                                </div><!-- End .row -->
                            </div><!-- End .products -->
                        </div>
                    </div><!-- End .container -->
                </div>
            </div><!-- End .page-content -->



        </main><!-- End .main -->
        <style>
            .enlever {
                display: none;
            }
        </style>
        <script>
            let btnnormal = document.querySelector('.buttonnormal');
            let btnaligne = document.querySelector('.buttonligne');
            let modeLigne = document.querySelector('.modeLigne');
            let modeNormal = document.querySelector('.modeNormal');

            btnnormal.addEventListener('click', function() {

                modeNormal.classList.add("active");
                modeNormal.classList.remove("enlever");
                modeLigne.classList.add('enlever')
                modeLigne.classList.remove('active')
            })

            btnaligne.addEventListener('click', function() {
                modeLigne.classList.remove("enlever");
                modeLigne.classList.add("active");
                modeNormal.classList.add('enlever')
            })
        </script>

        <?php
        require('./assets/componants/footer.php');
        ?>
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
    <?php require('./assets/componants/navmenumobile.php'); ?>

    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>



    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>



</html>