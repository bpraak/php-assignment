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

function mail() {
    var confirm_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var email = document.getElementById("email_add").value;
    if (confirm_email.test(email)) {
        document.getElementById("email-wrong").style.display = "none";
        document.getElementById("email-right").style.display = "";
    }
    else {
        document.getElementById("email-wrong").style.display = "";
        document.getElementById("email-right").style.display = "none";
    }
}

function confirm_password() {
    var pass = document.getElementById("pass").value;
    var cpass = document.getElementById("confirm_pass").value;
    if (cpass == pass) {
        document.getElementById("pass-wrong").style.display = "none";
        document.getElementById("pass-right").style.display = "";
    }
    else {
        document.getElementById("pass-wrong").style.display = "";
        document.getElementById("pass-right").style.display = "none";
    }
}

var ucheck=0;

function username_c(){
    var username = document.getElementById('username').value;
    $.ajax({
        url: "check_username.php",
        type: "POST",
        data: {
            username : username
        },
        success: function (response) {
            if(response==1){
                document.getElementById("uname-wrong").style.display = "none";
                document.getElementById("uname-right").style.display = "";
                 ucheck = 1;
                 check();
            }
            else{
                document.getElementById("uname-wrong").style.display = "";
                document.getElementById("uname-right").style.display = "none";
                 ucheck=0;
                 check();
            }
        }
    });
}

function check() {
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email_add").value;
    var pass = document.getElementById("pass").value;
    var cpass = document.getElementById("confirm_pass").value;
    var uname = document.getElementById("username").value;
    // alert(uname);
    if (phone.length == 0 || email.length == 0 || pass.length == 0 || cpass.length == 0 || uname.length == 0 ) { 
        document.getElementById("submit").disabled = true;
    }
    else{
        var confirm_phone = /^(\+91|91|0)* ?[6-9]{1}\d{9}$/;

        var confirm_email = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;



        if (confirm_phone.test(phone) && confirm_email.test(email) && (cpass == pass) && (ucheck==1)) {
            document.getElementById("submit").disabled = false;
        }
        else {
            document.getElementById("submit").disabled = true;
        }
    }
}
