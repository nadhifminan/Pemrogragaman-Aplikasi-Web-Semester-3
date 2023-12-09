<?php 
$koneksi = mysqli_connect("localhost","root","","toko");

$id_pemasok = $_GET['id_supplier'];
// var_dump($id_barang);
$query = "DELETE FROM supplier WHERE id = $id_pemasok";
$hasil = mysqli_query($koneksi,$query);
if ($hasil){
    header("Location: data.php");
}else{
    echo "data gagal dihapus";
}
?>