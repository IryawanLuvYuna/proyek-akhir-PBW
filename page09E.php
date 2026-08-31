<!-- PAGE UNTUK EDIT -->
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
        <form name="formEditPublikasi" action="page09E_action.php" method="post"
        onsubmit="return validate09C()" enctype="multipart/form-data">
          <h2>Form Tambah Publikasi Baru</h2>
          <br>
          <table>
            <tr>
              <td>Nomor:</td>
              <td style="text-align: left;1"> <input type="text" id="no" name="no" value="<?= $_GET['no'];?>" class="input-readonly" readonly>
              </td>
            </tr>
            <tr>
              <td>Judul:</td>
              <td style="text-align: left;"> <input type="text" id="judul" name="judul" value="<?= $_GET['judul'];?>">
              </td>
            </tr>
            <tr>
              <td>Tanggal Rilis:</td>
              <td style="text-align: left;"> <input type="date" id="tanggal_rilis" name="tanggal_rilis" value="<?= $_GET['tanggal_rilis'];?>">
              </td>
            </tr>
            <tr>
              <td>Sampul:</td>
              <td>
                <table class="table-sampul">
                  <tr>
                    <td class="label-sampul"><label for="sampul_lama">Sampul Lama:</label></td>
                    <td class="input-file-sampul">
                      <img src="aset/<?= $_GET['sampul']; ?>" alt="No Image" class="img-sampul-lama">
                    </td>
                  </tr>
                  <tr>
                    <td class="label-sampul"><label for="sampul_baru">Sampul Baru:</label></td>
                    <td class="input-file-sampul">
                      <input type="file" id="sampul_baru" name="sampul_baru">
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;">
                <input type="submit" value="Ubah Data" style="font-size: 1em">
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
