<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

$fermerOuOuvert = magasinFermerOuOuvert();

$adressePrincipal = voirAdressePrincipal($_SESSION['users']['id'], 'principal');
$adresseSecondaire = voirAdressePrincipal($_SESSION['users']['id'], 'secondaire');

?>



<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>
               <?php require('./aa.php'); ?>
        <main class="main">
            <div class="page-header text-center" style="background:#010101">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Choix de l'adresse</h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>

                        <li class="breadcrumb-item " aria-current="page">Accompagnement</li>
                        <li class="breadcrumb-item active couleurJaune" aria-current="page">Adresse</li>
                        <li class="breadcrumb-item" aria-current="page">Mode de livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Paiement</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="cart">

                    <div class="container">

                        <div class="row">

                            <div class="col-lg-9">
                                <?php if ($adressePrincipal || $adresseSecondaire) { ?>
                                    <form action="./passage2.php" method="post">

                                        <style>
                                            .label-for-check {
                                                border: 1px solid grey;
                                                padding: 2.5rem;
                                                margin-top: 1.3rem;
                                                border-radius: 2px;
                                                min-width: 320px;
                                                min-height: 240px;
                                                text-align: center;
                                                background-color: rgb(23 23 23 / 81%);

                                            }

                                            .label-for-check img {

                                                margin: auto;
                                            }

                                            .check-with-label:checked+.label-for-check {
                                                border: 1px solid red;
                                                background-color: #ff00007a !important;
                                            }

                                            .check-with-label {
                                                /* visibility: hidden; */
                                                display: none;
                                            }

                                            .choixDeLadresse {
                                                display: flex;
                                                flex-wrap: wrap;
                                                justify-content: center; 
                                            }

                                            .fas{
                                                font-size: 30px;

                                            }
                                            .sauce{
                                                
                                                margin: 2rem;
                                                min-height: 250px;
                                            }

                                        </style>

                                        <div class="choixDeLadresse">
                                            <?php if ($adressePrincipal) { ?>
                                                <div class="sauce">
                                                    <input type="radio"  name="adresseDeLivraisonChoisie" value="principal" class="check-with-label" id="idinput1" />
                                                    <label class="label-for-check" for="idinput1">
                                                        <h6 class="couleurBlanche"><i class="fas fa-map-marker-alt"></i></h6>
                                                        <?php foreach($adressePrincipal as $ap){ ?>
                                                           <p  class="couleurBlanche" ><?= $ap['name']; ?> </p> 
                                                           <p class="couleurBlanche" > <?= $ap['company']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $ap['address']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $ap['postal']; ?>,<?= $ap['city']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $ap['phone']; ?> </p>
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                            <?php if ($adresseSecondaire) { ?>

                                                <div class="sauce">
                                                    <input type="radio" name="adresseDeLivraisonChoisie" value="secondaire" class="check-with-label" id="idinput" />
                                                    <label class="label-for-check" for="idinput">
                                                    <h6 class="couleurBlanche"><i class="fas fa-map-marker-alt"></i></h6>
                                                        <?php foreach($adresseSecondaire as $as){ ?>
                                                           <p  class="couleurBlanche" ><?= $as['name']; ?> </p> 
                                                           <p class="couleurBlanche" > <?= $as['company']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $as['address']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $as['postal']; ?>,<?= $as['city']; ?> </p> 
                                                           <p class="couleurBlanche"> <?= $as['phone']; ?> </p>
                                                        <?php } ?>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                   
                                <?php } else { ?>
                                    <form method="POST" action="./dashboard/editAdress.php?prio=principal">
                                                <input type="hidden" name="id" value="<?= $_SESSION['users']['id'] ?>">
                                                <input type="hidden" name="chemin" value="adresseFacturation">
                                                <div class="row">
                                                
                                                    <div class="col-sm-6">
                                                        <label>Intitulé de l'adresse *</label>
                                                        <input type="text" name="name" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Entreprise (facultatif) </label>
                                                        <input type="text" name="company" class="form-control">
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->


                                                <label>Addresse *</label>
                                                <input type="text" name="address" class="form-control" placeholder="Nom de la rue" required>

                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <label>Code postal *</label>
                                                        <input type="text" id="postalFacturation" name="postal" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="form-group col-sm-6">
                                                        <label for="cityFacturation">Ville</label><br>
                                                        <select class="form-control" name="city" id="cityFacturation">

                                                        </select>
                                                    </div>

                                                </div><!-- End .row -->

                                                <div class="row">


                                                    <div class="col-sm-12">
                                                        <label>Téléphone *</label>
                                                        <input type="tel" name="phone" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <button class="btn btn-outline-primary-2" type="submit">Enregistrer</button>
                                            </form>

                                <?php } ?>
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
                                        if (!empty($_SESSION['users'])) {
                                        ?>
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Passer au mode de livraison</button>
                                        <?php }
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

        <footer class="footer footer-dark">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="widget widget-about">
                                <img src="assets/images/logoOMS2.jpg" class="footer-logo" alt="Footer Logo" width="105" height="25">
                                <p>Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate
                                    magna eros eu erat. </p>

                                <div class="social-icons">
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div><!-- End .soial-icons -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Liens du site</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Menu</a></li>
                                    <li><a href="#">Recrutement</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Contactez nous</a></li>
                                    <li><a href="login.html">Connexion</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Nos services</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Moyens de paiements</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#">Livraisons</a></li>
                                    <li><a href="#">Emportez</a></li>
                                    <li><a href="#">Termes et conditions</a></li>
                                    <li><a href="#">RGPD</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->

                        <div class="col-sm-6 col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">Mon compte</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a href="#">Connexion / Inscription</a></li>
                                    <li><a href="">Mon panier</a></li>
                                    <li><a href="#">Mes favoris</a></li>
                                    <li><a href="#"></a></li>

                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-6 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p class="footer-copyright">Copyright © 2021 Oh My Sushi. All Rights Reserved.</p>
                    <!-- End .footer-copyright -->
                    <figure class="footer-payments">
                        <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
                    </figure><!-- End .footer-payments -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
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