<?php
session_start();

if (!empty($_SESSION['users'])) {
    require('./assets/php/co_bdd.php');
    require('./assets/php/function.php');

    $user = viewUser($_SESSION['users']['id']);
    $adressUser = viewFullUserAdresse($_SESSION['users']['id']);
    $adressUserSecondaire = viewFullUserAdresseSecondaire($_SESSION['users']['id']);
    $adressUserPrincipal = viewFullUserAdressePrincipal($_SESSION['users']['id']);
    $ordersUsers = viewOrders($_SESSION['users']['id']);
    //    $ordersLines = viewOrdersLines($_SESSION['users']['id']);


    require('./assets/componants/header.php');
?>


    <body>
        <div class="page-wrapper">

            <?php

            require('./assets/componants/barreMenu.php');  ?>

            <!-- MESSAGE D'ERREUR OU DE SUCCESS -->
            <?php

            require('./aa.php');  ?>

            <main class="main">
                <div class="page-header text-center" style="background:#000">
                    <div class="container">
                        <h1 class="page-title couleurJaune">Mon compte<span></span></h1>
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
                                        <div class="tab-pane fade show active couleurBlanche" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
                                            <p class="couleurBlanche">Hello <span class="font-weight-normal t"><?= $user['lastname'] ?></span>
                                                <br>
                                                À partir du tableau de bord de votre compte, vous pouvez consulter vos<a href="#tab-orders" class="tab-trigger-link link-underline"> récentes commandes</a>, <a href="#tab-address" class="tab-trigger-link  link-underline"> gérer vos adresses</a>, et <a href="#tab-account" class="tab-trigger-link  link-underline"> modifier votre mot de passe et les détails de votre compte.</a>

                                            </p>
                                        </div><!-- .End .tab-pane -->

                                        <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                            <?php if ($ordersUsers) { ?>
                                                <?php foreach ($ordersUsers as $orderUsers) {

                                                ?>
                                                    <div class="card card-dashboard">
                                                        <div class="card-body">
                                                            <h6>Commande numero : <?= $orderUsers['id']; ?> </h6><br>
                                                            <span>Statut de la commande : <?= $orderUsers['status'] ?></span><br>
                                                            <span>Adresse de facturation : <?= $orderUsers['billingadress']  ?></span><br>
                                                            <span>Mode de livraison : Emporter</span><br>

                                                            <a href="#" data-toggle="modal" data-target="[data-commande='<?= $adressUser['id'] ?>&<?= $orderUsers['id'] ?>'">Voir la commande <i class="icon-edit"></i></a>
                                                        </div>

                                                    </div>


                                                    <?php
                                                    $ordersLines = viewOrdersLines($_SESSION['users']['id'], $orderUsers['id']);

                                                    ?>


                                                    <div class="modal fade" id="exampleModalLongv" data-commande='<?= $adressUser['id'] ?>&<?= $orderUsers['id'] ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl " role="document">
                                                            <div class="modal-content  modal-lg  p-4">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Votre commande : <?= $orderUsers['id'] ?> </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>

                                                                <div class="modal-body bg-black">

                                                                    <h3 class="my-5">Vos produit commander </h3>

                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>

                                                                                <th scope="col">Nom</th>
                                                                                <th scope="col">Qty</th>
                                                                                <th scope="col">Prix unitaire</th>
                                                                                <th scope="col">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php

                                                                            foreach ($ordersLines as $orderLine) {

                                                                            ?>
                                                                                <tr>

                                                                                    <td> <?= $orderLine['name'] ?></td>
                                                                                    <td><?= $orderLine['quantityproducts'] ?></td>
                                                                                    <td><?= $orderLine['price'] ?> €</td>
                                                                                    <td><?= $orderLine['price'] * $orderLine['quantityproducts'] ?> € </td>
                                                                                </tr>


                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </tbody>
                                                                    </table>

                                                                    <h3 class="mt-5 ">Information</h3>
                                                                    <span>Statut de la commande : <?= $orderUsers['status'] ?></span><br>
                                                                    <span>Adresse de facturation : <?= $orderUsers['billingadress']  ?></span><br>
                                                                    <span>Mode de livraison : Emporter</span><br>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php }
                                            } else { ?>
                                                <p class="couleurBlanche">Aucune commande pour l'instant</p>

                                            <?php } ?>
                                            <a href="menu9.php" class="btn btn-outline-primary-2"><span>Retourner au menu</span><i class="icon-long-arrow-right"></i></a>
                                        </div><!-- .End .tab-pane -->




                                        <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                            <div id="errorMessage"></div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="card card-dashboard">
                                                        <div class="card-body">
                                                            <!-- End .card-title -->
                                                            <?php if ($adressUserPrincipal) { ?>
                                                                <h3 class="card-title">Votre adresse principale</h3>
                                                                <p><?= $adressUserPrincipal['name'] ?><br>
                                                                    <?php if ($adressUserPrincipal['company']) {
                                                                        echo $adressUserPrincipal['company'];
                                                                    } ?><br>
                                                                    <?= $adressUserPrincipal['address'] ?><br>
                                                                    <?= $adressUserPrincipal['city'] ?>, <?= $adressUserPrincipal['postal'] ?><br>
                                                                    <?= $adressUserPrincipal['phone'] ?><br>
                                                                    <?= $adressUserPrincipal['email'] ?><br>

                                                                    <a href="#" data-toggle="modal" data-target="[data-bg='<?= $adressUserPrincipal['id'] ?>']">Modifier <i class="icon-edit"></i></a>
                                                                    <a href="./dashboard/deleteAdress.php?id=<?= $adressUserPrincipal['id'] ?>&prio=principal">Supprimer <i class="icon-edit"></i></a>
                                                                </p>
                                                            <?php } else { ?>
                                                                <h5>Vous n'avez pas d'adresse, ajouter une adresse pour commander</h5>
                                                                <a href="#" data-toggle="modal" data-target="#exampleModalLong">Ajouter une adresse <i class="icon-edit"></i></a>
                                                            <?php } ?>
                                                        </div><!-- End .card-body -->

                                                        <!-- modal pour ajouter l'adresse principal  -->
                                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">

                                                                <style>
                                                                    .testFon,
                                                                    .form-control {
                                                                        font-size: 16px !important;
                                                                    }
                                                                </style>

                                                                <div class="modal-content p-4">
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
                                                                                <input type="text" class="form-control testFon" id="name" name="name" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control testFon" id="company" name="company">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control testFon" name="address" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control testFon" name="postal" id="postal" required>
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
                                                        <div class="modal fade" id="exampleModalLongg" data-bg='<?= htmlspecialchars($adressUserPrincipal['id']) ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content p-4">
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
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Maison, travail.." value="<?= $adressUserPrincipal['name'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control" value="<?= $adressUserPrincipal['company'] ?>" id="company" name="company" placeholder="Saint gobin S.A">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control" name="address" placeholder="19 rue de la poterie" value="<?= $adressUserPrincipal['address'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control" name="postal" id="postall" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="city">Ville</label><br>
                                                                                <select class="form-control" name="city" id="cityy">

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone">Numéro de téléphone</label>
                                                                                <input type="number" value="<?= $adressUserPrincipal['phone'] ?>" class="form-control" name="phone" id="phone" placeholder="06xxxxxxxx" required>
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
                                                <div class="col-lg-6">
                                                    <div class="card card-dashboard">
                                                        <div class="card-body">
                                                            <!-- End .card-title -->
                                                            <?php if ($adressUserSecondaire) { ?>
                                                                <h3 class="card-title">Votre adresse secondaire</h3>
                                                                <p><?= $adressUserSecondaire['name'] ?><br>
                                                                    <?php if ($adressUserSecondaire['company']) {
                                                                        echo $adressUserSecondaire['company'];
                                                                    } ?><br>
                                                                    <?= $adressUserSecondaire['address'] ?><br>
                                                                    <?= $adressUserSecondaire['city'] ?>, <?= $adressUserSecondaire['postal'] ?><br>
                                                                    <?= $adressUserSecondaire['phone'] ?><br>
                                                                    <?= $adressUserSecondaire['email'] ?><br>

                                                                    <a href="#" data-toggle="modal" data-target="[data-bg='<?= $adressUserSecondaire['id'] ?>']">Modifier <i class="icon-edit"></i></a>
                                                                    <a href="./dashboard/deleteAdress.php?id=<?= $adressUserSecondaire['id'] ?>&prio=secondaire">Supprimer <i class="icon-edit"></i></a>
                                                                </p>
                                                            <?php } else { ?>
                                                                <h5>Vous n'avez pas d'adresse, ajouter une adresse pour commander</h5>
                                                                <a href="#" data-toggle="modal" data-target="#exampleModalLong">Ajouter une adresse <i class="icon-edit"></i></a>
                                                            <?php } ?>
                                                        </div><!-- End .card-body -->

                                                        <!-- modal pour ajouter l'adresse principal  -->
                                                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">

                                                                <style>
                                                                    .testFon,
                                                                    .form-control {
                                                                        font-size: 16px !important;
                                                                    }
                                                                </style>

                                                                <div class="modal-content p-4">
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
                                                                                <input type="text" class="form-control testFon" id="name" name="name" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control testFon" id="company" name="company">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control testFon" name="address" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control testFon" name="postal" id="postal" required>
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
                                                        <div class="modal fade" id="exampleModalLongg" data-bg='<?= htmlspecialchars($adressUserSecondaire['id']) ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content p-4">
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
                                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Maison, travail.." value="<?= $adressUserSecondaire['name'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="company">Intitulé de l'entreprise </label>
                                                                                <input type="text" class="form-control" value="<?= $adressUserSecondaire['company'] ?>" id="company" name="company" placeholder="Saint gobin S.A">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="address">Votre adresse</label>
                                                                                <input type="text" class="form-control" name="address" placeholder="19 rue de la poterie" value="<?= $adressUserSecondaire['address'] ?>" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="postal">Code postal</label>
                                                                                <input type="number" class="form-control" name="postal" id="postall" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="city">Ville</label><br>
                                                                                <select class="form-control" name="city" id="cityy">

                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone">Numéro de téléphone</label>
                                                                                <input type="number" value="<?= $adressUserSecondaire['phone'] ?>" class="form-control" name="phone" id="phone" placeholder="06xxxxxxxx" required>
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

                                            <h4 class="couleurJaune">Mes informations</h4>
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

                                            <h4 class="pt-5 couleurJaune">Modifier le mot de passe </h4>
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
                                            <h4 class="pt-5 couleurJaune">Supprimer le compte (Cette action est irréversible)</h4>
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
        <?php require('./assets/componants/menu.php'); ?>
        <?php require('./assets/componants/fenetreModalConnexion.php'); ?>

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