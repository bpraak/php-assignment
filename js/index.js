
function send_msg(to,from){
    var msg = document.getElementById('msg').value;
    $.ajax({
        url: "send.php",
        type: "POST",
        data: {
            msg: msg,
            to : to,
            from: from
        },
        success: function (response) {
                $('.msg-wrapper').prepend(response);
                document.getElementById('msg').value = "";
             }
    });

}


function check_enter(e,t,f){
    if (e.keyCode == 13) {
        send_msg(t,f);
    }
}

function get_msg(to,from){
    $.ajax({
        url: "get_msg.php",
        type: "POST",
        data: {
            to: to,
            from: from
        },
        success: function (response) {
            $('.msg-wrapper').html(response);
            setTimeout(get_msg(to,from),1000);
        }
    });

}