<?php
$servername = "localhost";
$username = "first_year";
$password = "first_year";
$db = 'first_year';
// Create connection
$conn = mysqli_connect ($servername, $username, $password, $db);

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  die();
}
?>
