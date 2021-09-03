<?php 

// Date untuk menampilkan tanggal dengan format tertentu
// echo date("l,d-M-Y");

// Time
// UNIX TimeStamp / EPOCH time
// Detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("d M Y", time() + 60*60*24*5);

// MKtime
// Membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam , menit, detik, bulan, tanggal tahun
// echo date("l",mktime(0,0,0,1,8,2002));

// StrToTime

echo strtotime("8 jan 2002")
?>