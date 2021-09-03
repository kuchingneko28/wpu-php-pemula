<?php 

// Koneksi ke database
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "phpdasar";
$conn = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;

}

?>