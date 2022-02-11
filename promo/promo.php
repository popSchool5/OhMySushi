<?php 
session_start();

require('../assets/php/co_bdd.php');
require('../assets/php/function.php');
require('../panier/Panier.php'); 
$panier = new Panier(); 

// $req = $bdd -> prepare("SELECT * FROM promo WHERE name = ?"); 

// $req -> execute(array(
//     $_POST['promo']
// )); 

// $existeOuNonLaPromo = $req -> fetch();


// if($existeOuNonLaPromo){

//     $total = 0;
//     $ids = array_keys($_SESSION['panier']);
//     if (empty($ids)) {
//         $productsDansLePanier = [];
//     } else {
//         $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id IN (" . implode(',', $ids) . ") ");
//         $req->execute(array());
//         $productsDansLePanier = $req->fetchAll();
//     }
//     foreach ($productsDansLePanier as $product) {
//         $total += $product['price'] * $_SESSION['panier'][$product['id']];
//         $total = $total * (1 - $existeOuNonLaPromo['amount'] / 100); 
//     }
  
//     header('location: ../cart.php?success=codevalide');
// }else{

//     header('location: ../cart.php?error=codeInvalide');

// }


var_dump( $panier->totalApresPromo($_POST['promo']));

