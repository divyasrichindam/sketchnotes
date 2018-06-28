<?php
//Author: Holly Burdick
session_start();
$title = "Sketch Notes";
$noteid = $_GET["noteid"];
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
                </div>
              </div>
            </div>
          <?php }
      }

      ?>
<div class="card-deck mb-5 text-center">
<div class="container-fluid col-sm-12">
<h2>Comments</h2>
<?php
      $sql2 = "SELECT comments.Comment, comments.DateCreated, users.UserName, notes.* FROM comments
      INNER JOIN notes ON notes.NoteId = comments.NoteId
      INNER JOIN users ON comments.UserId = users.UserId WHERE comments.NoteId = $noteid;";
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result2) > 0) {
      while($row2 = mysqli_fetch_assoc($result2)) { ?>
        <div class="card">
  <div class="card-header">
Posted on <?php $date=date_create($row2["DateCreated"]); echo date_format($date,"d M Y h:i")." by ".$row2["UserName"]; ?>
  </div>
  <div class="card-body">
    <p class="card-text"><?php echo $row2["Comment"]?></p>
  </div>
</div><?php
      }

      }
      mysqli_close($conn);

      ?>

            <form action="postcomment.php?noteid=<?php echo $noteid; ?>" method="POST" style="width: 100%;" onsubmit="return confirm('Are you sure you want to leave a comment?')">
              <div class="form-group text-left">
                <label for="comment">Leave a comment (100 character limit)</label>
                <textarea class="form-control" id="comment" name="comment" rows="2" maxlength="100"></textarea>
              </div>
                <input type="submit" value="Comment" class="btn btn-lg btn-block btn-primary">
            </form>
    </div></div>
    <!-- End of Cards -->
     </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
