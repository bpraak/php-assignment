<?php
    include 'connect.php';
    session_start();

    if(isset($_SESSION['user_id'])){
        header('Location:index.php');
    }
    else{
    session_unset();

    if(isset($_COOKIE['sess_id'])){
        
        $sess_id = $_COOKIE['sess_id'];
        $sql = "select * from prakhar_session where sess_id='$sess_id'";
        $data = mysqli_query($conn,$sql);
        if($data){
            

            $n = mysqli_num_rows($data);
            // echo "<script>alert('$n')</script>";

            if($n>0){
                // echo "<script>alert('hello')</script>";

                $row = mysqli_fetch_assoc($data);
                $id = $row['user_id'];
                $_SESSION['user_id']=$id;
                $new_sess_id = $_COOKIE['PHPSESSID'];
                
                $now = time();
                $expiry = time()+(86400 * 30);
                setcookie("sess_id", $new_sess_id, $expire, "/");

                $new_sql = "update prakhar_session set sess_id='$new_sess_id' update='$now' expiry='$expiry' where sess_id='$sess_id'";
                mysqli_query($conn,$new_sql);
                echo "<script>alert('Welcome Back');window.location.href='index.php'</script>";
            }    
        }
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