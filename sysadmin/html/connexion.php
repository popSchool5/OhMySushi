<?php
session_start();
require('co_bdd.php');

if (isset($_SESSION['connect'])) {
    header('location: admin.php');
    exit();
}



// CONNEXION
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    // VARIABLES
    $email         = $_POST['email'];
    $password     = $_POST['password'];
    $error        = 1;



    $req = $bdd->prepare('SELECT * FROM admin WHERE email = ?');
    $req->execute(array($email));

    while ($user = $req->fetch()) {

        if (password_verify($password, $user['password'])) {
            $error = 0;
            $_SESSION['connect'] = 1;
            $_SESSION['email']   = $user['email'];

            header('location: index.php?success=1');
            exit();
        }
    }
    if ($error == 1) {
        header('location: index.php?error=1');
        exit();
    }
}
?>


<div class="login-page">
    <div class="form">
        <form action="index.php" method="POST" class="register-form">
            <input type="text" placeholder="name" />
            <input type="password" placeholder="password" />
            <input type="text" placeholder="email address" />
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>
        <form method="POST" action="index.php" class="login-form">
            <input type="email" name="email" placeholder="username" />
            <input type="password" name="password" placeholder="password" />
            <button type="submit">Connexion</button>

        </form>
    </div>
</div>
