<?php

$databaseHost = 'localhost';
$databaseUsername = 'root';
$databasePassword = '';
$databaseName = 'puskesmas';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);



if ($mysqli) {
    echo "Koneksi database berhasil.";
} else {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
