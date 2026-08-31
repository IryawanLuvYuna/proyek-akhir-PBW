<!DOCTYPE html>
<html lang='en-GB'>
  <head>
    <title>PHP 09B</title>
  </head>
  <body>
    <?php
    echo 'Item: ', $_REQUEST['item'], "<br>";
    echo '
      <form action="php09C.php" method="post">
        <input type="hidden" name="item" value= " ' . $_REQUEST['item'] . '">
        <label>Address: <input type="text" name="address"></label>
      </form>';
    ?>
  </body>
</html>