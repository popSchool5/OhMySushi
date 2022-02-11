<?php
session_start();
if (!empty($_GET)) {

    // require('../assets/componant/co_bdd.php');
    // $query = 'UPDATE actucategory SET label = :label WHERE id = :id';
    // $sth = $bdd->prepare($query);
    // $sth->bindValue(":label", $_GET["label"], PDO::PARAM_STR);
    // $sth->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
  
  
    // $sth->execute();

    // header("Location: ../categoryActu.php?success=modifier");
      var_dump($_GET);
} else {
    header('location: ../categoryActu.php');
}
