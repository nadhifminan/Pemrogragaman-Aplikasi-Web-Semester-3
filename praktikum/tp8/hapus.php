<?php 
$koneksi = mysqli_connect("localhost","root","","penjualan");

$id_pengguna = $_GET['id_user'];
// var_dump($id_user);
$query = "DELETE FROM user WHERE id_user = $id_pengguna";
$hasil = mysqli_query($koneksi,$query);
if ($hasil){
    header("Location: data.php");
}else{
    echo "data gagal dihapus";
}
?>