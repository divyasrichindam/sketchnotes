<?php
//Author: Holly Burdick
//Get form data
$comment = $_POST["comment"];
session_start();
$noteid = $_GET["noteid"];
// Set session variable to show person is logged in
$userId = $_SESSION["userid"];


$username = $password = "";

$servername = "capstone-priv.dsci.kent.edu";
$username = "bmaddi";
$password = "UwntvY25";
$dbname = "bmaddi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO comments (NoteId, UserId, Comment) VALUES ($noteid, $userId, '$comment');";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header('Location: viewsharednote.php?noteid='.$noteid); exit;

?>
