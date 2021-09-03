<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .kotak {
        width: 50px;
        height: 50px;
        background-color: aqua;
        line-height: 50px;
        text-align: center;
        margin: 3;
        float: left;
        transition: 0.6s all;
    }

    .kotak:hover{
        transform: rotate(360deg);
        border-radius: 50%;
    }
    .clear {
        clear: both;
    }
</style>
<body>
    
<h1>Latihan Array</h1>
<?php 

$angka = [
    [1,2,3],
    [4,5,6],
    [7,8,9]
];

?>
<?php foreach($angka as $a) : ?>
    <?php foreach($a as $b) : ?>
<div class="kotak"><?php echo $b ?></div>
<?php endforeach; ?>
<div class="clear"></div>
<?php endforeach; ?>
</body>
</html>