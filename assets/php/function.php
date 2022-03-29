<?php

//  voir l'uitlisateur si il est connecter

function viewUser($id)
{
    global $bdd;
    $users = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $users->execute(array(
        $id
    ));
    $user = $users->fetch();
    return $user;
}
function viewFullUserAdresse($id)
{
    global $bdd;
    $users = $bdd->prepare('SELECT users.id,users.lastname,users.firstname,users.email,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone,adress.priorite FROM users INNER JOIN adress ON users.id = adress.id_users WHERE users.id = ?');
    $users->execute(array(
        $id
    ));
    $user = $users->fetchAll();
    return $user;
}
function voirAdressePrincipal($id,$prio){
    global $bdd;
    $users = $bdd->prepare('SELECT users.id,users.lastname,users.firstname,users.email,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone,adress.priorite FROM users INNER JOIN adress ON users.id = adress.id_users WHERE users.id = ? AND adress.priorite = ?');
    $users->execute(array(
        $id,
        $prio
    ));
    $user = $users->fetchAll();
    return $user;
}
function voirAdressePrincipalCommande($id,$prio){
    global $bdd;
    $users = $bdd->prepare('SELECT users.id,users.lastname,users.firstname,users.email,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone,adress.priorite FROM users INNER JOIN adress ON users.id = adress.id_users WHERE users.id = ? AND adress.priorite = ?');
    $users->execute(array(
        $id,
        $prio
    ));
    $user = $users->fetch();
    return $user;
}
function viewFullUserAdressePrincipal($id)
{
    global $bdd;
    $users = $bdd->prepare('SELECT users.id,users.lastname,users.firstname,users.email,users.password,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone,adress.priorite FROM users INNER JOIN adress ON users.id = adress.id_users WHERE users.id = ? AND adress.priorite = ?');
    $users->execute(array(
        $id, 
        "principal"
    ));
    $user = $users->fetch();
    return $user;
}
function viewFullUserAdresseSecondaire($id)
{
    global $bdd;
    $users = $bdd->prepare('SELECT users.id,users.lastname,users.firstname,users.email,users.password,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone,adress.priorite FROM users INNER JOIN adress ON users.id = adress.id_users WHERE users.id = ? AND adress.priorite = ?');
    $users->execute(array(
        $id,
        "secondaire"
    ));
    $user = $users->fetch();
    return $user;
}
function viewIndexFullActualites()
{
    global $bdd;
    $actualites = $bdd->prepare('SELECT actualites.id,actualites.name,actualites.description, actualites.image FROM actualites  ORDER BY actualites.id DESC LIMIT 3');
    $actualites->execute(array());
    $actualite = $actualites->fetchAll();
    return $actualite;
}
function extraitIndex($param)
{
    $Touslesmots = str_word_count($param, 1);

    $Resume = "";
    if (count($Touslesmots) > 5) {
        for ($i = 0; $i <= 7; $i++) {
            $Resume .= $Touslesmots[$i] . " ";
        }
    } else {
        $Resume = $param;
    }
    return $Resume;
}
function viewFullActualites()
{
    global $bdd;
    $actualites = $bdd->prepare('SELECT actualites.id,actualites.name,actualites.description, actualites.image,actucategory.label FROM actualites INNER JOIN actucategory WHERE actualites.id_category = actucategory.id');
    $actualites->execute(array());
    $actualite = $actualites->fetchAll();
    return $actualite;
}

function viewCategoryActualite()
{
    global $bdd;
    $categoryActualites = $bdd->prepare("SELECT * FROM actucategory");
    $categoryActualites->execute([]);
    $categoryActualite = $categoryActualites->fetchAll();
    return $categoryActualite;
}
function viewCategoryActualiteTest()
{
    global $bdd;
    $categoryActualites = $bdd->prepare("SELECT actucategory.*, actualites.id_category FROM actucategory INNER JOIN actualites ON  actualites.id_category = actucategory.id GROUP BY label");
    $categoryActualites->execute([]);
    $categoryActualite = $categoryActualites->fetchAll();
    return $categoryActualite;
}

function viewActualite($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM actualites WHERE id = ?");
    $req->execute([$id]);
    $actualite = $req->fetch();
    return $actualite;
}

function viewSimilarActualite($cat, $id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM actualites WHERE id_category = ? AND not id = ?");
    $req->execute([$cat, $id]);
    $viewSimilarActualite = $req->fetchAll();
    return $viewSimilarActualite;
}

function categoryMenu()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM category");
    $req->execute();
    $viewCategory = $req->fetchAll();
    return $viewCategory;
}
function products()
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id ");
    $req->execute([]);
    $products = $req->fetchAll();
    return $products;
}
function viewArticleExiste($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id = ? ");
    $req->execute(array(
        $id
    ));
    $productss = $req->fetch();
    return $productss;
}

function viewPanierArticle($ids)
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id IN (" . implode(',', $ids) . ") ");
    $req->execute();
    $productsDansLePanier = $req->fetchAll();
    return $productsDansLePanier;
}
function viewIndexMenuNew()
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id ORDER BY products.id DESC LIMIT 5");
    $req->execute();
    $products = $req->fetchAll();
    return $products;
}

function viewIndexMenuPartiSushi()
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE category.label = ? ORDER BY products.id DESC LIMIT 5");
    $req->execute(['Starter']);
    $products = $req->fetchAll();
    return $products;
}

function viewOrdersLines($id, $ordersId)
{
    global $bdd;
    $req = $bdd->prepare("SELECT orders.orderdate,orders.billingadress,orders.status,orderslines.name,orderslines.quantityproducts,orderslines.price from orders INNER JOIN orderslines ON orders.id = orderslines.id_orders WHERE orders.id_users = ? AND orders.id = ?");
    $req->execute(
        array(
            $id,
            $ordersId
        )
    );
    $orderLinesUser = $req->fetchAll();
    return $orderLinesUser;
}
function viewOrders($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT orders.id,orders.orderdate,orders.billingadress,orders.status,orders.methodeLivraison,orders.heureLivraison from orders WHERE orders.id_users = ? ORDER BY orders.id DESC");
    $req->execute(
        array(
            $id
        )
    );
    $ordersUser = $req->fetchAll();
    return $ordersUser;
}



function randMenu(){
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc FROM products ORDER BY RAND() LIMIT 4");
    $req->execute();
    $products = $req->fetchAll();
    return $products;
}
function viewOnlyArticle($id){
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id = ? ");
    $req->execute([$id]);
    $products = $req->fetch();
    return $products;
}

function promoAafficher(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM promo WHERE now() BETWEEN debut AND fin");
    $req->execute();
    $promos = $req->fetchAll();
    return $promos;
}

function crudIndex(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM accueilcrud");
    $req->execute();
    $crudIndex = $req->fetchAll();
    return $crudIndex;
}
function crudIndexPourLesMenu()
{
    global $bdd;
    $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.affichageCrud = ? ORDER BY products.id DESC LIMIT 5");
    $req->execute([1]);
    $crudIndex = $req->fetchAll();
    return $crudIndex;
}

function magasinFermerOuOuvert()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM settings");
    $req->execute();
    $fermerOuOuvert = $req->fetch();
    return $fermerOuOuvert;
}