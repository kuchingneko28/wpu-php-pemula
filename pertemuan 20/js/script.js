$(document).ready(() => {
  // hilangkan tombol cari
  $("#cari").hide();

  // event ketika keyword ditulis
  $("#keyword").on("keyup", () => {
    // memunculkan icon loading
    $(".loader").show();

    // ajax menggunakan load
    // $("#table-menu").load("ajax/peliharaan.php?keyword=" + $("#keyword").val());

    $.get("ajax/peliharaan.php?keyword=" + $("#keyword").val(), (data) => {
      $("#table-menu").html(data);
      $(".loader").hide();
    });
  });
});
