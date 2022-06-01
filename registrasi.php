<?php
					if(isset($_POST['submit'])){
                        include 'koneksi.php';

						$username 		= $_POST['username'];
						$email 		= $_POST['email'];
						$password 		= $_POST['password'];
						$no_handphone 		= $_POST['no_handphone'];
						$alamat 		= $_POST['alamat'];

                        $password = md5($password);

                        $insert = mysqli_query($conn, "INSERT INTO tb_user VALUES (
                            '',
                            '".$username."',
                            '".$email."',
                            '".$password."',
                            '".$no_handphone."',
                            '".$alamat."'
                                )");


							if($insert){
								echo '<script>alert("Registrasi Anda Berhasil!")</script>';
								echo '<script>window.location="login.php"</script>';
							}else{
								echo 'Gagal'.mysqli_error($conn);
							}
					}
	?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REGISTRASI USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body class="bg-light">
  
  <div class="container-fluid">
      <div class="container mt-5">

      <div class="row text-center">
          <div class="col-lg-12 mt-5 mb-3">
              <h3>REGISTRASI USER</h3>
          </div>
      </div>

      <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <!-- Form Registrasi -->
                <form action="" method="post">
                    <div class="mb-1">
                        <input type="text" id="username" name="username" class="form-control" placeholder="Username...">
                    </div>
                    <div class="mb-1">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email...">
                    </div>
                    <div class="mb-1">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password...">
                    </div>
                    <div class="mb-1">
                        <input type="number" id="No. Handphone" name="No. Handphone" class="form-control" placeholder="No. Handphone...">
                    </div>
                    <div class="mb-3">
                        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat...">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-primary w-100" name="submit" type="submit">REGISTRASI</button>
                    </div>
                    <div class="mb-3">
                        <small><p>Sudah punya akun? <a href="login.php" class="text-decoration-none">Login User</a></p></small>
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