<?php

	include 'koneksi.php ';

	if(isset($_GET['id_booking'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_booking WHERE id_booking = '".$_GET['id_booking']."' ");
		echo '<script>window.location="history.php"</script>';

	}

?>