<?php
	session_start();
    include '../../koneksi.php';
	if($_SESSION['status_admin'] != true){
		echo '<script>window.location="../../login_admin.php"</script>';
	}

    $mobil = mysqli_query($conn, "SELECT * FROM tb_mobil 
                         INNER JOIN tb_rute ON tb_mobil.id_rute = tb_rute.id_rute 
                        WHERE id_mobil = '".$_GET['id_mobil']."' ");
        if(mysqli_num_rows($mobil) == 0){
            echo '<script>window.location="mobil.php"</script>';
        }
        $p = mysqli_fetch_object($mobil);


?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EDIT DATA MOBIL</title>

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
<br>
  <div class="row text-white text-center">
      <div class="col-lg-12 mt-5 mb-4">
          <h3>EDIT DATA MOBIL</h3>
      </div>
  </div>

  <div class="row">
        <div class="col-lg-6 offset-lg-3">
        <form action="" method="post" enctype="multipart/form-data">
    
        <div class="mb-1">
        <div class="mb-1">
        <select class="form-select" aria-label="Default select example" name="id_rute">
        <option value="<?php echo $p->id_rute ?>"><?php echo $p->rute ?></option>
            <?php
				$rute = mysqli_query($conn, "SELECT * FROM tb_rute");
				while($r = mysqli_fetch_array($rute)){
				?>
				 <option value="<?php echo $r['id_rute'] ?>"><?php echo $r['rute'] ?></option>
				<?php } ?>
        </select>
        </div>
        </div>

        <div class="mb-1">
            <input type="text" class="form-control" name="nama_mobil" placeholder="Nama Mobil....." autofocus id="nama_mobil" value="<?php echo $p->nama_mobil ?>">
        </div>

        <div class="mb-1">
            <input type="text" class="form-control" name="fasilitas" placeholder="Fasilitas....." autofocus id="fasilitas" value="<?php echo $p->fasilitas ?>">
        </div>

        <div class="mb-1">
            <input type="text" class="form-control" name="jam_berangkat" placeholder="Jam Berangkat....." autofocus id="jam_berangkat" value="<?php echo $p->jam_berangkat ?>">
        </div>

        <div class="mb-1">
            <input type="text" class="form-control" name="jam_tiba" placeholder="Jam Tiba....." autofocus id="jam_tiba" value="<?php echo $p->jam_tiba ?>">
        </div>

        <div class="mb-3">
            <input type="date" class="form-control" name="tanggal_berangkat" autofocus id="tanggal_berangkat" value="<?php echo $p->tanggal_berangkat ?>">
        </div>

        <div class="">
            <button type="submit" class="btn btn-success w-100" id="registrasi" name="submit">SUBMIT</button>
        </div>
    </form>

        </div>
    </div>
    
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>

<!-- Proses Ubah Data Mobil -->
<?php
					if(isset($_POST['submit'])){

						// data inputan dari form
						$id_rute 	        = $_POST['id_rute'];
						$nama_mobil 		= $_POST['nama_mobil'];
						$fasilitas 	        = $_POST['fasilitas'];
						$jam_berangkat 		= $_POST['jam_berangkat'];
						$jam_tiba 		    = $_POST['jam_tiba'];
						$tanggal_berangkat 	= $_POST['tanggal_berangkat'];

						// query update data mobil
						$update = mysqli_query($conn, "UPDATE tb_mobil SET 
                                               id_rute = '".$id_rute."',
												nama_mobil = '".$nama_mobil."',
												fasilitas = '".$fasilitas."',
												jam_berangkat = '".$jam_berangkat."',
												jam_tiba = '".$jam_tiba."'
												WHERE id_mobil = '".$p->id_mobil."' ");

						if($update){
							echo '<script>alert("Ubah data berhasil")</script>';
							echo '<script>window.location="mobil.php"</script>';
						}else{
							echo 'Gagal'.mysqli_error($conn);
						}
						

					}
				?>