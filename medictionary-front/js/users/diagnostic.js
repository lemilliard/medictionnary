function maPosition(position) {
    var infopos = "Position déterminée :\n";
    infopos += "Latitude : " + position.coords.latitude + "\n";
    infopos += "Longitude: " + position.coords.longitude + "\n";
    alert(infopos);
    $.ajax({
        url: "https://192.168.112.17:8444/pharmacies",
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({
            casDrug: ["68-88-2"],
            latitude: position.coords.latitude,
            longitude: position.coords.longitude
        }),
        success: function (response) {
            alert('succes');
            console.log(response);
        },
        error: function (response) {
            alert('error');
            $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
            console.log(response);
        }
    });
}

$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));
    var symptomes = [];

    $.ajax({
        url: "https://192.168.112.17:8443/zone",
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

    $.ajax({
        url: "https://192.168.112.17:8443/symptom",
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

    $('#liste-zone').change(function () {
        var myzone = $('#liste-zone').val();
        $('#liste-symptome').find('option:not(:first)').remove();
        $.ajax({
            url: "https://192.168.112.17:8443/symptomZone/" + myzone,
            method: "GET",
            success: function (symptomzones) {
                symptomzones.forEach(function (symptomzone) {
                    var div = '<option value="' + symptomzone.symptom.name + '">' + symptomzone.symptom.name + '</option>';
                    $("#liste-symptome").append(div);
                });
            },
            error: function (response) {
                $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                console.log(response);
            }
        });
    });

    $('#liste-symptome').change(function () {
        $('#diagnostic_btn').show();
        var zone = $('#liste-zone').val();
        var symptom = $('#liste-symptome').val();
        var div = '<span class="badge badge-warning">' + zone + ' - ' + symptom + '</span>';
        $('#symptomeschoisisdiv').append(div);
        symptomes.push({ name: symptom });
        console.log(symptomes);
    });

    $('#diagnostic_btn').on('click', function (event) {
        event.preventDefault();

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(maPosition);
        }
        $.ajax({
            url: "https://192.168.112.17:8443/decision",
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({ idUser: user.idUser, symptoms: symptomes }),
            success: function (response) {
                console.log(response);
            },
            error: function (response) {
                $('.statusMsg').html('<span style="color:red;">Un problème est survenu, merci de ré-essayer.</span>');
                console.log(response);
            }
        });
    });
});

