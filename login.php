<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="3D Printing Service">
    <meta name="author" content="Danial Hussain, Sam Medlin, Daniel Wang">

    <title>Beaver Printing and Prototyping</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>



     <?php

        $email_err = FALSE;
        $message = $email = $password = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $conn_string = "sslmode=require host=ec2-107-22-189-136.compute-1.amazonaws.com port=5432 dbname=d7blu4f8v68tqu user=ynwnecflnmfikq password=54a5bac6379cf5639d68c9a731d523edd65c930eaabc742a4c0df65d40826444";
          $dbconn = pg_connect($conn_string);
        
        if(!$dbconn){echo "FAILURE";}

        $email = pg_escape_string($dbconn, $_POST["email"]);
        $password = pg_escape_string($dbconn, $_POST["password"]);

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $check_query = "SELECT * FROM \"siteUsers\" WHERE email = '{$email}'";
        $check_result = pg_query($dbconn, $check_query);

        $status = pg_result_status($check_result);

        if($status == PGSQL_FATAL_ERROR)
          echo "status fatal error";
        if($status == PGSQL_BAD_RESPONSE)
          echo "bad response";

        $row = pg_fetch_row($check_result);
        $pass = $row[8];

        if((pg_num_rows($check_result) >= 1) && password_verify($password, $pass)){
          $message = "Log in success!";
        }
        else {
          $email_err = TRUE;
          $message = "Either username or password does not match.";
        }

      }

      ?>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
          Beaver Printing and Prototyping
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pricing.php">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Login
        <!-- <small>Subheading</small> -->
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Login</li>
      </ol>

      <!-- Login Form -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="loginForm" id="loginForm">
            <div class="control-group form-group">
              <div class="controls">
                <label for="email"><?php if($email_err){echo "";} ?>Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Not a valid email." required value="<?php echo $email; ?>"/>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" pattern="^.{8,}$" title="Minimum of 8 characters" required value="<?php echo $password; ?>"/>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="loginButton">Login</button>

            <?php if (!empty($message)) {
              echo "<p>$message</p>";
            } ?>

          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white"><img src="images/logo.png" width="30" height="30" alt=""> Copyright &copy; Beaver Printing and Prototyping 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

  </body>

</html>
