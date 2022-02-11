<?php

session_start();
if (!empty($_GET['id'])) {

    require('../assets/componant/co_bdd.php');
    $remiseAzero = $bdd->prepare('UPDATE products SET affichageCrud = ?');
    $remiseAzero->execute(array(
        0
    ));

    $req = $bdd->prepare("DELETE FROM accueilcrud WHERE id = :id");
    $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    header('location:../crud.php?success=delete');
}
