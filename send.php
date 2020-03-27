<?php
    include 'connect.php';

    date_default_timezone_set('Asia/Kolkata');

    $ms = htmlspecialchars($_POST['msg']);
    $to = htmlspecialchars($_POST['to']);
    $from = htmlspecialchars($_POST['from']);

    $msg = mysqli_real_escape_string($conn,$ms);

    $sql = "INSERT into prakhar_chat (from_user_id,to_user_id,`message`,`time`) values ('$from','$to','$msg',now())";
    $result = mysqli_query($conn,$sql);
    if($result){
        $currentTime = date('h:i A', time());

        echo "<div class='msg-my'>".$currentTime."<span class='my'>$msg</span></div>";
    }
?>