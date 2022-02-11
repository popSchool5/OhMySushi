<?php
require('../assets/componant/co_bdd.php');

viewOrdersNouveau();

function viewOrdersNouveau()
{
    global $bdd;
    $req = $bdd->prepare("SELECT orders.*,users.id uid,users.lastname,users.firstname,users.email FROM orders INNER JOIN users ON users.id = orders.id_users WHERE status = ? ORDER BY orderdate ASC");
    $req->execute(
        array(
            'Attente'
        )
    );
    foreach($req->fetchAll() as $order)
    {
        $orders[$order['id']] = $order; 
    }
    // echo json_encode($orders);

    $req = $bdd ->prepare('SELECT * FROM orderslines WHERE id_orders IN (SELECT id FROM orders WHERE status = ?)');
    $req->execute(
        array(
            'Attente'
        )
    );
    foreach ($req->fetchAll() as $orderline) {
        $orders[$orderline['id_orders']]['orderlines'][] = $orderline;
    }
    echo json_encode(array_values($orders)); 

    
}
