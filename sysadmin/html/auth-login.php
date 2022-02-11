<?php
session_start();


require('./assets/componant/co_bdd.php');
if (isset($_SESSION['connect'])) {
    header('location: index.php');
    exit();
}
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $email=$_POST['email'];
    $password=$_POST['password'];
    $error=1;

    $req = $bdd->prepare('SELECT * FROM admin WHERE email = ?');
    $req->execute(array(
            $email
    ));

     while ($user = $req->fetch(PDO::FETCH_ASSOC)) {

            
        if (password_verify($password, $user['password'])) {
            $error = 0;
            $_SESSION['connect'] = 1;
            $_SESSION['email']     = $user['email'];
            header('location: index.php?success=1');
            exit();
        }
     }
  
    
}

    ?>


    <!DOCTYPE html>
    <html class="loading" lang="fr" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Oh My Sushi</title>
        <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
        <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <!-- END: Custom CSS-->

    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>

            <div class="content-wrapper">
                <div class="content-header row">
                </div>


                <div class="content-body">
                    <!-- login page start -->
                    <section id="auth-login" class="row flexbox-container">
                        <div class="col-xl-8 col-11">
                            <div class="card bg-authentication mb-0">
                                <div class="row m-0">
                                    <!-- left section-login -->
                                    <div class="col-md-6 col-12 px-0">
                                        <div class="card disable-rounded-right mb-0 p-2 h-100 d-flex justify-content-center">
                                            <?php if (isset($_GET) && !empty($_GET)) { ?>
                                                <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                                    <strong>Probleme de mot de passe ou d'email </strong>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php } ?>
                                            <div class="card-header pb-1">
                                                <div class="card-title">
                                                    <h4 class="text-center mb-2">Bienvenue</h4>
                                                </div>
                                            </div>
                                            <div class="card-body">

                                                <div class="divider">
                                                    <div class="divider-text text-uppercase text-muted"><small>Connexion</small>
                                                    </div>
                                                </div>
                                                <form method="POST" action="auth-login.php">
                                                    <div class="form-group mb-50">
                                                        <label class="text-bold-600" for="exampleInputEmail1">Adresse Mail</label>
                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="xxx@xxx.xx">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="text-bold-600" for="exampleInputPassword1">Mot de passe</label>
                                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="*****">
                                                    </div>

                                                    <button type="submit" class="btn btn-primary glow w-100 position-relative">Connexion<i id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                                                </form>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- right section image -->
                                    <div class="col-md-6 d-md-block d-none text-center align-self-center p-3">
                                        <img class="img-fluid" src="../app-assets/images/pages/login/sushi2.jfif" alt="logo sushi">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- login page ends -->

                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Vendor JS-->
        <script src="../app-assets/vendors/js/vendors.min.js"></script>
        <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
        <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
        <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="../app-assets/js/core/app-menu.js"></script>
        <script src="../app-assets/js/core/app.js"></script>
        <script src="../app-assets/js/scripts/components.js"></script>
        <script src="../app-assets/js/scripts/footer.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <!-- END: Page JS-->

    </body>
    <!-- END: Body-->

    </html>
