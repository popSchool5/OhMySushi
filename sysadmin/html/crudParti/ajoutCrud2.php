<?php 
session_start();

if (!empty($_SESSION)) {
require('../assets/componant/co_bdd.php');
require('../assets/function/function.php');

    if (!empty($_POST) && isset($_POST)) {
        $remiseAzero = $bdd -> prepare('UPDATE products SET affichageCrud = ?');
        $remiseAzero->execute(array(
           0
        ));

        foreach ($_POST['menu'] as $b) {
            $bg = $bdd->prepare('UPDATE products SET affichageCrud = ? WHERE id = ?');
            $bg->execute(array(
                1,
                $b,
            ));
        }
        header('location: ../crud.php?success=ajout');
    }
}