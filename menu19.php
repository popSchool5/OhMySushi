<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');

$lesCategory = categoryMenu();
$products = products();

function test($bg)
{
    global $bdd;
    $pro = $bdd->prepare('SELECT * FROM products WHERE id_category = ?');
    $pro->execute(array($bg));
    $pros = $pro->fetchAll();
    return $pros;
}

require('./assets/componants/header.php');
?>

<body>
    <div class="page-wrapper">

        <?php require('./assets/componants/barreMenu.php');  ?>

        <main class="main">
            <div class="page-header text-center" style="background: #000">
                <div class="container">
                    <h1 class="page-title couleurBlanche"><span>Notre menu</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->

            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item active couleurBlanche" aria-current="page">Notre menu</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="toolbox">
                                <div class="toolbox-left">

                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">

                                    <div class="toolbox-layout">
                                        <a href="#" class="btn-layout active">
                                            <svg width="16" height="10">
                                                <rect x="0" y="0" width="4" height="4" />
                                                <rect x="6" y="0" width="10" height="4" />
                                                <rect x="0" y="6" width="4" height="4" />
                                                <rect x="6" y="6" width="10" height="4" />
                                            </svg>
                                        </a>

                                        <a href="menu9.php" class="btn-layout">
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
                            <style>
                                .lesCategdebg {

                                    overflow-x: auto;
                                    height: 75px;
                                    display: flex;
                                    flex-flow: row nowrap;
                                    justify-content: space-between;
                                    align-items: center;
                                }

                                .lesCategdebg a {
                                    display: flex;
                                    flex-direction: row;
                                    min-width: 165px;
                                    color: white;
                                    height: 100%;
                                    align-items: center;
                                }

                                @media screen and (max-width: 992px) {

                                    .productdeNeuf,
                                    .barreDesCategorie {
                                        display: none;
                                    }
                                }

                                @media screen and (min-width: 992px) {

                                    .productdeZero,
                                    .lesCategdebg {
                                        display: none;
                                    }


                                }

                                .paragrapheCategorie {
                                    height: 70px;
                                    background: red;
                                    margin: 1rem 0 1rem 0;
                                }

                                .paragrapheCategorie {
                                    height: 70px;
                                    background: red;
                                    margin: 1rem 0 1rem 0;
                                }

                                .sidebar-shop {
                                    position: sticky;
                                    top: 150px;
                                }
                            </style>
                            <div class="lesCategdebg" id="getFixed">
                                <?php foreach ($lesCategory as $category) { ?>
                                    <a active class="categoryTopFixed" href="#<?= htmlspecialchars($category['label']) ?>"><?= htmlspecialchars($category['label']) ?></a>

                                <?php } ?>
                            </div>


                            <?php foreach ($lesCategory as $c) { ?>
                                <div class="products mb-3 productdeZero">

                                    <div id="<?= $c['label'] ?>" class="paragrapheCategorie">
                                        <h4><?= $c['label'] ?></h4>
                                    </div>

                                    <?php $lesmenus = test($c['id']);
                                    foreach ($lesmenus as $mm) { ?>
                                        <div class="product product-list">
                                            <div class="row">
                                                <div class="col-4">
                                                    <figure class="product-media">
                                                        <!-- <span class="product-label label-new">New</span> -->
                                                        <!-- Button trigger modal -->

                                                        <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($mm['image']) ?>" alt="Product image" class="product-image">
                                                        </a>
                                                    </figure><!-- End .product-media -->
                                                </div><!-- End .col-sm-6 col-lg-3 -->
                                                <div class="col-5 order-lg-last">
                                                    <div class="product-list-action">
                                                        <div class="">
                                                            <p class="titreduproduitMobile couleurBlanche"><?= htmlspecialchars($mm['name']) ?></p>
                                                            <!-- <p class="descriptionduproduitMobile">description du produiot></p> -->
                                                        </div><!-- End .product-action -->
                                                        <div class="product-price">
                                                            <?= htmlspecialchars($mm['price']) ?> €
                                                        </div><!-- End .product-price -->

                                                    </div><!-- End .product-list-action -->
                                                </div><!-- End .col-sm-6 col-lg-3 -->
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

                                                        height: 99%;
                                                        object-fit: cover;
                                                    }

                                                    .titreduproduitMobile {
                                                        color: #b4a895;
                                                    }

                                                    .descriptionduproduitMobile {
                                                        color: white;
                                                    }

                                                    .testlog {
                                                        position: relative;


                                                        text-decoration: none;


                                                        transition: all .2s;
                                                    }

                                                    .testlog span {
                                                        position: absolute;
                                                        top: -1.2rem;
                                                        right: -1.2rem;
                                                        background: #f612128c;
                                                        color: white;
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
                                                    <a class="addPanier testlog" href="./panier/addpanier.php?id=<?= htmlspecialchars($mm['id']) ?>">
                                                        <i class="fas fa-plus"></i><span class="cart-count compteParProduit"><?php
                                                                                                                                if (!empty($_SESSION['panier'][$mm['id']])) {
                                                                                                                                    echo  $_SESSION['panier'][$mm['id']];
                                                                                                                                }
                                                                                                                                ?></span>
                                                    </a>
                                                </div>
                                            </div><!-- End .row -->
                                        </div><!-- End .product -->
                                    <?php
                                    }
                                    ?>
                                </div><!-- End .products -->
                            <?php } ?>



                            <?php foreach ($lesCategory as $c) { ?>
                                <div class="products mb-3 productdeNeuf">

                                    <div id="<?= $c['label'] ?>" class="paragrapheCategorie">
                                        <h4><?= $c['label'] ?></h4>
                                    </div>

                                    <?php $lesmenus = test($c['id']);
                                    foreach ($lesmenus as $mm) { ?>
                                        <div class="product product-list">
                                            <div class="row">
                                                <div class="col-6 col-lg-3">
                                                    <figure class="product-media">
                                                        <!-- <span class="product-label label-new">New</span> -->
                                                        <a href="product.php?id=<?= htmlspecialchars($mm['id']) ?>">
                                                            <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($mm['image']) ?>" alt="Product image" class="product-image">
                                                        </a>
                                                    </figure><!-- End .product-media -->
                                                </div><!-- End .col-sm-6 col-lg-3 -->

                                                <div class="col-6 col-lg-3 order-lg-last">
                                                    <div class="product-list-action">
                                                        <div class="product-price">
                                                            <?= htmlspecialchars($mm['price']) ?> €
                                                        </div><!-- End .product-price -->



                                                        <a href="./panier/addpanier.php?id=<?= htmlspecialchars($mm['id']) ?>" class="btn-product btn-cart addPanier"><span class="compteParProduit">Ajouter au panier  <?php
                                                                                                                                                                                                                                        if (!empty($_SESSION['panier'][$mm['id']])) {
                                                                                                                                                                                                                                            echo  $_SESSION['panier'][$mm['id']];
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                        ?>
                                                            </span></a>
                                                    </div><!-- End .product-list-action -->
                                                </div><!-- End .col-sm-6 col-lg-3 -->

                                                <div class="col-lg-6">
                                                    <div class="product-body product-action-inner">

                                                        <div class="product-cat">

                                                        </div><!-- End .product-cat -->
                                                        <h3 class="product-title"><a href="product.html"><?= htmlspecialchars($mm['name']) ?></a></h3><!-- End .product-title -->

                                                        <div class="product-content">
                                                            <p><?= htmlspecialchars($mm['description']) ?> </p>
                                                        </div><!-- End .product-content -->


                                                    </div><!-- End .product-body -->
                                                </div><!-- End .col-lg-6 -->
                                            </div><!-- End .row -->
                                        </div><!-- End .product -->
                                    <?php
                                    }
                                    ?>
                                </div><!-- End .products -->
                            <?php } ?>


                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3 barreDesCategorie order-lg-first">
                            <div class="sidebar sidebar-shop">

                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title couleurBlanche">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            Categorie
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <div class="filter-item">
                                                    <?php foreach ($lesCategory as $category) { ?>
                                                        <div class="custom-control custom-checkbox">

                                                            <input type="checkbox" class="custom-control-input" id="cat">
                                                            <label class="custom-control-label couleurBlanche" for="cat"><?= htmlspecialchars($category['label']) ?></label>
                                                        </div><!-- End .custom-checkbox -->

                                                    <?php } ?>
                                                </div><!-- End .filter-item -->


                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->




                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->


    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <div class="mobile-menu-overlay"></div>


    <?php require('./assets/componants/footer.php'); ?>
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
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="./assets/js/app.js"></script>
</body>

<!-- Pour fixer la barre de categorie en mode mobile -->
<script>
    function fixDiv() {
        var $cache = $('#getFixed');
        if ($(window).scrollTop() > 285)
            $cache.css({
                'position': 'fixed',
                'top': '0px',
                'z-index': 2,
                'height': '75px',
                'background': '#181616',
                'width': '100%'

            });
        else
            $cache.css({
                'position': 'relative',
                'top': 'auto'
            });
    }
    $(window).scroll(fixDiv);
    fixDiv();

    const sections = document.querySelectorAll("classement");
    console.log(sections)
    const navLi = document.querySelectorAll("categoryTopFixed");
    window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            console.log(sectionTop)
            const sectionHeight = section.clientHeight;
            if (pageYOffset >= sectionTop - sectionHeight / 3) {
                current = section.getAttribute("id");
            }
        });

        navLi.forEach((li) => {
            li.classList.remove("active");
            if (li.classList.contains(current)) {
                li.classList.add("active");
            }
        });
    });
</script>
<!-- Fin du script pour fixer la barre de categorie en mode mobile -->

</html>