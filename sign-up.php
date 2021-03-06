<?php
    include 'connect.php';

    if(isset($_SESSION['user_id'])){
        header('Location:index.php');
    }
    else{
        session_unset();
    }

?>
<!DOCTYPE html>

<head>
    <link href="./css/form.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,600,700,900&display=swap" rel="stylesheet">
    <script src="./js/sign-up.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
    <div class="sign-up">
        <div class="sign-up-title">Sign Up form</div>
        <form class="form" action="sign-up-data.php" method="POST" onsubmit="email_check()">
            <div id="phone-div">
                <p>Phone Number: </p>
                <div class="answer">
                    <input name="phone" type="text" onkeyup="phone_no(),check()" id="phone">
                    <img src="assets/right.png" id="phone-right" style="display:none" />
                    <img src="assets/wrong.png" id="phone-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>Email:</p>
                <div class="answer">
                    <input name="email" type="text" onkeyup="mail(),check()" id="email_add" />
                    <img src="assets/right.png" id="email-right" style="display:none" />
                    <img src="assets/wrong.png" id="email-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>Password:</p>
                <input name="password" type="password" id="pass" onkeyup="confirm_password(),check()"/>
            </div>
            <div>
                <p>Confirm Password:</p>
                <div class="answer">
                    <input type="password" id="confirm_pass" onkeyup="confirm_password(),check()" />
                    <img src="assets/right.png" id="pass-right" style="display:none" />
                    <img src="assets/wrong.png" id="pass-wrong" style="display:none" />
                </div>
            </div>
            <div>
                <p>Username:</p>
                <input id="username" type="text" name="username" onkeyup="username_c()"/>
                <img src="assets/right.png" id="uname-right" style="display:none" />
                <img src="assets/wrong.png" id="uname-wrong" style="display:none" />
            </div>
            <div>
                <input type="submit" id="submit" disabled/>
            </div>
        </form>
    </div>


</body>
