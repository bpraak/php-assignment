<?php
    session_start();
    session_destroy();
    if(isset($_COOKIE['username'])){
        setcookie("username", "", time() - (86400 * 30), "/");
        setcookie("pass", "", time() - (86400 * 30), "/");
    }
    header("Location:first.html");
?>