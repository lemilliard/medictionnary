$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));

    var documentDrugs = [];
    $.ajax({
        url: "https://localhost:8443/drug",
        method: "GET",
        success: function (drugs) {
            documentDrugs = drugs;
            $.ajax({
                url: "https://localhost:8443/allergy/user/" + user.idUser,
                method: "GET",
                success: function (allergies) {
                    drugs.forEach(function (drug) {
                        var hasAllergy = false;
                        allergies.forEach(function (allergy) {
                            if (drug.idDrug === allergy.drug.idDrug) {
                                hasAllergy = true;
                            }
                        });

                        var div = '<div class="col-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 30px">' +
                            '<h4>' + drug.name + '</h4>' +
                            '(' + drug.molecule + ')<br/>' +
                            '<label class="bs-switch">' +
                            '<input type="checkbox" id="allergies-' + drug.idDrug + '"' +
                            (hasAllergy ? 'checked' : '') + '>' +
                            '<span class="slider round"></span>' +
                            '</label>' +
                            '</div>';
                        $("#allergiesdiv").append(div);
                    });
                }
            });
        },
        error: function (response) {
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });

    $('#update_allergies').on("submit", function (event) {
        event.preventDefault();
        var allergies = [];
        documentDrugs.forEach(function (drug) {
            var isChecked = $("#allergies-" + drug.idDrug).prop("checked");
            allergies.push({ idDrug: drug.idDrug, idUser: user.idUser, valid: isChecked });
        });
        $.ajax({
            url: "https://localhost:8443/allergy/user/" + user.idUser,
            method: "PUT",
            contentType: "application/json",
            data: JSON.stringify(allergies),
            beforeSend: function () {
                $('#update_allergies_btn').text("Enregistrement en cours");
            },
            success: function (response) {
                console.log(response);
                location.reload();
            },
            error: function () {
                $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            }
        });
    });
});
