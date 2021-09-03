<?php 

// cek tombol sudah ditekan atau belum
if(isset($_POST["submit"])){
    
    // cek username & password
if($_POST["username"] == "admin" && $_POST["password"] == 123){
    
    // jika benar direct ke halaman admin
    header("Location: admin.php");
    exit;
}else {
    // jika salah tampilkan pesan kesalahan
    $error = true;
}    
   
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Admin</h1>
    

    <?php if(isset($error)) : ?>
        <p>Username / password salah !</p>
        <?php endif?>
    <ul>

        <form action="" method="POST">
            
        <li><label for="username">Username: </label>
        <input type="text" name="username" id="username">
        </li>    
        <br>
        <li><label for="password">Password: </label>
        <input type="password" name="password" id="password">
        </li>    
        <br>
            <li>
                <button type="submit" name="submit">Submit</button>
            </li>
        </form>
    </ul>
</body>
</html>