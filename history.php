<?php
 session_start();
 include 'koneksi.php';
 if(!isset($_SESSION['login'])){
   header('Location: login.php');
 }

 $id_user = $_SESSION['id_user'];

 $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user = '$id_user' ");
 $us = mysqli_fetch_array($user);

 $booking = mysqli_query($conn, "SELECT * FROM tb_booking
 WHERE id_user = '$id_user' ");
 $bo = mysqli_fetch_array($booking);


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Pemesanan <?php echo $us['username'] ?></title>

    <!-- Link Style Css -->
    <link rel="stylesheet" href="css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="img/logo.webp" alt="" width="100" class="rounded-circle"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mobil.php">Mobil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
          <?php if(isset($_SESSION['login'])) { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome, <?php echo $_SESSION['a_global']->username ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="history.php">History Pemesanana Tiket</a></li>
                <?php if(isset($_SESSION['status_admin'])) { ?>
                <?php } else { ?>
                  <li><a class="dropdown-item" href="profil.php?id_user=<?php echo $_SESSION['id_user'] ?>">Profil</a></li>
                <?php }?>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log In</a>
            </li>
          <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<div class="container-fluid" id="container-fluid">
  <div class="container">

    <div class="row text-white text-center mb-3">
      <div class="col-lg-12 mt-5">
        <h3>~History Pemesanan <?php echo $us['username'] ?>~</h3>
      </div>
    </div>

    <div class="row gx-1 mb-5">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-light">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            LEFT JOIN tb_mobil ON tb_booking.id_mobil = tb_mobil.id_mobil 
                            WHERE id_user = '$id_user'
                                                
                            ");
							if(mysqli_num_rows($booking) > 0){
							while($row = mysqli_fetch_array($booking)){
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $row['nama_mobil'] ?></td>
							<td><?php echo $row['tanggal'] ?></td>
                            <td>Rp. <?php echo number_format($row['harga']) ?></td>
							<?php if($row['status_booking'] == '0') { ?>
                            <td class="text-danger">Pesanan Tiket Anda Belom Di Acc</td>
                            <?php }else{ ?>
                            <td class="text-success">Pesanan Anda telah di acc, Lakukan pembayaran pada saat pengambilan tiket mobil dengan nilai sebesar <strong>Rp. <?php echo number_format($row['harga']) ?></strong></td>
                            <?php } ?>
                            <td>
                                <a href="hapus_pesanan.php?id_booking=<?php echo $row['id_booking'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('YAKIN INGIN HAPUS PESANAN TIKET?')">Delete</a>
                            </td>
						</tr>
						<?php }}else{ ?>
							<tr>
								<td colspan="6" class="text-danger">Belom memiliki History Pemesanan</td>
							</tr>

						<?php } ?>
                    </tbody>
                </table>
                <br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>
    </div>

    <br>
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqkmosUnama_mobil55Jfv3qYSDhgCecCmo52nama_mobil2" crossorigin="anonymous"></script>
  </body>
</html>