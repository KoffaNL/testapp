<html>
 <head>
  <title>TestApp successfully deployed</title>
 </head>
 <body>
  <h2>Your TestApp is <?php echo "running, therefore it's not "?>broken</h2>
  <p>PHP version <?php echo phpversion(); ?>.</p>
  <p>Call with ?sleep=5 to trigger sleeping for 5 seconds</p>
  <p>Call with ?load=5 to trigger CPU load for 5 seconds</p>
  <?php
    if (isset($_GET['sleep'])) {
      echo strftime("<p>%Y-%m-%d %H:%M:%S</p>", time());
      echo "<p>Sleeping " . $_GET['sleep'];
      sleep($_GET['sleep']);
      echo "</p>";
      echo strftime("<p>%Y-%m-%d %H:%M:%S</p>", time());
    }
    if (isset($_GET['load'])) {
      echo strftime("<p>%Y-%m-%d %H:%M:%S</p>", time());
      echo "<p>Load: ";
      $load = $_GET['load'];
      $start = time();
      while (time()-$start <= $load) {
        for ($i=0; $i<1000000; $i++) {}
          echo ".";
      }
    }
    echo "</p>";
    echo strftime("<p>%Y-%m-%d %H:%M:%S</p>", time());
    echo "<p>Oh, I just wanted to say ";
    echo getenv('TESTENV');
    echo "</p>";
  ?>
 </body>
</html>
