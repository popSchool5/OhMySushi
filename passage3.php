<?php
session_start(); 
// var_dump($_POST);

// var_dump($_SESSION); 


require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

if (!empty($_SESSION['users']) && isset($_SESSION['users'])) {
    if (!empty($_POST['horraire'])) {


        if (!empty($_POST['horraire']) && isset($_POST['horraire'])) {
            $_SESSION['adresseEtHorraire']['horraire'] = $_POST['horraire'];
            $_SESSION['adresseEtHorraire']['methodeDeLivraison'] = $_POST['methodeDeLivraisonChoisis']; 
            header('location: bg.php'); 
            exit(); 
           
        }
    } else {
        header('location: choixDeLivraison2.php?error=choisirUnHorraire');
    }
} else {
    header('location: login.php');
}
