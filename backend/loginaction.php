<?php

require_once("../config/database.php");
//Get form data
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formusername = $_POST["UserName"];
  $formpassword = $_POST["UserPassword"];
}

// Check connection


$sql = "SELECT * FROM users WHERE UserName = '$formusername' AND Password = '$formpassword'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
session_start();
// Set session variable to show person is logged in
while ($row = $result->fetch_assoc()) {
$_SESSION["userid"] = $row["UserId"];
$_SESSION["loggedinname"] = $formusername;
header('Location: ../viewnotes.php'); exit;
}}
else {
header('Location: login.php?error=1'); exit;
}
?>
