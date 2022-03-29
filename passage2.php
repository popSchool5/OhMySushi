<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

// var_dump($_SESSION); 
// var_dump($_POST); 
if (!empty($_SESSION['users']) && isset($_SESSION['users'])) {
    if (!empty($_POST['adresseDeLivraisonChoisie'])) {


        if (!empty($_POST['adresseDeLivraisonChoisie']) && isset($_POST['adresseDeLivraisonChoisie'])) {
            $_SESSION['adresseEtHorraire']['adresseLivraison'] = $_POST['adresseDeLivraisonChoisie'];
            header('location: choixDeLivraison.php'); 
            exit(); 
           
        }
    } else {
        header('location: adresseDeFacturation.php?error=erreurChoixAdresse');
    }
} else {
    header('location: login.php');
}
