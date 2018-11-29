$(document).ready(function () {
    if (!document.cookie.includes("idUser")) {
        localStorage.removeItem("user");
    }
	
    $('#update_compte').on("submit", function (event) {
        event.preventDefault();
        if ($('#new-password').val() == "") {
            alert("Un nouveau mot de passe est requis");
        }

        else {
            var user = JSON.parse(localStorage.getItem("user"));
			var myid = user.idUser;
			var mylogin = user.login;
			
			var mynumss =  user.socialSecurityNumber;
            var myfirstname =  user.firstname;
            var mylastname =  user.lastname;
            var myweight =  user.weight;
			
			
			var newpass = $('#new-password').val();

            $.ajax({
                url: "https://192.168.112.17:8443/user",
                method: "PUT",
                contentType: "application/json",
                data: JSON.stringify({
					idUser : myid,
					login: mylogin,
					password : newpass,
                    socialSecurityNumber: mynumss,
                    firstname: myfirstname,
                    lastname: mylastname,
                    weight: myweight,
                }),
                beforeSend: function () {
                   $('#update_compte_btn').text("Mise à jour");
                },
                success: function (response) {
                    $('#socialSecurityNumberBis').val(mynumss);
                    $('#firstnameBis').val(myfirstname);
                    $('#lastnameBis').val(mylastname);
                    $('#weightBis').val(myweight);
                    //$('.statusMsg').html('<span style="color:green;">Vos données ont bien été mises à jour.</p>');
                    console.log(response);
                    localStorage.setItem("user", JSON.stringify(response));
                    document.cookie = "idUser=" + response.idUser;
                    document.location.href = "/edit-user";
					//$('#update_user_btn').text("Enregistrer");
					 $('#update_compte_btn').text("Mise à jour");
                },
                error: function (response) {
                    $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
					console.log(response);
                }
            });
        }
    });
});