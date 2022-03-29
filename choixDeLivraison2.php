<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

$fermerOuOuvert = magasinFermerOuOuvert();

$adressePrincipal = voirAdressePrincipal($_SESSION['users']['id'], 'principal');
$adresseSecondaire = voirAdressePrincipal($_SESSION['users']['id'], 'secondaire');

$horraire = new DateTime();

$heure = $horraire->format("H");
$minute = $horraire->format("i");
$minute += 15;

$heureDepart = intval($heure + ($minute / 15 + 1) / (60 / 15));
$minuteDepart =  ($minute / 15 + 1) % (60 / 15) * 15;
$horraire->setTime($heureDepart, $minuteDepart, 00, 00);


for ($i = 0; $i < 60; $i++) {

    $horrairesPossibles[] = $horraire->format('H:i');
    $horraire->add(new DateInterval('PT10M'));
}
// var_dump($_POST);


?>



<body>
    <div class="page-wrapper">
        <?php require('./assets/componants/barreMenu.php'); ?>
        <main class="main">
            <div class="page-header text-center" style="background:#010101">
                <div class="container">
                    <h1 class="page-title couleurBlanche">Horraire de livraison</h1>
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
                                .tourDesLabels {
                                    display: flex;
                                    flex-wrap: wrap;
                            
                                    justify-content: flex-start;
                                }
                                .tourDesLabels label{
                                    border: 1px solid black;
                                    background-color: #333;
                                   color: white;
                                    margin: 0.5rem 1rem;
                                    border-radius: 4px;
                                    width: 120px;
                                    height: 70px;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;         
                                
                                }
                                .tourDesLabels input{
                                    display: none;
                                }
                                .check-with-label:checked+.label-for-check {
                                                border: 1px solid red !important;
                                                background-color: rgba(255, 71, 71, 0.7) !important;
                                }

                                @media screen and (max-width: 520px) {
                                    .tourDesLabels {
                             
                                    justify-content: center !important;
                                    }
                                    .tourDesLabels label{
                                        width: 160px;
                                        margin: 0.5rem 0.7rem;
                                    }
                                }

                            </style>
                            <div class="col-lg-9">
                            <?php require('./aa.php'); ?>
                                <body>
                                    <div id="container">
                                        <form action="passage3.php" method="POST">
                                        <input type="hidden" name="methodeDeLivraisonChoisis" value="<?= $_POST['un'] ?>">

                                            <div class="lesHorraireDispo">
                                                <h3>Choisir une heure</h3>
                                                <h2>Matin</h2> <br>
                                                <div class="tourDesLabels">

                                                  

                                                    <?php
                                                    $i = 1; 
                                                    foreach ($horrairesPossibles as $bg) {
                                                       
                                                       if($bg == "13:35"){
                                                            break;
                                                    }else{
                                                    ?>
                                                     <input type="radio" class="check-with-label" name="horraire" value="<?= $bg ?>" id="lesHorraires<?= $bg ?>">
                                                        <label class="label-for-check" for="lesHorraires<?= $bg ?>"><?= $bg ?></label>
                                                       
                                                    <?php
                                                       }
                                                 } ?>

                                                </div>
                                                <br><br>
                                                <h2>Aprem</h2> <br>
                                                <div class="tourDesLabels">


                                                    <?php
                                                    $i = 1; 
                                                   
                                                    foreach ($horrairesPossibles as $bg) {
                                                    
                                                       if($bg == "21:45"){
                                                            break;
                                                    }else{
                                                    ?>
                                                     <input type="radio" class="check-with-label" name="horraire" value="<?= $bg ?>" id="lesHorraires<?= $bg ?>">
                                                        <label class="label-for-check" for="lesHorraires<?= $bg ?>"><?= $bg ?></label>
                                                       
                                                    <?php
                                                       }
                                                 } ?>

                                                </div>
                                            </div>

                                    </div>
                                </body>
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
                                            <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">Paiement</button>
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