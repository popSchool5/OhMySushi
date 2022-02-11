<?php
session_start();
if (!empty($_SESSION)) {
    require('./assets/componant/co_bdd.php');
    require('./assets/function/function.php');
    require('./assets/componant/header.php');
    var_dump($_GET);
?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">

            </div>
            <div class="content-body">
                <section id="form-repeater-wrapper">
                    <!-- form default repeater -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Ajouter une catégorie pour vos actualités
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <form method="GET" action="../html/actualite/ajoutCategorieActu.php" class="form repeater-default">
                                        <div data-repeater-list="group-a">
                                            <div data-repeater-item>
                                                <div class="row justify-content-between">
                                                    <div class="col-md-7 col-sm-12 form-group">
                                                        <label for="categorie">Catégorie </label>
                                                        <input type="text" name="categorieDesActualie" class="form-control" id="categorie" placeholder="Enter une catégorie" minlength="1" required>
                                                    </div>


                                                    <div class="col-md-5 col-sm-12 form-group d-flex            align-items-center pt-2">
                                                        <button type="submit" class="btn btn-primary text-nowrap px-1" data-repeater-delete type="button"> <i class="bx bx-plus"></i>
                                                            Ajouter
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ form default repeater -->
                </section>
                <section id="form-control-repeater">
                    <div class="row">

                        <!-- phone repeater -->

                        <div class="col-xl-12 col-lg -12">
                            <div class="card">
                                <div class="card-header">
                                    <?php
                                    $actuCategorie = viewCategorieActualite();

                                    if (empty($actuCategorie)) {
                                    ?>
                                        <h3>Aucune catégorie, veuillez en ajouter</h3>
                                    <?php
                                    } else {


                                    ?>
                                        <h4 class="card-title">Liste des catégories pour les actualités</h4>
                                </div>
                                <div class="card-body">
                                    <form action="./actualite/modifCategorieActu.php" method="GET" >
                                        <div data-repeater-list="contact">
                                            <div class="row">

                                                <div class="col-md-12 col-12 mb-50">
                                                    <label class="text-nowrap">Les catégories</label>
                                                </div>

                                            </div>
                                            <?php


                                            foreach ($actuCategorie as $categoryActualite) {
                                            ?>
                                                <div class="row justify-content-between" data-repeater-item>
                                                    <div class="col-md-7 col-12 form-group d-flex align-items-center">
                                                        <i class="bx bx-menu mr-1"></i>
                                                        <input type="hidden" name="id" value="<?= $categoryActualite['id'] ?>">
                                                        <input type="text" class="form-control" value="<?= $categoryActualite['label'] ?>" name="label" required minlength="1">
                                                    </div>


                                                    <div class="col-md-5 col-12 form-group">
                                                        <a href="./actualite/modifCategorieActu.php">
                                                            <button class="btn btn-icon btn-warning rounded-circle" type="submit" data-repeater-delete>
                                                                <i class="bx bx-x"></i>
                                                            </button>
                                                        </a>



                                                        <a href="./actualite/deleteCategorieActu.php?id=<?= $categoryActualite['id'] ?>">
                                                            <button class="btn btn-icon btn-danger rounded-circle" type="button" data-repeater-delete>
                                                                <i class="bx bx-x"></i>
                                                            </button>
                                                        </a>

                                                    </div>
                                                </div>
                                    </form>
                            <?php
                                            }
                                        }
                            ?>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                    <!-- /phone repeater -->
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