<!-- PAGE UNTUK TAMBAH PUBLIKASI -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Tambah Publikasi BPS Sulawesi Tengah</title>
    <link rel="stylesheet" href="myCSS.css">
    <script src="validasiForm.js"></script>
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
        <a class="active" href="page09C.php">Tambah Publikasi</a>
        <a href="galeri.php">Galeri Kegiatan</a>
        <a href="page10B.php">Logout</a>
      </nav>
    </header>

    <div class="form-wrapper">
      <div class="divError">  
        <p id="pesanError"></p>
      </div>
      <main class="form-publikasi">
        <form name="formPublikasi" action="page09C_action.php" method="post"
        onsubmit="return validate09C()" enctype="multipart/form-data">
          <h2>Form Tambah Publikasi Baru</h2>
          <br>
          <table>
            <tr>
              <td>Nomor:</td>
              <td><input type="text" name="no" placeholder="Nomor urut"></td>
            </tr>
            <tr>
              <td>Judul:</td>
              <td><input type="text" name="judul" placeholder="Judul publikasi"></td>
            </tr>
            <tr>
              <td>Tanggal Rilis:</td>
              <td><input type="date" name="tanggal_rilis"></td>
            </tr>
            <tr>
              <td>Sampul:</td>
              <td><input type="file" name="sampul" accept="image/*"></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;">
                <input type="submit" value="Tambah">
              </td>
            </tr>
          </table>
        </form>
      </main>
    </div>
    <address style="position: absolute;">
      Created by Moh. Iryawan F.
      <a href="mailto:222413656@stis.ac.id">(222413656@stis.ac.id)</a>
    </address>

  </body>
</html>
