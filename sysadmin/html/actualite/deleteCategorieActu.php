<?php

session_start();
if (!empty($_GET['id'])) {

    require('../assets/componant/co_bdd.php');
    $req = $bdd->prepare("DELETE FROM actucategory WHERE id = :id");
    $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    header('location:../categorieActu.php?success=delete');
}
