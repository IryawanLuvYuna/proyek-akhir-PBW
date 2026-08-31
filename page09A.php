<!-- PAGE UNTUK DAFTAR PUBLIKASI -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daftar Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
  </head>
  <body>
    <header>
    <div class="header-left">
      <img src="aset/logo.png" alt="Logo Web">
      <div class="judulweb">BPS PROVINSI SULAWESI TENGAH</div>
    </div>

      <nav>
        <a href="Home.php">Home</a>
        <a class="active" href="page09A.php">Daftar Publikasi</a>
        <a href="page09C.php">Tambah Publikasi</a>
        <a href="galeri.php">Galeri Kegiatan</a>
        <a href="page10B.php">Logout</a>
      </nav>
    </header>
    <main>
    <?php include 'dbconn.php';
      echo "<h1>Daftar Publikasi BPS Provinsi Sulawesi Tengah</h1>";
      echo "<form action=''>";
      echo "Cari Judul Publikasi: <input type='text' id='txt1' onkeyup='showHint(this.value)'>";
      echo "</form>";
      echo "<p>Suggestions: <span id='txtHint'></span></p>";
      echo "<table border='1'>";
          echo "    <tr>";
          echo "      <th>No</th>";
          echo "      <th>Judul</th>";
          echo "      <th>Tanggal rilis</th>";
          echo "      <th>Sampul</th>";
          echo "      <th>Modifikasi</th>";
          echo "    </tr>";
      $result = $pdo->query("select * from publikasi order by no"); // mengurutkan berdasarkan no secara asc
      foreach ($result as $row) {
          echo "<tr>";
          echo "  <td>" . $row['no'] . "</td>";
          echo "  <td>" . $row['judul'] . "</td>";
          echo "  <td>" . $row['tanggal_rilis'] . "</td>";
          echo "  <td> <img src='aset/". $row["sampul"]. "' 
                  alt = '" .$row["sampul"]. "' width='70px'> </td>";
          echo "  <td>
                  <a href='page09E.php?no=", $row["no"], "&judul=", $row["judul"],
                  "&tanggal_rilis=", $row["tanggal_rilis"], "&sampul=", $row["sampul"], "' title='Edit'><img src='aset/pencil.png'
                  style='width:25px;height:25px;'></a>
                  <a href='page09F.php?no=", $row["no"], "&tanggal_rilis=", $row["tanggal_rilis"], "&sampul=", $row["sampul"], "' title='Hapus'>
                  <img src='aset/trash_bin.png' style='width:30px;height:30px;'></a>
                  </td>";
          echo "</tr>";
      }
      echo '</table>';
      echo '<script src="page11A_suggestion.js"></script>';
      include 'footer.php'; //tag main ditutup di sini
    ?>