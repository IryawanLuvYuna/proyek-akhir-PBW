<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Daftar Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
    <?php
    if (isset($_SESSION['toast'])) {
      $toastData = htmlspecialchars(json_encode($_SESSION['toast']));
      echo '<meta name="toast-data" content="' . $toastData . '">';
      unset($_SESSION['toast']);
    }
    ?>
    <script src="toast.js"></script>
  </head>
  <body>
    <header>
    <div class="header-left">
      <img src="aset/logo.png" alt="Logo Web">
      <div class="judulweb">BPS PROVINSI SULAWESI TENGAH</div>
    </div>

      <nav>
        <a href="Home.php">Home</a>
        <a href="page09A.php">Daftar Publikasi</a>
        <a href="page09C.php">Tambah Publikasi</a>
        <a href="galeri.php">Galeri Kegiatan</a>
        <a href="page10B.php">Logout</a>
      </nav>
    </header>

    <main>
