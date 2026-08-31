# Panduan & Dokumentasi Proyek Website

> **Catatan untuk kamu (developer):** Bagian yang bertanda `[ISI: ...]` wajib diisi sesuai kondisi proyek kamu sebelum file ini dipakai oleh Devin. Semakin detail, semakin kecil kemungkinan Devin salah asumsi.

## 1. Ringkasan Proyek
Website ini adalah aplikasi web sederhana yang terhubung ke database MySQL (phpMyAdmin) menggunakan PHP. Saat ini proyek dalam tahap pengembangan awal (versi dasar), belum production-ready.

## 2. Tech Stack
- **Frontend:** HTML, CSS, JavaScript (Vanilla / Murni) — tidak menggunakan framework (bukan React/Vue), tidak menggunakan CSS framework seperti Bootstrap/Tailwind kecuali disebutkan lain.
- **Backend:** PHP 8.3.30 — native PHP, tidak menggunakan framework (bukan Laravel/CodeIgniter) kecuali disebutkan lain.
- **Database:** MySQL / MariaDB via phpMyAdmin
- **Server Lokal (Development):** Laragon
- **Dependency Manager:** Tidak menggunakan Composer, semua library manual.

## 3. Struktur Folder & File
> Devin perlu tahu struktur pasti agar tidak menebak lokasi file atau membuat struktur baru yang tidak konsisten.

```
[ISI: contoh struktur, sesuaikan dengan folder asli kamu]
/project-root
├── index.php
├── login.php
├── publikasi.php
├── dokumentasi.php
├── [nama_file_koneksi].php     ← file koneksi database
├── /css
│   └── style.css
├── /js
│   └── script.js
├── /includes (jika ada, misal header.php, footer.php, navbar.php)
└── /assets (gambar, ikon, dll)
```

**File koneksi database:** `[ISI: nama file, contoh: config.php atau koneksi.php]`
**Metode koneksi saat ini:** `[ISI: mysqli_connect biasa / PDO / mysqli OOP — jelaskan apa adanya, walau belum pakai prepared statement]`

## 4. Struktur & State Halaman Saat Ini

### 4.1 Beranda (`index.php` / `index.html`)
- Halaman utama / landing page.
- `[ISI: konten apa saja yang ada — navbar, hero section, dll — atau tulis "masih sangat sederhana, hanya teks placeholder"]`

### 4.2 Login (`login.php`)
- **State:** Tampilan UI (form) sudah ada, namun logika autentikasi backend/session **BELUM dibuat sama sekali**.
- Belum ada tabel `users` di database / `[ISI: jika sudah ada tabel users meskipun kosong, sebutkan nama & kolomnya]`
- **Requirement login yang diinginkan:** `[ISI: single admin saja, atau multi-user dengan role (admin/user)? Apakah perlu fitur register, lupa password, dll?]`

### 4.3 Tabel Publikasi (`publikasi.php`)
- Mengambil dan menampilkan data publikasi dari server MySQL.
- Memiliki fitur **Edit** dan **Delete** yang berinteraksi langsung memodifikasi data di database.
- **Nama tabel di database:** `[ISI: contoh tbl_publikasi]`
- **Kolom tabel:** `[ISI: contoh: id, judul, penulis, tahun, file_pdf, created_at]`
- **Metode kueri saat ini:** `[ISI: apakah masih pakai query mentah tanpa prepared statement? Sebutkan apa adanya supaya Devin tahu ini prioritas perbaikan]`
- **Akses halaman ini:** `[ISI: apakah harus login dulu untuk mengedit/menghapus, atau saat ini masih bebas diakses siapa saja?]`

### 4.4 Dokumentasi (`dokumentasi.php`)
- Mengambil dan menampilkan data dari server MySQL.
- Bersifat *read-only* (hanya menampilkan data, tidak ada fitur edit/delete).
- **Nama tabel di database:** `[ISI: contoh tbl_dokumentasi]`
- **Kolom tabel:** `[ISI: contoh: id, nama_dokumen, kategori, tanggal_upload]`

## 5. Konfigurasi Database
- Nama Database: `[ISI: contoh db_website]`
- File Koneksi Database: `[ISI: contoh config.php atau koneksi.php]`
- Variabel lingkungan / kredensial lokal:
  - Host: `localhost`
  - User: `root`
  - Password: `""` (kosong)
- Port MySQL (jika bukan default 3306): `[ISI jika perlu]`

## 6. Cara Menjalankan Project Secara Lokal
- Server: `[ISI: XAMPP/Laragon]`, jalankan Apache & MySQL
- Import database: `[ISI: apakah ada file .sql untuk import? sebutkan nama filenya]`
- URL akses lokal: `[ISI: contoh http://localhost/nama-project/]`

## 7. Prioritas / Roadmap Pengembangan
> Urutan ini membantu Devin fokus mengerjakan sesuai kebutuhan kamu, bukan menebak sendiri.

1. `[ISI: contoh — Implementasikan sistem login dengan session & password_hash()]`
2. `[ISI: contoh — Refactor semua kueri di publikasi.php & dokumentasi.php ke Prepared Statements]`
3. `[ISI: contoh — Tambahkan validasi input di form edit publikasi]`
4. `[ISI: contoh — Rapikan struktur folder (pisahkan CSS/JS/includes)]`
5. `[ISI: fitur tambahan lain yang kamu inginkan]`

## 8. Known Issues / Catatan Tambahan
- `[ISI: bug yang sudah kamu tahu, misal "delete kadang gagal jika id kosong" atau "belum ada validasi apapun di form edit"]`
- `[ISI: hal lain yang perlu diwaspadai Devin]`

## 9. Panduan Kerja untuk Devin (AI Rules)
- **Fokus Utama:** Merapikan kode, mengoptimalkan fungsionalitas, menambahkan fitur yang diminta, serta memastikan tidak ada error pada koneksi database atau sintaks PHP/JS.
- **Sistem Login:** Jika diminta mengimplementasikan login, pastikan menggunakan standar keamanan PHP (`password_hash()`, `password_verify()`, `prepared statements`, dan `session_start()`).
- **Kueri Database:** Selalu gunakan *Prepared Statements* (PDO atau MySQLi) saat melakukan kueri SQL untuk mencegah SQL Injection. Jika kode lama masih pakai query mentah, refactor secara bertahap sesuai prioritas di bagian 7.
- **Validasi & Sanitasi:** Validasi semua input form sebelum diproses, dan escape output ke HTML (`htmlspecialchars()`) untuk mencegah XSS.
- **Kontrol Akses:** Jika suatu halaman seharusnya butuh login (lihat bagian 4.3), tambahkan pengecekan session di awal file sebelum logika lain dijalankan.
- **Gaya Kode:** Jaga agar struktur folder dan penamaan file tetap rapi, bersih, dan konsisten dengan struktur di bagian 3.
- **Perubahan Bertahap:** Jangan mengubah struktur besar-besaran dalam satu kali jalan kecuali diminta eksplisit — prioritaskan urutan di bagian 7 dan konfirmasi dulu jika ingin melakukan refactor besar.
- **Testing Manual:** Setelah membuat perubahan pada `publikasi.php`, pastikan fitur edit & delete tetap berfungsi dengan data uji sebelum dianggap selesai.
