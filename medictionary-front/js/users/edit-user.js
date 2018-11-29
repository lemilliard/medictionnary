$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));
    if (user.socialSecurityNumber) {
        $("#socialSecurityNumberBis").val(user.socialSecurityNumber);
        $("#socialSecurityNumberBisLabel").addClass("active");
    }
    if (user.firstname) {
        $("#firstnameBis").val(user.firstname);
        $("#firstnameBisLabel").addClass("active");
    }
    if (user.lastname) {
        $("#lastnameBis").val(user.lastname);
        $("#lastnameBisLabel").addClass("active");
    }
    if (user.weight) {
        $("#weightBis").val(user.weight);
        $("#weightBisLabel").addClass("active");
    }
});
