<!-- LOGIKA DELETE -->
<?php
  session_start();
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
      
      // Simpan pesan toast ke session
      $_SESSION['toast'] = [
          'type' => 'success',
          'message' => 'Data Berhasil Dihapus'
      ];
      
      header("Location: page09A.php");
      exit();
      
      $pdo = NULL;
  } catch (PDOException $e) {
      $_SESSION['toast'] = [
          'type' => 'error',
          'message' => 'Error: ' . $e->getMessage()
      ];
      header("Location: page09A.php");
      exit();
  }
?>