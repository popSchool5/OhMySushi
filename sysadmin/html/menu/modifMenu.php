<?php
session_start();

    
    require('../assets/componant/co_bdd.php');


    updateMenuStock();
    function updateMenuStock()
    {
        global $bdd;
        if (!array_key_exists('stock', $_POST)) {
            echo 'ta emre ';
            return;
        }
        $stock = $_POST['stock'];
        $id = $_POST['id']; 

        $req = $bdd->prepare('UPDATE products SET stoc = ? WHERE id = ?');
        $req->execute(array(
            $stock, 
            $id
        ));
    }


