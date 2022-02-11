    <?php
    session_start();
    if (!empty($_SESSION)) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');
        $promos = viewCrudAccueil();
  
    ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">

                <div class="content-body">
                    <div class="row">
                        <div class="col-12   my-5">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inlineForm">
                                Ajout d'une nouvelle partie
                            </button>
                        </div>
                    </div>
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Ajout d'une nouvelle partie </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                                <form method="POST" action="../html/crudParti/ajoutCrud.php" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label>Titre : </label>
                                            <input type="text" name="titreimage" placeholder="Titre" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Texte : </label>
                                            <input type="text" name="texteimage" placeholder="Texte" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Image : </label>
                                            <input type="file" name="images" class="form-control" required>
                                        </div>

                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Fermer</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Passer a la liste des produits</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="messageErreur">
                        <?php if (!empty($_GET['success'])) {
                            if ($_GET['success'] == 'ajout') {
                        ?>
                                <div class="alert bg-rgba-info alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-heart"></i>
                                        <span>
                                            Section ajouter !
                                        </span>
                                    </div>
                                </div>

                            <?php
                            } elseif ($_GET['success'] == 'modifier') {
                            ?>
                                <div class="alert bg-rgba-secondary alert-dismissible mb-0" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-star"></i>
                                        <span>
                                            Promo modifier
                                        </span>
                                    </div>
                                </div>
                            <?php
                            } elseif ($_GET['success'] == 'delete') {
                            ?>
                                <div class="alert bg-rgba-danger alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-error"></i>
                                        <span>
                                            Section supprimer
                                        </span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>

                    <section id="table-success col-12">
                        <div class="card">
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="table-extended-success" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Titre</th>
                                            <th>Texte </th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($promos as $promo) { ?>
                                            <tr>
                                                <td class="text-bold-600 pr-0"><?= $promo['titre'] ?></td>
                                                <td><?= $promo['texte'] ?> </td>



                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">

                                                            <a class="dropdown-item" href="../html/crudParti/deleteCrud.php?id=<?= $promo['id'] ?>"><i class="bx bx-trash mr-1"></i> Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>



                            </div>

                        <?php } ?>
                        </tbody>
                        </table>
                        </div>
                        <!-- datatable ends -->
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