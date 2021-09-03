// ambil element yang dibutuhkan

const keyword = document.getElementById("keyword");
const tombolCari = document.getElementById("cari");
const table = document.getElementById("table-menu");

// tambahkan event ketika keyword ditulis
keyword.addEventListener("keyup", () => {
  // Buat object ajax
  const ajax = new XMLHttpRequest();

  // cek kesiapan ajax
  ajax.onreadystatechange = () => {
    if (ajax.readyState == 4 && ajax.status == 200) {
      table.innerHTML = ajax.responseText;
    }
  };

  // eksekusi ajax
  ajax.open("GET", "ajax/peliharaan.php?keyword=" + keyword.value, true);
  ajax.send();
});
