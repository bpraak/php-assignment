<?php
    include 'connect.php';
    
    session_start();
    session_unset();

    if (isset($_COOKIE['sess_id'])) {
    $sess_id = $_COOKIE['sess_id'];
    $sql = "select * from prakhar_session where sess_id='$sess_id'";
    $data = mysqli_query($conn, $sql);
    if ($data) {

        $n = mysqli_num_rows($data);
        // echo "<script>alert('$n')</script>";

        if ($n > 0) {
            // echo "<script>alert('hello')</script>";

            $row = mysqli_fetch_assoc($data);
            $id = $row['user_id'];
            $_SESSION['user_id'] = $id;
            $new_sess_id = $_COOKIE['PHPSESSID'];

            $now = time();
            $expiry = time() + (86400 * 30);
            setcookie("sess_id", $new_sess_id, $expire, "/");

            $new_sql = "update prakhar_session set sess_id='$new_sess_id' update='$now' expiry='$expiry' where sess_id='$sess_id'";
            mysqli_query($conn, $new_sql);
            echo "<script>alert('Welcome Back');window.location.href='index.php'</script>";
        }
    }
}

?>

<!DOCTYPE html>

<head>
    <link href="./css/form.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,900&display=swap" rel="stylesheet">
    <script src="./js/sign-up.js"></script>
</head>

<body>
    <div class="sign-up"><br><br>
        <center>
        <a href="login_page.php"><input type="button" value="Login"></a><br><br>
        <a href="sign-up.html"><input type="button" value="Sign-up"></a>
        </center>
    </div>


</body>