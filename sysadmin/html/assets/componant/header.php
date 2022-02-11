<!DOCTYPE html>
<html class="loading" lang="fr">

<head>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Dashboard - Oh My Sushi</title>
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">

    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/dragula.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/widgets.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script s+rc='https://cdn.tiny.cloud/1/qgf3y78kavpizx2zcunnsewfrrah0od278tp12h5vpah3pdj/tinymce/5/tinymce.min.js' referrerpolicy="origin">
    </script>
    <script>
        tinymce.init({
            selector: '#monactuarea'
        });
    </script>
</head>

<body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="javascript:void(0);"><i class="ficon bx bx-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">

                            <?php
                            $req = $bdd->prepare('SELECT * FROM settings WHERE cle = "magasin"');
                            $req->execute(array());
                            $f = $req->fetchAll();



                            ?>
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="todo.php" data-toggle="tooltip" data-placement="top" title="Todo"><i class="ficon bx bx-check-circle"></i></a></li>
                            <?php foreach ($f as $t) {
                                if ($t['cle'] == 'magasin') {
                                    if ($t['valeur'] == 'fermer') {
                            ?>
                                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="./assets/componant/fermeture.php?magasin=ouvert" data-toggle="tooltip" data-placement="top" title="Ouvrir le Magasin"><i class='ficon bx bx-lock' style='color:red'></i></a></li>
                                    <?php } else { ?>
                                        <li class="nav-item d-none d-lg-block"><a class="nav-link" href="./assets/componant/fermeture.php?magasin=fermer" data-toggle="tooltip" data-placement="top" title="Fermer le Magasin"><i class='ficon bx bx-lock-open-alt' style='color:#07b503'></i></a></li>
                            <?php }
                                }
                            } ?>
                        </ul>
                        <ul class="nav navbar-nav">
                            <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i class="ficon bx bx-star warning"></i></a>
                                <div class="bookmark-input search-input">
                                    <div class="bookmark-input-icon"><i class="bx bx-search primary"></i></div>
                                    <input class="form-control input" type="text" placeholder="Rechercher..." tabindex="0" data-search="template-search">
                                    <ul class="search-list"></ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">

                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>

                        <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
                            <div class="search-input">
                                <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
                                <input class="input" type="text" placeholder="Recherche..." tabindex="-1">
                                <div class="search-input-close"><i class="bx bx-x"></i></div>
                                <ul class="search-list"></ul>
                            </div>
                        </li>

                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="javascript:void(0);" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name">Mounir Siari</span><span class="user-status text-muted">Connecter</span></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href=""><i class="bx bx-user mr-50"></i>Paramétre du Profil</a>
                                <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="./assets/componant/logout.php"><i class="bx bx-power-off mr-50"></i> Se déconnecter</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="./index.php">

                        <h2 class="brand-text mb-0">Oh My Sushi</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
                <li class=" nav-item"><a href="index.html"><i class="bx bx-home-alt"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span><span class="badge badge-light-danger badge-pill badge-round float-right mr-50 ml-auto">2</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="../../index.php"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="eCommerce">Visiter mon site</span></a>
                        </li>
                        <li class="active"><a class="d-flex align-items-center" href="#"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="Analytics">Mon dashboard</span></a>
                        </li>
                    </ul>
                    <!-- </li>
                <li class=" navigation-header text-truncate"><span data-i18n="Apps">Apps</span>
                </li> -->
                <li class=" nav-item"><a href="menu.php"><i class="bx bxs-cake"></i><span class="menu-title text-truncate" data-i18n="Search">Menu</span></a>
                </li>
                <li class=" nav-item"><a href="categorie.php"><i class="bx bxs-category"></i><span class="menu-title text-truncate" data-i18n="Search">Catégorie</span></a>
                </li>
                <li class=" nav-item"><a href="commande.php"><i class="bx bxs-downvote"></i><span class="menu-title text-truncate" data-i18n="Search">Commande</span></a>
                </li>
                <li class=" nav-item" data-toggle="tooltip"><a href="page-menu.html"><i class="bx bxs-cart"></i><span class="menu-title text-truncate" data-i18n="Search">Paiement</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="bx bx-user-plus"></i><span class="menu-title text-truncate" data-i18n="User">Clients</span></a>

                </li>
                <li class=" nav-item"><a href="promo.php"><i class="bx bx-user-plus"></i><span class="menu-title text-truncate" data-i18n="User">Code promo</span></a>

                </li>
                <li class=" nav-item"><a href="crud.php"><i class="bx bx-user-plus"></i><span class="menu-title text-truncate" data-i18n="User">Modifier page d'accueil</span></a>

                </li>




                <li class=" nav-item"><a href="#"><i class="bx bx-news"></i><span class="menu-title text-truncate" data-i18n="User">Actualités</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="categorieActu.php"><i class="bx bx-right-arrow-alt"></i><span class="menu-item text-truncate" data-i18n="List">Les catégories</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="actualite.php"><i class="bx bx-news"></i><span class="menu-item text-truncate" data-i18n="List">Les Actualités</span></a>
                        </li>
                    </ul>

                </li>

                <li class=" nav-item"><a href="tva.php"><i class="bx bx-news"></i><span class="menu-title text-truncate" data-i18n="Search">Gérer la TVA</span></a>
                </li>





                <li class=" nav-item"><a href="recrutement.php"><i class="bx bx-check-circle"></i><span class="menu-title text-truncate" data-i18n="Todo">Recrutement</span></a>
                </li>

                <li class=" nav-item"><a href="page-account-settings.php"><i class="bx bx-wrench"></i><span class="menu-title text-truncate" data-i18n="Account Settings">Parametre du compte</span></a>
                </li>
                <li class=" mt-5 nav-item btn-danger buttonDemandeAide "><a href="./sms/smsMoun.php"><i class="fas fa-exclamation"></i><span class="menu-title text-truncate text-white" data-i18n="Account Settings"> Aide nous Mounir stp</span></a>
                </li>


            </ul>
            <style>
                .buttonDemandeAide {
                    border-radius: 3px;
                }

                .fa-exclamation {
                    font-size: 24px;
                    color: white;
                }
            </style>

        </div>

    </div>
    <!-- END: Main Menu-->