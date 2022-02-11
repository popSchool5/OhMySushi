<?php
session_start(); 
if(!empty($_GET) && isset($_GET)){

    require('../assets/componant/co_bdd.php');

    $query = 'UPDATE admin SET name=:name,username = :username,company=:company, email=:email WHERE id = :id';
    $sth = $bdd->prepare($query);

    $name = trim($_GET["name"]); 
    $username = trim($_GET["username"]);
    $email = trim($_GET["email"]);
    $company = trim($_GET["company"]);

    $sth->bindValue(":name", $name, PDO::PARAM_STR);
    $sth->bindValue(":username", $username, PDO::PARAM_STR);
    $sth->bindValue(":email", $email, PDO::PARAM_STR);
    $sth->bindValue(":company", $company, PDO::PARAM_STR);
    $sth->bindValue(":id", $_GET["id"], PDO::PARAM_INT);
    $sth->execute();
    header("Location: ../page-account-settings.php?success=update");

}else{
    header("Location: ../page-account-settings.php?error=update");
}