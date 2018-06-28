<?php
$error = $_GET["error"];
$title = "Sketch Notes";
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
      <a class="navbar-brand" href="./index.php"><?php echo $title; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </nav>
    <!-- Error Message -->
    <?php
    if($error <> 0) {?>
      <div class="alert alert-danger" role="alert">
      <?php if($error=1) {echo "User with that username already exist";} ?>
      </div>
    <?php
    }
    ?>
    <!-- Big Words -->
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Create an account to use <?php echo $title; ?></h1>
    </div>

    <div class="container">
      <!-- Start of Cards -->
              <div class="card-deck mb-3 text-left">
              <div class="card mb-4 box-shadow">
                <div class="card-header">
                  <h4 class="my-0 font-weight-normal text-left">Please Choose a Username and Password</h4>
                </div>
                <div class="card-body">
                  <form action="backend/createaction.php" method="post">
                    <div class="form-group">
                      <label for="UserEmail" class="text-left">Username</label>
                      <input class="form-control" id="UserName" name="UserName" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                      <label for="UserPassword" class="text-left">Password</label>
                      <input type="password" class="form-control" id="UserPassword" name="UserPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
                  </form>
                </div>
              </div>
            </div>
    <!-- End of Cards -->
     </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
