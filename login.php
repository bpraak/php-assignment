<?php
include 'connect.php';

session_start();
session_unset();
$n = htmlspecialchars($_POST['email']);
$p = htmlspecialchars($_POST['pass']);

$name = mysqli_real_escape_string($conn,$n);
$pass = mysqli_real_escape_string($conn,$p);

if (isset($name, $pass)) {
    $sql = "SELECT * from prakhar_user where (email='$name' and `password`='$pass') or (username='$name' and `password`='$pass')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $id =$row['user_id'];
        $n = mysqli_num_rows($result);

        if ($n) {
            if(!empty($_POST["remember"])){
                $sess_id = $_COOKIE['PHPSESSID'];
                $expire = date("Y-m-d H:i:s",time() + (86400 * 30));
                $now = date("Y-m-d H:i:s",time());
                setcookie("sess_id",$sess_id,time() + (86400 * 30), "/");

                $sess_sql = "insert into prakhar_session values ('$sess_id','$id','$now','$expire') "  ;       
                $sess_data = mysqli_query($conn,$sess_sql);
                if(!$sess_data){
                    die('QUERY FAILED' . mysqli_error($conn));

                }

                // $epass = password_hash($pass,PASSWORD_BCRYPT);
                // setcookie("pass",$epass,time() + (86400 * 30), "/");
            }
            $_SESSION['user_id']=$id;

            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.replace('index.php');</script>";
        }
        else {
            echo "<script>alert('Incorrect credentials');</script>";
            echo "<script>window.location.replace('login_page.php');</script>";
        }
    }
    else{
        die('QUERY FAILED' . mysqli_error($conn));
    }
}
