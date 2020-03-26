<?php
    include 'connect.php';

    if(isset($_COOKIE['username'])&&isset($_COOKIE['pass'])){
        $uname = $_COOKIE['username'];
        $pass = $_COOKIE['pass'];
        $sql = "select * from prakhar_user where username='$uname'";
        $data = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($data);
        if(!password_verify($row['password'],$pass)){
            $row = "";
        }
        else{
            echo "<script>alert('Welcome Back')</script>";
        }

    }
?>

<!DOCTYPE html>

<head>
    <link href="./css/form.css" type="text/css" rel="stylesheet" />

</head>

<body>
    <div class="sign-up">
        <div class="sign-up-title">Login</div>
        <form class="form" action="login.php" method='POST'>
            
            <div>
                <p>Email/Username:</p>
                <div class="answer">
                    <input type="text" name="email" id="email" onkeyup="check()" value='<?php echo $row['username'];?>' />
                </div>
            </div>
            <div>
                <p>Password:</p>
                <input type="password" name="pass" id="pass" onkeyup="check()" value="<?php echo $row['password'];?>"" />
            </div><br>
            <div>
                <input type="checkbox" name="remember" <?php if(isset($row['password'])){ echo "checked" ; } ?> >
                <label> Remember me</label>
            </div>
            <br>
            <input type="submit" id="submit" disabled />
        </form>
    </div>

<script>
    
    function check() {
        var email = document.getElementById("email").value;
        var pass = document.getElementById("pass").value;

        if (email!=""&&pass!=""){
            document.getElementById("submit").disabled = false;
        }
        else{
            document.getElementById("submit").disabled = true;
        }
    }
    setTimeout(check(), 1000);

</script>

</body>