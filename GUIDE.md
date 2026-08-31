# Panduan & Dokumentasi Proyek Website

## 1. Ringkasan Proyek
Website ini adalah aplikasi web sederhana yang terhubung ke database MySQL (phpMyAdmin) menggunakan PHP. Saat ini proyek dalam tahap pengembangan awal (versi dasar), belum production-ready.

## 2. Tech Stack
- **Frontend:** HTML, CSS, JavaScript (Vanilla / Murni) — tidak menggunakan framework (bukan React/Vue), tidak menggunakan CSS framework seperti Bootstrap/Tailwind kecuali disebutkan lain.
- **Backend:** PHP 8.3.30 — native PHP, tidak menggunakan framework (bukan Laravel/CodeIgniter) kecuali disebutkan lain.
- **Database:** MySQL / MariaDB via phpMyAdmin
- **Server Lokal (Development):** Laragon
- **Dependency Manager:** Tidak menggunakan Composer, semua library manual.

## 3. Struktur Folder & File

/project-root
├── dbconn.php              ← File koneksi database (PDO)
├── header.php              ← Komponen header & navigasi
├── footer.php              ← Komponen footer
├── Home.php                ← Halaman utama / beranda
├── galeri.php              ← Halaman galeri kegiatan
├── page09A.php             ← Halaman daftar tabel publikasi (SELECT dari DB)
├── page09C.php             ← Halaman form tambah data publikasi
├── page09C_action.php      ← Logika backend untuk insert data publikasi baru
├── page09E.php             ← Halaman form edit data publikasi
├── page09E_action.php      ← Logika backend untuk update data publikasi
├── page10A.php             ← Halaman form login
├── page10A_action.php      ← Logika backend untuk autentikasi login & set session
├── page10B.php             ← Logika backend untuk logout & destroy session
├── page11A_gethint.php     ← Logika backend AJAX pencarian (query LIKE ke tabel publikasi)
├── page11A_suggestion.js   ← Script AJAX JavaScript untuk live suggestion search bar
├── validasiForm.js         ← Script JavaScript untuk validasi input form
├── myCSS.css               ← File CSS utama untuk styling global
└── /aset                   ← Folder penyimpanan media/gambar

**File koneksi database:** `dbconn.php`
**Metode koneksi saat ini:** PDO (PHP Data Objects), belum menggunakan prepared statement

## 4. Struktur & State Halaman Saat Ini

### 4.1 Beranda (`Home.php`)
- Halaman utama / landing page.
- Ada header/navbar, secara struktur sudah lengkap tapi masih sangat sederhana.
- Hero section, masih sangat sederhana (ada penjelasan brief, logo, dan tombol untuk kunjungi website resmi).
- Ada footer, masih sangat sederhana.
- Secara keseluruhan masih sangat sederhana, saya berencana akan menambahkan konten baru dan memoles tampilan agar lebih rapi dan elegan.

### 4.2 Login (`page10A.php`)
- **State:** Login autentikasi sudah dibuat, namun Tampilan UI (form) belum (hanya placeholder).
- Menggunakan file `page10A_action.php` untuk autentikasi ke daftar user di database
- tabel user terdiri dari dua kolom, username dan password


### 4.3 Tabel Publikasi (`page09A.php`)
- Mengambil dan menampilkan data publikasi dari server MySQL.
- Memiliki fitur **Edit** dan **Delete** yang berinteraksi langsung memodifikasi data di database.
- **Nama tabel di database:** publikasi
- **Kolom tabel:** no, judul, tanggal_rilis, sampul
- **Metode kueri saat ini:** Masih menggunakan query mentah tanpa prepared statement
- **Akses halaman ini:** Belum terproteksi. Jika user mengetikkan URL langsung (misal: `page09A.php`, `page09C.php`, `page09E.php`) tanpa login, halaman masih bisa diakses. Perlu ditambahkan pengecekan session login di bagian atas file.

### 4.4 Dokumentasi (`galeri.php`)
- Mengambil dan menampilkan data dari server MySQL.
- Bersifat *read-only* (hanya menampilkan data, tidak ada fitur edit/delete).
- **Status saat ini:** Gambar diakses secara langsung (*hardcoded*) dari folder `/aset`, belum terhubung ke tabel database MySQL.

## 5. Konfigurasi Database
- Nama Database: pbw
- File Koneksi Database: dbconn.php
- Variabel lingkungan / kredensial lokal:
  - Host: `localhost`
  - User: `root`
  - Password: `""` (kosong)
- Port MySQL: 3306 (default)

## 6. Cara Menjalankan Project Secara Lokal
- Server: Laragon, jalankan Apache & MySQL
- Import database: Tidak ada file .sql, Database dibuat manual di phpMyAdmin
- URL akses lokal: http://localhost/PBW/PROYEK/Home.php

