<?php 
require "../functions.php";
$keyword = $_GET["keyword"];
$peliharaan = query("SELECT * FROM peliharaan WHERE nama 
LIKE '$keyword%' OR
nama_peliharaan LIKE '$keyword%' OR
peliharaan LIKE '$keyword%'
");

?>

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