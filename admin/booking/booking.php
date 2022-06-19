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
    <title>DATA BOOKING</title>

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
  <div class="container-fluid">

  <div class="row text-white text-center">
      <div class="col-lg-12 mt-5 mb-4">
          <h3>DATA TABLE BOOKING</h3>
      </div>
  </div>

  <div class="row">
        <div class="col-lg-12">
            <div class="table-responisve">
                <table class="table table-sm table-striped text-white table-bordered">
                    <thead>
                        <tr data-aos="fade-right" data-aos-duration="2000">
                            <th>No</th>
                            <th>Pemesan</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Mobil</th>
                            <th>Tanggal</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
							$no = 1;
							$booking = mysqli_query($conn, "SELECT * FROM tb_booking 
                                                  INNER JOIN tb_user ON tb_booking.id_user = tb_user.id_user
                                                  INNER JOIN tb_mobil ON tb_booking.id_mobil = tb_mobil.id_mobil   
                            ");
							if(mysqli_num_rows($booking) > 0){
							while($row = mysqli_fetch_array($booking)){
						?>
						<tr>
							<td class="text-white"><?php echo $no++ ?></td>
							<td class="text-white"><?php echo $row['username'] ?></td>
							<td class="text-white"><?php echo $row['email'] ?></td>
							<td class="text-white"><?php echo $row['no_handphone'] ?></td>
							<td class="text-white"><?php echo $row['alamat'] ?></td>
							<td class="text-white"><?php echo $row['nama_mobil'] ?></td>
							<td class="text-white"><?php echo $row['tanggal'] ?></td>
                            <td class="text-white">Rp. <?php echo number_format($row['harga']) ?></td>
							<?php if($row['status_booking'] == '0') { ?>
                            <td><a href="terima.php?id_booking=<?php echo $row['id_booking'] ?>" class="btn btn-primary btn-sm" onclick="return confirm('YAKIN INGIN TERIMA PESANAN TIKET?')">Terima</a></td>
                            <?php }else{ ?>
                            <td class="text-success">Pesanan Tiket Telah Di Terima</td>
                            <?php } ?>
                            <th>
                                <a href="hapus_pesanan.php?id_booking=<?php echo $row['id_booking'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('YAKIN INGI HAPUS DATA?')">Delete</a>
                            </td>
                            
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="9" class="text-white">Belom Ada Data Booking</td>
							</tr>

						<?php } ?>
					</tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-3">
    <div class="col-lg-12">
            <a href="../dashboard.php" class="btn btn-danger btn-sm">Back to Dassboard</a>
        </div>
    </div>

    
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>