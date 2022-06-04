<?php

	include '../../koneksi.php ';

	if(isset($_GET['id_mobil'])){

		$delete = mysqli_query($conn, "DELETE FROM tb_mobil WHERE id_mobil = '".$_GET['id_mobil']."' ");
		echo '<script>window.location="mobil.php"</script>';

	}

?>