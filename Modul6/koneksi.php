<?php 
	
	$host = 'localhost';
	$user = 'root'  ;
	$password = '';
	$dbname = 'supermarket';

	$koneksi = mysqli_connect($host,$user,$password,$dbname);
	if (!$koneksi) {
		die(mysqli_error($koneksi));
	}

 ?>