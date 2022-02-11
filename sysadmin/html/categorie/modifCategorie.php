<?php
session_start();
if (!empty($_GET['id']) && !empty($_SESSION)) {
    
    require('../assets/componant/co_bdd.php');
    $query = 'UPDATE category SET label = :libelle WHERE id = :id';
    $sth = $bdd->prepare($query);
    $sth->bindValue(":libelle", $_GET["labelle"], PDO::PARAM_STR);
    $sth->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
    $sth->execute();

    header("Location: ../categorie.php?catModifier");
}
