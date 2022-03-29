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


        .commandeEnPreparation[data-template] {
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

                <div class="commandeEnPreparation" data-target="#iddelamodal" data-template data-toggle="modal">

                    <div>
                        Adresse : <span data-adresse></span> <br>
                        Prénom  : <span data-user></span> <br>
                        status: <span data-status></span>
                    </div>
                    <a href="./comm/changePreparation.php?id=&next=preparation"><i class="fas flecj fa-arrow-right"></i></a>
                </div>

                <div class="modal fade" id="iddelamodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl" role="document">
                        <div class="modal-content" style="height: 95vh !important">
                            <div class="modal-header ">
                                <h5 class="modal-title" id="exampleModalLabel">Commande numéro :<span data-id></span> </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">



                                <div class="detailDuMec">
                                    <h3>Information sur la personne</h3>
                                    <p> Prénom : <span data-prenom></span> </p>
                                    <p> Email : <span data-email></span> </p>
                                    <p> Tél : </p>
                                </div>

                                <div class="detailDeLaCommande">
                                    <h3>Information sur la commande</h3>
                                    <p> Type de commande : <span data-typecommande></span> </p>
                                    <p> Heure : <span data-horraire></span></p>
                                    <p> Adresse : <span data-adressee></span></p>
                                    <p><script>console.log(data-note)</script></p>
                                </div>

                                <div class="produitDeLaCommande">
                                    <h3>Produit de la commande</h3>
                                    <ul>

                                    </ul>
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


                                    <?php
                                    $produits = viewCommandeDetail($orderInPreparation['id']);
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
                const commandesAfficher = [];

                $(document).ready(function() {
                    $('#iddelamodal').on('show.bs.modal', function(event) {
                        const commande = $(event.relatedTarget);
                        const modal = $(event.target);
                        const data = commande.data('data');
                        // console.log(data); 
                        modal.find('[data-id]').text(data.id);
                        modal.find('[data-user]').text(data.billingadress);
                        modal.find('[data-email]').text(data.email);
                        modal.find('[data-adressee]').text(data.billingadress);
                        modal.find('[data-prenom]').text(data.firstname + ' ' + data.lastname);
                        modal.find('[data-horraire]').text(data.heureLivraison);
                        modal.find('[data-note]').text(data.note);
                        modal.find('[data-typecommande]').text(data.methodelivraison);
                        const ul = modal.find('ul');
                        ul.empty();
                        for (orderline of data.orderlines) {
                            let li = $('<li>');

                            li.text(orderline.quantityproducts + ' x ' + orderline.name);

                            ul.prepend(li);

                        }
                    })
                })

                function getCommande() {

                    const requeteAjax = new XMLHttpRequest();
                    requeteAjax.open("GET", "./comm/viewCommande.php");
                    requeteAjax.onload = function() {
                        const commandes = JSON.parse(requeteAjax.responseText);
                        const messages = $('.nouvellesCommandes');
                        const templateCommande = $('.commandeEnPreparation[data-template]')
                        for (commande of commandes) {
                            // console.log(commande);
                            if (!commandesAfficher.includes(commande.id)) {
                                commandesAfficher.push(commande.id);
                                let divCommande = templateCommande.clone(true);
                                console.log(commande)
                                divCommande.removeAttr('data-template');
                                divCommande.find("[data-user]").text(commande.lastname + ' ' + commande.firstname);
                                divCommande.find("[data-status]").text(commande.status);
                                divCommande.find("[data-adresse]").text(commande.billingadress);
                                divCommande.data('data', commande);
                                messages.prepend(divCommande);
                                divCommande.find("a").attr('href', "./comm/changePreparation.php?id=" + commande.id + "&next=preparation")

let commandesNotifiees = JSON.parse(localStorage.getItem('commandesNotifiees'));
if(commandesNotifiees === null)
{
    commandesNotifiees = [];
}

if(!commandesNotifiees.includes(commande.id))
{
    notifyMe();
    commandesNotifiees.push(commande.id);
    localStorage.setItem('commandesNotifiees', JSON.stringify(commandesNotifiees));
}
                                notifyMe();
                            }

                        }
                    }

                    requeteAjax.send();
                }

                const interval = window.setInterval(getCommande, 1000);

                getCommande();

                function notifyMe() {

                    var audio = new Audio('applaudissement.mp3');
                    audio.play();

                    if (!window.Notification) {
                        console.log('Browser does not support notifications.');
                    } else {
                        // check if permission is already granted
                        if (Notification.permission === 'granted') {
                            // show notification here
                            var notify = new Notification('Ho bg!', {
                                body: 'Nouvelle commande',
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