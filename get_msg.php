<?php
include 'connect.php';

date_default_timezone_set('Asia/Kolkata');

$to = $_POST['to'];
$from = $_POST['from'];

$sql = "SELECT * from prakhar_chat where (to_user_id='$to' and from_user_id='$from') or (to_user_id='$from' and from_user_id='$to') order by `time` desc";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['to_user_id'] == $to) {
        $msg = $row['message'];
        $time = $row['time'];
        $ctime = date('H:i A', strtotime($time));
        echo "<div class='msg-my'>" . $ctime . "<span class='my'>$msg</span></div>";
    } else {
        $msg = $row['message'];
        $time = $row['time'];
        $ctime = date('H:i A', strtotime($time));
        echo "<div class='msg-his'><span class='his'>$msg</span>".$ctime."</div>";

    }
}
