<!-- LOGIKA LOGIN -->
<?php
  session_start();
  include 'dbconn.php';

  // 1. Tangkap input dari form login
  $username = $_POST['username'];
  $password = $_POST['password'];

  try {
      // 2. Jalankan query biasa tanpa prepared statement
      $sql = "SELECT * FROM user WHERE username = '$username'";
      $result = $pdo->query($sql);
      
      // Ambil 1 baris hasil data
      $user = $result->fetch();

      // 3. Jika hasil query tidak ada (username tidak ditemukan di database)
      if (!$user) {
          $_SESSION['toast'] = [
              'type' => 'error',
              'message' => 'Username/Password Tidak Ditemukan'
          ];
          header("Location: page10A.php");
          exit();
      }

      // 4. Jika username ditemukan, cek apakah passwordnya cocok
      if ($password === $user['password']) {
          // Jika username dan password benar: simpan session login
          $_SESSION['login'] = true;
          $_SESSION['username'] = $user['username'];

          // Simpan pesan toast ke session
          $_SESSION['toast'] = [
              'type' => 'success',
              'message' => 'Login Berhasil!'
          ];
          
          // Arahkan ke halaman utama/daftar publikasi (page09A.php)
          header("Location: Home.php");
          exit();
      } else {
          // Jika password salah
          $_SESSION['toast'] = [
              'type' => 'error',
              'message' => 'Username/Password salah'
          ];
          header("Location: page10A.php");
          exit();
      }

  } catch (PDOException $e) {
      $_SESSION['toast'] = [
          'type' => 'error',
          'message' => 'Error: ' . $e->getMessage()
      ];
      header("Location: page10A.php");
      exit();
  }
?>