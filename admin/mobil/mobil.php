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
    <title>DATA MOBIL</title>

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

  <div class="row text-white text-center">
      <div class="col-lg-12 mt-5">
          <h3>DATA TABLE MOBIL</h3>
      </div>
  </div>

  <div class="row mt-3 mb-4">
        <div class="col-lg-10 offset-lg-1">
            <a href="tambah.php" class="btn btn-primary btn-sm">Tambah Data Mobil</a>
        </div>
    </div>

  <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <div class="table-responisve">
                <table class="table table-sm table-striped text-white table-bordered">
                    <thead>
                        <tr data-aos="fade-right" data-aos-duration="2000">
                            <th>No</th>
                            <th>Rute</th>
                            <th>Nama Mobil</th>
                            <th>Fasilitas</th>
                            <th>Jam Berangkat</th>
                            <th>Jam Tiba</th>
                            <th>Tanggal Berangkat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
							$no = 1;
							$mobil = mysqli_query($conn, "SELECT * FROM tb_mobil 
                                                  INNER JOIN tb_rute ON tb_mobil.id_rute = tb_rute.id_rute    
                            ");
							if(mysqli_num_rows($mobil) > 0){
							while($row = mysqli_fetch_array($mobil)){
						?>
						<tr>
							<td class="text-white"><?php echo $no++ ?></td>
							<td class="text-white"><?php echo $row['rute'] ?></td>
							<td class="text-white"><?php echo $row['nama_mobil'] ?></td>
							<td class="text-white"><?php echo $row['fasilitas'] ?></td>
							<td class="text-white"><?php echo $row['jam_berangkat'] ?></td>
							<td class="text-white"><?php echo $row['jam_tiba'] ?></td>
							<td class="text-white"><?php echo $row['tanggal_berangkat'] ?></td>
                            <td>
                                <a href="ubah.php?id_mobil=<?php echo $row['id_mobil']?>" class="btn btn-primary btn-sm">Edit</a> ||
                                <a href="hapus.php?id_mobil=<?php echo $row['id_mobil'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('YAKIN INGI HAPUS DATA?')">Delete</a>
                            </td>
                            
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="8" class="text-white">Belom Ada Data Mobil</td>
							</tr>

						<?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
    <div class="col-lg-10 offset-lg-1">
            <a href="../dashboard.php" class="btn btn-danger btn-sm">Back to Dassboard</a>
        </div>
    </div>

    
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>