<?php

session_start();
if(!empty($_SESSION)){
  
    if (!empty($_GET['id']) && isset($_GET['id'])) {

        require('../assets/componant/co_bdd.php');
        $req = $bdd->prepare("DELETE FROM products WHERE id = :id");
        $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
        $req->execute();
        header('location:../menu.php?success=delete');
    } else {
        header('location:../menu.php');
    }

    // var_dump($_GET); 
}
