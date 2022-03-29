<?php
session_start();
if (!empty($_SESSION)) {

    if (!empty($_POST) && isset($_POST)) {
        $imageFileName = null;
        require('../assets/componant/co_bdd.php');

        if (!empty($_FILES)) {
            var_dump($_FILES); 
            if (array_key_exists('images', $_FILES)) {
                if ($_FILES['images']['error'] == 0) {
                 
                        if ($_FILES['images']['size'] <= 30000000) {
                            $imageFileName = uniqid() . '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
                            $taille = getimagesize($_FILES['images']['tmp_name']);
                                                    
                            move_uploaded_file($_FILES['images']['tmp_name'], '../assets/uploads/' . $imageFileName);
                        } else {
                            echo 'Le fichier est trop volumineux…';
                        }
                    
                } else {
                    echo 'Le fichier n\'a pas pu être récupéré…';
                }
            }
        }

            $req = $bdd->prepare("INSERT INTO products(name,description,price,id_category,id_tva,image)VALUES(:name,:description,:price,:id_category,:id_tva,:image)");
            $req->bindValue(':image', $imageFileName,PDO::PARAM_STR);
            $req->bindValue(':name', $_POST['name'],PDO::PARAM_STR);
            $req->bindValue(':description', $_POST['description'],PDO::PARAM_STR);
            $req->bindValue(':id_category', $_POST['category'],PDO::PARAM_INT);
            $req->bindValue(':price', $_POST['price'],PDO::PARAM_STR);
            $req->bindValue(':id_tva', $_POST['tva'],PDO::PARAM_INT);
        


        $execute = $req->execute();

        header('location:../menu.php?success=ajout');
    } else {
        header('location:../menu.php?error=ajout');
    }
} else {
    header('location:../index.php');
} 