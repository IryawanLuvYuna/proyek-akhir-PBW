<!-- PAGE UNTUK DAFTAR PUBLIKASI -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daftar Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
  </head>
  <body class="publikasi-page">
    <?php include 'header.php'; ?>

    <div class="publikasi-page-container">
      <div class="publikasi-content">
        <h1 class="publikasi-title">Daftar Publikasi BPS Provinsi Sulawesi Tengah</h1>

        <div class="search-container">
          <form action="page09A.php" method="GET" class="search-form">
            <div class="search-wrapper">
              <input type="text" id="txt1" name="search" class="search-input" placeholder="Cari judul publikasi..." 
                     value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" 
                     onkeyup="showHint(this.value)">
              <button type="submit" class="search-button">
                <img src="aset/kaca_pembesar.png" alt="Search" class="search-icon">
              </button>
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
        
        // Cek apakah ada parameter search
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        
        if (!empty($search)) {
            // Gunakan query dengan LIKE untuk pencarian
            $sql = "SELECT * FROM publikasi WHERE judul LIKE ? ORDER BY no";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(["%" . $search . "%"]);
            $result = $stmt;
        } else {
            // Tampilkan semua data jika tidak ada search
            $result = $pdo->query("SELECT * FROM publikasi ORDER BY no");
        }
        
        $hasResults = false;
        foreach ($result as $row) {
            $hasResults = true;
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
        
        // Tampilkan pesan jika tidak ada hasil
        if (!$hasResults) {
            echo "<tr>";
            echo "  <td colspan='5' class='no-results'>Tidak ada judul publikasi yang ditemukan</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="toast.js"></script>
    <script src="page11A_suggestion.js"></script>
    <?php include 'footer.php'; ?>
  </body>
</html>