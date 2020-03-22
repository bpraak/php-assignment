<?php
    include 'connect.php';

    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    $confirm_phone = "/^(\+91|91|0)* ?[6-9]{1}\d{9}$/";
    $confirm_email = "/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/";

    $sql="INSERT into prakhar_user (email,`password`,username,phone) values ('$email','$password','$username','$phone') ";

    if ($phone!="" && $email!="" && $password!="" && $username!="") {
        if (preg_match($confirm_email, $email)&&preg_match($confirm_phone, $phone)) {
		$result = mysqli_query($conn, $sql);
		if (!$result){
                            die('QUERY FAILED'.mysqli_error($conn));
                        }
	}
    }

?>
