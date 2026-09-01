<!-- PAGE UNTUK EDIT -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Edit Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
    <script src="validasiForm.js"></script>
  </head>
  <body class="form-page">
    <?php include 'header.php'; ?>

    <div class="form-page-container">
      <div class="form-content">
        <div class="form-card">
          <div class="form-header">
            <h2 class="form-title">Form Edit Publikasi</h2>
          </div>

          <div class="divError" id="divError">
            <p id="pesanError"></p>
          </div>

          <form name="formEditPublikasi" action="page09E_action.php" method="post"
          onsubmit="return validate09C()" enctype="multipart/form-data" class="publikasi-form">
            <div class="form-group">
              <label for="no" class="form-label">Nomor Urut</label>
              <input type="text" id="no" name="no" value="<?= $_GET['no'];?>" class="form-input input-readonly" readonly>
            </div>

            <div class="form-group">
              <label for="judul" class="form-label">Judul Publikasi</label>
              <input type="text" id="judul" name="judul" value="<?= $_GET['judul'];?>" class="form-input">
            </div>

            <div class="form-group">
              <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
              <input type="date" id="tanggal_rilis" name="tanggal_rilis" value="<?= $_GET['tanggal_rilis'];?>" class="form-input">
            </div>

            <div class="form-group">
              <label class="form-label">Sampul Publikasi</label>
              <div class="sampul-preview">
                <label class="sampul-label">Sampul Lama:</label>
                <img src="aset/<?= $_GET['sampul']; ?>" alt="No Image" class="sampul-lama-img">
              </div>
              <div class="file-upload-wrapper">
                <input type="file" id="sampul_baru" name="sampul_baru" class="file-input" accept="image/*">
                <label for="sampul_baru" class="file-label">
                  <span class="file-text">Format yang didukung: JPG, PNG, GIF (Opsional)</span>
                </label>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="form-submit">Ubah Data</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include 'footer.php'; ?>
  </body>
</html>
