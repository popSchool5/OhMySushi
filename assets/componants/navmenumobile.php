   <style>
       @media screen and (max-width: 480px) {

           .navMenuMobile {
               background: black;
               margin-top: 20px;
               position: fixed;
               bottom: 0;
               width: 100%;
               z-index: 222;
               display: block;
               border-top: 0.1rem solid #151414;
           }


           .navMenuMobile ul {
               display: flex;
               justify-content: space-around;
               padding: 1rem;
           }


       }

       @media screen and (min-width: 480px) {

           .navMenuMobile {
               display: none;
           }

       }







       .sidenav {
           height: 100%;

           position: fixed;
           z-index: 2;
           top: 0;
           right: 0;
           background-color: dimgray;
           overflow-x: hidden;
           transition: 0.3s;
           padding-top: 61px;
           /* width: 100%;
           max-width: 400px; */

           transform: translateX(100%);
       }

       .sidenav.openBg {
           transform: translateX(0);

       }

       .line {

           margin-left: 10px;
           margin-right: 10px;
           display: block;
           transition: 0.3s;
       }

       .sidenav a {
           padding-top: 16px;
           padding-bottom: 16px;
           padding-left: 20px;
           text-align: left;
           text-decoration: none;
           font-size: 25px;
           color: #000;
           display: block;
           transition: 0.3s;
       }

       .sidenav a:hover {
           color: #f1f1f1;
       }

       .menuIconToggle {
           box-sizing: border-box;
           cursor: pointer;
           position: fixed;
           z-index: 10;
           height: 100%;
           width: 100%;
           top: 22px;
           right: 15px;
           height: 22px;
           width: 22px;
           transition: all 0.3s;
           z-index: 10;
       }

       .hamb-line {
           box-sizing: border-box;
           position: absolute;
           height: 3px;
           width: 100%;
           background-color: #000;
           transition: all 0.25s;
       }

       .hor {
           transition: all 0.3s;
           box-sizing: border-box;
           position: relative;
           float: left;
           margin-top: 3px;
       }

       .ulMenuMobile {
           padding: 0;
           margin: 0;
           display: flex;
           justify-content: center;
           align-items: center;

       }

       .navmobileusericon,
       .iconCardMobileMenu,
       .navmobileMenuIcon {
           font-size: 25px;

       }

       .navmobileMenuIcon {
           font-size: 23px;

       }
   </style>
   <script>
       function openNav() {
           var side = document.getElementById("mySidenav");
          
           side.classList.toggle("openBg")
       }
   </script>
   <div class="navMenuMobile">
       <div class="background">
           <ul class="ulMenuMobile">
               <button class="mobile-menu-toggler">
                   <span class="sr-only"></span>
                   <i class="couleurJaune icon-bars"></i>
               </button>
               <?php
                if (!empty($_SESSION['users'])) { ?>

                   <li><a href="dashboard.php"><i class="couleurJaune icon-user navmobileusericon "></i><span class="header-me-connecter"><?= $_SESSION['users']['email'] ?></span></a></li>
               <?php
                } else { ?>
                   <li><a href="#signin-modal" data-toggle="modal"><i class="couleurJaune icon-user navmobileusericon"></i></a></li>
               <?php    }
                ?>

               <li onclick="openNav()"> <i class="couleurJaune icon-shopping-cart iconCardMobileMenu"></i> <span class="cart-count"><span id="countttt"><?= $panier->count() ?></span></span></li>

           </ul>
       </div>
   </div>

   <?php require('./assets/componants/panierMobileDropdown.php') ?>