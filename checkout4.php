 <?php
    session_start();
    if (!empty($_SESSION['users'])) {

        require('./assets/php/co_bdd.php');
        require('./assets/php/function.php');
        require('./assets/componants/barreMenu.php');
        if (!empty($ids)) {
            require('./assets/componants/header.php');


            $us = viewFullUserAdresse($_SESSION['users']['id'],'principal');
            $art = viewPanierArticle($ids);


            $quinzeEuro = array("Pont-à-Mousson");
            $vingtEuro = array("Blénod-lès-Pont-à-Mousson", "Maidières", "Montauville");
            $vingtCinqEuro = array("Jezainville", "Norroy-lès-Pont-à-Mousson");
            $trenteEuro = array("Vandiéres");
            $quarenteEuro = array("Champey-sur-Moselle", "Pagny-sur-Moselle", "Dieulouard", "Cheminot");
            $trenteCinqEuro = array("Lesménils", "Atton", "Mousson");

            $horraire = new DateTime();

            $heure = $horraire->format("H");
            $minute = $horraire->format("i");
            $minute += 15;

            $heureDepart = intval($heure + ($minute / 15 + 1) / (60 / 15));
            $minuteDepart =  ($minute / 15 + 1) % (60 / 15) * 15;
            $horraire->setTime($heureDepart, $minuteDepart, 00, 00);

            for ($i = 0; $i < 22; $i++) {

                $horrairesPossibles[] = $horraire->format('H:i');
                $horraire->add(new DateInterval('PT10M'));
            }
    ?>

         <script src="https://www.paypal.com/sdk/js?client-id=AZeBlBbNrJm7becelKDkUOmf4FCPPZ-M_cyHNVGRHzuv4nmaaqqlpHxmkm73YxF0uU4d64MBiqrqKklE">
             // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
         </script>

         <body>
             <div class="page-wrapper">

                 <main class="main">
                     <div class="page-header text-center" style="background:#000">
                         <div class="container">
                             <h1 class="page-title couleurBlanche">Paiement<span></span></h1>
                         </div><!-- End .container -->
                     </div><!-- End .page-header -->
                     <nav aria-label="breadcrumb" class="breadcrumb-nav">
                         <div class="container">
                             <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                 <li class="breadcrumb-item"><a href="cart.php">Panier</a></li>
                                 <li class="breadcrumb-item active couleurJaune" aria-current="page">Paiement</li>
                             </ol>
                         </div><!-- End .container -->
                     </nav><!-- End .breadcrumb-nav -->

                     <div class="page-content">
                         <div class="checkout">
                             <div class="container">

                                 <?php if (!empty($us['name']) && !empty($us['address']) && !empty($us['postal']) && !empty($us['city']) && !empty($us['phone'])) { ?>


                                     <form action="accordeon.php" method="GET">

                                         <style>
                                             .adressCheckout {
                                                 background-color: whitesmoke;

                                                 border: 3px solid white;
                                                 border-radius: 4px;
                                                 padding: 1rem;
                                                 margin: 0.1rem;
                                             }

                                             #accordionExample {
                                                 border: 3px solid white;
                                                 border-radius: 4px;

                                             }

                                             .inputTime {
                                                 padding: 1rem;
                                                 margin: 1rem;
                                             }

                                             .textaeracheckout {
                                                 border-radius: 3px;
                                             }

                                             .card-accordeon-livraison {
                                                 padding-top: 2rem;
                                             }

                                             .accordion-summary-livrason {
                                                 background-color: white;
                                                 padding: 2rem;
                                                 border-radius: 3px;
                                             }

                                             .horraireEmporter {
                                                 display: flex;
                                                 justify-content: space-evenly;
                                                 flex-direction: row;
                                                 flex-wrap: wrap;

                                             }

                                             .horraire {
                                                 margin: 1rem;
                                                 border: 1px solid grey;
                                                 color: black;
                                                 padding: 1.2rem;
                                                 border-radius: 3px;
                                                 font-size: 17px;
                                                 width: 70px;
                                                 text-align: center;
                                             }

                                           
                                           
                                         </style>
                                         <div class="row">

                                             <div class="container  col-lg-9">




                                                 <div class="accordion-summary accordion-summary-livrason" id="accordion-payment">
                                                     <h2 class="checkout-title  couleurJaune ">Mode de livraison</h2><!-- End .checkout-title -->
                                                     <div class="card card-accordeon-livraison">

                                                         <div class="card-header" id="heading-1">
                                                             <h2 class="card-title">

                                                                 <input type="radio" name="checkboxLivraison" value="emporter" role="button" data-toggle="collapse" href="#emporter" checked aria-expanded="true" aria-controls="emporter">
                                                                 Emporter

                                                             </h2>
                                                         </div><!-- End .card-header -->
                                                         <div id="emporter" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                             <div class="card-body horraireEmporter">

                                                                 <?php foreach ($horrairesPossibles as $horrar) { ?>

                                                                     <div class="horraire">
                                                                         <label id="horraire" for="horraire<?= $horrar ?>">
                                                                             <input type="radio" value="<?= $horrar ?>" id="horraire<?= $horrar ?>" name="horraireEmportez">
                                                                             <?= $horrar ?>
                                                                         </label>

                                                                     </div>


                                                                 <?php } ?>

                                                             </div><!-- End .card-body -->
                                                         </div><!-- End .collapse -->
                                                     </div><!-- End .card -->

                                                     <style>
                                                         .bgbg {
                                                             border: 1px solid red;
                                                         }
                                                     </style>
                                                     <script>
                                                         function mafvt() {
                                                             let voir = document.getElementById('horraire<?= $horrar ?>').checked
                                                             let horraire = document.getElementById('horraire')
                                                             console.log(voir)
                                                             if (voir == true) {
                                                                 voir.classList.add('bgbg');
                                                                 console.log('if voir normalement')

                                                             } else if (voir == false) {
                                                                 voir.classList.remove('bgbg')
                                                             }
                                                         }
                                                     </script>


                                                     <div class="card card-accordeon-livraison">
                                                         <div class="card-header" id="heading-2">
                                                             <h2 class="card-title">
                                                                 <input type="radio" name="checkboxLivraison" value="surplace" class="collapsed" role="button" data-toggle="collapse" href="#surplace" aria-expanded="false" aria-controls="surplace">
                                                                 Sur place

                                                             </h2>
                                                         </div><!-- End .card-header -->
                                                         <div id="surplace" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                                             <div class="card-body">
                                                                 <input type="time" name="accordeonTestsurplace">
                                                             </div><!-- End .card-body -->
                                                         </div><!-- End .collapse -->
                                                     </div><!-- End .card -->

                                                     <div class="card card-accordeon-livraison">
                                                         <div class="card-header" id="heading-3">
                                                             <h2 class="card-title">
                                                                 <input type="radio" class="collapsed" name="checkboxLivraison" value="livraison" role="button" data-toggle="collapse" href="#livraison" aria-expanded="false" aria-controls="livraison">
                                                                 Livraison

                                                             </h2>
                                                         </div><!-- End .card-header -->
                                                         <div id="livraison" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                                             <div class="card-body"> <input type="time" name="accordeonTestLivraison">
                                                             </div><!-- End .card-body -->
                                                         </div><!-- End .collapse -->
                                                     </div><!-- End .card -->


                                                 </div><!-- End .accordion -->


                                                 <div class="accordion" id="accordionExample">

                                                     <?php if (($panier->total() >= 15) && in_array($us['city'], $quinzeEuro)) { ?>
                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php } elseif (($panier->total() >= 20) && (in_array($us['city'], $vingtEuro) | in_array($us['city'], $quinzeEuro))) { ?>
                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>


                                                     <?php  } elseif (($panier->total() >= 25) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro))) { ?>
                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php } elseif (($panier->total() >= 30) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro) || in_array($us['city'], $trenteEuro))) { ?>
                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php } elseif (($panier->total() >= 35) && (in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro) || in_array($us['city'], $trenteEuro) || in_array($us['city'], $trenteCinqEuro))) { ?>
                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>

                                                     <?php } elseif (($panier->total() >= 40) && (in_array($us['city'], $trenteCinqEuro) || in_array($us['city'], $quarenteEuro) || in_array($us['city'], $trenteEuro) || in_array($us['city'], $vingtEuro) || in_array($us['city'], $vingtCinqEuro))) { ?>

                                                         <div class="card">

                                                             <div class="card-header" id="headingOne">
                                                                 <h2 class="mb-0">
                                                                     <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                         Se faire livrer
                                                                     </button>
                                                                 </h2>
                                                             </div>

                                                             <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                                 <div class="card-body">
                                                                     <label for="timerEmportez">A quel heure voulez vous etre livrer ? b</label><br>
                                                                     <input type="time" name="horraireLivraison" class="inputTime">
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     <?php  } ?>
                                                     <div class="card">
                                                         <div class="card-header" id="headingTwo">
                                                             <h2 class="mb-0">
                                                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                     Sur place
                                                                 </button>
                                                             </h2>
                                                         </div>
                                                         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                             <div class="card-body">
                                                                 <form action="">
                                                                     <label for="timerEmportez">A quel heure voulez vous venir manger ? </label>
                                                                     <input type="time" name="horraireSurPlace">
                                                                 </form>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="card">
                                                         <div class="card-header" id="headingThree">
                                                             <h2 class="mb-0">
                                                                 <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                     A emporter
                                                                 </button>
                                                             </h2>
                                                         </div>
                                                         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                             <div class="card-body">
                                                                 <form action="">
                                                                     <label for="timerEmportez">A quel heure voulez vous récuperez votre plat ? </label>
                                                                     <input type="time" name="horraireEmporter">
                                                                 </form>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>

                                                 <h2 class="checkout-title  couleurJaune ">Votre adresse</h2><!-- End .checkout-title -->

                                                 <div class="row adressCheckout">
                                                     <div class="col-12 ">
                                                         <div>
                                                             Intitulé : <?= $us['name'] ?>
                                                         </div>
                                                         <div>
                                                             <?php if (!empty($us['company'])) { ?>
                                                                 Societé : <?= $us['company'] ?>
                                                             <?php } ?>
                                                         </div>
                                                         <div>
                                                             Adresse : <?= $us['address'] ?> <?= $us['postal'] ?> <?= $us['name'] ?> <?= $us['city'] ?>

                                                         </div>
                                                         <div>
                                                             Téléphone : <?= $us['phone'] ?>
                                                         </div>
                                                         <a href="./dashboard/deleteAdress.php?id=<?= $_SESSION['users']['id'] ?>">Supprimer <i class="icon-edit"></i></a>
                                                     </div>

                                                 </div>


                                                 <br>
                                                 <?php if (!empty($us['name']) && !empty($us['address']) && !empty($us['postal']) && !empty($us['city']) && !empty($us['phone'])) { ?>
                                                     <label class="couleurJaune"> Note pour la commande ? (facultatif)</label>
                                                     <textarea class="form-control textaeracheckout" cols="30" rows="4" name="notePourLaCommande" placeholder="Une note ?"></textarea>
                                                 <?php } ?>
                                             </div><!-- End .col-lg-9 -->
                                             <aside class="col-lg-3">
                                                 <div class="summary">
                                                     <h3 class="summary-title">Votre commandfe </h3><!-- End .summary-title -->

                                                     <table class="table table-summary">
                                                         <thead>
                                                             <tr>
                                                                 <th>Produit</th>
                                                                 <th>Quantité</th>
                                                                 <th>Total</th>
                                                             </tr>
                                                         </thead>

                                                         <tbody>
                                                             <?php foreach ($art as $article) {  ?>
                                                                 <tr>
                                                                     <td><a href="#"><?= $article['name'] ?> </a></td>
                                                                     <td><?= $_SESSION['panier'][$article['id']]  ?> </td>
                                                                     <td><?= $article['price'] * $_SESSION['panier'][$article['id']]  ?> €</td>
                                                                 </tr>
                                                             <?php } ?>

                                                             <?php if (isset($_POST['salee'])) { ?>
                                                                 <tr class="">



                                                                 </tr><!-- End .summary-subtotal -->
                                                             <?php    } ?>



                                                             <tr class="summary-total">
                                                                 <td>Total:</td>
                                                                 <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                                             </tr><!-- End .summary-total -->

                                                         </tbody>
                                                     </table><!-- End .table table-summary -->
                                                     <h4 class="pt-3">Mode de réglement</h4>
                                                     <div class="accordion-summary" id="accordion-payment">






                                                         <div class="card">
                                                             <div class="card-header" id="heading-2">
                                                                 <h2 class="card-title">
                                                                     <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="true" aria-controls="collapse-2">
                                                                         PayPal
                                                                     </a>
                                                                 </h2>
                                                             </div><!-- End .card-header -->
                                                             <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">
                                                                 <div class="card-body">
                                                                     <div id="paypal-button-container"></div>
                                                                 </div><!-- End .card-body -->
                                                             </div><!-- End .collapse -->
                                                         </div><!-- End .card -->
                                                         <?php $prix = htmlspecialchars(number_format($panier->total(), 2, '.', ' ')); ?>
                                                         <div class="card">
                                                             <div class="card-header" id="heading-1">
                                                                 <h2 class="card-title">

                                                                     <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="false" aria-controls="collapse-1">
                                                                         Carte de crédit
                                                                     </a>
                                                                 </h2>
                                                             </div><!-- End .card-header -->
                                                             <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">
                                                                 <div class="card-body">
                                                                     <input type="text" name="accordeonTestEmportez">
                                                                 </div><!-- End .card-body -->
                                                             </div><!-- End .collapse -->
                                                         </div><!-- End .card -->
                                                     </div>
                                                     <!-- End .accordion -->

                                                     <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                                         <span class="btn-text">Payer</span>
                                                         <span class="btn-hover-text">Procéder au paiement</span>
                                                     </button>
                                                 </div><!-- End .summary -->
                                             </aside><!-- End .col-lg-3 -->
                                         </div><!-- End .row -->
                                     </form>
                                 <?php } else { ?>

                                     <div class="row">
                                         <div class="container  col-lg-9">

                                             <form method="POST" action="./dashboard/editAdress.php?prio=principal">
                                                 <input type="hidden" name="id" value="<?= $_SESSION['users']['id'] ?>">
                                                 <div class="row">
                                                     <div class="col-sm-6">
                                                         <label>Intitulé de l'adresse *</label>
                                                         <input type="text" name="name" class="form-control" required>
                                                     </div><!-- End .col-sm-6 -->

                                                     <div class="col-sm-6">
                                                         <label>Entreprise (facultatif) </label>
                                                         <input type="text" name="company" class="form-control">
                                                     </div><!-- End .col-sm-6 -->
                                                 </div><!-- End .row -->


                                                 <label>Addresse *</label>
                                                 <input type="text" name="address" class="form-control" placeholder="Nom de la rue" required>

                                                 <div class="row">

                                                     <div class="col-sm-6">
                                                         <label>Code postal *</label>
                                                         <input type="text" id="postal" name="postal" class="form-control" required>
                                                     </div><!-- End .col-sm-6 -->

                                                     <div class="form-group col-sm-6">
                                                         <label for="city">Ville</label><br>
                                                         <select class="form-control" name="city" id="city">

                                                         </select>
                                                     </div>

                                                 </div><!-- End .row -->

                                                 <div class="row">


                                                     <div class="col-sm-12">
                                                         <label>Téléphone *</label>
                                                         <input type="tel" name="phone" class="form-control" required>
                                                     </div><!-- End .col-sm-6 -->
                                                 </div><!-- End .row -->
                                                 <button class="btn btn-outline-primary btn-rounded" type="submit">Enregistrer</button>

                                             </form>
                                         </div>
                                         <aside class="col-lg-3">
                                             <div class="summary">
                                                 <h3 class="summary-title">Votre commande </h3><!-- End .summary-title -->

                                                 <table class="table table-summary">
                                                     <thead>
                                                         <tr>
                                                             <th>Produituu</th>
                                                             <th>Total</th>
                                                         </tr>
                                                     </thead>

                                                     <tbody>
                                                         <?php foreach ($art as $article) {  ?>
                                                             <tr>
                                                                 <td><a href="#"><?= $article['name'] ?> </a></td>
                                                                 <td><?= number_format($article['price'], 2, ',', ' ') ?> € </td>
                                                             </tr>
                                                         <?php } ?>
                                                         <tr class="">
                                                             <td>Offert:</td>
                                                             <td><?php if (isset($_POST['salee'])) {
                                                                        echo 'Sauce salée';
                                                                    } ?></td>

                                                         </tr><!-- End .summary-subtotal -->
                                                         <tr class="summary-subtotal">
                                                             <td>Sous-total:</td>
                                                             <td><?= htmlspecialchars(number_format($panier->total(), 2, ',', ' ')) ?>€</td>
                                                         </tr><!-- End .summary-subtotal -->
                                                         <tr>
                                                             <td>Livraison:</td>
                                                             <td id="livraisonMode"></td>
                                                         </tr>
                                                         <tr class="summary-total">
                                                             <td>Total:</td>
                                                             <td>$160.00</td>
                                                         </tr><!-- End .summary-total -->
                                                     </tbody>
                                                 </table><!-- End .table table-summary -->


                                             </div><!-- End .summary -->
                                         </aside><!-- End .col-lg-3 -->

                                     </div>

                                 <?php } ?>


                                 <?php require("./assets/componants/footer.php"); ?>
                                 <?php require("./assets/componants/navmenumobile.php"); ?>

                             </div><!-- End .page-wrapper -->
                             <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

                             <!-- Mobile Menu -->
                             <div class="mobile-menu-overlay"></div>
                             <?php require('./assets/componants/menu.php'); ?>
                             <?php require('./assets/componants/fenetreModalConnexion.php'); ?>



                             <!-- Plugins JS File -->
                             <script src="assets/js/jquery.min.js"></script>
                             <script src="assets/js/bootstrap.bundle.min.js"></script>
                             <script src="assets/js/jquery.hoverIntent.min.js"></script>
                             <script src="assets/js/jquery.waypoints.min.js"></script>
                             <script src="assets/js/superfish.min.js"></script>
                             <script src="assets/js/owl.carousel.min.js"></script>
                             <!-- Main JS File -->
                             <script src="assets/js/main.js"></script>
                             <script src="./assets/js/geoapi.js"></script>
                             <script>
                                 paypal.Buttons({
                                     createOrder: function(data, actions) {
                                         // This function sets up the details of the transaction, including the amount and line item details.
                                         return actions.order.create({
                                             purchase_units: [{
                                                 amount: {
                                                     value: '<?= $prix ?>'
                                                 }
                                             }],
                                             payer: {
                                                 name: {
                                                     given_name: "PayPal",
                                                     surname: "Customer"
                                                 },
                                                 address: {
                                                     address_line_1: '123 ABC Street',
                                                     address_line_2: 'Apt 2',
                                                     admin_area_2: 'San Jose',
                                                     admin_area_1: 'CA',
                                                     postal_code: '95121',
                                                     country_code: 'US'
                                                 },
                                                 email_address: "customer@domain.com",
                                                 phone: {
                                                     phone_type: "MOBILE",
                                                     phone_number: {
                                                         national_number: "14082508100"
                                                     }
                                                 }
                                             },
                                         });
                                     },
                                     onApprove: function(data, actions) {
                                         // This function captures the funds from the transaction.
                                         return actions.order.capture().then(function(details) {

                                             //  window.location = "http://www.ozipek.fr/ohmysushi/versionTest/b.php";
                                             //  window.location = "http://localhost/ohmysushiv4.2/b.php";
                                             // This function shows a transaction success message to your buyer.
                                             alert('Transaction completed by ' + details.payer.name.given_name);
                                         });
                                     },

                                     onCancel: function(data) {
                                         alert('on cancel');
                                     },
                                     onError: function(err) {
                                         alert('error');
                                     }

                                 }).render('#paypal-button-container');
                                 //This function displays Smart Payment Buttons on your web page.
                             </script>
         </body>

 <?php
        } else {
            header('location: index.php');
        }
    } else {
        header('location: index.php');
    } ?>

 </html>