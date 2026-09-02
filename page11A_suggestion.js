// LOGIKA SUGGESTION
function showHint(str) {
  const hintBox = document.getElementById("txtHint");
  if (!hintBox) return; // Exit if element doesn't exist

  if (str.length == 0) {
    // Code 4a: Menghapus konten pada elemen txtHint dan keluar dari fungsi
    hintBox.innerHTML = "";
    hintBox.classList.remove("active");
    return;
  }
  xhttp = new XMLHttpRequest();
  // Code 4b: Memeriksa readyState (4) dan status (200) sebelum menampilkan hasil
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      hintBox.innerHTML = this.responseText;
      hintBox.classList.add("active");

      // Add click handlers to suggestion items
      const suggestionItems = hintBox.querySelectorAll('.suggestion-item');
      suggestionItems.forEach(function(item) {
        item.addEventListener('click', function() {
          const searchInput = document.getElementById("txt1");
          if (searchInput) {
            searchInput.value = this.textContent;
            hintBox.innerHTML = "";
            hintBox.classList.remove("active");
            // Submit form untuk melakukan search
            const searchForm = document.querySelector('.search-form');
            if (searchForm) {
              searchForm.submit();
            }
          }
        });
      });
    }
  };
  xhttp.open("GET", "page11A_gethint.php?keyword="+str, true);
  xhttp.send();
}

// Close suggestion box when clicking outside (only on publikasi page)
document.addEventListener('DOMContentLoaded', function() {
  const searchContainer = document.querySelector('.search-container');
  if (searchContainer) {
    document.addEventListener('click', function(event) {
      const hintBox = document.getElementById("txtHint");
      if (hintBox && !searchContainer.contains(event.target)) {
        hintBox.innerHTML = "";
        hintBox.classList.remove("active");
      }
    });
  }
});