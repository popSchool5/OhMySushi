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
                        <h5 class="content-header-title float-left pr-1 mb-0">Paramétrage du compte</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="index.php"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active"> Page paramétrage du compte
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- account setting page start -->
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <!-- left menu section -->
                                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                                    <ul class="nav nav-pills flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                                <i class="bx bx-cog"></i>
                                                <span>Géneral</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                                <i class="bx bx-lock"></i>
                                                <span>Changer votre mot de passe</span>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill" href="#account-vertical-info" aria-expanded="false">
                                                <i class="bx bx-info-circle"></i>
                                                <span>Info</span>
                                            </a>
                                        </li> -->
                                        <!-- <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false">
                                                <i class="bx bxl-twitch"></i>
                                                <span>Social links</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-connections" data-toggle="pill" href="#account-vertical-connections" aria-expanded="false">
                                                <i class="bx bx-link"></i>
                                                <span>Connections</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center" id="account-pill-notifications" data-toggle="pill" href="#account-vertical-notifications" aria-expanded="false">
                                                <i class="bx bx-bell"></i>
                                                <span>Notifications</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </div>
                                <!-- right content section -->
                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                                    <?php
                                                    if (!empty($_GET['success']) && $_GET['success'] == "update") {
                                                    ?>
                                                        <div class="alert alert-success alert-dismissible fade show w-100" role="alert">
                                                            <strong>Mise a jour</strong>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                    <?php
                                                    }


                                                    ?>
                                                    <form method="GET" action="./parametreCompte/modifCompte.php">
                                                        <?php $req = viewAdmin();

                                                        foreach ($req as $admin) {

                                                        ?>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="hidden" name="id" value="<?= htmlspecialchars($admin['id']) ?>">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Prénom</label>
                                                                            <input type="text" class="form-control" placeholder="Username" value="<?= htmlspecialchars($admin['username']) ?>" name="username" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Non</label>
                                                                            <input type="text" class="form-control" placeholder="Name" value="<?= htmlspecialchars($admin['name']) ?>" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>E-mail</label>
                                                                            <input type="email" class="form-control" placeholder="Email" value="<?= htmlspecialchars($admin['email']) ?>" name="email" required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label>Entreprise</label>
                                                                        <input type="text" name="company" class="form-control" value="<?= htmlspecialchars($admin['company']) ?>" placeholder="Nom de votre entreprise" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                    <button type="submit" class="btn btn-primary  mr-sm-1 mb-1">Enregistrer</button>
                                                                    <button type="reset" class="btn btn-light mb-1">Annuler</button>
                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                    </form>
                                                </div>
                                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">

                                                    <form action="./parametreCompte/modifMotDePasse.php" method="POST">

                                                        <?php foreach ($req as $admin) { ?>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <input type="hidden" name="id" value="<?= $admin['id'] ?>">

                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Mot de passe actuel</label>
                                                                            <input type="password" class="form-control" placeholder="Mot de passe actuel" name="password" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Nouveau mot de passe</label>
                                                                            <input type="password" class="form-control" placeholder="Nouveau mot de passe" id="account-new-password" name="newpassword" required minlength="6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <div class="controls">
                                                                            <label>Retaper votre nouveau mot de passe</label>
                                                                            <input type="password" class="form-control" data-validation-match-match="password" placeholder="Retaper votre nouveau mot de passe" name="newpassword2" required minlength="6">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                                    <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1">Enregistrer
                                                                    </button>
                                                                    <button type="reset" class="btn btn-light mb-1">Annuler</button>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- account setting page ends -->

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