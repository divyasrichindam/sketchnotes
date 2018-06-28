<!doctype html>
<?php require_once("config/session_check.php");
require_once("header.php");?>
<html lang="en">
  <head>
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" integrity="sha384-p2jx59pefphTFIpeqCcISO9MdVfIm4pNnsL08A6v5vaQc4owkQqxMV8kg4Yvhaw/" crossorigin="anonymous">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      
       <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/holly.css" rel="stylesheet">

    <!-- Include all compiled plugins (below)s, or include individual files as needed -->
    
   
        
    <title> View Notes</title>
  </head>
  <body>
   
      
	  <!--Main Header-->
	  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h3 class="card-header">View Your Notes<i class="far fa-plus-square" align: right></i></h3>
		  
  <div class="card-body">
	  
  
	  
	  
	  
<!--Buttons-->
	  <div class="button 1" align="center">
		  
      <div class="btn-group-vertical" data-toggle="buttons">
  <button type="button" onclick="window.location='createnotes.php'" class="btn btn-lg btn-block btn-primary">Create Note</button>
          <br/>
		  </div>	  
	  <?php
session_start();


$userid = $_SESSION["userid"];
	  require_once('config/database.php');
	  
	  $sql = "select * from notes where OwnerID = '$userid' order by DateModified desc ";
	  $result = $conn->query($sql);

	  
	  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		?>
		  
	  <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center" onclick="window.location='createnotes.php?NoteId=<?php echo $row["NoteId"]?>'">
      
	    <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">

  <div class="card-header"> <button type="button" onclick="window.location='backend/deletenotes.php?NoteId=<?php echo $row["NoteId"]?>'" class="close" data-dismiss="alert">&times;</button><?php echo $row["Title"];?></div>
  <div class="card-body">
    
    <p class="card-text" ><?php echo html_entity_decode($row["Content"]);?></p>
	  <p>Updated at: <?php echo $row["DateModified"];?></p>
  </div>
</div>
		  
	  </div>
	  <?php
	}
	  }else{
		  ?>
	  <div class='container'>
	  <div class="alert alert-dismissible alert-warning" style="max-width: 20rem;">
  <button type="button" class="close" data-dismiss="alert" align='left'>&times;</button>
  <h4 class="alert-heading">Oops!</h4>
  <p class="mb-0">No Notes Found!!</p>
</div>
		  </div>
	  <?php
	  }
	  
	  ?>
	  </div>
	 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> -->
		 

  </body>
</html>
