<?php 
$koneksi = mysqli_connect("localhost", "root", "", "puskesmas");

$id_rm = $_GET['id_rm'];

// Hapus data rm_obat yang memiliki id_rm 
$query_hapus_rm_obat = "DELETE FROM rm_obat WHERE id_rm = '$id_rm'";
$hasil_hapus_rm_obat = mysqli_query($koneksi, $query_hapus_rm_obat);

// hapus data dari tabel rekammedis
$query_hapus_rekammedis = "DELETE FROM rekammedis WHERE id_rm = '$id_rm'";
$hasil_hapus_rekammedis = mysqli_query($koneksi, $query_hapus_rekammedis);

if ($hasil_hapus_rekammedis){
    header("Location: data.php");
} else {
    echo "Data gagal dihapus";
}
?>
