<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');
require('./assets/componants/header.php');
require('./assets/componants/barreMenu.php');
$us = viewFullUserAdresse($_SESSION['users']['id']);


$adress = $us['name'];
$adress .= ' : ';
$adress .= $us['address'];
$adress .= ' ';
$adress .=  $us['postal'];
$adress .= ' ';
$adress .=  $us['city'];

$req = $bdd->prepare('INSERT INTO orders(billingadress,deliveryadress,status,id_users) VALUES (:billingadress,:deliveryadress,:status,:id_users)');
$insertOrders = $req->execute(array(
    'billingadress' => $adress,
    'deliveryadress' => $adress,
    'status' => "Attente",
    'id_users' => $us['id']
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
    <h3>Paiement accepter</h3>
    <script>
        function redir() {
            self.location.href = "./index.php"
        }
        setTimeout(redir, 4000)
    </script>
</body>

</html>