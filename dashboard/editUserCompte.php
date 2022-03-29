<?php
session_start();

if (!empty($_SESSION['users'])) {
    require('../assets/php/co_bdd.php');

    if (!empty($_POST)) {
        if (!empty($_GET) && $_GET['q'] === 'info') {


            $requ = $bdd->prepare("SELECT * FROM users WHERE email= ?");
            $requ->execute(array(
                $_POST['email']
            ));
            
            $aa = $requ -> fetch(); 
            
     
            if ($aa) {
                if($_POST['email'] !== $aa['email']){
                    header('location: ../dashboard.php?error=emailerroner');
                    exit();
                }else{
                    $req = $bdd->prepare('UPDATE users SET lastname = ?,firstname=? WHERE id = ?');
                    $req->execute(array(
                        $_POST['lastname'],
                        $_POST['firstname'],
                      
                        $_POST['id']
                    ));
                    header('location: ../dashboard.php?error=emailerroner');
                }
                
                
            } else {
                $req = $bdd->prepare('UPDATE users SET lastname = ?,firstname=?,email = ? WHERE id = ?');
                $req->execute(array(
                    $_POST['lastname'],
                    $_POST['firstname'],
                    $_POST['email'],
                    $_POST['id']
                ));
                header('location: ../dashboard.php?success=infoModifier');
            }
        } elseif (!empty($_GET) && $_GET['q'] === 'password') {
            if($_POST['newpassword'] == $_POST['newpassword2']){
                $req = $bdd -> prepare('UPDATE users set password = ? WHERE id = ?'); 
                $req -> execute(array(
                    password_hash($_POST['newpassword'], PASSWORD_BCRYPT),
                    $_POST['id']
                ));
                header('location: ../dashboard.php?success=password');
            }else{
                header('location: ../dashboard.php?error=passwordidentique'); 
            }
        }
    } else {
        header('location: dashboard.php?error=remplireFormCompte');
    }
} else {
    header('location: index.php?error=connexionManquante');
}



// $req = $bdd->prepare("SELECT * FROM users WHERE email=:email");
// $req->bindValue(':email', $email, PDO::PARAM_STR);
// $req->execute();

// if ($req->rowCount() > 0) {
//     array_push($err['mess'], 'un email est deja enregistrer avec cette email');
//     $err['codeErr'] = 1;
// }
