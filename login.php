<?php
include 'connect.php';

session_start();
session_unset();
$name = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['pass']);

if (isset($name, $pass)) {
    $sql = "SELECT prakhar_user.* from prakhar_user where (email='$name' and `password`='$pass') or (username='$name' and `password`='$pass')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $id =$row['user_id'];
        $n = mysqli_num_rows($result);
        echo "<script>alert('$id');</script>";

        if ($n) {
            
            $_SESSION['user_id']=$id;

            echo "<script>alert('Login Successful');</script>";
            echo "<script>window.location.replace('index.php');</script>";
        }
        else {
            echo "<script>alert('Incorrect credentials');</script>";
            echo "<script>window.location.replace('login.html');</script>";
        }
    }
    else{
        die('QUERY FAILED' . mysqli_error($conn));
    }
}
