<?php
require_once("config/session_check.php");
require_once("header.php");
require_once("config/database.php");



//Get form data
$title = $content = $NoteId = "";


$userid = $_SESSION["userid"];

if ($_SERVER["REQUEST_METHOD"] == "GET") {	
	
  $NoteId = ($_GET["NoteId"]);
   
 if($NoteId !== null){
	  $sql = "select * from notes where NoteId = '".$NoteId."' order by DateModified desc ";
	  $result = $conn->query($sql);

     $query = "select * from users";
	  $users = $conn->query($query);
      
//echo '<pre>'; print_r($result); exit;
	  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$title = $row["Title"];
		$content = $row["Content"];
	}
	  }
}
 }
	
?>

<html>
	 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> 
      
       <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/holly.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below)s, or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/javascript.js"></script>
        
    <title>Create Notes</title>
  </head>
<body>
	<br>
	<div class="container">
      <!-- Start of Cards -->
              <div class="card-deck mb-3 text-left">
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal text-left"> <font color="#4EB1EA"> Create Notes! </font></h4>
                
                    
                </div>
                                                                                  
                <div class="card-body">
                  <form action="backend/createnotesaction.php?noteId=<?php echo $NoteId; ?>" method="POST">
					    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" value = '<?php echo $title?>' name ='title' id="title" placeholder="Enter your Title here" required>
							
    </div>
                     <div class="form-group">
      <script src="ckeditor_4.9.2_full\ckeditor\ckeditor.js"></script>
      <textarea class="ckeditor" name="content"><?php echo $content?></textarea>
    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Save</button>
                    <?php
                        if($NoteId !== null){
                    ?>
                        <button type="button" id="shareNote" value="<?php echo $NoteId; ?>" class="btn btn-primary btn-lg">Share your note</button>  
                    <?php
                        }
                    ?>
                  </form>
                </div>
              </div>
            </div>
    <!-- End of Cards -->
     </div>
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form action="backend/sharenotes.php?noteId=<?php echo $NoteId; ?>" method="POST">                      
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Select user you want to share</h4>
          </div>
          <div class="modal-body">
            <?php
              while($row1 = $users->fetch_assoc()) {
            ?>
                <input name = "check_list[]" type="checkbox" value="<?php echo $row1['UserId']; ?>" /> <?php echo $row1['UserName']; ?> <br>
            <?php
                  
              }
              ?>
          </div>
          <div class="modal-footer">
            <button type="submit" name="submit" Value="Submit"  class="btn btn btn-primary">Share</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
        </div>

      </div>
    </div>
	</body>
</html>

<script>
    $('#shareNote').click(function(){
        var noteId = $(this).val();
        
        $('#myModal').modal('show');
//        window.location = 
    });
</script>
