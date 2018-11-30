$(document).ready(function () {
    $('#update_user').on("submit", function (event) {

        event.preventDefault();
        if ($('#socialSecurityNumberBis').val() == "") {
            alert("Un numéro de sécurité social est requis");
        }
        else if ($('#firstnameBis').val() == "") {
            alert("Un prénom est requis");
        }
        else if ($('#lastnameBis').val() == '') {
            alert("Un nom est requis");
        }
        /*else if($('#email').val() == '')
        {
         alert("Une adresse email est requise");
        }*/
        else if ($('#weightBis').val() == '') {
            alert("Un poids est requis");
        }

        else {
            var user = JSON.parse(localStorage.getItem("user"));
            var mynumss = $('#socialSecurityNumberBis').val();
            var myfirstname = $('#firstnameBis').val();
            var mylastname = $('#lastnameBis').val();
            var myweight = $('#weightBis').val();

            var stringUser = JSON.stringify({
                idUser: user.idUser,
                login: user.login,
                password: user.password,
                socialSecurityNumber: mynumss,
                firstname: myfirstname,
                lastname: mylastname,
                weight: myweight
            });

            console.log(stringUser);

            $.ajax({
                url: "https://localhost:8443/user",
                method: "PUT",
                contentType: "application/json",
                data: stringUser,
                beforeSend: function () {
                    $('#update_user_btn').text("Mise à jour");
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
                    $('#update_user_btn').text("Mise à jour");
                },
                error: function (response) {
                    $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                    console.log(response);
                }
            });
        }
    });
});