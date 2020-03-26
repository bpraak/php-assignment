function name_check() {
    var confirm_name = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
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

function phone_no() {
    var confirm_phone = /^(\+91|91|0)* ?[6-9]{1}\d{9}$/;
    var phone = document.getElementById("phone").value;
    if (confirm_phone.test(phone)) {
        document.getElementById("phone-wrong").style.display = "none";
        document.getElementById("phone-right").style.display = "";
    }
    else {
        document.getElementById("phone-wrong").style.display = "";
        document.getElementById("phone-right").style.display = "none";
    }
}

function check_it() {
    var name = document.getElementById("name").value;
    var city = document.getElementById("city").value;
    var qual = document.getElementById("qual").value;
    var gender = document.getElementById("gender").value;
    var photo = document.getElementById("photo").value;
    var phone = document.getElementById("phone").value;
    var pass = document.getElementById("pass").value;
    if (phone.length == 0  || pass.length == 0 || name.length == 0 || city.length == 0 ||  photo.length == 0) {
        document.getElementById("submit").disabled = true;
    }
    else {
        var confirm = /^[A-Za-z]+$/;
        var confirm_name = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/;
        var confirm_phone = /^(\+91|91|0)* ?[6-9]{1}\d{9}$/;

        if (confirm_name.test(name) && confirm.test(city) && confirm_phone.test(phone)) {
            document.getElementById("submit").disabled = false;
        }
        else {
            document.getElementById("submit").disabled = true;
        }
    }
}

function cancel_edit(){
    window.location.href = 'index.php';
}
