<?php
session_start();

require('../assets/php/co_bdd.php');
require('../assets/php/function.php');
require('./Panier.php');
$panier = new Panier();


$ids = array_keys($_SESSION['panier']);

$productsDansLePanier = viewPanierArticle($ids);


if(isset($_GET['del'])){
    $panier -> del($_GET['del']);
    header('location:../cart.php?true=decre'); 
}
