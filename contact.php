
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
            $mail->Password = "BeaverPrinting123.";
            //Set who the message is to be sent from
            $mail->setFrom('beaverprintingcompany@gmail.com', 'Admin');

            //Set an alternative reply-to address
            //$mail->addReplyTo('replyto@example.com', 'First Last');
            //Set who the message is to be sent to
            $mail->addAddress('beaverprintingcompany@gmail.com', 'Admin');


                if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
                    $mail->Subject = 'PHPMailer contact form';
                    //Keep it simple - don't use HTML
                    $mail->isHTML(false);
                    //Build a simple message body
                    $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;

        if (!$mail->send()) {
            //The reason for failing to send will be in $mail->ErrorInfo
            //but you shouldn't display errors to users - process the error, log it on your server.
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
         } else {
        $msg = 'Invalid email address, message ignored.';
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
            <li class="nav-item">
              <a class="nav-link" href="signup.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pricing.php">Pricing</a>
            </li>
            <li class="nav-item active">
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
      <h1 class="mt-4 mb-3">Contact Us
        <!-- <small>Subheading</small> -->
      </h1>


      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact Us</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3142.6637063595244!2d-78.51303458416291!3d38.031618779713554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b3865b677c5335%3A0x6490aa88130497ec!2sRice+Hall+Information+Technology+Engineering+Building%2C+85+Engineer&#39;s+Way%2C+Charlottesville%2C+VA+22903!5e0!3m2!1sen!2sus!4v1537807542170"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            85 Engineer's Way
            <br>Charlottesville, VA 22904
            <br>
          </p>
          <p>
            <abbr title="Phone">P</abbr>: (703) 268-0971
          </p>
          <p>
            <abbr title="Email">E</abbr>:
            <a href="mailto:danial@virginia.edu">danial@virginia.edu
            </a>
          </p>
          <p>
            <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
<!--           <form name="sentMessage" id="contactForm" action="" method="POST" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" name="name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div> -->
            <!--
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            -->
<!--             <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" name="email "id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" name="message" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div> -->
            <!-- For success/fail messages -->
<!--             <button type="submit" name="submit" value="Send" class="btn btn-primary" id="sendMessageButton">Send Message</button> -->

          <form method="POST">

            <div class="control-group form-group">
              <div class="controls">
                <label for="name">Full Name: <input type="text" name="name" id="name" class="form-control" required data-validation-required-message="Please enter your name."></label><br>
                <p class="help-block"></p>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">
                <label for="email">Email address: <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Please enter your email address."></label><br>
              </div>
            </div>

            <div class="control-group form-group">
              <div class="controls">

                <label for="message">Message: <textarea name="message" id="message" rows="10" cols="100" class="form-control" equired data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea></label><br>

              </div>
            </div>

            <div id="success"></div>
            
            <input type="submit" value="Send Message" class="btn btn-primary" style="margin-bottom:30px">

            <?php if (!empty($msg)) {
              echo "<p>$msg</p>";
            } ?>

          </form>


        </div>

      </div>
      <!-- /.row -->

    </div>
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
