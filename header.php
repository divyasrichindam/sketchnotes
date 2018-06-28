<?php
//Author: Holly Burdick
session_start();
$loggedinname = $_SESSION["loggedinname"];

//$url = $_SERVER['REQUEST_URI'];
//echo $url;exit;
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/holly.css" rel="stylesheet">
  </head>

  <body>
    <!-- Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="viewnotes.php">Sketch Notes</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="viewnotes.php">View Your Notes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shared.php">View Shared Notes</a>
          </li>
        </ul>
        <a href="logout.php" class="btn btn-light my-2 my-sm-0">Logout (<?php echo $loggedinname; ?>)</a>
      </div>
    </nav>
