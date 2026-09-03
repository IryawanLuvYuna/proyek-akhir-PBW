<!-- LOGIKA INSERT -->
<?php
  session_start();
  // Proteksi: Redirect ke login jika belum login
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: page10A.php");
    exit();
  }
  include 'dbconn.php';
  try {
      $no = $_POST['no'];
      $judul = $_POST['judul'];
      $tanggal_rilis = $_POST['tanggal_rilis'];
      $namaFile = '';
      // ambil data file
      $namaFile = $_FILES['sampul']['name'];
      $lokasiSementara = $_FILES['sampul']['tmp_name'];
      // tentukan lokasi file akan dipindahkan
      $dirUpload = "aset/";
      move_uploaded_file($lokasiSementara, $dirUpload.$namaFile);
      $sql = "INSERT INTO publikasi (no, judul, tanggal_rilis, sampul) VALUES 
              ('$no', '$judul', '$tanggal_rilis', '$namaFile')";
      $result = $pdo->query($sql);
      
      // Simpan pesan toast ke session
      $_SESSION['toast'] = [
          'type' => 'success',
          'message' => 'Data Berhasil Ditambahkan'
      ];
      
      header("Location: page09A.php");
      exit();
      
      $pdo = NULL;
  } catch (PDOException $e) {
      $_SESSION['toast'] = [
          'type' => 'error',
          'message' => 'Error: ' . $e->getMessage()
      ];
      header("Location: page09C.php");
      exit();
  }
?>