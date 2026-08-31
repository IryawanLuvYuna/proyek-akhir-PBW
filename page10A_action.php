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
          echo "<script>
                  alert('Username/Password Tidak Ditemukan');
                  window.location.href = 'page10A.php';
                </script>";
          exit();
      }

      // 4. Jika username ditemukan, cek apakah passwordnya cocok
      if ($password === $user['password']) {
          // Jika username dan password benar: simpan session login
          $_SESSION['login'] = true;
          $_SESSION['username'] = $user['username'];

          // Arahkan ke halaman utama/daftar publikasi (page09A.php)
          echo "<script>
                  alert('Login Berhasil!');
                  window.location.href = 'Home.php';
                </script>";
          exit();
      } else {
          // Jika password salah
          echo "<script>
                  alert('Username/Password salah');
                  window.location.href = 'page10A.php';
                </script>";
          exit();
      }

  } catch (PDOException $e) {
      exit("PDO Error: " . $e->getMessage() . "<br>");
  }
?>