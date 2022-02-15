<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

$sucre = (isset($_POST['sauce_sucre'])) ? true : false;
$sale = (isset($_POST['sauce_sale'])) ? true : false;
$wasabi = (isset($_POST['sauce_wasabi'])) ? true : false;
$nem = (isset($_POST['sauce_nem'])) ? true : false;
$gingembre = (isset($_POST['sauce_gingembre'])) ? true : false;

$_SESSION['sauce'] = ["sucre" => $sucre, "sale" => $sale, "wasabi" => $wasabi, "nem" => $nem, "gingembre" => $gingembre];
$_SESSION['couvert'] = ["couvert" => $_POST['couvert'], "baguette" => $_POST['baguette']];


if(!empty($_SESSION['users']) && isset($_SESSION['users'])){

    header('location: adresseDeFacturation.php'); 

}else{
    header('location: connexion.php'); 
}