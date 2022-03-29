<?php
session_start();
if (!empty($_SESSION)) {
    require('./assets/componant/co_bdd.php');
    require('./assets/function/function.php');
    require('./assets/componant/header.php');
    $bg = viewMenu();
    // echo 'lorem10';
    // var_dump($_GET);

?>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="breadcrumbs-top">
                        <h5 class="content-header-title float-left pr-1 mb-0">Menu du restaurent</h5>
                        <div class="breadcrumb-wrapper d-none d-sm-block">
                            <ol class="breadcrumb p-0 mb-0 pl-1">
                                <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item actuve"><a href="#">Menu</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="buttonAddMenu text-center">
                <button type="button" class="btn btn-outline-success round mr-1 mb-1" data-toggle="modal" data-target="#exampleModalLong">Ajouter produit</button>


                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Ajout d'un nouveau produit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="./menu/addMenu.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Nom du produit: </label>
                                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="sushi de bg">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Donner une description au produit:</label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Prix du produit (en TTC): </label>
                                        <input type="number" step="0.01" name="price" class="form-control" id="exampleFormControlInput1">
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Choix de la catégorie pour le produit: </label>
                                        <select class="form-control" name="category" id="exampleFormControlSelect1">
                                            <?php
                                            $category = viewCategory();
                                            foreach ($category as $cat) {
                                            ?>
                                                <option value="<?= $cat['id'] ?>"><?= $cat['label'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Choix de la TVA pour le produit: </label>
                                        <select class="form-control" name="tva" id="exampleFormControlSelect1">
                                            <?php
                                            $tvas = viewTva();
                                            foreach ($tvas as $tva) {
                                            ?>
                                                <option value="<?= $tva['id'] ?>"><?= $tva['rate'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="exampleFormControlFile1">Image du produit :</label>
                                        <input name="images" type="file" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <style>
                .active {
                    background-color: red;
                }
            </style>
            <script>
                $(".trieParCategorie").click(function() {

                    if ($(this).find("button").hasClass("active")) {
                        //console.log("Active class seen");
                        $(this).find("button").removeClass("active");
                        $(this).addClass("active");

                    }
                });
            </script>
            <div class=" trieParCategorie">
                <button class="btn btn-outline-success round mr-1 mb-1" data-name="*">
                    tout
                </button>
                <?php
                $trieCategories = viewCategory();
                foreach ($trieCategories as $trieCategorie) {


                ?>
                    <button class="btn btn-outline-success bgbg round mr-1 mb-1" class="triecategorie" data-name=".<?= $trieCategorie['label'] ?>">
                        <?= $trieCategorie['label']; ?>
                    </button>
                <?php } ?>
                <section id="table-success">
                    <div class="card">
                        <!-- datatable start -->
                        <div class="table-responsive">
                            <div id="table-extended-success_wrapper" class="dataTables_wrapper no-footer">
                                <table id="table-extended-success" class="table mb-0 dataTable no-footer" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="table-extended-success" rowspan="1" colspan="1" aria-sort="ascending" aria-label="campaign: activate to sort column descending" style="width: 261.672px;">Produit</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="account details" style="width: 120.219px;">Nom du produit</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="category" style="width: 381.938px;">Description</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="amount" style="width: 118.016px;">catégorie</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="status" style="width: 123.109px;">prix</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="action" style="width: 148.047px;">Stock</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="action" style="width: 100.047px;">Action</th>
                                        </tr>
                                    </thead>
                                    <!-- TODO grid isotope je comprend pas  -->
                                    <!-- <tbody class="grid"> -->
                                    <tbody>

                                        <?php
                                        foreach ($bg as $menu) {
                                            $stockvalue = $menu['stoc'];

                                        ?>

                                            <tr role="row" class="gridgt <?= $menu['label'] ?>" class="odd">
                                                <td class="text-bold-600 pr-0 sorting_1"><img class=" mr-1" src="./assets/uploads/<?= $menu['image'] ?>" width="55%" alt="card"></td>
                                                <td><?= $menu['name'] ?></td>
                                                <td class="text-bold-600"><span><?= $menu['description'] ?></span>
                                                </td>
                                                <td class="text-bold-600"><?= $menu['label'] ?></td>
                                                <td class=""><?= number_format($menu['prixTotal'], 2, ',', '');  ?> €</td>
                                                <td class="text-success">
                                                    <fieldset class="form-group">

                                                        <form method="POST" action="./menu/modifMenu.php">

                                                            <select class="form-control" name="stock" onchange="postMenuStock(<?= $menu['id'] ?>)" id="basicSelect">

                                                                <option <?php if ($stockvalue == 'enstock') {
                                                                            echo 'selected';
                                                                        } ?> value="enstock">En stock</option>
                                                                <option <?php if ($stockvalue == 'rupture') {
                                                                            echo 'selected';
                                                                        } ?> value="rupture">En Rupture</option>
                                                            </select>

                                                        </form>
                                                    </fieldset>
                                                </td>
                                                <td>
                                                    <div class="dropdown" _msthidden="2">
                                                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                                        <div class="dropdown-menu dropdown-menu-right" _msthidden="2">
                                                            <a class="dropdown-item" data-toggle="modal" data-target="[data-bg='<?= $menu['id'] ?>']" href="javascript:void(0);" _msthidden="1"><i class="bx bx-edit-alt mr-1"></i>
                                                                <font _mstmutation="1" _msthash="2379715" _msttexthash="46956" _msthidden="1">Modifier</font>
                                                            </a>
                                                            <a class="dropdown-item" href="./menu/deleteMenu.php?id=<?= $menu['id']; ?>" _msthidden="1"><i class="bx bx-trash mr-1"></i>
                                                                Supprimer
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- MODAL DE LA MODIFICATION DU PRODUIT -->
                                            <div class="modal fade" data-bg='<?= htmlspecialchars($menu['id']) ?>' id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"><?= $menu['name'] ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="./menu/updateMenu.php" method="post" enctype="multipart/form-data">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Nom du produit: </label>
                                                                    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="<?= htmlspecialchars($menu['name']) ?>" placeholder="sushi de bg">
                                                                </div>


                                                                <div class="form-group">
                                                                    <label for="exampleFormControlTextarea1">Donner une description au produit:</label>
                                                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?= htmlspecialchars($menu['description']) ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlInput1">Prix du produit (en TTC): </label>
                                                                    <input type="number" name="price" class="form-control" id="exampleFormControlInput1" value="<?= htmlspecialchars($menu['price']) ?>">
                                                                </div>



                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Choix de la catégorie pour le produit: </label>
                                                                    <select class="form-control" name="category" id="exampleFormControlSelect1">
                                                                        <?php
                                                                        $category = viewCategory();
                                                                        foreach ($category as $cat) {
                                                                        ?>
                                                                            <option value="<?= $cat['id'] ?>"><?= $cat['label'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Modification de la TVA pour le produit: </label>
                                                                    <select class="form-control" name="tva" id="exampleFormControlSelect1">
                                                                        <?php
                                                                        $tvas = viewTva();

                                                                        foreach ($tvas as $tva) {

                                                                        ?>
                                                                            <option value="<?= $tva['id'] ?>"><?= $tva['rate'] ?></option>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group mt-2">
                                                                    <label for="exampleFormControlFile1">Image du produit :</label>
                                                                    <input name="images" value="<?= htmlspecialchars($menu['image']) ?>" type="file" class="form-control-file" id="exampleFormControlFile1">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- fin modal modification du produit -->
                                        <?php
                                        }

                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- datatable ends -->
                    </div>
                </section>
                <script>
                    function postMenuStock(v) {

                        let id = v;
                        let stock = document.getElementById('basicSelect').value;
                        const data = new FormData();
                        data.append('stock', stock);
                        data.append('id', id);

                        const requeteAjax = new XMLHttpRequest();
                        requeteAjax.open('POST', './menu/modifMenu.php');
                        requeteAjax.onload = function() {

                            // console.log(id);

                        }
                        requeteAjax.send(data);

                    }
                </script>

            </div>
        </div>
    </div>
    </div>
    <!-- END: Content-->

<?php
    require('./assets/componant/footer.php');
} else {
    header('location:auth-login.php');
}

?>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
    // console.log('bg')
    var $grid = $('.gride').isotope({

        itemSelector: '.gridgt',
        layoutMode: 'vertical'
    });

    $('button').on('click', function() {

        var value = $(this).attr('data-name');
        console.log(this.onPress);

        $grid.isotope({
            filter: value
        });
    })
</script>