<?php
 session_start();
 include 'koneksi.php';
 if(!isset($_SESSION['login'])){
   header('Location: login.php');
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOBIL</title>

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
        <h3>~MOBIL BUS TERSEDIA~</h3>
      </div>
    </div>

    <div class="row gx-1">

    <?php 
							$no = 1;
							$mobil = mysqli_query($conn, "SELECT * FROM tb_mobil 
                                                  INNER JOIN tb_rute ON tb_mobil.id_rute = tb_rute.id_rute    
                            ");
							if(mysqli_num_rows($mobil) > 0){
							while($row = mysqli_fetch_array($mobil)){
						?>
						
                        <div class="col-lg-4 mb-1">
                            <div class="card p-3">
                                <strong><p>Nama Mobil : <?php echo $row['nama_mobil'] ?></p></strong>
                                <strong><p>Rute : <?php echo $row['rute'] ?></p></strong>
                                <strong><p>Fasilitas : <?php echo $row['fasilitas'] ?></p></strong>
                                <strong><p>Jam Berangkat : <?php echo $row['jam_berangkat'] ?></p></strong>
                                <strong><p>Jam Tiba : <?php echo $row['jam_tiba'] ?></p></strong>
                                <strong><p>Tanggal Berangkat : <?php echo $row['tanggal_berangkat'] ?></p></strong>
                                <strong><p>Harga : Rp. <?php echo number_format($row['harga']) ?></p></strong>
                                <div class="py-2">
                                    <a href="pesan.php?id_mobil=<?php echo $row['id_mobil'] ?>" class="btn btn-primary">Pesan Tiket</a>
                                </div>
                            </div>
                        </div>

						<?php }}else{ ?>
							<tr>
								<td colspan="8" class="text-white">Belom Ada Data Mobil</td>
							</tr>

						<?php } ?>

    </div>

    <br>
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>