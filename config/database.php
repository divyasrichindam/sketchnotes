<?php
$servername = "capstone-priv.dsci.kent.edu";
$username = "bmaddi";
$password = "UwntvY25";
$dbname = "bmaddi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
}
?>