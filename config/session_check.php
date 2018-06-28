<?php
// Start the session
session_start();

if(!$_SESSION['userid'])
{
    header('Location: ./login.php');
}
    
?>