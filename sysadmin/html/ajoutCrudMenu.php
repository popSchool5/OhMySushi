    <?php
    session_start();
    if (!empty($_SESSION)) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');
        $menu = viewMenuModificationCrudIndex();

    ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
        <h4>Listes des produits à ajouter </h4>
                <div class="content-body">
                    <form method="POST" action="../html/crudParti/ajoutCrud2.php" enctype="multipart/form-data">
                        <div class="modal-body">


                            <div class="form-group">

                                <?php foreach ($menu as $m) { ?>

                                    <input type="checkbox" id="<?= $m['name'] ?>" name="menu[]" value="<?= $m['id'] ?>">
                                    <label for="<?= $m['name'] ?>"><?= $m['name'] ?></label><br>

                                <?php } ?>
                            </div>
                            <input type="submit">


                        </div>

                    </form>



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