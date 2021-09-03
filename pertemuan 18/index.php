<?php
session_start();
if(!isset($_SESSION["login"])){
header("Location: login.php");
exit;
}
require "functions.php";


// pagination
$jumlahDataPerhalaman = 3;
$jumlahData = count(query("SELECT * FROM peliharaan"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;


/*
Penghitungan awal data
$jumlahDataPerhalaman itu 3
$jumlahHalamanAktif itu 2

2 x 3 = 6

jadi 2 x 3 - 3 = 3

karna halaman awal index dimulai dari 0

*/
$awalData = ( $jumlahDataPerhalaman * $halamanAktif ) - $jumlahDataPerhalaman;



$peliharaan = query("SELECT * FROM peliharaan LIMIT $awalData,$jumlahDataPerhalaman");

// tombol cari ditekan
if(isset($_POST["cari"])){
    $peliharaan = cari($_POST["keyword"]);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Halaman Admin</title>
</head>
<body>
    
    <div class="container">
    <h1>Daftar Peliharaan</h1>
    <a href="logout.php">Logout</a>
    <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
    <form action="" method="POST">

        <div class="mt-5">
            <input type="text" class="form-control" name="keyword" id="keywoard" autocomplete="off" placeholder="Masukan pencarian...">
        </div>
        <div class="mt-2">
            <button class="btn btn-primary" type="submit" name="cari">Cari</button>
        </div>
    </form>
    <table class="table">
        <thead>
    <tr>
        <th scope="col">No</th>
        <th scope="col">Aksi</th>
        <th scope="col">Gambar</th>
        <th scope="col">Nama</th>
        <th scope="col">Nama Peliharaan</th>
        <th scope="col">Peliharaan</th>
        <th scope="col">Note</th>
    </tr>
</thead>
<tbody>
    <?php $i = 1 ; ?>
    <?php foreach ($peliharaan as $row ): ?>
      <tr>
          <td><?php echo $i;?></td>
      <td>
     <a href="ubah.php?id=<?php echo $row["id"]?>">Ubah</a> |
     <a href="hapus.php?id=<?php echo $row["id"]?>" onclick="return confirm('Apakah anda ingin menghapus ?');">Hapus</a>
     </td>
      <td><img src="./img/<?php echo $row["gambar"] ?>" alt="" width="100px"></td>
      <td><?php echo $row["nama"] ?></td>
      <td><?php echo $row["nama_peliharaan"] ?></td>
      <td><?php echo $row["peliharaan"] ?></td>
      <td><?php echo $row["note"] ?></td>
    </tr>

    <?php $i++; ?>
    <?php endforeach; ?>
</tbody>
</table>

<nav aria-label="Page navigation example">
<ul class="pagination">
    <?php if($halamanAktif > 1):?>
     <li class="page-item">
      <a class="page-link" href="?halaman=<?php echo $halamanAktif - 1?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
    <?php if($i == $halamanAktif) : ?>
        
        <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $i?>"><?php echo $i?></a></li>
        <?php else: ?>
        <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i?>"><?php echo $i?></a></li>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if($halamanAktif < $jumlahHalaman):?>
      <li class="page-item">
      <a class="page-link" href="?halaman=<?php echo $halamanAktif + 1 ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
    <?php endif; ?>
  </ul>
</nav>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>