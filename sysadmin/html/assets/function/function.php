<?php

function viewCategory()
{
    global $bdd;
    $req = $bdd->query("SELECT * FROM category");
    $requete = $req->fetchAll();
    return $requete;
}

function viewAdmin()
{
    global $bdd;
    $req = $bdd->query("SELECT * FROM admin WHERE id = 1");
    $requete = $req->fetchAll();
    return $requete;
}

function viewTva()
{
    global $bdd;
    $req = $bdd->query("SELECT * FROM tva");
    $requete = $req->fetchAll();
    return $requete;
}
function viewCategorieActualite()
{
    global $bdd;
    $req = $bdd->query("SELECT * FROM actucategory");
    $requete = $req->fetchAll();
    return $requete;
}

function viewActualites()
{
    global $bdd;
    $req = $bdd->query("SELECT actualites.id, actualites.name,actualites.description,actualites.image,actucategory.label FROM actualites LEFT JOIN actucategory ON actucategory.id = actualites.id_category ORDER BY actualites.id  desc");
    $requete = $req->fetchAll();
    return $requete;
}

function extrait($param){
    $Touslesmots = str_word_count($param, 1);

    $Resume = "";
    if (count($Touslesmots) > 10) {
        for ($i = 0; $i <= 10; $i++) {
            $Resume .= $Touslesmots[$i] . " ";
        }
    }
    return $Resume; 
}


function viewRecruitment()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM recruitment");
    $req -> execute(array()); 
    $requete = $req->fetchAll();
    return $requete;
}

function viewUsersList(){
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM users");
    $req->execute(array());
    $requete = $req->fetchAll();
    return $requete;
}
function viewUsers($id)
{
    global $bdd;
    $req = $bdd->prepare("SELECT users.*, adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone FROM users LEFT JOIN adress ON adress.id_users = users.id WHERE users.id = ?");
    $req->execute(array($id));
    $requete = $req->fetch();
    return $requete;
}
function viewUsersComplet($id)
{
    global $bdd;     
        $req = $bdd->prepare("SELECT * FROM users WHERE id = ?");
        $req->execute(array($id));
        $requete = $req->fetchAll();
        return $requete;
}

function usersExist($id){
    global $bdd; 
    $req = $bdd->prepare("SELECT count(id) FROM users WHERE id = ?");
    $req->execute(array($id));
    $requete = $req->fetchColumn();

   return $requete ;
    
}
function viewMenu(){
    
    global $bdd;
    $req = $bdd -> prepare('SELECT products.id,products.description,products.stoc,products.name,products.image,products.price,category.id as cid,category.label,tva.rate, (products.price * 100 /( 100 + tva.rate)) as prixTotal FROM products
    INNER JOIN category ON products.id_category = category.id 
    INNER JOIN tva ON products.id_tva = tva.id');
    $req -> execute(array());
    $requete = $req -> fetchAll();

    return $requete; 
}

function viewMenuModificationCrudIndex(){
    global $bdd;
    $req = $bdd -> prepare('SELECT * FROM products ORDER BY id desc');
    $req -> execute(); 
    $crudIndexMenu = $req -> fetchAll(); 
    return $crudIndexMenu; 
}
function viewOrdersInPreparation()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM orders WHERE status = ? ");
    $req->execute(
        array(
            'Préparation'
        )
    );
    $orders = $req->fetchAll();
    return $orders; 
}

function viewOrdersInPrete()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM orders WHERE status = ? ");
    $req->execute(
        array(
            'Préte'
        )
    );
    $orders = $req->fetchAll();
    return $orders;
}


function viewO()
{
    global $bdd;
    $req = $bdd->prepare(
        "SELECT orders.*,orderslines.name,orderslines.quantityproducts,orderslines.price,users.lastname,users.firstname,users.email 
        FROM orders
        LEFT JOIN orderslines 
        ON orderslines.id_orders = orders.id
        LEFT JOIN users
        ON users.id = orders.id_users"
    );
    $req->execute(
        array()
    );
    $orders = $req->fetchAll();
    return $orders;
}

function viewCommandeDetail($id)
{
    global $bdd;
    $req = $bdd->prepare('SELECT orderslines.*, orders.*, products.name as nomPorduit, users.lastname, users.firstname,users.email FROM orderslines INNER JOIN orders ON orderslines.id_orders = orders.id INNER JOIN products ON products.id = orderslines.id_products INNER JOIN users ON orders.id_users = users.id WHERE orders.id = ?');
    $req->execute(array($id));
    $products = $req->fetchAll();
    return $products;
}
function personneParRapportAlaCommande($id)
{
    global $bdd; 
    $req = $bdd->prepare('SELECT users.lastname, users.firstname,users.email,adress.name,adress.company,adress.address,adress.postal,adress.city,adress.phone FROM users INNER JOIN orders ON orders.id_users = users.id INNER JOIN adress ON adress.id_users = users.id WHERE orders.id = ? ');
    $req->execute(array($id));
    $personnage = $req->fetch();
    return $personnage;

}
function viewOrdersNouveau()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM orders WHERE status = ? ");
    $req->execute(
        array('Attente')
    );
    $orders = $req->fetchAll();
   return $orders;
}
function viewPromo()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM promo");
    $req->execute(array());
    $requete = $req->fetchAll();
    return $requete;
}
function viewCrudAccueil()
{
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM accueilcrud");
    $req->execute(array());
    $requete = $req->fetchAll();
    return $requete;
}