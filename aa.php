<?php

if (!empty($_GET['success'])) {
    if ($_GET['success'] == "bienvenue") {
?>
        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
            <strong>Bienvenue</strong> Vous pouvez accedez à votre compte en <a href="dashboard.php">cliquant ici.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    } else if ($_GET['success'] == "compteCree") {
    ?>
        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
            <strong>Bienvenue</strong> Vous pouvez accedez à votre compte en <a href="dashboard.php">cliquant ici.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    } elseif ($_GET['success'] == 'AdressAjouter') {
    ?>


        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
            Adresse ajouter avec succés .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    } elseif ($_GET['success'] == 'deleteAdress') {
    ?>


        <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
            Adresse Supprimer .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    } elseif ($_GET['success'] == 'infoModifier') {
    ?>


        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
            Vos informations on etait modifier
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    } elseif ($_GET['success'] == 'password') {
    ?>


        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
           Votre mot de passe est modifier.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


    <?php
    }
} elseif (!empty($_GET['error'])) {
    if ($_GET['error'] == "existeCompte") {
    ?>
        <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
            L'adresse email existe déjà
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php
    }
}
?>