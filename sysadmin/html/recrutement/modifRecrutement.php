<?php
session_start();
if (!empty($_GET)) {

     require('../assets/componant/co_bdd.php');
     $query = 'UPDATE recruitment SET name = :name,description = :description , category = :category WHERE id = :id';
     $sth = $bdd->prepare($query);
     $sth->bindValue(":name", $_GET["titre"], PDO::PARAM_STR);
     $sth->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
     $sth->bindValue(":description", $_GET["description"], PDO::PARAM_STR);
    $sth->bindValue(":category", $_GET["category"], PDO::PARAM_STR);
    
     $sth->execute();

     header("Location: ../recrutement.php?success=modifier");
    //  var_dump($_GET);
}else{
    header('location: ../recrutement.php'); 
}
