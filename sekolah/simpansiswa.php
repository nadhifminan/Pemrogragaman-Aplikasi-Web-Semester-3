<?php
// untuk mengambil name alamat url
include 'koneksi.php';
if(isset($_GET['nama'])){
    $nama=$_GET['nama'];
    $jk=$_GET['jk'];
    $alamat=$_GET['alamat'];

    $cek=mysqli_query($koneksi,"INSERT INTO `siswa` (`id_`, `nama`, `jenis_kelamin`, `alamat`) VALUES (NULL, '$nama', '$jk', '$alamat');");
    if(isset($cek)){
        header('location:daftar.php');
        // echo "berhasil tersimpan";
    }
}
?>