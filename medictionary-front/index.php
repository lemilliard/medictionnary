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