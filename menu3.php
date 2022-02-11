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
                                <div class="toolbox-left">
                                    <div class="toolbox-info">
                                        Nombre de produit <span>56</span>
                                    </div><!-- End .toolbox-info -->
                                </div><!-- End .toolbox-left -->


                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <div class="row justify-content-start">
                                    <?php foreach ($products as $product) {

                                    ?>
                                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
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
                <div class="container">
                    <div class="row">
                        <style>
                            .toolboxcenter {
                                display: flex;
                                overflow-y: scroll;

                            }

                            .toolboxcenter .category {
                                padding: 2rem;
                                color: white;
                                font-size: 20px;
                                border: 1px solid hsla(0, 0%, 100%, .4);
                                border-radius: 20px;
                                padding: 0 1rem;
                                font-weight: 500;
                                margin: 1rem;
                            }
                        </style>
                        <div class="toolboxcenter">
                            <li class="active"><a href="#" data-filter="*">Toute les acutalitées</a></li>
                            <?php foreach ($lesCategory as $category) { ?>
                                <div class="category">

                                    <li><a href="#" data-filter=".<?= $category['label'] ?>"> <?= $category['label'] ?></a></li>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-9">
                            <div class="toolbox">


                                <div class="toolbox-right">
                                    <div class="toolbox-sort">
                                        <label for="sortby">Trier par :</label>
                                        <div class="select-custom">
                                            <select name="sortby" id="sortby" class="form-control">
                                                <option value="popularity" selected="selected">Plus populaire</option>
                                                <option value="rating">Nouveautés</option>
                                                <option value="date">Prix</option>
                                            </select>
                                        </div>
                                    </div><!-- End .toolbox-sort -->
                                </div><!-- End .toolbox-right -->

                            </div><!-- End .toolbox -->

                            <div class="products mb-3">
                                <style>
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
                                        width: 100%;
                                        height: 68%;
                                        object-fit: cover;
                                    }

                                    a {
                                        display: flex !important;
                                        justify-content: center !important;
                                        align-items: center !important;
                                    }

                                    .titreduproduitMobile {
                                        color: #b4a895;
                                    }

                                    .descriptionduproduitMobile {
                                        color: white;
                                    }
                                </style>
                                <?php foreach ($products as $product) { ?>
                                    <div class="product product-list">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="product-media">
                                                    <!-- <span class="product-label label-new">New</span> -->
                                                    <!-- Button trigger modal -->

                                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <img src="assets/images/product1parti1.jfif" alt="Product image" class="product-image">
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
                                                        <?= htmlspecialchars(number_format($product['price'], 2, ',', ' ')) ?>€
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
                                                    <i class="fas fa-plus"></i><span class="cart-count" id="count"></span>
                                                </a>
                                            </div>
                                        </div><!-- End .row -->
                                    </div><!-- End .product -->
                                <?php } ?>

                            </div><!-- End .products -->


                        </div><!-- End .col-lg-9 -->

                        <!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->



        </main><!-- End .main -->

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

    <!-- connexion / inscription -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Me connecter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">M'inscrire</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">

                                        <div class="form-group">
                                            <label for="singin-email">Votre adresse email *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Votre mot de passe *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>Se connecter</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <a href="#" class="forgot-link">Mot de passe oublié?</a>
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Votre adresse email *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="prenom">Votre Prénom *</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom" required>
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                            <label for="nom">Votre nom *</label>
                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Votre mot de passe *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>S'inscrire</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">J'accepte
                                                    <a href="#">la rgpd ou je sais pas quoi </a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- fin .modal connexion inscription  -->


    <!-- Plugins JS File -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wNumb.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="./assets/js/app.js"></script>

</body>


</html>