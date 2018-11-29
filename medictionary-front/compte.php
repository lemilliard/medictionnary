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
        <section class="mt-5 ">

            <!--Grid row-->
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-12 ">
                    <?php require('user-menu.php'); ?>
                </div>
                <!--Grid column-->
                <div class="col-md-8 mb-4">


                    <h2 class="h3 mt-4 mb-3">Modifier compte</h2>
                    <form class="md-form">
                        <div class="mx-3">
                            <div class="md-form mb-5">
                                <input type="text" id="loginBis" class="form-control validate" disabled style="    background-color: #e9ecef;
    opacity: 1;"/>
                                <label id="loginBisLabel" data-error="wrong" data-success="right" for="loginBis"
                                       class="disabled">Username</label>
                            </div>

                            <div class="md-form mb-4">
                                <input type="password" id="current-password" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="current-password">Mot de passe
                                    actuel</label>
                            </div>

                            <div class="md-form mb-4">
                                <input type="password" id="password" class="form-control validate">
                                <label data-error="wrong" data-success="right" for="password">Nouveau mot de
                                    passe</label>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
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
<script src="js/users/compte.js"></script>
</body>

</html>