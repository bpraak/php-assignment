<?php
    include 'connect.php';

    $uname = htmlspecialchars($_POST['username']);

    $sql = "select username from prakhar_user where username='$uname'";

    $result = mysqli_query($conn,$sql);

    $no = mysqli_num_rows($result);
    
    if($no==1){
        echo 0;
    }
    else{
        echo 1;
    }
?>