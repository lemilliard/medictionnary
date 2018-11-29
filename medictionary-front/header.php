<?php
// Récupération de l'user
$is_login = !(isset($_COOKIE["idUser"]) || is_null($_COOKIE["idUser"]));

if (basename($_SERVER['PHP_SELF']) != 'index.php') {
    ?>

    <style>
        .navbar {
            background: #1C2331 !important;
        }

        header {
            height: 100px;
        }
    </style>

    <?php
}


?>

<header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand" href="https://medictionnary.cgonline.fr">
                <i class="fa fa-medkit ml-2"></i> <strong>MEDICTIONNARY</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <?php if ($is_login) { ?>
                    <a class="nav-link" href="/edit-user">
                        <button type="button" class="btn  btn-white btn-rounded waves-effect" data-toggle="modal"
                                data-target="#modalLoginForm">
                            Mon compte
                        </button>
                    </a>
                    <button type="button" id="logout-btn" class="btn  btn-warning btn-rounded waves-effect">
                        Se déconnecter
                    </button>
                <?php } else { ?>
                    <!--<li><a href="connexion" class="btn btn-link" data-toggle="modal" data-target="#modalLoginForm">Se connecter</a></li>
                    <li><a href="register"  class="btn btn-link" data-toggle="modal" data-target="#modalRegisterForm">S'enregistrer</a></li>-->
                    <!--                    <a class="nav-link" href="/edit-user">Mon compte</a>-->
                    <button type="button" class="btn  btn-white btn-rounded waves-effect" data-toggle="modal"
                            data-target="#modalLoginForm">Se connecter
                    </button>
                    <button type="button" class="btn  btn-warning btn-rounded waves-effect" data-toggle="modal"
                            data-target="#modalRegisterForm">S'enregistrer
                    </button>

                <?php } ?>
            </div>

        </div>
    </nav>
    <!-- Navbar -->
    <?php if (basename($_SERVER['PHP_SELF']) === 'index.php') { ?>
        <!-- Full Page Intro -->
        <div class="view full-page-intro">

            <!--Video source-->
            <video class="video-intro" autoplay loop muted>
                <source src="https://mdbootstrap.com/img/video/animation-intro.mp4" type="video/mp4"/>
            </video>

            <!-- Mask & flexbox options-->
            <div class="mask rgba-blue-light d-flex justify-content-center align-items-center">

                <!-- Content -->
                <div class="container">

                    <!--Grid row-->
                    <div class="row d-flex h-100 justify-content-center align-items-center wow fadeIn">

                        <!--Grid column-->
                        <div class="col-md-6 mb-4 white-text text-center text-md-left">

                            <h1 class="display-4 font-weight-bold" style="text-transform: uppercase;">Auto-diagnostic
                                <br>en
                                ligne & gratuit</h1>

                            <hr class="hr-light">

                            <h2>
                                <strong>Précommandez vos médicaments</strong>
                            </h2>

                            <p class="mb-4 d-none d-md-block">
                                <strong>Etablissez un auto-diagnostic en ligne et précommandé vos médicaments à retirer
                                    dans
                                    la pharmacie la plus proche.</strong>
                            </p>

                            <a href="#autodiagnostic" class="btn btn-warning btn-rounded">Auto-diagnostic
                            </a>


                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 col-xl-5 mb-4">

                            <img src="https://mdbootstrap.com/img/Mockups/Transparent/Small/admin-new.png" alt=""
                                 class="img-fluid">

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                </div>
                <!-- Content -->

            </div>
            <!-- Mask & flexbox options-->

        </div>
        <!-- Full Page Intro -->
    <?php } ?>
</header>