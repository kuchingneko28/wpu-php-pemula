<?php 
session_start();
require "functions.php";

// cek cookie
if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])){
  
  $id = $_COOKIE["id"];
  $key = $_COOKIE["key"];
  // ambil username bedasarkan id
  $result  = mysqli_query($conn, "SELECT username FROM user WHERE id = '$id'");
  $row = mysqli_fetch_assoc($result);


  // cek cookie & username
  if($key === hash('sha256',$row["username"])){
    $_SESSION["login"] = true;
  }

}

// Cek session
if(isset($_SESSION["login"])){
header("Location: index.php");
exit;
}

// cek tombil di tekan atau tidak
if(isset($_POST["submit"])){

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn,"SELECT * FROM user WHERE username = '$username'");
  
    // check username
    if(mysqli_num_rows($result) === 1){
        
        // check password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])){

          $_SESSION["login"] = true;
          // cek remember me 
          if(isset($_POST["remember"])){
            // buat cookie
            
            setcookie("id",$row["id"],time() + 60);
            setcookie("key",hash("sha256",$row["username"]),time() + 60);
          }
            header("Location:index.php");
            exit;
        }
    }

    $error = true;


}



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <?php if(isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
  Username / Password Salah !
</div>
            <?php endif; ?>
    <form action="" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
    <div id="username" class="form-text">We'll never share your username with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="remember" id="remember">
    <label class="form-check-label" for="remember">Remember Me !</label>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
    </div>
</body>
</html>