## 7. Prioritas / Roadmap Pengembangan

  1. **Poles UI & Styling via Native CSS (`myCSS.css`):**
    - Buat variabel warna/theme CSS (:root) di `myCSS.css`.
    - Rapikan layouting menggunakan **Flexbox** dan **CSS Grid**.
    - Poles tampilan halaman (`Home.php`, `page10A.php`, `page09A.php`, `page09C.php`, `page09E.php`, `galeri.php`) agar modern, bersih, dan responsif.
  2. **Proteksi Akses Halaman (Access Control):**
    - Tambahkan pengecekan `$_SESSION['login']` di baris paling atas pada file `page09A.php`, `page09C.php`, dan `page09E.php` agar tidak bisa diakses langsung via URL tanpa login.
  3. **Refactor Query ke Prepared Statements:**
    - Ubah semua kueri SQL mentah di `dbconn.php`, `page09A.php`, `page09C_action.php`, `page09E_action.php`, dan `page11A_gethint.php` menjadi PDO Prepared Statements.
  4. **Peningkatan Keamanan Password:**
    - Terapkan enkripsi `password_hash()` dan `password_verify()` pada logika autentikasi di `page10A_action.php`.
  5. **Validasi & Sanitasi Input:**
    - Terapkan `htmlspecialchars()` pada semua tampilan variabel di PHP untuk mencegah XSS, serta hubungkan script `validasiForm.js` pada form input publikasi.

## 8. Known Issues / Catatan Tambahan

  ### A. Masalah & Bug Saat Ini (Known Issues)
  - **Keamanan & Autentikasi:** Password di tabel `user` saat ini masih berupa *plain text* (belum di-hash), dan semua file CRUD (`page09*.php`) bisa diakses langsung via URL tanpa mengecek status session.
  - **Kerentanan SQL Injection:** Penanganan kueri PDO saat ini masih memakai *query* mentah (string concatenation), termasuk pada fitur live search AJAX (`page11A_gethint.php`).
  - **File Upload:** Fitur *upload* gambar sampul (`page09C_action.php` dan `page09E_action.php`) belum memiliki validasi tipe file (mime type) dan ukuran file, serta berisiko *override* nama file yang sama di folder `/aset`.
  - **Integrasi Galeri:** Halaman `galeri.php` masih menggunakan `<img>` secara *hardcoded* mengarah ke folder `/aset` dan belum memiliki tabel khusus di database.

  ### B. Aturan & Hal Penting yang Wajib Diperhatikan
  - **Skema Penamaan File (PENTING):** Konvensi nama file dalam proyek ini menggunakan penamaan numerik (seperti `page09A.php`, `page10A.php`, `page11A_gethint.php`). **Jangan mengubah nama file-file ini** atau memecahnya menjadi nama baru (seperti `login-process.php`), karena akan merusak keterhubungan kueri/AJAX dan *include* yang sudah ada.
  - **Komponen Modular:** Bagian *header*, *navbar*, dan *footer* sudah dipisah ke `header.php` dan `footer.php`. Setiap perubahan pada navigasi atau layout global **hanya dilakukan di kedua file tersebut**, bukan di file halaman individual.
  - **Teknologi Styling:** Jangan menggunakan Bootstrap, Tailwind, atau framework CSS luar. Semua *styling*, animasi, dan penataan *layout* (Flexbox/Grid) wajib ditulis di dalam `myCSS.css`.
  - **Penanganan AJAX:** File `page11A_suggestion.js` bergantung penuh pada respon dari `page11A_gethint.php`. Jika melakukan *refactor* kueri SQL di backend, pastikan format output (HTML/JSON) tetap kompatibel dengan JavaScript frontend.

## 9. Panduan Kerja untuk Devin (AI Rules)
- **Fokus Utama:** Merapikan kode, mengoptimalkan fungsionalitas, menambahkan fitur yang diminta, serta memastikan tidak ada error pada koneksi database atau sintaks PHP/JS.
- **Sistem Login:** Jika diminta mengimplementasikan login, pastikan menggunakan standar keamanan PHP (`password_hash()`, `password_verify()`, `prepared statements`, dan `session_start()`).
- **Kueri Database:** Selalu gunakan *Prepared Statements* (PDO atau MySQLi) saat melakukan kueri SQL untuk mencegah SQL Injection. Jika kode lama masih pakai query mentah, refactor secara bertahap sesuai prioritas di bagian 7.
- **Validasi & Sanitasi:** Validasi semua input form sebelum diproses, dan escape output ke HTML (`htmlspecialchars()`) untuk mencegah XSS.
- **Kontrol Akses:** Jika suatu halaman seharusnya butuh login (lihat bagian 4.3), tambahkan pengecekan session di awal file sebelum logika lain dijalankan.
- **Gaya Kode:** Jaga agar struktur folder dan penamaan file tetap rapi, bersih, dan konsisten dengan struktur di bagian 3.
- **Perubahan Bertahap:** Jangan mengubah struktur besar-besaran dalam satu kali jalan kecuali diminta eksplisit — prioritaskan urutan di bagian 7 dan konfirmasi dulu jika ingin melakukan refactor besar.
- **Testing Manual:** Setelah membuat perubahan pada `page09A.php`, pastikan fitur edit & delete tetap berfungsi dengan data uji sebelum dianggap selesai.