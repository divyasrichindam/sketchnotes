<?php
session_start();
require_once("../config/database.php");
//Get form data

$userid = $_SESSION["userid"];

$noteId = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {	
  $noteId = test_input($_GET["NoteId"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




// Check connection


$sql = "delete from notes where NoteId = '$noteId'";

if ($conn->query($sql) === TRUE) {
	header('Location: ../viewnotes.php'); exit;

}else{
	
}
?>
