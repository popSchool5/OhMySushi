   <?php
    require('./assets/php/co_bdd.php');
    require('./panier/Panier.php');
    $panier = new Panier();

    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        $productsDansLePanier = [];
    } else {
        $productsDansLePanier = viewPanierArticle($ids);
    }

    ?>

   <header class="header">

       <div class="header-middle sticky-header">
           <div class="container">
               <div class="header-left">
                   <button class="mobile-menu-toggler">
                       <span class="sr-only"></span>
                       <i class="icon-bars"></i>
                   </button>

                   <a href="index.php" class="logo">
                       <picture>
                           <source media="(max-width: 530px)" srcset="assets/images/logoOMS222.jpg">
                           <img src="assets/images/logoOMS.jpg" alt="OMS Logo" width="105" height="25">
                       </picture>

                   </a>

                   <nav class="main-nav">
                       <ul class="menu sf-arrows">
                           <li class="megamenu-container">
                               <a href="menu.php" class="couleurBlanche">Home</a>
                           </li>
                       </ul><!-- End .menu -->
                   </nav><!-- End .main-nav -->
               </div><!-- End .header-left -->

               <div class="header-right">

                   <div class="header-login">
                       <div class="header">
                           <style>
                               .logoConnexion {
                                   list-style: none;
                                   outline-style: none;
                                   outline: none;
                               }
                           </style>
                           <?php
                            if (!empty($_SESSION['users'])) { ?>

                               <li class="logoConnexion"><a href="dashboard.php"><i class="icon-user header-users-icon"></i><span class="header-me-connecter"><?= $_SESSION['users']['email'] ?></span></a></li>
                           <?php
                            } else { ?>
                               <li class="logoConnexion"><a href="#signin-modal" data-toggle="modal"><i class="icon-user header-users-icon"></i><span class="header-me-connecter">Me connecter / M'inscrire</span></a></li>
                           <?php    }
                            ?>
                       </div>
                   </div>

                   <div class="dropdown cart-dropdown">
                       <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                           <i class="icon-shopping-cart"></i>
                           <span class="cart-count"><span id="countt"><?= $panier->count() ?></span></span>
                       </a>

                       <?php require('./assets/componants/panierDropdown.php') ?>

                   </div><!-- End .cart-dropdown -->
               </div><!-- End .header-right -->
           </div><!-- End .container -->
       </div><!-- End .header-middle -->
   </header><!-- End .header -->