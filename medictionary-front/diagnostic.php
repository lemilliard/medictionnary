<!DOCTYPE html>
<html lang="en">
<?php require('login-modal.php'); ?>
<?php require('register-modal.php'); ?>
<?php require('entete.php'); ?>
<?php
$loc = $_GET['loc'];
switch ($loc) {
    case "earg":
        $zone = "Oreille";
        break;
    case "eard":
        $zone = "Oreille";
        break;
    case "head":
        $zone = "Cheveux";
        break;
    case "skin":
        $zone = "Tête";
        break;
    case "eyeg":
        $zone = "Oeil";
        break;
    case "eyed":
        $zone = "Oeil";
        break;
    case "nose":
        $zone = "Nez";
        break;
    case "lips":
        $zone = "Bouche";
        break;
    case "cou":
        $zone = "Cou";
        break;
    case "armg":
        $zone = "Bras";
        break;
    case "handg":
        $zone = "Main";
        break;
    case "body":
        $zone = "Corps";
        break;
    case "armd":
        $zone = "Bras";
        break;
    case "handd":
        $zone = "Main";
        break;
    case "legg":
        $zone = "Jambe";
        break;
    case "footg":
        $zone = "Pied";
        break;
    case "legd":
        $zone = "Jambe";
        break;
    case "footr":
        $zone = "Pied";
        break;
}


?>

<body>
<script>
function maPosition(position) {
    var infopos = "Position déterminée :\n";
    infopos += "Latitude : " + position.coords.latitude + "\n";
    infopos += "Longitude: " + position.coords.longitude + "\n";
    alert(infopos);
    $.ajax({
        url: "https://192.168.112.17:8444/pharmacies",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({
            casDrug: ["68-88-2"],
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        }),
        success: function (response) {
            alert('succes');
            console.log(response);
        },
        error: function (response) {
            alert('error');
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });
}

function test() {
    $.ajax({
        url: "<?php echo "https://192.168.112.17:8443/symptomZone/${zone}"; ?>",
        method: "GET",
        contentType: "application/json",
        success: function (response) {
            alert('succes');
            console.log(response);
        },
        error: function (response) {
            alert('error');
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });
}

if (navigator.geolocation)
    navigator.geolocation.getCurrentPosition(maPosition);


</script>

<?php require('header.php'); ?>

<!--Main layout-->
<main>
    <div id="autodiagnostic" class="container">

        <!--Section: Main info-->
        <section class="mt-5 wow fadeIn">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-4">

                    <div class="personnage col-12 col-md-5 col-lg-5">
                        <div class="row justify-content-center">

                            <!-- Title -->
                            <h2 class="h3 mb-3">Auto Diagnostic <?php echo $zone; ?></h2>

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


<script>


test();
</script>
</body>

</html>