<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/componants/header.php');

require('./assets/php/function.php');



?>


<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php') ?>
        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active couleurBlanche" aria-current="page">Reservation</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="container">
                <style>
                    .testshadow {
                        text-shadow: 1px 2px rgb(0 0 0 / 30%);
                        font-weight: 900;
                    }
                </style>
                <div class="page-header page-header-big text-center" style="background-image: url('./reserverd2.jfif')">
                    <h1 class="testshadow page-title text-white">RESERVATION</h1>
                </div><!-- End .page-header -->
            </div><!-- End .container -->

            <div class="page-content pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-2 mb-lg-0">
                            <h2 class="title mb-1 couleurJaune">Information</h2><!-- End .title mb-2 -->
                            <p class="mb-3 couleurBlanche">Si vous le souhaitez, vous pouvez réserver votre table (ou vos tables) par internet en remplissant le formulaire. <br>
                            </p>

                        </div><!-- End .col-lg-6 -->
                        <div class="col-lg-6">
                            <h2 class="title mb-1 couleurJaune">Formulaire de réservation </h2><!-- End .title mb-2 -->

                            <form action="./assets/php/envoiMailContact.php?email=reservation" method="POST" class="contact-form mb-3">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Nom</label>
                                        <input type="text" name="name" class="form-control" id="cname" placeholder="Nom *" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="cemail" class="sr-only">Email</label>
                                        <input type="email" class="form-control" name="email" id="cemail" placeholder="Email *" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cname" class="sr-only">Heure du repas</label>
                                        <input type="time" name="time" class="form-control" id="cname" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="date" class="sr-only">Date du repas</label>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="Email *" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="cphone" class="sr-only">Téléphone</label>
                                        <input type="tel" class="form-control" name="phone" id="cphone" placeholder="Téléphone">
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6">
                                        <label for="" class="sr-only">Nombre de personne(s)</label>
                                        <select class="form-control" name="nbrpersonne">

                                            <option>Nombre de personne(s)</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5 et plus</option>


                                        </select>
                                    </div><!-- End .col-sm-6 -->

                                </div><!-- End .row -->

                                <label for="cmessage" class="sr-only">Message</label>
                                <textarea class="form-control" cols="30" rows="4" name="message" id="cmessage" placeholder="Message *"></textarea>

                                <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                    <span>RESERVER MA TABLE</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form><!-- End .contact-form -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->

                    <hr class="mt-4 mb-5">


                </div><!-- End .container -->

            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php require('./assets/componants/footer.php') ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <?php require('./assets/componants/menu.php'); ?>

    <?php require('./assets/componants/navmenumobile.php'); ?>
    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>


    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>





</html>