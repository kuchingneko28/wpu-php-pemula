<?php 

// GET

$peliharaan = [[
    "nama" => "Kuching",
    "id" => 1,
    "jenis_peliharaan" => "Cerberus",
    "note" => "Jangan dikasih makan!",
    "gambar" => "profile.png",
    
],
[
    "nama" => "Neko",
    "id" => 1,
    "jenis_peliharaan" => "Husky",
    "note" => "Jangan dikasih makan jagung!",
    "gambar" => "profile.png",

]];

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Daftar Hewan Peliharaan</h1>
<ul>

    <?php foreach($peliharaan as $hewan) : ?>
    <li><a href="latihan2.php?nama=<?php echo $hewan["nama"] ?>&id=<?php echo $hewan["id"] ?>&jenis_peliharaan=<?php echo $hewan["jenis_peliharaan"] ?>&note=<?php echo $hewan["note"] ?>&gambar=<?php echo $hewan["gambar"] ?>  "><?php echo $hewan["nama"]?></a></li>
    <?php endforeach; ?>
    </ul>
</body>
</html>