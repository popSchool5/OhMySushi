<?php
session_start();
if (!empty($_SESSION)) {

    if (!empty($_POST) && isset($_POST)) {
        $imageFileName = null;
        require('../assets/componant/co_bdd.php');

        if (!empty($_FILES)) {

            if (array_key_exists('images', $_FILES)) {
                if ($_FILES['images']['error'] == 0) {
                    if (in_array($_FILES['images']['type'], ['image/png', 'image/jpeg'])) {
                        if ($_FILES['images']['size'] <= 3000000) {
                            $imageFileName = uniqid() . '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);

                            move_uploaded_file($_FILES['images']['tmp_name'], './assets/uploads/' . $imageFileName);
                        } else {
                            echo 'Le fichier est trop volumineux…';
                        }
                    } else {
                        echo 'Le type mime du fichier est incorrect…';
                    }
                } else {
                    echo 'Le fichier n\'a pas pu être récupéré…';
                }
            }
        }

        if($imageFileName = null){

            $req = $bdd->prepare("INSERT INTO recruitment(name,description,category)VALUES(:name,:description,:category)");
        
            $req->bindValue(':name', $_POST['titre'], PDO::PARAM_STR);
            $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
            $req->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
        }else{
            $req = $bdd->prepare("INSERT INTO recruitment(name,description,image,category)VALUES(:name,:description,:images,:category)");
            $req->bindValue(':images', $imageFileName, PDO::PARAM_STR);
            $req->bindValue(':name', $_POST['titre'], PDO::PARAM_STR);
            $req->bindValue(':category', $_POST['category'], PDO::PARAM_STR);
            $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        }

      


        $execute = $req->execute();

        header('location:../recrutement.php?success=ajout');
    } else {
        header('location:../recrutement.php?error=ajout');
    }
} else {
    header('location:../index.php');
}
