<?php
session_start();
if (!empty($_GET['id'])) {

    // var_dump($_GET); 
    require('../assets/componant/co_bdd.php');
    $query = 'UPDATE tva SET rate = ? WHERE id = ?';
    $sth = $bdd->prepare($query);
    $sth -> execute(array(
        $_GET["rate"],
        $_GET["id"]
    )); 

    $sth->execute();

   header("location: ../tva.php?success=modifier");
}
