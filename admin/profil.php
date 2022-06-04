<?php
	session_start();
    include '../koneksi.php';
	if($_SESSION['status_admin'] != true){
		echo '<script>window.location="../login_admin.php"</script>';
	}
    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE id_admin = '".$_SESSION['id_admin']."' ");
	$admin = mysqli_fetch_object($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PROFIL ADMIN</title>

    <style>
        * {
        padding: 0;
        margin: 0;
        }

        html body {
            background-image: url('../img/2.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 600px;
        }

        #container-fluid {
            background-color: black;
            opacity: 0.8;
            height: 700px;
        }

        nav {
            background-color: black;
            opacity: 0.8;
            border-bottom: 1px solid wheat;
            position: relative;
            z-index: 10;
        }

        nav ul li {
            font-weight: bold;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>

<div class="container-fluid" id="container-fluid">
  <div class="container">
    <br><br><br>
  <div class="row">
      <div class="col-lg-6 offset-lg-3 mt-5">
            <div class="card p-3">
                <div class="card-header">
                    <h3>My Profil <?php echo $admin->username ?></h3>
                </div>
                <div class="card-body">
                <table class="table table sm">
                    <tbody>
                        <tr>
                            <td>Nama Panggilan</td>
                            <td>:</td>
                            <td><?php echo $admin->nama_panggilan ?></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?php echo $admin->username ?></td>
                        </tr>
                        <tr>
                            <td>No. Hnadphone</td>
                            <td>:</td>
                            <td><?php echo $admin->no_handphone ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $admin->email ?></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
      </div>
  </div>

  <div class="row mt-3">
    <div class="col-lg-6 offset-lg-3">
            <a href="dashboard.php" class="btn btn-danger btn-sm">Back to Dassboard</a>
        </div>
    </div>

    
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>