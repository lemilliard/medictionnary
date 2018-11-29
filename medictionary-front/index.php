<!DOCTYPE html>
<html lang="en">
<?php require('login-modal.php'); ?>
<?php require('register-modal.php'); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Auto-diagnostic & Précommande en ligne avec Medictionnary</title>
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

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-github mr-2"></i>
                        </a>
                    </li>
                </ul>
                <?php $is_login = false;
                if ($is_login) { ?>
                    <a class="nav-link" href="/edit-user">Mon compte</a>
                    <button type="button" class="btn  btn-outline-white waves-effect" data-toggle="modal"
                            data-target="#modalLoginForm">Se connecter
                    </button>
                    <button type="button" class="btn  btn-outline-white waves-effect" data-toggle="modal"
                            data-target="#modalRegisterForm">S'enregistrer
                    </button>
                <?php } else { ?>
                    <!--<li><a href="connexion" class="btn btn-link" data-toggle="modal" data-target="#modalLoginForm">Se connecter</a></li>
                    <li><a href="register"  class="btn btn-link" data-toggle="modal" data-target="#modalRegisterForm">S'enregistrer</a></li>-->
                    <a class="nav-link" href="/edit-user">Mon compte</a>
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

                        <h1 class="display-4 font-weight-bold" style="text-transform: uppercase;">Auto-diagnostic <br>en
                            ligne & gratuit</h1>

                        <hr class="hr-light">

                        <h2>
                            <strong>Précommandez vos médicaments</strong>
                        </h2>

                        <p class="mb-4 d-none d-md-block">
                            <strong>Etablissez un auto-diagnostic en ligne et précommandé vos médicaments à retirer dans
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

</header>

<!--Main layout-->
<main>
    <div id="autodiagnostic" class="container">

        <!--Section: Main info-->
        <section class="mt-5 wow fadeIn">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4">
                    <!-- Main heading -->
                    <h2 class="h3 mb-3">Réalise ton auto-diagnostic maintenant</h2>
                    <p>Utilisez le personnage ci-dessous pour identifier la zone concerné par votre auto-diagnostic.</p>
                    <p>Une liste de symptôme de la zone sélectionné vous sera proposé.</p>
                    <!-- Main heading -->
                </div>
                <div class="personnage col-6 col-md-6 col-lg-6">
                    <div class="row justify-content-center">
                        <div class="col col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-2 col-md-2">
                                    <a href="diagnostic?loc=earg">
                                        <div class="ear" data-toggle="tooltip" title="Oreille gauche"></div>
                                    </a>
                                </div>
                                <div class="col-6 col-md-6 ">
                                    <a href="diagnostic?loc=head">
                                        <div class="head" data-toggle="tooltip" title="Cheveux"></div>
                                    </a>

                                    <a href="diagnostic?loc=skin">
                                        <div class="skin">
                                            <a href="diagnostic?loc=eyed">
                                                <div class="eye1" data-toggle="tooltip" title="Oeil droit"></div>
                                            </a>
                                            <a href="diagnostic?loc=eyeg">
                                                <div class="eye" data-toggle="tooltip" title="Oeil gauche"></div>
                                            </a>
                                            <a href="diagnostic?loc=nose">
                                                <div class="nose" data-toggle="tooltip" title="Nez"></div>
                                            </a>
                                            <a href="diagnostic?loc=lips">
                                                <div class="lips" data-toggle="tooltip" title="Bouche"></div>
                                            </a>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-2 col-md-2">
                                    <a href="diagnostic?loc=eard">
                                        <div class="ear2" data-toggle="tooltip" title="Oreille droite"></div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-2 col-md-2" style="margin: 0 auto;">
                                    <a href="diagnostic?loc=cou">
                                        <div class="cou" data-toggle="tooltip" title="Cou"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-2 col-md-2">
                                    <div class="armleft">
                                        <a href="diagnostic?loc=armg">
                                            <div class="arm" data-toggle="tooltip" title="Bras gauche"></div>
                                        </a>
                                        <a href="diagnostic?loc=handg">
                                            <div class="hand" data-toggle="tooltip" title="Main gauche"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 col-md-6 ">
                                    <a href="diagnostic?loc=body">
                                        <div class="body" data-toggle="tooltip" title="Corps"></div>
                                    </a>
                                </div>
                                <div class="col-2 col-md-2">
                                    <div class="armright">
                                        <a href="diagnostic?loc=armd">
                                            <div class="arm" data-toggle="tooltip" title="Bras droit"></div>
                                        </a>
                                        <a href="diagnostic?loc=handd">
                                            <div class="hand" data-toggle="tooltip" title="Main droite"></div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8 col-md-8">
                            <div class="row justify-content-center">
                                <div class="col-2 col-md-4">
                                    <a href="diagnostic?loc=legg">
                                        <div class="leg" data-toggle="tooltip" title="Jambe gauche"></div>
                                    </a>
                                    <a href="diagnostic?loc=footg">
                                        <div class="foot" data-toggle="tooltip" title="Pied gauche"></div>
                                    </a>
                                </div>
                                <div class="col-1 col-md-4 ">
                                </div>
                                <div class="col-2 col-md-4 ">
                                    <a href="diagnostic?loc=legd">
                                        <div class="leg2" data-toggle="tooltip" title="Jambe droite"></div>
                                    </a>
                                    <a href="diagnostic?loc=footd">
                                        <div class="foot2" data-toggle="tooltip" title="Pied droit"></div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Main info-->

        <hr class="my-5">

        <!--Section: Main features & Quick Start-->
        <section>

            <h3 class="h3 text-center mb-5">About MDB</h3>

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-lg-6 col-md-12 px-4">

                    <!--First row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-code fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Bootstrap 4</h5>
                            <p class="grey-text">Thanks to MDB you can take advantage of all feature of newest Bootstrap
                                4.</p>
                        </div>
                    </div>
                    <!--/First row-->

                    <div style="height:30px"></div>

                    <!--Second row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-book fa-2x blue-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Detailed documentation</h5>
                            <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It
                                will help you to implement your ideas
                                easily.
                            </p>
                        </div>
                    </div>
                    <!--/Second row-->

                    <div style="height:30px"></div>

                    <!--Third row-->
                    <div class="row">
                        <div class="col-1 mr-3">
                            <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="feature-title">Lots of tutorials</h5>
                            <p class="grey-text">We care about the development of our users. We have prepared numerous
                                tutorials, which allow you to learn
                                how to use MDB as well as other technologies.</p>
                        </div>
                    </div>
                    <!--/Third row-->

                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-lg-6 col-md-12">

                    <p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ"
                                allowfullscreen></iframe>
                    </div>
                </div>
                <!--/Grid column-->

            </div>
            <!--/Grid row-->

        </section>
        <!--Section: Main features & Quick Start-->

        <hr class="my-5">

        <!--Section: Not enough-->
        <section>

            <h2 class="my-5 h3 text-center">Not enough?</h2>

            <!--First row-->
            <div class="row features-small mb-5 mt-3 wow fadeIn">

                <!--First column-->
                <div class="col-md-4">
                    <!--First row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Free for personal and commercial use</h6>
                            <p class="grey-text">Our license is user-friendly. Feel free to use MDB for both private as
                                well as commercial projects.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/First row-->

                    <!--Second row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">400+ UI elements</h6>
                            <p class="grey-text">An impressive collection of flexible components allows you to develop
                                any project.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Second row-->

                    <!--Third row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">600+ icons</h6>
                            <p class="grey-text">Hundreds of useful, scalable, vector icons at your disposal.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Third row-->

                    <!--Fourth row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Fully responsive</h6>
                            <p class="grey-text">It doesn't matter whether your project will be displayed on desktop,
                                laptop, tablet or mobile phone. MDB
                                looks great on each screen.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Fourth row-->
                </div>
                <!--/First column-->

                <!--Second column-->
                <div class="col-md-4 flex-center">
                    <img src="https://mdbootstrap.com/img/Others/screens.png"
                         alt="MDB Magazine Template displayed on iPhone" class="z-depth-0 img-fluid">
                </div>
                <!--/Second column-->

                <!--Third column-->
                <div class="col-md-4 mt-2">
                    <!--First row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">70+ CSS animations</h6>
                            <p class="grey-text">Neat and easy to use animations, which will increase the interactivity
                                of your project and delight your visitors.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/First row-->

                    <!--Second row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Plenty of useful templates</h6>
                            <p class="grey-text">Need inspiration? Use one of our predefined templates for free.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Second row-->

                    <!--Third row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Easy installation</h6>
                            <p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy
                                it is.
                            </p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Third row-->

                    <!--Fourth row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-check-circle fa-2x indigo-text"></i>
                        </div>
                        <div class="col-10">
                            <h6 class="feature-title">Easy to use and customize</h6>
                            <p class="grey-text">Using MDB is straightforward and pleasant. Components flexibility
                                allows you deep customization. You will
                                easily adjust each component to suit your needs.</p>
                            <div style="height:15px"></div>
                        </div>
                    </div>
                    <!--/Fourth row-->
                </div>
                <!--/Third column-->

            </div>
            <!--/First row-->

        </section>
        <!--Section: Not enough-->

        <hr class="mb-5">

        <!--Section: More-->
        <section>

            <h2 class="my-5 h3 text-center">...and even more</h2>

            <!--First row-->
            <div class="row features-small mt-5 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-firefox fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2 pl-3">
                            <h5 class="feature-title font-bold mb-1">Cross-browser compatibility</h5>
                            <p class="grey-text mt-2">Chrome, Firefox, IE, Safari, Opera, Microsoft Edge - MDB loves all
                                browsers; all browsers love MDB.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-level-up fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Frequent updates</h5>
                            <p class="grey-text mt-2">MDB becomes better every month. We love the project and enhance as
                                much as possible.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-comments-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Active community</h5>
                            <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is
                                to be a part of our family.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-code fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">jQuery 3.x</h5>
                            <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all
                                the latest features which come along with
                                it.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/First row-->

            <!--Second row-->
            <div class="row features-small mt-4 wow fadeIn">

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-cubes fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Modularity</h5>
                            <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to
                                use libraries including all features as
                                well as modules for CSS (SASS files) and JS.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-question fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Technical support</h5>
                            <p class="grey-text mt-2">We care about reliability. If you have any questions - do not
                                hesitate to contact us.
                            </p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-th fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">Flexbox</h5>
                            <p class="grey-text mt-2">MDB fully supports Flex Box. You can forget about alignment
                                issues.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

                <!--Grid column-->
                <div class="col-xl-3 col-lg-6">
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-2">
                            <i class="fa fa-file-code-o fa-2x mb-1 indigo-text" aria-hidden="true"></i>
                        </div>
                        <div class="col-10 mb-2">
                            <h5 class="feature-title font-bold mb-1">SASS files</h5>
                            <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you
                                compile them.</p>
                        </div>
                    </div>
                    <!--/Grid row-->
                </div>
                <!--/Grid column-->

            </div>
            <!--/Second row-->

        </section>
        <!--Section: More-->

    </div>
</main>
<!--Main layout-->
<?php require('footer.php'); ?>
</body>

</html>