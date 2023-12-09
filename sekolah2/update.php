<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Query untuk mengupdate data siswa berdasarkan id_
    $query = "UPDATE `siswa` SET `nama` = '$nama', `jenis_kelamin` = '$jk', `alamat` = '$alamat' WHERE `id` = $id";
    $result = mysqli_query($koneksi, $query);

    if($result){
        header('location: daftar.php');
    } else {
        echo "Gagal mengupdate data siswa.";
    }
}
?>
