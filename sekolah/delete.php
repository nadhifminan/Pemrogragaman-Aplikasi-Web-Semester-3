<?php
include 'koneksi.php';
$id=$_GET['id_'];
$cek=mysqli_query($koneksi, "DELETE FROM siswa WHERE `siswa`.`id_` = $id");
if (isset($cek)){
    echo "berhasil dihapus";
}

?>