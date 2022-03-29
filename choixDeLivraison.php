<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');
$fermerOuOuvert = magasinFermerOuOuvert();
$addresseDeLivraisons = voirAdressePrincipalCommande($_SESSION['users']['id'], $_SESSION['adresseEtHorraire']['adresseLivraison']);
$villeDeLivraison = $addresseDeLivraisons['city'];

$quinzeEuro = array("Pont-à-Mousson");
$vingtEuro = array("Blénod-lès-Pont-à-Mousson", "Maidières", "Montauville");
$vingtCinqEuro = array("Jezainville", "Norroy-lès-Pont-à-Mousson");
$trenteEuro = array("Vandiéres");
$quarenteEuro = array("Champey-sur-Moselle", "Pagny-sur-Moselle", "Dieulouard", "Cheminot");
$trenteCinqEuro = array("Lesménils", "Atton", "Mousson");


?>



<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>
        <main class="main">
            <div class="page-header text-center" style="background:#010101">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Méthode de livraison</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>

                        <li class="breadcrumb-item " aria-current="page">Accompagnement</li>
                        <li class="breadcrumb-item" aria-current="page">Adresse</li>
                        <li class="breadcrumb-item  active couleurJaune" aria-current="page">Mode de livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Paiement</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">

                    <div class="container">

                        <div class="row">
                            <style>
                                #container {
                                    margin: 0 auto;

                                }

                                #accordion .input1erDegres {
                                    display: none;
                                }

                                #accordion label {
                                    background: #212121;
                                    border-radius: .25em;
                                    cursor: pointer;

                                    margin-bottom: .125em;
                                    padding: .25em 1em;
                                    z-index: 20;
                                    height: 150px;
                                    color: white;
                                    margin-bottom: 2.5rem;
                                }

                                #accordion label:hover {
                                    background-color: #212121 !important;
                                }

                                #accordion .input1erDegres:checked+label {


                                    height: 150px;
                                    color: white;
                                    background-color: #ff00007a !important;
                                    border: 1px solid red;
                                }






                                .divbglabel label {
                                    display: flex;
                                    width: 100%;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .labelColumn {
                                    display: flex;
                                    align-items: center;
                                    flex-direction: column;
                                    color: white;
                                }

                                .labelColumn p {

                                    color: white;
                                }
                            </style>
                            <div class="col-lg-9">

                                <body>
                                    <div id="container">
                                        <form action="choixDeLivraison2.php" method="POST">
                                            <section id="accordion">
                                                <div class="divbglabel">
                                                    <input class="input1erDegres" name="un" type="radio" value="emporter" id="check-1" />
                                                    <label class="check-un" for="check-1">
                                                        <div class="labelColumn">
                                                            <img src="./emporter.png" width="65px" alt="">
                                                            <p>Emporter</p>
                                                        </div>

                                                    </label>

                                                </div>
                                                <div class="divbglabel">
                                                    <input class="input1erDegres" name="un" type="radio" value="surplace" id="check-2" />
                                                    <label for="check-2">
                                                        <div class="labelColumn">
                                                            <img src="./surplaceD.png" width="60px" alt="">

                                                            <p>Sur place</p>
                                                        </div>
                                                    </label>

                                                </div>




                                                <?php
                            if (($panier->total() >= 15) && in_array($villeDeLivraison, $quinzeEuro)) {
                            ?>

                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>

                            <?php
                            } elseif (($panier->total() >= 20) && (in_array($villeDeLivraison, $vingtEuro) | in_array($villeDeLivraison, $quinzeEuro))) {
                            ?>

                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>

                            <?php
                            } elseif (($panier->total() >= 25) && (in_array($villeDeLivraison, $vingtEuro) || in_array($villeDeLivraison, $vingtCinqEuro))) {
                            ?>

                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>

                            <?php
                            } elseif (($panier->total() >= 30) && (in_array($villeDeLivraison, $vingtEuro) || in_array($villeDeLivraison, $vingtCinqEuro) || in_array($villeDeLivraison, $trenteEuro))) {
                            ?>
                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>


                            <?php
                            } elseif (($panier->total() >= 35) && (in_array($villeDeLivraison, $vingtEuro) || in_array($villeDeLivraison, $vingtCinqEuro) || in_array($villeDeLivraison, $trenteEuro) || in_array($villeDeLivraison, $trenteCinqEuro))) {
                            ?>

                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>

                            <?php

                            } elseif (($panier->total() >= 40) && (in_array($villeDeLivraison, $trenteCinqEuro) || in_array($villeDeLivraison, $quarenteEuro) || in_array($villeDeLivraison, $trenteEuro) || in_array($villeDeLivraison, $vingtEuro) || in_array($villeDeLivraison, $vingtCinqEuro))) {
                            ?>

                                <div class="divbglabel">
                                    <input class="input1erDegres" name="un" type="radio" value="livraison" id="check-3" />
                                    <label for="check-3">
                                        <div class="labelColumn">
                                            <img src="./deliveryIc.png" width="60px" alt="">
                                            <p>Livraison</p>
                                        </div>
                                    </label>

                                </div>

                            <?php

                            }

                            ?>


                                            </section>


                                    </div>

                            </div>























                            <aside class="col-lg-3">
                                <style>
                                    aside .summary-cart {
                                        position: sticky;
                                        top: 120px;
                                    }
                                </style>
                                <div class="summary summary-cart">
                                    <h3 class="summary-title ">Notre récapitulatif</h3><!-- End .summary-title -->


                                    <table class="table table-summary">
                                        <tbody>
                                            <!-- <tr class="summary-subtotal">
                                                <td>Sous-total:</td>
                                                <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                            </tr>End .summary-subtotal -->

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td> <span data-total-panier><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?></span>€</td>
                                            </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->


                                    <?php
                                    if (!empty($_SESSION['panier'])) {
                                        if (!empty($_SESSION['users'])) { ?>
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Passer au mode de livraison</button>
                                    <?php
                                        }
                                    } ?>


                                    </form>




                                </div><!-- End .summary -->


                                <a href="menu.php" class="btn btn-outline-dark-2 btnContinuerLesCourses  btn-block mb-3 btn-blanc"><span class="couleurJaune">CONTINUE LES COURSES</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .cart -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->
        <?php require("./assets/componants/footer.php"); ?>
        <?php require("./assets/componants/navmenumobile.php"); ?>
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <?php require('./assets/componants/menu.php'); ?>
    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>
    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>


    <?php require('./assets/componants/fenetreModalConnexion.php'); ?>
    <?php require('./assets/componants/navmenumobile.php'); ?>
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script src="./assets/js/app.js"></script>
    <script src="./assets/js/geoapi3.js"></script>

    </html>