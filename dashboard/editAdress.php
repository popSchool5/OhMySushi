<?php
session_start();

if (!empty($_SESSION['users'])) {
    require('../assets/php/co_bdd.php');

    if (!empty($_POST)) {
        if (!empty($_GET) && $_GET['prio'] === 'principal') {
            $req = $bdd->prepare('INSERT INTO adress(name,company,address,postal,city,phone,priorite,id_users)VALUES (:name,:company,:address,:postal,:city,:phone,:priorite,:id_users)');
            $req->execute(array(
                'name' => $_POST["name"],
                'company' => $_POST["company"],
                'address' => $_POST["address"],
                'city' => $_POST["city"],
                'postal' => $_POST["postal"],
                'phone' => $_POST["phone"],
                'priorite' => $_GET['prio'],
                'id_users' => $_POST['id']
            ));
            if($_POST['chemin'] == "adresseFacturation" && !empty($_POST['chemin'])){
                header('location: ../adresseDeFacturation.php?success=AdressAjouter');

            }else{
                header('location: ../dashboard.php?success=AdressAjouter');
 
            }
            
        } elseif (!empty($_GET) && $_GET['prio'] === 'secondaire') {
            $req = $bdd->prepare('INSERT INTO adress(name,company,address,postal,city,phone,priorite,id_users)VALUES (:name,:company,:address,:postal,:city,:phone,:priorite,:id_users)');
            $req->execute(array(
                'name' => $_POST["name"],
                'company' => $_POST["company"],
                'address' => $_POST["address"],
                'city' => $_POST["city"],
                'postal' => $_POST["postal"],
                'phone' => $_POST["phone"],
                'priorite' => $_GET['prio'],
                'id_users' => $_POST['id']
            ));
            header('location: ../dashboard.php?success=AdressSecondaireAjouter');
        }
    } else {
        header('location: ../dashboard.php?error=remplireFormAddresse');
    }
} else {
    header('location: ../index.php?error=connexionManquante');
}
