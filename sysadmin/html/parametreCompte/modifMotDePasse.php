<?php

session_start();

require('../assets/componant/co_bdd.php');
if (!empty($_SESSION)) {

    $bg = $bdd->prepare("SELECT * FROM admin WHERE id = ?");
    $bg->execute(array($_POST['id']));

    $bgbg = $bg->fetch();

    if (password_verify($_POST['password'], $bgbg['password'])) {

        if (isset($_POST['newpassword']) && !empty($_POST["newpassword"])) {

            if ($_POST["newpassword"] == $_POST['newpassword2']) {
                $req = $bdd->prepare("UPDATE admin SET password =:password WHERE id = :id");
                $req->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
                $req->bindValue(':password', password_hash($_POST['newpassword'], PASSWORD_BCRYPT), PDO::PARAM_STR);
                $execute = $req->execute();

                if ($execute) {
                    header("Location: ../page-account-settings.php?success=updatePassword");
                }
            } else {
                header("Location: ../page-account-settings.php?error=passIde");
            }
        }
    } else {
        header("Location: ../page-account-settings.php?error=passNconforme");
    }
}
