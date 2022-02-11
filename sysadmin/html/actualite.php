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
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Actualités</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Actualités</a>
                                </li>
                                <li class="breadcrumb-item active">Les actualités
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Knowledge base categories Content start  -->
                <section class="kb-categories">
                    <div class="bg">
                        <div class="row">
                            <!-- left side menubar section -->
                            <div class="col-md-2">
                                <?php
                                $actus = viewActualites();
                                $categorys = viewCategorieActualite();

                                ?>
                                <style>
                                    @media screen and (max-width: 580px) {
                                        .kb-sidebar .list-unstyled {
                                            display: flex;
                                            flex-direction: row;
                                            flex-wrap: wrap;

                                        }

                                        .kb-sidebar .list-unstyled li {
                                            padding: 1rem;

                                        }
                                    }
                                </style>
                                <div class="kb-sidebar">
                                    <h6 class="mb-2">Catégories</h6>
                                    <ul class="list-unstyled">
                                        <li class="mb-1"><a href="javascript:void(0)" class="kb-effect">Toutes</a></li>

                                        <?php
                                        foreach ($categorys as $category) {
                                        ?>
                                            <li class="mb-1"><a href="javascript:void(0)" class="text-muted kb-effect"><?= $category['label'] ?></a></li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                            <!-- right side section -->
                            <div class="col-md-9">
                                <a href="./addActualite.php">
                                    <button class="btn btn-success" type="submit">Ajouter une actualité</button>
                                </a>

                                <div class="row match-height">
                                    <?php foreach ($actus as $actu) {


                                        $Resume = extrait($actu['description']);

                                    ?>
                                      
                                            <div class="col-lg-5 col-sm-8">
                                                <div class="card mt-4">
                                                    <a href="./detailActu.php?id=<?= $actu['id']; ?>">
                                                        <div class="card-body">

                                                            <h5 class="card-title"><?= $actu['name'] ?></h5>
                                                            <span>categorie : <?= $actu['label']; ?></span>
                                                            <hr>
                                                            <p class="card-text text-muted kb-ellipsis"><?= $Resume ?>...</p>
                                                            <a href="./actualite/deleteActu.php?id=<?= $actu['id'] ?>">
                                                                <button class="btn btn-danger glow mr-1 mb-2 mt-2" type="submit">Supprimer</button>
                                                            </a>
                                                            <a href="./modifActu.php?id=<?= $actu['id'] ?>">
                                                                <button class="btn btn-warning glow mr-1 mb-2 mt-2" type="submit">Modifier</button>
                                                            </a>

                                                        </div>
                                                    </a>
                                                </div>
                                            </div>

                                        <?php
                                    } ?>

                                </div>


                            </div>
                            <div class="kb-overlay"></div>
                        </div>
                    </div>
                </section>
                <!-- Knowledge base categories Content ends -->

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