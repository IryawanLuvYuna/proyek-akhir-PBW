<!-- LOGIKA UTK AMBIL JUDUL DARI DATABASE -->
<?php
  session_start();
  // Proteksi: Return error jika belum login
  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    echo "";
    exit();
  }
  include 'dbconn.php';
  try {
    //Code 6
    $keyword = $_GET["keyword"];
    $sql = "SELECT judul FROM publikasi WHERE judul LIKE ?";
    $stmt = $pdo->prepare($sql);

    // Menambahkan karakter wildcard (%) sebelum dan sesudah keyword
    $stmt->execute(["%" . $keyword . "%"]);

    // Output suggestion items dalam format HTML untuk suggestion box
    if ($stmt) {
      foreach($stmt as $row) {
        echo "<div class='suggestion-item'>" . htmlspecialchars($row["judul"]) . "</div>";
      }
    }
    $pdo = NULL;

  }
  catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
  }
?>