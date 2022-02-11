<?php
session_start();

if (!empty($_SESSION['users'])) {
    require('./assets/php/co_bdd.php');
    require('./assets/php/function.php');

    $user = viewUser($_SESSION['users']['id']);
    $adressUser = viewFullUserAdresse($_SESSION['users']['id']);
    $ordersUsers = viewOrders($_SESSION['users']['id']);
//    $ordersLines = viewOrdersLines($_SESSION['users']['id']);
 

    require('./assets/componants/header.php');
?>


    <body>
        <div class="page-wrapper">
            <?php require('./assets/componants/barreMenu.php');  ?>

            <!-- MESSAGE D'ERREUR OU DE SUCCESS -->
            <?php

            if (!empty($_GET['success']) == 'inscription') { ?>

            <?php } ?>

            <main class="main">
                <div class="page-header text-center" style="background:#000">
                    <div class="container">
                        <h1 class="page-title">Mon compte<span></span></h1>
                    </div><!-- End .container -->
                </div><!-- End .page-header -->
                <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                    <div class="container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
                        </ol>
                    </div><!-- End .container -->
                </nav><!-- End .breadcrumb-nav -->

                <div class="page-content">
                    <div class="dashboard">
                        <div class="container">
                            <div class="row">
                                <aside class="col-md-4 col-lg-3">
                                    <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active text-light" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-light" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Mes commandes</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link text-light" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Mes adresses</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-light" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Details du compte</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a class="nav-link text-light" href="./assets/php/deconnexion.php">Déconnexion</a>
                                        </li>
                                    </ul>
                                </aside><!-- End .col-lg-3 -->

                                <div class="col-md-8 col-lg-9">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                            <p>Hello <span class="font-weight-normal text-dark"><?= $user['lastname'] ?></span>
                                                <br>
                                                À partir du tableau de bord de votre compte, vous pouvez consulter vos<a href="#tab-orders" class="tab-trigger-link link-underline"> récentes commandes</a>, <a href="#tab-address" class="tab-trigger-link  link-underline"> gérer vos adresses</a>, et <a href="#tab-account" class="tab-trigger-link  link-underline"> modifier votre mot de passe et les détails de votre compte.</a>

                                            </p>
                                        </div><!-- .End .tab-pane -->

                                        <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                            <?php if ($ordersUsers) { ?>
                                                <?php foreach ($ordersUsers as $orderUsers) { ?>
                                                    <div class="card card-dashboard">
                                                        <div class="card-body">
                                                            <h6>Commande numero : <?= $orderUsers['id']; ?> </h6><br>
                                                            <span>Statut de la commande : <?= $orderUsers['status'] ?></span><br>
                                                            <span>Adresse de facturation : <?= $orderUsers['billingadress']  ?></span><br>
                                                            <span>Mode de livraison : <?= $orderUsers['billingadress']  ?></span><br>

                                                            <a href="#">Voir la commande <i class="icon-edit"></i></a>
                                                        </div>

                                                    </div>

                                                <?php }
                                            } else { ?>
                                                <p>Aucune commande pour l'instant</p>

                                            <?php } ?>
                                            <a href="category.html" class="btn btn-outline-primary-2"><span>Retourner au menu</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- .End .tab-pane -->




                                        <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                            <div id="errorMessage"></div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="card card-dashboard">
                                                        <div class="card-body">
                                                            <!-- End .card-title -->
                                                            <?php if ($adressUser) { ?>
                                                                <h3 class="card-title">Votre adresse</h3>
                                                                <p><?= $adressUser['name'] ?><br>
                                                                    <?php if ($adressUser['company']) {
                                                                        echo $adressUser['company'];
                                                                    } ?><br>
                                                                    <?= $adressUser['address'] ?><br>
                                                                    <?= $adressUser['city'] ?>, <?= $adressUser['postal'] ?><br>
                                                                    <?= $adressUser['phone'] ?><br>
                                                                    <?= $adressUser['email'] ?><br>

                                                                    <a href="#" data-toggle="modal" data-target="[data-bg='<?= $adressUser['id'] ?>']">Modifier <i class="icon-edit"></i></a>
                                                                    <a href="./dashboard/deleteAdress.php?id=<?= $adressUser['id'] ?>">Supprimer <i class="icon-edit"></i></a>
                                                                </p>
                                                            <?php } else { ?>
                                                                <h5>Vous n'avez pas d'adresse, ajouter une adresse pour commander</h5>
                                                                <a href="#" data-toggle="modal" data-target="#exampleModalLong">Ajouter une adresse <i class="icon-edit"></i></a>
                                                            <?php } ?>
                                                        </div><!-- End .card-body -->

                                                        <!-- modal pour ajouter l'adresse principal  -->
                                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Votre adresse principal :</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="./dashboard/editAdress.php?prio=principal">
                                                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                                            <div class="form-group">
                                                                                <label for="name">Intitulé de l'adresse </label>
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Maison, travail.." required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control" id="company" name="company" placeholder="Saint gobin S.A">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control" name="address" placeholder="19 rue de la poterie" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control" name="postal" id="postal" placeholder="54700" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="city">Ville</label><br>
                                                                                <select class="form-control" name="city" id="city">

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone">Numéro de téléphone</label>
                                                                                <input type="number" class="form-control" name="phone" id="phone" placeholder="06xxxxxxxx" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin de la modal pour l'adresse principal  -->

                                                        <!-- modal pour modification modifier l'adresse principal  -->
                                                        <div class="modal fade" id="exampleModalLong" data-bg='<?= htmlspecialchars($adressUser['id']) ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Votre adresse principal :</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="POST" action="./dashboard/editAdress.php?prio=modif">
                                                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                                                            <div class="form-group">
                                                                                <label for="name">Intitulé de l'adresse </label>
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Maison, travail.." value="<?= $adressUser['name'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control" value="<?= $adressUser['company'] ?>" id="company" name="company" placeholder="Saint gobin S.A">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control" name="address" placeholder="19 rue de la poterie" value="<?= $adressUser['address'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control" name="postal" id="postal" placeholder="54700" value="<?= $adressUser['postal'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="city">Ville</label><br>
                                                                                <select class="form-control" name="city" id="city">

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone">Numéro de téléphone</label>
                                                                                <input type="number" value="<?= $adressUser['phone'] ?>" class="form-control" name="phone" id="phone" placeholder="06xxxxxxxx" required>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- fin de la modal pour modification  l'adresse principal  -->
                                                    </div><!-- End .card-dashboard -->

                                                </div><!-- End .col-lg-6 -->

                                            </div><!-- End .row -->
                                        </div><!-- .End .tab-pane -->

                                        <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">

                                            <h4>Mes informations</h4>
                                            <form method="POST" action="./dashboard/editUserCompte.php?q=info">
                                                <div class="row">
                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
                                                    <div class="col-sm-6">
                                                        <label>Prénom *</label>
                                                        <input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname']); ?>" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->

                                                    <div class="col-sm-6">
                                                        <label>Nom *</label>
                                                        <input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']); ?>" class="form-control" required>
                                                    </div><!-- End .col-sm-6 -->
                                                </div><!-- End .row -->


                                                <label>Email *</label>
                                                <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" class="form-control" required>
                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>Enregistrer</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </form>

                                            <h4 class="pt-5">Modifier le mot de passe </h4>
                                            <form method="POST" action="./dashboard/editUserCompte.php?q=password">
                                                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']); ?>">
                                                <label>Nouveau mot de passe</label>
                                                <input type="password" name="newpassword" class="form-control">

                                                <label>Confirmer nouveau mot de passe</label>
                                                <input type="password" name="newpassword2" class="form-control mb-2">

                                                <button type="submit" class="btn btn-outline-primary-2">
                                                    <span>Enregistrer</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>

                                            </form>
                                            <h4 class="pt-5">Supprimer le compte (Cette action est irréversible)</h4>
                                            <a href="./dashboard/deleteCompte.php?id=<?= $user['id'] ?>">
                                                <button type="" class="btn btn-outline-primary-2">
                                                    <span>Supprimer</span>
                                                    <i class="icon-long-arrow-right"></i>
                                                </button>
                                            </a>
                                        </div><!-- .End .tab-pane -->

                                    </div>
                                </div><!-- End .col-lg-9 -->
                            </div><!-- End .row -->
                        </div><!-- End .container -->
                    </div><!-- End .dashboard -->
                </div><!-- End .page-content -->
            </main><!-- End .main -->
            <?php require('./assets/componants/footer.php'); ?>
            <?php require('./assets/componants/navmenumobile.php'); ?>

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


        <!-- Plugins JS File -->
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
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


    </html>
<?php
} else {
    header('location: ./index.php');
}
?>