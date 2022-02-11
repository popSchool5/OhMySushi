<?php
session_start();

if (!empty($_SESSION)) {
    if (!empty($_GET['id']) && isset($_GET['id'])) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');

        $req = $bdd->prepare('SELECT actualites.id, actualites.name,actualites.description,actualites.image,actucategory.label FROM actualites INNER JOIN actucategory ON actucategory.id = actualites.id_category WHERE actualites.id = ?');
        $req->execute(array($_GET['id']));
        $requete = $req->fetchAll();
    }


?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- actu edit start -->
                <section class="users-edit">
                    <div class="card">
                        <div class="card-body">

                            <div class="tab-content">

                                <!-- actu edit start -->
                                <?php foreach ($requete as $r) {
                                ?>
                                    <form method="POST" action="../html/actualite/modifActu2.php" class="form-validate" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-12 col-sm-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label>Titre</label>
                                                        <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                                        <input type="text" class="form-control" placeholder="Titre" value="<?= $r['name'] ?>" name="titre">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Description</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <fieldset class="form-group">
                                                                        <textarea class="form-control" id="basicTextarea" name="description" id="" rows="10"><?= $r['description'] ?></textarea>

                                                                    </fieldset>
                                                                </div>
                                                            </div>
                                                            <?php $selected = $r['label']; ?>
                                                            <div class="form-group">

                                                                <select name="categorie" class="select select2 form-control">

                                                                    <?php $categories = viewCategorieActualite();

                                                                    foreach ($categories as $categorie) {
                                                                        // var_dump($categorie);
                                                                    ?>

                                                                        <option <?php if ($selected === $categorie['label']) {
                                                                                    echo 'selected';
                                                                                } ?> value="<?= $categorie['id'] ?>"><?= htmlspecialchars($categorie['label']) ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>


                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <input value="<?= $r['image'] ?>" type="file" name="images">
                                                </div>

                                            </div>

                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Enregistrer</button>
                                                <button type="reset" class="btn btn-light">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
                                <!-- actu edit ends -->
                            </div>

                        </div>
                    </div>
            </div>
            </section>
            <!-- actu edit ends -->

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