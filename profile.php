<?php
include 'connect.php';

session_start();

$qual = htmlspecialchars($_POST['qual']);
$gender = htmlspecialchars($_POST['gender']);
$name = htmlspecialchars($_POST['name']);
$city = htmlspecialchars($_POST['city']);
$photo_name = $_FILES['photo']['name'];
$photo_name_tmp = $_FILES['photo']['tmp_name'];
$id = $_SESSION['user_id'];

$dest = "uploads/";
$imageFileType = strtolower(pathinfo($dest.$photo_name, PATHINFO_EXTENSION));
$uploadOk = 1;

if (isset($_POST["submit"])) {
    $check = getimagesize($photo_name_tmp);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        echo "<script>alert('File is not an image.')</script>";
    }
}

if ($_FILES["photo"]["size"] > 50000000) {
    $uploadOk = 0;
    echo "<script>alert('Sorry, your file is too large.')</script>";
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

    $uploadOk = 0;
    echo "<script>alert('Sorry, only JPG, JPEG, PNG files are allowed.')</script>";
}

if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.')</script>";
    echo "<script>window.location.replace('profile.html');</script>";
} 
else {
    if (move_uploaded_file($photo_name_tmp, $dest."profile_".$id.".png")) {
        echo "<script>alert('Successfully uploaded file')</script>";
    } 
    else {
        echo "<script>alert('Sorry, there was an error uploading your file')</script>";
        echo "<script>window.location.replace('profile.html');</script>";

    }
}

$sql = "INSERT into prakhar_profile (`user_id`,qual,`name`,city,gender) values ('$id','$qual','$name','$city','$gender')";


if (isset($qual, $name, $city, $gender)) {
    $confirm_city = "/^[A-Za-z]+$/";
    $confirm_name = "/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/";
    if (preg_match($confirm_city, $city) && preg_match($confirm_name, $name)) {
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            die('QUERY FAILED' . mysqli_error($conn));
        } 
        else {
            echo "<script>alert('succes')</script>";
            echo "<script>window.location.href = 'index.php'</script>";

        }
    }

}

else{
    echo "<script>alert('One or more fields are empty');window.location.replace('profile.html');</script>";
}
