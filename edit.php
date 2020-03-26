<?php 
    include 'connect.php';
    session_start();
    if(isset($_SESSION['user_id'])){
        $id = $_SESSION['user_id'];
    }
    else{
        echo "<script>alert('" . $_SESSION['user_id'] . "')</script>";

        echo "<script>window.location.href = 'login_page.php'</script>";
    }
?>

<!DOCTYPE html>

<head>
    <link href="./css/form.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,900&display=swap" rel="stylesheet">
    <script src="./js/edit.js"></script>
</head>

<body>
    <div class="sign-up">
        <div class="sign-up-title">Edit form</div>
        <form class="form" action="edit-submit.php" method="POST" enctype="multipart/form-data">
            <div id="phone-div">
                <?php 
                    $sql = "Select prakhar_user.*,prakhar_profile.* from prakhar_user natural join prakhar_profile where prakhar_user.user_id='$id'";
                    $result = mysqli_query($conn,$sql);  
                    $row = mysqli_fetch_assoc($result);
                ?>
                <p>Phone Number: </p>
                <div class="answer">
                    <input name="phone" type="text" onkeyup="phone_no(),check_it()" id="phone" value="<?php echo $row['phone']; ?>">
                    <img src="assets/right.png" id="phone-right" style="display:none" />
                    <img src="assets/wrong.png" id="phone-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>New Password:</p>
                <div class="answer">
                    <input type="password" id="pass" name='password' onkeyup="check_it()" />
                </div>
            </div>
            <div>
                <p>Educational Qualification:</p>
                <select class="select" id="qual" name="qual" onchange="check_it()">
                    <option value="" disabled selected value> -- select an option -- </option>
                    <option value='B. Tech'>B. Tech</option>
                    <option value='M. Tech'>M. Tech</option>
                    <option value='B. Sc.'>B. Sc.</option>
                    <option value='M. Sc.'>M. Sc.</option>
                    <option value='PhD'>PhD</option>
                    <option value='B. Arch.'>B. Arch.</option>
                </select>
            </div>
            <div>
                <p>Gender:</p>
                <select class="select" id="gender" name="gender" onchange="check_it()">
                    <option value="" disabled selected value> -- select an option -- </option>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                    <option value='Others'>Others</option>
                </select>
            </div>
            <div>
                <p>Name:</p>
                <div class="answer">
                    <input name="name" type="text" onkeyup="name_check(),check_it()" id="name" value="<?php echo $row['name']; ?>" />
                    <img src="assets/right.png" id="name-right" style="display:none" />
                    <img src="assets/wrong.png" id="name-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>City:</p>
                <div class="answer">
                    <input name="city" type="text" onkeyup="city_check(),check_it()" id="city" value="<?php echo $row['city']; ?>" />
                    <img src="assets/right.png" id="city-right" style="display:none" />
                    <img src="assets/wrong.png" id="city-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>Photo:</p>
                <div class="answer">
                    <input type="file" id="photo" name="photo" onchange="check_it()" accept="image/*" />
                </div>
            </div>
            <div> 
                <input type="submit" id="submit" disabled/>
            </div>
            <div> 
                <input type="button" onclick="cancel_edit()"/>
            </div>
        </form>
    </div>


</body>
