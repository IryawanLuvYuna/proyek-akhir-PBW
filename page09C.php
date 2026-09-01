<!-- PAGE UNTUK TAMBAH PUBLIKASI -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tambah Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
    <script src="validasiForm.js"></script>
  </head>
  <body class="form-page">

    <header>
    <div class="header-left">
      <img src="aset/logo.png" alt="Logo Web">
      <div class="judulweb">BPS PROVINSI SULAWESI TENGAH</div>
    </div>

      <nav>
        <a href="Home.php">Home</a>
        <a href="page09A.php">Daftar Publikasi</a>
        <a class="active" href="page09C.php">Tambah Publikasi</a>
        <a href="galeri.php">Galeri Kegiatan</a>
        <a href="page10B.php">Logout</a>
      </nav>
    </header>

    <div class="form-page-container">
      <div class="form-content">
        <div class="form-card">
          <div class="form-header">
            <h2 class="form-title">Form Tambah Publikasi Baru</h2>
          </div>

          <div class="divError" id="divError">
            <p id="pesanError"></p>
          </div>

          <form name="formPublikasi" action="page09C_action.php" method="post"
          onsubmit="return validate09C()" enctype="multipart/form-data" class="publikasi-form">
            <div class="form-group">
              <label for="no" class="form-label">Nomor Urut</label>
              <input type="text" id="no" name="no" class="form-input" placeholder="Masukkan nomor urut">
            </div>

            <div class="form-group">
              <label for="judul" class="form-label">Judul Publikasi</label>
              <input type="text" id="judul" name="judul" class="form-input" placeholder="Masukkan judul publikasi">
            </div>

            <div class="form-group">
              <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
              <input type="date" id="tanggal_rilis" name="tanggal_rilis" class="form-input">
            </div>

            <div class="form-group">
              <label for="sampul" class="form-label">Sampul Publikasi</label>
              <div class="file-upload-wrapper">
                <input type="file" id="sampul" name="sampul" class="file-input" accept="image/*">
                <label for="sampul" class="file-label">
                  <span class="file-text">Format yang didukung: JPG, PNG, GIF</span>
                </label>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="form-submit">Tambah Publikasi</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>

  </body>
</html>
