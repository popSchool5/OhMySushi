<?php
session_start();
require('../assets/componant/co_bdd.php');
if (!empty($_GET['id']) && !empty($_SESSION)) {

    if ($_GET['next'] == 'preparation') {
        $sth = $bdd->prepare('UPDATE orders SET status = ? WHERE id = ?');
        $sth->execute([
            'Préparation',
            $_GET['id']
        ]);

        header("Location: ../commande.php");
    }elseif($_GET['next'] == 'route'){
        $sth = $bdd->prepare('UPDATE orders SET status = ? WHERE id = ?');
        $sth->execute([
            'Préte',
            $_GET['id']
        ]);

        header("Location: ../commande.php");
    }
}
