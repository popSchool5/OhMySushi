    <?php
    session_start();
    if (!empty($_SESSION)) {
        require('./assets/componant/co_bdd.php');
        require('./assets/function/function.php');
        require('./assets/componant/header.php');
        $listUsers = viewUsersList();


    ?>

        <!-- BEGIN: Content-->
        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- users list start -->
                    <section class="users-list-wrapper">
                       
                        <div class="users-list-table">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatable start -->
                                    <div class="table-responsive">
                                        <table id="users-list-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Email</th>

                                                    <th>Modifier</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listUsers as $user) { ?>
                                                    <tr>
                                                        <td><?= $user['id'] ?></td>
                                                        <td><a href="./app-users-view.php?id=<?=$user['id']?>"><?= $user['firstname'] ?></a>
                                                        </td>
                                                        <td><?= $user['lastname'] ?></td>
                                                        <td><?= $user['email'] ?></td>

                                                        <td><a href=""><i class="bx bx-edit-alt"></i></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- datatable ends -->
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- users list ends -->

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