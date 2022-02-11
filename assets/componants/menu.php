   <!-- Mobile Menu -->
   <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->
   <style>
       .mobile-menu-container{
           overflow: hidden;
       }
   </style>
   <div class="mobile-menu-container">
       <div class="mobile-menu-wrapper">
           <span class="mobile-menu-close"><i class="icon-close"></i></span>

           <form action="#" method="get" class="mobile-search">
               <label for="mobile-search" class="sr-only">Recherche</label>
               <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Rechercher..." required>
               <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
           </form>

           <nav class="mobile-nav">
               <ul class="mobile-menu">
                   <li class="active">
                       <a href="index.php">Home</a>


                   </li>
                   <?php if (!empty($_SESSION['users'])) { ?>
                       <li>
                           <a href="dashboard.php">Mon compte</a>

                       </li>
                   <?php } else { ?>
                       <li>
                           <a href="#signin-modal" data-toggle="modal">Connexion/inscription</a>

                       </li>
                   <?php }  ?>
                   <li>
                       <a href="menu9.php" class="sf-with-ul">Commander</a>

                   </li>

                   <li>
                       <a href="recrutement.php">Recrutement</a>

                   </li>
                   <li>
                       <a href="#">Glossaire des ingrédients</a>

                   </li>
                   <li>
                       <a href="actualites.php">Actualités</a>

                   </li>
                   <li>
                       <a href="contact.php">Contact</a>

                   </li>
                   <li>
                       <a href="franchise.php">Devenir Franchisé</a>

                   </li>
                   <li>
                       <a href="reservation.php">Réserver une table</a>
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