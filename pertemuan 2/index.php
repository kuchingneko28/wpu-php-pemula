<?php 
// Pertemuan 2 - PHP Dasar

// Sintaks PHP

// Standar Output
// echo, print
// print_r
// var_dump

// Penulisan sintaks PHP
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP


// Variable dan Tipe Data
// Variable
// $nama = "Kuching Neko";
// echo 'Hallo nama saya, $nama';



// Operator 
// aritmatika
// + - * / %
// $x= 10;
// $y = 20;
// echo $x * $y;

// penggabungan string / concatenation / concat
// . 
// $nama_depan = "Kuching";
// $nama_belakang = "Neko";
// echo $nama_depan." ".$nama_belakang;

// Assignment
// =, +=, -=, *=, /=, %=, .=
// $x = 1;
// $x += 5;
// echo $x;
// $nama = "Kuching";
// $nama .= " ";
// $nama .= "Neko";

//Perbandingan
// <, >, <=, >=, ==,
// var_dump(1 == "1");

// Logika
// &&, ||, ! 
// $x = 30;
// var_dump($x < 20 || $x % 2 == 0)
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Halo, Selamat Datang <?php echo $nama;?></h1>

</body>
</html>