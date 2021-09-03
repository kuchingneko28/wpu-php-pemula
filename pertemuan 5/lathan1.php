<?php

// array
// variable yang dapat memiliki banyak nilai
// pasangan antara key dan value 
// keynya adalah index, yang dimulai dari 0

// untuk membuat array
// cara lama
$hari = array("Senin","Selasa","Rabu");
// cara baru
$bulan = ["Januari", "Febuari", "Maret"];


// Menampilkan array
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";

// Menampilkan 1 element array
// echo $hari[0];
// echo "<br>";
// echo $bulan[1];
// echo "<br>";


// Menambahkan 1 element baru dalam array
var_dump($hari);
echo "<br>";
$hari[] = "Kamis";
$hari[] = "Jum'at";
var_dump($hari);
?>