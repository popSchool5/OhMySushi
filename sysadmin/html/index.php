<?php
session_start();
if (!empty($_SESSION)) {
    require('./assets/componant/co_bdd.php');
    require('./assets/function/function.php');

?>

    <!-- BEGIN: Content-->
    <?php
    require('./assets/componant/header.php');
    ?>
    <div class="app-content content">
        <div class="content-area-wrapper">
            
        </div>
    </div>

    <!-- END: Content-->

<?php
    require('./assets/componant/footer.php');
} else {
    header('location:auth-login.php');
}

?>