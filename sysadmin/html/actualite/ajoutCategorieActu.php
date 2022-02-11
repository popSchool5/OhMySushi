<?php
session_start();
if (!empty($_SESSION) && !empty($_GET) && isset($_GET)) {
       
    if(empty(trim($_GET['categorieDesActualie'])) && isset($_GET['categorieDesActualie'])){

        header('location:../categorieActu.php?error=ajoutVide');

    }else{
        require('../assets/componant/co_bdd.php');
        $req = $bdd->prepare('INSERT INTO actucategory(label)
    VALUES(:label)');
        $req->execute(array(
            'label' => $_GET["categorieDesActualie"]
        ));
        header('location:../categorieActu.php?succes=ajout');
    }
 
} else {
    header('location:../index.php');
}
