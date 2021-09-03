<?php 
require "functions.php";

if(isset($_POST["submit"])){
    
    if(registrasi($_POST) > 0){
      $sukses = true;
    }else {
      $error = false;
    }
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">

    <h1>Daftar </h1>
    <?php if(isset($sukses)) : ?>
        <div class="alert alert-success" role="alert">
  Daftar Berhasil !
        </div>
            <?php endif; ?>
            <?php if(isset($error)) : ?>
        <div class="alert alert-danger" role="alert">
  Daftar Gagal
        </div>
            <?php endif; ?>
    <form action="" method="POST" >
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" name="username" id="username">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="password">
  </div>
  
  <div class="mb-3">
    <label for="password2" class="form-label">Password</label>
    <input type="password" class="form-control" name="password2" id="password2">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
</div>    


</body>
</html>