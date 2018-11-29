$(document).ready(function () {
    $('#signup_form').on("submit", function (event) {

        event.preventDefault();
        if ($('#login').val() == "") {
            alert("Un nom d'utilisateur est requis");
        }
        else if ($('#socialSecurityNumber').val() == '') {
            alert("Votre numéro de sécurité sociale est requis");
        }
        /*else if($('#email').val() == '')
        {
         alert("Une adresse email est requise");
        }*/
        else if ($('#password').val() == '') {
            alert("Un mot de passe est requis");
        }

        else {
            var mylogin = $('#login').val();
            var mysocialSecurityNumber = $('#socialSecurityNumber').val();
            var mypassword = $('#password').val()

            $.ajax({
                url: "https://192.168.112.17:8443/user",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({
                    login: mylogin,
                    socialSecurityNumber: mysocialSecurityNumber,
                    password: mypassword
                }),
                beforeSend: function () {
                    $('#signup_form_btn').text("Enregistrement en cours");
                },
                success: function (response) {
                    $('#username').val('');
                    $('#socialSecurityNumber').val('');
                    $('#password').val('');
                    $('.statusMsg').html('<span style="color:green;">Merci pour votre inscription.</p>');
                    console.log(response);
                    document.cookie = "idUser=" + response.idUser;
                    document.location.href = "/edit-user"

                },
                error: function () {
                    $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                }
            });
        }
    });
});