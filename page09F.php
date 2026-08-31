<!-- PAGE UNTUK LOGIKA DELETE -->
<?php
  include 'dbconn.php';
  try {
      $no = $_GET['no'];
      $namaFile = $_GET['sampul'];
      // Menghapus file gambar fisik
      if (file_exists('aset/' . $namaFile) && !empty($namaFile)) {
          unlink('aset/' . $namaFile);
      }
      $sql = "DELETE FROM publikasi WHERE no = '$no'";
      $result = $pdo->query($sql);
      echo "
          <script>
            alert('Data Berhasil Dihapus');
            window.location.href = 'page09A.php';
          </script>
      ";
      $pdo = NULL;
  } catch (PDOException $e) {
      exit("PDO Error: " . $e->getMessage() . "<br>");
  }
?>