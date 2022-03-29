<style>
    .alert{
        border-radius: 5px;
        text-align: center;
    }
</style>
<?php

if (!empty($_GET['success'])) {
    if ($_GET['success'] == "bienvenue") {
?>
        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
            <strong>Bienvenue</strong> Vous pouvez accedez à votre compte en <a href="dashboard.php">cliquant ici.</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    <?php
    } else if ($_GET['success'] == "compteCree") {
    ?>
        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
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
    }elseif($_GET['error'] == "mdpOuMail"){
        ?>
   <div class="alert alert-danger alert-dismissible fade show my-4" role="alert">
           Erreur lors de la connexion, <a href="#signin-modal" data-toggle="modal">veuillez resseayer </a> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php
    }
}
?>




<?php
if (!empty($_GET['true']) && isset($_GET['true'])) {
    if ($_GET['true'] == 'decre') {
?>
        <div class="alert alert-secondary alert-dismissible fade show my-4" role="alert">
            Article supprimer.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    } elseif ($_GET['true'] == 'incre') {
        ?>
        <div class="alert alert-success alert-dismissible fade show my-4" role="alert">
            Article ajouter.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
    }
}

if (!empty($_GET['error']) && isset($_GET['error'])) {
    if ($_GET['error'] == 'erreurChoixAdresse') {
?>
        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
            Veuillez choisir une adresse
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php 

    }
}

if (!empty($_GET['error']) && isset($_GET['error'])) {
    if ($_GET['error'] == 'choisirUnHorraire') {
?>
        <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
            Veuillez choisir un horraire
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

<?php 

    }
}

