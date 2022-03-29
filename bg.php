<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');
require('./assets/componants/barreMenu.php');
$us = voirAdressePrincipalCommande($_SESSION['users']['id'],$_SESSION['adresseEtHorraire']['adresseLivraison']);

$heureDeLivraison = $_SESSION['adresseEtHorraire']['horraire'];
$methodeDeLivraison =$_SESSION['adresseEtHorraire']['methodeDeLivraison']; 
 

$adressConcatener = $us['name'];
$adressConcatener .= ' : ';
$adressConcatener .= $us['address'];
$adressConcatener .= ' ';
$adressConcatener .=  $us['postal'];
$adressConcatener .= ' ';
$adressConcatener .=  $us['city'];

// var_dump($_SESSION);  
if(!empty($_SESSION['promo']) && isset($_SESSION['promo'])){
    $id_promo = $_SESSION['promo']['id'];
}else{
    $id_promo = null;
}

$req = $bdd->prepare('INSERT INTO orders(billingadress,deliveryadress,methodeLivraison,heureLivraison,status,id_users,id_promo) VALUES (:billingadress,:deliveryadress,:methodeLivraison,:heureLivraison,:status,:id_users,:id_promo)');
$insertOrders = $req->execute(array(
    'billingadress' => $adressConcatener,
    'deliveryadress' => $adressConcatener,
    'heureLivraison'=> $heureDeLivraison,
    'methodeLivraison' => $methodeDeLivraison,
    'status' => "Attente",
    'id_users' => $us['id'],
    'id_promo' => $id_promo
));


$lastId = $bdd->lastInsertId();

foreach ($productsDansLePanier as $ProductPanier) {

    $insertOrderLines = $bdd->prepare('INSERT INTO orderslines(name,quantityproducts,price,id_products,id_orders) VALUES (?,?,?,?,?)');

    $insertOrderLines->execute(array(
        $ProductPanier['name'],
        $_SESSION['panier'][$ProductPanier['id']],
        $ProductPanier['price'],
        $ProductPanier['id'],
        $lastId
    ));
}
unset($_SESSION['panier']); 
?>

 <body>
     <h3 class="couleurBlanche">Paiement accepter</h3>
     <script>
         function redir() {
             self.location.href = "./index.php"
         }
         setTimeout(redir, 4000)

       
     </script>
 </body>

 </html>