<!-- LOGIN PAGE (LANDING PAGE) -->
<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html>
  <head>
  <title>Login - BPS Provinsi Sulawesi Tengah</title>
  <link rel="stylesheet" href="myCSS.css">
  <?php
  if (isset($_SESSION['toast'])) {
    $toastData = htmlspecialchars(json_encode($_SESSION['toast']));
    echo '<meta name="toast-data" content="' . $toastData . '">';
    unset($_SESSION['toast']);
  }
  ?>
  <script src="toast.js"></script>
  </head>
  <body class="login-page">
    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
          <img src="aset/logo.png" alt="Logo BPS" class="login-logo">
          <h1 class="login-title">Masuk ke Portal BPS</h1>
        </div>

        <form action="page10A_action.php" method="post" class="login-form">
          <div class="form-group">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-input" placeholder="Masukkan username" required>
          </div>

          <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-input" placeholder="Masukkan password" required>
          </div>

          <div class="form-options">
            <label class="checkbox-label">
              <input type="checkbox" name="remember" class="checkbox-input">
              <span class="checkbox-text">Ingat Saya</span>
            </label>
          </div>

          <button type="submit" class="login-button">Masuk</button>
        </form>
      </div>
    </div>
  </body>
</html>