<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'pemesanan_tiket_bus';

	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terhubung ke database');
?>