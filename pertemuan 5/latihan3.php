<?php 

$kucing = [
    ['Kuching',"1","Anjing hutan","Jangan dikasih makan nasi"],
    ['Neko',"2","Siberian Husky","Jangan dikasih makan ayam"],
    ['Nuko',"3","Cerberus","Jangan dikasih dikasih makan"]

];


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
    <?php foreach($kucing as $daftarkucing) : ?>
    <ul>
        <li>Nama pliharaan : <?php echo $daftarkucing[0] ?></li>
        <li>ID : <?php echo $daftarkucing[1] ?></li>
        <li>Jenis peliharaan : <?php echo $daftarkucing[2] ?></li>
        <li>Note : <?php echo $daftarkucing[3] ?></li>
    </ul>
    <?php endforeach; ?>


</body>
</html>