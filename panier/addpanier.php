<?php
require('../assets/php/co_bdd.php');
require('../assets/php/function.php');
require('./Panier.php');

$products = products();
$panier = new Panier();
$json = array('error' => true);

if (isset($_GET['id'])) {
    $voirArticle = viewArticleExiste($_GET['id']);
    if (empty($voirArticle)) {
        $json['message'] = 'Le produit existe pas';
        // header('location: ../404.php');
    }

    $panier->add($voirArticle);

    $ids = array_keys($_SESSION['panier']);
    if (empty($ids)) {
        $productsDansLePanier = [];
    } else {
        $productsDansLePanier = viewPanierArticle($ids);
    }

    
    $json['message'] = 'Le produit etait ajouter ';
    $json['error'] = false;
    $json['total'] = $panier->total();
    $json['count'] = $panier->count();
    $json['compteParProduit'] = $_SESSION['panier'][$_GET['id']];
    ob_start();
    include '../assets/componants/panierDropdown.php';
    $json['panierDropdown'] = ob_get_clean();
    ob_start();
    include '../assets/componants/panierMobileDropdown.php';
    $json['panierMobileDropdown'] = ob_get_clean();
} else {
    echo "vous n'avzea pas selectionner de produit ajouter au panier ";
}
echo json_encode($json);
