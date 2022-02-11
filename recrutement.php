<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/componants/header.php');
require('./assets/php/function.php');

$req = $bdd->prepare('SELECT * FROM recruitment');
$req->execute(array());
$jobs = $req->fetchAll();


?>

<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php') ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html" class="couleurJaune">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page" class="couleurBlanche"><a href="#" class="couleurBlanche">Recrutement</a></li>
                    </ol>


                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="container">
                        <style>
                            .recruitmentList {
                                list-style: none;
                                text-align: center;
                            }

                            .icon {
                                display: inline-block;
                                margin: 10px;
                            }

                            .fas {
                                padding: 3rem;
                                font-size: 28px;

                                text-decoration: none;
                                border-radius: 50%;
                                background: #000;
                                color: #FFD100;
                            }

                            .fas:hover {
                                box-shadow: 0 0 15px #FFE469;
                                transition: all 0.85s ease;
                            }
                        </style>
                        <h1 class="text-center couleurBlanche">Recrutement Oh My Sushi</h1>
                        <div class="row p-5">

                            <?php foreach ($jobs as $job) {
                            ?>
                                <div class="col-5">

                                    <ul class="recruitmentList pt-4 mt-4">
                                        <li><a href="" data-toggle="modal" data-target="[data-bg='<?= $job['id'] ?>']"> <i class="fas fa-utensils"></i></a></li>
                                        <p class="text-center mt-1 couleurJaune"><?= htmlspecialchars($job['name']) ?></p>
                                    </ul>


                                </div>

                                <style>
                                    .modalDuJob .modal-content .modal-header {
                                        text-align: center;
                                    }

                                    .modal-body {
                                        padding: 1rem !important;
                                    }
                                </style>

                                <!-- modal du job -->
                                <div class="modal fade" id="exampleModal" data-bg='<?= htmlspecialchars($job['id']) ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><?= htmlspecialchars($job['name']) ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?= htmlspecialchars($job['description']); ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- fin modal du job -->

                            <?php
                            }
                            ?>
                        </div>

                    </div><!-- End .container -->
                </div><!-- End .product-details-top -->


            </div><!-- End .container -->
    </div><!-- End .page-content -->
    </main><!-- End .main -->


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
</body>


</html>