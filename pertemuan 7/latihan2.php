<?php 

// check data

if(!isset($_GET["gambar"]) ||
   !isset($_GET["nama"]) ||
   !isset($_GET["id"]) ||
   !isset($_GET["jenis_peliharaan"]) ||
   !isset($_GET["note"])
){
    header("Location: latihan1.php");
    exit;
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Detail Hewan Peliharaan</h1>
    <ul>
        <li><img src="img/<?php echo $_GET["gambar"]?>" alt="" width="100px"></li>
        <li><?php echo $_GET["nama"]?></li>
        <li><?php echo $_GET["id"]?></li>
        <li><?php echo $_GET["jenis_peliharaan"]?></li>
        <li><?php echo $_GET["note"]?></li>
    </ul>

    <a href="latihan1.php">Kembali ke daftar hewan peliharaan</a>
</body>
</html>