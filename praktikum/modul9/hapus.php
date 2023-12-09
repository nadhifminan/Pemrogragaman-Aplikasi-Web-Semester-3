<?php
$koneksi = mysqli_connect("localhost", "root", "", "penjualan",'3308');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_pelanggan = isset($_GET['id_pelanggan']) ? $_GET['id_pelanggan'] : die('Error: ID Pelanggan tidak ditemukan.');

    // Hapus data berdasarkan ID Pelanggan
    $query_delete = "DELETE FROM transaksi WHERE id=$id_pelanggan";
    mysqli_query($koneksi, $query_delete);
    
    header("Location: data.php");
    exit();
} else {
    die('Error: Metode request tidak valid.');
}
?>
