<?php
//Author: Holly Burdick
//Start the session
session_start();
$title = "Sketch Notes";
// Set session variable to show person is logged in

$userId = $_SESSION["userid"];

//set database server information
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

$sql = "SELECT DISTINCT notes.NoteId, notes.Title, notes.Content, users.UserName, shared.UserId, shared.OwnerId
FROM ((notes
INNER JOIN users ON notes.OwnerId=users.UserId)
INNER JOIN shared ON shared.OwnerId=notes.OwnerID) WHERE shared.UserId = $userId;";
$result = mysqli_query($conn, $sql);

include 'header.php';
?>

    <!-- Big Words -->
    <div class="card col-md-6 offset-md-3 nopadding">
      <div class="card-header text-center">
      <h1 class="display-4">View Shared Notes</h1>
  </div>

    <div class="container-fluid row card-text padding-text">
      <!-- Start of Cards -->
      <?php if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {?>
              <div class="card-deck mb-3 col-md-4 text-center">
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal"><?php echo $row["Title"]; ?></h4>
                </div>
                <div class="card-body">
                  <p><?php echo substr($row["Content"], 0, 280); ?></p>
                  <p>Shared By: <?php echo $row["UserName"]; ?></p>
                  <a href="viewsharednote.php?noteid=<?php echo $row['NoteId']; ?>" class="btn btn-lg btn-block btn-primary">View Full Note</a>
                </div>
              </div>
            </div>
          <?php }
      }
      mysqli_close($conn);

      ?>
    <!-- End of Cards -->
  </div>
</div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
