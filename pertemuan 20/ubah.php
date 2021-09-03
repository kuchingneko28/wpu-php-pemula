<?php
session_start();
if(!isset($_SESSION["login"])){
header("Location: login.php");
exit;
}

require "functions.php";
// ambil data di url

$id = $_GET["id"];

var_dump($id);
// query data peliharaan bedasarkan id

$peliharaan = query("SELECT * FROM peliharaan WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum

if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>
        alert('Data berhasil diubah');
        document.location.href = 'index.php';
        </script>";
    }else {
        echo "<script>
        alert('Data gagal diubah');
        document.location.href = 'ubah.php';
        </script>";
    }


}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Ubah Data</title>
</head>
<body>
    <div class="container">
        <h1>Ubah data Peliharaan</h1>

    <form accept="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $peliharaan["id"]; ?>">
    <input type="hidden" class="form-control" name="gambarLama" value="<?php echo $peliharaan["gambar"]; ?>">
  </div>     
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $peliharaan["nama"]; ?>">
  </div>
  <div class="form-group">
    <label for="nama-peliharaan">Nama Peliharaan</label>
    <input type="text" class="form-control" name="nama_peliharaan" id="nama-peliharaan" value="<?php echo $peliharaan["nama_peliharaan"]; ?>">
  </div>
  <div class="form-group">
    <label for="peliharaan">Peliharaan</label>
    <input type="text" class="form-control" name="peliharaan" id="peliharaan" value="<?php echo $peliharaan["peliharaan"]; ?>">
  </div>
  <div class="form-group">
    <label for="note">Note</label>
    <textarea class="form-control" name="note" id="note" rows="3"><?php echo $peliharaan["note"]; ?></textarea>
  </div>
  <div class="form-group">
  <label for="gambar" class="form-label">Gambar</label>
  
  <div class="profil mt-2 mb-2">
    <img src="img/<?php echo $peliharaan["gambar"]; ?>" alt="" width="100px">
  </div>
  <input class="form-control" type="file" name="gambar" id="gambar">
  </div>
    <button class="btn btn-primary mt-3" name="submit" type="submit">Submit</button>
</form>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>