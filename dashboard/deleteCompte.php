<?php

session_start();
if (!empty($_GET['id'])) {

    require('../assets/php/co_bdd.php');
    $req = $bdd->prepare("DELETE FROM users WHERE id = :id");
    $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    header('location:../assets/componants/deconnexion.php');
}
