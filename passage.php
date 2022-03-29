<?php
session_start();
require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');

$sucre = (isset($_POST['sauce_sucre'])) ? 1 : 0;
$sale = (isset($_POST['sauce_sale'])) ? 1 : 0;
$wasabi = (isset($_POST['sauce_wasabi'])) ? 1 : 0;
$nem = (isset($_POST['sauce_nem'])) ? 1 : 0;
$gingembre = (isset($_POST['sauce_gingembre'])) ? 1 : 0;

$_SESSION['sauce'] = ["sucre" => $sucre, "sale" => $sale, "wasabi" => $wasabi, "nem" => $nem, "gingembre" => $gingembre];
$_SESSION['couvert'] = ["couvert" => $_POST['couvert'], "baguette" => $_POST['baguette']];


if(!empty($_SESSION['users']) && isset($_SESSION['users'])){

    header('location: adresseDeFacturation.php'); 

}else{
    header('location: login.php'); 
}