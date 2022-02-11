<?php
session_start();
if (!empty($_SESSION)) {
    require('./assets/componant/co_bdd.php');
    require('./assets/function/function.php');
    require('./assets/componant/header.php');

    if (!empty($_GET['id']) && isset($_GET['id'])) {
        $req = $bdd->prepare("SELECT actualites.id, actualites.name,actualites.description,actualites.image,actucategory.label FROM actualites left JOIN actucategory ON actualites.id_category =actucategory.id  WHERE actualites.id = ?");
        $req->execute(array(
            $_GET['id']
        ));
        $requete = $req->fetchAll();
    }
?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Knowledge base question Content start -->
                <section class="kb-question">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="card">
                                <?php foreach ($requete as $r) { ?>


                                    <div class="card-body">
                                        <div class="title mb-2">
                                            <h2 class="kb-title"><?= $r['name'] ?></h2>
                                        </div>
                                        <p>
                                            <?= $r['description'] ?>
                                        </p>
                                        <div class="image">
                                            <img src="./assets/uploads/<?= $r['image'] ?>" alt="">
                                        </div>


                                    </div>

                            </div>
                            <a href="./actualite/deleteActu.php?id=<?= $r['id'] ?>">
                                <button type="button" class="btn btn-danger glow mr-1 mb-1">Supprimer</button>
                            </a>
                            <a href="./modifActu.php?id=<?= $r['id'] ?>">
                                <button type="button" class="btn btn-warning glow mr-1 mb-1">Modifier</button>
                            </a>
                        <?php   } ?>
                        </div>
                    </div>
                </section>
                <!-- Knowledge base question Content ends -->

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