<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');


require('./assets/componants/header.php');
var_dump($_POST);
if (!empty($_SESSION['users'])) {
    require('./assets/componants/barreMenu.php');

    $us = viewFullUserAdresse($_SESSION['users']['id']);
    $art = viewPanierArticle($ids);

    $quinzeEuro = array("Pont-à-Mousson");
    $vingtEuro = array("Blénod-lès-Pont-à-Mousson", "Maidières", "Montauville");
    $vingtCinqEuro = array("Jezainville", "Norroy-lès-Pont-à-Mousson");
    $trenteEuro = array("Vandiéres");
    $quarenteEuro = array("Champey-sur-Moselle", "Pagny-sur-Moselle", "Dieulouard", "Cheminot");
    $trenteCinqEuro = array("Lesménils", "Atton", "Mousson");



?>

    <body>
        <div class="page-wrapper">
            <?php

            ?>
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
                            <li class="breadcrumb-item"><a href="#">Shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="checkout">
                        <div class="container">

                            <form action="bg.php" method="GET">

                                <style>
                                    .adressCheckout {
                                        background-color: whitesmoke;

                                        border: 3px solid white;
                                        border-radius: 4px;
                                        padding: 1rem;
                                        margin: 0.1rem;
                                    }

                                    #accordionExample {
                                        border: 3px solid white;
                                        border-radius: 4px;

                                    }

                                    .inputTime {
                                        padding: 1rem;
                                        margin: 1rem;
                                    }
                                </style>
                                <div class="row">

                                    <div class="container  col-lg-9">
                                        <?php if (!empty($us['name']) && !empty($us['address']) && !empty($us['postal']) && !empty($us['city']) && !empty($us['phone'])) { ?>
                                            <h2 class="checkout-title  couleurJaune ">Mode de livraison</h2><!-- End .checkout-title -->

                                            <div class="accordion" id="accordionExample">

                                                <?php if (($panier->total() >= 15) && in_array($us['city'], $quinzeEuro)) { ?>
                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif (($panier->total() >= 20) && (in_array($us['city'], $vingtEuro) | in_array($us['city'], $quinzeEuro))) { ?>
                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php  } elseif (($panier->total() >= 25) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro))) { ?>
                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif (($panier->total() >= 30) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro) || in_array($us['city'], $trenteEuro))) { ?>
                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } elseif (($panier->total() >= 35) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro) || in_array($us['city'], $trenteEuro) || in_array($us['city'], $trenteCinqEuro))) { ?>
                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } elseif (($panier->total() >= 40) && (in_array($us['city'], $trenteCinqEuro) || in_array($us['city'], $quarenteEuro) || in_array($us['city'], $trenteEuro) || in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro))) { ?>

                                                    <div class="card">

                                                        <div class="card-header" id="headingOne">
                                                            <h2 class="mb-0">
                                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Se faire livrer
                                                                </button>
                                                            </h2>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                <input type="time" name="horraireLivraison" class="inputTime">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php  } ?>
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                Sur place
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <form action="">
                                                                <label for="timerEmportez">A quel heure voulez vous venir manger ? </label>
                                                                <input type="time" name="horraireSurPlace">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                A emporter
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <form action="">
                                                                <label for="timerEmportez">A quel heure voulez vous récuperez votre plat ? </label>
                                                                <input type="time" name="horraireEmporter">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <h2 class="checkout-title  couleurJaune ">Veuillez renseigner vos coordonnées</h2><!-- End .checkout-title -->

                                        <?php if (!empty($us['name']) && !empty($us['address']) && !empty($us['postal']) && !empty($us['city']) && !empty($us['phone'])) { ?>
                                            <div class="row adressCheckout">
                                                <div class="col-12 ">
                                                    <div>
                                                        Intitulé : <?= $us['name'] ?>
                                                    </div>
                                                    <div>
                                                        <?php if (!empty($us['company'])) { ?>
                                                            Societé : <?= $us['company'] ?>
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        Adresse : <?= $us['address'] ?> <?= $us['postal'] ?> <?= $us['name'] ?> <?= $us['city'] ?>

                                                    </div>
                                                    <div>
                                                        Téléphone : <?= $us['phone'] ?>
                                                    </div>
                                                    <a href="./dashboard/deleteAdress.php?id=<?= $_SESSION['users']['id'] ?>">Supprimer <i class="icon-edit"></i></a>
                                                </div>

                                            </div>

                                        <?php } else { ?>
                                            <form method="POST" action="./dashboard/editAdress.php?prio=principal">
                                                <input type="hidden" name="id" value="<?= $_SESSION['users']['id'] ?>">
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
                                                        <input type="text" id="postal" name="postal" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="form-group col-sm-6">
                                                        <label for="city">Ville</label><br>
                                                        <select class="form-control" name="city" id="city">

                                                        </select>
                                                    </div>

                                                </div><!-- End .row -->

                                                <div class="row">


                                                    <div class="col-sm-12">
                                                        <label>Téléphone *</label>
                                                        <input type="tel" name="phone" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->
                                                <button class="btn" type="submit">Enregistrer</button>
                                            </form>

                                        <?php } ?>
                                        <br>
                                        <?php if (!empty($us['name']) && !empty($us['address']) && !empty($us['postal']) && !empty($us['city']) && !empty($us['phone'])) { ?>
                                            <label class="couleurJaune">Note pour la commande ? (facultatif)</label>
                                            <textarea class="form-control" cols="30" rows="4" name="notePourLaCommande" placeholder="Une note ?"></textarea>
                                        <?php } ?>
                                    </div><!-- End .col-lg-9 -->
                                    <aside class="col-lg-3">
                                        <div class="summary">
                                            <h3 class="summary-title">Votre commande </h3><!-- End .summary-title -->

                                            <table class="table table-summary">
                                                <thead>
                                                    <tr>
                                                        <th>Produit</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($art as $article) {  ?>
                                                        <tr>
                                                            <td><a href="#"><?= $article['name'] ?></a></td>
                                                            <td><?= number_format($article['price'], 2, ',', ' ') ?> €</td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr class="">
                                                        <td>Offert:</td>
                                                        <td><?php if (isset($_POST['salee'])) {
                                                                echo 'Sauce salée';
                                                            } ?></td>
                                                   
                                                    </tr><!-- End .summary-subtotal -->
                                                    <tr class="summary-subtotal">
                                                        <td>Sous-total:</td>
                                                        <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                                    </tr><!-- End .summary-subtotal -->
                                                    <tr>
                                                        <td>Livraison:</td>
                                                        <td id="livraisonMode"></td>
                                                    </tr>
                                                    <tr class="summary-total">
                                                        <td>Total:</td>
                                                        <td>$160.00</td>
                                                    </tr><!-- End .summary-total -->
                                                </tbody>
                                            </table><!-- End .table table-summary -->

                                            <div class="accordion-summary" id="accordion-payment">
                                                <div class="card">
                                                    <div class="card-header" id="heading-1">
                                                        <h2 class="card-title">
                                                            <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                                                emportez
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                        <div class="card-body">
                                                            Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->

                                                <div class="card">
                                                    <div class="card-header" id="heading-2">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                                                Sur place
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                                        <div class="card-body">
                                                            Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->

                                                <div class="card">
                                                    <div class="card-header" id="heading-3">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                                Livraison
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                                        <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->


                                                <div class="card">
                                                    <div class="card-header" id="heading-5">
                                                        <h2 class="card-title">
                                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                                Je sais pas
                                                                <img src="assets/images/payments-summary.png" alt="payments cards">
                                                            </a>
                                                        </h2>
                                                    </div><!-- End .card-header -->
                                                    <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                                        <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                                        </div><!-- End .card-body -->
                                                    </div><!-- End .collapse -->
                                                </div><!-- End .card -->
                                            </div><!-- End .accordion -->

                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                                <span class="btn-text">Payer</span>
                                                <span class="btn-hover-text">Procéder au paiement</span>
                                            </button>
                                        </div><!-- End .summary -->
                                    </aside><!-- End .col-lg-3 -->
                                </div><!-- End .row -->
                            </form>
                        </div><!-- End .container -->
                    </div><!-- End .checkout -->
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

<?php } ?>

</html>