<!DOCTYPE html>
<html lang="en">
<?php require('login-modal.php'); ?>
<?php require('register-modal.php'); ?>
<?php require('entete.php'); ?>

<body>

<?php require('header.php'); ?>

<!--Main layout-->
<main>
    <div id="autodiagnostic" class="container">

        <!--Section: Main info-->
        <section class="mt-5">

            <!--Grid row-->
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-12 ">
                    <?php require('user-menu.php'); ?>
                </div>
                <!--Grid column-->
                <div class="col-md-8 mb-4">


                    <h2 class="h3 mt-4 mb-3">Liste des commandes</h2>
                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Date</th>
                            <th class="th-sm">Médicaments</th>
                            <th class="th-sm">Pharmacie</th>
                        </tr>
                        </thead>
                        <tbody id="commandes-list">
                        </tbody>
                    </table>

                </div>


            </div>

    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->

    </section>
    <!--Section: Main info-->

    </div>
</main>
<!--Main layout-->

<?php require('footer.php'); ?>
<script src="js/users/commandes.js"></script>
</body>

</html>