<!DOCTYPE html>
<html lang='en-GB'>
  <head>
    <title>PHP 09D</title>
  </head>
  <body>
    <?php include 'dbconn.php';
      echo "<h2>Data pada Tabel Publikasi (While loop)</h2>\n";
      $result = $pdo->query("select * from publikasi");
      echo "Rows retrieved: " . $result ->rowcount() . "<br><br>\n";
      while ($row = $result ->fetch()) {
        echo "No: ". $row["no"]. "<br>\n";
        echo "Judul: ". $row["judul"]. "<br>\n";
        echo "Tanggal Rilis: ". $row["tanggal_rilis"]. "<br>\n";
        echo "Sampul: ". $row["sampul"]. "<br><br>\n";
      }
      echo "<h2>Data pada Tabel Publikasi (Foreach loop)</h2>\n";
      $result = $pdo->query("select * from publikasi");
      foreach ($result as $row) {
        echo "No: ". $row["no"]. "<br>\n";
        echo "Judul: ". $row["judul"]. "<br>\n";
        echo "Tanggal Rilis: ". $row["tanggal_rilis"]. "<br>\n";
        echo "Sampul: ". $row["sampul"]. "<br><br>\n";
      }
      echo "<table border='1' style='border-collapse: collapse'>";
      echo "    <tr>";
      echo "      <th style='padding: 2px'>No</th>";
      echo "      <th style='padding: 2px'>Judul</th>";
      echo "      <th style='padding: 2px'>Tanggal rilis</th>";
      echo "      <th style='padding: 2px'>Sampul</th>";
      echo "    </tr>";
      // looping untuk memasukkan data array ke dalam tabel
      $result = $pdo->query("select * from publikasi order by no"); // mengurutkan berdasarkan no secara asc
      foreach ($result as $row) {
          echo "<tr>";
          echo "  <td style='padding: 2px'>" . $row['no'] . "</td>";
          echo "  <td style='padding: 2px'>" . $row['judul'] . "</td>";
          echo "  <td style='padding: 2px'>" . $row['tanggal_rilis'] . "</td>";
          echo "  <td style='padding: 2px'>" . $row['sampul'] . "</td>";
          echo "</tr>";
      }
    ?>
  </body>
</html>