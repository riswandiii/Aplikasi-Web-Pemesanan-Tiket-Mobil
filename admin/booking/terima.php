<?php
	session_start();
    include '../../koneksi.php';
	if($_SESSION['status_admin'] != true){
		echo '<script>window.location="../../login_admin.php"</script>';
	}

    $id_booking = $_GET['id_booking'];
    
						$status_booking 	= '1';

						// query update data booking
						$update = mysqli_query($conn, "UPDATE tb_booking SET 
                                                status_booking = '".$status_booking."'
												WHERE id_booking = '".$id_booking."' ");

						if($update){
							echo '<script>alert("TERIMA PESANAN SUCCESS!")</script>';
							echo '<script>window.location="booking.php"</script>';
						}else{
							echo 'Gagal'.mysqli_error($conn);
						}


?>