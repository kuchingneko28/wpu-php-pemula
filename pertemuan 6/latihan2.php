<?php 

// $peliharaan = [
//     ["Kuching","1","Cerberus","Jangan dikasih makan!"],
//     ["Kuching","1","Husky","Jangan dikasih makan!"],];



// Array associative
// sama seperti array numerik,tetapi
// key-nya adalah string yang kita buat sendiri;


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
    <h1>Daftar Peliharaan</h1>
    <?php foreach($peliharaan as $daftar) : ?>
    <ul>
        <li><img src="img/<?php echo $daftar["gambar"] ?>" width="100px"></li>
        <li>Nama Peliharaan : <?php echo $daftar["nama"] ?></li>
        <li>ID : <?php echo $daftar["id"] ?></li>
        <li>Jenis peliharaan : <?php echo $daftar["jenis_peliharaan"] ?></li>
        <li>Note : <?php echo $daftar["note"] ?></li>
    </ul>
    <?php endforeach; ?>
    
</body>
</html>