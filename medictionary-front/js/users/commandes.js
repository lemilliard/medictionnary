$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));
    var pharmacies = [];

    $.ajax({
        url: "https://localhost:8444/pharmacy",
        method: "GET",
        success: function (response) {
            pharmacies = response;
        }
    }).always(function () {
        $.ajax({
            url: "https://localhost:8443/prescriptionByUser/" + user.idUser,
            method: "GET",
            success: function (prescriptions) {
                prescriptions.forEach(function (prescription) {
                    var pharmacy = pharmacies.find(function (p) {
                        return p.codePharmacy === prescription.codePharmacy;
                    });
                    var date = new Date(prescription.date);
                    var formatedDate = String(date.getDate()) + "/" + String(date.getMonth() + 1) + "/" + String(date.getFullYear());
                    var formatedHour = String(date.getUTCHours()) + ":" + String(date.getUTCMinutes());
                    var div = '<tr><td>' + formatedDate + ' - ' + formatedHour + '</td><td>';
                    prescription.drugPrescriptions.forEach(function (drugPrescription) {
                        div += drugPrescription.drug.name + '  (' + drugPrescription.drug.molecule + ')<br/>';
                    });
                    div += '</td>' +
                        '<td>' + (pharmacy ? pharmacy.name + '<br/>' + pharmacy.postalCode : '') + '</td>' +
                        '</tr>';
                    $('#commandes-list').append(div);
                });
            },
            error: function (response) {
                $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                console.log(response);
            }
        });
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
