<?php 

// Koneksi ke database
$mysql_host = "localhost";
$mysql_username = "root";
$mysql_password = "";
$mysql_database = "phpdasar";
$conn = mysqli_connect($mysql_host,$mysql_username,$mysql_password,$mysql_database);


// Get
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }

    return $rows;

}


// Post
function tambah($data){
    global $conn;
    
    $nama = htmlspecialchars($data["nama"]);
    $nama_peliharaan = htmlspecialchars($data["nama_peliharaan"]);
    $peliharaan = htmlspecialchars($data["peliharaan"]);
    $note = htmlspecialchars($data["note"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "INSERT INTO peliharaan VALUES 
    ('','$nama','$nama_peliharaan','$peliharaan','$note','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

// Delete
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM peliharaan WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// Update
function ubah($data,$id){
    global $conn;
    
    $nama = htmlspecialchars($data["nama"]);
    $nama_peliharaan = htmlspecialchars($data["nama_peliharaan"]);
    $peliharaan = htmlspecialchars($data["peliharaan"]);
    $note = htmlspecialchars($data["note"]);
    $gambar = htmlspecialchars($data["gambar"]);


    $query = "UPDATE peliharaan SET 
                nama = '$nama',
                nama_peliharaan = '$nama_peliharaan',
                peliharaan = '$peliharaan',
                note = '$note',
                gambar = '$gambar'

                WHERE id = $id
                ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Search
function cari($keyword){
    $query = "SELECT * FROM peliharaan WHERE nama 
    LIKE '$keyword%' OR
    nama_peliharaan LIKE '$keyword%' OR
    peliharaan LIKE '$keyword%'
    ";

    return query($query);

}

?>