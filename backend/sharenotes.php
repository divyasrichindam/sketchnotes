<?php
session_start();
require_once("../config/database.php");

$ownerid = $_SESSION["userid"];

if(isset($_REQUEST['noteId']))
{
    $noteId = $_REQUEST['noteId'];
}

if(isset($_POST['submit'])){
	if(!empty($_POST['check_list'])) {
		// Loop to store and display values of individual checked checkbox.
		foreach($_POST['check_list'] as $UserId) {
			$sql = "insert into shared (UserId, NoteId, OwnerId, DateShared) values ('$UserId', '$noteId', '$ownerid', now()) ";
			$result = mysqli_query($conn, $sql);
		}
	}
	header('Location: ../createnotes.php?NoteId='.$noteId);
}
?>