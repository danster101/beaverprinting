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

              /**
         * This example shows settings to use when sending via Google's Gmail servers.
         * This uses traditional id & password authentication - look at the gmail_xoauth.phps
         * example to see how to use XOAUTH2.
         * The IMAP section shows how to save this message to the 'Sent Mail' folder using IMAP commands.
         */
        //Import PHPMailer classes into the global namespace
        use PHPMailer\PHPMailer\PHPMailer;
        


        $msg = '';

        if (array_key_exists('email', $_POST)) {
            date_default_timezone_set('Etc/UTC');


            require 'vendor/autoload.php';
            //Create a new PHPMailer instance
            $mail = new PHPMailer;
            //Tell PHPMailer to use SMTP
            $mail->isSMTP();
            //Enable SMTP debugging
            // 0 = off (for production use)
            // 1 = client messages
            // 2 = client and server messages
            //Set the hostname of the mail server
            $mail->Host = 'smtp.gmail.com';
            // use
            // $mail->Host = gethostbyname('smtp.gmail.com');
            // if your network does not support SMTP over IPv6
            //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
            $mail->Port = 587;
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            //Username to use for SMTP authentication - use full email address for gmail
            $mail->Username = "beaverprintingcompany@gmail.com";
            //Password to use for SMTP authentication
            $mail->Password = "DamGoodPassword123.";
            //Set who the message is to be sent from
            $mail->setFrom('beaverprintingcompany@gmail.com', 'Admin');

            //Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');
            //Set who the message is to be sent to
            $mail->addAddress($_POST['email']);


                if ($mail->addReplyTo('beaverprintingcompany@gmail.com', 'Admin')) {
                    $mail->Subject = 'BeaverPrinting Signup Confirmation';
                    //Keep it simple - don't use HTML
                    $mail->isHTML(false);
                    //Build a simple message body
                    $mail->Body = <<<EOT
Dear {$_POST['firstName']},


This email is a confirmation that your BeaverPrinting account has been successfully created.

Best,

The BeaverPrinting Team
EOT;

        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'You have successfully signed up for BeaverPrinting. A confirmation has been sent to your email address.';
        }
         } else {
        $msg = 'Oops, it appears the email address you provided was invalid.';
        }
}









      $email_err = FALSE;
      $firstName = $lastName = $email = $password = $phone = $address = $city = $state = $zip = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $conn_string = "sslmode=require host=ec2-107-22-189-136.compute-1.amazonaws.com port=5432 dbname=d7blu4f8v68tqu user=ynwnecflnmfikq password=54a5bac6379cf5639d68c9a731d523edd65c930eaabc742a4c0df65d40826444";
        $dbconn = pg_connect($conn_string);
        
        if(!$dbconn){echo "FAILURE";}
        
        $firstName = pg_escape_string($dbconn, $_POST["firstName"]);
        $lastName = pg_escape_string($dbconn, $_POST["lastName"]);
        $email = pg_escape_string($dbconn, $_POST["email"]);
        $password = pg_escape_string($dbconn, password_hash($_POST["password"], PASSWORD_DEFAULT));
        $phone = pg_escape_string($dbconn, $_POST["phone"]);
        $address = pg_escape_string($dbconn, $_POST["address"]);
        $city = pg_escape_string($dbconn, $_POST["city"]);
        $state = pg_escape_string($dbconn, $_POST["state"]);
        $zip = pg_escape_string($dbconn, $_POST["zip"]);
        
        $check_query = "SELECT * FROM \"siteUsers\" WHERE email = '{$email}'";
        $check_result = pg_query($dbconn, $check_query);
        
        $status = pg_result_status($check_result);
        if($status == PGSQL_FATAL_ERROR)
          echo "status fatal error";
        if($status == PGSQL_BAD_RESPONSE)
          echo "bad response";
        
        
        if(pg_num_rows($check_result) > 0){
          $email_err = TRUE;
        }
        else {
          $query = "INSERT INTO \"siteUsers\" {firstName, lastName, email, phone, address, city, state, zip, password} VALUES ('$firstName','$lastName', '$email', '$phone', '$address', '$city', '$state', '$zip', '$password')";
          $result = pg_query($dbconn, $query);
          if(!$query){echo "failure on insert query";}
          $firstName = $lastName = $email = $password = $phone = $address = $city = $state = $zip = "";
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
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pricing.php">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="member.php">My Account</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Sign Up
        <!-- <small>Subheading</small> -->
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Sign Up</li>
      </ol>

      <!-- Sign Up Form -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="signUpForm" id="signUpForm">
            <div class="control-group form-group">
              <div class="controls">
                <label for="firstName">First Name:</label>
                <input type="text" class="form-control" id="firstName" name="firstName" pattern="^[a-zA-Z]+$" title="Please only use letters" required value="<?php echo $firstName; ?>" />
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="lastName">Last Name:</label>
                <input type="text" class="form-control" id="lastName" name="lastName" pattern="^[a-zA-Z]+$" title="Please only use letters" required value="<?php echo $lastName; ?>"/>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="email"><?php if($email_err){echo "This Email Address is Already Taken - Try a New ";} ?>Email Address:</label>
                <input type="email" class="form-control" id="email" name="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" title="Not a valid email." required value="<?php echo $email; ?>"/>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" pattern="^.{8,}$" title="Minimum of 8 characters" required value="<?php echo $password; ?>"/>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="phone">Phone Number:</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="XXX-XXX-XXXX" pattern="^\d{3}-\d{3}-\d{4}$" title="xxx-xxx-xxxx" required value="<?php echo $phone; ?>"/>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label for="address">Address:</label>
                <input type="tel" class="form-control" id="address" name="address" pattern="^[a-zA-Z0-9- ]+$" title="Please only enter letters and numbers" required value="<?php echo $address; ?>"/>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" pattern="^[a-zA-Z0-9- ]+$" required value="<?php echo $city; ?>"/>
              </div>
              <div class="col-md-3 mb-3">
                <label>State</label>
                <select class="custom-select" name="state" required>
                  <option value="">Select</option>
                  <option value="Alabama">AL</option>
                  <option value="Alaska">AK</option>
                  <option value="Arizona">AZ</option>
                  <option value="Arkansas">AR</option>
                  <option value="California">CA</option>
                  <option value="Colorado">CO</option>
                  <option value="Connecticut">CT</option>
                  <option value="Delaware">DE</option>
                  <option value="District of Columbia">DC</option>
                  <option value="Florida">FL</option>
                  <option value="Georgia">GA</option>
                  <option value="Hawaii">HI</option>
                  <option value="Idaho">ID</option>
                  <option value="Illinois">IL</option>
                  <option value="Indiana">IN</option>
                  <option value="Iowa">IA</option>
                  <option value="Kansas">KS</option>
                  <option value="Kentucky">KY</option>
                  <option value="Louisiana">LA</option>
                  <option value="Maine">ME</option>
                  <option value="Maryland">MD</option>
                  <option value="Massachusetts">MA</option>
                  <option value="Michigan">MI</option>
                  <option value="Minnesota">MN</option>
                  <option value="Mississippi">MS</option>
                  <option value="Missouri">MO</option>
                  <option value="Montana">MT</option>
                  <option value="Nebraska">NE</option>
                  <option value="Nevada">NV</option>
                  <option value="New Hampshire">NH</option>
                  <option value="New Jersey">NJ</option>
                  <option value="New Mexico">NM</option>
                  <option value="New York">NY</option>
                  <option value="North Carolina">NC</option>
                  <option value="North Dakota">ND</option>
                  <option value="Ohio">OH</option>
                  <option value="Oklahoma">OK</option>
                  <option value="Oregon">OR</option>
                  <option value="Pennsylvania">PA</option>
                  <option value="Rhode Island">RI</option>
                  <option value="South Carolina">SC</option>
                  <option value="South Dakota">SD</option>
                  <option value="Tennessee">TN</option>
                  <option value="Texas">TX</option>
                  <option value="Utah">UT</option>
                  <option value="Vermont">VT</option>
                  <option value="Virginia">VA</option>
                  <option value="Washington">WA</option>
                  <option value="West Virginia">WV</option>
                  <option value="Wisconsin">WI</option>
                  <option value="Wyoming">WY</option>
                </select>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip (5 digits)</label>
                <input type="text" class="form-control" id="zip" name="zip" pattern="^\d{5}$" title="Please enter a 5-digit zip code" required value="<?php echo $zip; ?>">
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="signUpButton">Sign Up</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>

    <!--<script type="text/javascript">
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();-->



    </script>
    <!-- /.container -->

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
