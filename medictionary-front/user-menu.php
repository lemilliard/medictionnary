<script>
if (!document.cookie.includes("idUser")) {
    window.location.href = "https://medictionnary.cgonline.fr"
}
</script>
<?php if (basename($_SERVER['PHP_SELF']) == 'compte.php') { ?>
	<button id="allergies-page" class="btn btn-warning btn-sm " onclick="location.href = '/compte';">Compte</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/edit-user';">Profil</button>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/allergies';">Allergies</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/commandes';">Commandes</button>
<?php }else if (basename($_SERVER['PHP_SELF']) == 'edit-user.php') { ?>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/compte';">Compte</button>
	<button class="btn btn-warning btn-sm " onclick="location.href = '/edit-user';">Profil</button>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/allergies';">Allergies</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/commandes';">Commandes</button>
<?php }else if (basename($_SERVER['PHP_SELF']) == 'allergies.php') { ?>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/compte';">Compte</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/edit-user';">Profil</button>
	<button id="allergies-page" class="btn btn-warning btn-sm " onclick="location.href = '/allergies';">Allergies</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/commandes';">Commandes</button>
<?php }else if (basename($_SERVER['PHP_SELF']) == 'commandes.php') { ?>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/compte';">Compte</button>
	<button class="btn btn-light btn-sm " onclick="location.href = '/edit-user';">Profil</button>
	<button id="allergies-page" class="btn btn-light btn-sm " onclick="location.href = '/allergies';">Allergies</button>
	<button class="btn btn-warning btn-sm " onclick="location.href = '/commandes';">Commandes</button>
<?php } ?>