<!-- LOGIKA LOGOUT -->
<?php
  // 1. Inisialisasi/Hubungkan dengan session yang sedang aktif
  session_start();

  // 2. Kosongkan semua variabel session (seperti $_SESSION['login'] dan $_SESSION['username'])
  session_unset();

  // 3. Hapus cookie session dari browser jika ada
  if (session_id() != "" || isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 42000, '/');
  }

  // 4. Hancurkan seluruh data session yang tersimpan di server
  session_destroy();

  // 5. Simpan pesan toast ke session dan redirect ke halaman login
  $_SESSION['toast'] = [
      'type' => 'info',
      'message' => 'Anda telah berhasil logout'
  ];
  
  header("Location: page10A.php");
  exit();
?>