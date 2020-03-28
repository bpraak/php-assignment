
function send_msg(to,from){
    var msg = document.getElementById('msg').value;
    if(msg!=""){
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
                $('.msg-wrapper').animate({ scrollTop: $('.msg-wrapper').scrollHeight}, 1000);
                document.getElementById('msg').value = "";
             }
    });
    }
    else{
        alert('enter a msg then send');
    }

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
                $('.msg-wrapper').animate({ scrollTop: $('.msg-wrapper').scrollHeight}, 1000);

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

function logout() {
    $.ajax({
        url: "delete_sess.php",
        type: "POST",
        data: {
        },
        success: function (response) {
            if(response==1){
                window.location.href = 'logout.php';
            }
        }
    });
}   
