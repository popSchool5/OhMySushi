<?php
session_start();
if (!empty($_GET)) {

    require('../assets/componant/co_bdd.php');
    $query = 'UPDATE promo SET name = :name,amount = :amount , duree = :duree WHERE id = :id';
    $sth = $bdd->prepare($query);
    $sth->bindValue(":name", $_GET["name"], PDO::PARAM_STR);
    $sth->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
    $sth->bindValue(":amount", $_GET["amount"], PDO::PARAM_STR);
    $sth->bindValue(":duree", $_GET["duree"], PDO::PARAM_INT);

    $sth->execute();

    header("Location: ../promo.php?success=modifier");
    //  var_dump($_GET);
} else {
    header('location: ../promo.php');
}
