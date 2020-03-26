
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
                $('.msg-wrapper').append(response);
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
            if($('.msg-wrapper').html()!=response){
                $('.msg-wrapper').html(response);
                // $('.msg-wrapper').scrollTop($('.msg-wrapper')[0].scrollHeight);
                $('.msg-wrapper').animate({ scrollTop: $('.msg-wrapper').scrollHeight }, 1000);

                // $('.msg-wrapper').scrollTop($('.msg-wrapper').height());

            }
            setTimeout(get_msg(to,from),1000);
        }
    });

}

function get_msg_first(to, from) {
    $.ajax({
        url: "get_msg.php",
        type: "POST",
        data: {
            to: to,
            from: from
        },
        success: function (response) {
            $('.msg-wrapper').html(response);
            $('.msg-wrapper').animate({scrollTop: $('.msg-wrapper').scrollHeight}, 1000);
            // $('.msg-wrapper').scrollTop($('.msg-wrapper').height());
            setTimeout(get_msg(to, from), 1000);
        }
    });

}