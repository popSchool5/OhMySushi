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
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                        <li class="breadcrumb-item active couleurBlanche" aria-current="page">Notre menu</li>
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

                .sidebar-shop {
                    position: sticky;
                    top: 150px;
                }
            </style>
            <div class="page-content page-contentLaptot m-5">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-9">
                            <div class="toolbox">
                                <div class="toolbox-left">

                                </div><!-- End .toolbox-left -->

                                <div class="toolbox-right">

                                    <div class="toolbox-layout">
                                        <a href="menu19.php" class="btn-layout ">
                                            <svg width="16" height="10">
                                                <rect x="0" y="0" width="4" height="4" />
                                                <rect x="6" y="0" width="10" height="4" />
                                                <rect x="0" y="6" width="4" height="4" />
                                                <rect x="6" y="6" width="10" height="4" />
                                            </svg>
                                        </a>

                                        <a href="menu9.php" class="btn-layout active">
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

            <style>
                html {
                    scroll-behavior: auto;
                }

                #nosSushi,
                #nosPoke {
                    background-color: red;
                    height: 60px;

                }

                .categorydiv {
                    /* position: sticky;
                    top: 0; */
                    background-color: red;
                    height: 100px;
                    z-index: 5;
                    margin-bottom: 2rem;


                }

                #Starter {
                    background-image: url(./assets/images/miso2.jpg);

                    background-size: cover;
                    background-position: center;
                }

                .lesCategdebg {

                    overflow-x: auto;
                    height: 60px;
                    display: flex;
                    flex-flow: row nowrap;
                    justify-content: space-between;
                    align-items: center;
                }

                .lesCategdebg a {
                    display: flex;
                    flex-direction: row;
                    min-width: 145px;
                    color: white;

                }
            </style>

            <div class="page-contentMobile">
                <div class="toolbox">
                    <div class="toolbox-left">

                    </div><!-- End .toolbox-left -->

                    <div class="toolbox-right">

                        <div class="toolbox-layout">
                            <a href="menu19.php" class="btn-layout ">
                                <svg width="16" height="10">
                                    <rect x="0" y="0" width="4" height="4" />
                                    <rect x="6" y="0" width="10" height="4" />
                                    <rect x="0" y="6" width="4" height="4" />
                                    <rect x="6" y="6" width="10" height="4" />
                                </svg>
                            </a>

                            <a href="menu9.php" class="btn-layout active">
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
                <div class="lesCategdebg" id="getFixed">
                    <?php foreach ($lesCategory as $category) { ?>
                        <a active class="categoryTopFixed" href="#<?= $category['label'] ?>"><?= $category['label'] ?></a>

                    <?php } ?>
                </div>



                <div class="page-content page-content-menu-mobile mt-5 pt-5">
                    <div class="container">
                        <div class="modeNormal">
                            <div class="products mb-3">
                                <?php foreach ($lesCategory as $c) { ?>
                                    <div class="classement">
                                        <div id="<?= $c['label'] ?>" class="categorydiv" class="my-5">
                                            <?= $c['label'] ?>
                                        </div>

                                        <div class="row page-section justify-content-start">

                                            <?php $lesmenus = test($c['id']);
                                            foreach ($lesmenus as $mm) {

                                            ?>
                                                <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                                                    <div class="product product-7 text-center">
                                                        <figure class="product-media">
                                                            <!-- <span class="product-label label-new">New</span> -->
                                                            <a href="product.php?id=<?= htmlspecialchars($mm['id']) ?>">
                                                                <img src="./sysadmin/html/assets/uploads/petite<?= htmlspecialchars($mm['image']) ?>" alt="Product image" class="product-image">
                                                            </a>


                                                            <div class="product-action">
                                                                <a href="./panier/addpanier.php?id=<?= htmlspecialchars($mm['id']) ?>" class="addPanier btn-product btn-cart"><span class="compteParProduit">Ajouter au panier <?php
                                                                                                                                                                                                                                if (!empty($_SESSION['panier'][$mm['id']])) {
                                                                                                                                                                                                                                    echo  $_SESSION['panier'][$mm['id']];
                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                ?>
                                                                    </span></a>
                                                            </div><!-- End .product-action -->
                                                        </figure><!-- End .product-media -->

                                                        <div class="product-body">
                                                            <div class="product-cat">
                                                                <a href="#"><?= htmlspecialchars($c['label']) ?></a>
                                                            </div><!-- End .product-cat -->
                                                            <h3 class="product-title couleurBlanche"><a href="product.html"><?= htmlspecialchars($mm['name']) ?></a></h3><!-- End .product-title -->
                                                            <div class="product-price couleurJaune">
                                                                <?= htmlspecialchars($mm['price']) ?> €
                                                            </div><!-- End .product-price -->

                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .product -->
                                                </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->

                                            <?php
                                            }
                                            ?>
                                        </div><!-- End .row -->
                                    </div>
                                <?php } ?>

                            </div><!-- End .products -->

                        </div>
                    </div><!-- End .container -->
                </div>
            </div><!-- End .page-content -->



        </main><!-- End .main -->

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
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $(function() {
                var cible;
                $(".nav-link").click(function(e) {
                    e.preventDefault(); //empêcher le navigateur de suivre le lien du <a> sur lequel tu as cliqué 
                    cible = $('#' + $(this).attr('href').replace('#', ''));
                    $('.navbar-nav').find('.nav-link').removeClass('active'); //supprime la class active de tout les a.nav-link
                    $(this).addClass('active'); //attribuer la classe active à l’élément cliqué
                    console.log('le id cible :' + cible.attr('id') +
                        ' est à :' + cible.offset().top + 'px du top.');
                    $('html,body').scrollTop(cible.offset().top);
                });
            });

            var $navItems = $('.lesCategdebg').find('a'), // on récupère tous les liens de la nav
                $previousActive = null, // on créé une variable qui va nous permettre de stocker l'élément précédemment actif
                threshold = 150; // débattement

            $(window).on('scroll', function() { // à chaque fois qu'on scroll
                var currentScrollTop = $(this).scrollTop(); // on récupère la position du scroll

                var $active = null;
                $navItems.each(function() { // on parcourt chacun des liens
                    var $navItem = $(this),
                        $target = $($navItem.attr('href')); // on va chercher dans le DOM l'élement correspondant ciblé

                    if ($target.offset().top <= currentScrollTop + threshold) { // si son offset top est supérieur à la position de scroll actuelle - le débattement
                        $active = $navItem; // il est actif
                    }
                });

                // on ne garde que le dernier élément actif
                if ($active != null && $previousActive != $active) {
                    if ($previousActive != null) $previousActive.removeClass('active'); // on supprime la classe active précédente
                    $active.addClass('active'); // on l'ajoute sur l'élément actuellement scrollé
                    $previousActive = $active;
                }
            });
        </script>

    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
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


<script>
    function fixDiv() {
        var $cache = $('#getFixed');
        if ($(window).scrollTop() > 285)
            $cache.css({
                'position': 'fixed',
                'top': '0px',
                'z-index': 5,
                'height': '60px',
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

</html>