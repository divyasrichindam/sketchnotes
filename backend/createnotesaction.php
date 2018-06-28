<?php
session_start();
require_once("../config/database.php");
//Get form data
$title = $content = "";

$userid = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {	
  $content = test_input($_POST["content"]);
  $title = test_input($_POST["title"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}




// Check connection
if(isset($_REQUEST['noteId']))
{
    $noteId = $_REQUEST['noteId'];
}
else{
    $noteId = '';
}

if($noteId == '')
{
    $sql = "insert into notes (CreatedDate, Title, OwnerId, Content, DateModified)
    values (now(), '$title', '$userid', '$content', now()) ";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../viewnotes.php'); exit;

    }
}
else{
    $sql = "UPDATE notes SET Title='$title', Content='$content', DateModified=now(), OwnerID='$userid' WHERE NoteId='$noteId'";
    
    if ($conn->query($sql) === TRUE) 
    {
        header('Location: ../viewnotes.php');
    }
}
?>
