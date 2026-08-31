<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="myCSS.css">
  <title>Galeri Kegiatan BPS Sulawesi Tengah</title>
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
      <a class="active" href="galeri.php">Galeri Kegiatan</a>
      <a href="page10B.php">Logout</a>
    </nav>
  </header>

  <div class="gallery-section">
    <h2>Galeri Kegiatan</h2>

    <div class="gallery-container">

      <!-- preview (gambar besar) -->
      <div class="gallery-preview">
        <img id="previewImg"
          src="aset/foto1.jpeg"
          alt="Preview Kegiatan" />
      </div>

      <!-- thumbnail (gambar kecil) -->
      <div class="gallery-thumbnails">
        <img class="thumb active"
          src="aset/foto1.jpeg"
          data-full="aset/foto1.jpeg"
          alt="Kegiatan 1" />

        <img class="thumb"
          src="aset/foto2.jpeg"
          data-full="aset/foto2.jpeg"
          alt="Kegiatan 2" />

        <img class="thumb"
          src="aset/foto3.jpeg"
          data-full="aset/foto3.jpeg"
          alt="Kegiatan 3" />

        <img class="thumb"
          src="aset/foto4.jpg"
          data-full="aset/foto4.jpg"
          alt="Kegiatan 4" />

        <img class="thumb"
          src="aset/foto5.jpg"
          data-full="aset/foto5.jpg"
          alt="Kegiatan 5" />

        <img class="thumb"
          src="aset/foto6.jpeg"
          data-full="aset/foto6.jpeg"
          alt="Kegiatan 6" />
      </div>

    </div>
  </div>

  <address style="position: relative;">
      Created by Moh. Iryawan F.
      <a href="mailto:222413656@stis.ac.id">(222413656@stis.ac.id)</a>
    </address>
  <script>
    const thumbs = document.querySelectorAll('.thumb');
    const previewImg = document.getElementById('previewImg');

    thumbs.forEach(function(thumb) {
      thumb.addEventListener('click', function() {
        // timpa gambar preview
        previewImg.src = this.getAttribute('data-full');
        previewImg.alt = this.alt;

        // reset semua class active
        thumbs.forEach(function(t) {
          t.classList.remove('active');
        });

        // tambahkan class active ke gambar yg diklik
        this.classList.add('active');
      });
    });
  </script>

</body>
</html>