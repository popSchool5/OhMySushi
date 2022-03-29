<?php
session_start();

require('./assets/php/co_bdd.php');
require('./assets/php/function.php');


// $req = $bdd -> prepare('SELECT * FROM products WHERE id_category IN (SELECT id FROM category)');
$req = $bdd -> prepare('SELECT category.label,products.* FROM products LEFT JOIN category ON products.id_category = category.id GROUP BY category.label'); 
$req -> execute(); 
$recupBG = $req -> fetchAll(); 

?>


<h3>
    category
</h3>
<?php 
foreach($recupBG as $b){
    echo $b['label']; 
}
?>