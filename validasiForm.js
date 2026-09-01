// LOGIKA UTK VALIDASI FORM TAMBAH DAN EDIT PUBLIKASI
function validate09C() {
  const nomor = document.forms["formPublikasi"]["no"].value;
  const judul = document.forms["formPublikasi"]["judul"].value;
  const tglRilis = document.forms["formPublikasi"]["tanggal_rilis"].value;

  const divError = document.querySelector(".divError");
  const pesanElement = document.getElementById("pesanError");

  let daftarError = [];

  if (nomor === "") daftarError.push("Nomor tidak boleh kosong");
  else if (!/^\d+$/.test(nomor)) daftarError.push("Masukkan nomor dalam angka");

  if (judul === "") daftarError.push("Judul tidak boleh kosong");
  else if (!/^[a-zA-Z0-9\s:/-]+$/.test(judul)) daftarError.push("Terdapat karakter yang tidak valid pada judul");

  if (tglRilis === "") daftarError.push("Tanggal rilis tidak boleh kosong");

  if (daftarError.length > 0) {
    pesanElement.innerHTML = daftarError.join("<br>");
    divError.classList.add("active");
    return false;
  }

  divError.classList.remove("active");
  return true;
}