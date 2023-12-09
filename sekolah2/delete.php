<?php
include 'koneksi.php';
$id=$_GET['id'];
$cek=mysqli_query($koneksi, "DELETE FROM siswa WHERE `siswa`.`id` = $id");
if (isset($cek)){
    echo "berhasil dihapus";
}
?>