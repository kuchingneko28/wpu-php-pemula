<?php
require "functions.php";

$peliharaan = query("SELECT * FROM peliharaan");

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
    
    <a href="tambah.php" class="btn btn-primary">Tambah Data</a>
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
     <a href="">Ubah</a> |
     <a href="hapus.php?id=<?php echo $row["id"]?>" onclick="return confirm('Yakin ?');">Hapus</a>
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
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>