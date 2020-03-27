<?php
    include 'connect.php';

    $e = htmlspecialchars($_POST['email']);

    $email = mysqli_real_escape_string($conn,$e);

    $sql = "SELECT email from prakhar_user where email='$email'";

    $result = mysqli_query($conn,$sql);

    if($result){
        $n = mysqli_num_rows($result);
        if($n>0){
            echo 0;
        }
        else {
            echo 1;
        }
    }

?>