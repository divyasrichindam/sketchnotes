<?php
session_start();
$title = "Sketch Notes";
$noteid = $_GET["noteid"]
// Set session variable to show person is logged in

$userId = $_SESSION["userid"];

$servername = "localhost";
$username = "bmaddi";
$password = "UwntvY25";
$dbname = "bmaddi";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT notes.NoteId, notes.Title, notes.Content, users.UserName, shared.UserId
FROM ((notes
INNER JOIN users ON notes.OwnerID=users.UserId)
INNER JOIN shared ON shared.NoteId=notes.NoteId) WHERE shared.UserId = $userId AND notes.NoteId = $noteid;";
$result = mysqli_query($conn, $sql);

include 'header.php';
?>

    <!-- Big Words -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">View Shared Notes</h1>
    </div>

    <div class="container">
      <!-- Start of Cards -->
      <?php if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while($row = mysqli_fetch_assoc($result)) {?>
              <div class="card-deck mb-3 text-center">
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal"><?php echo $row["Title"]; ?></h4>
                </div>
                <div class="card-body">
                  <p><?php echo substr($row["Content"], 0, 280); ?></p>
                  <p>Shared By: <?php echo $row["UserName"]; ?></p>
                  <a href="viewfullnote.php?noteid=<?php echo $row['NoteId']; ?>" class="btn btn-lg btn-block btn-primary">View Full Note</a>
                </div>
              </div>
            </div>
          <?php }
      }
      mysqli_close($conn);

      ?>
    <!-- End of Cards -->
     </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
