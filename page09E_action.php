<!-- PAGE UNTUK LOGIKA EDIT -->
<?php
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
      echo "
          <script>
            alert('Data Berhasil Ditambahkan');
            // 2. JavaScript untuk Redirect Halaman
            window.location.href = 'page09A.php';
          </script>
      ";
      $pdo = NULL;
  } catch (PDOException $e) {
      exit("PDO Error: " . $e->getMessage() . "<br>");
  }
?>