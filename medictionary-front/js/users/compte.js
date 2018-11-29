$(document).ready(function () {
    var user = JSON.parse(localStorage.getItem("user"));
    if (user.login) {
        $("#loginBis").val(user.login);
        $("#loginBisLabel").addClass("active");
    }
});
