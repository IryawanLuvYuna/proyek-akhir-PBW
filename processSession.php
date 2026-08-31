<?php
  session_start ();
  $timeout = 5;
  if (isset($_SESSION['last_activity'])) {
      // Hitung selisih waktu sekarang dengan waktu terakhir disimpan
      $duration = time() - $_SESSION['last_activity'];
      if ($duration > $timeout) {
          session_unset();
          session_destroy();
          exit("Session telah kadaluwarsa");
      }
  }
  // not necessary but convenient
  if (isset($_REQUEST['address'])) {
      $_SESSION['address'] = $_REQUEST['address'];
  }
?>
<!DOCTYPE html>
<html lang='en-GB'>
  <head><title>Processing</title></head>
  <body>
    <?php
      echo $_SESSION['item'];
      echo $_SESSION['address'];
      // Once we do not need the data anymore , get rid of it
      session_unset();
      session_destroy();
    ?>
  </body>
</html>