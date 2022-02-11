<?php
session_start();
if (!empty($_GET['id']) && !empty($_SESSION['users'])) {
    
        require('../assets/php/co_bdd.php');
        
        if(!empty($_GET['prio']) && $_GET['prio'] == "principal"){

            $req = $bdd->prepare("DELETE FROM adress WHERE id_users = :id AND adress.priorite = :priorite");
            $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
            $req->bindValue(":priorite", $_GET['prio'], PDO::PARAM_STR);
            $req->execute();
            header('location:' . $_SERVER['HTTP_REFERER'] . '?success=deleteAdress');

        } else if(!empty($_GET['prio']) && $_GET['prio'] == "secondaire"){

            $req = $bdd->prepare("DELETE FROM adress WHERE id_users = :id AND adress.priorite = :priorite");
            $req->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
            $req->bindValue(":priorite", $_GET['prio'], PDO::PARAM_STR);
            $req->execute();
            header('location:' . $_SERVER['HTTP_REFERER'] . '?success=deleteAdress');

        }else{
            header('location: dashboard.php');
        }
}
