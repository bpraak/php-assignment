function name_check() {
    var confirm_name = /^[A-Za-z]+$/;
    var name = document.getElementById("name").value;
    if (confirm_name.test(name)) {
        document.getElementById("name-wrong").style.display = "none";
        document.getElementById("name-right").style.display = "";
    }
    else {
        document.getElementById("name-wrong").style.display = "";
        document.getElementById("name-right").style.display = "none";
    }
}

function city_check() {
    var confirm_city = /^[A-Za-z]+$/;
    var city = document.getElementById("city").value;
    if (confirm_city.test(city)) {
        document.getElementById("city-wrong").style.display = "none";
        document.getElementById("city-right").style.display = "";
    }
    else {
        document.getElementById("city-wrong").style.display = "";
        document.getElementById("city-right").style.display = "none";
    }
}

function check() {
    var name = document.getElementById("name").value;
    var city = document.getElementById("city").value;
    var qual = document.getElementById("qual").value;
    var gender = document.getElementById("gender").value;
    var photo = document.getElementById("photo").value;
    if (name.length == 0 || city.length == 0 || qual.length == 0 || photo.length == 0 || gender.length == 0) {
        document.getElementById("submit").disabled = true;
    }
    else {
        var confirm = /^[A-Za-z]+$/;

        if (confirm.test(name) && confirm.test(city)) {
            document.getElementById("submit").disabled = false;
        }
        else {
            document.getElementById("submit").disabled = true;
        }
    }
}

