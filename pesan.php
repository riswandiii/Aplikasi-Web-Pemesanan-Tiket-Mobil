<?php
 session_start();
 include 'koneksi.php';
 if(!isset($_SESSION['login'])){
   header('Location: login.php');
 }

 $id_mobil = $_GET['id_mobil'];
 $mobil = mysqli_query($conn, "SELECT * FROM tb_mobil
 LEFT JOIN tb_rute ON tb_mobil.id_rute = tb_rute.id_rute
 WHERE id_mobil = '$id_mobil' ");
 $mo = mysqli_fetch_array($mobil);


//  Proses pemesanan tiket
if(isset($_POST['submit'])){

    $id_mobil 		= $_POST['id_mobil'];
    $id_user 		= $_POST['id_user'];
    $status_booking 		= $_POST['status_booking'];
    $tanggal 		= $_POST['tanggal'];
    $harga 		= $_POST['harga'];

    $insert = mysqli_query($conn, "INSERT INTO tb_booking VALUES (
        '',
        '".$id_mobil."',
        '".$id_user."',
        '".$status_booking."',
        '".$tanggal."',
        '".$harga."'
            )");


        if($insert){
            echo '<script>alert("BERHASIL MELAKUKAN PESANAN TIKET!")</script>';
            echo '<script>window.location="history.php"</script>';
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
    <title>Mobil <?php echo $mo['nama_mobil'] ?></title>

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
              <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <h3>~Form Pemesanan Tiket Mobil <?php echo $mo['nama_mobil'] ?>~</h3>
      </div>
    </div>

    <div class="row gx-1 mb-5">
        <div class="col-lg-8 offset-lg-2">
            <div class="card p-5">
                <div class="tavle-responsive">
                    <table class="table table-sm table-striped">
                        <tbody> 
                            <tr>
                                <th>Mobil</th>
                                <th>:</th>
                                <th><?php echo $mo['nama_mobil'] ?></th>
                            </tr>
                            <tr>
                                <th>Rute</th>
                                <th>:</th>
                                <th><?php echo $mo['rute'] ?></th>
                            </tr>
                            <tr>
                                <th>Fasilitas</th>
                                <th>:</th>
                                <th><?php echo $mo['fasilitas'] ?></th>
                            </tr>
                            <tr>
                                <th>Jam Berangkat</th>
                                <th>:</th>
                                <th><?php echo $mo['jam_berangkat'] ?></th>
                            </tr>
                            <tr>
                                <th>Jam Tiba</th>
                                <th>:</th>
                                <th><?php echo $mo['jam_tiba'] ?></th>
                            </tr>
                            <tr>
                                <th>Tangkal Berangkat</th>
                                <th>:</th>
                                <th><?php echo $mo['tanggal_berangkat'] ?></th>
                            </tr>
                            <tr>
                                <th>Harga Tiket</th>
                                <th>:</th>
                                <th>Rp. <?php echo number_format($mo['harga']) ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Form Pemesanan tiker -->
                <form action="" method="post">
                    <input type="hidden" name="id_mobil" value="<?php echo $mo['id_mobil'] ?>">
                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['id_user'] ?>">
                    <input type="hidden" name="status_booking" value="0">
                    <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                    <input type="date" name="tanggal" class="form-control" required>
                    <input type="hidden" name="harga" value="<?php echo $mo['harga'] ?>">
                    <div class="py-2">
                         <button type="submit" name="submit" class="btn btn-primary" onclick="return confirm('YAKIN INGIN PESAN TIKET MOBIL?')">Pesan Sekarang</button>
                    </div>
                </form>
                <!-- End Form -->

            </div>
        </div>
    </div>

    <br>
  </div>
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqkmosUnama_mobil55Jfv3qYSDhgCecCmo52nama_mobil2" crossorigin="anonymous"></script>
  </body>
</html>