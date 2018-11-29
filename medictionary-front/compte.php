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

<script type="text/javascript">
var cookies = document.cookie;
if (!cookies.includes("idUser")) {
    document.location.href = "https://medictionnary.cgonline.fr";
}
</script>

<!--Main layout-->
<main>
    <div id="autodiagnostic" class="container">

        <!--Section: Main info-->
        <section class="mt-5 ">

            <!--Grid row-->
            <div class="row">
                <div class="col-12 col-lg-4">
                    <?php require('user-menu.php'); ?>
                </div>
                <!--Grid column-->
                <div class="col-md-7 mb-4 offset-md-1">


                    <h2 class="h3 mb-3">Modifier compte</h2>
                    <form class="md-form">
                        <div class="mx-3">
                            <div class="md-form mb-5">
                                <input type="text" id="login" class="form-control validate" disabled>
                                <label data-error="wrong" data-success="right" for="login">Username</label>
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
                        <p class="grey-text">We give you detailed user-friendly documentation at your disposal. It will
                            help you to implement your ideas
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
                        <p class="grey-text">Our license is user-friendly. Feel free to use MDB for both private as well
                            as commercial projects.
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
                        <p class="grey-text">An impressive collection of flexible components allows you to develop any
                            project.
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
                        <p class="grey-text">Neat and easy to use animations, which will increase the interactivity of
                            your project and delight your visitors.
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
                        <p class="grey-text">5 minutes, a few clicks and... done. You will be surprised at how easy it
                            is.
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
                        <p class="grey-text">Using MDB is straightforward and pleasant. Components flexibility allows
                            you deep customization. You will
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
                        <p class="grey-text mt-2">Our society grows day by day. Visit our forum and check how it is to
                            be a part of our family.
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
                        <p class="grey-text mt-2">MDB is integrated with newest jQuery. Therefore you can use all the
                            latest features which come along with
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
                        <p class="grey-text mt-2">Material Design for Bootstrap comes with both, compiled, ready to use
                            libraries including all features as
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
                        <p class="grey-text mt-2">We care about reliability. If you have any questions - do not hesitate
                            to contact us.
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
                        <p class="grey-text mt-2">Arranged and well documented .scss files can't wait until you compile
                            them.</p>
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