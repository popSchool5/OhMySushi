    <?php
    session_start();
    if (!empty($_SESSION) && !empty($_GET['id'])) {

        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        $user = viewUsers($_GET['id']);
        $exist = usersExist($_GET['id']);

        if ($exist) {

            require('./assets/componant/header.php');




    ?>
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <!-- users view start -->
                        <section class="users-view">
                            <!-- users view media object start -->
                            <div class="row">
                                <div class="col-12 col-sm-7">
                                    <div class="media mb-2">

                                        <div class="media-body pt-25">
                                            <h4 class="media-heading"><span class="users-view-name"><?= $user['firstname'] ?> <?= $user['lastname'] ?></span></h4>
                                            <span>ID:</span>
                                            <span class="users-view-id"><?= $user['id'] ?>


                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- users view media object ends -->
                            <!-- users view card data start -->


                            <!-- users view card data ends -->
                            <!-- users view card details start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                                        <div class="col-12 col-sm-4 p-2">
                                            <h6 class="text-primary mb-0">Nombre de commande : <span class="font-large-1 align-middle">125</span></h6>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>Nom:</td>
                                                    <td class="users-view-username"><?= $user['firstname'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Prénom :</td>
                                                    <td class="users-view-name"><?= $user['firstname'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>E-mail:</td>
                                                    <td class="users-view-email"><?= $user['email'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Entreprise:</td>
                                                    <td><?= $user['company'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Adresse:</td>
                                                    <td><?= $user['address'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ville :</td>
                                                    <td><?= $user['city'] ?>,<?= $user['postal'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Téléphone :</td>
                                                    <td><?= $user['phone'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <!-- users view card details ends -->

                        </section>
                        <!-- users view ends -->

                    </div>
                </div>
            </div>


    <?php

            require('./assets/componant/footer.php');
        } else {
            header('location:app-users-list.php?error=incUsers');
        }
    } else {
        header('location:auth-login.php');
    }

    ?>