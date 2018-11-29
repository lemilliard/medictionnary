$(document).ready(function () {
    $.ajax({
        url: "https://192.168.112.17:8443/drug",
        method: "GET",
        success: function (drugs) {
            var user = JSON.parse(localStorage.getItem("user"));


            $.ajax({
                url: "https://192.168.112.17:8443/allergy/user/" + user.idUser,
                method: "GET",
                success: function (allergies) {
                    drugs.forEach(function (drug) {
                        var hasAllergy = false;
                        allergies.forEach(function (allergy) {
                            if (drug.idDrug === allergy.drug.idDrug) {
                                hasAllergy = true;
                            }
                        });

                        var div = '<div class="col-3 col-md-3 col-lg-3 ">' +
                            '<h4>' + JSON.stringify(drug.name) + '</h4>' +
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
});
