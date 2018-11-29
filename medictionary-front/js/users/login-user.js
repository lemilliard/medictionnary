$(document).ready(function () {
    $('#login_form').on("submit", function (event) {

        event.preventDefault();
        if ($('#loginc').val() == "") {
            alert("Un nom d'utilisateur est requis");
        }
        else if ($('#passwordc').val() == '') {
            alert("Un mot de passe est requis");
        }

        else {

            var mylogin = $('#loginc').val();
            var mypassword = $('#passwordc').val()

            $.ajax({
                url: "https://192.168.112.17:8443/user/login",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({ login: mylogin, password: mypassword }),
                beforeSend: function () {
                    $('#login_form_btn').val("Connexion en cours");
                },
                success: function (response) {
                    alert('succes');
                    $('#login').val('');
                    $('#password').val('');
                    $('.statusMsg').html('<span style="color:green;">Identifiants corrects.</p>');
                    console.log(response);
                    document.cookie = "idUser=" + response.idUser;
                    document.location.href = "/edit-user";

                },
                error: function (response) {
                    alert('error');
                    $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                    console.log(response);
                }
            });
        }
    });

    $('#logout-btn').on("click", function (event) {
        event.preventDefault();
        var d = new Date();
        d.setTime(d.getTime() - (1000 * 60 * 60 * 24));
        var expires = "expires=" + d.toGMTString();
        window.document.cookie = "idUser=" + "; " + expires;
        document.location.href = "https://medictionnary.cgonline.fr";
    });
});