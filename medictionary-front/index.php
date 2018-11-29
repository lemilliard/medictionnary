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
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-4">
                    <!-- Main heading -->
                    <h2 class="h3 mb-3">Réalise ton auto-diagnostic maintenant</h2>
                    <p>Utilisez le personnage ci-dessous pour identifier la zone concerné par votre auto-diagnostic.</p>
                    <p>Une liste de symptôme de la zone sélectionné vous sera proposé.</p>
                    <!-- Main heading -->


                </div>

                <div class="col-md-6">
                    <div id="zonesdiv" class="row justify-content-start">
                        <select id="liste-zone" class="browser-default custom-select">
                            <option selected>Sélectionnez une zone</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div id="symptomesdiv" class="row justify-content-start">
                        <select id="liste-symptome" class="browser-default custom-select">
                            <option selected>Sélectionnez un/des symptôme(s)</option>
                        </select>
                    </div>
                </div>

                <div class=" col-12 col-md-12 col-lg-12 mt-4 mb-4">
                    <div id="symptomeschoisisdiv" class="row justify-content-start"></div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 ">
                    <button id="diagnostic_btn" type="submit" class="btn btn-default" style="display: none">
                        Diagnostic
                    </button>
                </div>
                <div class="personnage col-12 col-md-6 col-lg-6">
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
    </div>
</main>
<!--Main layout-->
<?php require('footer.php'); ?>
<script src="js/users/diagnostic.js"></script>
</body>

</html>