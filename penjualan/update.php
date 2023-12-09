<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $id = $_POST['id_order'];
    $tgl_order = $_POST['tgl_order'];
    $deskripsi = $_POST['deskripsi'];
    $nama_pemesan = $_POST['nama_pemesan'];

    // Query untuk mengupdate data siswa berdasarkan id_
    $query = "UPDATE `order` SET `tgl_order` = '$tgl_order', `deskripsi` = '$deskripsi', `nama_pemesan` = '$nama_pemesan' WHERE `id_` = $id";
    $result = mysqli_query($koneksi, $query);

    if($result){
        header('location: daftar.php');
    } else {
        echo "Gagal mengupdate data siswa.";
    }
}
?>
