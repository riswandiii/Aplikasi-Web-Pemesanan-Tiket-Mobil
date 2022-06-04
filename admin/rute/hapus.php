<?php

	include '../../koneksi.php ';

	if(isset($_GET['id_rute'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_rute WHERE id_rute = '".$_GET['id_rute']."' ");
		echo '<script>window.location="rute.php"</script>';

	}

?>