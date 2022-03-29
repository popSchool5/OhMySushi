<?php
session_start();
if (!empty($_GET)) {

    $p = $_GET['productid'];
    
    $bg = $_SESSION['panier'][$p]; 

   

        if ($_GET['action'] == "plus") {

            $p = $_GET['productid'];
            if (!isset($_SESSION['panier'][$p])) {
                echo 'bg';
                exit();
            }


            if (isset($_SESSION['panier'][$p])) {
                $_SESSION['panier'][$p]++;
                header('location: ../cart.php?true=incre');
            }
        } else if ($_GET['action'] == "moins") {
            $p = $_GET['productid'];
            $_SESSION['panier'][$p]--;
            if($_SESSION['panier'][$p] <= 0){
               header('location: ./delpanier.php?del='.$p); 
            }else{
            header('location: ../cart.php?true=decre');

            }
        }
    
    
} else {
    header('location: ../cart.php');
}
