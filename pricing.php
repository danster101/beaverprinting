<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beaver Printing - Serivices & Pricing</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

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
			<li class="nav-item active">
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
      <h1 class="mt-4 mb-3">Pricing
        <!-- <small>Subheading</small> -->
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item active">Pricing</li>
      </ol>



    <!-- Page Content -->
    <div class="container">
      
      <h1 class="my-4">
        <small>Choose a product </small>
	     </h1>
		   <img class="d-block w-100" src="images/Capture.JPG" alt="Italian Trulli">

      <br>
      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">The Good</h4>
            <div class="card-body">
              <div class="embed-responsive embed-responsive-4by3">
              <iframe allowfullscreen webkitallowfullscreen width="640" height="480" frameborder="0" seamless src="https://p3d.in/e/uLS6U"></iframe>
              </div>
              <p class="card-text">-Single-Color ABS<br />-Maximum size 200 x 200 x 400 mm<br />-1 year Beaver Family™ Service</p>
              <?php  
              $url = "https://bitpay.com/api/rates";

              $json = file_get_contents($url);
              $data = json_decode($json, TRUE);

              $rate = $data[2]["rate"];    
              $usd_price = 14.99;   
              $bitcoin_price = round( $usd_price / $rate , 8 );
              ?>

             
              -Price: $ <?=$usd_price ?> / BTC <?=$bitcoin_price ?>
           
            </div>
            <div class="card-footer">
              <a href="payment1.php" class="btn btn-primary">Buy it Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">The Better</h4>
            <div class="card-body">
              <div class="embed-responsive embed-responsive-4by3">
              <iframe allowfullscreen webkitallowfullscreen width="640" height="480" frameborder="0" seamless src="https://p3d.in/e/yQ4Mq"></iframe>
              </div>
              <p class="card-text">-Single-Color ABS<br />-Maximum size 400 x 300 x 400 mm<br />-3 year Beaver Family™ Service</p>
              <?php  
              $url = "https://bitpay.com/api/rates";

              $json = file_get_contents($url);
              $data = json_decode($json, TRUE);

              $rate = $data[2]["rate"];    
              $usd_price = 24.99;   
              $bitcoin_price = round( $usd_price / $rate , 8 );
              ?>

             
              -Price: $ <?=$usd_price ?> / BTC <?=$bitcoin_price ?>
           
            </div>
            <div class="card-footer">
              <a href="payment2.php" class="btn btn-primary">Buy it Now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <h4 class="card-header">The Best</h4>
            <div class="card-body">
              <div class="embed-responsive embed-responsive-4by3">
              <iframe allowfullscreen webkitallowfullscreen width="640" height="480" frameborder="0" seamless src="https://p3d.in/e/pnzZ6"></iframe>
              </div>
              <p class="card-text">-Multi-Color PLA<br />-Maximum size 600 x 400 x 400 mm<br />-5 year Beaver Family™ Service</p>
              <?php  
              $url = "https://bitpay.com/api/rates";

              $json = file_get_contents($url);
              $data = json_decode($json, TRUE);

              $rate = $data[2]["rate"];    
              $usd_price = 34.99;   
              $bitcoin_price = round( $usd_price / $rate , 8 );
              ?>

            
              -Price: $ <?=$usd_price ?> / BTC <?=$bitcoin_price ?>
           
            </div>
            <div class="card-footer">
              <a href="payment3.php" class="btn btn-primary">Buy it Now</a>
            </div>
          </div>
        </div>
      </div>

      <p class="m-0 text-center text-black"> *Bitcoin prices may change due to currency fluctuations</p>


 <img class="d-block w-100" src="images/Currency.JPG" alt="Italian Trulli">
 <br> <br> <br> 

      <form action="converter.php" method="post">
      <div style="text-align:center;">
      <h1>Bitcoin Currency Converter</h1><br>
        <label for="amount">Amount:</label>
        <input type="text"name="amount" id="amount">

        &nbsp;&nbsp;&nbsp;
        <label for="currency">Currency:</label>
        
        <select name="currency" class="btn btn-primary" id="currency">
          <option value="USD">USD</option>
          <option value="EUR">EUR</option>
          <option value="CNY">CNY</option>
          <option value="JPY">JPY</option>
          <option value="SGD">SGD</option>
          <option value="HKD">HKD</option>
          <option value="CAD">CAD</option>
          <option value="AUD">AUD</option>
          <option value="NZD">NZD</option>
          <option value="GBP">GBP</option>
          <option value="DKK">DKK</option>
          <option value="SEK">SEK</option>
          <option value="BRL">BRL</option>
          <option value="CHF">CHF</option>
          <option value="RUB">RUB</option>
          <option value="SLL">SLL</option>
        </select>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" class="btn btn-primary" </a>
      </div>
      </form>
       <br> <br> <br>

	  

      <!-- Our Customers -->
      <!--
      <h2>Our Customers</h2>
      <div class="row">
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
        <div class="col-lg-2 col-sm-4 mb-4">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </div>
      </div>
      -->
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

  </body>

</html>
