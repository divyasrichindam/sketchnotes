<?php

require_once("../config/database.php");
//Get form data
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $formusername = $_POST["UserName"];
  $formpassword = $_POST["UserPassword"];
  $formemail = $_POST["UserEmail"];
  $formfirstname = $_POST["UserFirstName"];
  $formlastname = $_POST["UserLastName"];
}

// Check connection


$sql = "SELECT * FROM users WHERE UserName = '$formusername'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
header('Location: ../createaccount.php?error=1'); exit;
}
else {
// Set session variable to show person is logged in
$sql = "INSERT INTO users (UserName, Email, Password, FirstName, LastName) VALUES ('$formusername', '$formemail', '$formpassword', '$formfirstname', '$formlastname');";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header('Location: ../login.php?success=1'); exit;
}
?>
