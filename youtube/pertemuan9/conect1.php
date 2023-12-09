<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbmahasiswa";

    $koneksi = mysqli_connect($host, $user, $pass, $database);

    if ($koneksi){
        echo "Database dapat Terhubung";
    } else {
        echo "MySql tidak dapat terhubung";
    }
?>
