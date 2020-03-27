<?php
include 'connect.php';

if (isset($_COOKIE['sess_id'])) {
    $sess_id = $_COOKIE['sess_id'];

    setcookie("sess_id", "", time() - (86400 * 30), "/");
    $sql = "DELETE from prakhar_session where `sess_id`='$sess_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo 1;
    }

}
else{
    echo 1;
}
?>