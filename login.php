<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/componants/header.php');

require('./assets/php/function.php');

$promos = promoAafficher();
$crudIndex = crudIndex();
// var_dump($crudIndex);
$fermerOuOuvert = magasinFermerOuOuvert();

?>

<style>
    .form-box {
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        background-color: #fff;
        padding: 2.2rem 2rem 4.4rem;
        background: #141414;
        border-radius: 3px;
    }

    .nav-item-moi {
        color: white;
    }
    .tab-pane-moi form label{
        color: white;
    }
</style>

<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php') ?>

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Accompagnement</li>
                        <li class="breadcrumb-item couleurJaune" aria-current="page">Connexion</li>
                        <li class="breadcrumb-item" aria-current="page">Adresse</li>
                        <li class="breadcrumb-item" aria-current="page">Mode de livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Paiement</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background: black">
                <div class="container">
                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item nav-item-moi">
                                    <a class="nav-link" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Me connecter</a>
                                </li>
                                <li class="nav-item nav-item-moi">
                                    <a class="nav-link active" id="register-tab-2" data-toggle="tab" href="#register-2" role="tab" aria-controls="register-2" aria-selected="true">M'inscrire</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane tab-pane-moi fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                    <form action="./connexion/connexion.php?sess=co" method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="chemin" value="tunnel">
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                        <label for="singin-email">Votre adresse email *</label>
                                        <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Votre mot de passe *</label>
                                        <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>Se connecter</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <a href="#" class="forgot-link">Mot de passe oublié?</a>
                                    </div>
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane tab-pane-moi fade show active" id="register-2" role="tabpanel" aria-labelledby="register-tab-2">
                                    <form action="./connexion/connexion.php?sess=insc" method="POST">
                                    <div class="form-group">
                                            <input type="hidden" name="chemin" value="tunnel">
                                        </div><!-- End .form-group -->
                                        <div class="form-group">
                                        <label for="register-email">Votre adresse email *</label>
                                        <input type="email" class="form-control" id="register-email" name="register-email" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="prenom">Votre Prénom *</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                                    </div><!-- End .form-group -->
                                    <div class="form-group">
                                        <label for="nom">Votre nom *</label>
                                        <input type="text" class="form-control" id="nom" name="nom" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Votre mot de passe *</label>
                                        <input type="password" class="form-control" id="register-password" name="register-password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>S'inscrire</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">J'accepte
                                                <a href="#">la rgpd ou je sais pas quoi </a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div>
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->
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
    <script type="text/javascript">
        (function() {
            window['__CF$cv$params'] = {
                r: '6de59f651a5ca85b',
                m: 'vTlQ9WS4IkNiDQIbWd0UtBUJSW2R7nkPN7z.l.Y4A3Y-1645002414-0-AeNdL13uVHlpp1ntqYzFsmIYmwwfZTKXHxPMO9XabT6De2u3Mn4m6wEZZqYvnxP4gOJv/M5feJMmhgNXb/W2kuLKlL2pqBWSadVy07S4Rv8UkopNDiv0CIG2BT7zUCeNtM14GWSZLTMz7uANUDUo7o0zj29wuMzAw/Lzf9tf9Ue+UBNHmQU7kGGWSvV7Hb4+KA==',
                s: [0xba59849562, 0xa4b4b46431],
            }
        })();
    </script>
</body>


<!-- molla/login.html  22 Nov 2019 10:04:03 GMT -->

</html>