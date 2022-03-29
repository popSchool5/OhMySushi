<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');


$req = $bdd->prepare('SELECT products.*, category.label FROM products INNER JOIN category ON products.id_category = category.id GROUP BY category.id');
$req->execute();
$recupCategorys = $req->fetchAll();
var_dump($recupCategorys);


$req = $bdd->prepare('SELECT products.*, category.label FROM products INNER JOIN category ON products.id_category = category.id GROUP BY category.id');
$req->execute();
$recupCategorys = $req->fetchAll();
var_dump($recupCategorys);



require('./assets/componants/header.php');
?>


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
            .uneCategory {
                border: 1px solid grey;
                border-radius: 4px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 1rem 0;
                width: 160px;
            }

            .nosCategoryLa {
                display: flex;
                flex-direction: row;
                justify-content: space-around;
                margin: 1rem;
            }
        </style>

        <div class="lesProdEtLesCategory">
            <div class="nosCategoryLa">
                <?php foreach ($recupCategorys as $recupCategory) { ?>
                    <div class="uneCategory">
                        <div class="petitlogo">
                            <img src="./iconsauce2.png" alt="">
                        </div>
                        <div class="titreCategory">
                            <?= $recupCategory['label'] ?>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="listesProduits">
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
                                    <a class="add addPanier btn-product btn-cart" href="./panier/addpanier.php?id=<?= $product['id'] ?>"><span>Ajouter au
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

            </div>
        </div>




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
                'z-index': 2,
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