$(document).ready(function () {

    var user = JSON.parse(localStorage.getItem("user"));



    var documentDrugs = [];

    $.ajax({

        url: "https://192.168.112.17:8443/zone",

        method: "GET",

        success: function (zones) {

            documentDrugs = zones;

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



    $('#update_allergies').on("submit", function (event) {

        event.preventDefault();

        var allergies = [];

        documentDrugs.forEach(function (drug) {

            var isChecked = $("#allergies-" + drug.idDrug).prop("checked");

            if (isChecked) {

                allergies.push(drug.idDrug);

            }

        });

        $.ajax({

            url: "https://192.168.112.17:8443/allergy/user/" + user.idUser,

            method: "POST",

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

