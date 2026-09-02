<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include 'header.php';
?>

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

<?php
include 'footer.php';
?>