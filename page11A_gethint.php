<?php
  include 'dbconn.php';
  try {
    //Code 6
    $keyword = $_GET["keyword"];
    $sql = "SELECT judul FROM publikasi WHERE judul LIKE ?";
    $stmt = $pdo->prepare($sql);
    
    // Menambahkan karakter wildcard (%) sebelum dan sesudah keyword
    $stmt->execute(["%" . $keyword . "%"]);

    // lookup all hints if query result is not empty
    $hint = "";
    if ($stmt) {
      foreach($stmt as $row) {
        if ($hint === "") {
          $hint = $row["judul"];
        } else {
          $hint .= ", " . $row["judul"];
        }
      }
    }

    // Output "no suggestion" if no hint was found or output correct values
    echo $hint === "" ? "no suggestion" : $hint;
    $pdo = NULL;

    
  }
  catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
  }
?>