<!-- LOGIKA INSERT -->
<?php
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
      echo "
          <script>
            alert('Data Berhasil Ditambahkan');
            // JavaScript untuk Redirect Halaman
            window.location.href = 'page09A.php';
            // document.location.href = 'page09A.php'; juga bisa
          </script>
      ";
      
      $pdo = NULL;
  } catch (PDOException $e) {
      exit("PDO Error: " . $e->getMessage() . "<br>");
  }
?>