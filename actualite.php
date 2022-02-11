<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');

if (!empty($_GET['id'])) {

    $actualite = viewActualite($_GET['id']);
    $actualiteSimilaire = viewSimilarActualite($actualite['id_category'], $_GET['id']);
} else {
    header('location:  actualites.php');
}

if ($actualite) {
?>

    <?php require('./assets/componants/header.php');  ?>

    <body>
        <div class="page-wrapper">
            <?php require('./assets/componants/barreMenu.php');  ?>

            <main class="main">
                <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="actualites.php">Actualités</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <?= htmlspecialchars($actualite['name']) ?> </li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->
                <style>
                    .imagetopactualite {
                        max-height: 750px;
                        object-fit: cover;
                        object-position: center;
                    }
                </style>
                <div class="page-content">
                    <figure class="entry-media">
                        <img class="imagetopactualite" src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($actualite['image']) ?> " alt="image desc">
                    </figure><!-- End .entry-media -->
                    <div class="container">
                        <article class="entry single-entry entry-fullwidth">
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="entry-body">

                                        <h2 class="entry-title entry-title-big couleurJaune">
                                            <?= htmlspecialchars($actualite['name']) ?>
                                        </h2><!-- End .entry-title -->


                                        <div class="entry-content editor-content ">
                                            <p class="couleurBlanche"> <?= $actualite['description'] ?> </p>

                                        </div><!-- End .entry-content -->


                                    </div><!-- End .entry-body -->
                                </div><!-- End .col-lg-11 -->

                                <div class="col-lg-1 order-lg-first mb-2 mb-lg-0">
                                    <div class="sticky-content">
                                        <div class="social-icons social-icons-colored social-icons-vertical">
                                            <span class="social-label">SHARE:</span>
                                            <a href=" https://www.facebook.com/sharer/sharer.php?u={www.google.fr}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                            <a href="https://twitter.com/intent/tweet/?url={url}&text={text}&via={via}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                            <a href="https://pinterest.com/pin/create/button/?url={url}&media={media}&description={description}" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                            <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                        </div><!-- End .soial-icons -->
                                    </div><!-- End .sticky-content -->
                                </div><!-- End .col-lg-1 -->
                            </div><!-- End .row -->


                        </article><!-- End .entry -->


                        <div class="related-posts">

                            <style>
                                .ohlimagedebg {
                                    height: 190px !important;
                                    object-fit: cover;
                                }
                            </style>
                            <?php
                            if ($actualiteSimilaire) {

                            ?>
                                <h3 class="couleurBlanche">Les actualitées similaire</h3>
                                <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
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
                                    }
                                }
                            }'>



                                    <?php
                                    foreach ($actualiteSimilaire as $actuSimil) {  
                                    
                                        ?>
                                        <article class="entry entry-grid">
                                            <figure class="entry-media">
                                                <a href="actualite.php?id=<?=$actuSimil['id'] ?>">
                                                    <img class="ohlimagedebg" src="./sysadmin/html/assets/uploads/<?= htmlspecialchars($actuSimil['image']) ?>" alt="image desc">
                                                </a>
                                            </figure><!-- End .entry-media -->

                                            <div class="entry-body">


                                                <h2 class="entry-title couleurBlanche">
                                                    <a href="actualite.php?id=<?= $actuSimil['id'] ?>"><?= htmlspecialchars($actuSimil['name']) ?></a>
                                                </h2><!-- End .entry-title -->

                                                <div class="entry-cats">

                                                </div><!-- End .entry-cats -->
                                            </div><!-- End .entry-body -->
                                        </article><!-- End .entry -->
                                <?php

                                    }
                                } else {
                                }
                                ?>
                                </div><!-- End .owl-carousel -->

                        </div><!-- End .related-posts -->

                    </div><!-- End .container -->
                </div><!-- End .page-content -->
            </main><!-- End .main -->

            <?php require('./assets/componants/footer.php');  ?>

        </div><!-- End .page-wrapper -->
        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
        <?php require("./assets/componants/menu.php") ?>
        <?php require('./assets/componants/navmenumobile.php'); ?>

        <?php require('./assets/componants/fenetreModalConnexion.php'); ?>


        <!-- Plugins JS File -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.hoverIntent.min.js"></script>
        <script src="assets/js/jquery.waypoints.min.js"></script>
        <script src="assets/js/superfish.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.sticky-kit.min.js"></script>
        <!-- Main JS File -->
        <script src="assets/js/main.js"></script>
    </body>
<?php

} else {
    header('location: 404.php');
}

?>

</html>