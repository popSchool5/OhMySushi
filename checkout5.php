<?php
session_start();
if (!empty($_SESSION['users'])) {

    require('./assets/php/co_bdd.php');
    require('./assets/php/function.php');
    require('./assets/componants/barreMenu.php');
    if (!empty($ids)) {
        require('./assets/componants/header.php');


        $us = viewFullUserAdresse($_SESSION['users']['id'], 'principal');
        $art = viewPanierArticle($ids);


        $quinzeEuro = array("Pont-à-Mousson");
        $vingtEuro = array("Blénod-lès-Pont-à-Mousson", "Maidières", "Montauville");
        $vingtCinqEuro = array("Jezainville", "Norroy-lès-Pont-à-Mousson");
        $trenteEuro = array("Vandiéres");
        $quarenteEuro = array("Champey-sur-Moselle", "Pagny-sur-Moselle", "Dieulouard", "Cheminot");
        $trenteCinqEuro = array("Lesménils", "Atton", "Mousson");

        $horraire = new DateTime();

        $heure = $horraire->format("H");
        $minute = $horraire->format("i");
        $minute += 15;

        $heureDepart = intval($heure + ($minute / 15 + 1) / (60 / 15));
        $minuteDepart =  ($minute / 15 + 1) % (60 / 15) * 15;
        $horraire->setTime($heureDepart, $minuteDepart, 00, 00);

        for ($i = 0; $i < 22; $i++) {

            $horrairesPossibles[] = $horraire->format('H:i');
            $horraire->add(new DateInterval('PT10M'));
        }
?>


        <body>
            <div class="page-wrapper">

                <main class="main">
                    <div class="page-header text-center" style="background:#000">
                        <div class="container">
                            <h1 class="page-title couleurBlanche">Paiement<span></span></h1>
                        </div><!-- End .container -->
                    </div><!-- End .page-header -->
                    <nav aria-label="breadcrumb" class="breadcrumb-nav">
                        <div class="container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>
                                <li class="breadcrumb-item active couleurJaune" aria-current="page">Paiement</li>
                            </ol>
                        </div><!-- End .container -->
                    </nav><!-- End .breadcrumb-nav -->

                    <div class="page-content">
                        <div class="checkout">
                            <div class="container">




                                        <div class="row">

                                            <div class="col-lg-9">


                                            
                                            </div>
                                            <aside class="col-lg-3">
                                                <div class="summary">
                                                    <h3 class="summary-title">Votre commandfe </h3><!-- End .summary-title -->

                                                    <table class="table table-summary">
                                                        <thead>
                                                            <tr>
                                                                <th>Produit</th>
                                                                <th>Quantité</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php foreach ($art as $article) {  ?>
                                                                <tr>
                                                                    <td><a href="#"><?= $article['name'] ?> </a></td>
                                                                    <td><?= $_SESSION['panier'][$article['id']]  ?> </td>
                                                                    <td><?= $article['price'] * $_SESSION['panier'][$article['id']]  ?> €</td>
                                                                </tr>
                                                            <?php } ?>

                                                            <?php if (isset($_POST['salee'])) { ?>
                                                                <tr class="">



                                                                </tr><!-- End .summary-subtotal -->
                                                            <?php    } ?>



                                                            <tr class="summary-total">
                                                                <td>Total:</td>
                                                                <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                                            </tr><!-- End .summary-total -->

                                                        </tbody>
                                                    </table><!-- End .table table-summary -->
                                                    <h4 class="pt-3">Mode de réglement</h4>
                                                    <div class="accordion-summary" id="accordion-payment">






                                                        <div class="card">
                                                            <div class="card-header" id="heading-2">
                                                                <h2 class="card-title">
                                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                                                        PayPal
                                                                    </a>
                                                                </h2>
                                                            </div><!-- End .card-header -->
                                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                                                <div class="card-body">
                                                                    <div id="paypal-button-container"></div>
                                                                </div><!-- End .card-body -->
                                                            </div><!-- End .collapse -->
                                                        </div><!-- End .card -->
                                                        <?php $prix = htmlspecialchars(number_format($panier->total(), 2, '.', ' ')); ?>
                                                        <div class="card">
                                                            <div class="card-header" id="heading-1">
                                                                <h2 class="card-title">

                                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                                                        Carte de crédit
                                                                    </a>
                                                                </h2>
                                                            </div><!-- End .card-header -->
                                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                                <div class="card-body">
                                                                    <input type="text" name="accordeonTestEmportez">
                                                                </div><!-- End .card-body -->
                                                            </div><!-- End .collapse -->
                                                        </div><!-- End .card -->
                                                    </div>
                                                    <!-- End .accordion -->

                                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                                        <span class="btn-text">Payer</span>
                                                        <span class="btn-hover-text">Procéder au paiement</span>
                                                    </button>
                                                </div><!-- End .summary -->
                                            </aside><!-- End .col-lg-3 -->
                                        </div><!-- End .row -->
                                
                             


                                <?php require("./assets/componants/footer.php"); ?>
                                <?php require("./assets/componants/navmenumobile.php"); ?>

                            </div><!-- End .page-wrapper -->
                            <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

                            <!-- Mobile Menu -->
                            <div class="mobile-menu-overlay"></div>
                            <?php require('./assets/componants/menu.php'); ?>
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
                            <script src="./assets/js/geoapi.js"></script>
                        
        </body>

<?php
    } else {
        header('location: index.php');
    }
} else {
    header('location: index.php');
} ?>

</html>