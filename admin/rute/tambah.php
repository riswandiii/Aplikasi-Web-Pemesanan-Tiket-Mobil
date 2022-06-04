<?php
	session_start();
    include '../../koneksi.php';
	if($_SESSION['status_admin'] != true){
		echo '<script>window.location="../../login_admin.php"</script>';
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAMBAH DATA RUTE</title>

    <style>
        * {
        padding: 0;
        margin: 0;
        }

        html body {
            background-image: url('../../img/2.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 600px;
        }

        #container-fluid {
            background-color: black;
            opacity: 0.8;
            height: 630px;
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
<br><br><br><br>
  <div class="row text-white text-center">
      <div class="col-lg-12 mt-5 mb-4">
          <h3>TAMBAH DATA RUTE</h3>
      </div>
  </div>

  <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <form action="" method="post" enctype="multipart/form-data">
        

        <div class="mb-3">
            <input type="text" class="form-control" name="rute" placeholder="Rute Mobil....." autofocus id="rutw">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success w-100" id="registrasi" name="submit">SUBMIT</button>
        </div>
    </form>

    <!-- Proses Tambah Data Rute -->
    <?php
					if(isset($_POST['submit'])){

						// menampung inputan dari form
						$rute 	= $_POST['rute'];
						
							$rutee = mysqli_query($conn, "INSERT INTO tb_rute VALUES('', '$rute')");

							if($rutee){
								echo '<script>alert("Tambah data berhasil")</script>';
								echo '<script>window.location="rute.php"</script>';
							}else{
								echo 'Gagal'.mysqli_error($conn);
							}

						}	
				?>

            
        </div>
    </div>
    
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>