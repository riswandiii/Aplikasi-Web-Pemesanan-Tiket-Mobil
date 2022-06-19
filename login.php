<?php
session_start();
include 'koneksi.php';

// Jika sudah Login
if(isset($_SESSION['login'])){
    echo '<script>window.location="index.php"</script>';
}

 // Prose login admin
 if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $cek = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '".$email."' AND password = '".$password."'");
    if(mysqli_num_rows($cek) > 0){
        $d = mysqli_fetch_object($cek);
        $_SESSION['login'] = true;
        $_SESSION['a_global'] = $d;	
        $_SESSION['id_user'] = $d->id_user;
        echo '<script>window.location="index.php"</script>';
    }else{
        echo '<script>alert("Username atau password Anda salah!")</script>';
    }
}


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOGIN USER</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">

  <div class="container-fluid">
      <div class="container mt-5">

      <div class="row align-items-center">
          <div class="col-lg-3 offset-lg-2 mt-3" >
            <img src="img/2.jpg" alt="" height="480" width="320">
          </div>
          <div class="col-lg-4 offset-lg-1">
                <!-- Form Login -->
                <form action="" method="post">
                    <div class="mb-4">
                        <h3>LOGIN USER</h3>
                    </div>
                    <div class="mb-1">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="mb-3">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password...">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-outline-primary w-100">LOGIN</button>
                    </div>
                    <div class="mt-4 mb-3">
                        <small><p>Belom punya akun? <a href="registrasi.php" class="text-decoration-none">Registrasi</a></p></small>
                    </div>
                    <div>
                        <strong><p>Login with admin <a href="login_admin.php" class="text-decoration-none">Login Admin</a></p></strong>
                    </div>
                </form>
                <!-- End Form -->
          </div>
         </div>
      </div>
  </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>