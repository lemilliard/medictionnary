$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));

    $.ajax({
        url: "https://192.168.112.17:8443/prescriptionByUser/" + user.idUser,
        method: "GET",
        success: function (prescriptions) {
            prescriptions.forEach(function (prescription) {
                var div = '<tr><td>' + prescription.date + '</td><td>';
                prescription.drugPrescriptions.forEach(function (drugPrescription) {
                    div += drugPrescription.drug.name + '  (' + drugPrescription.drug.molecule + ')<br/>';
                });
                div += '</td></tr>';
                console.log(div);
                $('#commandes-list').append(div);
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
            url: "https://192.168.112.17:8443/allergy/user/" + user.idUser,
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
