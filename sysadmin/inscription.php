<?php

require('./co_bdd.php');


if (!empty($_POST)) {

    $bg = $bdd->prepare("INSERT INTO admin(name,email,password) VALUES (?,?,?)");

    $bg->execute(array(
        $_POST['name'],
        $_POST['email'],
        password_hash($_POST['password'], PASSWORD_BCRYPT)
    ));
    header('location: index.php');
}

?>

<form action="" method="post">
    <input type="text" name="name">
    <input type="email" name="email">
    <input type="password" name="password">


    <button type="submit">enregirstrer</button>
</form>