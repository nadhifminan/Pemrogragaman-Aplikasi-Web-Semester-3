<?php
// untuk mengambil name alamat url
include 'koneksi.php';
if(isset($_GET['tgl_order'])){
    $tgl_order=$_GET['tgl_order'];
    $deskripsi=$_GET['deskripsi'];
    $nama_pemesan=$_GET['nama_pemesan'];

    $cek=mysqli_query($koneksi,"INSERT INTO `order` (`id_order`, `tgl_order`, `deskripsi`, `nama_pemesan`) VALUES (NULL, '$tgl_order', '$deskripsi', '$nama_pemesan');");
    if(isset($cek)){
        header('location:daftar.php');
        // echo "berhasil tersimpan";
    }
}
?>