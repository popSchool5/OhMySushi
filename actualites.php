<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');

$actus = viewFullActualites();
$category = viewCategoryActualite();
require('./assets/componants/header.php');
$bg = viewCategoryActualiteTest(); 

?>


<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>
        <main class="main">
            <div class="page-header text-center" style="background: #000 ">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Nos actualités<span></span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item couleurBlanche active">Actualités</li>

                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <nav class="blog-nav">
                        <ul class="menu-cat entry-filter justify-content-center">
                            <li class="active"><a href="#" data-filter="*" class="couleurBlanche">Toute les actualitées</a></li>
                            <?php foreach ($bg as $b) {

                            ?>
                                <li><a href="#" data-filter=".<?= $b['label'] ?>" class="couleurBlanche"><?= $b['label'] ?></a></li>
                            <?php  } ?>

                        </ul><!-- End .blog-menu -->
                    </nav><!-- End .blog-nav -->

                    <div class="entry-container max-col-2" data-layout="fitRows">
                        <?php
                        foreach ($actus as $actu) {

                        ?>
                            <div class="entry-item <?= $actu['label'] ?> shopping col-sm-6">
                                <article class="entry entry-grid text-center">
                                    <figure class="entry-media">
                                        <a href="actualite.php?id=<?= $actu['id'] ?>">
                                            <img src="./sysadmin/html/assets/uploads/<?= $actu['image'] ?>" alt="image desc">
                                        </a>
                                    </figure><!-- End .entry-media -->

                                    <div class="entry-body">


                                        <h2 class="entry-title">
                                            <a href="actualite.html" class="couleurJaune"><?= $actu['name'] ?>.</a>
                                        </h2><!-- End .entry-title -->

                                        <div class="entry-cats">
                                            <a href="#" class="couleurBlanche">in <?= $actu['label'] ?></a>

                                        </div><!-- End .entry-cats -->

                                        <div class="entry-content">
                                            <p class="couleurBlanche"><?= extraitIndex($actu['description'])  ?>...</p>
                                            <a href="actualite.php?id=<?= $actu['id'] ?>" class="read-more">Lire la suite</a>
                                        </div><!-- End .entry-content -->
                                    </div><!-- End .entry-body -->
                                </article><!-- End .entry -->
                            </div><!-- End .entry-item -->
                        <?php
                        }
                        ?>

                    </div><!-- End .entry-container -->


                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <?php
        require('./assets/componants/footer.php');
        ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
    <?php require('./assets/componants/navmenumobile.php'); ?>

    <?php require("./assets/componants/menu.php") ?>
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