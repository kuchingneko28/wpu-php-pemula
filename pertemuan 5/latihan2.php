<?php

// Pengulangan array
// For / Foreach
$arr = [12,32,5,6,4,5,52,5,23];


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>

    .kotak {
        width: 50px;
        height: 50px;
        background-color: salmon;
        line-height: 50px;
        text-align: center;
        margin: 3;
        float: left;
    }
    .clear {
        clear: both;
    }
</style>
</head>
<body>
    <?php  for($i = 0; $i < count($arr); $i++) : ?>
    
    <div class="kotak"><?php echo $arr[$i] ?></div>
    <?php endfor; ?>

    <div class="clear"></div>
    <?php foreach($arr as $angka) : ?>
        <div class="kotak"><?php echo $angka ?></div>
    <?php endforeach; ?>
</body>
</html>