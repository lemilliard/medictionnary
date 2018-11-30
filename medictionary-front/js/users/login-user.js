$(document).ready(function () {
    $('#login_form').on("submit", function (event) {
        event.preventDefault();

        var login = $('#loginc').val();
        var password = $('#passwordc').val();

        if (login === "") {
            alert("Un nom d'utilisateur est requis");
        }
        else if (password === '') {
            alert("Un mot de passe est requis");
        }

        else {
            $.ajax({
                url: "https://localhost:8443/user/login",
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({ login: login, password: password }),
                beforeSend: function () {
                    $('#login_form_btn').val("Connexion en cours");
                },
                success: function (response) {
                    $('#passwordc').val('');
                    if (response.idUser) {
                        $('#loginc').val('');
                        $('.statusMsg').html('<span style="color:green;">Identifiants corrects.</p>');
                        localStorage.setItem("user", JSON.stringify(response));
                        document.cookie = "idUser=" + response.idUser;
                        document.location.href = "/edit-user";
                    } else {
                        $('.statusMsg').html('<span style="color:red;">Identifiants incorrects.</p>');
                    }
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
        console.log("YO");
        event.preventDefault();
        var d = new Date();
        d.setTime(d.getTime() - (1000 * 60 * 60 * 24));
        var expires = "expires=" + d.toGMTString();
        window.document.cookie = "idUser=" + "; " + expires;
        localStorage.removeItem("user");
        document.location.href = "https://medictionnary.cgonline.fr";
    });
});