<!DOCTYPE html>
<html lang="en">
<?php require('login-modal.php'); ?>
<?php require('register-modal.php'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Auto-diagnostic & Précommande en ligne avec Medictionary</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css-diag/styles.css">
    <link href="css/style.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        header {
            height: 100px;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1050px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 700px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331 !important;
            }
        }


    </style>
</head>

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
                <div class="col-md-8 mb-4 ">
                    <h2 class="h3 mt-4 mb-3">Modifier profil</h2>
                    <form id="update_user" class="md-form">
                        <div class="mx-3">
                            <div class="md-form mb-5">
                                <input type="text" id="socialSecurityNumberBis" class="form-control validate">
                                <label id="socialSecurityNumberBisLabel" data-error="wrong" data-success="right"
                                       for="socialSecurityNumberBis">Numéro
                                    sécurité sociale</label>
                            </div>
                            <div class="md-form mb-5">
                                <input type="text" id="firstnameBis" class="form-control validate">
                                <label id="firstnameBisLabel" data-error="wrong" data-success="right"
                                       for="firstnameBis">Prénom</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="lastnameBis" class="form-control validate">
                                <label id="lastnameBisLabel" data-error="wrong" data-success="right"
                                       for="lastnameBis">Nom</label>
                            </div>

                            <div class="md-form mb-5">
                                <input type="text" id="weightBis" class="form-control validate">
                                <label id="weightBisLabel" data-error="wrong" data-success="right"
                                       for="weightBis">Poids</label>
                            </div>

                        </div>
                        <button type="submit" id="update_user_btn" class="btn btn-default">Enregistrer</button>
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
<script src="./js/users/edit-user.js"></script>
<script src="./js/users/update-user.js"></script>
</body>

</html>