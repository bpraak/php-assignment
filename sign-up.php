<?php
    include 'connect.php';

    session_start();

    
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $username = htmlspecialchars($_POST['username']);

    $confirm_phone = "/^(\+91|91|0)* ?[6-9]{1}\d{9}$/";
    $confirm_email = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";

    $sql="INSERT into prakhar_user (email,`password`,username,phone) values ('$email','$password','$username','$phone') ";

    if (isset($phone,$email,$password,$username)) {
        if (preg_match($confirm_email, $email)&&preg_match($confirm_phone, $phone)) {
		$result = mysqli_query($conn, $sql);
		    if (!$result){
                            die('QUERY FAILED'.mysqli_error($conn));
                        
            } 
            else {

                $last = "select user_id from prakhar_user order by user_id desc limit 1";
                $r = mysqli_query($conn,$last);
                
                $row = mysqli_fetch_array($r);
                
                $_SESSION['user_id'] = $row['user_id'];
                echo "<script>window.location.href =  'profile.html'</script>";
            }   
        }   
    }
    else {
        session_destroy();

        echo "<script>alert('One or more fields are empty');window.location.replace('sign-up.html');</script>";
    }

?>
