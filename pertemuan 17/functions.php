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
    
    // Upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }

    $query = "INSERT INTO peliharaan VALUES 
    ('','$nama','$nama_peliharaan','$peliharaan','$note','$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function upload(){
    
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpFile = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ad gambar di upload

    if($error === 4){
        echo "<script>
       alert('Masukan gambar');
        </script>";
        return false;
    }


    // cek apakah yang diupload adalah gambar
    $ekstensiFile = ["jpg","jpeg","png"];
    $ekstensiGambar = explode(".", $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // Cek ekstensi gambar
    if(!in_array($ekstensiGambar,$ekstensiFile)){
        echo "<script>
       alert('Masukan hanya gambar');
        </script>";
        return false;


    }

    // cek jika ukurannya terlalu besar
    if($ukuranFile > 6000000){
        echo "<script>
       alert('Ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap di upload
    
    // Generate nama baru gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".". $ekstensiGambar;

    move_uploaded_file($tmpFile,"img/". $namaFileBaru);
    
    return $namaFileBaru;

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
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    

    // Cek gambar diubah atau tidak
    if($_FILES["gambar"]["error"] === 4){
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }


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


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);
    

    // cek username sudah ada atau belum

    $result = mysqli_query($conn,"SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)){
        
        echo "<script>alert('Username sudah terdaftar !')</script>";
        return false;
    }


    // cek konfirmasi password
    if($password !== $password2){
        echo "<script>alert('Password tidak sama !')</script>";
        return false;
    }else if(strlen($password) < 5){
        echo "<script>alert('Password harus lebih dari 5 karakter !')</script>";
        return false;
    }
    

    // enkripsi password
    $password = password_hash($password,PASSWORD_DEFAULT);

    // tambahkan userbaru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");

    return mysqli_affected_rows($conn);

}

?>