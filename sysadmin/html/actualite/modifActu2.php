<?php
session_start();
if (!empty($_POST)) {
    require('../assets/componant/co_bdd.php');
  
    $imageFileName = null;

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

  if ($imageFileName == null) {
    $req = $bdd->prepare("UPDATE actualites SET name=:name,description=:description,id_category=:categorie WHERE id=:NUM");
  } else {
    $req = $bdd->prepare("UPDATE actualites SET name=:name,description=:description,id_category=:categorie,image=:image WHERE id=:NUM");
    $req->bindValue(':image', $imageFileName, PDO::PARAM_STR);
  }

   

    $req->bindValue(':NUM', $_POST['id'], PDO::PARAM_INT);
    $req->bindValue(':name', $_POST['titre'], PDO::PARAM_STR);
    $req->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $req->bindValue(':categorie', $_POST['categorie'], PDO::PARAM_STR);


     $execute = $req->execute();

  if($execute){
    header('location: ../actualite.php'); 
  }
}

