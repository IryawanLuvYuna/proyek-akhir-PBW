<!-- PAGE UNTUK DAFTAR PUBLIKASI -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daftar Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
  </head>
  <body class="publikasi-page">
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

    <div class="publikasi-page-container">
      <div class="publikasi-content">
        <h1 class="publikasi-title">Daftar Publikasi BPS Provinsi Sulawesi Tengah</h1>

        <div class="search-container">
          <form action="" class="search-form">
            <div class="search-wrapper">
              <input type="text" id="txt1" class="search-input" placeholder="Cari judul publikasi..." onkeyup="showHint(this.value)">
              <img src="aset/kaca_pembesar.png" alt="Search" class="search-icon">
            </div>
          </form>
          <div id="txtHint" class="search-suggestions"></div>
        </div>

        <div class="table-container">
          <table class="publikasi-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Rilis</th>
                <th>Sampul</th>
                <th>Modifikasi</th>
              </tr>
            </thead>
            <tbody>
        <?php
        include 'dbconn.php';
        $result = $pdo->query("select * from publikasi order by no");
        foreach ($result as $row) {
            echo "<tr>";
            echo "  <td>" . $row['no'] . "</td>";
            echo "  <td>" . $row['judul'] . "</td>";
            echo "  <td>" . $row['tanggal_rilis'] . "</td>";
            echo "  <td class='sampul-cell'>
                    <img src='aset/". $row["sampul"]. "' 
                    alt = '" .$row["sampul"]. "' class='sampul-img'>
                    </td>";
            echo "  <td class='action-cell'>
                    <a href='page09E.php?no=", $row["no"], "&judul=", $row["judul"],
                    "&tanggal_rilis=", $row["tanggal_rilis"], "&sampul=", $row["sampul"], "' 
                    class='action-btn edit-btn' title='Edit'>
                    <img src='aset/pencil.png' alt='Edit' class='action-icon-img'>
                    </a>
                    <a href='page09F.php?no=", $row["no"], "&tanggal_rilis=", $row["tanggal_rilis"], "&sampul=", $row["sampul"], "' 
                    class='action-btn delete-btn' title='Hapus'>
                    <img src='aset/trash_bin.png' alt='Hapus' class='action-icon-img'>
                    </a>
                    </td>";
            echo "</tr>";
        }
        ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="page11A_suggestion.js"></script>
    <?php include 'footer.php'; ?>
  </body>
</html>