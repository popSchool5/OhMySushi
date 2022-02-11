<?php
session_start();
if (!empty($_SESSION)) {
    require('./assets/componant/co_bdd.php');
    require('./assets/function/function.php');

    $ordersInPreparation = viewOrdersInPreparation();
    $ordersInPrete = viewOrdersInPrete();


    $bg = viewOrdersNouveau();


?>

    <!-- BEGIN: Content-->
    <?php
    require('./assets/componant/header.php');
    ?>
    <style>
        .laNouvelleCommande,
        .commandeEnPreparation,
        .commandePrete {
            border: 0.1px solid #FBFBFB;
            margin: 1rem 0 3rem 0;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            background-color: white;
            color: black;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
        }

        .laNouvelleCommande {
            border-left: 5px #DA5656 solid;
        }

        .commandePrete {
            border-left: 5px #25CD0D solid;
        }

        .commandeEnPreparation {
            border-left: 5px #FA8F24 solid;
        }


        .flecj {
            font-size: 25px;
            border: 1px solid #EFEFEF;
            padding: 10px;
            border-radius: 5px;

        }


        .commandeEnPreparation.template {
            display: none;
        }
    </style>
    <div class="app-content content">
        <div class="content-area-wrapper d-flex flex-wrap">




            <!-- Nouveau -->
            <div class="col-lg-4 col-12">
                <h5>Nouveau : </h5>


                <div class="nouvellesCommandes">

                </div>

                <div class="commandeEnPreparation template" data-toggle="modal">

                    id_user : <br>
                    status:
                    <a href=""><i class="fas flecj fa-arrow-right"></i></a>
                </div>

                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content" style="height: 95vh !important">
                            <div class="modal-header ">
                                <h5 class="modal-title" id="exampleModalLabel">Commande numéro : </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">



                                <div class="detailDuMec">
                                    <h3>Information sur la personne</h3>
                                    <p> Prénom : </p>
                                    <p> Nom : </p>
                                    <p> Email : </p>
                                    <p> Tél : </p>
                                </div>
                                <div class="detailDeLaCommande">
                                    <h3>Information sur la commande</h3>
                                    <p> Type de commande :</p>
                                    <p> Heure :</p>
                                    <p> Adresse : </p>
                                    <p> Note : </p>

                                </div>
                                <div class="produitDeLaCommande">
                                    <h3>Produit de la commande</h3>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- EN PREPARATION -->
            <div class="col-lg-4 col-12">
                <h5>En préparation : </h5>
                <?php foreach ($ordersInPreparation as $orderInPreparation) { ?>
                    <div class="commandeEnPreparation" data-toggle="modal" data-target="[data-bg='<?= $orderInPreparation['id'] ?>']">

                        id_user : <?= $orderInPreparation['id_users'] ?><br>
                        status: <?= $orderInPreparation['status'] ?>
                        <a href=" ./comm/changePreparation.php?id=<?= $orderInPreparation['id'] ?>&next=route"><i class="fas flecj fa-arrow-right"></i></a>
                    </div>

                    <style>
                        @media screen and (min-width: 1200px) {
                            .modal-xl {
                                max-width: 98% !important;
                            }
                        }
                    </style>

                    <div class="modal fade" data-bg='<?= $orderInPreparation['id'] ?>' tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content" style="height: 95vh !important">
                                <div class="modal-header ">
                                    <h5 class="modal-title" id="exampleModalLabel">Commande numéro : <?= $orderInPreparation['id']; ?></h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">


                                    <?php $produits = viewCommandeDetail($orderInPreparation['id']);
                                    $perso = personneParRapportAlaCommande($orderInPreparation['id']);
                                    ?>

                                    <div class="detailDuMec">
                                        <h3>Information sur la personne</h3>
                                        <p> Prénom : <?= $perso['lastname'] ?></p>
                                        <p> Nom : <?= $perso['firstname'] ?></p>
                                        <p> Email : <?= $perso['email'] ?></p>
                                        <p> Tél : <?= $perso['phone'] ?></p>
                                    </div>
                                    <div class="detailDeLaCommande">
                                        <h3>Information sur la commande</h3>
                                        <p> Type de commande : <?= $orderInPreparation['methodelivraison'] ?></p>
                                        <p> Heure : <?= $orderInPreparation['heureLivraison'] ?></p>
                                        <p> Adresse : <?= $orderInPreparation['billingadress'] ?></p>
                                        <p> Note : <?= $orderInPreparation['note'] ?></p>

                                    </div>
                                    <div class="produitDeLaCommande">
                                        <h3>Produit de la commande</h3>
                                    </div>
                                    <ul>

                                        <?php foreach ($produits as $prod) {  ?>
                                            <li><?= $prod['nomPorduit'] ?></li>
                                        <?php } ?>
                                    </ul>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>

            <!-- EN ROUTE -->
            <div class="col-lg-4 col-12">
                <h5> En route :</h5>
                <?php foreach ($ordersInPrete as $orderInPrete) { ?>
                    <div class="commandePrete">
                        id_user : <?= $orderInPrete['id_users'] ?><br>
                        status : <?= $orderInPrete['status'] ?>
                    </div>
                <?php } ?>
            </div>

            <script>
                function getCommande() {

                    const requeteAjax = new XMLHttpRequest();
                    requeteAjax.open("GET", "./comm/viewCommande.php");


                    requeteAjax.onload = function() {

                        const resultat = JSON.parse(requeteAjax.responseText);

                        const html = resultat.reverse().map(function(message) {
                            return `      
                        <div class="commandeEnPreparation" data-toggle="modal" data-target="[data-bg=${message.id}]">
                            id_user : ${message.id_users} <br>
                            status: ${message.status}<br>
                            <a href="./voirCommande.php?id=${message.id}">Voir la commande</a>
                            <a href="./comm/changePreparation.php?id=${message.id}&next=preparation"><i class="fas flecj fa-arrow-right"></i></a>
                        </div>                  
                            `
                        }).join('')



                        const messages = document.querySelector('.nouvellesCommandes');

                        const template = $('.commandeEnPreparation.template')
                        $(messages).empty()
                        for (commande of resultat.reverse()) {
                            
                            let nouvelleCommande = template.clone(true)
                            nouvelleCommande.attr('data-target', '[data-bg="' + commande.id + '"]').removeClass('template'); 
                            $(messages).append(nouvelleCommande);

                        }

                        clearInterval(interval)

                        // messages.innerHTML = html;

                        // On cible toute les nouvelles commandes pige que dalle la 

                        // $(messages).find('[data-target]').on('click', (e) => {
                        //     $($(e.target).data('target')).modal()
                        // });
                    }

                    requeteAjax.send();
                }

                const interval = window.setInterval(getCommande, 1000);


                getCommande();


                function notifyMe() {
                    if (!window.Notification) {
                        console.log('Browser does not support notifications.');
                    } else {
                        // check if permission is already granted
                        if (Notification.permission === 'granted') {
                            // show notification here
                            var notify = new Notification('Hi there!', {
                                body: 'How are you doing?',
                                icon: 'https://bit.ly/2DYqRrh',
                            });
                        } else {
                            // request permission from user
                            Notification.requestPermission().then(function(p) {
                                if (p === 'granted') {
                                    // show notification here
                                    var notify = new Notification('Hi there!', {
                                        body: 'How are you doing?',
                                        icon: 'https://bit.ly/2DYqRrh',
                                    });
                                } else {
                                    console.log('User blocked notifications.');
                                }
                            }).catch(function(err) {
                                console.error(err);
                            });
                        }
                    }
                }
            </script>
        </div>
    </div>

    <!-- END: Content-->

<?php
    require('./assets/componant/footer.php');
} else {
    header('location:auth-login.php');
}

?>