<!DOCTYPE html>
<html lang="en">
<?php require ('login-modal.php'); ?>
<?php require ('register-modal.php'); ?>
<?php require ('entete.php'); ?>

<body>

  <?php require ('header.php'); ?>

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
					<?php 
						$loc = $_GET['loc'];				
						switch($loc){
							case "earg":
								$zone = "Oreille gauche";
								break;
							case "eard":
								$zone = "Oreille droite";
								break;
							case "head":
								$zone = "Cheveux";
								break;
							case "skin":
								$zone = "Tête";
								break;
							case "eyeg":
								$zone = "Oeil gauche";
								break;
							case "eyed":
								$zone = "Oeil droit";
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
								$zone = "Bras gauche";
								break;
							case "handg":
								$zone = "Main gauche";
								break;
							case "body":
								$zone = "Corps";
								break;
							case "armd":
								$zone = "Bras droit";
								break;
							case "handd":
								$zone = "Main droite";
								break;
							case "legg":
								$zone = "Jambe gauche";
								break;
							case "footg":
								$zone = "Pied gauche";
								break;
							case "legd":
								$zone = "Jambe droite";
								break;
							case "footr":
								$zone = "Pied droit";
								break;
						}
						
//						$url = "192.168.112.17/symptomZone/"
//						$ch = curl_init();
//						curl_setopt_array($curl, array(
//							CURLOPT_RETURNTRANSFER => 1,
//							CURLOPT_URL => $url + $zone
//						));
//
//						$result = curl_exec($ch);
//
//						curl_close($ch);
//
//						var_dump(json_decode($result, true));
						?>
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
<?php require ('footer.php'); ?>
</body>

</html>