<?php
class Panier
{

    public function __construct()
    {

        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
        if (isset($_POST['panier'])) {
            $this->recalc();
        }

    
    }


    public function recalc()
    {

        $_SESSION['panier'] = $_POST['panier']['quantity'];
    }


    public function total()
    {
        global $bdd;
        $total = 0;
        $ids = array_keys($_SESSION['panier']);

        if (empty($ids)) {
            $productsDansLePanier = [];
        } else {
            $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id IN (" . implode(',', $ids) . ") ");
            $req->execute(array());
            $productsDansLePanier = $req->fetchAll();
        }
        foreach ($productsDansLePanier as $product) {
            $total += $product['price'] * $_SESSION['panier'][$product['id']];
        }
     
        if(isset($_SESSION["promo"])){

            $req = $bdd->prepare("SELECT * FROM promo WHERE name = ? AND now() BETWEEN debut AND fin");

            $req->execute(array(
                $_SESSION["promo"]['name']
            ));

            $promo = $req->fetch();
            if ($promo) {
        
                $total = $total *(1- $promo["amount"] /100);
            }else{
                unset($_SESSION['promo']); 
            }
           
        }
       
        return $total; 
        

    }


    public function totalApresPromo($name)
    {
        global $bdd;
        $total = 0;
        $ids = array_keys($_SESSION['panier']);
        $req = $bdd->prepare("SELECT * FROM promo WHERE name = ?");

        $req->execute(array(
                $name
            ));

        $existeOuNonLaPromo = $req->fetch();

        if($existeOuNonLaPromo){
            if (empty($ids)) {
                $productsDansLePanier = [];
            } else {
                $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id IN (" . implode(',', $ids) . ") ");
                $req->execute(array());
                $productsDansLePanier = $req->fetchAll();
            }
            foreach ($productsDansLePanier as $product) {
                $total += $product['price'] * $_SESSION['panier'][$product['id']];
            }

            $total = $total * (1 - $existeOuNonLaPromo['amount'] / 100);

            return $total;
        }else{
            if (empty($ids)) {
                $productsDansLePanier = [];
            } else {
                $req = $bdd->prepare("SELECT products.description,products.name,products.image,products.price,products.id,products.stoc,category.label,tva.rate FROM products INNER JOIN category ON category.id=products.id_category INNER JOIN tva ON products.id_tva = tva.id WHERE products.id IN (" . implode(',', $ids) . ") ");
                $req->execute(array());
                $productsDansLePanier = $req->fetchAll();
            }
            foreach ($productsDansLePanier as $product) {
                $total += $product['price'] * $_SESSION['panier'][$product['id']];
            }
            return $total; 
        }
    }

  

    public function count()
    {
        return array_sum($_SESSION['panier']);
    }




    public function add($product_id)
    {
        if (isset($_SESSION['panier'][$product_id['id']])) {
            $_SESSION['panier'][$product_id['id']]++;
        } else {
            $_SESSION['panier'][$product_id['id']] = 1;
        }
    }



    public function del($product_id)
    {
        unset($_SESSION['panier'][$product_id]);
    }

    
}
