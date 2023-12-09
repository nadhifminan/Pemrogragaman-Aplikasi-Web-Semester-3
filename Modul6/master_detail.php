<?php
include 'koneksi.php';

// hapus item barang
if(isset($_GET['id_barang'])) {
    $id_barang = $_GET['id_barang'];

    // Cek barang terpakai di transaksi_detail
    $queryCekPenggunaan = "SELECT COUNT(*) as count FROM transaksi_detail WHERE barang_id = $id_barang";
    $resultCekPenggunaan = mysqli_query($koneksi, $queryCekPenggunaan);
    $dataCekPenggunaan = mysqli_fetch_assoc($resultCekPenggunaan);

    if ($dataCekPenggunaan['count'] > 0) {
        echo "<script>alert('Barang ini terpakai dalam transaksi. Tidak dapat dihapus.')</script>";
    } else {
        // Barang tidak terpakai hapus
        $queryHapusBarang = "DELETE FROM barang WHERE id = $id_barang";
        $hasilHapusBarang = mysqli_query($koneksi, $queryHapusBarang);

        if ($hasilHapusBarang) {
            header("Location: master_detail.php");
        } else {
            echo "Data gagal dihapus";
        }
    }
}

$query = "SELECT transaksi.id AS id_transaksi, waktu_transaksi, keterangan, total, pelanggan_id, 
                 barang.id AS id_barang, nama_barang, barang.harga AS harga_barang, qty
          FROM transaksi
          INNER JOIN transaksi_detail ON transaksi.id = transaksi_detail.transaksi_id
          INNER JOIN barang ON transaksi_detail.barang_id = barang.id";

$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>Data Transaksi</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Waktu Transaksi</th>
                    <th>Keterangan</th>
                    <th>Total</th>
                    <th>ID Pelanggan</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_transaksi'] . "</td>";
                echo "<td>" . $row['waktu_transaksi'] . "</td>";
                echo "<td>" . $row['keterangan'] . "</td>";
                echo "<td>" . $row['total'] . "</td>";
                echo "<td>" . $row['pelanggan_id'] . "</td>";
                echo "<td>" . $row['id_barang'] . "</td>";
                echo "<td>" . $row['nama_barang'] . "</td>";
                echo "<td>" . $row['harga_barang'] . "</td>";
                echo "<td>" . $row['qty'] . "</td>";
                echo "<td><a href='master_detail.php?id_barang=" . $row['id_barang'] . "' class='btn btn-danger' onclick=\"return confirm('Apakah kamu yakin ingin menghapus data dengan nama " . $row['nama_barang'] . "?')\">Hapus Barang</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
