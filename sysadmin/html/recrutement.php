    <?php
    session_start();
    if (!empty($_SESSION)) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');
        $recruitments = viewRecruitment();
    ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">

                <div class="content-body">
                    <div class="row">
                        <div class="col-12   my-5">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inlineForm">
                                Ajouter un job
                            </button>
                        </div>
                    </div>
                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel33">Ajout d'un nouveau job</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <i class="bx bx-x"></i>
                                    </button>
                                </div>
                                <form method="POST" action="../html/recrutement/ajoutRecrutement.php">
                                    <div class="modal-body">
                                        <label>Titre : </label>
                                        <div class="form-group">
                                            <input type="text" name="titre" placeholder="Titre du job" class="form-control" required>
                                        </div>
                                        <label>Description </label>
                                        <div class="form-group mb-0">
                                            <textarea required class="form-control" name="description" id="" cols="30" rows="10"></textarea>

                                        </div>
                                        <div class="col-12 mt-5">

                                            <fieldset class="form-group" required>
                                                <select name="category" class="custom-select" id="customSelect" required>
                                                    <option selected>Choisir la catégorie :</option>
                                                    <option value="Restaurent">Dans le restaurant</option>
                                                    <option value="Livraison">Livraison</option>
                                                    <option value="Autres">Autres</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="form-group  my-3">
                                            <input type="file" name="images">

                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Fermer</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Enregistrer le job</span>
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
                                            Job ajouter !
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
                                            Job modifier
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
                                            Job supprimer
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
                                            <th>Description</th>

                                            <th>Category</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recruitments as $recruitment) { ?>
                                            <tr>
                                                <td class="text-bold-600 pr-0"><?= $recruitment['name'] ?></td>
                                                <td><?= $recruitment['description'] ?></td>


                                                <td class=""><?= $recruitment['category'] ?></td>
                                                <td>
                                                    <div class="dropdown">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="[data-bg='<?= htmlspecialchars($recruitment['id']) ?>']"><i class="bx bx-edit-alt mr-1"></i> Modifier</a>
                                                            <a class="dropdown-item" href="../html/recrutement/deleteRecrutement.php?id=<?= $recruitment['id'] ?>"><i class="bx bx-trash mr-1"></i> Supprimer</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <div class="modal fade" id="exampleModal" data-bg='<?= htmlspecialchars($recruitment['id']) ?>' tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form method="GET" action="../html/recrutement/modifRecrutement.php?">
                                                        <input type="hidden" name="id" value="<?= $recruitment['id'] ?>">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-dark">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modification du job</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <label>Titre : </label>
                                                                <div class="form-group">
                                                                    <input type="text" name="titre" placeholder="Titre du job" class="form-control" value="<?= htmlspecialchars($recruitment['name']); ?>" required>
                                                                </div>
                                                                <label>Description </label>
                                                                <div class="form-group mb-0">
                                                                    <textarea required class="form-control" name="description" id="" cols="30" rows="10"><?= htmlspecialchars($recruitment['description']) ?></textarea>

                                                                </div>
                                                                <div class="col-12 mt-5">

                                                                    <fieldset class="form-group" required>
                                                                        <select name="category" class="custom-select" id="customSelect" required>
                                                                            <option >Choisir la catégorie :</option>
                                                                            <option <?php if ($recruitment['category'] == "Restaurent") {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo ' ';
                                                                                    } ?> value="Restaurent">Dans le restaurant</option>
                                                                            <option <?php if ($recruitment['category'] == "Livraison") {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo ' ';
                                                                                    } ?> value="Livraison">Livraison</option>
                                                                            <option <?php if ($recruitment['category'] == "Autres") {
                                                                                        echo 'selected';
                                                                                    } else {
                                                                                        echo ' ';
                                                                                    } ?> value="Autres">Autres</option>
                                                                        </select>
                                                                    </fieldset>
                                                                </div>
                                                                <div class="form-group  my-3">
                                                                    <input type="file" name="images">

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                <button type="submit" class="btn btn-primary">Modifier</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
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