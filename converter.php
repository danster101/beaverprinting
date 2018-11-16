<html>
  <head>
     <title>Bitcoin Currency Converter</title>
  </head>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
  <body>
  <?php
    // Make sure the user submitted all of the data required
    if(isset($_POST['amount']) && is_numeric($_POST['amount']) && isset($_POST['currency'])) { 

      // Use curl to perform the currency conversion using Blockchain.info's currency conversion API
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/tobtc?currency=" . $_POST['currency'] . "&value=" . $_POST['amount']);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $conversion = curl_exec($ch);

      // Use curl to get current prices and 15 minute averages for all currencies from Blockchain.info's exchange rates API
      curl_setopt($ch, CURLOPT_URL, "https://blockchain.info/ticker");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $prices = json_decode(curl_exec($ch), true);
      curl_close($ch);
  ?>


  <div style="text-align:center;">
          <h1>Conversion Results</h1>
  <p><?php echo $_POST['amount']; ?> <?php echo $_POST['currency']; ?> is <?php echo $conversion; ?> BTC.</p> <br>
        <a href="pricing.php" class="btn btn-primary">Go Back</a>     
        </div>
  <?php } else { ?>
    <div style="text-align:center;">
        Please fill out the form completely. <br><br>
        <a href="pricing.php" class="btn btn-primary">Go Back</a>
        </div>
  <?php } ?>
  </body>
</html>