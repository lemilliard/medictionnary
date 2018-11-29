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
                <div class="col-md-8  mb-4 ">


                    <h2 class="h3 mt-4 mb-3">Modifier allergies</h2>
                    <!-- Default switch -->
                    <form>
                        <div class="row justify-content-start">

                            <?php
                            $cpt = 11;

                            for ($i = 1; $i <= $cpt; $i++) {

                                ?>
                                <div class="col-3 col-md-3 col-lg-3 ">
                                    <h4>Allergie <?php echo $i; ?></h4>
                                    <label class="bs-switch">
                                        <input type="checkbox" id="allergies-<?php echo $i; ?>">
                                        <span class="slider round"></span>
                                    </label>


                                </div>

                            <?php } ?>
                            <div class="col-12 col-md-12 col-lg-12 ">
                                <button type="submit" class="btn btn-default">Enregistrer</button>
                            </div>
                        </div>
                    </form>

                </div>


            </div>

    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->


    </div>
</main>
<!--Main layout-->

<?php require('footer.php'); ?>
<script src="js/users/allergies.js"></script>
</body>

</html>