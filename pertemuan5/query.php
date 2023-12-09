<?php
$koneksi = mysqli_connect("localhost","root","","warung");
// $sql1 = "CREATE DATABASE warung";
// $sql2 = "CREATE TABLE sembako(
//     id_sembako int PRIMARY KEY AUTO_INCREMENT,
//     nama_sembako varchar(20) not null
// )";
$sql3 = "INSERT INTO sembako(nama_sembako) VALUES('beras 3 kilo')";
$hasil = mysqli_query($koneksi,$sql3);
if ($hasil){
    echo "data berhasil dimasukkan";
}else{
    echo "data gagal dimasukkan";
}
?>