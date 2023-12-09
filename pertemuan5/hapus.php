<?php 
$koneksi = mysqli_connect("localhost","root","","penjualan");

$id_barang = $_GET['id_barang'];
// var_dump($id_barang);
$query = "DELETE FROM barang WHERE id = $id_barang";
$hasil = mysqli_query($koneksi,$query);
if ($hasil){
    header("Location: data.php");
}else{
    echo "data gagal dihapus";
}
?>