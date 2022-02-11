<?php
session_start();
if (!empty($_SESSION) && !empty($_POST) && isset($_POST)) {
    require('../assets/componant/co_bdd.php');
    $req = $bdd->prepare('INSERT INTO tva(rate)
    VALUES(:label)');
    $req->execute(array(

        'label' => $_POST["nouvelletva"]
    ));

    header('location:../tva.php?succes=ajout');
} else {
    header('location:../index.php');
}
