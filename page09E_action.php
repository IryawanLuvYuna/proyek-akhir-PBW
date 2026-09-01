<!-- LOGIKA EDIT -->
<?php
  session_start();
  include 'dbconn.php';
  try {
      $no = $_POST['no'];
      $judul = $_POST['judul'];
      $tanggal_rilis = $_POST['tanggal_rilis'];
      $dirUpload = "aset/";
      if (isset($_FILES['sampul_baru']) && $_FILES['sampul_baru']['error'] === 0) 
      {
          $namaFile = $_FILES['sampul_baru']['name'];
          $lokasiSementara = $_FILES['sampul_baru']['tmp_name'];
          move_uploaded_file($lokasiSementara, $dirUpload.$namaFile);
          $sql = "UPDATE publikasi 
                  SET judul = '$judul', tanggal_rilis = '$tanggal_rilis', sampul = '$namaFile' 
                  WHERE no = '$no'";
      } 
      else 
      {
          // hanya update judul dan tanggal rilis
          $sql = "UPDATE publikasi 
                  SET judul = '$judul', tanggal_rilis = '$tanggal_rilis' 
                  WHERE no = '$no'";
      }
      $result = $pdo->query($sql);
      
      // Simpan pesan toast ke session
      $_SESSION['toast'] = [
          'type' => 'success',
          'message' => 'Data Berhasil Diupdate'
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