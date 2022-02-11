    <?php
    session_start();
    if (!empty($_SESSION)) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');

    ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">

                <div class="content-body">

                    <section id="form-control-repeater">
                        <div class="row">

                            <!-- phone repeater -->
                            <div class="col-xl-12 col-lg -12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Ajouter catégorie</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="../html/categorie/ajoutCategorie.php" method="POST" class="contact-repeater">
                                            <div>
                                                <div class="row">
                                                    <?php if (isset($_GET) && !empty($_GET)) {

                                                        if (!empty($_GET['succes']) && $_GET['succes'] == "ajout") { ?>
                                                            <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                                                <strong>Ajout de la nouvelle catégorie</strong>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                        <?php } elseif ($_GET['success'] == "delete") {   ?>
                                                            <div class="alert alert-warning alert-dismissible fade show w-100" role="alert">
                                                                <strong>Catégorie supprimer</strong>
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                    <?php }
                                                    }
                                                    // var_dump($_SERVER); 
                                                    ?>


                                                    <div class="col-md-9 col-4 mb-50">
                                                        <label class="text-nowrap">Nom de la catégorie</label>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-between" data-repeater-item>
                                                    <div class="col-md-9 col-12 form-group d-flex align-items-center">
                                                        <i class="bx bx-menu mr-1"></i>
                                                        <input type="text" name="nouvelleCategorie" class="form-control" placeholder="Nom de la catégorie à ajouter" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-success" type="submit">AJOUTER</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /phone repeater -->
                        </div>

                        <div class="row">
                            <section id="table-success">
                                <div class="card">
                                    <!-- datatable start -->

                                    <div class="table-responsive">
                                        <table id="table-extended-success" class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Mes Catégories</th>
                                                    <th>action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $vueCategorie = viewCategory();
                                                foreach ($vueCategorie as $categorie) {

                                                ?>
                                                    <tr>

                                                        <td class="text-bold-600 pr-0"><img class="rounded-circle mr-1"><input type="text" name="labelle" value="<?= htmlspecialchars($categorie['label']); ?>"></td>

                                                        <td>
                                                            <a href="./categorie/deleteCategorie.php?id=<?= $categorie['id'] ?>">
                                                                <button type="button" class="btn btn-danger mr-1 mb-1">Supprimer</button>
                                                            </a>
                                                            <a href="./categorie/modifCategorie.php?id=<?= $categorie['id'] ?>&labelle=<?= $categorie['label'] ?>">
                                                                <button type="button" class="btn btn-warning mr-1 mb-1">Modifier</button>
                                                                </ </td>
                                                    </tr>
                                                <?php
                                                } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </section>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <!-- END: Content-->
    <?php
        require('./assets/componant/footer.php');
    } else {
        header('location:auth-login.php');
    }

    ?>