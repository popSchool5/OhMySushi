<?php
session_start();
if (!empty($_SESSION)) {

    if (!empty($_POST) && isset($_POST)) {
        require('../assets/componant/co_bdd.php');
            $imageFileName = null;
  
        if (!empty($_FILES)) {

            if (array_key_exists('images', $_FILES)) {
                if ($_FILES['images']['error'] == 0) {
                    if (in_array($_FILES['images']['type'], ['image/png', 'image/jpeg'])) {
                        if ($_FILES['images']['size'] <= 3000000) {
                            $imageFileName = uniqid() . '.' . pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
                            $taille = getimagesize($_FILES['images']['tmp_name']);
                            $largeur = $taille[0];
                            $hauteur = $taille[1];
                            $largeur_miniature = 320;
                            $hauteur_miniature = 240;
                            $im = imagecreatefromjpeg($_FILES['images']['tmp_name']);
                            $im_miniature = imagecreatetruecolor(
                                $largeur_miniature,
                                $hauteur_miniature
                            );
                            imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
                            imagejpeg($im_miniature, '../assets/uploads/' . 'petite' . $imageFileName, 100);

                            move_uploaded_file($_FILES['images']['tmp_name'], '../assets/uploads/' . $imageFileName);
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
    
        $req = $bdd->prepare("INSERT INTO promo(name,amount,duree,temps,text,image,fin)VALUES(:name,:amount,:duree,:temps,:text,:image,NOW() + INTERVAL :duree ".$_POST['temps'].")");

        $req->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $req->bindValue(':image', $imageFileName, PDO::PARAM_STR);
        $req->bindValue(':duree', $_POST['duree'], PDO::PARAM_INT);
        $req->bindValue(':amount', $_POST['amount'], PDO::PARAM_INT);
        $req->bindValue(':temps', $_POST['temps'], PDO::PARAM_STR);
        $req->bindValue(':text', $_POST['text'], PDO::PARAM_STR);

        $execute = $req->execute();

        header('location:../promo.php?success=ajout');
    } else {
        header('location:../promo.php?error=ajout');
    }
} else {
    header('location:../index.php');
}
