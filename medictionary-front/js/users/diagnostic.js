var user = JSON.parse(localStorage.getItem("user"));
var prescription = [];
var symptomZones = [];
var selectedSymptomeZones = [];
var codePharmacy = null;

function maPosition(position) {
    prescription = [];
    var symptoms = selectedSymptomeZones.map(function (symptomZone) {
        return { name: symptomZone.symptom.name };
    });
    $.ajax({
        url: "https://localhost:8443/decision",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({ idUser: user.idUser, symptoms: symptoms }),
        beforeSend: function () {
            $('#prescription_modal').html("Evaluation des médicaments");
        },
        success: function (drugs) {
            if (drugs.length > 0) {
                var casDrug = [];

                drugs.forEach(function (drug) {
                    if (!casDrug.includes(drug.cas)) {
                        casDrug.push(drug.cas);
                        prescription.push(drug);
                    }
                });

                var prescri = '<h5>Médicaments</h5><br/>';
                prescription.forEach(function (drug) {
                    prescri += drug.name + ' (' + drug.molecule + ')<br/>';
                });
                $('#prescription_modal').html(prescri);

                $.ajax({
                    url: "https://localhost:8444/pharmacy/search",
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        casDrug: casDrug,
                        latitude: position.coords.latitude,
                        longitude: position.coords.longitude
                    }),
                    beforeSend: function () {
                        $('#pharmacie_modal').html("Evaluation de la pharmacie");
                    },
                    success: function (pharmay) {
                        var pharma = '<h5>Pharmacie la plus proche</h5><br/>' +
                            pharmay.name + '<br/>' +
                            pharmay.postalCode + '<br/>';
                        codePharmacy = pharmay.codePharmacy;
                        $('#pharmacie_modal').html(pharma);
                    },
                    error: function (response) {
                        alert('error');
                        $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                        console.log(response);
                    }
                });
            } else {
                $('#prescription_modal').html("Pas de médicaments trouvés<br/><br/>Contactez votre médecin");
                $('#prescription_btn').hide();
            }
        },
        error: function (response) {
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });
}

function removeSymptom(idSymptomZone) {
    $('#symptom-item-' + idSymptomZone).remove();
    selectedSymptomeZones = selectedSymptomeZones.filter(function (symptomZone) {
        return symptomZone.idSymptomZone !== idSymptomZone;
    });
    if (selectedSymptomeZones.length === 0) {
        $('#diagnostic_btn').hide();
    }
}

function initSymptoms() {
    $.ajax({
        url: "https://localhost:8443/symptom",
        method: "GET",
        success: function (symptoms) {
            symptoms.forEach(function (symptom) {
                var div = '<option value="' + symptom.id + '">' + symptom.name + '</option>';
                $("#liste-symptome").append(div);
            });
        },
        error: function (response) {
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });
}

$(document).ready(function () {
    initSymptoms();

    $.ajax({
        url: "https://localhost:8443/zone",
        method: "GET",
        success: function (zones) {
            zones.forEach(function (zone) {
                var div = '<option value="' + zone.name + '">' + zone.name + '</option>';
                $("#liste-zone").append(div);
            });
        },
        error: function (response) {
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });


    $('#liste-zone').change(function () {
        var zone = $('#liste-zone').val();
        $('#liste-symptome').find('option:not(:first)').remove();
        if (zone === "-1") {
            initSymptoms();
        } else {
            $.ajax({
                url: "https://localhost:8443/symptomZone/" + zone,
                method: "GET",
                success: function (retrievedSymptomZones) {
                    retrievedSymptomZones.forEach(function (symptomZone) {
                        if (!symptomZones.includes(symptomZone)) {
                            symptomZones.push(symptomZone);
                        }
                        var div = '<option value="' + symptomZone.idSymptomZone + '">' + symptomZone.symptom.name + '</option>';
                        $("#liste-symptome").append(div);
                    });
                },
                error: function (response) {
                    $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                    console.log(response);
                }
            });
        }
    });

    $('#liste-symptome').change(function () {
        var idSymptomZone = parseInt($('#liste-symptome').val(), 10);
        if (idSymptomZone > -1) {
            var symptomZone = symptomZones.find(function (sz) {
                return sz.idSymptomZone === idSymptomZone;
            });
            if (!selectedSymptomeZones.includes(symptomZone)) {
                var div = '<span id="symptom-item-'
                    + symptomZone.idSymptomZone
                    + '" class="badge badge-warning"' +
                    ' onclick="removeSymptom(' + symptomZone.idSymptomZone + ')">'
                    + symptomZone.nameZone + ' - ' + symptomZone.symptom.name
                    + '</span>';
                $('#symptomeschoisisdiv').append(div);
                $('#diagnostic_btn').show();
                selectedSymptomeZones.push(symptomZone);
            }
        }
    });

    $('#diagnostic_btn').on('click', function (event) {
        event.preventDefault();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(maPosition);
        }
    });

    $('#prescription_btn').on('click', function (event) {
        event.preventDefault();

        $.ajax({
            url: "https://localhost:8443/prescription",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ idUser: user.idUser, codePharmacy: codePharmacy, drugs: prescription }),
            beforeSend: function () {
                $('#prescription_btn').html("Prescription en cours");
            },
            success: function () {
                $('#prescription_btn').hide();
                $('#prescription_ended_btn').show();
            },
            error: function (response) {
                alert('error');
                $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                console.log(response);
            }
        })
    });
})
;

