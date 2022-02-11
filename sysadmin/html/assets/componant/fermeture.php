<?php 
session_start();
require('./co_bdd.php');
if(!empty($_SESSION)){
    if(isset($_GET) && $_GET['magasin']== 'fermer'){
        $fermerMagasin = $bdd -> prepare('UPDATE settings SET cle=?,valeur=?'); 
        $fermerMagasin -> execute(array(
            "magasin", 
            "fermer"
        ));
        header('location: ../../index.php');
    }
    elseif (isset($_GET) && $_GET['magasin'] == 'ouvert') {
        $fermerMagasin = $bdd->prepare('UPDATE settings SET cle=?,valeur=?');
        $fermerMagasin->execute(array(
            "magasin",
            "ouvert"
        ));
        header('location: ../../index.php');

    }
}