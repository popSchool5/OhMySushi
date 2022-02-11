 <?php
    session_start();


    if (!empty($_SESSION['users'])) {

        require('./assets/php/co_bdd.php');
        require('./assets/php/function.php');
        require('./assets/componants/barreMenu.php');
        if (!empty($ids)) {
            require('./assets/componants/header.php');

            $us = viewFullUserAdresse($_SESSION['users']['id']);
            $art = viewPanierArticle($ids);


            $quinzeEuro = array("Pont-à-Mousson");
            $vingtEuro = array("Blénod-lès-Pont-à-Mousson", "Maidières", "Montauville");
            $vingtCinqEuro = array("Jezainville", "Norroy-lès-Pont-à-Mousson");
            $trenteEuro = array("Vandiéres");
            $quarenteEuro = array("Champey-sur-Moselle", "Pagny-sur-Moselle", "Dieulouard", "Cheminot");
            $trenteCinqEuro = array("Lesménils", "Atton", "Mousson");


    ?>

         <script src="https://www.paypal.com/sdk/js?client-id=AUg4cL8vKsBwpOuLKgr9e0Oc0cKyPpx-soITSDL_45QZxfsHwI-MfxgUD66iOA8dnFsjDeSo_UbAS3D3&currency=EUR&intent=capture">
             // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
         </script>

         <body>
             <div class="page-wrapper">

                 <main class="main">

                     <div class="page-content">
                         <div class="checkout">




                             <h3 class="summary-title">Votre commande </h3><!-- End .summary-title -->


                             <div id="paypal-button-container"></div>

                             <?php $prix = htmlspecialchars(number_format($panier->total(), 2, '.', ' ')); ?>



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