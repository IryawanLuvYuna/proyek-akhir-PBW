function showHint(str) {
  if (str.length == 0) {
    // Code 4a: Menghapus konten pada elemen txtHint dan keluar dari fungsi
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  // Code 4b: Memeriksa readyState (4) dan status (200) sebelum menampilkan hasil
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "page11A_gethint.php?keyword="+str, true);
  xhttp.send();
}